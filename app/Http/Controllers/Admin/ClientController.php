<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $userId = request()->query('user_id');

        $query = Client::with('user');

        if ($userId) {
            $query->where('user_id', $userId);
        }

        $items = $query->get();

        return view('admin.pages.client.index', compact('items'));
    }

    public function create()
    {
        $agents = User::all();
        return view('admin.pages.client.create', compact('agents'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['client_name','email','mobile','address','status','next_follow_up_date','remarks','budget','designer_name','generate_date']);

        if ($request->filled('user_id')) {
            $data['user_id'] = $request->input('user_id');
        }

        Client::create($data);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function edit($id)
    {
        $item = Client::findOrFail($id);
        $agents = User::all();
        return view('admin.pages.client.edit', compact('item', 'agents'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $data = $request->only(['client_name','email','mobile','address','status','next_follow_up_date','remarks','budget','designer_name','generate_date']);

        if ($request->filled('user_id')) {
            $data['user_id'] = $request->input('user_id');
        }

        $client->update($data);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
