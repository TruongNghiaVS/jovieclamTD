
<nav id="default-sidebar" class="active">
    <div class="sidebar-header">
        @if(Auth::user())
        <div class="default-sidebar__btn">
            <button type="button" id="default-sidebarCollapse" class="btn">
                <span class=""><i class="fas fa-bars fa-1x"></i></span>
            </button>
        </div>

        <div class="profile" bis_skin_checked="1">
            <div class="avatar" bis_skin_checked="1"><a href="#">
                            @if(Auth::user())
                            {{Auth::user()->printUserImage()}}
                            @else
                            <img id="avatar" class="avatar" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
                            @endif
                </div>
            <div class="username" bis_skin_checked="1">
                <p><a href="#">{{auth()->user()->name}}</a></p>
            </div>
            <div class="back-menu-normal" bis_skin_checked="1"><i class="bi bi-arrow-left"></i></div>
        </div>
        @elseif(Auth::guard('company')->user()) 

        <div class="profile" bis_skin_checked="1">
            <div class="avatar" bis_skin_checked="1"><a href="#">
                {{$company->printCompanyImage()}}  
            </div>
            <div class="username" bis_skin_checked="1">
                <p><a href="#">{{Auth::guard('company')->user()->name}}</a></p>
            </div>
            <div class="back-menu-normal" bis_skin_checked="1"><i class="bi bi-arrow-left"></i></div>
        </div>
        @else

        <div class="profile" bis_skin_checked="1">
            <div class="avatar" bis_skin_checked="1"><a href="#">
                    <img class="lazy-bg" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="avatar" style=""></a>
            </div>
            <div class="username" bis_skin_checked="1">
                <p><a href="#">Welcome to Jobvieclam</a></p>
            </div>
            <div class="back-menu-normal" bis_skin_checked="1"><i class="bi bi-arrow-left"></i></div>
        </div>

        @endif
      
            @if(Auth::user())
            <ul class="list-unstyled components sidebar-default-nav" id="sidebar-default-nav">
                <li class="sidebar-item {{ Request::url() == route('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ Request::url() == route('home') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-dashboard-icon fs-24px me-2"></span>
                            <span class="side-bar-content"><!-- {{__('Dashboard')}} -->

Dashboard

</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('my.profile') ? 'active' : '' }}">
                    <a href="{{ route('my.profile') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my.profile') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-edit-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> {{__('Edit Profile')}}</span>

                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('change.template') ? 'active' : '' }}">
                    <a href="{{ route('change.template') }}" class="list-group-item list-group-item-action {{ Request::url() == route('change.template') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-edit-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> {{__('Change Template')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item">
                    <!-- <a href="{{ route('view.public.profile', Auth::user()->id) }}" class="list-group-item list-group-item-action {{ route('view.public.profile', Auth::user()->id) }}"> -->
                    <a  href="#" data-toggle="modal" data-target="#modal_user_info">
                        <div class="d-flex w-100">
                                <span class="icon-eye-icon fs-24px me-2"></span>
                                <span class="side-bar-content">{{__('View Public Profile')}}</span>
                            </div>
                        </a>
                </li>
                <li class="">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex w-100">
                            <span class="icon-edit-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> Việc làm của tôi</span>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled sublist sidebar-item {{ Request::url() == route('my.job.applications') || Request::url() == route('my.favourite.jobs')  ? 'show' : '' }}"  id="pageSubmenu">
                        <li class="{{ Request::url() == route('my.job.applications') ? 'active' : '' }}">
                            <a href="{{ route('my.job.applications') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my.job.applications') ? 'active' : '' }}">
                                <div class="d-flex w-100">
                                    <span class="icon-doc-check-icon fs-24px me-2"></span>
                                    <span class="side-bar-content"> {{__('My Job Applications')}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="{{ Request::url() == route('my.favourite.jobs') ? 'active' : '' }}">
                            <a href="{{ route('my.favourite.jobs') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my.favourite.jobs') ? 'active' : '' }}">
                                <div class="d-flex w-100">
                                    <span class="icon-heart-icon fs-24px me-2"></span>
                                    <span class="side-bar-content">{{__('My Favourite Jobs')}}</spant>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ Request::url() == route('my-alerts') ? 'active' : '' }}">
                    <a href="{{ route('my-alerts') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my-alerts') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-bell-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> {{__('My Job Alerts')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('my.messages') ? 'active' : '' }}">
                    <a href="{{route('my.messages')}}" class="list-group-item list-group-item-action {{ Request::url() == route('my.messages') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-message-icon fs-24px me-2 box-message-icon">
                                <span class="badge">{{\App\CompanyMessage::where('seeker_id', Auth::user()->id)->where('status','unviewed')->where('type','reply')->count()}}</span>
                            </span>
                            <span class="side-bar-content"> {{__('My Messages')}}</span>

                        </div>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::url() == route('my.followings') ? 'active' : '' }}">
                    <a href="{{route('my.followings')}}" class="list-group-item list-group-item-action {{ Request::url() == route('my.followings') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-office-building-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> {{__('My Followings')}}</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('site_user.logout') }}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100">
                            <span class="icon-logout-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> {{__('Logout')}}</span>
                        </div>
                    </a>
                </li>

            </ul>
            @endif
       

    </div>

    <div class="sidebar-bottom">
       
    </div>
</nav>
@include('templates.vietstar.user.templates.modal_user_info')
@push('scripts')
<script type="text/javascript">
    if ($(window).width() > 992) {
        $('#default-sidebar').addClass("active");
    }
    else {
        $('#default-sidebar').remove("active");
    }


    

    $(document).ready(function() {
        $('#default-sidebarCollapse').on('click', function() {
            $('#default-sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });


        $('.sidebar-item').click(function() {
            // Remove 'active' class from all li elements
            $('.sidebar-item').removeClass('active');
            // Add 'active' class to the clicked li element
            $(this).toggleClass('active');
        });

        // $('.openmyacount').click(function() {
        //     // Remove 'active' class from all li elements
         
        //     $('.menu').addClass('active');
        //     $('.sidebar-user-nav').addClass('active');
        //     $('.back-menu-normal').addClass('active');

        // });

        // $('.back-menu-normal').click(function() {
        //     // Remove 'active' class from all li elements
            
        //     $('.menu').removeClass('active');
        //     $('.sidebar-user-nav').removeClass('active');
        //     $('.back-menu-normal').removeClass('active');
        // });
    });
</script>
@endpush