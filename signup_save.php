<?php include('index_header.php'); ?>
<body>
<?php
include('dbcon.php');
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];

/*$conn->query("insert into members (username,password,firstname,lastname,gender,image) values ('$username','$password','$firstname','$lastname','$gender','images/No_Photo_Available.jpg')");	
*/

$member= '{"firstname": "'. $firstname .'","lastname": "'.  $lastname .'","gender": "'.  $gender .'","username": "'.  $username .'","password": "'.  $password .'"}';

header("Location: index.php");

$url = 'http://localhost:8080/socialnetwork/member';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $member);

$curl_odgovor = curl_exec($curl);
curl_close($curl);
$json_objekat = json_decode($curl_odgovor);

if (isset($json_objekat)) {
	header("Location: index.php?poruka=$json_objekat->poruka");
}
?>


<script>
	alert('Welcome aboard! Please log in now.');
	window.location = 'index.php';
</script>
</body>
</html>