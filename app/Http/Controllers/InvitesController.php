<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Invite;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;

class InvitesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('invite.index');
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
        // // Invite::create($request->all());
        // Invite::create([
        //     'user_id' => auth()->id(),
        //     'friend_id' => $request->friend_id,
        //     'friend_email' => $request->friendEmail,
        //     'shared_link' => $request->url
        // ]);
        // // return response()->json($invite);

        // return (['message' => 'MESSAGE HAS BEEN SENT SISTER']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get() {
        return view ('invite');
    }

    public function send(Request $request) 
    {

        Invite::create([
            'user_id' => auth()->id(),
            'friend_id' => $request->friend_id,
            'friend_email' => $request->friendEmail,
            'shared_link' => $request->url
        ]);

        $user = auth()->user();

        // send email - please use the email of this account when you enter the link
        Mail::to($request->friendEmail)->send(new InvitationMail($request->url, $user->name));

        return (['message' => 'MESSAGE HAS BEEN SENT SISTER']);
    }

}
