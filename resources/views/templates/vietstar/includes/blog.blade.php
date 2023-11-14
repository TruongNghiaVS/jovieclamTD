
<?php
// dd($dataDraw);
// $data = $dataDraw["blogs"];
$data = $dataDraw;
$category = $data["category"];
$heading = $data["category"]->heading;
$blogs = $data["blogs"]->items();


// foreach ($blogs as $value) {
//     echo "$value->heading";
// }


?>


<div class="blog-content">
    <!-- <section id="blog-content main-log"> -->
    <!-- <div class="container"> -->

    <!-- Blog start -->
    <!-- <div class="row gy-3">

                <div class="col-sm-6 col-md-8 ">
                    <div class="figure">
                        <a href="" class="figure-images"><img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/09/website-nang-cap-ban-than.jpg" alt=""></a>
                        <div class="figcaption">
                            <h2 class="figcaption__category-name"><a href="#">THỊ TRƯỜNG LAO ĐỘNG</a></h2>
                            <div class="figcaption__title big"><a href="#">Tìm việc trực tuyến an toàn và cảnh giác
                                    trước
                                    các công việc nhẹ lương cao</a></div>
                            <div class="figcaption__content big">
                                <p>TOP 5 website nâng cấp bản thân sau sẽ giúp bạn học &#8722 hiểu &#8722 nghe &#8722
                                    chia sẻ &#8722 thể
                                    hiện &#8722 tìm kiếm cơ hội của chính mình nhiều hơn. Từ đó, Việc Làm 24h mong rằng
                                    trên
                                    hành trình ấy, bạn sẽ vừa nâng cấp được tri thức, tăng cường bản lĩnh, trau dồi thêm
                                    kỹ

                                    Lợi dụng kẻ hở của sự tự do trên internet, nhiều kẻ lừa đảo đã mạo danh, thậm chí
                                    giả danh các công ty uy tín bằng nhiều hình thức tinh vi, hòng lừa gạt tiền bạc, lấy
                                    cắp thông tin cá nhân với các mô tả công việc hoàn hảo. Hãy cảnh giác bảo vệ bản
                                    thân trước các công việc đáng ngờ ngay nhé!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="row justify-content-center g-3">
                        <div class="col-12">
                            <div class="figure">
                                <a href="" class="figure-images"><img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/09/website-nang-cap-ban-than.jpg" alt=""></a>
                                <div class="figcaption">
                                    <h3 class="figcaption__category-name"><a href="#">THỊ TRƯỜNG LAO ĐỘNG</a></h3>
                                    <div class="figcaption__title"><a href="#">Tìm việc trực tuyến an toàn và cảnh
                                            giác trước
                                            các công việc nhẹ lương cao</a></div>

                                </div>
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="figure">
                                <a href="" class="figure-images"><img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/09/website-nang-cap-ban-than.jpg" alt=""></a>
                                <div class="figcaption">
                                    <h3 class="figcaption__category-name"><a href="#">THỊ TRƯỜNG LAO ĐỘNG</a></h3>
                                    <div class="figcaption__title"><a href="#">Tìm việc trực tuyến an toàn và cảnh
                                            giác trước
                                            các công việc nhẹ lương cao</a></div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> -->
    <!-- </div> -->
    <!-- </section> -->
    <section id="secondary-blog-content">
        <div class="container">
            <div class="head-box" bis_skin_checked="1">
                <div class="cb-title" bis_skin_checked="1">
                    <h2 ><a href="{{url('/')}}/blog/category/{{$category -> slug }}" class ="blog-heading" title="Bí quyết tìm việc">{{$heading}}</a></h2>
                </div>
                
            </div>
            <div class="row align-items-start ">

            
                @foreach($blogs as $blog)
                <div class="col-sm-12 col-md-6 col-lg-3  mb-4 ">
                    <div class="figure">
                        <a href="{{url('/')}}/blog/cau-chuyn-chn-ngh" class="figure-images">
                            @if($blog-> image) 
                            <img src="{{url('/')}}/uploads/blogs/{{ $blog-> image }}" alt="{{$blog->heading}}">
                            @else 
                            <img src="{{ asset('/') }}/admin_assets/no-image.png" alt="{{ $blog->heading}}">
                            @endif
                        </a>
                        <div class="figcaption">
                            <h3 class="figcaption__category-name"><a href="{{url('/')}}/blog/category/{{$category -> slug }}">{{$heading}}</a></h3>
                            <div class="figcaption__title"><a href="{{url('/')}}/blog/{{ $blog-> slug }}">{{ $blog-> heading}} </a></div>

                        </div>
                    </div>
                </div>
                @endforeach


                <!-- <div class="col-sm-12 col-md-6 col-lg-3  mb-4 ">
                    <div class="figure">
                        <a href="" class="figure-images"><img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/08/do-loi.jpg" alt=""></a>
                        <div class="figcaption">
                            <h3 class="figcaption__category-name"><a href="#">KỸ NĂNG CÔNG SỞ</a></h3>
                            <div class="figcaption__title"><a href="#">Tìm việc trực tuyến an toàn và cảnh
                                    giác trước
                                    các công việc nhẹ lương cao</a></div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3  mb-4 ">
                    <div class="figure">
                        <a href="" class="figure-images"><img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/08/ket-ban-voi-dong-nghiep.jpg" alt=""></a>
                        <div class="figcaption">
                            <h3 class="figcaption__category-name"><a href="#">THỊ TRƯỜNG LAO ĐỘNG</a></h3>
                            <div class="figcaption__title"><a href="#">Những nguyên tắc ngầm khi giao tiếp, kết bạn với
                                    đồng nghiệp nơi công sở </a></div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12  col-md-6 col-lg-3  mb-4 ">
                    <div class="figure">
                        <a href="" class="figure-images"><img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/07/flex-la-gi.jpg" alt=""></a>
                        <div class="figcaption">
                            <h3 class="figcaption__category-name"><a href="#">KỸ NĂNG CÔNG SỞ</a></h3>
                            <div class="figcaption__title"><a href="#">Flex là gì? Làm sao thoát flexing đồng nghiệp hay
                                    khoe khoang?</a></div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12col-md-6 col-lg-3  mb-4 ">
                    <div class="figure">
                        <a href="" class="figure-images"><img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/08/do-loi.jpg" alt=""></a>
                        <div class="figcaption">
                            <h3 class="figcaption__category-name"><a href="#">KỸ NĂNG CÔNG SỞ</a></h3>
                            <div class="figcaption__title"><a href="#">Tìm việc trực tuyến an toàn và cảnh
                                    giác trước
                                    các công việc nhẹ lương cao</a></div>

                        </div>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6 col-lg-3  mb-4 ">
                    <div class="figure">
                        <a href="" class="figure-images"><img src="https://nghenghiep.vieclam24h.vn/wp-content/uploads/2023/08/ket-ban-voi-dong-nghiep.jpg" alt=""></a>
                        <div class="figcaption">
                            <h3 class="figcaption__category-name"><a href="#">THỊ TRƯỜNG LAO ĐỘNG</a></h3>
                            <div class="figcaption__title"><a href="#">Những nguyên tắc ngầm khi giao tiếp, kết bạn với
                                    đồng nghiệp nơi công sở </a></div>

                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <div class="show-more" bis_skin_checked="1"><a href="#" class="btn btn-secondary show-more-btn bg-white " title="Bí quyết tìm việc">Xem thêm <em class="mdi mdi-arrow-right"></em></a></div> -->
        </div>
    </section>
</div>
