<?php

namespace App\Http\Controllers;

use App\Models\BroadcastNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use App\Models\User;

class BroadcastNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allNews = BroadcastNews::all();
        return view('broadcast.index', compact('allNews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('broadcast.create');
    }

    public function sendNotification($title, $content, $phone_number)
    {
        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $news = new BroadcastNews();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();

        $users = User::where('id', '!=', Auth::id())->get();
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        foreach ($users as $user) {
            try {
                $message = $twilio->messages->create(
                    "whatsapp:".$user->phone_number,
                    [
                        'from' => "whatsapp:+14155238886",
                        'body' => "*".$request->title."*\n".$request->content
                    ]
                );
                print("message:".$message->sid);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to send notification');
            }
        }
        return redirect()->route('broadcast.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $broadcastNews = BroadcastNews::findorFail($id);
        return view('broadcast.edit', compact('broadcastNews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $news = BroadcastNews::findOrFail($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();

        return redirect()->route('broadcast.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = BroadcastNews::findOrFail($id);
        $news->delete();

        return redirect()->route('broadcast.index');
    }
}
