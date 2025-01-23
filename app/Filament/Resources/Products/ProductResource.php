<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\ProductResource\Pages;
use App\Filament\Resources\Products\ProductResource\RelationManagers;
use App\Models\Products\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Slug;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationGroup = 'Product';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('name')
                        ->label('Product Name')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('type')
                        ->label('Product Type')
                        ->required()
                        ->maxLength(255),
                    Repeater::make('detail')
                        ->schema([
                            TextInput::make('art')->label('Art.')->required(),
                            TextInput::make('detail')->label('Detail')->required(),
                        ])
                        ->columns(2)
                        ->defaultItems(1)
                        ->minItems(1)
                        ->maxItems(10)
                        ->afterStateUpdated(function ($state, callable $set) {
                            if (is_array($state)) {
                                $set('detail', $state);
                            } else {
                                $set('detail', []);
                            }
                        })
                ])->columnSpan([
                    'sm' => 12,
                    'md' => 8,
                ]),
                Grid::make(1)->schema([
                    Section::make()->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->label('Product Image')
                            ->required()
                            ->collection('products'),
                        Toggle::make('active')
                            ->default(true),
                    ]),
                    Section::make()->schema([
                        Select::make('brand_id')
                            ->relationship('brand', 'name')
                            ->required(),
                        CheckboxList::make('categories')
                            ->relationship('categories', 'name'),
                    ]),
                ])->columnSpan([
                    'sm' => 12,
                    'md' => 4,
                ]),
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Product'),
                TextColumn::make('brand.name')->label('Brand'),
                TextColumn::make('categories.name')
                ->label('Categories'),
                IconColumn::make('active')
                    ->boolean(),
                // SpatieMediaLibraryImageColumn::make('image')
                //     ->collection('products')
                //     ->label('Product Image'),            
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
