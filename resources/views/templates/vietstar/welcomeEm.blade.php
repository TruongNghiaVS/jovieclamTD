@extends('templates.employers.layouts.app')
@section('content')


    @section('meta_tags')
    <!-- Meta tag start -->

    <!-- For Facebook -->
    <meta property="og:title" content="Jobvieclam" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{url('/')}}/assets/job-detail-share.png" />
    <meta property="og:url" content="{{url('/')}}" />
    

    <!-- For Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Jobvieclam" />
    

    <!-- Meta tag end -->
    @endsection

<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->




<!-- Dashboard menu start -->
@include('templates.employers.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->




<!-- Search start -->
@include('templates.employers.includes.search') 
<!-- Search End -->

<!-- Impressive_numbers start-->
@include('templates.employers.includes.impressive_numbers')
<!-- Impressive_numbers  end-->

<!-- Product and service  start-->
@include('templates.employers.includes.all_product_service')
<!-- Product and service  end-->

<!-- employer_choose  start-->
@include('templates.employers.includes.employer_choose')
<!-- employer_choose  end-->

<!-- post_now  start-->
@include('templates.employers.includes.post_now')
<!-- post_now end-->
<!-- introduce  start-->
{{--@include('templates.employers.includes.introduce')--}}
<!-- introduce  end-->


<!-- our_customer  start-->
@include('templates.employers.includes.our_customer')

<!-- our_customer  end-->

<!-- about_us  start-->
@include('templates.employers.includes.about_us')

<!-- about_us  end-->


<!-- about_us  start-->
@include('templates.employers.includes.support')
<!-- about_us  end-->

<!-- home_blogs start-->
@include('templates.employers.includes.home_blogs')

<!-- home_blogs  end-->




@include('templates.employers.includes.footer')
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('/vietstar/css/chosen/chosen.min.css')}}">
{{-- toastr css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="{{ asset('/vietstar/js/chosen/chosen.jquery.min.js')}}"></script>
{{-- toastr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
$(document).ready(function($) {


   

    // Call the function with the target number (e.g., 100) and duration (e.g., 10000 milliseconds or 10 seconds)
    




    @if(Session::has('success'))
    toastr.success(`{{ Session::get('success')}}`);
    @endif
    @if(count($errors) > 0)
    @foreach($errors -> all() as $error)
    toastr.error("{{$error}}");
    @endforeach
    @endif
    /*$("form").submit(function() {
        $(this).find(":input").filter(function() {
            return !this.value;
        }).attr("disabled", "disabled");
        return true;
    });
    $("form").find(":input").prop("disabled", false);*/

    $('body').on('keyup', '#search', function() {
        var search = $(this).val();
        if (search != '') {
            $.ajax({
                url: "{{ route('job.search') }}",
                type: "POST",
                data: {
                    search: search,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background", "#FFF");
                }
            });
        }
    }).on('mouseout', '#search', function() {
        if ($('#suggesstion-box:hover').length != 0) {
            $("#suggesstion-box").show();
        }
    });
    $(window).click(function() {
        $("#suggesstion-box").hide();
    });
    $('#city_id').chosen({
        allow_single_deselect: true,
        width: '100%'
    });
    $('#job_type_id').chosen({
        allow_single_deselect: true,
        width: '100%'
    });
    $('#career_level_id').chosen({
        allow_single_deselect: true,
        width: '100%'
    });
    $('#degree_level_id').chosen({
        allow_single_deselect: true,
        width: '100%'
    });
    $('#industry_id').chosen({
        allow_single_deselect: true,
        width: '100%'
    });
});

$(document).on('click', '#btn-register-now', function() {
    var email = $('input[name="email"]').val();
    var url = "{{ route('job-email-alert') . '?email=_email'}}";
    url = url.replace('_email', email);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        beforeSend: function() {},
        success: function(data) {
            console.log(data);
            if (data.status == 'success') {
                toastr.success(data.message);
            } else {
                toastr.error(data.message);
            }
        }
    });
});
</script>
{{-- @include('templates.vietstar.includes.country_state_city_js') --}}
@endpush