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
            <div class="progress mb-4">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%"
                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="card">
                <div class="card-header">ข้อมูลทั่วไป</div>
                <div class="card-body row">
                    <div class="form-group col-md-12">
                        <label for="">วิธีการทดสอบ</label>
                        <select class="form-control" name="" id="">
                            <option>9-point hedonic scaling</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">ชื่อการทดสอบ</label>
                        <input type="text" name="test_name" id="" class="form-control @error('test_name') is-invalid @enderror" placeholder="Test Name">
                        @error('test_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">อธิบายเกี่ยวกับการทดสอบ</label>
                        <textarea name="test_description" id="" class="form-control @error('test_description') is-invalid @enderror" cols="30" rows="3"
                            placeholder="Test Description"></textarea>
                        @error('test_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
