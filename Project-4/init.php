<?php
//set timer
ini_set('max_execution_time', 300);


//initialize database by drawing in files
//get into database
 $db_connection = mysql_connect('localhost','root');
 mysql_select_db('daniel',$db_connection);
 
 //create table
  //generate the basic table for words
 $sql_input_query = "CREATE TABLE words(
 Word varchar(30),
 wordNumber int
 )";
 
 mysql_query($sql_input_query,$db_connection);
 
 
 
 
 //create index for the words
 $index = 1;
 
 //open the file
 $file_pointer = fopen("c:/xampp/htdocs/dictionary.txt","r+");
 
 //draw in lines from file
 getLines:
 
 
 
 
 //get the first line
 $line_1 = fgetss($file_pointer, 512);
 $line_1 = rtrim($line_1);
 //check the line
   if(feof($file_pointer)){
 goto exit_program;
 }
 
 
 //insert the values into the database
 $sql_input = "INSERT INTO words VALUES ('$line_1',$index)";
 mysql_query($sql_input,$db_connection) or die ("Invalid insert " . $db_connection->error) ;
 
 
 
 $index++;
 //check if the end of the file is reached
	 goto getLines;
 
 
 exit_program:
 echo "Done";
 
 
 
 

?>