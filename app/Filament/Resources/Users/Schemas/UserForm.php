<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make()->schema([
                    TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
    ->password()
    ->required(fn (string $operation): bool => $operation === 'create')
    ->dehydrateStateUsing(function (?string $state, callable $get) {
        // Only hash if state is filled
        return filled($state) ? Hash::make($state) : null;
    })
    ->dehydrated(fn (?string $state): bool => filled($state))

                ,
                  Select::make('roles')
                        ->multiple()
                        ->relationship(name: 'roles', titleAttribute: 'name')
                        ->searchable()
                        ->preload(),
                  Select::make('permissions')
                        ->multiple()
                        ->relationship(name: 'permissions', titleAttribute: 'name')
                        ->searchable()
                        ->preload()

,
                ])->columns(2)
                ->columnSpanFull(),
                
            ]);
    }
}
