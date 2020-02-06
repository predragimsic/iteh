<?php
include('dbcon.php');
include('session.php');

$friend_id  = $_POST['friend_id'];
$my_message  = $_POST['my_message'];
echo $_SESSION['id'] . " ". $_SESSION['username'];
if ($friend_id != "-1") {
    $conn->query("insert into message(reciever_id,content,date_sended,sender_id) values('$friend_id','$my_message',NOW(),'$session_id')");
} else {
    $query = $conn->query("select members.member_id , members.firstname , members.lastname  from members where members.role != 'admin'");
    while ($row = $query->fetch()) {
        $id = $row['member_id'];
        if($id != $session_id){
            $conn->query("insert into message(reciever_id,content,date_sended,sender_id) values('$id','$my_message',NOW(),'$session_id')");
        }
        
    }
}
?>
<script>
    alert('Message Sent');
</script>
<script>
    window.location = 'message.php';
</script>