<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{

    public function index()
    {
        $medias = Media::all();
        return view('admin.media.upload', compact('medias'));
    }
    public function store(Request $request)
    {
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');


            $media = Media::create([
                'filename' => $filename,
                'path' => $path,
                'url' => asset("storage/{$path}")
            ]);

            return response()->json(['message' => 'Upload successful', 'media' => $media], 201);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function load(Request $request)
    {
        // Get search query and start for pagination
        $query = $request->input('query');
        $start = $request->input('start');
        $limit = $request->input('limit');
        $selectableType = $request->input('selectable_type');

        // Query the database for media items, optionally filter by query
        $mediaQuery = Media::query();

        if ($query) {
            $mediaQuery->where('filename', 'like', "%$query%");
        }

        // Paginate results with the specified limit
        $mediaItems = $mediaQuery->skip($start)->take($limit)->get();

        // Prepare the media items for response
        $html = '';

        foreach ($mediaItems as $media) {
            $imageUrl = $media->url;  // Use the media URL
            $fullImagePath = asset('storage/' . $media->path); // Construct the full image path

            // Example condition to toggle between radio and checkbox
            $inputType = ($selectableType === 'radio') ? 'radio' : 'checkbox';

            // Construct HTML for each media item with data-image-path attribute
            $html .= "
        <div class='col-sm-2 col-6 mb-3 media-item' 
             id='media-item{$media->id}' 
             data-image-path='{$fullImagePath}'>  <!-- Add the data-image-path attribute -->
            
            <style>
                .media-image{$media->id} {
                    background-image: url('{$imageUrl}');
                    min-height: 20vh;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                }
            </style>

            <a href='javascript:void(0);' 
               class='btn-media-item form-check-label' 
               data-id='{$media->id}'>
               
                <div class='card thumbnail h-100 media-image{$media->id}'>
                    <div class='text-left p-1'>
                        <input type='{$inputType}' 
                               name='media_id" . ($inputType === 'checkbox' ? '[]' : '') . "' 
                               class='select-media' 
                               id='media_id{$media->id}' 
                               value='{$media->path}' 
                               data-column='featureimage' 
                               data-media-url='{$imageUrl}'>
                    </div>
                </div>
            </a>
        </div>";
        }

        // Return the HTML content to append or replace in the front-end
        return response()->json(['html' => $html]);
    }
}
