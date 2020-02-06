<?php include('index_header.php'); ?>
<body>
<?php
include('dbcon.php');
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];

$conn->query("insert into members (username,password,firstname,lastname,gender,image) values ('$username','$password','$firstname','$lastname','$gender','images/No_Photo_Available.jpg')");	
?>
<script>
	alert('Welcome aboard! Please log in now.');
	window.location = 'index.php';
</script>
</body>
</html>