<?php

namespace App\Filament\Resources\Aspirasis\Pages;

use App\Filament\Resources\Aspirasis\AspirasiResource;
use App\Filament\Widgets\RecapAspirasi;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAspirasis extends ListRecords
{
    protected static string $resource = AspirasiResource::class;
    protected ?string $heading = 'Daftar Aspirasi';
    protected static ?string $breadcrumb = 'Daftar Aspirasi';

    protected function getHeaderActions(): array
    {
        return [
            \pxlrbt\FilamentExcel\Actions\Pages\ExportAction::make()
                ->label('Export Data')
                ->color('success')
                ->icon('heroicon-o-document-arrow-down')
                ->exports([
                    \pxlrbt\FilamentExcel\Exports\ExcelExport::make('excel')->label('Export as Excel')->withFilename('Aspirasi-' . date('Y-m-d')),
                    \pxlrbt\FilamentExcel\Exports\ExcelExport::make('pdf')
                        ->label('Export as PDF')
                        ->withFilename('Aspirasi-' . date('Y-m-d') . '.pdf')
                        ->withWriterType(\Maatwebsite\Excel\Excel::DOMPDF ?? 'Dompdf'),
                ]),
            CreateAction::make()
                ->label('Buat Aspirasi')
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            RecapAspirasi::class
        ];
    }
}
