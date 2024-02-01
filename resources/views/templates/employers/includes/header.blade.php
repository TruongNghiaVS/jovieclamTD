

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
                        <a class="nav-link  {{ Request::url() == route('index') ? 'header-active' : 'text-main-color' }}" href="{{url('/')}}"  style="{{ Request::url() == route('index')  ? 'color:#981B1E;' : '' }}">{{__('Home')}}</a>
                    </li>
                    
                    


                    @if(Auth::guard('company')->check())
                    <li class="{{ Request::url() == route('company.home') ? 'active' : 'text-main-color' }}">
                        <a class="nav-link" href="{{route('company.home')}}" style="{{ Request::url() == route('company.home') || Request::url() == route('posted.jobs') ||  Request::url() == route('application.manager') || Request::url() == route('company.packages') || Request::url() == route('interview.schedule.calendar', ['company_id'=> Auth::guard('company')->user()->id]) || Request::url() == route('company.profile') || Request::url() == route('post.job')  ? 'color:#981B1E;' : '' }}">HR Center</a>
                    </li>
                    @else
                    <li class="">
                        <a class="nav-link" href="#"  data-target="#employer_login_Modal" data-toggle="modal">HR Center</a>
                    </li>
                    @endif

                    {{--
                        <li><a class="nav-link " href="{{ url('/companies')}}">{{__('Công ty')}}</a></li> --}}
                    {{--<li>
                        <a href="{{ route('job.list') }}" class="nav-link {{ Request::url() == route('job.list') || strpos(Request::url(),'/job/') > 0 ? 'header-active' : 'text-main-color' }}" style="{{ Request::url() == route('job.list')  || strpos(Request::url(),'job') ? 'color:#981B1E;' : '' }}">{{__('Jobs')}}</a>
                    </li>--}}
                   
                    
                  

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
                
                        <li class="has-child">
                        <a href="#" class="nav-link nav-link-parent" {{ Request::url() == route('blogs') ? 'header-active' : 'text-main-color' }}" style="{{ Request::url() == route('blogs')  ? 'color:#981B1E;' : '' }}">{{__('Blog')}}
                        </a>
                        @php($categories = \App\Blog_category::where("typePost" , "0")->get())
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
            
            </div>
            @if(Auth::guard('company')->check())
            <a href="{{route('post.job')}}" class="btn btn-primary btn-post-a-job">{{__('Post a job')}}</a>
            @endif
          
            @if(Auth::guard('company')->check())

            <!-- user-badge -->
         
               
                <div class="user-badge__btn">
            
                    <a class="dropdown_menu__link" href="{{route('company.home')}}">
                        <span >
                        <i class="fa-solid fa-user fs-18px mx-2"></i>
                        {{ Auth::guard('company')->user()->name ? Auth::guard('company')->user()->name :"" }}

                      
                        </span>
                    </a>
                    <div class="user_menu ">

                        <ul class="">
                            <li class="nav-item"><a href="{{route('company.home')}}" class="nav-link"><i class="fa-solid fa-gauge mx-1"></i> <!-- {{__('Dashboard')}} -->
    
                                Dashboard
    
                            </a>
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="modal" data-target="#company_profile_modal" class="nav-link">
                                    <i class="fa-solid fa-user m-1"></i> {{__('View Public Profile')}}</a>
                            </li>
    
    
                            <li class="nav-item"><a href="{{ route('company.followers') }}" class="nav-link">
                                    <i class="fa-solid fa-users m-1"></i>
                                    {{__('Company Followers')}}
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{route('company.messages')}}" class="nav-link"><i class="fa-regular fa-envelope mx-1"></i> {{__('Messages')}}</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit(); " class="nav-link"><i class="fa-solid fa-arrow-right-from-bracket mx-1"></i>
                                    {{__('Logout')}}</a></li>
                        </ul>
                    </div>
                    
                    <form id="logout-form-header1" action="{{ route('company.logout') }}" method="GET" style="display: none;"> {{ csrf_field() }} </form>
                </div>
                @endif
            </div>
            <!-- end user-badge -->
            <div class="group-button gap-2">
                {{--@if(Auth::guard('company')->user())
                <a class="btn btn-primary" href="{{route('job.seeker.list')}}" class="nav-link">{{__('Find candidates')}}</a>
                @endif--}}



                @if(!Auth::guard('company')->check())
                <a class="nav-link login-link" data-toggle="modal" data-target="#employer_login_Modal">{{__('Log in')}} / {{__('Đăng Ký')}} </a>
                @endif

                


                <a class="btn_for_user" href="http://jobvieclam.com/">
                <div  class="btn_for_user__head">
                {{__('For')}}
                </div> 
                <div  class="btn_for_user__body">
                {{__('Job Seekers')}}
                 
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


<div class="modal fade " id="customModal-success" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal_status">
            <div class="modal-header ">
                <h5 class="modal-title text-center fs-18px" id="customModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Google_Material_Design_check.svg/1024px-Google_Material_Design_check.svg.png" alt="">
                 <p class="text-center fs-18px"></p>
            </div>
            <div class="modal-footer">
           
              
            </div>
        </div>
    </div>
</div>


<div class="modal fade modal_status" id="customModal-fail" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal_status">
            <div class="modal-header">
                <h5 class="modal-title" id="customModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                 <h3 class="text-center"></h3>
            </div>
            <div class="modal-footer">
        
            </div>
        </div>
    </div>
</div>


<div id="spinner-wrapper">
    <div class="d-flex justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"  role="status">
        <span class="sr-only">Loading...</span>
    </div>
    </div>
</div>



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
    .dropdown_menu__link  span{
        color: var(--bs-primary);
        font-weight: 500;
    }
    .user-badge__btn {
        position: relative;
        padding: 3px 11px;
        max-width: 230px;
        height: 100%;
    }

    .user-badge__btn  span{
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
    }
   .user_menu{
        display: none;
        z-index: 5;
        position: absolute;
        top: calc(100% - 1px);
        right: 0;
        width: 100%;
        min-width: 240px;
        padding-top: 26px;
   }
   .user-badge__btn:hover .user_menu{
     display: block;
   }
   
   .user_menu ul {
        list-style-type: none;
        padding-left: 0;
        margin-bottom: 0;
        background: #fff;
        box-shadow: 0 2px 14px rgba(46, 46, 46, 0.5);
   }
   .user_menu ul .nav-link {
        font-size: 18px;
        font-weight: 500;
        color: var(--sub-text);
        padding: 12px 14px;

   }
   .user_menu .nav-link:hover ,.user_menu .nav-link:hover i {
        color: var(--bs-primary);
        background: #E9E9E9;
   }
   #customModal-success .modal-header {
        justify-content: center !important;
   }
   #customModal-success .modal-footer {
        justify-content: center !important;
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