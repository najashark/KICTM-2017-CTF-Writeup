## simple.exe

**Category:** Binary

**Points:** 100

**Solves:** unknown

**Description:**

(No description)

### Write-up

This is the first re challenge, so it's fairly simple. during the first analysis, we can see it uses xor to before compare to the encrypted flag. 

Below is summary of the algorithm

![image](https://user-images.githubusercontent.com/2675341/30988879-59d32560-a4ce-11e7-9578-2d841c36c2fc.png)



And to solve it, we can create simple script like this with the dump data and xor key:
```python
from itertools import cycle

def xor_strings(s,t):
    """xor two strings together"""
    return "".join(chr(ord(a)^ord(b)) for a,b in zip(s,t))
	
s = "\x4D\xEC\x34\x5A\x2A\xB5\x74\x0C\x75\xF3\x66\x51\x63\xC5\x69\x1B\x78\xB1\x7E\x7F\x2D\xFD\x53\x18\x6D\xEC\x36\x66\x2C\xC8\x37\x64"
r = "\x19\x84\x07\x28"
r = cycle(r) 
c1 = xor_strings(s,r)
#print repr(c1) # To see the unprintable bytes as escape codes
print c1
```

Running the script will produce the flag

`Th3r31s$lwayzAn3a5yW4yT0th1N5L0L`
