@extends('templates.vietstar.layouts.app')
@section('content') 
<!-- Header start --> 
@include('templates.vietstar.includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Salary Calculator')])
@include('flash::message')
@include('templates.vietstar.includes.inner_top_search')
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <form action="{{route('job.list')}}" method="get">
            <!-- Search Result and sidebar start -->
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <!-- Search List -->
                    <div class="salary-calculator-modal">
                        <div class="modal-title">
                            <h3>Bảng Tính Lương Mẫu (Gross <em class="mdi mdi-arrow-right"> </em>NET)</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-calculate">
                                <div class="form-group currency row">
                                    <div class="col-lg-12">
                                        <div class="radio-group">
                                            <div class="frm-radio">
                                                <input type="radio" id="vnd" name="currency" value="vnd">
                                                <label for="vnd">VNĐ</label>
                                            </div>
                                            <div class="frm-radio">
                                                <input type="radio" id="usd" name="currency" value="usd">
                                                <label for="usd">USD</label>
                                            </div>
                                            <div class="currency" style="display:none;" id="divCurrency">
                                                <span class="fl_left">1 USD = </span><input type="text" name="default_usd" id="default_usd" value="23000" readonly="">
                                                <a class="refesh" href="javascript:void(0);" onclick="refeshValue();"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8"></div>
                                </div>
                                <div class="form-group salary-total row">
                                    <div class="col-lg-4">
                                        <label for="">Tổng Lương</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="gross_salary_adv" class="auto" id="gross_salary_adv" value="Nhập mức lương tổng – VNĐ" data-a-sep="," data-a-dec=".">
                                            <span class="input-group-addon"><span id="span_unit">VNĐ</span> (Thu nhập chịu thuế)</span> </div>
                                    </div>
                                    <div class="row" style="display:none;" id="divChangeSalary">
                                        <label><span id="span_salary" style="padding-left:139px;"></span><input type="hidden" name="change_salary" id="change_salary" value="0"><span>&nbsp;VNĐ</span></label>
                                    </div>
                                </div>
                                <div class="form-group salary-total row">
                                    <div class="col-lg-4">
                                        <label for="">Trợ cấp</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="allowances_salary" class="auto" id="allowances_salary" value="Nhập trợ cấp - VNĐ" onfocus="javascript:if(this.value=='Nhập trợ cấp - VNĐ') this.value='';" onblur="if(this.value=='') this.value='Nhập trợ cấp - VNĐ';" data-a-sep="," data-a-dec=".">
                                            <span class="input-group-addon">VNĐ (Không tính thuế)</span> </div>
                                    </div>
                                </div>
                                <div class="form-group form-title">
                                    <h4>Bảo Hiểm</h4>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <div class="radio-group">
                                            <div class="frm-radio">
                                                <input type="radio" id="full-wage" name="chkFullWage" value="1" checked="checked">
                                                <label for="full-wage">Trên lương chính thức</label>
                                            </div>
                                            <div class="frm-radio">
                                                <input type="radio" id="other" name="chkFullWage" value="2">
                                                <label for="other">Khác</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" disabled="disabled" class="auto" name="fullwageOther" id="fullwageOther" data-a-sep="," data-a-dec=".">
                                            <span class="input-group-addon">VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="row" style="display:none;">
                                        <label class="label_1">Mức trần BHXH</label>
                                        <div class="fl_left">
                                            <input type="text" class="input_medium align_right" value="26,000,000" readonly="" disabled="disabled">
                                            <span class="result">VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="row" style="display:none;">
                                        <label class="label_1">Lương tối thiểu</label>
                                        <div class="fl_left">
                                            <input type="text" class="input_medium align_right" value="1490000" name="minium_wage" id="minium_wage">
                                            <span class="result">VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">Loại lao động</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="select-group">
                                            <select name="training_worker" id="training_worker">
                                                <option value="1"> Đã qua đào tạo</option>
                                                <option value="2"> Chưa qua đào tạo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">BHXH</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="social" id="social" value="8" readonly="" disabled="disabled" style="color: black;">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">BHYT</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="health" id="health" value="1.5" readonly="" disabled="disabled" style="color: black;">
                                            <span class="input-group-addon">%</span> </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">Thất nghiệp</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="unemployed" id="unemployed" value="1" readonly="" disabled="disabled" style="color: black;">
                                            <span class="input-group-addon">%</span> </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <div>
                                            <input style="width:auto;height:auto" type="checkbox" name="chkTradeUnion" id="chkTradeUnion" value="1" checked="checked">
                                            <label for="trade-union">Công đoàn</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="trade_union" id="trade_union" value="1" style="color: black;">
                                            <span class="input-group-addon">%</span> </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">Vùng</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="select-group">
                                            <select name="region" id="region">
                                                <option value="1"> Vùng 1</option>
                                                <option value="2"> Vùng 2</option>
                                                <option value="3"> Vùng 3</option>
                                                <option value="4"> Vùng 4</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">Giá trị tối thiểu của Vùng</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="region_min_value" id="region_min_value" class="auto" value="0" readonly="" disabled="disabled">
                                            <span class="input-group-addon">VNĐ</span> </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">Mức trần BHTN</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="region_value" id="region_value" class="auto" value="0" readonly="" disabled="disabled">
                                            <span class="input-group-addon">VNĐ</span> </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">Giảm trừ cá nhân</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="reduct_personal" id="reduct_personal" value="11000000" readonly="" disabled="disabled">
                                            <span class="input-group-addon">VNĐ</span> </div>
                                    </div>
                                </div>
                                <div class="form-group form-title">
                                    <h4>Giảm trừ gia cảnh</h4>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">Số người phụ thuộc</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="select-group">
                                            <select name="num_of_depend_adv" id="num_of_depend_adv">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">Giảm trừ gia cảnh</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="reduct_family" id="reduct_family" value="0" readonly="" disabled="disabled">
                                            <span class="input-group-addon">VND</span> </div>
                                    </div>
                                </div>
                                <div class="form-group form-button row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-8">
                                        <div class="button-group">
                                            <div class="calculate"><a class="btn-gradient" href="javascript:void(0)" onclick="calSalary(2);">Tính lương NET</a></div>
                                            <!-- <div class="cancel"><a class="btn-cancel" href="javascript:void(0)" data-fancybox-close>Hủy</a></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-foot">
                            <p><strong style="color:red">Ghi chú:</strong></p>
                            <p>- Những số này chỉ là ước tính thu nhập tạm thời hàng tháng.</p>
                            <p>- Đơn vị tiền tệ tính bằng <strong style="color:red">VNĐ</strong> (Việt Nam Đồng).</p>
                            <p>- Không áp dụng cho người nước ngoài đang công tác tại Việt Nam.</p>

                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-sm-6 pull-right">
                    <!-- Sponsord By -->
                    <div class="sidebar">
                        <h4 class="widget-title">{{__('Sponsord By')}}</h4>
                        <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div style="display: none">
    <div id="SalaryResult" class="wrapDialog msgbox">
        <h1>Chi tiết lương VNĐ</h1>
        <div class="container">
            <div class="st_gird">
                <table cellspacing="0" cellpadding="0" class="tblJob CoreGeneral">
                    <tbody>
                    <tr class="header">
                        <td width="60%" class="pad_left20">Tên</td>
                        <td align="right" class="pad_right10">Giá trị</td>
                    </tr>
                    <tr class="record bg">
                        <td class="pad_left20"><strong>Lương GROSS</strong></td>
                        <td align="right" class="pad_right10"><strong class="red" id="gross_salary_result">0</strong></td>
                    </tr>
                    <tr class="record">
                        <td class="pad_left20">Loại lao động</td>
                        <td align="right" class="pad_right10"><span id="training_worker_result">&nbsp;</span></td>
                    </tr>
                    <tr class="record bg">
                        <td class="pad_left20">BHXH</td>
                        <td align="right" class="pad_right10">-<span id="socical_result">0</span></td>
                    </tr>
                    <tr class="record">
                        <td class="pad_left20">BHYT</td>
                        <td align="right" class="pad_right10">-<span id="health_result">0</span></td>
                    </tr>
                    <tr class="record bg">
                        <td class="pad_left20">Bảo hiểm thất nghiệp</td>
                        <td align="right" class="pad_right10">-<span id="unemployed_result">0</span></td>
                    </tr>
                    <tr class="record">
                        <td class="pad_left20">Phí công đoàn</td>
                        <td align="right" class="pad_right10">-<span id="trade_union_result">0</span></td>
                    </tr>
                    <tr class="record bg">
                        <td class="pad_left20"><strong>Thu nhập trước thuế</strong></td>
                        <td align="right" class="pad_right10"><span class="red" id="salary_tax">0</span></td>
                    </tr>
                    <tr class="record">
                        <td class="pad_left20">Giảm trừ cá nhân</td>
                        <td align="right" class="pad_right10">-<span id="reduct_personal_result">0</span></td>
                    </tr>
                    <tr class="record bg">
                        <td class="pad_left20">Giảm trừ gia cảnh</td>
                        <td align="right" class="pad_right10">-<span id="reduct_family_result">0</span></td>
                    </tr>
                    <tr class="record">
                        <td class="pad_left20"><strong>Thu nhập chịu thuế</strong></td>
                        <td align="right" class="pad_right10"><strong class="red" id="tax_income">0</strong></td>
                    </tr>
                    <tr class="record bg">
                        <td class="pad_left20">Thuế thu nhập cá nhân</td>
                        <td align="right" class="pad_right10">-<span id="personal_income_tax">0</span></td>
                    </tr>
                    <tr class="record">
                        <td class="pad_left20"><strong>Lương NET</strong> (Thu nhập sau thuế)</td>
                        <td align="right" class="pad_right10"><strong class="red" id="total_result">0</strong></td>
                    </tr>
                    <tr class="record bg">
                        <td class="pad_left20">Trợ cấp</td>
                        <td align="right" class="pad_right10"><span id="total_allowances">0</span></td>
                    </tr>
                    <tr class="record">
                        <td class="pad_left20"><strong>Tổng thu nhập</strong></td>
                        <td align="right" class="pad_right10"><strong class="red" id="total_result_finished">0</strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            {{--
            <ul class="ActionCtrl">
                <li class="download"><a href="javascript:void(0);" id="btn_export">Tải về</a></li>
                <li class="print"><a href="javascript:void(0);" onclick="$('.ActionCtrl').hide();printDiv('SalaryResult');$('.ActionCtrl').show();">In</a></li>
                <li style="float:right;"><a href="#" target="_blank">Hướng Dẫn Tính Lương</a></li>
            </ul>
            --}}
        </div>
    </div>
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')

