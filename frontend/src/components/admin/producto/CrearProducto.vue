<template>
    <div class="container">
      <h2>Formulario de Producto</h2>
      <form @submit.prevent="guardarProducto">
        <div class="mb-3">
          <label for="id" class="form-label">ID:</label>
          <input type="number" class="form-control" id="id" v-model="id">
        </div>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre del Producto:</label>
          <input type="text" class="form-control" id="nombre" v-model="nombre">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>
  </template>
  
  <script>
  import ApiService from '@/ApiService';
  import { showSuccess, showError } from '@/notificationService';
  export default {
    
    data() {
      return {
        id: null,
        nombre: '',
      };
    },
    methods: {
      async guardarProducto() {
        // Aquí puedes agregar la lógica para guardar el producto
        const data = {"id":this.id,"nombreproducto":this.nombre}
        const response = await ApiService.createProducto(data);
        if(response.error){
          showError(response.error);
        }else{
          showSuccess("Guardado con exito")
        }
        
      }
    }
  };
  </script>
  
  <!-- Estilos opcionales de Bootstrap -->
  <style src="bootstrap/dist/css/bootstrap.min.css"></style>
  