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
                <li> <span>{{__('City')}}</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">{{__('Cities Managements')}}<small>{{__('City')}}</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">Tỉnh thành</span> </div>
                        <div class="actions"> <a href="{{ route('create.city') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Thêm mới tỉnh/thành</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="city-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="cityDatatableAjax">
                                    <thead>                                        
                                        <tr role="row" class="filter">
                                            <td>{!! Form::select('lang', ['' => __('Select')]+$languages, config('default_lang'), array('id'=>'lang', 'class'=>'form-control')) !!}</td>
                                            <td>
                                                <?php $default_country_id = Request::query('country_id', $siteSetting->default_country_id); ?>
                                                {!! Form::select('country_id', ['' =>  __('Select')]+$countries, $default_country_id, array('id'=>'country_id', 'class'=>'form-control')) !!} <span id="default_state_dd">{!! Form::select('state_id', ['' => 'Chọn vùng miền'], null, array('id'=>'state_id', 'class'=>'form-control')) !!}</span></td><td><input type="text" class="form-control" name="city" id="city" autocomplete="off" placeholder="City"></td><td><select name="is_active" id="is_active" class="form-control"><option value="-1">{{__('Active?')}}</option><option value="1" selected="selected">{{__('Active')}}</option><option value="0">{{__('Inactive')}}</option></select></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>{{__('Language')}}</th><th>{{__('State')}}</th><th>{{__('City')}}</th><th>{{__('Action')}}</th>
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
        var oTable = $('#cityDatatableAjax').DataTable({
            serverSide: true,
            stateSave: true,
            searching: false,
            /*		
             "order": [[1, "asc"]],            
             paging: true,
             info: true,
             */
            ajax: {
                url: '{!! route('fetch.data.cities') !!}',
                data: function (d) {
                    d.lang = $('#lang').val();
                    d.country_id = $('#country_id').val();
                    d.state_id = $('#state_id').val();
                    d.city = $('#city').val();
                    d.is_active = $('#is_active').val();
                }
            }, columns: [
                {data: 'lang', name: 'lang'},
                {data: 'state_id', name: 'state_id'},
                {data: 'city', name: 'city'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        $('#city-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#lang').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#country_id').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
            filterDefaultStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#city').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#is_active').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        filterDefaultStates(0);
    });
    function deleteCity(id, is_default) {
        var msg = 'Are you sure?';
        if (is_default == 1) {
            msg = 'Are you sure? You are going to delete default City, all other non default Cities will be deleted too!';
        }
        if (confirm(msg)) {
            $.post("{{ route('delete.city') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            var table = $('#cityDatatableAjax').DataTable();
                            table.row('cityDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        }
    }
    function makeActive(id) {
        $.post("{{ route('make.active.city') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#cityDatatableAjax').DataTable();
                        table.row('cityDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotActive(id) {
        $.post("{{ route('make.not.active.city') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#cityDatatableAjax').DataTable();
                        table.row('cityDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function filterDefaultStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.default.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                    });
        }
    }
</script> 
@endpush
