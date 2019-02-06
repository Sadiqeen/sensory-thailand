<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User | Sensory Evaluation</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
      .mt {
          margin-top : 10%
      }
    </style>
</head>

<body class="bg-light">

    <div class="container mt">
        <div class="card border">
          <div class="card-body text-center">
            <h4 class="card-title">ERROR OCCUR</h4>
            <hr>
            <p class="card-text">
                <?php
                    if ($_SESSION['query']) {
                        echo '<span class="text-danger">'.$_SESSION['query'].'</span><br>';
                        unset($_SESSION['query']);
                    }
                    if ($_SESSION['error']) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </p>
          </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>