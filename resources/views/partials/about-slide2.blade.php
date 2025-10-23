{{-- resources/views/partials/about-slide-2.blade.php --}}
<section id="tentang-saya"
    class="-mt-6 relative overflow-hidden bg-[var(--color-brand)] text-[var(--color-ink)] scroll-mt-24 md:scroll-mt-28">
    
    {{-- Dekorasi: pola garis-kotak & radial glow --}}
    <div aria-hidden="true" 
    class="pointer-events-none absolute inset-0 z-0">
        <!-- <div class="absolute right-[-120px] -top-32 w-[760px] h-[760px] opacity-70 rotate-[-30deg]
                [background:radial-gradient(50%_50%_at_81%_56%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_100%)]">
        </div> -->
        
        {{-- pola kiri atas --}}
        <img src="{{ asset('image/beranda/Group-38252.png') }}" 
             alt="pattern garis kotak atas"
             class="hidden md:block absolute left-0 top-10 md:top-0 w-[240px] md:w-[280px] h-auto opacity-40 select-none">

        {{-- pola kiri bawah --}}
        <img src="{{ asset('image/beranda/Group-38253.png') }}" 
             alt="pattern garis kotak bawah"
             class="hidden md:block absolute left-0 bottom-1 md:bottom-1 w-[240px] md:w-[280px] h-auto opacity-40 select-none">   
             
        {{-- radial glow kanan-atas --}}
        <div class="absolute right-[-140px] -top-10 md:-top-16 w-[620px] h-[320px] opacity-70 rotate-[-30deg]
            [background:radial-gradient(50%_50%_at_81%_56%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_100%)]">
        </div>     
    </div>

    <div class="relative z-10 container-lg py-12 md:py-20">
        {{-- Garis hijau di tengah --}}
        <div class="text-center">
            <!-- <span class="block h-[3px] w-[102px] bg-[var(--color-accent)] rounded-full">
            </span> -->
            <div class="section-title-about-accent mb-4"></div>
            <h2 class="section-title-about">
            Spesialis Strategi Konten
        </h2>
        </div>

        {{-- Grid konten: foto kiri, teks kanan --}}
        <div class="mt-8 md:mt-10 grid items-center gap-10 md:gap-14 grid-cols-1 md:grid-cols-2">
                {{-- Foto (kunci rasio agar tidak panjang) --}}
                <figure class="mx-auto md:mx-0">
                    {{-- wrapper buat kunci rasio supaya foto tidak “panjang” --}}
                    <div class="about-photo w-full aspect-[4/3] md:aspect-auto md:w-[480px] md:h-[480px]">
                        <img
                        src="{{ asset('image/beranda/foto-about.jpg') }}"
                        alt="Triawanda Tirta Aditya saat memaparkan materi"
                        class="h-full w-full object-cover">
                    </div>
                </figure>

                {{-- Teks --}}
                <div>
                    <p class="text-[16px] md:text-[18px] leading-7 text-white/90 font-medium max-w-[56ch]">
                        Saya adalah Content Creator sekaligus Founder Taggallery Agency (berdiri sejak 2021).
                        Fokus saya membantu bisnis lokal dan institusi mengubah konten jadi pertumbuhan nyata.
                        Sejak 2020, saya terlibat di berbagai program pemerintah dan brand besar dengan membangun
                        kerangka kerja konten yang konsisten, terukur, dan berorientasi hasil.
                    </p>

                    <div class="mt-7 md:mt-8 flex flex-wrap items-center gap-4">
                        <a href="{{ route('contact') }}" class="btn-primary btn-raise">Minta Proposal</a>
                        <a href="{{ route('blog.portfolio') }}" class="btn-outline btn-raise">Lihat Portofolio</a>
                    </div>
                </div>
        </div>
    </div>
</section>