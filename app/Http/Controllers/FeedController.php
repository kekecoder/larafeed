<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('feeds.index', [
            'feeds' => Feed::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:280',
            'upload_img' => 'image|mimes:png,jpg,jpeg,gif,svh|max:2048'
        ]);

        if (!$request->file('upload_img')) {
            $path = null;
        } else {
            $path = $request->file('upload_img')->store('upload_img', 'public');
        }

        $valid = new Feed();
        $valid->description = $request['description'];
        $valid->upload_img = $path;
        $valid->save();

        return redirect('/feeds')->with('success', "Story added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function show($feed)
    {
        //
        return view('feeds.feed', [
            'feed' => Feed::findOrFail($feed)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(Feed $feed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feed $feed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy($feed)
    {
        //
        $feed = Feed::findOrFail($feed);
        $feed->delete();

        return redirect('/feeds')->with('delete', 'Story Deleted');
    }
}