<style type="text/css">
    .searchList li .jobimg {
        min-height: 80px;
    }
    .hide_vm_ul{
        height:100px;
        overflow:hidden;
    }
    .hide_vm{
        display:none !important;
    }
    .view_more{
        cursor:pointer;
    }
</style>

<link rel="stylesheet" href="{{ asset('/css/salary-cal-modal.css') }}">
<link href="{{ asset('/css/jquery.fancybox.min.css') }}" rel="stylesheet">

@endpush
@push('scripts') 
<script>
$('.btn-job-alert').on('click', function() {
    @if(Auth::user())
    $('#show_alert').modal('show');
    @else
    swal({
        title: "{{ __('Save job alert') }}",
        text: "{{__('You must be logged in to save job alert')}}",
        icon: "{{__('error')}},
        buttons: {
        Login: "{{__('Login')}}",
        register: "{{__('Register')}}",
        hello: "OK",
      },
});
    @endif
})
     $(document).ready(function ($) {
        $("#search-job-list").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("#search-job-list").find(":input").prop("disabled", false);
        $(".view_more_ul").each(function () {
            if ($(this).height() > 100)
            {
                $(this).addClass('hide_vm_ul');
                $(this).next().removeClass('hide_vm');
            }
        });
        $('.view_more').on('click', function (e) {
            e.preventDefault();
            $(this).prev().removeClass('hide_vm_ul');
            $(this).addClass('hide_vm');
        });
    });
    if ($("#submit_alert").length > 0) {
    $("#submit_alert").validate({
        rules: {
            email: {
                required: true,
                maxlength: 5000,
                email: true
            }
        },
        messages: {
            email: {
                required: "{{__('Please enter your email')}}",
            }
        },
        submitHandler: function(form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('subscribe.alert')}}",
                type: "GET",
                data: $('#submit_alert').serialize(),
                success: function(response) {
                    $("#submit_alert").trigger("reset");
                    $('#show_alert').modal('hide');
                    swal({
                        title: "Success",
                        text: response["msg"],
                        icon: "success",
                        button: "OK",
                    });
                }
            });
        }
    })
}
 $(document).on('click','.swal-button--Login',function(){
        window.location.href = "{{route('login')}}";
     })
     $(document).on('click','.swal-button--register',function(){
        window.location.href = "{{route('register')}}";
     })
