<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class UsersController extends Controller
{
    public function index()
    {
        try {
            $users = User::where('id', '!=', Auth::id())->get();
            $self = Auth::user();
            return view('users.index', compact('users', 'self'));
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'string|max:255',
            'status' => 'required|string|in:Visitor,Member',
            'dob' => 'date',
            'occupation' => 'string|max:255',
            'domicile' => 'string|max:255',
            'cell_group' => 'boolean',
            'know_us_from' => 'string|max:255',
            'is_admin' => 'boolean',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->status = $request->status;
        $user->dob = $request->dob;
        $user->occupation = $request->occupation;
        $user->domicile = $request->domicile;
        $user->cell_group = $request->cell_group;
        $user->know_us_from = $request->know_us_from;
        $user->is_admin = $request->is_admin;
        $user->save();

        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        try {
            $message = $twilio->messages->create(
                "whatsapp:".$user->phone_number,
                [
                    'from' => "whatsapp:+14155238886",
                    'body' => 'Hello ' . $user->name . ', welcome to our church!'
                ]
            );
            print("message:".$message->sid);
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Failed to send notification');
        }

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'string|max:255',
            'status' => 'required|string|in:Visitor,Member',
            'dob' => 'date',
            'occupation' => 'string|max:255',
            'domicile' => 'string|max:255',
            'cell_group' => 'boolean',
            'know_us_from' => 'string|max:255',
            'is_admin' => 'boolean',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->status = $request->status;
        $user->dob = $request->dob;
        $user->occupation = $request->occupation;
        $user->domicile = $request->domicile;
        $user->cell_group = $request->cell_group;
        $user->know_us_from = $request->know_us_from;
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
