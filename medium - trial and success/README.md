## trialandsuccess.exe

**Category:** Binary

**Points:** 300

**Solves:** 0

**Description:**

(No description)

### Write-up

This is the third re challenge, so it's quite confusing, lol. We getting to much into the rabbit hole which later found out its all right infront of our eyes. 

below is summary of the analysis, actually we can only use the disassembler to solve this questions and get the pass.

![summary](images/1.png "summary")


And to get the key, we can create simple code which is ripped from ida like this:
```C
#include <stdio.h>
#include <stdint.h>

int main(){
    uint16_t v2 = 0;
    while (!( v2 % 2 && (signed int)v2 >= 50000 && (signed int)v2 >> 12 >= 15 && (v2 & 0xD) == 13 )){
        v2++;
    }
    printf("%hu\n", v2);
}
```

Running the code will produce the key:

`61453`

Put it in the program, and you will get the flag which is `f00df00df00df00d`
