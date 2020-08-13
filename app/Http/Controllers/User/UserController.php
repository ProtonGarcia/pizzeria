<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\User;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return $this->showAll($usuarios);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:8',
            'email' => 'required|email|unique:users',
        ];

        $this->validate($request, $rules);

        $fields = $request->all();

        $fields['record'] = 0;

        $user = User::create($fields);

        return $this->showOne($user,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return $this->showOne($usuario);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $usuario)
    {
       

        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:8',
            'email' => 'email|unique:users,email,' . $usuario->id,
        ];

        $this->validate($request, $rules);

        if ($request->has('name')) {
            $usuario->name = $request->name;
        }

        if ($request->has('address')) {
            $usuario->address = $request->address;
        }

        if ($request->has('phone')) {
            $usuario->phone = $request->phone;
        }

        if ($request->has('email') && $usuario->email != $request->email) {
            $usuario->email = $request->email;
        }

        if (!$usuario->isDirty()) {
           return $this->errorResponse('Debes realizar al menos un cambio para poderrealizar la actualizacionde los datos',422);
        }

        $usuario->save();

        return $this->showOne($usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {

       
        $usuario->delete();
        return $this->showOne($usuario);

    }
}
