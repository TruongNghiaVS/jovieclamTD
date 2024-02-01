<div class="table-responsive table-content">
    <ul class="nav nav-tabs mt-3" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#config-1" role="tab">Thư Phản Hồi Cho Ứng Viên</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#config-2" role="tab">Thư Trả Lời Tự Động</a>
        </li>
        
    </ul><!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="config-1" role="tabpanel">
            @include('templates.employers.config_mail.table.table_template_mail')
        </div>
        <div class="tab-pane" id="config-2" role="tabpanel">
            @include('templates.employers.config_mail.form.form')
          
        </div>
        
    </div>
    
    </table>
</div>