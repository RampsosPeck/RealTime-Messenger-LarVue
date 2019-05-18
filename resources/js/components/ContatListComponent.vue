<template>
    <div>
            <b-form class="my-3 mx-2">
                <b-form-input class="text-center"
                    type="text" 
                    placeholder="Buscar contacto...">
                        
                </b-form-input>
            </b-form>

        <ul class="list-group"> 
                    
            <contact-component >
            </contact-component>
            
            <li class="list-group-item list-group-item-secondary">
                <b-row class="p-2" align-h="center">
                    <b-col cols="12" md="3" class="text-center">
                        <b-img   rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="m-1"></b-img>
                    </b-col>
                    <b-col cols="6" align-self="center" class="d-none d-md-block">
                        <p class="mb-0">Dr. Rodrigo Mora</p>
                        <p class="text-muted small mb-1">Tú: Ultimo día</p>
                    </b-col>
                    <b-col cols="3" align-self="center" class="d-none d-md-block">
                        <p class="text-muted small mb-0">15: 15 am</p>
                    </b-col>                
                </b-row>
            </li>
            <li class="list-group-item list-group-item-secondary">
                <b-row class="p-2" align-h="center">
                    <b-col cols="12" md="3" class="text-center">
                        <b-img   rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="m-1"></b-img>
                    </b-col>
                    <b-col cols="6" align-self="center" class="d-none d-md-block">
                        <p class="mb-0">Habrahan Mora</p>
                        <p class="text-muted small mb-1">Tú: Ultimo día</p>
                    </b-col>
                    <b-col cols="3" align-self="center" class="d-none d-md-block">
                        <p class="text-muted small mb-0">15: 15 am</p>
                    </b-col>                
                </b-row>
            </li>
            <li class="list-group-item list-group-item-info">
                <b-row class="p-2" align-h="center">
                    <b-col cols="12" md="3" class="text-center">
                        <b-img   rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="m-1"></b-img>
                    </b-col>
                    <b-col cols="6" align-self="center" class="d-none d-md-block">
                        <p class="mb-0">Lic. Sebastian Mendoza</p>
                        <p class="text-muted small mb-1">Tú: Adiós amigo</p>
                    </b-col>
                    <b-col cols="3" align-self="center" class="d-none d-md-block">
                        <p class="text-muted small mb-0">10:10 pm</p>
                    </b-col>                
                </b-row>
            </li>
        </ul>
    </div>  
</template>

<script>
    export default { 
        data(){
            return { 
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
