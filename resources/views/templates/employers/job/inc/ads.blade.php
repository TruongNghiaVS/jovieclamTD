
<div id="adbanner" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->

    <!-- The slideshow -->
    <div class="carousel-inner" >

        <div class="row" id="adbanner-side">
           
        </div>
    </div>
</div>
<!-- Left and right controls -->
</div>

@push('styles')
<link href="{{ asset('/vietstar/css/style.css')}}" rel="stylesheet">
<style>
.gad {}

#adbanner,
.carousel-inner,
.carousel-inner>.carousel-item {
    width: 100%;
    height: 100%;
}

.carousel-inner>.carousel-item>img,
.carousel-inner>.carousel-item>a>img {
    width: 100%;
    height: 100%;
    margin: auto;
}
</style>
@endpush

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
            // Set your API endpoint
            const apiUrl = `{{ route('admin.advertisementBannerCan.getAll') }}`;
            console.log(apiUrl);
            // Make the API request
            $.ajax({
                url: apiUrl,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Handle the data from the API
                    console.log(data);

                    if(data) {
                        data.forEach(element => {
                            if (element.priorities != '1') {
                                $(".carousel-inner #adbanner-side").append(`
                                    <div class="col-12 col-md-6 col-lg-12 ">
                                        <div class="item">
                                            <div class="image loadAds">
                                                <a href="#">
                                                    <img src="/admin_assets/${element.linkDesktop}"
                                                        alt="#">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            }
                        });
                    }
                   
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error('Error:', error);
                }
            });
        });

</script>
@endpush


