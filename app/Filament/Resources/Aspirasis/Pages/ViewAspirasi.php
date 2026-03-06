<?php

namespace App\Filament\Resources\Aspirasis\Pages;

use App\Filament\Resources\Aspirasis\AspirasiResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewAspirasi extends ViewRecord
{
    protected static string $resource = AspirasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Action::make()
            //     ->url(fn() => ),
        ];
    }
}
