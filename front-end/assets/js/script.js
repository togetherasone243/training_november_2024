// get elemets from html file

const newBtn = document.getElementById('new-btn');
const formData = document.getElementById('form-data');
const openBtn = document.getElementById('open');
const left = document.getElementById('left');
const closeBtn = document.getElementById('close');

// Open form
newBtn.addEventListener('click', ()=>{
    if(formData.style.display == 'block') {
        formData.style.display = 'none';
        newBtn.innerHTML = 'New +';
    } else {
        formData.style.display = 'block';
        newBtn.innerHTML = 'Close x';
    }
});

// Open menus

openBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    left.style.display = 'block';
    left.style.position = 'absolute';
});

closeBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    left.style.display = 'none';
});