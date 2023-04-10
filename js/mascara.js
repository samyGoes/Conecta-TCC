//Máscara Celular
const telefone = document.querySelector('#telefone1')

telefone.addEventListener('keypress', () => {
    let fone = telefone.value.length

    if(fone === 0)  
    {
        telefone.value += '(';
    } 
    else if(fone === 3)
    {
        telefone.value += ')';
    } 
    else if(fone === 9)
    {
        telefone.value += '-';
    }
})

//Máscara Celular
const telefone2 = document.querySelector('#telefone2')

telefone2.addEventListener('keypress', () => {
    let fone = telefone2.value.length

    if(fone === 0)  
    {
        telefone2.value += '(';
    } 
    else if (fone === 3)
    {
        telefone2.value += ')';
    } 
    else if(fone === 9)
    {
        telefone2.value += '-';
    }
})

 //marcara cpf
const c1 = document.querySelector('#cpf')

c1.addEventListener('keypress', () => {
    let cpf = c1.value.length

    if(cpf === 3 || cpf === 7) 
    {
        c1.value += '.';
    } 
    else if (cpf === 11) 
    {
        c1.value += '-';
    }
})

 //marcara cep
const c2 = document.querySelector('#cep')

c2.addEventListener('keypress', () => {
    let cep = c2.value.length

    if(cep === 5) 
    {
        c2.value += '-';
    }
})

 //marcara a data de nascimento
 const c3 = document.querySelector('#date');

 c3.addEventListener('keypress', () => 
 {
     let dataNasc = c3.value.length;
 
     if(dataNasc === 2 || dataNasc === 5)
     {
         c3.value += '/';
     }
 })
 

  //marcara CNPJ
  const c4 = document.querySelector('#cnpj');

  c4.addEventListener('keypress', () => 
  {
      let cnpj = c4.value.length;
  
      if(cnpj === 2 || cnpj  === 6)
      {
          c4.value += '.';
      }
      else if(cnpj === 10)
      {
          c4.value += '/';
      }
      else if (cnpj === 15)
      {
        c4.value += '-';
      }
  })

  