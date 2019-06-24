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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="user" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Template</a>
                    <div class="dropdown-menu" aria-labelledby="user">
                        <a class="dropdown-item" href="<?php __ROOT__ ?>/backoffice/TestTemplate.php">Create new Template</a>
                        <a class="dropdown-item" href="<?php __ROOT__ ?>/backoffice/ManageTemplate.php">Manage Template</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="test" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Test</a>
                    <div class="dropdown-menu" aria-labelledby="test">
                        <a class="dropdown-item" href="<?php __ROOT__ ?>/backoffice/AddTest.php">Create new Test</a>
                        <a class="dropdown-item" href="./manageTest.html">Manage Test</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php __ROOT__ ?>/backoffice/Organization.php" id="organization" aria-expanded="false">Organization</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="../admin.html">Sign out</a></li>
            </ul>
        </div>
    </nav>
    <!-- End NAV bar -->