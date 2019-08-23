<?php
require_once __DIR__ . '/../boot/load.php';

use Classes\UsersClass;
$data = UsersClass::getAllUsers();

require_once __DIR__.'/layout/header.php';
require_once __DIR__.'/layout/navbar.php';
?>

<!-- Start Content -->
<div class="container mt-3">

    <div class="alert alert-info text-center">
        <strong>จัดการผู้ใช้!</strong>
    </div>

    <?php require_once __DIR__.'/elements/handle_alert.php'; ?>
    
    <div class="row" style="margin-bottom:80px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-md table-striped">
                        <table class="table" id="manageUsers">
                            <thead>
                                <tr>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>ชื่อ-สกุล</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>อีเมล</th>
                                    <th>องค์กร</th>
                                    <th>ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $value) : ?>
                                <tr <?php echo $value['status'] !== 1 ? "class='table-danger'" : ''; ?>>
                                    <td scope="row"><?php echo $value['username'] ?></td>
                                    <td><?php echo $value['firstname'] ?> <?php echo $value['lastname'] ?></td>
                                    <td><?php echo $value['phone'] ?></td>
                                    <td><?php echo $value['email'] ?></td>
                                    <td><?php echo $value['organization']['name'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="actionButton">
                                            <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                            <a href="<?php echo __HOST__ ?>/backoffice/UpdateUser.php?id=<?php echo $value['id'] ?>" class="btn btn-sm btn-warning">Update</a>
                                            <?php if($value['status'] !== 1) : ?>
                                                <a href="<?php echo __HOST__ ?>/classes/UsersClass.php?unbanned=<?php echo $value['id'] ?>" class="btn btn-sm btn-danger">unbanned</a>
                                            <?php else: ?>
                                                <a href="<?php echo __HOST__ ?>/classes/UsersClass.php?ban=<?php echo $value['id'] ?>"" class="btn btn-sm btn-danger">ban</a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <?php require_once __DIR__.'/layout/footer.php'; ?>

    <script>
        $('#manageUsers').DataTable()
    </script>

    <?php require_once __DIR__.'/layout/foot.php'; ?>