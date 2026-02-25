<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Frequently Asked Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-4 text-center">Frequently Asked Questions</h1>
                    <p class="text-center mb-12 max-w-2xl mx-auto text-gray-600 dark:text-gray-300">
                        Find answers to common questions about our IT support services.
                    </p>

                    <?php
                    $faqs = [
                        [
                            'question' => 'What services do you offer?',
                            'answer' => 'We offer a comprehensive range of IT services including network security, cloud solutions, technical support, system maintenance, data backup and recovery, and IT consulting. Our team is equipped to handle all your IT infrastructure needs.'
                        ],
                        [
                            'question' => 'How quickly can you respond to support requests?',
                            'answer' => 'We offer 24/7 support with different response times based on the severity of the issue. Critical issues receive immediate attention, while standard requests are typically addressed within 2 hours during business hours.'
                        ],
                        [
                            'question' => 'Do you provide services for small businesses?',
                            'answer' => 'Absolutely! We cater to businesses of all sizes, from startups to large enterprises. We offer scalable solutions that grow with your business and can be customized to fit your specific needs and budget.'
                        ],
                        [
                            'question' => 'How do you ensure data security?',
                            'answer' => 'We implement multiple layers of security including firewalls, encryption, access controls, and regular security audits. Our team follows industry best practices and stays updated on the latest security trends to protect your data.'
                        ],
                        [
                            'question' => 'Can you help with cloud migration?',
                            'answer' => 'Yes, we specialize in cloud migration services. Our experts will assess your current infrastructure, plan the migration, execute the transition, and provide ongoing support to ensure a smooth and secure move to the cloud.'
                        ],
                        [
                            'question' => 'What is included in your maintenance plans?',
                            'answer' => 'Our maintenance plans include regular system updates, security patches, performance monitoring, backup verification, and preventive maintenance. We also provide priority support and discounted rates for additional services.'
                        ]
                    ];
                    ?>

                    <x-faq-accordion :faqs="$faqs" />
                    
                    <div class="mt-12 text-center">
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Still have questions? Our support team is here to help.
                        </p>
                        <a href="{{ route('contact') }}" class="px-6 py-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>