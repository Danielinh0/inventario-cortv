<section>
    {{-- div de la seccion principal --}}
    <div class="flex items-center mb-8 text-center">
            
        {{-- div con el logo --}}
        <div class="flex w-full gap-3 justify-between items-center">
                <!-- Logo -->
                <div class="w-1/3">
                    @php $logo = public_path('assets/logo.png'); @endphp
                    @inlinedImage($logo) 
                </div>
                <div class="w-2/3">
                    <h1 class="text-base font-bold text-gray-900 mb-2">{{ $text_1 }}</h1>
                    <h2 class="text-sm font-semibold text-gray-700 mb-1">{{ $text_2 }}</h2>
                    <h2 class="text-xs font-light text-black">{{ $text_3 }}</h2>
                </div>    
            </div>


        </div>
</section>