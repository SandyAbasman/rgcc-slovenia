<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

use Filament\Forms\Components\ColorPicker;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, Set $set) {
                    $set('slug', Str::slug($state));
                }),
                TextInput::make('slug')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                 ColorPicker::make('color')
                    ->required()
                    ->default('#3b82f6'),
            ]);
    }
}
