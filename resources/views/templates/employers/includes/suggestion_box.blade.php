<ul class="list-group">
    @if($dataSearch)
    @foreach($dataSearch as $key => $topHunterJob)
        <li class="list-group-item">
            <a href="{{route('job.detail', [$topHunterJob->slug])}}" title="{{$topHunterJob->title}}">{{$topHunterJob->title}}</a>
        </li>
        @endforeach
    @endif
</ul>
