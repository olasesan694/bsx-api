<template>
    <div class="col-md-8 mt-4 invite">
        <div class="card card-default">
            <div class="card-header">
                <!-- Accept Your Invitation. -->
                Accept your Live Chat Invitation from a Customer.
            </div>
            <div class="card-body">
                <form action="/accept/send" method="POST" @submit.prevent="acceptInvite()">
                    <div class="form-group">
                        <input type="submit" value="Accept Invitation" class="btn-accept">
                    </div>
                </form>
            </div>
            <!-- <ul>
                <h4>Updated List of Pending Chats with Customers:</h4>
                <li v-for="brisebox in inviter_ids" :key="brisebox.id" @click="selectBrisebox(brisebox)">
                    <div class="form-group">
                        (New) Join in with Customer {{ brisebox.id}}
                    </div>
                </li>
            </ul> -->
        </div>
    </div>
</template>

<script>
    export default {
        data() { // fnc returns an object named friendEmail
            return { 
                
            }
        },
        mounted() {
            console.log('YOUR COMPONENT IS NOW MOUNTED.')
        },
        methods: {
            acceptInvite() { // post a request to the url we want
                axios.post('/accept/send', {
                })
                .then(response => {
                    window.location.href = '/discuss' + window.location.search
                })
                .catch(function (error) {
                    console.log(error); 
                });
            },

            // added s.o. - user and inc live chat
            selectBrisebox () { // post a request to the url we want
                axios('/discuss')
                .then(response => {
                    console.log(response)
                    'redirecting now....'
                    window.location.href = '/discuss' + window.location.search
                })
                .catch(function (error) {
                    console.log(error); 
                });
            }
        }
    }
</script>

<style lang="scss" scoped>
    .invite {
        margin: 0;
        padding: 0;
    }
    .card-header {
        padding: 7%;
    }
    .card-body form {
        padding: 7%;
    }
    .btn-accept {
        background: #000000;
        color: white;
        border: 1px solid #000000;
        padding: 7px;
        border-radius: 3px;
    }
</style>