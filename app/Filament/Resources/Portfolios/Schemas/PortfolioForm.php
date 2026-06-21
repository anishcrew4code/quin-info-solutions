<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image')
                    ->image()
                    ->directory('portfolios')
                    ->required()
                    ->imageEditor(),
                Textarea::make('description')
                    ->rows(4),
                TextInput::make('url')
                    ->url()
                    ->maxLength(255),
                Toggle::make('status')
                    ->default(true),
            ]);
    }
}
