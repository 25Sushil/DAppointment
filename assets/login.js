let form = document.login,
    email = form.email,
    password = form.password;

form.addEventListener('submit', function(e){
    if(email.value == ''){
        email.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(password.value == ''){
        password.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
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

password.addEventListener('keyup', function(){
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else{
        this.nextElementSibling.innerText = '';
    }
})