<template>
    <b-row  class="h-100">
        <b-col cols="8">
            <b-card no-body
                footer-bg-variant="info"
                footer-border-variant="dark"
                title="Conversación activa"  
                class="h-100"
              >
                <b-card-body class="card-body-scroll">

                    <message-conversation-component   
                        v-for="message in messages"
                        :key="message.id"
                        :writtenByMe =  "message.written_by_me"
                        :image="message.written_by_me ? myImage : contactImage">
                        {{ message.content }}
                    </message-conversation-component> 

                </b-card-body> 

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
            <b-img :src="contactImage" rounded="circle"   width="60" height="60"   alt="img" class="mb-0"></b-img>
            <p>{{ contactName }}</p>
            <hr>
            <b-form-checkbox> 
                Desactivar Notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<style>
    .card-body-scroll{
        max-height: calc(100vh - 63px);
        overflow-y: scroll;
    } 
</style>

<script>
    export default { 
        props:{
            contactId: Number,
            contactName: String, 
            contactImage: String,
            myImage: String
        },
        data(){
            return { 
                newMessage: '' 
            };
        },
        mounted() {
          //eventBus.$on('example',function(data){
          //      console.log('Ocurrió el evento example',data);
          //});
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
                        const message = res.data.message;
                        message.written_by_me = true;
                        this.$emit('messageCreated', res.data.message);
                    }
                    
                });
            },
            scrollToBottom(){
                const el = document.querySelector('.card-body-scroll');
                el.scrollTop = el.scrollHeight;
            }
        },
        computed:{
            messages() {
                return this.$store.state.messages;
            }
        },
        updated(){
            this.scrollToBottom();  
        }

    }
</script>



        //watch:{
        //    contactId(value){
                //console.log(`contactId => ${this.contactId}`);
          //      this.getMessages();
            //}
        //}