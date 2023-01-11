<?php header('Access-Control-Allow-Origin: *'); ?>

<?php
    //open connection to mysql db
    $connection = mysqli_connect('db33.variomedia.de', 'u53203', '!Dark1024', 'db53203') or die("Error " . mysqli_error($connection));
?>
<?php


    //fetch table rows from mysql db

    $tasks = mysqli_query($connection,
        "SELECT tasks.ID, tasks.date, GROUP_CONCAT(taskscustomers.customerid) AS customers
        FROM tasks
        JOIN taskscustomers
        ON tasks.ID = taskscustomers.taskid
        JOIN peoples
        ON taskscustomers.customerid = peoples.ID
        GROUP BY tasks.ID"
        ) or die("Error in Selecting " . mysqli_error($connection));

?>
<?php
    //create an array
    $tasks_array = array();
    while($row = mysqli_fetch_assoc($tasks))
    {
        $tasks_array[] = $row;
    }
?>
<?php
    echo json_encode($tasks_array);
?>