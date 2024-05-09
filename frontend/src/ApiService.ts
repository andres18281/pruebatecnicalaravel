import axios from 'axios';
import { showSuccess, showError } from '@/notificationService';
const baseURL = 'http://localhost:8000/api'; // URL base de tu API

const ApiServices = {
    createProducto: async (productoData:any) => {
        try {
          const response = await axios.post(`${baseURL}/producto`, productoData);
          return response.data;
        } catch (error:any) {
          throw new Error(`Error al crear el producto: `);//${error.message}
        }
      },
    
      getProductos: async () => {
        try {
          const response = await axios.get(`${baseURL}/productos`);
          return response.data;
        } catch (error) {
          throw new Error(`Error al obtener los productos: `); //${error.message}
        }
      },
    
      getProducto: async (id:number) => {
        try {
          const response = await axios.get(`${baseURL}/producto/${id}`);
          return response.data;
        } catch (error) {
          throw new Error(`Error al obtener el producto: `); //${error.message}
        }
      },
    
      // UserController
      createUser: async (userData:any) => {
        try {
          const response = await axios.post(`${baseURL}/usuario`, userData);
          showSuccess("Usuario registrado!");
          return response.data;
        } catch (error) {
          showError("Error al crear el usuario:");
          throw new Error(`Error al crear el usuario: `); //${error.message}
         
        }
      },

      login: async (userData:any) => {
        try {
          const response = await axios.post(`${baseURL}/login`, userData);
          showSuccess("¡Bienvenido!");
          return response.data;
        } catch (error:any) {
          if (error.response && error.response.status === 401) {
            // El servidor respondió con un error 401 Unauthorized
            showError("Credenciales inválidas. Por favor, verifica tus credenciales.");
            return { error: "Credenciales inválidas. Por favor, verifica tus credenciales." };
          } else {
            // Otro tipo de error
            showError("Error al iniciar sesión. Por favor, intenta de nuevo más tarde.");
            return { error: "Error al iniciar sesión. Por favor, intenta de nuevo más tarde." };
          }
        }
      },
      getUser: async (id:number) => {
        try {
          const response = await axios.get(`${baseURL}/usuario/${id}`);
          return response.data;
        } catch (error) {
          showError("Error al obtener el usuario");
          throw new Error(`Error al obtener el usuario: `); //${error.message}
        }
      },
    
      getUsers: async () => {
        try {
          const response = await axios.get(`${baseURL}/usuarios`);
          return response.data;
        } catch (error) {
          showError("Error al obtener los usuarios");
          throw new Error(`Error al obtener los usuarios: `); //${error.message}
        }
      },
    
      // ProductoUserController
      createProductoUsuario: async (productoUsuarioData:any) => {
        try {
          const response = await axios.post(`${baseURL}/productousuario`, productoUsuarioData);
          return response.data;
        } catch (error) {
          throw new Error(`Error al crear la relación producto-usuario: `); //${error.message}
        }
      },
    
      updateProductoUsuario: async (id:number, productoUsuarioData:any) => {
        try {
          const response = await axios.put(`${baseURL}/productousuario/${id}`, productoUsuarioData);
          return response.data;
        } catch (error) {
          throw new Error(`Error al actualizar la relación producto-usuario: `); //${error.message}
        }
      },
    
      deleteProductoUsuario: async (id:number) => {
        try {
          await axios.delete(`${baseURL}/productousuario/${id}`);
        } catch (error) {
          throw new Error(`Error al eliminar la relación producto-usuario: `); //${error.message}
        }
      },
    
      getAllUsuariosRelacionadosConProducto: async (id:number) => {
        try {
          const response = await axios.get(`${baseURL}/usuarios-relacionados-producto/${id}`);
          if (Array.isArray(response.data) && response.data.length === 0) {
            showError("No tiene usuarios relacionados con el producto");
          }
          return response.data;
        } catch (error) {
          throw new Error(`Error al obtener los usuarios relacionados con el producto: `); //${error.message}
        }
      },
    
      getAllProductosRelacionadosConUsuario: async (id:number) => {
        try {
          const response = await axios.get(`${baseURL}/productos-relacionados-usuario/${id}`);
          if (Array.isArray(response.data) && response.data.length === 0) {
            showError("No tiene productos relacionados con el usuario");
          }
          return response.data;
        } catch (error) {
          throw new Error(`Error al obtener los productos relacionados con el usuario: `); //${error.message}
        }
      },

  // Define otras funciones para otras solicitudes según sea necesario
};

export default ApiServices;