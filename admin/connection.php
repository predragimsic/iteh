<?php
class Connection
{
	static $conn;
}

$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "socialdb";

Connection::$conn = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if (Connection::$conn->connect_errno) {
    printf("Connection failed: %s\n", Connection::$conn->connect_error);
    exit();
}
Connection::$conn->set_charset("utf8");

?>
