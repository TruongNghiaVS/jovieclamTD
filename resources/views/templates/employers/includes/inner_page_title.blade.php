<!-- Breadcrumb -->
<section class="breadcrumbs">
  <div class="container">
    <div class="row">
      <!-- <div class="col-lg-3 d-flex"> -->
      <!--   <div class="p-2 me-2" id="collapseSidebar" type="button" data-bs-toggle="collapse" data-bs-target="#mobile-sidebar"
            aria-controls="sidebar">
            <i class="far fa-bars"></i>
          </div> -->
      <!-- <h3>{{$page_title}}</h3> -->
      <!-- </div> -->
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mt-2">
            <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>