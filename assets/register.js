let form = document.register, 
    fullname = form.fullname,
    email = form.email,
    tel = form.tel,
    dob = form.dob,
    password = form.password,
    cpassword = form.cpassword;


//form event
 form.addEventListener('submit', function(e){
    if(fullname.value == ''){
        fullname.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(email.value == ''){
        email.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(tel.value == ''){
        tel.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(dob.value == ''){
        dob.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(password.value == ''){
        password.nextElementSibling.innerText = '1 number and 1 special character with minimum 6 characters are required';
        e.preventDefault();
    }

    if(cpassword.value == ''){
        cpassword.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }
 })

 //keyboard event
 fullname.addEventListener('keyup', function(){
    let fullnameRegex = /^[A-Za-z]{3,} [A-Za-z]{3,}$/g
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else if(fullnameRegex.test(this.value) == false){
        this.nextElementSibling.innerText = 'Only text format supported';
    }else{
        this.nextElementSibling.innerText = '';
    }
 })

 email.addEventListener('keyup', function(){
    let emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else if(emailRegex.test(this.value) == false){
        this.nextElementSibling.innerText = 'Email is not valid.';
    }
    else{
        this.nextElementSibling.innerText = '';
    }
 })

 tel.addEventListener('keyup', function(){
    let phoneRegex = /(?:\(?\+977\)?)?[9][6-9]\d{8}|01[-]?[0-9]{7}/g //?? = optional
    let phoneChar = /^[0-9]*$/g
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    } else if(phoneChar.test(this.value) == false){
        this.nextElementSibling.innerText = 'Only number format supported';
    }
    else if(phoneRegex.test(this.value) == false){
        this.nextElementSibling.innerText = 'Phone number is not valid.';
    }
    else{
        this.nextElementSibling.innerText = '';
    }
 })

dob.addEventListener('input', function(){
    var dateParts = dateOfBirth.split("/");
    var day = dateParts[0];
    var month = dateParts[1];
    var year = dateParts[2];
    
    if (day < 1 || day > 31) {
        return false;
    }
    if (month < 1 || month > 12) {
        return false;
    }
    if (year < 1900 || year > 2100) {
        return false;
    }
    
    return true;
})

 password.addEventListener('keyup', function(){
    let passwordRegex =/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/;
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else if(passwordRegex.test(this.value) == false){
        this.nextElementSibling.innerText = 'Only number format supported';
    }else{
        this.nextElementSibling.innerText = '';
    }
 })

 cpassword.addEventListener('keyup', function(){
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else if(this.value != password.value){
        this.nextElementSibling.innerText = 'Password does not match';
    }
    else{
        this.nextElementSibling.innerText = '';
    }
 })