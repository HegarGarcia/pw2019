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
            <div class="column is-one-quarter has-text-centered">
                <p class="title is-4 ">Nombre</p>
                <p class="subtitle is-5 is-spaced"><?php echo $_POST['name']; ?></p>

                <p class="title is-4 ">Correo</p>
                <p class="subtitle is-5 is-spaced"><?php echo $_POST['email']; ?></p>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php require('views/footer.php'); ?>
  </body>
</html>
