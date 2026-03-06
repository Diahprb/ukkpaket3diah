<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
// use Filament\Forms\Components\Section;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    public function filtersForm(Schema $form): Schema
    {
        return $form
            ->schema([
                ComponentsSection::make()
                    ->schema([
                        DatePicker::make('startDate')
                            ->native(false)
                            ->label('Tanggal Mulai')
                            ->maxDate(fn ($get) => current($form->getRawState() ?? []) ? ($form->getRawState()['endDate'] ?? now()) : now()),
                        DatePicker::make('endDate')
                            ->label('Tanggal Akhir')
                            ->native(false)
                            ->minDate(fn ($get) => current($form->getRawState() ?? []) ? ($form->getRawState()['startDate'] ?? null) : null)
                            ->maxDate(now()),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    protected function getFooterWidgets(): array
    {
        return [
            \App\FIlament\Widgets\RecapAspirasi::class,
            \App\FIlament\Widgets\AspirasiPerBulanChart::class,
            \App\FIlament\Widgets\AspirasiPerKategoriChart::class,
            \App\FIlament\Widgets\StatusAspirasiChart::class,
        ];
    }
}
