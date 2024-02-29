
<!-- SEARCH STICKY -->
<div class="page-heading-tool job-detail ">
    <div class="container">

  
    <div class="tool-wrapper">
            <div class="search-job">
                <div class="form-horizontal">
                    <div class="form-wrap">
                        <div class="form-group form-keyword">
                            <input type="text" class="keyword form-control" id="search" name="search"
                            value ="{{$requestParam->query('tu-khoa','')}}"     placeholder="{{__('Skills or Job Titles')}}" >
                        </div>
                        <div class="form-group">
                              <select class="form-control" name="industry_id" id="industry_id">
                                <option value="">Chọn lĩnh vực</option>
                                @foreach($industryIds as $item)
                                   @if($item->slug ==$requestParam->query('linh-vuc',''))
                                    <option selected value="{{$item->slug}}">{{$item->industry}}</option>
                                    @else 
                                    <option value="{{$item->slug}}">{{$item->industry}}</option>
                                    @endif
                                     
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                              <select class="form-control" name="cities" id="cities">
                                <option value="">Chọn tỉnh/thành</option>
                                @foreach($cities as $item)
                                    @if($item->slug ==$requestParam->query('tinh-thanh',''))
                                    <option selected value="{{$item->slug}}">{{$item->city}}</option>
                                    @else 
                                    <option value="{{$item->slug}}">{{$item->city}}</option>
                                    @endif
                                     
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group form-submit">
                            <button class="btn-gradient" onclick ="searchForm()">
                                Tìm Kiếm 
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mobile-filter toollips">
                <button type="button" class="btn btn-filter" id="atcFilters" title="Lọc">
                    <i class="fa-solid fa-filter"></i> Lọc
                </button>
            </div>
        </div>
  
      
    </div>
</div>

<!-- SEARCH STICKY Mobile-->

<div class="page-heading-tool job-detail mobile">
    <div class="container">
        <div class="tool-wrapper">
            <div class="search-job">
                <div class="form-horizontal">
                    <div class="form-wrap">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search"
                                placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                        <div class="form-group form-submit">
                            <button class="btn-gradient" type="submit">
                                Tìm Kiếm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-filter toollips">
                <button type="button" class="btn btn-filter" id="#atcFilters-mobile" title="Lọc"
                    onclick="openFilterJob_mobile()">
                    <i class="fa-solid fa-filter"></i> Lọc
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH ADVANDCE STICKY -->
<div class="filters-job-wrapper job-detail">
    <div class="container">
        <div class="filters-wrapper">
            <form action="{{route('job.seeker.list')}}" method="get">
                <div class="row">
                    
                 
                    
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select">
                            <label>Theo cấp bậc</label>
                            <select class="form-control form-select" name="careerLevel" id="careerLevelId">
                                <option value="-1">Tất cả</option>
                                @foreach($careerLevelIdsArray as $item)
                                    @if($item->slug ==$requestParam->query('cap-bac',''))
                                        <option selected value="{{$item->slug}}">{{$item->career_level}}</option>
                                    @else 
                                      <option value="{{$item->slug}}">{{$item->career_level}}</option>
                                    @endif
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" >
                            <label>Theo giới tính</label>
                            <select class="form-control form-select" id="genderSelect" name="gender">
                                <option value="">Chọn giới tính</option>
                                @if("nam" ==$requestParam->query('gioi-tinh',''))
                                <option  selected  value="nam" data-id="1">
                                    Nam
                                </option>
                                @else 
                                <option  value="nam" data-id="1">
                                    Nam
                                </option>
                                @endif
                                
                                @if("nu" ==$requestParam->query('gioi-tinh',''))
                                    <option  selected  value="nu" data-id="1">
                                        Nữ
                                    </option>
                                @else 
                                    <option  value="nu" data-id="1">
                                        Nu
                                    </option>
                                @endif>

                            </select>
                        </div>
                    </div>

                </div>
                <div class="close-filter-box">
                    <div class="close-input-filter">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
               
            </form>
        </div>
    </div>
</div>


