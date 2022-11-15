let form_signup=document.querySelector('form')
let field_first=form_signup.querySelector('.parent-area-first')
let field_last=form_signup.querySelector('.parent-area-last')
let field_email=form_signup.querySelector('.parent-area-email')
let field_call=form_signup.querySelector('.parent-area-call')
let field_pass=form_signup.querySelector('.parent-area-pass')
let field_confirm=form_signup.querySelector('.parent-area-confirm')
let btn_submit_signup=form_signup.querySelector('.signup-btn-submit')
let password_input=form_signup.querySelector('.password')
let password_confirm_input=form_signup.querySelector('.password_confirm')
let first_input=form_signup.querySelector('.first_name')
let last_input=form_signup.querySelector('.last_name')
let email_input=form_signup.querySelector('.email')
let phone_input=form_signup.querySelector('.phone')

let pattern_email='abc@gmail.com'


document.querySelector('.icon-eye').addEventListener('click',()=>{
    if(password_input.type=="password"){
        password_input.type="text";
        document.querySelector('.icon-eye').style.color="#000"
    }else{
        password_input.type="password";
        document.querySelector('.icon-eye').style.color="rgb(203, 203, 203)"
    }
})

form_signup.onsubmit=(e)=>{
    if(first_input.value==''){
        Valid_Failed(e,first_input,field_first)
    }else{
        if(first_input.value.length <=3 || first_input.value.length > 10){
            e.preventDefault()
            field_first.querySelector('span').innerHTML='first name at least 3 character and at greater 10 character'
            field_first.querySelector('span').style.color='red'
            field_first.querySelector('span').style.display="block"
            field_first.querySelector('.error-icon').style.display="block"
            first_input.style.border="1px solid red"
            field_first.querySelector('.icon').style.display="none"
            
        }else{
            check_Name()
        }
    }
    first_input.onkeyup=()=>{
        if(first_input.value==''){
            field_first.querySelector('span').innerHTML='first name cant be empty'
        }else{
            if(first_input.value.length <=3 || first_input.value.length > 10){
                field_first.querySelector('span').innerHTML='first name at least 3 character and at greater 10 character'
                field_first.querySelector('span').style.color='red'
                field_first.querySelector('.error-icon').style.display="block"
                first_input.style.border="1px solid red"
                field_first.querySelector('.icon').style.display="none"
                
            }else{
                check_Name(e,first_input,field_first)
            }
        }
    }
    /////////////////////////////////////////////////:
    ////////////////////////////////////////////////
    if(last_input.value==''){
        Valid_Failed(e,last_input,field_last)
    }else{
        if(last_input.value.length <=3 || last_input.value.length > 10){
            e.preventDefault()
            field_last.querySelector('span').innerHTML='first name at least 3 character and at greater 10 character'
            field_last.querySelector('span').style.color='red'
            field_last.querySelector('span').style.display="block"
            field_last.querySelector('.error-icon').style.display="block"
            last_input.style.border="1px solid red"
            field_last.querySelector('.icon').style.display="none"
            
        }else{
            check_last()
        }
    }
    last_input.onkeyup=()=>{
        if(last_input.value==''){
            field_last.querySelector('span').innerHTML='first name cant be empty'
        }else{
            if(last_input.value.length <=3 || last_input.value.length > 10){
                field_last.querySelector('span').innerHTML='first name at least 3 character and at greater 10 character'
                field_last.querySelector('span').style.color='red'
                field_last.querySelector('.error-icon').style.display="block"
                last_input.style.border="1px solid red"
                field_last.querySelector('.icon').style.display="none"
                
            }else{
                check_last(e,last_input,field_last)
            }
        }
    }
    ///////////////////////////////////////////////////
    ///////////////////////////////////////////////////
    if(email_input.value==''){
        Valid_Failed(e,email_input,field_email)
    }else{
        check_Email(e,email_input,field_email);
    }
    email_input.onkeyup=()=>{
        if(email_input.value==""){
            email_input.style.border='1px solid red'
            field_email.querySelector('span').display='block'
            field_email.querySelector('span').innerHTML='Email Cant be Empty'
            field_email.querySelector('span').style.color='red'
            field_email.querySelector('.error-icon').style.display="block"
            field_email.querySelector('.icon').style.display="none"
        }else{check_Email(e,email_input,field_email)}
    }
    ////////////////////////////////////////////////////
    ////////////////////////////////////////////////////
    if(phone_input.value==''){
        Valid_Failed(e,phone_input,field_call)
    }else{
        check_phone(e,phone_input,field_call);
    }
    phone_input.onkeyup=()=>{
        if(phone_input.value==""){
            phone_input.style.border='1px solid red'
            field_call.querySelector('span').display='block'
            field_call.querySelector('span').innerHTML='Phone Number Cant be Empty'
            field_call.querySelector('span').style.color='red'
            field_call.querySelector('.error-icon').style.display="block"
            field_call.querySelector('.icon').style.display="none"
        }else{check_phone(e,phone_input,field_call)}
    }
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////
    if(password_input.value==''){
        Valid_Failed(e,password_input,field_pass)
    }else{
        if(password_input.value.length < 4){
            Valid_Failed(e,password_input,field_pass)
            field_pass.querySelector('span').innerHTML='Password At Leass 5 Character'
        }else if(password_input.value.length > 12){
            Valid_Failed(e,password_input,field_pass)
            field_pass.querySelector('span').innerHTML='Password At Max 12 Character'
        }else{
            check_password(e,password_input,field_pass)
        }
    }
    password_input.onkeyup=()=>{
        if(password_input.value==''){
            Valid_Failed(e,password_input,field_pass)

        }else{
            if(password_input.value.length < 4){
                Valid_Failed(e,password_input,field_pass)
                field_pass.querySelector('span').innerHTML='Password At Leass 5 Character'
            }else if(password_input.value.length > 12){
                Valid_Failed(e,password_input,field_pass)
                field_pass.querySelector('span').innerHTML='Password At Max 12 Character'
            }else{
                check_password(e,password_input,field_pass)
            }
        }
    }
    //////////////////////////////////////////////////////
    /////////////////////////////////////////////////////
    if(password_confirm_input.value==''){
        Valid_Failed(e,password_confirm_input,field_confirm)
        field_confirm.querySelector('span').innerHTML='Password confirm Cant be Empty'
    }else{
        if(password_confirm_input.value!=password_input.value){
            Valid_Failed(e,password_confirm_input,field_confirm)
            password_confirm_input.value !="" ? field_confirm.querySelector('span').innerHTML='Password is not match' : 'Password Cant be Empty'
        }
        else{
            Valid_success(password_confirm_input,field_confirm)
            field_confirm.querySelector('span').innerHTML='Password is match'
            field_confirm.querySelector('span').style.color='green'
            field_confirm.querySelector('.icon').style.color="green"
        }
    }
    password_confirm_input.onkeyup=()=>{
        if(password_confirm_input.value==''){
            Valid_Failed(e,password_confirm_input,field_confirm)
        }else{
            if(password_confirm_input.value!=password_input.value){
                Valid_Failed(e,password_confirm_input,field_confirm)
                password_confirm_input.value !="" ? field_confirm.querySelector('span').innerHTML='Password is not match' : 'Password Cant be Empty'
               
            }
            else{
                Valid_success(password_confirm_input,field_confirm)
                field_confirm.querySelector('span').innerHTML='Password is match'
                field_confirm.querySelector('span').style.color='green'
                field_confirm.querySelector('.icon').style.color="green"
            }
        }
    }

}









