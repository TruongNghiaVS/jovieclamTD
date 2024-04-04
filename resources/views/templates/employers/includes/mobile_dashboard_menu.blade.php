@push('styles')
<style type="text/css">
    /* Option 2: Import via CSS */
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
        position: relative;
        top: 76px;
        left: 0;
    }

    #mobile-sidebar {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        display: -webkit-box;
        display: -ms-flexbox;
        min-width: 0px;
        max-width: 0px;
        background: white;
        color: #bcc0c8;
        transition: all 0.3s;
        overflow: hidden;
        max-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 76px;
        left: 0;
        bottom: 0;
        z-index: 1;
        overflow-x: hidden;
        overflow-y: auto;
        z-index: 30;
        border: 1px solid #cccc;
    }

    /* PROFILE CSS */
    .profile {
        position: relative;
        padding: 20px 10px;
        border-bottom: 1px solid #ccc;
    }

    .profile .avatar {
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        margin: 0 auto;
        overflow: hidden;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
    }

    .profile .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile .username {
        margin-top: 15px;
        font-size: 16px;
        text-align: center;
        text-transform: uppercase;
    }

    .profile .username p a {
        color: var(--text-main);
        font-size: 16px;
        text-align: center;
        text-transform: uppercase;
        font-weight: 600;
    }


    .sidebar-btn {
        position: absolute;
        top: 50%;
        left: 20px;
    }

    #mobile-sidebar.active {
        min-width: 300px;
        max-width: 300px;
        overflow-x: hidden;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        z-index: 30;
        max-height: calc(100% - 76px);
    }

    #mobile-sidebar.active .sidebar-btn {
        justify-content: end;
    }

    #mobile-sidebar .side-bar-content {
        display: none;
    }

    #mobile-sidebar.active .side-bar-content {
        display: block;
        color: var(--text-main);
    }

    #mobile-sidebar.active ul.components {
        width: 100%;
    }

    #mobile-sidebar.active .sidebar-header{
        padding: 20px;
        background: white;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    #mobile-sidebar ul.components {
      
    }

    #mobile-sidebar ul p {
        color: #063146;
        padding: 10px;
    }

    #mobile-sidebar ul li a {
        padding: 5px 5px;
        font-size: 1.1em;
        display: block;
    }
    #mobile-sidebar ul .sidebar-item >a {
        background-color: white;
    }


    #mobile-sidebar ul li a:hover {
        color: #7386D5;
        background: #981b1e;
    }

    #mobile-sidebar ul li a:hover i,#mobile-sidebar ul li a:hover .side-bar-content  {
        color: white;
    }



    #mobile-sidebar ul li a i {
        font-size: 20px;
        color: var(--text-main);
        width: 24px;
        display: flex;
        justify-content: center;
        align-items: center;
    }



    #mobile-sidebar ul li .dropdown-toggle::after {
        color: #b2bcc6;
        display: none;
    }

    #mobile-sidebar.active ul li .dropdown-toggle::after {
        color: #b2bcc6;
        display: block;
        right: 20px;
    }

    #mobile-sidebar .sidebar-item.active>a {
        background-color: #981b1e;
        color: white;
    }
    
    #mobile-sidebar .sidebar-item.active>a i,
    #mobile-sidebar .sidebar-item.active>a span{
        background-color: #981b1e;
        color: white ;
    }

    #mobile-sidebar ul li.active a span {
        color: white ;
    }

    
    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: -10px;
        transform: translateY(-50%);
    }

    #mobile-sidebar.active .dropdown-toggle::after {
        display: none;
    }



    #mobile-sidebar ul ul a {
        font-size: 0.9em !important;
 

    }

    .sidebar-bottom ul ul a {
        background-color: unset !important;
    }

    ul.CTAs {
        padding: 20px;
    }

    ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    .list-group-item.active {
        border: unset;
    }

    .list-group-item {
        border: unset;
    }

  
    .sidebar-main-nav li,.sidebar-user-nav li {
        border-bottom: .5px solid #cdc9c9;
    }
    
    a.download {
        background: #bcc0c8;
        color: #7386D5;
    }

    a.article,
    a.article:hover {
        background: #6d7fcc !important;
        color: #bcc0c8 !important;
    }

    #mobile-sidebar.active ul li a span {
        color: var(--text-main);
    }


    #mobile-sidebarCollapse span i {
        color: #bcc0c8;
    }

    #mobile-sidebar ul li a span {
        color: #bcc0c8;
        font-size: 18px;
        font-weight: 600;
    }

    #mobile-sidebar ul ul a {
     
    }

    #mobile-sidebar ul li.active a span {
        color: white;
    }

    ul#pageSubmenu li {
       
    }

    ul#pageSubmenu li a span {
        font-size: 16px !important;
    }

    #mobile-sidebar .menu {
        position: relative;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .sidebar-main-nav {

        transform: translateX(0);
        opacity: 1;
        pointer-events: auto;
        transition: 0.4s ease-in-out all;
    }

    .sidebar-user-nav {
        -webkit-transform: translateX(-300px);
        -ms-transform: translateX(-300px);
        transform: translateX(-300px);
        transition: 0.4s ease-out all;
    }
    #mobile-sidebar ul li a h1 {
        font-size: 18px;
        font-weight: 600;
    }

    .sidebar-main-nav,
    .sidebar-user-nav {
        position: absolute;
        top: 0px;
        left: 0px;
        height: 100%;
        overflow-y: auto;

    }

    .sidebar-main-nav.active {

        transform: translateX(0);
        opacity: 1;
        pointer-events: auto;
        transition: 0.4s ease-in-out all;
    }


    .sidebar-main-nav {
        
        -webkit-transform: translateX(-300px);
        -ms-transform: translateX(-300px);
        transform: translateX(-300px);
        opacity: 1;
        pointer-events: auto;
        transition: 0.4s ease-in-out all;
    }



    .sidebar-user-nav.active {
        transform: translateX(0);
        opacity: 1;
        pointer-events: auto;
    }

    .sidebar-bottom {
        display: none;
    }

    #mobile-sidebar.active .sidebar-bottom {
        display: flex;
        width: 100%;
       
        bottom: 20px;
        justify-content: end;
        align-items: center;
        left: 0;
        right: 0;
        opacity: 1;
        pointer-events: auto;
        -webkit-transform: translateX(-300px);
        -ms-transform: translateX(-300px);
        transform: translateX(-300px);
        transition: 0.4s ease-out all;
        padding: 20px;
        margin-bottom:20px;
        max-height: 0%;
        height: 0%;
        display: none;

    }
    #mobile-sidebar.active .sidebar-bottom.active {
        transform: translateX(0);
        max-height: 20%;
        height: 20%;
        display: block;

    }

    .profile .back-menu-normal {
        position: absolute;
        top: 0;
        left: 0px;
        transition: 0.4s ease-in-out all;
        display: none;
    }

    .profile .back-menu-normal.active {
        display: block;
    }

    .profile .back-menu-normal i {
        font-size: 25px;
        color: var(--text-main);
        font-weight: 800;
    }

 

    .sidebar-bottom ul li span {
        color: white;
        font-size: 18px;
        font-weight: 600;

    }

    a#navbarDropdownMenuLink {
        padding: 0 !important;
    }
    .sub_list li{
        margin-left: 40px;
    }
    #blog_sub_list li.active  ,ul#pageSubmenu li.active , ul#pageSubmenu li.active>a{
        background:var(--bs-primary);
        color:white;
    
    }
    #blog_sub_list li.active .side-bar-content ,ul#pageSubmenu li.active .side-bar-content ,ul#pageSubmenu li.active i {
        color:white;
    }

