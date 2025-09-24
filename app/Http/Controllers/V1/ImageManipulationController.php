<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResizeImageRequest;
use App\Http\Requests\UpdateImageManipulationRequest;
use App\Models\Album;
use App\Models\ImageManipulation;

class ImageManipulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    
    /**
     * Display images by album
     */
    public function byAlbum(Album $album)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function resize(ResizeImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ImageManipulation $imageManipulation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImageManipulation $imageManipulation)
    {
        //
    }
}
