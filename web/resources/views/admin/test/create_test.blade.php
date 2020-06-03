@extends('layouts.parent')

@section('content')
<div class="alert alert-info text-center">
    <strong>เพิ่มการทดสอบใหม่!</strong>
</div>
@include('layouts.flash-message')
<form action="{{ route('test.store') }}" method="post">
    <div class="row">
        @csrf
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">เพิ่มคำถาม</div>
                <div class="card-body row">
                    <div class="form-group col-md-7">
                        <label for="">คำถามที่ 1</label>
                        <input type="text" name="" id="" class="form-control" placeholder="Enter question">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">ภาพประกอบ</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">เลือกไฟล์</label>
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label for=""></label>
                        <button class="btn btn-success btn-block" id="btn-0" onclick="addQuestion(0)"><i class="fa fa-plus-square-o"></i></button>
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
    }
    

    function delQuestion(questionId) {
        $("#question-" + questionId).remove();
    }
</script>
@endpush
