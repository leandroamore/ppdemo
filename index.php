<?php
try{
$serverName = "<SQLServer>";
$database = "<database>";
$uid = "<dbuser>";
$pwd = "dbpass";

$conn = new PDO("sqlsrv:server = $serverName; Database = $database;", $uid, $pwd);

    // Select Query
    // Executes the query
    $tsql = "SELECT @@Version AS SQL_VERSION";
    $stmt = $conn->query($tsql);

} catch (PDOException $exception1) {
    echo "<h1>Caught PDO exception:</h1>";
    echo $exception1->getMessage() . PHP_EOL;
    echo "<h1>PHP Info for troubleshooting</h1>";
    phpinfo();
}

?>

<h1> Success Results : </h1>

<?php
try {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['SQL_VERSION'] . PHP_EOL;

    }
} catch (PDOException $exception2) {
    // Display errors
    echo "<h1>Caught PDO exception:</h1>";
    echo $exception2->getMessage() . PHP_EOL;
}

unset($stmt);
unset($conn);
?>



