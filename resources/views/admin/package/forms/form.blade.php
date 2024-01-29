{!! APFrmErrHelp::showOnlyErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_title') !!}"> {!! Form::label('package_title', 'Tên Gói', ['class' => 'bold']) !!}
        {!! Form::text('package_title', null, array('class'=>'form-control', 'id'=>'package_title', 'placeholder'=>'Tên Gói')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'package_title') !!} </div>
    @php
        $language = \App::getLocale();
        $currency = \App\Country::where('lang', $language)->first()->currency ?? 'vnd';
        $curr = isset($package) ? $package->currency : $currency
    @endphp
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_price') !!}"> {!! Form::label('package_price', 'Đơn giá gói ('.$curr.')', ['class' => 'bold']) !!}
        {!! Form::text('package_price', null, array('class'=>'form-control', 'id'=>'package_price', 'placeholder'=>'Đơn giá gói')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'package_price') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_num_days') !!}"> {!! Form::label('package_num_days', 'Thời hạn gói', ['class' => 'bold']) !!}
        {!! Form::text('package_num_days', null, array('class'=>'form-control', 'id'=>'package_num_days', 'placeholder'=>'Thời hạn gói')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'package_num_days') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_num_listings') !!}"> {!! Form::label('package_num_listings', 'Số lượng bài đăng cho gói*', ['class' => 'bold']) !!}
        {!! Form::text('package_num_listings', null, array('class'=>'form-control', 'id'=>'package_num_listings', 'placeholder'=>'Số lượng bài đăng cho gói')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'package_num_listings') !!}
        *Bao nhiêu việc làm Người tìm việc có thể xin<br />
        **Bao nhiêu việc Đơn vị tuyển dụng có thể đăng </div>

    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_for') !!}">
        {!! Form::label('package_for', 'Dùng cho?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $package_for_1 = 'checked="checked"';
            $package_for_2 = '';
            $package_for_3 = '';
            if (old('package_for', ((isset($package)) ? $package->package_for : 'job_seeker')) == 'employer') {
                $package_for_1 = '';
                $package_for_2 = 'checked="checked"';
                $package_for_3 = '';
            }
            if (old('package_for', ((isset($package)) ? $package->package_for : 'cv_search')) == 'cv_search') {
                $package_for_1 = '';
                $package_for_2 = '';
                $package_for_3 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="job_seeker" name="package_for" type="radio" value="job_seeker" {{$package_for_1}}>
                Người tìm việc </label>
            <label class="radio-inline">
                <input id="employer" name="package_for" type="radio" value="employer" {{$package_for_2}}>
                Đơn vị tuyển dụng </label>
            <label class="radio-inline">
                <input id="cv_search" name="package_for" type="radio" value="cv_search" {{$package_for_3}}>
                Tìm Cv </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'package_for') !!}
    </div>
    <div class="form-actions"> {!! Form::button(__('Update'). ' ', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!} </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('#package_price').on('keypress', function (event) {
            return isNumber(event, this)
        });
        $('#package_num_days').on('keypress', function (event) {
            return isNumber(event, this)
        });
        $('#package_num_listings').on('keypress', function (event) {
            return isNumber(event, this)
        });

        $("#package_price").on({
            keyup: function() {
                formatCurrency($(this));
            }
        });


    });

    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") { return; }

        // original length
        var original_len = input_val.length;

        // initial caret position
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = left_side + "." + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = input_val;

            // final formatting
            if (blur === "blur") {
                input_val += ".00";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>
@endpush
