if(document.getElementById("showPassword")){
    let showPassword = document.getElementById("showPassword");
    let hidePassword = document.getElementById("hidePassword");
    let passwordInput = document.getElementById("password");
    showPassword.addEventListener("click", ()=>{
        showPassword.classList.add("d-none")
        hidePassword.classList.remove("d-none");
        passwordInput.setAttribute("type", "text");
    })
    hidePassword.addEventListener("click", ()=>{
        hidePassword.classList.add("d-none");
        showPassword.classList.remove("d-none");
        passwordInput.setAttribute("type", "password");
    })
}

