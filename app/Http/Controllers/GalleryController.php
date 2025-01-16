<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{

    public function index()
    {
        // Retrieve events with their associated categories and images
        $events = Gallery::with('category') // Load the category relationship
            ->select('event', 'image', 'category_id') // Select only the required fields
            ->get();
    
        // Group by the event to ensure distinct events
        $groupedEvents = $events->groupBy('event');
        
        // Map the grouped events to get the first category and image
        $datas = $groupedEvents->map(function ($eventGroup) {
            // Get the category name from the related category model
            $category = $eventGroup->first()->category;  // Fallback if no category exists
            
            // Return the event, category, and first image
            return [
                'event' => $eventGroup->first()->event,
                'categories' => $category, // Access the category name
                'image' => $eventGroup->first()->image, // Assuming first image of the group
            ];
        });
    
        // Return the view with the data
        return view('Pages.Gallery.galleries', compact('datas'));
    }
    




    public function showEvent($event)
    {
        // Fetch images with the specified event
        $images = Gallery::where('event', $event)->get();
        
        // dd($images);
        // Return the view with the images and event
        return view('Pages.Gallery.gallery', [
            'event' => $event,
            'images' => $images,
        ]);

    }

    // public function showLatest(){

    //     $latestImages = Gallery::latest()->take(5)->get();
    //     dd($latestImages);
    //     return view('welcome', compact('latestImages'));
    // }


}