</script>
@include('templates.vietstar.includes.country_state_city_js')

<script src="{{asset('/')}}js/jquery.min.js"></script>
<script src="{{asset('/')}}js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}js/jquery.scrollTo.min.js"></script>
<script src="{{asset('/')}}js/jquery.fancybox.min.js"></script>
<script src="{{asset('/')}}js/jquery.formatCurrency-1.4.0.js"></script>
<script src="{{asset('/')}}js/autoNumeric.js"></script>
<script src="{{asset('/')}}js/widget_function_cb.js"></script>

{{--$.getScript("{{asset('/')}}js/autoNumeric.js", function( data, textStatus, jqxhr ){});
$.getScript("{{asset('/')}}js//widget_function_cb.js", function( data, textStatus, jqxhr ){ }); --}}
<script>
    var arrRange = [5000000,10000000,18000000,32000000,52000000,80000000];
    var arrRangeMinus = [0,250000,750000,1650000,3250000,5850000,9850000];
    var arrRegionMinSalary = [0,4420000,3920000,3430000,3070000];
    var arrRegionMaxSalary = [0,88400000,78400000,68600000,61400000];
    var config_basic_salary = 1490000;
    var config_salary = 20*parseInt(config_basic_salary);
    var config_max_unemployed = 20*parseInt(arrRegionMinSalary[1]);
    var config_salary_unemployed = arrRegionMaxSalary[1];
    var config_min_salary_unemployed = arrRegionMinSalary[1];
    var _language = {
        msg_gross_salary_in_VND:'Nhập mức lương tổng – VNĐ',
        msg_gross_salary_in_USD:'Nhập mức lương tổng – USD',
        msg_please_enter_gross_salary:'Vui lòng nhập lương tổng',
        msg_number_of_dependants:'Số người phụ thuộc',
        msg_please_enter_num_of_dependants:'Nhập số người phụ thuộc',
        msg_unemployed_default:'1',
        msg_trade_union_default:'1',
        msg_please_enter_fullwage_other:'Vui lòng nhập giá trị lương khác',
        msg_reduct_family_default:'4400000',
        msg_num_of_depend_limit:'Số người phụ thuộc vượt giới hạn cho phép',
        msg_vnd:'VNĐ',
        msg_usd:'USD',
        msg_trained_worker:'Đã qua đào tạo',
        msg_not_trained_worker:'Chưa qua đào tạo'
    }

    function formatNumber(n) {
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
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
                right_side += "";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = left_side + "," + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = input_val;

            // final formatting
            if (blur === "blur") {
                input_val += "";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
    $(document).ready(function () {
        $('.widget-5 .widget-body .title h4').on('click', function () {
            $.fancybox.open($(".salary-calculator-modal"));
        })
        $("input[data-type='currency']").on({
            keyup: function () {
                formatCurrency($(this));
            },
            blur: function () {
                formatCurrency($(this), "blur");
            }
        });
        $("#gross_salary_adv").on({
            keyup: function() {
                formatCurrency($(this));
            }
        });
        $("#allowances_salary, #fullwageOther").on({
            keyup: function() {
                formatCurrency($(this), "blur");
            }
        });


    });



        if(typeof LANGUAGE == 'undefined')
            var LANGUAGE = 'vi';
        if(typeof CURRENT_LANGUAGE == 'string')
            var LANGUAGE = CURRENT_LANGUAGE;
        var public_url = "{{asset('/js')}}";

        function htmlJsonpCallback(data)
        {
            $('#frm_calc_dynamic_talentnetwork').html(data);
        }
        function init_widget_cb(_url)
        {
            $.ajax({
                url: _url+'/'+LANGUAGE+'/widget/salary-cb',
                jsonp: "callback",
                dataType: "jsonp",
                jsonpCallback: "htmlJsonpCallback"
            })
        }

        function init_widget_cb_salary(_url)
        {
            $.ajax({
                url: _url+'/'+LANGUAGE+'/widget/salary-cb?layout=salary',
                jsonp: "callback",
                dataType: "jsonp",
                jsonpCallback: "htmlJsonpCallback"
            })
        }

        function init_widget_cb_new(_url)
        {
            $.ajax({
                url: _url+'/'+LANGUAGE+'/widget/salary-cb-new',
                jsonp: "callback",
                dataType: "jsonp",
                jsonpCallback: "htmlJsonpCallback"
            })
        }

        function init_widget_cb_salary_new(_url)
        {
            $.ajax({
                url: _url+'/'+LANGUAGE+'/widget/salary-cb-new?layout=salary',
                jsonp: "callback",
                dataType: "jsonp",
                jsonpCallback: "htmlJsonpCallback"
            })
        }

        function init_widget_cb_salary_advance(_url)
        {
            $.ajax({
                url: _url+'/'+LANGUAGE+'/widget/salary-cb-advance?layout=salary',
                jsonp: "callback",
                dataType: "jsonp",
                jsonpCallback: "htmlJsonpCallback"
            })
        }



</script>
@endpush
