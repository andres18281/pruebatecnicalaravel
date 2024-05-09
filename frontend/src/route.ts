


import { createRouter, createWebHistory } from 'vue-router';
import LoginComponent from './components/LoginComponent.vue';
import RegistroComponent from './components/RegistroComponent.vue';
import AdminPanel from './components/AdminPanel.vue';
import UsuarioComponent from './components/admin/usuario/UsuarioComponent.vue';
import ProductoComponent from './components/admin/producto/ProductoComponent.vue';
import CrearProducto from './components/admin/producto/CrearProducto.vue';
import ListarProducto from './components/admin/producto/ListarProducto.vue';
import ListarUsuarios from './components/admin/usuario/ListarUsuarios.vue';
import AsignarProductoUsuario from './components/admin/producto/AsignarProductoUsuario.vue';
import AsignarUsuarioProducto from './components/admin/usuario/AsignarUsuarioProducto.vue';
import { isAuthenticated } from './auth'; 
const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: LoginComponent },
    { path: '/registrar', component: RegistroComponent },
    {
      path: '/admin',
      component: AdminPanel,meta: { requiresAuth: true },
      children: [
        { path: 'usuarios', component: UsuarioComponent },
        { path: 'productos', component: ProductoComponent },
        { path: 'productos/crear', component: CrearProducto },
        { path: 'productos/listar', component: ListarProducto },
        { path: 'usuarios/listar', component: ListarUsuarios },
        { path: 'productos/asignarpersonas', component:  AsignarProductoUsuario},
        { path: 'usuarios/asignarproducto', component:  AsignarUsuarioProducto},

      ]
    }
  ]
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !isAuthenticated()) {
    // Si la ruta requiere autenticación y el usuario no está autenticado,
    // redirige al componente de inicio de sesión
    next('/');
  } else {
    // De lo contrario, permite continuar con la navegación
    next();
  }
});

export default router;