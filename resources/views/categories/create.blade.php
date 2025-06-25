<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            {{ __('categories.create') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto max-w-3xl">
        <div class="bg-white shadow-md rounded p-6">
            <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium text-gray-700">{{ __('categories.name') }}</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-input w-full" required>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">{{ __('categories.description') }}</label>
                    <textarea name="description" class="form-textarea w-full">{{ old('description') }}</textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        {{ __('categories.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
