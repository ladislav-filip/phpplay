console.log("Script loaded.");
var saml = null;

function loadDoc(endPoint, callback) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       // document.getElementById("demo").innerHTML = this.responseText;
       console.log(this.responseText);
       let data = JSON.parse(this.responseText);
       callback(data);       
      }
      else if (this.readyState == 4 && this.status == 404) {
        alert("Neexistujici stranka")
      }
    };
    xhttp.open("GET", "api.php?api=" + endPoint, true);
    if (saml) {
        xhttp.setRequestHeader("SAML", saml);
    }
    xhttp.send();
  }

document.getElementById("btTest").addEventListener("click", function() {
    loadDoc("data", function(data) {
        alert("Okkkk");
    });
});

document.getElementById("btTestError404").addEventListener("click", function() {
    loadDoc("none", function(data) {
        alert("Okkkk");
    });
});

function loadToken() {
    let js = document.createElement("script");
    js.src = "api.php?api=token";
    document.body.appendChild(js);
    // loadDoc("token", function(data) {
    //     saml = data.SAML;
    //     alert("FileSize = " + data.fileSize + "\r\nString size = " + (saml.length / 1024));
    // });    
}

loadToken();