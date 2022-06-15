<div class="container__content col-xs-12 mr-auto ml-auto offset-lg-2 col-lg-8">
    <small class="d-block mt-4 pt-4 text-muted">
        <a href="/" class="d-inline text-muted"> Home </a> &mdash;
        <a href="/{{config('contents.entity')}}" class="d-inline text-muted"> Academy
        </a>&mdash;
        <a href="/{{config('contents.entity')}}/{{$slug}}" class="d-inline text-muted">
            {{$title}} </a>
    </small>
    <div class="my-4 py-4 post">
        <h1 class="text-100">{{$title}}</h1>
        <small class="d-block">{{$category}} | {{$estimate_reading}} min read.</small>
        @if (! empty($featured_image))
        <img width="100%" height="100%" class="my-4 img-fluid"
            src="{{ asset('storage') .'/'. $featured_image}}" alt="{{$title}}">
        <br>
        @endif
        {!! $content !!}

    </div>
    <div class='social-share-btns-container'>
        <span class="d-block mb-2 mt-4"><i class="fa fa-share-alt d-inline mr-2"></i> Help your
            friends to learn
            more</span>
        <div class='social-share-btns'>
            <a class='share-btn share-btn-twitter'
                href='https://twitter.com/intent/tweet?text={{env('
                APP_URL')}}/{{config('contents.entity')}}/{{$slug}}' rel='nofollow' target='_blank'>
                <i class='fab fa-twitter'></i>

            </a>
            <a class='share-btn share-btn-facebook'
                href='https://www.facebook.com/sharer/sharer.php?u={{env('
                APP_URL')}}/{{config('contents.entity')}}/{{$slug}}' rel='nofollow' target='_blank'>
                <i class='fab fa-facebook'></i>

            </a>
            <a class='share-btn share-btn-linkedin'
                href='https://www.linkedin.com/cws/share?url={{env('
                APP_URL')}}/{{config('contents.entity')}}/{{$slug}}' rel='nofollow' target='_blank'>
                <i class='fab fa-linkedin'></i>

            </a>
            <a class='share-btn share-btn-reddit' href='http://www.reddit.com/submit?url={{env('
                APP_URL')}}/{{config('contents.entity')}}/{{$slug}}&amp;title={{$title}}'
                rel='nofollow' target='_blank'>
                <i class='fab fa-reddit'></i>

            </a>
            <a class='share-btn share-btn-mail'
                href='mailto:?subject={{$title}}&amp;amp;body={{env('
                APP_URL')}}/{{config('contents.entity')}}/{{$slug}}' rel='nofollow' target='_blank'
                title='via email'>
                <i class="fas fa-envelope"></i>

            </a>
        </div>
    </div>

    <h4 class="text-center mt-4 pt-4">You may be interested in these posts.</h4>
    <div class="related-posts row mt-4">
        @foreach($related_posts as $post)
        <div class="col-md-6">
            <div class="blog-card h-100">
                <div class="d-block my-4 img-fluid"
                    style="background-image:url({{ !empty($post->featured_image) ? asset('storage') .'/'. $post->featured_image : '/public/images/home/stories/story-'.rand(1,3).'.jpg' }});">
                </div>
                <div class="blog-card-body">
                    <a href="/{{config('contents.entity')}}/{{$post->slug}}">
                        <h3 class="title">{{$post->title}}</h3>
                    </a>
                    <p class="excert">
                        {!! substr(strip_tags($post->content), 0, 200) !!}
                    </p>
                    <b><a href="/{{config('contents.entity')}}/{{$post->slug}}">Continue Reading
                            &rarr;</a></b><br><br>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <br><br><a class="py-4 my-4 d-table btn-action w-auto"
        href="/{{config('contents.entity')}}">&larr; Back to {{config('contents.entity')}}</a>


</div>