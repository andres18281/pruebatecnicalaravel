<template>
    <div class="container mt-3">
      <h2 class="mb-4">Inicio de Sesión</h2>
      <form @submit.prevent="submitForm">
        <div class="mb-3">
          <label for="email" class="form-label">Correo Electrónico:</label>
          <input type="email" class="form-control" id="email" v-model="formData.email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña:</label>
          <input type="password" class="form-control" id="password" v-model="formData.password" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        <button class="btn btn-danger"><router-link to="/registrar">Registrarse</router-link></button>
      </form>
    </div>
  </template>
  
  <script>
    import ApiService from '@/ApiService';
    import { mapMutations } from 'vuex';
  export default {
    data() {
      return {
        formData: {
          email: '',
          password: ''
        }
      };
    },
    methods: {
      ...mapMutations(['setToken']),
      async submitForm() {
        const result = await ApiService.login(this.formData);
        if (result.error) {
          // Mostrar un mensaje de error al usuario
          console.error("Error al iniciar sesión:", result.error);
          return;
        }
        this.$store.dispatch('login', result.token);
        //this.setToken(result.token);
        this.$router.push('/admin');
      }
    }
  };
  </script>