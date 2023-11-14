@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Cover Letter Example')])
<!-- Inner Page Title end -->

<section class="section-cover-letter">
    <div class="container">
        <h2 class="section-title mb-3">{{ __('Top Cover Letter in 2022') }}</h2>
        <div class="description mb-5">
            Các mẫu Cover Letter được thiết kế theo chuẩn, theo các ngành nghề. Phù hợp với dinh viên và người đi làm.
        </div>
        <div class="row">
            @if(count($cover_letter) > 0)
            @foreach ($cover_letter as $value)
            <div class="col-md-4 col-lg-3 col-sm-6 col-12">
                <div class="cover-letter">
                    <div class="pic">
                        <img src="{{ asset($value->image_thumbnail) }}" alt="{{ $value->name }}">
                    </div>

                    <div class="content">
                        <a href="{{ asset($value->image_main) }}" rel="rel1"
                            class="btn btn-view btn-view-cover-letter"><span class="iconmoon icon-eye-icon"></span> Xem
                            trước</a>
                        <a href="{{ asset($value->file_path) }}" download="" class="btn btn-download"><span class="iconmoon icon-downloads"></span>
                            Tải về</a>
                    </div>
                </div>
            </div> 
            @endforeach
            @endif
        </div>
    </div>
</section>

@include('templates.vietstar.includes.footer')
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/vietstar/vendors/simplelightbox/dist/simple-lightbox.css')}}">
@endpush
@push('scripts')
<script src="{{ asset('/vietstar/vendors/simplelightbox/dist/simple-lightbox.min.js')}}"></script>
<script src="{{ asset('/vietstar/vendors/simplelightbox/dist/simple-lightbox.legacy.min.js')}}"></script>
<script src="{{ asset('/vietstar/vendors/simplelightbox/dist/simple-lightbox.jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var gallery = $('.btn-view-cover-letter').simpleLightbox({
            animationSpeed: 250,
            fadeSpeed: 300
        });
    });
</script>
@endpush