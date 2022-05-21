@extends('front-end/ui', [
    'template'    => 'blog-index', 
    'title'       => ' | LyncMe Academy | Free Online Courses & Tutorials | LyncMe Blog',
    'description' => ' LyncMe Academy brings you more free online course to allow you learn more.',
])
@section('content')

<div class="pt-4 mt-4 container">
    @if(!count($posts))
    <h4>Sorry!</h4>
    We could not find anything to read ...
    <br><br>
    <a href="/blog">&larr; Back to blog</a>
    @endif
    <div class="row my-4 py-4">
        @foreach ($posts as $index=>$post)
        @if ($index == 0)

        <div class="mt-4 pt-4 col-md-6">
            <img class="img-fluid" width="100%" height="100%" class="d-block mb-2"
                src="{{ !empty($post->featured_image) ? asset('storage') .'/'. $post->featured_image : '/public/images/home/stories/story-'.rand(1,3).'.jpg' }}" alt="lyncme profile links bio shorten link {{$post->title}}">
        </div>
        <div class="mt-4 pt-1 col-md-6 mb-4 pb-4">
            <a href="/academy/{{$post->slug}}"> <h2>{{$post->title}}</h2></a>
            <small class="d-block"><A href="/academy/category/{{$post->category}}">{{$post->category}}</a></small>
            <p class="excert">
                {!! substr(strip_tags($post->content), 0, 400) !!} ...
            </p>
            <a href="/academy/{{$post->slug}}" class="d-table btn-action w-auto">Continue Reading &rarr;</a><br><br>

        </div>
      

        @else
        
        <div class="col-md-6 my-4 py-4">
            <img width="100%" height="100%" class="d-block my-4 img-fluid"
                src="{{ !empty($post->featured_image) ? asset('storage') .'/'. $post->featured_image : '/public/images/home/stories/story-'.rand(1,3).'.jpg' }}" alt="lyncme profile links bio shorten link {{$post->title}}">

                <a href="/academy/{{$post->slug}}"> <h2 class="my-4">{{$post->title}}</h2></a>
            <p class="excert">
                {!! substr(strip_tags($post->content), 0, 400) !!} ...
            </p><a  href="/academy/{{$post->slug}}" class="d-table btn-action w-auto">Continue Reading &rarr;</a><br><br>

        </div>
        @endif
   
    @endforeach
</div>
{{$posts->links()}}
</div>
@endsection