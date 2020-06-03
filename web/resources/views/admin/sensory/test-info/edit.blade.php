@extends('layouts.parent')

@section('content')
<div class="alert alert-info text-center">
    <strong>เพิ่มการทดสอบใหม่!</strong>
</div>
@include('layouts.flash-message')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">1. ข้อมูลทั่วไป</a>
            <a href="#" class="list-group-item list-group-item-action disabled">2. คำถามก่อนการทดสอบ</a>
            <a href="#" class="list-group-item list-group-item-action disabled">3. คำถามในการทดสอบ</a>
        </div>
    </div>
    <div class="col-md-8">
        <form action="{{ route('test-info.store') }}" method="post">
            <div class="row">
                @csrf
                <div class="col-md-12 mb-3">
                @include('admin.sensory.test-info.form')

                <!-- submit -->
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="{{ route('dashboard') }}">ยกเลิก</a>
                            <button class="btn btn-success float-right">ต่อไป <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
