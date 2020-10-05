@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Error interno (Mayor detalles abajo)</h1>
@endsection

@section('content')
  <div style="text-align: center;" class="card shadow mb-4">
      <h4 class="mb-5">{{ $mensaje }}</h4>
      <a href="javascript:history.back(-1);" style="font-size: 1.5em; font-weight: bold; color: #004A7F;"><i style="color: #004A7F;" class="fa fa-fw fa-step-backward"></i> Regresar</a>
  </div>
@endsection