<template>
    <div class="chat-app">
        <!-- save new message when we get one  -->
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
        <!-- holds the startConversationWith function declared at the bottom -->
        <ContactsList :contacts="contacts" @selected="startConversationWith"/> <!-- listens to the 'selected' emit event created in contactlist.vue -->
    </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';
    
    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                selectedContact: null,
                messages: [],
                contacts: []
            };
        },
        mounted() {
            Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e) => { // listens on event called NewMessage
                    this.hanleIncoming(e.message);
                }); // listens to event; the private channel

            axios.get('/contacts')
                .then((response) => {
                    this.contacts = response.data;
                });

        },
        methods: {
            startConversationWith(contact) { // perform a request to the api to get all the messages with this contact
                axios.get(`/conversation/${contact.id}`)
                    .then((response) => {
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })
            },
            saveNewMessage(message) { // takes in message not text and saves the message
                this.messages.push(message);
            },
            hanleIncoming(message) { // will get the message itself
                if (this.selectedContact && message.from == this.selectedContact.id) { // who is the contact is currently in a conversation with.
                    this.saveNewMessage(message);
                    return;
                }
                alert(message.text);
            },
        },
        components: {Conversation, ContactsList}
    }
</script>

<style lang="scss" scoped>
    .chat-app {
        display: flex;
    }
</style>