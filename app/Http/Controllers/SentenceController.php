<?php

namespace App\Http\Controllers;

use App\Http\Requests\SentenceRequest;
use App\Models\Sentence;
use Illuminate\Http\Request;

class SentenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sentences = Sentence::orderBy('exposed_at', 'desc')->get();

        return view('sentences.index', compact('sentences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sentences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\SentenceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SentenceRequest $request)
    {
        $sentence = new Sentence($request->validated());

        $sentence->save();

        return redirect()->route('sentences.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function edit(Sentence $sentence)
    {
        return view('sentences.edit', compact('sentence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SentenceRequest $request
     * @param \App\Models\Sentence $sentence
     * @return \Illuminate\Http\Response
     */
    public function update(SentenceRequest $request, Sentence $sentence)
    {
        $sentence->update($request->validated());

        return redirect()->route('sentences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sentence $sentence
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Sentence $sentence)
    {
        $sentence->delete();

        return redirect()->route('sentences.index');
    }
}
