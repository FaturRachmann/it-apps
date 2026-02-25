@props([
    'tabs' => [],
    'activeTab' => 0
])

<div class="mb-8 border-b border-gray-200">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="service-tabs" data-tabs-toggle="#service-tab-content" role="tablist">
        @foreach($tabs as $index => $tab)
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg {{ $index == $activeTab ? '' : 'hover:text-gray-600 hover:border-gray-300' }}" 
                    id="{{ $tab['id'] }}-tab" 
                    data-tabs-target="#{{ $tab['id'] }}" 
                    type="button" 
                    role="tab" 
                    aria-controls="{{ $tab['id'] }}" 
                    aria-selected="{{ $index == $activeTab ? 'true' : 'false' }}">
                {{ $tab['title'] }}
            </button>
        </li>
        @endforeach
    </ul>
</div>

<div id="service-tab-content">
    @foreach($tabs as $index => $tab)
    <div class="hidden p-6 rounded-lg bg-gray-50" id="{{ $tab['id'] }}" role="tabpanel" aria-labelledby="{{ $tab['id'] }}-tab">
        {{ $tab['content'] }}
    </div>
    @endforeach
</div>