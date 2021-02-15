var newstickerbox = document.getElementByClassName("marquee");




var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    newstickerbox = this.responseText;
    if(visualize){
      console.log("Hello world!");
    }
  }
};

xhttp.open("GET", "../php/ordered_output.php?q="+"hallo", true);
xhttp.send();
