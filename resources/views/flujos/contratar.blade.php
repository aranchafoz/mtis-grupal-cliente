@extends('layouts.master')

@section('styles')
    <link href="{{ asset('css/views/contratar.css') }}" rel="stylesheet">

@section('content')
    <div class="container-fluid">
        @if (isset($alert))
            @if ($alert['ok'] == true)
            <div class="alert alert-success">
                {{ $alert['message'] }}
            </div>
            @else
            <div class="alert alert-warning">
                <strong>Error: </strong> {{ $alert['message'] }}
            </div>
            @endif
        @endif

        <div class="row">
          <div class="col-sm-12" style="margin-bottom: 30px">
            <button class="btn btn-primary btn-fill pull-right" type="button" data-toggle="collapse" data-target=".offer-form-collapse" aria-expanded="false" aria-controls="offerFormCollapse">
              Crear oferta
            </button>
          </div>
        </div>

        <div class="row">
              <div class="col-sm-12">
                  <div class="card collapse offer-form-collapse" id="offerFormCollapse">
                      <div class="header">
                          <h4 class="title">Crear una Oferta de Trabajo</h4>
                      </div>
                      <div class="content">
                          {!! Form::open(['action' => ['ContratarController@crearOferta'], 'method' => 'post']) !!}
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Categoría</label>
                                          <input name="category" type="text" class="form-control" placeholder="Ej.: PROGRAMMING">
                                      </div>
                                  </div>
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <label>Título</label>
                                          <input name="title" type="text" class="form-control" placeholder="Ej.: Senior Python Developer">
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Descripción</label>
                                          <textarea name="description" rows="5" class="form-control" placeholder="Ej.: We are looking for a python developer with 4 or more years of experience"></textarea>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <h6>Habilidades - Requisitos Mínimos</h6>
                                </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Nombre</label>
                                          <input name="skill1name" type="text" class="form-control" placeholder="Ej.: PHP">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Nivel</label>
                                          <input name="skill1level" type="number" min="0" max="10" class="form-control" placeholder="Ej.: 8">
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input name="skill2name" type="text" class="form-control" placeholder="Ej.: PHP">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nivel</label>
                                        <input name="skill2level" type="number" min="0" max="10" class="form-control" placeholder="Ej.: 8">
                                    </div>
                                </div>
                              </div>

                              <button type="submit" class="btn btn-success btn-fill pull-right">Create</button>
                              <div class="clearfix"></div>
                          {!! Form::close() !!}
                      </div>
                  </div>
              </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="ofertas-tab" data-toggle="tab" href="#ofertas" role="tab" aria-controls="ofertas" aria-selected="true">Ofertas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="solicitantes-tab" data-toggle="tab" href="#solicitantes" role="tab" aria-controls="solicitantes" aria-selected="false">Solicitantes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="candidatos-tab" data-toggle="tab" href="#candidatos" role="tab" aria-controls="candidatos" aria-selected="false">Candidatos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="trabajadores-tab" data-toggle="tab" href="#trabajadores" role="tab" aria-controls="trabajadores" aria-selected="false">Trabajadores</a>
              </li>
            </ul>
          </div>

          <div class="tab-content" id="myTabContent">
              <!-- Ofertas -->
              <div class="col-md-12 tab-pane fade active" id="ofertas" role="tabpanel" aria-labelledby="ofertas-tab">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Ofertas de Trabajo</h4>
                      </div>
                      <div class="content table-responsive table-full-width">
                          <table class="table table-hover table-striped">
                              <thead>
                                <th>ID</th>
                                <th>Categoría</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Requisitos mínimos</th>
                                <th>Publicar</th>
                              </thead>
                              <tbody>
                                @foreach($ofertas as $oferta)
                                  {!! Form::open(['action' => ['ContratarController@publicarOferta', $oferta->id], 'method' => 'post']) !!}
                                    <tr>
                                      <td>{{ $oferta->id }}</td>
                                      <td>{{ $oferta->category }}</td>
                                      <td>{{ $oferta->title }}</td>
                                      <td>{{ $oferta->description }}</td>
                                      <td>
                                        <ul class="skills-list">
                                          @foreach($oferta->minimumRequirements as $key => $value)
                                            <li>{{ $key }}:&nbsp;{{ $value }}</li>
                                          @endforeach
                                        </ul>
                                      </td>
                                      <td>
                                        @if($oferta->published)
                                          <small><i>Publicada</i></small>
                                        @else
                                          <button class="btn-link" type="submit">
                                            <i class="pe-7s-cloud-upload"></i>
                                          </button>
                                        @endif
                                      </td>
                                    </tr>
                                  {!! Form::close() !!}
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>


              <!-- Solicitantes -->
              <div  class="col-md-12 tab-pane fade" id="solicitantes" role="tabpanel" aria-labelledby="solicitantes-tab">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Perfiles Solicitantes</h4>
                      </div>
                      <div class="content table-responsive table-full-width">
                          <table class="table table-hover table-striped">
                              <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Nacimiento</th>
                                <th>Localización</th>
                                <th>Habilidades</th>
                                <th>Oferta</th>
                                <th>Via</th>
                                <th>Evaluar</th>
                              </thead>
                              <tbody>
                                @foreach($solicitantes as $solicitante)
                                  <tr>
                                    <td>{{ $solicitante->id }}</td>
                                    <td>{{ $solicitante->name }}</td>
                                    <td>{{ $solicitante->surnames }}</td>
                                    <td>{{ date('d-m-Y', strtotime($solicitante->birthdate)) }}</td>
                                    <td>{{ $solicitante->location }}</td>
                                    <td>
                                      <ul class="skills-list">
                                        @foreach($solicitante->habilities as $key => $value)
                                          <li>{{ $key }}:&nbsp;{{ $value }}</li>
                                        @endforeach
                                      </ul>
                                    </td>
                                    <td>{{ $solicitante->apliedJob }}</td>
                                    <td>{{ $solicitante->via }}</td>
                                    <td>
                                      <button class="btn-link" type="button" data-toggle="modal" data-target="#evaluarModal{{ $solicitante->id }}">
                                        <i class="pe-7s-note"></i>
                                      </button>
                                      @component('flujos.modal-contratar-evaluar', ['solicitante' => $solicitante])
                                      @endcomponent
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>


              <!-- Candidatos -->
              <div  class="col-md-12 tab-pane fade" id="candidatos" role="tabpanel" aria-labelledby="candidatos-tab">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Perfiles Candidatos</h4>
                      </div>
                      <div class="content table-responsive table-full-width">
                          <table class="table table-hover table-striped">
                              <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Nacimiento</th>
                                <th>Localización</th>
                                <th>Habilidades</th>
                                <th>Oferta</th>
                                <th>Nota</th>
                                <th>Comentarios</th>
                                <th><center>Contratar</center></th>
                              </thead>
                              <tbody>
                                @foreach($candidatos as $candidato)
                                  {!! Form::open(['action' => ['ContratarController@contratarPerfil', $candidato->id], 'method' => 'post']) !!}
                                    <tr>
                                      <td>{{ $candidato->id }}</td>
                                      <td>{{ $candidato->name }}</td>
                                      <td>{{ $candidato->surnames }}</td>
                                      <td>{{ date('d-m-Y', strtotime($candidato->birthdate)) }}</td>
                                      <td>{{ $candidato->location }}</td>
                                      <td>
                                        <ul class="skills-list">
                                          @foreach($candidato->habilities as $key => $value)
                                            <li>{{ $key }}:&nbsp;{{ $value }}</li>
                                          @endforeach
                                        </ul>
                                      </td>
                                      <td>{{ $candidato->apliedJob }}</td>
                                      <td>{{ $candidato->aplicationMark }}</td>
                                      <td><small>{{ $candidato->aplicationComments }}</small></td>
                                      <td>
                                        <button class="btn btn-success btn-fill" type="submit">
                                          <i class="pe-7s-mail-open-file"></i>
                                        </button>
                                      </td>
                                    </tr>
                                  {!! Form::close() !!}
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>


              <!-- Trabajadores -->
              <div  class="col-md-12 tab-pane fade" id="trabajadores" role="tabpanel" aria-labelledby="trabajadores-tab">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Trabajadores</h4>
                      </div>
                      <div class="content table-responsive table-full-width">
                          <table class="table table-hover table-striped">
                              <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Nacimiento</th>
                                <th>Localización</th>
                                <th>Puesto</th>
                                <th>Habilidades</th>
                              </thead>
                              <tbody>
                                @foreach($trabajadores as $trabajador)
                                  <tr>
                                    <td>{{ $trabajador->id }}</td>
                                    <td>{{ $trabajador->name }}</td>
                                    <td>{{ $trabajador->surnames }}</td>
                                    <td>{{ date('d-m-Y', strtotime($trabajador->birthdate)) }}</td>
                                    <td>{{ $trabajador->location }}</td>
                                    <td>{{ $trabajador->job }}</td>
                                    <td>
                                      <ul class="skills-list">
                                        @foreach($trabajador->habilities as $key => $value)
                                          <li>{{ $key }}:&nbsp;{{ $value }}</li>
                                        @endforeach
                                      </ul>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>


          </div>
        </div>

    </div>
@stop
