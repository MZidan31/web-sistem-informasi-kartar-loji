<x-filament-panels::page>
    <div class="sikt-profile-display-card" style="padding: 2.5rem; display: flex; flex-direction: column; gap: 1.5rem; background-color: #ffffff; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
        <div style="display: flex; gap: 2rem; align-items: center;">
            <div style="flex-shrink: 0;">
                @if (auth()->user()->avatar_url)
                    <img src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->avatar_url) }}" alt="Avatar" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid #f8fafc; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                @else
                    <div style="width: 120px; height: 120px; border-radius: 50%; background-color: #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; font-weight: bold; color: #94a3b8; border: 4px solid #ffffff; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
            </div>
            <div style="flex-grow: 1;">
                <h2 style="font-size: 1.8rem; font-weight: 800; color: #0f172a; margin: 0; letter-spacing: -0.02em;">{{ auth()->user()->name }}</h2>
                <div style="margin: 0.5rem 0 1rem 0;">
                    <x-filament::badge color="primary" size="lg">
                        {{ str(auth()->user()->role)->title()->replace('_', ' ') }}
                    </x-filament::badge>
                </div>
                
                <div style="display: inline-flex; flex-direction: column; gap: 0.5rem; margin-top: 0.5rem; padding: 1rem 1.2rem; border-radius: 12px; background-color: #f8fafc; border: 1px solid #e2e8f0;">
                    <span style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 700; color: #94a3b8;">Alamat Email</span>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <x-filament::icon icon="heroicon-m-envelope" class="w-5 h-5 text-gray-500" style="color: #64748b;" />
                        <span style="font-size: 1rem; color: #0f172a; font-weight: 600;">{{ auth()->user()->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
