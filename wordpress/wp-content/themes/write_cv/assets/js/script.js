const dateInfLimite = "1970-01-01";

var today = new Date();
var dd = String(today.getDate()).padStart(2, "0");
var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
var yyyy = today.getFullYear();
today = yyyy + "-" + mm + "-" + dd;

// Rideau d'ouverture partie users

function openNav() {
	document.getElementById("myNav").style.width = "25%";
}

function closeNav() {
	document.getElementById("myNav").style.width = "0%";
}

// drag & drop

// const base = document.querySelector('.base');
// const box = document.querySelectorAll('.case');

// base.addEventListener('dragstart', dragStart);
// base.addEventListener('dragend', dragEnd);

// function dragStart() {
//     this.className += ' tenu';

//     setTimeout(() => (this.className = 'invisible'), 0);
// }

// function dragEnd() {
//     this.className = 'base';
// }

// for (const vide of box) {

//     vide.addEventListener('dragover', dragOver);

//     vide.addEventListener('dragenter', dragEnter);

//     vide.addEventListener('dragleave', dragLeave);

//     vide.addEventListener('drop', dragDrop);

// }

// function dragOver(e) {
//     e.preventDefault()

// }

// function dragEnter(e) {
//     e.preventDefault();
//     this.className += ' hovered';
// }

// function dragLeave() {
//     this.className = 'case'
// }

// function dragDrop() {
//     this.className = 'case';
//     this.append(base);
// }

// THEO

const getState = () => {
	const $ = (element) => {
		return document.getElementById(element).value;
	};

	const state = {
		name: $("name"),
		firstname: $("firstname"),
		address: $("address"),
		phone: $("phone"),
		email: $("email"),
		about: $("about"),
		career: $("career"),
		education: $("education"),
		job1: {
			date: {
				start: $("job-1__start"),
				end: $("job-1__end"),
			},
			details: $("job-1__details"),
		},
		job2: {
			date: {
				start: $("job-2__start"),
				end: $("job-2__end"),
			},
			details: $("job-2__details"),
		},
		job3: {
			date: {
				start: $("job-3__start"),
				end: $("job-3__end"),
			},
			details: $("job-3__details"),
		},
		references: $("references"),
	};
	return state;
};

const buildResume = (state) => {
	const $ = (value) => {
		document.write(value);
	};

	const styleText = `
@import url('https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap');

body {
  font-family: 'Poppins', sans-serif;
  background: #fafafa;
  color: rgba(0,0,0,0.75);
}

h1 {
  color: rgba(0,0,0,0.9);
}

h1, p {
  box-sizing: border-box;
  margin: 0px;
  padding: 0px 24px;
}

.line-break {
  width: 100%;
  height: 1px;
  margin: 16px auto;
  border-bottom: 1px solid #eee;
}

.resume {
  border-radius: 8px;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  max-width: 800px;
  margin: 48px auto;
  padding: 16px 0px;
  background: white;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.14);
}

.resume-group {
  box-sizing: border-box;
  padding: 8px 0px;
  width: 100%;
  display: flex;
  border-left: 3px solid transparent;
  transition: 0.2s;
}

.resume-group:hover {
  border-left: 3px solid #64FFDA;
}

.left-col {
  width: 35%;
}

.right-col {
  width: 65%;
}

.instructions {
  opacity: 0.5;
  text-align: center;
  font-size: 0.8rem;
  margin: 16px auto;
}
`;

	const createGroup = (left, right) => {
		$('<div class="resume-group">');
		$('<div class="left-col">');
		$("<p>" + left + "</p>");
		$("</div>");
		$('<div class="right-col">');
		$("<p>" + right + "</p>");
		$("</div>");
		$("</div>");
	};

	document.open();
	$("<html><head>");
	$("<title>" + state.name + "'s Resume </title>");
	$("<style>" + styleText + "</style>");
	$('</head><body><div class="resume">');
	$("<h1>" + state.name + "</h1>");
	$("<p>" + state.email + "</p>");
	$("<p>" + state.phone + "</p>");
	$("<p>" + state.address + "</p>");
	$('<div class="line-break"></div>');
	createGroup("ABOUT ME", state.about);
	createGroup("CAREER OBJECTIVES", state.career);
	createGroup("EDUCATION", state.education);
	createGroup("EMPLOYMENT EXPERIENCE", "");
	createGroup(
		state.job1.date.start + " to " + state.job1.date.end,
		state.job1.details
	);
	createGroup(
		state.job2.date.start + " to " + state.job2.date.end,
		state.job2.details
	);
	createGroup(
		state.job3.date.start + " to " + state.job3.date.end,
		state.job3.details
	);
	createGroup("REFERENCES", state.references);
	$("</div>");
	$(
		'<div class="instructions">Pour enregistrer votre CV : clic droit > enregistrer sous</div>'
	);
	$("</body></html>");
	document.close();
};

