console.log("bla");

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