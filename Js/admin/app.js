// alert //

const alert = document.getElementById("alert");
const closeAlert = document.getElementById("close-alert");

closeAlert.addEventListener("click", function (){
    alert.style.display = "none";
})