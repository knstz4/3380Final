# 3380Final
Final Project for CS3380

Team Members: Kartik Sharma, Xingyun Zhou, Shayne Smither, Youngbin Ha, Jeremiah Wooten, Ben Thrasher

Project Description: An online chat room where a user can make text posts.
                     Tags can be added to posts to be able to sort the posts
                     more easily. Upload times will be available for each post. 
                     Posts are editable and deletable. First time users can create a new 
                     username and password.

Updated URL for the project: <http://chattafinalproject.epizy.com/Chat/>

sql used to create the users and posts table:

```sql
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY(id)
) 

CREATE TABLE posts(
id INT( 11 ) ,
contentID INT( 100 ) NOT NULL AUTO_INCREMENT ,
content VARCHAR( 255 ) NOT NULL ,
tag VARCHAR( 255 ) NOT NULL ,
uploadTime TIMESTAMP,
PRIMARY KEY ( contentID )
)
```

ERD for the database:
![ERD.png](/images/databaseERD.PNG)

Video demonstration: https://www.youtube.com/watch?v=j-Hm4_2iAoQ
