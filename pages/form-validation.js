// Dynamically load header and footer
fetch('./header.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('header').innerHTML = data;

        const logo = document.querySelector('.logo');
        logo.src = window.location.pathname.includes('pages') ? '../images/JR Logo.png' : './images/JR Logo.png';
    });

fetch('./footer.html').then(response => response.text()).then(data => {
    document.getElementById('footer').innerHTML = data;
});