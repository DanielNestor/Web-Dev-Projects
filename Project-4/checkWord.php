<?php
	$db = new mysqli('localhost','root','','daniel');
 if ($db->connect_error):
       die ("Could not connect to db " . $db->connect_error);
    endif;
	
   
   $sent_word = $_POST['foo'];
   //echo "sent Word: $sent_word";
   

   $query = "select wordNumber from Words where Word = '$sent_word'";
     $result = $db->query($query);
   $rows = $result->num_rows;
   
         header('Content-type: text/xml');
   
   if ($rows >= 1):
      echo "<?xml version='1.0' encoding='utf-8'?>";
      echo "<Word>";
      $row = $result->fetch_array();
      $ans = $row["wordNumber"];
      echo "<value>$ans</value>";
      echo "</Word>";
   else:
       echo "<?xml version='1.0' encoding='utf-8'?>";
      echo "<Word>";
      $row = $result->fetch_array();
      $ans = $row["wordNumber"];
      echo "<value>-1</value>";
      echo "</Word>";
   endif;
  

?>