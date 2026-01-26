<section>
    {{-- div de la seccion principal --}}
    <div class="header-container">
            
        {{-- div con el logo --}}
        <div class="header-content">
                <!-- Logo (usando base64 para compatibilidad con DomPDF) -->
                <div class="logo-container">
                    @php 
                        $logoPath = public_path('assets/logo.png');
                        //Esto era de Dani
                        // $logoMime = mime_content_type($logoPath);
                        
                        //Esto es de Zaid
                        if (file_exists($logoPath) && is_readable($logoPath)) {
                            try {
                                $logoData = base64_encode(file_get_contents($logoPath));
                                $logoMime = 'image/png';
                                $showLogo = true;
                            } catch (\Exception $e) {
                                $showLogo = false;
                            }
                        } else {
                            $showLogo = false;
                        }
                    @endphp
                    @if(isset($showLogo) && $showLogo)
                        <img src="data:{{ $logoMime }};base64,{{ $logoData }}" alt="Logo" style="max-width: 200px; height: auto;">
                    @else
                        <div style="height: 80px; margin-bottom: 10px;"></div>
                    @endif
                </div>
                <div class="text-container">
                    <h1 class="title-main">{{ $text_1 }}</h1>
                    <h2 class="title-sub">{{ $text_2 }}</h2>
                    <h2 class="title-period">{{ $text_3 }}</h2>
                </div>    
            </div>
        </div>
</section>