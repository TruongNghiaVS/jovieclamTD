@if(Auth::guard('company')->check())
<form action="{{route('job.seeker.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox seekersrch">		
		<div class="input-group">
		  <input type="text"  name="search" id="empsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Skills or Job Seeker Details')}}" autocomplete="off" />
		  <span class="input-group-btn">
			<input type="submit" class="btn" value="{{__('Search for a job')}}">
		  </span>
		</div>
		</div>
        
    </div>
</form>
@else
<form action="{{route('job.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox">
		
		<div class="row">
			<div class="col-lg-9 col-md-8">
				<input type="text"  name="search" id="jbsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Skills or Job Seeker Details')}}" autocomplete="off" /></div>
			<div class="col-lg-3 col-md-4">
				<button type="submit" class="btn btn-primary">{{__('Search for a job')}}</button>
			</div>
		</div>
				
		<div class="srcsubfld additional_fields collapse mt-3" id="additional_fields">
			<div class="row">
				<div class="col-lg-6">
					<span id="city_dd">
					{!! Form::select('city_id[]', ['' => __('Select City')]+$cities, Request::get('city_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'city_id')) !!}
					</span>
				</div>
				<div class="col-lg-3">
					<span id="job_type_dd">
						{!! Form::select('job_type_id[]', ['' => __('Select Job Type')] + $jobTypes, Request::get('job_type_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'job_type_id')) !!}
					</span>
				</div>
				<div class="col-lg-6">
					<span id="functional_area_dd">
					{!! Form::select('functional_area_id[]', ['' => __('Select functional area')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'functional_area_id')) !!}
					</span>
				</div>
				<div class="col-lg-3">
					<span id="degree_leve_dd">
						{!! Form::select('degree_level_id[]', ['' => __('Select Degree Level')] + $degreeLevels, Request::get('degree_level_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'degree_level_id')) !!}
					</span>
				</div>
			</div>
		</div>	
			
		</div>	
    </div>
</form>
@endif
