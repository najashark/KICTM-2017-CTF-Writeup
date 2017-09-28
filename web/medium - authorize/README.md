## authorize

**Category:** Web

**Points:** 100

**Solves:** --

**Description:**

(No description)

### Write-up

We're represented with this interface.

![image](https://user-images.githubusercontent.com/2675341/30988130-ef7689e8-a4cb-11e7-85d8-0ce1d407e62b.png)

Owh ok. Let us check the source will ya?

```HTML
<!DOCTYPE html>
<html><head><meta charset="UTF-8" /><title>KICTM 2017 CTF - admin</title></head>
<body><h2><i>user</i> is not authorized to view this page !</h2></body></html>
```

Well nothing fancy.

We also looked up for `/robots.txt` or `/sitemap.xml` but nothing there.

Then we checked the cookie. Where it has,

![image](https://user-images.githubusercontent.com/2675341/30988213-2fe0aafe-a4cc-11e7-9f10-a718129a2c5a.png)

Owh ok, but `_ga` is for Google's Analytic cookie right? So then it must not be it...

...until a hour later, we still have no clue on how to solve this challenge.

Somehow, somehow, we tried to ROT13 the cookie value **erfh**, and then what...

ROT13("erfh") = resu

Something is wrong...

It is **user**! just in the reverse order!

WTF!!?

Then we try to change the value to **admin**, so it must be

**admin** -> **nimda** -> ROT13 -> **avzqn**

![image](https://user-images.githubusercontent.com/2675341/30988383-ddb5a09e-a4cc-11e7-8912-134b54188e66.png)

Then by reloading the page...

![image](https://user-images.githubusercontent.com/2675341/30988467-f1e9b064-a4cc-11e7-86e5-1b29987e1935.png)

WTF?!?

Flag is : **B15kuTTakB0l3M4kaN**