const sidebar = document.querySelector('.nav');
const hamburgerBtn = document.querySelector('#hamburger');

function toggleSidebar() {
    if (sidebar.style.left === "0px") {
        // sidebar.style.left = "-250px";
        console.log('toggle hide');
    } else {
        // sidebar.style.left = "0";
        console.log('toggle display !!!');
    }
}

hamburgerBtn.addEventListener('click', () => {
    let message = 'nav ditampilkan';
    hamburgerBtn.classList.toggle('active');
    sidebar.classList.toggle('active');
    console.log(message);
});