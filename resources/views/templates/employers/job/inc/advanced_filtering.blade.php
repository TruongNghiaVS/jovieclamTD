<nav>
<div class="d-flex justify-content-between mb-2">
    <h2 class="advance-filtering-title">Bộ lọc nâng cao</h2> 
    <a href="#" class="text-secondary">Xóa cài đặt</a>
</div>
<div class="accordion-single js-acc-single">
  <div class="accordion-single-item js-acc-item">
    <h3 class="accordion-single-title js-acc-single-trigger">Thời gian cập nhật</h3>
    <div class="accordion-single-content">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="time" id="time1" value="option1" checked>
        <label class="form-check-label" for="time1">
            Tất cả
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="time" id="time2" value="option2">
        <label class="form-check-label" for="time2">
            Trong vòng 1 ngày
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="time" id="time3" value="option2">
        <label class="form-check-label" for="time2">
            1 Tuần gần đây
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="time" id="time4" value="option2">
        <label class="form-check-label" for="time2">
            1 Tháng gần đây
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="time" id="time2" value="option2">
        <label class="form-check-label" for="time2">
            2 Tháng gần đây
        </label>
    </div>

    </div>
  </div>
  <div class="accordion-single-item js-acc-item">
    <h3 class="accordion-single-title js-acc-single-trigger">Hình thức làm việc</h3>
    <div class="accordion-single-content">
      <p>This is an Answer 2</p>
    </div>
  </div>
  <div class="accordion-single-item js-acc-item">
    <h3 class="accordion-single-title js-acc-single-trigger">Địa điểm</h3>
    <div class="accordion-single-content">
      <p>This is an Answer 3</p>
    </div>
  </div>
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
</script>
@endpush


