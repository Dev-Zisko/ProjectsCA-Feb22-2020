@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Padrinos y Madrinas</h1>
    <a href="{{ route('rgodparents') }}" style="background: #004A7F;" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Añadir Padrino/Madrina</a>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #004A7F !important;" class="m-0 font-weight-bold text-primary">Todos los padrinos y madrinas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table style="font-size: 0.8em;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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