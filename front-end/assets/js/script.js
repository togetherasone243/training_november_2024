// Get elements from HTML file
const newBtn = document.getElementById('new-btn');
const formData = document.getElementById('form-data');
const leftMenu = document.querySelector('.left');

// Open and close form
newBtn.addEventListener('click', () => {
    if (formData.style.display === 'block') {
        formData.style.display = 'none';
        newBtn.innerHTML = 'New +';
    } else {
        formData.style.display = 'block';
        newBtn.innerHTML = 'Close x';
    }
});

// Toggle menu
function toggleDiv() {
    leftMenu.style.display = leftMenu.style.display == 'none' ? 'block' : 'none';
}

