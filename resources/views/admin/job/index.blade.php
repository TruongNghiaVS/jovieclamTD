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
                <li> <span>{{ __('Jobs')}}</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">{{ __('Manage Jobs')}} <small> {{__('Jobs')}}</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">{{ __('Jobs')}}</span> </div>
                        <div class="actions"> <a href="{{ route('create.job') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i>{{ __('Add Job')}}</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="job-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="jobDatatableAjax">
                                    <thead>
                                        <tr role="row" class="filter">
                                            <td>{!! Form::select('company_id', ['' => __('Select')]+$companies, null, array('id'=>'company_id', 'class'=>'form-control')) !!}</td>
                                            <td><input type="text" class="form-control" name="title" id="title" autocomplete="off" placeholder="Chức danh"></td>
                                            <td><input type="text" class="form-control" name="description" id="description" autocomplete="off" placeholder="Mô tả Công việc"></td>
                                            <td>
                                                <?php $default_country_id = Request::query('country_id', $siteSetting->default_country_id); ?>
                                                {!! Form::select('country_id', ['' => __('Select')]+$countries, $default_country_id, array('id'=>'country_id', 'class'=>'form-control')) !!}
                                                <span id="default_state_dd">
                                                    {!! Form::select('state_id', ['' => __('Select')], null, array('id'=>'state_id', 'class'=>'form-control')) !!}
                                                </span>
                                                <span id="default_city_dd">
                                                    {!! Form::select('city_id', ['' => __('Select')], null, array('id'=>'city_id', 'class'=>'form-control')) !!}
                                                </span></td>
                                            <td><select name="is_active" id="is_active" class="form-control">
                                                    <option value="-1">{{__('Active Status?')}}</option>
                                                    <option value="1" selected="selected">{{__('Active')}}</option>
                                                    <option value="0">{{__('Inactive')}}</option>
                                                </select>
                                                <select name="is_featured" id="is_featured" class="form-control">
                                                    <option value="-1">{{__('Featured Status?')}}</option>
                                                    <option value="1">{{__('Featured')}}</option>
                                                    <option value="0">{{__('Not Featured')}}</option>
                                                </select></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>{{__('Company')}}</th>
                                            <th>{{__('Job Title')}}</th>
                                            <th>{{__('Job Desc')}}</th>
                                            <th>{{__('City')}}</th>
                                            <th>{{__('Expiry Date')}}</th>
                                            <th>{{__('Action')}}</th>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script>
    $(function () {
        var oTable = $('#jobDatatableAjax').DataTable({
            "language": { // language settings
                // metronic spesific
                "metronicGroupActions": "_TOTAL_ bản ghi được chọn:  ",
                "metronicAjaxRequestGeneralError": "Không thể hoàn thành yêu cầu, xin check kết nối mạng",

                // data tables spesific
                "lengthMenu": "<span class='seperator'></span>Xem _MENU_ bản ghi",
                "info": "<span class='seperator'></span>Tìm thấy tổng số _TOTAL_ bản ghi",
                "infoEmpty": "Không có bản ghì nào để hiển thị/ No records found to show",
                "emptyTable": "Không có dữ liệu trong bảng/ No data available in table",
                "zeroRecords": "Không có bản ghi nào khớp/ No matching records found",
                "infoFiltered":   "(lọc từ tổng _MAX_  mục)",
                "paginate": {
                    "previous": "Trước/Prev",
                    "next": "Tiếp/Next",
                    "last": "Cuối/Last",
                    "first": "Đầu/First",
                    "page": "Trang/Page",
                    "pageOf": "trong/of"
                }
            },
            processing: true,
            serverSide: true,
            stateSave: true,
            searching: false,
            /*		
             "order": [[1, "asc"]],            
             paging: true,
             info: true,
             */
            ajax: {
                url: '{!! route('fetch.data.jobs') !!}',
                data: function (d) {
                    d.company_id = $('#company_id').val();
                    d.title = $('#title').val();
                    d.description = $('#description').val();
                    d.country_id = $('#country_id').val();
                    d.state_id = $('#state_id').val();
                    d.city_id = $('#city_id').val();
                    d.is_active = $('#is_active').val();
                    d.is_featured = $('#is_featured').val();
                }
            }, columns: [
                {data: 'company_id', name: 'company_id'},
                {data: 'title', name: 'title'},
                {data: 'description', name: 'description'},
                {data: 'city_id', name: 'city_id'},
                {data: 'expiry_date', name: 'expiry_date'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            columnDefs:[
                {
                    targets:4, render:function(data){
                        return moment(data).format('DD-MM-YYYY');
                    }
                }
            ]
        });
        $('#job-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#company_id').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#title').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#description').on('keyup', function (e) {
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
            filterDefaultCities(0);
        });
        $(document).on('change', '#city_id', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#is_active').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#is_featured').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        filterDefaultStates(0);
    });
    function deleteJob(id, is_default) {
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("{{ route('delete.job') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            var table = $('#jobDatatableAjax').DataTable();
                            table.row('jobDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        }
    }
    function makeActive(id) {
        $.post("{{ route('make.active.job') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobDatatableAjax').DataTable();
                        table.row('jobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotActive(id) {
        $.post("{{ route('make.not.active.job') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobDatatableAjax').DataTable();
                        table.row('jobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeFeatured(id) {
        $.post("{{ route('make.featured.job') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobDatatableAjax').DataTable();
                        table.row('jobDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotFeatured(id) {
        $.post("{{ route('make.not.featured.job') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobDatatableAjax').DataTable();
                        table.row('jobDtRow' + id).remove().draw(false);
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
    function filterDefaultCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.default.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_city_dd').html(response);
                    });
        }
    }
</script>
@endpush
