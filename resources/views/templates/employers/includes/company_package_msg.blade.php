<div class="instoretxt">
    <div class="posted-manager-header" bis_skin_checked="1">
        <h1 class="title-manage">{{__('Order Management')}}</h1>
    </div>
    <form action="#" class="form-search pt-2">
        <div class="row">
         
        <div class="col-md-3 col-lg-3 col-sm-12" bis_skin_checked="1">
                                        <div class="form-group form-group-datepicker " bis_skin_checked="1">
                                            <label for="from_to">Từ</label>
                                            <input type="date" value="" class=" form-control " name="from" id="from_to" placeholder="Ngày bắt đầu-kết thúc">
                                        </div>
                                    </div>
    <div class="col-md-3 col-lg-3 col-sm-12" bis_skin_checked="1">
                                        <div class="form-group form-group-datepicker " bis_skin_checked="1">
                                            <label for="from_to2">Đến</label>
                                            <input type="date" class=" form-control " value="" name="to" id="from_to2" placeholder="Ngày bắt đầu-kết thúc">
                                        </div>
                                    </div>
<div class="col-md-3 col-lg-3 col-sm-12 d-flex">

    <button type="submit" class="btn btn-primary"><i class="bi bi-search text-white m-2"></i>{{ __('Search') }}</button>
</div>

</div>
</form>

@php
$language = \App::getLocale();
$currency = \App\Country::where('lang', $language)->first()->currency ?? 'vnd';
$curr = isset($package) ? $package->currency : $currency;
$price = $curr == 'vnd' ? number_format($package->package_price, 0, ',', '.') : number_format($package->package_price, 2, '.', ',');
$formatDate = $language == 'vi' ? 'd-m-Y' : 'd M, Y';


@endphp

<div class="table-responsive table-content">

    <table class="table table-applican-manager table-hover mb-0 border-0">
        <thead class="table-light">
            <tr>
                <th class="font-weight-bold p-2 fx-16px p-3" colspan="3">{{ __('Package Name') }}</th>
                <!-- <th class="font-weight-bold"></th> -->
                <th class="font-weight-bold p-2 fx-16px p-3">{{ __('Posting limit') }}</th>
                <th class="font-weight-bold p-2 fx-16px p-3">{{ __('Availed quota') }}</th>
                <th class="font-weight-bold p-2 fx-16px p-3">{{ __('Activation start date') }}</th>

                <th class="font-weight-bold p-2 fx-16px p-3">{{ __('Activatione expriration date') }}</th>
                <th class="font-weight-bold p-2 fx-16px p-3">{{ __('Package Price') }}</th>

            </tr>
        </thead>
        <tbody>

            <tr class="posted-manager_tb_row">

                <td colspan="3">
                    <div class="h-100">
                        <div class="fs-18px font-weight-bold text-primary">
                            {{$package->package_title}}
                        </div>
                    </div>
                </td>
                <td>
                    <div class="h-100 fs-18px">
                        {{$package->package_num_listings}}
                    </div>
                </td>
                <td>
                    <div class="h-100 fs-18px">
                        {{Auth::guard('company')->user()->availed_jobs_quota}} / {{Auth::guard('company')->user()->jobs_quota}}
                    </div>
                </td>
                <td>
                    <div class="h-100 fs-18px">
                        {{Auth::guard('company')->user()->package_start_date->format($formatDate) ? Auth::guard('company')->user()->package_start_date->format($formatDate) :" "}}
                    </div>
                </td>

                <td>
                    <div class="h-100 fs-18px">
                        {{Auth::guard('company')->user()->package_end_date->format($formatDate) ? Auth::guard('company')->user()->package_end_date->format($formatDate) :" "}}
                    </div>
                </td>

                <td>
                    <div class="h-100 fs-18px">
                        {{$package->package_price ? $package->package_price :" "}}
                    </div>
                </td>



            </tr>

        </tbody>
    </table>
</div>
</div>

@push('styles')
<style type="text/css">
    .fx-21px {
        font-size: 21px !important;
    }

    .fx-18px {
        font-size: 18px !important;
    }
</style>
@endpush