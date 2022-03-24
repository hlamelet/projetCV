<?php
/*
Template Name: accueil general

*/

?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- font awesome file link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  
<section id="home" class="home">

<h1 class="banner">Bertolucci Agency</h1>
<h3 class="slogan">Agence de Recrutement</h3>
<a href="<?php the_permalink() ?>Accueil" title=""><button>se connecter </button></a>

<div class="wave wave1"></div>
<div class="wave wave2"></div>
<div class="wave wave3"></div>

<div class="fas fa-cog nut1"></div>
<div class="fas fa-cog nut2"></div>


</section>


<!-- home section ends -->


<!-- about section starts  -->

<section id="about" class="about">

<h1 class="heading">
  À propos de nous</h1>

<div class="row">

  <div class="content">
    <h3>L’agence web qui fait parler de vous à Rouen</h3>
    <p> l'Agence Bertolucci  st une agence web située à proximité de Rouen (76). L'agence est composée d’experts dans la conception de site internet et est spécialisée dans la création de site e-commerce. Les sites e-commerces permettent de vendre vos produits par le biais d’internet. Vous pourrez ainsi augmenter le nombre de vos ventes en ayant une meilleure visibilité sur le web.

      Vendre ses produits sur internet, c’est conquérir de nouveaux marchés ! Cela permettra de booster vos ventes, et donc d'augmenter votre chiffre d’affaire.</p>
  </div>

  <div class="image">
    <img src="<?php echo get_template_directory_uri()?>/assets/img/about-image.svg" alt="">
  </div>

</div>


</section>

<!-- abuout section ends  -->

<!-- service section starts  -->

<section id="service" class="service">

<h1 class="heading">Offres d’emploi</h1>

<div class="row">

  <div class="image">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/img1.svg" alt="">
  </div>
  <div class="content">
    <h3>Développeur Front-End </h3>
    <p>En tant que développeur front-end vous ferez partie de l’équipe de conception des interfaces de notre application développée autour du framework React.js.</p>
    <a href="<?php the_permalink() ?>Accueil" title=""><button class="btn">Déposer son Cv</button></a>
  </div>

</div>

<div class="row">

  <div class="content">
    <h3>Développeur Mobile</h3>
    <p>- Développeur Android - Mobilité Nous recherchons pour l'un de nos partenaire, société qui développe des solutions de mobilité partagée, leur futur Développeur Mobile pour les accompagner dans leurs nouveaux projets en 2022..</p>
     <a href="<?php the_permalink() ?>Accueil" title=""><button class="btn">Déposer son Cv</button></a>
  </div>
  <div class="image">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/img2.svg" alt="">
  </div>

</div>

<div class="row">

  
  <div class="image">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/img3.svg" alt="">
  </div>
  <div class="content">
    <h3>Graphiste</h3>
    <p>- réaliser la mise en page de tout type de supports Print,de créer des projets publicitaires en corrélation avec les identités visuelles des clients. les fichiers réalisés devront être mis au format pour l'imprimeur.</p>
    <a href="<?php the_permalink() ?>Accueil" title=""><button class="btn">Déposer son Cv</button></a>
  </div>

</div>

<div class="row">

  <div class="content">
    <h3>Chargé de projet</h3>
    <p>- Votre travail consistera à donner vie à des projets variés, en partant d’un brief, ou bien d’une de vos propositions.
Vous pourrez être amené à effectuer des déplacements en France ou à l’international.</p>
<a href="<?php the_permalink() ?>Accueil" title=""><button class="btn">Déposer son Cv</button></a>
  </div>
  <div class="image">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/img4.svg" alt="">
  </div>

</div>

<div class="row">

  
  <div class="image">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/img5.svg" alt="">
  </div>
  <div class="content">
    <h3> Community Manager</h3>
    <p>Nous recherchons un profil motivé, passionné par la communication digitale / les nouvelles technologies et ayant déjà une première expérience professionnelle sur le même type de poste.</p>
    <a href="<?php the_permalink() ?>Accueil" title=""><button class="btn">Déposer son CV</button></a>
  </div>

</div>

<div class="row">

  <div class="content">
    <h3>Administrateur Systèmes et Réseaux</h3>
    <p>Rattaché au Responsable Informatique, vous êtes le garant de la fiabilité, de la disponibilité, de la performance, de la sécurité, de la confidentialité et de l’évolution des systèmes d’informations.</p>
    <a href="<?php the_permalink() ?>Accueil" title=""><button class="btn">Déposer son CV</button></a>
  </div>
  <div class="image">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/img6.svg" alt="">
  </div>

