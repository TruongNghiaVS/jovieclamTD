<!-- Modal -->
<div class="modal modal-review-application fade" id="modalReviewApplication" tabindex="-1"
    aria-labelledby="modalReviewApplicationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalReviewApplicationLabel">Đánh giá CV ứng viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="iconmoon icon-recruiter-close"></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('application.update') }}" id="updateApplication" method="post">
                  @csrf
                    <div id="load_review_cv">
                        <div>
                            <div class="d-inline-block mb-3"><span role="button" data-value="1"
                                    class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status active">
                                    CV tiếp nhận
                                </span></div>
                            <div class="d-inline-block mb-3"><span role="button" data-value="2"
                                    class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status">
                                    Phù hợp
                                </span></div>
                            <div class="d-inline-block mb-3"><span role="button" data-value="3"
                                    class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status">
                                    Hẹn phỏng vấn
                                </span></div>
                            
                            <div class="d-inline-block mb-3"><span role="button" data-value="5"
                                    class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status">
                                    Nhận việc
                                </span></div>
                            <div class="d-inline-block mb-3"><span role="button" data-value="6"
                                    class="btn btn-cv-application rounded-30 mr-2 d-block px-3 status">
                                    Từ chối
                                </span></div>
                        </div>
                        <input type="hidden" name="status" id="review-application-status">
                        <input type="hidden" name="job_application" value="" id="id_job">
                        <textarea id="review-application-note" name="note" rows="5" placeholder="Bạn có muốn thêm ghi chú cho sự thay đổi này không?"
                            class="form-control p-3"></textarea>
                    </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12" >
                                    <ul class="timeline">
                                        <li class="timeline-inverted">
                                        <div class="timeline-badge">1</div>
                                        <div class="timeline-panel">
                                            <div class="d-flex justify-content-around">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">CV tiếp nhận</h4>
                                                <p>Tiếp nhận</p>
                                            </div>
                                            <div class="timeline-clock">
                                                <p><i class="glyphicon glyphicon-time"></i>3 ngày</p>
                                            </div>
                                            </div>
                                        </div>
                                        </li>
                                        <li class="timeline-inverted">
                                        <div class="timeline-badge">2</div>
                                        <div class="timeline-panel">
                                            <div class="d-flex justify-content-around">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Phù hợp</h4>
                                                <p>Đáp ứng yêu cầu</p>
                                            </div>
                                            <div class="timeline-clock">
                                                <p><i class="glyphicon glyphicon-time"></i> 2 ngày</p>
                                            </div>
                                            </div>
                                        </div>
                                        </li>
                                        <li class="timeline-inverted">
                                        <div class="timeline-badge">3</div>
                                        <div class="timeline-panel">
                                            <div class="d-flex justify-content-around">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Hẹn phỏng vấn</h4>
                                                <p>Ngày phỏng vấn 24/01/2024</p>
                                            </div>
                                            <div class="timeline-clock">
                                                <p><i class="glyphicon glyphicon-time"></i> 3 phút </p>
                                            </div>
                                            </div>
                                        </div>
                                        </li>
                                        <li class="timeline-inverted">
                                        <div class="timeline-badge">4</div>
                                        <div class="timeline-panel">
                                            <div class="d-flex justify-content-around">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Nhận việc</h4>
                                                <p>Từ chối</p>
                                            </div>
                                            <div class="timeline-clock">
                                                <p><i class="glyphicon glyphicon-time"></i> 1 phút</p>
                                            </div>
                                            </div>
                                        </div>
                                        </li>
                                    
                                    </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" >
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary mx-2" onclick="updateReviewApplication" id="btnUpdateReviewApplication">Cập nhật</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                                </div>
                            </div>
                          
                        </div>

                </form>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal modal-review-application fade" id="modalReviewApplicationNote" tabindex="-1"
    aria-labelledby="modalReviewApplicationNoteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route('application.update') }}" id="updateApplication" method="post">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReviewApplicationNoteLabel">Ghi chú mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="iconmoon icon-recruiter-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                  <div id="load_data_note">
                    <textarea id="review-application-note" name="note" rows="5" placeholder="Nhập nội dung ghi chú mới" class="form-control p-3"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                    <button type="submit" class="btn btn-primary" id="btnUpdateReviewApplication">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        function submitUpdateApplication(id_apply_job) {
            detailApplyJob(id_apply_job)
        }

        function detailApplyJob(id_apply_job) {
            $.ajax({
                type: "POST",
                url: "{{ route('detail.application') }}",
                data: {
                    "id_apply_job": id_apply_job,
                    "_token": "{{ csrf_token() }}",
                    "modal_note": 0
                },
                datatype: 'json',
                success: function(json) {
                    $("#load_review_cv").html(json.html);
                }
            });
        }

        function submitUpdateNoteApplication(id_apply_job) {
          detailNoteApplyJob(id_apply_job);
        }

        function detailNoteApplyJob(id_apply_job) {
          $.ajax({
              type: "POST",
              url: "{{ route('detail.application') }}",
              data: {
                  "id_apply_job": id_apply_job,
                  "_token": "{{ csrf_token() }}",
                  "modal_note": 1
              },
              datatype: 'json',
              success: function(json) {
                  $("#load_data_note").html(json.html);
              }
          });
      }
    </script>
@endpush