function Valid_Failed(e,input,field){
    e.preventDefault()
    input.style.border="1px solid red"
    field.querySelector('.error-icon').style.display="block"
    field.querySelector('span').style.display="block"
    field.querySelector('span').style.color="red"
    field.querySelector('.icon').style.display="none"
}
function Valid_success(input,field){
    input.style.border="1px solid green"
    field.querySelector('.error-icon').style.display="none"
    field.querySelector('span').style.display="block"
    field.querySelector('.icon').style.display="block"
}
function check_Name(e,input,field){
    let pattern=/[a-zA-Z]/;
    let pattern_number=/[0-9]/;
    if(!first_input.value.match(pattern) || first_input.value.match(pattern_number)){
        Valid_Failed(e,input,field)
    }else{
        Valid_success(first_input,field_first)
        field_first.querySelector('span').innerHTML='Valid First Name'
        field_first.querySelector('span').style.color='green'
        field_first.querySelector('.icon').style.color='green'
        field_first.querySelector('.icon').style.display="block"
        
    }
}
function check_last(e,input,field){
    let pattern=/[a-zA-Z]/;
    let pattern_number=/[0-9]/;
    if(!last_input.value.match(pattern) || last_input.value.match(pattern_number)){
        Valid_Failed(e,input,field)
    }else{
        Valid_success(last_input,field_first)
        field_last.querySelector('span').innerHTML='Valid Last Name'
        field_last.querySelector('span').style.color='green'
        field_last.querySelector('.icon').style.color='green'
        field_last.querySelector('.icon').style.display="block"
        field_last.querySelector('.error-icon').style.display="none"
        
    }
}
function check_Email(e,input,field){
    let pattern=/^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if(!email_input.value.match(pattern)){
        Valid_Failed(e,input,field)
        field_email.querySelector('span').innerHTML=`email not match <strong>${pattern_email}</strong>`

    }else{
        Valid_success(email_input,field_email)
        field_email.querySelector('span').innerHTML='Email is valid'
        field_email.querySelector('span').style.color='green'
        field_email.querySelector('.icon').style.color='green'
    }
}
function check_phone(e,input,field){
    let pattern=/[0-9]/;
    let pattern_character=/[a-zA-Z]/ 
    let special_character=/[!,@,#,$,%,^,&,*,?,_,(,),-,+,=,~]/
    if(!phone_input.value.match(pattern) || phone_input.value.match(pattern_character) || phone_input.value.match(special_character)){
        Valid_Failed(e,input,field)
        phone_input.value !="" ? field_call.querySelector('span').innerHTML='Number Phone Must Be just Number' :'Number Phone Cant Be Empty';
    }else{
        if(phone_input.value.length==10){
            Valid_success(phone_input,field_call)
            field_call.querySelector('span').innerHTML='Phone Number is valid'
            field_call.querySelector('span').style.color='green'
            field_call.querySelector('.icon').style.color='green'
        }else{
            Valid_Failed(e,input,field)
            phone_input.value !="" ? field_call.querySelector('span').innerHTML='Number Phone Must Be have 10 number' :'Number Phone Cant Be Empty';
    
        }
    }
}
function check_password(e,input,field){
    let pattern_Alphabitic=/[a-zA-Z]/
    let pattern_Number=/[0-9]/
    let pattern_Special_Character=/[!,@,#,$,%,^,&,*,?,_,(,),-,+,=,~]/
    if(password_input.value.match(pattern_Alphabitic) || password_input.value.match(pattern_Number) || password_input.value.match(pattern_Special_Character)){
        field_pass.querySelector('span').innerHTML='Password is piece of shit'
        password_input.style.border="1px solid orange"
        field_pass.querySelector('.error-icon').style.display="none"
        field_pass.querySelector('span').style.display="block"
        field_pass.querySelector('span').style.color="orange"
        field_pass.querySelector('.icon').style.color="orange"
    }
    if(password_input.value.match(pattern_Alphabitic) && password_input.value.match(pattern_Number) && password_input.value.length>=6){
        field_pass.querySelector('span').innerHTML='Password is normal'
        password_input.style.border="1px solid yellow"
        field_pass.querySelector('.error-icon').style.display="none"
        field_pass.querySelector('span').style.display="block"
        field_pass.querySelector('span').style.color="yellow"
        field_pass.querySelector('.icon').style.color="yellow"
    }
    if(password_input.value.match(pattern_Alphabitic) && password_input.value.match(pattern_Number) && password_input.value.match(pattern_Special_Character) && password_input.value.length >=8){
        field_pass.querySelector('span').innerHTML='Password is fucking strong'
        password_input.style.border="1px solid green"
        field_pass.querySelector('.error-icon').style.display="none"
        field_pass.querySelector('span').style.display="block"
        field_pass.querySelector('span').style.color="green"
        field_pass.querySelector('.icon').style.color="green"
    }
}


