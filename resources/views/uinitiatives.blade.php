@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Iniciativas</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Editar iniciativa</h6>
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
                                <i style="color: #004A7F;" class="fa fa-fw fa-sticky-note"></i>
                                </span>
                            </div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Evento de la iniciativa..." value="{{ $initiative->name }}" required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('postname') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-newspaper"></i>
                                </span>
                            </div>
                            <input id="postname" name="postname" type="text" class="form-control" placeholder="Post-evento de la iniciativa..." value="{{ $initiative->postname }}" required>
                            @if ($errors->has('postname'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('postname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('id_organization') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Organizaciones involucradas</label>
                        <div class="input-group mb-3">
                            <select type="text" id="id_organization" name="id_organization[]" class="standardSelect"
                            multiple required>
                                @foreach($orgaini as $rela)
                                  @foreach($organizations as $organization)
                                      @if($rela->id_organization == $organization->id)
                                        <option value="{{ $organization->id }}" selected>{{ $organization->name }} - {{ $organization->state }}</option>
                                      @endif
                                  @endforeach
                                @endforeach
                                @foreach($aux as $au)
                                      <option value="{{ $au->id }}">{{ $au->name }} - {{ $au->state }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_organization'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('id_organization') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                      <label class="col-md-12 control-label" style="text-align: center;">Status</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i style="color: #004A7F;" class="fa fa-fw fa-bars"></i>
                              </span>
                          </div>
                          <select type="text" id="status" name="status" class="form-control" required>
                              @if($initiative->status == "Iniciada")
                                <option value="Iniciada" selected>Iniciada</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Culminada">Culminada</option>
                                <option value="Sin Información">Sin Información</option>
                              @endif
                              @if($initiative->status == "En Proceso")
                                <option value="Iniciada">Iniciada</option>
                                <option value="En Proceso" selected>En Proceso</option>
                                <option value="Culminada">Culminada</option>
                                <option value="Sin Información">Sin Información</option>
                              @endif
                              @if($initiative->status == "Culminada")
                                <option value="Iniciada">Iniciada</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Culminada" selected>Culminada</option>
                                <option value="Sin Información">Sin Información</option>
                              @endif
                              @if($initiative->status == "Sin Información")
                                <option value="Iniciada">Iniciada</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Culminada">Culminada</option>
                                <option value="Sin Información" selected>Sin Información</option>
                              @endif
                          </select>
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('mandatories') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Seleccionar acciones</label>
                        <div class="input-group mb-3">
                            <select type="text" id="mandatories" name="mandatories[]" class="standardSelect"
                            multiple required>
                                @foreach($actions as $action)
                                  @if($action->id_initiative == $initiative->id)
                                    <option value="{{ $action->action }}" selected>{{ $action->action }}</option>
                                  @endif
                                @endforeach
                                @foreach($mandatories as $mand)
                                    <option value="{{ $mand }}">{{ $mand }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('mandatories'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('mandatories') }}</strong>
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
                          <select type="text" id="state" name="state" class="form-control" required>
                            @if($initiative->state == "Amazonas")
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
                            @if($initiative->state == "Anzoátegui")
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
                            @if($initiative->state == "Apure")
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
                            @if($initiative->state == "Aragua")
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
                            @if($initiative->state == "Barinas")
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
                            @if($initiative->state == "Bolívar")
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
                            @if($initiative->state == "Carabobo")
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
                            @if($initiative->state == "Cojedes")
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
                            @if($initiative->state == "Delta Amacuro")
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
                            @if($initiative->state == "Distrito Capital")
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
                            @if($initiative->state == "Falcón")
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
                            @if($initiative->state == "Guárico")
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
                            @if($initiative->state == "Lara")
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
                            @if($initiative->state == "Mérida")
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
                            @if($initiative->state == "Miranda")
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
                            @if($initiative->state == "Monagas")
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
                            @if($initiative->state == "Nacional")
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
                            @if($initiative->state == "Nueva Esparta")
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
                            @if($initiative->state == "Portuguesa")
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
                            @if($initiative->state == "Sucre")
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
                            @if($initiative->state == "Táchira")
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
                            @if($initiative->state == "Trujillo")
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
                            @if($initiative->state == "Vargas")
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
                            @if($initiative->state == "Yaracuy")
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
                            @if($initiative->state == "Zulia")
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

                    <div class="form-group{{ $errors->has('observation') ? ' has-error' : '' }}">
                        <label for="observation" class="col-md-12 control-label" style="text-align: center;">Observaciones</label>

                        <div class="col-md-12">
                            <textarea id="observation" type="text" class="form-control" name="observation" placeholder="Escriba aquí..." value="{{ old('observation') }}" required rows="4" cols="50">{{ $initiative->observation }}</textarea>

                            @if ($errors->has('observation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('observation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                  </div>
                </div>
                <br>
                <div class="footer text-center">
                    <button style="color: #004A7F;" type="submit" class="btn btn-outline-dark"><i style="color: #004A7F;" class="fa fa-fw fa-save"></i> Guardar</button>
                </div>
              </form>
              </div>
            </div>
          </div>
@endsection