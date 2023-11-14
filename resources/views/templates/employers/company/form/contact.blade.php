<div class="modal fade" id="contact_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('Contact Company')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="myForm1" class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="Website_URL">Website URL</label>
                <em class="important">*</em>
                <input type="text" class="form-control" required id="Website_URL" name="website" value="{{ isset($company->website) ? $company->website : old('website')}}" placeholder="Website URL">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Fax">{{__('Fax')}}</label>
                <input type="text" class="form-control" id="Fax" placeholder="{{__('Fax')}}" name="fax" value="{{ isset($company->fax) ? $company->fax : old('fax')}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Phone_number">{{__('Phone number')}}</label>
                <em class="important">*</em>
                <input type="text" class="form-control" required id="Phone_number" name="phone" value="{{ isset($company->phone) ? $company->phone : old('phone')}}" placeholder="{{__('Phone number')}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Facebook">Facebook</label>
                <input type="text" class="form-control" id="Facebook" name="facebook" value="{{ isset($company->facebook) ? $company->facebook : old('facebook')}}" placeholder="Facebook">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Twitter">Twitter</label>
                <input type="text" class="form-control" id="Twitter" name="twitter" value="{{ isset($company->twitter) ? $company->twitter : old('twitter')}}" placeholder="Twitter">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="LinkedIn">LinkedIn</label>
                <input type="text" class="form-control" id="LinkedIn" name="linkedin" value="{{ isset($company->linkedin) ? $company->linkedin : old('linkedin')}}" placeholder="LinkedIn">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Google_Plus">Google Plus</label>
                <input type="text" class="form-control" id="Google_Plus" name="google_plus" value="{{ isset($company->google_plus) ? $company->google_plus : old('google_plus')}}" placeholder="Google Plus">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@push('scripts')
<script type="text/javascript">
</script>
@endpush