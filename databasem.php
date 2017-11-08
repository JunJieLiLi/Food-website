<?php

//This file is used for database maintain

//uncomment this block to connect to MUN database
$servername = "mysql.cs.mun.ca";
$username = "cs3715_bz1134";
$password = "bluegreen09";


//uncomment this block to connect to LOCAL database

/* $servername = "localhost";
$username = "root";
$password = "root"; */


// Create connection & Check connection
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";


//select database
$databasename = "cs3715_bz1134";
mysqli_select_db($conn, $databasename);


//Create table UserInfomation:

/* $sql = "create table UserInfomation (userid int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       username varchar(20) NOT NULL, email varchar(50) NOT NULL, password CHAR(128) NOT NULL, reg_date TIMESTAMP)";

if (mysqli_query($conn, $sql)) {
    echo "Table UserInfomation created successfully";
} else {
    echo "Error creating table: " . $conn->error;
} */


//insert test_user information

/* $sql="INSERT INTO UserInfomation VALUES(1, 'test_user', 'test@example.com', 'somepassword', 2016-03-18)";

if (mysqli_query($conn, $sql)) {
    echo "test_user infomation inserted successfully";
} else {
    echo "Error insert: " . $conn->error;
} */


//try to do query

/* $sql = "select * from UserInfomation where userid = 1";
$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["userid"]. " - Name: " . $row["username"]. " " . $row["password"]. ", reg_date " .$row["reg_date"]."<br>";
    }
} else {
    echo "0 results";
} */

//creat table login_attempts

/* $sql = "CREATE TABLE login_attempts (user_id INT(10) NOT NULL, time VARCHAR(30) NOT NULL)";
if (mysqli_query($conn, $sql)) {
    echo "Table login_attempts created successfully";
} else {
    echo "Error creating table: " . $conn->error;
} */	

//update database

/* $sql = "UPDATE UserInfomation SET password='\$2y\$10\$IrzYJi10j3Jy/K6jzSLQtOLif1wEZqTRQoK3DcS3jdnFEhL4fWM4G' WHERE userid=1";
if (mysqli_query($conn, $sql)) {
    echo "Table updated successfully";
} else {
    echo "Error creating table: " . $conn->error;
}*/

$sql = "select * from UserInfomation";
$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<br/><br/>UserInfomation<br/><br/>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["userid"]. "<br>";
		echo "email: " . $row["email"]. "<br>";
		echo " - Name: " . $row["username"]. "<br>";
		echo "pwd:" . $row["password"]."<br>";
		echo "salt " .$row["salt"]."<br><br/>";
    }
} else {
    echo "0 results in UserInfomation";
} 

/* $sql = "ALTER TABLE UserInfomation DROP COLUMN reg_date";
if (mysqli_query($conn, $sql)) {
    echo "reg_date deleted successfully ";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "ALTER TABLE UserInfomation ADD salt char(128) NOT NULL";
if (mysqli_query($conn, $sql)) {
    echo "Salt added successfully ";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "UPDATE UserInfomation SET password='00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', 
salt='f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef'
WHERE userid=1";
if (mysqli_query($conn, $sql)) {
    echo "password updated successfully ";
} else {
    echo "Error creating table: " . $conn->error;
} */

/* $sql = "INSERT INTO login_attempts (user_id, time) VALUES(1, '1385995353'),(1, '1386011064')";
if (mysqli_query($conn, $sql)) {
    echo "login_attempts updated successfully ";
} else {
    echo "Error creating table: " . $conn->error;
} */


//Create table recipe:

/* $sql = "create table recipe (article_id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       title varchar(70) NOT NULL, user_id int(10) NOT NULL, file CHAR(144) NOT NULL, 
	   img_directory varchar(144), creat_date TIMESTAMP)";

if (mysqli_query($conn, $sql)) {
    echo "Table recipe created successfully";
} else {
    echo "Error creating table: " . $conn->error;
} */

//Create table comments:

/* $sql = "create table comments (comment_id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
article_id int(10), user_id int(10) NOT NULL, comment_content VARCHAR(144) NOT NULL, comment_date TIMESTAMP)";

if (mysqli_query($conn, $sql)) {
    echo "Table comment created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}  */

//alter table recipe column file name to recipe_content and change datatype:
/* $sql = "ALTER TABLE recipe CHANGE COLUMN recipe_content recipe_content VARCHAR(55000) NOT NULL";
if (mysqli_query($conn, $sql)) {
    echo "<br><br>recipe updated successfully, recipe_content changed <br><br>";
} else {
    echo "Error creating table: " . $conn->error;
} */

//show all content in table recipe
$sql = "select * from recipe";
$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<br/><br/>recipe<br/><br>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "article_id: " . $row["article_id"]."<br>";
		echo " - title: " . $row["title"]. "<br>";
		echo " created by: " . $row["user_id"]."<br>";
		//echo  "content: " .$row["recipe_content"]."<br>";
		echo "img_directory:" .$row["img_directory"]. "<br>";
		echo "creat_date: ".$row["creat_date"]."<br><br>";
    }
} else {
    echo "0 results in recipe";
} 



/* $sql = "SHOW COLUMNS FROM recipe";
$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
foreach($row as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";}
}
}else{
		echo "error";
	} */

/* //create table rating	
$sql = "CREATE TABLE rating (article_id int(10) PRIMARY KEY NOT NULL,
        user_id int(10) PRIMARY KEY NOT NULL, simplicity int(1) NOT NULL , funny_rate int(1) NOT NULL)";

if (mysqli_query($conn, $sql)) {
    echo "Table rating created successfully";
} else {
    echo "Error creating table: " . $conn->error;
} */
	
//create table CookingTime	
/* $sql = "CREATE TABLE CookingTime (ctime_id int(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		article_id int(10) NOT NULL, user_id int(10) NOT NULL, time int(10) NOT NULL)";

if (mysqli_query($conn, $sql)) {
    echo "Table CookingTime created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}	 */
	
$sql = "select * from CookingTime";
$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo "<br/><br/>CookingTime<br><br>";
    while($row = mysqli_fetch_assoc($result)) {
		
        echo "article_id: " . $row["article_id"]."<br>";
		echo " user_id: " . $row["user_id"]. "<br>";
		echo " time: " . $row["time"]."<br><br>";
		
    }
} else {
    echo "0 results in CookingTime";
} 	

//add a column ingredients to table recipe
/* $sql = "ALTER TABLE recipe ADD ingredients varchar(5000)";
if (mysqli_query($conn, $sql)) {
    echo "<br><br>recipe updated successfully, ingredients added <br><br>";
} else {
    echo "Error creating table: " . $conn->error;
} */



//print "MySQL server version: " . mysql_get_server_info();
$conn->close();
//MySQL server version: 5.5.40-log
?>