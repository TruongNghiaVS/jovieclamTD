@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
   

    @include('templates.employers.includes.header')
    <!-- Header end -->
   
<!-- Header end -->

<!-- Dashboard menu start -->
@include('templates.employers.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->





{{--
<div class="company-wrapper">
@include('flash::message') 
    <div class="container">
        <div class="row compnaieslist">
            <div class="col-lg-9 col-sm-12">
                @if($companies)
                <div class="searchList jobs-side-list">
                    @foreach($companies as $company)

                    <div class="item-job mb-3">
                        <div class="logo-company">
                            <a href="{{route('company.detail',$company->slug)}}" title="{{$company->name}}" class="pic">
                        {{$company->printCompanyImage()}}
</a>
</div>
<div class="jobinfo">
    <div class="info">
        <h3 class="job-title"><a href="{{route('company.detail',$company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></h3>
        <div class="box-meta">
            <i class="far fa-map-marker-alt"></i> {{__('Street Address')}}:
            {{$company->location}}
        </div>
        <div class="box-meta">
            <i class="fas fa-globe"></i> Website: {{$company->website}}
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box-meta">
                    <i class="far fa-envelope"></i> Email: {{$company->email}}   
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-meta">
                    <i class="far icon-recruiter-phone-call"></i> {{__('Mobile Number')}}:
                    {{$company->phone}}
                </div>
            </div>
        </div>
    </div>
    @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
    <a class="save-company-favorite" href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug]) }}"><i class="fas fa-heart iconoutline"></i></a>
    @else
    <a class="save-company-favorite" href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}"><i class="far fa-heart"></i></a>
    @endif

</div>

</div>
@endforeach
</div>
@endif
<div class="pagiWrap">
    <div class="row">
        <div class="col-md-5">
            <div class="showreslt">
                {{__('Hiển thị các trang')}} : {{ $companies->firstItem() }} -
                {{ $companies->lastItem() }}
                {{__('Total')}} {{ $companies->total() }}
            </div>
        </div>
        <div class="col-md-7 text-right">
            @if(isset($companies) && count($companies))
            {{ $companies->appends(request()->query())->links() }}
            @endif
        </div>
    </div>
</div>
</div>
<div class="col-lg-3 col-sm-12 pull-right">
    <!-- Sponsord By -->
    <div class="sidebar">
        <h4 class="widget-title">{{__('Sponsord By')}}</h4>
        <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>
    </div>
</div>
</div>


</div>
</div> --}}


<div class="company-wrapper company-list-wrapper">
    <div class="container company-list-container">
        <div id="topcompanyhead" class="topcompanyhead">
            <h1>Khám Phá Văn Hoá Công Ty</h1>
            <p>Tìm hiểu văn hoá công ty và chọn cho bạn nơi làm việc phù hợp nhất.</p>
            <div class="topcompanyhead__search row">
                <div class="search-company col-6">

                    <div class="d-flex flex-row search__box">
                        <input type="search" class="" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                    </div>

                </div>
                <div class="col-6">
                        <button class="btn btn-primary" type="submit">
                            Tìm kiếm
                        </button>
                </div>
            </div>
        </div>

        <div id="bottomcompanycontent" class="bottomcompanycontent">
            <div class="bottomcompanyconten__head">
                <h2>Công ty nổi bật<!-- --> <span>(<!-- -->525<!-- -->)</span></h2>

                <div class="filter-company">
                    <div class="form-group form-select-chosen" id="functional_area_dd">
                        <select class="form-control form-select" name="functional_area_id" id="functional_area">
                            <option value="">Chọn phòng ban</option>
                            <option value="Nhân sự">Nhân sự</option>
                            <option value="Hành chính">Hành chính</option>
                            <option value="Kế toán">Kế toán</option>
                        </select>
                    </div>
                </div>
            </div>

            @if($companies)
            <div class="list-company hideContent">

                @foreach($companies as $company)
                <div emId="{{$company->id}}" class="company-item-wrapper shadow-sm">
                    <div class="company-item-header">
                        <div class="company-items__background">
                            <img class="background-img" src="https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages02.vietnamworks.com%2Fcompanyprofile%2Fnull%2Fen%2FB%C3%ACa_%C4%91%E1%BA%A7u_trang_-_Coverc.jpg&w=1920&q=75" alt="">
                        </div>
                        <a class="company-items__logo shadow" href="#">
                            {{$company->printCompanyImage()}}
                        </a>
                        <!-- <div class="company-items__follower">
                            <span><i class="bi bi-people-fill"></i> 176 lượt theo dõi</span>
                        </div> -->
                    </div>

                    <div class="company-items__desc">
                        <div class="company-items__name">
                            <a href="{{route('company.detail',$company->slug)}}" title="{{$company->name}}">
                                <h3>
                                    {{$company->name}} 
                                </h3>
                            </a>
                        </div>
                        <div class="company-items__category">
                            <i class="bi bi-folder2"></i>
                            <span>
                                Hàng tiêu dùng
                            </span>

                        </div>
                        <div class="company-items__category">

                            <i class="bi bi-archive"></i>
                            <span>
                                5 Việc làm
                            </span>

                        </div>

                    </div>

                    <div class="company-items__bottom">
                        @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                        <a class="btn btn-outline-primary" href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug]) }}"><i class="fas fa-heart iconoutline"></i> Đã theo dõi</a>
                        @else
                        <a class="btn btn-outline-primary" href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}"><i class="far fa-heart"></i> Theo dõi</a>
                        @endif
                    </div>

                </div>
                @endforeach

            </div>
            @endif
            <div class="show-more">
                <button class="btn btn-secondary show-more-btn ">Xem Thêm</button>
            </div>
        </div>

    </div>
