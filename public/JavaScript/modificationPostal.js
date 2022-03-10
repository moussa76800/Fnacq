const oldPostal=document.querySelector("#oldPostal");
const newPostal=document.querySelector("#newPostal");

oldPostal.addEventListener("keyup",function(){
    verifPostal();
})   


newPostal.addEventListener("keyup",function(){
    verifPostal();
})


 function verifPostal(){
if( oldPostal.value!=newPostal.value){
document.querySelector("#btnPass").disabled=false;
document.querySelector("#erreur").classList.add("d-none");

}else { 
    document.querySelector("#btnPass").disabled=true;
    document.querySelector("#erreur").classList.remove("d-none");
}
 }