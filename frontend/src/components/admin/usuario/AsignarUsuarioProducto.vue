<template>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6">
          <h4>Asignar Producto a Persona</h4>
          <div class="mb-3">
            <label for="personaSelect" class="form-label">Persona</label>
            <select v-model="selectedPersona" class="form-select" id="personaSelect">
              <option v-for="persona in personas" :key="persona.id" :value="persona.id">{{ persona.name }}</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="productoSelect" class="form-label">Producto</label>
            <select v-model="selectedProducto" class="form-select" id="productoSelect">
              <option v-for="producto in productos" :key="producto.id" :value="producto.id">{{ producto.nombreproducto }}</option>
            </select>
          </div>
          <button @click="asignarProductoPersona" class="btn btn-primary">Asignar</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import ApiService from '@/ApiService';
  
  export default {
    data() {
      return {
        selectedProducto: null,
        selectedPersona: null,
        productos: [],
        personas: []
      };
    },
    created() {
      this.cargarProductos();
      this.cargarPersonas();
    },
    methods: {
      async cargarProductos() {
        try {
          this.productos = await ApiService.getProductos();
        } catch (error) {
          console.error('Error al cargar los productos:', error);
        }
      },
      async cargarPersonas() {
        try {

          this.personas =  await ApiService.getUsers();
        } catch (error) {
          console.error('Error al cargar las personas:', error);
        }
      },
      async asignarProductoPersona() {
        // Aquí puedes implementar la lógica para asignar el producto a la persona
        const data = {"producto_id":this.selectedProducto,"usuario_id":this.selectedPersona};
        const resonse = await ApiService.createProductoUsuario(data);
        console.log(resonse);
        // Por ejemplo, puedes enviar una solicitud HTTP POST al servidor para realizar la asignación
      }
    }
  };
  </script>
  
  <style>
  /* Estilos personalizados si es necesario */
  </style>
  