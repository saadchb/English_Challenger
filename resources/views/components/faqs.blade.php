@props(['table'])
@if ($table)
    @foreach ($table as $item)
    <div class="rounded mt-2 p-2 shadow-sm border bg-white">
        <div class="flex items-center gap-x-2 truncate"><span
                class="hover:text-gray-600 cursor-grab"><svg
                    xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg></span>
                <p id='contentStock' style='display:none;' class='contentStock'>{{$item['content']}}</p>
                <button type='button'  id="btnTextfq"
                class="flex-1 px-2 text-left text-sm text-gray-800 truncate h-[20px] w-0 btnTextfq fqsbtn" >{{$item['label']}}</button><button type='button'  class='btnTextfq'><svg
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
                    value="{{$item['label']}}"
                />
                </div>
                <div>
                <label class="block text-sm font-medium text-gray-700" for="faqs_content"
                    >Content</label
                ><textarea
                    class="mt-1 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md pl-2"
                    id="faqs_content"
                    style="height: 78px"
                >{{$item['content']}}</textarea
                >
                </div>
            </div>
    </div>
    @endforeach
@endif
