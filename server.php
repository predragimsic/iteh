<?php
	require 'flight/Flight.php';
	require 'jsonindent.php';

	Flight::register('db', 'Database', array('socialdb'));
	$json_podaci = file_get_contents("php://input");
	Flight::set('json_podaci', $json_podaci);

	Flight::route('GET /member/@member_id.json', function($member_id) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$db->select(" members ", " * ",  "", "", "", "members.member_id = ". $member_id, null);
		$red = $db->getResult()->fetch_object();
		$json_niz = json_encode($red,JSON_UNESCAPED_UNICODE);
		echo indent($json_niz);
		return false;
	});

	Flight::route('GET /login.json', function($username, $password) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$db->select(" members ", " * ",  " ", " ", " ", "members.username = ". $username . " and members.password = " . $password, null);
		$red = $db->getResult()->fetch_object();
		$json_niz = json_encode($red,JSON_UNESCAPED_UNICODE);
		echo indent($json_niz);
		return false;
	});
	
	

	Flight::route('PUT /photo/@member_id', function($member_id) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
			$odgovor["poruka"] = "Data is not provided!";
			$json_odgovor = json_encode($odgovor);
			echo $json_odgovor;
		}
		else {
			if(!property_exists($podaci,'image') || !property_exists($podaci,'member_id')) {
				$odgovor["poruka"] = "Data is not correct!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				if($db->update("members", $member_id, array('image'),array($podaci->image))) {
					$odgovor["poruka"] = "Successfully updated!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Error!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});
	Flight::route('GET /friend.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
 
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		
			$db->select(" friends ", ' * ', "members", "my_id", "member_id", "friends.my_friend_id = '$session_id'", null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"friend":'. indent($json_niz) .' }';
			return false;
	});

	Flight::route('GET /message.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
 
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		
			$db->select(" message ", ' * ', "members", "sender_id", "member_id", "reciever_id = '$session_id'", null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"message":'. indent($json_niz) .' }';
			return false;
	});
	Flight::route('PUT /member/@member_id', function($member_id) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
			$odgovor["poruka"] = "Data is not provided!";
			$json_odgovor = json_encode($odgovor);
			echo $json_odgovor;
		}
		else {
			if(!property_exists($podaci,'firstname') || !property_exists($podaci,'lastname') || !property_exists($podaci,'gender')|| !property_exists($podaci,'username')|| !property_exists($podaci,'password')) {
				$odgovor["poruka"] = "Data is not correct!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				if($db->update("members", $member_id, array('firstname','lastname','gender','username','password'),array($podaci->firstname, $podaci->lastname, $podaci->gender, $podaci->username, $podaci->password))) {
					$odgovor["poruka"] = "Successfully updated!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Error!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});

	


	Flight::route('POST /member', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
		$odgovor["poruka"] = "Data is not forwarded!";
		$json_odgovor = json_encode($odgovor);
		echo $json_odgovor;
		return false;
		}
		else {
			if(!property_exists($podaci,'member_id')) {
				$odgovor["poruka"] = "Data is not correct!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				$podaci_query = array();
				foreach($podaci as $k=>$v) {
					$v = "'". $v ."'";
					$podaci_query[$k] = $v;
				}

				if($db->insert("members","firstname, lastname, gender, username, password",array($podaci_query['firstname'], $podaci_query['lastname'], $podaci_query['gender'], $podaci_query['username'], $podaci_query['password']))) {
					$odgovor["poruka"] = "Successfully saved! ";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Already saved!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});

	Flight::route('POST /photo', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
		$odgovor["poruka"] = "Data is not forwarded!";
		$json_odgovor = json_encode($odgovor);
		echo $json_odgovor;
		return false;
		}
		else {
			if(!property_exists($podaci,'photos_id')) {
				$odgovor["poruka"] = "Data is not correct!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				$podaci_query = array();
				foreach($podaci as $k=>$v) {
					$v = "'". $v ."'";
					$podaci_query[$k] = $v;
				}

				if($db->insert("photos","location, member_id",array($podaci_query['location'], $podaci_query['member_id']))) {
					$odgovor["poruka"] = "Successfully saved! ";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Already saved!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});

	Flight::route('POST /post', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
		$odgovor["poruka"] = "Data is not forwarded!";
		$json_odgovor = json_encode($odgovor);
		echo $json_odgovor;
		return false;
		}
		else {
			if(!property_exists($podaci,'post_id')) {
				$odgovor["poruka"] = "Data is not correct!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				$podaci_query = array();
				foreach($podaci as $k=>$v) {
					$v = "'". $v ."'";
					$podaci_query[$k] = $v;
				}

				if($db->insert("post","member_id, content, date_posted",array($podaci_query['member_id'], $podaci_query['content'], $podaci_query['date_posted']))) {
					$odgovor["poruka"] = "Successfully saved! ";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Already saved!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});

	Flight::route('POST /friend', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
		$odgovor["poruka"] = "Data is not forwarded!";
		$json_odgovor = json_encode($odgovor);
		echo $json_odgovor;
		return false;
		}
		else {
			if(!property_exists($podaci,'my_friend_id')) {
				$odgovor["poruka"] = "Data is not correct!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				$podaci_query = array();
				foreach($podaci as $k=>$v) {
					$v = "'". $v ."'";
					$podaci_query[$k] = $v;
				}

				if($db->insert("friends","my_friend_id, my_id",array($podaci_query['my_friend_id'], $podaci_query['my_id']))) {
					$odgovor["poruka"] = "Successfully saved! ";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Already saved!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});




	Flight::route('DELETE /message/@message_id', function($message_id) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if($db->delete("message", array("message_id"),array($message_id))) {
			$response["message"] = "Message is deleted successfully!";
			$json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
			echo $json_response;
			return false;
		}
		
		else {
			$response["message"] = "Error!";
			$json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
			echo $json_response;
			return false;
		}
		
	});

	Flight::route('DELETE /member/@member_id', function($member_id) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if($db->delete("members", array("member_id"),array($member_id))) {
			$response["message"] = "Member is deleted successfully!";
			$json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
			echo $json_response;
			return false;
		}
		
		else {
			$response["message"] = "Error!";
			$json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
			echo $json_response;
			return false;
		}
		
	});



	Flight::route('DELETE /friends/@friendsID', function($friendsID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if($db->delete("friends", array("friendsID"),array($friendsID))) {
			$response["message"] = "Friend is deleted successfully!";
			$json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
			echo $json_response;
			return false;
		}
		else {
			$response["message"] = "Error!";
			$json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
			echo $json_response;
			return false;
		}
	});

		Flight::route('DELETE /photos/@photos_id', function($photos_id) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if($db->delete("photos", array("photos_id"),array($photos_id))) {
			$response["message"] = "Photo is deleted successfully!";
			$json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
			echo $json_response;
			return false;
		}
		
		else {
			$response["message"] = "Error!";
			$json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
			echo $json_response;
			return false;
		}
		
	});

	Flight::route('DELETE /post/@post_id', function($post_id) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if($db->delete("post", array("post_id"),array($post_id))) {
			$response["message"] = "Post is deleted successfully!";
			$json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
			echo $json_response;
			return false;
		}
		
		else {
			$response["message"] = "Error!";
			$json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
			echo $json_response;
			return false;
		}
		
	});


	
	
	Flight::route('GET /member.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);
		$db->select(" members ", '*', "", "", "", null, null);
		$niz = array();
		while($red = $db->getResult()->fetch_object()) {
			$niz[] = $red;
		}
		$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
		echo '{'.'"member":'. indent($json_niz) .' }';
		return false;
	});

	Flight::start();

$table = $db_table;
$primaryKey = 'member_id';
