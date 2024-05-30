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
       <!-- resources/views/your-view.blade.php -->

<div>
    <livewire:reviewsblogs />
</div>

          
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
                                <a href="#"><img src="{{asset('storage/'.$blog->img)}}" alt="{{$blog->title}}" class="img-fluid"></a>
                            </div>
                            <div class="widget-post-body">
                                <span>{{ $blog->created_at}}</span>
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