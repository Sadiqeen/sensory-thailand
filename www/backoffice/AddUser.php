<?php
require_once __DIR__ . '/../boot/load.php';

use Classes\OrganizationClass;
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
                        <a class="btn btn-primary" href="<?php echo __HOST__ ?>/backoffice/Organization.php">จัดการองค์กร</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>

<!-- Start Content -->

    <div class="alert alert-info text-center">
        <strong>เพิ่มผู้ใช้ใหม่!</strong>
    </div>
    <div class="row" style="margin-bottom:80px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">ชื่อผู้ใช้</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="">ชื่อ</label>
                            <input type="text" name="" id="" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="">นามสกุล</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="">อายุ</label>
                            <input type="number" min="10" max="100" name="" id="" class="form-control" placeholder="Age">
                        </div>
                        <div class="form-group">
                            <label for="">เบอร์โทรศัพท์</label>
                            <input type="text" min="10" max="10" name="" id="" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="">อีเมลล์</label>
                            <input type="email" name="" id="" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label for="">รหัสผ่าน</label>
                            <input type="password" name="" id="" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="">ยืนยันรหัสผ่าน</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Re-password">
                        </div>
                        <div class="form-group">
                            <label for="">Profile picture</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">องค์กร</label>
                            <select class="form-control" name="" id="">
                                <?php foreach ($organizations as $item): ?>
                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <a href="" class="btn btn-secondary">จัดการผู้ใช้</a>
                            <a href="" class="btn btn-success float-right">บันทึก</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- End Content -->

<?php require_once __DIR__.'/layout/footer.php'; ?>

<script>
    $('#manageUsers').DataTable()
</script>

<?php require_once __DIR__.'/layout/foot.php'; ?>