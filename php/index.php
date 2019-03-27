<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Datos del Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css"
    />
    <style>
      html,
      body {
        width: 100%;
        height: 100vh;
      }

      body {
        display: grid;
        grid-template-rows: auto auto auto;
      }

      footer {
        grid-row-start: 3;
        grid-row-end: 4;
      }

      .logo {
        max-width: 30%;
      }
    </style>
  </head>
  <body>
    
    <?php require('views/header.php'); ?>

    <main>
      <section class="section">
        <div class="container">
          <div class="columns is-centered">
            <div class="column is-one-quarter">
              <h1 class="title has-text-centered">Ingresar al sistema</h1>
              <form action="login.php" method="post">
                <div class="field">
                  <label class="label">Nombre</label>
                  <div class="control">
                    <input
                      class="input"
                      type="text"
                      name="name"
                      placeholder="e.g. Hegar Garcia"
                    />
                  </div>
                </div>
                <div class="field">
                  <label class="label">Correo</label>
                  <div class="control">
                    <input
                      class="input"
                      type="email"
                      name="email"
                      placeholder="e.g. hgarcia13@ucol.mx"
                    />
                  </div>
                </div>
                <div class="field">
                  <div class="control">
                    <input
                      class="button is-link"
                      type="submit"
                      value="Enviar"
                    />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php require('views/footer.php'); ?>
  </body>
</html>
