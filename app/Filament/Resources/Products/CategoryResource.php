<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\CategoryResource\Pages;
use App\Filament\Resources\Products\CategoryResource\RelationManagers;
use App\Models\Products\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Slug;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $navigationGroup = 'Product';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                Toggle::make('active')
                    ->default(true),
                SpatieMediaLibraryFileUpload::make('image')
                    ->label('image')
                    ->required()
                    ->collection('category'),
                    Select::make('div_class')
                    ->options([
                        1 => 'Class 1',
                        2 => 'Class 2',
                        3 => 'Class 3',
                    ])
                    ->required(),
        
                Select::make('div_garis')
                    ->options([
                        1 => 'Vertical Line',
                        2 => 'Horizontal Line',
                    ])
                    ->required(),
        
                TextInput::make('col_span')
                    ->numeric()
                    ->default(1)
                    ->required(),
        
                TextInput::make('row_span')
                    ->default(1)
                    ->numeric()
                    ->required(),
                TextInput::make('text_color')
                    ->required(),
                TextInput::make('order')
                    ->label('Order')
                    ->default(1)
                    ->numeric()
                    ->required(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('slug'),
                IconColumn::make('active')
                    ->boolean(),
                // SpatieMediaLibraryImageColumn::make('image')
                //     ->collection('category')
                //     ->label('Category Image'),  
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
