<?php

namespace App\Filament\Resources\Inovasis;

use App\Filament\Resources\Inovasis\Pages;
use App\Models\Inovasi;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use BackedEnum;

class InovasiResource extends Resource
{
    protected static ?string $model = Inovasi::class;
    protected static ?string $pluralModelLabel = 'Inovasi';
    protected static ?string $modelLabel = 'Inovasi';
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $recordTitleAttribute = 'judul';

    public static function getMaxContentWidth(): string
    {
        return 'full';
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        $query = parent::getEloquentQuery();
        // Divisi cuma liat punya sendiri, Ketum liat semua
        return ($user->role !== 'admin') ? $query->where('user_id', $user->id) : $query;
    }

    public static function form(Schema $schema): Schema
    {
        $isKetum = auth()->user()->role === 'admin';

        return $schema
            ->components([
                Forms\Components\Hidden::make('user_id')->default(auth()->id()),

                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->columnSpan(8)
                    ->disabled($isKetum),

                Forms\Components\Select::make('kategori_id')
                    ->options([1 => 'Teknologi', 2 => 'Sosial', 3 => 'Ekonomi'])
                    ->required()
                    ->native(false)
                    ->columnSpan(4)
                    ->disabled($isKetum),

                Forms\Components\DatePicker::make('tanggal_diajukan')
                    ->label('Tanggal Diajukan')
                    ->default(now())
                    ->required()
                    ->columnSpan(6)
                    ->dehydrated() // Paksa kirim ke DB
                    ->disabled($isKetum),

                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->rows(5)
                    ->columnSpan(12)
                    ->disabled($isKetum),

                // FOTO INOVASI: Nongol dari awal (Create/Edit)
                Forms\Components\Repeater::make('fotoInovasis')
                    ->relationship('fotoInovasis')
                    ->schema([
                        Forms\Components\FileUpload::make('file_path')
                            ->image()
                            ->directory('inovasi')
                            ->required(),
                    ])
                    ->grid(3)
                    ->columnSpan(12)
                    ->disabled($isKetum)
                    ->label('Dokumentasi Inovasi (Foto/Desain Konsep)'),

                Forms\Components\Select::make('status')
                    ->options(['pending' => 'Pending', 'disetujui' => 'Disetujui', 'ditolak' => 'Ditolak'])
                    ->default('pending')
                    ->dehydrated()
                    ->required()
                    ->native(false)
                    ->columnSpan(4)
                    ->live()
                    ->disabled(fn() => auth()->user()->role !== 'admin'),

                Forms\Components\Textarea::make('catatan')
                    ->label('Catatan Validasi dari Ketua Umum')
                    ->placeholder('Belum ada catatan...')
                    ->columnSpan(8)
                    ->rows(3)
                    ->required(fn ($get) => $get('status') === 'ditolak')
                    ->disabled(fn() => auth()->user()->role !== 'admin'),
            ])
            ->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Divisi Pengusul'),
                Tables\Columns\TextColumn::make('judul')->searchable(),
                Tables\Columns\TextColumn::make('status')->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'disetujui' => 'success',
                        'ditolak' => 'danger',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(['pending' => 'Pending', 'disetujui' => 'Disetujui', 'ditolak' => 'Ditolak'])
                    ->label('Filter Status'),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInovasis::route('/'),
            'create' => Pages\CreateInovasi::route('/create'),
            'edit' => Pages\EditInovasi::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return auth()->check() && auth()->user()->role !== 'admin';
    }
}
