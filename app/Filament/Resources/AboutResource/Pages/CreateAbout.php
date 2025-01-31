<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use App\Models\Content\About;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateAbout extends CreateRecord
{
    protected static string $resource = AboutResource::class;

    protected static bool $canCreateAnother = false;

    public function store()
    {
        $this->validate();

        $page = About::create([
            'about_title' => $this->about_title,
            'about_content' => $this->about_content,
            'about_tag' => $this->about_tag,
        ]);

        Notification::make()
            ->title('Halaman berhasil dibuat')
            ->success()
            ->send();

        return redirect()->route('filament.resources.pages.edit', ['record' => $page->id]);
    }
}
