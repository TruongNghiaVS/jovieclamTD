<section class="header-bar">
    <div class="header-bar-bg">
        <div class="swiper slider-hero-banner">
            @php
            $sliders = \App\Slider::where("type",1)
            ->select([
            'sliders.id', 'sliders.slider_id',
            'sliders.is_active','sliders.used_for','sliders.slider_image','sliders.slider_image_mobile'
            ])->sorted()->get();
            @endphp
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    @if($slider->is_active)

                        <div class="swiper-slide p-0">
                            <div class="is-pc bg-slider" style="background-image: url({{'slider_images/'.$slider->slider_image}});"></div>
                            <div class="is-sp bg-slider" style="background-image: url({{'slider_images/'.$slider->slider_image_mobile}});"></div>
                        </div>
                    @endif
                @endforeach
            </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>