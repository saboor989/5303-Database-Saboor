<?php
/*
###############################################
# Name      : SABOOR AHMED SIDDIQIE
# Class     : CMPS 5303 ADVANCE DATABASE MANAGEMENT SYSTEM
# Date      : 2 SEP 2015
# Program 1 : Load 1000 user data into database table "Users"
###############################################
*/
//Getting the hostname , username, password, dbname
//$config_json=file_get_contents("/home/ssiddiquie/public_html/assignment1/5303-Database-Saboor/db.config.json");
//$config_json=file_get_contents("./5303-Database-Saboor/db.config.json");
$config_json=file_get_contents("/home/ssiddiquie/5303-Database-Saboor/db.config.json");

$j=json_decode($config_json);
//print_r($j);

$db=new mysqli ($j->host,$j->user,$j->password,$j->dbname);

//Connecting database via providing localhost, username, password ,and database name
//$db = new mysqli('localhost', '********', '*******','******');
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$json = file_get_contents("http://api.randomuser.me/?results=100");
//print_r($json);
$json_array = json_decode($json);
//print_r($json_array->results);
for($i=0;$i<sizeof($json_array->results);$i++)
{
	$gender=$json_array->results[$i]->user->gender;
	$title=$json_array->results[$i]->user->name->title;
	$first=$json_array->results[$i]->user->name->first;
	$last=$json_array->results[$i]->user->name->last;
	$street=$json_array->results[$i]->user->location->street;
	$city=$json_array->results[$i]->user->location->city;
	$state=$json_array->results[$i]->user->location->state;
	$zip=$json_array->results[$i]->user->location->zip;
	$email=$json_array->results[$i]->user->email;
	$username=$json_array->results[$i]->user->username;
	$password=$json_array->results[$i]->user->password;
	$dob=$json_array->results[$i]->user->dob;
	$phone=$json_array->results[$i]->user->phone;
	$picture=$json_array->results[$i]->user->picture->medium;    
    //checking the email if present in the table
    //echo "'$dob'"."\n";
    $sql = "
		SELECT *
		FROM Users
		WHERE email = '{$email}'
		";
	//echo $sql1."\n";		
    //killing the sql with an error
	if(!$result = $db->query($sql))
    {
		die('There was an error running the query [' . $db->error . ']');
	}
    //The result, if number of rows is 0
	if($result->num_rows == 0)
	{
        //query to insert the data in the table
        $sql1 = "
			INSERT INTO Users
			VALUES('$gender','$title','$first','$last','$street','$city','$state','$zip','$email','$username','$password','$dob','$phone','$picture')";
		#echo $sql1."\n";	
        //throwing the error
		if(!$result1 = $db->query($sql1))
		{
			echo('['.$db->error.']');
        }
    }
}