@extends('inviting.layout')

@section('content')
    <script src="{{ asset('js/extractor.js') }}"></script>

    <section id="top-half">
        <div class="container">
            <div class="content">

                <div class="company-brand">
                <p id="uppercase-brand"></p>
                <script>
                    const companyBrand = extractCompanyName().toUpperCase();
                    document.getElementById("uppercase-brand").innerHTML = companyBrand;
                </script>
                </div>

                {{-- <h4> Shop live with someone in <div id="lowercase-brand"></div> </h4>  --}}
                <h4> Live Chat with a Store Member <div id="lowercase-brand"></div> </h4>
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

                {{ $user = auth()->user() }}
                <invite-form user={{ $user->email }}></invite-form>

            </div>
        </div>
    </section>
    
    <section id="bottom-half">
        <div class="container">
            <div class="content">
                
            </div>
        </div>
    </section>

@endsection