let menuToggle = document.querySelector('.js-menu-toggle');
menuToggle.addEventListener('click', function() {
    if(this.parentNode.classList.contains('expand')) {
        this.parentNode.classList.remove('expand');
    } else {
        this.parentNode.classList.add('expand');
    }
});