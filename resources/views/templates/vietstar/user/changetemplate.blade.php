@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->

<!-- Inner Page Title end -->
@include('templates.vietstar.includes.mobile_dashboard_menu')

<div class="user-wrapper">

    @include('flash::message')
    @include('templates.vietstar.includes.default_sidebar_menu')

    <div class="template-wrapper content">
        <div class="row">
            <div class="col-md-9">
                <div class="formpanel mt0 load_message"></div>
            </div>
            <div class="col-md-3">
                <div class="group-button-cv-template ">
                    {{-- <button type="button" hidden class="btn btn-light" data-toggle="modal" data-target="#modalViewCV">Xem
                            CV Template</button> --}}
                    <button type="button" class="btn btn-light"
                        onclick="Download_CV();">{{ __('Download CV') }} </button>

                    <button type="submit" class="btn btn-primary"
                        onclick="Convert_HTML_To_PDF();">{{ __('Save this CV') }} </button>
                </div>
            </div>
        </div>

        <!-- Form luu thông tin CV TEMPLATE -->
        <!-- KHi lựa chọn các option jquery sẽ thêm giá trị vào input -->
        <input type="hidden" id="cv_template" name="cv_template" value="{{ $cv_template->name_template }}">
        <input type="hidden" id="cv_lang" name="cv_lang" value="{{ $cv_template->lang }}">
        <input type="hidden" id="cv_font_size" name="cv_font_size" value="{{ $cv_template->font_size }}">
        <!-- ./Form luu thông tin CV TEMPLATE -->


        <div class="row">
            <div class="col-tools">
                <div class="tools-schemes">
                    <div class="head-tools">
                        <div class="image">
                            <img src="{{ asset('/vietstar/imgs/i9.png') }}" alt="vietstar" />
                        </div>
                        <h4 class="head-title">Công cụ</h4>
                        <button type="button" class="tips" data-toggle="modal" data-target="#suggestionsModal">
                            <i class="iconmoon far fa-lightbulb-exclamation"></i>Gợi ý
                        </button>

                    </div>
                    <div class="body-tools">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="list-tools">
                                    <div class="item-tools">
                                        <div class="title-tools">
                                            <h3>Mẫu CV</h3>
                                        </div>
                                        <div class="template">
                                            <div class="name">
                                                <p id="cv_template_name">Template <span
                                                        class="templateNumber">{{ $cv_template->name_template }}</span>
                                                </p>
                                            </div>
                                            <div class="change"><a href="javascript:void(0);" data-toggle="modal"
                                                    data-target="#modalChooseTemplate" class="btn-change-template">Đổi
                                                    Mẫu</a></div>
                                        </div>
                                    </div>

                                    <!--  <div class="item-tools">
                                                        <div class="title-tools">
                                                            <h3>Cover CV</h3>
                                                        </div>
                                                        <div class="cover-cv">
                                                            <div class="name">
                                                                <p>CV thêm trang bìa thu hút sự chú ý hơn</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-check form-check-cover-cv form-switch mb-0">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCVCover" value="1">
                                                            <label class="form-check-label" for="flexSwitchCVCover">&nbsp;</label>
                                                        </div>
                                                        <div class="image-cover-cv showImgCover"><img src="https://static.careerbuilder.vn/themes/cv_tool/images/template/image-01.jpg" alt=""></div>
                                                    </div> -->

                                    <div class="item-tools">
                                        <div class="title-tools">
                                            <h3>Ngôn ngữ</h3>
                                        </div>
                                        <div class="language">
                                            <div class="form-group">
                                                <label>Hơn 80% Nhà tuyển dụng ưa thích CV tiếng Anh</label>
                                                <select class="form-select" name="cv_language" id="cv_language">
                                                    <option value="vi"
                                                        {{ $cv_template->lang == 'vi' ? 'selected="selected"' : '' }}>
                                                        Tiếng Việt</option>
                                                    <option value="en"
                                                        {{ $cv_template->lang == 'en' ? 'selected="selected"' : '' }}>
                                                        Tiếng Anh</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-tools">
                                        <div class="title-tools">
                                            <h3>Cỡ chữ</h3>
                                        </div>
                                        <div class="list-font-size">
                                            <div class="font-size font-size-12">
                                                <input type="radio" class="radio-font" name="fontSize" id="fontSize12"
                                                    value="12" {{ $cv_template->font_size == 12 ? 'checked' : '' }}>
                                                <span class="label-fontsize">A</span>
                                            </div>
                                            <div class="font-size font-size-14">
                                                <input type="radio" class="radio-font" name="fontSize" id="fontSize14"
                                                    value="14" {{ $cv_template->font_size == 14 ? 'checked' : '' }}>
                                                <span class="label-fontsize">A</span>
                                            </div>
                                            <div class="font-size font-size-16">
                                                <input type="radio" class="radio-font" name="fontSize" id="fontSize16"
                                                    value="16" {{ $cv_template->font_size == 16 ? 'checked' : '' }}>
                                                <span class="label-fontsize">A</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-template">
                <div class="tools-schemes show-template" id="show_template">
                    @include('templates.vietstar.user.templates.template_' .
                    $cv_template->name_template)
                </div>
            </div>
        </div>
    </div>