const checkName = () => {
	const name = document.getElementById("name");
	const name_error = document.getElementById("name__error");
	const isValid = !!name.value;
	if (!isValid) {
		name.classList.add("error__input");
		name_error.style.display = "block";
		name_error.innerHTML = "Ce champ est obligatoire";
		console.log("error");
	} else {
		name.classList.remove("error__input");
		name_error.style.display = "none";
	}
	return isValid;
};

const checkfirstName = () => {
	const firstname = document.getElementById("firstname");
	const firstname_error = document.getElementById("firstname__error");
	const isValid = !!firstname.value;
	if (!isValid) {
		firstname.classList.add("error__input");
		firstname_error.style.display = "block";
		firstname_error.innerHTML = "Ce champ est obligatoire";
		console.log("error");
	} else {
		firstname.classList.remove("error__input");
		firstname_error.style.display = "none";
	}
	return isValid;
};

const checkEmail = () => {
	const email = document.getElementById("email");
	const email_error = document.getElementById("email__error");
	const emailRegex =
		/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	const isValid = emailRegex.test(String(email.value).toLowerCase());
	if (!email.value) {
		email.classList.add("error__input");
		email_error.style.display = "block";
		email_error.innerHTML = "Ce champ est obligatoire";
	} else {
		if (!isValid) {
			email.classList.add("error__input");
			email_error.style.display = "block";
			email_error.innerHTML = "Ce champ n'est pas valide";
		} else {
			email.classList.remove("error__input");
			email_error.style.display = "none";
		}
	}
	return isValid;
};

const checkPhone = () => {
	const phone = document.getElementById("phone");
	const phone_error = document.getElementById("phone__error");
	const phoneRegex =
		/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/;
	const isValid = phoneRegex.test(String(phone.value).toLowerCase());
	if (!phone.value) {
		phone.classList.add("error__input");
		phone_error.style.display = "block";
		phone_error.innerHTML = "Ce champ est obligatoire";
	} else {
		if (!isValid) {
			phone.classList.add("error__input");
			phone_error.style.display = "block";
			phone_error.innerHTML = "Ce champ n'est pas valide";
		} else {
			phone.classList.remove("error__input");
			phone_error.style.display = "none";
		}
	}
	return isValid;
};

const checkJob_1_Start = () => {
	const job1_start = document.getElementById("job-1__start");
	const job1_error = document.getElementById("job-1_start__error");
	let isValid = true;
	if (job1_start.value) {
		isValid = job1_start.value > dateInfLimite;
		if (!isValid) {
			job1_start.classList.add("error__input");
			job1_error.style.display = "block";
			job1_error.innerHTML =
				"La date de début de contrat ne peut être inférieure au 01/01/1970";
		} else {
			job1_start.classList.remove("error__input");
			job1_error.style.display = "none";
		}
	}
	return isValid;
};

