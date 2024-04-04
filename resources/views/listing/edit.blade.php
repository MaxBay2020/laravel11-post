<x-layout>
    <x-card class='!p-10 max-w-lg mx-auto mt-24'>
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Update {{ $post -> title }}
            </h2>
            <p class="mb-4">Post a gig to find a developer</p>
        </header>

        {{-- 如果表单中有上传文件的input，则需要在form中加上 enctype="multipart/form-data"--}}
        <form action="{{ route('listing.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="company"
                    class="inline-block text-lg mb-2"
                >Company Name</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                    {{-- 这里value的作用是：当我们点击提交按钮后，如果有的field不符合要求，还保留旧的值在input中，不会清空，如果不这么写，则field值会被清空 --}}
                    value="{{ $post -> company }}"
                />
                {{-- @error()里面是input的name属性的值；且错误信息放在了$mesage变量中； --}}
                @error('company')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                >Job Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Senior Laravel Developer"
                    value="{{ $post -> title }}"
                />
                {{-- @error()里面是input的name属性的值；且错误信息放在了$mesage变量中； --}}
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block text-lg mb-2"
                >Job Location</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    placeholder="Example: Remote, Boston MA, etc"
                    value="{{ $post -> location }}"
                />
                {{-- @error()里面是input的name属性的值；且错误信息放在了$mesage变量中； --}}
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                >Contact Email</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ $post -> email }}"
                />
                {{-- @error()里面是input的name属性的值；且错误信息放在了$mesage变量中； --}}
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="website"
                    class="inline-block text-lg mb-2"
                >
                    Website/Application URL
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="website"
                    value="{{ $post -> website }}"
                />
                {{-- @error()里面是input的name属性的值；且错误信息放在了$mesage变量中； --}}
                @error('website')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                    value="{{ $post -> tags }}"
                />
                {{-- @error()里面是input的name属性的值；且错误信息放在了$mesage变量中； --}}
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{ $post -> logo ? asset('storage/'.$post -> logo) : asset('/images/no-image.png') }}"
                    alt=""
                />
                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{ $post -> description }}</textarea>
                {{-- @error()里面是input的name属性的值；且错误信息放在了$mesage变量中； --}}
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Update Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
