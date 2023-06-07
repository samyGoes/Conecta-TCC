function readImage() 
{ 
    var preview = document.querySelector(".div-image");
    //preview.innerHTML = "";

    if (this.files && this.files.length > 0) 
    {
        for(var i = 0; i < this.files.length; i++)
        {
            var file = this.files[i];
            var leitor = new FileReader();

            leitor.onload = function(e) 
            {   
                var boxImg = document.createElement("div");
                boxImg.classList.add("box-img-foto");
                preview.appendChild(boxImg);

                var img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("img-foto");
                boxImg.appendChild(img);
            };

            leitor.readAsDataURL(file);  
        }              
    }
}
document.getElementById("foto").addEventListener("change", readImage, false);