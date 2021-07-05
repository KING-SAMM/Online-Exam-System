<?php
    # Admin registration page. 
    # register.php file

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examination System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .jumbotron {
            background-image: url("../images/geometric-background-memphis-style_52683-35346.jpg");
            background-size: cover;
            height: 150px;

            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="jumbotron d-flex">
        <h1>Web Design and Development Examination</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6" style="margin-top: 20px;">
                <span id="message"></span>
                <div class="card">
                    <div class="card-header">
                        Admin Registartion
                    </div>
                    <div class="card-body">
                        <form action="post" id="admin_register_form">
                            <div class="form-group">
                                <label for="admin_email">Enter Email</label>
                                <input type="text" name="admin_email" id="admin_email" class="form-control" data-parslet-checkemail data-parslet-checkemail-message="Email already exists">
                            </div>
                            <div class="form-group">
                                <label for="admin_password">Enter password</label>
                                <input type="password" name="admin_password" id="admin_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="confirm_admin_password">Confirm password</label>
                                <input type="password" name="confirm_admin_password" id="confirm_admin_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="page" value="register">
                                <input type="hidden" name="action" value="register">
                                <input type="submit" name="admin_register" id="admin_register" class="btn btn-primary text-white"  value="Register">
                            </div>
                        </form>
                        <div align="center">
                            Already registered? <a href="login.php">Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Check whether particular email is already registered
            window.ParsleyValidator.addValidaator('checkemail', {
                validateString: function(value)
                {
                    return $.ajax({
                        url: "ajax_action.php",
                        method: "POST",
                        data: {
                            page: 'register',
                            action: 'check_email',
                            email: value
                        },
                        dataType: "json",
                        success: function(data)
                        {
                            return true;
                        }
                    })
                }
            });

            // Initialize form validation library (Parsley)  on form
            $("#admin_register_form").parsley();
        });
    </script>
</body>
</html>
