$(document).ready(function(e) {
    /**
     * [Select]
     * @type {Placeholder}
     */
    $("select").select2({
        placeholder: "Seleccione una opción"
    });
    /**
     * [Tooltip]
     * @type {String}
     */
    $('.tool[data-content]').popover({
        trigger: 'hover'
    });
    /**
     * [Borrar Filas de las Tablas]
     */
    $('.table-responsive .glyphicon-trash').borrarFila();
    /**
     * [Formato del Calendario]
     * @type {String}
     */
    $('.datepicker').datetimepicker({
        format: "dd-mm-yyyy",
        pickerPosition: "top-left",
        language: "es",
        todayBtn: "linked",
        todayHighlight: true,
        autoclose: true,
        minView: 2
    });
    /**
     * [Fecha Emisión y Vencimiento de Licencia] [Cliente]
     * @type {[type]}
     */
    $('#fecha_emi_lic').rangoFechas({
        maxDate:'#fecha_ven_lic'
    });
    /**
     * [Fecha Emisión y Vencimiento de Licencia] [Caso de Emergencia] [Cliente]
     * @type {[type]}
     */
    $('#adicional_femilic').rangoFechas({
        maxDate:'#adicional_fevenlic'
    });
    /**
     * [Fecha de Precios] [Modelo] [Paso 3]
     * @type {[type]}
     */
    $('#fecha_ini').rangoFechas({
        maxDate:'#fecha_fin'
    });
    /**
     * [Input File]
     * @type {Boolean}
     */
    $("#ruta_imagen").fileinput({
        showUpload: false,
        showCaption: false
    });
    /**
     * [Mostrar Campos de Contacto] [Emergencia]
     * @return {[type]}   [Show / Hide]
     */
    $('#caso').click(function(e) {
        e.preventDefault();
        $('#emergencia').toggle('easy');
    });
    /**
     * [Mostrar Campos Adicionales] [Adicional]
     * @return {[type]}   [Show / Hide]
     */
    $('#conductor').click(function(e) {
        e.preventDefault();
        $('#adicional').toggle('easy');
    });
    /**
     * [Carousel de Imagenes]
     * @return {[type]} [description]
     */
    $('.carousel').carousel({
        interval: 2000,
        wrap: true
    });
    /**
     * [Mostrar Imagnes / Fotos]
     * @return {[type]} [description]
     */
    $('.showFoto').showFoto();
    /**
     * [Borrar desde la Vista]
     * @return {[type]} [description]
     */
    $('.showBorrar').showBorrar();
    /**
     * [Modal] [Formulario Marca]
     * @return {[type]}   [description]
     */
    $('#modalFormMarca').click(function(e) {
        e.preventDefault();
        $('#marca').val('');
    });
    /**
     * [Modal] [Formulario Marca] [Guadar Datos]
     * @return {[type]}   [description]
     */
    $('#guardarMarca').click(function() {
        $id = $('#marca_id').val();

        if($id == 0) {
            $('#formMarca').attr('action','marca/store');
            $('#formMarca').attr('method','POST');
        } else {
            $('#formMarca').attr('action','marca/update'+'/'+$id);
            $('#formMarca').attr('method','PATCH');
        }
    });
    /**
     * [Modal] [Formulario Marca] [Editar]
     * @return {[type]}   [description]
     */
    $('.crearMarca').editarModal({
        crearModal: "#crearMarca",
        modal: "#marca",
        modal_id: "#marca_id"
    });
    /**
     * [Modal] [Formulario Tipo]
     * @return {[type]}   [description]
     */
    $('#modalFormTipo').click(function(e) {
        e.preventDefault();
        $('#tipo').val('');
    });
    /**
     * [Modal] [Formulario Tipo] [Guadar Datos]
     * @return {[type]}   [description]
     */
    $('#guardarTipo').click(function() {
        $id = $('#tipo_id').val();

        if($id == 0) {
            $('#formTipo').attr('action','tipo/store');
            $('#formTipo').attr('method','POST');
        } else {
            $('#formTipo').attr('action','tipo/update'+'/'+$id);
            $('#formTipo').attr('method','PATCH');
        }
    });
    /**
     * [Modal] [Formulario Tipo] [Editar]
     * @return {[type]}   [description]
     */
    $('.crearTipo').editarModal({
        crearModal: "#crearTipo",
        modal: "#tipo",
        modal_id: "#tipo_id"
    });
    /**
     * [Formato del Calendario + hora]
     * @type {String}
     */
    $('.timepicker').datetimepicker({
        format: "dd-mm-yyyy HH:ii P",
        todayBtn: "linked",
        todayHighlight: true,
        autoclose: true,
        showMeridian: true
    });
    /**
     * [Horario de Reserva y Horario de Devolución] [Formulario] [Prestamo] [Paso 1]
     * @type {[type]}
     */
    $('#horario_rsv').datetimepicker('setStartDate', new Date());
    $('#horario_rsv').change(function() {
        $('#horario_dvl').datetimepicker('setStartDate', $(this).val());
    });
    /**
     * [Formulario] [Prestamo] [Paso 1]
     * @type {[type]}
     */
    $('#campoDevolver').change(function(e) {
        valor = $(this).is(':checked');

        if(valor)
            $('#devolverLugar').show();
        else
            $('#devolverLugar').hide();
    });
    /**
     * [Calcular Precio] [Formulario - Prestamo] [Paso 4]
     * @type {String}
     */
    $('#calcularTotal').precio({
        auto: '#precio',
        extra: '#extra',
        descuento: '#descuento',
        total: '#total'
    });
    /**
     * [Modal] [Formulario Contrato] [Editar datos]
     * @return {[type]}   [description]
     */
    $('#guardarContrato').click(function() {
        $id = $('#prestamo_id').val();
        $('#formContrato').attr('action','contrato'+'/'+$id);
    });
    /**
     * [Modal] [Formulario Contrato] [Actualizar datos]
     * @return {[type]}   [description]
     */
    $('.crearContrato').editarModal({
        crearModal: "#crearContrato",
        modal: "#contrato",
        modal_id: "#prestamo_id"
    });
});