</style>

@endpush
@php
    $company =  Auth::guard('company')->check()==true ?  Auth::guard('company')->user() : null;
    $company_active = $company ? $company->is_active : 0;

    // Define an array with route names and their corresponding sidebar classes
    $routes = [
        'company.home',
        'posted.jobs',
        'application.manager',
        'company.packages',
        'company.config-mail',
        'company.profile',
        'company.followers',
        'job.seeker.list',
        'post.job',
        'company.messages',
        // Add mor,,e routes as needed
    ];

    // Initialize default values
    $isActive = false;
    // Loop through routes to determine active state
    foreach ($routes as $route ) {
        if (Request::url() == route($route)) {
            $isActive =true;
            break; // Exit loop once a match is found
        }
    }
@endphp


<nav id="mobile-sidebar">
    <div class="sidebar-header">
        @if(Auth::guard('company')->check()==true && $company_active == 1 )
        <div class="profile" bis_skin_checked="1">
            <div class="avatar" bis_skin_checked="1"><a href="#">
                {{Auth::guard('company')->user()->printCompanyImage()}}
                </a>
            </div>
            <div class="username" bis_skin_checked="1">
                <p><a href="#">{{Auth::guard('company')->user()->name}}</a></p>
            </div>
            <div class="back-menu-normal {{$isActive ? 'active': ''}}" bis_skin_checked="1"><i class="bi bi-arrow-left"></i></div>
        </div>

        @else 


        <div class="profile" bis_skin_checked="1">
            <div class="avatar" bis_skin_checked="1"><a href="#">
            
                <img src="/admin_assets/no-company.png" alt="">
            </a>
            </div>
            <div class="username" bis_skin_checked="1">
                <p><a href="#">Welcome to Jobvieclam</a></p>
            </div>
            <div class="back-menu-normal" bis_skin_checked="1"><i class="bi bi-arrow-left"></i></div>
        </div>

        @endif
        <div class="menu">
            <ul class="list-unstyled components sidebar-main-nav {{$isActive ? '': 'active'}}" id="sidebar-main-nav">
                <li class="sidebar-item {{ Request::url() == route('index') ? 'active' : '' }}">
                    <a href="/" class="list-group-item list-group-item-action {{ Request::url() == route('index')  ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-house fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Home')}}</span>
                        </div>
                    </a>
                </li>

                @if(Auth::guard('company')->check() &&  $company_active == 1 )
                <li class="sidebar-item {{ Request::url() == route('company.home') || Request::url() == route('posted.jobs') ||  Request::url() == route('application.manager') || Request::url() == route('company.packages') || Request::url() == route('interview.schedule.calendar', ['company_id'=> Auth::guard('company')->user()->id]) || Request::url() == route('company.profile') || Request::url() == route('post.job')  ? 'active' : '' }}">
                    <a href="{{route('company.home')}}" class="list-group-item list-group-item-action{{ Request::url() == route('company.home') || Request::url() == route('posted.jobs') ||  Request::url() == route('application.manager') || Request::url() == route('company.packages') || Request::url() == route('interview.schedule.calendar', ['company_id'=> Auth::guard('company')->user()->id]) || Request::url() == route('company.profile') || Request::url() == route('post.job')  ? 'active' : '' }}}">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-box-archive fs-24px me-2"></i>
                            <span class="side-bar-content">HR Center</span>
                        </div>
                    </a>
                </li>
                @else
                <li class="sidebar-item">
                    <a href="#" class="list-group-item list-group-item-action" data-target="#employer_login_Modal" data-toggle="modal" >
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-box-archive fs-24px me-2"></i>
                            <span class="side-bar-content"> HR Center</span>
                        </div>
                    </a>
                </li>
                @endif
                <li class="sidebar-item ">
                    <a href="#blog_sub_list" data-toggle="collapse"     aria-expanded="false" class="dropdown-toggle">
                            <div class="d-flex w-100">
                                <i class="fa-regular fa-newspaper fs-24px me-2"></i>
                                <span class="side-bar-content">{{__('Blog')}}</span>
                            </div>
                        </a>

                    @php($categories = \App\Blog_category::get())

                    <ul class="collapse list-unstyled sub_list {{ strpos(Request::url(),'/tin-tuc/') > 0 ? 'show' : '' }}" data-ref="findJob_blog" data-target="false" id="blog_sub_list">
                        @foreach($categories as $category)
                        <li class="{{ basename(Request::url()) == $category->slug ? 'active' : '' }}">
                            <a class="sub-item" href="{{ url('/blog/category/') . "/" . $category->slug }}">

                                <div class="d-flex w-100">

                                    <h1 class="side-bar-content">{{$category->heading}}</h1>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ route('contact.us') }}" class="list-group-item list-group-item-action {{ Request::url() == route('contact.us') ? 'active' : '' }}">

                        <div class="d-flex w-100">
                            <i class="fa-regular fa-address-book fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Contact')}}</span>
                        </div>
                    </a>
                </li>

            </ul>
            <!-- user nav -->

            @if(Auth::guard('company')->check() &&  $company_active == 1 )
    
            <ul class="list-unstyled components sidebar-user-nav {{$isActive ? 'active': ''}}" id="sidebar-user-nav">
                <li class="sidebar-item {{ Request::url() == route('company.home') ? 'active' : '' }}">
                    <a href="{{ route('company.home') }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-gauge fs-24px me-2"></i>
                            <span class="side-bar-content"><!-- {{__('Dashboard')}} -->
                                Dashboard
                            </span>
                        </div>
                    </a>
                </li>



                <li class="sidebar-item {{ Request::url() == route('posted.jobs') ? 'active' : '' }}">
                    <a href="{{route('posted.jobs')}}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-suitcase  fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Company\'s Posted Jobs')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item  {{ Request::url() == route('application.manager') ? 'active' : '' }}">
                    <a href="{{ route('application.manager') }}" class="list-group-item list-group-item-action">

                        <div class="d-flex w-100">
                        <i class="fa-solid fa-list-check fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Candidate Management')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('company.packages') ? 'active' : '' }}">
                    <a href="{{ route('company.packages') }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-magnifying-glass fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('CV Search Packages')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('company.config-mail') ? 'active' : '' }}">
                    <a href="/cau-hinh-mail" class="list-group-item list-group-item-action ">
                            <div class="d-flex w-100">
                                <i class="fa fa-cog fs-24px me-2" aria-hidden="true"></i>
                              
                                <span class="side-bar-content">Cấu Hình Mail</span>
                            </div>
                    </a>
                </li>

                {{--
                <li class="sidebar-item  {{ Request::url() == route('interview.schedule.calendar', ['company_id'=> Auth::guard('company')->user()->id]) ? 'active' : '' }}">
                    <a href="{{route('interview.schedule.calendar',['company_id'=> Auth::guard('company')->user()->id])}}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100">
                            <i class="fa-regular fa-calendar fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Interview Schedule')}}</span>
                        </div>
                    </a>
                </li>
                --}}

                <li class="sidebar-item {{ Request::url() == route('company.profile') ? 'active' : '' }}">
                    <a href="{{route('company.profile') }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <i class="fa-regular fa-pen-to-square fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Edit Account')}}</span>
                        </div>
                    </a>
                </li>



                <li class="sidebar-item {{ Request::url() == route('company.detail', Auth::guard('company')->user()->slug) ? 'active' : '' }}" >
                    <a href="#" class="list-group-item list-group-item-action " data-toggle="modal" data-target="#company_profile_modal">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-eye fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('View Public Profile')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('post.job') ? 'active' : '' }}">
                    <a href="{{route('post.job')}}" class="list-group-item list-group-item-action {{ Request::url() == route('post.job') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-cart-plus fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Post Jobs')}}</span>
                        </div>
                    </a>
                </li>


               

               

                <li class="sidebar-item {{ Request::url() == route('company.messages') ? 'active' : '' }}">
                <a href="{{ route('company.messages')}}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <i class="fa-regular fa-message fs-24px me-2 box-message-icon">
                                <span class="badge">{{\App\CompanyMessage::where('company_id', Auth::guard('company')->user()->id)->where('status','unviewed')->where('type','message')->count()}}</span>
                            </i>
                            <span class="side-bar-content">{{__('Company Messages')}}</span>
                        </div>
                    </a>
                </li>


                <li class="sidebar-item {{ Request::url() == route('company.followers') ? 'active' : '' }}">
                <a href="{{ route('company.followers') }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                        <i class="fa-solid fa-people-group fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Company Followers')}}</span>
                        </div>
                    </a>
                </li>

                
                <li class="sidebar-item {{ Request::url() == url('/tim-ung-vien') ? 'active' : '' }}">
                <a href="{{url('/tim-ung-vien')}}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <i class="fas fa-search  fs-24px me-2"></i>
                            <span class="side-bar-content">Tìm Ứng Viên</span>
                        </div>
                    </a>
                </li>


                <li class="sidebar-item {{ Request::url() == route('company.logout') ? 'active' : '' }}">
                    <a href="{{ route('company.logout') }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-arrow-right-from-bracket  fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Logout')}}</span>
                        </div>
                    </a>
                </li>
            </ul>
            @endif
        </div>

    </div>

    <div class="sidebar-bottom {{$isActive ? '': "active"}}">
        <ul class="list-unstyled components sidebar-bottom__item mb-0">
            @if(!Auth::guard('company')->check() ||  $company_active == 0)
                <li>
                    <div class="my-2 group-button">
                        <div class="d-flex mb-2">
                            <a class="nav-link login_link btn btn-primary login-btn btn-sm me-2" data-toggle="modal" data-target="#employer_login_Modal" >{{__('Log in')}} </a>
                            <a class="nav-link login_link btn btn-primary login-btn btn-sm" data-toggle="modal" data-target="#employer_logup_Modal" >{{__('Đăng Ký')}} </a>
                        </div>
                        <a href="https://jobvieclam.com" class="btn btn-primary btn-sm">Dành Cho Ứng Viên</a>
                    </div>
                </li>
                
            @elseif(Auth::guard('company')->check() && Auth::guard('company')->user() &&  $company_active == 1 )
                
                <li class="openmyacount">
                    <div class="btn  btn-primary btn-sm  w-100">
                        <span class="side-bar-content text-white"><i class="fas fa-arrow-circle-right text-white"></i> Thông Tin Tài Khoản</span>
                    </div>

                </li>
                <li>
                    <div class="my-2 group-button">
                             <a href="https://jobvieclam.com" class="btn btn-primary btn-sm">Dành Cho Ứng Viên</a>

                        
                    </div>
                </li>
                

        
            @endif

        </ul>
    </div>
