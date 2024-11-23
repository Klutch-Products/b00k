<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait HandlesImages
{
    /**
     * Store an image file and return the path
     *
     * @param mixed $image The uploaded image (can be UploadedFile or other)
     * @param string $title The title to use for the filename
     * @param string|null $oldImagePath Path to old image to be deleted
     * @return string The stored image path
     */
    protected function storeImage($image, string $title, ?string $oldImagePath = null): string
    {
        // Delete old image if it exists
        if ($oldImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }

        // Generate filename using title
        $filename = Str::slug($title) . '-' . time() . '.' . $image->getClientOriginalExtension();

        // Store in year/month structure
        $path = $image->storeAs(
            'books/covers/' . date('Y/m'),
            $filename,
            'public'
        );

        return $path;
    }
}
