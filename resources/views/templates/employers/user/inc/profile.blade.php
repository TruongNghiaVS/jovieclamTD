{!! Form::model($user, array('method' => 'put', 'route' => array('put.my.profile'), 'class' => 'form form-user-profile',
'files'=>true)) !!}

<div class="user-account-section">
    <div class="formpanel mt0"> @include('flash::message')
        <!-- Personal Information -->
        @include('templates.employers.user.inc.user_avatar')
    </div>
</div>

<div class="user-account-section section">
    <div class="formpanel mt0"> @include('flash::message')
        <!-- Personal Information -->
        @include('templates.employers.user.inc.account_infomation')
    </div>
</div>


<div class="user-account-section ">
    <div class="formpanel mt0"> @include('flash::message')
        <!-- Personal Information -->
        @include('templates.employers.user.inc.personal_infomation')
    </div>
</div>


<div class="user-account-section">
    <div class="formpanel mt0"> @include('flash::message')
        <!-- Personal Information -->
        @include('templates.employers.user.inc.career_infomation')
    </div>
</div>

<!-- <div class="row">
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'is_subscribed') !!}">
            {{<?php
            $is_checked = 'checked="checked"';
            if (old('is_subscribed', ((isset($user)) ? $user->is_subscribed : 1)) == 0) {
                $is_checked = '';
            }
            ?>
}}            <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
            {{__('Đăng ký nhận tin tức mới')}}
            {!! APFrmErrHelp::showErrors($errors, 'is_subscribed') !!}
        </div>
    </div>
    <div class="col-md-12 col-lg-12">
        <div class="formrow">
            <button type="submit" class="btn btn-primary btn-save-profile">{{__('Cập nhật và Lưu hồ sơ')}}</button>
        </div>
    </div>
</div> -->
{!! Form::close() !!}
<div class="formrow formrow-border-top"></div>
@push('styles')
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script type="text/javascript">
    // js chosen dropdown select
    $(".chosen").chosen();
    $(document).ready(function() {
        initdatepicker();

        $("#current_salary, #expected_salary").on({
            keyup: function() {
                formatCurrency($(this));
            }
        });


        $('#salary_currency').typeahead({
            source: function(query, process) {
                return $.get("{{ route('typeahead.currency_codes') }}", {
                    query: query
                }, function(data) {
                    console.log(data);
                    data = $.parseJSON(data);
                    return process(data);
                });
            }
        });
        $('#country_id').on('change', function(e) {
            e.preventDefault();
            $('#country_id').val({{$user->country_id ?? ""}}).trigger('chosen:updated');
            filterStates(0);});
        $(document).on('change', '#state_id', function(e) {
            e.preventDefault();
            filterCities(0);
        });
        filterStates(<?php echo old('state_id', $user->state_id); ?>);
        /*******************************/
        var fileInput = document.getElementById("image");
        if (fileInput) {
            
            fileInput.addEventListener("change", function(e) {
                var files = this.files
                showThumbnail(files)
            }, false)
            var fileInput_cover_image = document.getElementById("cover_image");
            fileInput_cover_image.addEventListener("change", function(e) {
                var files_cover_image = this.files
                showThumbnail_cover_image(files_cover_image)
            }, false)
        }

        function showThumbnail(files) {
            $('#thumbnail').html('');
            for (var i = 0; i < files.length; i++) {
                var file = files[i]
                var imageType = /image.*/
                if (!file.type.match(imageType)) {
                    console.log("Not an Image");
                    continue;
                }
                var reader = new FileReader()
                reader.onload = (function(theFile) {
                    return function(e) {
                        $('#thumbnail').append('<div class="fileattached"><img height="100px" src="' + e
                            .target.result + '" > <div>' + theFile.name +
                            '</div><div class="clearfix"></div></div>');
                    };
                }(file))
                var ret = reader.readAsDataURL(file);
            }
        }

        function showThumbnail_cover_image(files) {
            $('#thumbnail_cover_image').html('');
            for (var i = 0; i < files.length; i++) {
                var file = files[i]
                var imageType = /image.*/
                if (!file.type.match(imageType)) {
                    console.log("Not an Image");
                    continue;
                }
                var reader = new FileReader()
                reader.onload = (function(theFile) {
                    return function(e) {
                        $('#thumbnail_cover_image').append(
                            '<div class="fileattached"><img height="100px" src="' + e.target
                            .result + '" > <div>' + theFile.name +
                            '</div><div class="clearfix"></div></div>');
                    };
                }(file))
                var ret = reader.readAsDataURL(file);
            }
        }
    });

    function filterStates(state_id) {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.default.states.dropdown') }}", {
                    country_id: country_id,
                    state_id: state_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                .done(function(response) {
                    $('#state_dd').html(response);
                    filterCities(<?php echo old('city_id', $user->city_id); ?>);
                });
        }
    }

    function filterCities(city_id) {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.default.cities.dropdown') }}", {
                    state_id: state_id,
                    city_id: city_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                .done(function(response) {
                    $('#city_dd').html(response);
                });
        }
    }

    function initdatepicker() {
        $(".datepicker").datepicker({
            autoclose: true,
            format: 'yyyy-m-d'
        });
    }

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
        if (input_val === "") {
            return;
        }

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