<div class="filters-job-wrapper-mobile job-detail">
    <div class="container">
        <div class="close-filter-box-mobile" onclick="closeFilterJob_mobile()">
            <div class="close-input-filter-mobile">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <div class="filters-wrapper">
            <form action="{{route('job.seeker.list')}}" method="get">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-2">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search"
                                placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-2">
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                            <select class="form-control form-select" name="functional_area_id" id="functional_area">
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4  col-md-4 col-lg-2">
                        <div class="form-group form-select-chosen" id="city_dd2">
                            <select class="form-control form-select" name="city_id" id="city">
                                <option value="">Chọn địa điểm</option>
                                <option value="3">HCM</option>
                                <option value="5">Hà Nội</option>
                                <option value="5">Đà Nẵng</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen">
                            <label>Lương</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3">Từ 3.000.000 đ</option>
                                <option value="5">Từ 5.000.000 đ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Cấp bậc</label>
                            <select class="form-control form-select" id="level" name="level">
                                <option value="">Tất cả</option>
                                <option value="sinh-vien-thuc-tap-sinh_1" data-id="1">
                                    Sinh viên/ Thực tập sinh
                                </option>
                                <option value="moi-tot-nghiep_2" data-id="2">
                                    Mới tốt nghiệp
                                </option>
                                <option value="nhan-vien_3" data-id="3">
                                    Nhân viên
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Hình thức việc làm</label>
                            <select class="form-control form-select" name="job_type" id="job_type">
                                <option value="">Tất cả</option>
                                <option data-id="1000" value="nhan-vien-chinh-thuc_1000">
                                    Nhân viên chính thức
                                </option>
                                <option data-id="0100" value="tam-thoi-du-an_0100">
                                    Tạm thời/Dự án
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group form-group-custom-multiselect" id="benefit_id_dd">
                            <label>Chọn phúc lợi mong muốn</label>
                            <select class="form-control form-select shadow-sm multiselect" name="benefit_id"
                                id="benefit" multiple>
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group">
                            <label>Theo cấp bậc</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3">Nhân viên</option>
                                <option value="5">Trưởng nhóm/Giám sát</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Theo giới tính</label>
                            <select class="form-control form-select" id="level" name="level">
                                <option value="">Tất Cả</option>
                                <option value="Nam" data-id="1">
                                    Nam
                                </option>
                                <option value="Nữ" data-id="2">
                                    Nữ
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Lương</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3">Từ 3.000.000 đ</option>
                                <option value="5">Từ 5.000.000 đ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group form-group-custom-multiselect" id="benefit_id_dd">
                            <label>Chọn phúc lợi mong muốn</label>
                            <select class="form-control form-select shadow-sm multiselect" name="benefit_id"
                                id="benefit" multiple>
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="form-group form-submit">
                        <button class="btn btn-primary" type="submit">
                            Tìm Kiếm
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#benefit_id').multiselect({
        texts: {
            placeholder: "{{__('Select desired benefits')}}"
        }
    });
});
$('#benefit_id').each(function() {
    $(this).multiselect({
        texts: {
            placeholder: "{{__('Select desired benefits')}}", // or $(this).prop('title'),
        },
    });
});

function searchForm()
{
    var keywordText = $("#search").val();
    var linhvucField = $("#industry_id ").val();
    var tinhThanh = $("#cities").val();
    var careerLevelSelect = $("#careerLevelId").val();
    var genderSelectText = $("#genderSelect").val();
    var lastUpdated = $('input:radio[name="timeUpdate"]:checked').val();
    var wayContact = $('input:radio[name="waycontact"]:checked').val();

    var href ="/tim-ung-vien?1=1";
    if(keywordText != '')
    {
        href =  href + '&&tu-khoa=' + keywordText;
    }
    if(linhvucField != '')
    {
        href =  href + '&&linh-vuc=' + linhvucField;
    }
    if(tinhThanh != '')
    {
        href =  href + '&&tinh-thanh=' + tinhThanh;
    }
    if(careerLevelSelect != '')
    {
        href =  href + '&&cap-bac=' + careerLevelSelect;
    }
    if(genderSelectText != '')
    {
        href =  href + '&&gioi-tinh=' + genderSelectText;
    }

   

    if(lastUpdated != '')
    {
        href =  href + '&&thoi-gian-cap-nhat=' + lastUpdated;
    }

    if(wayContact != '')
    {
        href =  href + '&&hinh-thuc-lam-viec=' + wayContact;
    }
    window.open( href,'_self');
}

</script>
@endpush