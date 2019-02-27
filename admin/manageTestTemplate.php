<?php 
require "../class/TestTemplateClass.php" ;

$template = new TestTemplateClass;
$result = $template->getTestTemplate();
?>
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
                    <a class="nav-link dropdown-toggle" href="#" id="user" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Template</a>
                    <div class="dropdown-menu" aria-labelledby="user">
                        <a class="dropdown-item" href="./addTestTemplate.php">Create new Template</a>
                        <a class="dropdown-item active" href="./manageTestTemplate.php">Manage Template</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="test" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Test</a>
                    <div class="dropdown-menu" aria-labelledby="test">
                        <a class="dropdown-item" href="./addTest.html">Create new Test</a>
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
            <strong>จัดการชุดคำถาม!</strong>
        </div>

        <!-- Notification -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success text-center">
                <?php echo $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="row" style="margin-bottom:80px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive-md table-striped">
                            <table class="table" id="manageUser">
                                <thead>
                                    <tr>
                                        <th>ชื่อชุดคำถาม</th>
                                        <th>จำนวนคำถาม</th>
                                        <th>จำนวนที่ใช้</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($result); $i++) : ?>
                                            <tr>
                                                <td  scope="row"><?php echo ($result[$i][1]) ?></td>
                                                <td><?php echo ($result[$i][2]) ?></td>
                                                <td><a href="#" class="btn btn-sm btn-secondary">N/A</a></td>
                                                <td><a href="../class/testTemplateClass.php/?del=<?php echo ($result[$i][0]) ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                            </tr>
                                    <?php endfor; ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start modal -->
    <div class="modal fade" id="modalAddRound" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Round</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Set target for next round</label>
                        <input type="text" name="" id="" class="form-control" placeholder="Target">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal -->

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
        $('#manageUser').DataTable();
    </script>
</body>

</html>