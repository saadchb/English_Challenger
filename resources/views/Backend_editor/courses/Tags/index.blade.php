@extends('Backend_editor.Layout')
@section('title', 'Tags')
@section('content')
    <div class=" flex justify-center items-center h-screen">
        <div class="col-span-2  border-solid border-3 border-indigo-600 p-6 rounded"><span
                class="block text-sm font-medium text-gray-700"> Course
                Tags</span>
            <div class="mt-4 space-y-4" id="parentAddNewCategory">
                @foreach ($tags as $tag)
                    <div class="flex items-start">
                        <div class="text-sm"><label for="course_category_111"
                                class="pl-3 font-medium text-gray-700">{{ $tag->title }}</label></div>
                    </div>
                @endforeach
                <a href="{{ route('Courses.create') }}"
                    class="relative text-sm gap-x-1 flex items-center font-medium text-indigo-600"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>Cancel</a>
                <form method="POST" action="{{ route('Tags.store') }}" class="flex items-start gap-x-2">
                    @csrf
                    <input id="add_tag" type="text"
                        class="text-gray-900 h-[36px] border-gray-300 shadow-sm sm:text-sm rounded focus:ring-indigo-500 focus:border-indigo-500 pl-2"
                        name="title"><button type="submit"
                        class="relative ring-1 ring-black ring-opacity-5 bg-indigo-600 text-white text-sm px-4 py-2 flex items-center rounded font-medium">Add</button>
                </form>
            </div>
        </div>
    @endsection
</div>
