<?php

class ExtraController extends \BaseController {



	/**

	 * Display a listing of the resource.

	 *

	 * @return Response

	 */

	public function index()

	{

		$extra = Extra::orderBy('created_at','dsc')

			->paginate();



        return View::make('extra/list', compact('extra'));

	}





	/**

	 * Show the form for creating a new resource.

	 *

	 * @return Response

	 */

	public function create()

	{

		$extra = new Extra;

		$form = new Formulario;

		$form_data = $form->formData('extra.store','POST',true);

        return View::make('extra/form', compact('extra','form_data'));

	}





	/**

	 * Store a newly created resource in storage.

	 *

	 * @return Response

	 */

	public function store()

	{

		$extra = new Extra;

        $data = Input::all();

        $file = Input::file('ruta_imagen');



        if(Input::file('ruta_imagen')) {

        	$data['ruta_imagen'] = Input::file('ruta_imagen')->getClientOriginalName();

        	$file->move("assets/img",$data['ruta_imagen']);

        } else

        	$data['ruta_imagen'] = '';



		if(empty($data['obligatorio']))

			$data['obligatorio'] = 0;



		if(empty($data['cobro']))

			$data['cobro'] = 0;



		if($extra->validAndSave($data)) {

			$bitacora = new Bitacora;

            $bitacora->Guardar(9,$extra->id,1);

            return Redirect::route('extra.index');

		} else

            return Redirect::back()

                ->withInput()

                ->withErrors($extra->errors);

	}





	/**

	 * Display the specified resource.

	 *

	 * @param  int  $id

	 * @return Response

	 */

	public function show($id)

	{

        $extra = Extra::find($id);

        return View::make('extra/show', compact('extra'));

	}





	/**

	 * Show the form for editing the specified resource.

	 *

	 * @param  int  $id

	 * @return Response

	 */

	public function edit($id)

	{

   		$extra = Extra::find($id);

		$form = new Formulario;



        if(is_null($extra))

        	App::abort(404);



		$form_data = $form->formData(array('extra.update', $id),'PATCH',true);



        return View::make('extra/form', compact('extra','form_data'));

	}





	/**

	 * Update the specified resource in storage.

	 *

	 * @param  int  $id

	 * @return Response

	 */

	public function update($id)

	{

		$extra = Extra::find($id);



		if(is_null($extra))

            App::abort(404);



        $data = Input::all();

        $file = Input::file('ruta_imagen');



        if(Input::file('ruta_imagen')) {

        	$data['ruta_imagen'] = Input::file('ruta_imagen')->getClientOriginalName();

        	$file->move("assets/img",$data['ruta_imagen']);

        } else

        	$data['ruta_imagen'] = $extra->ruta_imagen;



		if(empty($data['obligatorio']))

			$data['obligatorio'] = 0;



		if(empty($data['cobro']))

			$data['cobro'] = 0;



		if($extra->validAndSave($data))

		{

			$bitacora = new Bitacora;

			$bitacora->Guardar(9,$extra->id,2);

			return Redirect::route('extra.index');

		} else

            return Redirect::back()

                ->withInput()

                ->withErrors($extra->errors);

	}





	/**

	 * Remove the specified resource from storage.

	 *

	 * @param  int  $id

	 * @return Response

	 */

	public function destroy($id)

	{

        $extra = Extra::find($id);



        if(is_null($extra))

            App::abort(404);



		$extra->delete();

		$bitacora = new Bitacora;

		$bitacora->Guardar(9,$id,3);

	}

}