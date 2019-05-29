<template> 
    <b-media :right-align="writtenByMe" vertical-align="center">
        <b-img slot="aside"  :src="image" width="40" height="40"  rounded="circle" alt="img"></b-img>

        <b-card   class="mb-1 bg-info">
          <slot></slot>
         
        </b-card>
    </b-media>
</template>

<script>
    export default { 
        props: {
            image: String,
            writtenByMe : Boolean
        },
        data(){
            return { 
             
            };
        },
        mounted() {
           
        }
    }
</script>
