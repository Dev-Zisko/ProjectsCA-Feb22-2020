@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Padrinos y Madrinas</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Crear padrino/madrina</h6>
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
                                <i style="color: #004A7F;" class="fa fa-fw fa-user-tag"></i>
                                </span>
                            </div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre del padrino/madrina..." value="{{ old('name') }}" required>
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

                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                      <label class="col-md-12 control-label" style="text-align: center;">Sector afiliado</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i style="color: #004A7F;" class="fa fa-fw fa-briefcase"></i>
                              </span>
                          </div>
                          <select type="text" id="type" name="type" class="form-control" required>
                              <option value="Academia" selected>Academia</option>
                              <option value="Ambiente">Ambiente</option>
                              <option value="Colegio Profesional">Colegio Profesional</option>
                              <option value="Comunicación">Comunicación</option>
                              <option value="Corrupción">Corrupción</option>
                              <option value="Cultura">Cultura</option>
                              <option value="Deporte">Deporte</option>
                              <option value="Derechos Humanos">Derechos Humanos</option>
                              <option value="Empresarios">Empresarios</option>
                              <option value="Gremio Empresarial">Gremio Empresarial</option>
                              <option value="Iglesia">Iglesia</option>
                              <option value="Organización Social">Organización Social</option>
                              <option value="Otra">Otra</option>
                              <option value="Sector Productivo">Sector Productivo</option>
                              <option value="Sin Dato">Sin Dato</option>
                              <option value="Sindicato">Sindicato</option>
                              <option value="Social">Social</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('curriculum') ? ' has-error' : '' }}">
                        <label for="curriculum" class="col-md-12 control-label" style="text-align: center;">Curriculum</label>

                        <div class="col-md-12">
                            <textarea id="curriculum" type="text" class="form-control" name="curriculum" placeholder="Escriba aquí..." value="{{ old('curriculum') }}" required rows="4" cols="50"></textarea>

                            @if ($errors->has('curriculum'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('curriculum') }}</strong>
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