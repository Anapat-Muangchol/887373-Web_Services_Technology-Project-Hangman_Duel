<?php
  $host = "localhost";
  $username = "it57160558";
  $password = "it57160558";
  $db = "it57160558";
  $conn = new mysqli($host,$username,$password,$db);
  $conn->query("set names utf8");

  $word = $_POST['word'];
  //echo $word;
  $category_id = $_POST['category_id'];
  //echo $category_id;
  $length = $_POST['length'];
  //echo $length;

  $sql = "SELECT * FROM HMD_word";
  //echo $sql;
  $index = 0;
  if($word != "all"){
    $sql.=" WHERE word LIKE '".$word."'";
    $index++;
  }elseif($length != "all"){
    $str = "";
    for($i=0;$i<$length;$i++){
      $str.="_";
    }
    $sql.=" WHERE word LIKE '".$str."'";
    $index++;
  }

  if($category_id != "all"){
    if($index == 0){
      $sql.=" WHERE category_id = ".$category_id;
    }else{
      $sql.=" AND category_id = ".$category_id;
    }
    $index++;
  }

  //echo $sql;

  $result = $conn->query($sql);
  $out = "{\"words\":[";
  while($row = $result->fetch_object()){
      if($out!="{\"words\":[")$out.=",";
      $out.=json_encode($row);
  }
  $out.="]}";
  echo $out;
?>