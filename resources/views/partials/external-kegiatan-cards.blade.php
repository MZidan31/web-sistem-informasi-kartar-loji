@foreach ($kegiatanEksternal as $ext)
    @php
        $imageUrls = [];
        // Cek foto_kegiatan (biasanya fieldnya beda dikit di DB temen lo)
        // Kita cek dua-duanya biar aman
        $rawFotos = $ext['foto_kegiatan'] ?? ($ext['foto_inovasi'] ?? []);

        if (isset($rawFotos) && is_array($rawFotos) && count($rawFotos) > 0) {
            foreach ($rawFotos as $foto) {
                if (isset($foto['file_path'])) {
                    $imageUrls[] = 'https://takarangtaruna-production.up.railway.app/storage/' . $foto['file_path'];
                }
            }
        }

        if (empty($imageUrls)) {
            $imageUrls[] = 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=600';
        }

        $jsonImages = json_encode($imageUrls);
        $coverImg = $imageUrls[0];
    @endphp

    <div class="portfolio-item kegiatan bg-white rounded-3xl overflow-hidden shadow-sm border-2 border-green-200 hover:shadow-xl transition-all duration-300 cursor-pointer group flex flex-col opacity-90"
        onclick="openModal(this)" data-title="{{ $ext['judul'] ?? 'Kegiatan Pusat' }}"
        data-desc="{{ $ext['deskripsi'] ?? 'Deskripsi kegiatan tidak tersedia.' }}"
        data-date="{{ isset($ext['tanggal_berjalan']) ? \Carbon\Carbon::parse($ext['tanggal_berjalan'])->format('d M Y') : (isset($ext['tanggal_diajukan']) ? \Carbon\Carbon::parse($ext['tanggal_diajukan'])->format('d M Y') : date('d M Y')) }}"
        data-user="{{ $ext['user']['name'] ?? 'Pusat' }}" data-type="KEGIATAN PUSAT" data-images="{{ $jsonImages }}">

        <div class="h-48 overflow-hidden relative bg-brand-navy flex items-center justify-center">
            <img src="{{ $coverImg }}"
                class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-700">
            <p
                class="absolute top-4 right-5 text-[8px] font-black text-white bg-black/50 px-2 py-1 rounded-full uppercase tracking-tighter">
                API: Takarang Taruna</p>
            <p
                class="absolute bottom-4 left-5 text-[10px] font-bold text-white bg-green-600 px-3 py-1.5 rounded-md uppercase tracking-widest shadow-md">
                KEGIATAN PUSAT</p>
        </div>

        <div class="p-6 flex-grow flex flex-col">
            <h3
                class="text-xl font-display font-bold text-brand-navy mb-3 line-clamp-2 group-hover:text-green-600 transition">
                {{ $ext['judul'] ?? 'Kegiatan Tanpa Judul' }}
            </h3>
            <p class="text-sm text-gray-500 mb-6 line-clamp-2 font-medium flex-grow">
                {{ $ext['deskripsi'] ?? 'Deskripsi pusat tidak ditemukan.' }}
            </p>
            <div
                class="border-t border-gray-100 pt-4 mt-auto text-xs text-green-700 font-bold flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 002-2V5a2 2 0 002 2H5V5v14a2 2 0 002 2z">
                    </path>
                </svg>
                DARI PUSAT
            </div>
        </div>
    </div>
@endforeach
