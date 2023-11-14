<li class="nav-item  "> <a href="javascript:;" class="nav-link nav-toggle"> <i class="fa fa-globe" aria-hidden="true"></i> <span class="title">{{__('Ads Banner')}}</span> <span class="arrow"></span> </a>
    @php
    $ads = \App\AdBanner::all()->toArray();
    $route = count($ads) ? 'edit.ad-banner' : 'create.ad-banner';
    @endphp
    <ul class="sub-menu">
        <li class="nav-item  "> <a href="{{ route($route) }}" class="nav-link "> <span class="title">{{__('Ads Banner')}}</span> </a> </li>
    </ul>
</li>
 