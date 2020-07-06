@extends('layouts.app')

@section('content')

    {{-- <script src="{{ asset('js/begin.js') }}"></script>
    <script src="{{ asset('js/extractor.js') }}"></script> --}}
    

    <div id="app" class="container">
        <connect-view></connect-view>
    </div>


    {{-- <div class="container">
      <div class="content">

        <div class="company-brand">
          <p id="uppercase-brand"></p>
          <script>
            const companyBrand = extractCompanyName().toUpperCase();
            document.getElementById("uppercase-brand").innerHTML = companyBrand;
          </script>
        </div>

        <h4> Live Chat with Store Member <div id="lowercase-brand"></div> </h4> 
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

        <div style="width:45%;height:50%">
          <button type="submit" name="startbutton" onclick="getFriendsURL()" class="btn btn-primary"> Get Started </button>
        </div>

      </div>
    </div> --}}

@endsection
