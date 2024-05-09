<template>
    <div>
      <h2>Usuarios</h2>
      <button class="btn "><router-link to="/admin/usuarios/listar">Listar Usuarios</router-link></button>
      <button class="btn "><router-link to="/admin/usuarios/asignarproducto">Asignar productos</router-link></button>
      <router-view></router-view>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {};
    },
  };
  </script>