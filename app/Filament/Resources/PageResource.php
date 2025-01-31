<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Halaman')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Halaman')
                            ->required(),
                        SpatieMediaLibraryFileUpload::make('page_about')
                            ->label('Cover Page About')
                            ->required()
                            ->collection('cover-page-about'),
                        SpatieMediaLibraryFileUpload::make('page_contact')
                            ->label('Cover Page Contact')
                            ->required()
                            ->collection('cover-page-contact'),
                        SpatieMediaLibraryFileUpload::make('page_promot')
                            ->label('Cover Page Promotion')
                            ->required()
                            ->collection('cover-page-promot'),
                    ]),
            ]);
    }

    public static function getNavigationUrl(): string
    {
        $page = Page::first();

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
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }

    public static function getNavigationRoute(): string
    {
        $page = Page::first();

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
