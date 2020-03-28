@extends('layouts.app')

@section('content')

    <script src="{{ asset('js/extractor.js') }}"></script>

    <div class="container">
        <div class="content">

            <div class="company-brand">
                <p id="uppercase-brand"></p>
                <script>
                const companyBrand = extractCompanyName().toUpperCase();
                document.getElementById("uppercase-brand").innerHTML = companyBrand;
                </script>
            </div>
            
            <h4> Shop live with someone in <div id="lowercase-brand"></div> </h4> 
            <script>
                const companyname = extractCompanyName().toLowerCase();
                document.getElementById("lowercase-brand").innerHTML = companyname;
            </script>
    
            <br>
            <p><img id="image" src="" class="feature-img" alt="" style="width:50%;"></p> 
            <script>extractProductImageURL();</script>
    
            <p id="title"></p>
            <script>extractProductTitle();</script>
    
            <p id="price"></p>
            <script>extractProductPrice();</script>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">Live Dicussions: </div>
            
                            <div class="card-body" id="app">
                                <chat-app :user="{{ auth()->user() }}"></chat-app>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection