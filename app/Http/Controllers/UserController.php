<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Direction;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::orderBy('id', 'DESC')->paginate(3);
        $directions=Direction::all();
        return view('user.index',compact('users','directions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,['nombre'=>'required',
          'ape_paterno'=>'required',
          'ape_materno'=>'required',
          'edad'=>'required',
          'calle'=>'required',
          'colonia'=>'required',
          'delegacion'=>'required',
          'numero'=>'required'
        ]);
        $user = $request -> only(['nombre', 'ape_paterno', 'ape_materno', 'edad']);
        $user = User::create($user);
        $newDirection = new Direction;
        //$newDirection = $request -> get(['calle', 'colonia', 'delegacion', 'numero']);
        $newDirection -> calle = $request->get('calle');
        $newDirection -> colonia = $request->get('colonia');
        $newDirection -> delegacion = $request->get('delegacion');
        $newDirection -> numero = $request->get('numero');
//        $newDirection -> user_id =
        $user->direction()->save($newDirection);
          //Direction::create($newDirection);

        //$user -> direction()->create($newDirection);
        return redirect()->route('user.index')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $users=User::find($id);
        
        return view('user.show', compact('users'));
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
        $user=user::find($id);
        $direction= user::find($id)->direction;
        return view('user.edit', compact('user','direction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,['nombre'=>'required',
          'ape_paterno'=>'required',
          'ape_materno'=>'required',
          'edad'=>'required',
          'calle'=>'required',
          'colonia'=>'required',
          'delegacion'=>'required',
          'numero'=>'required'
        ]);
      User::find($id)->update($request -> only(['nombre', 'ape_paterno', 'ape_materno', 'edad']));

      $direction = new Direction;

      User::find($id)->direction->update(
        ['calle'=>$request->get('calle'),
        'colonia'=>$request->get('colonia'),
        'delegacion'=>$request->get('delegacion'),
        'numero'=>$request->get('numero')]
    );


      return redirect()->route('user.index')->with('success'
        , 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)-> delete();
        User::find($id) -> direction ->delete();
        return redirect()->route('user.index')->with('success',
        'Registro eliminado satisfactoriamente');
    }
}
