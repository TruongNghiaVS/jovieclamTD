<nav>
<div class="d-flex justify-content-between mb-2">
    <h2 class="advance-filtering-title">Bộ lọc nâng cao</h2> 
    <a href="javascript:void(0);" onclick="clearFormFiltercandidates();" class="text-secondary">Xóa cài đặt</a>
</div>
<div class="accordion-single js-acc-single">
  <form id="filter-candidate">
    <div class="accordion-single-item js-acc-item">
      <h3 class="accordion-single-title js-acc-single-trigger">Thời Gian Cập Nhật</h3>
      <div class="accordion-single-content">
      <div class="form-check">
          <input class="form-check-input" type="radio" name="timeUpdate"  value=""  checked="checked">
          <label class="form-check-label" >
              Tất cả
          </label>
      </div>
      
       @if("trong-vong-1-ngay" ==$requestParam->query('thoi-gian-cap-nhat',''))
        <div class="form-check">
            <input class="form-check-input" checked checked type="radio" name="timeUpdate"  value="trong-vong-1-ngay" >
            <label class="form-check-label" for="timeUpdate">
            Trong vòng 1 ngày
            </label>

        </div>
      @else 
        <div class="form-check">
            <input class="form-check-input"  type="radio" name="timeUpdate"  value="trong-vong-1-ngay"  >
            <label class="form-check-label" for="timeUpdate">
            Trong vòng 1 ngày
            </label>

        </div>
      @endif


      @if("1-tuan-gan-day" ==$requestParam->query('thoi-gian-cap-nhat',''))
      <div class="form-check">
          <input class="form-check-input" checked checked type="radio" name="timeUpdate"  value="1-tuan-gan-day"  >
          <label class="form-check-label" for="timeUpdate">
          1 Tuần gần đây
          </label>

      </div>
      @else 
      <div class="form-check">
          <input class="form-check-input"  type="radio" name="timeUpdate"  value="1-tuan-gan-day"  >
          <label class="form-check-label" for="timeUpdate">
          1 Tuần gần đây
          </label>

      </div>
      @endif


      @if("1-thang-gan-day" ==$requestParam->query('thoi-gian-cap-nhat',''))
      <div class="form-check">
          <input class="form-check-input" checked checked type="radio" name="timeUpdate"  value="1-thang-gan-day"  checked="checked">
          <label class="form-check-label" for="timeUpdate">
          1 Tháng gần đây
          </label>

      </div>
      @else 
      <div class="form-check">
          <input class="form-check-input"  type="radio" name="timeUpdate"  value="1-thang-gan-day"  >
          <label class="form-check-label" for="timeUpdate">
          1 Tháng gần đây
          </label>

      </div>
      @endif
      

     

      @if("2-thang-gan-day" ==$requestParam->query('thoi-gian-cap-nhat',''))
      <div class="form-check">
          <input class="form-check-input"  checked type="radio" name="timeUpdate"  value="2-thang-gan-day">
          <label class="form-check-label" >
            2 Tháng gần đây
          </label>
      </div>
      @else 
      <div class="form-check">
          <input class="form-check-input" type="radio" name="timeUpdate"  value="2-thang-gan-day">
          <label class="form-check-label" >
          2 Tháng gần đây
          </label>
      </div>
      @endif
  
      </div>
    </div>
    <div class="accordion-single-item js-acc-item">
      <h3 class="accordion-single-title js-acc-single-trigger">Hình thức làm việc</h3>
      <div class="accordion-single-content">
   

      @if("toan-thoi-gian-co-dinh" ==$requestParam->query('hinh-thuc-lam-viec',''))
        <div class="form-check">
            <input class="form-check-input" checked type="radio" name="waycontact"  value="toan-thoi-gian-co-dinh"  >
            <label class="form-check-label" for="waycontact">
                Toàn thời gian cố định
            </label>

        </div>
      @else 
      <div class="form-check">
        <input class="form-check-input" type="radio" name="waycontact"  value="toan-thoi-gian-co-dinh"  >
        <label class="form-check-label" for="waycontact">
        Toàn thời gian cố định
        </label>

      </div>
      @endif
      @if("toan-thoi-gian-tam-thoi" ==$requestParam->query('hinh-thuc-lam-viec',''))
      <div class="form-check">
          <input class="form-check-input" checked type="radio" name="waycontact"  value="toan-thoi-gian-tam-thoi" >
          <label class="form-check-label" for="waycontact">
              Toàn thời gian tạm thời
          </label>

      </div>
      @else 
      <div class="form-check">
          <input class="form-check-input"  type="radio" name="waycontact"  value="toan-thoi-gian-tam-thoi" >
          <label class="form-check-label" for="waycontact">
              Toàn thời gian tạm thời
          </label>

      </div>
      @endif
    

      @if("ban-thoi-gian-tam-thoi" ==$requestParam->query('hinh-thuc-lam-viec',''))
      <div class="form-check">
          <input class="form-check-input" checked type="radio" name="waycontact"  value="ban-thoi-gian-tam-thoi"  >
          <label class="form-check-label" for="waycontact">
          Bán thời gian tạm thời
          </label>

      </div>
      @else 
      <div class="form-check">
          <input class="form-check-input"  type="radio" name="waycontact"  value="ban-thoi-gian-tam-thoi" >
          <label class="form-check-label" for="waycontact">
           Bán thời gian tạm thời
          </label>

      </div>
      @endif

      @if("thuc-tap" ==$requestParam->query('hinh-thuc-lam-viec',''))
      <div class="form-check">
          <input class="form-check-input" checked type="radio" name="waycontact"  value="thuc-tap" >
          <label class="form-check-label" for="waycontact">
          Thực tập
          </label>

      </div>
      @else 
      <div class="form-check">
          <input class="form-check-input"  type="radio" name="waycontact"  value="thuc-tap"  >
          <label class="form-check-label" for="waycontact">
          Thực tập
          </label>

      </div>
      @endif
      @if("khac" ==$requestParam->query('hinh-thuc-lam-viec',''))
      <div class="form-check">
          <input class="form-check-input" checked type="radio" name="waycontact"  value="khac" >
          <label class="form-check-label" for="waycontact">
          Khác
          </label>

      </div>
      @else 
      <div class="form-check">
          <input class="form-check-input"  type="radio" name="waycontact"  value="khac" >
          <label class="form-check-label" for="waycontact">
          Khác
          </label>

      </div>
      @endif
      </div>
    </div>
    <div class="accordion-single-item js-acc-item">
      <h3 class="accordion-single-title js-acc-single-trigger">Địa Điểm</h3>
      <div class="accordion-single-content">
          <div class="form-group" id="city_dd2">
              <select class="form-control form-select" name="city_id2" id="city_id2">
                  <option  value="">Chọn địa điểm </option>
                  @foreach($cities as $item)
                    @if($item->slug ==$requestParam->query('tinh-thanh',''))
                      <option selected value="{{$item->slug}}">{{$item->city}}</option>
                    @else 
                      <option value="{{$item->slug}}">{{$item->city}}</option>
                    @endif
                      
                @endforeach
              </select>

              
          </div>
      </div>
    </div>
    <div class="accordion-single-item js-acc-item">
      <h3 class="accordion-single-title js-acc-single-trigger">Bằng Cấp</h3>
      <div class="accordion-single-content">
         
      </div>
    </div>
    <div class="accordion-single-item js-acc-item">
      <h3 class="accordion-single-title js-acc-single-trigger">Kinh Nghiệm</h3>
      <div class="accordion-single-content">
         
      </div>
    </div>
    <div class="accordion-single-item js-acc-item">
      <h3 class="accordion-single-title js-acc-single-trigger">Mức Lương</h3>
      <div class="accordion-single-content">
         
      </div>
    </div>
    <div class="accordion-single-item js-acc-item">
      <h3 class="accordion-single-title js-acc-single-trigger">Giới Tinh</h3>
      <div class="accordion-single-content">
         
      </div>
    </div>
    <div class="accordion-single-item js-acc-item">
      <h3 class="accordion-single-title js-acc-single-trigger">Ngoại Ngữ</h3>
      <div class="accordion-single-content">
         
      </div>
    </div>
    <!-- <div class="accordion-single-item js-acc-item">
      <h3 class="accordion-single-title js-acc-single-trigger">Loại Hồ Sơ</h3>
      <div class="accordion-single-content">
      </div>
    </div> -->
  </form>
