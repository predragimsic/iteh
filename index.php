<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>FON'S APP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
    <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
    <meta name="author" content="Maja, Jovana, Pedja" />
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style2.css" />
    <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#form1").validate({
                        rules: {
                            username: {
                                required: true,
                                minlength: 4,
                            },
                            password: {
                                required: true,
                                minlength: 4,
                            }
                        },
                        messages: {
                            username: {
                                required: "Username is empty!",
                                minlength: "Username has to have more than 3 characters!",
                            },
                            password: {
                                required: "Password is empty!",
                                minlength: "Password has to have more than 3 characters!",
                            }
                        },
                        submitHandler: function(form) {
                            form.submit();
                        }
                    });
                }
            }
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation();
            });
        })(jQuery, window, document);
    </script>
    <script>
        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#form2").validate({
                        rules: {
                            firstname: {
                                required: true,
                                minlength: 2,
                                maxlength: 20
                            },
                            lastname: {
                                required: true,
                                minlength: 2,
                                maxlength: 50
                            },

                            username: {
                                required: true,
                                minlength: 3,
                            },
                            password: {
                                required: true,
                                minlength: 3,
                                number: false

                            }
                        },
                        messages: {
                            firstname: {
                                required: "Required!",
                                minlength: "At least 2 characters!",
                                maxlength: "Maximum 20 characters!"
                            },
                            lastname: {
                                required: "Required!",
                                minlength: "At least 2 characters!",
                                maxlength: "Maximum 50 characters!"
                            },
                            username: {
                                required: "Required!",
                                minlength: "At least 4 characters!"
                            },
                            password: {
                                required: "Required!",
                                minlength: "At least 4 characters!",
                                number: "You have to use numbers for your safety!"
                            }
                        },
                        submitHandler: function(form) {
                            form.submit();
                        }
                    });
                }
            }
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation();
            });
        })(jQuery, window, document);
    </script>
</head>

<body>
    <div id="bodyLogin">
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <div class="clr">
                    <div class="title">FON'sApp</div>
                </div>
            </div>
            <!--/ Codrops top bar -->
            <section>

                <div id="container_demo">

                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <?php include('login_form.php'); ?>
                        </div>
                        <div id="register" class="animate form">
                            <?php include('sign_up_form.php'); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>