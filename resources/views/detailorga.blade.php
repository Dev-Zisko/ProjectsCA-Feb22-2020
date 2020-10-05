@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Organizaciones</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Detalle de la organización</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form style="margin: 0 auto;" class="form-login" method="POST">
                @csrf
                <div class="card-header card-header-primary text-center">
                  <div class="social-line">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Nombre</label>
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

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Estado</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-compass"></i>
                                </span>
                            </div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Estado de la organización.." value="{{ $organization->state }}" disabled>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Tipo de organización</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-briefcase"></i>
                                </span>
                            </div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Tipo de la organización.." value="{{ $organization->type }}" disabled>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('person_contact') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Persona de contacto</label>
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
                        <label class="col-md-12 control-label" style="text-align: center;">Posición</label>
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
              </form>
              </div>
            </div>
          </div>
@endsection