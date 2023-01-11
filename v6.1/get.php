<?php header('Access-Control-Allow-Origin: *'); ?>

<?php
    //open connection to mysql db
    $connection = mysqli_connect('db33.variomedia.de', 'u53203', '!Dark1024', 'db53203') or die("Error " . mysqli_error($connection));
?>
<?php
    //fetch table rows from mysql db
    $table = $_GET["table"];
    $where = $_GET["where"];

    if ($where){
        $sql = "select * from $table WHERE $where";
    }else{
        $sql = "select * from $table";
    }

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