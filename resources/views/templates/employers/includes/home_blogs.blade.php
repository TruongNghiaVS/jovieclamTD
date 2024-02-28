<!-- Blogs slider -->


<style>
   

    .aboutus-hp{
            overflow-x: hidden;
            border-bottom: 1px solid #e8e8e8;
    }
</style>
<section class="blogs-slider section-static">
    <div class="container">

        <div class="section-title-block">
            <div class="sectionBlock__title">Cẩm nang nghề nghiệp </div>
        </div>


                 
        <div class="blog-home-content">
            <div class="blog-content__wrapper row">




                
            </div>
        </div>
        <div class="show-more">
            <a href="{{ url('/') }}/tin-tuc/cam-nang-nghe-nghiep" class="btn btn-secondary show-more-btn">Xem Thêm</a>
        </div>
    </div>
</section>



@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var html = ''
        var image = '';
        var slug = '';
        var cate= []

        $.ajax({
            url: '{{url('/')}}/blog/get-allcareer', // Replace with your API endpoint
            type: 'GET',
            dataType: 'json',
            success: function(data) {
              
                // Process the data
         
    

                html = data.blogs.data.map((item, id) => {
                    image = `{{url('/')}}/uploads/blogs/${item.image}`;
                    slug = `{{url('/')}}/blog/${item.slug}`;
                    if (item) {
                        return `  <div class="col-md-6 col-lg-3 col-sm-12 mb-4">
                               
                               <div class="cardBlock p-0">
                              
                                   <div class="figure" bis_skin_checked="1">
                                       <a href="${slug}" class="figure-images"><img src="${image}" alt="${item.heading}"></a>
                                       <div class="figcaption__home" bis_skin_checked="1">        
                                           <div class="figcaption__title" bis_skin_checked="1"><a href="${slug}">${item.heading}</a></div>
                                       </div>
                                   </div>
                               </div>
                               </div>
                               
                   `
                    }

                })

                $(".blog-home-content .blog-content__wrapper").append(html.join(" "))
            },
            error: function(xhr, status, error) {
        
                // Handle errors
                console.error('Error:', error);
            }
        });
    });
</script>
@endpush