@extends('Backend_editor.Layout')
@section('title','books')
@section('button_add')
<a class="nav-link ring-1 ring-black ring-opacity-5 bg-indigo-600 text-white text-sm px-4 py-2 flex items-center rounded-md font-semibold" href="{{route('books.create')}}">Add new</a>
@endsection
@section('search')
<a class="nav-link" data-widget="navbar-search" href="#" role="button">
    <i class="fas fa-search"></i>
</a>
<div class="navbar-search-block">
    <form class="form-inline" name="form1">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" onchange="fom1.submit()" placeholder="search" name="search1" id="search1" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="submit" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('content')
<div class="container-fluid mt--8">
    <div class="px-8 py-4">
        <h1 class="mt-2 mb-4 text-center">BOOKS LIST</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
            <?php

            use App\Models\Book;
            use App\Models\Teacher;

            $teachers = Teacher::all();
            ?>
            @foreach($books as $book)

            @if($book->teacher_id == Auth::guard('teacher')->user()->id || Auth::guard('teacher')->user()->isAdmin == 1)
            <div class="relative m-2">
                <div style="height:220px;" class="relative w-full bg-slate-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 shadow">
                    @if(Auth::guard('teacher')->user()->isAdmin == 1)
                    @foreach($teachers as $teacher)
                    @if($teacher->id == $book->teacher_id)
                    @if($teacher->isAdmin == 1)
                   <span class="float-right badge bg-purple">
                            Created By : Admin
                        </span>
                    @else
                    <a href="{{route('teacher.show',$teacher->id)}}"> <span class="float-right badge bg-info">
                            Created By : {{$teacher->first_name}} {{$teacher->last_name}}
                        </span></a>
                    @endif
                    @endif
                    @endforeach
                    @endif
                    <a href="{{ asset('storage/'. $book->file_path) }}" target="_blank">

                        <img class="w-full h-full object-center object-cover" src="{{ asset('storage/'.$book->img)}}" alt="HR Analytics">
                        <span class="absolute z-10 right-2 bottom-2 max-w-[160px] truncate flex items-center gap-x-1 text-xs px-2 py-1 rounded bg-gray-100 text-gray-700" title="instructor">View PDF
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg>
                        </span>

                    </a>
                </div>
                <div class="mt-4 mb-4">
                    <span class="flex-1 text-sm text-gray-400">
                        @foreach($categories as $categorie)
                        @if($categorie->book_id == $book->id)
                        {{ $categorie->title }}@if (!$loop->last)
                        ,
                        @endif
                        @endif
                        @endforeach
                    </span>
                    <span class="text-sm font-medium text-gray-900 ml-28">
                        @if($book->regular_price && !$book->sale_price)
                        <span class="text-sm font-medium text-gray-900"><span class="uppercase"> $ {{$book->regular_price}}</span></span>
                        @endif
                        @if($book->regular_price && $book->sale_price)
                        <span class="text-sm font-medium text-gray-900"><span class="line-through pr-2 text-gray-500"> $ {{$book->sale_price}}</span><span>$ {{$book->regular_price}}</span></span>
                        @endif
                        @if(!$book->regular_price && !$book->sale_price)
                        <span class="uppercase ml-30">Free</span>
                        @endif
                    </span>
                    <a class="mb-4 mt-2 text-sm text-gray-700 font-medium text-left line-clamp-2" href="#">{{$book->title}}</a>
                </div>
                <div class="flex justify-between">
                    <div class="flex items-center space-x-3">
                        <a href="{{route('books.edit',$book->id)}}" target="_blank" <a href="{{route('books.edit',$book->id)}}" target="_blank" rel="noopener noreferrer" class="text-sm font-medium text-green-600 flex items-center gap-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>Edit</a>


                        <form id="delete-form-{{$book->id}}" action="{{route('books.destroy',$book->id)}}" action="#" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="relative z-40" data-headlessui-state=""><button type="submit" onclick='confirmation(event,`{{ $book->id }}`)' data-toggle="modal" class="text-sm pl-2 font-medium text-red-500 flex items-center gap-x-1 focus:border-0 focus:outline-none" id="headlessui-popover-button-:re:" type="button" aria-expanded="false" data-headlessui-state=""><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>Delete</button></div>
                        </form>
                    </div>
                </div>

            </div>
            @endif
            @endforeach
        </div>
    </div>
    {{$books->links()}}

</div>

@endsection