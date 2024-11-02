<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientEducation;
use App\Trait\ClientTrait;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use ClientTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.client.index', ['clients' => Client::orderBy('created_at', 'DESC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateClient($request);

        $clientId = Client::createClient($request->full_name);
        foreach ($request->education as $info) {
            ClientEducation::addEducation($clientId, $info);
        }
        return to_route('client.index')->with('success', 'Client successfully Saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.client.show', ['client' => Client::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.client.edit', ['client' => Client::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateClient($request);

        Client::updateClient($id, $request);
        $education = ClientEducation::where('client_id', $id);
        if ($education->count() > 0) {
            $education->delete();
            foreach ($request->education as $info) {
                ClientEducation::addEducation($id, $info);
            }
        }
        return back()->with('success', 'Client successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        $client->delete();
        return back()->with('success', 'Client successfully Deleted!');
    }
}
