<section class="employer-number">
    <div class="container" bis_skin_checked="1">
        <ul class="list-number">
            <li>
                <div class="number" data-number="200" bis_skin_checked="1"><span id="productCount1">200</span>
                    <p>M+</p>
                </div>
                <p class="title">Ứng viên trên toàn thế giới</p>
            </li>
            <li>
                <div class="number" data-number="300" bis_skin_checked="1"><span id="productCount2">300</span>
                    <p>K+</p>
                </div>
                <p class="title">Tập đoàn toàn cầu sử dụng JobViecLam</p>
            </li>
            <li>
                <div class="number" data-number="2" bis_skin_checked="1"><span id="productCount3">2</span>
                    <p>M+</p>
                </div>
                <p class="title">Việc làm mỗi ngày </p>
            </li>
            <li>
                <div class="number" data-number="17000" bis_skin_checked="1"><span id="productCount4">17</span>
                    <p>K+</p>
                </div>
                <p class="title">Doanh nghiệp hàng đầu Việt Nam</p>
            </li>
        </ul>
    </div>
</section>
@push('styles')
<style type="text/css">
        .employer-number{
            margin: 10px 0;
            border-top: 1px solid #e8e8e8;
            border-bottom: 1px solid #e8e8e8;
        }
        .employer-number .list-number {
            ms-flex-wrap: wrap;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            max-width: 1220px;
            margin: 0 auto;
            padding: 20px 0;

            list-style-type: none;
        }
        .employer-number .list-number li {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 50%;
            position: relative;
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
            padding: 5px 15px;
            -webkit-box-flex: 0;

        }
        .employer-number .list-number li:before {
            position: absolute;
            top: 0;
            right: -0.5px;
            width: 1px;
            height: 100%;
            background: #e8e8e8;
            content: "";
        }
        .employer-number .list-number li:last-child:before {
            display: none;
        }
        .employer-number .list-number li .number {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 17px;
            text-align: center;
        }

        .employer-number .list-number li .number span, .employer-number .list-number li .number p{
            font-size: 32px;
            color: var(--bs-primary);
            font-weight: 600;
        }
        .employer-number .list-number li .title {
            max-width: 195px;
            margin: 0 auto;
            color: #172642;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
        }

</style>
@endpush




@push('scripts')
<script type="text/javascript">
    function animateNumber(target, duration, elementId) {
        $({ countNum: $('#' + elementId).text() }).animate({
            countNum: target
        }, {
            duration: duration,
            easing: 'linear',
            step: function () {
                $('#' + elementId).text(Math.floor(this.countNum));
            },
            complete: function () {
                $('#' + elementId).text(target);
            }
        });
    }

    // Call the function with the target number (e.g., 100) and duration (e.g., 10000 milliseconds or 10 seconds)
    
    
    animateNumber(100, 1000, 'productCount1');
    animateNumber(200, 1000, 'productCount2');
    animateNumber(300, 1000, 'productCount3');
    animateNumber(400, 1000, 'productCount4');

</script>
@endpush