</div>
</nav>
@push('styles')
<link href="{{ asset('/vietstar/css/style.css')}}" rel="stylesheet">
<style>
.advance-filtering-title {
    font-size: 19px;
    font-weight: 700;
    margin-bottom: 0;
}
.sidebar .form-check {
    margin-top: 10px; 
    margin-bottom: 10px; 
    margin-left: 10px;
}

.accordion-single  {
  border-bottom: 1px solid #efefef;
  border-top: 1px solid #efefef;

  margin-top: 20px;

}

.accordion-single-title {
  
  padding: 20px 0;
  cursor: pointer;
  position: relative;
  font-size: 16px;
  margin: 0;
}

.accordion-single-title::after{
  content: "";
  position: absolute;
  right: 6px;
  top: 50%;
  transition: all 0.2s ease-in-out;
  display: block;
  width: 8px;
  height: 8px;
  border-top: solid 2px #999;
  border-right: solid 2px #999;
  transform: translateY(-50%) rotate(135deg);
}



.accordion-single-content {
    
    opacity: 0;
    display: none;
  overflow: hidden;
  transition: all .5s ease;
}

.accordion-single-content p {
  padding: 20px;
}

.accordion-single-item.is-open .accordion-single-content  {
    opacity: 1;
    display: block;
}

.accordion-single-item.is-open .accordion-single-title::after  {
  transform: translateY(-50%) rotate(315deg);
}

</style>
@endpush

@push('scripts')
<script type="text/javascript">
const accSingleTriggers = document.querySelectorAll('.js-acc-single-trigger');

accSingleTriggers.forEach(trigger => trigger.addEventListener('click', toggleAccordion));

function toggleAccordion() {
  const items = document.querySelectorAll('.js-acc-item');
  const thisItem = this.parentNode;

  items.forEach(item => {
    if (thisItem == item) {
      thisItem.classList.toggle('is-open');
      return;
    }
    item.classList.remove('is-open');
  });
}
function clearFormFiltercandidates(){
  console.log(23123);
     // Clear radio buttons for time
    $("input[name='timeUpdate']").prop('checked', function() {
        return this.defaultChecked;
    });

    $("input[name='waycontact']").prop('checked', function() {
        return this.defaultChecked;
    });

    // Clear checkboxes for job types
    $("input[type='checkbox']").prop('checked', function() {
        return this.defaultChecked;
    });

    // Reset select dropdown for cities
    $(".form-control#city").val('');

  
    // Clear other input fields (assuming they are not radio buttons, checkboxes, or the city select)
    $("input[type='text']").val(''); // Clear text inputs
    $("textarea").val(''); // Clear textareas
    // Add more selectors for other input types as needed
    const items = document.querySelectorAll('.js-acc-item');
    items.forEach(item => {
      item.classList.remove('is-open');
  });
  console.log(4);


}



</script>
@endpush


