@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Iniciativas</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Eliminar iniciativa</h6>
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
                            <input id="name" name="name" type="text" class="form-control" placeholder="Evento de la iniciativa..." value="{{ $initiative->name }}" disabled>
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
                            <input id="postname" name="postname" type="text" class="form-control" placeholder="Post-evento de la iniciativa..." value="{{ $initiative->postname }}" disabled>
                            @if ($errors->has('postname'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('postname') }}</strong>
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
                          <select type="text" id="status" name="status" class="form-control" disabled>
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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-tasks"></i>
                                </span>
                            </div>
                            <input id="mandatories" name="mandatories" type="text" class="form-control" placeholder="Acciones..." value="{{ $initiative->mandatories }}" disabled>
                            @if ($errors->has('mandatories'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('mandatories') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-compass"></i>
                                </span>
                            </div>
                            <input id="state" name="state" type="text" class="form-control" placeholder="Mandatos..." value="{{ $initiative->state }}" disabled>
                            @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('state') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('observation') ? ' has-error' : '' }}">
                        <label for="observation" class="col-md-12 control-label" style="text-align: center;">Observaciones</label>

                        <div class="col-md-12">
                            <textarea id="observation" type="text" class="form-control" name="observation" placeholder="Escriba aquí..." value="{{ old('observation') }}" rows="4" cols="50" disabled>{{ $initiative->observation }}</textarea>

                            @if ($errors->has('observation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('observation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                  </div>
                  
                  <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Todas las organizaciones a las que pertenece: </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($initiatives as $initiative)
                        <tr>
                            <td>
                              @foreach($orgaini as $rela)
                                @foreach($organizations as $organization)
                                  @if($rela->id_initiative == $initiative->id)
                                    @if($rela->id_organization == $organization->id)
                                      {{ $organization->name }} - {{ $organization->state }}</br>
                                    @endif
                                  @endif
                                @endforeach
                              @endforeach
                            </td>
                        <tr>
                    @endforeach
                    @if(count($initiatives) == 0)
                        <tr>
                            <td>No hay iniciativas registradas</td>
                        </tr>
                    @endif
                  </tbody>
                </table>
                <br>
                <div>{{ $initiatives->links() }}</div>
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