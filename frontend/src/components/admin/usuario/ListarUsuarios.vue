<template>
    <div class="container mt-4">
      <!-- Buscador -->
      <div class="row">
        <div class="col-md-8">
          <input type="text" class="form-control" placeholder="Buscar">
        </div>
        <div class="col-md-4">
          <button class="btn btn-primary"  @click="buscar">Buscar</button>
        </div>
      </div>
      
      <!-- Tabla -->
      <div class="row mt-4">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID Usuario</th>
                <th scope="col">Nombre Usuario</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <!-- Aquí irán los datos de la tabla -->
              <tr v-for="persona in personas" :key="persona.id">
                <td>{{ persona.id }}</td>
                <td>{{ persona.name }}</td>
                <td><button class="btn btn-success" @click="BuscarProductos(persona.id)">Ver</button></td>
            </tr>
              <!-- Agrega más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
      <ProductosAsignados/>
    </div>
  </template>
  
  <script>
  import ApiService from '@/ApiService';
  import { mapMutations } from 'vuex';  
  import ProductosAsignados from './ProductosAsignados.vue';



  export default {
  components: { ProductosAsignados },
    data() {
      return {
        terminoBusqueda: '',
        personas:[]
      };
    },
    methods: {
      ...mapMutations(['setRelacionProducto']), 
      async buscar() {
        // Aquí puedes agregar la lógica para realizar la búsqueda
        try {
            this.personas = await ApiService.getUsers();
        } catch (error) {
            console.error('Error en el inicio de sesión:', error);
        }
      },
      async BuscarProductos(id){
        try {
            const data = await ApiService.getAllProductosRelacionadosConUsuario(id);
            this.setRelacionProducto(data);
        } catch (error) {
            console.error('Error en el inicio de sesión:', error);
        }
      },

    }
  };
  </script>
  
  <style>
  /* Agrega estilos personalizados aquí si es necesario */
  </style>