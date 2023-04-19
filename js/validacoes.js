const formulario1 = document.getElementById('formulario');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
//const senhaRegex = /^(?=.*\d)(?=.*[!@#$%&*])(?=.*[A-Z]).{8,}$/;

function setError(index) {
  campos[index].style.borderBottom = '1px solid #e63636';
  spans[index].style.display= 'block';

}

function removeError(index) {
  campos[index].style.borderBottom = '';
  spans[index].style.display= '';

}

/*formulario1.addEventListener('submit', (event) => {
  event.preventDefault();
  nameValidate();
  emailValidate();
  cpfValidate();
  passwordValidate();

})*/

function nameValidate() {
  if (campos[0].value.length < 3) {
    setError(0);
  } else {
    removeError(0);
  }
}

function emailValidate() {
  if (!emailRegex.test(campos[4].value)) {
    setError(4);
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

/*function passwordValidate() {
  if (senhaRegex.test(campos[5].value)) {
  setError(5);
  } else {
  removeError(5);
  }
  }*/
  function passwordValidate() {
    const senha = campos[5].value;
    let temDigito = false;
    let temEspecial = false;
    let temMaiuscula = false;
  
    // Verifica se a senha tem pelo menos 8 caracteres
    if (senha.length < 8) {
      removeError(5);
      return;
    }
  
    // Percorre todos os caracteres da senha
    for (let i = 0; i < senha.length; i++) {
      const caractere = senha[i];
  
      // Verifica se o caractere é um dígito numérico
      if (/\d/.test(caractere)) {
        temDigito = true;
      }
  
      // Verifica se o caractere é um caractere especial
      if (/[!@#$%&*]/.test(caractere)) {
        temEspecial = true;
      }
  
      // Verifica se o caractere é uma letra maiúscula
      if (/[A-Z]/.test(caractere)) {
        temMaiuscula = true;
      }
    }
  
    // Verifica se a senha tem pelo menos um dígito numérico, um caractere especial e uma letra maiúscula
    if (temDigito && temEspecial && temMaiuscula) {
      removeError(5);
    } else {
      setError(5);
    }
  }
  

  function passwordValidate() {
    var senha = campos[5].value;
    var confSenha = campos[6].value;
    
    if (senha !== confSenha) {
    setError(6);
    } else {
    removeError(5);
    removeError(6);
    }
    }
