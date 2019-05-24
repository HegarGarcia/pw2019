window.onload = () => {
  const nombreElem = document.getElementById('nombre');
  const profesionElem = document.getElementById('profesion');
  const procedenciaElem = document.getElementById('procedencia');
  const carreraElem = document.getElementById('carrera');
  const escuelaElem = document.getElementById('escuela');
  const institucionElem = document.getElementById('institucion');

  nombreElem.innerHTML = 'Hegar José García Rodríguez';
  profesionElem.innerHTML = 'Estudiante';
  procedenciaElem.innerHTML = 'Colima, Col. Mexico';
  carreraElem.innerHTML = '<strong>Carrera:</strong> Ingeniería de Software';
  escuelaElem.innerHTML = '<strong>Escuela:</strong> Facultad de Telemática';
  institucionElem.innerHTML =
    '<strong>Institución:</strong> Universidad de Colima';
};

const creaStock = () => {
  setMigas('Procesos / Stock de Tienda');
  let amountDepartments = 1;

  do {
    amountDepartments = +prompt(
      'Ingresa cuántos departamentos tiene tu tienda'
    );
  } while (Number.isNaN(amountDepartments) || amountDepartments < 2);

  const departments = Array.from({ length: amountDepartments }, (_, i) =>
    prompt(`Dame el nombre del ${i + 1} departamento:`)
  ).map(createDepartment);

  document.getElementById('departments').innerHTML = departments.join('\n');
};

const addProduct = name => {
  const elem = document.getElementById(name);

  let amountProducts = 1;

  do {
    amountProducts = +prompt(
      `Numero de productos a ingresar al departamento de ${elem.dataset.name}`
    );
  } while (Number.isNaN(amountProducts) || amountProducts < 2);

  const products = Array.from({ length: amountProducts }, (_, i) =>
    prompt(`Dame el nombre del ${i + 1} producto:`)
  ).map(createProduct);

  elem.innerHTML = products.join('\n');
};

const setMigas = title => {
  document.getElementById('migas').children[0].innerHTML = `Inicio / ${title}`;
};

const createDepartment = name => {
  return `<li>
    <h3 onclick="addProduct('${name}-productos')">${name}</h3>
    <h4 class="gray">Productos</h4>
    <ul data-name="${name}" id="${name}-productos"></ul>
  </li>`;
};

const createProduct = name => {
  return `<li>${name}</li>`;
};
