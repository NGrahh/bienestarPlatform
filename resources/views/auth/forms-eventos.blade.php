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
              <label for="inputText" class="col-sm-2 col-form-label">Psicologia</label>
            </div>
            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">N° de Identificacion</label>
              <div class="col-sm-10">
                <input type="number" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Correo Electronico</label>
              <div class="col-sm-10">
                <input type="number" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Asunto el cual pide la cita</label>
              <div class="col-sm-10">
                <textarea name="descripcion" id="descripcion" cols="10" rows="5"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Fecha de la cita</label>
              <div class="col-sm-10">
                <input type="date" class="form-control">
              </div>
            </div>
            <div class="botons-citas" style="display:flex">
            <button  type="submit"  class="btn btn-primary">Cancelar</button>
            <button style="margin-left:10px "type="submit" class="btn btn-primary">Enviar</button>
            </div>
            <!-- <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div> -->
            
            @endsection