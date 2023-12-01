<div class="instoretxt">
    @php
        $language = \App::getLocale();
        $currency = \App\Country::where('lang', $language)->first()->currency ?? 'vnd';
        $curr = isset($package) ? $package->currency : $currency;
       
        $price = $curr == 'vnd' ? number_format($package->package_price, 0, ',', '.') : number_format($package->package_price, 2, '.', ',');
        $formatDate = $language == 'vi' ? 'd-m-Y' : 'd M, Y';
       
    @endphp
    <div class="credit">{{__('Your Package is')}}: <strong>{{$package->package_title}} - {{$price}} ({{$package->currency }})</strong></div>
    <div class="credit">{{__('Package Duration')}} : <strong>{{Auth::guard('company')->user()->package_start_date->format($formatDate)}}</strong> : <strong>{{Auth::guard('company')->user()->package_end_date->format($formatDate)}}</strong></div>
    <div class="credit">{{__('Availed quota')}} : <strong>{{Auth::guard('company')->user()->availed_jobs_quota}}</strong> / <strong>{{Auth::guard('company')->user()->jobs_quota}}</strong></div>

</div>
