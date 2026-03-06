<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

app()->bind(\Illuminate\Contracts\Auth\Authenticatable::class, \App\Models\Admin::class);

$export = \Filament\Actions\Exports\Models\Export::latest('id')->first();
$admin = \App\Models\Admin::find(1);

var_dump($export->user()->is($admin));
