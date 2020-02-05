@extends('layouts.parent')

@section('content')
<div class="alert alert-info text-center">
    <strong>คำถามก่อนการทดสอบ!</strong>
</div>
@include('layouts.flash-message')
<form action="{{ route('test.store') }}" method="post">
    <div class="row">
        @csrf
        <div class="col-md-12 mb-3" id="Questions">
            <div class="progress mb-4">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%"
                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="card" id="question-1">
                <div class="card-body row">
                    <div class="form-group col-md-8">
                        <label for="">คำถาม</label>
                        <input type="text" name="test_question[]" id="" class="form-control" placeholder="Question" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">รูปแบบการเลือก</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>เลือกได้ตัวเลือกเดียว</option>
                            <option>เลือกได้หลายตัวเลือก</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 1</label>
                        <input type="text" name="test_ans1[]" id="" class="form-control" placeholder="Answer 1" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 2</label>
                        <input type="text" name="test_ans2[]" id="" class="form-control" placeholder="Answer 2" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 3</label>
                        <input type="text" name="test_ans3[]" id="" class="form-control" placeholder="Answer 3" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 4</label>
                        <input type="text" name="test_ans4[]" id="" class="form-control" placeholder="Answer 4" required>
                    </div>
                    <div class="col-md-12">
                        <button type="button" id="btn-1" onclick="addQuestion(1)"
                            class="float-right btn btn-success btn-xs btn-block">
                            <i class="fa fa-plus-square-o"></i> เพิ่มคำถาม
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- submit -->
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-secondary">ยกเลิก</button>
                    <button class="btn btn-success float-right">ต่อไป <i class="fa fa-arrow-right"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    function addQuestion(questionId) {
        $("#btn-" + questionId).attr("onclick","delQuestion(" + questionId + ")");
        $("#btn-" + questionId).removeClass('btn-success').addClass('btn-danger');
        $("#btn-" + questionId).html('<i class="fa fa-trash-o"></i> ลบคำถาม').button("refresh");
        $("#Questions").append(
            '<div class="card mt-3" id="question-' + (questionId + 1) + '">' +
            '<div class="card-body row">' +
            '<div class="form-group col-md-8">' +
            '<label for="">คำถาม</label>' +
            '<input type="text" name="test_question[]" id=""' +
            'class="form-control" placeholder="Question">' +
            '</div>' +
            '<div class="form-group col-md-4">' +
            '<label for="exampleFormControlSelect1">รูปแบบการเลือก</label>' +
            '<select class="form-control" id="exampleFormControlSelect1">' +
            '<option>เลือกได้ตัวเลือกเดียว</option>' +
            '<option>เลือกได้หลายตัวเลือก</option>' +
            '</select>' +
            '</div>' +
            '<div class="form-group col-md-3">' +
            '<label for="">คำตอบที่ 1</label>' +
            '<input type="text" name="test_ans1[]" id=""' +
            'class="form-control" placeholder="Answer 1">' +
            '</div>' +
            '<div class="form-group col-md-3">' +
            '<label for="">คำตอบที่ 2</label>' +
            '<input type="text" name="test_ans2[]" id=""' +
            'class="form-control" placeholder="Answer 2">' +
            '</div>' +
            '<div class="form-group col-md-3">' +
            '<label for="">คำตอบที่ 3</label>' +
            '<input type="text" name="test_ans3[]" id=""' +
            'class="form-control" placeholder="Answer 3">' +
            '</div>' +
            '<div class="form-group col-md-3">' +
            '<label for="">คำตอบที่ 4</label>' +
            '<input type="text" name="test_ans4[]" id=""' +
            'class="form-control" placeholder="Answer 4">' +
            '</div>' +
            '<div class="col-md-12">' +
            '<button type="button" id="btn-' + (questionId + 1) + '" onclick="addQuestion(' + (questionId + 1) + ')" class="float-right btn btn-success btn-xs btn-block">' +
            '<i class="fa fa-plus-square-o"></i> เพิ่มคำถาม' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>'
        );
    }

    function delQuestion(questionId) {
        $("#question-" + questionId).remove();
    }
</script>
@endpush
