<template>
    <div class="conversation">
        <!-- show contact's name if we have contacts -->
        <h1>{{ contact ? contact.name : 'Refresh page once friend joins. Or select a contact on the right.' }}</h1>
        <MessagesFeed :contact="contact" :messages="messages"/>
        <!-- event for when user clicks enter and sends a message  -->
        <MessageComposer @send="sendMessage"/>
    </div>
</template>

<script>
    import MessagesFeed from './MessagesFeed';
    import MessageComposer from './MessageComposer';

    export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },
        methods: {
            sendMessage(text) {
                if (!this.contact) { // do nothin if no contact
                    return;
                }
                axios.post('/conversation/send', { // else post the request to the backend using axios
                    // save the message
                    contact_id: this.contact.id, // data we need is a contact
                    text: text // also need the text
                }).then((response) => { // fire new event once we get a response back (returned in send func in the ContactsController)
                    this.$emit('new', response.data); // send out an event called new to send out the data.
                })
            }
        },
        components: {MessagesFeed, MessageComposer}
    }
</script>

<style lang="scss" scoped>
    .conversation {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        h1 {
            font-size: 20px;
            padding: 10px;
            margin: 0;
            border-bottom: 1px dashed lightgray;
            color: rgb(127, 221, 72); 
        }
    }
</style>