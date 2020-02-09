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
    
    <script type="text/javascript">
        // kada je dokument učitan
        $(document).ready(function () {
            // selektujemo element čiji ID je txt, proveravamo kada je sklonjen fokus sa njega (bilo kojim tasterom)
            $("#txt").keyup(function () {
                var vrednost = $("#txt").val();
                $.get(
                    "pretragaAJAX.php",
                    {
                        unos: vrednost
                    },
                    function (data) {
                        $("#livesearch").show();
                        $("#livesearch").html(data);
                    });
            });
        });

        // funkcija koja postavlja ime aranžmana u polje za pretragu
        function place(element) {
            // postavljamo pronađenu vrednost u polje za pretragu
            $("#txt").val(element.innerHTML);
            // kada je odabrana vrednost, sakrivamo listu rezultata
            $("#livesearch").hide();
        }
    </script>
</head>
<?php include('dbcon.php'); ?>