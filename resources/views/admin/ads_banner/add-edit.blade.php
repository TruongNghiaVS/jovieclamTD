@extends('admin.layouts.admin_layout')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                <li><a href="{{ route('admin.home') }}">{{ __('Home') }}</a> <i class="fa fa-circle"></i></li>
                <li><span>{{ $edit == true ? __('Edit Ads') : __('Add Ads') }}</span></li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <br/>
        @include('flash::message')
        <div class="row">
            <div class="col-md-12 clearfix">
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-settings font-dark"></i> <span
                                    class="caption-subject font-dark sbold uppercase">{{ __('Ads Details') }}</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <input type="hidden" id="number_ad" value="{{ $edit ? count($ads) : 1 }}">
                        @if ($edit && count($ads))
                            {!! Form::open(['route' => 'update.ad-banner', 'method' => 'post', 'files'=>true,'method'=>'post']) !!}
                            <div id="ad-containter">
                                @foreach ($ads as $key => $ad)
                                <div id="ad_{{ $key + 1 }}">
                                    @if ($key > 0)
                                        <h3><span class="ad_banner_image">#{{ $key + 1 }}: Ad {{ $key + 1 }}</span>&nbsp
                                            <a class="delete_ad text-danger" data-id="{{ $ad->id }}">
                                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                            </a>
                                        </h3>
                                    @else
                                        <h3><span class="ad_banner_image">#{{ $key + 1 }}: Ad {{ $key + 1 }}</span>&nbsp;
                                            <a class="delete_ad text-danger">
                                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                            </a>
                                        </h3>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">{{ __('Ad Image') }} <span
                                                            class="required">*</span></label>
                                                {!! Form::label(__('Ad Image')) !!}
                                                {!! Form::input('file','image[]',null, ['class'=>'form-control input-solid','required'=>true, 'title'=>"Choose a video please"]) !!}
                                                <a href="{{ Storage::disk('local')->url('public/uploads/ads_banner/'). $ad->image }}">
                                                    {{$ad->image}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="row">
                                <div class="float-left pull-left">
                                    <button type="submit" class="btn btn-primary" id="add_ad">
                                        {{ __('+ Add Ad') }}
                                    </button>
                                </div>
                                <div class="float-right pull-right">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['route' => 'store.ad-banner', 'method' => 'post', 'files'=>true, 'method'=>'post']) !!}
                            <div id="ad-containter">
                                <div id="ad_1">
                                    <h3>
                                        <span class="ad_banner_image">#1: Ad 1</span>
                                        <a class="delete_ad text-danger">
                                            <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                        </a>
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('name',__('Ad Image')) !!}
                                                {!! Form::input('file','image[]',null,['class'=>'form-control input-solid','required'=>true, 'title'=>"Choose a video please"]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="float-left pull-left">
                                    <button type="submit" class="btn btn-primary" id="add_ad">
                                        {{ __('+ Add Ad') }}
                                    </button>
                                </div>
                                <div class="float-right pull-right">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#add_ad').on('click', function (event) {
                event.preventDefault();
                let adNo = $('#number_ad').val();
                adNo++;
                let adObj = $("#ad_1").clone();
                adObj.attr('id', 'ad_' + adNo);

                let adTitle = adObj.find('.ad_banner_image');
                adTitle.text("#" + adNo + ": Ad " + adNo);
                let adLink = adObj.find('a');
                adLink.attr('href', '#').text('');

                let deleteAd = adObj.find('.delete_ad');
                let circle = '<i class="fa fa-minus-circle" aria-hidden="true"></i>';
                deleteAd.attr('class', 'delete_ad text-danger').html(circle);

                let imageObj = adObj.find('input[name="image[]"]');
                imageObj.attr('name', 'image[]');
                imageObj.val('');
                $('#number_ad').val(adNo);
                $('#ad-containter').append(adObj);
            });
            // Delete ad
            $(document).on('click', '.delete_ad', function (event) {
                event.preventDefault();
                $(this).parent().parent().remove();
            });
        });
    </script>
@endpush
