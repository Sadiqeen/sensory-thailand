@extends('layouts.parent')

@section('content')
<!-- Start Content -->
<div class="alert alert-info text-center">
    <strong>เพิ่มผู้ใช้ใหม่</strong>
</div>
@include('layouts.flash-message')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="">ชื่อ</label>
                        <input type="text" name="first_name" id=""
                            class="form-control @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name') }}" placeholder="First Name">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">นามสกุล</label>
                        <input type="text" name="last_name" id=""
                            class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"
                            placeholder="Last Name">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">อายุ</label>
                        <input type="number" min="10" max="100" name="age" id=""
                            class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}"
                            placeholder="Age">
                        @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">เบอร์โทรศัพท์</label>
                        <input type="text" min="10" max="10" name="phone_number" id=""
                            class="form-control @error('phone_number') is-invalid @enderror"
                            value="{{ old('phone_number') }}" placeholder="Phone Number">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">อีเมลล์</label>
                        <input type="email" name="email" id=""
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="E-mail">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">จัดการผู้ใช้</a>
                        <button type="submit" name="addUser" class="btn btn-success float-right">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection
