<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequestCustomer;
use App\Models\Client;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $cliente = Client::all();
        return response()->json($cliente);
    }


    public function create()
    {

    }


    public function store(PostRequestCustomer $request)
    {
        $data = $request->validated();
        $cliente =Client::find($data['id_cliente'])?:new Client();
        $cliente->name = $data['name'];
        $cliente->email = $data['email'];
        $cliente->github = $data['github'];
        $cliente->profile_photo_path = $data['profile_photo_path'];
        $cliente->save();
        return response()->json([
            'mensaje'=> 'Creado con exito'
        ]);
    }


    public function show($id)
    {
        $cliente = Client::find($id);
        return response()->json([
            'cliente'=> $cliente
        ]);
    }


    public function edit($id)
    {

    }


    public function update(PostRequestCustomer $request, Client $client)
    {
        $data = $request->validated();
        $client->fill($data);
        $client->save();
        return response()->json([
            'mensaje'=> 'Cliente actualizada con exito'
        ]);
    }


    public function destroy($id)
    {
        try {
            $client= Client::find($id);
            $client->delete();
            return response()->json([
                'mensaje'=> 'Cliente eliminada con exito'
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'mensaje'=> 'A ocurrido una excpecion al intentar eliminar la Cliente'
            ]);
        }
    }
}
