@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Về chúng tôi')])
<!-- Inner Page Title end -->
{{--
<section class="section-about-us">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-4 col-lg-3">
                <div class="title-about-us">
                    <h3>Tầm nhìn</h3>
                </div>
            </div>
            
            <div class="col-md-8 col-lg-9">
                <div class="content-about-us">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium consectetur pariatur adipisci impedit itaque provident quod ducimus at, ab molestiae quidem porro laborum nemo doloribus optio consequuntur quas enim tenetur.
                </div>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-md-4 col-lg-3">
                <div class="title-about-us">
                    <h3>Xứ mệnh</h3>
                </div>
            </div>
            
            <div class="col-md-8 col-lg-9">
                <div class="content-about-us">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium consectetur pariatur adipisci impedit itaque provident quod ducimus at, ab molestiae quidem porro laborum nemo doloribus optio consequuntur quas enim tenetur.
                </div>
            </div>

        </div>
    </div>
</section>
<section class="section-content-about-us">
    <div class="container">
        <div class="what_we_do">
            <div class="row">
            
                <div class="col-md-12">
                    <h2 class="section-title mb-3">Our Expertise</h2>
                    <p>Doctus omnesque duo ne, cu vel offendit erroribus. Laudem hendrerit pro ex, cum postea delectus ad. Te pro
                        feugiat perpetua tractatos. Nam movet omnes id, usu te meis corpora. Augue doming quaestio vix at. Sumo duis
                        ea sed, ut vix euismod lobortis prodesset, everti necessitatibus mei cu.<br>
                        <br>
                        Nam ea eripuit assueverit, invenire delicatissimi ad pro, an dicam principes duo. Paulo prodesset duo ad.
                        Duo eu summo verear. Natum gubergren definitionem id usu, graeco cetero ius ut.
                    </p>
                    <ul class="orderlist">
                        <li>Mauris convallis felis</li>
                        <li>Praesent vulputate diam</li>
                        <li>Vestibulum nec dui</li>
                        <li>Curabitur facilisis</li>
                        <li>Donec euismod urna</li>
                        <li>Mauris convallis felis</li>
                    </ul>
                </div>
            </div>
        </div>
           
        </div>

</section>
--}}
<section>{!! $pageContent !!}</section>

@include('templates.vietstar.includes.footer')
@endsection
