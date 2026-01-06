<section>
    <div class="flex justify-between items-center mb-8">
            <div class="flex w-1/2">
                <!-- Logo -->
                @php $logo = public_path('assets/logo.png'); @endphp
                @inlinedImage($logo)
            </div>
            <div class="w-1/3">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $text_1 }}</h1>
                <h2 class="text-xl font-semibold text-gray-700 mb-6">{{ $text_2 }}</h2>
            </div>
        </div>
</section>