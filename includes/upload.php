<?php

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();
?>

<!DOCTYPE html>
<head>

</head>

<body> 
<?php
$now = date('Y-m-d H:i:s');
$post_title =$_POST['title'];
//$filetext = $_POST['post_area'];

$filetext = '';
foreach($_POST as $x => $x_value) {
	//echo $x." & ".$x_value."<br>";
	if (substr($x,0,-1) == 'Step'){
		$filetext .= "<p>".substr($x,0,-1)." ".substr($x,-1)."</p>"."<p>".$x_value."</p>";
		//echo "filetext: ".$filetext."<br>";
	}
}



$target_dir = "/images/upload/";
$array = explode('.', $_FILES["fileToUpload"]["name"]);
$extension = end($array);
$str = $_SESSION['username'].$now;
$img_name = md5($str);
$img_dir = $target_dir.substr($img_name,0,5)."/";
$new_img_name = $img_dir.$img_name.'.'.$extension;
$target_file = "..".$new_img_name;
$uploadOk = 1;

echo "extension: ".$extension."<br>";
echo "str: ".$str."<br>";
echo "img_name: ".$img_name."<br>";
echo "img_dir: ".$img_dir."<br>";
echo "new_img_name: ".$new_img_name."<br>";
echo "target_file: ".$target_file."<br>";


$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		
		echo $post_title;
		echo $filetext;
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";		
		echo "The new  file name ". $new_img_name. " has been uploaded.";
		
    } else {
        echo "Sorry, there was an error uploading your file.";
		//header('Location: ../error.php?err=UPLOAD IMG ERROR');
    }
}

// prepare and bind MySql query
/* $prep_stmt = "INSERT INTO recipe (title, user_id, recipe_content, img_directory, creat_date) VALUES (?, ?, ?, ?, ?)";
if ($insert_stmt = $mysqli->prepare($prep_stmt)){
	$insert_stmt->bind_param("sisss", $post_title, $_SESSION['user_id'], $filetext, $new_img_name, $now );
	if (! $insert_stmt->execute()) {
        header('Location: ../error.php?err=Post recipe failure: INSERT');
        exit();
            }
		} */

//$insert_stmt->execute();
/* header('Location: ./recipe_content.php');
exit(); */


//find article_id
/* if ($stmt = $mysqli->prepare("SELECT article_id FROM recipe WHERE user_id=? AND creat_date=?")) {
        $stmt->bind_param("is", $_SESSION['user_id'], $now);
        $stmt->execute();
		$stmt->bind_result($article_id);
		while ($stmt->fetch()) {
        header("Location: ../recipe_content.php?article_id=".$article_id);
		}
		
        }
    else {
        // Could not create a prepared statement
        header("Location: ../error.php?err=Database error: cannot prepare statement");
        exit();
    }
	
exit(); */
		
?>
</body>
</html>