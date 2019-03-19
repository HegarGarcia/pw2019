function calculator(operationType) {
  const first = askNumber('primer');
  const second = askNumber('segundo');

  let result = 0;
  let remainder = 0;

  switch (operationType) {
    case 'sum':
      result = first + second;
      break;
    case 'res':
      result = first - second;
      break;
    case 'mult':
      result = first * second;
      break;
    case 'div':
      result = first / second;
      remainder = first % second;
      break;
    default:
      alert('Operación no válida');
  }

  document.getElementById('result').innerHTML = result;
  const remainderElem = document.getElementById('remainder');

  remainderElem.innerHTML = '';
  remainderElem.parentElement.hidden = true;

  if (operationType === 'div') {
    remainderElem.parentElement.removeAttribute('hidden');
    remainderElem.innerHTML = remainder;
  }
}

function askNumber(msg) {
  let value = 0;

  do {
    value = prompt(`Ingresa el ${msg} número:`);
  } while (value === '' || Number.isNaN(+value));

  return +value;
}
