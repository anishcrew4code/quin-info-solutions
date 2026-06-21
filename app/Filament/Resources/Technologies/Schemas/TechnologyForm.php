<?php

namespace App\Filament\Resources\Technologies\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;

class TechnologyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('category')
                    ->options([
                        'frontend' => 'Frontend',
                        'backend' => 'Backend',
                        'database' => 'Database',
                        'devops' => 'Cloud & DevOps',
                    ])
                    ->required(),
                TextInput::make('brief')
                    ->maxLength(255),
                FileUpload::make('logo')
                    ->image()
                    ->directory('technologies')
                    ->imageEditor(),
                Toggle::make('status')
                    ->default(true),
            ]);
    }
}
