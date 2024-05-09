<template>
    <div>
      <div class="container">
        <h2>Registro de Usuario</h2>
        <form @submit.prevent="submitForm">
          <div>
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" v-model.trim="userData.name" required>
          </div>
          <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" class="form-control" id="email" v-model.trim="userData.email" required>
          </div>
          <div>
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" v-model.trim="userData.password" required>
          </div>
          <div>
            <label for="confirmPassword">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="confirmPassword" v-model.trim="confirmPassword" required>
          </div>
          <div v-if="passwordsMatch === false" style="color: red;">Las contraseñas no coinciden.</div>
          <button type="submit" class="btn btn-default">Registrarse</button>
          <div v-if="errorMessage" style="color: red;">{{ errorMessage }}</div>
        </form>
    </div>
   </div>
  </template>
  
  <script>
    import ApiService from '@/ApiService';
  export default {
    data() {
      return {
        userData: {
          name: '',
          email: '',
          password: ''
        },
        confirmPassword: '',
        passwordsMatch: true,
        errorMessage: ''
      };
    },
    methods: {
      async submitForm() {
        if (this.userData.password !== this.confirmPassword) {
          this.passwordsMatch = false;
          return;
        }
  
        // Aquí puedes enviar los datos del usuario a tu servidor para el registro
        // Por ejemplo, puedes utilizar Axios para hacer una solicitud HTTP POST
  
        // Reinicia los estados
        this.passwordsMatch = true;
        this.errorMessage = '';
        
        this.confirmPassword = '';
        await ApiService.createUser(this.userData);

        const loginResult = await ApiService.login({
          email: this.userData.email,
          password: this.userData.password
        });
        if (loginResult.error) {
          return;
        }
        this.$store.dispatch('login', loginResult.token);
        this.$router.push('/admin');
      }
    }
  };
  </script>
  
  <style scoped>
  /* Estilos opcionales */
  label {
    display: block;
    margin-bottom: 0.5rem;
  }
  input {
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
  }
  button {
    padding: 0.5rem 1rem;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
  }
  button:hover {
    background-color: #0056b3;
  }
  </style>
  