<template>
    <div class="contacts-list">
        <ul>
            <!-- selects contacts and process selected  -->
            <li v-for="(contact, index) in contacts" :key="contact.id" @click="selectContact(index, contact)" :class="{ 'selected': index == selected }">
                <div class="contact">
                    <p class="name">{{ contact.name }}</p>
                    <p class="email">{{ contact.email }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contacts: {
                type: Array,
                default: []
            }
        },
        data() {
            return {
                // selected: this.contacts.length ? this.contacts[0] : null
                selected: 0
            };
        },
        methods: {
            selectContact(index, contact) {
                this.selected = index;
                this.$emit('selected', contact); // emit an event called selected with value contact
            }
        }
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