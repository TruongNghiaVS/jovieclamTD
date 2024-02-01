<div class="card mb-2">
    <div class="card-body">
        <div class="posted-manager-header">
            <h1 class="title-manage">Cài Đặt Cấu Hình Mail</h1>
        </div>


        <ul class="nav nav-tabs" id="config_mail" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Yêu Cầu Email Marketing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Email Mẫu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Thông Báo Ứng Viên</a>
            </li>
        </ul><!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                   
                @include('templates.employers.config_mail.request_email')

            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
                @include('templates.employers.config_mail.email_template')
            </div>
            <div class="tab-pane" id="tabs-3" role="tabpanel">
                @include('templates.employers.config_mail.notification')
            </div>
        </div>





    </div>




    @push('styles')
    <style type="text/css">
        a.px-auto.btn.btn-outline-primary {
            width: 16%;
            margin-left: 6px;
        }

        .tabslet-tab li.active a {
            background-color: var(--bs-primary);
            color: white;
        }
        #config_mail li {
            margin-right: 5px;
        }

        #config_mail .nav-link {
            webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-transition: 0.2s ease-in-out all;
            -o-transition: 0.2s ease-in-out all;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            align-items: center;
            justify-content: center;
            width: -webkit-max-content;
            width: -moz-max-content;
            width: max-content;
            padding: 8px 25px;
            border: 1px solid #e0e0e0;
            border-bottom: none;
            border-radius: none;
            border-top-right-radius: 4px;
            border-top-left-radius: 4px;
            background: #eeeeee;
            color: var(--text-main);
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s ease-in-out all;
        }
        #config_mail .nav-link.active{
            background: var(--bs-primary);
            color: white;
        }


    </style>
    @endpush
    @push('scripts')
    <script type="text/javascript">
        function toggleTab(e) {
            var hrefVal = $(e).attr('href');
            $('.tabslet-tab li').removeClass('active');
            $('.tabslet-tab li[data-active="' + hrefVal + '"]').addClass('active');
        }
    </script>
    @endpush