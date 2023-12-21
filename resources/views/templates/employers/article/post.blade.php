

@extends('templates.employers.layouts.app')
@section('content')
@include('templates.employers.includes.header')
<style>
article.article {
    box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    border-radius: 5px;
    overflow: hidden;
    background: #ffffff;
    padding: 50px;
    margin: 15px 0 30px;
}
.article .article-title {
    padding: 15px 0 20px;

}
.article-content ul li {
    margin-bottom: 10px;
    font-size: 17px;
    font-weight: 500;
    line-height: 1.5rem;
}
.article-content  div{
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: 500;
    line-height: 2.0rem;
}

.article .article-content h1, .article .article-content h2, .article .article-content h3, .article .article-content h4, .article .article-content h5 {
    color: var(--text-main);
    font-weight: 600;
    margin-bottom: 15px;
    line-height: 1.2;
}

.article-content p {
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: 500;
    line-height: 2.0rem;
}


</style>

<div class="blog-single gray-bg">
    <div class="container">
        <article class="article">

       
        @if($item)
            <div class="article-title" bis_skin_checked="1">
                        <h6><a href="#" class="text-primary">{!! $item->title !!}</a></h6>
                        <h2>{!! $item->description !!}</h2>
                        <div class="media" bis_skin_checked="1">
                            
                            <div class="media-body" bis_skin_checked="1">
                                <span class="time">{!! $item->created_at !!}</span>
                            </div>
                        </div>
            </div>

            <div class="article-content">

                {!! $item->content !!}
            </div>
        @endif
        </article>
    </div>
</div>

@include('templates.vietstar.includes.footer')
@endsection

@push('scripts')
 
<script>
</script>
@endpush