</div>

@include('templates.employers.includes.footer')
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script type="text/javascript">


    $(document).ready(function() {
        $(".show-more-btn").on("click", function() {
      
            var id =   $(".company-item-wrapper:last-child").attr("emId")
            var html  =  '';
            $.ajax({
            url: `{{url('/')}}/companies/getData/?id=${id}`, // Replace with your API endpoint
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Process the data
                console.log(data);
               html  = data.map(element => {
                    return `
                    
                    <div emId="${element.id}" class="company-item-wrapper shadow-sm">
                    <div class="company-item-header">
                        <div class="company-items__background">
                            <img class="background-img" src="https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages02.vietnamworks.com%2Fcompanyprofile%2Fnull%2Fen%2FB%C3%ACa_%C4%91%E1%BA%A7u_trang_-_Coverc.jpg&w=1920&q=75" alt="">
                        </div>

                        <a class="company-items__logo shadow" href="#">
                            <img src="${element.logo ? `{{url('/')}}/company_logos/${element.logo}` : `{{url('/')}}/admin_assets/no-image.png` }" alt="">
                        </a>
                      
                        <!-- <div class="company-items__follower">
                            <span><i class="bi bi-people-fill"></i> 176 lượt theo dõi</span>
                        </div> -->
                    </div>

                    <div class="company-items__desc">
                        <div class="company-items__name">
                            <a href="" title="${element.name}">
                                <h3>
                                    ${element.name}
                                </h3>
                            </a>
                        </div>
                        <div class="company-items__category">
                            <i class="bi bi-folder2"></i>
                            <span>
                                Hàng tiêu dùng
                            </span>

                        </div>
                        <div class="company-items__category">

                            <i class="bi bi-archive"></i>
                            <span>
                                5 Việc làm
                            </span>

                        </div>

                    </div>

                    <div class="company-items__bottom">
                        @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                        <a class="btn btn-outline-primary" href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug]) }}"><i class="fas fa-heart iconoutline"></i> Đã theo dõi</a>
                        @else
                        <a class="btn btn-outline-primary" href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}"><i class="far fa-heart"></i> Theo dõi</a>
                        @endif
                    </div>

                </div>
                    
                    `
               });
               
               $(".list-company.hideContent").append(html.join(" "))
              
               if($(".company-item-wrapper:last-child").attr("emId") == 1 ){
                    $(".show-more-btn").addClass("hide")
               }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error('Error:', error);
            }
        });
        });
    });



    $(document).ready(function() {
        // js chosen dropdown select
        $(".chosen").chosen();
        $(document).on('click', '#send_company_message', function() {
            var postData = $('#send-company-message-form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('contact.company.message.send') }}",
                data: postData,
                //dataType: 'json',
                success: function(data) {
                    response = JSON.parse(data);
                    var res = response.success;
                    if (res == 'success') {
                        var errorString = '<div role="alert" class="alert alert-success">' +
                            response.message + '</div>';
                        $('#alert_messages').html(errorString);
                        $('#send-company-message-form').hide('slow');
                        $(document).scrollTo('.alert', 2000);
                    } else {
                        var errorString = '<div class="alert alert-danger" role="alert"><ul>';
                        response = JSON.parse(data);
                        $.each(response, function(index, value) {
                            errorString += '<li>' + value + '</li>';
                        });
                        errorString += '</ul></div>';
                        $('#alert_messages').html(errorString);
                        $(document).scrollTo('.alert', 2000);
                    }
                },
            });
        });
    });

 
</script>
@endpush