<?php
class Formulario extends Eloquent
{
    /**
     * [Descripción]
     * @param  [type] $url  [Route]
     * @param  [type] $http [HTTP Verbs]
     * @param  [type] $bool [Boolean]
     * @return [type]       [Datos del Formulario]
     */
    public function formData($url,$http,$bool)
    {
        $form_data = [
            'route' => $url,
            'method' => $http,
            'class' => 'form-horizontal',
            'files' => $bool
            ];

        return $form_data;
    }
    /**
     * [Descripción]
     * @param  [type] $url  [Route]
     * @param  [type] $http [HTTP Verbs]
     * @param  [type] $bool [nombre de la clase]
     * @return [type]       [ID del formulario]
     */
    public function formData_2($url,$http,$cls,$id)
    {
        $form_data = [
            'route' => $url,
            'method' => $http,
            'class' => $cls,
            'id' => $id
            ];

        return $form_data;
    }
    /**
     * [Formato de fecha] [d-m-Y a Y-m-d]
     * @param  [type] $data [Datos]
     * @return [type]       [Datos con Nuevo Formato]
     */
    public function fechaYmd($data,$num)
    {
        if($num == 1) {
            $data["fecha_nac"] = (empty($data["fecha_nac"])) ? '' : date('Y-m-d', strtotime($data["fecha_nac"]));
            $data["fecha_emi_lic"] = (empty($data["fecha_emi_lic"])) ? '' : date('Y-m-d', strtotime($data["fecha_emi_lic"]));
            $data["fecha_ven_lic"] = (empty($data["fecha_ven_lic"])) ? '' : date('Y-m-d', strtotime($data["fecha_ven_lic"]));
            $data["fecha_ven_cre"] = (empty($data["fecha_ven_cre"])) ? '' : date('Y-m-d', strtotime($data["fecha_ven_cre"]));
        } elseif($num == 2) {
            $data["adicional_femilic"] = (empty($data["adicional_femilic"])) ? '' : date('Y-m-d', strtotime($data["adicional_femilic"]));
            $data["adicional_fevenlic"] = (empty($data["adicional_fevenlic"])) ? '' : date('Y-m-d', strtotime($data["adicional_fevenlic"]));
        } else {
            $data["fecha_ini"] = (empty($data["fecha_ini"])) ? '' : date('Y-m-d', strtotime($data["fecha_ini"]));
            $data["fecha_fin"] = (empty($data["fecha_fin"])) ? '' : date('Y-m-d', strtotime($data["fecha_fin"]));
        }
        return $data;
    }
}