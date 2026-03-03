<?php

namespace App\Filament\Resources\Aspirasis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('siswa_id')
                    ->label('Siswa')
                    ->required()
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->relationship('siswa', 'name'),
                Select::make('kategori_id')
                    ->required()
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->relationship('kategori', 'nama_kategori'),
                TextInput::make('judul')
                    ->required(),
                Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->native(false)
                    ->options(['menunggu' => 'Menunggu', 'proses' => 'Proses', 'selesai' => 'Selesai'])
                    ->default('menunggu')
                    ->required(),
                Textarea::make('feedback')
                    ->columnSpanFull(),
            ]);
    }
}
