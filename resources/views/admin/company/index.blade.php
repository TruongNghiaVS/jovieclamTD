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
                <li> <span>{{__('Companies')}}</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">{{__('Companies Management')}} <small>{{__('Companies')}}</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">{{__('Company List')}}</span> </div>
                        <div class="actions"> <a href="{{ route('create.company') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> {{__('Add Company')}}</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="datatable-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="companyDatatableAjax">
                                    <thead>
                                        <tr role="row" class="filter">
                                            <td><input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder={{__('Company Name')}}></td>
                                            <td><input type="text" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email"></td>
                                            <td><select name="is_active" id="is_active" class="form-control">
                                                    <option value="-1">{{__('Active Status?')}}</option>
                                                    <option value="1" selected="selected">{{__('Company Active')}}</option>
                                                    <option value="0">{{__('Company Inactive')}}</option>
                                                </select></td>
                                            <td><select name="is_featured" id="is_featured" class="form-control">
                                                    <option value="-1">{{__('Featured?')}}</option>
                                                    <option value="1">{{__('Featured')}}</option>
                                                    <option value="0">{{__('No')}}</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>{{__('Company Name')}}</th>
                                            <th>Email</th>
                                            <th>{{__('Active?')}}</th>
                                            <th>{{__('Featured?')}}</th>
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
<script>
    $(function () {
        var oTable = $('#companyDatatableAjax').DataTable({
            serverSide: true,
            stateSave: true,
            searching: false,
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
                "paginate": {
                    "previous": "Trước/Prev",
                    "next": "Tiếp/Next",
                    "last": "Cuối/Last",
                    "first": "Đầu/First",
                    "page": "Trang/Page",
                    "pageOf": "trong/of"
                }
            },
            ajax: {
                url: '{!! route('fetch.data.companies') !!}',
                data: function (d) {
                    d.name = $('#name').val();
                    d.email = $('#email').val();
                    d.is_active = $('#is_active').val();
                    d.is_featured = $('#is_featured').val();
                }
            }, columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'is_active', name: 'is_active'},
                {data: 'is_featured', name: 'is_featured'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        $('#datatable-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#name').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#email').on('keyup', function (e) {
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
    });
    function deleteCompany(id) {
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("{{ route('delete.company') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            var table = $('#companyDatatableAjax').DataTable();
                            table.row('companyDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        }
    }
    function makeActive(id) {
        $.post("{{ route('make.active.company') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#companyDatatableAjax').DataTable();
                        table.row('companyDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotActive(id) {
        $.post("{{ route('make.not.active.company') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#companyDatatableAjax').DataTable();
                        table.row('companyDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeFeatured(id) {
        $.post("{{ route('make.featured.company') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#companyDatatableAjax').DataTable();
                        table.row('companyDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotFeatured(id) {
        $.post("{{ route('make.not.featured.company') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#companyDatatableAjax').DataTable();
                        table.row('companyDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
</script> 
@endpush
