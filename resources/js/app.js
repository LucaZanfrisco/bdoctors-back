import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

if(document.getElementById('message')){
    window.addEventListener('load',function(){
    let message = document.getElementById('message');
    this.setInterval(function(){
        message.classList.add('d-none');
    },5000)
})
}