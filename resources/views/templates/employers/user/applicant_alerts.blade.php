@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
<!-- Inner Page Title end -->
@include('templates.employers.includes.mobile_dashboard_menu')
<div class="user-wrapper">

    @include('flash::message')
    @include('templates.employers.includes.default_sidebar_menu')
    <div class="content">
        <div class="userdashbox">
            <h3>{{__('My Job Alerts')}}</h3>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="col">{{ __('Alert Title')}}</th>
                        @if(isset($id) && $id!='')
                        <th scope="col">{{ __('Location') }}</th>
                        @endif
                        <th scope="col">{{__('Created On')}}</th>
                        <th scope="col">{{__('Action')}}</th>
                    </tr>
                    <!-- job start -->
                    @if(isset($alerts) && count($alerts))
                    @foreach($alerts as $alert)
                    <tr id="delete_{{$alert->id}}">
                        @php
                        if(null!==($alert->search_title)){
                        $title = $alert->search_title;
                        }

                        @endphp
                        @php
                        if(null!==($alert->country_id)){
                        $id = $alert->country_id;
                        }

                        if(isset($title) && $title!='' && isset($id) && $id!=''){
                        $cols = 'col-lg-4';
                        }else{
                        $cols = 'col-lg-8';
                        }
                        @endphp

                        @if(isset($title) && $title!='')
                        <td>{{$title}}</td>
                        @endif
                        @if(isset($id) && $id!='')
                        <td> {{$id}}</td>
                        @endif
                        <td> {{$alert->created_at->format('M d,Y')}}</td>
                        <td> <a href="javascript:;" onclick="delete_alert({{$alert->id}})" class="delete_alert">Delete</a></td>
                    </tr>
                    <!-- job end -->
                    @endforeach
                    @endif


                </tbody>
            </table>
        </div>
    </div>
</div>

@include('templates.employers.includes.footer')
@endsection
@push('scripts')
<script>
    function delete_alert(id) {

        $.ajax({
            type: 'GET',
            url: "{{url('/')}}/delete-alert/" + id,
            success: function(response) {
                if (response["status"] == true) {
                    $('#delete_' + id).hide();
                    swal({
                        title: "Success",
                        text: response["msg"],
                        icon: "success",
                        button: "OK",
                    });

                } else {
                    swal({
                        title: "Already exist",
                        text: response["msg"],
                        icon: "error",
                        button: "OK",
                    });
                }

            }
        });
    }
</script>
@include('templates.employers.includes.immediate_available_btn')
@endpush