const checkJob_2_Start = () => {
	const job2_start = document.getElementById("job-2__start");
	const job2_error = document.getElementById("job-2_start__error");
	let isValid = true;
	if (job2_start.value) {
		isValid = job2_start.value > dateInfLimite;
		if (!isValid) {
			job2_start.classList.add("error__input");
			job2_error.style.display = "block";
			job2_error.innerHTML =
				"La date de début de contrat ne peut être inférieure au 01/01/1970";
		} else {
			job2_start.classList.remove("error__input");
			job2_error.style.display = "none";
		}
	}
	return isValid;
};

const checkJob_3_Start = () => {
	const job3_start = document.getElementById("job-3__start");
	const job3_error = document.getElementById("job-3_start__error");
	let isValid = true;
	if (job3_start.value) {
		isValid = job3_start.value > dateInfLimite;
		if (!isValid) {
			job3_start.classList.add("error__input");
			job3_error.style.display = "block";
			job3_error.innerHTML =
				"La date de début de contrat ne peut être inférieure au 01/01/1970";
		} else {
			job3_start.classList.remove("error__input");
			job3_error.style.display = "none";
		}
	}
	return isValid;
};

const checkJob_1_End = () => {
	const job1_start = document.getElementById("job-1__start");
	const job1_end = document.getElementById("job-1__end");
	const job1_error = document.getElementById("job-1_end__error");
	let isValid = true;
	if (job1_end.value) {
		isValid = job1_end.value < today && job1_end.value > job1_start.value;
		if (!isValid) {
			job1_end.classList.add("error__input");
			job1_error.style.display = "block";
			job1_error.innerHTML =
				"La date de fin de contrat doit être comprise entre la date de début et aujourd'hui";
		} else {
			job1_end.classList.remove("error__input");
			job1_error.style.display = "none";
		}
	}
	return isValid;
};

const checkJob_2_End = () => {
	const job2_start = document.getElementById("job-2__start");
	const job2_end = document.getElementById("job-2__end");
	const job2_error = document.getElementById("job-2_end__error");
	let isValid = true;
	if (job2_end.value) {
		isValid = job2_end.value < today && job2_end.value > job2_start.value;
		if (!isValid) {
			job2_end.classList.add("error__input");
			job2_error.style.display = "block";
			job2_error.innerHTML =
				"La date de fin de contrat doit être comprise entre la date de début et aujourd'hui";
		} else {
			job2_end.classList.remove("error__input");
			job2_error.style.display = "none";
		}
	}
	return isValid;
};

const checkJob_3_End = () => {
	const job3_start = document.getElementById("job-3__start");
	const job3_end = document.getElementById("job-3__end");
	const job3_error = document.getElementById("job-3_end__error");
	let isValid = true;
	if (job3_end.value) {
		isValid = job3_end.value < today && job3_end.value > job3_start.value;
		if (!isValid) {
			job3_end.classList.add("error__input");
			job3_error.style.display = "block";
			job3_error.innerHTML =
				"La date de fin de contrat doit être comprise entre la date de début et aujourd'hui";
		} else {
			job3_end.classList.remove("error__input");
			job3_error.style.display = "none";
		}
	}
	return isValid;
};

const checkValidity = () => {
	const firstnameIsValid = checkfirstName();
	const nameIsValid = checkName();
	const emailIsValid = checkEmail();
	const phoneIsValid = checkPhone();
	const job1_startIsValid = checkJob_1_Start();
	const job2_startIsValid = checkJob_2_Start();
	const job3_startIsValid = checkJob_3_Start();
	const job1_endIsValid = checkJob_1_End();
	const job2_endIsValid = checkJob_2_End();
	const job3_endIsValid = checkJob_3_End();

	if (!nameIsValid) {
		location.hash = "#name";
	} else if (!emailIsValid) {
		location.hash = "#email";
	} else if (!firstnameIsValid) {
		location.hash = "#firstname";
	} else if (!phoneIsValid) {
		location.hash = "#phone";
	} else if (!job1_startIsValid) {
		location.hash = "#job-1__start";
	} else if (!job2_startIsValid) {
		location.hash = "#job-2__start";
	} else if (!job3_startIsValid) {
		location.hash = "#job-3__start";
	} else if (!job1_endIsValid) {
		location.hash = "#job-1__end";
	} else if (!job2_endIsValid) {
		location.hash = "#job-2__end";
	} else if (!job3_endIsValid) {
		location.hash = "#job-3__end";
	}
	return (
		nameIsValid &&
		emailIsValid &&
		firstnameIsValid &&
		phoneIsValid &&
		job1_startIsValid &&
		job2_startIsValid &&
		job3_startIsValid &&
		job1_endIsValid &&
		job2_endIsValid &&
		job3_endIsValid
	);
};

