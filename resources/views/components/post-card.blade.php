{{-- 将posts传入此组件 --}}
@props(['post'])

<x-card class='!p-10'>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{ $post -> logo ? asset('storage/'.$post -> logo) : asset('/images/no-image.png') }}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="{{ route('listing.show', $post) }}">{{ $post -> title  }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $post -> company  }}</div>
            <x-tags
                :tags="$post -> tags"
            />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $post -> location  }}
            </div>
        </div>
    </div>
</x-card>