</div>

</section>


<!-- service section ends -->

<!-- team section starts  -->

<section id="team" class="team">

<h1 class="heading">Notre équipe</h1>

<div class="row">

<div class="card">
  <div class="image">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/pic1.png" alt="">
  </div>
  <div class="info">
    <h3>	JADE Martin</h3>
    <span>Web Designer</span>
    <div class="icons">
      <a href="#" class="fab fa-facebook-f"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
    </div>
  </div>
</div>


<div class="card">
  <div class="image">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/pic2.png" alt="">
  </div>
  <div class="info">
    <h3>Aaron	James</h3>
    <span>CEO </span>
    <div class="icons">
      <a href="#" class="fab fa-facebook-f"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
    </div>
  </div>
</div>

<div class="card">
  <div class="image">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/pic3.png" alt="">
  </div>
  <div class="info">
    <h3>Sergio Bertolucci</h3>
    <span>Fondateur </span>
    <div class="icons">
      <a href="#" class="fab fa-facebook-f"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
    </div>
  </div>
</div>

</div>


</section>



<!-- team section ends -->


<!-- FAQ section starts  -->

<section id="faq" class="faq">

<h1 class="heading">FAQ</h1>

<div class="row">

<div class="image">
  <img src="<?php echo get_template_directory_uri() ?>/assets/img/faq-image.svg" alt="">
</div>

<div class="accordion-container">

  <div class="accordion">
    <div class="accordion-header">
      <span>+</span>
      <h3>Quelles sont les étapes de création d’un site internet ? Comment fonctionne le processus de développement Web ?</h3>
    </div>
    <div class="accordion-body">
      <p>Appelez-nous ou utilisez ce formulaire pour nous contacter. Après une brève consultation téléphonique ou conversation per email, nous travaillerons avec vous pour développer une stratégie en ligne pour votre entreprise.</p>
    </div>
  </div>

  <div class="accordion">
    <div class="accordion-header">
      <span>+</span>
      <h3>Est-ce que je serais le propriétaire du site internet, une fois terminé ?</h3>
    </div>
    <div class="accordion-body">
      <p>Nos Conseil, vous aurez toujours la pleine propriété de votre site Web. Vous êtes libre de transférer votre site internet vers une autre agence Web, même si nous n’aimerions pas que cela se produise.</p>
    </div>
  </div>

  <div class="accordion">
    <div class="accordion-header">
      <span>+</span>
      <h3>Vais-je avoir mon mot à dire dans le processus de conception graphique ?</h3>
    </div>
    <div class="accordion-body">
      <p>Absolument. Notre objectif est de vous faire plaisir. Nous ne pouvons pas faire cela sans votre contribution. Si vous souhaitez un site internet au couleur de votre entreprise ou carrément autre chose, nous pouvons le faire. Dans tous les cas, vous devrez valider toutes nos créations graphiques. Mais l’essentiel c’est que nous sommes sûrs que votre nouveau site fera partie intégrante de votre marque !</p>
    </div>
  </div>

  <div class="accordion">
    <div class="accordion-header">
      <span>+</span>
      <h3>Prenez-vous un pourcentage sur chaque transaction ?
</h3>
    </div>
    <div class="accordion-body">
      <p>Non. Les seuls frais de transaction seront à régler à votre passerelle de paiement.
</p>
    </div>
  </div>

  <div class="accordion">
    <div class="accordion-header">
      <span>+</span>
      <h3>Ai-je besoin d’un hébergement Web ?</h3>
    </div>
    <div class="accordion-body">
      <p>Oui ! C’est ce qui rend votre site Web accessible via Internet. Nous pouvons inclure ou non l’hébergement Web de votre site internet.
</p>
    </div>
  </div>

</div>

</div>


</section>

<!-- FAQ section ends -->



<!-- jquery file link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- custom js file link  -->


  
</body>
<script>
  
$(document).ready(function(){


$('.fa-bars').click(function(){
  $(this).toggleClass('fa-times');
  $('.navbar').toggleClass('nav-toggle');
});

$(window).on('load scroll',function(){
  $('.fa-bars').removeClass('fa-times');
  $('.navbar').removeClass('nav-toggle');

  if($(window).scrollTop() > 30){
    $('.header').css({'background':'#6C5CE7','box-shadow':'0 .2rem .5rem rgba(0,0,0,.4)'});
  }else{
    $('.header').css({'background':'none','box-shadow':'none'});
  }
});


$('.accordion-header').click(function(){
  $('.accordion .accordion-body').slideUp();
  $(this).next('.accordion-body').slideDown();
  $('.accordion .accordion-header span').text('+');
  $(this).children('span').text('-');
});



});
</script>
<style>
  
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&display=swap');

