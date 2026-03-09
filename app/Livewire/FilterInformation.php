<?php

namespace App\Livewire;

use Filament\Widgets\Widget;

class FilterInformation extends Widget
{
    protected string $view = 'livewire.filter-information';
    protected int | string | array $columnSpan = 'full';
}
