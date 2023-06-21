const formulario1 = document.getElementById('formulario-voluntario');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const nameRegex = /^[a-zA-ZÀ-ÿ\s'´`~]{3,}$/;
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
/*const foneRegex = /^\(\d{2}\)\s*\d{4,5}-?\d{4}$/;
const dateRegex = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$/;*/

// Função para imprimir os valores dos campos do formulário no console
function printFormData() {
  const formData = [];
  campos.forEach((campo, index) => {
    formData.push(campo.value);
  });
  console.log(formData);
}

// Ouvinte de evento "input" para cada campo do formulário
campos.forEach((campo) => {
  campo.addEventListener('input', printFormData);
});

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
    setError(0, 'Mínimo de três caracteres');
    return false;
    } else if (!nameRegex.test(campos[0].value)) {
    setError(0, 'Insira apenas letras');
    return false;
    } else {
    removeError(0);
    return true;
    }
}


// function dateValidate() {
//     console.log('dateValidate');
//     if (!dateRegex.test(campos[1].value)) {
//     setError(1, 'Data de nascimento inválida');
//     return false;
//     } else {
//     removeError(1);
//     return true;
//     }
// }


function validateCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // remove todos os caracteres não numéricos
    if (cpf.length !== 11) return false;

    let sum = 0;
    for (let i = 0; i < 9; i++) {
    sum += parseInt(cpf.charAt(i)) * (10 - i);
    }
    let remainder = (sum * 10) % 11;
    let digit1 = remainder === 10 ? 0 : remainder;

    sum = 0;
    for (let i = 0; i < 10; i++) {
    sum += parseInt(cpf.charAt(i)) * (11 - i);
    }
    remainder = (sum * 10) % 11;
    let digit2 = remainder === 10 ? 0 : remainder;

    return (parseInt(cpf.charAt(9)) === digit1 && parseInt(cpf.charAt(10)) === digit2);
}


function cpfValidate() {
    console.log('cpfValidate');
    const cpf = campos[2].value;

    if (!validateCPF(cpf)) {
    setError(2, 'Cpf Inválido');
    return false;
    } else {
    removeError(2);
    return true;
    }
}

// function foneValidate() {
//     console.log('foneValidate');
    
//     if (!foneRegex.test(campos[3].value)) {
//     setError(3, 'Telefone inválido');
//     return false;
//     } else {
//     removeError(3);
//     return true;
//     }
// }

// function foneOpcValidate() {
//     console.log('foneOpcValidate');
//     if (!foneRegex.test(campos[4].value)) {
//     setError(4, 'Telefone inválido');
//     return false;
//     } else {
//     removeError(4);
//     return true;
//     }
// }

function emailValidate() {
    console.log('emailValidate');
    if (!emailRegex.test(campos[5].value)) {
    setError(3, 'Email inválido');
    return false;
    } else {
    removeError(3);
    return true;
    }
}


function passwordValidate() {
    console.log('passwordValidate');
    const senha = campos[6].value;
    const digitRegex = /\d/;
    const specialRegex = /[!@#$%&*]/;
    const upperRegex = /[A-Z]/;

    if (senha.length < 8) {
    setError(6, 'A senha deve ter pelo menos 8 caracteres');
    return false;
    }

    if (!digitRegex.test(senha)) {
    setError(6, 'A senha deve conter pelo menos um número');
    return false;
    }

    if (!specialRegex.test(senha)) {
    setError(6, 'A senha deve conter pelo menos um caractere especial (!@#$%&*)');
    return false;
    }

    if (!upperRegex.test(senha)) {
    setError(6, 'A senha deve conter pelo menos uma letra maiúscula');
    return false;
    }

    removeError(6);
    return true;
}

    
    function confirmPassword() {
    console.log('confirmPassword');
    const senha = campos[6].value;
    const confSenha = campos[7].value;
    
    // Verifica se as senhas são iguais
    if (senha !== confSenha) {
        setError(7, 'As senhas não coincidem');
        return false;
    } else {
        removeError(7);
        return true;
    }
    }

    function cepValidate() {
      if (campos[8].value.trim() === '') {
        setError(8, 'Campo obrigatório');
        return false;
      } else {
        removeError(8);
        return true;
      }
    }

    /*function numLogValidate() {
      if (campos[9].value.trim() === '') {
        setError(9, 'Campo obrigatório');
        return false;
      } else {
        removeError(9);
        return true;
      }
    }

    function logradouroValidate() {
      if (campos[10].value.trim() === '') {
        setError(10, 'Campo obrigatório');
        return false;
      } else {
        removeError(10);
        return true;
      }
    }

    function bairroValidate() {
      if (campos[11].value.trim() === '') {
        setError(11, 'Campo obrigatório');
        return false;
      } else {
        removeError(11);
        return true;
      }
    }

    function estadoValidate() {
      if (campos[13].value.trim() === '') {
        setError(13, 'Campo obrigatório');
        return false;
      } else {
        removeError(13);
        return true;
      }
    }

    function cidadeValidate() {
      if (campos[14].value.trim() === '') {
        setError(14, 'Campo obrigatório');
        return false;
      } else {
        removeError(14);
        return true;
      }
    }

    function paisValidate() {
      if (campos[15].value.trim() === '') {
        setError(15, 'Campo obrigatório');
        return false;
      } else {
        removeError(15);
        return true;
      }
    }*/


    formulario1.addEventListener('submit', function(event) {
        // Previne o envio do formulário por padrão
        event.preventDefault();
        
        // Verifica se os campos obrigatórios foram preenchidos corretamente
        const nameValid = nameValidate();
        const cpfValid = cpfValidate();
        const emailValid = emailValidate();
        const passwordValid = passwordValidate();
        const confirmPasswordValid = confirmPassword();

      
       
      
        if (nameValid && cpfValid  && emailValid && passwordValid && confirmPasswordValid) {
          // Se todos os campos estiverem válidos, envia o formulário
          formulario1.submit();
        } else {
          // Caso contrário, exibe uma mensagem de erro e destaca os campos com erro
          nameValidate();
          cpfValidate();
          emailValidate();
          passwordValidate();
          confirmPassword();
        }
      });
      