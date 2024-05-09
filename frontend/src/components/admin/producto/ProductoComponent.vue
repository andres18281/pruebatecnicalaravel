<template>
    <div>
      <h2>Productos</h2>
      <button class="btn "><router-link to="/admin/productos/crear">Crear Producto</router-link></button>
      <button class="btn "><router-link to="/admin/productos/listar">Listar Productos</router-link></button>
      <button class="btn "><router-link to="/admin/productos/asignarpersonas">Asignar Productos a personas</router-link></button>
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