/*document.getElementById('create-resume').addEventListener("click", (e) => {
  e.preventDefault()
  const isValid = checkValidity()
  if (isValid) buildResume(getState())
})*/

document.getElementById("name").addEventListener("blur", checkName);
document.getElementById("firstname").addEventListener("blur", checkfirstName);
document.getElementById("email").addEventListener("blur", checkEmail);
document.getElementById("phone").addEventListener("blur", checkPhone);
document
	.getElementById("job-1__start")
	.addEventListener("blur", checkJob_1_Start);
document
	.getElementById("job-2__start")
	.addEventListener("blur", checkJob_2_Start);
document
	.getElementById("job-3__start")
	.addEventListener("blur", checkJob_3_Start);
document.getElementById("job-1__end").addEventListener("blur", checkJob_1_End);
document.getElementById("job-2__end").addEventListener("blur", checkJob_2_End);
document.getElementById("job-3__end").addEventListener("blur", checkJob_3_End);

//print cv
function printCV() {
	window.print();
}

//   TELECHARGEMENT PDF

window.onload = function () {
	document.getElementById("telecharger").addEventListener("click", () => {
		const invoice = this.document.getElementById("feuille");
		console.log(invoice);
		console.log(window);
		var opt = {
			margin: 0,
			filename: "monCV.pdf",
			image: { type: "jpeg", quality: 0.98 },
			html2canvas: { scale: 1 },
			jsPDF: {
				unit: "mm",
				format: "a4",
				orientation: "portrait",
				precision: "2",
			},
		};
		html2pdf().from(invoice).set(opt).save();
	});
};

// palette de couleur

function changeColor(color) {
	document.getElementById("feuille").style.background = color;
	document.getElementById("name").style.background = color;
	document.getElementById("firstname").style.background = color;
	document.getElementById("address").style.background = color;
	document.getElementById("phone").style.background = color;
	document.getElementById("email").style.background = color;
	document.getElementById("about").style.background = color;
	document.getElementById("career").style.background = color;
	document.getElementById("education").style.background = color;
	document.getElementById("job-1__start").style.background = color;
	document.getElementById("job-1__end").style.background = color;
	document.getElementById("job-1__details").style.background = color;
	document.getElementById("job-2__start").style.background = color;
	document.getElementById("job-2__end").style.background = color;
	document.getElementById("job-2__details").style.background = color;
	document.getElementById("job-3__start").style.background = color;
	document.getElementById("job-3__end").style.background = color;
	document.getElementById("job-3__details").style.background = color;
	document.getElementById("references").style.background = color;
}

function gfg_Run() {
	changeColor("#ffff9a");
}
function blue_Run() {
	changeColor("#7fb1ff");
}
function pink_Run() {
	changeColor("rgb(252, 146, 225)");
}
function green_Run() {
	changeColor("#87ffcc");
}
function grey_Run() {
	changeColor("#8f8f8f");
}

// Changement font

function changeSacramento() {
	document.getElementById("feuille").style.fontFamily = "Sacramento";
}
function changeGochi() {
	document.getElementById("feuille").style.fontFamily = "Gochi Hand";
}
function changeAnnie() {
	document.getElementById("feuille").style.fontFamily =
		"Annie Use Your Telescope";
}

