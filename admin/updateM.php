<?php
  
    $memberUpdate;
    $member_id = $_GET['member_id'];
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['gender']) && isset($_POST['username']) && isset($_POST['password']) ) {
        $memberUpdate = '{"firstname": "'. $_POST['firstname'] .'","lastname": "'. $_POST['lastname'] .'", "gender":"'. $_POST['gender'] .'", "username":"'. $_POST['username'] .'", "password":"'. $_POST['password'] .'"}';
    }
    else {
        $memberUpdate = '{"Error, all data is not provided!"}';
    }
    $url = 'http://localhost:8080/socialnetwork/member/'. $member_id;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $memberUpdate);

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
            header("Location: removeUpdate.php?poruka=$json_objekat->poruka");
    }
?>
