<template>
    <li class="list-group-item list-group-item-primary">
        <b-row class="p-2" align-h="center">
            <b-col cols="12" md="3" class="text-center">
                <b-img  rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="m-1"></b-img>
            </b-col>
            <b-col cols="6" align-self="center" class="d-none d-md-block">
                <p class="mb-0">{{ conversacion.contact_name }}</p>
                <p class="text-muted small mb-1">{{ conversacion.last_message }}</p>
            </b-col>
            <b-col cols="3" align-self="center" class="d-none d-md-block">
                <p class="text-muted small mb-0">{{ conversacion.last_time }}</p>
            </b-col>                
        </b-row>
    </li>
</template>

<script>
    export default {
        props:{
            conversacion: Object
        },
        data(){
            return {
                 
            };
        },
        mounted() {
         
        }
    }
</script>
