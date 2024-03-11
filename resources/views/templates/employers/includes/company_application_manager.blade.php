
<div class="table-content">
    <div class="tool-table  p-3 mt-2 d-flex justify-content-between ">
            <div class="text-muted">
                {{ __('Found') }} <span  class="font-weight-bold text-primary">{{ $userApply->count('id') }}</span> {{ __('Candidates') }}
            </div>
            <div class="CV-filter-box d-flex justify-content-between">
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
    <div class="card-body">
        <div class="table-responsive ">
            <table class="table table-applican-manager table-hover mb-0 border-0" id="table-applican-manager">
                <thead>
                    <tr>
                        <th class="font-weight-bold" >{{ __('Candidate') }}</th>
                        <th class="font-weight-bold"  style="width: 30%;">{{ __('Recruitment Bulletin') }}</th>
                        <th class="font-weight-bold" >{{ __('Candidate Detail') }}</th>
                        <th class="font-weight-bold">{{ __('Date Application') }}</th>

                        <th class="font-weight-bold">{{ __('Status') }}</th>
                        <th class="not-export-column">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($userApply) > 0)
                    @foreach($userApply as $value)
                          @if($value->user == null )
                              @continue;
                          @endif
                    <tr class="cv viewed">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle avatar "
                                    style="width: 50px; height: 50px; flex: 0 0 60px; background-image: url();">
                                    @php
                                        $candidate_image = $value->user->image ? $value->user->image :"no-image.jpg";
                                       
                                    @endphp
                                    <div class="image-candidate">
                                        {{ ImgUploader::print_image("user_images/$candidate_image") }}
                                    </div>
                                </div>
                                <div class="fullname">     
                                    <a role="button" href="javascript:void(0)"  class="font-weight-bold text-dark text-primary-hover text-capitalize public-profile-toggle"
                                        onclick="showModal_candidate('{{ $value->user->id }}', '{{ $value->user->first_name.' '.$value->user->middle_name.' '.$value->user->last_name  }}');">
                                        {{ $value->user->first_name.' '.$value->user->middle_name.' '.$value->user->last_name }}
                                    </a>
                                </div>
                                
                            </div>
                        </td>
                        
                     
                        <td>
                            <div class="h-100">
                                <a class="text-gray has-tooltip job-details curr h-100"  style="cursor: pointer; max-width: 200px;overflow-wrap: break-word;"
                                    data-original-title="null" style="max-width: 150px;" data-job-slug="{{$value->job->slug}}"
                                   data-job-name="{{$value->job->title ??''}}">
                                    {{ $value->job->title ??'' }}
                                </a>
                            </div>
                        </td>
                        <td class="align-top text-gray">
                            <div class="insights">
                                @if($value->user->email)
                                <a href="mailto:{{ $value->user->email }}" class="text-nowrap text-truncate text-gray " style="max-width: 250px;">
                                    <i class="iconmoon icon-recruiter-email text-primary"></i>
                                    {{ $value->user->email }}
                                </a>
                                @endif
                                @if($value->user->phone)
                                <div class="text-nowrap text-truncate" style="max-width: 250px;">
                                    <i class="iconmoon icon-recruiter-phone-call text-primary"></i>
                                    {{ $value->user->phone }}
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="align-top text-gray">
                            <div class="insights text-muted">
                                <div>
                                    <span style="cursor: pointer;">
                                        <i class="iconmoon icon-calendar-icon1"></i> {{ \Carbon\Carbon::parse($value->created_at)->format('Y-m-d H:i') }}
                                    </span>
                                </div>
                            
                            </div>
                        </td>
                        <td>
                            <!-- Có 6 trạng thái status từ cv-status-1 đến cv-status-6  -->
                            <span role="button" class="cv-status cv-status-1 cv-status-default" data-toggle="modal" data-target="#modalReviewApplication">{{ __(\App\JobApply::getListStatus()[$value->status]) }}</span>
                        </td>
                        <td class="text-right pl-0">
                            <span type="button" role="button" data-toggle="dropdown" class=""
                                aria-expanded="false"><i class="iconmoon icon-recruiter-dots"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a role="button" onClick="OpenmodalPopup({{ $value->id }});" class="dropdown-item" data-toggle="modal" data-target="#modalReviewApplication">Đổi trạng thái CV</a> 
                                <a role="button" onClick="submitUpdateNoteApplication({{ $value->id }});" class="dropdown-item"  data-toggle="modal" data-target="#modalReviewApplicationNote">Ghi chú</a> 
                                      @php
                                        $cvUserApply = $value->user->getDefaultCv();

                                       @endphp
                                       
                                       @if( $cvUserApply->type =="1")    
                                            <a role="button" href="javascript:void(0)" class="dropdown-item public-profile-toggle"
                                                onclick="showModal_candidate('{{ $value->user->id }}', '{{ $value->user->first_name.' '.$value->user->middle_name.' '.$value->user->last_name  }}');">
                                                                <!-- Rest of your code here -->Xem cv
                                                </a>

                                        @else
                                             <a role="button" download href="{{'https://jobvieclam.com/'.'cvs/'.$value->user->getDefaultCv()->cv_file}}" target="_blank" class="dropdown-item">Tải CV</a>
                                    
                                        @endif
                               
                            
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="pagiWrap">
                <nav aria-label="Page navigation example " class=" d-flex justify-content-center">
                    @if(isset($userApply) && count($userApply))
                    {{ $userApply->appends(request()->query())->links() }} @endif
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal modal-review-application fade" id="candidate-profile-modal" tabindex="-1"
     aria-labelledby="modalReviewApplicationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="candidate-profile-modal-title">{{__('Candidate public profile')}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="iconmoon icon-recruiter-close"></span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<!-- Job Detail Modal -->
