<section>
    {{-- div de la seccion principal --}}
    <div class="header-container">
            
        {{-- div con el logo --}}
        <div class="header-content">
                <!-- Logo (usando base64 para compatibilidad con DomPDF) -->
                <div class="logo-container">
                    @php 
                        $logoPath = public_path('assets/logo.png');
                        $logoData = base64_encode(file_get_contents($logoPath));
                        $logoMime = mime_content_type($logoPath);
                    @endphp
                    <img src="data:{{ $logoMime }};base64,{{ $logoData }}" alt="Logo" style="max-width: 200px; height: auto;">
                </div>
                <div class="text-container">
                    <h1 class="title-main">{{ $text_1 }}</h1>
                    <h2 class="title-sub">{{ $text_2 }}</h2>
                    <h2 class="title-period">{{ $text_3 }}</h2>
                </div>    
            </div>
        </div>
</section>