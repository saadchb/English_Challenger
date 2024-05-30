<!-- livewire/blog-posts.blade.php -->
<div>
@foreach ($blogs as $blog)
                <article class="blog-post-item">
                    <div class="post-thumb">
                        <img src="{{asset('storage/'.$blog->img)}}" alt="{{$blog->title}}" class="img-fluid">
                    </div>
                    <div class="post-item mt-4">
                        <div class="post-meta">
                            <span class="post-date"><i class="fa fa-calendar-alt mr-2"></i>{{ $blog->created_at }}</span>
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
            @if($blogs->hasMorePages())
    <div class="pagination-wrapper" align="center">
        <button wire:click="loadMore" class="btn btn-primary" {{ $isLoading ? 'disabled' : '' }} style=" background-color: #862b84;">
            <span wire:loading.remove>Show More</span>
            <span wire:loading><i class="fa fa-spinner fa-spin mr-2"></i>Loading</span>
        </button>
    </div>
    @endif
</div>
