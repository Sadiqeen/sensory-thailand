<?php
require_once __DIR__ . '/../boot/load.php'; 

use Classes\TemplateClass;
use Classes\UploadClass;
use Model\OrganizationModel;
use Model\TestMethodsModel;

$template = new TemplateClass;
$data = $template->getTestTemplate();
if (!$data[0]) {
    return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/TestTemplate.php');
}
$organization = OrganizationModel::all();
$test_method = TestMethodsModel::all();

require_once __DIR__.'/layout/header.php';
require_once __DIR__.'/layout/navbar.php';
?>

 <!-- Start Content -->
 <div class="container mt-3">

<div class="alert alert-info text-center">
    <strong>Add Test!</strong>
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

<form action="<?php __ROOT__ ?>/classes/TestClass.php" method="post" enctype="multipart/form-data">
    <div class="row" style="margin-bottom:80px">
        <!-- Gold -->
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">Information of Test</div>
                <div class="card-body row">
                    <div class="form-group col-md-12">
                        <label for="">วิธีการทดสอบ</label>
                        <select class="form-control" name="method" id="">
                            <?php foreach($test_method as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">การทดสอบสำหรับ</label>
                        <select class="form-control" name="organization" id="">
                            <option value="0" selected>All</option>
                            <?php foreach($organization as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- <div class="form-group col-md-12">
                        <label for="">Set Target</label>
                        <input type="text" name="" id="" class="form-control" placeholder="People">
                    </div> -->
                    <div class="form-group col-md-12">
                        <label for="">ชื่อการทดสอบ</label>
                        <input type="text" name="test_name" id="" class="form-control" placeholder="Set Test Name" required>
                    </div>
                        <div class="form-group col-md-12">
                            <label for="">ภาพปก</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="test_cover" id="customFile" accept="image/*" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    <div class="form-group col-md-12">
                        <label for="">ข้อมูลการทดสอบ</label>
                        <textarea name="test_info" id="" class="form-control" cols="30" rows="3" placeholder="Set Test Inforamtion" required></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pretest -->
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">คำถามเกี่ยวกับข้อมูลส่วนตัว</div>
                <div class="card-body row text-center">
                    <div class="col-md-3 form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="gender" id="" checked>
                            เพศ
                        </label>
                    </div>
                    <div class="col-md-3 form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="age" id="" checked>
                            อายุ
                        </label>
                    </div>
                    <div class="col-md-3 form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="education" id="" checked>
                            ระดับการศึกษา
                        </label>
                    </div>
                    <div class="col-md-3 form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="career" id="" checked>
                            อาชีพ
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Template -->
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">เลือกชุดคำถาม</div>
                <div class="card-body row">
                    <div class="form-group col-md-8" id="cover_template">
                        <label for="">ชุดคำถาม</label>
                        <select name="template" id="template" class="form-control">
                            <?php foreach ($data as $item) :?>
                                <option value="<?php echo $item['id'] ?>" data-qt="<?php echo $item['question_quantity'] ?>"><?php echo $item['template_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">จำนวนคำถาม</label>
                        <input type="text" name="" id="questionQT" class="form-control" placeholder="" disabled>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test -->
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">คำถาม</div>
                <div class="card-body row" id="questions">
                    
                </div>
            </div>
        </div>

        <!-- submit -->
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-secondary">Discard</button>
                    <button class="btn btn-success float-right" type="submit" name="add_test">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- End Content -->

<?php require_once __DIR__.'/layout/footer.php'; ?>

<script>
$(document).ready(function () {
    questionQT()
    getQuestion()
    $("#cover_template").on("change", "#template", function () {
        questionQT()
        getQuestion()
    })

    $('.custom-file-input').on('change', function() {
        let size = this.files[0].size
        if(size > 2000000) {
            alert('ขนาดรูปใหญ่เกินไป')
            return false;
        }
        let fileName = $(this).val().split('\\').pop()
        $(this).next('.custom-file-label').addClass("selected").text(imageName(fileName))
    })

    $('#questions').on('change', '.custom-file-input', function() {
        let size = this.files[0].size
        if(size > 2000000) {
            alert('ขนาดรูปใหญ่เกินไป')
            return false;
        }
        let fileName = $(this).val().split('\\').pop()
        $(this).next('.custom-file-label').addClass("selected").text(imageName(fileName))
    })
});

function imageName(fileName)
{
    if (fileName.length > 20)
    {
        return fileName.substr(0, 20)+'...'
    } else {
        return fileName
    }
}

function questionQT()
{
    var questionQT = $("#template").children("option:selected").data("qt");
    $("#questionQT").val(questionQT);
}

function getQuestion()
{
    var templateID = $("#template").children("option:selected").val();
    $.ajax({
        type: "get",
        url: "<?php __ROOT__ ?>/classes/TemplateClass.php",
        data: "templateId="+templateID,
        dataType: "json",
        success: function (response) {
            $("#questions").empty();
            writeQuestion(response);
        }
    });
}

function writeQuestion(data)
{
    var questions = "";
    
    for (let index = 0; index < data.length; index++) {
        questions += '<div class="form-group col-md-8">'+
                        '<label for="">คำถามที่ '+(index+1)+'</label>'+
                        '<input type="text" name="questions[]" id="" class="form-control" value="'+data[index]['question']+'" disabled>'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                        '<label for="">Test picture</label>'+
                        '<div class="custom-file">'+
                            '<input type="file" name="test_image[]" accept="image/*" class="custom-file-input" required>'+
                            '<label class="custom-file-label" for="customFile">Choose file</label>'+
                        '</div>'+
                    '</div>';
    }
    
    $("#questions").append(questions);
}
</script>

<?php require_once __DIR__.'/layout/foot.php'; ?>