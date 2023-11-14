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
                <li> <span>{{__('Experiences')}}</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">{{__('Manage Experiences')}} <small>{{__('Experiences')}}</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">{{__('Experiences')}}</span> </div>
                        <div class="actions"> <a href="{{ route('create.job.experience') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> {{__('Add Experience')}}</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="jobExperience-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="jobExperienceDatatableAjax">
                                    <thead>
                                        <tr role="row" class="filter"> 
                                            <td>{!! Form::select('lang', ['' => __('Select')]+$languages, config('default_lang'), array('id'=>'lang', 'class'=>'form-control')) !!}</td>
                                            <td><input type="text" class="form-control" name="job_experience" id="job_experience" autocomplete="off" placeholder="{{__('Experience')}}"></td>
                                            <td><select name="is_active" id="is_active"  class="form-control">
                                                    <option value="-1">{{__('Active?')}}</option>
                                                    <option value="1" selected="selected">{{__('Active')}}</option>
                                                    <option value="0">{{__('Inactive')}}</option>
                                                </select></td></tr>
                                        <tr role="row" class="heading">                                            
                                            <th>{{__('Language')}}</th>
                                            <th>{{__('Experiences')}}</th>
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
        var oTable = $('#jobExperienceDatatableAjax').DataTable({
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
                url: '{!! route('fetch.data.job.experiences') !!}',
                data: function (d) {
                    d.lang = $('#lang').val();
                    d.job_experience = $('input[name=job_experience]').val();
                    d.is_active = $('#is_active').val();
                }
            }, columns: [
                {data: 'lang', name: 'lang'},
                {data: 'job_experience', name: 'job_experience'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        $('#jobExperience-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#lang').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#job_experience').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#is_active').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
    });
    function deleteJobExperience(id, is_default) {
        var msg = 'Are you sure?';
        if (is_default == 1) {
            msg = 'Are you sure? You are going to delete default Job Experience, all other non default Job Experiences will be deleted too!';
        }
        if (confirm(msg)) {
            $.post("{{ route('delete.job.experience') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                            var table = $('#jobExperienceDatatableAjax').DataTable();
                            table.row('jobExperienceDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        }
    }
    function makeActive(id) {
        $.post("{{ route('make.active.job.experience') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobExperienceDatatableAjax').DataTable();
                        table.row('jobExperienceDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotActive(id) {
        $.post("{{ route('make.not.active.job.experience') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response == 'ok')
                    {
                        var table = $('#jobExperienceDatatableAjax').DataTable();
                        table.row('jobExperienceDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
</script> 
@endpush
