<template>
    <div id="app" class="container">
        <div class="content">
            <div class="company-brand">
                <p id="uppercase-brand"> STORE ID: {{ storeId() }} </p>
            </div>
            <!-- <h4> Live Chat with Store Member <div id="lowercase-brand"> {{ companyName() }} </div> </h4> 
            <p><img id="image" v-bind:src="productImage"></p> 
            <p id="title"> {{ productTitle() }} </p>
            <p id="price"> {{ productPrice() }} </p> -->
            <div>
                <button type="submit" name="startbutton" v-on:onclick="getStarted" class="btn btn-primary"> Get Started </button>
            </div>
        </div>
    </div>
</template>

<script>

    // import Lottie from './../../node_modules/lottie-web/build/player/lottie';

    export default {
        data() {
            return {
                // info: null
                info: {
                    origin: null
                }
            }
        },
        methods: {
            // url_info: function () {
            //     var customerURL =  window.location.search.slice(1);  
            //     getUrl = decodeURIComponent(customerURL);
            //     getUrl = getUrl.replace(/=/g, '": "');
            //     getUrl = getUrl.replace(/&/g, '", "');
            //     getUrl = '{"'+getUrl+'"}';
            //     var obj = JSON.parse(getUrl);
            //     return obj;
            // },
            storeId: function () {
                var customerURL =  window.location.search.slice(1);
                console.log('SLICED VALUE: ', customerURL);  
                var getUrl = decodeURIComponent(customerURL);
                console.log('DECODED URL: ', getUrl);
                getUrl = getUrl.replace(/=/g, '": "');
                console.log('REPLACED VALUE: ', getUrl);
                getUrl = getUrl.replace(/&/g, '", "');
                console.log('THE OTHER REPLACED VALUE: ', getUrl);
                getUrl = '{"'+getUrl+'"}';
                console.log("CUSTOM FORMAT IS : ", getUrl);
                // console.log("THE FINAL VALUE : ", json(getUrl));
                // var obj = JSON.parse(getUrl); JSON.parse(JSON.stringify(data.Nodes)); 
                // this.jsonVal = JSON.parse(getUrl);
                this.info = getUrl;
                this.axios.post("https://connect.brisebox.com/info/", this.info)
                .then((result) => {
                    console.warn(result);
                })
                // var obj = json(getUrl);
                // this.info = getUrl;
                // var obj2 = JSON.parse(this.info);
                // console.log(" FINAL JSON FORMAT: ", obj2);
                // console.log("THE FINAL VALUE: ", obj2.orgin);
                // return obj2.orgin;
            },
            // companyName: function () {
            //     return url_info().incName.toUpperCase();
            // },
            // productImage: function () {
            //     return url_info().prodImage;
            // },
            // productTitle: function () {
            //     return url_info().prodTitle;
            // },
            // productPrice: function () {
            //     return url_info().prodPrice;
            // },
            getStarted: function () {
                var invitation = "https://connect.brisebox.com/invite"; 
                var url_details = window.location.search;
                var invitation_url = invitation + url_details;
                window.location.href = invitation_url;
                return window.location.href;
            }
        }
    }
</script>

<style scoped>

</style>