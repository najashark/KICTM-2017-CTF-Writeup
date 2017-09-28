## changeme.bin

**Category:** Crypto

**Points:** 100

**Solves:** unknown

**Description:**

(No description)

### Write-up

This is the only crypto challenge, so it's quite simple. during the first analysis, we can see only base64 strings

```
SW0gd2pmbGJpc2p1bHRmLCB1IHpkdnpicGJkYnBpbSB3cGx0eGogcHogdSBoeGJ0aXEgaXIgeG1=
3aXFwbXMgdmYgYXRwd3QgZG1wYnogaXIgbG51cG1ieGViIHVqeCBqeGxudXd4cSBhcGJ0IHdwbH=
R4amJ4ZWIsIHV3d2lqcXBtcyBiaSB1IHJwZXhxIHpmemJ4aDsgYnR4ICJkbXBieiIgaHVmIHZ4I=
HpwbXNueCBueGJieGp6IChidHggaGl6YiB3aWhoaW0pLCBsdXBqeiBpciBueGJieGp6LCBianBs=
bnhieiBpciBueGJieGp6LCBocGViZGp4eiBpciBidHggdXZpY3gsIHVtcSB6aSByaWpidC4gVHR=
4IGp4d3hwY3hqIHF4d3BsdHhqeiBidHggYnhlYiB2ZiBseGpyaWpocG1zIGJ0eCBwbWN4anp4IH=
pkdnpicGJkYnBpbS4gVHR4IHJudXMgdW5uIG5pYXhqd3V6eCBpciAiemR2emJwYmRicGltendwb=
HhqdWp4eHV6Zm5pbiIuIEtkeHRicGlhIGF1eiB0eGp4Lg=3D=3D
```
decode all the strings produce some readable strings.

For information this base64 called `Quote Printables` and there is a plugins inside notepad++, decode that you can get this long base64 strings.

```
SW0gd2pmbGJpc2p1bHRmLCB1IHpkdnpicGJkYnBpbSB3cGx0eGogcHogdSBoeGJ0aXEgaXIgeG13aXFwbXMgdmYgYXRwd3QgZG1wYnogaXIgbG51cG1ieGViIHVqeCBqeGxudXd4cSBhcGJ0IHdwbHR4amJ4ZWIsIHV3d2lqcXBtcyBiaSB1IHJwZXhxIHpmemJ4aDsgYnR4ICJkbXBieiIgaHVmIHZ4IHpwbXNueCBueGJieGp6IChidHggaGl6YiB3aWhoaW0pLCBsdXBqeiBpciBueGJieGp6LCBianBsbnhieiBpciBueGJieGp6LCBocGViZGp4eiBpciBidHggdXZpY3gsIHVtcSB6aSByaWpidC4gVHR4IGp4d3hwY3hqIHF4d3BsdHhqeiBidHggYnhlYiB2ZiBseGpyaWpocG1zIGJ0eCBwbWN4anp4IHpkdnpicGJkYnBpbS4gVHR4IHJudXMgdW5uIG5pYXhqd3V6eCBpciAiemR2emJwYmRicGltendwbHhqdWp4eHV6Zm5pbiIuIEtkeHRicGlhIGF1eiB0eGp4Lg==
```
decode it will produce this
```
Im wjflbisjultf, u zdvzbpbdbpim wpltxj pz u hxbtiq ir xmwiqpms vf atpwt dmpbz ir lnupmbxeb ujx jxlnuwxq apbt wpltxjbxeb, uwwijqpms bi u rpexq zfzbxh; btx "dmpbz" huf vx zpmsnx nxbbxjz (btx hizb wihhim), lupjz ir nxbbxjz, bjplnxbz ir nxbbxjz, hpebdjxz ir btx uvicx, umq zi rijbt. Ttx jxwxpcxj qxwpltxjz btx bxeb vf lxjrijhpms btx pmcxjzx zdvzbpbdbpim. Ttx rnus unn niaxjwuzx ir "zdvzbpbdbpimzwplxjujxxuzfnin". Kdxtbpia auz txjx.
```

It's looks like some cipher
And to solve it, we can use online cipher solver like https://quipqiup.com/ :

After few second you will get the decipher paragraph:

```
In cryptography, a substitution cipher is a method of encoding by which units of plaintext are replaced with ciphertext, according to a fixed system; the "units" may be single letters (the most common), pairs of letters, triplets of letters, mixtures of the above, and so forth. The receiver deciphers the text by performing the inverse substitution. The flag all lowercase of "substitutionsciperareeasylol". Kuehtiow was here.
```

which is a quote from https://en.wikipedia.org/wiki/Substitution_cipher

The flag is `substitutionsciperareeasylol`
