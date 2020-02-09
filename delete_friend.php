<?php
include('dbcon.php');
$id = $_GET['id'];
	/*
	$conn ->query("delete from friends where friends_id = '$id'");
	*/
	
    $url = 'http://localhost:8080/socialnetwork/friends/'. $id;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
            header("Location: friends.php?poruka=$json_objekat->poruka");
    }

?>