

<!-- Navigation bar -->
<nav class="navbar navbar-expand-xl navbar-light bg-light shadow-sm fixed-top" id="main-nav">
    <!-- <div class="container-navbar"> -->
    <div class="container nav">
        <a class="navbar-brand" href="{{url('/employers')}}">
            <img src="{{ asset('/vietstar/imgs/logo-new.svg') }}" alt="vietstar">
        </a>
        <button type="button" id="mobile-sidebarCollapse" class="btn">
            <span class="dark-blue-text f"><i class="fas fa-bars fa-1x"></i></span>
        </button>
        <!-- collapse -->
        <div class="collapse navbar-collapse main-menu" id="navbarNavAltMarkup">
            <div class="navbar-nav flex-grow-1 justify-content-end">
                <ul class="navbar-nav main-menu-static ml-auto">
                    <li>
                        <a class="nav-link  {{ Request::url() == route('employerIndex') ? 'header-active' : 'text-main-color' }}" href="{{url('/employers')}}" style="{{ Request::url() == route('employerIndex')  ? 'color:#981B1E;' : '' }}">{{__('Home')}}</a>
                    </li>
                    
                    <li>
                        <a class="nav-link " href="#" style="">{{__('News')}}</a>
                    </li>


                    @if(Auth::guard('company')->check())
                    <li class="{{ Request::url() == route('company.home') ? 'active' : 'text-main-color' }}">
                        <a class="nav-link" href="{{route('company.home')}}" style="{{ Request::url() == route('company.home') || Request::url() == route('posted.jobs') ||  Request::url() == route('application.manager') || Request::url() == route('company.packages') || Request::url() == route('interview.schedule.calendar', ['company_id'=> Auth::guard('company')->user()->id]) || Request::url() == route('company.profile') || Request::url() == route('post.job')  ? 'color:#981B1E;' : '' }}">HR Center</a>
                    </li>
                    @else
                    <li class="{{ Request::url() == route('company.home') ? 'active' : 'text-main-color' }}">
                        <a class="nav-link" href="{{route('company.login')}}" style="{{ Request::url() == route('company.home')  ? 'color:#981B1E;' : '' }}">HR Center</a>
                    </li>
                    @endif

                    {{--
                        <li><a class="nav-link " href="{{ url('/companies')}}">{{__('Công ty')}}</a></li> --}}
                    {{--<li>
                        <a href="{{ route('job.list') }}" class="nav-link {{ Request::url() == route('job.list') || strpos(Request::url(),'/job/') > 0 ? 'header-active' : 'text-main-color' }}" style="{{ Request::url() == route('job.list')  || strpos(Request::url(),'job') ? 'color:#981B1E;' : '' }}">{{__('Jobs')}}</a>
                    </li>--}}
                    <!--  <li>
                        <a href="{{ route('products-services') }}" class="nav-link {{ Request::url() == route('products-services') ? 'header-active' : 'text-main-color' }}"
                        style="{{ Request::url() == route('products-services')   ? 'color:#981B1E;' : '' }}">{{__('Products and Services')}}</a>
                    </li> -->
                    <!--  <li>
                        <a href="{{ route('vietnam-salary') }}" class="nav-link {{ Request::url() == route('vietnam-salary')  ? 'header-active' : 'text-main-color' }}"
                        style="{{ Request::url() == route('vietnam-salary')  ? 'color:#981B1E;' : '' }}">{{__('Vietnam Salary')}}</a>
                    </li> -->
                    @if(Auth::user())
                    <li class="has-child">
                        <a href="{{ route('my.profile') }}" class="nav-link nav-link-parent">{{__('Profiles and CVs')}}</a>
                        <button type="button" class="btn-show-sub-menu" data-ref="findJob" data-target="false"><span class="iconmoon icon-p-next"></span></button>
                        <ul class="sub-menu" data-ref="findJob" data-target="false">
                            @php
                            $pointer = Auth::check()==true ? '' : 'style=pointer-events:none;';
                            @endphp
                            <li><a class="sub-item" href="{{route('change.template')}}" {{$pointer}}><span class="iconmoon icon-recruiter-portfolio"></span>
                                    {{__('CV Templates')}}
                                </a>
                            </li>
                            @php
                            $pointerCom = Auth::guard('company')->check()==true ? '': 'style=pointer-events:none;';
                            @endphp
                            <li>
                                <a class="sub-item" href="{{route('application.manager')}}" {{$pointerCom}}><span class="iconmoon icon-recruiter-portfolio"></span>
                                    {{__('Candidate Management')}}
                                </a>
                            </li>
                            <li>
                                <a class="sub-item" href="{{route('cover-letter')}}" {{$pointer}}><span class="iconmoon icon-recruiter-portfolio"></span>
                                    {{__('Cover Letter')}}
                                </a>
                            </li>

                        </ul>
                    </li>
                    @endif
                    {{--<li class="has-child">
                        <a href="{{route('company.listing')}}" class="nav-link">{{__('Company')}}</a>
                    </li> --}}
                    {{-- <li class="has-child">
                        <a href="{{ route('my.profile') }}" class="nav-link nav-link-parent">{{__('News')}}</a>
                    <button type="button" class="btn-show-sub-menu" data-ref="findJob2" data-target="false"><span class="iconmoon icon-p-next"></span></button>
                    <ul class="sub-menu" data-ref="findJob2" data-target="false">
                        <li>
                            <a class="sub-item" href="{{route('page-category', ['slug' => 'cam_nang'])}}"><span class="iconmoon icon-recruiter-portfolio"></span>
                                {{__('Pages')}}
                            </a>
                        </li>
                        <li>
                            <a class="sub-item" href="{{route('blogs')}}"><span class="iconmoon icon-recruiter-portfolio"></span>
                                {{__('News')}}
                            </a>
                        </li>

                    </ul>
                    </li> --}}
                    <!-- <li>
                        <a href="#" class="nav-link">{{__('Introduce candidate')}}</a>
                    </li> -->

                    {{-- @foreach($show_in_top_menu as $top_menu) @php $cmsContent = App\CmsContent::getContentBySlug($top_menu->page_slug); @endphp
                    <li>
                        <a href="{{ route('cms', $top_menu->page_slug) }}" class="nav-link
                    {{ Request::url() == route('cms', $top_menu->page_slug) ? 'active' : 'text-main-color' }}"
                    style="{{ Request::url() == route('cms', $top_menu->page_slug)  ? 'color:#981B1E;' : '' }}">{{ $cmsContent->page_title }}</a>
                    </li>
                    @endforeach --}}
                    {{-- 
                        <li class="has-child">
                        <a href="#" class="nav-link nav-link-parent" {{ Request::url() == route('blogs') ? 'header-active' : 'text-main-color' }}" style="{{ Request::url() == route('blogs')  ? 'color:#981B1E;' : '' }}">{{__('Blog')}}
                        </a>
                        @php($categories = \App\Blog_category::get())
                        <button type="button" class="btn-show-sub-menu" data-ref="findJob_blog" data-target="false"><span class="iconmoon icon-p-next"></span></button>
                        <ul class="sub-menu" data-ref="findJob_blog" data-target="false">
                            @foreach($categories as $category)
                            <li>
                                <a class="sub-item" href="{{ url('/blog/category/') . "/" . $category->slug }}"><span class="iconmoon icon-recruiter-portfolio"></span>
                                    {{$category->heading}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li> 
                    --}}

                    <li><a href="{{ route('contact.us') }}"
                            class="nav-link  {{ Request::url() == route('contact.us') ? 'header-active' : 'text-main-color' }}"
                            style="{{ Request::url() == route('contact.us') ? 'color:#981B1E;' : '' }}">{{__('Contact')}}</a>
                    </li>

                    </li>

                    {{-- <li class="dropdown userbtn"><a href="{{url('/')}}"><img src="{{asset('/')}}images/lang.png" alt="" class="userimg" /></a>
                    <ul class="dropdown-menu">
                        @foreach($siteLanguages as $siteLang)
                        <li><a href="javascript:;" onclick="event.preventDefault(); document.getElementById('locale-form-{{$siteLang->iso_code}}').submit();" class="nav-link">{{$siteLang->native}}</a>
                            <form id="locale-form-{{$siteLang->iso_code}}" action="{{ route('set.locale') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="locale" value="{{$siteLang->iso_code}}" />
                                <input type="hidden" name="return_url" value="{{url()->full()}}" />
                                <input type="hidden" name="is_rtl" value="{{$siteLang->is_rtl}}" />
                            </form>
                        </li>
                        @endforeach
                    </ul>
                    </li> --}}
                </ul>
                <!-- navbar-lang PC -->
                <ul class="navbar-nav navbar-lang navbar-lang-pc ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-lang__link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('/vietstar/imgs/flags/') }}/{{config('app.available_locales')[App::getLocale()]['flag-icon']}}.png" alt="vietstar">
                        </a>
                        <div class="dropdown__lang_menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (config('app.available_locales') as $lang => $language)
                            @if ($lang != App::getLocale())
                            <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"><img src="{{ asset('/vietstar/imgs/flags/') }}/{{$language['flag-icon']}}.png" alt="vietstar"></span> {{$language['display']}}</a>
                            @endif
                            @endforeach

                        </div>
                    </li>
                </ul>
                <!-- end navbar-lang PC -->


            </div>
            @if(Auth::guard('company')->check())
            <!-- user-badge -->
            
            <a href="{{route('post.job')}}" class="btn btn-primary btn-post-a-job">{{__('Post a job')}}</a>
            <!-- user-badge -->
            <div class="user-badge">
                <div class="money-base">
                    <p><span class="iconmoon icon-money-database"></span> Số dư</p>
                    <h5 class="dolar-sign text-blue-color m-0">0 đ</h5>
                </div>
                <div class="user-badge__avatar">
                    <a class="dropdown_menu__link" href="#">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 48C37.2548 48 48 37.2548 48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 37.2548 10.7452 48 24 48Z" fill="#F2F2F2" />
                            <path d="M43.2596 38.3031C41.0213 35.3063 38.1148 32.873 34.7712 31.1965C31.4277 29.5199 27.7391 28.6463 23.9987 28.6451C20.2584 28.644 16.5693 29.5152 13.2246 31.1897C9.88 32.8642 6.97202 35.2957 4.73181 38.291C6.96063 41.3015 9.86386 43.7478 13.2087 45.4339C16.5535 47.12 20.2469 47.9988 23.9927 48C27.7384 48.0012 31.4324 47.1246 34.7782 45.4407C38.1241 43.7567 41.0289 41.3122 43.2596 38.3031Z" fill="#3B4358" />
                            <path d="M23.9999 25.5484C29.1308 25.5484 33.2902 21.3889 33.2902 16.258C33.2902 11.1271 29.1308 6.96773 23.9999 6.96773C18.869 6.96773 14.7096 11.1271 14.7096 16.258C14.7096 21.3889 18.869 25.5484 23.9999 25.5484Z" fill="#3B4358" />
                        </svg>
                    </a>
                    <ul class="dropdown_menu">
                        <li class="nav-item"><a href="{{route('company.home')}}" class="nav-link"><i class="jobicon fa fa-tachometer" aria-hidden="true"></i> <!-- {{__('Dashboard')}} -->

                            Dashboard

                        </a>
                        </li>
                        <li class="nav-item"><a href="#" data-toggle="modal" data-target="#company_profile_modal" class="nav-link">
                                <i class="jobicon fa fa-user" aria-hidden="true"></i> {{__('View Public Profile')}}</a>
                        </li>


                        <li class="nav-item"><a href="{{ route('company.followers') }}" class="nav-link">
                                <i class="jobicon bi bi-people-fill"></i>
                                {{__('Company Followers')}}
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{route('company.messages')}}" class="nav-link"><i class="jobicon fa fa-envelope" aria-hidden="true"></i> {{__('Messages')}}</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit(); " class="nav-link"><i class="jobicon fa fa-sign-out" aria-hidden="true"></i>
                                {{__('Logout')}}</a></li>
                    </ul>
                    <form id="logout-form-header1" action="{{ route('company.logout') }}" method="GET" style="display: none;"> {{ csrf_field() }} </form>
                </div>
            </div>
            <!-- end user-badge -->
            @endif
            <div class="d-flex group-button gap-2">
                {{--@if(Auth::guard('company')->user())
                <a class="btn btn-primary" href="{{route('job.seeker.list')}}" class="nav-link">{{__('Find candidates')}}</a>
                @endif--}}



                @if(!Auth::guard('company')->check())
                <a class="nav-link login-link" data-toggle="modal" data-target="#employer_login_Modal">{{__('Log in')}} / {{__('Đăng ký')}} </a>
                @endif

                


                <a class="btn_for_user" href="http://127.0.0.1:8000">
                <div  class="btn_for_user__head">
                    Dành cho
                </div> 
                <div  class="btn_for_user__body">
                    Người tìm việc
                </div>    
                </a>
            
            </div>
        </div>
        <!-- end collapse -->


        <!-- Danh cho mobile; có 2 menu mobile và icon user -->
       {{-- <div class="group-for-mobile">

            @if(Auth::check())
            <!-- user-badge -->
            <div class="user-badge">
                <div class="money-base">
                    <h5 class="dolar-sign text-blue-color m-0">0 đ</h5>
                </div>
                <div class="user-badge__avatar">
                    <a class="dropdown userbtn nav-link-dashboard dropdown-toggle" href="{{route('home')}}">
                        {{Auth::user()->printUserImage()}}
                    </a>
                </div>
            </div>
            <!-- End user-badge  -->

            @elseif(Auth::guard('company')->check())
            <!-- user-badge -->
            <div class="user-badge">
                <div class="money-base">
                    <h5 class="dolar-sign text-blue-color m-0">0 đ</h5>
                </div>
                <div class="user-badge__avatar">
                    <a class="dropdown userbtn nav-link-dashboard dropdown-toggle" href="{{route('company.home')}}">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 48C37.2548 48 48 37.2548 48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 37.2548 10.7452 48 24 48Z" fill="#F2F2F2" />
                            <path d="M43.2596 38.3031C41.0213 35.3063 38.1148 32.873 34.7712 31.1965C31.4277 29.5199 27.7391 28.6463 23.9987 28.6451C20.2584 28.644 16.5693 29.5152 13.2246 31.1897C9.88 32.8642 6.97202 35.2957 4.73181 38.291C6.96063 41.3015 9.86386 43.7478 13.2087 45.4339C16.5535 47.12 20.2469 47.9988 23.9927 48C27.7384 48.0012 31.4324 47.1246 34.7782 45.4407C38.1241 43.7567 41.0289 41.3122 43.2596 38.3031Z" fill="#3B4358" />
                            <path d="M23.9999 25.5484C29.1308 25.5484 33.2902 21.3889 33.2902 16.258C33.2902 11.1271 29.1308 6.96773 23.9999 6.96773C18.869 6.96773 14.7096 11.1271 14.7096 16.258C14.7096 21.3889 18.869 25.5484 23.9999 25.5484Z" fill="#3B4358" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- end user-badge -->
            @endif

            <!-- navbar-lang-mobile -->
            <ul class="navbar-nav navbar-lang navbar-lang-mobile ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('/vietstar/imgs/flags/') }}/{{config('app.available_locales')[App::getLocale()]['flag-icon']}}.png" alt="vietstar">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (config('app.available_locales') as $lang => $language)
                        @if ($lang != App::getLocale())
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"><img src="{{ asset('/vietstar/imgs/flags/') }}/{{$language['flag-icon']}}.png" alt="vietstar"></span> {{$language['display']}}</a>
                        @endif
                        @endforeach

                    </div>
                </li>
            </ul>
            <!-- end navbar-lang-mobile -->

        </div>
    --}}
        <!-- End Danh cho mobile; có 2 menu mobile và icon user -->
    </div>
</nav>

@include('templates.employers.auth.user.modal_login')
@include('templates.employers.auth.user.modal_logup')
@include('templates.employers.company.modal.modal_companyProfile')



@push('styles')
<style>
    .header-active {
        color: #981B1E;
        text-decoration: underline;
        text-decoration-style: solid;
        text-underline-offset: 3px;
    }

    .login-btn {
        color: #981b1e;
        background-color: transparent !important;
        border-color: #981b1e;

    }

    .dropdown_menu {
        position: absolute;
        z-index: 1000;
        display: none;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 0.25rem;
    }

    .dropdown_menu.show {
        display: block;
    }

    .navbar-lang .nav-item .dropdown__lang_menu {
        position: absolute;
        z-index: 1000;
        display: none;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 0.25rem;
    }

    .navbar-lang .nav-item .dropdown__lang_menu.show {
        display: block;
    }
</style>
@endpush


@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.user-badge__avatar').click(function() {
            $('.user-badge__avatar').toggleClass('show');
            $('.dropdown_menu').toggleClass('show');

        });
    });
    $(document).ready(function() {
        $('.navbar-lang__link').click(function() {
            $('.dropdown__lang_menu').toggleClass('show');
        });
    });
</script>
@endpush