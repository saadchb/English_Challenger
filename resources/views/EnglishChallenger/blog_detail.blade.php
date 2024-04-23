@extends('layouts.app')
@section('title', 'Blog detail')
@section('content')
<?php
    use App\Models\Tag;


    $tag= Tag::find($blog->id_tag);
?>
<section class="page-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="page-header-content">
                    <h1>{{ $blog->title }}</h1>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="/">Home</a>
                        </li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item">
                            Blog Single
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
                <div class="post-single">
                    <div class="post-thumb">
                        <img src="{{ asset('build/assets/images/blog/' . $blog->img) }}" alt="{{ $blog->title }}" class="img-fluid">
                    </div>

                    <div class="single-post-content">
                        <div class="post-meta mt-4">
                            <span class="post-date"><i class="fa fa-calendar-alt mr-2"></i>{{ $blog->created_at->format('Y-m-d') }}</span>
                            <span class="post-comment"><i class="fa fa-comments mr-2"></i>{{$blog->comments()->count()}} Comments</span>
                            <span><a href="#" class="post-author"><i class="fa fa-user mr-2"></i>
                                @if ($blog->user_id)
                                    <!-- Fetch the user corresponding to the user_id -->
                                    <?php $user = App\Models\User::find($blog->user_id); ?>
                                    <!-- Display the user's name if the user is found -->
                                    @if ($user)
                                        {{ $user->name }}
                                    @else
                                        <!-- If user_id is not set (e.g., anonymous comment), display appropriate message -->
                                        Anonymous
                                    @endif
                                @endif
                            </a></span>
                        </div>
                        <h3>{{ $blog->title }}</h3>
                        <p>{{ $blog->content }}</p>

                        <h3>{{ $blog->subtitle }}</h3>
                        <p>{{ $blog->subcontent }}</p>

                    </div>

                    <!-- hna tags -->
                    <div class="single-tags">
                        @if ($blog->tag_id)
                            <?php $tag = App\Models\Tag::find($blog->tag_id); ?>
                            @if($tag)
                                <a href="#">{{$tag->title}}</a>
                            @else
                                <h6><cite>No tags found for this blog.</cite></h6>
                            @endif
                        @endif
                    </div>                   
                        
                    <!-- we need add img to user -->
                    <div class="author">
                        <div class="author-img">
                            <img src="{{ asset('storage/' . $blog->img) }}" alt="author" class="img-fluid">
                        </div>
                        <div class="author-info">
                            <h4>
                                @if ($blog->user_id)
                                    <!-- Fetch the user corresponding to the user_id -->
                                    <?php $user = App\Models\User::find($blog->user_id); ?>
                                    <!-- Display the user's name if the user is found -->
                                    @if ($user)
                                        {{ $user->name }}
                                    @else
                                        <!-- If user_id is not set (e.g., anonymous comment), display appropriate message -->
                                        Anonymous
                                    @endif
                                @endif
                            </h4>
                            <p>Instructor</p>
                            <p>Curated with passion by Instructor , EnglishChallenger is your go-to hub for English learning. Join us as we explore, learn, and grow together. Stay inspired and keep thriving!</p>
                        </div>
                    </div>


                    <div class="comments">
                        <h3 class="comment-title">{{ count($comments) }} Comments</h3>
                        @if (count($comments) > 0)
                            @foreach($comments as $comment)
                                <div class="media">
                                    <img src="{{ asset('build/assets/images/blog/user/' . $comment->img) }}" width="90" height="90" class="mr-3" alt="{{ $comment->name }}">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ $comment->name }}<span>{{ $comment->created_at->format('Y-m-d') }}</span></h5>
                                        {{ $comment->content }}
                                    </div>
                                </div>
                            @endforeach
                            @else
                                <p>No comments yet.</p>
                            @endif
                    </div>



                    <div class="comments-form p-5 mt-4">
                        <h3>Leave a comment </h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form action="{{ route('blogs.comments.store', ['blog' => $blog->id]) }}" method="post" class="comment_form">
                        @csrf
                            <div class="row form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="msg" id="msgt" cols="30" rows="6" placeholder="Comment" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="website" class="form-control" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-main">Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

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
                                <a href="#"><img src="{{ asset('build/assets/images/blog/' . $blog->img) }}" alt="{{$blog->title}}" class="img-fluid"></a>
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