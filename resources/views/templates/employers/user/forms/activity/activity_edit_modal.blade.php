<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form" id="add_edit_profile_activity" method="PUT" action="{{ route('update.front.profile.activity', [$profileActivity->id,$user->id]) }}">{{ csrf_field() }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{__('Edit Activity')}}</h4>
            </div>
            @include(config('app.THEME_PATH').'.user.forms.activity.activity_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-large btn-primary" onClick="submitProfileActivityForm();">{{__('Edit Activity')}} </button>
            </div>
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->