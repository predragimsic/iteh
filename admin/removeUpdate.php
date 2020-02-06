<?php include('header.php');
include('dbcon.php');
include('session.php');
?>

<body>
    <?php include('navbarAdmin.php'); ?>
    <div id="masthead">
        <div class="container">
            <h2>Update/remove members</h2>

        </div><!-- /cont -->
        <br>
        <div class="container">
        <?php
        if (isset($_GET['message'])) {
            $staPrikazati = $_GET['message'];
            if ($staPrikazati == "Uspešno ste izvršili izmenu podataka o filmu!") {
        ?> <div class="alert alert-info alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong> <?php echo $staPrikazati  ?> </strong>
                </div>
            <?php
            } else {
            ?> <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong> <?php echo $staPrikazati  ?></strong>
                </div>
        <?php
            }
        }
        ?>
        <br>
        <?php
        $url = 'http://localhost/projekat/member.json';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_HTTPGET, true);

        $curl_answer = curl_exec($curl);
        curl_close($curl);
        $json_object = json_decode($curl_answer);
        ?>
        <div class="datagrid">
            <table id="tableMembers">
                <thead>
                    <tr>
                        <th>Change</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody id="ajaxData">
                    <?php
                    foreach ($json_object->film as $film) {
                        echo "<tr>
                            <td><a href='updateFilm.php?filmID=" . $film->FilmID . "'><button class='btn btn-info'>Izmeni</button></a></td>
                            <td>$film->NazivFilma</td>
                            <td>$film->Trajanje</td>
                            <td>$film->Cena</td>
                            <td>$film->Ime $film->Prezime</td>

                            <td><a href='delete.php?filmID=" . $film->FilmID . "'><button class='btn btn-danger'>Obriši</button></a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        </div><!-- /cont -->
        

    </div>



    <?php include('footer.php'); ?>

</body>