<?php
include('dbcon.php');
include('session.php');

$message;
$friend_id  = $_POST['friend_id'];
$my_message  = $_POST['my_message'];
$sender_id = $session_id;


$conn->query("insert into message(reciever_id,content,date_sended,sender_id) values('$friend_id','$my_message',NOW(),'$session_id')");

/*
if(isset($_POST['sender_Id']) && isset($_POST['receiver_id']) && isset($_POST['content']) && isset($_POST['date_sended']) ) {
	$message= '{"sender_id": "'. $sender_id .'","receiver_id": "'.  $friend_id .'","content": "'.  $my_message .'","date_sended": "'.  NOW() .'"}';
}
else{
	$message = '{"Error, all data is not provided!"}';
}

/*
$url = 'http://localhost:8080/socialnetwork/message';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $message);

$curl_odgovor = curl_exec($curl);
curl_close($curl);
$json_objekat = json_decode($curl_odgovor);
*/
?>
<script>
    alert('Message Sent');
</script>
<script>
    window.location = 'message.php';
</script>