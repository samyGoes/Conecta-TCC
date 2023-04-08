const ulrUF = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados'
const cidade = document.getElementById('cidade')
const uf = document.getElementById('uf')

uf.addEventListener('change', async function(){
    const ulrCidades = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+uf.value+'/municipios'
    const request = await fetch(ulrCidades)
    const response = await request.json()

    let options = ''
    response.forEach(function(cidades) {
        options += '<option>' + cidades.nome+ '</option>'
    })
    cidade.innerHTML = options
})