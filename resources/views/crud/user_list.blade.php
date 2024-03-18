<!DOCTYPE html>
@extends('layouts.app')

{{-- @section('title','Agendacion cita') --}}

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 align="center" class="card-title">Lista de usuarios</h5>
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="datatable-top">
                            <div class="datatable-dropdown">

                            </div>
                            <div class="datatable-search">
                                <input type="search" class="datatable-input" placeholder="Search..." title="Search within table">
                            </div>
                        </div>
                    </div>
                    <div class="datatable-container">
                        <table class="table  datatable datatable-table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th data-sortable="true">
                                        <button class="datatable-sorter">
                                            <b>#</b>
                                        </button>
                                    </th>

                                    <th scope="col" data-sortable="true" aria-sort="ascending" class="datatable-ascending">
                                        <button class="datatable-sorter">
                                            <b>N</b>ame
                                        </button>
                                    </th>

                                    <th scope="col">
                                        <button class="datatable-sorter">
                                            <b>T. Documento</b>
                                        </button>
                                    </th>

                                    <th scope="col">
                                        <button class="datatable-sorter">
                                            <b>N°. Documento</b>
                                        </button>
                                    </th>

                                    <th scope="col">
                                        <button class="datatable-sorter">
                                            <b>C. Electrónico</b>
                                        </button>
                                    </th>

                                    <th scope="col">
                                        <button class="datatable-sorter">
                                            <b>Tipo de sangre (RH)</b>
                                        </button>
                                    </th>
                                    <th scope="col">
                                        <button class="datatable-sorter">
                                            <b>Rol</b>
                                        </button>
                                    </th>
                                    <th scope="col">Acciones

                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>Ivan Mauricio Duque</td>
                                    <td>CC</td>
                                    <td>1089599928</td>
                                    <td>duqueivan493@gmail.com</td>
                                    <td>O+</td>
                                    <td>Aprendiz</td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td>José Pérez</td>
                                    <td>CE</td>
                                    <td>987654321</td>
                                    <td>joseperez@example.com</td>
                                    <td>A-</td>
                                    <td>Profesor</td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td>Maria Garcia</td>
                                    <td>TI</td>
                                    <td>123456789</td>
                                    <td>maria.garcia@example.com</td>
                                    <td>B+</td>
                                    <td>Administrativo</td>
                                </tr>
                                <tr>
                                    <th>4</th>
                                    <td>John Doe</td>
                                    <td>CC</td>
                                    <td>456789012</td>
                                    <td>johndoe@example.com</td>
                                    <td>AB-</td>
                                    <td>Estudiante</td>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <td>Ana López</td>
                                    <td>CC</td>
                                    <td>543210987</td>
                                    <td>ana.lopez@example.com</td>
                                    <td>O-</td>
                                    <td>Voluntario</td>
                                </tr>
                                <tr>
                                    <th>6</th>
                                    <td>Carlos Martínez</td>
                                    <td>CE</td>
                                    <td>159753468</td>
                                    <td>carlosmartinez@example.com</td>
                                    <td>A+</td>
                                    <td>Entrenador</td>
                                </tr>
                                <tr>
                                    <th>7</th>
                                    <td>Andrea Rodríguez</td>
                                    <td>Pasaporte</td>
                                    <td>246801357</td>
                                    <td>andrearodriguez@example.com</td>
                                    <td>B-</td>
                                    <td>Consultor</td>
                                </tr>
                                <tr>
                                    <th>8</th>
                                    <td>Luisa Fernández</td>
                                    <td>CC</td>
                                    <td>789456123</td>
                                    <td>luisafernandez@example.com</td>
                                    <td>AB+</td>
                                    <td>Investigador</td>
                                </tr>
                                <tr>
                                    <th>9</th>
                                    <td>Pablo González</td>
                                    <td>TI</td>
                                    <td>321654987</td>
                                    <td>pablogonzalez@example.com</td>
                                    <td>O+</td>
                                    <td>Asistente</td>
                                </tr>
                                <tr>
                                    <th>10</th>
                                    <td>Sofía Pérez</td>
                                    <td>Pasaporte</td>
                                    <td>963258741</td>
                                    <td>sofiaperez@example.com</td>
                                    <td>A-</td>
                                    <td>Analista</td>
                                </tr>
                                <tr>
                                    <th>11</th>
                                    <td>Juan Ramírez</td>
                                    <td>CC</td>
                                    <td>654987321</td>
                                    <td>juanramirez@example.com</td>
                                    <td>B+</td>
                                    <td>Desarrollador</td>
                                </tr>
                                <tr>
                                    <th>12</th>
                                    <td>Lucía López</td>
                                    <td>CE</td>
                                    <td>147258369</td>
                                    <td>lucialopez@example.com</td>
                                    <td>AB-</td>
                                    <td>Coordinador</td>
                                </tr>
                                <tr>
                                    <th>13</th>
                                    <td>Ricardo Martínez</td>
                                    <td>CC</td>
                                    <td>369258147</td>
                                    <td>ricardomartinez@example.com</td>
                                    <td>O-</td>
                                    <td>Supervisor</td>
                                </tr>
                                <tr>
                                    <th>14</th>
                                    <td>María José Rodríguez</td>
                                    <td>Pasaporte</td>
                                    <td>852147963</td>
                                    <td>mariajoserodriguez@example.com</td>
                                    <td>A+</td>
                                    <td>Gerente</td>
                                </tr>
                                <tr>
                                    <th>15</th>
                                    <td>Diego González</td>
                                    <td>TI</td>
                                    <td>478596321</td>
                                    <td>diegogonzalez@example.com</td>
                                    <td>B-</td>
                                    <td>Director</td>
                                </tr>

                            </tbody>
                        </table>
                    </div class="datatable-bottom">
                    <div class="datatable-info">
                        Showing 1 to 10 of 100 entries
                    </div>
                    <nav class="datatable-pagination">
                        <ul class="datatable-pagination-list">
                            <li class="datatable-pagination-list-item datatable-hidden datatable-disabled">
                            <button data-page="1" class="datatable-pagination-list-item-link" aria-label="Page 1">
                                
                            </button>
                            </li>
                        </ul>
                    </nav>
                    <div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection