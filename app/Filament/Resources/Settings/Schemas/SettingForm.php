<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->required()
                    ->live(),
                
                \Filament\Forms\Components\Toggle::make('is_image')
                    ->label('Mode Gambar (Aktifkan jika ingin mengunggah foto)')
                    ->live()
                    ->dehydrated(false)
                    ->afterStateHydrated(function (\Filament\Forms\Components\Toggle $component, $state, $record) {
                        if ($record && str_ends_with($record->key, '_image')) {
                            $component->state(true);
                        }
                    }),
                    
                Textarea::make('text_value')
                    ->label('Isi Teks / Konten')
                    ->hidden(fn ($get) => $get('is_image'))
                    ->formatStateUsing(fn ($record) => $record?->value)
                    ->dehydrated(false)
                    ->columnSpanFull(),
                    
                \Filament\Forms\Components\FileUpload::make('file_value')
                    ->label('Unggah Gambar')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('1920')
                    ->hidden(fn ($get) => ! $get('is_image'))
                    ->formatStateUsing(fn ($record) => $record?->value)
                    ->dehydrated(false)
                    ->columnSpanFull(),
                    
                \Filament\Forms\Components\Hidden::make('value')
                    ->dehydrateStateUsing(function ($get) {
                        return $get('is_image') ? $get('file_value') : $get('text_value');
                    })
            ]);
    }
}
