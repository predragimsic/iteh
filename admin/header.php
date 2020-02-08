<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>FON'S APP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-glyphicons.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/my_style.css" type="text/css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables-1.10.20/css/jquery.dataTables.min.css" />
    <script src="DataTables-1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        // kada je dokument učitan
        $(document).ready(function() {
            // selektujemo element čiji ID je txt, proveravamo kada je sklonjen fokus sa njega (bilo kojim tasterom)
            $("#sendMessage").on('click', function() {
                var friend_id = $("#friend_id").val();
                var my_message = $("#my_message").val();
                var sender_id = $session_id;
                if (tekst === "") {
                    alert("Message can't be empty!");
                    return;
                }
                if (true) {
                    alert("session id je :".$session_id);
                }
                $.get(
                    "send_message.php", {
                        friend_id: friend_id,
                        my_message: my_message,
                        sender_id: sender_id

                    },
                    function(data) {
                        alert("Message sent");
                    });
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $(".tabela").DataTable();
        });
    </script>

</head>
<?php include('dbcon.php'); ?>