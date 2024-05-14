<?php

namespace App\Http\Controllers;

use App\Http\Requests\Image\StoreImageRequest;
use CloudinaryLabs\CloudinaryLaravel\Model\Media;
use CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request): Response
    {
        $path = $request
            ->validated('image')
            // ->bytepoint()
            ->storePublicly('logos', 'public');

        return response($path, 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request): StreamedResponse
    {
        $path = $request->query('path', '');

        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        return Storage::disk('public')->download($path, Str::afterLast($path, '/'), [
            'Content-Disposition' => 'inline',
            'filename' => Str::afterLast($path, '/'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): Response
    {
        $media = $request->query('media');

        if (Storage::exists($media)) {
            Storage::delete($media);

            return response()->noContent();
        }

        $media = Media::where('file_url', $media)->firstOrFail();

        resolve(CloudinaryEngine::class)->destroy($media->getFileName());

        $media->delete();

        return response()->noContent();
    }
}
