<?php
//连接
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) die("连接失败");

//建表
$sql = "
    CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(32) NOT NULL,
    password VARCHAR(32) NOT NULL,
    age int(11),
)";
if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
    echo "0" . $conn->error;
}

//增
$sql = "INSERT INTO users (username, password, age) VALUES ('Andy', '12345', 18)";
if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
    echo "0" . $conn->error;
}
//删
$sql = "DELETE FROM users WHERE id = 2144";
if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
    echo "0" . $conn->error;
}
//改
$sql = "UPDATE users SET age = 22 WHERE id = 2144";
if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
   echo "0" . $conn->error;
}
//查
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - username: " . $row["username"]. " - age: " . $row["age"]. "<br>";
    }
} else {
    echo "0";
}
//关闭
$conn->close();
?>