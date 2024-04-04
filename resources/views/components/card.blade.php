{{-- 下面的代码意思是：在我们使用此组件时，即<x-car>...</x-card>时，可以给追加class类名； --}}
<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6']) }}>
    {{ $slot }}
</div>

