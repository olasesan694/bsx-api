<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

use Auth;
use App\User;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('discuss.index'); // return with a variable 'Friends'
    }


}