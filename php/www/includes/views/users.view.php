<!DOCTYPE html>
<html>
  <?php require_once COMPONENT_PATH . 'head.partial.html'; ?>

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
                <table id="users" class="table is-fullwidth is-striped">
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
                  <?php foreach (User::getAll() as $user) { ?>
                    <tr>
                      <td><?php echo $user->id; ?></td>
                      <td><?php echo $user->name; ?></td>
                      <td><?php echo $user->email; ?></td>
                      <td><?php echo $user->isAdmin == 1 ? 'Sí' : 'No'; ?></td>
                      <td>
                        <button class="button is-info" onclick="openModal('EditUserModal', <?php echo $user->id; ?>)">Editar</button>
                        <button class="button is-danger" onclick="openModal('RemoveUserModal', <?php echo $user->id; ?>)">Eliminar</button>
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
              <p name="email-error" class="help is-danger is-invisible">El email ya está registrado</p>
            </div>

            <div class="field">
              <label class="label">Admin</label>
              <div class="select">
                <select name="isAdmin">
                  <option value="1">Sí</option>
                  <option value="0">No</option>
                </select>
              </div>
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

            <div class="field">
              <label class="label">Admin</label>
              <div class="select">
                <select name="isAdmin">
                  <option value="1">Sí</option>
                  <option value="0">No</option>
                </select>
              </div>
            </div>
          </form>
        </section>
        <footer class="modal-card-foot">
          <button class="button is-success" onclick="sendData('edit-user','edit-user', 'EditUserModal')">Guardar</button>
          <button class="button" onclick="closeModal('EditUserModal')">Cancel</button>
        </footer>
      </div>
    </div>
  
    <div class="modal" id="RemoveUserModal">
      <div class="modal-background"></div>    
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Eliminar Usuario</p>
          <button class="delete" aria-label="close" onclick="closeModal('EditUserModal')"></button>
        </header>
        <section class="modal-card-body">
          <p>Estas seguro que deseas borrar el usuario</p>
        </section>
        <footer class="modal-card-foot">
          <button class="button is-danger" onclick="removeUser(this)">Borrar</button>
          <button class="button" onclick="closeModal('RemoveUserModal')">Cancelar</button>
        </footer> 
      </div>
      
      <button class="modal-close is-large" aria-label="close" onclick="closeModal('RemoveUserModal')">>Cancelar</button>
    </div>

    <script src="../assets/js/user.view.js"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#users').DataTable();
      });
    </script>

</body>
</html>