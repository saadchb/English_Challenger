@extends('Backend_editor.Layout')
@section('title', 'Courses')
@section('content')
<div class="container-fluid mt--8">

<form action="{{ route('Courses.store') }}" enctype="multipart/form-data" id="form1" method="POST">
    @csrf
    <main class="min-w-0 mx-auto relative">
        <div>

            <div class="sticky-top bg-white border-bottom  px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="text-xl font-bold text-gray-900">Add new Course</h3>
                    <div class="d-flex gap-3 align-items-center">
                        <a href="/Courses" class=" btn btn-outline-secondary"><i class="fa-regular fa-circle-left"></i> Back</a>
                        <div class="position-relative">

                            <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                        </div>

                    </div>
                </div>

            </div>
            <div class="mt-4 px-8 py-4 pb-8">
                <div class="">
                    <div class="flex w-full space-x-1 border-b" role="tablist" aria-orientation="horizontal"><button type='button' class="px-4 py-2 text-sm min-w-[100px] leading-5 font-medium focus:outline-none  border-b-2 -mb-[2px] border-gray-900" id="headlessui-tabs-tab-:r12:">General</button><button type='button' class="px-4 py-2 text-sm min-w-[100px] leading-5 font-medium focus:outline-none text-gray-500 hover:text-gray-600" id="headlessui-tabs-tab-:r13:">Curriculum</button><button type='button' class="px-4 py-2 text-sm min-w-[100px] leading-5 font-medium focus:outline-none text-gray-500 hover:text-gray-600" id="headlessui-tabs-tab-:r14:">Settings</button></div>
                    <div style="display: block" id="general" class="w-full mt-6">
                        <div id="headlessui-tabs-panel-:r15:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r12:" tabindex="0" data-headlessui-state="selected">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3"><label for="title" class="block text-sm font-medium text-gray-700 ">Title</label><input id="title" type="text" name="title" class="mt-1 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2" value="{{ old('title') }}">
                                    @error('title')
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
                                <div class="col-span-2"><span class="block text-sm font-medium text-gray-700">Course
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

                                        <a href='{{ route('Categories.index') }}' class="relative text-sm gap-x-1 flex items-center font-medium text-[#007bff] AddNewTag"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>Add new</a>
                                    </div>
                                </div>
                                <div class="col-span-2"><span class="block text-sm font-medium text-gray-700">Course
                                        Tags</span>
                                    <div class="mt-4 space-y-4" id="parentAddNewCategory">
                                        @foreach ($tags as $tag)
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="tag{{ $tag->title }}" type="checkbox" name="tags[]" value="{{ $tag->id }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" @if (is_array(old('tags')) && in_array($tag->id, old('tags'))) checked @endif>
                                            </div>
                                            <div class="text-sm">
                                                <label for="tag{{ $tag->title }}" class="pl-3 font-medium text-gray-700">{{ $tag->title }}</label>
                                            </div>
                                        </div>
                                        @endforeach

                                        <a id="AddNewCategorie" href='{{ route('Tags.index') }}' class="relative text-sm gap-x-1 flex items-center font-medium  text-[#007bff] AddNewTag"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>Add new</a>
                                    </div>
                                </div>
                                <div class="col-span-2"><label for="featured-image" class="block text-sm font-medium text-gray-700">Featured image</label>
                                    <div class="relative flex justify-center mt-3 px-6 pt-5 pb-6 border-2 border-dashed rounded-md">
                                        <div class="space-y-1 text-center"><svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <div class="cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <label class="bg-[#007bff] text-white text-sm font-bold py-2 px-4 rounded" for="file_input">Upload file</label>
                                                    <input value="{{ old('img') }}" name="img" class="hidden block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
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
                        </div><span id="headlessui-tabs-panel-:r16:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r13:" tabindex="-1" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></span><span id="headlessui-tabs-panel-:r17:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r14:" tabindex="-1" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="content">
        <div class="ml-6" style="display: none;" id="setting" class="w-full mt-6"><span id="headlessui-tabs-panel-:r15:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r12:" tabindex="-1" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></span><span id="headlessui-tabs-panel-:r16:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r13:" tabindex="-1" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;"></span>
            <div id="headlessui-tabs-panel-:r17:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r14:" tabindex="0" data-headlessui-state="selected">
                <div class="mt-8 mb-6 grid grid-cols-[20%_80%] border rounded">
                    <div class="flex flex-col items-start divide-y-[1px] divide-gray-200 bg-gray-100" role="tablist" aria-orientation="vertical"><button type='button' class="w-full flex justify-start text-sm font-medium text-gray-700 py-4 px-4 outline-none bg-gray-200" id="btn-general" role="tab" type="button" aria-selected="true" tabindex="0" data-headlessui-state="selected" aria-controls="headlessui-tabs-panel-:r2i:">General</button><button type='button' class="w-full flex justify-start text-sm font-medium text-gray-700 py-4 px-4 outline-none" id="btn-pricing" role="tab" type="button" aria-selected="false" tabindex="-1" data-headlessui-state="" aria-controls="headlessui-tabs-panel-:r2j:">Pricing</button><button type='button' class="w-full flex justify-start text-sm font-medium text-gray-700 py-4 px-4 outline-none" id="btn-extra-information" role="tab" type="button" aria-selected="false" tabindex="-1" data-headlessui-state="" aria-controls="headlessui-tabs-panel-:r2k:">Extra
                            Information</button><button type='button' class="w-full flex justify-start text-sm font-medium text-gray-700 py-4 px-4 outline-none" id="btn-assessment" role="tab" type="button" aria-selected="false" tabindex="-1" data-headlessui-state="" aria-controls="headlessui-tabs-panel-:r2l:">Assessment</button><button type='button' class="w-full flex justify-start text-sm font-medium text-gray-700 py-4 px-4 outline-none" id="btn-downloadable-materials" role="tab" type="button" aria-selected="false" tabindex="-1" data-headlessui-state="" aria-controls="headlessui-tabs-panel-:r2m:">Downloadable
                            Materials</button><button type='button' class="w-full flex justify-start text-sm font-medium text-gray-700 py-4 px-4 outline-none" id="btn-certificates" role="tab" type="button" aria-selected="false" tabindex="-1" data-headlessui-state="" aria-controls="headlessui-tabs-panel-:r2n:">Certificates</button>
                    </div>
                    <div class="border-l p-4">
                        <div id="general-content">
                            <div class="space-y-7 metabox-general " id="headlessui-tabs-panel-:r2i:" role="tabpanel" tabindex="0" data-headlessui-state="selected" aria-labelledby="headlessui-tabs-tab-:r2c:">
                                <div>
                                    <div class="flex items-center gap-x-2"><label for="_lp_duration" class="w-36 text-sm text-gray-800 font-medium">Duration</label>
                                        <div class="flex gap-x-2"><input id="_lp_duration" type="number" value="{{ old('duration') ?? 10 }}" name="duration" class="w-[80px] py-1.5 border border-gray-300 shadow-sm text-gray-800 rounded-md text-sm p-2"><select name="duration_gauge" class="py-1.5 pr-8 border border-gray-300 text-gray-800 shadow-sm rounded-md text-sm leading-4">
                                                <option value="minute" @if (old('duration_gauge')=='minute' ) selected @endif>Minute(s)</option>
                                                <option value="hour" @if (old('duration_gauge')=='hour' ) selected @endif>Hour(s)</option>
                                                <option value="day" @if (old('duration_gauge')=='day' ) selected @endif>Day(s)</option>
                                                <option value="week" @if (old('duration_gauge')=='week' ) selected @endif>Week(s)</option>
                                            </select></div>
                                    </div>
                                    <p class="w-full mt-2 flex-1 text-sm pl-36 ml-2">Set to 0 for the lifetime access.
                                    </p>
                                </div>
                                <div class="grid grid-cols-[9rem_1fr] gap-x-2 items-center">
                                    <div class="text-sm text-gray-800 font-medium">Block content</div>
                                    <div class="flex space-x-2"><input id="_lp_block_expire_duration" type="checkbox" @if (old('blocked_content_by_duration')==1) checked="" @endif name="blocked_content_by_duration" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"><label for="_lp_block_expire_duration" class="text-sm text-gray-800 select-none leading-4">When the duration
                                            expires,
                                            the
                                            course is blocked.</label></div>
                                </div>
                                <div class="grid grid-cols-[9rem_1fr] gap-x-2 items-center">
                                    <div class="text-sm text-gray-800 font-medium"></div>
                                    <div class="flex space-x-2"><input id="_lp_block_finished" type="checkbox" @if (old('blocked_content_by_duration')==1) checked="" @else checked="" @endif class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" name="blocked_content_by_student" checked=""><label for="_lp_block_finished" class="text-sm text-gray-800 select-none leading-4">Block the course after
                                            the
                                            student finished this course.</label></div>
                                </div>
                                <div class="grid grid-cols-[9rem_1fr] gap-x-2 items-center">
                                    <div class="text-sm text-gray-800 font-medium">Allow Repurchase</div>
                                    <div class="flex space-x-2"><input id="_lp_allow_course_repurchase" @if (old('allow_repurchase')==1) checked="" @endif name="allow_repurchase" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"><label for="_lp_allow_course_repurchase" class="text-sm text-gray-800 select-none leading-4">Allow users to
                                            repurchase
                                            this
                                            course after it has been finished or blocked <br>(Do not apply to free
                                            courses
                                            or
                                            Create
                                            Order manual).</label></div>
                                </div>
                                <div>
                                    <div class="flex items-center gap-x-2"><label for="_lp_course_repurchase_option" class="w-36 text-sm text-gray-800 font-medium">Repurchase action</label>
                                        <div><select id="_lp_course_repurchase_option" name="repurchase_action" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md">
                                                <option value="reset" @if (old('repurchase_action')=='reset' ) selected @endif>Reset course
                                                    progress</option>
                                                <option value="keep" @if (old('repurchase_action')=='keep' ) selected @endif>Keep course
                                                    progress</option>
                                                <option value="popup" @if (old('repurchase_action')=='popup' ) selected @endif>Open popup
                                                </option>
                                            </select></div>
                                    </div>
                                    <p class="w-full mt-2 flex-1 text-sm pl-36 ml-2">1. Reset course progress: The
                                        course
                                        progress and results of student will be removed.<br>2. Keep course progress: The
                                        course
                                        progress and results of student will remain.<br>3. Open popup: The student can
                                        decide
                                        whether their course progress will be reset with the confirm popup.</p>
                                </div>
                                <div>
                                    <div class="flex items-center gap-x-2"><label for="_lp_level" class="w-36 text-sm text-gray-800 font-medium">Level</label>
                                        <div><select id="_lp_level" name="level" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md">
                                                <option value="All levels">All levels</option>
                                                <option value="beginner" @if (old('level')=='beginner' ) selected @endif>Beginner
                                                </option>
                                                <option value="intermediate" @if (old('level')=='intermediate' ) selected @endif>Intermediate
                                                </option>
                                                <option value="expert" @if (old('level')=='expert' ) selected @endif>Expert</option>
                                            </select></div>
                                    </div>
                                    <p class="w-full mt-2 flex-1 text-sm pl-36 ml-2">Choose a difficulty level.</p>
                                </div>
                                <div>
                                    <div class="flex items-center gap-x-2"><label for="_lp_students" class="w-36 text-sm text-gray-800 font-medium">Fake Students
                                            Enrolled</label>
                                        <div><input id="_lp_students" type="number" name="fake_students_enrolled" value="{{ old('fake_students_enrolled') }}" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[80px] p-2" step="1" min="0" max="" value="0"></div>
                                    </div>
                                    <p class="w-full mt-2 flex-1 text-sm ml-2 pl-36">How many students have taken this
                                        course?
                                    </p>
                                </div>
                                <div>
                                    <div class="flex items-center gap-x-2"><label for="_lp_max_students" class="w-36 text-sm text-gray-800 font-medium">Max student</label>
                                        <div><input id="_lp_max_students" type="number" name="max_student" value="{{ old('max_student') ?? 0 }}" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[80px]  p-2" step="1" min="0" max=""></div>
                                    </div>
                                    <p class="w-full mt-2 flex-1 text-sm ml-2 pl-36">The maximum number of students
                                        that
                                        can
                                        join a course. Set 0 for unlimited.</p>
                                </div>
                                <div>
                                    <div class="flex items-center gap-x-2"><label for="_lp_retake_count" class="w-36 text-sm text-gray-800 font-medium">Re-take Course</label>
                                        <div><input id="_lp_retake_count" type="number" name="re_take_course" value="{{ old('re_take_course') ?? 0 }}" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[80px]  p-2" step="1" min="0" max=""></div>
                                    </div>
                                    <p class="w-full mt-2 flex-1 text-sm ml-2 pl-36">The number of times a user can
                                        learn
                                        again
                                        from this course. To disable, set to 0.</p>
                                </div>
                                <div class="grid grid-cols-[9rem_1fr] gap-x-2 items-center">
                                    <div class="text-sm text-gray-800 font-medium">Finish button</div>
                                    <div class="flex space-x-2"><input id="_lp_has_finish" type="checkbox" @if (old('finish_button')==1) checked="" @else checked="" @endif class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded  p-2" name="finish_button"><label for="_lp_has_finish" class="text-sm text-gray-800 select-none leading-4">Allow showing the
                                            finish
                                            button
                                            when the student has completed all items but has not<br /> passed
                                            the course assessment yet.</label></div>
                                </div>
                                <div class="grid grid-cols-[9rem_1fr] gap-x-2 items-center p-2">
                                    <div class="text-sm text-gray-800 font-medium">Featured list</div>
                                    <div class="flex space-x-2"><input id="_lp_featured" type="checkbox" @if (old('add_to_featured_list')==1) checked="" @endif name="add_to_featured_list" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"><label for="_lp_featured" class="text-sm text-gray-800 select-none leading-4">Add
                                            the
                                            course to the Featured List.</label></div>
                                </div>
                                <div>
                                    <div class="flex gap-x-2"><label for="_lp_featured_review" class="w-36 text-sm text-gray-800 font-medium">Featured review</label>
                                        <div>
                                            <textarea id="_lp_featured_review" name="featured_review" class="focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[400px]  p-2">{{ old('featured_review') }}</textarea>
                                        </div>
                                    </div>
                                    <p class="w-full mt-2 flex-1 text-sm pl-36 ml-2">A good review to promote the
                                        course.
                                    </p>
                                </div>
                                <div>
                                    <div class="flex items-center gap-x-2"><label for="_lp_external_link_buy_course" class="w-36 text-sm text-gray-800 font-medium">External link</label>
                                        <div><input id="_lp_external_link_buy_course" type="text" value="{{ old('external_link') }}" name="external_link" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[400px]  p-2" step="1" min="" max="" value=""></div>
                                    </div>
                                    <p class="w-full mt-2 flex-1 text-sm ml-2 pl-36">Normally used for offline classes.
                                        Ex:
                                        link to a contact page. Format: https://google.com</p>
                                </div>
                                <div class="grid grid-cols-[9rem_1fr] gap-x-2 items-center">
                                    <div class="text-sm text-gray-800 font-medium">Students List</div>
                                    <div class="flex space-x-2"><input id="_lp_hide_students_list" type="checkbox" @if (old('students_list')==1) checked="" @endif name='students_list' name='students_list' class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 roundedw"><label for="_lp_hide_students_list" class="text-sm text-gray-800 select-none leading-4">Hide the students list
                                            in
                                            each
                                            individual course.</label></div>
                                </div>
                            </div>
                        </div>
                        <div id="pricing-content">
                            <div class="space-y-7" id="headlessui-tabs-panel-:ri:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:rc:" tabindex="0" data-headlessui-state="selected">
                                <div class="flex items-center gap-x-2"><label for="regular-price" class="w-36 text-sm text-gray-800 font-medium">Regular Price</label>
                                    <div><input id="regular-price" type="number" name="regular_price" value="{{ old('regular_price') }}" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[80px]  p-2" step="0.01" min="0" value="false"></div>
                                </div>
                            </div>
                            <div id="pricing-content">
                                <div class="space-y-7" id="headlessui-tabs-panel-:ri:" role="tabpanel"
                                    aria-labelledby="headlessui-tabs-tab-:rc:" tabindex="0"
                                    data-headlessui-state="selected">
                                    <div class="flex items-center gap-x-2"><label for="regular-price"
                                            class="w-36 text-sm text-gray-800 font-medium">Regular Price</label>
                                        <div><input id="regular-price" type="number" name="regular_price"
                                                value="{{ old('regular_price') }}"
                                                class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[80px]  p-2"
                                                step="0.01" min="0" value="false"></div>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-x-2"><label for="sale-price"
                                                class="w-36 text-sm text-gray-800 font-medium">Sale Price</label>
                                            <div><input id="sale-price" type="number" name="sale_price"
                                                    value="{{ old('sale_price') }}"
                                                    class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[80px]  p-2"
                                                    step="0.01" min="0"></div>
                                                    @error('sale_price')
                                                        <div class="alert alert-danger">
                                                            {{$message}}
                                                        </div>
                                                    @enderror

                                        </div>
                                    </div>
                                    <div><button type='button' id="btn-date"
                                            class="ml-36 text-sm text-gray-700 font-medium underline">Schedule</button>
                                    </div>
                                    <div id="date" style="display: none">
                                        <div>
                                            <div class="flex items-center"><label for="_lp_sale_start"
                                                    class="w-36 text-sm text-gray-800 font-medium">Sale start dates</label>
                                                <div class="flex gap-2 items-center">
                                                    <div class="relative" data-headlessui-state=""><button type='button'
                                                            id="headlessui-popover-button-:r3h:" type="button"
                                                            aria-expanded="false" data-headlessui-state=""><input
                                                                class="py-1.5 w-[120px] focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-600 text-sm border-gray-300 rounded-md pl-2"
                                                                type="date"
                                                                value="{{ old('sale_start_dates') ? date('Y-m-d', strtotime(old('sale_start_dates'))) : '' }}"
                                                                name="sale_start_dates"></button></div>
                                                    <div class="flex gap-1 items-center">
                                                        <input type='number' max="23" min="0"
                                                            name="sale_start_hours"
                                                            value="{{ old('sale_start_dates') ? date('H', strtotime(old('sale_start_dates'))) : 00 }}"
                                                            class=" pl-2 w-[80px] py-1.5 text-sm text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"><span>:</span>
                                                        <input type='number' max="59" min="0"
                                                            name="sale_start_minutes"
                                                            value="{{ old('sale_start_dates') ? date('i', strtotime(old('sale_start_dates'))) : 00 }}"
                                                            class="pl-2 w-[80px] py-1.5 text-sm text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex items-center mt-4"><label for="_lp_sale_end"
                                                    class="w-36 text-sm text-gray-800 font-medium ">Sale end dates</label>
                                                <div class="flex gap-2 items-center  ">
                                                    <div class="relative" data-headlessui-state=""><button type='button'
                                                            id="headlessui-popover-button-:r3m:" type="button"
                                                            aria-expanded="false" data-headlessui-state=""><input
                                                                value="{{ old('sale_end_dates') ? date('Y-m-d', strtotime(old('sale_end_dates'))) : '' }}"
                                                                class="py-1.5 w-[120px] focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-600 text-sm border-gray-300 rounded-md  pl-2"
                                                                type="date" id="datepicker" value=""
                                                                name="sale_end_dates"></button>
                                                    </div>
                                                    <div class="flex gap-1 items-center">
                                                        <input type='number' max="23" min="0"
                                                            name="sale_end_hours"
                                                            value="{{ old('sale_end_dates') ? date('H', strtotime(old('sale_end_dates'))) : 00 }}"
                                                            class=" p-2 w-[80px] py-1.5 text-sm text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                        <span>:</span>
                                                        <input type='number' max="59"sale_end_minutes
                                                            min="0" name=""
                                                            value="{{ old('sale_end_dates') ? date('i', strtotime(old('sale_end_dates'))) : 00 }}"
                                                            class="w-[80px] py-1.5 text-sm text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-[9rem_1fr] gap-x-2 items-center">
                                        <div class="text-sm text-gray-800 font-medium">There is no enrollment requirement
                                        </div>
                                        <div class="flex space-x-2"><input id="_lp_no_required_enroll" type="checkbox"
                                                @if (old('there_is_no_enrollment_requirement') == 1) checked="" @endif
                                                name="there_is_no_enrollment_requirement"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"><label
                                                for="_lp_no_required_enroll"
                                                class="text-sm text-gray-800 select-none leading-4">Students can see the
                                                content
                                                of all course items and take the quiz without logging in.</label></div>
                                    </div>
                                </div>
                            </div>
                            <div id="extra-information-content">
                                <div>
                                    <div class="flex items-center gap-x-2"><label for="sale-price" class="w-36 text-sm text-gray-800 font-medium">Sale Price</label>
                                        <div><input id="sale-price" type="number" name="sale_price" value="{{ old('sale_price') }}" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[80px]  p-2" step="0.01" min="0"></div>
                                    </div>
                                </div>
                                <div><button type='button' id="btn-date" class="ml-36 text-sm text-gray-700 font-medium underline">Schedule</button>
                                </div>
                                <div id="date" style="display: none">
                                    <div>
                                        <div class="flex items-center"><label for="_lp_sale_start" class="w-36 text-sm text-gray-800 font-medium">Sale start dates</label>
                                            <div class="flex gap-2 items-center">
                                                <div class="relative" data-headlessui-state=""><button type='button' id="headlessui-popover-button-:r3h:" type="button" aria-expanded="false" data-headlessui-state=""><input class="py-1.5 w-[120px] focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-600 text-sm border-gray-300 rounded-md pl-2" type="date" value="{{ old('sale_start_dates') ? date('Y-m-d', strtotime(old('sale_start_dates'))) : '' }}" name="sale_start_dates"></button></div>
                                                <div class="flex gap-1 items-center">
                                                    <input type='number' max="23" min="0" name="sale_start_hours" value="{{ old('sale_start_dates') ? date('H', strtotime(old('sale_start_dates'))) : 00 }}" class=" pl-2 w-[80px] py-1.5 text-sm text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"><span>:</span>
                                                    <input type='number' max="59" min="0" name="sale_start_minutes" value="{{ old('sale_start_dates') ? date('i', strtotime(old('sale_start_dates'))) : 00 }}" class="pl-2 w-[80px] py-1.5 text-sm text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center mt-4"><label for="_lp_sale_end" class="w-36 text-sm text-gray-800 font-medium ">Sale end dates</label>
                                            <div class="flex gap-2 items-center  ">
                                                <div class="relative" data-headlessui-state=""><button type='button' id="headlessui-popover-button-:r3m:" type="button" aria-expanded="false" data-headlessui-state=""><input value="{{ old('sale_end_dates') ? date('Y-m-d', strtotime(old('sale_end_dates'))) : '' }}" class="py-1.5 w-[120px] focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-600 text-sm border-gray-300 rounded-md  pl-2" type="date" id="datepicker" value="" name="sale_end_dates"></button>
                                                </div>
                                                <div class="flex gap-1 items-center">
                                                    <input type='number' max="23" min="0" name="sale_end_hours" value="{{ old('sale_end_dates') ? date('H', strtotime(old('sale_end_dates'))) : 00 }}" class=" p-2 w-[80px] py-1.5 text-sm text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                    <span>:</span>
                                                    <input type='number' max="59" sale_end_minutes min="0" name="" value="{{ old('sale_end_dates') ? date('i', strtotime(old('sale_end_dates'))) : 00 }}" class="w-[80px] py-1.5 text-sm text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-[9rem_1fr] gap-x-2 items-center">
                                    <div class="text-sm text-gray-800 font-medium">There is no enrollment requirement
                                    </div>
                                    <div class="flex space-x-2"><input id="_lp_no_required_enroll" type="checkbox" @if (old('there_is_no_enrollment_requirement')==1) checked="" @endif name="there_is_no_enrollment_requirement" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"><label for="_lp_no_required_enroll" class="text-sm text-gray-800 select-none leading-4">Students can see the
                                            content
                                            of all course items and take the quiz without logging in.</label></div>
                                </div>
                            </div>
                        </div>
                        <div id="extra-information-content">
                            <div>
                                <div class="space-y-7 metabox-extra divide-y-[1px] [&amp;>*]:pt-7" id="headlessui-tabs-panel-:r28:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r22:" tabindex="0" data-headlessui-state="selected">
                                    <div>
                                        <div class="flex gap-x-2 py-7">
                                            <div class="w-36 text-sm text-gray-800 font-medium">Requirements</div>
                                            <div class="flex-1">
                                                <div class="" id="content-requirements">
                                                    @if (isset(json_decode(old('tableData'), true)[0]))
                                                    <x-extra_information :table="json_decode(old('tableData'), true)[0]" btnidname='btn-text' />
                                                    @endif
                                                </div>
                                                <button type='button' id="btn-addMoreR" class="mt-2 flex item-center gap-x-1 px-3 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 uppercase font-medium rounded text-xs focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                                    more</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex gap-x-2  py-7">
                                            <div class="w-36 text-sm text-gray-800 font-medium">Target Audience</div>
                                            <div class="flex-1">
                                                <div id="TargetAudience">
                                                    @if (isset(json_decode(old('tableData'), true)[1]))
                                                    <x-extra_information :table="json_decode(old('tableData'), true)[1]" btnidname='btnAudience' />
                                                    @endif
                                                </div><button type='button' id="btnAddMoreAudience" class="mt-2 flex item-center gap-x-1 px-3 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 uppercase font-medium rounded text-xs focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                                    more</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex gap-x-2  py-7">
                                            <div class="w-36 text-sm text-gray-800 font-medium">Key Features</div>
                                            <div class="flex-1">
                                                <div class="" id="KeyFeatures">
                                                    @if (isset(json_decode(old('tableData'), true)[2]))
                                                    <x-extra_information :table="json_decode(old('tableData'), true)[2]" btnidname='btnKeyFeatures' />
                                                    @endif
                                                </div><button type='button' id="btnAddMoreFeatures" class="mt-2 flex item-center gap-x-1 px-3 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 uppercase font-medium rounded text-xs focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                                    more</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex gap-x-2  py-7">
                                            <div class="w-36 text-sm text-gray-800 font-medium">FAQs</div>
                                            <div class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                                                <div class="space-y-2" id="FAQs">
                                                    @if (isset(json_decode(old('tableData'), true)[3]))
                                                    <x-faqs :table="json_decode(old('tableData'), true)[3]" />
                                                    @endif
                                                </div><button type='button' id="AddMoretbnFAQs" class="mt-2 flex item-center gap-x-1 px-3 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 uppercase font-medium rounded text-xs focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                                    more</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="assessment-content">
                            <div>
                                <div class="space-y-7 metabox-assessment " id="headlessui-tabs-panel-:r29:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r23:" tabindex="0" data-headlessui-state="selected">
                                    <div>
                                        <div class="flex gap-x-2">
                                            <div class="w-36 text-sm text-gray-800 font-medium">Evaluation</div>
                                            <div class="_lp_course_result flex-1 space-y-2">
                                                <div><input id="_lp_course_result_0" type="radio" @if (old('evaluation')=='evaluate_lesson' ) checked @endif class="form-radio text-blue-500 h-4 w-4 border-2 border-blue-500 rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none" name="evaluation" value="evaluate_lesson" checked=""><br /><label for="_lp_course_result_0" class=" ml-2 text-sm text-gray-600">Evaluate
                                                        via lessons<span class="learn-press-tip">
                                                            <p>Evaluate by the number of completed lessons per the total
                                                                number
                                                                of lessons.<br>E.g: If a course has 10 lessons and a
                                                                user
                                                                completes 5 lessons, then the result is 5/10 (50%).</p>
                                                        </span></label></div>
                                                <div><input id="_lp_course_result_1" type="radio" name="evaluation" @if (old('evaluation')=='evaluate_final_quiz' ) checked @endif class="form-radio text-blue-500 h-4 w-4 border-2 border-blue-500 rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none" name="_lp_course_result" value="evaluate_final_quiz"><label for="_lp_course_result_1" class="ml-2 text-sm text-gray-600">Evaluate
                                                        via results of the final
                                                        quiz<span class="learn-press-tip">Evaluate by the result of the
                                                            final
                                                            quiz in the course. You have to add a quiz at the end of the
                                                            course.</span><a href="#" class="lp-metabox-get-final-quiz" data-postid="0" data-loading="Loading...">Get A Passing
                                                            Grade</a></label></div>
                                                <div><input id="_lp_course_result_2" type="radio" name="evaluation" @if (old('evaluation')=='evaluate_quiz' ) checked @endif class="block form-radio text-blue-500 h-4 w-4 border-2 border-blue-500 rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none" name="_lp_course_result" value="evaluate_quiz"><label for="_lp_course_result_2" class="ml-2 text-sm text-gray-600">Evaluate
                                                        via passed quizzes<span class="learn-press-tip">
                                                            <p>Evaluate by the number of passed quizzes per the total
                                                                number
                                                                of
                                                                quizzes.<br>E.g: If the course has 10 quizzes and the
                                                                user
                                                                passes 5 quizzes, then the result is 5/10 (50%).</p>
                                                        </span></label></div>
                                                <div><input id="_lp_course_result_3" type="radio" name="evaluation" @if (old('evaluation')=='evaluate_questions' ) checked @endif class="form-radio text-blue-500 h-4 w-4 border-2 border-blue-500 rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none" name="_lp_course_result" value="evaluate_questions"><label for="_lp_course_result_3" class="ml-2 text-sm text-gray-600">Evaluate
                                                        via questions<span class="learn-press-tip">
                                                            <p>Evaluate by the number of correct answers per the total
                                                                number of
                                                                questions.<br>E.g: If the course has 10 questions and
                                                                the
                                                                user
                                                                corrects 5 questions, then the result is 5/10 (50%).</p>
                                                        </span></label></div>
                                                <div><input id="_lp_course_result_4" type="radio" name="evaluation" @if (old('evaluation')=='evaluate_mark' ) checked @endif class="form-radio text-blue-500 h-4 w-4 border-2 border-blue-500 rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none" name="_lp_course_result" value="evaluate_mark"><label for="_lp_course_result_4" class="ml-2 text-sm text-gray-600">Evaluate
                                                        via mark<span class="learn-press-tip">Evaluate by the number of
                                                            achieved scores
                                                            per the total score of the questions.</span></label></div>
                                                <div><input id="_lp_course_result_5" type="radio" name="evaluation" @if (old('evaluation')=='evaluate_final_assignment' ) checked @endif class="form-radio text-blue-500 h-4 w-4 border-2 border-blue-500 rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none" name="_lp_course_result" value="evaluate_final_assignment"><label for="_lp_course_result_5" class="ml-2 text-sm text-gray-600">Evaluate
                                                        via results of the final
                                                        assignment<span class="learn-press-tip">Evaluate by results of
                                                            final
                                                            assignment in course. You have to add a assignment into end
                                                            of
                                                            course.</span><a href="#" class="lp-metabox-evaluate-radio" data-id="0" data-loading="Loading...">Get Passing
                                                            Grade</a></label></div>
                                            </div>
                                        </div>
                                        <p class="w-full mt-3 flex-1 text-sm pl-36 ml-2">The method of evaluating a
                                            student's
                                            performance in a course.</p>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-x-2"><label for="_lp_passing_condition" class="w-36 text-sm text-gray-800 font-medium">Passing Grade(%)</label>
                                            <div><input id="_lp_passing_condition" type="number" value="{{ old('passing_grade') ?? 80 }}" name="passing_grade" class="py-1.5 focus:ring-indigo-500 focus:border-indigo-700 shadow-sm text-gray-800 text-sm border-gray-300 rounded-md w-[80px] pl-2" step="0.01" min="0" max="100">
                                            </div>
                                        </div>
                                        <p class="w-full mt-2 flex-1 text-sm ml-2 pl-36">The conditions that must be
                                            achieved
                                            to finish the course.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="downloadable-materials-content">
                            <div>
                                <div class="space-y-7 metabox-material " id="headlessui-tabs-panel-:r2a:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r24:" tabindex="0" data-headlessui-state="selected"></div>
                            </div>
                        </div>
                        <div id="certificates-content">
                            <div>
                                <div>
                                    <div class="space-y-7 metabox-certificates " id="headlessui-tabs-panel-:r2b:" role="tabpanel" aria-labelledby="headlessui-tabs-tab-:r25:" tabindex="0" data-headlessui-state="selected">
                                        <div>
                                            <div class="relative">
                                                <div class="flex items-center flex-wrap gap-6">
                                                    <div class="relative w-80 rounded-lg shadow overflow-hidden [&amp;>img]:object-cover [&amp;>img]:object-center [&amp;>img]:w-full [&amp;>img]:h-60 border">
                                                        <div class="lp-certificate-list" id="lp-certificate-14562" data-id="14562">
                                                            <div class="certificate-preview-inner"></div><input class="lp-data-config-cer" type="hidden" value="{&quot;id&quot;:14562,&quot;name&quot;:&quot;check&quot;,&quot;layers&quot;:{&quot;b0b5958e8e822089&quot;:{&quot;name&quot;:&quot;b0b5958e8e822089&quot;,&quot;type&quot;:&quot;text&quot;,&quot;originX&quot;:&quot;center&quot;,&quot;originY&quot;:&quot;center&quot;,&quot;left&quot;:&quot;878.98&quot;,&quot;top&quot;:&quot;255.04&quot;,&quot;width&quot;:&quot;369.17&quot;,&quot;height&quot;:61.5,&quot;fill&quot;:&quot;rgb(0,0,0)&quot;,&quot;stroke&quot;:&quot;&quot;,&quot;strokeWidth&quot;:1,&quot;strokeDashArray&quot;:&quot;&quot;,&quot;strokeLineCap&quot;:&quot;butt&quot;,&quot;strokeLineJoin&quot;:&quot;miter&quot;,&quot;strokeMiterLimit&quot;:10,&quot;scaleX&quot;:1,&quot;scaleY&quot;:1,&quot;angle&quot;:0,&quot;flipX&quot;:false,&quot;flipY&quot;:false,&quot;opacity&quot;:1,&quot;shadow&quot;:&quot;&quot;,&quot;visible&quot;:true,&quot;clipTo&quot;:&quot;&quot;,&quot;backgroundColor&quot;:&quot;&quot;,&quot;fillRule&quot;:&quot;nonzero&quot;,&quot;globalCompositeOperation&quot;:&quot;source-over&quot;,&quot;fieldType&quot;:&quot;course-name&quot;,&quot;variable&quot;:&quot;&quot;,&quot;text&quot;:&quot;Course name&quot;,&quot;fontSize&quot;:61.5,&quot;fontWeight&quot;:&quot;normal&quot;,&quot;fontFamily&quot;:&quot;Helvetica&quot;,&quot;fontStyle&quot;:&quot;&quot;,&quot;lineHeight&quot;:1,&quot;textDecoration&quot;:&quot;&quot;,&quot;textAlign&quot;:&quot;left&quot;,&quot;path&quot;:&quot;&quot;,&quot;textBackgroundColor&quot;:&quot;&quot;,&quot;useNative&quot;:true}},&quot;template&quot;:&quot;https://accountlp.thimpress.com/wp-content/uploads/2022/06/bg-popular-instructor.jpg&quot;,&quot;preview&quot;:&quot;https://accountlp.thimpress.com/wp-content/uploads/2022/06/bg-popular-instructor.jpg&quot;,&quot;systemFonts&quot;:{&quot;Arial&quot;:&quot;Arial&quot;,&quot;Georgia&quot;:&quot;Georgia&quot;,&quot;Helvetica&quot;:&quot;Helvetica&quot;,&quot;Verdana&quot;:&quot;Verdana&quot;},&quot;user_id&quot;:3,&quot;course_id&quot;:false,&quot;key_cer&quot;:&quot;3589037e62f630ffdcd75b768e4b578b&quot;}">
                                                        </div>
                                                        <div class="flex items-center justify-between text-sm px-3 py-2 gap-x-2 bg-gray-100">
                                                            <div class="truncate text-gray-600">check</div>
                                                            <div class="flex items-center gap-x-2"><button type='button' class="relative ring-1 ring-black ring-opacity-5 bg-[#007bff] text-white text-sm px-3 py-1.5 flex items-center rounded font-medium">Assign</button><a href="https://accountlp.thimpress.com/wp-admin/post.php?post=14562&amp;action=edit" class="relative border text-gray-600 bg-white text-sm px-3 py-1.5 flex items-center rounded font-medium hover:bg-gray-50">Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="relative w-80 rounded-lg shadow overflow-hidden [&amp;>img]:object-cover [&amp;>img]:object-center [&amp;>img]:w-full [&amp;>img]:h-60 border">
                                                        <div class="lp-certificate-list" id="lp-certificate-21606" data-id="21606">
                                                            <div class="certificate-preview-inner"></div><input class="lp-data-config-cer" type="hidden" value="{&quot;id&quot;:21606,&quot;name&quot;:&quot;certificate&quot;,&quot;layers&quot;:null,&quot;template&quot;:&quot;https://accountlp.thimpress.com/wp-content/uploads/2023/03/BG_Certificate-Lors-Hovsann.png&quot;,&quot;preview&quot;:&quot;https://accountlp.thimpress.com/wp-content/uploads/2023/03/BG_Certificate-Lors-Hovsann.png&quot;,&quot;systemFonts&quot;:{&quot;Arial&quot;:&quot;Arial&quot;,&quot;Georgia&quot;:&quot;Georgia&quot;,&quot;Helvetica&quot;:&quot;Helvetica&quot;,&quot;Verdana&quot;:&quot;Verdana&quot;},&quot;user_id&quot;:3,&quot;course_id&quot;:false,&quot;key_cer&quot;:&quot;0772416b1f28cdfbd8266ebf4acce843&quot;}">
                                                        </div>
                                                        <div class="flex items-center justify-between text-sm px-3 py-2 gap-x-2 bg-gray-100">
                                                            <div class="truncate text-gray-600">certificate</div>
                                                            <div class="flex items-center gap-x-2"><button type='button' class="relative ring-1 ring-black ring-opacity-5 bg-[#007bff] text-white text-sm px-3 py-1.5 flex items-center rounded font-medium">Assign</button><a href="https://accountlp.thimpress.com/wp-admin/post.php?post=21606&amp;action=edit" class="relative border text-gray-600 bg-white text-sm px-3 py-1.5 flex items-center rounded font-medium hover:bg-gray-50">Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="relative w-80 rounded-lg shadow overflow-hidden [&amp;>img]:object-cover [&amp;>img]:object-center [&amp;>img]:w-full [&amp;>img]:h-60 border">
                                                        <div class="lp-certificate-list" id="lp-certificate-22065" data-id="22065">
                                                            <div class="certificate-preview-inner"></div><input class="lp-data-config-cer" type="hidden" value="{&quot;id&quot;:22065,&quot;name&quot;:&quot;certificate-demo&quot;,&quot;layers&quot;:null,&quot;template&quot;:&quot;https://accountlp.thimpress.com/wp-content/uploads/2024/01/17542181_5815489-scaled.jpg&quot;,&quot;preview&quot;:&quot;https://accountlp.thimpress.com/wp-content/uploads/2024/01/17542181_5815489-scaled.jpg&quot;,&quot;systemFonts&quot;:{&quot;Arial&quot;:&quot;Arial&quot;,&quot;Georgia&quot;:&quot;Georgia&quot;,&quot;Helvetica&quot;:&quot;Helvetica&quot;,&quot;Verdana&quot;:&quot;Verdana&quot;},&quot;user_id&quot;:3,&quot;course_id&quot;:false,&quot;key_cer&quot;:&quot;61eae4f6c1459e349976af7a6465e6ab&quot;}">
                                                        </div>
                                                        <div class="flex items-center justify-between text-sm px-3 py-2 gap-x-2 bg-gray-100">
                                                            <div class="truncate text-gray-600">certificate-demo</div>
                                                            <div class="flex items-center gap-x-2"><button type='button' class="relative ring-1 ring-black ring-opacity-5 bg-[#007bff] text-white text-sm px-3 py-1.5 flex items-center rounded font-medium">Assign</button><a href="https://accountlp.thimpress.com/wp-admin/post.php?post=22065&amp;action=edit" class="relative border text-gray-600 bg-white text-sm px-3 py-1.5 flex items-center rounded font-medium hover:bg-gray-50">Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="tableData" name="tableData">
                                            <div class="w-full mt-4"><a href="https://accountlp.thimpress.com/wp-admin/post-new.php?post_type=lp_cert" target="_blank" rel="noopener noreferrer" class="border gap-x-2 text-white bg-[#007bff] text-sm px-3 py-2 inline-flex items-center rounded-md font-medium"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z">
                                                        </path>
                                                    </svg>Create new certificate</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div role="tabpanel" style="display: none;" id="curriculum" class="ml-6" aria-labelledby="headlessui-tabs-tab-:r1j:" tabindex="0" data-headlessui-state="selected">
    <div class="flex items-center gap-x-2 text-white bg-blue-400 text-sm font-medium border rounded py-3 px-4"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>Please save Course before add Section</div>
</div>
<script>
    const checkboxes = document.getElementById('content').querySelectorAll('input[type=checkbox]');
    console.log(checkboxes)
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxes[i].value = '1'
            console.log('checked')
        } else {
            checkboxes[i].value = '0'
            console.log('!checked')
        }
        checkboxes[i].addEventListener('click', function() {
            if (this.checked) {
                this.value = '1'
                console.log('checked')
            } else {
                this.value = '0'
                console.log('!checked')
            }
        })
    }
    const setting = document.getElementById('setting');
    const general = document.getElementById('general');
    const curriculum = document.getElementById('curriculum');
    const btngeneral = document.getElementById('headlessui-tabs-tab-:r12:')
    const btncurriculum = document.getElementById('headlessui-tabs-tab-:r13:')
    const btnsetting = document.getElementById('headlessui-tabs-tab-:r14:')
    btnsetting.onclick = function() {
        setting.style.display = 'block';
        general.style.display = 'none';
        curriculum.style.display = 'none';
        btngeneral.classList.remove('border-gray-900', 'border-b-2');
        btngeneral.classList.add('text-gray-500', 'hover:text-gray-600');
        btncurriculum.classList.remove('border-gray-900', 'border-b-2', 'border-b-2');
        btncurriculum.classList.add('text-gray-500', 'hover:text-gray-600');
        btnsetting.classList.remove('text-gray-500', 'hover:text-gray-600', 'border-b-2');
        btnsetting.classList.add('border-gray-900', 'border-b-2');
    }
    btngeneral.onclick = function() {
        setting.style.display = 'none';
        curriculum.style.display = 'none';
        general.style.display = 'block';
        btnsetting.classList.remove('border-gray-900', 'border-b-2', 'border-b-2');
        btnsetting.classList.add('text-gray-500', 'hover:text-gray-600');
        btncurriculum.classList.remove('border-gray-900', 'border-b-2', 'border-b-2');
        btncurriculum.classList.add('text-gray-500', 'hover:text-gray-600');
        btngeneral.classList.remove('text-gray-500', 'hover:text-gray-600');
        btngeneral.classList.add('border-gray-900', 'border-b-2');
    }
    btncurriculum.onclick = function() {
        setting.style.display = 'none';
        general.style.display = 'none';
        curriculum.style.display = 'block';
        btnsetting.classList.remove('border-gray-900', 'border-b-2', 'border-b-2');
        btnsetting.classList.add('text-gray-500', 'hover:text-gray-600');
        btngeneral.classList.remove('border-gray-900', 'border-b-2', 'border-b-2');
        btngeneral.classList.add('text-gray-500', 'hover:text-gray-600');
        btncurriculum.classList.remove('text-gray-500', 'hover:text-gray-600');
        btncurriculum.classList.add('border-gray-900', 'border-b-2');
    }
    const btnGeneral = document.getElementById('btn-general');
    const btnpricing = document.getElementById('btn-pricing');
    const btnextrainformation = document.getElementById('btn-extra-information');
    const btnassessment = document.getElementById('btn-assessment');
    const btndownloadablematerials = document.getElementById('btn-downloadable-materials');
    const btncertificates = document.getElementById('btn-certificates');
    const btnT = [btncertificates, btndownloadablematerials, btnassessment, btnextrainformation, btnpricing,
        btnGeneral
    ];
    const General = document.getElementById('general-content');
    const pricing = document.getElementById('pricing-content');
    const extrainformation = document.getElementById('extra-information-content');
    const assessment = document.getElementById('assessment-content');
    const downloadablematerials = document.getElementById('downloadable-materials-content');
    const certificates = document.getElementById('certificates-content');
    const contentT = [certificates, downloadablematerials, assessment, extrainformation, pricing, General];
    pricing.style.display = 'none';
    extrainformation.style.display = 'none';
    assessment.style.display = 'none';
    downloadablematerials.style.display = 'none';
    certificates.style.display = 'none';
    for (let i = 0; i < contentT.length; i++) {
        btnT[i].addEventListener('click', function() {
            if (!btnT[i].classList.contains('bg-gray-200')) {
                this.classList.add('bg-gray-200');
                contentT[i].style.display = 'block';
                for (let j = 0; j < contentT.length; j++) {
                    if (btnT[j] !== btnT[i]) {
                        btnT[j].classList.remove('bg-gray-200');
                        contentT[j].style.display = 'none';
                    }
                }
            }
        })
    }
    document.getElementById('btn-date').onclick = function() {
        if (this.innerText == 'Cancel') {
            this.innerText = 'Schedule';
            document.getElementById('date').style.display = 'none';
        } else {
            this.innerText = 'Cancel';
            document.getElementById('date').style.display = 'block';
        }
    }
    const transation = (parent, btnShow) => {
        const element = `<div class="rounded mt-2 p-2 shadow-sm border bg-white">
                                                    <div class="flex items-center gap-x-2 truncate"><span
                                                            class="hover:text-gray-600 cursor-grab"><svg
                                                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M4 6h16M4 12h16M4 18h16"></path>
                                                            </svg></span><button type='button'  id="${btnShow}"
                                                            class="flex-1 px-2 text-left text-sm text-gray-800 truncate h-[20px] w-0 ${btnShow}" ></button><button type='button'  class='${btnShow}'><svg
                                                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M5 15l7-7 7 7"></path>
                                                            </svg></button><button type='button' ><svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg></button></div>
                                                            <input class="mt-3 text-gray-900            focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2"
                                                        id="faqs_label" type="text"
                                                        placeholder="Enter the new title" value="">
                                                </div>`
        document.getElementById(parent).innerHTML += element
        let btnText = document.getElementsByClassName(btnShow);
        let btnRemove = document.querySelectorAll('#' + btnShow + '+ button +button');
        for (var i = 0; i < btnText.length; i++) {
            let parentElem = btnText[i].parentElement.parentElement
            let inputText = parentElem.querySelector('input')
            btnText[i].addEventListener('click', function() {
                if (inputText.style.display == 'none') {
                    for (var j = 0; j < btnText.length; j++) {
                        parentElementHide = document.getElementsByClassName(btnShow)[j].parentElement
                            .parentElement
                        parentElementInputHide = document.getElementsByClassName(btnShow)[j].parentElement
                            .parentElement.querySelector('input')
                        parentElementHide.querySelector('#' + btnShow + '+ button svg').innerHTML =
                            '<path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>';
                        parentElementInputHide.style.display = 'none'
                    }
                    parentElem.querySelector('#' + btnShow + '+ button svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"></path>';
                    inputText.style.display = 'block';
                    inputText.value = parentElem.querySelector('#' + btnShow).innerText
                    inputText.focus();
                } else {
                    parentElem.querySelector('#' + btnShow + '+ button svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>';
                    inputText.style.display = 'none'
                }
            })
            inputText.addEventListener('input', function(e) {
                let el = this.parentElement.querySelector('#' + btnShow);
                el.innerHTML = e.target.value;
            }, true)
            if (inputText.style.display !== 'none') {
                for (var j = 0; j < btnText.length; j++) {
                    parentElem.querySelector('#' + btnShow + '+ button svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>';
                    inputText.style.display = 'none'
                    let lastElement = document.getElementsByClassName(btnShow)[btnText.length - 1]
                        .parentElement.parentElement;
                    lastElement.querySelector('#' + btnShow + '+ button svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"></path>';
                    lastElement.querySelector('input').style.display = 'block'
                    lastElement.querySelector('input').focus();
                }
            }
            for (var j = 0; j < btnRemove.length; j++) {
                btnRemove[j].addEventListener('click', function() {
                    this.parentElement.parentElement.remove();
                })
            }
        }
    }

    document.getElementById('btn-addMoreR').addEventListener('click', () => transation('content-requirements',
        'btn-text'))
    document.getElementById('btnAddMoreAudience').addEventListener('click', () => transation('TargetAudience',
        'btnAudience'))
    document.getElementById('btnAddMoreFeatures').addEventListener('click', () => transation('KeyFeatures',
        'btnKeyFeatures'))
    document.getElementById('AddMoretbnFAQs').addEventListener('click', function() {
        const element = `<div class="rounded mt-2 p-2 shadow-sm border bg-white">
                                                    <div class="flex items-center gap-x-2 truncate"><span
                                                            class="hover:text-gray-600 cursor-grab"><svg
                                                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M4 6h16M4 12h16M4 18h16"></path>
                                                            </svg></span>
                                                            <p id='contentStock' style='display:none;' class='contentStock'></p>
                                                            <button type='button'  id="btnTextfq"
                                                            class="flex-1 px-2 text-left text-sm text-gray-800 truncate h-[20px] w-0 btnTextfq fqsbtn" ></button><button type='button'  class='btnTextfq'><svg
                                                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M5 15l7-7 7 7"></path>
                                                            </svg></button><button type='button' ><svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg></button></div>
                                                            <div class="text-sm flex flex-col gap-y-4 p-4">
                                                            <div>
                                                            <label class="block text-sm font-medium text-gray-700" for="faqs_label"
                                                                >Label</label
                                                            ><input
                                                                class=" p-2 mt-1 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sFm border-gray-300 rounded-md"
                                                                id="faqs_label"
                                                                type="text"
                                                                value=""
                                                            />
                                                            </div>
                                                            <div>
                                                            <label class="block text-sm font-medium text-gray-700" for="faqs_content"
                                                                >Content</label
                                                            ><textarea
                                                                class="mt-1 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md pl-2"
                                                                id="faqs_content"
                                                                style="height: 78px"
                                                            ></textarea
                                                            >
                                                            </div>
                                                        </div>
                                                </div>`
        document.getElementById('FAQs').innerHTML += element
        let btnText = document.getElementsByClassName('btnTextfq');
        let btnRemove = document.querySelectorAll('#btnTextfq + button +button');
        for (var i = 0; i < btnText.length; i++) {
            let parentElem = btnText[i].parentElement.parentElement
            let inputText = parentElem.querySelector('input').parentElement.parentElement
            btnText[i].addEventListener('click', function() {
                if (inputText.style.display == 'none') {
                    for (var j = 0; j < btnText.length; j++) {
                        parentElementHide = document.getElementsByClassName('btnTextfq')[j]
                            .parentElement
                            .parentElement
                        parentElementInputHide = document.getElementsByClassName('btnTextfq')[j]
                            .parentElement
                            .parentElement.querySelector('input')
                        parentElementHide.querySelector('#btnTextfq+ button svg').innerHTML =
                            '<path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>';
                        parentElementInputHide.parentElement.parentElement.style.display = 'none'
                    }
                    parentElem.querySelector('#btnTextfq+ button svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"></path>';
                    inputText.style.display = 'block';
                    inputText.querySelector('input').value = parentElem.querySelector('#btnTextfq')
                        .innerText
                    inputText.focus();
                } else {
                    parentElem.querySelector('#btnTextfq+ button svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>';
                    inputText.style.display = 'none'
                }
            })
            inputText.querySelector('input').addEventListener('input', function(e) {
                let el = this.parentElement.parentElement.parentElement.querySelector('#btnTextfq');
                el.innerHTML = e.target.value;
            }, true)
            inputText.querySelector('textarea').addEventListener('input', function(e) {
                let el = this.parentElement.parentElement.parentElement.querySelector('#contentStock');
                el.innerHTML = e.target.value;
            }, true)
            if (inputText.style.display !== 'none') {
                for (var j = 0; j < btnText.length; j++) {
                    parentElem.querySelector('#btnTextfq+ button svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>';
                    inputText.style.display = 'none'
                    let lastElement = document.getElementsByClassName('btnTextfq')[btnText.length - 1]
                        .parentElement.parentElement;
                    lastElement.querySelector('#btnTextfq+ button svg').innerHTML =
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"></path>';
                    lastElement.querySelector('input').parentElement.parentElement.style.display = 'block'
                    lastElement.querySelector('input').focus();
                }
            }
            for (var j = 0; j < btnRemove.length; j++) {
                btnRemove[j].addEventListener('click', function() {
                    this.parentElement.parentElement.remove();
                })
            }
        }
    })

    function GereForm(btnAdd) {
        const btnAddCategorie = document.getElementById(btnAdd);
        const btnCancelCategorie = document.querySelector('#' + btnAdd + '+button');
        const formCategorie = document.querySelector('#' + btnAdd + '+button+form');
        btnAddCategorie.addEventListener('click', function() {
            btnCancelCategorie.style.display = '';
            formCategorie.style.display = '';
            this.style.display = 'none';
        })
        btnCancelCategorie.addEventListener('click', function() {
            btnAddCategorie.style.display = '';
            formCategorie.style.display = 'none';
            this.style.display = 'none';
        })
    }
    GereForm('AddNewTag');
    GereForm('AddNewCategorie');
</script>
<script>
    const Requirements = [];
    const TargetAudience = [];
    const KeyFeatures = [];
    const FAQs = [];
    const RTKF = [];
    const PushInTable = (content, table) => {
        for (let i = 0; i < content.length; i++) {
            if (content[i].innerText != '') {
                table.push(content[i].innerText);
            }

        }
    }
    document.querySelector('#submit1').addEventListener('click', function() {
        // event.preventDefault();
        const eleR = document.getElementById('content-requirements').getElementsByClassName('btn-text');
        PushInTable(eleR, Requirements);
        const eleT = document.getElementById('TargetAudience').getElementsByClassName('btnAudience');
        PushInTable(eleT, TargetAudience);
        const eleK = document.getElementById('KeyFeatures').getElementsByClassName('btnKeyFeatures')
        PushInTable(eleK, KeyFeatures);
        const FA = document.getElementById('FAQs')
        const eleF = FA.getElementsByClassName('fqsbtn');
        const eleFC = FA.getElementsByClassName('contentStock');
        for (let i = 0; i < eleF.length; i++) {
            FAQs.push({
                'label': eleF[i].innerText,
                'content': eleFC[i].innerText
            })
        }
        console.log(eleF)
        console.log(RTKF);
        RTKF.push(Requirements, TargetAudience, KeyFeatures, FAQs)
        const RTKFjson = JSON.stringify(RTKF);
        document.getElementById('tableData').value = RTKFjson;

    })
</script>
@endsection
