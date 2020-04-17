<template>
    <div class="composer">
        <!-- calls the send function on keydown  -->
        <textarea v-model="message" @keydown.enter="send" placeholder="Say something..."></textarea>
    </div>
</template>

<script>
    export default {
        data() { // func that returns an object
            return {
                message: ''
            };
        },
        methods: {
            send(e) {
                e.preventDefault(); // prevent the default action of the browser, so we can run our send function instead
                
                if (this.message == '') { // if message is empty array return nothing
                    return;
                }
                this.$emit('send', this.message); // else send the send event
                this.message = ''; // clears out the textarea
            }
        }
    }
</script>

<style lang="scss" scoped>
    .composer textarea {
        width: 96%;
        margin: 10px;
        resize: none;
        border-radius: 3px;
        border: 1px solid lightgray;
        padding: 6px;
    }
</style>