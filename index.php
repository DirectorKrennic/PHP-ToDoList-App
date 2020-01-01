<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo List</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style>

        body {
            font-family: 'Roboto', sans-serif;
        }

        .main-container {
            width: 80vw;
            margin: 0 auto;
            text-align: center;
        }

        table {
            margin: 15px auto;
            width: 60vw;
            text-align: center;
        }  
        
        table tr td {
            padding: 12px;  
            min-width: 80px;            
        }

        .small-button {
            width: 80px;
            height: 32px;
            background-color: blue;
            color: #FFFFDD;
            border-radius: 2px; 
            border: none; 
            cursor: pointer
        }

        a:link {
            text-decoration: none;
            color: black;  
        }

        a:visited {
            color: black;  
        }

        .edit-button {
            background-color: blue;
            color: #FFFFDD;
            padding: 13px; 
        }

        .delete-button {
            background-color: #DC3545;
            padding: 13px; 
        }

        .button-div {
            display: flex;
            flex-direction: row;
        }

        input[type="text"] {
                margin: 6px; 
                width: 260px;
                height: 32px;
                padding: 3px                
        } 

    </style>
</head>
<body>
    <?php require_once 'process.php'; ?>
    <div class="main-container">
        <h2>ToDo List App</h2>
    <!--Connect to Database to display records -->
    <?php
         $servername = 'localhost';
         $username = 'root';
         $password = '';
         $databasename = 'mydatabase';
     
         //Creating a connection to database
         $connection = mysqli_connect($servername, $username, $password, $databasename);

         $sql = "SELECT * FROM todo_table";//set up our query 
         $result = mysqli_query($connection, $sql); //store the result of our query into the $result 
         $rowCount = mysqli_num_rows($result); //Method returns to us the number of rows -> $rowCount

    ?>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['todo_title'] ?></td>
                <td><?php echo $row['todo_description'] ?></td>
                <td><?php echo $row['todo_status'] ?></td>
                <td><?php echo $row['todo_date'] ?></td>
                <td class="button-div">
                    <a href="index.php?edit=<?php echo $row['id'];?>" class="edit-button">Edit</a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>" class="delete-button">Delete</a>
                </td>
            </tr>
            <?php endwhile;?>            
            </table>
        </div>
        

        <div class="form-container">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="text" placeholder="Enter task title" name="title" value="<?php echo $title; ?>"/><br /> 
                <input type="text" placeholder="Enter task description" name="description" value="<?php echo $description; ?>" /><br />  
                <input type="text" placeholder="Status: i.e Pending/Done" name="status" value="<?php echo $status; ?>"/><br /> 
                <input type="text" placeholder="DD/MM/YYYY" name="date" value="<?php echo $date;  ?>" /><br /> 
                <?php
                    if($update==true):
                ?>
                <input type="submit" value="Update" name="update" class="small-button"/>
                <?php else: ?> 
                <input type="submit" value="Save" name="submit" class="small-button"/>
                <?php endif; ?>
            </form>
        </div> 
    </div>
</body>
</html>