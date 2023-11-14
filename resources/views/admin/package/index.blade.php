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
                <li> <span>{{__('Packages')}}</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">>{{__('Manage Packages')}} <small>{{__('Packages')}}</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">{{__('Packages')}}</span> </div>
                        <div class="actions"> <a href="{{ route('create.package') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> >{{__('Add Package')}}</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="datatable-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="packageDatatableAjax">
                                    <thead>
                                        <tr role="row" class="filter">
                                            <td><input type="text" class="form-control" name="package_title" id="package_title" autocomplete="off" placeholder=">{{__('Package Name')}}"></td>
                                            <td><input type="text" class="form-control" name="package_price" id="package_price" autocomplete="off" placeholder=">{{__('Package Price')}}"></td>
                                            <td><input type="text" class="form-control" name="package_num_days" id="package_num_days" autocomplete="off" placeholder=">{{__('Package Duration')}}"></td>
                                            <td><input type="text" class="form-control" name="package_num_listings" id="package_num_listings" autocomplete="off" placeholder=">{{__('Number of Posts')}}"></td>
                                            <td><select name="package_for" id="package_for" class="form-control">
                                                    <option value="">>{{__('Used for')}}</option>
                                                    <option value="job_seeker">>{{__('Seeker')}}</option>
                                                    <option value="employer">>{{__('Employer')}}</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>{{__('Package Name')}}</th>
                                            <th>>{{__('Price')}}</th>
                                            <th>>{{__('Number of Days')}}</th>
                                            <th>>{{__('Number of Posts')}}</th>
                                            <th>>{{__('Used for')}}</th>
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
        var oTable = $('#packageDatatableAjax').DataTable({
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
                "infoFiltered":   "(lọc từ tổng _MAX_ mục)",
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
                url: '{!! route('fetch.data.packages') !!}',
                data: function (d) {
                    d.package_title = $('#package_title').val();
                    d.package_price = $('#package_price').val();
                    d.package_num_days = $('#package_num_days').val();
                    d.package_num_listings = $('#package_num_listings').val();
                    d.package_for = $('#package_for').val();
                }
            }, columns: [
                {data: 'package_title', name: 'package_title'},
                {data: 'package_price', name: 'package_price'},
                {data: 'package_num_days', name: 'package_num_days'},
                {data: 'package_num_listings', name: 'package_num_listings'},
                {data: 'package_for', name: 'package_for'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        $('#datatable-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#package_title').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#package_price').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#package_num_days').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#package_num_listings').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#package_for').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
    });
    function deletePackage(id) {
        var msg = 'Are you sure?';
        if (confirm(msg)) {
            $.post("{{ route('delete.package') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            var table = $('#packageDatatableAjax').DataTable();
                            table.row('packageDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        }
    }
</script> 
@endpush
