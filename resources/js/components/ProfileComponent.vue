<template>
 
  <b-container  >
  <b-card >
    <b-form class="m-3"  action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" v-model="csrfToken">
      <b-form-group 
        label="Correo Electrónico:" 
      >
        <b-form-input
          id="input-1" 
          type="email"
          v-model="user.email"
          required
          name="email"
          disabled
          placeholder="Ingresa tu correo"
        ></b-form-input>
      </b-form-group>

      <b-form-group  label="Tú nombre:"  >
        <b-form-input 
          v-model="user.name"
          required
          name="name"
          placeholder="Ingresa tu nombre"
        ></b-form-input>
      </b-form-group>

      <b-form-group  label="Nueva Contraseña:"  >
        <b-form-input 
          type="password" name="password"
          placeholder="Ingresa tu clave"
        ></b-form-input>
      </b-form-group>

      <b-form-group  label="Cambiar imagen de Perfil (Solo si lo deseas)"  >
         <b-img :src="image" rounded="circle" width="60" height="60" alt="Imagen de perfil" title="Imagen Actual" class="m-1"/>
        <b-form-file  name="image"
          placeholder="Sube una nueva imagen"
        ></b-form-file>
      </b-form-group>

     

      <b-button type="submit" variant="primary">Guardar Cambios</b-button> 
    </b-form> 
  </b-card>
  </b-container>
 
</template>

<script>
  export default {
    props:{
      user: Object,
      csrfToken: String
    },
    data() {
      return {   
      }
    },
    computed: { 
      image(){
        return `/img/${this.user.image}`;
      }
    }
  }
</script>