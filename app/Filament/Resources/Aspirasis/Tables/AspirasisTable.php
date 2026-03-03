<?php

namespace App\Filament\Resources\Aspirasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Date;

class AspirasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
        TextColumn::make('siswa.name')
                    ->label('Siswa')
                    ->searchable()
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kategori.nama_kategori')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
                SelectColumn::make('status')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'proses' => 'Di Proses',
                        'selesai' => 'Selesai',
                    ])
                    ->native(false)
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->multiple()
                    ->options([
                        'menunggu' => 'Menunggu',
                        'proses' => 'Di Proses',
                        'selesai' => 'Selesai',
                    ])
                    ->multiple()
                    ->native(false),

                SelectFilter::make('kategori')
                    ->relationship('kategori', 'nama_kategori')
                    ->label('Kategori')
                    ->multiple()
                    ->searchable(),

                SelectFilter::make('siswa')
                    ->relationship('siswa', 'name')
                    ->label('Siswa')
                    ->multiple()
                    ->searchable(),

                Filter::make('created_at')
                    ->form([
                DateTimePicker::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->placeholder('Pilih tanggal'),])
            ], FiltersLayout::AboveContent)
            ->toolbarActions([

            ])
            ->recordActions([
                EditAction::make(),
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
