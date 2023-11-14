@extends('templates.vietstar.layouts.app')
@section('content')
    @if(Auth::guard('company')->check())
    <!-- Header start -->
    @include('templates.employers.includes.header')
    <!-- Header end -->
    @else
    @include('templates.vietstar.includes.header')
    @endif
@include('templates.employers.includes.company_dashboard_menu') 
<!-- Header end -->
<!-- Inner Page Title start -->
<div class="company-wrapper messageWrap">
  
        
        @include('templates.employers.includes.mobile_dashboard_menu')
        <div class="container company-content">
                <div class="myads message-body">
                    <h3>{{__('Company Messages')}}</h3>
                    <div class="row message-body-content">
                        <div class="col-lg-4 col-md-4">
                            <div class="message-inbox">
                                <div class="message-header">
                                </div>
                                <div class="list-wrap">
                                    <ul class="message-history">
                                        @if(null !== ($seekers))
                                        <?php foreach($seekers as $seeker){?>
                                        <li class="message-grid" id="adactive{{ $seeker->id}}">
                                            <a href="javascript:;" data-gift="{{$seeker->id}}"
                                                id="company_id_{{$seeker->id}}"
                                                onclick="show_messages({{ $seeker->id}})">
                                                <div class="image">
                                                    {{$seeker->printUserImage(100, 100)}}
                                                </div>
                                                <div class="user-name">
                                                    <div class="author"> <span>{{ $seeker->name}}</span>
                                                    </div>
                                                    <div class="count-messages">
                                                        {{$seeker->countMessages(Auth::guard('company')->user()->id)}}
                                                    </div>
                                                </div>

                                            </a>
                                        </li>
                                        <?php } ?>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8  message-content">
                            <div class="message-details">
                                <div id="append_messages"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
       
</div>
@include('templates.employers.includes.footer')
@endsection
@push('scripts')
<script type="text/javascript">
function show_messages(id) {
    $.ajax({
        type: "GET",
        url: "{{route('company-change-message-status')}}",
        data: {
            'sender_id': id,
        },
    });
    $.ajax({
        type: 'get',
        url: "{{route('append-message')}}",
        data: {
            '_token': $('input[name=_token]').val(),
            'seeker_id': id,
        },
        success: function(res) {
            $('#append_messages').html('');
            $('#append_messages').html(res);
            $(".messages").scrollTop(1000000000000);
            $('.messages').off('scroll');
            $('.message-grid').removeClass('active');
            $("#adactive" + id).addClass('active');
        }
    });

}
</script>

@endpush