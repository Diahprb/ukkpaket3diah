<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Aspirasi;

class RecapAspirasi extends StatsOverviewWidget
{

    protected int | string | array $columnSpan = 3;

    protected function getStats(): array
    {
        $totalAspirasi = Aspirasi::count();
        $aspirasiTerkirim = Aspirasi::whereNotNull('created_at')->count();
        $aspirasiBelumTerkirim = Aspirasi::whereNull('created_at')->count();

        return [
            Stat::make('Total Aspirasi', $totalAspirasi),
            Stat::make('Aspirasi Terkirim', $aspirasiTerkirim),
            Stat::make('Aspirasi Belum Terkirim', $aspirasiBelumTerkirim),
        ];
    }
}
