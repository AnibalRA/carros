<?php

class UserController extends \BaseController {

	/**

	 * Display a listing of the resource.

	 * @return Response

	 */

	public function index()

	{

		$user = User::orderBy('created_at','dsc')

			->paginate();



        return View::make('user.list', compact('user'));

	}

	/**

	 * Show the form for creating a new resource.

	 *

	 * @return Response

	 */

	public function create()

	{

		$user = new User;

		$form = new Formulario;

		$form_data = $form->formData('user.store','POST',false);



        $data = [

        	'' => '',

            'Administrador' => 'Administrador',

            'Empleado' => 'Empleado'

            ];



        return View::make('user.form', compact('user','form_data','data'));

	}





	/**

	 * Store a newly created resource in storage.

	 *

	 * @return Response

	 */

	public function store()

	{

        $user = new User;

        $data = Input::all();



        if($user->validAndSave($data)) {

        	$bitacora = new Bitacora;

            $bitacora->Guardar(1,$user->id,1);

        	return Redirect::route('user.index');

        } else

        	return Redirect::back()

        		->withInput()

        		->withErrors($user->errors);

	}





	/**

	 * Display the specified resource.

	 *

	 * @param  int  $id

	 * @return Response

	 */

	public function show($id)

	{

		//

	}





	/**

	 * Show the form for editing the specified resource.

	 *

	 * @param  int  $id

	 * @return Response

	 */

	public function edit($id)

	{

		$user = User::find($id);



        if(is_null($user))

            App::abort(404);



		$form = new Formulario;

		$form_data = $form->formData(array('user.update', $id),'PATCH',false);



		if(Auth::user()->tipo == 'Administrador')

			$data = [

				'Administrador' => 'Administrador',

				'Empleado' => 'Empleado'

			];



		elseif(Auth::user()->tipo == 'Empleado')

			$data = [

				'Empleado' => 'Empleado'

			];



        return  View::make('user.form', compact('data','user','form_data'));

	}





	/**

	 * Update the specified resource in storage.

	 *

	 * @param  int  $id

	 * @return Response

	 */

	public function update($id)

	{

        $user = User::find($id);



        if(is_null($user))

            App::abort(404);



        $data = Input::all();



		if($user->validAndSave($data,2)) {

			$bitacora = new Bitacora;

			$bitacora->Guardar(1,$user->id,2);

			return Redirect::route('user.index');

		} else

			return Redirect::route('user.edit', $user->id)

				->withInput()

				->withErrors($user->errors);

	}





	/**

	 * Remove the specified resource from storage.

	 *

	 * @param  int  $id

	 * @return Response

	 */

	public function destroy($id)

	{

        $user = User::find($id);



        if (is_null($user))

            App::abort(404);



        else {

            $user->delete();

            $bitacora = new Bitacora;

            $bitacora->Guardar(1,$id,3);

        }

	}

}