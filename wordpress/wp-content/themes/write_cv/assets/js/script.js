

// Rideau d'ouverture partie users

function openNav(){
    document.getElementById("myNav").style.width = "25%";
}

function closeNav(){
    document.getElementById("myNav").style.width= "0%";
}

// drag & drop
const base = document.querySelector('.base');
const box = document.querySelectorAll('.case');



base.addEventListener('dragstart', dragStart);
base.addEventListener('dragend', dragEnd);


function dragStart() {
    this.className += ' tenu';

    setTimeout(() => (this.className = 'invisible'), 0);
}

function dragEnd() {
    this.className = 'base';
}


for (const vide of box) {

    vide.addEventListener('dragover', dragOver);

    vide.addEventListener('dragenter', dragEnter);

    vide.addEventListener('dragleave', dragLeave);

    vide.addEventListener('drop', dragDrop);


}

function dragOver(e) {
    e.preventDefault()


}

function dragEnter(e) {
    e.preventDefault();
    this.className += ' hovered';
}

function dragLeave() {
    this.className = 'case';
}


function dragDrop() {
    this.className = 'case';
    this.append(base);
}

// THEO

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

//   TELECHARGEMENT PDF

window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'monCv.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}

// palette de couleur

var el_up = document.getElementById("GFG_UP");
var el_down = document.getElementById("GFG_DOWN");
var str = "Click on button to change the background color";

// el_up.innerHTML = str;

function changeColor(color) {
    document.getElementById("invoice").style.background = color;
}
  
function gfg_Run() {
    changeColor('#ffff9a');
} 
function blue_Run() {
    changeColor('#7fb1ff');
} 
function pink_Run() {
    changeColor('rgb(252, 146, 225)');
} 
function green_Run() {
    changeColor('#87ffcc');
}
function grey_Run() {
    changeColor('#8f8f8f');
} 

$("#submit").click(function() {
 
  var name = $("#nameField").val();
  var tel = $("#contactField").val();


  if(name == '' || tel == '') {
      alert("Veuillez remplir tous les champs.");
      return false;
  }

  $.ajax({
      type: "POST",
      url: "/ProjCV/wordpress/wp-content/themes/write_cv/formToBd.php",
      data: {
          name: name,
          tel: tel
      },
      cache: false,
      success: function(data) {
          alert(data);
      },
      error: function(xhr, status, error) {
          console.error(xhr);
      }
  });
   
});

