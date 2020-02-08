<?php
include('dbcon.php');
$username = $_POST['username'];
$password = $_POST['password'];

$query = $conn->query("select * from members where username = '$username' and password = '$password'");
$count = $query->rowcount();
$row = $query->fetch();

if ($count > 0) {
    session_start();
    
    $_SESSION['id'] = $row['member_id'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['username'] = $row['username'];

    

    if ($_SESSION['role'] == 'admin') {
        header('Location: admin/homeAdmin.php');
    } else {
        header('Location:home.php');
    }
} else {
    header('location:index.php');
}
?>

/*
$urlZaSB = 'http://localhost/projekat/login.json';
                  $curlZaSB = curl_init($urlZaSB);
                  curl_setopt($curlZaSB, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($curlZaSB, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                  curl_setopt($curlZaSB, CURLOPT_HTTPGET, true);
                  $curl_odgovorSB = curl_exec($curlZaSB);
                  curl_close($curlZaSB);
                  $odgovorOdServisa = json_decode($curl_odgovorSB);


if (!$odgovorOdServisa.is_null()) {
    session_start();
    
    $_SESSION['id'] = $odgovorOdServisa->member_id;
    $_SESSION['role'] = $odgovorOdServisa->role;
    $_SESSION['username'] =$odgovorOdServisa->username;

    

    if ($_SESSION['role'] == 'admin') {
        header('Location: admin/homeAdmin.php');
    } else {
        header('Location:home.php');
    }
} else {
    header('location:index.php');
}
?>*/