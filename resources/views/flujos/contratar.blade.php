@extends('layouts.master')

@section('styles')
    <link href="{{ asset('css/views/contratar.css') }}" rel="stylesheet">

@section('content')
    <div class="container-fluid">

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
                          <form>
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
                          </form>
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
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                    <td>Oud-Turnhout</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                    <td>Sinaai-Waas</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                    <td>Baileux</td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                  </tr>
                                  <tr>
                                    <td>5</td>
                                    <td>Doris Greene</td>
                                    <td>$63,542</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                  </tr>
                                  <tr>
                                    <td>6</td>
                                    <td>Mason Porter</td>
                                    <td>$78,615</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                  </tr>
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
                                <th>Categoría</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Requisitos mínimos</th>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                    <td>Oud-Turnhout</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                    <td>Sinaai-Waas</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                    <td>Baileux</td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                  </tr>
                                  <tr>
                                    <td>5</td>
                                    <td>Doris Greene</td>
                                    <td>$63,542</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                  </tr>
                                  <tr>
                                    <td>6</td>
                                    <td>Mason Porter</td>
                                    <td>$78,615</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                  </tr>
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
                                <th>Categoría</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Requisitos mínimos</th>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                    <td>Oud-Turnhout</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                    <td>Sinaai-Waas</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                    <td>Baileux</td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                  </tr>
                                  <tr>
                                    <td>5</td>
                                    <td>Doris Greene</td>
                                    <td>$63,542</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                  </tr>
                                  <tr>
                                    <td>6</td>
                                    <td>Mason Porter</td>
                                    <td>$78,615</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                  </tr>
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
                                <th>Categoría</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Requisitos mínimos</th>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                    <td>Oud-Turnhout</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                    <td>Sinaai-Waas</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                    <td>Baileux</td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                  </tr>
                                  <tr>
                                    <td>5</td>
                                    <td>Doris Greene</td>
                                    <td>$63,542</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                  </tr>
                                  <tr>
                                    <td>6</td>
                                    <td>Mason Porter</td>
                                    <td>$78,615</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>


          </div>
        </div>

    </div>
@stop
