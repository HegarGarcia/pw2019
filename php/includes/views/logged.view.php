<!DOCTYPE html>
<html>
  <?php require_once COMPONENT_PATH . 'head.partial.html'; ?>
  
  <?php
  $_SESSION["email"] = $_POST["email"];
  $_SESSION["name"] = $_POST["name"];
  $logged_user = User::getByEmail($_SESSION["email"])[0];

  if (!$logged_user) {
    header("Location: index.php");
    die();
  }

  $users = User::getAll();
  ?>

  <body>
    <?php require_once COMPONENT_PATH . 'header.partial.php'; ?>
    <main>
      <section class="section">
        <div class="container is-centered">
          <h1 class="is-size-3 has-text-centered">Listado de Usuarios</h1>
          <div class="columns is-centered">
            <div class="column is-three-quarters has-text-centered">
                <table class="table is-fullwidth is-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($users as $user) { ?>
                    <tr>
                      <td><?php echo $user->id; ?></td>
                      <td><?php echo $user->name; ?></td>
                      <td><?php echo $user->email; ?></td>
                      <td><?php echo $user->isAdmin == 1 ? 'Sí' : 'No'; ?></td>
                      <td>
                        <button class="button">Editar</button>
                        <button class="button">Eliminar</button>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </section>
    </main>
    <?php require_once COMPONENT_PATH . 'footer.partial.html'; ?>
  </body>
  
</body>
</html>