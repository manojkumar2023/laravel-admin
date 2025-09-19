<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgentRequest;
use App\Mail\AgentCreated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AgentController extends Controller
{
    public function index()
    {
        $items = User::all();
        return view('admin.pages.agents.index', compact('items'));
    }

    public function create()
    {
        return view('admin.pages.agents.create');
    }

    public function store(StoreAgentRequest $request)
    {
        $data = $request->only(['first_name','last_name','email','mobile','address','status']);

        // generate random password 8-10 chars
        $password = Str::random(rand(8,10));
        $data['password'] = Hash::make($password);

        // For compatibility with existing users table, also set 'name' column
        $data['name'] = trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? ''));

        $user = User::create($data);

        // Send email with credentials
        Mail::to($user->email)->send(new AgentCreated($user, $password));

        return redirect()->route('admin.agents.index')->with('success', 'Agent created and emailed successfully.');
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);
        return view('admin.pages.agents.edit', compact('item'));
    }

    public function update(StoreAgentRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->only(['first_name','last_name','email','mobile','address','status']);

        // For compatibility with existing users table, also set 'name' column
        $data['name'] = trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? ''));

        $user->update($data);

        return redirect()->route('admin.agents.index')->with('success', 'Agent updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.agents.index')->with('success', 'Agent deleted successfully.');
    }
}
