<template>
    <div class="mt-3">
      <h2>Productos asignados</h2>
      <div v-if="relacionProducto && relacionProducto.length > 0">
        <table class="table">
          <thead>
            <tr>
              <th>ID Usuario</th>
              <th>Nombre Usuario</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="productorela in relacionProducto" :key="productorela.id">
              <td>{{ productorela.id }}</td>
              <td>{{ productorela.nombreproducto }}</td>
              <td><button class="btn btn-danger" @click="Borrar(productorela.idrela)">Eliminar</button> </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script>
import { mapState } from 'vuex';
import ApiService from '@/ApiService';
import { showSuccess, showError } from '@/notificationService';
export default {
  computed: {
    ...mapState(['relacionProducto']), // Mapear el estado personas del store
  },
  methods: {
    async Borrar(id){
      try {
            await ApiService.deleteProductoUsuario(id);
            this.$store.commit('eliminarProductoUsuario', id);
            showSuccess("Eliminado con exito")
        } catch (error) {
           showError('Error');
            console.error('Error en el inicio de sesión:', error);
        }
    }
  }
};
</script>
  
  <style>
  /* Estilos opcionales */
  </style>