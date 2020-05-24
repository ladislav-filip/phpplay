var action = document.getElementById("action").value;
console.log("Script loaded.");
console.log("Action = " + action);
var saml = null;

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

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
}

function loadSaml(samlhash) {
    loadDoc('saml&value=' + samlhash, function(data) {
        console.log(data);
    });
}

let samlhash = getCookie('samlhash');
console.log("Samlhash = " + samlhash);

if (action !== "stop") {

    if (samlhash) {
        loadSaml(samlhash);
    }
    else {
        loadToken();
    }
}