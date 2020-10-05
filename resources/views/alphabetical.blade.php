@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Organizaciones</h1>
    <form style="margin: 0 auto;" class="form-login" method="POST">
      @csrf
      <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
        <label class="col-md-12 control-label" style="text-align: center;">Tipo de ordenamiento</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                <i style="color: #004A7F;" class="fa fa-fw fa-sort-amount-down-alt"></i>
                </span>
            </div>
            <select type="text" id="order" name="order" class="form-control" required>
              @if($order == "Ascendente")
                <option value="Ascendente" selected>Ascendente</option>
                <option value="Descendente">Descendente</option>
              @endif
              @if($order == "Descendente")
                <option value="Ascendente">Ascendente</option>
                <option value="Descendente" selected>Descendente</option>
              @endif
            </select>
        </div>
      </div>
      <div class="footer text-center">
          <button style="color: #004A7F;" type="submit" class="btn btn-outline-dark"><i style="color: #004A7F;" class="fa fa-fw fa-search"></i> Ordenar</button>
      </div>
    </form>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Todos las organizaciones (Ordenadas por nombre alfabeticamente)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Estado</th>
                      @if (Auth::guest())
                      @else
                        <th>Opciones</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($organizations as $organization)
                        <tr>
                            <td>{{ $organization->name }}</td>
                            <td>{{ $organization->state }}</td>
                            @if (Auth::guest())
                            @else
                              <td>
                                  <a href="{{url('detailorga',Crypt::encrypt($organization->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-search"></i></a>
                              </td>
                            @endif
                        </tr>
                    @endforeach
                    @if(count($organizations) == 0)
                        <tr>
                            <td>No hay organizaciones registradas</td>
                            <td></td>
                        </tr>
                    @endif
                  </tbody>
                </table>
                <br>
                <div>{{ $organizations->links() }}</div>
              </div>
            </div>
          </div>
@endsection