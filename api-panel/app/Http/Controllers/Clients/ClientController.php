<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get("search");
        $clients = Client::where("razon_social", "LIKE", "%" . $search . "%")
            ->orWhere("nit", "LIKE", "%" . $search . "%")
            ->orderBy("id", "desc")
            ->paginate(10);

        return response()->json([
            "total" => $clients->total(),
            "clients" => $clients->items(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'razon_social' => 'required|string|max:255',
            'nit' => 'required|string|unique:clients,nit',
        ]);

        $client = Client::create($request->all());

        return response()->json([
            "message" => "Cliente creado correctamente",
            "client" => $client,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return response()->json([
            "client" => $client
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);
        
        $request->validate([
            'razon_social' => 'required|string|max:255',
            'nit' => 'required|string|unique:clients,nit,' . $id,
        ]);

        $client->update($request->all());

        return response()->json([
            "message" => "Cliente actualizado correctamente",
            "client" => $client,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json([
            "message" => "Cliente eliminado correctamente",
        ], 200);
    }
}
