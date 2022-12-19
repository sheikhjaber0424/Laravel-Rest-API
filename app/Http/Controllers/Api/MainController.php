<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainRequest;
use App\Http\Resources\ImageResource;
use App\Models\PublicImg;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PublicImg::paginate(3);
        return ImageResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainRequest $request)
    {
        $valid = $request->validated();


        if ($request->hasFile('image'))
            $valid['image'] = $request->file('image')->store('uploads/img', 'public');

        $img = PublicImg::create($valid);
        if ($img)
            return response()->json(['message' => 'File Created successfully', 'data' => new ImageResource($img)]);

        return response()->json(['error' => 'Something went wrong'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ImageResource(PublicImg::findOrFail($id));
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MainRequest $request, $img)
    {
        $valid = $request->validated();

        $img = PublicImg::findOrfail($img);

        if ($request->hasFile('image'))
            $valid['image'] = $request->file('image')->store('uploads/img', 'public');


        if ($img->update($valid))
            return response()->json(['message' => 'File updated successfully', 'data' => new ImageResource($img->fresh())]);

        return response()->json(['error' => 'Something went wrong'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($img)
    {
        $img = PublicImg::findOrfail($img);

        if ($img->delete())
            return response()->json(['message' => 'File delete successfully']);
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}