const formulario1 = document.getElementById('formulario');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
const foneRegex = /^(\(\d{2}\)\s*|\d{2}\s*)?\d{4,5}(-|\s)?\d{4}$/;
const dateRegex = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$/;

//const senhaRegex = /^(?=.*\d)(?=.*[!@#$%&*])(?=.*[A-Z]).{8,}$/;

function validateRequiredFields() {
  console.log('validateRequiredFields');
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

  function setError(index, message) {
    console.log('setError');
    campos[index].style.borderBottom = '1px solid #e63636';
    spans[index].textContent = message;
    spans[index].style.display = 'block';
    spans[index].style.position = "absolute";
    spans[index].style.top = "4.6rem";
    spans[index].style.fontFamily = "poppins, sans-serif";
    spans[index].style.fontSize = "12px";
    spans[index].style.fontWeight = "400";
    spans[index].style.color = "red";
    
  }

  function removeError(index) {
    console.log('removeError');
    campos[index].style.borderBottom = '';
    spans[index].style.display= 'none';

  }



function nameValidate() {
  console.log('nameValidate');
  if (campos[0].value.length < 3) {
    setError(0, 'Nome deve ter pelo menos 3 caracteres');
  } else {
    removeError(0);
  }
}

function dateValidate() {
  console.log('dateValidate');
  if (!dateRegex.test(campos[1].value)) {
    setError(1, 'Data de nascimento inválida');
  } else {
    removeError(1);
  }
}

function emailValidate() {
  console.log('emailValidate');
  if (!emailRegex.test(campos[5].value)) {
    setError(5, 'Email invalido');
  } else {
    removeError(5);
  }
}

function foneValidate() {
  console.log('foneValidate');
  
  if (!foneRegex.test(campos[3].value)) {
    setError(3, 'Telefone invalido');
  } else {
    removeError(3);
  }
}
function foneOpcValidate() {
  console.log('foneOpcValidate');
  if (!foneRegex.test(campos[4].value)) {
    setError(4, 'Telefone invalido');
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
  console.log('cpfValidate');
  const cpf = campos[2].value;

  if (!validateCPF(cpf)) {
    setError(2, 'Cpf Invalido');
  } else {
    removeError(2);
  }
}

function passwordValidate() {
  console.log('passwordValidate');
  const senha = campos[6].value;
  const digitRegex = /\d/;
  const specialRegex = /[!@#$%&*]/;
  const upperRegex = /[A-Z]/;

  if (senha.length < 6) {
    setError(6, 'A senha deve ter pelo menos 6 caracteres');
    return;
  }

  if (!digitRegex.test(senha)) {
    setError(6, 'A senha deve conter pelo menos um número');
    return;
  }

  if (!specialRegex.test(senha)) {
    setError(6, 'A senha deve conter pelo menos um caractere especial (!@#$%&*)');
    return;
  }

  if (!upperRegex.test(senha)) {
    setError(6, 'A senha deve conter pelo menos uma letra maiúscula');
    return;
  }

  removeError(6);
}

  
  function confirmPassword() {
    console.log('confirmPassword');
    const senha = campos[6].value;
    const confSenha = campos[7].value;
  
    // Verifica se as senhas são iguais
    if (senha !== confSenha) {
      setError(7, 'As senhas não coincidem');
    } else {
      removeError(7);
    }
  }
  

  formulario1.addEventListener('submit', function(event) {
    // Previne o envio do formulário por padrão
    event.preventDefault();
    
    // Cria uma lista vazia de erros
    var errors = [];
  
    // Verifica se os campos obrigatórios foram preenchidos corretamente
    if (!validateRequiredFields()) {
      errors.push("Preencha todos os campos obrigatórios.");
    }
    if (!nameValidate()) {
      errors.push("Nome inválido. Digite apenas letras.");
    }
    if (!dateValidate()) {
      errors.push("Data inválida. Digite uma data no formato dd/mm/aaaa.");
    }
    if (!cpfValidate()) {
      errors.push("CPF inválido. Digite apenas números.");
    }
    if (!foneValidate()) {
      errors.push("Telefone inválido. Digite um telefone no formato (xx) xxxxx-xxxx.");
    }
    if (!emailValidate()) {
      errors.push("E-mail inválido. Digite um e-mail válido.");
    }
    if (!passwordValidate()) {
      errors.push("Senha inválida. A senha deve ter pelo menos 8 caracteres, com pelo menos uma letra maiúscula, uma letra minúscula, um número e um caractere especial.");
    }
    if (!confirmPassword()) {
      errors.push("As senhas não coincidem. Digite as senhas novamente.");
    }
  
    // Se houver erros, exibe um alerta com todos os erros encontrados
    if (errors.length > 0) {
      var message = "Os seguintes erros foram encontrados:\n\n" + errors.join("\n");
      alert(message);
    } else {
      // Se todos os campos estiverem válidos, envia o formulário
      formulario1.submit();
    }
  });
  var btnCadastrar = document.getElementById("btnCadastrar");
  btnCadastrar.addEventListener("click", function() {
    formulario1.submit();
  });
    
    /*
    // Se houver campos inválidos, exibe o modal de verificação
    var modalForm = document.getElementById("modal-form");
    modalForm.style.display = "block";
    
    // Quando o usuário clicar no botão "FECHAR", o modal será fechado
    var modalFecharBtn = document.getElementById("btn-fechar");
    modalFecharBtn.onclick = function() {
      modalForm.style.display = "none";
    }
    */


  