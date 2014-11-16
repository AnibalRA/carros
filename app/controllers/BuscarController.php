<?php
class BuscarController extends BaseController
{
    /**
     * [Buscar Datos]
     * @return [route] [Buscar Datos Según La Tabla]
     */
    public function buscar()
    {
        $dato = Input::get('buscar');
        $tabla = Input::get('tabla');

        switch ($tabla) {
            case 'User':
                return Redirect::route('buscarUser',$dato);
                break;
            case 'Cliente':
                return Redirect::route('buscarCliente',$dato);
                break;
            case 'Marca':
                return Redirect::route('buscarMarca',$dato);
                break;
            case 'Tipo':
                return Redirect::route('buscarTipo',$dato);
                break;
            case 'Modelo':
                return Redirect::route('buscarModelo',$dato);
                break;
            case 'Extra':
                return Redirect::route('buscarExtra',$dato);
                break;
            default:
                break;
        }
    }
    /**
     * [Buscar Usuario]
     * @param  [type] $dato [description]
     * @return [vista] [user/list]
     */
    public function usuario($dato)
    {
        $user = User::where('nombre','LIKE',"%".$dato."%")
            ->orderBy('created_at','dsc')
            ->paginate();

        return View::make('user.list', compact('user'));
    }
    /**
     * [Buscar Cliente]
     * @param  [type] $dato [description]
     * @return [vista] [cliente/list]
     */
    public function cliente($dato)
    {
        $cliente = Cliente::where('nombre','LIKE',"%".$dato."%")
            ->orderBy('created_at','dsc')
            ->paginate();

        return View::make('cliente.list', compact('cliente'));
    }
    /**
     * [Buscar Marca]
     * @param  [string] $dato [cadena de texto]
     * @return [vista] [auto/marca/list]
     */
    public function marca($dato)
    {
        $marca = Marca::where('marca','LIKE',"%".$dato."%")
            ->orderBy('created_at','dsc')
            ->paginate();

        $form_data = [
            'class' => 'form-horizontal',
            'id' => 'formMarca'
        ];

        $mensaje = 'El campo no tiene que quedar vacío';
        return View::make('auto.marca.list', compact('marca','form_data','mensaje'));
    }
    /**
     * [Buscar Tipo]
     * @param  [string] $dato [cadena de texto]
     * @return [vista] [auto/tipo/list]
     */
    public function tipo($dato)
    {
        $tipo = Tipo::where('tipo','LIKE',"%".$dato."%")
            ->orderBy('created_at','dsc')
            ->paginate();

        $form_data = [
            'class' => 'form-horizontal',
            'id' => 'formTipo'
        ];

        $mensaje = 'El campo no tiene que quedar vacío';
        return View::make('auto.tipo.list', compact('tipo','form_data','mensaje'));
    }
    /**
     * [Buscar Modelo]
     * @param  [string] $dato [cadena de texto]
     * @return [vista] [auto/modelo/list]
     */
    public function modelo($dato)
    {
        $modelo = Modelo::where('modelo','LIKE',"%".$dato."%")
            ->orderBy('created_at','dsc')
            ->paginate();

        return View::make('auto.modelo.list', compact('modelo'));
    }
    /**
     * [Buscar Extra]
     * @param  [string] $dato [cadena de texto]
     * @return [vista] [extra/list]
     */
    public function Extra($dato)
    {
        $extra = Extra::where('extra','LIKE',"%".$dato."%")
            ->orderBy('created_at','dsc')
            ->paginate();

        return View::make('extra.list', compact('extra'));
    }
}