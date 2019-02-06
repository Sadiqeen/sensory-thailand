<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Sensory Evaluation</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../vender/fontawesome/css/all.css">
    <link rel="stylesheet" href="../vender/DataTables/datatables.min.css">
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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">LOGO</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./dashboard.html">Dashboard</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="user" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">User</a>
                    <div class="dropdown-menu" aria-labelledby="user">
                        <a class="dropdown-item" href="./addUser.html">Create new User</a>
                        <a class="dropdown-item" href="./manageUser.html">Manage user</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="test" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Test</a>
                    <div class="dropdown-menu" aria-labelledby="test">
                        <a class="dropdown-item active" href="./addTest.html">Create new Test</a>
                        <a class="dropdown-item" href="./manageTest.html">Manage Test</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./organization.html" id="organization" aria-expanded="false">Organization</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="../admin.html">Sign out</a></li>
            </ul>
        </div>
    </nav>
    <!-- End NAV bar -->

    <!-- Start Content -->
    <div class="container mt-3">

        <div class="alert alert-info text-center">
            <strong>Add Test Template!</strong>
        </div>
        <?php
                    if (isset($_SESSION['success'])) {
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    }
                ?>
        <div class="row" style="margin-bottom:80px">

            <!-- Test -->
            <div class="col-md-12 mb-3">
                <form action="./zScript-AddTestTemplate.php" method="post">
                    <div class="card">
                        <div class="card-header">Test</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="">Test Template Name</label>
                                    <input type="text" name="template_name" id="" class="form-control" placeholder="Template Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Quanlity</label>
                                    <select name="question_qt" id="question_qt" class="form-control">
                                        <option value="5" selected>5 questions</option>
                                        <option value="10">10 questions</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Question -->
                            <div id="state" class="row"></div>
                            <!-- Button -->
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-secondary">Discard</button>
                                    <button class="btn btn-success float-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../vender/DataTables/datatables.min.js"></script>
    <script>
        $(function () {
            quetion_ql = $('#question_qt').val();
            var question = question_ql();
            $("#state").append(question);
            $('#question_qt').change(function (e) {
                $("#state").empty();
                var question = question_ql();
                $("#state").append(question);
            });
        });

        function question_ql() {
            var question = '<div class="form-group col-md-12">' +
                '<label for="">Question 1</label>' +
                '<input type="text" name="question[]" id="" class="form-control" placeholder="Enter question">' +
                '</div>';

            for (let index = 0; index < $('#question_qt').val() - 1; index++) {
                question += '<div class="form-group col-md-12">' +
                    '<label for="">Question ' + (index + 2) + '</label>' +
                    '<input type="text" name="question[]" id="" class="form-control" placeholder="Enter question">' +
                    '</div>';
            }

            return question;
        }
    </script>
</body>

</html>