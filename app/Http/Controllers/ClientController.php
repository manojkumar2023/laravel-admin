<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $items = Client::where('user_id', Auth::id())->get();

        return view('pages.client.index', compact('items'));
    }

    public function create()
    {
        return view('pages.client.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['client_name','email','mobile','address','status','next_follow_up_date','remarks','budget','designer_name','generate_date']);

        $data['user_id'] = Auth::id();

        Client::create($data);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function edit($id)
    {
        $item = Client::findOrFail($id);
        return view('pages.client.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $data = $request->only(['client_name','email','mobile','address','status','next_follow_up_date','remarks','budget','designer_name','generate_date']);

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
