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
            <input type="text" name="test_name" id="" class="form-control @error('test_name') is-invalid @enderror" value="{{ isset($test_info) ? $test_info['test_name'] : '' }}" placeholder="Test Name">
            @error('test_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-12">
            <label for="">อธิบายเกี่ยวกับการทดสอบ</label>
            <textarea name="test_description" id="" class="form-control @error('test_description') is-invalid @enderror" cols="30" rows="3" placeholder="Test Description">{{ isset($test_info) ? $test_info['test_description'] : '' }}</textarea>
            @error('test_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
</div>
