<?php
require_once __DIR__ . '/../boot/load.php';

if (!isset($_GET['id'])) {
    return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/ManageUsers.php');
}

use Classes\OrganizationClass;
use Classes\MiddlewareClass;

$userData = MiddlewareClass::updateUserPage($_GET['id']);
$organizations = OrganizationClass::getAllOrganization();

require_once __DIR__.'/layout/header.php';
require_once __DIR__.'/layout/navbar.php';
?>

<div class="container mt-3">
    <?php if(!$organizations[0]) : ?>
    <div class="row" style="margin-bottom:80px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body row" style="height:70vh">
                    <div class="my-auto mx-auto text-center col-md-6">
                        <div class="alert alert-danger text-center">
                            <strong>กรุณาสร้างองค์กร ก่อนเพิ่มผู้ใช้งาน!</strong>
                        </div>
                        <a class="btn btn-primary"
                            href="<?php echo __HOST__ ?>/backoffice/Organization.php">จัดการองค์กร</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>

    <!-- Start Content -->

    <div class="alert alert-info text-center">
        <strong>อัปเดทบัญชีผู้ใช้!</strong>
    </div>

    <?php require_once __DIR__.'/elements/handle_alert.php'; ?>

    <div class="row" style="margin-bottom:80px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo __HOST__ ?>/classes/UsersClass.php" method="post">
                        <div class="form-group">
                            <label for="">ชื่อผู้ใช้</label>
                            <input type="text" name="username" id="" value="<?php echo $userData['username'] ?>" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="">ชื่อ</label>
                            <input type="text" name="firstName" id="" value="<?php echo $userData['firstname'] ?>" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="">นามสกุล</label>
                            <input type="text" name="lastName" id="" value="<?php echo $userData['lastname'] ?>" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="">อายุ</label>
                            <input type="number" min="10" max="100" name="age" value="<?php echo $userData['age'] ?>" id="" class="form-control"
                                placeholder="Age">
                        </div>
                        <div class="form-group">
                            <label for="">เบอร์โทรศัพท์</label>
                            <input type="text" min="10" max="10" name="phone" value="<?php echo $userData['phone'] ?>" id="" class="form-control"
                                placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="">อีเมลล์</label>
                            <input type="email" name="email" value="<?php echo $userData['email'] ?>" id="" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label for="">รหัสผ่าน</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="">ยืนยันรหัสผ่าน</label>
                            <input type="password" name="confirm_password" id="" class="form-control"
                                placeholder="Re-password">
                        </div>
                        <div class="form-group">
                            <label for="">องค์กร</label>
                            <select class="form-control" name="organization" id="">
                                <?php foreach ($organizations as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo __HOST__ ?>/backoffice/ManageUsers.php"
                                class="btn btn-secondary">จัดการผู้ใช้</a>
                            <button type="submit" name="updateUser" class="btn btn-success float-right">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<!-- End Content -->

<?php require_once __DIR__.'/layout/footer.php'; ?>
<?php require_once __DIR__.'/layout/foot.php'; ?>