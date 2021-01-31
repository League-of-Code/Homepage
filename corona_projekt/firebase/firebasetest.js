

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyBPfa2kfTNBsTLQM66e_Zq7goujyZJLs6Y",
    authDomain: "coronavisual-fe087.firebaseapp.com",
    projectId: "coronavisual-fe087",
    storageBucket: "coronavisual-fe087.appspot.com",
    messagingSenderId: "686560350516",
    appId: "1:686560350516:web:1eb92bd473adf677109561",
    measurementId: "G-6GWS50GTKZ"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

  var firestore = firebase.firestore();

  var output = firestore.collection("storage").get().then((querySnapshot) => {
    querySnapshot.forEach((doc) => {
      console.log('${doc.id} => ${doc.data()}');
      console.log(doc.data());
        console.log(doc.id);
    });
  });

  const subbutton = document.querySelector("#button1");

  subbutton.addEventListener("click", function(){
    console.log("hallo"+ output );
  })
