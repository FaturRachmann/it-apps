@props([
    'id' => 'drawer',
    'title' => 'Drawer',
    'placement' => 'left', // left, right, top, bottom
    'size' => 'medium' // small, medium, large, full
])

@php
    $placementClasses = [
        'left' => '-translate-x-full top-0 left-0 h-screen',
        'right' => 'translate-x-full top-0 right-0 h-screen',
        'top' => '-translate-y-full top-0 left-0 w-screen',
        'bottom' => 'translate-y-full bottom-0 left-0 w-screen'
    ];
    
    $sizeClasses = [
        'small' => $placement === 'left' || $placement === 'right' ? 'w-64' : 'h-64',
        'medium' => $placement === 'left' || $placement === 'right' ? 'w-80' : 'h-80',
        'large' => $placement === 'left' || $placement === 'right' ? 'w-96' : 'h-96',
        'full' => $placement === 'left' || $placement === 'right' ? 'w-screen' : 'h-screen'
    ];
    
    $placementClass = $placementClasses[$placement] ?? $placementClasses['left'];
    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['medium'];
@endphp

<div id="{{ $id }}" class="fixed z-40 transition-transform {{ $placementClass }} {{ $sizeClass }} bg-white shadow-xl" tabindex="-1">
    <div class="flex items-center justify-between p-4 border-b">
        <h5 class="text-lg font-semibold text-gray-900">{{ $title }}</h5>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-drawer-hide="{{ $id }}">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>
    <div class="p-4">
        {{ $slot }}
    </div>
</div>