<template>
    <div class="col-md-8 mt-4 invite">
        <div class="card card-default">
            <div class="card-header">
                Invite someone to shop with you
            </div>
            <div class="card-body">
                <form action="/invite/send" method="POST" @submit.prevent="addFriend()">
                    <div class="form-group">
                        <input type="text" name="friendEmail" v-model="friendEmail" placeholder="Friend Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Invite" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() { // fnc returns an object named friendEmail
            return { 
                friendEmail: '',
            }
        },
        mounted() {
            console.log('YOUR COMPONENT IS NOW MOUNTED SISTER.')
        },
        methods: {
            addFriend() { // post a request to the url we want
                axios.post('/invite/send', {
                    friendEmail: this.friendEmail,
                    friend_id: 0,
                    url: "http://localhost:8000/accept" + window.location.search
                })
                .then(response => {
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
</style>