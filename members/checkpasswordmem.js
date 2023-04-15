//validating member_reg Form....
function checkpasswordmem(){ 
    
    var create_password  = document.forms["memreg"]["mempw"];
    var conform_password = document.forms["memreg"]["mempw_con"];
    
    // Selecting all error display elements....
    var pw_error = document.getElementById('pw_error_member');
    
    if (create_password.value === "" && conform_password.value === ""  ){ //if empty value...
        create_password.style.border = "1px solid red";
        conform_password.style.border = "1px solid red";
        pw_error.textContent = "Please Create A Password.";
        create_password.focus(); 
        return false;  
    }
    if (create_password.value !== conform_password.value  ){//check two fields are matched.... 
        create_password.style.border = "1px solid red";
        conform_password.style.border = "1px solid red";
        pw_error.textContent = "Password Not Matched.";
        create_password.focus(); 
        return false;  
    }
    return true;  
}
