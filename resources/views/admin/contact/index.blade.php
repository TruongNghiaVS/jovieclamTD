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
                <li> <span>{{__('Contact Detail')}}</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">{{__('Manage Contact')}} <small>{{__('Contact')}}</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">{{__('Contact Details')}}</span> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="countryDetail-search-form">
                                <table class="table table-striped table-bordered table-hover" id="ContactJobDetailDatatableAjax">
                                    <thead>
                                        <tr role="row" class="heading">
                                            <th>{{__('Full Name')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __('Subject') }}</th>
                                            <th>{{ __('Message') }}</th>
                                            <th>{{ __('Contact Date') }}</th>
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
                url: '{!! route('fetch.contact.data') !!}'
            },
            columns: [
                {data: 'full_name', name: 'full_name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'subject', name: 'subject'},
                {data: 'message', name: 'message', "type": "html"},
                {data:'created_at',name:'created_at'},
                // {data: 'status', name: 'status'},
                // {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });

</script> 
@endpush 
