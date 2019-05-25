<template>
	<b-container fluid style="height: calc(100vh - 70px);">
	    <b-row no-gutters class="h-100"> 
	        
	        <b-col cols="4"  >    
	            <contact-list-component @conversationSelected="changeActiveConversation($event)">
	            </contact-list-component>
	        </b-col>
	        <b-col cols="8">
	            <active-conversation-component
	            	v-if="selectedConversation" 
	            	:contact-id="selectedConversation.contact_id"
	            	:contact-name="selectedConversation.contact_name">
	            </active-conversation-component>
	            
	        </b-col>
	    </b-row>
	</b-container>
</template>


<script>
    export default {  
        data(){
            return { 
                selectedConversation: null
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
        	changeActiveConversation(conversation){
        		//console.log('nueva conversacion selecionada cues cues',conversation);
        		this.selectedConversation = conversation;
        	}
        }
    }
</script>