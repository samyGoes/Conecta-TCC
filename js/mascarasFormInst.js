//Mascáras Formulários
//Função telefones
function adicionarMascaraTelefone(idCampo) {
  const campo = document.querySelector(idCampo);

  campo.addEventListener('input', () => {
    let telefone = campo.value.replace(/\D/g, '');
    telefone = telefone.slice(0, 11);

    if (telefone.length === 10) {
      // É um telefone fixo
      telefone = telefone.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
    } else if (telefone.length === 11 && telefone[2] === '9') {
      // É um telefone celular com DDD
      telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    }

    campo.value = telefone;
  });
}

//Adicionando a máscara aos campos
adicionarMascaraTelefone('#telefone');
adicionarMascaraTelefone('#telefone2');


  const cnpjInput = document.querySelector('#cnpj');

    cnpjInput.addEventListener('input', () => {
    const cnpj = cnpjInput.value.replace(/\D/g, '');

    if (cnpj.length === 14) {
        cnpjInput.value = cnpj.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
    } else {
        cnpjInput.value = cnpj;
    }
});


//Máscara do CEP
function adicionarMascaraCep(idCampo) {
  const campo = document.querySelector(idCampo);

  campo.addEventListener('input', () => {
    let cep = campo.value.replace(/\D/g, '');
    cep = cep.slice(0, 8);

    cep = cep.replace(/(\d{5})(\d{3})/, '$1-$2');

    campo.value = cep;
  });
}

// Adicionando a máscara ao campo
adicionarMascaraCep('#cep');




  