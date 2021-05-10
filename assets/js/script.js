var suggestions = [];
var currentFocus = 0;
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
  var xmlhttp = new XMLHttpRequest();
function autofill(source) {
  var sug = ""
  var suga = ""
  var starting = document.getElementById(source).value;

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
        b = document.createElement("DIV");
        b.innerHTML = "<strong>" + availableTags[i]['stopname'] + "</strong>";
        b.innerHTML += "<input type='hidden' value='" + availableTags[i]['stopname'] + "'>";
        b.innerHTML += "<input type='hidden' value='" + availableTags[i]['id'] + "'>";
        b.addEventListener("click", function (e) {
          /*insert the value for the autocomplete text field:*/
          document.getElementById(source).value = this.getElementsByTagName("input")[0].value;
          if (source == "originl" || source == "origins") {
            document.getElementById('originselected').value = this.getElementsByTagName("input")[1].value;
          }
          if (source == "destl" || source == "dests") {
            document.getElementById('destselected').value = this.getElementsByTagName("input")[1].value;
          }
          /*close the list of autocompleted values,
          (or any other open lists of autocompleted values:*/
          closeAllLists();
        });
        a.appendChild(b);
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
  var timegot=(document.getElementById("times").value);
  var lasttwo=timegot.slice(timegot.length-2,timegot.length);
  var timevalues=timegot.slice(0,5);
  var timeformatted=0;
  if(lasttwo=="AM"){
    timeformatted=timevalues.replace(":","")+"00";
    if(timeformatted>120000){
        timeformatted-=120000;
        timeformatted="00"+(timeformatted);
    }
  }
  else if(lasttwo=="PM"){
    timeformatted=timevalues.replace(":","")+"00";
    if(timeformatted<120000)
    timeformatted=String(120000+Number(timeformatted));
  }
  console.log(timevalues);
  document.getElementById('timeselected').value=timeformatted;

  if(document.getElementById('originselected').value==0){
    M.toast({html: "Please select an origin from the dropdown."});
  }
  else if(document.getElementById('destselected').value==0){
    M.toast({html: "Please select a destination from the dropdown."});
    
  }
  
  else if(document.getElementById('timeselected').value.length!=6){
    M.toast({html: "Please select a valid time."});
    
  }
  else  {
    document.getElementById('mypreloader').style.display="";
  document.getElementById('realform').submit();
  
  }
}
document.addEventListener("DOMContentLoaded", function(){
	$('.preloader-background').delay(2500).fadeOut('slow');
	
	$('.preloader-wrapper')
		.delay(1700)
		.fadeOut();
});
function advancedvalues(){
    document.getElementById('startlagmax').value=document.getElementById('startlagmaxrange').value*3600;
    document.getElementById('minlayover').value=document.getElementById('minlayoverrange').value*60;
    document.getElementById('maxlayover').value=document.getElementById('maxlayoverrange').value*3600;
}



//SET THEME COLOUr
var themeColor="#f0f";
elements = document.getElementsByClassName('nav-wrapper');
    for (var i = 0; i < elements.length; i++) {
        elements[i].style.backgroundColor=themeColor;
        console.log("changed")
    }