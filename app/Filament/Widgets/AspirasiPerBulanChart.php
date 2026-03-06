<?php

namespace App\Filament\Widgets;

use App\Models\Aspirasi;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AspirasiPerBulanChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected ?string $heading = 'Trend Aspirasi per Bulan (Tahun Ini)';

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;

        $query = Aspirasi::select('id', 'created_at');

        // Let's filter by the selected year if startDate/endDate exist
        // Default to current year if no filter selected
        if ($startDate && $endDate) {
            $query->whereDate('created_at', '>=', $startDate)
                  ->whereDate('created_at', '<=', $endDate);
        } elseif ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        } elseif ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        } else {
            $query->whereYear('created_at', Carbon::now()->year);
        }

        $data = $query->get();

        $months = [];
        $totals = [];

        // Inisialisasi array dengan 12 bulan (nilai 0)
        for ($i = 1; $i <= 12; $i++) {
            $monthFormatted = sprintf('%02d', $i);
            $months[$monthFormatted] = Carbon::create()->month($i)->translatedFormat('F');
            $totals[$monthFormatted] = 0;
        }

        // Count per month
        foreach ($data as $item) {
            $month = $item->created_at->format('m');
            $totals[$month]++;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Aspirasi',
                    'data' => array_values($totals),
                    'borderColor' => '#9BD0F5',
                    'backgroundColor' => '#36A2EB',
                ],
            ],
            'labels' => array_values($months),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
