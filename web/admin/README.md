Looking at the login interface the challange is probably an SQLi challange.
Trying the usual payload and test indicate that there is some filter in place in the form of an IDS

```
IDS: SQL injection detected !
```

So bypass the IDS?

By process of elimination we can determine which characters or string sequence that are filtered : 

```
" = "
" or "
"--"
"/*"
```

since "** or **" is blacklisted, we can't use "**or**" but "**=**" can be used without a space character prefix & postfix.
so it can still be used as a valid sql syntax. So our query could be constructed around "**=**" to bypass the system's logic.
for comment, only "**#**" is allowed.

The "**u**" parameter is also limited to 15 characters while the "**p**" parameter doesn't seem to have any char limit.

So we have to craft a payload that abides by the above rules

Tried some more payloads that could work that doesn't trigger the IDS such as :

```
9'='9'#
9=9#
admin'#
admin')#
admin' and 7=7# (can't do qoutes on 7 since it will be more than 15 chars total)
```

But none of them worked I ran out of idea of any viable payload within the restrictions.
Encoding the payload with the usual WAF bypassing schema also does nothing.

---

Fast forward after the competition, looking at the [source code of the challange](https://github.com/najashark/KICTM-2017-CTF-Writeup/blob/master/web/admin/index.php),
we realize some problem with the question.

1.The challange itself does not implement any real SQLI query and the code shows that it only checks the payload for certain characters/payload to spit out the flag
2.There is a bug on line 14 that made the flag output to be malformed and cause the flag to be corrupted

---

```php
	if (strpos(strtolower($i), '\'=\'\' limit 1,1#') === 0)
		die("Flag is 5h0Rt4nD4w33t$QLiYa4y");
```

The above snippet shows the correct payload that need to be submitted through "**u**" parameter in order to get the flag.
As you can see, there is no actual SQLi query being made and the program is simply a 'checker' that takes the input $i and
see if it matches "*\'=\'\' limit 1,1#*" to echo out the flag. The right thing to do is to simulate a real vulnerable code base
in which an actual query is made to the backend database. This will open up more possibilities of valid payload that can spawn the flag.

As we know, in the real world there is more than one way to achive anything, and limiting the correct payload to exactly "*\'=\'\' limit 1,1#*"
is not a fair way of accessing the situation. There should not be any problems concerning the probability of students poping a shell through the sqli
and overstepping the challange boundry if the database is set up properly with various mitigations (disable xp_cmdshell, strip INTO OUTFILE etc.)

---

The bug mentioned in #2 also lies on the same code snippet above. The flag supposed to be "5h0Rt4nD4w33t$QLiYa4y" which is leetspeak for "shortandaweet"
("shortandsweet" typo perhaps??) plus some random string at the end "$QLiYa4y". Now, there is 2 possibilities here, first the flag is meant to be literally
"5h0Rt4nD4w33t$QLiYa4y" but the author forgots to escape the "$" symbol, thus making the PHP interpreter interpret "$QLiYa4y" as a variable. In PHP, anything
inside double qoute is not literal and every variable will be expanded during run time.

The second possibility is the writer meant for the variable "$QLiYa4y" to be echoed, but forgot to declare it somewhere in the code.
