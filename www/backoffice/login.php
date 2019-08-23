<?php
require_once __DIR__ . '/../boot/load.php';

use Classes\MiddlewareClass;
MiddlewareClass::loginPage();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User | Sensory Evaluation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @media only screen and (max-width: 720px) {
        .footer-custom {
            text-align: center;
        }
        .footer-custom-br {
            display: block;
        }
    }
    @media only screen and (min-width: 720px) {
        .footer-custom-right {
            float: right!important;
        }
    }
    </style>
</head>

<body class="bg-light">

    <!-- Start NAV bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">LOGO</a>
        <a class="navbar-brand text-muted ml-auto" href="#">Fatoni university</a>
    </nav>
    <!-- End NAV bar -->

    <!-- Start Content -->
    <div class="container" style="height: 100vh;">
        <div class="row align-items-center h-100">
            <div class="col-md-6 mx-auto">

                <?php require_once __DIR__.'/elements/handle_alert.php'; ?>

                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title alert alert-info">Administrator</h4>
                        <form action="<?php __ROOT__ ?>/classes/AuthenticateClass.php" method="post">
                            <div class="form-group">
                                <input type="text" name="username" id="" class="form-control" placeholder="Username or E-mail"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="" class="form-control" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group">
                                <a href="./user.html" class="btn btn-secondary float-left">Tester</a>
                                <button href="" name="login" type="submit" class="btn btn-success float-right">sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    <footer class="footer py-3 bg-dark text-white fixed-bottom">
        <div class="container footer-custom">
            <span class="text-muted footer-custom-br">Sensory Evaluation system | © 2018</span>
            <span class="text-muted footer-custom-right">Version : Prototype</span>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>