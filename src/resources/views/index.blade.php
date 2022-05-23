@if(!count($contents))
<h4>Sorry!</h4>
We could not find anything to read ...
<br><br>
<a href="/blog">&larr; Back to blog</a>
@endif
<div class="row my-4 py-4">
    @foreach ($contents as $index=>$content)
    @if ($index == 0)

    <div class="mt-4 pt-4 col-md-6">
        <img class="img-fluid" width="100%" height="100%" class="d-block mb-2"
            src="{{ !empty($content->featured_image) ? asset('storage') .'/'. $content->featured_image : '/public/images/home/stories/story-'.rand(1,3).'.jpg' }}"
            alt="lyncme profile links bio shorten link {{$content->title}}">
    </div>
    <div class="mt-4 pt-1 col-md-6 mb-4 pb-4">
        <a href="/academy/{{$content->slug}}">
            <h2>{{$content->title}}</h2>
        </a>
        <small class="d-block"><A
                href="/academy/category/{{$content->category}}">{{$content->category}}</a></small>
        <p class="excert">
            {!! substr(strip_tags($content->content), 0, 400) !!} ...
        </p>
        <a href="/academy/{{$content->slug}}" class="d-table btn-action w-auto">Continue Reading
            &rarr;</a><br><br>

    </div>


    @else

    <div class="col-md-6 my-4 py-4">
        <img width="100%" height="100%" class="d-block my-4 img-fluid"
            src="{{ !empty($content->featured_image) ? asset('storage') .'/'. $content->featured_image : '/public/images/home/stories/story-'.rand(1,3).'.jpg' }}"
            alt="lyncme profile links bio shorten link {{$content->title}}">

        <a href="/academy/{{$content->slug}}">
            <h2 class="my-4">{{$content->title}}</h2>
        </a>
        <p class="excert">
            {!! substr(strip_tags($content->content), 0, 400) !!} ...
        </p><a href="/academy/{{$content->slug}}" class="d-table btn-action w-auto">Continue
            Reading &rarr;</a><br><br>

    </div>
    @endif

    @endforeach
</div>
{{$contents->links()}}