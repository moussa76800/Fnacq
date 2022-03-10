const newPassword=document.querySelector("#newPassword");
const confirmNewPassword=document.querySelector("#confirmNewPassword");

newPassword.addEventListener("keyup",function(){
    verifPassword();
})   


confirmNewPassword.addEventListener("keyup",function(){
    verifPassword();
})


 function verifPassword(){
if(newPassword.value===confirmNewPassword.value){
document.querySelector("#btnPass").disabled=false;
document.querySelector("#erreur").classList.add("d-none");

}else { 
    document.querySelector("#btnPass").disabled=true;
    document.querySelector("#erreur").classList.remove("d-none");
}
 }