<?php include('header.php');
include('connection.php');
include('session.php');
?>

<body>
    <?php include('navbarAdmin.php'); ?>
    <div id="masthead">
        <div class="container">
            <h2>Members</h2>

        </div><!-- /cont -->
        <br>
        <div class="container">
            <?php
            if (isset($_GET['message'])) {
                $staPrikazati = $_GET['message'];
                if ($staPrikazati == "Uspešno ste izvršili izmenu podataka o memberu!") {
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
            $url = 'http://localhost:8080/socialnetwork/member.json';
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_HTTPGET, true);

            $curl_answer = curl_exec($curl);
            curl_close($curl);
            $json_object = json_decode($curl_answer);
            ?>

            <table id="zakazivanja" class="table table-hover">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($json_object->member as $member) {
                        echo "<tr>
                                <td>$member->firstname</td>
                                <td>$member->lastname</td>
                                <td>$member->address</td>
                                <td>$member->email</td>
                                <td>$member->role</td>
                                <td><a href='update_member.php?member_id=" . $member->member_id . "'><button class='btn btn-info'>Update</button></a></td>
                                <td><a href='delete_member.php?member_id=" . $member->member_id . "'><button class='btn btn-danger'>Remove</button></a></td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>


        </div><!-- /cont -->


    </div>



    <?php include('footer.php'); ?>
    
</body>