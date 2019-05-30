<template>
	<b-container fluid style="height: calc(100vh - 56px);">
	    <b-row no-gutters class="h-100"> 
	        
	        <b-col cols="4"  >    
                <b-form class="my-3 mx-2">
                    <b-form-input class="text-center"
                        type="text" 
                        v-model="querySearch"
                        placeholder="Buscar contacto...">
                            
                    </b-form-input>
                </b-form>
	            <contact-list-component @conversationSelected="changeActiveConversation($event)" :conversations="conversationsFiltered">
	            </contact-list-component>
	        </b-col>
	        <b-col cols="8">
	            <active-conversation-component
	            	v-if="selectedConversation" 
	            	:contact-id="selectedConversation.contact_id"
                    :contact-name="selectedConversation.contact_name"
                    :contact-image="selectedConversation.contact_image"
	            	:my-image="myImageUrl" 
	            	@messageCreated="addMessage($event)">
	            </active-conversation-component>
	            
	        </b-col>
	    </b-row>
	</b-container>
</template>


<script>
    export default {  
    	props:{
    		user: Object
    	},
        data(){
            return { 
                selectedConversation: null,            
                conversations: [],
                querySearch: ''
            };
        },
        mounted() {       
            this.getConversations();     

            Echo.private(`users.${this.user.id}`)
		    .listen('MessageSent', (data) => {		    	
		    	console.log(message);
		    	const message = data.message;
           		message.written_By_Me = false;
		    	this.addMessage(message);
		    });

		    Echo.join('messenger')
		    .here((users) => {
		        //console.log('online', users);
		        users.forEach(user => this.changesStatus(user, true));
		    })
		    .joining(
		    	user => this.changesStatus(user, true)
		    )
		    .leaving(
		    	user => this.changesStatus(user, false)
 
		    );
        },
        methods: {
        	changeActiveConversation(conversation){ 
        		this.selectedConversation = conversation;
        		this.getMessages();
        	},
        	getMessages(){
                axios.get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`)
                .then((response) => {
                    //console.log(res.data);
                    //this.$store.state.messages = response.data;
                    this.$store.commit('newMessagesList',response.data);
                });
            },
            addMessage(message){
            	const conversation = this.conversations.find((conversation) =>{
            		return conversation.contact_id == message.from_id ||
            		conversation.contact_id == message.to_id;
            	});

            	const author = this.user.id=== message.from_id ? 'Tú' : conversation.contact_name;
            	conversation.last_message = `${author}: ${message.content}`;
            	conversation.last_time = message.created_at;

            	if(this.selectedConversation.contact_id==message.from_id
            		|| this.selectedConversation.contact_id==message.to_id){
		    	
                    //this.$store.state.messages.push(message);
		        	this.$store.commit('addMessage',message);
		        }
            },
            getConversations(){
                axios.get('/api/conversations').then((res) =>{
                    //console.log(res.data);
                    this.conversations = res.data;
                });
            },
            changesStatus(user, status){
            	const index = this.conversations.findIndex((conversation) => {
		    		return conversation.contact_id == user.id;
		    	});
		    	if(index >= 0)
		        	this.$set(this.conversations[index], 'online', status);
            }
        },
        computed:{
            myImageUrl(){
                return `/img/${this.user.image}`;
            },
            conversationsFiltered(){
                return this.conversations.filter((conversations) => 
                    conversations.contact_name
                    .toLowerCase()
                    .includes(this.querySearch.toLowerCase()));
            }
        }
    }
</script>