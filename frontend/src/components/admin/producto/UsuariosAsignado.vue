<template>
    <div class="mt-3">
      <h2>Personas asignadas</h2>
      <div v-if="relacionPersona && relacionPersona.length > 0">
        <table class="table">
          <thead>
            <tr>
              <th>ID Usuario</th>
              <th>Nombre Usuario</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="person in relacionPersona" :key="person.id">
              <td>{{ person.id }}</td>
              <td>{{ person.name }}</td>
              <td><button class="btn btn-danger" @click="Borrar(person.idrela)">Eliminar</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script>
    import ApiServices from '@/ApiService';
    import { mapState } from 'vuex';
    import { showSuccess, showError } from '@/notificationService';
    export default {
      computed: {
          ...mapState(['relacionPersona']), // Mapear el estado personas del store
      },
      methods: {
        async Borrar(id){
          try {
               await ApiServices.deleteProductoUsuario(id);
                this.$store.commit('eliminarUsuarioProducto', id);
                showSuccess("Eliminado con exito")
            } catch (error) {
              showError('Error en el inicio de sesión:');
                console.error('Error en el inicio de sesión:', error);
            }
        }
      }
    };
</script>
  
  <style>
  /* Estilos opcionales */
  </style>