let form = document.register, 
    fullname = form.fullname,
    email = form.email,
    bg = form.bg,
    speciality = form.speciality,
    doctor = form.doctor,
    date = form.date,
    address = form.address,
    tel = form.tel,
    date = form.date,
    time = form.time;


//form event
form.addEventListener('submit', function(e){
    if(fullname.value == ''){
        fullname.nextElementSibling.innerText = 'Name is required';
        e.preventDefault();
    }

    if(email.value == ''){
        email.nextElementSibling.innerText = 'Email is required';
        e.preventDefault();
    }

    if(address.value == ''){
        address.nextElementSibling.innerText = 'Address is required';
        e.preventDefault();
    }

    if(bg.value == ''){
        bg.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(speciality.value == ''){
        speciality.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(doctor.value == ''){
        doctor.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(tel.value == ''){
        tel.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(date.value == ''){
        date.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(time.value == ''){
        time.nextElementSibling.innerText = 'This field is required';
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

address.addEventListener('keyup', function(){
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else{
        this.nextElementSibling.innerText = '';
    }
})

tel.addEventListener('keyup', function(){
    let phoneRegex = /(?:\(?\+977\)?)?[9][6-9]\d{8}|01[-]?[0-9]{7}/g // optional
    let phoneChar = /^[0-9]*$/g
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else if(phoneChar.test(this.value) == false){
        this.nextElementSibling.innerText = 'Only number format supported';
    }else if(phoneRegex.test(this.value) == false){
        this.nextElementSibling.innerText = 'Phone number is not valid.';
    }else{
        this.nextElementSibling.innerText = '';
    }
})

date.addEventListener('keyup', function(){
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else{
        this.nextElementSibling.innerText = '';
    }
})

time.addEventListener('keyup', function(){
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else{
        this.nextElementSibling.innerText = '';
    }
})

function calendarMin(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    document.querySelector('#date').setAttribute('min', maxDate);
}
calendarMin();