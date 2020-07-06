<template>
    <div class="content">
        <div class="company-brand">
            <p id="uppercase-brand"> {{ storeId() }} 5 </p>
        </div>
        <h4> Live Chat with Store Member <div id="lowercase-brand"> {{ companyName() }} </div> </h4> 
        <p><img id="image" v-bind:src="productImage"></p> 
        <p id="title"> {{ productTitle() }} </p>
        <p id="price"> {{ productPrice() }} </p>
        <div>
            <button type="submit" name="startbutton" v-on:onclick="getStarted" class="btn btn-primary"> Get Started </button>
        </div>
    </div>
</template>

<script>
    new Vue ({
        el: '#vue-app',
        data: { 
            // default / base values
            store: "hi"
        },
    // export default {
    //     props: {

    //     },
    //     data() {
    //         // default / base values
    //         return {
    //             store: 23
    //         };
    //     },
        methods: {
            url_info: function () {
                var customerURL =  window.location.search.slice(1);  
                getUrl = decodeURIComponent(customerURL);
                getUrl = getUrl.replace(/=/g, '": "');
                getUrl = getUrl.replace(/&/g, '", "');
                getUrl = '{"'+getUrl+'"}';
                var obj = JSON.parse(getUrl);
                return obj;
            },
            storeId: function () {
                return url_info().origin;
            },
            companyName: function () {
                return url_info().incName.toUpperCase();
            },
            productImage: function () {
                return url_info().prodImage;
            },
            productTitle: function () {
                return url_info().prodTitle;
            },
            productPrice: function () {
                return url_info().prodPrice;
            },
            getStarted: function () {
                var invitation = "https://connect.brisebox.com/invite"; 
                var url_details = window.location.search;
                var invitation_url = invitation + url_details;
                window.location.href = invitation_url;
                return window.location.href;
            }
        }
    });
</script>