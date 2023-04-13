var openModal = document.getElementById('open-modal');
var modal = document.getElementById('modal');
var closeModal = document.getElementsByClassName('close')[0];

openModal.onclick = function () {
    modal.style.display = "block";
}

closeModal.onclick = function () {
    modal.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}