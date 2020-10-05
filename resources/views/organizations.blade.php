@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Organizaciones</h1>
    <a href="{{ route('rorganizations') }}" style="background: #004A7F;" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Añadir organización</a>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Todos las organizaciones</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table style="font-size: 0.8em;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Estado</th>
                      <th>Tipo</th>
                      <th>Persona de contacto</th>
                      <th>Posición</th>
                      <th>Correo</th>
                      <th>Teléfono</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($organizations as $organization)
                        <tr>
                            <td>{{ $organization->name }}</td>
                            <td>{{ $organization->state }}</td>
                            <td>{{ $organization->type }}</td>
                            <td>{{ $organization->person_contact }}</td>
                            <td>{{ $organization->person_position }}</td>
                            <td>{{ $organization->person_mail }}</td>
                            <td>{{ $organization->person_cellphone }}</td>
                            <td>
                                <a href="{{url('detailorga',Crypt::encrypt($organization->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-search"></i></a>
                                <a href="{{url('uorganizations',Crypt::encrypt($organization->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-edit"></i></a>
                                <a href="{{url('dorganizations',Crypt::encrypt($organization->id))}}"><i style="color: #004A7F;" class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($organizations) == 0)
                        <tr>
                            <td>No hay organizaciones registradas</td>
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
                <div>{{ $organizations->links() }}</div>
              </div>
            </div>
          </div>
@endsection