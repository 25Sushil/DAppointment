let form = document.add_session,
    title = form.title,
    doctor = form.doctor,
    patients = form.patients,
    time = form.time,
    date = form.date;

form.addEventListener('submit', function(e){
    if(title.value == ''){
        title.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(doctor.value == ''){
        doctor.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(patients.value == ''){
        patients.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }
            
    if(time.value == ''){
        time.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }

    if(date.value == ''){
        date.nextElementSibling.innerText = 'This field is required';
        e.preventDefault();
    }
})

//key handeler
title.addEventListener('keyup', function(){
    if(this.value == ''){
        this.nextElementSibling.innerText = 'This field is required';
    }else{
        this.nextElementSibling.innerText = '';
    }
})

time.addEventListener('keyup', function(){
    if(this.value == ''){
        this.nextElementSibling.Time = 'This field is required';
    }else{
        this.nextElementSibling.Time = '';
    }
 })

date.addEventListener('keyup', function(){
    if(this.value == ''){
        this.nextElementSibling.innerFocus = 'This field is required';
    }else{
        this.nextElementSibling.innerFocus = '';
    }
})
