<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            {{ __('categories.index_title') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 mx-auto max-w-7xl">
        <div class="mb-4">
            @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded border border-green-300">
        {{ session('success') }}
        </div>
@endif
            <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                {{ __('categories.create') }}
            </a>
        </div>

        <div class="bg-white shadow-md rounded overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2">{{ __('categories.name') }}</th>
                        <th class="px-4 py-2">{{ __('categories.description') }}</th>
                        <th class="px-4 py-2">{{ __('categories.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $category->name }}</td>
                            <td class="px-4 py-2">{{ $category->description }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('categories.edit', $category) }}" class="text-blue-600 hover:underline">
                                    {{ __('categories.edit') }}
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('{{ __('categories.confirm_delete') }}')">
                                        {{ __('categories.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($categories->isEmpty())
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-center text-gray-500">{{ __('categories.empty') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>