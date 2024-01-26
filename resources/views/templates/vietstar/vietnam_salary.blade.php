@extends('templates.vietstar.layouts.app')
@section('content') 
<!-- Header start --> 
@include('templates.vietstar.includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Vietnam Salary')])
@include('flash::message')
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <section class="home-salary-banner">
        <div class="container">
            <div class="top-intro">
                <div class="top-title">
                    <h1>BẠN ĐANG NHẬN MỨC LƯƠNG CẠNH TRANH?</h1>
                </div>
                <div class="text-intro-1">
                    <p>Khảo sát lương từ <strong>135.000+</strong> việc làm</p>
                </div>
                <div class="text-intro-2">
                    <p>Được kiểm duyệt mẫu bởi công ty nghiên cứu thị trường InsightAsia</p>
                    <p>từ <strong>650.000+</strong> Việc làm &amp; <strong>20.000+</strong> Nhà tuyển dụng</p>
                </div>
                
            </div>
            <div class="main-salary">
                <div class="box-salary">
                    <div class="main-form">
                        {{ Form::open(['route' => 'job.list', 'method' => 'GET'])}}
                            <div class="list-form-group">
                                <div class="form-group form-keyword">
                                    <input type="text" name="keyword" id="keyword2" value=""
                                        placeholder="Nhập chức danh hoặc kỹ năng" autocomplete="off">
                                    <div class="cleartext"><em class="mdi mdi-close-circle"></em></div>
                                </div>
                                <div class="form-group ">
                                    <select id="location2" name="location"
                                        data-placeholder="Tất cả địa điểm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                                        <option value="0">Tất cả địa điểm</option>
                                        <option value="4">Hà Nội</option>
                                        <option value="8">Hồ Chí Minh</option>
                                        <option value="511">Đà Nẵng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="salary" id="yoursalary" maxlength="19" value=""
                                        placeholder=" Mức lương hiện tại hoặc mong muốn (VND) " autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="exp" id="yourexp" value="" min="0"
                                        placeholder="Số năm kinh nghiệm">
                                </div>
                                <div class="form-group form-submit">
                                    <button class="btn-gradient">
                                        <em class="fas fa-search"></em> </button>

                                </div>
                            </div>
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-salary-tags">
        <div class="container">
            <div class="cb-title cb-title-center">
                <p>Không biết bắt đầu từ đâu?</p>
                <h2>Tham khảo ngay mức lương các vị trí phổ biến</h2>
            </div>
            <div class="list-tag">
                <ul>
                    <li> <a href="#">Nhân Viên Kinh
                            Doanh</a> </li>
                    <li> <a href="#">Kế Toán Tổng Hợp</a>
                    </li>
                    <li> <a href="#">Accountant</a> </li>
                    <li> <a href="#">Giám Sát Bán Hàng</a>
                    </li>
                    <li> <a href="#">Kế Toán Trưởng</a> </li>
                    <li> <a href="#">Sales Executive</a>
                    </li>
                    <li> <a href="#">Trưởng Phòng
                            Kinh Doanh</a> </li>
                    <li> <a href="#">Nhân Viên Kỹ
                            Thuật</a> </li>
                    <li> <a href="#">Sales Admin</a> </li>
                    <li> <a href="#">Chuyên Viên Kinh
                            Doanh</a> </li>
                    <li> <a href="#">Chuyên Viên Tuyển
                            Dụng</a> </li>
                    <li> <a href="#">Nhân Viên Bán
                            Hàng</a> </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="home-salary-1 cb-section">
        <div class="container">
            <div class="cb-title cb-title-center">
                <h2>Lợi ích của bạn khi sử dụng VietnamSalary</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="iframe">
                        <iframe src="https://www.youtube.com/embed/RQ46ijut6JI" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-content">
                        <ul>
                            <li>
                                <div class="icon"><img src="https://static.careerbuilder.vn/salary/img/vn-salary/i1.png" class="lazy" alt="" style=""></div>
                                <div class="text">
                                    <h3>Mức lương của bạn so với thị trường lao động</h3>
                                    <p>Tìm hiểu mức lương hiện tại/ mong muốn của bạn đang ở đâu so với thị trường lao động
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="https://static.careerbuilder.vn/salary/img/vn-salary/i2.png" class="lazy" alt="" style=""></div>
                                <div class="text">
                                    <h3>Cập nhật thông tin mới nhất và hữu ích về lương</h3>
                                    <p>Đón xem loạt bài viết nóng hổi xoay quanh “chuyện khó nói” lương và thưởng <a
                                            href="#"
                                            target="_blank"><strong><u><i>tại đây</i></u></strong> </a> </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="https://static.careerbuilder.vn/salary/img/vn-salary/i3.png" class="lazy" alt="" style=""></div>
                                <div class="text">
                                    <h3>Tính nhanh lương Gross/Net và thuế thu nhập cá nhân</h3>
                                    <p>Công cụ tính lương mẫu nhanh<br><a class="a"
                                            href="#"> Click vào
                                            đây để tính ngay</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-salary-3 cb-section">
        <div class="container">
            <div class="cb-title cb-title-center">
                <h2>Tìm Kiếm Mức Lương Theo Ngành Nghề</h2>
            </div>
            <div class="main-content">
                <ul class="list-item">
                    <li>
                        <div class="icon">
                            <img src="https://images.careerbuilder.vn/salary/1609321515_banhangkinhdoanh.png" class="lazy"
                                alt="BÁN HÀNG KINH DOANH" style="">
                        </div>
                        <div class="content">
                            <h4>BÁN HÀNG KINH DOANH</h4>
                            <p><a href="#"
                                    title=" Chuyên Viên Kinh Doanh"> Chuyên Viên Kinh Doanh</a>, <a
                                    href="#"
                                    title=" Nhân Viên Bán Hàng"> Nhân Viên Bán Hàng</a>, <a
                                    href="#"
                                    title=" Trưởng Phòng Kinh Doanh"> Trưởng Phòng Kinh Doanh</a>, <a
                                    href="#"
                                    title=" Giám Sát Bán Hàng"> Giám Sát Bán Hàng</a>, <a
                                    href="#"
                                    title=" Sales Executive"> Sales Executive</a>, <a
                                    href="#"
                                    title="Nhân Viên Kinh Doanh">Nhân Viên Kinh Doanh</a> </p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="https://images.careerbuilder.vn/salary/1609321488_mkt.png" class="lazy"
                                alt="MARKETING" style="">
                        </div>
                        <div class="content">
                            <h4>MARKETING</h4>
                            <p><a href="#"
                                    title=" Marketing Manager"> Marketing Manager</a>, <a
                                    href="#"
                                    title=" Trưởng Phòng Marketing"> Trưởng Phòng Marketing</a>, <a
                                    href="#"
                                    title=" Marketing Executive"> Marketing Executive</a>, <a
                                    href="#"
                                    title=" Chuyên Viên Marketing"> Chuyên Viên Marketing</a>, <a
                                    href="#"
                                    title="Nhân Viên Marketing">Nhân Viên Marketing</a>, <a
                                    href="#"
                                    title=" Brand manager"> Brand manager</a> </p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="https://images.careerbuilder.vn/salary/1609321473_xaydung.png" class="lazy"
                                alt="XÂY DỰNG" style="">
                        </div>
                        <div class="content">
                            <h4>XÂY DỰNG</h4>
                            <p><a href="#"
                                    title="Kỹ Sư Xây Dựng">Kỹ Sư Xây Dựng</a>, <a
                                    href="#"
                                    title=" Kiến Trúc Sư"> Kiến Trúc Sư</a>, <a
                                    href="#"> Kỹ
                                    sư QS</a>, <a
                                    href="#"
                                    title=" Giám Sát Công Trình"> Giám Sát Công Trình</a>, <a
                                    href="#"
                                    title=" Giám Sát An Toàn Lao Động"> Giám Sát An Toàn Lao Động</a>, <a
                                    href="#"
                                    title=" Chỉ Huy Trưởng Công Trình"> Chỉ Huy Trưởng Công Trình</a> </p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="https://images.careerbuilder.vn/salary/1609321480_cntt.png" class="lazy"
                                alt="CÔNG NGHỆ THÔNG TIN" style="">
                        </div>
                        <div class="content">
                            <h4>CÔNG NGHỆ THÔNG TIN</h4>
                            <p><a href="#"
                                    title=" PHP Developer"> PHP Developer</a>, <a
                                    href="#"
                                    title="Lập Trình Viên">Lập Trình Viên</a>, <a
                                    href="#"
                                    title=" IT Helpdesk"> IT Helpdesk</a>, <a
                                    href="#"
                                    title=" Frontend Developer"> Frontend Developer</a>, <a
                                    href="#"
                                    title=" Nhân Viên IT"> Nhân Viên IT</a>, <a
                                    href="#"
                                    title=" IT Business Analyst"> IT Business Analyst</a> </p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="https://images.careerbuilder.vn/salary/1609321501_hanhchinhnhansu.png" class="lazy"
                                alt="HÀNH CHÍNH NHÂN SỰ" style="">
                        </div>
                        <div class="content">
                            <h4>HÀNH CHÍNH NHÂN SỰ</h4>
                            <p><a href="#"
                                    title="Nhân Viên Hành Chính">Nhân Viên Hành Chính</a>, <a
                                    href="#"
                                    title=" Chuyên Viên Tuyển Dụng"> Chuyên Viên Tuyển Dụng</a>, <a
                                    href="#"
                                    title=" Nhân Viên Hành Chính Nhân Sự"> Nhân Viên Hành Chính Nhân Sự</a>, <a
                                    href="#"
                                    title=" Nhân Viên Lễ Tân"> Nhân Viên Lễ Tân</a>, <a
                                    href="#"
                                    title=" Chuyên Viên Nhân Sự"> Chuyên Viên Nhân Sự</a>, <a
                                    href="#"
                                    title=" Nhân Viên Nhân Sự"> Nhân Viên Nhân Sự</a> </p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="https://images.careerbuilder.vn/salary/1609321456_ketoan.png" class="lazy"
                                alt="KẾ TOÁN" style="">
                        </div>
                        <div class="content">
                            <h4>KẾ TOÁN</h4>
                            <p><a href="#"
                                    title="Kế Toán Trưởng">Kế Toán Trưởng</a>, <a
                                    href="#"
                                    title=" Kế Toán Thanh Toán"> Kế Toán Thanh Toán</a>, <a
                                    href="#"
                                    title=" Kế Toán Tổng Hợp"> Kế Toán Tổng Hợp</a>, <a
                                    href="#"
                                    title=" Kế Toán Công Nợ"> Kế Toán Công Nợ</a>, <a
                                    href="#"
                                    title=" Kế Toán Kho"> Kế Toán Kho</a>, <a
                                    href="#">
                                    Accountant</a> </p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="https://images.careerbuilder.vn/salary/1609321465_design.png" class="lazy"
                                alt="THIẾT KẾ" style="">
                        </div>
                        <div class="content">
                            <h4>THIẾT KẾ</h4>
                            <p><a href="#"
                                    title="Graphic Designer">Graphic Designer</a>, <a
                                    href="#"
                                    title=" Chuyên Viên Thiết Kế"> Chuyên Viên Thiết Kế</a>, <a
                                    href="#"
                                    title=" Kiến Trúc Sư"> Kiến Trúc Sư</a>, <a
                                    href="#"
                                    title=" Nhân Viên Thiết Kế Đồ Họa"> Nhân Viên Thiết Kế Đồ Họa</a>, <a
                                    href="#">
                                    Designer</a>, <a
                                    href="#"
                                    title=" Nhân Viên Thiết Kế"> Nhân Viên Thiết Kế</a> </p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="https://images.careerbuilder.vn/salary/1609321507_chamsockh.png" class="lazy"
                                alt="CHĂM SÓC KHÁCH HÀNG" style="">
                        </div>
                        <div class="content">
                            <h4>CHĂM SÓC KHÁCH HÀNG</h4>
                            <p><a href="#"
                                    title="Nhân Viên Tư Vấn Chăm Sóc Khách Hàng">Nhân Viên Tư Vấn Chăm Sóc Khách Hàng</a>,
                                <a href="#"
                                    title=" Trưởng Nhóm Dịch Vụ Khách Hàng"> Trưởng Nhóm Dịch Vụ Khách Hàng</a>, <a
                                    href="#"
                                    title=" Trưởng Phòng Chăm Sóc Khách Hàng"> Trưởng Phòng Chăm Sóc Khách Hàng</a>, <a
                                    href="#"
                                    title=" Nhân Viên Chăm Sóc Khách Hàng"> Nhân Viên Chăm Sóc Khách Hàng</a>, <a
                                    href="#"
                                    title=" Chuyên Viên Chăm Sóc Khách Hàng"> Chuyên Viên Chăm Sóc Khách Hàng</a> </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>


@include('templates.vietstar.includes.footer')
@endsection
@push('scripts')
    {!! Html::script(asset('vietstar/js/main.js')) !!}
@endpush
@push('styles')
    {!! Html::style( asset('vietstar/scss/update.css')) !!}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endpush




