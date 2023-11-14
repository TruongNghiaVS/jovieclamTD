$(document).ready(function () {
    if ($('.bs-picker').length) {
        $(".bs-picker").datetimepicker({
            language: 'en',
            container: 'body',
            format: 'dd/mm/yyyy',
        });
    }
    viewMoreFilter();
    swiperSlider();
})

function viewMoreFilter() {
    $('.btn-viewmore').on('click', function () {
        var _filter = $(this).attr('data-filter');
        var _parent = $(this).parents('element-filter');
    })
}

function swiperSlider() {
    if ($('.employer-customer .swiper-container-multirow').length) {
        var swiperEmployerCustomer = new Swiper('.employer-customer .swiper-container-multirow', {
            slidesPerView: 6,
            grid: {
                rows: 2,
            },
            spaceBetween: 0,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }

    if ($('.all-product-customer-reviews .swiper-container').length) {
        var swiperProductCustomerReviews = new Swiper('.all-product-customer-reviews .swiper-container', {
            slidesPerView: 3,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }
    if ($('.all-product-banner .swiper-container').length) {
        var swiperProductBanner = new Swiper('.all-product-banner .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }

}