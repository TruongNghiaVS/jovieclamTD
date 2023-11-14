@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Online Application')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        @if ($errors->has('cv_id')) <span class="help-block"> <strong>{{ $errors->first('cv_id') }}</strong> </span> @endif
        @include('flash::message')
        <div class="apply-application-form">
            <div class="row">
                <div class="col-md-5 col-lg-5 order-md-2">
                    <div class="job-information">
                        <h3 class="title title-underline">{{__('Job Information') }}</h3>
                        <table>
                            <tr>
                                <th>{{__('Job title')}}</th>
                                <td>{{$job->title}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Company')}}</th>
                                <td>{{__($company->name)}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Job location')}}</th>
                                <td>{{$city->city}}</td>
                            </tr>
                            <tr>
                                <th>{{__("Expiry Date")}}</th>
                                <td>{{date('d-m-Y', strtotime($job->expiry_date))}}</td>
                            </tr>
                            <tr>
                                <th>{{__("Application method")}}</th>
                                <td>{{__('Online Application')}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">Nhà tuyển dụng sẽ nhận trực tiếp hồ sơ thông qua hệ thống ngay khi hoàn tất ứng tuyển. Ứng viên vui lòng không liên hệ qua email và số điện thoại.</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 order-md-1">
                    {!! Form::open(['route' => ['post.apply.job', $job_slug], 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'apply_job_form', "enctype" =>"multipart/form-data"]) !!}
                        <div class="submit-application-form">
                            <h3 class="title title-underline">{{__('Application for')}}: <span>{{__($job->title)}}</span></h3>
                            <div class="mb-2">
                                Điền thông tin liên hệ của bạn và chọn hồ sơ để ứng tuyển
                            </div>
                            <h4 class="title-label">Thông tin liên hệ của bạn</h4>

                            <div class="form-group">
                                <label for="inputFullName">{{__("Full Name")}}</label>
                                <input type="text" class="form-control" id="inputFullName" readonly value="{{auth()->user()->last_name . auth()->user()->middle_name . auth()->user()->first_name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="text" class="form-control" id="inputEmail" readonly value="{{auth()->user()->email}}">
                            </div>
                            <h4 class="title-label"> {{__('Your profile')}}</h4>
                            <div class="box-cv mb-5">
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="your_resume" id="your_resume1" value="0" checked>
                                    <input class="form-check-input" type="hidden" name="cv_id" id="cv_id" value="{{$myCv->id ?? ''}}">
                                    <label class="form-check-label" for="your_resume1">
                                        {{__('Use your profile')}}
                                    </label>
                                </div>
                                <div class="form-check-cv">
                                    {{__('Would you like')}} <a href="{{route('my.profile')}}">{{__('Create new profile')}}</a>?
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="your_resume" id="your_resume2" value="1">
                                    <label class="form-check-label" for="your_resume">
                                        {{__('Upload your resume with format of *.doc, *.docx, *.pdf and not more than')}} {{ $maxFileSize}} {{__('MB')}}
                                    </label>
                                </div>
                                <div class="form-check-upload mb-3">
                                    <div class="list-choose">
                                        <div class="group-action">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="customFile">
                                                <input class="form-check-input" type="hidden" name="cv_id_2" value="{{$myCv->id ?? ''}}">
                                                <label class="custom-file-label btn-choose-file" for="customFile"><i class="fas fa-desktop"></i>
                                                    {{__('Pick from computer')}}</label><span id="custom-file-name"></span>
                                            </div>
                                            {{-- <button class="btn  btn-choose-file btn-dropbox" type="button"><span class="iconmoon icon-icons8-dropbox"></span>
                                                {{__("Pick from Dropbox")}}</button> --}}
                                        </div>
                                        {{__("No profile yet? Create your professional CV for free at JobsPortal.vn")}}
                                    </div>
                                    <div class="notice box-noti">
                                        <p class="name"><strong>Lưu ý:</strong></p>
                                        <p>Trong trường hợp bạn gặp phải bất kỳ vấn đề gì trong quá trình thực hiện như tải hồ sơ không thành công hoặc không nhấn được nút Gửi hồ sơ, vui lòng kiểm tra lại nguyên nhân và thử các bước gợi ý sau.</p>
                                        <ul>
                                            <li>Hệ thống hiện chỉ hỗ trợ một tập tin được tải lên có các <strong>định dạng .doc, .docx hoặc .pdf</strong></li>
                                            <li>Nếu bạn có nhiều loại bằng cấp hay giấy tờ khác muốn đính kèm thêm, <strong>vui lòng gộp chung vào một tập tin theo đúng định dạng với tổng dung lượng không vượt quá {{ $maxFileSize}} {{__('MB')}}</strong></li>
                                            <li><strong>Nâng cấp trình duyệt đang sử dụng lên phiên bản mới nhất</strong> (Firefox: 57 trở lên, Cốc Cốc: 75 trở lên, Microsoft Edge: MEdge 44 trở lên, Internet Explorer: 11 trở lên, Safari: 13.1 trở lên)</li>
                                            <li>Vào phần thiết lập của trình duyệt để<strong> tắt chức năng chặn quảng cáo (Ads Block)</strong></li>
                                            <li>Chụp ảnh màn hình cùng mô tả cụ thể và gửi về bộ phận chăm sóc ứng viên: <a href="mailto:support@vietstargroup.vn" class="passChk"><b>support@vietstargroup.vn<b></b></b></a> để được hỗ trợ thêm
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="chksendletter">
                                    <label class="custom-control-label" for="chksendletter">{{__('Use introduction letter')}}</label>

                                    <a href="javascript: void(0)" data-toggle="modal" data-target="#modalVietNamLetter">[{{__("Vietnamese template")}}]</a>
                                    <a href="javascript: void(0)" data-toggle="modal" data-target="#modalEngLetter">[{{__("English template")}}]</a>
                                    <div class="group-textarea">
                                        <textarea name="letter_content" class="mt-2" id="letter_content" rows="5"></textarea>
                                        <i>{{__('Please limit number of characters under 5000')}}</i>
                                    </div>
                                </div>

                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button class="btn btn-primary pl-3 pr-3" type="submit">{{__("Apply")}}</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('templates.vietstar.user.inc.modal_tempate_letter_content')

@include('templates.vietstar.includes.footer')
@endsection
