//Mascáras Formulários

//CEP
function adicionarMascaraCep(idCampo) {
    const campo = document.querySelector(idCampo);
  
    campo.addEventListener('input', () => {
      let cep = campo.value.replace(/\D/g, '');
      cep = cep.slice(0, 8);
  
      cep = cep.replace(/(\d{5})(\d{3})/, '$1-$2');
  
      campo.value = cep;
    });
  }
  

  //telefones
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

  //CPF
  function adicionarMascaraCpf(idCampo) {
    const campo = document.querySelector(idCampo);
  
    campo.addEventListener('input', () => {
      let cpf = campo.value.replace(/\D/g, '');
      cpf = cpf.slice(0, 11);
  
      cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
  
      campo.value = cpf;
    });
  }

  //CNPJ
  function adicionarMascaraCnpj(idCampo) {
    const campo = document.querySelector(idCampo);
  
    campo.addEventListener('input', () => {
      let cnpj = campo.value.replace(/\D/g, '');
      cnpj = cnpj.slice(0, 14);
  
      if (cnpj.length === 14) {
        cnpj = cnpj.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
      }
  
      campo.value = cnpj;
    });
  }
  
  //hora
  function adicionarMascaraHorario(idCampo) {
    const campo = document.querySelector(idCampo);
  
    campo.addEventListener('input', () => {
      let horario = campo.value.replace(/\D/g, '');
      horario = horario.slice(0, 4);
  
      if (horario.length >= 2) {
        horario = horario.replace(/^(\d{2})(\d{0,2})/, '$1:$2');
      }
  
      campo.value = horario;
    });
  }
  