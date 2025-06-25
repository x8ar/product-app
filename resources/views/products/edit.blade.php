<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            {{ __('products.edit') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto max-w-3xl">
        <div class="bg-white shadow-md rounded p-6">
            <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-medium text-gray-700">{{ __('products.name') }}</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-input w-full" required>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">{{ __('products.price') }}</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="form-input w-full" required>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">{{ __('products.description') }}</label>
                    <textarea name="description" class="form-textarea w-full" rows="3">{{ old('description', $product->description) }}</textarea>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">{{ __('products.category') }}</label>
                    <select name="category_id" class="form-select w-full" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        {{ __('products.update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
