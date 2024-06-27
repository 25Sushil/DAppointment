let form = document.register,
    fname = form.fname,
    email = form.email,
    phone = form.phone,
    image = form.image,
    password = form.password,
    cpassword = form.cpassword;

form.addEventListener('submit',function(e){
    if(fname.value == ''){
        fname.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(email.value == ''){
        email.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(phone.value == ''){
        phone.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(specility.value == ''){
        specility.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(image.value == ''){
        image.nextElementSibling.innerText = 'This field is required';
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

//Keyboard Event
fname.addEventListener('keyup', function(){
    let fnameRegex = /^[A-Za-z]{3,} [A-Za-z]{3,}$/g  
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else if(fnameRegex.test(this.value) == false){
        this.nextElementSibling.innerText = 'Fullname must be in format';
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
    }else{
        this.nextElementSibling.innerText = '';
    }
})

phone.addEventListener('keyup', function(){
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

specility.addEventListener('keyup', function(){
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else{
        this.nextElementSibling.innerText = '';
    }
})

password.addEventListener('keyup', function(){
    let passwordRegex =/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/g
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