:root{
  --color:#6C5CE7;
}

*{
  font-family: 'Poppins', sans-serif;
  margin:0; padding:0;
  box-sizing: border-box;
  text-transform: capitalize;
  transition: all .2s linear;
  text-decoration: none;
}

html{
  font-size: 62.5%;
}

body{
  overflow-x: hidden;
}

.heading{
  margin:2rem;
  padding-top: 6rem;
  display: inline-block;
  font-size: 3.5rem;
  color:var(--color);
  position: relative;
  letter-spacing: .2rem;
}

.heading::before, .heading::after{
  content: '';
  position: absolute;
  height: 2.5rem;
  width: 2.5rem;
  border-top:.4rem solid var(--color);
  border-left:.4rem solid var(--color);
}

.heading::before{
  top:5.8rem; left: -2rem;
}

.heading::after{
  bottom:-.5rem; right: -2rem;
  transform: rotate(180deg);
}

.btn{
  outline: none;
  border: none;
  border-radius: 5rem;
  background: var(--color);
  color:#fff;
  cursor: pointer;
  height:3.5rem;
  width: 15rem;
  font-size: 1.7rem;
  box-shadow: 0 .2rem .5rem rgba(0,0,0,.3);
}

.btn:hover{
  letter-spacing: .1rem;
  opacity: .8;
}
.header{
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  padding:1rem 2rem;
  position: fixed;
  top:0; left: 0;
  z-index: 100;
}

.header .logo{
  font-size: 2.5rem;
  color:#fff;
}

.header .logo i{
  padding:0 .5rem;
}

.header .navbar ul{
  list-style-type: none;
  display: flex;
  align-items: center;
  justify-content: space-around;
}

.header .navbar ul li{
  margin:0 1.5rem;
}

.header .navbar ul li a{
  font-size: 2rem;
  color:#fff;
}

.header .navbar ul li a:hover{
  color:#ccc;
}

.header .fa-bars{
  color:#fff;
  cursor: pointer;
  font-size: 3rem;
  display: none;
}

.home{
  min-height: 100vh;
  width: 100vw;
  background-color: #21D4FD;
background-image: linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-flow: column;
  text-align: center;
  padding:0 1rem;
  position: relative;
  overflow: hidden !important;
}

.home .banner{
  color:#fff;
  font-size: 5rem;
  text-shadow: 0 .3rem .5rem rgba(0,0,0,.3);
}

.home .slogan{
  color:#eee;
  font-size: 2.5rem;
  font-weight: 400;
}

.home button{
  height: 4rem;
  width: 18rem;
  background:#fff;
  color: #444;
  cursor: pointer;
  border:none;
  outline: none;
  margin-top: 1rem;
  font-size: 2rem;
  font-weight: 400;
  box-shadow: 0 .3rem .5rem rgba(0,0,0,.3);
}

.home button:hover{
  letter-spacing: .1rem;
}

.home .wave{
  position: absolute;
  bottom: -.5rem;
  left: 0;
  height:11rem;
  width: 100%;
  background-image: url('C:\xampp\htdocs\projCV\wordpress\wp-content\themes\write_cv\assets\img\wave.png');
  background-size: 100rem 11rem;
  background-repeat: repeat-x;
  animation:waves 10s linear infinite;
}

.home .wave2{
  animation-direction: reverse;
  opacity: .2;
}

.home .wave3{
  animation-duration: 4s;
  opacity: .5;
}

@keyframes waves{
  0%{
    background-position-x: 0;
  }
  100%{
    background-position-x: 100rem;
  }
}

.home .fa-cog{
  position: absolute;
  font-size: 30rem;
  opacity: .15;
  color:#fff;
  animation: rotate 10s linear infinite;
}

.home .nut1{
  top:10%; left: -15rem;
}

.home .nut2{
  bottom:23%; right: -13rem;
  animation-direction: reverse;
}

@keyframes rotate{
  100%{
    transform: rotate(360deg);
  }
}

