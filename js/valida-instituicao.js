const formulario1 = document.getElementById('formulario');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
const foneRegex = /^\(\d{2}\)\s*\d{4,5}-?\d{4}$/;
const dateRegex = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$/;
//const senhaRegex = /^(?=.*\d)(?=.*[!@#$%&*])(?=.*[A-Z]).{8,}$/;
const avisoErro = document.createElement("span");

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

  function setError(index, message) {
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
    campos[index].style.borderBottom = '';
    spans[index].style.display= 'none';

  }



function nameValidate() {
  if (campos[0].value.length < 3) {
    setError(0, 'Nome deve ter pelo menos 3 caracteres');
  } else {
    removeError(0);
  }
}


function emailValidate() {
  if (!emailRegex.test(campos[4].value)) {
    setError(4, 'Email invalido');
  } else {
    removeError(4);
  }
}

function foneValidate() {
  if (!foneRegex.test(campos[1].value)) {
    setError(1, 'Telefone invalido');
  } else {
    removeError(1);
  }
}
function foneOpcValidate() {
  if (!foneRegex.test(campos[2].value)) {
    setError(2, 'Telefone invalido');
  } else {
    removeError(2);
  }
}


function validateCNPJ(cnpj) {
 
  cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
}

function cnpjValidate() {
    const cnpj = campos[3].value;
  
    if (!validateCNPJ(cnpj)) {
      setError(3, 'CNPJ Inválido');
    } else {
      removeError(3);
    }
}



function passwordValidate() {
  const senha = campos[5].value;
  const digitRegex = /\d/;
  const specialRegex = /[!@#$%&*]/;
  const upperRegex = /[A-Z]/;

  if (senha.length < 6) {
    setError(5, 'A senha deve ter pelo menos 6 caracteres');
    return;
  }

  if (!digitRegex.test(senha)) {
    setError(5, 'A senha deve conter pelo menos um número');
    return;
  }

  if (!specialRegex.test(senha)) {
    setError(5, 'A senha deve conter pelo menos um caractere especial (!@#$%&*)');
    return;
  }

  if (!upperRegex.test(senha)) {
    setError(5, 'A senha deve conter pelo menos uma letra maiúscula');
    return;
  }

  removeError(5);
}

  
  function confirmPassword() {
    const senha = campos[5].value;
    const confSenha = campos[6].value;
  
    // Verifica se as senhas são iguais
    if (senha !== confSenha) {
      setError(6, 'As senhas não coincidem');
    } else {
      removeError(6);
    }
  }
 
// Adiciona um evento de clique ao botão "CADASTRAR"

  