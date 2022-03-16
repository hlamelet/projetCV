<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />

    <title>Test</title>
  </head>
  <body>
    <!-- code html  -->

    <div class="card mx-5 mt-3" id="cv-form">
      <div class="card-header">
        <h1 class="text-center my-2">Mon CV</h1>

      </div>
      <div class="card-body">
        <div class="container" >
        
          <div class="row">
            <div class="col-md-6">
              <!-- premier col -->
              <h3>Renseignements personnels</h3>

              <div class="form-group">
                <label for="nameField">votre nom</label>
                <input
                  type="text"
                  id="nameField"
                  placeholder="Enter here"
                  class="form-control"
                />
              </div>

              <div class="form-group mt-2">
                <label for="contactField">
                    Ton contact</label>
                <input
                  type="text"
                  id="contactField"
                  placeholder="Enter here"
                  class="form-control"
                />
              </div>

              <div class="form-group mt-2">
                <label for="addressField">
                    Votre adresse</label>
                <textarea
                  id="addressField"
                  placeholder="Enter here"
                  class="form-control"
                  rows="5"
                ></textarea>
              </div>

              <div class="form-group mt-3">
                <label for="">Sélectionnez votre photo</label>
                <input id="imgField" type="file" class="form-control" />
              </div>

              <p class="text-secondary my-3">Liens importants</p>

              <div class="form-group mt-2">
                <label for="fbField">Facebook </label>
                <input
                  type="text"
                  id="fbField"
                  placeholder="Enter here"
                  class="form-control"
                />
              </div>
              <div class="form-group mt-2">
                <label for="instaField">Instagram </label>
                <input
                  type="text"
                  id="instaField"
                  placeholder="Enter here"
                  class="form-control"
                />
              </div>
              <div class="form-group mt-2">
                <label for="linkedField">LinkedIn</label>
                <input
                  type="text"
                  id="linkedField"
                  placeholder="Enter here"
                  class="form-control"
                />
              </div>
            </div>
            <div class="col-md-6">
              <!-- seconde col -->
              <h3>Information professionnelle</h3>

              <div class="form-group mt-2">
                <label for="">Objectif</label>
                <textarea
                  id="objectiveField"
                  rows="5"
                  placeholder="Enter here"
                  class="form-control"
                ></textarea>
              </div>

              <div class="form-group mt-2" id="we">
                <label for="">
                    L'expérience professionnelle</label>
                <textarea
                  placeholder="Enter here"
                  class="form-control weField"
                  rows="3"
                ></textarea>

                <!-- textarea -->

                <div class="container text-center mt-2" id="weAddButton">
                  <button
                    onclick="addNewWEField()"
                    class="btn btn-primary btn-sm"
                  >
                    Ajouter
                  </button>
                </div>
              </div>

              <div class="form-group mt-2" id="aq">
                <label for="">
                    Qualification Scolaire</label>
                <textarea
                  placeholder="Enter here"
                  class="form-control eqField"
                  rows="3"
                ></textarea>

                <div class="container text-center mt-2" id="aqAddButton">
                  <button
                    onclick="addNewAQField()"
                    class="btn btn-primary btn-sm"
                  >
                    Ajouter
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="container text-center mt-3">
            <button onclick="generateCV()" class="btn btn-primary btn-lg">
              Créer mon CV
            </button>
          </div>
        </div>
      </div class="card-body">
    </div>
    <!-- cv template -->

    <div class="container" id="cv-template">
      <div class="row">
        <div class="col-md-4 text-center py-5 background">
          <!-- first col  -->

          <img
            src="https://retailx.com/wp-content/uploads/2019/12/iStock-476085198.jpg"
            alt=""
            class="img-fluid myimg"
            id="imgTemplate"
          />

          <div class="container">
            <p id="nameT1">Théo GaGGIO</p>
            <p id="contactT">+3306568045</p>
            <p id="addressT">67A avenue Jean rondeaux 76100 , France</p>

            <hr />

            <p>
              <a id="fbT" href="#1"
                >https://www.facebook.com/</a
              >
            </p>
            <p>
              <a id="instaT" href="#1">https://www.instagram.com/</a>
            </p>
            <p>
              <a id="linkedT" href="#1"
                >https://www.linkedin.com/</a
              >
            </p>
          </div>
        </div>
        <div class="col-md-8 py-5">
          <!-- seconde col  -->
          <h1 id="nameT2" class="text-center" style="font-weight: 980">
            Theo Gaggio
          </h1>

          <!-- objectif card  -->

          <div class="card mt-4">
            <div class="card-header background">
              <h3>Objective</h3>
            </div>
            <div class="card-body">
              <p id="objectiveT">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                quam quos totam dolorem commodi earum, labore consectetur
                excepturi reiciendis, a fugiat porro rem mollitia inventore
                eligendi, saepe libero hic aliquam? Iure molestias natus dolore
                animi, possimus eius! Atque nesciunt eveniet exercitationem enim
                nisi quis. Consequatur aliquam reiciendis officiis laboriosam
                numquam?
              </p>
            </div>
          </div>

          <!-- work Experience -->

          <div class="card mt-4">
            <div class="card-header background">
              <h3>Work Experience</h3>
            </div>
            <div class="card-body">
              <ul id="weT">
                <li>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Odit, ad.
                </li>
                <li>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Odit, ad.
                </li>
                <li>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Odit, ad.
                </li>
              </ul>
            </div>
          </div>

          <!-- Qualification scolaire  -->

          <div class="card mt-4">
            <div class="card-header background">
              <h3>Qualification scolaire</h3>
            </div>
            <div class="card-body">
              <ul id="aqT">
                <li>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Odit, ad.
                </li>
                <li>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Odit, ad.
                </li>
                <li>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Odit, ad.
                </li>
              </ul>
            </div>
          </div>

          <div class="container mt-3 text-center">
            <button onclick="printCV()" class="btn background">Print CV</button>
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
    <script src="script.js"></script>
  </body>
</html>