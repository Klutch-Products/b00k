<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 *
 */
class BaseController extends Controller
{
    /**
     * @param $image
     * @param $title
     * @param $oldImagePath
     * @return mixed
     */
    protected function storeImage($image, $title, $oldImagePath = null)
    {
        if ($oldImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }

        $extension = $image->getClientOriginalExtension();
        $filename = Str::slug($title) . '.' . $extension;

        // Check if a file with this name already exists
        $counter = 1;
        while (Storage::disk('public')->exists('book-covers/' . $filename)) {
            $filename = Str::slug($title) . '-' . $counter . '.' . $extension;
            $counter++;
        }

        $path = $image->storeAs('book-covers', $filename, 'public');
        return $path;
    }
}
