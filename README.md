# 3380Final
Final Project for CS3380

Team Members: Kartik Sharma, Xingyun Zhou, Shayne Smither, Youngbin Ha, Jeremiah Wooten

Project Description: An online chat room where a user can make text posts.
                     Threads can be added to posts to be able to sort the posts
                     more easily. Upload times will be available for each post. 
                     Posts are editable. First time users can create a new 
                     username and password.

sql used to create the user table

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;