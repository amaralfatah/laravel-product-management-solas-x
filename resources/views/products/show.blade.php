<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Produk') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row">
                        <!-- Gambar Produk -->
                        <div class="md:w-1/3 mb-6 md:mb-0 md:pr-6">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full rounded-md shadow-sm">
                            @else
                                <div class="w-full h-64 bg-gray-100 flex items-center justify-center rounded-md">
                                    <svg class="h-16 w-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Detail Produk -->
                        <div class="md:w-2/3">
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>

                            <div class="flex items-center mb-4">
                                <span class="text-xl font-semibold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $product->stock > 0 ? 'Tersedia' : 'Stok Habis' }}
                                </span>
                            </div>

                            @if ($product->stock > 0)
                                <p class="text-sm text-gray-600 mb-4">Stok: {{ $product->stock }}</p>
                            @endif

                            <div class="border-t border-gray-200 pt-4 mb-4">
                                <h2 class="text-lg font-medium text-gray-900 mb-2">Deskripsi</h2>
                                <div class="prose prose-sm text-gray-600">
                                    {{ $product->description }}
                                </div>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex flex-col sm:flex-row sm:items-center">
                                    <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150 mb-2 sm:mb-0 sm:mr-2 w-full sm:w-auto">
                                        Lihat Semua Produk
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
