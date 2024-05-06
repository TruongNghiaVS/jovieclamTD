<table class="table table-applican-manager table-hover mb-0 border-0 " id="company_posted_tb">
    <div class="d-flex justify-content-start">
        <button class="btn btn-outline-primary btn-sm mx-2" id="removeRowsBtn">Xóa</button>
        <button class="btn btn-outline-primary btn-sm mx-1" id="create_new" data-toggle="modal"
            data-target="#create_mail_config">Tạo Thư Mới</button>

    </div>
    <thead>
        <tr>
            <th class="font-weight-bold p-2"><input type="checkbox" id="selectAllCheckbox"> Select All</th>
            <th class="font-weight-bold p-2">NGÀY TẠO THƯ</th>
            <th class="font-weight-bold p-2">TIÊU ĐỀ THƯ</th>
            <th class="font-weight-bold p-2">LOẠI</th>
            <th class="font-weight-bold p-2">TRẠNG THÁI</th>
            <th class="font-weight-bold p-2 text-center">NGƯỜI TẠO</th>
            <th class="font-weight-bold p-2">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="checkbox" class="row-checkbox"></td>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 3</td>
            <td>Row 1 Data 4</td>
            <td>Row 1 Data 5</td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="create_mail_config" tabindex="-1" role="dialog" aria-labelledby="create_mail_configLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_mail_configLabel">Tạo Thư Thông Báo Cho Ứng Viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formConfigMail">
                    <div class="form-group">
                        <label for="title_mail">Tiêu Đề Thư</label>
                        <input type="text" class="border-0 border-bottom form-control" id="title_mail"
                            placeholder="Nhập Nội Dung">

                    </div>

                    <div class="form-group row justify-content-start  align-items-center">
                        <label for="addfield" class="col-sm-3 col-form-label">Smart Fields</label>
                        <div class="col-sm-5">
                            <select name="addfield" class="border-0 border-bottom form-control" id="addfield">
                                <option value="">Chọn</option>
                                <option value="[firstname]">[firstname]</option>
                                <option value="[lastname]">[lastname]</option>
                                <option value="[contact-name]">[contact-name]</option>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <a href="javascript:void(0);" id="view_sample" id="create_new" data-toggle="modal"
                                data-target="#mail-template">Xem mẫu</a>
                        </div>

                    </div>
                    <div class="form-group">
                        <textarea placeholder="Nhập Nội Dung" name="letter_content" id="letter_content"></textarea>
                        <small id="emailHelp" class="form-text text-muted">Ít nhất 10 ký tự, Nhiều nhất 3.000 ký
                            tự</small>
                    </div>

                    <div class="form-group form-radio mb-0">
                        <div class="group">
                            <input type="radio" name="letter_type" value="0" id="posting25-1" checked="">
                            <label for="posting25-1">Dùng chung</label>
                        </div>
                        <div class="group">
                            <input type="radio" name="letter_type" id="posting25-2" value="1" checked="">
                            <label for="posting25-2">Cá nhân</label>
                        </div>
                    </div>
                </form>



            </div>
            <div class="modal-footer d-flex align-items-center justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="mail-template" tabindex="-1" role="dialog" aria-labelledby="mail-templateLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mail-templateLabel">Thư Thông Báo Mẫu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="preview-letter">
                    <div class="title">
                        <p>Tiêu đề: Thanks you for applying</p>
                    </div>
                    <div class="full-content">
                        <!---------
				  <p>Dear <strong>[firstname] [lastname],</strong></p>
				  <p>We have received your resume submission for the <strong>[job-title] </strong>position. We appreciate your interest and look forward to reviewing your resume.</p>
				  <p>We will contact you within seven days if your qualifications meet the requirements of the position.</p>
				  <p>Thanks you again for applying!</p><br>
				  <p>Best regards,</p>
				  <p> <strong>[contact-name]</strong></p>
                   -------->
                        <p>Dear <strong>[firstname] [lastname]</strong>,<br>We have received your resume submission for
                            this position. We appreciate your interest and look forward to reviewing your resume.<br>
                            We will contact you within seven days if your qualifications meet the requirements of the
                            position.<br>
                            Thanks you again for applying!<br><br>Best regards,<br><strong>[contact-name]</strong></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-start">
                <button id="back_to_mail_config" type="button" class="btn btn-secondary" data-dismiss="modal">Trở
                    lại</button>

            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    #view_sample {}

    #view_sample:hover {
        text-decoration: underline;
    }

    #letter_content {
        width: 100%;
        min-height: 200px;
        padding: 5px 0;
        padding: 5px;
        border: none;
        border-bottom: 1px solid #e5e5e5;

        font-size: 14.5px;
        font-weight: 500;
        outline: none;
    }
    .preview-letter .title {
        padding-bottom: 15px;
        border-bottom: 1px solid #efefef;
        font-size: 15px;
        font-weight: 700;
    }

    .preview-letter .full-content {
        padding-top: 15px;
      

    }

    .preview-letter .full-content p {
        line-height: 28px;
    }
    
</style>
@endpush




@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        // Add click event handler to the "Select All" checkbox
        $('#selectAllCheckbox').on('change', function () {
            // Toggle the state of all checkboxes in the rows based on the "Select All" checkbox
            $('.row-checkbox').prop('checked', $(this).prop('checked'));
        });

        // Add click event handler to the "Remove" button
        $('#removeRowsBtn').on('click', function () {
            // Loop through each checked checkbox and remove its parent row
            $('.row-checkbox:checked').each(function () {
                $(this).closest('tr').remove();
            });

            // Uncheck the "Select All" checkbox after removin           $('#selectAllCheckbox').prop('checked', false);
        });

        $('#view_sample').on('click',function() {
            $('#create_mail_config').modal('hide');
        })
        
        
        $('#back_to_mail_config').on('click',function() {
            $('#mail-template').modal('hide');
            $('#create_mail_config').modal('show');

        })
        
        
    });

    $(document).ready(function(){
        $('#addfield').change(function(){
            var selectedOption = $(this).val();
            var textareaContent = $('#letter_content').val();

            // Check if the selected option already exists in the textarea content
            if (textareaContent.includes(selectedOption)) {
                // If it exists, do not add it again
                return;
            }

            // Append the selected option value to the textarea content
            $('#letter_content').val(textareaContent + ' ' + selectedOption);
        });

        // Validate textarea on form submit
        $('#formConfigMail').submit(function(e) {
            var textareaContent = $('#letter_content').val();
            // Check if the content has at least 10 characters and at most 3000 characters
            if (textareaContent.length < 10 || textareaContent.length > 3000) {
                alert('Nội dung phải có ít nhất 10 ký tự và nhiều nhất 3000 ký tự.');
                e.preventDefault(); // Prevent form submission
            }
        });
    });
</script>
@endpush