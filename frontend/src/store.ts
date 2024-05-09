import { Context } from '@popperjs/core';
import { ActionContext, createStore } from 'vuex';
import ApiServices from './ApiService';

// Define tu estado inicial
interface State {
    productos: Producto[];
    personas: Persona[];
    relacionPersona: RelacionPersona[];
    relacionProducto: RelacionProducto[];
    token: string,
  }
  
  // Define una interfaz para tus productos y personas
  interface Producto {
    id: number;
    nombreproducto: string;
    idrela:number;
  }
  
  interface Persona {
    id: number;
    name: string;
  }

  interface RelacionPersona{
    id: number;
    name:string;
    idrela:number;
  }

  interface RelacionProducto{
    id:number;
    nombreproducto:string;
    idrela:number;
  }

  
  // Define tu estado inicial
  const initialState: State = {
    productos: [],
    personas: [],
    relacionPersona : [],
    relacionProducto: [],
    token: "",
  };

const state = {
  productos: [],
  personas: [],
  relacionPersona : [],
  relacionProducto: [],
  token: "",
};



// Define tus mutaciones para modificar el estado
const mutations = {
  setProductos(state: State, productos: Producto[]) {
    state.productos = productos;
  },
  setPersonas(state: State, personas: Persona[]) {
    state.personas = personas;
  },
  setRelacionProducto(state: State, relacionProducto: RelacionProducto[]){
    state.relacionProducto = relacionProducto;
  },
  setRelacionPersona(state:State, relacionPersona: RelacionPersona[]){
    state.relacionPersona = relacionPersona;
  },
  eliminarProductoUsuario(state: State, idrela: number) {
    state.relacionProducto = state.relacionProducto.filter(data => data.idrela !== idrela);
  },
  eliminarUsuarioProducto(state: State, idrela: number) {
    state.relacionPersona = state.relacionPersona.filter(data => data.idrela !== idrela);
  },
  setToken(state:State, token:string) {
    state.token = token;
  },
  clearToken(state:State) {
    state.token = "";
  },

};
// En tu archivo Vuex
const actions = {
    async eliminarProductoUsuario({ commit }: ActionContext<State, any>, idProducto: number) {
      try {

        
        // Llamar a la mutación para actualizar el estado
        commit('eliminarProductoUsuario', idProducto);
      } catch (error) {
        console.error('Error al eliminar el producto:', error);
      }
    },
    async eliminarUsuarioProducto({ commit }: ActionContext<State, any>, idProducto: number) {
      try {
  
        
        // Llamar a la mutación para actualizar el estado
        commit('eliminarUsuarioProducto', idProducto);
      } catch (error) {
        console.error('Error al eliminar el producto:', error);
      }
    },

    login({ commit }: ActionContext<State, any>, token:string) {
      localStorage.setItem('token', token); 
      commit('setToken', token);
    },
    logout({ commit }: ActionContext<State, any>) {
      localStorage.removeItem('token');
      commit('clearToken');
    },

    
  };


// Crea tu store
export default createStore({
  state,
  mutations,
  actions
});