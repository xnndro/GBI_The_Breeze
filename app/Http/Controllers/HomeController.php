<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BroadcastNews;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $self = Auth::user();
            $userTotal = Auth::user()->count();
            $broadcastTotal = BroadcastNews::count();
            return view('home', compact('self', 'userTotal', 'broadcastTotal'));
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
}
