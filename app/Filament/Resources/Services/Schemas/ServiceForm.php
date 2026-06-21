<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('icon')
                    ->placeholder('e.g., fas fa-code')
                    ->maxLength(255),
                Textarea::make('description')
                    ->required()
                    ->rows(4),
                Toggle::make('status')
                    ->default(true),
            ]);
    }
}
