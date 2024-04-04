{{-- 接收传入的tags值，tags的值长成这样：'php, react, node' --}}
@props(['tags'])

@php
    $tags = explode(', ', $tags)
@endphp

<ul class="flex">
    @foreach($tags as $tag)
        <li
            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
        >
            {{-- 使用以下方式来加query参数 --}}
            <a href="{{ route('listing.index', ['tag'=>$tag]) }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>

