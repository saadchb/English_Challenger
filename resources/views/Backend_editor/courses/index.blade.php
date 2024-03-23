@extends('Backend_editor.Layout')
@section('title','Courses')
@section('button_add')
<a class="nav-link ring-1 ring-black ring-opacity-5 bg-indigo-600 text-white text-sm px-4 py-2 flex items-center rounded-md font-semibold" href="{{route('Courses.create')}}">Add new</a>
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
        <div class="grid grid-cols-3 gap-8 ">
            @foreach($courses as $course)
            <div class="relative m-2">
                <div style="width: 220px; height:220px; padding-bottom:-90px;" class="relative w-full bg-slate-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 shadow">
                    <a href="#"><img class="w-full h-full object-center object-cover" style="height: 220px;" src="{{asset('storage/'.$course->img)}}" alt="HR Analytics"><span class="absolute z-10 left-2 bottom-2 text-xs px-2 py-1 rounded bg-red-400 text-white">Trash</span><span class="absolute z-10 right-2 bottom-2 max-w-[160px] truncate flex items-center gap-x-1 text-xs px-2 py-1 rounded bg-gray-100 text-gray-700" title="instructor"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg><span class="flex-1 truncate">instructor</span></span></a>
                </div>
                <div class="mt-5 mb-1">
                    <div class="w-full flex items-center justify-between gap-x-2 mb-2">
                        <span class="flex-1 text-sm text-gray-400">
                            @foreach($categories as $categorie)
                            @if($categorie->course_id == $course->id)
                            {{ $categorie->title }}@if (!$loop->last)
                            ,
                            @endif
                            @endif
                            @endforeach

                        </span>
                        <span class="text-sm font-medium text-gray-900">
                            @if($course->regular_price &&!$course->sale_price)
                            <span class="text-sm font-medium text-gray-900"><span class="uppercase"> $ {{$course->regular_price}}</span></span>
                            @endif
                            @if($course->regular_price && $course->sale_price)
                            <span class="text-sm font-medium text-gray-900"><span class="line-through pr-2 text-gray-500"> $ {{$course->sale_price}}</span><span>$ {{$course->regular_price}}</span></span>
                            @endif
                            @if(!$course->regular_price && !$course->sale_price)
                            <span class="uppercase">Free</span>
                            @endif
                        </span>
                    </div><a class="mb-4 text-sm text-gray-700 font-medium text-left line-clamp-2" href="#">{{$course->title}}</a>
                </div>
                <div class="flex justify-between">
                    <div class="flex items-center space-x-3">
                        <!-- <a class="text-sm font-medium text-indigo-600 flex items-center gap-x-1" href="{{route('Courses.edit',$course->id)}}"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>View</a> -->
                            <a  href="{{route('Courses.edit',$course->id)}}" target="_blank" rel="noopener noreferrer" class="text-sm font-medium text-green-600 flex items-center gap-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>Edit</a>
                        </div>
                    <form id="delete-form-{{$course->id}}" action="{{route('Courses.destroy', $course->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="relative z-40" data-headlessui-state=""><button type="submit" onclick='confirmation(event,`{{ $course->id }}`)' data-toggle="modal" class="text-sm pl-2 font-medium text-red-500 flex items-center gap-x-1 focus:border-0 focus:outline-none" id="headlessui-popover-button-:re:" type="button" aria-expanded="false" data-headlessui-state=""><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>Delete</button></div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{$courses->links()}}
    
</div>

@endsection