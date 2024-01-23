    <!-- Main -->
    <!-- Bio -->
    <div class="row py-3">
        <div class="col-md-6 px-3">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="card-body">
                    <div class="widget">
                        <h4 class="widget-title"><i class="fa-solid fa-suitcase mx-2"></i>{{__('Open Jobs')}} </h4>
                        <h1 class="sub blue"><a href="{{route('posted.jobs')}}" style="text-decoration: none;">
                        {{$dashboarOverview->TotalPublished}}</a>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-3">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="card-body">
                    <div class="widget">
                        <h4 class="widget-title"><i class="fa-regular fa-user mx-2"></i>{{__('Followers')}}</h4>
                        <h1 class="sub blue"><a href="{{route('company.followers')}}" style="text-decoration: none;">{{ $dashboarOverview->countFavourite}}</a></h1>
                    </div>
                </div>
            </div>
        </div>

    </div>