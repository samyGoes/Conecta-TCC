const formulario1 = document.getElementById('formulario');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

function setError(index, message) {
  campos[index].style.borderBottom = '1px solid #e63636';
  spans[index].textContent = message;
  spans[index].style.display = 'block';
}

function removeError(index) {
  campos[index].style.borderBottom = '';
  spans[index].textContent = '';
  spans[index].style.display = 'none';
}

function nameValidate() {
  if (campos[0].value.length < 3) {
    setError(0);
  } else {
    removeError(0);
  }
}

function emailValidate() {
  if (!emailRegex.test(campos[4].value)) {
    setError(4, 'oi');
  } else {
    removeError(4);
  }
}

function validateCPF(cpf) {
  // Check if the input contains only digits and has the correct format
  if (!/^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(cpf)) {
    return false;
  }

  // Remove punctuation marks from the input
  cpf = cpf.replace(/[^\d]+/g, '');

  // Check if all digits are the same
  if (/^(\d)\1{10}$/.test(cpf)) {
    return false;
  }

  // Calculate the check digits
  let sum = 0;
  for (let i = 0; i < 9; i++) {
    sum += parseInt(cpf.charAt(i)) * (10 - i);
  }
  let remainder = sum % 11;
  let digit1 = remainder < 2 ? 0 : 11 - remainder;

  sum = 0;
  for (let i = 0; i < 10; i++) {
    sum += parseInt(cpf.charAt(i)) * (11 - i);
  }
  remainder = sum % 11;
  let digit2 = remainder < 2 ? 0 : 11 - remainder;

  // Check if the check digits match
  if (parseInt(cpf.charAt(9)) !== digit1 || parseInt(cpf.charAt(10)) !== digit2) {
    return false;
  }

  return true;
}

function cpfValidate() {
  const cpf = campos[1].value;
  let message = '';

  if (!validateCPF(cpf)) {
    message = 'CPF inválido';
  }

  if (message !== '') {
    setError(1);
  } else {
    removeError(1);
  }
}

function segura(senha) {
  const senhaSegura = new SenhaSegura();
  if(new SenhaSegura()){
    return false
    setError(5);
  }
  return senhaSegura.segura(senha);
}


function passwordValidate() {
  const senha = campos[5].value;
  const confSenha = campos[6].value;
  
  if (senha !== confSenha) {
    setError(6);
  } else if (!segura(senha)) {
    setError(5);
  } else {
    removeError(5);
    removeError(6);
  }
}
