<?php
  $host = "localhost";
  $username = "it57160558";
  $password = "it57160558";
  $db = "it57160558";
  $conn = new mysqli($host,$username,$password,$db);
  $conn->query("set names utf8");

  $category_name = $_POST['category_name'];

  $sql = "SELECT * FROM HMD_word_category where category_name='$category_name'";
  $result = $conn->query($sql);
  $row = $result->fetch_object();
    
  $checkName = $row->category_name;

  echo "$category_name <br>";
  echo "------ <br>";
  echo "$checkName <br>";

    if($category_name != $checkName ){
    	$sql = "INSERT INTO HMD_word_category(category_name)VALUES('" . $category_name . "')";
      	$conn->query($sql);
      	echo "<h1>Insert success</h1>";
    	echo "<meta http-equiv=\"refresh\" content=\"1; url=addWord.php\">";
    }else{
		  echo "<h1>Error Insert</h1>";
		  echo "<meta http-equiv=\"refresh\" content=\"2; url=addWord.php\">";
    }
?>
