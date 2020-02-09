<?php include('dbcon.php'); ?>
<?php include('session.php'); ?>
<?php
	$my_friend_id = $_POST['my_friend_id'];
	$my_id = $session_id;
	$friend= '{"my_friend_id": "'. $my_friend_id .'","my_id": "'.  $session_id .'"}';

		header("Location: index.php");

		$url = 'http://localhost:8080/socialnetwork/friend';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $friend);

		$curl_odgovor = curl_exec($curl);
		curl_close($curl);
		$json_objekat = json_decode($curl_odgovor);

		if (isset($json_objekat)) {
			header("Location: index.php?poruka=$json_objekat->poruka");
		}

		header('location:home.php');

	/*$conn ->query("insert into friends (my_id,my_friend_id) values('$session_id','$my_friend_id')");*/

 	header('location:friends.php'); 
?>