<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandlesImages
{
    // handling images for upload
    protected function storeImage(UploadedFile $file, string $title, ?string $oldImage = null):string
    {
        if ($oldImage) {
            Storage::delete($oldImage);
        }

        return $file->store('covers', 'public');
    }
}
