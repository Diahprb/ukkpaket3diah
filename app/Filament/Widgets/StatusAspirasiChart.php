<?php

namespace App\Filament\Widgets;

use App\Models\Aspirasi;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Facades\DB;

class StatusAspirasiChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected ?string $heading = 'Status Aspirasi Saat Ini';

    protected function getData(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        $query = Aspirasi::select('status', DB::raw('count(*) as total'))
            ->groupBy('status');

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        $data = $query->get();

        $statuses = $data->pluck('status')->toArray();
        $counts = $data->pluck('total')->toArray();

        // Mapping labels to correct capitalized string
        $labels = array_map(function ($status) {
            return ucfirst($status);
        }, $statuses);

        return [
            'datasets' => [
                [
                    'label' => 'Total',
                    'data' => $counts,
                    'backgroundColor' => [
                        '#FFA500', // Menunggu -> Orange
                        '#36A2EB', // Proses -> Blue
                        '#4BC0C0', // Selesai -> Green
                    ],
                ]
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