// Requete Ajax
$(".fi-rr-trash").click(function () {
	let current_id = $(this)[0].attributes[0].nodeValue;
	let date_choice = $(this)['context'].nextSibling.parentElement.children[current_id].innerText;
	$.ajax({
	  type: "POST",
	  url: "/ProjCV/wordpress/wp-content/themes/write_cv/delete_brouillon.php",
	  data: {date_choice : date_choice},
	  cache: false,
	  success: function (data) {
		console.log(data);
		location.reload();
	  },
	  error: function (xhr, status, error) {
		console.log(xhr);
		console.log(status);
		console.log(error);
	  }
	});
  });


$(".brouillon").click(function () {
  let date_choice = $(this)[0].innerText;
  console.log(date_choice);
  $.ajax({
    type: "POST",
    url: "/ProjCV/wordpress/wp-content/themes/write_cv/BdToForm.php",
    dataType: 'JSON',
    data: {date_choice : date_choice},
    cache: false,
    success: function (data) {
      console.log(data);
      document.getElementById("name").value = data['user_name'];
      document.getElementById("firstname").value = data['user_firstname'];
      document.getElementById("address").value = data['user_adresse'];
      document.getElementById("phone").value = data['user_tel'];
      document.getElementById("email").value = data['user_email'];
      document.getElementById("about").value = data['intro'];
      document.getElementById("career").value = data['objectifs'];
      document.getElementById("education").value = data['education'];
      document.getElementById("job-1__start").value = data['debut'];
      document.getElementById("job-1__end").value = data['fin'];
      document.getElementById("job-1__details").value = data['info'];
      document.getElementById("job-2__start").value = data['debut_2'];
      document.getElementById("job-2__end").value = data['fin_2'];
      document.getElementById("job-2__details").value = data['info_2'];
      document.getElementById("job-3__start").value = data['debut_3'];
      document.getElementById("job-3__end").value = data['fin_3'];
      document.getElementById("job-3__details").value = data['info_3'];
    },
    error: function (xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
    }
  });
});

$("#create-resume").click(function () {
	var name = $("#name").val();
	var firstname = $("#firstname").val();
	var email = $("#email").val();
	var phone = $("#phone").val();
	var address = $("#address").val();
	var about = $("#about").val();
	var career = $("#career").val();
	var education = $("#education").val();
	var job1__start = $("#job-1__start").val();
	var job1__end = $("#job-1__end").val();
	var job1__details = $("#job-1__details").val();
	var job2__start = $("#job-2__start").val();
	var job2__end = $("#job-2__end").val();
	var job2__details = $("#job-2__details").val();
	var job3__start = $("#job-3__start").val();
	var job3__end = $("#job-3__end").val();
	var job3__details = $("#job-3__details").val();
	var references = $("#references").val();

	if (
		name == "" ||
		phone == "" ||
		email == "" ||
		firstname == "" ||
		address == "" ||
		about == "" ||
		career == "" ||
		education == ""
	) {
		alert("Veuillez remplir tous les champs obligatoires.");
		return false;
	}

	$.ajax({
		type: "POST",
		url: "/ProjCV/wordpress/wp-content/themes/write_cv/formToBd.php",
		data: {
			name: name,
			firstname: firstname,
			phone: phone,
			email: email,
			address: address,
			about: about,
			career: career,
			education: education,
			job1__start: job1__start,
			job1__end: job1__end,
			job1__details: job1__details,
			job2__start: job2__start,
			job2__end: job2__end,
			job2__details: job2__details,
			job3__start: job3__start,
			job3__end: job3__end,
			job3__details: job3__details,
			references: references,
		},
		cache: false,
		success: function (data) {
			// alert(data);
		},
		error: function (xhr, status, error) {
			console.error(xhr);
		},
	});

	const isValid = checkValidity();
	if (isValid) buildResume(getState());
});

// CHANGEMENT DES DIVS USERS

function changeCvtheque() {
	document.getElementById(
		"overlay-content2"
	).innerHTML = "non";
}

function changeModele() {
	document.getElementById("overlay-content2").innerHTML =
		'<h5 style="color: white;">Templates de CV</h5>';
}

