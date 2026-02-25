<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Privacy Policy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-6">Privacy Policy</h1>
                    
                    <p class="mb-4">Last updated: {{ now()->format('F j, Y') }}</p>
                    
                    <p class="mb-6">
                        At IT Support Service, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our services.
                    </p>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Information We Collect</h2>
                    <p class="mb-6">
                        We may collect information about you in various ways when you visit our website, use our services, or communicate with us. This may include:
                    </p>
                    <ul class="list-disc pl-6 mb-6 space-y-2">
                        <li>Personal identification information such as name, email address, phone number, and company information</li>
                        <li>Technical information such as IP address, browser type, and device information</li>
                        <li>Information about your use of our services and website interactions</li>
                        <li>Any other information you voluntarily provide to us</li>
                    </ul>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">How We Use Your Information</h2>
                    <p class="mb-6">
                        We use the information we collect for various purposes, including:
                    </p>
                    <ul class="list-disc pl-6 mb-6 space-y-2">
                        <li>To provide, operate, and maintain our services</li>
                        <li>To improve, personalize, and expand our services</li>
                        <li>To communicate with you, including customer service and support</li>
                        <li>To send you updates and promotional materials</li>
                        <li>To monitor and analyze usage and trends</li>
                    </ul>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Information Sharing and Disclosure</h2>
                    <p class="mb-6">
                        We may share information we have collected about you in certain circumstances, including:
                    </p>
                    <ul class="list-disc pl-6 mb-6 space-y-2">
                        <li>With your consent</li>
                        <li>With service providers who assist us in operating our business</li>
                        <li>To comply with legal obligations</li>
                        <li>To protect and defend our rights and property</li>
                    </ul>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Data Security</h2>
                    <p class="mb-6">
                        We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure.
                    </p>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Your Rights</h2>
                    <p class="mb-6">
                        Depending on your location, you may have certain rights regarding your personal information, including:
                    </p>
                    <ul class="list-disc pl-6 mb-6 space-y-2">
                        <li>The right to access your personal information</li>
                        <li>The right to rectify inaccurate personal information</li>
                        <li>The right to request deletion of your personal information</li>
                        <li>The right to restrict processing of your personal information</li>
                        <li>The right to data portability</li>
                    </ul>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Changes to This Privacy Policy</h2>
                    <p class="mb-6">
                        We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date.
                    </p>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Contact Us</h2>
                    <p class="mb-6">
                        If you have any questions about this Privacy Policy, please contact us at:
                    </p>
                    <p class="mb-6">
                        Email: privacy@itsupportservice.com<br>
                        Phone: +1 (555) 123-4567
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>