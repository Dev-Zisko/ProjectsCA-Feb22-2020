@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Iniciativas</h1>
    <a href="{{ route('rinitiatives') }}" style="background: #004A7F;" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Añadir iniciativa</a>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Todos las iniciativas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table style="font-size: 0.8em;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Postnombre</th>
                      <th>Status</th>
                      <th>Acciones   <a href="https://coalicionanticorrupcion.com/index.php/en/mandatos" target="_blank"><i style="color: #004A7F;" class="fa fa-fw fa-external-link-alt"></i></a></th>
                      <th>Observación</th>
                      <th>Organización</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($initiatives as $position => $initiative)
                        <tr>
                            <td>{{ $initiative->name }}</td>
                            <td>{{ $initiative->postname }}</td>
                            <td>{{ $initiative->status }}</td>
                            <td>
                              @foreach($actions as $action)
                                @if($action->id_initiative == $initiative->id)
                                  {{ $action->action }}</br>
                                @endif
                              @endforeach
                            </td>
                            <td>{{ $initiative->observation }}</td>
                            <td>{{ $initiative->state }}</td>
                            <td>
                                <a href="{{url('detailini',Crypt::encrypt($initiative->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-search"></i></a>
                                <a href="{{url('uinitiatives',Crypt::encrypt($initiative->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-edit"></i></a>
                                <a href="{{url('dinitiatives',Crypt::encrypt($initiative->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($initiatives) == 0)
                        <tr>
                            <td>No hay iniciativas registradas</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                  </tbody>
                </table>
                <br>
                <div>{{ $initiatives->links() }}</div>
              </div>
            </div>
          </div>
@endsection