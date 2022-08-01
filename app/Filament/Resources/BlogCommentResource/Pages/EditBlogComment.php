<?php

namespace App\Filament\Resources\BlogCommentResource\Pages;

use App\Filament\Resources\BlogCommentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogComment extends EditRecord
{
    protected static string $resource = BlogCommentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
