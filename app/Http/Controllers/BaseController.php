<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Store an image file and return the path
     *
     * @param mixed $image The uploaded image
     * @param string $title The title to use for the filename
     * @param string|null $oldImagePath Path to old image to be deleted
     * @return string The stored image path
     */
    protected function storeImage($image, string $title, ?string $oldImagePath = null, string $path = 'books/covers'): string
    {
        // Delete old image if it exists
        if ($oldImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }

        // Generate filename using title
        $filename = Str::slug($title) . '-' . time() . '.' . $image->getClientOriginalExtension();

        // Store in year/month structure


        // save images in different paths
      return $image->storeAs(
        $path . '/' . date('Y/m'),
        $filename,
        'public'
      );
    }
}
