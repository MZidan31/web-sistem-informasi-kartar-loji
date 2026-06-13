<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\StatsOverview;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->profile(\App\Filament\Pages\EditProfile::class)
            ->userMenuItems([
                'profile' => \Filament\Navigation\MenuItem::make()
                    ->label('Edit Profil')
                    ->icon('heroicon-o-user')
                    ->url(fn(): string => \App\Filament\Pages\EditProfile::getUrl()),
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            ->maxContentWidth('full')
            ->colors(['primary' => \Filament\Support\Colors\Color::Blue,])

            // 🔥 PERUBAHAN 1: Buang inline style, ganti pake class custom biar bisa di-trigger Dark Mode
            ->brandName(fn() => new \Illuminate\Support\HtmlString('
                <div class="sikt-brand-container">
                    <img src="' . asset('logo-ipl.jpeg') . '" class="sikt-brand-logo" alt="Logo">
                    <div class="sikt-brand-text">
                        <span class="sikt-brand-title">Sistem Informasi</span>
                        <span class="sikt-brand-subtitle">Karang Taruna Loji</span>
                    </div>
                </div>
            '))

            ->font('Poppins')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([Dashboard::class])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                StatsOverview::class,
                \App\Filament\Widgets\InovasiChart::class,
                \App\Filament\Widgets\LatestActivities::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([Authenticate::class])

            // HOOK BAWAAN LU DENGAN TAMBAHAN CSS DARK MODE
            ->renderHook(
                PanelsRenderHook::HEAD_START,
                fn(): string => Blade::render('
                    <style>
                        /* 🔥 PERUBAHAN 2: RULES UNTUK BRAND LOGO & TEKS (LIGHT MODE) */
                        .sikt-brand-container { display: flex; align-items: center; gap: 0.5rem; }
                        .sikt-brand-logo { height: 2.2rem; width: auto; mix-blend-mode: multiply; transition: all 0.3s ease; }
                        .sikt-brand-text { display: flex; flex-direction: column; }
                        .sikt-brand-title { font-size: 0.75rem; font-weight: 800; line-height: 1.1; color: #0f172a; white-space: nowrap; transition: color 0.3s ease; }
                        .sikt-brand-subtitle { font-size: 0.55rem; font-weight: 800; color: #ea580c; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.1rem; white-space: nowrap; }

                        /* 🔥 PERUBAHAN 3: RULES UNTUK DARK MODE (DI-TRIGGER OTOMATIS OLEH FILAMENT) */
                        html.dark .sikt-brand-logo { 
                            mix-blend-mode: normal !important; /* Buang efek multiply biar gambar nggak hilang */
                            background-color: rgba(255, 255, 255, 0.9) !important; /* Kasih bantalan putih */
                            padding: 2.5px !important; 
                            border-radius: 6px !important; 
                        }
                        html.dark .sikt-brand-title { 
                            color: #f8fafc !important; /* Warna teks jadi Putih Tulang (Anti-Halation) */
                        }

                        /* CSS BAWAAN LU */
                        .fi-main-ctn, .fi-page-content-ctn, .fi-form-ctn { max-width: none !important; width: 100% !important; }
                        .fi-wi-stats-overview-stat { width: 100% !important; }

                        /* SEARCH BAR - PIL PANJANG PROFESIONAL TENGAH */
                        @media screen and (min-width: 1024px) {
                            .fi-topbar .fi-global-search {
                                position: absolute !important;
                                left: 50% !important;
                                top: 50% !important;
                                transform: translate(-50%, -50%) !important;
                                width: 100% !important;
                                max-width: 750px !important;
                            }
                        }
                        @media screen and (max-width: 1023px) {
                            .fi-topbar .fi-global-search {
                                flex: 1 !important;
                                max-width: 100% !important;
                            }
                        }
                        .fi-topbar .fi-input-wrapper {
                            border-radius: 50px !important;
                            background-color: #f8fafc !important;
                            border: 1.5px solid #e2e8f0 !important;
                            box-shadow: none !important;
                            padding-left: 0.5rem;
                            padding-right: 0.5rem;
                        }
                        .fi-topbar .fi-input-wrapper:focus-within {
                            border-color: #ea580c !important;
                            box-shadow: 0 4px 15px rgba(234, 88, 12, 0.1) !important;
                            background-color: #ffffff !important;
                        }
                        .fi-topbar input.fi-input {
                            border-radius: 50px !important;
                        }
                        
                        /* MODERN PROFILE AESTHETICS */
                        .sikt-modern-card {
                            background-color: #ffffff !important;
                            border: none !important;
                            border-radius: 16px !important;
                            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03) !important;
                            overflow: hidden;
                        }
                        .sikt-modern-card .fi-section-header-heading { font-weight: 800 !important; color: #0f172a !important; font-size: 1.2rem !important; }
                        .sikt-soft-input input {
                            border-radius: 10px !important; 
                            background-color: #f8fafc !important; 
                            border: 1px solid #e2e8f0 !important;
                        }
                        .sikt-soft-input input:focus {
                            border-color: #ea580c !important;
                            box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.1) !important;
                            background-color: #ffffff !important;
                        }
                        .sikt-avatar-upload {
                            position: relative;
                        }
                        
                        .fi-page-profile .fi-btn { border-radius: 10px !important; }
                    </style>
                '),
            )

            // HOOK PAMUNGKAS: LOGIN FORM
            ->renderHook(
                PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
                fn(): string => Blade::render('
                <div class="sikt-side-panel">
                    <div class="sikt-text-container-center">
                        <span class="badge">#PemudaLoji</span>
                        <h2 class="title">Ruang Gerak<br>Bersama.</h2>
                        <p class="subtitle">Platform Sistem Informasi Karang Taruna Loji 005. Terpadu, transparan, dan kolaboratif untuk kemajuan bersama.</p>
                    </div>
                </div>
                <style>
                    @import url("https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap");

                    body, html { margin: 0 !important; padding: 0 !important; height: 100%; overflow-x: hidden; }
                    
                    .fi-simple-layout {
                        display: flex !important; width: 100% !important; height: 100vh !important;
                        max-width: 100% !important; padding: 0 !important;
                        background-color: #ffffff !important; font-family: "Plus Jakarta Sans", sans-serif !important;
                    }
                    .fi-simple-layout::before, .fi-simple-layout::after { display: none !important; }

                    .sikt-side-panel {
                        position: fixed !important; top: 0 !important; left: 0 !important;
                        width: 55% !important; height: 100vh !important;
                        background-color: #0f172a !important; 
                        background-image: radial-gradient(circle at 10% 90%, rgba(234,88,12,0.12) 0%, transparent 60%) !important;
                        z-index: 5 !important; display: flex !important; flex-direction: column !important; justify-content: center !important;
                    }

                    .sikt-text-container-center {
                        padding: 0 4rem !important; max-width: 90% !important; z-index: 10 !important; text-align: left !important;
                        animation: fadeUp 0.8s ease-out forwards;
                    }
                    .sikt-text-container-center .badge {
                        display: inline-block !important; padding: 0.5rem 1rem !important; background: rgba(234,88,12,0.2) !important; border: 1px solid rgba(234,88,12,0.4) !important;
                        border-radius: 50px !important; backdrop-filter: blur(4px) !important; font-weight: 800 !important; font-size: 0.75rem !important; margin-bottom: 1.5rem !important; letter-spacing: 2px !important; text-transform: uppercase !important; color: #ea580c !important;
                    }
                    .sikt-text-container-center .title {
                        font-family: "Plus Jakarta Sans", sans-serif !important; font-size: 3.5rem !important; font-weight: 900 !important; line-height: 1.1 !important; margin: 0 0 1rem 0 !important; letter-spacing: -0.03em !important; color: #f8fafc !important;
                    }
                    .sikt-text-container-center .subtitle {
                        font-size: 1.05rem !important; font-weight: 500 !important; line-height: 1.6 !important; color: #94a3b8 !important; margin: 0 !important; max-width: 85% !important;
                    }

                    .fi-simple-main-ctn {
                        position: absolute !important; top: 0 !important; right: 0 !important; left: auto !important;
                        z-index: 10 !important; width: 45% !important; max-width: 45% !important; height: 100vh !important;
                        display: flex !important; flex-direction: column !important; justify-content: center !important; align-items: center !important; 
                        background-color: #ffffff !important; padding: 0 !important; margin: 0 !important;
                    }

                    .fi-simple-main { width: 100% !important; max-width: 420px !important; padding: 2rem !important; background: transparent !important; box-shadow: none !important; border: none !important; margin: 0 auto !important; }
                    .fi-simple-main > section { background: transparent !important; box-shadow: none !important; border: none !important; padding: 0 !important; }

                    .fi-logo { display: flex !important; gap: 0.5rem !important; justify-content: center !important; margin-bottom: 1.5rem !important; margin-top: -1rem !important; }

                    .fi-simple-header { display: flex !important; flex-direction: column !important; align-items: center !important; text-align: center !important; width: 100% !important; margin-bottom: 2.5rem !important; margin-top: 0 !important; }
                    .fi-simple-header h1 {
                        font-family: "Plus Jakarta Sans", sans-serif !important; font-size: 2.2rem !important; font-weight: 800 !important; color: #0f172a !important; width: 100% !important;
                        letter-spacing: -0.03em !important; margin-bottom: 0.5rem !important; display: block !important; text-align: center !important; justify-content: center !important;
                    }
                    .fi-simple-header p { display: none !important; }
                    .fi-simple-header::after {
                        content: "Masukkan kredensial Anda untuk masuk.";
                        display: block !important; text-align: center !important; font-size: 0.95rem !important; color: #64748b !important; font-weight: 500 !important; font-family: "Plus Jakarta Sans", sans-serif !important;
                    }

                    .fi-form-label, .fi-form-label *, label span { font-weight: 700 !important; color: #0f172a !important; font-size: 0.85rem !important; font-family: "Plus Jakarta Sans", sans-serif !important; }
                    .fi-input-wrapper { border-radius: 8px !important; border: 1.5px solid #e2e8f0 !important; background-color: #f8fafc !important; transition: all 0.2s ease !important; }
                    .fi-input-wrapper:focus-within { border-color: #ea580c !important; box-shadow: 0 0 0 3px rgba(234,88,12,0.1) !important; background-color: #ffffff !important; }
                    .fi-input { padding: 0.8rem 1rem !important; background: transparent !important; border: none !important; box-shadow: none !important; width: 100% !important; color: #0f172a !important; }

                    .fi-btn[type="submit"] {
                        background-color: #0f172a !important; 
                        color: #ffffff !important; border-radius: 8px !important; padding: 1.2rem !important; font-weight: 800 !important;
                        box-shadow: 0 4px 15px rgba(15,23,42,0.2) !important; border: none !important; width: 100% !important; margin-top: 1.5rem !important; transition: all 0.3s ease !important;
                    }
                    .fi-btn[type="submit"]:hover { background-color: #1e293b !important; transform: translateY(-2px) !important; }
                    .fi-btn[type="submit"] * { color: #ffffff !important; font-weight: 800 !important; }

                    a { color: #0f172a !important; font-weight: 700 !important; text-decoration: none !important; }
                    a:hover { color: #ea580c !important; text-decoration: underline !important; }
                    .fi-checkbox:checked { background-color: #ea580c !important; border-color: #ea580c !important; }
                    .fi-checkbox-label, .fi-checkbox-label * { color: #0f172a !important; font-weight: 600 !important; }
                    
                    @media screen and (max-width: 1024px) {
                        .sikt-side-panel { display: none !important; } 
                        .fi-simple-main-ctn { width: 100% !important; max-width: 100% !important; position: static !important; } 
                        .fi-simple-main { padding: 2rem !important; top: 0 !important; margin: auto !important; }
                    }
                </style>'),
            );
    }
}
