@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Cẩm nang')])
<!-- Inner Page Title end -->
<section class="section-handbook" id="blog-content">
    <div class="container">

        <!-- Blog start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Blog List start -->
                <div class="blogwrapper">
                    <div class="blogList">
                        <div class="row">
                            @if(count($CmsContent) > 0)
                            @foreach($CmsContent as $value)
                            <div class="col-xl-3 col-lg-4 col-md-4 mb-3">
                                <a class="bloginner" href="{{route('blog-detail',$value->slug)}}">
                                    <div class="postimg"><img
                                            src="{{ asset($value->page_image) }}"
                                            alt="{{ $value->page_title }}" title="{{ $value->page_title }}"></div>

                                    <div class="post-header li-text">
                                        
                                        <h4><span class="li-head" >{{ $value->page_title }}</span> </h4>
                                        
                                    </div>

                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagiWrap">
                    <nav aria-label="Page navigation example">
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 d-none">

                <div class="sidebar">
                    <!-- Search -->
                    <div class="widget">
                        <h5 class="widget-title">Tìm kiếm</h5>
                        <div class="search">
                            <form action="https://jobvieclam.vn/blog/search" method="GET">
                                <input type="text" class="form-control" placeholder="Tìm kiếm" name="search">
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Categories -->
                    <div class="widget">
                        <h5 class="widget-title">Danh mục</h5>
                        <ul class="categories" style="list-style-type:none">
                            <li><a href="https://jobvieclam.vn/blog/category/Bí Quyết Tìm Việc">Bí Quyết Tìm
                                    Việc</a>
                            </li>
                            <li><a href="https://jobvieclam.vn/blog/category/Thị Trường - Xu Hướng">Thị Trường - Xu
                                    Hướng</a>
                            </li>
                            <li><a href="https://jobvieclam.vn/blog/category/Góc Thư Giãn">Góc Thư Giãn</a>
                            </li>
                            <li><a href="https://jobvieclam.vn/blog/category/Tiện Ích">Tiện Ích</a>
                            </li>
                            <li><a href="https://jobvieclam.vn/blog/category/Góc Báo Chí">Góc Báo Chí</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5"></div>
    </div>
</section>
@include('templates.vietstar.includes.footer')
@endsection