<?php header('Access-Control-Allow-Origin: *'); ?>

<?php
    //open connection to mysql db
    $connection = mysqli_connect('db33.variomedia.de', 'u53203', '!Dark1024', 'db53203') or die("Error " . mysqli_error($connection));
?>
<?php
    //fetch table rows from mysql db
    $fnr = $_POST["fnr"];
    $name = $_POST["name"];

    $sql = "INSERT INTO tasks (ID, FNR, name, date, state)
            VALUES (NULL, '1', 'test', NOW(), '1')"


    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
?>
<?php
    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
?>
<?php
    echo json_encode($emparray);
?>