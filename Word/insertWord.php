<?php
  $host = "localhost";
  $username = "it57160558";
  $password = "it57160558";
  $db = "it57160558";
  $conn = new mysqli($host,$username,$password,$db);
  $conn->query("set names utf8");

  $NameUp = strtoupper($_POST['word']);

  $sql = "SELECT * FROM HMD_word where word='$NameUp'";
  $result = $conn->query($sql);
  $row = $result->fetch_object();
    
  $checkName = $row->word;
  $checkCategory = $row->category_id;

  echo "$NameUp <br>";
  echo "------ <br>";
  echo "$checkName / category: $checkCategory <br>";

    if(($NameUp != $checkName) && ($Category != $checkCategory)){
    	$sql = "INSERT INTO HMD_word(word,translation,difficulty_level,category_id)VALUES('" . $NameUp . "','" . $_POST['translation'] . "','" . $_POST['difficulty_level'] . "','" . $_POST['category_id'] . "')";
      	$conn->query($sql);
      	echo "<h1>Insert success</h1>";
    	echo "<meta http-equiv=\"refresh\" content=\"1; url=addWord.php\">";
    }else{
		  echo "<h1>Error Insert</h1>";
		  echo "<meta http-equiv=\"refresh\" content=\"2; url=addWord.php\">";
    }
?>
