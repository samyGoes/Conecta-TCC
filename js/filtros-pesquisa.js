// Capturar valores dos filtros
const pesquisa = document.querySelector('#searchBar');
const causaCheckboxes = document.querySelectorAll('.causeCheckbox');
const estadoSelect = document.querySelector('#stateSelect');
const cidadeSelect = document.querySelector('#citySelect');

let searchQuery = pesquisa.value.trim();
let selectedCausas = Array.from(causaCheckboxes)
  .filter(checkbox => checkbox.checked)
  .map(checkbox => checkbox.value);
let selectedEstado = estado.value;
let selectedCidade = cidadeSelect.value;
