<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <router-link to="/" class="navbar-brand">Mi Aplicación</router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <button class="btn btn-danger" @click="cerrarSesion">Cerrar Sesión</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
        <div>
            <h1>Panel de Administración</h1>
            <ul>
            <li><router-link to="/admin/usuarios">Usuarios</router-link></li>
            <li><router-link to="/admin/productos">Productos</router-link></li>
            </ul>
            <router-view></router-view>
        </div>
      
    </div>
  </template>
  <style>
  /* Estilos personalizados para el menú vertical */
  .vertical-menu {
    width: 200px;
  }
  .vertical-menu a {
    background-color: #f8f9fa;
    color: #343a40;
    display: block;
    padding: 10px 20px;
    text-decoration: none;
    border-bottom: 1px solid #dee2e6; /* Línea separadora entre elementos */
    transition: background-color 0.3s; /* Transición suave del color de fondo al pasar el ratón */
  }
  .vertical-menu a:hover {
    background-color: #e9ecef; /* Cambio de color de fondo al pasar el ratón */
  }
  .vertical-menu a.active {
    background-color: #007bff; /* Color de fondo para el elemento activo */
    color: white; /* Color de texto para el elemento activo */
  }
</style>
  <script>
  import { mapActions } from 'vuex';
  export default {
    
    methods: {
      ...mapActions(['logout']),
      cerrarSesion(){
        this.logout();
        this.$router.push('/');
      }
    }

    
  };
  </script>