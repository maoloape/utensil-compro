<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\Content\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('about_title')
                    ->label('About Title'),
                Forms\Components\RichEditor::make('about_content')
                    ->label('About Content'),
                Forms\Components\RichEditor::make('about_tag')
                    ->label('About Tag'),
            ]);
    }

    public static function getNavigationUrl(): string
    {
        $page = About::first();

        if ($page) {
            return static::getUrl('edit', ['record' => $page]);
        } else {
            return static::getUrl('create');
        }
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\IndexPage::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }

    public static function getNavigationRoute(): string
    {
        $page = About::first();

        return $page
            ? static::getUrl('edit', ['record' => $page])
            : static::getUrl('create');
    }

    public static function table(Table $table): Table
    {
        // Kembalikan table kosong
        return $table->columns([])->filters([])->actions([]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery();
    }
}
