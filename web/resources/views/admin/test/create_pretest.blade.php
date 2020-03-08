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
            @if ( old('question') )
            @foreach (old('question') as $item)
            <div class="card @if(!$loop->first) mt-3 @endif" id="question-{{ $loop->index }}">
                <div class="card-body row">
                    <div class="form-group col-md-8">
                        <label for="">คำถาม</label>
                        <input type="text" name="question[]" id="" class="form-control @error('question.'.$loop->index) is-invalid @enderror" value="{{ old('question')[$loop->index] }}" placeholder="Question">
                        @error('question.'.$loop->index)
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! str_replace( 'question.'.$loop->index, 'question', $message ) !!}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">รูปแบบการเลือก</label>
                        <select class="form-control" name="test_choice[]" id="">
                            <option value="1" @if(old('test_choice')[$loop->index] == 1) selected @endif>เลือกได้หลายตัวเลือก</option>
                            <option value="2" @if(old('test_choice')[$loop->index] == 2) selected @endif>เลือกได้ตัวเลือกเดียว</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 1</label>
                        <input type="text" name="answer1[]" id="" class="form-control @error('answer1.'.$loop->index) is-invalid @enderror" value="{{ old('answer1')[$loop->index] }}" placeholder="Answer 1" >
                        @error('answer1.'.$loop->index)
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! str_replace( 'answer1.'.$loop->index, 'answer', $message ) !!}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 2</label>
                        <input type="text" name="answer2[]" id="" class="form-control @error('answer2.'.$loop->index) is-invalid @enderror" value="{{ old('answer2')[$loop->index] }}" placeholder="Answer 2" >
                        @error('answer2.'.$loop->index)
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! str_replace( 'answer2.'.$loop->index, 'answer', $message ) !!}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 3</label>
                        <input type="text" name="answer3[]" id="" class="form-control @error('answer3.'.$loop->index) is-invalid @enderror" value="{{ old('answer3')[$loop->index] }}" placeholder="Answer 3" >
                        @error('answer3.'.$loop->index)
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! str_replace( 'answer3.'.$loop->index, 'answer', $message ) !!}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 4</label>
                        <input type="text" name="answer4[]" id="" class="form-control @error('answer4.'.$loop->index) is-invalid @enderror" value="{{ old('answer4')[$loop->index] }}" placeholder="Answer 4" >
                        @error('answer4.'.$loop->index)
                        <span class="invalid-feedback" role="alert">
                            <strong>{!! str_replace( 'answer4.'.$loop->index, 'answer', $message ) !!}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        @if ($loop->last)
                        <button type="button" id="btn-{{ $loop->index }}" onclick="addQuestion({{ $loop->index }})"
                            class="float-right btn btn-success btn-xs btn-block">
                            <i class="fa fa-plus-square-o"></i> เพิ่มคำถาม
                        </button>
                        @else
                        <button type="button" id="btn-{{ $loop->index }}" onclick="delQuestion({{ $loop->index }})"
                            class="float-right btn btn-danger btn-xs btn-block">
                            <i class="fa fa-trash-o"></i> ลบคำถาม
                        </button>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="card" id="question-0">
                <div class="card-body row">
                    <div class="form-group col-md-8">
                        <label for="">คำถาม</label>
                        <input type="text" name="question[]" id="" class="form-control" placeholder="Question" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlSelect1">รูปแบบการเลือก</label>
                        <select class="form-control" name="test_choice[]" id="">
                            <option value="1">เลือกได้หลายตัวเลือก</option>
                            <option value="2">เลือกได้ตัวเลือกเดียว</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 1</label>
                        <input type="text" name="answer1[]" id="" class="form-control" placeholder="Answer 1" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 2</label>
                        <input type="text" name="answer2[]" id="" class="form-control" placeholder="Answer 2" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 3</label>
                        <input type="text" name="answer3[]" id="" class="form-control" placeholder="Answer 3">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">คำตอบที่ 4</label>
                        <input type="text" name="answer4[]" id="" class="form-control" placeholder="Answer 4">
                    </div>
                    <div class="col-md-12">
                        <button type="button" id="btn-0" onclick="addQuestion(0)"
                            class="float-right btn btn-success btn-xs btn-block">
                            <i class="fa fa-plus-square-o"></i> เพิ่มคำถาม
                        </button>
                    </div>
                </div>
            </div>
            @endif
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
            '<input type="text" name="question[]" id=""' +
            'class="form-control" placeholder="Question">' +
            '</div>' +
            '<div class="form-group col-md-4">' +
            '<label for="exampleFormControlSelect1">รูปแบบการเลือก</label>' +
            '<select class="form-control" name="test_choice[]" id="">' +
            '<option value="1">เลือกได้หลายตัวเลือก</option>' +
            '<option value="2">เลือกได้ตัวเลือกเดียว</option>' +
            '</select>' +
            '</div>' +
            '<div class="form-group col-md-3">' +
            '<label for="">คำตอบที่ 1</label>' +
            '<input type="text" name="answer1[]" id=""' +
            'class="form-control" placeholder="Answer 1">' +
            '</div>' +
            '<div class="form-group col-md-3">' +
            '<label for="">คำตอบที่ 2</label>' +
            '<input type="text" name="answer2[]" id=""' +
            'class="form-control" placeholder="Answer 2">' +
            '</div>' +
            '<div class="form-group col-md-3">' +
            '<label for="">คำตอบที่ 3</label>' +
            '<input type="text" name="answer3[]" id=""' +
            'class="form-control" placeholder="Answer 3">' +
            '</div>' +
            '<div class="form-group col-md-3">' +
            '<label for="">คำตอบที่ 4</label>' +
            '<input type="text" name="answer4[]" id=""' +
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
