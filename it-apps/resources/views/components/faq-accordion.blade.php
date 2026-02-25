<div class="max-w-4xl mx-auto">
    <div id="accordion-open" data-accordion="open">
        @foreach($faqs as $index => $faq)
        <h2 id="accordion-open-heading-{{ $index }}">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-{{ $index }}" aria-expanded="true" aria-controls="accordion-open-body-{{ $index }}">
                <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>{{ $faq['question'] }}</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-open-body-{{ $index }}" class="hidden" aria-labelledby="accordion-open-heading-{{ $index }}">
            <div class="p-5 font-light border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <p class="mb-2 text-gray-500 dark:text-gray-400">{!! $faq['answer'] !!}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Initialize Flowbite accordion
    document.addEventListener('DOMContentLoaded', function() {
        const accordions = document.querySelectorAll('[data-accordion]');
        
        accordions.forEach(accordion => {
            const buttons = accordion.querySelectorAll('[data-accordion-target]');
            
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const target = document.querySelector(this.getAttribute('data-accordion-target'));
                    const isExpanded = this.getAttribute('aria-expanded') === 'true';
                    
                    // Toggle expanded state
                    this.setAttribute('aria-expanded', !isExpanded);
                    
                    // Toggle target visibility
                    if (isExpanded) {
                        target.classList.add('hidden');
                        this.querySelector('[data-accordion-icon]').classList.remove('rotate-180');
                    } else {
                        target.classList.remove('hidden');
                        this.querySelector('[data-accordion-icon]').classList.add('rotate-180');
                    }
                });
            });
        });
    });
</script>