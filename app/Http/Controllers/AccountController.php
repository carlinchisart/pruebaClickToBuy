<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Account::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAccountRequest $request)
    {
        Account::create($request->validated());
        return response()->json(['msg' => 'registro creado con exito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::find($id);
        if($account){
            return response()->json(['msg' => 'registro encontrado', 'data' => $account]);
        }
        return response()->json(['msg' => 'Registro no encontrado']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, $id)
    {
        $account = Account::find($id);
        if(!$account){
            return response()->json(['msg' => 'registro no encontrado']);
        }
        $account->update($request->validated());
        return response()->json(['msg' => 'registro actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        if($account->orders()->count() > 0){
            return response()->json(['msg' => 'No se puede borrar la cuenta, tiene pedidos asociados']);
        }
        $account->delete();
        return response()->json(['msg' => 'registro eliminado correctamente']);
    }
}
