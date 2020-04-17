<template>
    <div class="feed" ref="feed"> <!-- holds a reference to the feed container -->
        <ul v-if="contact">
            <!-- loops through all messages. Differentiates between the messages sent and received from other contacts -->
            <!-- holds class called sent if message is sent to a contact, holds called receieved if message is received  -->
            <li v-for="message in messages" :class="`message${message.to == contact.id ? ' sent' : ' received'}`" :key="message.id">
                <div class="text">
                    {{ message.text }}  <!-- shows message  -->
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contact: {
                type: Object
            },
            messages: {
                type: Array,
                required: true
            }
        },
        methods: {
            scrollToBottom() { // scroll to bottom when there's a new message.
                setTimeout(() => { // sets a small timeout to make sure DOM is already update; to prevent updating issues with scrolling
                    // subtracts the scroll height from the client height to get to the bottom
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            }
        },
        watch: { // Listens to changes on the follow 2 objects  
            contact(contact) { // processes scrollToBottom() when user clicks a contact
                this.scrollToBottom();
            },
            messages(messages) { // scrolls to bottom onces a user updates a their message feed (when user sends a new message)
                this.scrollToBottom();
            }
        }
    }
</script>

<style lang="scss" scoped>
    .feed {
        background: #f0f0f0;
        height: 100%;
        max-height: 470px;
        overflow: scroll;
        ul {
            list-style-type: none;
            padding: 5px;
            li {
                &.message {
                    margin: 10px 0;
                    width: 100%;
                    .text {
                        max-width: 200px;
                        border-radius: 5px;
                        padding: 12px;
                        display: inline-block;
                    }
                    &.received {
                        text-align: left;
                        .text {
                            background-color: rgb(248, 61, 117);
                            background-image: linear-gradient(to right, rgb(255, 86, 136) , rgb(255, 121, 87));
                            color: #fff;
                        }
                    }
                    &.sent {
                        text-align: right;
                        .text {
                            background: #b2b2b2;
                            color: #000;
                        }
                    }
                }
            }
        }
    }
</style>