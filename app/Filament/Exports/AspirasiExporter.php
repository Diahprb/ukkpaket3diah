<?php

namespace App\Filament\Exports;

use App\Models\Aspirasi;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class AspirasiExporter extends Exporter
{
    protected static ?string $model = Aspirasi::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('siswa.nama')
                ->label('Nama Siswa'),

            ExportColumn::make('kategori.nama')
                ->label('Kategori'),

            ExportColumn::make('judul')
                ->label('Judul'),

            ExportColumn::make('keterangan')
                ->label('Keterangan'),

            ExportColumn::make('status')
                ->label('Status'),

            ExportColumn::make('feedback')
                ->label('Feedback'),

            ExportColumn::make('created_at')
                ->label('Tanggal Dibuat')
                ->formatStateUsing(fn ($state) => $state->format('d-m-Y')),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your aspirasi export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
