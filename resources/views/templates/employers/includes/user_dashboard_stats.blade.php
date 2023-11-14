<div class="row">
    <div class="col-lg-3 mb-4">
        <div class="card card-bio mb-3 w-100 h-100 shadow-sm">
        <div class="card-body p-0">
            <p class="card-text fs-14px text-center">
            <i class="far fa-user fa__icon-black me-1"></i>
            <strong>{{__('Profile Views')}}</strong>
            </p>
            <h5 class="card-title text-blue-color text-center fs-36px mt-3">{{Auth::user()->num_profile_views}}</h5>
        </div>
        </div>
    </div>
    <div class="col-lg-3 mb-4">
        <div class="card card-bio mb-3 w-100 h-100 shadow-sm">
        <div class="card-body p-0">
            <p class="card-text fs-14px text-center">
            <span class="icon-office-building-icon fs-18px me-2"></span>
            <strong>{{__('Followings')}}</strong>
            </p>
            <a href="{{route('my.followings')}}"><h5 class="card-title text-blue-color text-center fs-36px mt-3">{{Auth::user()->countFollowings()}}</h5></a>
        </div>
        </div>
    </div>
    <div class="col-lg-3 mb-4">
        <div class="card card-bio mb-3 w-100 h-100 shadow-sm">
        <div class="card-body p-0">
            <p class="card-text fs-14px text-center">
            <span class="icon-user-1-icon fs-18px me-2"></span>
            <strong>{{__('My CV List')}}</strong>
            </p>
            <a href="{{url('my-profile#cvs')}}"><h5 class="card-title text-blue-color text-center fs-36px mt-3">{{Auth::user()->countProfileCvs()}}</h5></a>
        </div>
        </div>
    </div>
    <div class="col-lg-3 mb-4">
        <div class="card card-bio mb-3 w-100 h-100 shadow-sm">
        <div class="card-body p-0">
            <p class="card-text fs-14px text-center">
            <i class="far fa-comment-alt-dots fa__icon-black me-1"></i>
            <strong>{{__('Messages')}}</strong>
            </p>
            <a href="{{route('my.messages')}}"><h5 class="card-title text-blue-color text-center fs-36px mt-3">{{Auth::user()->countUserMessages()}}</h5></a>
        </div>
        </div>
    </div>
</div>