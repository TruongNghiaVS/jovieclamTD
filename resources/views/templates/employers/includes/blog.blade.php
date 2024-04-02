
<?php
// dd($dataDraw);
// $data = $dataDraw["blogs"];
$data = $dataDraw;
$category = $data["category"];
$heading = $data["category"]->heading;
$blogs = $data["blogs"]->items();




?>


@section('meta_tags')
    <!-- Meta tag start -->

    <!-- For Facebook -->
    <meta property="og:title" content="{{ $heading }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{url('/')}}/assets/job-detail-share.png" />
    <meta property="og:url" content="{{url('/')}}/tin-tuc/{{$category->slug}}" />
    <meta property="og:description" content="Dễ dàng tìm kiếm công việc mong muốn. Hàng ngàn việc làm Phù hợp được cập nhật mỗi ngày" />

    <!-- For Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{ $heading }}" />
    <meta name="twitter:description" content="Dễ dàng tìm kiếm công việc mong muốn. Hàng ngàn việc làm Phù hợp được cập nhật mỗi ngày" />

    <!-- Meta tag end -->
@endsection


<div class="blog-content">
    
    <section id="secondary-blog-content">
        <div class="container">
            <div class="head-box" bis_skin_checked="1">
                <div class="cb-title" bis_skin_checked="1">
                    <h2 ><a href="{{url('/')}}/tin-tuc/{{$category -> slug }}" class ="blog-heading" title="Bí quyết tìm việc">{{$heading}}</a></h2>
                </div>
                
            </div>
            <div class="row align-items-start ">

            
                @foreach($blogs as $blog)
                <div class="col-sm-12 col-md-6 col-lg-3  mb-4 ">
                    <div class="figure">
                        <a href="{{url('/')}}/tin-tuc/{{$category->slug}}/{{ $blog-> slug }}" class="figure-images">
                            @if($blog-> image) 
                            <img src="{{url('/')}}/uploads/blogs/{{ $blog-> image }}" alt="{{$blog->heading}}">
                            @else 
                            <img src="{{ asset('/') }}/admin_assets/no-image.jpg" alt="{{ $blog->heading}}">
                            @endif
                        </a>
                        <div class="figcaption">
                            {{--<h3 class="figcaption__category-name mb-0"><a href="/tin-tuc/{{$category->slug }}">{{$heading}}</a></h3>--}}
                            <div class="figcaption__title"><a class="mt-0" href="/tin-tuc/{{$category->slug}}/{{ $blog-> slug }}">{{ $blog-> heading}} </a></div>

                        </div>
                    </div>
                </div>
                @endforeach


               
            </div>
            <div class="d-flex justify-content-center">
            {{ $data["blogs"]->links() }}
            </div>
        </div>
    </section>
</div>
