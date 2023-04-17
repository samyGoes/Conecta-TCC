const formulario1 = document.getElementById('formulario');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

function setError(index, message) {
  campos[index].style.borderBottom = '2px solid #e63636';
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
    setError(0, 'O nome deve conter no mínimo 3 caracteres');
  } else {
    removeError(0);
  }
}

function emailValidate() {
  if (!emailRegex.test(campos[5].value)) {
    setError(5, 'Endereço de e-mail inválido');
  } else {
    removeError(5);
  }
}

function cpfValidate() {
  const cpf = campos[2].value.replace(/[^\d]+/g, '');
  let invalidCpf = false;

  if (cpf.length !== 11) {
    invalidCpf = true;
  } else {
    for (let i = 0; i < 10; i++) {
      if (cpf.substring(i, i + 1) === cpf.substring(i + 1, i + 2)) {
        invalidCpf = true;
        break;
      }
    }
  }

  if (invalidCpf) {
    setError(2, 'CPF inválido');
  } else {
    removeError(2);
  }
}

function passwordValidate() {
  const senha = campos[6].value;
  const confSenha = campos[7].value;

  if (senha !== confSenha) {
    setError(7, 'As senhas não coincidem');
  } else {
    removeError(7);
  }
}

formulario1.addEventListener('submit', function (event) {
  event.preventDefault();
  nameValidate();
  cpfValidate();
  emailValidate();
  passwordValidate();
    formulario1.submit();
  
});
