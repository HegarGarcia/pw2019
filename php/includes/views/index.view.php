<?php $main = <<<HTML
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
HTML; ?>
<?php require VIEW_PATH . 'base.view.php'; ?>
