<?php

namespace App\Filament\Resources\Kegiatans;

use App\Filament\Resources\Kegiatans\Pages;
use App\Models\Kegiatan;
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

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;
    protected static ?string $pluralModelLabel = 'Kegiatan';
    protected static ?string $modelLabel = 'Kegiatan';
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $recordTitleAttribute = 'judul';

    public static function getMaxContentWidth(): string
    {
        return 'full';
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        $query = parent::getEloquentQuery();
        return ($user->role !== 'admin') ? $query->where('user_id', $user->id) : $query;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Hidden::make('user_id')->default(auth()->id()),

                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->columnSpan(12)
                    ->disabled(fn(?Kegiatan $record) => auth()->user()->role === 'admin' || ($record && strtolower($record->status) !== 'pending')),

                Forms\Components\Select::make('kategori_id')
                    ->label('Kategori')
                    ->options([
                        1 => 'Pendidikan',
                        2 => 'Sosial',
                        3 => 'Olahraga'
                    ])
                    ->required()
                    ->native(false)
                    ->columnSpan(4)
                    ->disabled(fn(?Kegiatan $record) => auth()->user()->role === 'admin' || ($record && strtolower($record->status) !== 'pending')),

                Forms\Components\DatePicker::make('tanggal_diajukan')
                    ->label('Tanggal Pengajuan')
                    ->default(now())
                    ->required()
                    ->columnSpan(4)
                    ->dehydrated()
                    ->disabled(fn(?Kegiatan $record) => auth()->user()->role === 'admin' || ($record && strtolower($record->status) !== 'pending')),

                Forms\Components\DatePicker::make('tanggal_berjalan')
                    ->label('Tanggal Pelaksanaan')
                    ->required()
                    ->columnSpan(4)
                    ->disabled(fn(?Kegiatan $record) => auth()->user()->role === 'admin' || ($record && strtolower($record->status) !== 'pending')),

                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->rows(5)
                    ->columnSpan(12)
                    ->disabled(fn(?Kegiatan $record) => auth()->user()->role === 'admin' || ($record && strtolower($record->status) !== 'pending')),

                // FOTO KEGIATAN: HANYA Divisi yang bisa upload saat status disetujui
                Forms\Components\Repeater::make('fotoKegiatans')
                    ->relationship('fotoKegiatans')
                    ->visible(fn(?Kegiatan $record) => $record && strtolower($record->status) === 'disetujui')
                    ->schema([
                        // NAH INI YANG GUA TAMBAHIN BIAR RAPI MASUK FOLDER
                        Forms\Components\FileUpload::make('file_path')
                            ->image()
                            ->directory('kegiatan')
                            ->required(),
                    ])
                    ->grid(3)
                    ->columnSpan(12)
                    ->disabled(fn() => auth()->user()->role === 'admin')
                    ->label('Foto Bukti Pelaksanaan'),

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
                    ->label('Catatan dari Ketua Umum')
                    ->placeholder('Berikan alasan penolakan atau catatan tambahan...')
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
                    ->color(fn(string $state): string => match (strtolower($state)) {
                        'pending' => 'warning',
                        'disetujui' => 'success',
                        'ditolak' => 'danger',
                        default => 'secondary',
                    }),
                Tables\Columns\TextColumn::make('tanggal_berjalan')->date()->label('Pelaksanaan'),
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
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return auth()->user()->role !== 'admin';
    }
}
