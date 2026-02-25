<x-admin-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <a href="{{ route('admin.services.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mr-1">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Services
            </a>
        </div>

        <form action="{{ route('admin.services.update', $service) }}" method="POST" class="bg-white shadow rounded-lg p-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Service Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Service Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $service->slug) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                    <input type="text" name="price" id="price" value="{{ old('price', $service->price) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon SVG -->
                <div>
                    <label for="icon_svg" class="block text-sm font-medium text-gray-700 mb-2">Icon SVG Code</label>
                    <textarea name="icon_svg" id="icon_svg" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 font-mono text-sm">{{ old('icon_svg', $service->icon_svg) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Paste SVG code for custom icon.</p>
                </div>

                <!-- Display Order -->
                <div>
                    <label for="display_order" class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                    <input type="number" name="display_order" id="display_order" value="{{ old('display_order', $service->display_order ?? 0) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Is Active -->
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">Active (show on website)</label>
                </div>
            </div>

            <div class="mt-8 flex gap-3">
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-300">
                    Update Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="px-6 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition duration-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
