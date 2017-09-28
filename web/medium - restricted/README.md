## restricted

**Category:** Web

**Points:** 200

**Solves:** --

**Description:**

(No description)

### Write-up

By opening the web, we are represented with this kind of interface,

![image](https://user-images.githubusercontent.com/2675341/30986622-aa309e64-a4c6-11e7-9294-9bfbb35292e4.png)

By opening the source, we got this kind of HTML code,

```HTML
<!DOCTYPE html>
<html><head><meta charset="UTF-8" /><title>KICTM 2017 CTF - restricted</title></head>
<body>
<p>Read articles from our collection of txt story files</p>
<form method="post">
<select name="f" >
   <option value="charkuehtiow">Char kway teow</option>
   <option value="roticanai">Roti Canai</option>
</select><input type="submit" value="View article" />
</form></body></html>
```

So it tells us that it shows the content by using the `txt` files.

Ok, then how about if we try to open up `roticanai.txt` on the server?

![image](https://user-images.githubusercontent.com/2675341/30986585-86ffe616-a4c6-11e7-93b8-a5a8e339839e.png)

Oh, so the source speaks the truth. Then how to get the flag?

Our team suddenly got a random idea, how about trying to LFI it?

What me mean is, instead of loading `roticanai.txt`, we can to include.. something like index.php?

We can try to do it by changing the `selectbox` parameter value, replacing the default with the file that we want.

![image](https://user-images.githubusercontent.com/2675341/30986611-9dec3a8c-a4c6-11e7-9eb3-185c8924e54a.png)

But then it shows a blank page.. Hmm.

Maybe the ".txt" extension is padded at the end of the filename?

How about adding some null byte to bypass the ".txt" extension?

In C programming language, any string that have null byte, any characters afterward will be automatically skipped. This is because the default convention is C tells us that null byte is an ending of any string.

For example, if we have `index.php%00.txt`, it will become `index.php` because `%00` is a null byte, and `.txt` afterward will be automatically skipped.

So let us try using this null byte way.

![image](https://user-images.githubusercontent.com/2675341/30986599-93194b72-a4c6-11e7-957e-88ed7240d27e.png)

Send the request, and... BOOM!

![image](https://user-images.githubusercontent.com/2675341/30986672-cb319a96-a4c6-11e7-84d0-1ac943f82ce4.png)

Flag is : **1nclud3me1nUrPr4y3rs**