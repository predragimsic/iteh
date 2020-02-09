<?php
    include('dbcon.php');
    include('session.php');
    $photoUpdate;
    $location = $_POST['location'];
    $member_id = $session_id;
    if(isset($_POST['location'])) {
        $photoUpdate = '{"location": "'. $_POST['location'] .'", "member_id":"'. $member_id .'"}';
    }
    
    else {
        $photoUpdate = '{"Error, all data is not provided!"}';
    }
    $url = 'http://localhost:8080/socialnetwork/photo/'. $member_id;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $photoUpdate);

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
            header("Location: profile.php?poruka=$json_objekat->poruka");
    }
?>
