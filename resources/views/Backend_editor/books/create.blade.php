@extends('Backend_editor.Layout')
@section('title', 'books')
@section('content')
<div class="container-fluid mt--8">

    <form action="{{ route('books.store') }}" enctype="multipart/form-data" id="form1" method="POST">
        @csrf
        <main class="min-w-0 mx-auto relative">
            <div>

                <div class="sticky-top bg-white border-bottom  px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="text-xl font-bold text-gray-900">Add new Book</h3>
                        <div class="d-flex gap-3 align-items-center">
                            <a href="/books" class=" btn btn-outline-secondary"><i class="fa-regular fa-circle-left"></i> Back</a>
                            <div class="position-relative">

                                <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="mt-4 px-8 py-4 pb-8">
                    <div class="">
                        <div class="grid grid-cols-6 gap-9">
                            <div class="col-span-6 sm:col-span-3"><label for="title" class="block text-sm font-medium text-gray-700 ">Title</label><input id="title" type="text" name="title" class="mt-1 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2" value="{{ old('title') }}">
                                @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                        </div>
                        <div class=" flex  items-center gap-x-2 mb-4 mt-4">
                            <label for="regular" class="block text-sm font-medium text-gray-700 ">regular price</label>
                            <input id="regular" type="number" name="regular_price" value="{{ old('regular_price') }}" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[80px]  p-2" step="0.01" min="0" value="false">
                            @error('regular price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="sale" class="block text-sm font-medium text-gray-700 ">sale price</label>
                            <input id="sale" type="number" name="sale_price" value="{{ old('sale_price') }}" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[80px]  p-2" step="0.01" min="0" value="false">
                            @error('sale_price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror



                        </div>
                        <div class="col-span-6">
                            <div class="flex items-end justify-between"><label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            </div>
                            <textarea id="description" rows="5" name="description" class="mt-1 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 ">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <br>
                        <div class="col-span-2 " style="float: right;"><span class="block text-sm font-medium text-gray-700">Course
                                Categories</span>
                            <div id='parentAddNewTag' class="mt-4 space-y-4">
                                @foreach ($categories as $categorie)
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="categorie{{ $categorie->title }}" type="checkbox" name="categories[]" value="{{ $categorie->id }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" @if (is_array(old('categories')) && in_array($categorie->id, old('categories'))) checked @endif>
                                    </div>
                                    <div class="text-sm">
                                        <label for="categorie{{ $categorie->title }}" class="pl-3 font-medium text-gray-700">{{ $categorie->title }}</label>
                                    </div>
                                </div>
                                @endforeach

                                <a href="{{ route('Categories.index') }}" class="relative text-sm gap-x-1 flex items-center font-medium text-[#007bff] AddNewTag"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>Add new</a>

                            </div>
                        </div>
                    </div><span id="headlessui-tabs-panel-:r16:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r13:" tabindex="-1" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></span><span id="headlessui-tabs-panel-:r17:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r14:" tabindex="-1" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></span>
                </div>
                <div class="flex items-end justify-between" >
                            <div class="col-span-2"><label for="featured-image" class="block text-sm font-medium text-gray-700">Featured File</label>
                                <div class="relative flex justify-center mt-3 px-6 pt-5 pb-6 border-2 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <div class="flex justify-center mb-4">
                                            <svg class="mx-auto h-12 w-12" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <path class="text-gray-400" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                                            </svg>

                                        </div>
                                        <div class="flex text-sm text-gray-600">
                                            <div class="cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <label class="bg-[#007bff] text-white text-sm font-bold py-2 px-4 rounded" for="file_input" style="background-color:#953288;">UPLOAD THE BOOK</label>
                                                <input value="{{ old('file_path') }}" name="file_path" class="hidden block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Pdf (MAX. 10MB).</p>
                                            </div>
                                        </div>
                                        @error('file_path')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- <input type="file" name="file_path" > -->
                                <div class="col-span-2"><label for="featured-image" class="block text-sm font-medium text-gray-700">Featured image</label>
                                    <div class="relative flex justify-center mt-3 px-6 pt-5 pb-6 border-2 border-dashed rounded-md">
                                        <div class="space-y-1 text-center"><svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <div class="cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <label class="bg-[#007bff] text-white text-sm font-bold py-2 px-4 rounded" for="image_input">Upload image</label>
                                                    <input value="{{ old('img') }}" name="img" class="hidden block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image_input_help" id="image_input" type="file">
                                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                                </div>
                                            </div>
                                            @error('img')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                </div>
            </div>
</div>

</main>

</form>
<div role="tabpanel" style="display: none;" id="curriculum" class="ml-6" aria-labelledby="headlessui-tabs-tab-:r1j:" tabindex="0" data-headlessui-state="selected">
    <div class="flex items-center gap-x-2 text-white bg-blue-400 text-sm font-medium border rounded py-3 px-4"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>Please save Course before add Section</div>
</div>


@endsection