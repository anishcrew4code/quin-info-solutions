<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->disabled(),
                TextInput::make('email')
                    ->disabled(),
                TextInput::make('phone')
                    ->disabled(),
                TextInput::make('subject')
                    ->disabled(),
                TextInput::make('reference_name')
                    ->disabled(),
                Textarea::make('message')
                    ->disabled()
                    ->rows(6),
            ]);
    }
}
