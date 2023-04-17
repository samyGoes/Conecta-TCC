const celularInput = document.querySelector('#telefone');

    celularInput.addEventListener('input', () => {
    let celular = celularInput.value.replace(/\D/g, ''); // remove tudo que não é número
    celular = celular.slice(0, 11); // limita o tamanho máximo para 11 dígitos (DDD + número do celular)

    if (celular.length > 2 && celular.length < 7) {
        celular = celular.replace(/(\d{2})(\d+)/, '($1) $2'); // adiciona o DDD
    } else if (celular.length >= 7) {
        celular = celular.replace(/(\d{2})(\d{4,5})(\d{4})/, '($1) $2-$3'); // adiciona o DDD e formata o número do celular
    }

    celularInput.value = celular; // atualiza o valor do input com a máscara
});



//função que retorne o número de caracteres digitados pelo usuário
    const comMascara2 = (valor, pattern) => {
    let i = 0;
    const v = valor.replace(/\D/g, "");
    return pattern.replace(/#/g, () => v[i++] || "");
  }
  
  //implementando a máscara correta de acordo com o tipo de telefone
  const telefoneInput2 = document.querySelector('#telefone2');
  
  telefoneInput2.addEventListener('input', () => {
    const telefone = telefoneInput2.value.replace(/\D/g, '');
  
    if (telefone.length === 10) {
      // É um telefone fixo
      telefoneInput2.value = comMascara2(telefone, "(##) ####-####");
    } else if (telefone.length === 11 && telefone[2] === '9') {
      // É um telefone celular com DDD
      telefoneInput2.value = comMascara2(telefone, "(##) #####-####");
    } else {
      // Valor inválido ou incompleto
      telefoneInput2.value = telefone;
    }
  });

  const cnpjInput = document.querySelector('#cnpj');

    cnpjInput.addEventListener('input', () => {
    const cnpj = cnpjInput.value.replace(/\D/g, '');

    if (cnpj.length === 14) {
        cnpjInput.value = cnpj.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
    } else {
        cnpjInput.value = cnpj;
    }
});



  