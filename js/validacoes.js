const formulario1 = document.getElementById('formulario');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
//const senhaRegex = /^(?=.*\d)(?=.*[!@#$%&*])(?=.*[A-Z]).{8,}$/;


function validateRequiredFields() {
  let allFieldsFilled = true;
  for (let i = 0; i < campos.length; i++) {
    if (campos[i].value.trim() === '') {
      setError(i);
      allFieldsFilled = false;
    } else {
      removeError(i);
    }
  }
  return allFieldsFilled;
}

function setError(index) {
  campos[index].style.borderBottom = '1px solid #e63636';
  spans[index].style.display= 'block';

}

function removeError(index) {
  campos[index].style.borderBottom = '';
  spans[index].style.display= '';

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
    setError(4);
  } else {
    removeError(4);
  }
}

function validateCPF(cpf) {
 
  if (!/^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(cpf)) {
    return false;
  }

  // Remove punctuation marks from the input
  cpf = cpf.replace(/[^\d]+/g, '');


  if (/^(\d)\1{10}$/.test(cpf)) {
    return false;
  }


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

function validateCNPJ(cnpj) {
 
  if (!/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/.test(cnpj)) {
    return false;
  }

  // Remove punctuation marks from the input
  cnpj = cnpj.replace(/[^\d]+/g, '');

  if (/^(\d)\1{13}$/.test(cnpj)) {
    return false;
  }

  let sum = 0;
  let factor = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
  for (let i = 0; i < 12; i++) {
    sum += parseInt(cnpj.charAt(i)) * factor[i+1];
  }
  let remainder = sum % 11;
  let digit1 = remainder < 2 ? 0 : 11 - remainder;

  sum = 0;
  factor = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
  for (let i = 0; i < 13; i++) {
    sum += parseInt(cnpj.charAt(i)) * factor[i];
  }
  remainder = sum % 11;
  let digit2 = remainder < 2 ? 0 : 11 - remainder;

  if (parseInt(cnpj.charAt(12)) !== digit1 || parseInt(cnpj.charAt(13)) !== digit2) {
    return false;
  }

  return true;
}

function cnpjValidate() {
  const cnpj = campos[1].value;
  let message = '';

  if (!validateCNPJ(cnpj)) {
    message = 'CNPJ inválido';
  }

  if (message !== '') {
    setError(1);
  } else {
    removeError(1);
  }
}



  function passwordValidate() {
    const senha = campos[5].value;
    const digitoRegex = /\d/;
    const especialRegex = /[!@#$%&*]/;
    const maiusculaRegex = /[A-Z]/;
    let isValid = true;
    
    // Verifica se a senha tem pelo menos 8 caracteres
    if (senha.length < 8) {
      isValid = false;
    }
  
    // Verifica se a senha contém pelo menos um dígito numérico, um caractere especial e uma letra maiúscula
    if (!digitoRegex.test(senha) || !especialRegex.test(senha) || !maiusculaRegex.test(senha)) {
      isValid = false;
    }
  
    // Se a senha não for válida, exibe mensagem de erro
    if (!isValid) {
      setError(5);
    } else {
      removeError(5);
    }
  }
  
  function confirmPassword() {
    const senha = campos[5].value;
    const confSenha = campos[6].value;
  
    // Verifica se as senhas são iguais
    if (senha !== confSenha) {
      setError(6);
    } else {
      removeError(6);
    }
  }
  
