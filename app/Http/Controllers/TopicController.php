<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\SubTopic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Create the new topic
        $topic = new Topic();
        $topic->name = $request->input('name');
        $topic->save();

        // Insert subtopic/description pairs into child table
        $subtopics = $request->input('subtopics');
        $descriptions = $request->input('descriptions');
        foreach ($subtopics as $index => $subtopic) {
            $subtopicModel = new Subtopic();
            $subtopicModel->topic_id = $topic->id;
            $subtopicModel->name = $subtopic;
            $subtopicModel->description = $descriptions[$index];
            $subtopicModel->save();
        }
        // dd($topic);
        return redirect('/')->with('success', 'Your changes have been saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
