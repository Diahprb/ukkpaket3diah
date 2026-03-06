<?php

namespace App\Filament\Widgets;

use App\Models\Aspirasi;
use App\Models\Kategori;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Facades\DB;

class AspirasiPerKategoriChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected ?string $maxHeight = '400px';

    protected ?string $heading = 'Aspirasi berdasarkan Kategori';

    protected function getData(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        // Mendapatkan data kategori beserta jumlah aspirasinya
        $data = Kategori::withCount(['aspirasis' => function ($query) use ($startDate, $endDate) {
            if ($startDate) {
                $query->whereDate('created_at', '>=', $startDate);
            }
            if ($endDate) {
                $query->whereDate('created_at', '<=', $endDate);
            }
        }])
        ->having('aspirasis_count', '>', 0)
        ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Total Aspirasi',
                    'data' => $data->pluck('aspirasis_count')->toArray(),
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF',
                        '#FF9F40',
                    ],
                ]
            ],
            'labels' => $data->pluck('nama_kategori')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
