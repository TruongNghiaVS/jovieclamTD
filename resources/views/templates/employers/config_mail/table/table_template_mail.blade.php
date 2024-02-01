<table class="table table-applican-manager table-hover mb-0 border-0 " id="company_posted_tb">
    <div class="d-flex justify-content-start">
        <button class="btn btn-outline-primary btn-sm mx-2" id="removeRowsBtn">Xóa</button>
        <button class="btn btn-outline-primary btn-sm mx-1" id="create_new">Tạo Thư Mới</button>

    </div>
    <thead>
        <tr>
            <th class="font-weight-bold p-2"><input type="checkbox" id="selectAllCheckbox"> Select All</th>
            <th class="font-weight-bold p-2">NGÀY TẠO THƯ</th>
            <th class="font-weight-bold p-2">TIÊU ĐỀ THƯ</th>
            <th class="font-weight-bold p-2">LOẠI</th>
            <th class="font-weight-bold p-2">TRẠNG THÁI</th>
            <th class="font-weight-bold p-2 text-center">NGƯỜI TẠO</th>
            <th class="font-weight-bold p-2">THAO TÁC</th>
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

            // Uncheck the "Select All" checkbox after removing rows
            $('#selectAllCheckbox').prop('checked', false);
        });
    });
</script>
@endpush