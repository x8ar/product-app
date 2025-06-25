<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            {{ __('products.create') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto max-w-3xl">
        <div class="bg-white shadow-md rounded p-6">
            <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium text-gray-700">{{ __('products.name') }}</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-input w-full" required>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">{{ __('products.price') }}</label>
                    <input type="number" name="price" step="0.01" value="{{ old('price') }}" class="form-input w-full" required>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">{{ __('products.description') }}</label>
                    <textarea name="description" class="form-textarea w-full" rows="3">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">{{ __('products.category') }}</label>
                    <select name="category_id" class="form-select w-full" required>
                        <option value="">{{ __('products.select_category') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        {{ __('products.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
