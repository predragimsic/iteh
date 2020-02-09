<?php
include('dbcon.php');
$get_id = $_GET['member_id'];

$url = 'http://localhost:8080/socialnetwork/member/'. $get_id;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

    $curl_response = curl_exec($curl);
    curl_close($curl);
    $json_object = json_decode($curl_response);

    if (isset($json_object)) {
            header("Location: removeUpdate.php?poruka=$json_object->poruka");
    }

?>