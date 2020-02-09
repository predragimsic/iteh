<?php
session_start();
if (!isset($_SESSION['id'])){
header('location:index.php');
}
$session_id = $_SESSION['id'];


$session_query = $conn->query("select * from members where member_id = '$session_id'");
$user_row = $session_query->fetch();
$username = $user_row['firstname']." ".$user_row['lastname'];
$image = $user_row['image'];
/*
$url = 'http://localhost:8080/socialnetwork/member/'. $session_id .'.json ';
				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
				curl_setopt($curl, CURLOPT_HTTPGET, true);
		
				$curl_odgovor = curl_exec($curl);
				curl_close($curl);
				$json_objekat = json_decode($curl_odgovor);
$username = $json_objekat->firstname." ".$json_objekat->lastname;
$image = $json_objekat->image;
$role = $json_objekat->role;
*/
?>