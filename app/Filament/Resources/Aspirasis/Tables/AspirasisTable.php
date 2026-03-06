<?php

namespace App\Filament\Resources\Aspirasis\Tables;

use App\Filament\Exports\AspirasiExporter;
use App\Filament\Resources\Aspirasis\Pages\ProsesAspirasi;
use App\Models\Aspirasi;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Date;

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
                SelectColumn::make('status')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'proses' => 'Di Proses',
                        'selesai' => 'Selesai',
                    ])
                    ->native(false)
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->multiple()
                    ->options([
                        'menunggu' => 'Menunggu',
                        'proses' => 'Di Proses',
                        'selesai' => 'Selesai',
                    ])
                    ->multiple()
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
                    ->form([
                DateTimePicker::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->placeholder('Pilih tanggal'),])
            ], FiltersLayout::AboveContent)
            ->headerActions([
                 ExportAction::make('aspirasi')
                    ->label('Ekspor Aspirasi')
                    ->exporter(AspirasiExporter::class),
                CreateAction::make()
                ->label('Buat Aspirasi')
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Lihat Aspirasi'),

                Action::make('prosesAspirasi')
                    ->url(fn($record)=> ProsesAspirasi::getUrl(['record' => $record]))
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    \pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction::make()->exports([
                        \pxlrbt\FilamentExcel\Exports\ExcelExport::make('excel')->label('Export as Excel')->withFilename('Aspirasi-Bulk-' . date('Y-m-d')),
                        \pxlrbt\FilamentExcel\Exports\ExcelExport::make('pdf')
                            ->label('Export as PDF')
                            ->withFilename('Aspirasi-Bulk-' . date('Y-m-d') . '.pdf')
                            ->withWriterType(\Maatwebsite\Excel\Excel::DOMPDF ?? 'Dompdf'),
                    ]),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
