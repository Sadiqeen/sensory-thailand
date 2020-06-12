<div class="list-group">
    <a href="{{ route('test-info.create') }}"
        class="list-group-item list-group-item-action {{ request()->routeIs('test-info.create') ? 'active' : '' }}">1.
        ข้อมูลทั่วไป</a>
    <a href="{{ Session::has('sensory_test_info') ? route('pretest.create') : '#' }}"
        class="list-group-item list-group-item-action {{ !Session::has('sensory_test_info') ? 'disabled' : '' }} {{ request()->routeIs('pretest.create') ? 'active' : '' }}">2.
        คำถามก่อนการทดสอบ</a>
    <a href="#"
        class="list-group-item list-group-item-action {{ !Session::has('sensory_questions') ? 'disabled' : '' }}">3.
        คำถามในการทดสอบ</a>
</div>
