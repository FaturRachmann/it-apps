@props([
    'faqs' => [],
])

<div id="accordion-faq" data-accordion="collapse">
    @foreach($faqs as $index => $faq)
    <h2 id="accordion-faq-heading-{{ $index }}">
        <button type="button"
                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-900 border border-gray-200 {{ $index === 0 ? 'rounded-t-xl' : '' }} {{ $index === count($faqs) - 1 ? 'rounded-b-xl' : 'border-b-0' }} hover:bg-gray-50 gap-3 transition-colors"
                data-accordion-target="#accordion-faq-body-{{ $index }}"
                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                aria-controls="accordion-faq-body-{{ $index }}">
            <span>{{ $faq->question }}</span>
            <svg data-accordion-icon class="w-3 h-3 {{ $index === 0 ? '' : 'rotate-180' }} shrink-0 transition-transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
        </button>
    </h2>
    <div id="accordion-faq-body-{{ $index }}"
         class="{{ $index === 0 ? '' : 'hidden' }}"
         aria-labelledby="accordion-faq-heading-{{ $index }}">
        <div class="p-5 border border-gray-200 {{ $index === count($faqs) - 1 ? 'rounded-b-xl' : 'border-b-0 border-t-0' }}">
            <p class="text-gray-600 leading-relaxed">{{ $faq->answer }}</p>
        </div>
    </div>
    @endforeach
</div>