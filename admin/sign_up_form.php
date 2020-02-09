
<form id="form2" class="form-horizontal" method="post" action="updateM.php?member_id=<?php echo "$member->member_id";?>">
    <h3> Make changes</h3>
    <hr>
    <div class="form-group">
        <label for="username" class="col-sm-2  control-label" data-icon="u">Username:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="username" placeholder="Username ..." value="<?php echo "$member->username"; ?>" id="username" autocomplete="off">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2  control-label" data-icon="p">Password:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="password" placeholder="Password..." value="<?php echo "$member->password"; ?>" id="password" autocomplete="off">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2  control-label" data-icon="u">Firstname:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname..." value="<?php echo "$member->firstname"; ?>" id="firstname" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2  control-label" data-icon="u">Lastname:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname..." value="<?php echo "$member->lastname"; ?>" id="lastname" autocomplete="off">
        </div>
    </div>
    <p>
        <label for="passwordsignup" class="youpasswd" data-icon="">Gender </label>
        <select id="passwordsignup" title="We use this only for statistics! :)." name="gender">
            <option>Female</option>
            <option>Male</option>
        </select>
    </p>
    <div id="choose">
        <h3>Password recommendations</h3>

        <input type="button" onclick="fillIn(this)" class="dugmeAliNe" id="pass1" value=""> <br>
        <input type="button" onclick="fillIn(this)" class="dugmeAliNe" id="pass2" value=""> <br>
        <input type="button" onclick="fillIn(this)" class="dugmeAliNe" id="pass3" value=""> <br>


    </div>
    <p class="signin button">
        <input type="submit" value="Save" />
    </p>

</form>


<script>
    function fillIn(d) {

        document.getElementById("password").value = d.value;
        document.getElementById("choose").innerHTML = " <img src=\"images/gif.gif\" alt=\"\">";

        $(document).ready(function() {
            setTimeout(function() {
                $('#choose').hide();
            }, 4000);
        });

    }
</script>
<script>
    var zahtev = $.ajax({
        url: "passwords.php",
        method: "GET"
    });

    zahtev.done(function(json) {
        var nalepi = json;
        var niz = nalepi.split("\n");


        document.getElementById("pass1").value = niz[0];
        document.getElementById("pass2").value = niz[1];
        document.getElementById("pass3").value = niz[2];


    });
</script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>