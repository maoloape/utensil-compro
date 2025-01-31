<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Models\Page;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
        static::authorizeResourceAccess();
        $this->fillForm();
    }

    public function getRecord(): Page
    {
        return $this->record;
    }

    public function resolveRecord(int|string $record): Page
    {
        return Page::find($record);
    }

}

