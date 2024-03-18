@extends('templates.employers.layouts.app')
@inject('carbon', 'Carbon\Carbon')


@section('content')


<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->


@include('templates.employers.includes.company_dashboard_menu')
<div class="company-wrapper main-content">

    @include('templates.employers.includes.mobile_dashboard_menu')
    <div class="container company-content">
        <div class="card mb-2">
            <div class="card-body">
                <div class="posted-manager-header">
                    <h1 class="title-manage">{{__('Company\'s Posted Jobs')}}</h1>
                    <a href="{{route('post.job')}}" class="btn btn-primary text-white btn-sm"><i class="fa-regular fa-pen-to-square text-white m-1"></i>{{ __('Create a Recruitment Form') }}</a>
                </div>
                <form action="{{ route('posted.jobs') }}" method="get" class="form-search pt-2">
                    <div class="row filter-job">
                        <div class="col-md-5 col-lg-3 col-sm-12">
                            <div class="form-group">
                                <label for="">Từ Khóa</label>
                                <input type="text" name="title" placeholder="{{ __('Research Jobs') }}" class="form-control search-title" value="{{ isset($request['title']) ? $request['title'] : '' }}">

                            </div>
                        </div>
                        {{-- <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <select name="status" class="form-select" name="" id="">
                                                <option value="">{{ __('Select status') }}</option>
                        @foreach (\App\Job::getListStatusJob() as $key => $value)
                        <option {{ isset($request['status']) && $request['status'] == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                        </select>
                    </div>
            </div> --}}

                <div class="col-md-3 col-lg-2 col-sm-12">
                    <div class="form-group">
                        <label for="find_day">Tìm Theo Ngày</label>
                        <select name="find_day" value="{{ isset($request['find_day']) ? $request['find_day'] : '0' }}" class="form-select" id="find_day">
                            <option value="0">Ngày Đăng</option>
                            <option value="1">Ngày Hết Hạn</option>

                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2 col-sm-12">
                    <div class="form-group form-group-datepicker ">
                        <label for="from_to">Từ</label>
                        <input type="date" value="{{ isset($request['from']) ? $request['from'] : '' }}" class=" form-control " name="from" id="from_to" placeholder="{{ __('Start date-End date') }}" />
                    </div>
                </div>

                <div class="col-md-3 col-lg-2 col-sm-12">
                    <div class="form-group form-group-datepicker ">
                        <label for="from_to2">Đến</label>
                        <input type="date" class=" form-control " value="{{ isset($request['to']) ? $request['to'] : '' }}" name="to" id="from_to2" placeholder="{{ __('Start date-End date') }}" />
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                    <div class="form-group">
                        <label for="city_id">{{ __('City') }}</label>
                        <select name="city_id" class="form-select" name="" id="city_id" value="{{ isset($request['city_id']) ? $request['city_id'] : '' }}">
                            <option value="">{{ __('Select cities') }}</option>
                            @foreach ($cities as $key => $value)
                            <option {{ isset($request['city_id']) && $request['city_id'] == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



        </div>

            <div class="row  d-flex justify-content-end">
                <div class="col-sm-12  col-md-4 col-lg-2 my-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass text-white mx-1"></i>Tìm Kiếm</button>
                </div>
           </div>

        </form>
    </div>

    <div class="card-body pt-0">
        <ul class="tabslet-tab d-flex justify-content-start">
            <li>
                <a href="{{ route('posted.jobs', ['status' => '1']) }}" class=" {{ Request::get('status') == 1 ? 'type-active' : '' }}">{{ __('Active job') }}</a>
            </li>
            <li>
                <a href="{{ route('posted.jobs', ['status' => '2']) }}" class="{{ Request::get('status') == 2 ? 'type-active' : '' }}">{{ __('Pending job') }}</a>
            </li>
            <li>
                <a href="{{ route('posted.jobs', ['status' => '3']) }}" class=" {{ Request::get('status') == 3 ? 'type-active' : '' }}">{{ __('Inactive job') }}</a>
            </li>
            <li>
                <a href="{{ route('posted.jobs', ['expired' => 'true']) }}" class=" {{ Request::get('expired') == 'true' ? 'type-active' : '' }}">{{ __('Job is expired') }}</a>
            </li>
        </ul>
        <div class="border">
           
            <div class="table-responsive table-content">
                <table class="table table-applican-manager table-hover mb-0 border-0 " id="company_posted_tb">
                    <thead>
                        <tr>
                            @if(Request::get('status') == 2)
                            <th class="font-weight-bold p-2" >{{ __('Positions') }}</th>
                            <!-- <th class="font-weight-bold"></th> -->
                            <th class="font-weight-bold p-2"  >Ngày Hết Hạn</th>
                            <th class="font-weight-bold p-2"  >{{ __('Status') }}</th>
    
                            <th class="font-weight-bold p-2"  >{{ __('Location') }}</th>
                            <th class="font-weight-bold p-2 text-center"  >{{ __('Post Job') }}</th>
                            <th class="font-weight-bold p-2"  >{{ __('Action') }}</th>
    
                            @else
                                <th class="font-weight-bold p-2" >{{ __('Positions') }}</th>
                                <!-- <th class="font-weight-bold"></th> -->
                                <th class="font-weight-bold p-2"  >Ngày Đăng</th>
                                <th class="font-weight-bold p-2"  >Ngày Hết Hạn</th>
                                <th class="font-weight-bold p-2"  >{{ __('Status') }}</th>
    
                                <th class="font-weight-bold p-2"  >{{ __('Location') }}</th>
                               
                                <th class="font-weight-bold p-2" >Lượt Nộp</th>
                                <th class="font-weight-bold p-2"  >{{ __('Interview Candidates') }}</th>
                                <th class="font-weight-bold p-2"  >{{ __('List of Hired Candidates') }} </th>
                                <th class="font-weight-bold p-2"  >{{ __('List of Rejected Candidates') }}</th>
                                @if(Request::get('status') == 2)
                                <th class="font-weight-bold p-2 text-center"  >{{ __('Post Job') }}</th>
                                @endif
                                <th class="font-weight-bold p-2 not-export-column"  >{{ __('Action') }}</th>
    
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($jobs) && count($jobs))
                        @foreach ($jobs as $job)
                        @if(Request::get('status') == 2)

    
                        <tr class="posted-manager_tb_row" id="job_li_{{$job->id}}">
    
                            <td>
                                <div class="d-flex align-items-center h-100">
                                    <a class="fs-16px font-weight-bold text-primary" href="{{url('/')}}/edit-front-job/{{$job->id}}" target="_blank">
                                        {{ $job->title }}
                                    </a>
                                </div>
                            </td>
    
                            <td>
                                <div class="d-flex align-items-center h-100 fs-16px">
                                    {{ $job->expiry_date }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center h-100 fs-16px">
                                    @if(Carbon\Carbon::parse($job->expiry_date)->format('Y-m-d') > Carbon\Carbon::now()->format('Y-m-d'))
                                    {{ __(\App\Job::getListStatusJob()[$job->status]) }}
                                    @else
                                    {{ __('Job is expired') }}
                                    @endif
                                </div>
                            </td>
    
                            <td>
                                <div class="tags h-100">
                                    <span class="tag location fs-18px">{{ $job->getCity('city') }} </span>
                                    <span class="tag time">{{ $job->getJobShift('job_shift') }}</span>
                                </div>
                            </td>
    
                            <td>
                                    <a href="javascript:void(0)" class="d-flex align-items-center justify-content-center h-100 fs-18px cursor-pointer" onclick="updateJob({{ $job->id }})">
                                        <i class="fa-solid fa-upload p-2"></i>
                                    </a>
                            </td>
                            <td>
                                <div class="d-flex">
                                        <a href="{{url('/')}}/edit-front-job/{{$job->id}}">
                                            <i class="fa-regular fa-pen-to-square p-2 cursor-pointer"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="deleteJob({{ $job->id }})">
                                            <i class="fa-solid fa-trash p-2 cursor-pointer"></i>
                                        </a>
                                      
                                </div>
                            </td>
    
    
    
                        </tr>
                        @else

                        <tr class="posted-manager_tb_row" id="job_li_{{$job->id}}">
                                <td>
                                    <div class="d-flex align-items-center h-100">
                                        <a class="fs-16px font-weight-bold text-primary" href="{{url('/')}}/edit-front-job/{{$job->id}}" target="_blank">
                                            {{ $job->title }}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center h-100 fs-16px">
                                        {{ $job->created_at }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center h-100 fs-16px">
                                        {{ $job->expiry_date }}

                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center h-100 fs-16px">
                                        @if(Carbon\Carbon::parse($job->expiry_date)->format('Y-m-d') > Carbon\Carbon::now()->format('Y-m-d'))
                                        {{ __(\App\Job::getListStatusJob()[$job->status]) }}
                                        @else
                                        {{ __('Job is expired') }}
                                        @endif
                                    </div>
                                </td>
    
                                <td>
                                    <div class="tags h-100">
                                        <span class="tag location fs-18px">{{ $job->getCity('city') }} </span>
                                        <span class="tag time">{{ $job->getJobShift('job_shift') }}</span>
                                    </div>
                                </td>
    
                                
                                <td>
                                    <div class="d-flex align-items-center justify-content-center h-100 fs-18px">
                                        {{ $job->getCoundApplyUser() }} 
                                    </div>
                                </td>
    
                                <td>
                                    <div class="d-flex align-items-center justify-content-center h-100 fs-18px">
                                        {{ $job->getCoundApplyUser(3) }}
                                    </div>
                                </td>
    
                                <td>
                                    <div class="d-flex align-items-center justify-content-center h-100 fs-18px">
                                        {{ $job->getCoundApplyUser(5) }}
                                    </div>
                                </td>
    
                                <td>
                                    <div class="d-flex align-items-center justify-content-center h-100 fs-18px">
                                        {{ $job->getCoundApplyUser(6) }}
                                    </div>
                                </td>
                             
                                <td>
                                    <div class="d-flex">
                                        <a href="{{url('/')}}/edit-front-job/{{$job->id}}">
                                            <i class="fa-regular fa-pen-to-square p-2 cursor-pointer"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="deleteJob({{ $job->id }})">
                                            <i class="fa-solid fa-trash p-2 cursor-pointer"></i>
                                        </a>
                                      
                                    </div>
                                </td>
                        </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('flash::message')

<!-- job end -->
<!-- Pagination Start -->
<div class="pagiWrap">
    <div class="row">
        <div class="col-md-5">
            <div class="showreslt">
                {{ __('Showing Pages') }} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }}
                {{ __('Total') }} {{ $jobs->total() }}
            </div>
        </div>
        <div class="col-md-7 text-right">
            @if (isset($jobs) && count($jobs))
            {{ $jobs->appends(request()->query())->links() }}
            @endif
        </div>
    </div>
</div>
<!-- Pagination end -->
</div>
<div class="modal fade" id="comfirm_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Đăng Tuyển Dụng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
            Tin tuyển dụng của quý khách sẽ được kiểm duyệt trong vòng 2 ngày 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" id="comfirm_update_btn" class="btn btn-primary">Đồng ý</button>
      </div>
    </div>
  </div>
</div>


</div>
@include('templates.employers.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    input.form-control.search-title {}

    a.px-auto.btn.btn-outline-primary {
        width: 24%;
        margin-left: 8px;
    }

    .type-active {
        background: #981b1d;
        color: white;
    }

    .row.filter-job {}

    .fx-16px {
        font-size: 16px !important;
    }
    .w-10 {
        width: 10%;
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .dt-buttons .btn-outline-primary span
    {
        color: var(--bs-primary);
    }

    .dt-buttons .btn-outline-primary:hover span {
        color: white;
    }
    .table-content .card-body {
        padding: 1rem 1rem;
    }
    

  
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

<script type="text/javascript">

function EuToUsCurrencyFormat(input) {
	return input.replace(/[,.]/g, function(x) {
		return x == "," ? "." : ",";
	});
}

$(document).ready(function() {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title = 'Quản lý đăng tuyển';
	// DataTable initialisation
	$('#company_posted_tb').DataTable({
		"dom": '<"dt-buttons"Bf><"clear">lirtp',
		"paging": false,
		"autoWidth": true,
        "oLanguage": {
        "sEmptyTable": "Không có dữ liệu"
        },
        bFilter: false, bInfo: false,
        
		"buttons": [{
            extend: 'excel',
            text: '<i class="fa-solid fa-download  m-1 "></i> Xuất file</button>',
            titleAttr: 'Xuất file',
            className: 'btn btn-outline-primary btn-sm text-primary m-2',
            "exportOptions": {
                columns: ":not(.not-export-column)"
            }
		}],

       
	});
});



    function deleteJob(id) {
        console.log(id);
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("{{ route('delete.front.job') }}", {
                    id: id,
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                })
                .done(function(response) {
                    if (response == 'ok') {
                        $('#job_li_' + id).remove();
                    } else {
                        alert('Request Failed!');
                    }
                });
        }
    }


    function updateJob(id) {
     
        
        $("#comfirm_update").modal("show");
        $("#comfirm_update_btn").click(()=>{
           
         
            $.ajax({
            type: "POST",
            url:  `{{ route('store.publish.job') }}`,
            beforeSend: showSpinner(),
            data: {
                id:id,
                _token: '{{ csrf_token() }}'
            },
       
            })
            .done(function(data){
          
                  hideSpinner()
                   if(data.success);{
                       $("#comfirm_update .modal-body").empty();
                       $("#comfirm_update .modal-body").text("Yêu cầu thành công")
                       $("#comfirm_update #comfirm_update_btn").css("display","none");
                       setTimeout(() => {
                        location.reload();
                       }, 300);
                  


                   }

              
                    
            })
            .fail(function(jqXHR, textStatus){
                hideSpinner()  
            })
            .always(function(jqXHR, textStatus) {
                
            });
            
            
        })
      
    }
    $(document).ready(function() {
      


        $('.btn-refresh').on('click', function() {
            var id = $(this).data('id');
            var url = "{{ route('refresh.front.job',':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                method: 'get',
                beforeSend: function() {
                    console.log(id);
                },
                success: function(data) {
                    console.log(data);
                    if (data.success == true) {
                        alert("{{__('Refresh job success!')}}");
                        refreshPage();
                    } else {
                        alert("{{__('Refresh job failed!')}}");
                    }
                }
            });
        });
    });
    
    function refreshPage() {
        location.reload(true);
    }

    function exportFile() {

    }
</script>
@endpush