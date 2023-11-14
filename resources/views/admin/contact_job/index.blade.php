@extends('admin.layouts.admin_layout')
@section('content')
<style type="text/css">
    .table td, .table th {
        font-size: 12px;
        line-height: 2.42857 !important;
    }	
</style>
<div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content"> 
        <!-- BEGIN PAGE HEADER--> 
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <li> <a href="{{ route('admin.home') }}">{{__('Home')}}</a> <i class="fa fa-circle"></i> </li>
                <li> <span>{{__('Job Alert')}}</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">{{__('Manage Job Alert')}} <small>{{__('Job Alert')}}</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">{{__('Job Alert')}}</span> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="countryDetail-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="ContactJobDetailDatatableAjax">
                                    <thead>
                                        <tr role="row" class="heading">
                                            <th>{{__('Email')}}</th>
                                            <th>{{ __('Subscription Date') }}</th>
                                            <th>{{ __('Verification Status') }}</th>
                                            <th>{{ __('Subscription Status') }}</th>
                                            {{-- <th>{{__('Status')}}</th>
                                            <th>{{__('Action')}}</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY --> 
</div>
@endsection
@push('scripts') 
<script>
    $(function () {
        var oTable = $('#ContactJobDetailDatatableAjax').DataTable({
            serverSide: true,
            stateSave: true,
            searching: true,
            /*		
             "order": [[1, "asc"]],            
             paging: true,
             info: true,
             */
            ajax: {
                url: '{!! route('fetch.email.alert.data') !!}'
            },
            columns: [
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'verification_status', name: 'verification_status'},
                {data: 'subscription_status', name: 'subscription_status'},
                // {data: 'status', name: 'status'},
                // {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
    function deleteContactJobDetail(id) {
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("{{ route('delete.cover-letter.detail') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            var table = $('#ContactJobDetailDatatableAjax').DataTable();
                            table.row('ContactJobDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        }
    }
    function makeActive(id) {
        $.post("{{ route('make.active.cover-letter.detail') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#ContactJobDetailDatatableAjax').DataTable();
                        table.row('ContactJobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotActive(id) {
        $.post("{{ route('make.not.active.cover-letter.detail') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#ContactJobDetailDatatableAjax').DataTable();
                        table.row('ContactJobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
</script> 
@endpush 
