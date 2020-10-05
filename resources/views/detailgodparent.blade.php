@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Padrinos y Madrinas</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Detalle del padrino/madrina</h6>
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
                                <i style="color: #004A7F;" class="fa fa-fw fa-user-tag"></i>
                                </span>
                            </div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre de la organización.." value="{{ $godparent->name }}" disabled>
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
                            <input id="name" name="name" type="text" class="form-control" placeholder="Estado de la organización.." value="{{ $godparent->state }}" disabled>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-12 control-label" style="text-align: center;">Sector afiliado</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-briefcase"></i>
                                </span>
                            </div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Tipo de la organización.." value="{{ $godparent->type }}" disabled>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('curriculum') ? ' has-error' : '' }}">
                        <label for="curriculum" class="col-md-12 control-label" style="text-align: center;">Curriculum</label>

                        <div class="col-md-12">
                            <textarea id="curriculum" type="text" class="form-control" name="curriculum" placeholder="Escriba aquí..." value="{{ old('curriculum') }}" rows="4" cols="50" disabled>{{ $godparent->curriculum }}</textarea>

                            @if ($errors->has('curriculum'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('curriculum') }}</strong>
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