</div>


@include('templates.vietstar.user.templates.modal_suggestions')
@include('templates.vietstar.user.templates.modal_choose_template')
@include('templates.vietstar.user.templates.modal_view_cv')

@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
.userccount p {
    text-align: left !important;
}
</style>
@endpush
@push('scripts')
@include('templates.vietstar.includes.immediate_available_btn')

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script type="text/javascript">
var template_id = 1;

function show_template(template_id) {
    $.ajax({
        type: "GET",
        url: "{{ route('show.template') }}",
        data: {
            '_token': $('input[name=_token]').val(),
            'template_id': template_id
        },
        success: function(res) {
            $(".show-template").empty();
            $(".show-template").append(res.html);
            // applyStyleCV();
            applyCVLangue($('#cv_lang').val());
            applyCVFontsize($('#cv_font_size').val());
        }
    })
}

function Download_CV() {
    var elementHTML = document.getElementById('show_template');
    // Final file name
    let fileName = "CV-" + '{{ $user->first_name.'
    '.$user->middle_name.'
    '.$user->last_name }}' + ".pdf";

    // Assuming "pages" is an array of HTML elements or strings that are separate pages:
    let pages = [];
    $('#show_template').each(function() {
        pages.push($(this)[0]);
    });

    let worker = html2pdf().from(pages[0]).set({
        margin: 10,
        filename: fileName,
        html2canvas: {
            scale: 2
        },
        jsPDF: {
            orientation: 'portrait',
            unit: 'pt',
            format: 'a4',
            compressPDF: true
        }
    }).toPdf();
    worker.save()
}



function Convert_HTML_To_PDF() {
    var elementHTML = document.getElementById('show_template');
    // Final file name
    let fileName = "CV-" + '{{ $user->first_name.'
    '.$user->middle_name.'
    '.$user->last_name }}' + ".pdf";

    // Assuming "pages" is an array of HTML elements or strings that are separate pages:
    let pages = [];
    $('#show_template').each(function() {
        pages.push($(this)[0]);
    });

    let worker = html2pdf().from(pages[0]).set({
        margin: 0,
        filename: fileName,
        html2canvas: {
            scale: 2
        },
        jsPDF: {
            orientation: 'portrait',
            unit: 'pt',
            format: 'a4',
            compressPDF: true
        }
    }).toPdf();
    // worker.save()
    pages.slice(1).forEach(function(page) {
        worker = worker.get('pdf').then(function(pdf) {
            pdf.addPage();
        }).from(page).toContainer().toCanvas().toPdf();
    });

    worker = worker.output("datauristring").then(function(pdf) {

        const variable_1 = "x";
        const variable_2 = "y";

        const preBlob = dataURItoBlob(pdf);
        const file = new File([preBlob], fileName, {
            type: 'application/pdf'
        });

        cv_template = $('#cv_template').val();
        cv_font_size = $('#cv_font_size').val();
        cv_lang = $('#cv_lang').val();

        let data = new FormData();
        data.append("_token", '{{ csrf_token() }}');
        data.append("cv_template", cv_template);
        data.append("cv_font_size", cv_font_size);
        data.append("cv_lang", cv_lang);
        data.append("file", file);

        $.ajax({
            method: 'POST',
            url: "{{ route('update.template') }}",
            data: data,
            processData: false,
            contentType: false,
            success: function(json) {
                $(".load_message").html(json.html);
            }
        });
    });

    function dataURItoBlob(dataURI) {
        // convert base64/URLEncoded data component to raw binary data held in a string
        var byteString;
        if (dataURI.split(',')[0].indexOf('base64') >= 0)
            byteString = atob(dataURI.split(',')[1]);
        else
            byteString = unescape(dataURI.split(',')[1]);

        // separate out the mime component
        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

        // write the bytes of the string to a typed array
        var ia = new Uint8Array(byteString.length);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }

        return new Blob([ia], {
            type: mimeString
        });
    }

};
</script>
@endpush