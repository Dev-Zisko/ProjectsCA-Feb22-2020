@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Padrinos y Madrinas</h1>
    <form style="margin: 0 auto;" class="form-login" method="POST">
      @csrf
      <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
          <label class="col-md-12 control-label" style="text-align: center;">Estados a filtrar</label>
          <div style="width: 300px;" class="input-group mb-3">
              <select type="text" id="order" name="order[]" class="standardSelect"
              multiple required>
                    <option value="Todos">Todos</option>
                    @foreach($states as $state)
                      <option value="{{ $state->state }}">{{ $state->state }}</option>
                    @endforeach
              </select>
              @if ($errors->has('order'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('order') }}</strong>
                  </span>
              @endif
          </div>
      </div>
      <div class="footer text-center">
          <button style="color: #004A7F;" type="submit" class="btn btn-outline-dark"><i style="color: #004A7F;" class="fa fa-fw fa-search"></i> Filtrar</button>
      </div>
    </form>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Todos los padrinos/madrinas (Ordenados por estados)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Estado</th>
                      <th>Curriculum</th>
                      <th>Sector afiliado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($godparents as $godparent)
                        <tr>
                            <td>{{ $godparent->name }}</td>
                            <td>{{ $godparent->state }}</td>
                            <td>{{ $godparent->curriculum }}</td>
                            <td>{{ $godparent->type }}</td>
                            <td>
                                <a href="{{url('detailgodparent',Crypt::encrypt($godparent->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-search"></i></a>
                                <a href="{{url('ugodparents',Crypt::encrypt($godparent->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-edit"></i></a>
                                <a href="{{url('dgodparents',Crypt::encrypt($godparent->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($godparents) == 0)
                        <tr>
                            <td>No hay padrinos registrados</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                  </tbody>
                </table>
                <br>
                <div>{{ $godparents->links() }}</div>
              </div>
            </div>
          </div>
@endsection