<template>
    <div>
            <b-form class="my-3 mx-2">
                <b-form-input class="text-center"
                    type="text" 
                    placeholder="Buscar contacto...">
                        
                </b-form-input>
            </b-form>

        <ul class="list-group"> 
           
            <contact-component v-for="conversation in conversations"
                    :key="conversation.id"
                    :conversacion = "conversation"
                    @click.native="selectConversation(conversation)"
                    >

            </contact-component>
 
        </ul>
    </div>  
</template>

<script>
    export default { 
        props: {
            conversations: Array
        },
        data(){
            return { 
               
            };
        },
        mounted() {
           // this.getConversations();
        },
        methods: {
          
            selectConversation(conversation){
                //console.log(conversation);
                this.$emit('conversationSelected',conversation);
            }
        }
    }
</script>
