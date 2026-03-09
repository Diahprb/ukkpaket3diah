<?php

namespace App\Filament\Resources\Aspirasis\Tables;

use App\Filament\Exports\AspirasiExporter;
use App\Filament\Resources\Aspirasis\Pages\ProsesAspirasi;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Support\Colors\Color;
use Filament\Actions\Action as TableAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AspirasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa.name')
                    ->label('Siswa')
                    ->sortable(),
                TextColumn::make('kategori.nama_kategori')
                    ->sortable(),
                TextColumn::make('judul'),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('tanggal')
                    ->label('Tanggal Kejadian')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'menunggu' => 'warning',
                        'ditinjau' => Color::Fuchsia,
                        'proses'   => 'info',
                        'selesai'  => Color::Lime,
                    })
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->multiple()
                    ->options([
                        'menunggu' => 'Menunggu',
                        'proses'   => 'Di Proses',
                        'ditinjau' => 'Di Tinjau',
                        'selesai'  => 'Selesai',
                    ])
                    ->native(false),

                SelectFilter::make('kategori')
                    ->relationship('kategori', 'nama_kategori')
                    ->label('Kategori')
                    ->native(false)
                    ->multiple()
                    ->preload()
                    ->searchable(),

                SelectFilter::make('siswa')
                    ->relationship('siswa', 'name')
                    ->label('Siswa')
                    ->native(false)
                    ->preload()
                    ->multiple()
                    ->searchable(),

                Filter::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->form([
                        DatePicker::make('created_from')
                            ->label('Tanggal Dibuat')
                            ->placeholder('Pilih tanggal awal')
                            ->native(false)
                            ->closeOnDateSelection(),
                        DatePicker::make('created_until')
                            ->label('Tanggal Dibuat')
                            ->placeholder('Pilih tanggal akhir')
                            ->native(false)
                            ->closeOnDateSelection(),
                    ])
                    ->columns(2)
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['created_from'] ?? null,
                                fn($q) => $q->whereDate('created_at', '>=', $data['created_from'])
                            )
                            ->when(
                                $data['created_until'] ?? null,
                                fn($q) => $q->whereDate('created_at', '<=', $data['created_until'])
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['created_from'] ?? null) {
                            $indicators['created_from'] = 'Dibuat dari: ' . \Carbon\Carbon::parse($data['created_from'])->translatedFormat('d M Y');
                        }
                        if ($data['created_until'] ?? null) {
                            $indicators['created_until'] = 'Dibuat sampai: ' . \Carbon\Carbon::parse($data['created_until'])->translatedFormat('d M Y');
                        }
                        return $indicators;
                    }),

                Filter::make('tanggal')
                    ->label('Tanggal Kejadian')
                    ->form([
                        DatePicker::make('tanggal_mulai')
                            ->label('Tanggal Kejadian')
                            ->placeholder('Pilih tanggal awal')
                            ->native(false)
                            ->closeOnDateSelection(),
                        DatePicker::make('sampai_tanggal')
                            ->label('Tanggal    Kejadian')
                            ->placeholder('Pilih tanggal akhir')
                            ->native(false)
                            ->closeOnDateSelection(),
                    ])
                    ->columns(2)
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['tanggal_mulai'] ?? null,
                                fn($q) => $q->whereDate('tanggal', '>=', $data['tanggal_mulai'])
                            )
                            ->when(
                                $data['sampai_tanggal'] ?? null,
                                fn($q) => $q->whereDate('tanggal', '<=', $data['sampai_tanggal'])
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['tanggal_mulai'] ?? null) {
                            $indicators['tanggal_mulai'] = 'Kejadian dari: ' . \Carbon\Carbon::parse($data['tanggal_mulai'])->translatedFormat('d M Y');
                        }
                        if ($data['sampai_tanggal'] ?? null) {
                            $indicators['sampai_tanggal'] = 'Kejadian sampai: ' . \Carbon\Carbon::parse($data['sampai_tanggal'])->translatedFormat('d M Y');
                        }
                        return $indicators;
                    }),

            ], FiltersLayout::AboveContent)
            ->filtersTriggerAction(
                fn($action) => $action
                    ->button()
                    ->label('Filter')
                    ->icon('heroicon-o-funnel'),
            )
            ->headerActions([
                ExportAction::make('aspirasi')
                    ->label('Ekspor Aspirasi')
                    ->exporter(AspirasiExporter::class)
                    ->modifyQueryUsing(
                        fn(\Illuminate\Database\Eloquent\Builder $query, $livewire)
                            => $livewire->getFilteredSortedTableQuery()
                    ),
                CreateAction::make()
                    ->label('Buat Aspirasi'),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Lihat Aspirasi')
                    ->before(function ($record) {
                        if ($record->status === 'pending') {
                            $record->update(['status' => 'ditinjau']);
                        }
                    }),

                TableAction::make('prosesAspirasi')
                    ->hidden(fn($record) => $record->status === 'selesai')
                    ->url(fn($record) => ProsesAspirasi::getUrl(['record' => $record])),
            ])
            ->emptyStateHeading('Tidak ada aspirasi')
            ->emptyStateDescription('Buat Aspirasi atau tidak ada dalam jangkauan filter anda!')
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
