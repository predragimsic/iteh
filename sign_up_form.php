<form id="form2" class="form-horizontal" method="post" action="signup_save.php">
    <h4> Sign up </h4>
    <hr>
    <div class="form-group">
        <label for="username" class="col-sm-2  control-label" data-icon="u">Your username:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="username" placeholder="Username ..." id="username">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2  control-label" data-icon="p">Your password:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="password" placeholder="Password..." id="password">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2  control-label" data-icon="u">Your firstname:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname..." id="firstname">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2  control-label" data-icon="u">Your lastname:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname..." id="lastname">
        </div>
    </div>
    <p>
        <label for="passwordsignup" class="youpasswd" data-icon="">Your Gender </label>
        <select id="passwordsignup" name="gender">
            <option>Female</option>
            <option>Male</option>
        </select>
    </p>
    <p class="signin button">
        <input type="submit" value="Sign up" />
    </p>
    <p class="change_link">
        Already a member ?
        <a href="#tologin" class="to_register"> Go and log in </a>
    </p>
</form>