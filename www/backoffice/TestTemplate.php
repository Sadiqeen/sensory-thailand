<?php
require_once __DIR__ . '/../boot/load.php'; 
require_once __DIR__.'/layout/header.php';
require_once __DIR__.'/layout/navbar.php';
?>
<!-- Start Content -->
<div class="container mt-3">

    <div class="alert alert-info text-center">
        <strong>เพิ่มชุคคำถาม!</strong>
    </div>

    <!-- Alert -->
    <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success!</strong> <?php echo $_SESSION['success'];  unset($_SESSION['success']);?>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success!</strong> <?php echo $_SESSION['error'];  unset($_SESSION['error']);?>
    </div>
    <?php endif; ?>

    <div class="row" style="margin-bottom:80px">
        <!-- Test -->
        <div class="col-md-12 mb-3">
            <form action="/classes/TemplateClass.php" method="post">
                <div class="card">
                    <div class="card-header">เพิ่มชุดคำถามใหม่</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="">ชื่อชุดคำถาม</label>
                                <input type="text" name="template_name" id="" class="form-control"
                                    placeholder="Template Name" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">จำนวนคำถาม</label>
                                <select name="question_qt" id="question_qt" class="form-control" required>
                                    <option value="5" selected>5 คำถาม</option>
                                    <option value="10">10 คำถาม</option>
                                </select>
                            </div>
                        </div>
                        <!-- Question -->
                        <div id="state" class="row"></div>
                        <!-- Button -->
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-secondary" href="./manageTestTemplate.php">ยกเลิก</a>
                                <button class="btn btn-success float-right" name="addTemplate"
                                    type="submit">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Content -->

<?php require_once __DIR__.'/layout/footer.php'; ?>

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
            '<label for="">คำถามที่ 1</label>' +
            '<input type="text" name="questions[]" id="" class="form-control" placeholder="Enter question" required>' +
            '</div>';

        for (let index = 0; index < $('#question_qt').val() - 1; index++) {
            question += '<div class="form-group col-md-12">' +
                '<label for="">คำถามที่ ' + (index + 2) + '</label>' +
                '<input type="text" name="questions[]" id="" class="form-control" placeholder="Enter question" required>' +
                '</div>';
        }

        return question;
    }
</script>

<?php require_once __DIR__.'/layout/foot.php'; ?>