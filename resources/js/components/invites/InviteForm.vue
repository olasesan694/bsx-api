<template>
    <div class="col-md-8 mt-4 invite">
        <div class="card card-default">
            <div class="card-header">
                Invite Store Member to Live Chat.
            </div>
            <div class="card-body">
                <form class="form-inline" action="/invite/send" method="POST" @submit.prevent="addFriend()">
                    <div class="form-group">
                        <!-- <label for="friendPhone" class="friendPhone">Invite Store Employee: &nbsp;&nbsp;&nbsp;&nbsp; +1</label> -->
                        <label for="friendPhone" class="friendPhone">Store: &nbsp;&nbsp;&nbsp;&nbsp; </label> 
                        <!-- <input type="text" name="friendPhone" v-model="friendPhone" placeholder="3335557777" class="form-control"> -->
                        <input type="text" name="friendPhone" v-model="friendPhone" @value="extractDomain()" @placeholder="extractDomain()" class="form-control" disabled> 
                    </div>
                    
                    <div class="form-group">
                        &nbsp;&nbsp; <input type="submit" value="Invite" class="btn-invite">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        data() { 

            return { 
                friendPhone: '',
                // placeholderValue: extractDomain(),
                // placeholderValue: window.location.origin
            }
        },
        mounted() {
            // console.log('YOUR COMPONENT IS NOW MOUNTED.')
        },
        methods: {
            addFriend() { // post a request to the url we want
                axios.post('/invite/send', {
                    friendPhone: this.friendPhone,
                    // friendPhone: window.location.origin,
                    // friendPhone: extractDomain(),
                    friend_id: 0,
                    url: "https://connect.brisebox.com/accept" + window.location.search
                })
                .then(response => {
                    window.location.href = '/discuss' + window.location.search
                })
                .catch(function (error) {
                    console.log(error); 
                });
            },
            extractDomain () {
                getUrl = window.location.search.slice(1); 
                getUrl = getUrl.replace(/=/g, '": "');
                getUrl = getUrl.replace(/&/g, '", "');
                getUrl = '{"'+getUrl+'"}';
                var obj = JSON.parse(getUrl);
                console.log('ISSA DOMAIN WITH VALUE:', obj.origin);
                return obj.origin;
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
    .btn-invite {
        background-color: #000000;
        color: #fff;
        border: 1px solid #000000;
        border-radius: 3px;
        padding: 5px;
        padding-left: 40px;
        padding-right: 40px;
    }
</style>