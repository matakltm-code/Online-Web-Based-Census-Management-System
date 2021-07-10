<?php

namespace App\Http\Controllers;

use App\Models\Publish;
use Illuminate\Http\Request;

class PublishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->user_type != 'admin') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // Get all supervisor reports
        return view('admin.publish.create');
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
            'note' => 'required',
        ]);


        $publishNote = new Publish;
        $publishNote->note = $request->input('note');
        $publishNote->save();

        return redirect('/publish')->with('success', 'New publication report is added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function show(Publish $publish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function edit(Publish $publish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publish $publish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publish $publish)
    {
        //
    }
}
