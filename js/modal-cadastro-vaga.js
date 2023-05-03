// cria o elemento HTML do modal
const modal = document.createElement("div");
modal.id = "modal";
modal.innerHTML = `
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <div id="modal-content">
    <p>Cadastro realizado com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
  </div>
`;

// adiciona o modal como filho do body (ou de outro elemento HTML)
document.body.appendChild(modal);

//adiciona a tag style do modal
const style = document.createElement("style");
style.innerHTML = `
      #modal {
      position: fixed;
      bottom: 20px;
      right: 20px;
      box-shadow: #b4d8e6 3px 3px 4px 1px;
      z-index: 9999;
      transition: visibility 0s, opacity 0.5s ease;
      border: #4567a5 solid 1px;
      visibility: hidden;
      opacity: 0;
      border-radius: 0.5rem;
    }

    #modal-content {
      padding: 10px;
    }

    #modal.show {
      visibility: visible;
      opacity: 1;
    }

    p {
      font-family: Poppins, sans-serif;
      font-size: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 5px;
    }

    p>i {
      font-size: 1.3rem;
      color: green;
    }
    `;

document.head.appendChild(style);

// adiciona o listener de evento ao botão de cadastro
const btn = document.getElementById("cadastro-btn");

btn.addEventListener("click", function () {
    // assume que você tem algum código que realiza o cadastro aqui

    // depois que o cadastro é realizado com sucesso:
    modal.classList.add("show");

    // remove a classe 'show' após 1 segundo
    setTimeout(() => {
        modal.classList.remove("show");
    }, 1000);
});


