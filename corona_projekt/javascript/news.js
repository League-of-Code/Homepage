var newstickerbox = document.getElementById("marquee");




var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    newstickerbox = this.responseText;

      console.log("Hello world!");

  }
};

xhttp.open("GET", "../php/newsticker.php?q="+"hallo", true);
xhttp.send();
