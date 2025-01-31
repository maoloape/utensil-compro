<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Models\Page;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    protected static bool $canCreateAnother = false;

    public function store()
    {
        $this->validate();

        $page = Page::create([
            'title' => $this->title,
            // Tambahkan atribut lainnya sesuai kebutuhan
        ]);

        Notification::make()
            ->title('Halaman berhasil dibuat')
            ->success()
            ->send();

        return redirect()->route('filament.resources.pages.edit', ['record' => $page->id]);
    }
}
