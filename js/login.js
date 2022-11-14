let form=document.querySelector('form');
let field_email=form.querySelector('.field-email')
let field_password=form.querySelector('.field-password')
let error_icon_email=field_email.querySelector('.icon-err')
let error_icon_password=field_password.querySelector('.icon-err')
let icon_email=field_email.querySelector('.icon-normal')
let icon_password=field_password.querySelector('.icon-normal')
let msg_err_email=form.querySelector('.msg-err-email')
let msg_err_pass=form.querySelector('.msg-err-pass')
let btn_submit=form.querySelector('.btn_submit')
let input_email=field_email.querySelector('input')
let input_pass=field_password.querySelector('input')

form.onsubmit=(e)=>{
    if(input_email.value==''){
        e.preventDefault()
        msg_err_email.style.display="block"
        error_icon_email.style.display="block"
        field_email.style.border="1px solid red"
        icon_email.style.display="none"
    }else{
        checkEmail();
    }

    if(input_pass.value==''){
        e.preventDefault()
        msg_err_pass.style.display="block"
        error_icon_password.style.display="block"
        field_password.style.border="1px solid red"
        icon_password.style.display="none"
    }
    input_email.onkeyup=()=>{
        checkEmail()
    }
    input_pass.onkeyup=()=>{
        if(input_pass.value==""){
            e.preventDefault();
            error_icon_password.style.display="block"
            msg_err_pass.style.display="block"
            field_password.style.border="1px solid red"
            icon_password.style.display="none"
            
        }else{
            error_icon_password.style.display="none"
            msg_err_pass.style.display="none"
            field_password.style.border="1px solid rgb(178, 178, 178)"
            icon_password.style.display="block"
        }
    }
}

function checkEmail(){
    let pattern=/^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if(!input_email.value.match(pattern)){
        error_icon_email.style.display="block"
        field_email.style.border="1px solid red"
        icon_email.style.display="none"
        (input_email.value!='') 
            ? msg_err_email.innerHTML=`Email not match this pattern<span style="font-weight:bold">${pattern_email}</span>` 
            : 'Email cant be empty'
    }else{
        icon_email.style.display="block"
        icon_email.style.color="#03c04a"
        field_email.style.border="1px solid #03c04a"
        error_icon_email.style.display="none"
        msg_err_email.innerHTML='Email Valid'
        msg_err_email.style.color='#03c04a'//green
    }
}




