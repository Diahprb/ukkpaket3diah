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

    protected function getHeaderWidgets(): array
    {
        return [
            RecapAspirasi::class
        ];
    }
}
