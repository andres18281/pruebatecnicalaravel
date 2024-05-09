export function isAuthenticated() {
    const token = localStorage.getItem('token'); // O desde Vuex: state.token
    return token !== null;
  }