**To add a new folder with pictures/videos/files:**

- Using an FTP client (such as FileZilla), transfer a folder to whatever directory you want. For example, transfer "France" folder into "attali/family/"
- Now you can navigate to that page as http://attali.ws/family/France , but it will just list all the files line by line
- Copy the attali/dindex.php file into the new folder (attali/family/France/dindex.php), and now if you refresh the page it'll show the images
- Compress all the images you just uploaded using FILEminimizer and move all the compressed images to a folder called .compressedimg (attali/family/France/.compressedimg/)
- Now refresh the page, the images should load MUCH faster
- If this folder/page should be restricted to only a few users, create a .htaccess file with the following lines (and change the last one)

```
AuthName "Attali and friends only!"
AuthType Basic
AuthUserFile /kunden/homepages/20/d93584634/htdocs/attali/.htpasswd
require user dean ben oriane
```



**Technical overview:**

The root folder (attali/) has the following files:

- ".htaccess" - every folder can have that file, it basically tells the Apache webserver what to do when someone lands on that webpage. The one under attali/ has the following lines:
"DirectoryIndex index.php index.html dindex.php" - this means that on every page we land, the server should look for a index.php file to run, if that's not found then use index.html, if that's not found then use dindex.html
"Options +Indexes" - this means that if none of the above files are found, then instead of showing a "403 - Forbidden" error the page will just list all the files and folders, line by line. This is what you see if you forget to copy the dindex.php file to a new folder
- ".images" folder - stores all the common images used in the site
- ".attalitemplate.php" - this is the important file that does most of the work on every page, that shows all the pictures and has all the logic
- ".htpasswd" - this file stored all the available usernames and their encrypted passwords
- "dindex.php" - this is the file that you need to copy to every new folder you create, it's a pretty simple file that just calls the attalitemplate
- "index.php" - most other folders will use dindex.php, but the home page uses a different file because we want it to look a little different

**.htaccess file:**

In most directories (except for the root directory), it will have the following format, which tells the server which users are allowed

```
AuthName "Attali and friends only!"
AuthType Basic
AuthUserFile /kunden/homepages/20/d93584634/htdocs/attali/.htpasswd
require user ben
```

This tells the server to only let user "ben" view the page, and that his password is encrypted in the "blahblahblah/attali/.htpasswd" file. If you want to allow multiple users in, just list them with a space in between. For example "require user ben dean oriane". If you want to let anybody with a password in, but not someone who doesn't have a username, then use "require valid-user"

**.htpasswd file:**

The file exists only once and it stores all the usernames and passwords that are allowed. When specifying users in the .htaccess file, those users need to exist here. One user per line. Each line has the format "username:encrypted password"
Multiple people/computers can use the same username. To add a new username, go to http://www.htaccesstools.com/htpasswd-generator/ , enter the wanted username and password, and click through the button. Copy the resulting line (username:password) and add it to the .htpasswd file
	
**.dindex.php file:**

You can just copy the file from the root attali/ folder into each new folder, but for reference here is the whole content of the file:

```
<?php
// define some variables that the attalitemplate.php will need
// __DIR__ is something like '/homepages/20/d93584634/htdocs/attali/France/Day 1'
// ROOT will be something like '/homepages/20/d93584634/htdocs/attali/'
$attaliIdx = strpos(__DIR__, 'attali');
$root = substr(__DIR__, 0, $attaliIdx+strlen('attali'));
define(ROOT, $root . '/');
define(IMAGES_DIR, '/.images/');
define(DIR, __DIR__);

// use the generic template that we built
require ROOT . '.attalitemplate.php';
?>
```

**Solving the problem of loading many large images:**

Having 50 images that are all 5MB on a page will load very slowly (all the images will show up line by line, can take a few minutes to see all the images since the browser has to download 250MB). So the attalitemplate script tries to find compressed versions of images inside a .compressedimg folder. For example, if we are under attali/family/France and there is an image called image1.jpg, the script will see if there is an image at attali/family/France/.compressedimg/(opt) image1.jpg. If such an image exists, the page will show this image instead of the original, and it will load MUCH faster. If you click on the image to view or download it, you will still get the original image. Only the thumbnail uses the compressed version. To create compressed images:
- Download a file compression program (such as FILEminimizer)
- make sure the following settings are set:
	- Create new optimized files
	- Add this extension to filename: "(opt)"
	- Insert before filename
	- Keep original image format
	- Allow image to be resized
- Open all the images in a given folder and compress them.
- After compression, the image size should be about 1% of the original size, and an image called "image1.jpg" will  result in "(opt) image1.jpg"
- Move all the compressed images into a folder named ".compressedimg"

**What the attalitemplate script does:**
Looks at all the files and folders that exist in the current directory. It lets you go back to Home, go back one directory up, and go down into all the folders that are in the current directory. It also looks at all the images and shows x of them (not all at once). All the other files that are not images are listed line by line below the images. The home page doesn't use this script, but if you click on the "View all files & folders" on the bottom right of the page then it will behave like this too and you'll see everything under /attali/
If you want to change the options for how many to show per page or what sizes to show, look for "possibleNumPics" or "possibleThumbSizes" in .attalitemplate.php
