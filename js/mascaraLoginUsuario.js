//função que retorne o número de caracteres digitados pelo usuário
  const comMascara = (valor, pattern) => {
    let i = 0;
    const v = valor.replace(/\D/g, "");
    return pattern.replace(/#/g, () => v[i++] || "");
  }

  //máscara do cpf
  const maskCPF = (cpf) => {
    return comMascara(cpf, "###.###.###-##");
  }

  //máscara do cnpj
  const maskCNPJ = (cnpj) => {
    return comMascara(cnpj, "##.###.###/####-##");
  }

  //implementando a máscara correta de acordo com o dado digitado pelo usuário
  const documentoInput = document.querySelector('#login');

  documentoInput.addEventListener('input', () => {
    const documento = documentoInput.value.replace(/\D/g, '');

    if (documento.length === 11) {
      // É um CPF
      documentoInput.value = maskCPF(documento);
    } else if (documento.length === 14) {
      // É um CNPJ
      documentoInput.value = maskCNPJ(documento);
    } else {
      // Valor inválido
      documentoInput.value = documento;
    }
  });