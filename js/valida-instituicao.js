const formulario1 = document.getElementById('formulario-instituicao');
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
    setError(0, 'Mínimo de 3 caracteres');
    return false;

  } else {
    removeError(0);
    return true;
  }
}


function emailValidate() {
  if (!emailRegex.test(campos[4].value)) {
    setError(4, 'Email invalido');
    return false;

  } else {
    removeError(4);
    return true;
  }
}

// function foneValidate() {
//   if (!foneRegex.test(campos[1].value)) {
//     setError(1, 'Telefone invalido');
//     return false;

//   } else {
//     removeError(1);
//     return true;
//   }
// }
// function foneOpcValidate() {
//   if (!foneRegex.test(campos[2].value)) {
//     setError(2, 'Telefone invalido');
//     return false;

//   } else {
//     removeError(2);
//     return true;
//   }
// }


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
      return false;
      
    } else {
      removeError(3);
      return true;
    }
}



function passwordValidate() {
  const senha = campos[5].value;
  const digitRegex = /\d/;
  const specialRegex = /[!@#$%&*]/;
  const upperRegex = /[A-Z]/;

  if (senha.length < 8) {
    setError(5, 'A senha deve ter pelo menos 8 caracteres');
    return false;
  }

  if (!digitRegex.test(senha)) {
    setError(5, 'A senha deve conter pelo menos um número');
    return false;
  }

  if (!specialRegex.test(senha)) {
    setError(5, 'A senha deve conter pelo menos um caractere especial (!@#$%&*)');
    return false;
  }

  if (!upperRegex.test(senha)) {
    setError(5, 'A senha deve conter pelo menos uma letra maiúscula');
    return false;
  }

  removeError(5);
  return true;
}

  
  function confirmPassword() {
    const senha = campos[5].value;
    const confSenha = campos[6].value;
  
    // Verifica se as senhas são iguais
    if (senha !== confSenha) {
      setError(6, 'As senhas não coincidem');
      return false;
      
    } else {
      removeError(6);
      return true;
    }
  }
 
  formulario1.addEventListener('submit', function(event) {
    // Previne o envio do formulário por padrão
    event.preventDefault();
    
    // Verifica se os campos obrigatórios foram preenchidos corretamente
    const nameValid = nameValidate();
    const cnpjValid = cnpjValidate();
    const emailValid = emailValidate();
    const passwordValid = passwordValidate();
    const confirmPasswordValid = confirmPassword();
  
    if (nameValid && cnpjValid && emailValid && passwordValid && confirmPasswordValid) {
      // Se todos os campos estiverem válidos, envia o formulário
      formulario1.submit();
    } else {
      // Caso contrário, exibe uma mensagem de erro e destaca os campos com err
      nameValidate();
      cnpjValidate()
      emailValidate();
      passwordValidate();
      confirmPassword();
    }
  });
  

  