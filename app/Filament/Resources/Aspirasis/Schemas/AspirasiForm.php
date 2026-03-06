<?php

namespace App\Filament\Resources\Aspirasis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('BuatAspirasi')
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('siswa_id')
                                    ->label('Siswa')
                                    ->required()
                                    ->native(false)
                                    ->preload()
                                    ->columnSpan(1)
                                    ->searchable()
                                    ->relationship('siswa', 'name'),
                                Select::make('kategori_id')
                                    ->required()
                                    ->columnSpan(1)
                                    ->native(false)
                                    ->preload()
                                    ->searchable()
                                    ->relationship('kategori', 'nama_kategori'),
                                TextInput::make('judul')
                                    ->required(),
                                 Select::make('status')
                                    ->native(false)
                                    ->options(['menunggu' => 'Menunggu', 'proses' => 'Proses', 'selesai' => 'Selesai'])
                                    ->default('menunggu')
                                    ->required(),
                                Textarea::make('keterangan')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('feedback')
                                    ->columnSpanFull(),
                                FileUpload::make('bukti_lapor')
                                    ->directory('bukti_lapor')
                                    ->disk('public'),
                                FileUpload::make('bukti_hasil')
                                    ->directory('bukti_hasil')
                                    ->disk('public'),
                            ])
                    ])
            ]);
    }
}
