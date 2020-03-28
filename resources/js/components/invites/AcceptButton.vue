<template>
    <div class="col-md-8 mt-4 invite">
        <div class="card card-default">
            <div class="card-header">
                Accept Your Invitation.
            </div>
            <div class="card-body">
                <form action="/accept/send" method="POST" @submit.prevent="acceptInvite()">
                    <div class="form-group">
                        <input type="submit" value="Accept Invitation" class="btn btn-info">
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
                
            }
        },
        mounted() {
            console.log('YOUR COMPONENT IS NOW MOUNTED BROTHER.')
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