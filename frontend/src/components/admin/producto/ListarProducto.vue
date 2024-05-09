<template>
    <div class="container">
      <h2>Buscar Productos</h2>
      <div class="mb-3">
        <label for="busqueda" class="form-label">Buscar:</label>
        <input type="text" class="form-control" id="busqueda" v-model="terminoBusqueda">
      </div>
      <button class="btn btn-primary" @click="buscar">Buscar</button>
      
      <div class="mt-3">
        <table class="table">
          <thead>
            <tr>
              <th>ID Producto</th>
              <th>Nombre Producto</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="producto in productos" :key="producto.id">
              <td>{{ producto.id }}</td>
              <td>{{ producto.nombreproducto }}</td>
              <td><button class="btn btn-success" @click="BuscarUsuarios(producto.id)">Ver</button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <UsuariosAsignado/>

    </div>
  </template>
  
  <script>
  import ApiService from '@/ApiService';
  import { mapMutations } from 'vuex';  
  import UsuariosAsignado from './UsuariosAsignado.vue';
  
  export default {
  components: { UsuariosAsignado },
    data() {
      return {
        terminoBusqueda: '',
        productos:[]
      };
    },
    
    methods: {
      ...mapMutations(['setProductos', 'setRelacionPersona']), 
      async buscar() {
        // Aquí puedes agregar la lógica para realizar la búsqueda
        try {
            this.productos = await ApiService.getProductos();
        } catch (error) {
            console.error('Error en el inicio de sesión:', error);
        }
      },
      async BuscarUsuarios(id){
        try {
            const data = await ApiService.getAllUsuariosRelacionadosConProducto(id);
            this.setRelacionPersona(data);
        } catch (error) {
            console.error('Error en el inicio de sesión:', error);
        }
      },

    }
  };
  </script>