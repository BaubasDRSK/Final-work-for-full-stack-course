<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreStoriesRequest;
// use App\Http\Requests\UpdateStoriesRequest;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $stories = Story::select('stories.*')->paginate(2)->withQueryString();
        return view('stories.index', [
            'stories' => $stories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stories.new');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|regex:/^[a-zA-Z0-9\s?!@.,]+$/',
                'story' => 'required|string|min:1|max:500',
                'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
                'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            ],
            []
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $story = new Story();
        $story->author_id = Auth::id();
        $story->title = $request->title;
        $story->story = $request->story;
        $story->goal_amount = $request->amount;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $story['main_img'] = $filename;
        }

        $story->save();
        return redirect()->route('stories-edit', [$story])->with('success','Story was added');

        // return redirect()->route('stories-index')->with('success', 'Storie was edited');


    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        return view('stories.edit', [
            'story' => $story
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|regex:/^[a-zA-Z0-9\s?!@.,]+$/',
                'story' => 'required|string|min:1|max:500',
                'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
                'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            ],
            []
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $story->author_id = Auth::id();
        $story->title = $request->title;
        $story->story = $request->story;
        $story->goal_amount = $request->amount;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $story['main_img'] = $filename;
        }

        $story->save();
        return redirect()->route('stories-index')->with('success', 'Storie was edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        //
    }
}
