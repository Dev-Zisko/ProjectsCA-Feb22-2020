@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Iniciativas</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Crear iniciativa</h6>
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
                            <input id="name" name="name" type="text" class="form-control" placeholder="Evento de la iniciativa..." value="{{ old('name') }}" required>
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
                            <input id="postname" name="postname" type="text" class="form-control" placeholder="Post-evento de la iniciativa..." value="{{ old('postname') }}" required>
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
                                @foreach($organizations as $organization)
                                    <option value="{{ $organization->id }}">{{ $organization->name }} - {{ $organization->state }}</option>
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
                              <option value="Iniciada" selected>Iniciada</option>
                              <option value="En Proceso">En Proceso</option>
                              <option value="Culminada">Culminada</option>
                              <option value="Sin Información">Sin Información</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('mandatories') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Seleccionar acciones</label>
                        <div class="input-group mb-3">
                            <select type="text" id="mandatories" name="mandatories[]" class="standardSelect"
                            multiple required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
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
                          </select>
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('observation') ? ' has-error' : '' }}">
                        <label for="observation" class="col-md-12 control-label" style="text-align: center;">Observaciones</label>

                        <div class="col-md-12">
                            <textarea id="observation" type="text" class="form-control" name="observation" placeholder="Escriba aquí..." value="{{ old('observation') }}" required rows="4" cols="50"></textarea>

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
                    <button style="color: #004A7F;" type="submit" class="btn btn-outline-dark"><i style="color: #004A7F;" class="fa fa-fw fa-save"></i> Registrar</button>
                </div>
              </form>
              </div>
            </div>
          </div>
@endsection