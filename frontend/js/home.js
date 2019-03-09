function validateLogin() {
    if(document.loginForm.username.value.empty()){
        document.getElementById("error_login").innerText = "Please, enter username or email!";
        return false;
    }
    if(document.loginForm.password.value.empty()){
        document.getElementById("error_login").innerText = "Please, enter password!";
        return false;
    }
    document.getElementById("error_login").innerText = "";
    return true;
}