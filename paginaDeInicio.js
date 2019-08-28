//carousel
$(document).ready(function(){
  $('.slider').slider();
});

//navbar sandwitch
$(document).ready(function(){
  $('.sidenav').sidenav();
});

// Chat modal
$(document).ready(function(){
  $('.modal').modal();
});


// NAVBAR 
var noticias = $('#noticias').offset().top,
acercaDe = $('#acercaDe').offset().top,
donaciones = $('#donaciones').offset().top;

$('#btn-noticias').on('click', function(e){
  e.preventDefault();
  $('html, body').animate({
    scrollTop: noticias
  },500);
});

$('#btn-acerca-de').on('click', function(e){
  e.preventDefault();
  $('html, body').animate({
    scrollTop: acercaDe + 200
  },500);
});

$('#btn-donaciones').on('click', function(e){
  e.preventDefault();
  $('html, body').animate({
    scrollTop: donaciones + 50
  },500);
});

function bajar() {
  document.getElementById('modal1').scrollTop = 250000;
  document.getElementById('chatLog').scrollTop = 25000;

}
//Para el chat con firebase

var firebaseConfig = {
  apiKey: "AIzaSyA-VyZObjggkH6MhYh2VZPdaHR8jPu-eL0",
  authDomain: "comedorchat.firebaseapp.com",
  databaseURL: "https://comedorchat.firebaseio.com",
  projectId: "comedorchat",
  storageBucket: "",
  messagingSenderId: "96379132849",
  appId: "1:96379132849:web:41fe482d9e875e38"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);


var db = firebase.firestore();

var ayudar = db.collection("botchat").doc("ayudar"),
direccion =  db.collection("botchat").doc("direccion"),
donar =  db.collection("botchat").doc("donar"),
voluntario =  db.collection("botchat").doc("voluntario"),
error =  db.collection("botchat").doc("error");




function talk() {
    var user = document.getElementById("userBox").value;
    document.getElementById("userBox").value = "";
    document.getElementById("chatLog").innerHTML += "<div class='row right'><div class='col m8 usuario'>"+user+"</div><div class='col m2'><img src='img/persona.png' style='width: 25px; height: 25px;'></div></div>";
document.getElementById("escribiendo").style.visibility = "visible";
bajar();

    var delayInMilliseconds = 1000; //1 second

setTimeout(function() {
document.getElementById("escribiendo").style.visibility = "hidden";


switch(user){
 case "donar":
    donar.get().then(function(doc) {
      //console.log(doc.data().mensaje);
      document.getElementById("chatLog").innerHTML += "<div class='row left'> <div class='col m2'><img style='width: 30px; height: 30px;' class='robot' src='img/robot.png'></div><div class='col m8 chat'>"+doc.data().mensaje+"<br></div>";
      bajar();
    }).catch(function(error) {
      console.log("Error getting document:", error);
    });
    break;
    case "ayudar":
    ayudar.get().then(function(doc) {
      //console.log(doc.data().mensaje);
      document.getElementById("chatLog").innerHTML += "<div class='row left'> <div class='col m2'><img style='width: 30px; height: 30px;' class='robot' src='img/robot.png'></div><div class='col m8 chat'>"+doc.data().mensaje+"<br></div>";
      bajar();
    }).catch(function(error) {
      console.log("Error getting document:", error);
    });
    break;
    case "voluntario":
    voluntario.get().then(function(doc) {
      //console.log(doc.data().mensaje);
      document.getElementById("chatLog").innerHTML += "<div class='row left'> <div class='col m2'><img style='width: 30px; height: 30px;' class='robot' src='img/robot.png'></div><div class='col m8 chat'>"+doc.data().mensaje+"<br></div>";
      bajar();
    }).catch(function(error) {
      console.log("Error getting document:", error);
    });
    break;
    case "direccion":
    direccion.get().then(function(doc) {
      //console.log(doc.data().mensaje);
      document.getElementById("chatLog").innerHTML += "<div class='row left'> <div class='col m2'><img style='width: 30px; height: 30px;' class='robot' src='img/robot.png'></div><div class='col m8 chat'>"+doc.data().mensaje+"<br></div>";
      bajar();
    }).catch(function(error) {
      console.log("Error getting document:", error);
    });
    break;
    default :
    error.get().then(function(doc) {
      //console.log(doc.data().mensaje);
      document.getElementById("chatLog").innerHTML += "<div class='row left'> <div class='col m2'><img style='width: 30px; height: 30px;' class='robot' src='img/robot.png'></div><div class='col m8 chat'>"+doc.data().mensaje+"<br></div>";
      bajar();
    }).catch(function(error) {
      console.log("Error getting document:", error);
    });
}
}, delayInMilliseconds);  
} 
