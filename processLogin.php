<?php
    session_start();
    include('connection.php');

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "Select * from users where Username = '".$user."' and Password = '".$pass."'";
    $res = $conn->query($sql);
    $line = $res->fetch_assoc();
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    if (!empty($line)){
        $_SESSION['hasLog'] = 1;

        $_SESSION['type'] = $row['type'];
        $_SESSION['Name'] = $row['Name'];
        echo "1";
    }else{
        echo "Invalid Username or Password";
    }
?>