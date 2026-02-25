<form action="{{ route('contact.submit') }}" method="POST" class="space-y-6" id="contactForm">
    @csrf

    <!-- Name Field with Icon -->
    <div>
        <label for="name" class="block mb-2.5 text-sm font-heading font-bold text-gray-900 dark:text-white">
            Full Name <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <input type="text" id="name" name="name"
                   class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:focus:ring-blue-400 block w-full pl-12 pr-4 py-3 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                   placeholder="John Doe"
                   required>
        </div>
        @error('name')
        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            {{ $message }}
        </p>
        @enderror
    </div>

    <!-- Email Field with Icon -->
    <div>
        <label for="email" class="block mb-2.5 text-sm font-heading font-bold text-gray-900 dark:text-white">
            Email Address <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <input type="email" id="email" name="email"
                   class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:focus:ring-blue-400 block w-full pl-12 pr-4 py-3 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                   placeholder="john@example.com"
                   required>
        </div>
        @error('email')
        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            {{ $message }}
        </p>
        @enderror
    </div>

    <!-- Service Selection with Icon -->
    <div>
        <label for="service" class="block mb-2.5 text-sm font-heading font-bold text-gray-900 dark:text-white">
            Service Needed
        </label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <select id="service" name="service"
                    class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:focus:ring-blue-400 block w-full pl-12 pr-4 py-3 appearance-none transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500">
                <option selected value="">Select a service...</option>
                <option value="pc-repair">PC Repair</option>
                <option value="laptop-repair">Laptop Repair</option>
                <option value="network-setup">Network Setup</option>
                <option value="consultation">Consultation</option>
                <option value="other">Other</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Phone Field (Optional) with Icon -->
    <div>
        <label for="phone" class="block mb-2.5 text-sm font-heading font-bold text-gray-900 dark:text-white">
            Phone Number (Optional)
        </label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 7.487a1 1 0 00.502.756l2.048 1.029a11.042 11.042 0 005.516 5.516l1.029 2.048a1 1 0 00.756.502l7.487 1.498a1 1 0 00.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
            </div>
            <input type="tel" id="phone" name="phone"
                   class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:focus:ring-blue-400 block w-full pl-12 pr-4 py-3 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500"
                   placeholder="+1 (555) 000-0000">
        </div>
    </div>

    <!-- Message Field with Icon -->
    <div>
        <label for="message" class="block mb-2.5 text-sm font-heading font-bold text-gray-900 dark:text-white">
            Message <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <div class="absolute top-3.5 left-0 pl-4 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
            </div>
            <textarea id="message" name="message" rows="5"
                      class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:focus:ring-blue-400 block w-full pl-12 pr-4 py-3 transition-all duration-200 hover:border-gray-400 dark:hover:border-gray-500 resize-none"
                      placeholder="Tell us about your needs and how we can help..."
                      required></textarea>
        </div>
        @error('message')
        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            {{ $message }}
        </p>
        @enderror
    </div>

    <!-- Checkbox for Terms -->
    <div class="flex items-start">
        <div class="flex items-center h-5">
            <input id="agree" name="agree" type="checkbox" 
                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50 dark:bg-gray-700 dark:border-gray-600 accent-blue-600 focus:ring-2 focus:ring-blue-500"
                   required>
        </div>
        <label for="agree" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            I agree to the <a href="{{ route('privacy-policy') }}" class="text-blue-600 dark:text-blue-400 hover:underline">privacy policy</a>
        </label>
    </div>

    <!-- Submit Button with Enhanced Styling -->
    <button type="submit"
            class="w-full text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 dark:from-blue-700 dark:to-blue-800 dark:hover:from-blue-600 dark:hover:to-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-heading font-bold rounded-lg text-base px-6 py-3.5 text-center transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:scale-105 flex items-center justify-center group">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
        </svg>
        <span class="submit-text">Send Message</span>
    </button>
</form>

@push('scripts')
<script>
    // Form submission handling with loading state
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        const btn = this.querySelector('button[type="submit"]');
        const btnText = btn.querySelector('.submit-text');
        const icon = btn.querySelector('svg');

        btnText.textContent = 'Sending...';
        btn.disabled = true;
        btn.classList.add('opacity-75', 'cursor-not-allowed', 'scale-100');
        icon.classList.add('animate-spin');
    });

    // Optional: Reset form after successful submission
    if (document.readyState === 'complete') {
        document.getElementById('contactForm').reset();
    }
</script>
@endpush