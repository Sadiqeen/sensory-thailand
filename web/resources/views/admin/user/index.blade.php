@extends('layouts.parent')

@section('content')
<div class="alert alert-info text-center">
    <strong>ผู้ใช้ทั้งหมด</strong>
</div>
@include('layouts.flash-message')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive-md table-striped">
                    <table class="table" id="manage_users">
                        <thead>
                            <tr>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>อายุ</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>อีเมลล์</th>
                                <th>ดำเนินการ</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script>
$(function() {
    $('#manage_users').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('users.index') }}',
        columns: [
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'age', name: 'age' },
            { data: 'phone_number', name: 'phone_number' },
            { data: 'email', name: 'email' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
