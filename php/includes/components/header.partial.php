<header>
  <section class="hero is-primary">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-vcentered">
          <div class="column is-four-fifths">
            <img src="../assets/images/ucol.png" alt="logo" class="logo" />
            <h1 class="title">
              Facultad de Telemáctica
            </h1>
          </div>
          <div class="column has-text-centered">          
            <?php if (isset($_SESSION)) { ?>
              <img src="../assets/images/profile_placeholder.png" alt="profile picture" class="profile__picture">
              <h3 class="is-size-4 has-text-weight-semibold"><?php echo $_SESSION[
                "name"
              ]; ?></h3>
              <a class="button is-primary" href="../../logout.php">Cerrar Sesión</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</header>