<?php
    $connect = mysqli_connect('localhost', 'petus', 'admin', 'petus'); 

    //Function for cleaning string characters
    function escape($string){
        global $connect;
        return mysqli_real_escape_string($connect, $string);
    }

    //Function to execute a query
    function query($query){
        global $connect;
        return mysqli_query($connect, $query);
    }

    //Function to confirm that the query has returned a result
    function confirm($result){
        global $connect;
        if(!$result){
            die('Query nuk u realizua'.mysqli_error($connect));
        }
    }

    //Function to fetch data from db
    function fetch_data($result){
        return mysqli_fetch_assoc($result);
    }

    //Function for retrieving n.o. rows for a search result
    function row_count($result)
    {
        return mysqli_num_rows($result);
    }
?>