<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Daftar Mengunggu Validasi
        </x-slot>

        <div class="space-y-4">
            @forelse($inovasis as $item)
                <div class="flex items-center justify-between p-4 bg-orange-50/50 rounded-xl border border-orange-100 shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center gap-4">
                        <div class="p-2.5 bg-brand-orange text-white rounded-lg shadow-sm">
                            <x-heroicon-o-light-bulb class="w-6 h-6"/>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900 leading-tight mb-1">{{ $item->judul }}</p>
                            <p class="text-[11px] font-bold text-gray-500 uppercase tracking-widest">
                                Inovasi <span class="mx-1">•</span> Oleh: <span class="text-brand-orange">{{ $item->user->name ?? 'Anonim' }}</span>
                            </p>
                        </div>
                    </div>
                    @if($isKetum)
                    <a href="/admin/inovasis/{{ $item->id }}/edit" class="px-3 py-1.5 text-[10px] font-black text-white bg-warning-500 rounded-md shadow-sm hover:scale-105 transition-transform">
                        TINDAK LANJUTI
                    </a>
                    @else
                    <span class="px-3 py-1.5 text-[10px] font-black text-warning-600 bg-warning-100 rounded-md">
                        MENUNGGU
                    </span>
                    @endif
                </div>
            @empty
            @endforelse

            @forelse($kegiatans as $item)
                <div class="flex items-center justify-between p-4 bg-green-50/50 rounded-xl border border-green-100 shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center gap-4">
                        <div class="p-2.5 bg-green-500 text-white rounded-lg shadow-sm">
                            <x-heroicon-o-calendar-days class="w-6 h-6"/>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900 leading-tight mb-1">{{ $item->judul }}</p>
                            <p class="text-[11px] font-bold text-gray-500 uppercase tracking-widest">
                                Kegiatan <span class="mx-1">•</span> Oleh: <span class="text-green-600">{{ $item->user->name ?? 'Anonim' }}</span>
                            </p>
                        </div>
                    </div>
                    @if($isKetum)
                    <a href="/admin/kegiatans/{{ $item->id }}/edit" class="px-3 py-1.5 text-[10px] font-black text-white bg-warning-500 rounded-md shadow-sm hover:scale-105 transition-transform">
                        TINDAK LANJUTI
                    </a>
                    @else
                    <span class="px-3 py-1.5 text-[10px] font-black text-warning-600 bg-warning-100 rounded-md">
                        MENUNGGU
                    </span>
                    @endif
                </div>
            @empty
            @endforelse

            @if($inovasis->isEmpty() && $kegiatans->isEmpty())
                <div class="text-center py-10 flex flex-col items-center justify-center border-2 border-dashed border-gray-200 rounded-2xl">
                    <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 mb-3">
                        <x-heroicon-o-check-badge class="w-6 h-6"/>
                    </div>
                    <p class="text-gray-500 text-sm font-bold">Semua Aman & Bersih!</p>
                    <p class="text-gray-400 text-xs">Tidak ada usulan validasi untuk saat ini.</p>
                </div>
            @endif
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
