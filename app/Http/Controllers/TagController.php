<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreTagsRequest;
// use App\Http\Requests\UpdateTagsRequest;
use App\Models\Story;
use App\Models\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function storyList(Story $story)
    {
        $tags = $story->tags()->get();
        $inStory = $tags->pluck('id')->toArray();
        $addTags = Tag::whereNotIn('id', $inStory)->get();
        

        // $tags = Tags::orderBy('id', 'desc')->get();
        $html = view('tags.add-list')->with(['tags'=>$tags, 'addTags'=>$addTags, 'story'=>$story])->render(); //'tags' => $tags
        return response()->json([
            'html' => $html,
            'status' => 'success'
        ]);
    }    

    public function storyAddTag( Story $story, Request $request)
    {
        dump($story);
        $requestData = $request->json()->all();
        // $storyId = $requestData['story'];
        // $story = Stories::find($storyId);
        dump($requestData);
        $tag = Tag::firstOrCreate([
            'name' => $requestData['tag']
        ]);
        $story->tags()->attach($tag);

        $tags = $story->tags()->get();
        $inStory = $tags->pluck('id')->toArray();
        $addTags = Tag::whereNotIn('id', $inStory)->get();
        
        // $tags = Tags::orderBy('id', 'desc')->get();
        $html = view('tags.add-list')->with(['tags'=>$tags, 'addTags'=>$addTags, 'story'=>$story])->render(); //'tags' => $tags
        return response()->json([
            'html' => $html,
            'status' => 'success'
        ]);
    }    

    public function storyRemoveTag( Story $story,  $tag)
    {   
        // dump($stories);
        // dump($tag);
        $tagas = Tag::where('name', $tag)->first();
        $story->tags()->detach($tagas);

        $tagai = $story->tags()->get();
        $inStory = $tagai->pluck('id')->toArray();
        $addTags = Tag::whereNotIn('id', $inStory)->get();
        
        // $tags = Tags::orderBy('id', 'desc')->get();
        $html = view('tags.add-list')->with(['tags'=>$tagai, 'addTags'=>$addTags, 'story'=>$story])->render(); //'tags' => $tags
        return response()->json([
            'html' => $html,
            'status' => 'success'
        ]);
    }    

    public function List(Story $story)
    {
        $tags = $story->tags()->get();
        // $tags = Tags::orderBy('id', 'desc')->get();
        $html = view('tags.list')->with(['tags'=>$tags])->render(); //'tags' => $tags
        return response()->json([
            'html' => $html,
            'status' => 'success'
        ]);
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
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tags)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tags)
    {
        //
    }
}
