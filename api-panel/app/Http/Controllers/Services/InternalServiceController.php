<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\InternalService;
use Illuminate\Http\Request;

class InternalServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get("search");
        $services = InternalService::where("name", "LIKE", "%" . $search . "%")
            ->orderBy("id", "desc")
            ->get();

        return response()->json([
            "services" => $services,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'base_price' => 'required|numeric',
        ]);

        $service = InternalService::create($request->all());

        return response()->json([
            "message" => "Servicio creado correctamente",
            "service" => $service,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = InternalService::findOrFail($id);
        return response()->json([
            "service" => $service
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = InternalService::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'base_price' => 'required|numeric',
        ]);

        $service->update($request->all());

        return response()->json([
            "message" => "Servicio actualizado correctamente",
            "service" => $service,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = InternalService::findOrFail($id);
        $service->delete();

        return response()->json([
            "message" => "Servicio eliminado correctamente",
        ], 200);
    }
}
