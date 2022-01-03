let btnModifMail = document.querySelector("#btnModifMail");
let btnValidModifMail = document.querySelector("#btnValidModifMail");
let divMail = document.querySelector("#email");
let divModificationMail = document.querySelector("#modificationMail");

btnModifMail.addEventListener("click", function(){
    divMail.classList.add("d-none");
    divModificationMail.classList.remove("d-none");
})