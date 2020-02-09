<?php
include('dbcon.php');
include('session.php');
$content = $_POST['content'];
$member_id = $session_id;
$date_posted = NOW();

/*$conn->query("insert into post (content,date_posted,member_id) values('$content',NOW(),'$session_id')");*/

$post= '{"member_id": "'. $session_id .'","content": "'.  $content .'","date_posted": "'.  $date_posted .'"}';

header("Location: index.php");

$url = 'http://localhost:8080/socialnetwork/post';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post);

$curl_odgovor = curl_exec($curl);
curl_close($curl);
$json_objekat = json_decode($curl_odgovor);

if (isset($json_objekat)) {
	header("Location: index.php?poruka=$json_objekat->poruka");
}

header('location:home.php');
?>