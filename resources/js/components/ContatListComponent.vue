<template>
 
          

        <ul class="list-group"> 
           
            <contact-component v-for="conversation in conversations"
                    :key="conversation.id"
                    :conversacion = "conversation"
                    :selected="selectedConversationId === conversation.id"
                    @click.native="selectConversation(conversation)"
                    >

            </contact-component>
 
        </ul>
  
</template>

<script>
    export default { 
        props: {
            conversations: Array
        },
        data(){
            return { 
               selectedConversationId : null
            };
        },
        mounted() {
           // this.getConversations();
        },
        methods: {
          
            selectConversation(conversation){
                //console.log(conversation);
                this.selectedConversationId =conversation.id;
                this.$emit('conversationSelected',conversation);

               // eventBus.$emit('example',conversation);
            }
        }
    }
</script>
