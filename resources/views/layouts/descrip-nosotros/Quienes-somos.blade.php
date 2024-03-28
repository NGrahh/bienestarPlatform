@extends('layouts.app')
{{-- @section('title','Agendacion cita') --}}
@section('content')

@include('layouts.header')
@include('layouts.menu')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    
    .contenedor {
  border: 1px solid black;
  height: 18rem;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
}

.contenedor img {
  max-width: 100%;
  max-height: 100%;
}

.descripcion {
  margin-top: 1rem;
}

.nEquipo {
  margin-top: 1rem;
}

.equipos {
  margin-top: 1rem;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(12rem, 1fr)); /* Utiliza el tamaño mínimo de 12rem y ajusta automáticamente el número de columnas según el espacio disponible */
  gap: 2px;
  justify-content: center; /* Centra los elementos dentro del contenedor */
}

li {
  list-style: none;
}

.circulo {
  border: 1px solid black;
  border-radius: 50px;
  width: 8rem;
  height: 8rem;
}

.profile-card {
  display: flex;
  align-items: center;
  padding: 20px;
}

.profile-image {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  overflow: hidden;
  margin-right: 20px;
}

.profile-info {
  flex: 1;
  display: flex;
  flex-direction: column;
}

.profile-title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

.profile-position {
  font-size: 18px;
  font-style: italic;
  margin-bottom: 10px;
}

.profile-details {
  font-size: 16px;
}

@media (max-width: 768px) {
  .profile-card {
    flex-direction: column;
    align-items: center;
  }
  .profile-image {
    margin-bottom: 20px;
  }
  .equipos {
    grid-template-columns: repeat(1, 1fr); /* Cambia a una sola columna en dispositivos con ancho menor o igual a 768px */
    margin-left: 0; /* Ajusta el margen izquierdo */
  }
}

.card1 {
  width: 90%; /* Ancho del 90% del contenedor padre */
  max-width: 35rem; /* Ancho máximo de 35rem */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
  margin: 0 auto; /* Centra horizontalmente */
}

/* Ajustes adicionales para dispositivos móviles */
@media (max-width: 768px) {
  .card1 {
    width: 100%; /* Ancho del 100% del contenedor padre */
    max-width: none; /* Elimina el ancho máximo */
    border-radius: 10px; /* Opcional: añade bordes redondeados */
    margin: 0 auto; /* Centra horizontalmente */
  }
}



</style>

<main id="main" class="main">
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 my-5">
          <div class="card">
            <div class="card-body">
              <div align="center" class="pt-4 pb-2">
                <div class="max-conten">
                    <div class="contenedor">
                        <img src="https://img.freepik.com/vector-premium/ilustracion-linda-cara-amor-emoji-smiley-ilustracion-emoticones-dibujos-animados-amor_123727-79.jpg" alt="Imagen">
                      </div>
                    

                    <div class="descripcion">
                      Por bienestar al aprendiz se entiende lo
                      que le hace bien y le conviene como ser humano, lo que genera satisfacción con la vida y
                      en consecuencia potencia su desarrollo como persona. Este desarrollo se fortalece a
                      través de la relación favorable consigo mismo, con los demás miembros de la comunidad,
                      con la naturaleza y con su ser trascendente, lo que aporta al fortalecimiento de la formación
                      profesional integral.                    </div>

                    <h3 class="nEquipo">Nuestro Equipo</h3>
                    <div class="equipos">
                        <div class="equipo1">
                            <ul>
                                <li>una persona</li>
                                <li>segunda persona</li>
                                <li>tercera persona</li>
                            </ul>
                        </div>
                        <div class="equipo2">
                            <ul>
                                <li>cuarta persona</li>
                                <li>quinta persona</li>
                                <li>sexta persona</li>
                            </ul>
                        </div>
                    </div>

                        <div class="container mt-4">
                            <div class="card1 profile-card">
                            <div class="profile-image">
                                <img src="https://via.placeholder.com/150" class="img-fluid" alt="Profile Image">
                            </div>
                            <div class="profile-info">
                                <div class="profile-title">Nombre Apellido</div>
                                <div class="profile-position">Cargo</div>
                                <div class="profile-details">
                                <p>Datos profesionales</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
