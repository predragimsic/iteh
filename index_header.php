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
    
    <script src="../js/jquery.validate.min.js"></script>
    <script>
        (function($,W,D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#form").validate({
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
    </head>