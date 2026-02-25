<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Terms of Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-6">Terms of Service</h1>
                    
                    <p class="mb-4">Last updated: {{ now()->format('F j, Y') }}</p>
                    
                    <p class="mb-6">
                        These Terms of Service govern your use of the IT Support Service website and services. By accessing or using our website and services, you agree to be bound by these Terms of Service and all applicable laws and regulations.
                    </p>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Use License</h2>
                    <p class="mb-6">
                        Permission is granted to temporarily download one copy of the materials on IT Support Service's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
                    </p>
                    <ul class="list-disc pl-6 mb-6 space-y-2">
                        <li>Modify or copy the materials</li>
                        <li>Use the materials for any commercial purpose, or for any public display</li>
                        <li>Attempt to decompile or reverse engineer any software contained on IT Support Service's website</li>
                        <li>Remove any copyright or other proprietary notations from the materials</li>
                        <li>Transfer the materials to another person or "mirror" the materials on any other server</li>
                    </ul>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Disclaimer</h2>
                    <p class="mb-6">
                        The materials on IT Support Service's website are provided on an 'as is' basis. IT Support Service makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.
                    </p>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Limitations</h2>
                    <p class="mb-6">
                        In no event shall IT Support Service or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on IT Support Service's website, even if IT Support Service or a IT Support Service authorized representative has been notified orally or in writing of the possibility of such damage.
                    </p>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Accuracy of Materials</h2>
                    <p class="mb-6">
                        The materials appearing on IT Support Service's website could include technical, typographical, or photographic errors. IT Support Service does not warrant that any of the materials on its website are accurate, complete or current. IT Support Service may make changes to the materials contained on its website at any time without notice.
                    </p>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Links</h2>
                    <p class="mb-6">
                        IT Support Service has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by IT Support Service of the site. Use of any such linked website is at the user's own risk.
                    </p>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Modifications</h2>
                    <p class="mb-6">
                        IT Support Service may revise these terms of service at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.
                    </p>
                    
                    <h2 class="text-2xl font-semibold mt-8 mb-4">Governing Law</h2>
                    <p class="mb-6">
                        These terms and conditions are governed by and construed in accordance with the laws of [State/Country] and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>