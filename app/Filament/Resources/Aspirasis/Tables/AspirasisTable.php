<?php

namespace App\Filament\Resources\Aspirasis\Tables;

use App\Filament\Exports\AspirasiExporter;
use App\Filament\Resources\Aspirasis\Pages\ProsesAspirasi;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Actions\Action as TableAction;
use Filament\Forms\Components\DatePicker;
use Filament\Support\Colors\Color;
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
                    ->multiple()
                    ->preload()
                    ->searchable(),

                SelectFilter::make('siswa')
                    ->relationship('siswa', 'name')
                    ->label('Siswa')
                    ->preload()
                    ->multiple()
                    ->searchable(),

                Filter::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->form([
                        DatePicker::make('created_at')
                            ->label('Tanggal Dibuat')
                            ->placeholder('Pilih tanggal')
                            ->native(false)
                            ->closeOnDateSelection(),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when(
                            $data['created_at'] ?? null,
                            fn($q) => $q->whereDate('created_at', $data['created_at'])
                        );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['created_at'] ?? null) {
                            $indicators['created_at'] = 'Dibuat pada: ' . \Carbon\Carbon::parse($data['created_at'])->translatedFormat('d M Y');
                        }
                        return $indicators;
                    }),

                Filter::make('tanggal')
                    ->label('Tanggal Kejadian')
                    ->form([
                        DatePicker::make('tanggal')
                            ->label('Tanggal Kejadian')
                            ->placeholder('Pilih tanggal')
                            ->native(false)
                            ->closeOnDateSelection(),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when(
                            $data['tanggal'] ?? null,
                            fn($q) => $q->whereDate('tanggal', $data['tanggal'])
                        );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['tanggal'] ?? null) {
                            $indicators['tanggal'] = 'Kejadian pada: ' . \Carbon\Carbon::parse($data['tanggal'])->translatedFormat('d M Y');
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
