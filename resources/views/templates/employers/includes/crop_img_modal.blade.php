@push('styles')
<style type="text/css">
        #canvas {
            height: 100%;
            width: 100%;
            background-color: #ffffff;
            cursor: default;
        }
        .preview {
            overflow: hidden;
            width: 150px; 
            height: 150px;
            border-radius: 50%;
            position: relative;
        }
        .preview img {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            object-fit: cover;
            object-position: center;
            width: 100%;
            height: 100%;
        }

        .editor-col-left {
            position: relative;
            overflow: hidden;
            width: 450px;
            height: 300px;
        }

        .editor-col-right {
            text-align: center;
            float: left;
        }
        .result img{
            display: none !important;
        }
        .editorChooseImage {
            width: 100%;
            display: flex;
            height: 200px;
            vertical-align: middle;
            line-height: 60px;
            width: 100%;
            text-align: center;
            color: #999;
            border: 2px dashed #0b85a1;
            text-align: center;
            align-items:center;
            justify-content: center;
            cursor: pointer;
        }

        .btn-choose-image {
            display: flex;
            vertical-align: middle;
            line-height: 60px;
            width: 100%;
            color: #999;
            height: 100%;
            align-items:center;
            justify-content: center;
            cursor: pointer;
        }
        .canvas-div {
            display: none;
        }
        .modal-title {
            color:white;
        }

</style>
@endpush

<div class="modal fade" id="crop_img_modal" tabindex="-1" role="dialog" aria-labelledby="crop_img_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-primary ">
                <h5 class="modal-title text-white" id="exampleModalLabel">CHỈNH SỬA ẢNH ĐẠI DIỆN</h5>
                
            </div>
            <div class="modal-body">
              <div class="row">
                    <div class="col-lg-12">
                      <input type="file" id="fileInput-for-crop-img" accept="image/*" style="display: none;"/>
                    </div>
                    <div class="col-lg-6 mb-3 d-flex flex-column align-items-center">
                        <h4>Ảnh gốc</h4>
                        <div class="editorChooseImage" >
                            <a href="#" class="btn-choose-image" onclick="$('#fileInput-for-crop-img').click();">Click chọn ảnh để tải lên!</a>
                        </div>
                        <div class="canvas-div" style="width: 100%;height: 200px;max-height: 200px;max-width: 100%;"> 
                            <canvas id="canvas-for-crop-img"></canvas>
                      </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center flex-column align-items-center">
                            <h4>Ảnh đại diện hiển thị</h4>
                          <div class="preview border mb-4">
                              <img src="/assets/no-image.jpg" alt="">
                          </div> 
                          <div class="d-flex justify-content-center mb-3">
                              <input type="button" class="btn m-1 btn-primary" id="btnCrop" value="Xong" />
                              <input type="button" class="btn m-1 btn-secondary" id="btnRestore" value="Bỏ thay đổi" />
                          </div>
                            <a href="#" class="btn-close-image-editor mb-2"  title="Đóng trình chỉnh sửa (Không lưu thay đổi)" data-dismiss="modal">Đóng lại (Không lưu)</a>
                    </div>
                </div>
            </div>
          
        </div>
  </div>
</div>



@push('scripts')
<script type="text/javascript">
    function initImageCropper(url) {
        var canvas = $(" #canvas-for-crop-img");
        var context = canvas.get(0).getContext("2d");
        var cropper;

        $('#fileInput-for-crop-img').on('change', function() {
            $('.editorChooseImage').hide();
            $('.canvas-div').show();
            if (this.files && this.files[0]) {
                if (this.files[0].type.match(/^image\//)) {
                    var reader = new FileReader();
                    reader.onload = function(evt) {
                        var img = new Image();
                        img.onload = function() {
                            context.canvas.height = img.height;
                            context.canvas.width = img.width;
                            context.drawImage(img, 0, 0);
                            cropper = canvas.cropper({
                                aspectRatio: 1,
                                preview: '.preview' // Add this line to specify the preview element
                            });
                            $('#btnCrop').click(function() {
                                // Get a string base 64 data url
                                var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/png");
                                // Get a string base 64 data url
                                    // Convert data URL to Blob
                                    var byteString = atob(croppedImageDataURL.split(',')[1]);
                                    var ab = new ArrayBuffer(byteString.length);
                                    var ia = new Uint8Array(ab);
                                    for (var i = 0; i < byteString.length; i++) {
                                        ia[i] = byteString.charCodeAt(i);
                                    }
                                    var blob = new Blob([ab], { type: 'image/png' });

                                    // Create a new File object from the Blob
                                    var croppedFile = new File([blob], "cropped_image.png", { type: 'image/png' });

                                    // Create a new FormData object
                                    var formData = new FormData();
                                    
                                    // Append the File object to the FormData object
                                    formData.append('logo', croppedFile);
                                 
                                    // Simulate AJAX POST request
                                    $.ajaxSetup({
                                        headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        }
                                    });
                                    $.ajax({
                                        url: url,
                                        type: 'POST',
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        beforeSend: showSpinner(),
                                
                                    success: function (response) {
                                        // Handle success response
                                        hideSpinner();
                                        showModal_Success('Thông báo','Cập nhật hình ảnh thành công','')
                                        setTimeout(()=>{
                                            location.reload();
                                        },1000)
                                    },
                                    error: function (xhr, status, error) {
                                        // Handle error
                                        hideSpinner();
                                        console.error('Error uploading avatar:', error);
                                    }
                                });

                                 
                            });
                            $('#btnRestore').click(function() {
                                canvas.cropper('reset');
                            });
                        };
                        img.src = evt.target.result;
                    };
                    reader.readAsDataURL(this.files[0]);
                } else {
                    alert("Invalid file type! Please select an image file.");
                }
            } else {
                alert('No file(s) selected.');
            }
        });

     
    }
</script>
@endpush