<form id="form2" class="form-horizontal" method="post" action="signup_save.php">
    <h4> Sign up </h4>
    <hr>
    <div class="form-group">
        <label for="username" class="col-sm-2  control-label" data-icon="u">Your username:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="username" placeholder="Username ..." id="username" autocomplete="off">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2  control-label" data-icon="p">Your password:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="password" placeholder="Password..." id="password" autocomplete="off">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2  control-label" data-icon="u">Your firstname:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname..." id="firstname" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2  control-label" data-icon="u">Your lastname:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname..." id="lastname" autocomplete="off">
        </div>
    </div>
    <p>
        <label for="passwordsignup" class="youpasswd" data-icon="">Your Gender </label>
        <select id="passwordsignup" title="We use this only for statistics! :)." name="gender">
            <option>Female</option>
            <option>Male</option>
        </select>
    </p>
    <div id="zameniSuccess">
    <h3>Password recommendations</h3>

    <input type="button" onclick="punipass(this)" class="dugmeAliNe" id="lozinka1" value=""> <br>
    <input type="button" onclick="punipass(this)" class="dugmeAliNe" id="lozinka2" value=""> <br>
    <input type="button" onclick="punipass(this)" class="dugmeAliNe" id="lozinka3" value=""> <br>


</div>
    <p class="signin button">
        <input type="submit" value="Sign up" />
    </p>
    <p class="change_link">
        Already a member ?
        <a href="#tologin" class="to_register"> Go and log in </a>
    </p>
</form>


<script>
    function punipass(d) {

        document.getElementById("password").value = d.value;
        document.getElementById("zameniSuccess").innerHTML = " <img src=\"images/gif.gif\" alt=\"\">";

        $(document).ready(function() {
            setTimeout(function() {
                $('#zameniSuccess').hide();
            }, 4000);
        });

    }
</script>
<script>
    var zahtev = $.ajax({
        url: "lozinke.php",
        method: "GET"
    });

    zahtev.done(function(json) {
        var nalepi = json;
        var niz = nalepi.split("\n");


        document.getElementById("lozinka1").value = niz[0];
        document.getElementById("lozinka2").value = niz[1];
        document.getElementById("lozinka3").value = niz[2];


    });
</script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>