@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Editar usuario</h6>
              <h6 style="text-align: center; color: red !important;" class="m-0 font-weight-bold text-primary">Si no quiere cambiar la contraseña, deje el campo vacío.</h6>
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
                                <i style="color: #004A7F;" class="fa fa-fw fa-user"></i>
                                </span>
                            </div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre del usuario..." value="{{ $user->name }}" required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-envelope"></i>
                                </span>
                            </div>
                            <input id="email" name="email" type="email" class="form-control" placeholder="Correo electrónico..." value="{{ $user->email }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #004A7F;" class="fa fa-fw fa-lock"></i>
                                </span>
                            </div>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña..." value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                  </div>
                </div>
                <br>
                <div class="footer text-center">
                    <button style="color: #004A7F;" type="submit" class="btn btn-outline-dark"><i style="color: #004A7F;" class="fa fa-fw fa-edit"></i> Guardar</button>
                </div>
              </form>
              </div>
            </div>
          </div>
@endsection