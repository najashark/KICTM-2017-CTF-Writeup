## rox.exe

**Category:** Binary

**Points:** 200

**Solves:** 2

**Description:**

(No description)

### Write-up

This is the second re challenge, so it's quite simple. during the first analysis, we can see only one hardcoded strings in debugger and try breakpoint on that. 

below is summary of the analysis, here I found out it needs and argument which then it will used as a xor key to decode the flag

![summary](https://github.com/najashark/KICTM-2017-CTF-Writeup/blob/master/medium%20-%20rox/images/1.PNG "summary")

![decrypt](https://github.com/najashark/KICTM-2017-CTF-Writeup/blob/master/medium%20-%20rox/images/2.PNG "decrypt function")



And to solve it, we can create simple script like this with the dump data and brute the key from 0x0 to 0x255:
```python
start = 0x0  # hex literal
end = 0x255

for char in xrange(start, end + 1):
	s = "\x27\x1B\x16\x53\x18\x16\x0A\x53\x1A\x00\x53\x49\x53\x50\x07\x3B\x42\x00\x3A\x09\x46\x06\x23\x40\x21\x36\x47\x46\x0A\x3B\x47\x1B\x12\x3B\x47\x52\x50\x79"
	r = ""
	for i in s:
		r += chr(ord(i) ^ char)
	print char ,r
```

Running the script will produce lot of result, just find something that looks obvious like this:

`The key is : #tH1sIz5uP3RE45yH4haH4!#`

the key to decrypt the flag is `s` if you want to test it with the program.
