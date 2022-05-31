<div class="sidebar">
    <div class="widget">
        <h2 class="widget-title">Popular Posts</h2>
        <div class="blog-list-widget">
            <div class="list-group">
                @foreach($popularPosts as $post)
                    <a href="{{ route('detail.post', ['slug' => $post->slug]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="w-100 justify-content-between">
                        <img src="{{ $post->getImage() }}" alt="" class="img-fluid float-left">
                        <h5 class="mb-1">{{ $post->title }}</h5>
                        <small>{{ $post->getPostDate() }}</small>
                        <small class="ml-3"><i class="fa fa-eye"> {{ $post->views }}</i></small>
                    </div>
                </a>
                @endforeach
            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Popular Categories</h2>
        <div class="link-widget">
            <ul>
                @foreach($sideCategories as $cat)
                    <li><a href="{{ route('detail.category',['slug'=> $cat->slug]) }}">{{ $cat->title }} <span>({{$cat->posts_count}})</span></a></li>
                @endforeach
            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div><!-- end sidebar -->
