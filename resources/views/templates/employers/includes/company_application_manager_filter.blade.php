<div class="card mb-2">
    <div class="card-body">
        <form action="{{ route('application.manager') }}" method="get" class="form-search">
            <div class="row filter-cv" style="margin-bottom: 00px">
                <div class="col-sm-12 col-md-4 col-lg-5">
                    <div class="form-group">
                        <label for="from_to">Từ Khóa</label>
                        <input type="text" name="name" 
                        value="{{ isset($request['name']) ? $request['name'] : '' }}"
                         placeholder="{{ __('Search name, email, phone number') }}" class="form-control">
                        
                    </div>
                </div>
               
                <div class="col-md-3 col-lg-3 col-sm-12">
                                        <div class="form-group form-group-datepicker " >
                                            <label for="from_to">Từ</label>
                                            <input type="date" value="{{ isset($request['from']) ? $request['from'] : '' }}"  class=" form-control " name="from" id="from_to"
                                                placeholder="{{ __('Start date-End date') }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-lg-3 col-sm-12">
                                        <div class="form-group form-group-datepicker "  >
                                            <label for="from_to2">Đến</label>
                                            <input type="date" class=" form-control " value="{{ isset($request['to']) ? $request['to'] : '' }}"  name="to" id="from_to2"
                                                placeholder="{{ __('Start date-End date') }}" />
                                        </div>
                                    </div>
                {{-- <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <select name="status" class="form-select" name="" id="">
                            <option disabled selected value="">{{ __('Select status') }}</option>
                            <option value="1">{{ __('CV Receive') }}</option>
                            <option value="2">{{ __('Review') }}</option>
                            <option value="3">{{ __('Interview') }}</option>
                            <option value="4">{{ __('Suggest') }}</option>
                            <option value="5">{{ __('Confirm') }}</option>
                            <option value="6">{{ __('Reject') }}</option>
                        </select>
                    </div>
                </div> --}}
                 <div class="col-sm-6  col-md-2 col-lg-2 d-flex">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search text-white"></i>Tìm kiếm</button>
                </div>
            </div>
        </form>
        <div class=" group-button-applycation">
            <a href="{{ route('application.manager', ['status' => '1']) }}"
                class="px-auto btn btn-outline-primary {{ Request::get('status') == 1 ? 'type-active' : '' }}">{{ __('CV Receive')
                }}</a>
                <a href="{{ route('application.manager', ['status' => '2']) }}"
                    class="px-auto btn btn-outline-primary {{ Request::get('status') == 2 ? 'type-active' : '' }}">{{ __('Review')
             }}</a>
              <a href="{{ route('application.manager', ['status' => '3']) }}" class="px-auto btn btn-outline-primary {{ Request::get('status') == 3 ? 'type-active' : '' }}">{{ __('Interview') }}</a>
            <a href="{{ route('application.manager', ['status' => '4']) }}" class="px-auto btn btn-outline-primary {{ Request::get('status') == 4 ? 'type-active' : '' }}">{{ __('Suggest') }}</a>
            <a href="{{ route('application.manager', ['status' => '5']) }}"
                    class="px-auto btn btn-outline-primary {{ Request::get('status') == 5 ? 'type-active' : '' }}">{{ __('Confirm')
                    }}</a>
           <a      href="{{ route('application.manager', ['status' => '6']) }}"
                class="px-auto btn btn-outline-primary {{ Request::get('status') == 6 ? 'type-active' : '' }}">{{ __('Reject')
                }}</a>
        </div>
    </div>
</div>

<div class="mb-2 d-flex justify-content-between">
    <div class="text-muted">
        {{ __('Found') }} <span  class="font-weight-bold text-primary">{{ $userApply->count('id') }}</span> {{ __('Candidates') }}
    </div>
    <div class="d-flex justify-content-between">
        <div class="custom-control custom-radio custom-control-inline mr-2">
            <input type="radio" id="quick-filter-1" name="quick-filter" class="custom-control-input" {{ $log_seen != 'unseen' ? 'checked' : '' }}>
            <label class="custom-control-label" for="quick-filter-1">{{ __('Show all CV') }}</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="quick-filter-2" name="quick-filter" class="custom-control-input" {{ $log_seen == 'unseen' ? 'checked' : '' }}>
            <label class="custom-control-label" for="quick-filter-2">{{ __('Show only unread CV') }}</label>
        </div>
    </div>
</div>
@push('styles')
<style type="text/css">
    a.px-auto.btn.btn-outline-primary {
        width: 16%;
        margin-left: 6px;
    }
    .type-active {
        background: #981b1d;
        color: white;
    }
 
    .row.filter-cv {
        margin-bottom: -18px;
    }
</style>
@endpush
@push('scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#quick-filter-1').click(function() {
            window.location.href = "{{ route('application.manager') }}"
        })

        $('#quick-filter-2').click(function() {
            window.location.href = "{{ route('application.manager', ['log_seen' => 'unseen']) }}"
        })

    })
    </script>
@endpush
