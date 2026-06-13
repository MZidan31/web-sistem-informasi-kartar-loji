@foreach ($inovasiEksternal as $ext)
    @php
        // 1. Logika Gambar yang Super Aman
        $imageUrls = [];

        // Cek apakah beneran ada array foto_inovasi dan isinya gak kosong
        if (isset($ext['foto_inovasi']) && is_array($ext['foto_inovasi']) && count($ext['foto_inovasi']) > 0) {
            foreach ($ext['foto_inovasi'] as $foto) {
                // Cek lagi apakah di dalemnya ada key file_path
                if (isset($foto['file_path'])) {
                    $imageUrls[] = 'https://takarangtaruna-production.up.railway.app/storage/' . $foto['file_path'];
                }
            }
        }

        // Kalau setelah dicek ternyata zonk/kosong, kasih gambar default
        if (empty($imageUrls)) {
            $imageUrls[] = 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=600';
        }

        $jsonImages = json_encode($imageUrls);
        $coverImg = $imageUrls[0];
    @endphp

    <div class="portfolio-item inovasi bg-white rounded-3xl overflow-hidden shadow-sm border-2 border-orange-200 hover:shadow-xl transition-all duration-300 cursor-pointer group flex flex-col opacity-90"
        onclick="openModal(this)" data-title="{{ $ext['judul'] ?? 'Inovasi Pusat' }}"
        data-desc="{{ $ext['deskripsi'] ?? 'Tidak ada deskripsi tersedia.' }}"
        data-date="{{ isset($ext['tanggal_diajukan']) ? \Carbon\Carbon::parse($ext['tanggal_diajukan'])->format('d M Y') : date('d M Y') }}"
        data-user="{{ $ext['user']['name'] ?? 'Pusat' }}" data-type="INOVASI PUSAT" data-images="{{ $jsonImages }}">

        <div class="h-48 overflow-hidden relative bg-brand-navy flex items-center justify-center">
            <img src="{{ $coverImg }}"
                class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-700">
            <p
                class="absolute top-4 right-5 text-[8px] font-black text-white bg-black/50 px-2 py-1 rounded-full uppercase tracking-tighter">
                API: Takarang Taruna</p>
            <p
                class="absolute bottom-4 left-5 text-[10px] font-bold text-white bg-brand-orange px-3 py-1.5 rounded-md uppercase tracking-widest shadow-md">
                PUSAT</p>
        </div>

        <div class="p-6 flex-grow flex flex-col">
            <h3
                class="text-xl font-display font-bold text-brand-navy mb-3 line-clamp-2 group-hover:text-brand-orange transition">
                {{ $ext['judul'] ?? 'Inovasi Tanpa Judul' }}
            </h3>
            <p class="text-sm text-gray-500 mb-6 line-clamp-2 font-medium flex-grow">
                {{ $ext['deskripsi'] ?? 'Deskripsi pusat tidak ditemukan.' }}
            </p>
            <div
                class="border-t border-gray-100 pt-4 mt-auto text-xs text-gray-400 font-bold uppercase tracking-tighter">
                Sumber: {{ $ext['user']['name'] ?? 'Karang Taruna Pusat' }}
            </div>
        </div>
    </div>
@endforeach
