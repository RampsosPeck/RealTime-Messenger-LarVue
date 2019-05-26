<template>
    <b-row  class="h-100">
        <b-col cols="8">
            <b-card 
                footer-bg-variant="info"
                footer-border-variant="dark"
                title="Conversación activa"  
                class="h-100"
              >
                
                <div id="messages-container">
                    <message-conversation-component   
                        v-for="message in messages"
                        :key="message.id"
                        :writtenByMe =  "message.written_by_me">
                        {{ message.content }}
                    </message-conversation-component> 
                </div>

                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessage" autocomplete="off">

                        <b-input-group>
                            <b-form-input class="text-center"
                            type="text"
                            v-model="newMessage"
                            placeholder="Escribe un mensaje...">
                            </b-form-input>
                            <b-input-group-append>
                                <b-button type="submit" variant="primary">Enviar</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>
                </div>
            </b-card>
        </b-col>
        <b-col cols="4">
            <b-img  rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="mb-0"></b-img>
            <p>{{ contactName }}</p>
            <hr>
            <b-form-checkbox> 
                Desactivar Notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<style>
    #messages-container {
        max-height: 400px;
    }
</style>

<script>
    export default { 
        props:{
            contactId: Number,
            contactName: String,
            messages : Array
        },
        data(){
            return { 
                newMessage: '' 
            };
        },
        mounted() {
          
        },
        methods: {            
            postMessage()
            {
                const params = {
                    to_id: this.contactId,
                    content: this.newMessage
                };
                axios.post('/api/messages',params).then((res) => {
                    if(res.data.success){
                        this.newMessage = '';  
                    }
                    
                });
            }
        }

    }
</script>



        //watch:{
        //    contactId(value){
                //console.log(`contactId => ${this.contactId}`);
          //      this.getMessages();
            //}
        //}