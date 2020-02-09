<?php
include('dbcon.php');
include('session.php');
$location = $_POST['location'];
$member_id = $session_id;

$photo= '{"location": "'. $location .'","member_id": "'.  $member_id .'"}';

header("Location: index.php");

$url = 'http://localhost:8080/socialnetwork/photo';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $photo);

$curl_odgovor = curl_exec($curl);
curl_close($curl);
$json_objekat = json_decode($curl_odgovor);

if (isset($json_objekat)) {
	header("Location: index.php?poruka=$json_objekat->poruka");
}

header('location:photos.php');
?>