.about{
  min-height: 100vh;
  width: 100vw;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.about .row{
  display: flex;
  align-items: center;
  justify-content: space-around;
  padding:0 4rem;
}

.about .row .content{
  text-align: left;
}

.about .row .image img{
  width: 50vw;
}

.about .row .content h3{
  font-size: 3rem;
  color: var(--color);
}

.about .row .content p{
  font-size: 1.5rem;
  color: #333;
  padding:1rem 0;
}

.about::before, .about::after{
  content: '';
  position: absolute;
  z-index: -1;
  opacity:.2;
  border-radius: 50%;
}

.about::before{
  height:50rem;
  width:50rem;
  background:#ccc;
  bottom:-10rem; left:-10rem;
}

.about::after{
  height:60rem;
  width:60rem;
  background:var(--color);
  top:-10rem; right:-10rem;
}

.service{
  width: 100vw;
  text-align: center;
}

.service .row{
  margin:2rem 0;
  padding:0 2rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.service .row .image img{
  width:50vw;
  height:55vh;
}

.service .row .content{
  text-align: left;
  padding:0 3rem;
}

.service .row .content h3{
  font-size: 3rem;
  color:var(--color);
}

.service .row .content p{
  font-size: 1.5rem;
  color:#333;
  padding:1rem 0;
}

.team{
  min-height: 100vh;
  width:100vw;
  text-align: center;
  background-color: #222;;
}

.team .heading{
  color:#fff;
}

.team .heading::before, .team .heading::after{
  border-color:#fff;
}

.team .row{
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
}

.team .row .card{
  height:35rem;
  width:25rem;
  background:#fff;
  text-align: center;
  margin:7rem 2rem;
  position: relative;
  overflow: hidden;
  -webkit-box-reflect: below .2rem linear-gradient(transparent 70%, #0004);
}

.team .row .card .image{
  margin:1rem 0;
  padding-top: 4rem;
}

.team .row .card .image img{
  height:13rem;
  width:13rem;
  border-radius: 50%;
  border:.5rem solid #fff;
  box-shadow: 0 0 .5rem rgba(0,0,0,.3);
  object-fit: cover;
}

.team .row .card .info h3{
  font-size: 2rem;
  color:#333;
}

.team .row .card .info span{
  font-size: 1.8rem;
  color:var(--color);
}

.team .row .card .info .icons a{
  margin-top: 4rem;
  padding:0 1rem;
  font-size: 2rem;
  color:#333;
}

.team .row .card .info .icons a:hover{
  color:var(--color);
}

.team .row .card::before, .team .row .card::after{
  content: '';
  position: absolute;
  border-radius: 50%;
  height:15rem;
  width:15rem;
  z-index: -1;
}

.team .row .card::before{
  background:var(--color);
  top:-3rem; right: -4rem;
}

.team .row .card::after{
  background:#ccc;
  bottom:-3rem; left: -4rem;
}

.contact{
  min-height: 100vh;
  width: 100vw;
  text-align: center;
}

.contact .row{
  display: flex;
  align-items: center;
  justify-content: center;
}

.contact .row .image img{
  height: 70vh;
  width:50vw;
}

.contact .row .form-container{
  width: 50%;
  text-align: left;
  padding:0 5rem;
}

.contact .row .form-container input, textarea{
  outline: none;
  border:none;
  height:4rem;
  background: none;
  border-radius: .5rem;
  box-shadow: .2rem .2rem .5rem rgba(0,0,0,.2);
  padding:0 1rem;
  margin:1rem 0;
  font-size: 1.6rem;
}

.contact .row .form-container .inputBox{
  width: 100%;
  display: flex;
  justify-content: space-between;
}

.contact .row .form-container .inputBox input[type="text"]{
  width: 49%;
}

.contact .row .form-container input[type="email"]{
  width: 100%;
}

.contact .row .form-container textarea{
  width: 100%;
  height:20rem;
  padding:1rem; 
  resize: none;
}

.contact .row .form-container input[type="submit"]{
  background-color: var(--color);
  color:#fff;
  cursor: pointer;
  height:4rem; 
  width: 10rem;;
}

.contact .row .form-container input[type="submit"]:hover{
  opacity: .8;
}

.faq{
  min-height: 100vh;
  width: 100vw;
  text-align: center;
  padding:0 2rem;
}

.faq .row{
  display: flex;
  align-items: center;
  justify-content: center;
  padding:0 2rem;
}

.faq .row .image img{
  height:70vh;
  width:50vw;
}

.faq .row .accordion-container{
  width: 50%;
  text-align: left;
}

.faq .row .accordion-container .accordion .accordion-header{
  background-color: var(--color);
  margin:1rem 0;
  box-shadow: .1rem .1rem .3rem rgba(0,0,0,.3);
  cursor: pointer;
}

.faq .row .accordion-container .accordion .accordion-header span{
  display: inline-block;
  text-align: center;
  height:4rem;
  width:5rem;
  line-height: 4rem;
  font-size: 2rem;
  background:#fff;
  color:#333;
  clip-path: polygon(0% 0%, 75% 0%, 100% 50%, 75% 100%, 0% 100%);
}

.faq .row .accordion-container .accordion .accordion-header h3{
  display: inline;
  color: #fff;
  font-weight: 400;
  padding-left: .5rem;
  font-size: 1.5rem;
}

.faq .row .accordion-container .accordion .accordion-body{
  padding:1rem;
  color:#444;
  box-shadow: .1rem .1rem .3rem rgba(0,0,0,.3);
  font-size: 1.3rem;
  display: none;
}

.faq .row .accordion-container .accordion:nth-child(1) .accordion-body{
  display: block;
}

.footer{
  width:100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding:1rem 2rem;
  margin-top: 1rem;
  background:var(--color);
}

.footer h1{
  color:#fff;
  letter-spacing: .1rem;
  font-weight: 400;
}

.footer .icons a{
  color:#fff;
  font-size: 1.8rem;
  padding:0 1rem;
}

/* media queries  */

@media (max-width:768px){

  html{
    font-size: 50%;
  }

  .header .fa-bars{
    display: block;
  }

  .header .navbar{
    position: fixed;
    top:-120%; left: 0;
    height: auto;
    width: 100%;
    background-color: #fff;
    z-index: 1000;
    border-top: .1rem solid rgba(0,0,0,.3);
  }

  .header .navbar ul{
    height: 100%;
    width: 100%;
    flex-flow: column;
  }

  .header .navbar ul li{
    margin:1rem 0;
  }

  .header .navbar ul li a{
    color: #444;
    font-size: 2.4rem;
  }

  .header .fa-times{
    transform: rotate(180deg);
  }

  .header .nav-toggle{
    top:5.8rem;
  }

  .home .banner{
    font-size: 4rem;
  }

  .home .slogan{
    font-size: 1.7rem;
  }

  .about .row{
    flex-flow: column-reverse;
    padding:0 2rem;
  }

  .about .row .image img{
    width: 100vw;
  }

  .service .row{
    flex-flow: column-reverse;
  }

  .service .row:nth-child(even){
    flex-flow: column;
  }

  .service .row .image img{
    width: 100vw;
  }

  .service .row .content{
    padding:0;
  }

  .contact .row{
    flex-flow: column;
  }

  .contact .row .image img{
    width: 100vw;
  }

  .contact .row .form-container{
    width: 100%;
    padding:0 1.5rem;
  }

  .faq{
    padding:0;
  }

  .faq .row{
    padding:0 1rem;
    flex-flow: column;
  }

  .faq .row .image img{
    width:100vw;
  }

  .faq .row .accordion-container{
    width:100%;
  }

}
/* FOOTER */
.footer {
  margin-top: 200px;
  width: 100%;
  height: 100px;
}
.container-footer {
  border-radius: 2px;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-image: linear-gradient(19deg, #21b2fd 0%, #7267cb 100%);
  padding: 50px;
}
.footer h3 {
  color: rgb(56, 54, 54);
}
.footer ul {
  list-style-type: none;
  padding: 0;
}
.footer a {
  color: white;
  text-decoration: none;
}
.footer a:hover {
  color: #6e3cbc;
  transition: 0.2s;
}

.container-footer ul {
  margin: 0;
}
.page {
  margin-bottom: 0;
}
/* DASHBORD */

.titre_dash {
  text-align: center;
  margin-top: 15px;
}

#bloc_dashbord {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  width: 95%;
  height: 85%;
  margin: 30px;
  border-radius: 20px;
  background-image: linear-gradient(19deg, #21b2fd 0%, #7267cb 100%);
  font-family: "PT Serif", serif;
  color: black;
}
.dash {
  background-color: white;
  width: 25%;
  margin: 50px;
  border-radius: 20px;

  color: black;
}
.dash h3 {
  text-align: center;
  font-family: "PT Serif", serif;
}
#dashbord_body {
  background: linear-gradient(#b8e4f0, #98bae7);
}
.cursor {
  cursor: pointer;
}
#create-resume.cursor {
  background-color: rgb(255 117 83);
}
/* MEDIAQUERYS FOOTER */
@media (max-width: 900px) {
  .container-footer {
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }
  .Reseau,
  .Societe,
  .About {
    margin-bottom: 15px;
  }
}

@media (max-width:550px){
  .footer{
    flex-flow: column;
  }
  .footer h1{
    text-align: center;
  }
  .footer .icons{
    padding:2rem 0;
  }
}
</style>