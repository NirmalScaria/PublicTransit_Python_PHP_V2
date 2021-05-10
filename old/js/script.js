var suggestions = ["kattappana","thovala"];
var currentFocus = 0;
var sugd={
      }


function sendajax(reqtype, origin, dest) {
  //This requires python server, here, flask in the backround on 127.0.0.1 on port 5000
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {

    ajaxres = (xmlhttp.responseText);
    //WRITE HERE WHATEVER TO BE EXCECUTED ON RECEIVING AJAX RESPONSE
    //xmlhttp.responseText carries the response of ajax
    return ajaxres;
  }
  xmlhttp.open("POST", "ajax.php?p1=" + reqtype + "&p2=" + origin + "&p3=" + dest, true);
  //Modifiy the above line with whatever parameters need to be sent.
  xmlhttp.send();
  return ajaxres;
}
function autofill(source) {
  var sug = ""
  var suga = ""

  var starting = document.getElementById(source).value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && this.status == 200) {
      suggestions = [];
      ajaxres = (xmlhttp.responseText);
      var counttt = 0;
      closeAllLists();
      availableTags = JSON.parse(ajaxres);
      a = document.createElement("DIV");
      a.setAttribute("id", source + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      document.getElementById(source).parentNode.appendChild(a);
      for (var i = 0; i < Object.keys(availableTags).length; i++) {
        suggestions = suggestions.concat([availableTags[i]['stopname']]);
        sugd[availableTags[i]['stopname']]=null;
        
        counttt++;
      }
      console.log(counttt)
      if (counttt < 1) {
        suggestions = ["START TYPING"];
      }

      //WRITE HERE WHATEVER TO BE EXCECUTED ON RECEIVING AJAX RESPONSE
    }
    
  }
  xmlhttp.open("POST", "ajax.php?p1=typing&p2=" + starting + "&p3=0&p4=0&p5=0&p6=0&p7=0&p8=0&p9=0", true);
  //Modifiy the above line with whatever parameters need to be sent.

  xmlhttp.send();
  $('input.autocomplete').autocomplete({
      data:sugd ,
    });
}
function closeAllLists(elmnt) {
  /*close all autocomplete lists in the document,
  except the one passed as an argument:*/
  var x = document.getElementsByClassName("autocomplete-items");
  for (var i = 0; i < x.length; i++) {

    x[i].parentNode.removeChild(x[i]);
  }
}
function addActive(x) {
  /*a function to classify an item as "active":*/
  if (!x) return false;
  /*start by removing the "active" class on all items:*/
  removeActive(x);
  if (currentFocus >= x.length) currentFocus = 0;
  if (currentFocus < 0) currentFocus = (x.length - 1);
  /*add class "autocomplete-active":*/
  x[currentFocus].classList.add("autocomplete-active");
}
function removeActive(x) {
  /*a function to remove the "active" class from all autocomplete items:*/
  for (var i = 0; i < x.length; i++) {
    x[i].classList.remove("autocomplete-active");
  }
}
document.addEventListener("click", function (e) {
  closeAllLists(e.target);
});

function mainsearch(){
    if(document.getElementById('timel').value==""){
         document.getElementById('timeselected').value=(document.getElementById("times").value.replace(":",""))+"00"
     }
     else{
         document.getElementById('timeselected').value=(document.getElementById("timel").value.replace(":",""))+"00"
     }
  if(document.getElementById('originselected').value==0){
    document.getElementById('errorbox').innerHTML="Please select an origin from the dropdown.";
    document.getElementById('errorbox').style.display="block";
  }
  else if(document.getElementById('destselected').value==0){
    document.getElementById('errorbox').innerHTML="Please select a destination from the dropdown.";
    document.getElementById('errorbox').style.display="block";
    
  }
  
  else if(document.getElementById('timeselected').value.length!=6){
    document.getElementById('errorbox').innerHTML="Please select a valid time.";
    document.getElementById('errorbox').style.display="block";
    
  }
  else  {
     
  document.getElementById('realform').submit();
  }
}



    

//material



// Or with jQuery

