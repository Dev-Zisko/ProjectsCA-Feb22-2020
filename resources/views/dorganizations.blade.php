@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Organizaciones</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Eliminar organización</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form style="margin: 0 auto;" class="form-login" method="POST">
                @csrf
                <div class="card-header card-header-primary text-center">
                  <div class="social-line">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-building"></i>
                                </span>
                            </div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre de la organización.." value="{{ $organization->name }}" disabled>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                      <label class="col-md-12 control-label" style="text-align: center;">Estado</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i style="color: #004A7F;" class="fa fa-fw fa-compass"></i>
                              </span>
                          </div>
                          <select type="text" id="state" name="state" class="form-control" disabled>
                            @if($organization->state == "Amazonas")
                              <option value="Amazonas" selected>Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Anzoátegui")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui" selected>Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Apure")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure" selected>Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Aragua")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua" selected>Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Barinas")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas" selected>Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Bolívar")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar" selected>Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Carabobo")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo" selected>Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Cojedes")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes" selected>Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Delta Amacuro")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro" selected>Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Distrito Capital")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital" selected>Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Falcón")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón" selected>Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Guárico")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico" selected>Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Lara")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara" selected>Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Mérida")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida" selected>Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Miranda")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda" selected>Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Monagas")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas" selected>Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Nacional")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional" selected>Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Nueva Esparta")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta" selected>Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Portuguesa")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa" selected>Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Sucre")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre" selected>Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Táchira")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira" selected>Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Trujillo")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo" selected>Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Vargas")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas" selected>Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Yaracuy")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy" selected>Yaracuy</option>
                              <option value="Zulia">Zulia</option>
                            @endif
                            @if($organization->state == "Zulia")
                              <option value="Amazonas">Amazonas</option>
                              <option value="Anzoátegui">Anzoátegui</option>
                              <option value="Apure">Apure</option>
                              <option value="Aragua">Aragua</option>
                              <option value="Barinas">Barinas</option>
                              <option value="Bolívar">Bolívar</option>
                              <option value="Carabobo">Carabobo</option>
                              <option value="Cojedes">Cojedes</option>
                              <option value="Delta Amacuro">Delta Amacuro</option>
                              <option value="Distrito Capital">Distrito Capital</option>
                              <option value="Falcón">Falcón</option>
                              <option value="Guárico">Guárico</option>
                              <option value="Lara">Lara</option>
                              <option value="Mérida">Mérida</option>
                              <option value="Miranda">Miranda</option>
                              <option value="Monagas">Monagas</option>
                              <option value="Nacional">Nacional</option>
                              <option value="Nueva Esparta">Nueva Esparta</option>
                              <option value="Portuguesa">Portuguesa</option>
                              <option value="Sucre">Sucre</option>
                              <option value="Táchira">Táchira</option>
                              <option value="Trujillo">Trujillo</option>
                              <option value="Vargas">Vargas</option>
                              <option value="Yaracuy">Yaracuy</option>
                              <option value="Zulia" selected>Zulia</option>
                            @endif
                          </select>
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                      <label class="col-md-12 control-label" style="text-align: center;">Tipo de Organización</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i style="color: #004A7F;" class="fa fa-fw fa-briefcase"></i>
                              </span>
                          </div>
                          <select type="text" id="type" name="type" class="form-control" required>
                            @if($organization->type == "Academia")
                              <option value="Academia" selected>Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Ambiente")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente" selected>Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Colegio Profesional")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional" selected>Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Comunicación")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación" selected>Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Corrupción")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción" selected>Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Cultura")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura" selected>Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Deporte")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte" selected>Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Derechos Humanos")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos" selected>Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Empresarios")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Empresarios" selected>Empresarios</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Gremio Empresarial")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial" selected>Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Iglesia")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia" selected>Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Organización Social")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social" selected>Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Otra")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra" selected>Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Sector Productivo")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo" selected>Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Sin Dato")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato" selected>Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                            @endif
                            @if($organization->type == "Sindicato")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato" selected>Sindicato</option>
                            @endif
                            @if($organization->type == "Social")
                              <option value="Academia">Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                              <option value="Social" selected>Social</option>
                            @endif
                          </select>
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('person_contact') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-user-circle"></i>
                                </span>
                            </div>
                            <input id="person_contact" name="person_contact" type="text" class="form-control" placeholder="Persona de contacto..." value="{{ $organization->person_contact }}" disabled>
                            @if ($errors->has('person_contact'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('person_contact') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('person_position') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-network-wired"></i>
                                </span>
                            </div>
                            <input id="person_position" name="person_position" type="text" class="form-control" placeholder="Posición..." value="{{ $organization->person_position }}" disabled>
                            @if ($errors->has('person_position'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('person_position') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('person_mail') ? ' has-error' : '' }}">
                        <label for="person_mail" class="col-md-12 control-label" style="text-align: center;">Correos de contacto</label>

                        <div class="col-md-12">
                            <textarea id="person_mail" type="text" class="form-control" name="person_mail" placeholder="Escriba aquí..." value="{{ old('person_mail') }}" rows="4" cols="50" disabled>{{ $organization->person_mail }}</textarea>

                            @if ($errors->has('person_mail'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('person_mail') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('person_cellphone') ? ' has-error' : '' }}">
                        <label for="person_cellphone" class="col-md-12 control-label" style="text-align: center;">Teléfonos de contacto</label>

                        <div class="col-md-12">
                            <textarea id="person_cellphone" type="text" class="form-control" name="person_cellphone" placeholder="Escriba aquí..." value="{{ old('person_cellphone') }}" rows="4" cols="50" disabled>{{ $organization->person_cellphone }}</textarea>

                            @if ($errors->has('person_cellphone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('person_cellphone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                  </div>
                </div>
                <br>
                <div class="footer text-center">
                    <button style="color: #004A7F;" type="submit" class="btn btn-outline-dark"><i style="color: #004A7F;" class="fa fa-fw fa-trash"></i> Eliminar</button>
                </div>
              </form>
              </div>
            </div>
          </div>
@endsection