
@extends('layouts.app')

@section('title','login')

@section('content')


<div class="pagetitle">
  <h1>Form Elements</h1>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <!-- General Form Elements -->
          <form>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nombre del Evento</label>
              <div class="col-sm-10">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Fecha de Inicio del Evento</label>
              <div class="col-sm-10">
                <input type="date" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Descripcion</label>
              <div class="col-sm-10">
                <textarea name="descripcion" id="descripcion" cols="10" rows="5"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">foto del Evento</label>
              <div class="col-sm-10">
                <input type="file" accept="image/png,image/jpeg" class="form-control" multiple>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Aforo</label>
              <div class="col-sm-10">
                <input type="number" class="form-control">
              </div>
            </div>
            <!-- <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div> -->
            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Fecha Inicial de inscripciones</label>
              <div class="col-sm-10">
                <input type="date" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Fecha Final de inscripciones</label>
              <div class="col-sm-10">
                <input type="date" class="form-control">
              </div>
            </div>
            @endsection