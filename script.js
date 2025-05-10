const mobileQuery = window.matchMedia('(max-width: 768px)');

function updateNav(e) {
    if (e.matches) {
        const nav = document.getElementById("navbar");
        const rect = nav.getBoundingClientRect();
        const navlinks = document.getElementById('nav-links');


        let navBack = getComputedStyle(nav).backgroundColor;
        let heightOffset = rect.height;
        navlinks.style.top = heightOffset + 'px';
        navlinks.style.display = "";
        navlinks.style.background = navBack;
    }
}
updateNav(mobileQuery);

mobileQuery.addEventListener('change', updateNav);

const rect = document.getElementById("navbar").getBoundingClientRect();
const navArea = document.getElementById("navArea");
navArea.style.width = "100%";
navArea.style.height = rect.height + 'px';

document.getElementById("nav-menu").addEventListener('click', (event) => {
    document.getElementById("nav-links").classList.toggle('active');

    document.querySelectorAll(".link").forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById("nav-links").classList.remove('active');
        })
    })
})

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        const navHeight = document.getElementById('navbar').offsetHeight;
        console.log(navHeight);

        window.scrollTo({
            top: target.offsetTop - navHeight,
            behavior: 'smooth'
        });
    });
});