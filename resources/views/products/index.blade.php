<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
            {{ __('products.index_title') }}
        </h2>
        
    </x-slot>

    <div class="py-6 px-4 mx-auto max-w-7xl">
        <div class="mb-4">
            @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded border border-green-300">
        {{ session('success') }}
        </div>
@endif
            <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                {{ __('products.create') }}
            </a>
        </div>

        <div class="bg-white shadow-md rounded overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2">{{ __('products.name') }}</th>
                        <th class="px-4 py-2">{{ __('products.price') }}</th>
                        <th class="px-4 py-2">{{ __('products.category') }}</th>
                        <th class="px-4 py-2">{{ __('products.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $product->name }}</td>
                            <td class="px-4 py-2">${{ number_format($product->price, 2) }}</td>
                            <td class="px-4 py-2">{{ $product->category->name }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('products.edit', $product) }}" class="text-blue-600 hover:underline">
                                    {{ __('products.edit') }}
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('{{ __('products.confirm_delete') }}')">
                                        {{ __('products.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($products->isEmpty())
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">{{ __('products.empty') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
