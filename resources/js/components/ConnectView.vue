<template>
    <div id="app" class="container">
        <div class="content">
            <div class="company-brand">
                <p id="uppercase-brand"> {{ storeId() }} </p>
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

    import Lottie from './../../node_modules/lottie-web/build/player/lottie';

    export default {
        // data() {
        //     return {
        //         myJson: json
        //     }
        // },
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
                var getUrl = decodeURIComponent(customerURL);
                getUrl = getUrl.replace(/=/g, '": "');
                getUrl = getUrl.replace(/&/g, '", "');
                getUrl = '{"'+getUrl+'"}';
                var obj = JSON.parse(getUrl);
                return obj.origin;
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