document.addEventListener("DOMContentLoaded", function () {
    let currentPage = 'Admin_Dashboard.html';

    // Function to load content dynamically
    function loadContent(page) {
        currentPage = page;
        fetch(page)
            .then(response => response.text())
            .then(data => {
                document.querySelector("#content").innerHTML = data;
                // Reinitialize event listeners after content is loaded
                initializeEventListeners();
            })
            .catch(error => {
                console.error("Error loading content:", error);
            });
    }

    // Function to set the active link in the sidebar
    function setActiveLink(link) {
        document.querySelectorAll("nav ul li").forEach(li => {
            li.classList.remove("active");
        });
        if (link) {
            link.parentElement.classList.add("active");
        }
    }

    // Initialize event listeners for buttons and links
    function initializeEventListeners() {
        // Add event listener for "Cancel" buttons
        document.querySelectorAll(".tombol-cancel").forEach(cancelButton => {
            cancelButton.addEventListener("click", function () {
                switch (currentPage) {
                    case 'Admin_Edit_Profil.html':
                    case 'Admin_Edit_Password.html':
                        loadContent('../PHP/Admin_Profile.php');
                        break;
                    case 'Admin_Add_User.html':
                    case 'Admin_Edit_User.html':
                        loadContent('Admin_Manajemen_User.html');
                        break;
                    case 'Admin_Tambah_Survey_Hal3.html':
                        loadContent('Admin_Tambah_Survey_Hal2.html');
                        break;
                    case 'Admin_Edit_Keterangan_Survey.html':
                        loadContent('Admin_Hasil_Survey.html');
                        break;
                    case 'Admin_Tambah_Survey_Hal2.html':
                        loadContent('Admin_Tambah_Survey_Hal1.html');
                        break;
                }
            });
        });

        // Add event listener for "Save" buttons
        document.querySelectorAll(".tombol-save").forEach(saveButton => {
            saveButton.addEventListener("click", function () {
                switch (currentPage) {
                    case 'Admin_Edit_Profil.html':
                    case 'Admin_Edit_Password.html':
                        alert("Data saved!");
                        loadContent('Admin_Profile.html');
                        break;
                    case 'Admin_Add_User.html':
                    case 'Admin_Edit_User.html':
                        alert("Data saved!");
                        loadContent('Admin_Manajemen_User.html');
                        break;
                    case 'Admin_Tambah_Survey_Hal2.html':
                        alert("Data saved!");
                        loadContent('Admin_Tambah_Survey_Hal3.html');
                        break;
                    case 'Admin_Edit_Keterangan_Survey.html':
                        alert("Data saved!");
                        loadContent('Admin_Hasil_Survey.html');
                        break;
                }
            });
        });

        // Add event listener for "Edit" buttons
        document.querySelectorAll(".tombol-edit").forEach(editButton => {
            editButton.addEventListener("click", function () {
                switch (currentPage) {
                    case '../PHP/Admin_Profile.php':
                        loadContent('../HTML/Admin_Edit_Profil.html');
                        break;
                    case 'Admin_Manajemen_User.html':
                        loadContent('Admin_Edit_User.html');
                        break;
                    case 'Admin_Hasil_Survey.html':
                        loadContent('Admin_Edit_Keterangan_Survey.html');
                        break;
                }
            });
        });

        // Add event listener for "Add User" button
        const addUserButton = document.querySelector(".tombol-tambah-user");
        if (addUserButton) {
            addUserButton.addEventListener("click", function () {
                loadContent('Admin_Add_User.html');
            });
        }

        // Add event listener for "Profil Admin" link
        const settingsLink = document.querySelector("#profil-admin");
        if (settingsLink) {
            settingsLink.addEventListener("click", function (e) {
                e.preventDefault();
                loadContent('../PHP/Admin_Profile.php');
                setActiveLink(e.target.parentElement);
            });
        }

        // Add event listener for "Edit Password Admin" link
        const editPasswordLink = document.querySelector("#edit-password");
        if (editPasswordLink) {
            editPasswordLink.addEventListener("click", function (e) {
                e.preventDefault();
                loadContent('Admin_Edit_Password.html');
                setActiveLink(e.target.parentElement);
            });
        }

        // Add event listener for "Publish" button
        const publishButton = document.querySelector(".tombol-publish");
        if (publishButton) {
            publishButton.addEventListener("click", function () {
                alert("Data saved and published!");
                loadContent('Admin_Hasil_Survey.html');
            });
        }

        // Add event listener for survey titles to navigate to detail page
        document.querySelectorAll(".survey-title").forEach(title => {
            title.addEventListener("click", function () {
                const surveyId = this.getAttribute("data-survey-id");
                loadContent(`Admin_Detail_Hasil_Survey.html?id=${surveyId}`);
            });
        });

        // Initialize event listener specific to loaded page
        if (currentPage === 'Admin_Tambah_Survey_Hal3.html' || currentPage.startsWith('Admin_Detail_Hasil_Survey.html')) {
            const tableButton = document.getElementById('table-button');
            const chartButton = document.getElementById('chart-button');
            const tableDiv = document.getElementById('table');
            const chartDiv = document.getElementById('chart');

            function showTab(tab) {
                if (tab === 'table') {
                    tableDiv.style.display = 'block';
                    chartDiv.style.display = 'none';
                    tableButton.classList.add('active');
                    chartButton.classList.remove('active');
                } else if (tab === 'chart') {
                    tableDiv.style.display = 'none';
                    chartDiv.style.display = 'block';
                    tableButton.classList.remove('active');
                    chartButton.classList.add('active');
                }
            }

            tableButton.addEventListener('click', () => showTab('table'));
            chartButton.addEventListener('click', () => showTab('chart'));
            showTab('table'); // Set default tab
        }
    }

    // Load content based on URL parameter 'page'
    const urlParams = new URLSearchParams(window.location.search);
    const page = urlParams.get('page') || 'Admin_Dashboard.html';
    loadContent(page);

    // Set active link based on URL parameter 'page'
    const link = document.querySelector(`nav ul li a[href='#${page.replace('.html', '')}']`);
    setActiveLink(link ? link.parentElement : null);

    // Add event listener for sidebar links
    document.querySelectorAll("nav ul li a").forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const page = e.target.getAttribute("href").substring(1) + '.html';
            loadContent(page);
            setActiveLink(e.target.parentElement);
        });
    });

    // Toggle menu dropdown
    const akun = document.querySelector('.akun');
    if (akun) {
        akun.addEventListener('click', function () {
            this.querySelector('.dropdown').classList.toggle('active');
        });
    }

    // Close dropdown if user clicks outside of it
    document.addEventListener('click', function (event) {
        if (!akun || !akun.contains(event.target)) {
            const dropdown = document.querySelector('.akun .dropdown');
            if (dropdown) {
                dropdown.classList.remove('active');
            }
        }
    });

    // Toggle survey dropdown
    const surveyToggle = document.querySelector('.survey-toggle');
    const dropdownSurvey = document.querySelector('.dropdown-survey');
    const arrow = document.querySelector('.arrow');

    if (surveyToggle && dropdownSurvey && arrow) {
        surveyToggle.addEventListener('click', function () {
            dropdownSurvey.classList.toggle('show');
            arrow.classList.toggle('rotate');
        });
    }

    // Initialize event listeners
    initializeEventListeners();
});
