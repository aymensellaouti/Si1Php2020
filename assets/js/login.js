const toast = document.querySelector('.toast');
const close = document.querySelector('#close');

close.addEventListener('click', function () {
    toast.classList.remove('show');
})