function changeStyle() {
	document.getElementById("overlay-content2").innerHTML =
		'<h5 style="color: white;">Couleur du CV</h5><button onclick="gfg_Run()" id="yellow_color"></button><button onclick="blue_Run()" id="blue_color"></button><button onclick="green_Run()" id="green_color"></button><button onclick="grey_Run()" id="grey_color"></button><button onclick="pink_Run()" id="purple_color"></button><h5 style="color: white;">Polices de caractères</h5><button onclick="changeSacramento()" id="sacramento">Je suis un beau CV</button><button onclick="changeGochi()" id="gochi">Je suis un beau CV</button><button onclick="changeAnnie()" id="annie">Je suis un beau CV</button>';
}

// Interieur d'une div bouge

function mouseOver(event) {
	document.querySelector(".text").style.borderColor = "red";
	document.querySelector(".map").style.borderColor = "red";

	let x = event.clientX;

	get_map.width = x + "px";
}

buttonModif = document.querySelector(".button-modif");

// MODIFICATION COMPTE

function openProfil() {
	document.querySelector(".overlayProfil").style.width = "20%";
}
function closeProfil() {
	document.querySelector(".overlayProfil").style.width = "0";
}
function ModifAccount() {
	document.querySelector(".modifProfil").style.display = "flex";
	document.querySelector(".overlayProfil").style.height = "60%";
	document.querySelector("#button-modif-open").style.display = "none";
	document.querySelector("#button-modif-close").style.display = "flex";
}
function ModifAccountClose() {
	document.querySelector(".modifProfil").style.display = "none";
	document.querySelector(".overlayProfil").style.height = "25%";
	document.querySelector("#button-modif-open").style.display = "flex";
	document.querySelector("#button-modif-close").style.display = "none";
}

// brouillon

$("#brouillon").click(function () {
	var name = $("#name").val();
	var firstname = $("#firstname").val();
	var email = $("#email").val();
	var phone = $("#phone").val();
	var address = $("#address").val();
	var about = $("#about").val();
	var career = $("#career").val();
	var education = $("#education").val();
	var job1__start = $("#job-1__start").val();
	var job1__end = $("#job-1__end").val();
	var job1__details = $("#job-1__details").val();
	var job2__start = $("#job-2__start").val();
	var job2__end = $("#job-2__end").val();
	var job2__details = $("#job-2__details").val();
	var job3__start = $("#job-3__start").val();
	var job3__end = $("#job-3__end").val();
	var job3__details = $("#job-3__details").val();
	var references = $("#references").val();

	if (
		name == "" ||
		phone == "" ||
		email == "" ||
		firstname == "" ||
		address == "" ||
		about == "" ||
		career == "" ||
		education == ""
	) {
		alert("Veuillez remplir tous les champs obligatoires.");
		return false;
	}

	$.ajax({
		type: "POST",
		url: "/ProjCV/wordpress/wp-content/themes/write_cv/brouillon_form.php",
		data: {
			name: name,
			firstname: firstname,
			phone: phone,
			email: email,
			address: address,
			about: about,
			career: career,
			education: education,
			job1__start: job1__start,
			job1__end: job1__end,
			job1__details: job1__details,
			job2__start: job2__start,
			job2__end: job2__end,
			job2__details: job2__details,
			job3__start: job3__start,
			job3__end: job3__end,
			job3__details: job3__details,
			references: references,
		},
		cache: false,
		success: function (data) {
			// alert(data);
		},
		error: function (xhr, status, error) {
			console.error(xhr);
		},
	});

	const isValid = checkValidity();
	if (isValid) buildResume(getState());
});

//   Zoom

function zoomplus30() {
	document.querySelector("#feuille").style.width = "1300px";
}

function zoommoins30() {
	document.querySelector("#feuille").style.width = "30%";
}
function zoomretour() {
	document.querySelector("#feuille").style.width = "794px";
}

// message de retour

function displayResult() {
	document.querySelector("#send_return").innerHTML =
		"Votre CV a bien été envoyé !";
}


