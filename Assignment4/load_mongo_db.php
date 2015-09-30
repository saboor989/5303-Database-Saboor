<?php
/*
###############################################
# Name      : SABOOR AHMED SIDDIQIE
# Class     : CMPS 5303 ADVANCE DATABASE MANAGEMENT SYSTEM
# Date      : 29 SEP 2015
# Program 1 : Load 1000 user data into database table MongoDb
###############################################
*/

// connect
    $m = new MongoClient();

// select a database
    $db = $m->ssiddiqie;

// select a collection (analogous to a relational database's table)
    $collection = $db->random_people;

// fetching the data and loading into the array
    $json = file_get_contents("http://api.randomuser.me/?results=1000");
    $json_array = json_decode($json);

// looping to insert the document into the database.    
for($i=0;$i<sizeof($json_array->results);$i++)
    {
        $collection->insert($json_array->results[$i]);
    }   


?>