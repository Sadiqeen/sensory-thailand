@extends('layouts.parent')

@section('content')
<!-- Start Content -->
<div class="alert alert-info text-center">
    <strong>แก้ไขผู้ใช้</strong>
</div>
@include('layouts.flash-message')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">ชื่อ</label>
                        <input type="text" name="first_name" id=""
                            class="form-control @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name') ? old('first_name') : $user->first_name }}"
                            placeholder="First Name">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">นามสกุล</label>
                        <input type="text" name="last_name" id=""
                            class="form-control @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name') ? old('last_name') : $user->last_name }}"
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
                            class="form-control @error('age') is-invalid @enderror"
                            value="{{ old('age') ? old('age') : $user->age }}" placeholder="Age">
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
                            value="{{ old('phone_number') ? old('phone_number') : $user->phone_number }}"
                            placeholder="Phone Number">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">อีเมลล์</label>
                        <input type="email" name="email" id="" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') ? old('email') : $user->email }}" placeholder="E-mail">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-secondary" type="button" data-toggle="modal"
                            data-target="#reset_password">รีเซ็ตรหัสผ่าน</button>
                        <button type="submit" class="btn btn-success float-right">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reset_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('user.reset_password', $user->id) }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">รีเซ็ตรหัสผ่าน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    รหัสผ่านของผู้ใช้จะถูกเปลี่ยนแปลง
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">ตกลง</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection
