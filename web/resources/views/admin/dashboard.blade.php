@extends('layouts.parent')

@section('content')
    <!-- Start Content -->
    <!-- user -->
    <div class="alert alert-primary text-center" role="alert">
        <strong>บัญชีผู้ใช้</strong>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="#" class="text-center btn btn-block bg-white border">
                <div class="py-3">
                    <i class="fa fa-user-plus fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">เพิ่มบัญชีผู้ใช้</span>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="#" class="text-center btn btn-block bg-white border">
                <div class="py-3">
                    <i class="fa fa-users fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">จัดการบัญชีผู้ใช้</span>
                </div>
            </a>
        </div>
    </div>
    <!-- Test -->
    <div class="alert alert-success text-center mt-3" role="alert">
        <strong>การทดสอบ</strong>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="#" class="text-center btn btn-block bg-white border">
                <div class="py-3">
                    <i class="fa fa-plus-square fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">สร้างการทดสอบใหม่</span>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="#" class="text-center btn btn-block bg-white border">
                <div class="py-3">
                    <i class="fa fa-cogs fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">จัดการการทดสอบ</span>
                </div>
            </a>
        </div>
    </div>
    <!-- Organization -->
    <div class="alert alert-warning text-center mt-3" role="alert">
        <strong>องค์กร</strong>
    </div>
    <div class="row">
        <div class="col-md-8">
            <a href="#" class="text-center btn btn-block bg-white border">
                <div class="py-3">
                    <i class="fa fa-university fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">จัดการองค์กร</span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="text-center btn btn-block bg-white border">
                <div class="py-3">
                    <i class="fa fa-database fa-3x" aria-hidden="true"></i><br/>
                    <span class="card-title">Migrate Database</span>
                </div>
            </a>
        </div>
    </div>
    <!-- End Content -->
@endsection
