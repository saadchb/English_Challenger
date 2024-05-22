<div>
<div>
    @foreach ($reviews as $review)
    <div class="course-review-wrapper">
        <div class="course-review">
            <!-- Profile Image -->
            @php
            $teacher = $teachers->firstWhere('id', $review->teacher_id);
            $student = $studentR->firstWhere('id', $review->student_id);
            @endphp
            <div class="profile-img">
                @if($teacher && $teacher->picture)
                <img src="{{ asset('storage/'.$teacher->picture) }}" style="height: 90px;width: 90px;" alt="" class="img-fluid">
                @elseif($student && $student->picture)
                <img src="{{ asset('storage/'.$student->picture) }}" style="height: 90px;width: 90px;" alt="" class="img-fluid">
                @else
                <img src="{{ asset('build/assets/images/clients/user.png') }}" alt="" style="height: 90px;width: 90px;" class="img-fluid">
                @endif
            </div>
            <!-- Review Text -->
            <div class="review-text">
                <h5>{{ $review->name }} <span style="float: right;"><i class="fas fa-clock mr-2"></i> {{ $review->created_at->diffForHumans() }}</span></h5>
                <div class="rating">
                    @for ($i = 0; $i < $review->rating; $i++)
                        <a href="#"><i class="fa fa-star"></i></a>
                        @endfor
                </div>
                <p>{{ $review->comments }}</p>
                @if(Auth::guard('student')->check() and Auth::guard('student')->user()->id == $review->student_id )
                <form action="{{route('review.destroy',$review->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <span style="float: right;"> <button type="submit" style="background: none;margin-left: 20px;"> <i class="fas fa-trash " style="font-size: larger;color: red ;"></i></button>
                </form>
                <button style="background:none;margin-right: 20px;"><i class="fas fa-pen " style="font-size: larger;color: green ;"></i></button></span>
                @endif
                @if(Auth::guard('teacher')->check())
                @if(Auth::guard('teacher')->user()->isAdmin == 1)
                <form action="{{route('review.destroy',$review->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <span> <button type="submit" class="bg-white float-right"> <i class="fas fa-trash " style="font-size: larger;color: red ;"></i></button>
                </form>
                @endif
                @endif
            </div>
        </div>
    </div>
    @endforeach

    @if($reviews->hasMorePages())
    <div class="pagination-wrapper" align="center">
        <button wire:click="loadMore" class="btn btn-primary" {{ $isLoading ? 'disabled' : '' }} style=" background-color: #862b84;">
            <span wire:loading.remove>Show More</span>
            <span wire:loading><i class="fa fa-spinner fa-spin mr-2"></i>Loading</span>
        </button>
    </div>
    @endif
</div>
</div>
