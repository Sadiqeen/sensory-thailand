<?php
require_once __DIR__ . '/../boot/load.php'; 

use Classes\TemplateClass;

$template = new TemplateClass;
$data = $template->getTestTemplate();

require_once __DIR__.'/layout/header.php';
require_once __DIR__.'/layout/navbar.php';
?>
<!-- Start Content -->
<div class="container mt-3">

    <div class="alert alert-info text-center">
        <strong>จัดการชุดคำถาม!</strong>
    </div>
    <!-- Alert -->
    <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success!</strong> <?php echo $_SESSION['success'];  unset($_SESSION['success']);?>
    </div>
    <?php endif; ?>
    <!-- End alert -->
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
                                <?php if (!empty($data[0])): ?>
                                    <?php foreach ($data as $value): ?>
                                    <tr>
                                        <td><?php echo $value['template_name'] ?></td>
                                        <td><?php echo $value['question_quantity'] ?></td>
                                        <td><a href="#" class="btn btn-sm btn-secondary">N/A</a></td>
                                        <td><a href="<?php __ROOT__ ?>/classes/TemplateClass.php?del=<?php echo $value['id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center"><strong>ไม่มีข้อมูล</strong></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<?php require_once __DIR__.'/layout/footer.php'; ?>

<script>
    $('#manageUser').DataTable();
</script>

<?php require_once __DIR__.'/layout/foot.php'; ?>