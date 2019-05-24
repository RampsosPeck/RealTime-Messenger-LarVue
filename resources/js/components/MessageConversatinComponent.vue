<template> 
    <b-media :right-align="writtenByMe" vertical-align="center">
        <b-img slot="aside" blank blank-color="#ccc" width="48" rounded="circle" alt="placeholder"></b-img>

        <b-card   class="mb-1">
          <slot></slot>
         
        </b-card>
    </b-media>
</template>

<script>
    export default { 
        props: {
            writtenByMe : Boolean
        },
        data(){
            return { 
                content : 'abc'
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
