<div class="modal-body">
    <div class="form-body">
        <div class="formrow" id="ref_name_dd">
            <input required class="form-control col-sm-10" id="ref_name" placeholder="{{__('Full name')}}" name="name" type="text" value="{{(isset($profileReferences)? $profileReferences->ref_name:'')}}">
            <span class="help-block ref_name-error text-danger"></span>
        </div>        
        <div class="formrow" id="ref_position_dd">
            <input required class="form-control" id="ref_position" placeholder="{{__('Position')}}" name="position" type="text" value="{{(isset($profileReferences)? $profileReferences->ref_position:'')}}">
            <span class="help-block ref_position-error text-danger"></span> </div>

        <div class="formrow" id="ref_company_dd">
            <input required class="form-control" id="ref_company" placeholder="{{__('Company')}}" name="company" type="text" value="{{(isset($profileReferences)? $profileReferences->ref_company:'')}}">
            <span class="help-block ref_company-error text-danger"></span> </div>

        <div class="formrow" id="ref_phone_dd">
            <input required class="form-control" id="ref_phone" placeholder="{{__('Phone')}}" name="phone" type="text" value="{{(isset($profileReferences)? $profileReferences->ref_phone:'')}}">
            <span class="help-block ref_phone-error text-danger"></span> </div>

        <div class="formrow" id="ref_email_dd">
            <input required  class="form-control" id="ref_email" placeholder="{{__('Email')}}" name="email" type="text" value="{{(isset($profileReferences)? $profileReferences->ref_email:'')}}">
            <span class="help-block ref_email-error text-danger"></span> </div>
    </div>
</div>
@push('scripts') 
<script type="text/javascript">

    $(document).ready(function () {
        $('#ref_name').on('change', function () {
            var ref_name = $(this).val();
            if (ref_name == '') {
                $('#ref_name_dd').addClass('has-error');
                $('.ref_name-error').html('Full name is required');
            } else {
                $('#div_company').removeClass('has-error');
                $('.ref_name-error').html('');
            }
        });
        $('#ref_position').on('change', function () {
            var ref_position = $(this).val();
            if (ref_position == '') {
                $('#ref_position_dd').addClass('has-error');
                $('.ref_position-error').html('Position is required');
            } else {
                $('#ref_position_dd').removeClass('has-error');
                $('.ref_position-error').html('');
            }
        });
        $('#ref_company').on('change', function () {
            var ref_company = $(this).val();
            if (ref_company == '') {
                $('#ref_company_dd').addClass('has-error');
                $('.ref_company-error').html('Company is required');
            } else {
                $('#ref_company_dd').removeClass('has-error');
                $('.ref_company-error').html('');
            }
        });
        $('#ref_phone').on('change', function () {
            var ref_phone = $(this).val();
            if (ref_phone == '') {
                $('#ref_phone_dd').addClass('has-error');
                $('.ref_phone-error').html('Phone is required');
            } else {
                $('#ref_phone_dd').removeClass('has-error');
                $('.ref_phone-error').html('');
            }
        });
        $('#ref_email').on('change', function () {
            var ref_email = $(this).val();
            if (ref_email == '') {
                $('#ref_email_dd').addClass('has-error');
                $('.ref_email-error').html('Email is required');
            } else {
                $('#ref_email_dd').removeClass('has-error');
                $('.ref_email-error').html('');
            }
        });
        
  
    });
    
</script>
@endpush
