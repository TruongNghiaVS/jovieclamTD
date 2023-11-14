<div class="modal-body">
    <div class="form-body">
        <div class="formrow" id="div_company">
            <input class="form-control" id="company" placeholder="{{__('Company')}}" name="company" type="text" value="{{(isset($profileActivity)? $profileActivity->company:'')}}">
            <span class="help-block company-error"></span> </div>
        
        <div class="formrow" id="div_company">
            <input class="form-control" id="role" placeholder="{{__('Role')}}" name="role" type="text" value="{{(isset($profileActivity)? $profileActivity->role:'')}}">
            <span class="help-block role-error"></span> </div>
        
        <div class="formrow" id="div_date_start">
            <input class="form-control datepicker"  autocomplete="off" id="date_start" placeholder="{{__('Start Date')}}" name="date_start" type="text" value="{{(isset($profileActivity->date_start)? $profileActivity->date_start->format('Y-m-d'):'')}}">
            <span class="help-block date_start-error"></span> </div>

        <div class="formrow" id="div_date_end">
            <input class="form-control datepicker" autocomplete="off" id="date_end" placeholder="{{__('End Date')}}" {{ (isset($profileActivity) && ($profileActivity->date_end == null)) ? 'disabled' : '' }} name="date_end" type="text" value="{{ (isset($profileActivity->date_end)? $profileActivity->date_end->format('Y-m-d'):'')}}">
            <input type="checkbox" class="is_currently_working" value="1" name="is_currently_working" {{ (isset($profileActivity) && ($profileActivity->date_end == null))  ? 'checked' : '' }} id="is_currently_working" >{{__('Currently working')}}
            <span class="help-block date_end-error"></span> </div>
            
        <div class="formrow" id="div_description">
            <textarea name="description" class="form-control" id="description" placeholder="{{__('Description')}}">{{(isset($profileActivity)? $profileActivity->description:'')}}</textarea>
            <span class="help-block description-error"></span> </div>
    </div>
</div>