const openModal = async (modalId, userId) => {
  const modal = document.getElementById(modalId);
  modal.classList.add("is-active");
  modal.dataset.id = userId;

  if (modalId === "EditUserModal") {
    const user = await fetch(
      `http://localhost:8080/api/fetch-user.php?id=${userId}`
    ).then(res => res.json());

    document.querySelector(`#${modalId} [name=name]`).value = user.name;
    document.querySelector(`#${modalId} [name=email]`).value = user.email;
    document.querySelector(`#${modalId} [name=isAdmin]`).value = user.isAdmin;
  }
};

const closeModal = modalId => {
  document.getElementById(modalId).classList.remove("is-active");
};

const sendData = async (formId, action, modalId) => {
  const name = document.querySelector(`#${formId} [name=name]`).value;
  const email = document.querySelector(`#${formId} [name=email]`).value;
  const isAdmin = document.querySelector(`#${formId} [name=isAdmin]`).value;
  const body = JSON.stringify({ name, email, isAdmin });

  let response;
  try {
    response = await fetch(`api/${action}.php`, {
      method: "POST",
      body,
      headers: {
        "Content-Type": "application/json"
      }
    });
  } catch (err) {
    console.log(err);
  }

  if (response.ok) {
    closeModal(modalId);
    window.location.reload();
  }

  document
    .querySelector(`#${formId} [name=email-error]`)
    .classList.toggle("is-invisible");
  document
    .querySelector(`#${formId} [name=email]`)
    .classList.toggle("is-danger");
};

const removeUser = () => {
  const modal = document.getElementById("RemoveUserModal");
  const userId = modal.dataset.id;
  console.log(userId);
  fetch(`api/remove-user.php?id=${userId}`).then(() =>
    window.location.reload()
  );
};
