    <!-- Main -->
    <!-- Bio -->
    <div class="row py-3 g-5">
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="box-dasboard-top" bis_skin_checked="1">
                    <div class="head" bis_skin_checked="1">
                        <h2 class="title-dashboard">Thông Tin Tài Khoản </h2>
                    </div>
                    <div class="body" bis_skin_checked="1">
                        <ul class="company-account-information">
                            
                            <li>
                                <p class="number orderNew">1</p><a class="title" href="/don-hang">Đơn Hàng đang sử dụng</a>
                            </li>
                            <li>
                                <p class="number JskNew">{{ $dashboarOverview->candidateCount}}</p><a class="title" href="/quan-ly-ung-vien">Ứng viên ứng tuyển</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="box-dasboard-top" bis_skin_checked="1">
                    <div class="head" bis_skin_checked="1">
                        <h2 class="title-dashboard">Tìm Kiếm Hồ Sơ</h2>
                    </div>
                    <div class="body" bis_skin_checked="1">
                        <ul class="company-account-information">
                            <li>
                                <a href="#" class="title">
                                    Chưa có điểm xem hồ sơ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="box-dasboard-top" bis_skin_checked="1">
                    <div class="head" bis_skin_checked="1">
                        <h2 class="title-dashboard">Quản Lý Đăng Tuyển</h2>
                    </div>
                    <div class="body" bis_skin_checked="1">
                        <ul class="company-account-information">
                            <li>
                                <p class="number intNumPostNoUse">{{$dashboarOverview->TotalJobPublish}}</p><a class="title" href="/quan-ly-dang-tuyen?status=1">Việc Làm Đang Đăng</a>
                            </li>
                            <li>
                                <p class="number orderNew">{{$dashboarOverview->TotalJobWatiting}}</p><a class="title" href="/quan-ly-dang-tuyen?status=2">
                                    Việc Làm Chờ Đăng</a>
                            </li>
                            <li>
                                <p class="number JskNew">{{$dashboarOverview->TotalJobPause}}</p><a class="title" href="/quan-ly-dang-tuyen?status=3">
                                    Việc Làm Tạm Dừng đăng</a>
                            </li>
                            <li>
                                <p class="number JskNew">{{$dashboarOverview->TotalJobExprise}}</p><a class="title" href="/quan-ly-dang-tuyen?expired=true">
                                    Việc Làm Hết Hạn</a>
                            </li>
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="card widget-dashboard mb-3 w-100 shadow-sm">
                <div class="box-dasboard-top" bis_skin_checked="1">
                    <div class="head" bis_skin_checked="1">
                        <h2 class="title-dashboard">Lịch Sử Hoạt Động</h2>
                    </div>
                    <div class="body" bis_skin_checked="1">
                        <ul class="company-account-operation">
                            <li class="flex-column">
                                <p class="time">
                                    <time>06/10/2023</time>
                                </p>
                                <a href="#" class="title">
                                    ID#: 1641617 - Code:  - Title: IT (Step 1)

                                    Post from: CB.VN
                                </a>
                            </li>
                        </ul>
                  
                    </div>
                </div>
            </div>
        </div>

    </div>