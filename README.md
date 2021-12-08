# mini_hackathon
Project fot the Mini_hackathon  /theme=recycling

Project is a site prototype, it uses one python script for decoding barcode images. Then it searches DataBase specified in inc/db.inc.php for match, if the DB has no info, it asks user for object info and in which recycle bin type it belongs. Saves to DB.

Currently using xamp as a database but it's hostable on AWS or other cloud. (of course you can host it locally but the security measures have to be tighten)


1. You can;t upload an image if the name is already taken, you have to either remove image, change image name or somthing
FOR MORE ctrl+f in functions.inc.py : // FILE NAME HANDLING PROBLEM

2. Security- A lot of Security issues e.g: (for example) 
- no ht.ascess
- visible file names

3. cookies?
