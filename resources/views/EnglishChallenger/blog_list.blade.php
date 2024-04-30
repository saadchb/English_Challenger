@extends('layouts.app')
@section('title', 'Blog list')
@section('content')
<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>Blog</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="/">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  Blog
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>

<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
            @foreach ($blogs as $blog)
                <article class="blog-post-item">
                    <div class="post-thumb">
                        <img src="{{asset('storage/'.$bolg->img')}}" alt="{{$blog->title}}" class="img-fluid">
                    </div>
                    <div class="post-item mt-4">
                        <div class="post-meta">
                            <span class="post-date"><i class="fa fa-calendar-alt mr-2"></i>{{ $blog->created_at->format('Y-m-d') }}</span>
                            <span class="post-author"><i class="fa fa-user mr-2"></i>
                                @if ($blog->user_id)
                                    <!-- Fetch the user corresponding to the user_id -->
                                    <?php $user = App\Models\User::find($blog->user_id); ?>
                                    <!-- Display the user's name if the user is found -->
                                    @if ($user)
                                        blog by: {{ $user->name }}
                                    @else
                                        <!-- If user_id is not set (e.g., anonymous comment), display appropriate message -->
                                        Anonymous
                                    @endif
                                @endif
                            </span>
                            <span><a href="#" class="post-comment"><i class="fa fa-comments mr-2"></i> {{$blog->comments()->count()}} </a></span>
                        </div>
                        <h2 class="post-title"><a href="{{ route('EnglishChallenger.blog_detail', ['id' => $blog->id]) }}">{{ $blog->title }}</a></h2>
                        <div class="post-content">
                            <p>{{ $blog->description }}</p>

                            <a href="{{ route('EnglishChallenger.blog_detail', ['id' => $blog->id]) }}" class="read-more">More Details <i class="fa fa-angle-right ml-2"></i></a>
                        </div>
                    </div>
                </article>
            @endforeach
            @if ($blogs->isEmpty())
                <nav class="blog-pagination">
                    <ul class="page-num active">
                        <li>1</li>
                    </ul>
                </nav>
             @else
                <nav class="blog-pagination">
                    <ul class="page-num">
                        @if ($blogs->previousPageUrl())
                            <li><a class=" page-num" href="{{ $blogs->previousPageUrl() }}"><i class="fas fa-long-arrow-alt-left"></i></a></li>
                        @endif
                        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                            <li><a class="page-num active" href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
                        @endfor
                        @if ($blogs->nextPageUrl())
                            <li><a class=" page-num" href="{{ $blogs->nextPageUrl() }}"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                        @endif
                    </ul>
                </nav>
            @endif
      		</div>
      		<div class="col-md-4">
				<div class="blog-sidebar mt-5 mt-lg-0 mt-md-0">
                <div class="widget widget_search">
                    <h4 class="widget-title">Search</h4>
                    <form role="search" class="search-form" action="{{ route('Blogs.index') }}" method="GET">
                        <input type="text" class="form-control" placeholder="Search" name="query">
                        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="widget widget_news">
                    <h4 class="widget-title">Latest Blogs</h4>
                    <ul class="recent-posts">
                        @foreach($latestBlogs as $blog)
                        <li>
                            <div class="widget-post-thumb">
                                <a href="#"><img src="build/assets/images/blog/{{$blog->img}}" alt="{{$blog->title}}" class="img-fluid"></a>
                            </div>
                            <div class="widget-post-body">
                                <span>{{ $blog->created_at->format('Y-m-d') }}</span>
                                <h6> <a href="{{ route('EnglishChallenger.blog_detail', ['id' => $blog->id]) }}">{{$blog->title}}</a></h6>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                    <div class="widget widget_categories">
                        <h4 class="widget-title">Categories</h4>
                        <ul>
                            @foreach($categories as $categorie)
                            <li class="cat-item"><a href="#">{{ $categorie->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget widget_tag_cloud">
                        <h4 class="widget-title">Tags</h4>
                        @foreach($tags as $tag)
                            <a href="#">{{ $tag->title }}</a>
                        @endforeach
                    </div>

                </div>
      		</div>
		</div>
	</div>
</div>
@endsection