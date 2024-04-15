function showPassword(id) {
    var x = document.querySelector(id);
    var eyeIcon = document.getElementById("eyeIcon");
    if (x.type === "password") {
        x.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        x.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}

const provinces = {
    "data": [
      {
        "_id": "60eaaa6f1173335842c3565c",
        "name": "Hồ Chí Minh",
        "slug": "ho-chi-minh",
        "type": "thanh-pho",
        "name_with_type": "Thành phố Hồ Chí Minh",
        "code": "79",
        "isDeleted": false
      },
      {
        "_id": "60eaaa6f1173335842c3562b",
        "name": "Hà Nội",
        "slug": "ha-noi",
        "type": "thanh-pho",
        "name_with_type": "Thành phố Hà Nội",
        "code": "01",
        "isDeleted": false
      }
    ]
  };


  const districts = {
    "data": [
      {
        "_id": "60eaaa6f1173335842c3536a",
        "name": "Ba Đình",
        "type": "quan",
        "slug": "ba-dinh",
        "name_with_type": "Quận Ba Đình",
        "path": "Ba Đình, Hà Nội",
        "path_with_type": "Quận Ba Đình, Thành phố Hà Nội",
        "code": "001",
        "parent_code": "01",
        "isDeleted": false
      },
      {
        "_id": "60eaaa6f1173335842c3536b",
        "name": "Hoàn Kiếm",
        "type": "quan",
        "slug": "hoan-kiem",
        "name_with_type": "Quận Hoàn Kiếm",
        "path": "Hoàn Kiếm, Hà Nội",
        "path_with_type": "Quận Hoàn Kiếm, Thành phố Hà Nội",
        "code": "002",
        "parent_code": "01",
        "isDeleted": false
      },
      {
        "_id": "60eaaa6f1173335842c3558f",
        "name": "1",
        "type": "quan",
        "slug": "1",
        "name_with_type": "Quận 1",
        "path": "1, Hồ Chí Minh",
        "path_with_type": "Quận 1, Thành phố Hồ Chí Minh",
        "code": "760",
        "parent_code": "79",
        "isDeleted": false
      },
      {
        "_id": "60eaaa6f1173335842c35590",
        "name": "12",
        "type": "quan",
        "slug": "12",
        "name_with_type": "Quận 12",
        "path": "12, Hồ Chí Minh",
        "path_with_type": "Quận 12, Thành phố Hồ Chí Minh",
        "code": "761",
        "parent_code": "79",
        "isDeleted": false
      }
    ]
  };

  const wards = {
    "data": [
      {
        "_id": "60eaaa6e1173335842c343cc",
        "name": "Cống Vị",
        "type": "phuong",
        "slug": "cong-vi",
        "name_with_type": "Phường Cống Vị",
        "path": "Cống Vị, Ba Đình, Hà Nội",
        "path_with_type": "Phường Cống Vị, Quận Ba Đình, Thành phố Hà Nội",
        "code": "00007",
        "parent_code": "001",
        "isDeleted": false
      },
      {
        "_id": "60eaaa6e1173335842c343d1",
        "name": "Điện Biên",
        "type": "phuong",
        "slug": "dien-bien",
        "name_with_type": "Phường Điện Biên",
        "path": "Điện Biên, Ba Đình, Hà Nội",
        "path_with_type": "Phường Điện Biên, Quận Ba Đình, Thành phố Hà Nội",
        "code": "00019",
        "parent_code": "001",
        "isDeleted": false
      },
      {
        "_id": "60eaaa721173335842c368b3",
        "name": "Tân Định",
        "type": "phuong",
        "slug": "tan-dinh",
        "name_with_type": "Phường Tân Định",
        "path": "Tân Định, 1, Hồ Chí Minh",
        "path_with_type": "Phường Tân Định, Quận 1, Thành phố Hồ Chí Minh",
        "code": "26734",
        "parent_code": "760",
        "isDeleted": false
      },
      {
        "_id": "60eaaa721173335842c368b5",
        "name": "Bến Nghé",
        "type": "phuong",
        "slug": "ben-nghe",
        "name_with_type": "Phường Bến Nghé",
        "path": "Bến Nghé, 1, Hồ Chí Minh",
        "path_with_type": "Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh",
        "code": "26740",
        "parent_code": "760",
        "isDeleted": false
      },
      {
        "_id": "60eaaa721173335842c368c6",
        "name": "Đông Hưng Thuận",
        "type": "phuong",
        "slug": "dong-hung-thuan",
        "name_with_type": "Phường Đông Hưng Thuận",
        "path": "Đông Hưng Thuận, 12, Hồ Chí Minh",
        "path_with_type": "Phường Đông Hưng Thuận, Quận 12, Thành phố Hồ Chí Minh",
        "code": "26788",
        "parent_code": "761",
        "isDeleted": false
      },
      {
        "_id": "60eaaa721173335842c368bf",
        "name": "Hiệp Thành",
        "type": "phuong",
        "slug": "hiep-thanh",
        "name_with_type": "Phường Hiệp Thành",
        "path": "Hiệp Thành, 12, Hồ Chí Minh",
        "path_with_type": "Phường Hiệp Thành, Quận 12, Thành phố Hồ Chí Minh",
        "code": "26770",
        "parent_code": "761",
        "isDeleted": false
      },
      {
        "_id": "60eaaa721173335842c368d3",
        "name": "01",
        "type": "phuong",
        "slug": "01",
        "name_with_type": "Phường 01",
        "path": "01, Gò Vấp, Hồ Chí Minh",
        "path_with_type": "Phường 01, Quận Gò Vấp, Thành phố Hồ Chí Minh",
        "code": "26896",
        "parent_code": "764",
        "isDeleted": false
      },
      {
        "_id": "60eaaa721173335842c368d7",
        "name": "03",
        "type": "phuong",
        "slug": "03",
        "name_with_type": "Phường 03",
        "path": "03, Gò Vấp, Hồ Chí Minh",
        "path_with_type": "Phường 03, Quận Gò Vấp, Thành phố Hồ Chí Minh",
        "code": "26902",
        "parent_code": "764",
        "isDeleted": false
      },
      {
      "_id": "60eaaa6e1173335842c343e1",
      "name": "Chương Dương",
      "type": "phuong",
      "slug": "chuong-duong",
      "name_with_type": "Phường Chương Dương",
      "path": "Chương Dương, Hoàn Kiếm, Hà Nội",
      "path_with_type": "Phường Chương Dương, Quận Hoàn Kiếm, Thành phố Hà Nội",
      "code": "00067",
      "parent_code": "002",
      "isDeleted": false
    },
    
    ]
  };


function populateDistricts(selectedCityCode, districtGroup) {
    var districtSelect = districtGroup.find('.districtSelect');
    districtSelect.empty().append('<option value="">Chọn Quận/Huyện</option>');
    var selectedCityDistricts = districts.data.filter(function(district) {
      return district.parent_code === selectedCityCode;
    });
    $.each(selectedCityDistricts, function(index, district) {
      districtSelect.append($('<option></option>').attr('value', district.code).text(district.name_with_type));
    });
    districtGroup.show();
  }

  // Function to populate wards based on selected district
  function populateWards(selectedDistrictCode, wardGroup) {
    var wardSelect = wardGroup.find('.wardSelect');
    wardSelect.empty().append('<option value="">Chọn Phường/Xã</option>');
    var selectedDistrictWards = wards.data.filter(function(ward) {
      return ward.parent_code === selectedDistrictCode;
    });
    $.each(selectedDistrictWards, function(index, ward) {
      wardSelect.append($('<option></option>').attr('value', ward.code).text(ward.name_with_type));
    });
    wardGroup.show();
  }


$(document).ready(function () {
    if ($('.bs-picker').length) {
        $(".bs-picker").datetimepicker({
            language: 'en',
            container: 'body',
            format: 'dd/mm/yyyy',
        });
    }
    if ($('.bs-datetimepicker').length) {
        $(".bs-datetimepicker").datetimepicker({
            language: 'en',
        });
    }
    if ($('.daterange').length) {
        $('.daterange').daterangepicker({
            autoUpdateInput: false,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.daterange').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });
    }

    $('#atcFilters').on('click', function () {
        $('.filters-job-wrapper').slideToggle();
    });


    $('.close-input-filter').on('click', function () {
        $('.filters-job-wrapper').slideToggle();
    });


    $('[data-toggle="tooltip"]').tooltip();
    var cvLang = $('select#cv_language').val();
    var cvFontsize = $('input[type=radio][name=fontSize]').val();
    applyCVFontsize(cvFontsize);
    applyCVLangue(cvLang);
    viewMoreFilter();
    swiperSlider();
    // setPaddingBody();
    multiSelect();
    activeCoverCV();
    formCVTemplate();
    atcApplyJob();
    jobExperienceChange();
    reviewApplication();
    actionSubMenu();
    initdatepicker();
    $(".currency-mask").formatCurrency({
        roundToDecimalPlace: 0,
        symbol: ''
    });
    $(".currency-mask").on("change", function () {
        $(".currency-mask").formatCurrency({
            roundToDecimalPlace: 0,

            symbol: ''
        });
    });
});
$(window).resize(function () {
    // setPaddingBody();
});

function initdatepicker(){
    $(".datepicker").datepicker({
        autoclose: true,
        format:'dd-mm-yyyy',
        locale:'vi',
        language: 'vi',
        
    });
}


function jobExperienceChange() {
    $('body').on('change', '#job_experience_id', function () {
        $('.numberExperience').html(this.value);
    })

}

// Function cho CV TEMPLATE
function formCVTemplate() {

    $('select#cv_language').on('change', function () {
        $('#cv_lang').val(this.value);
        applyCVLangue(this.value)

    });
    $('input[type=radio][name=fontSize]').change(function () {
        $('#cv_font_size').val(this.value);
        applyCVFontsize(this.value);
    });
    $('body').on('click', '.btn-choose-template', function () {
        $('#cv_template').val($(this).attr('data-template'));
        $('.templateNumber').html($(this).attr('data-template'));
        console.log($('#cv_lang').val());
        applyCVLangue($('#cv_lang').val());
        applyCVFontsize($('#cv_font_size').val());
    })
}

function applyCVLangue(lang) {
    console.log(lang);
    switch (lang) {
        case 'en':
            console.log('eng');
            setTimeout(() => {
                $('.cvTemplateEnglish').show();
                $('.cvTemplateVietNam').hide();
            }, 1);
            break;
        case 'vi':
            $('.cvTemplateEnglish').hide();
            $('.cvTemplateVietNam').show();
            break;
        default:
            $('.cvTemplateEnglish').hide();
            $('.cvTemplateVietNam').show();
            break;
    }
}

function applyCVFontsize(size) {
    $('.cv-template-wrapper').removeClass('fontCVsize12').removeClass('fontCVsize14').removeClass('fontCVsize16');
    switch (size) {
        case '12':
            $('.cv-template-wrapper').addClass('fontCVsize12');
            break;
        case '14':
            $('.cv-template-wrapper').addClass('fontCVsize14');
            break;
        case '16':
            $('.cv-template-wrapper').addClass('fontCVsize16');
            break;
        default:
            $('.cv-template-wrapper').addClass('fontCVsize12');
            break;
    }
}


function atcApplyJob() {
    $('input[type=radio][name=your_resume]').change(function () {
        if (this.value == 0) {
            $('.form-check-cv').show();
            $('.form-check-upload').hide();
            $('#cv_id').attr('name', 'cv_id');
        } else if (this.value == 1) {
            $('.form-check-cv').hide();
            $('.form-check-upload').show();
            $('#cv_id').removeAttr('name');
        }
    });

    $('#chksendletter').click(function () {
        if ($(this).prop("checked") == true) {
            $('.group-textarea').show();
        }
        else if ($(this).prop("checked") == false) {
            $('.group-textarea').hide();
        }
    });
}

$(document).on('change', '#customFile', function (event) {
    var fileName = event.target.files[0].name;
    $('#custom-file-name').html(fileName);
});

function activeCoverCV() {
    $('input#flexSwitchCVCover').change(function () {
        if (this.checked) {
            $('.showImgCover').show();
        } else {
            $('.showImgCover').hide();
        }
    });
}

function multiSelect() {
    if ($('.multiselect').length) {
        $('select.multiselect').multiselect({
            search: true,
            selectAll: true,
        });
    }
    if ($(".chosen-select-max-three").length) {
        console.log('abcd');
        $(".chosen-select-max-three").chosen({ max_selected_options: 3 });
    }
}






function setPaddingBody() {
    var h = $('#main-nav').height();
    $('body.default-page main').css('padding-top', '76px')
}

function viewMoreFilter() {
    $('.btn-viewmore').on('click', function () {
        var _filter = $(this).attr('data-filter');
        var _parent = $(this).parents('element-filter');
    })
}

function reviewApplication() {
    $('body').on('click', '.btn-cv-application', function () {
        $('.btn-cv-application').removeClass('active');
        $(this).addClass('active');
        var dataValue = $(this).attr('data-value');
        $('#review-application-status').val(dataValue);
    })


    $('body').on('click', '#btn-copy-link-review-application', function () {
        $('#myInput').select();
        document.execCommand("copy");
        $(this).html('Đã sao chép');
    })


}

function copyToClipboard(text) {
    var sampleTextarea = document.createElement("textarea");
    document.body.appendChild(sampleTextarea);
    sampleTextarea.value = text; //save main text in it
    sampleTextarea.select(); //select textarea contenrs
    document.execCommand("copy");
    console.log(sampleTextarea.value);
    document.body.removeChild(sampleTextarea);
}


function swiperSlider() {
    if ($('.employer-customer .swiper-container-multirow').length) {
        var swiperEmployerCustomer = new Swiper('.employer-customer .swiper-container-multirow', {
            slidesPerView: 2,
            grid: {
                rows: 2,
            },
            spaceBetween: 0,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 4,
                },
                1024: {
                    slidesPerView: 6,
                },
            },
        });
    }

    if ($('.all-product-customer-reviews .swiper-container').length) {
        var swiperProductCustomerReviews = new Swiper('.all-product-customer-reviews .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
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
    if ($('.partnerSlider').length) {
        var partnerSlider = new Swiper('.partnerSlider', {
            autoplay: {
                delay: 5000,
            },
            loop: true,
            speed: 1000,


            breakpoints: {
                320: {
                    slidesPerView: 2.1,
                    spaceBetween: 0, grabCursor: false,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10, grabCursor: false,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 10, grabCursor: false,
                },
            },
        });
    }
    if ($('.swiper-blogs-slider').length) {
        var partnerSlider = new Swiper('.swiper-blogs-slider', {
            slidesPerView: 1,
            autoplay: {
                delay: 5000,
            },
            loop: true,
            speed: 1000,
            spaceBetween: 20,
            pagination: false,
            navigation: false,
            loop: true,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    grabCursor: true,
                },
                567: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    grabCursor: false,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    grabCursor: false,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    grabCursor: false,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                    grabCursor: false,
                },
            },
        });
    }
    if ($('.swiper-suggestions').length) {
        var mySwiperSuggestions = new Swiper('.swiper-suggestions', {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: false,
            navigation: false,
            autoplay: true,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        })
    }

    if ($('.alljobs_swiper').length) {
        var allJobsSwiper = new Swiper(".alljobs_swiper", {
            slidesPerView: 4,
            slidesPerColumn: 1,
            slidesPerColumnFill: "row",
            slidesPerGroup: 4,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

        });
    }


    if ($('.jobs-by-industry_swiper').length) {
        var allJobsSwiper = new Swiper(".jobs-by-industry_swiper", {
            slidesPerView: 5,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    grabCursor: true,
                },
                567: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    grabCursor: false,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    grabCursor: false,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    grabCursor: false,
                },
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                    grabCursor: false,
                },
            },

        });
    }



    // if ($('.sectionBlock__swiper').length) {
    //     var sectionBlock__swiper = new Swiper(".sectionBlock__swiper", {
    //         slidesPerView: 4,
    //         spaceBetween: 30,
    //         freeMode: true,
    //         pagination: {
    //             el: ".swiper-pagination",
    //             clickable: true,
    //         },
    //         breakpoints: {
    //             320: {
    //                 slidesPerView: 1,
    //                 spaceBetween: 20,
    //                 grabCursor: true,
    //             },
    //             567: {
    //                 slidesPerView: 3,
    //                 spaceBetween: 20,
    //                 grabCursor: false,
    //             },
    //             768: {
    //                 slidesPerView: 3,
    //                 spaceBetween: 20,
    //                 grabCursor: false,
    //             },
    //             992: {
    //                 slidesPerView: 3,
    //                 spaceBetween: 20,
    //                 grabCursor: false,
    //             },
    //             1200: {
    //                 slidesPerView: 4,
    //                 spaceBetween: 20,
    //                 grabCursor: false,
    //             },
    //         },

    //     });
    // }


    if ($('.test').length) {
        var test = new Swiper(".test", {
            slidesPerView: 5,
            grid: {
                rows: 1,
            },
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }



    if ($('.mySwiper').length) {
        var allJobsSwiper = new Swiper(".mySwiper", {
            autoplay: {
                delay: 5000,
            },
        
            
            loop: true,
            speed: 1000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }



     if ($('.mySwiper').length) {
        var allJobsSwiper = new Swiper(".mySwiper", {
            autoplay: {
                delay: 5000,
            },
        
            
            loop: true,
            speed: 1000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }


    if ($('.introduce_Swiper').length) {
        var introduce_Swiper = new Swiper(".introduce_Swiper", {
            autoplay: {
                delay: 5000,
            },
            loop: true,
            speed: 1000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
        });
    }
    

    if ($('.slider-hero-banner').length) {
        var sliderHeroBanner = new Swiper(".slider-hero-banner", {
            autoplay: {
                delay: 4000,
            },
            loop: true,
            speed: 1000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    }
}

function actionSubMenu() {
    $('.btn-show-sub-menu').on('click', function () {
        let ref = $(this).attr('data-ref');
        let target = $(this).attr('data-target');
        if (target == 'true') {
            $(this).attr('data-target', 'false');
            $("[data-ref='" + ref + "']").slideUp(300);
        } else if (target == 'false') {
            $(this).attr('data-target', 'true');
            $("[data-ref='" + ref + "']").slideDown(300);
        }
    })
}

const opensearchbox_btn = document.querySelector('.advance-search__open');
const closesearchbox_btn = document.querySelector('.advance-search__close');
const form_group_search = document.querySelectorAll('.form-group-search-box');
// Open advance search func
function opensearchbox() {
    opensearchbox_btn.style.display = "none";
    closesearchbox_btn.style.display = "flex";
    form_group_search.forEach(item => {
        item.classList.add('active');
    })
}

// Open search advance
const search_input = document.querySelector('.search-input');
if (search_input) {
    search_input.addEventListener('focus', () => opensearchbox());
}

// Close advance search func
function closesearchbox() {
    opensearchbox_btn.style.display = "flex";
    closesearchbox_btn.style.display = "none";
    form_group_search.forEach(item => {
        item.classList.remove('active');
    })
}

// Open reset form search
const reset_btn = document.querySelector('.advance-search__reset');
if (reset_btn) {
    reset_btn.addEventListener('click', () => {
        document.getElementById("search-form").reset();
        $('#city_id').val('').trigger('chosen:updated');
        $('#job_type_id').val('').trigger('chosen:updated');
        $('#career_level_id').val('').trigger('chosen:updated');
        $('#industry_id').val('').trigger('chosen:updated');
    })
}








function openFilterJob_mobile() {
    document.querySelector(".filters-job-wrapper-mobile").classList.add("open");
}
function closeFilterJob_mobile() {
    document.querySelector(".filters-job-wrapper-mobile").classList.remove("open");
}














