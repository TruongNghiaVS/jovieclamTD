    <!-- Main -->
    <!-- Bio -->
    <div class="row py-3">
        <div class="col-sm-6 col-xl-3 px-3">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="box-dasboard-top" bis_skin_checked="1">
                    <div class="head" bis_skin_checked="1">
                        <h2 class="title-dashboard">Thông tin tài khoản </h2>
                    </div>
                    <div class="body" bis_skin_checked="1">
                        <ul class="company-account-information">
                            
                            <li>
                                <p class="number orderNew">1</p><a class="title" href="/company-packages">Đơn hàng đang sử dụng</a>
                            </li>
                            <li>
                                <p class="number JskNew">{{ $dashboarOverview->candidateCount}}</p><a class="title" href="/application-manager">Ứng viên ứng tuyển</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 px-4">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="box-dasboard-top" bis_skin_checked="1">
                    <div class="head" bis_skin_checked="1">
                        <h2 class="title-dashboard">TÌM KIẾM HỒ SƠ</h2>
                    </div>
                    <div class="body" bis_skin_checked="1">
                          Chưa có điểm xem hồ sơ
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-6 col-xl-3 px-4">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="box-dasboard-top" bis_skin_checked="1">
                    <div class="head" bis_skin_checked="1">
                        <h2 class="title-dashboard">Quản lý đăng tuyển</h2>
                    </div>
                    <div class="body" bis_skin_checked="1">
                        <ul class="company-account-information">
                            <li>
                                <p class="number intNumPostNoUse">{{$dashboarOverview->TotalJobPublish}}</p><a class="title" href="#">Việc làm đang đăng</a>
                            </li>
                            <li>
                                <p class="number orderNew">{{$dashboarOverview->TotalJobWatiting}}</p><a class="title" href="#">
                                    Việc làm chờ đăng</a>
                            </li>
                            <li>
                                <p class="number JskNew">{{$dashboarOverview->TotalJobPause}}</p><a class="title" href="#">
                                    Việc làm tạm dừng đăng</a>
                            </li>
                            <li>
                                <p class="number JskNew">{{$dashboarOverview->TotalJobExprise}}</p><a class="title" href="#">
                                    Việc làm hết hạn</a>
                            </li>
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 px-4">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="box-dasboard-top" bis_skin_checked="1">
                    <div class="head" bis_skin_checked="1">
                        <h2 class="title-dashboard">LỊCH SỬ HOẠT ĐỘNG</h2>
                    </div>
                    <div class="body" bis_skin_checked="1">
                       <p>Chưa có dữ liệu</p>
                    </div>
                </div>
            </div>
        </div>

    </div>