document.addEventListener("DOMContentLoaded", function () {
    // Function to load content dynamically
    function loadContent(page) {
        fetch(page)
            .then(response => response.text())
            .then(data => {
                document.querySelector("#content").innerHTML = data;
            });
    }

    // Function to set active link
    function setActiveLink(link) {
        document.querySelectorAll("nav ul li").forEach(li => {
            li.classList.remove("active");
        });
        link.parentElement.classList.add("active");
    }

    // Load default content
    loadContent('Dashboard_Admin.html');
    setActiveLink(document.querySelector("nav ul li a[href='#dashboard']"));

    // Add event listeners to sidebar links
    document.querySelectorAll("nav ul li a").forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const page = e.target.getAttribute("href").substring(1) + '.html';
            loadContent(page);
            setActiveLink(e.target);
        });
    });

    // Toggle dropdown menu
    const akun = document.querySelector('.akun');
    akun.addEventListener('click', function () {
        this.querySelector('.dropdown').classList.toggle('active');
    });

    // Close the dropdown if the user clicks outside of it
    document.addEventListener('click', function (event) {
        if (!akun.contains(event.target)) {
            akun.querySelector('.dropdown').classList.remove('active');
        }
    });

    // Add event listener to the "Pengaturan Akun" link
    const settingsLink = document.querySelector("#profil-admin");
    settingsLink.addEventListener("click", function (e) {
        e.preventDefault();
        loadContent('profil.html');
        setActiveLink(e.target);
    });

    // Toggle survey dropdown
    const surveyToggle = document.querySelector('.survey-toggle');
    const dropdownSurvey = document.querySelector('.dropdown-survey');
    const arrow = document.querySelector('.arrow');

    surveyToggle.addEventListener('click', function () {
        dropdownSurvey.classList.toggle('show');
        arrow.classList.toggle('rotate');
    });
});
