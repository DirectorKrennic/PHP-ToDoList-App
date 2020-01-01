<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $databasename = 'mydatabase';

    //Creating a connection to database
    $connection = mysqli_connect($servername, $username, $password, $databasename);

    //Check if connection was successful or not 
    if(!$connection){
        die ('Connection unsuccessful :'.mysqli_connect_error());
    }

    $id = 0; 
    $update = false;
    $title = '';
    $description = '';
    $status = '';
    $date = '';

    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $date = $_POST['date'];

        $sql = "INSERT INTO todo_table (todo_title, todo_description, todo_status, todo_date) VALUES ('$title', '$description', '$status', '$date')";

        //Check if inserting data was successful
        if(mysqli_query($connection, $sql)){
            echo '';
        }else{
            echo 'Error: '.$sql.mysqli_error($connection);
        }

        header('location: index.php');
    }

    //DELETE
    if(isset($_GET['delete'])){

        $id = $_GET['delete'];
        $sql = "DELETE FROM todo_table WHERE id='$id'";
        //Execute SQL query 
        $deleteQuery = mysqli_query($connection, $sql);
        header('location: index.php');
    }

    //EDIT Button
    if(isset($_GET['edit'])){

        $id = $_GET['edit'];
        $update = true;
        $result = $connection->query("SELECT * FROM todo_table WHERE id=$id");  
        
        if(count($result)==1){
            $row = $result->fetch_array();
            $title = $row['todo_title'];
            $description = $row['todo_description'];
            $status = $row['todo_status'];
            $date = $row['todo_date'];


        }
    }

    //UPDATE
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $date = $_POST['date'];

        $sql = "UPDATE todo_table SET todo_title='$title', todo_description='$description', todo_status='$status', todo_date='$date' WHERE id='$id'";
        $updateQuery = mysqli_query($connection, $sql); //executed our SQL query 
        if(!$updateQuery){
            echo 'Error :'.$sql.mysqli_error($connection);
        }
        header('location: index.php');
    }

?> 