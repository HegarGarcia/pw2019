<!DOCTYPE html>
<html>
  <?php require_once COMPONENT_PATH . 'head.partial.html'; ?>
  
  <script>
    const openModal = async (modalId, userId) => {
      document.getElementById(modalId).classList.add('is-active');

      if (userId) {
        const userResponse = await fetch(`http://localhost:8080/api/fetch-user.php?id=${userId}`);
        const user = await userResponse.json();
        document.querySelector(`#${modalId} [name=name]`).value = user.name;
        document.querySelector(`#${modalId} [name=email]`).value = user.email;
      }
    }

    const closeModal = (modalId) => {
      document.getElementById(modalId).classList.remove('is-active');
    }

    const sendData = (formId, action, modalId) => {
      const name = document.querySelector(`#${formId} [name=name]`).value;
      const email = document.querySelector(`#${formId} [name=email]`).value;
      const body = JSON.stringify({ name, email });

      fetch(`api/${action}.php`, {
        method: "POST",
        body,
        headers:{
          'Content-Type': 'application/json'
        }
      });

      closeModal(modalId);
      window.location.reload();
    }

    const removeUser = (userId) => {
      fetch(`api/remove-user.php?id=${userId}`);
      window.location.reload();
    }
  </script>

  <?php
  $_SESSION["email"] = $_POST["email"];
  $_SESSION["name"] = $_POST["name"];
  $logged_user = User::getByEmail($_SESSION["email"]);

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
          <h1 class="title has-text-centered">Listado de Usuarios</h1>
          <p class="has-text-right">
            <a class="button is-primary" onclick="openModal('AddUserModal')">
              <span class="icon is-medium">
                <i class="icon mdi mdi-account-plus"></i>
              </span>
            </a>
          </p>
          <div class="columns is-centered">
            <div class="column is-full has-text-centered">
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
                        <button class="button is-info" onclick="openModal('EditUserModal', <?php echo $user->id; ?>)">Editar</button>
                        <button class="button is-danger" onclick="removeUser('<?php echo $user->id; ?>')">Eliminar</button>
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

    <div class="modal" id="AddUserModal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Añadir Usuario</p>
          <button class="delete" aria-label="close" onclick="closeModal('AddUserModal')"></button>
        </header>

        <section class="modal-card-body">
          <form id="add-user">
            <div class="field">
              <label class="label">Nombre</label>
              <input name="name" class="input" type="text" placeholder="Nombre">
            </div>

            <div class="field">
              <label class="label">Email</label>
              <input name="email" class="input" type="email" placeholder="Email">
            </div>
          </form>
        </section>

        <footer class="modal-card-foot">
          <button class="button is-success" onclick="sendData('add-user','add-user', 'AddUserModal')">Agregar</button>
          <button class="button" onclick="closeModal('AddUserModal')">Cancel</button>
        </footer>
      </div>
    </div>

    <div class="modal" id="EditUserModal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Editar Usuario</p>
          <button class="delete" aria-label="close" onclick="closeModal('EditUserModal')"></button>
        </header>
        <section class="modal-card-body">
          <form id="edit-user">
            <div class="field">
              <label class="label">Nombre</label>
              <input name="name" class="input" type="text" placeholder="Nombre">
            </div>

            <div class="field">
              <label class="label">Email</label>
              <input name="email" class="input" type="email" placeholder="Email">
            </div>
          </form>
        </section>
        <footer class="modal-card-foot">
          <button class="button is-success" onclick="sendData('edit-user','edit-user', 'EditUserModal')">Guardar</button>
          <button class="button" onclick="closeModal('EditUserModal')">Cancel</button>
        </footer>
      </div>
    </div>
  
</body>
</html>