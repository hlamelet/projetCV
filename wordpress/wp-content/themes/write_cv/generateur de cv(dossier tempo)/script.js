// alert("loading");
function addNewWEField() {
    //   console.log("Adding new files");
  
    var newNode = document.createElement("textarea");
    newNode.classList.add("form-control");
    newNode.classList.add("weField");
    newNode.classList.add("mt-2");
    newNode.setAttribute("rows", 3);
    newNode.setAttribute("placeholder", "Enter here");
  
    var weOb = document.getElementById("we");
    var weAddButtonOb = document.getElementById("weAddButton");
  
    weOb.insertBefore(newNode, weAddButtonOb);
  }
  
  function addNewAQField() {
    var newNode = document.createElement("textarea");
    newNode.classList.add("form-control");
    newNode.classList.add("eqField");
    newNode.classList.add("mt-2");
    newNode.setAttribute("rows", 3);
    newNode.setAttribute("placeholder", "Enter here");
  
    var aqOb = document.getElementById("aq");
    var aqAddButtonOb = document.getElementById("aqAddButton");
  
    aqOb.insertBefore(newNode, aqAddButtonOb);
  }
  
  //generating cv
  function generateCV() {
    // console.log("generating CV");
  
    var nameField = document.getElementById("nameField").value;
  
    var nameT1 = document.getElementById("nameT1");
  
    nameT1.innerHTML = nameField;
  
    //direct
  
    document.getElementById("nameT2").innerHTML = nameField;
  
    //contact
    document.getElementById("contactT").innerHTML = document.getElementById(
      "contactField"
    ).value;
  
    //address
    document.getElementById("addressT").innerHTML = document.getElementById(
      "addressField"
    ).value;
    document.getElementById("fbT").innerHTML = document.getElementById(
      "fbField"
    ).value;
    document.getElementById("instaT").innerHTML = document.getElementById(
      "instaField"
    ).value;
    document.getElementById("linkedT").innerHTML = document.getElementById(
      "linkedField"
    ).value;
  
    //objective
  
    document.getElementById("objectiveT").innerHTML = document.getElementById(
      "objectiveField"
    ).value;
  
    //we
  
    var wes = document.getElementsByClassName("weField");
  
    var str = "";
  
    for (var e of wes) {
      str = str + `<li> ${e.value} </li>`;
    }
  
    document.getElementById("weT").innerHTML = str;
  
    //aq
  
    var aqs = document.getElementsByClassName("eqField");
  
    var str1 = "";
  
    for (var e of aqs) {
      str1 += `<li> ${e.value} </li>`;
    }
  
    document.getElementById("aqT").innerHTML = str1;
  
    //code for setting image
  
    var file = document.getElementById("imgField").files[0];
  
    console.log(file);
  
    var reader = new FileReader();
  
    reader.readAsDataURL(file);
  
    console.log(reader.result);
  
    //set the image to template
  
    reader.onloadend = function () {
      document.getElementById("imgTemplate").src = reader.result;
    };
  
    document.getElementById("cv-form").style.display = "none";
    document.getElementById("cv-template").style.display = "block";
  }
  
  //print cv
  function printCV() {
    window.print();
  }