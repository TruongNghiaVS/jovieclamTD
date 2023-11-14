    <!-- Main -->
    <!-- Bio -->
    <div class="row py-3">
        <div class="col-md-6">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="card-body">
                    <div class="widget">
                        <h4 class="widget-title"><span class="iconmoon icon-suitcase-icon"></span>{{__('Open Jobs')}}</h4>
                        <h1 class="sub blue"><a href="{{route('posted.jobs')}}" style="text-decoration: none;">{{Auth::guard('company')->user()->countOpenJobs()}}</a></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="card-body">
                    <div class="widget">
                        <h4 class="widget-title"><span class="iconmoon icon-recruiter-user"></span>{{__('Followers')}}</h4>
                        <h1 class="sub blue"><a href="{{route('company.followers')}}" style="text-decoration: none;">{{Auth::guard('company')->user()->countFollowers()}}</a></h1>
                    </div>
                </div>
            </div>
        </div>

    </div>