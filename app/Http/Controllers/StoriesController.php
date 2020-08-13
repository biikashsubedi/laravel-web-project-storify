<?php

namespace App\Http\Controllers;

use App\Events\StoryCreated;
use App\Events\StoryEdited;
use App\Mail\NewStoryNotification;
use App\Story;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\StoryRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->authorizeResource(Story::class, 'story');
    }

    public function index()
    {
        $stories = Story::where('user_id', auth()->user()->id)
            ->orderby('id', 'DESC')
            ->paginate(5);
        return view('stories.index', [
            'stories' => $stories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $story = new Story;
////        IN CASE YOU HAVE NOT CONSTRUCT FUNCTION THIS ALSO WORK
//        $this->authorize('create');
        return view('stories.create', [
            'story' => $story
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        $story = auth()->user()->stories()->create($request->all());
//        Mail::send(new NewStoryNotification($story->title));
//        Log::info('New Email Send after creating title:'. $story->title);

        if ($request->hasFile('image')) {
            $this->_uploadimage($request, $story);
        }

        event(new StoryCreated($story->title));
        return redirect()->route('stories.index')->with('msg', 'Story Created Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Story $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        return view('stories.show', [
            'story' => $story
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Story $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
////        USING GATE FOR VALIDATION
//        Gate::authorize('edit-story', $story);
        return view('stories.edit', [
            'story' => $story
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Story $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request, Story $story)
    {
        $story->update($request->all());

        if ($request->hasFile('image')){
            $this->_uploadimage($request, $story);
        }

        event(new StoryEdited($story->title));
        return redirect()->route('stories.index')->with('msg', 'Story Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Story $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('stories.index')->with('msg', 'Srory Successfully Deleted!');
    }

    private function _uploadimage($request, $story)
    {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(255, 100)->save(public_path('storage/' . $filename));
        $story->image = $filename;
        $story->save();
    }
}