<div class="modal modal-review-application fade" id="job-detail-modal" tabindex="-1"
     aria-labelledby="jobModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="job-detail-modal-title">{{__('Job Details')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="iconmoon icon-recruiter-close"></span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Job Modal -->
@push('styles')
<style type="text/css">
    .image-candidate img {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    #candidate-profile-modal .modal-body iframe{
            width: 100%;
            height: 100%;
    }
    #candidate-profile-modal .modal-dialog {
        max-height: 100vh;
        height: 100vh;
    }
    #candidate-profile-modal .modal-dialog  .modal-content{
        max-height: 90%;
        height: 90%;
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
<script>
function EuToUsCurrencyFormat(input) {
	return input.replace(/[,.]/g, function(x) {
		return x == "," ? "." : ",";
	});
}

$(document).ready(function() {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title = 'Quản lý ứng viên';
	// DataTable initialisation
	$('#table-applican-manager').DataTable({
		"dom": '<"dt-buttons"Bf><"clear">lirtp',
		"paging": false,
		"autoWidth": true,
        bFilter: false, bInfo: false,
        
		"buttons": [{
            extend: 'excelHtml5',
            text: '<i class="fa-solid fa-download  m-1 "></i> Xuất file</button>',
            titleAttr: 'Xuất file',
            className: 'btn btn-outline-primary btn-sm text-primary m-2',
            "exportOptions": {
                columns: ":not(.not-export-column)"
            }
		}],
        

	});
});






    $(document).ready(function(){
    
        $('.job-details').on('click',function(e){
            e.preventDefault();
            var job_slug= $(this).attr('data-job-slug');
            var job_name= $(this).attr('data-job-name');
            if(job_slug != '' && job_slug != undefined){
                var url = "{{ route('job.detail.popup', [':job_slug']) }}";
                url = url.replace(':job_slug',job_slug);
                $.ajax({
                    url: url,
                    method: 'get',
                    beforeSend: function(){
                    },
                    success: function(response){
                        $('#job-detail-modal-title').html($('#job-detail-modal-title').html() + ' - ' + job_name);
                        $('#job-detail-modal .modal-body').html(response);
                        $('#job-detail-modal').modal('show').trigger('focus');
                    }
                });
            }
        });
    });
</script>
@endpush
