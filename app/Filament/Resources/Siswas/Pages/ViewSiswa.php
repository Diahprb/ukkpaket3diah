<?php

namespace App\Filament\Resources\Siswas\Pages;

use App\Filament\Resources\Siswas\SiswaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Database\Eloquent\Model;

class ViewSiswa extends ViewRecord
{
    protected static string $resource = SiswaResource::class;

    protected string $view = 'filament.pages.siswa.view';

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    protected function resolveRecord(int|string $key): Model
    {
        $record = parent::resolveRecord($key);

        // eager-load aspirasis with kategori, ordered latest first
        $record->load(['aspirasis' => function ($q) {
            $q->latest()->with('kategori');
        }]);

        return $record;
    }

}
