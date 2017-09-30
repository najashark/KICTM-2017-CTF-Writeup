## weak

**Category:** Web

**Points:** 250

**Solves:** --

**Description:**

(No description)

### Write-up

so there's some TODO comments inside the generated page source that reads : 

```
<!--
TODO: Change admin password. Currently using very weak password.
-->
```

This gives a strong suggestion about the challange needed to be bruteforced or better yet since it's weak passwords,
we can utilize a list of known weak passwords from the net. so, it's a wordlist attack.

The 2nd thing to note that there it a hiddden form with the name "**u**" in the page source that is placed outside of the <form> tag so it's not
included in the request. Let's just assume the author wants us to include the hidden parameter in the request and change the "**u**" value into
"**admin**" instead (assuming the "u" stands for user and the author mentioned ```STOP! ONLY admin can view restricted info (^^,)``` at the front page)

```
<input type="text" name="p" value="" /><input type="submit" value="Check" />
</form><input type="hidden" name="u" value="user" />
```

---

Next just write a simple script to iterate a list of weak passwords and feed it into "**p**"

The breakdown is quite straightworward :

send a POST request to `http://<ip>:<port>/` with parameters "**p**=$wordlist_line" and "**u**=admin" and hash the response body.
All the response body should return the same if the fail but if we hit the jackpot the response body will return the key and the hash will change.

```bash
while IFS='' read -r line || [[ -n "$line" ]]; do
curl -s --user-agent Mozilla/5.0  --data "p=$line&u=admin" http://192.168.0.10:6553/ | sha1sum | cut -d" " -f1 > hash.txt
myhash=$(cat hash.txt);
if [ "$myhash" == "bf2d5e289c65a443ac879b045699b3fa6aee0f4b" ]; then
echo "Testing : $line"
else
echo "YEAH : $line"
exit
fi
done < "$1"
```

---

Run that and feed it with danielmiessler seclist collection of 10k most common password or 500 worst password and you should be golden... Right????

But unfortunately this is not the case, we didn't solve this even after throwing rockyou at it... so what's the catch?

The catch is the simple fact that the question itself is buggy and broken. After the competition, we *ehem* managed to acquire the source code and noticed that there is a check on a parameter named "**password**" before the rest of the parameter is being checked.


Unfortunately on the generated HTML of the index page there is no "**password**" parameter present thus it making it impossible for anyone to solve the question that the time.

One could argue that you need to assume there is some unknown paramters, but just consider the exponential growth in entropy and keyspace here if we need to bruteforce both the actual password and a random non-existant parameter name at the same time...

So we conclude that the question is broken in the first place. Check out the [source code & judge for yourself](https://github.com/najashark/KICTM-2017-CTF-Writeup/blob/master/web/weak/index.php)
