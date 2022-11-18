function toggle(){
const t = document.querySelector('.menu');
t.classList.toggle('active');
}

function toggUser(id){
    //const e = document.querySelector('.table');
    const e = document.getElementById(id);
    e.classList.toggle('active');
    // toggle();
}