<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // admin
    // |-> view feedback from resident
    // |-> view report for supervisor
    public function view_report_from_supervisor()
    {
        // Check user is admin
        if (auth()->user()->user_type != 'admin') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // Get all supervisor reports
        $messages = Message::where('sender_user_type', 'supervisor')->where('reciver_user_type', 'admin')->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.messages.reports', [
            'messages' => $messages
        ]);
    }

    public function view_feedback_from_resident()
    {
        // Check user is admin
        if (auth()->user()->user_type != 'admin') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // Get all reservation
        $messages = Message::where('sender_user_type', 'resident')->where('reciver_user_type', 'admin')->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.messages.feedbacks', [
            'messages' => $messages
        ]);
    }

    // supervisor
    // |-> send report for admin



    // resident
    // |-> send feedback for admin


    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
