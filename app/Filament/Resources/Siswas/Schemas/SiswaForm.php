<?php

namespace App\Filament\Resources\Siswas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class SiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('nis'),
                TextInput::make('kelas'),
                TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->unique(ignoreRecord: true)
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->password()
                    ->required(fn ($operation) => $operation === 'create'),
                FileUpload::make('foto')
                    ->disk('public')
            ]);
    }
}
