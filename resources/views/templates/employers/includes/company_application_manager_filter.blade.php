<div class="card mb-2">
    <div class="card-body">
        <div class="posted-manager-header">
            <h1 class="title-manage">    {{__('Candidate Management')}}</h1>
        </div>
        <form action="{{ route('application.manager') }}" method="get" class="form-search">
            <div class="row filter-cv" style="margin-bottom: 00px">
                <div class="col-sm-12 col-md-4 col-lg-6">
                    <div class="form-group mb-0">
                        <label for="from_to">Từ Khóa</label>
                        <input type="text" name="name" 
                        value="{{ isset($request['name']) ? $request['name'] : '' }}"
                         placeholder="{{ __('Search name, email, phone number') }}" class="form-control">
                        
                    </div>
                </div>
               
                <div class="col-md-3 col-lg-3 col-sm-12">
                                        <div class="form-group form-group-datepicker mb-0" >
                                            <label for="from_to">Từ</label>
                                            <input type="text" class=" form-control datepicker "  value="{{ isset($request['from']) ? $request['from'] : '' }}"  name="from" id="from_to"
                                                placeholder="dd-mm-yyyy" />
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-lg-3 col-sm-12">
                                        <div class="form-group form-group-datepicker mb-0"  >
                                            <label for="from_to2">Đến</label>
                                            <input type="text" class=" form-control datepicker " value="{{ isset($request['to']) ? $request['to'] : '' }}"  name="to" id="from_to2"
                                                placeholder="dd-mm-yyyy" />
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
            </div>
            <div class="row  d-flex justify-content-end">
                <div class="col-sm-12  col-md-4 col-lg-2 my-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass text-white mx-1"></i>Tìm Kiếm</button>
                </div>
           </div>
        </form>
 



        
        <ul class="tabslet-tab d-flex justify-content-start ">
            <li>
                <a href="{{ route('application.manager', ['status' => '1']) }}"
                class="{{ Request::get('status') == 1 ? 'type-active' : '' }}">{{ __('CV Receive')
                }}</a>
            </li>
            <li>
            <a href="{{ route('application.manager', ['status' => '2']) }}"
                    class="{{ Request::get('status') == 2 ? 'type-active' : '' }}">{{ __('Review')
             }}</a>
            </li>


            <li>
            <a href="{{ route('application.manager', ['status' => '3']) }}" class="{{ Request::get('status') == 3 ? 'type-active' : '' }}">{{ __('Interview') }}</a>
            </li>
           
            <li>
            <a href="{{ route('application.manager', ['status' => '5']) }}"
                    class="{{ Request::get('status') == 5 ? 'type-active' : '' }}">{{ __('Confirm')
                    }}</a>
            </li>
            <li>
            <a      href="{{ route('application.manager', ['status' => '6']) }}"
                class="{{ Request::get('status') == 6 ? 'type-active' : '' }}">{{ __('Reject')
                }}</a>
            </li>
            
        </ul>
        
   
    @include('templates.employers.includes.company_application_manager')
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
    function initdatepicker(){
            $(".datepicker").datepicker({

                autoclose: true,
                format:'dd-mm-yyyy',
                locale:'vi',
language: 'vi',
            });
    }
    $(document).ready(function() {
        $('#quick-filter-1').click(function() {
            window.location.href = "{{ route('application.manager') }}"
        })

        $('#quick-filter-2').click(function() {
            window.location.href = "{{ route('application.manager', ['log_seen' => 'unseen']) }}"
        })

        
        initdatepicker();

    })
    </script>
@endpush
