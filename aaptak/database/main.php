<?php 
include ('../connection.php');


	$drop = 'DROP TABLE user,user_type,news';
	$conn->query($drop);

//user table
	$usertablesql='CREATE TABLE user (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(250) NOT NULL,
	last_name VARCHAR(250) ,
	email VARCHAR(250) NOT NULL,
	password VARCHAR(250) NOT NULL,
	phone BIGINT(100) NOT NULL,
	status ENUM("0","1") NOT NULL,  -- 0=not active , 1=Active 
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)';
$createUserTable=$conn->query($usertablesql);//creating user table

$user_Typetablesql='CREATE TABLE user_type(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
usertype ENUM("0","1","2") NOT NULL COMMENT"0=user, 1=member, 2=Admin" , 
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)';
$createUserTYPETable=$conn->query($user_Typetablesql);

$news_sql='CREATE TABLE news(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
member_id INT(6) UNSIGNED,
FOREIGN KEY (member_id) REFERENCES user(id) ON DELETE CASCADE,
headline VARCHAR(250) NOT NULL,
content TEXT(5000) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)';
$createnews=$conn->query($news_sql);

$adminsql='INSERT INTO user (first_name,last_name,email,password,phone,status) VALUES("Vinay","Kumar","vinay@gmail.com","vinu","8507450403","2") ';
$admintypesql='INSERT INTO user_type (user_id,usertype) VALUES ("1","2")';
$conn->query($adminsql);
$conn->query($admintypesql);

?>