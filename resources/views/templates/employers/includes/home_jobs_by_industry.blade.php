
<section class="section-jobs-by-industry">
    <div class="container">
        <h2 class="section-title text-center mb-3 text-primary">Việc Làm Theo Ngành Nghề</h2>
        <div class="swiper-container jobs-by-industry_swiper">
            <div class="swiper-wrapper">
                @foreach(collect($industries)->chunk(1) as $chunk)
                    <div class="swiper-slide industry-slide-box">
                        @foreach($chunk as $k => $industry) 
                            <div class="industry-slide-box__item">
                                <div class="item">
                                    <div class="iner__box-icon">
                                        <img src="https://static.careerbuilder.vn/themes/careerbuilder/images/png/22.png" alt="">
                                    </div>
                                    <div class="iner__box-desc">
                                        <h3>{{$industry}}</h3>
                                        <span>({{number_format(random_int(1000,5660),0)}} việc làm)</span>
                                    </div>
                                </div>
                                <a title="Nhân sự" href="{{route('job.list').'?fe_industry_id='.$k}}"  class="link"></a>
                            </div>
                        @endforeach
                    </div>
                    
                    
                @endforeach
               




                <!-- @foreach(collect($industries)->chunk(8) as $chunk)
                    <div class="swiper-slide">
                        <div class="row">
                            @foreach($chunk as $k => $industry)
                                <div class="col-12 col-xs-6 col-md-4 col-lg-3">
                                    <a class="job-industry" href="{{route('job.list').'?fe_industry_id='.$k}}" value="{{$k}}">
                                        <div class="icon">
                                            <span class="iconmoon icon-office-building-icon"></span>
                                        </div>
                                        <h3 class="title-job">{{$industry}}</h3>
                                        <div class="job-copunt">({{number_format(random_int(1000,5660),0)}} việc làm)</div>
                                    </a>
                                </div>

                            @endforeach
                        </div>
                    </div>

                @endforeach -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

