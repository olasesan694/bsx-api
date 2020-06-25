  function companyUrlInfo () { // Returns the querystring part of a URL
    var customerURL =  window.location.search.slice(1);  
    return decodeURIComponent(customerURL);
  }

  function extractCompanyURL () { 
    getUrl = companyUrlInfo();
    getUrl = getUrl.replace(/=/g, '": "');
    getUrl = getUrl.replace(/&/g, '", "');
    getUrl = '{"'+getUrl+'"}';
    var obj = JSON.parse(getUrl);
    return obj.incUrl;
  }

  function extractCompanyName () {
    getUrl = companyUrlInfo();
    getUrl = getUrl.replace(/=/g, '": "');
    getUrl = getUrl.replace(/&/g, '", "');
    getUrl = '{"'+getUrl+'"}';
    var obj = JSON.parse(getUrl);
    return obj.incName;
  }
  
  function extractProductImageURL () {
    getUrl = companyUrlInfo();
    getUrl = getUrl.replace(/=/g, '": "');
    getUrl = getUrl.replace(/&/g, '", "');
    getUrl = '{"'+getUrl+'"}';
    var obj = JSON.parse(getUrl);
    return document.getElementById("image").src = obj.prodImage;
  }

  function extractProductTitle () {
    getUrl = companyUrlInfo();
    getUrl = getUrl.replace(/=/g, '": "');
    getUrl = getUrl.replace(/&/g, '", "');
    getUrl = '{"'+getUrl+'"}';
    var obj = JSON.parse(getUrl);
    return document.getElementById("title").innerHTML = obj.prodTitle;
  }

  function extractProductPrice () {
    getUrl = companyUrlInfo();
    getUrl = getUrl.replace(/=/g, '": "');
    getUrl = getUrl.replace(/&/g, '", "');
    getUrl = '{"'+getUrl+'"}';
    var obj = JSON.parse(getUrl);
    return document.getElementById("price").innerHTML = obj.prodPrice;
  }