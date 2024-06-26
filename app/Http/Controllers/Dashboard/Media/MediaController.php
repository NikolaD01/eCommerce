<?php

namespace App\Http\Controllers\Dashboard\Media;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Services\Media\MediaService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    protected MediaService $mediaService;
    public function __construct()
    {
        $this->mediaService = app(MediaService::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.media.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $media)
    {
        $this->mediaService->deleteMedia($media);
        return back()->with('success', 'Media deleted');
        //
    }
}