</nav>
@include('templates.employers.user.templates.modal_user_info')
@push('scripts')
<script type="text/javascript">
     if ($(window).width() < 992) {
        $('#mobile-sidebar').removeClass("active");
    }
    $(document).ready(function() {
        $('#mobile-sidebarCollapse , .screen-overlay').on('click', function() {
            $('#mobile-sidebar').toggleClass('active');
            $("body").toggleClass("offcanvas-active");
            $(".screen-overlay").toggleClass("show");
        });


        $('.sidebar-item').click(function() {
            // Remove 'active' class from all li elements
            $('.sidebar-item').removeClass('active');
            // Add 'active' class to the clicked li element
            $(this).toggleClass('active');
        });

        $('.openmyacount').click(function() {
            // Remove 'active' class from all li elements
            $('.sidebar-main-nav').removeClass('active');
            $('.menu').addClass('active');
            $('.sidebar-user-nav').addClass('active');
            $('.back-menu-normal').addClass('active');

            // remove sidebar item
            $('.sidebar-bottom').removeClass('active');

            $('.openmyacount').addClass('disabled');

           
        });

        $('.back-menu-normal').click(function() {
            // Remove 'active' class from all li elements
            $('.sidebar-main-nav').addClass('active');
            $('.menu').removeClass('active');
            $('.sidebar-user-nav').removeClass('active');
            $('.back-menu-normal').removeClass('active');
            $('.sidebar-bottom').addClass('active');
            $('.openmyacount').removeClass('disabled');

        });
    });
</script>
@endpush