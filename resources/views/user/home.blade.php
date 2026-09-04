@extends('layouts.user')

@section('title', 'Beranda')

@section('styles')
    /* Float Animation for Hero Image */
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(-1deg); }
    }
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
@endsection

@section('content')

    <!-- HERO BANNER SECTION -->
    <section class="bg-gradient-to-r from-blue-50/50 via-indigo-50/20 to-white py-12 md:py-16 px-4 md:px-12 border-b border-slate-50 relative overflow-hidden">
        <!-- Decorative blur background circle -->
        <div class="absolute top-1/2 left-1/4 w-80 h-80 rounded-full bg-blue-100/20 blur-3xl pointer-events-none -translate-y-1/2"></div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <!-- Left Content: Headings & Search -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <div class="space-y-3">
                    <h2 class="heading-font text-3xl md:text-4.5xl font-extrabold text-bps-navy tracking-tight leading-tight">
                        Akses Publikasi Statistik BPS <br class="hidden md:inline">
                        <span class="text-bps-lightBlue">Lebih Cepat dengan Ringkasan Cerdas</span>
                    </h2>
                    <p class="text-sm md:text-base text-slate-500 font-medium max-w-2xl leading-relaxed">
                        Temukan informasi penting dari ribuan publikasi statistik BPS dalam ringkasan otomatis yang mudah dipahami.
                    </p>
                </div>

                <!-- Big Search Box -->
                <form action="{{ route('home') }}" method="GET" class="flex items-center bg-white border border-slate-200/80 rounded-2xl p-2 max-w-xl shadow-md shadow-slate-100/40 focus-within:border-bps-lightBlue focus-within:ring-4 focus-within:ring-blue-100/30 transition-all duration-300">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="relative flex-1 flex items-center pl-3">
                        <i data-lucide="search" class="w-5 h-5 text-slate-400 shrink-0"></i>
                        <input 
                            type="text" 
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari publikasi atau kata kunci (contoh: kemiskinan, IPM, inflasi...)"
                            class="w-full bg-transparent pl-3 pr-4 py-3 text-sm text-slate-800 placeholder-slate-400 focus:outline-none"
                        >
                    </div>
                    <button type="submit" class="px-7 py-3 bg-bps-lightBlue hover:bg-blue-700 text-white rounded-xl font-bold text-sm shadow-md shadow-blue-500/10 hover:shadow-lg transition-all cursor-pointer shrink-0">
                        Cari
                    </button>
                </form>

                <!-- Popular Tags -->
                <div class="flex flex-wrap items-center gap-2 pt-2 text-xs font-semibold text-slate-400">
                    <span>Populer sekarang:</span>
                    <a href="{{ route('home', ['search' => 'Kemiskinan']) }}" class="px-3 py-1 bg-blue-50/50 hover:bg-blue-50 text-bps-lightBlue rounded-full transition-colors cursor-pointer">Kemiskinan</a>
                    <a href="{{ route('home', ['search' => 'IPM']) }}" class="px-3 py-1 bg-blue-50/50 hover:bg-blue-50 text-bps-lightBlue rounded-full transition-colors cursor-pointer">IPM</a>
                    <a href="{{ route('home', ['search' => 'Inflasi']) }}" class="px-3 py-1 bg-blue-50/50 hover:bg-blue-50 text-bps-lightBlue rounded-full transition-colors cursor-pointer">Inflasi</a>
                    <a href="{{ route('home', ['search' => 'Tingkat Pengangguran']) }}" class="px-3 py-1 bg-blue-50/50 hover:bg-blue-50 text-bps-lightBlue rounded-full transition-colors cursor-pointer">Tingkat Pengangguran</a>
                    <a href="{{ route('home', ['search' => 'Penduduk']) }}" class="px-3 py-1 bg-blue-50/50 hover:bg-blue-50 text-bps-lightBlue rounded-full transition-colors cursor-pointer">Penduduk</a>
                </div>
            </div>

            <!-- Right Content: Premium CSS Graphic Mockup -->
            <div class="lg:col-span-5 hidden lg:flex items-center justify-center relative">
                <!-- Decorative Backboard Chart Card -->
                <div class="absolute -right-4 -top-8 w-60 h-44 bg-white/95 rounded-2xl shadow-xl shadow-slate-100/50 border border-slate-100/80 p-4 space-y-3 z-10 transition-all hover:scale-105 duration-300">
                    <div class="flex items-center justify-between border-b border-slate-50 pb-2">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">STATISTIK PERKEMBANGAN</span>
                        <i data-lucide="trending-up" class="w-4 h-4 text-emerald-500"></i>
                    </div>
                    <div class="h-24 flex items-end gap-2.5 justify-center pt-2">
                        <div class="w-6 bg-slate-100 rounded-t-lg h-[40%]"></div>
                        <div class="w-6 bg-slate-100 rounded-t-lg h-[65%]"></div>
                        <div class="w-6 bg-bps-lightBlue rounded-t-lg h-[85%] transition-all hover:bg-blue-700"></div>
                        <div class="w-6 bg-slate-100 rounded-t-lg h-[50%]"></div>
                    </div>
                </div>

                <!-- Floating Main Book Mockup -->
                <div class="relative w-52 h-72 bg-gradient-to-br from-bps-navy to-slate-900 text-white rounded-2xl shadow-2xl p-6 flex flex-col justify-between border-r-4 border-bps-blue/30 transform -rotate-6 animate-float z-20 hover:scale-105 transition-transform duration-300">
                    <!-- Subtle book spine line -->
                    <div class="absolute left-0 top-0 bottom-0 w-2.5 bg-white/5 border-r border-white/10 rounded-l-2xl"></div>

                    <!-- Top BPS Badge -->
                    <div class="flex items-center gap-1.5 pl-2">
                        <div class="w-1.5 h-1.5 bg-bps-orange rounded-full"></div>
                        <span class="text-[8px] font-black tracking-widest text-slate-300 uppercase">PUBLIKASI RESMI</span>
                    </div>

                    <!-- Middle Title -->
                    <div class="pl-2 space-y-2">
                        <h4 class="heading-font text-base font-black tracking-wide leading-tight">STATISTIK INDONESIA</h4>
                        <span class="text-[10px] font-extrabold text-bps-orange tracking-widest uppercase">TAHUN 2024</span>
                    </div>

                    <!-- Bottom Graphic -->
                    <div class="pl-2 pt-4 border-t border-white/10 flex items-center justify-between text-slate-400">
                        <span class="text-[8px] font-bold">BPS INDONESIA</span>
                        <i data-lucide="globe" class="w-4 h-4 text-bps-orange"></i>
                    </div>
                </div>

                <!-- Floating Secondary Book Cover -->
                <div class="absolute left-0 -bottom-6 w-40 h-56 bg-gradient-to-tr from-sky-600 to-bps-lightBlue text-white rounded-2xl shadow-xl p-5 flex flex-col justify-between border-r-4 border-blue-400/20 transform rotate-12 z-10 transition-all hover:scale-105 duration-300">
                    <!-- Spine -->
                    <div class="absolute left-0 top-0 bottom-0 w-2 bg-white/5 border-r border-white/10 rounded-l-2xl"></div>

                    <span class="text-[7px] font-black tracking-widest text-blue-100 uppercase pl-1">PROFIL DATA</span>
                    <div class="pl-1">
                        <h4 class="heading-font text-xs font-black tracking-wide leading-tight">PROFIL KEMISKINAN</h4>
                        <span class="text-[8px] font-extrabold text-blue-200 block mt-1">JAWA BARAT</span>
                    </div>
                    <div class="pl-1 flex items-center justify-between text-blue-100 border-t border-white/5 pt-2">
                        <span class="text-[7px] font-bold">EDISI 2024</span>
                        <i data-lucide="bar-chart-2" class="w-3.5 h-3.5 text-blue-200"></i>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CONTENT WRAPPER -->
    <main class="flex-1 p-6 md:p-12 max-w-7xl mx-auto w-full space-y-16">
        
        <!-- SECTION 1: KATEGORI PUBLIKASI -->
        <section id="kategori-publikasi" class="space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h3 class="heading-font text-xl md:text-2xl font-black text-bps-navy tracking-tight">Kategori Publikasi</h3>
                    <p class="text-xs md:text-sm text-slate-400 font-medium mt-1">Saring publikasi berdasarkan kategori data sektoral BPS</p>
                </div>
                <a href="#publikasi-terbaru" class="text-bps-lightBlue hover:text-blue-700 font-bold text-xs md:text-sm flex items-center gap-1 transition-colors">
                    <span>Lihat semua kategori</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>

            <!-- Category Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 md:gap-5">
                @php
                    // Predefine grid templates matching mockups with specific colors and icons
                    $predefinedCategories = [
                        [
                            'name' => 'Kependudukan',
                            'match' => ['penduduk', 'kependudukan', 'umum'],
                            'color' => 'bg-blue-50 text-blue-600 border-blue-100/50',
                            'icon' => 'users'
                        ],
                        [
                            'name' => 'Kemiskinan',
                            'match' => ['miskin', 'kemiskinan', 'sosial'],
                            'color' => 'bg-amber-50 text-amber-600 border-amber-100/50',
                            'icon' => 'file-text'
                        ],
                        [
                            'name' => 'Ketenagakerjaan',
                            'match' => ['kerja', 'tenaga', 'ekonomi'],
                            'color' => 'bg-emerald-50 text-emerald-600 border-emerald-100/50',
                            'icon' => 'briefcase'
                        ],
                        [
                            'name' => 'IPM',
                            'match' => ['ipm', 'pembangunan', 'manusia', 'pertanian'],
                            'color' => 'bg-purple-50 text-purple-600 border-purple-100/50',
                            'icon' => 'trending-up'
                        ],
                        [
                            'name' => 'Harga & Inflasi',
                            'match' => ['harga', 'inflasi', 'distribusi', 'industri'],
                            'color' => 'bg-rose-50 text-rose-600 border-rose-100/50',
                            'icon' => 'shopping-cart'
                        ],
                        [
                            'name' => 'Lainnya',
                            'match' => [],
                            'color' => 'bg-slate-50 text-slate-600 border-slate-200/50',
                            'icon' => 'grid'
                        ]
                    ];
                @endphp

                @foreach($predefinedCategories as $pCat)
                    @php
                        // Match categories from database to this predefined block
                        $count = 0;
                        $matchedCategoryName = null;
                        foreach($categories as $dbCat) {
                            $matches = false;
                            if (empty($pCat['match'])) {
                                // Default category check
                                $matches = true;
                                foreach($predefinedCategories as $otherCat) {
                                    if (!empty($otherCat['match'])) {
                                        foreach($otherCat['match'] as $m) {
                                            if (str_contains(strtolower($dbCat), $m)) {
                                                $matches = false;
                                            }
                                        }
                                    }
                                }
                            } else {
                                foreach($pCat['match'] as $m) {
                                    if (str_contains(strtolower($dbCat), $m)) {
                                        $matches = true;
                                    }
                                }
                            }
                            if ($matches) {
                                $count += $categoryCounts[$dbCat] ?? 0;
                                $matchedCategoryName = $dbCat;
                            }
                        }
                        
                        // Fallback click link: if matched category exists, link to it, else to search query
                        $clickUrl = $matchedCategoryName ? route('home', ['category' => $matchedCategoryName]) : route('home', ['search' => $pCat['name']]);
                    @endphp

                    <a href="{{ $clickUrl }}" class="bg-white rounded-2xl border border-slate-100 p-5 flex items-center gap-4 hover:shadow-md hover:border-slate-200/70 transition-all duration-300 cursor-pointer">
                        <div class="w-12 h-12 rounded-xl {{ $pCat['color'] }} flex items-center justify-center shrink-0 border">
                            <i data-lucide="{{ $pCat['icon'] }}" class="w-5.5 h-5.5"></i>
                        </div>
                        <div class="min-w-0">
                            <h4 class="font-bold text-xs md:text-sm text-slate-800 truncate leading-snug">{{ $pCat['name'] }}</h4>
                            <span class="text-[10px] md:text-xs text-slate-400 font-medium block mt-0.5">{{ $count }} Publikasi</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- SECTION 2: PUBLIKASI TERBARU -->
        <section id="publikasi-terbaru" class="space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h3 class="heading-font text-xl md:text-2xl font-black text-bps-navy tracking-tight">Publikasi Terbaru</h3>
                    <p class="text-xs md:text-sm text-slate-400 font-medium mt-1">Daftar publikasi statistik yang baru diunggah beserta ringkasan AI</p>
                </div>
                <a href="{{ route('home') }}" class="text-bps-lightBlue hover:text-blue-700 font-bold text-xs md:text-sm flex items-center gap-1 transition-colors">
                    <span>Lihat semua publikasi</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>

            <!-- Publications Grid (mockup matching layout: cover on left, text details on right) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @forelse ($publications as $pub)
                    @php
                        // Determine cover colors based on category name
                        $coverGradient = 'from-blue-600 to-indigo-700'; // Default
                        $coverIcon = 'users';
                        $catLower = strtolower($pub->category);
                        if (str_contains($catLower, 'sosial') || str_contains($catLower, 'miskin')) {
                            $coverGradient = 'from-amber-500 to-orange-600';
                            $coverIcon = 'file-text';
                        } elseif (str_contains($catLower, 'ekonomi') || str_contains($catLower, 'kerja')) {
                            $coverGradient = 'from-emerald-500 to-teal-600';
                            $coverIcon = 'briefcase';
                        } elseif (str_contains($catLower, 'pertanian') || str_contains($catLower, 'ipm') || str_contains($catLower, 'manusia')) {
                            $coverGradient = 'from-purple-500 to-violet-600';
                            $coverIcon = 'trending-up';
                        } elseif (str_contains($catLower, 'distribusi') || str_contains($catLower, 'harga') || str_contains($catLower, 'inflasi')) {
                            $coverGradient = 'from-rose-500 to-pink-600';
                            $coverIcon = 'shopping-cart';
                        }
                    @endphp

                    <div class="bg-white rounded-3xl border border-slate-100/80 p-5 md:p-6 shadow-sm flex flex-col sm:flex-row gap-5 hover:shadow-md hover:border-slate-200/60 transition-all duration-300 relative group fade-in">
                        
                        <!-- Left: Dynamic Book Cover (PDF OR CSS FALLBACK) -->
                        <a href="{{ route('user.publications.show', $pub->id) }}" class="shrink-0 flex items-center justify-center cursor-pointer">
                            <div class="relative w-28 h-36 shrink-0 rounded-xl shadow-md overflow-hidden border border-slate-100 bg-slate-50 select-none group-hover:scale-[1.02] transition-transform duration-300">
                                <!-- PDF Canvas Cover (rendered via PDF.js) -->
                                <canvas id="pdf-cover-canvas-{{ $pub->id }}" class="w-full h-full object-contain hidden rounded-xl" data-pdf-url="{{ $pub->pdf_path ? Storage::url($pub->pdf_path) : '' }}"></canvas>

                                <!-- CSS Fallback Placeholder (shown while loading or if PDF.js fails) -->
                                <div id="pdf-cover-placeholder-{{ $pub->id }}" class="relative w-full h-full bg-gradient-to-br {{ $coverGradient }} text-white p-3 flex flex-col justify-between border-r-3 border-black/10 overflow-hidden">
                                    <!-- Spine -->
                                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-white/5 border-r border-white/10 rounded-l-xl"></div>
                                    
                                    <!-- Top category code -->
                                    <div class="flex items-center gap-1 pl-1">
                                        <div class="w-1.5 h-1.5 bg-bps-orange rounded-full"></div>
                                        <span class="text-[6px] font-black tracking-widest text-slate-200 uppercase">{{ substr($pub->category, 0, 10) }}</span>
                                    </div>

                                    <!-- Center Cover Title -->
                                    <div class="pl-1 text-left">
                                        <h4 class="font-extrabold text-[8px] tracking-wide leading-tight line-clamp-3 uppercase text-left">{{ $pub->title }}</h4>
                                        <span class="text-[7px] text-bps-orange font-black block mt-0.5 text-left">{{ $pub->year }}</span>
                                    </div>

                                    <!-- Footer -->
                                    <div class="pl-1 border-t border-white/5 pt-1.5 flex items-center justify-between text-[6px] font-bold text-slate-300">
                                        <span>BPS KOTA</span>
                                        <i data-lucide="{{ $coverIcon }}" class="w-2.5 h-2.5 text-bps-orange"></i>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Right: Details Column -->
                        <div class="flex-1 flex flex-col justify-between min-w-0">
                            <div class="space-y-2">
                                <!-- Title -->
                                <h4 class="heading-font text-base font-extrabold text-bps-navy hover:text-bps-lightBlue transition-colors leading-snug line-clamp-2" title="{{ $pub->title }}">
                                    <a href="{{ route('user.publications.show', $pub->id) }}">
                                        {{ $pub->title }}
                                    </a>
                                </h4>

                                <!-- Category pill -->
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-0.5 bg-blue-50/50 text-[10px] font-extrabold text-bps-lightBlue uppercase tracking-wide rounded-md">
                                        {{ $pub->category }}
                                    </span>
                                    <span class="text-xs text-slate-400 font-bold">{{ $pub->year }}</span>
                                </div>

                                <!-- Description -->
                                <p class="text-xs text-slate-400 font-medium leading-relaxed line-clamp-2">
                                    @php
                                        $displaySummary = $pub->summary ?: ($pub->aiResult?->summary ?: '');
                                    @endphp
                                    {{ $displaySummary ? explode("\n", $displaySummary)[0] : "Publikasi analisis data statistik resmi " . ($pub->region ?? 'Badan Pusat Statistik') . " yang menyajikan data rilis resmi serta indikator utama." }}
                                </p>
                            </div>

                            <!-- Buttons -->
                            <div class="flex items-center gap-2.5 pt-4 border-t border-slate-50 mt-4">
                                @if ($pub->status === 'Selesai' && ($pub->summary || $pub->aiResult?->summary))
                                    <a 
                                        href="{{ route('user.publications.show', $pub->id) }}" 
                                        class="flex-1 py-2 px-3 bg-[#e8f0fe] hover:bg-[#d2e3fc] text-bps-lightBlue rounded-xl font-bold text-xs transition-all flex items-center justify-center gap-1.5 cursor-pointer"
                                    >
                                        <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
                                        <span>Lihat Ringkasan</span>
                                    </a>
                                @else
                                    <div class="flex-1 py-2 px-3 bg-slate-50 text-slate-400 rounded-xl font-bold text-xs text-center border border-slate-100 flex items-center justify-center gap-1 select-none">
                                        <i data-lucide="loader" class="w-3.5 h-3.5 animate-spin"></i>
                                        <span>Diproses AI</span>
                                    </div>
                                @endif

                                @if ($pub->pdf_path)
                                    <a 
                                        href="{{ Storage::url($pub->pdf_path) }}" 
                                        download
                                        class="px-4 py-2 bg-bps-lightBlue hover:bg-blue-700 text-white rounded-xl font-bold text-xs transition-colors flex items-center justify-center gap-1"
                                        title="Unduh Berkas PDF Asli"
                                    >
                                        <i data-lucide="download" class="w-3.5 h-3.5"></i>
                                        <span>Unduh PDF</span>
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-3xl border border-slate-100 p-12 text-center flex flex-col items-center justify-center space-y-4">
                        <div class="w-14 h-14 bg-slate-50 text-slate-400 rounded-xl flex items-center justify-center">
                            <i data-lucide="inbox" class="w-7 h-7"></i>
                        </div>
                        <div>
                            <h3 class="heading-font text-base font-bold text-bps-navy">Belum ada publikasi terdaftar</h3>
                            <p class="text-xs text-slate-400 font-medium mt-1">Publikasi yang diunggah oleh admin akan muncul secara otomatis di sini.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- SECTION 3: KEY FEATURE HIGHLIGHTS (TENTANG) -->
        <section id="tentang-layanan" class="bg-gradient-to-br from-slate-900 to-bps-navy text-white rounded-[2.5rem] p-8 md:p-12 relative overflow-hidden shadow-xl">
            <!-- Decorative circle blur -->
            <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-blue-500/10 blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div class="space-y-3">
                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-blue-300">
                        <i data-lucide="clock" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-extrabold text-sm md:text-base">Ringkasan Otomatis</h4>
                    <p class="text-xs text-slate-400 leading-relaxed font-medium">
                        Dapatkan inti informasi dari publikasi panjang dalam hitungan detik didukung analisis kecerdasan buatan.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="space-y-3">
                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-blue-300">
                        <i data-lucide="book-open" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-extrabold text-sm md:text-base">Mudah Dipahami</h4>
                    <p class="text-xs text-slate-400 leading-relaxed font-medium">
                        Hasil ringkasan disajikan dengan tata bahasa yang sederhana, poin-poin yang to-the-point dan informatif.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="space-y-3">
                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-blue-300">
                        <i data-lucide="shield-check" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-extrabold text-sm md:text-base">Akses Gratis</h4>
                    <p class="text-xs text-slate-400 leading-relaxed font-medium">
                        Seluruh publikasi terdaftar beserta ringkasannya dapat diakses secara gratis oleh seluruh pengguna umum.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="space-y-3">
                    <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-blue-300">
                        <i data-lucide="database" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-extrabold text-sm md:text-base">Sumber Resmi</h4>
                    <p class="text-xs text-slate-400 leading-relaxed font-medium">
                        Seluruh data bersumber langsung dari Badan Pusat Statistik resmi sehingga akurasi kebenaran informasi terjamin.
                    </p>
                </div>
            </div>
        </section>

    </main>



    <!-- SUMMARY MODAL (Overlay Dialog) -->
    <div id="summary-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
        <!-- Backdrop -->
        <div id="modal-backdrop" onclick="closeSummaryModal()" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity duration-300"></div>

        <!-- Card Container -->
        <div class="bg-white rounded-3xl max-w-3xl w-full max-h-[85vh] overflow-hidden flex flex-col shadow-2xl border border-slate-100 relative z-10 scale-95 opacity-0 transition-all duration-300 ease-out" id="modal-card">
            <!-- Modal Header -->
            <div class="p-6 md:p-8 border-b border-slate-100 flex items-start justify-between gap-4">
                <div class="space-y-2">
                    <span id="modal-category" class="px-2.5 py-0.5 bg-blue-50 text-[10px] font-extrabold text-bps-lightBlue uppercase tracking-wide rounded-md">
                        KATEGORI
                    </span>
                    <h3 id="modal-title" class="heading-font text-lg md:text-xl font-extrabold text-bps-navy tracking-tight leading-snug">
                        Judul Publikasi
                    </h3>
                    <div class="flex items-center gap-4 text-xs text-slate-400 font-semibold">
                        <span class="flex items-center gap-1">
                            <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                            Tahun <span id="modal-year">2026</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
                            Wilayah <span id="modal-region">Indonesia</span>
                        </span>
                    </div>
                </div>
                <button onclick="closeSummaryModal()" class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-50 rounded-xl transition-all cursor-pointer">
                    <i data-lucide="x" class="w-5.5 h-5.5"></i>
                </button>
            </div>

            <!-- Tab Headers -->
            <div class="bg-slate-50/70 border-b border-slate-100 px-6 md:px-8 flex items-center gap-4 overflow-x-auto">
                <button onclick="switchTab('ringkasan')" id="tab-btn-ringkasan" class="py-3 text-xs font-bold border-b-2 border-bps-lightBlue text-bps-lightBlue transition-all cursor-pointer">
                    Ringkasan AI
                </button>
                <button onclick="switchTab('poin')" id="tab-btn-poin" class="py-3 text-xs font-bold border-b-2 border-transparent text-slate-500 hover:text-slate-800 transition-all cursor-pointer">
                    Poin Penting
                </button>
                <button onclick="switchTab('indikator')" id="tab-btn-indikator" class="py-3 text-xs font-bold border-b-2 border-transparent text-slate-500 hover:text-slate-800 transition-all cursor-pointer">
                    Indikator Statistik
                </button>
            </div>

            <!-- Modal Content (Scrollable) -->
            <div class="p-6 md:p-8 overflow-y-auto space-y-6 flex-1 text-sm text-slate-700 leading-relaxed font-medium">
                
                <!-- Tab: Ringkasan -->
                <div id="tab-content-ringkasan" class="space-y-4 tab-content">
                    <div class="bg-blue-50/20 border border-blue-100/30 rounded-2xl p-5 space-y-2">
                        <h4 class="font-extrabold text-bps-navy text-xs uppercase tracking-wider flex items-center gap-1.5 text-bps-lightBlue">
                            <i data-lucide="sparkles" class="w-4 h-4"></i>
                            Ekstraksi Utama
                        </h4>
                        <p id="modal-summary-text" class="text-slate-600 leading-relaxed whitespace-pre-line"></p>
                    </div>
                    <div class="space-y-2">
                        <h4 class="font-extrabold text-bps-navy text-xs uppercase tracking-wider">Kesimpulan Akhir</h4>
                        <p id="modal-conclusion-text" class="text-slate-500 whitespace-pre-line"></p>
                    </div>
                </div>

                <!-- Tab: Poin Penting -->
                <div id="tab-content-poin" class="space-y-3 tab-content hidden">
                    <h4 class="font-extrabold text-bps-navy text-xs uppercase tracking-wider text-bps-lightBlue">Temuan & Insight Utama</h4>
                    <ul id="modal-key-points-list" class="space-y-2 list-disc pl-4 text-slate-600">
                        <!-- Filled by JS -->
                    </ul>
                </div>

                <!-- Tab: Indikator -->
                <div id="tab-content-indikator" class="space-y-3 tab-content hidden">
                    <h4 class="font-extrabold text-bps-navy text-xs uppercase tracking-wider text-bps-lightBlue">Metrik & Indikator Kunci</h4>
                    <ul id="modal-indicators-list" class="space-y-2 list-disc pl-4 text-slate-600">
                        <!-- Filled by JS -->
                    </ul>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="p-5 bg-slate-50 border-t border-slate-100 flex items-center justify-between gap-4 px-6 md:px-8">
                <div class="flex items-center gap-2" id="modal-keywords-container">
                    <!-- Keywords filled by JS -->
                </div>
                <a 
                    id="modal-download-btn"
                    href="#" 
                    download
                    class="py-2.5 px-5 bg-bps-lightBlue hover:bg-blue-700 text-white rounded-xl font-bold text-xs shadow-md shadow-blue-500/10 hover:shadow-lg transition-all flex items-center justify-center gap-1.5 cursor-pointer"
                >
                    <i data-lucide="download" class="w-3.5 h-3.5"></i>
                    <span>Download PDF</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Include PDF.js Library, Lucide Icons & Modal/Cover Logic script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();

            // Configure PDF.js worker URL
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

            // Loop and render publication cover pages
            @foreach($publications as $pub)
                @if($pub->pdf_path)
                    (function() {
                        const canvas = document.getElementById('pdf-cover-canvas-{{ $pub->id }}');
                        const placeholder = document.getElementById('pdf-cover-placeholder-{{ $pub->id }}');
                        const pdfUrl = '{{ Storage::url($pub->pdf_path) }}';

                        if (canvas && pdfUrl) {
                            pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
                                return pdf.getPage(1);
                            }).then(function(page) {
                                const viewport = page.getViewport({ scale: 0.8 });
                                const ctx = canvas.getContext('2d');
                                canvas.height = viewport.height;
                                canvas.width = viewport.width;

                                const renderContext = {
                                    canvasContext: ctx,
                                    viewport: viewport
                                };

                                return page.render(renderContext).promise;
                            }).then(function() {
                                if (placeholder) placeholder.classList.add('hidden');
                                canvas.classList.remove('hidden');
                            }).catch(function(err) {
                                console.warn("Failed to render thumbnail for publication {{ $pub->id }}:", err);
                            });
                        }
                    })();
                @endif
            @endforeach
        });

        const modal = document.getElementById('summary-modal');
        const backdrop = document.getElementById('modal-backdrop');
        const card = document.getElementById('modal-card');

        function openSummaryModal(pub) {
            // Fill details
            document.getElementById('modal-title').innerText = pub.title;
            document.getElementById('modal-category').innerText = pub.category;
            document.getElementById('modal-year').innerText = pub.year;
            document.getElementById('modal-region').innerText = pub.region || 'Indonesia';
            document.getElementById('modal-summary-text').innerText = pub.summary || '-';
            document.getElementById('modal-conclusion-text').innerText = pub.conclusion || 'Kesimpulan belum tergenerate.';
            
            // Key Points
            const keyPointsList = document.getElementById('modal-key-points-list');
            keyPointsList.innerHTML = '';
            let keyPoints = pub.key_points;
            if (typeof keyPoints === 'string') {
                try { keyPoints = JSON.parse(keyPoints); } catch(e) {}
            }
            if (Array.isArray(keyPoints) && keyPoints.length > 0) {
                keyPoints.forEach(pt => {
                    const li = document.createElement('li');
                    li.innerText = pt;
                    keyPointsList.appendChild(li);
                });
            } else {
                keyPointsList.innerHTML = '<li class="text-slate-400 italic">Tidak ada data poin penting.</li>';
            }

            // Indicators
            const indicatorsList = document.getElementById('modal-indicators-list');
            indicatorsList.innerHTML = '';
            let indicators = pub.indicators;
            if (typeof indicators === 'string') {
                try { indicators = JSON.parse(indicators); } catch(e) {}
            }
            if (Array.isArray(indicators) && indicators.length > 0) {
                indicators.forEach(ind => {
                    const li = document.createElement('li');
                    li.innerText = ind;
                    indicatorsList.appendChild(li);
                });
            } else {
                indicatorsList.innerHTML = '<li class="text-slate-400 italic">Tidak ada data metrik/indikator.</li>';
            }

            // Keywords
            const kwContainer = document.getElementById('modal-keywords-container');
            kwContainer.innerHTML = '';
            let keywords = pub.keywords;
            if (typeof keywords === 'string') {
                try { keywords = JSON.parse(keywords); } catch(e) {}
            }
            if (Array.isArray(keywords) && keywords.length > 0) {
                keywords.slice(0, 3).forEach(kw => {
                    const span = document.createElement('span');
                    span.className = 'px-2 py-0.5 bg-slate-100 text-[10px] font-bold text-slate-500 rounded-md';
                    span.innerText = kw;
                    kwContainer.appendChild(span);
                });
            }

            // Download Link
            const dlBtn = document.getElementById('modal-download-btn');
            if (pub.pdf_path) {
                dlBtn.href = '/storage/' + pub.pdf_path.replace('public/', '');
                dlBtn.style.display = 'flex';
            } else {
                dlBtn.style.display = 'none';
            }

            // Show modal
            modal.classList.remove('hidden');
            setTimeout(() => {
                backdrop.classList.add('opacity-100');
                card.classList.remove('scale-95', 'opacity-0');
            }, 10);

            // Reset Tab state
            switchTab('ringkasan');
        }

        function closeSummaryModal() {
            backdrop.classList.remove('opacity-100');
            card.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function switchTab(tabId) {
            const tabs = ['ringkasan', 'poin', 'indikator'];
            tabs.forEach(t => {
                const content = document.getElementById('tab-content-' + t);
                const btn = document.getElementById('tab-btn-' + t);
                if (t === tabId) {
                    content.classList.remove('hidden');
                    btn.classList.remove('border-transparent', 'text-slate-500');
                    btn.classList.add('border-bps-lightBlue', 'text-bps-lightBlue');
                } else {
                    content.classList.add('hidden');
                    btn.classList.remove('border-bps-lightBlue', 'text-bps-lightBlue');
                    btn.classList.add('border-transparent', 'text-slate-500');
                }
            });
        }
    </script>
@endsection
