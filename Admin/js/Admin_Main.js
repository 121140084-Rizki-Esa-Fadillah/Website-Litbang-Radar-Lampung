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
            });
    }

    // Function to set the active link in the sidebar
    function setActiveLink(link) {
        document.querySelectorAll("nav ul li").forEach(li => {
            li.classList.remove("active");
        });
        link.parentElement.classList.add("active");
    }

    // Initialize event listeners for buttons and links
    function initializeEventListeners() {
        // Add event listener for "Cancel" buttons
        const cancelButton = document.querySelector(".tombol-cancel");
        if (cancelButton) {
            cancelButton.addEventListener("click", function () {
                if (currentPage === 'Admin_Edit_Profil.html' || currentPage === 'Admin_Edit_Password.html') {
                    loadContent('Admin_Profile.html');
                } else if (currentPage === 'Admin_Add_User.html' || currentPage === 'Admin_Edit_User.html') {
                    loadContent('Admin_Manajemen_User.html');
                } else if (currentPage === 'Admin_Tambah_Survey_Hal3.html') {
                    loadContent('Admin_Tambah_Survey_Hal2.html');
                } else if (currentPage === 'Admin_Edit_Keterangan_Survey.html') {
                    loadContent('Admin_Hasil_Survey.html');
                } else if (currentPage === 'Admin_Tambah_Survey_Hal2.html') {
                    loadContent('Admin_Tambah_Survey.html');
                }
            });
        }

        // Add event listener for "Save" buttons
        const saveButton = document.querySelector(".tombol-save");
        if (saveButton) {
            saveButton.addEventListener("click", function () {
                if (currentPage === 'Admin_Edit_Profil.html' || currentPage === 'Admin_Edit_Password.html') {
                    alert("Data saved!");
                    loadContent('Admin_Profile.html');
                } else if (currentPage === 'Admin_Add_User.html' || currentPage === 'Admin_Edit_User.html') {
                    alert("Data saved!");
                    loadContent('Admin_Manajemen_User.html');
                } else if (currentPage === 'Admin_Tambah_Survey_Hal1.html') {
                    alert("Data saved!");
                    loadContent('Admin_Tambah_Survey_Hal2.html');
                } else if (currentPage === 'Admin_Tambah_Survey_Hal2.html') {
                    alert("Data saved!");
                    loadContent('Admin_Tambah_Survey_Hal3.html');
                } else if (currentPage === 'Admin_Edit_Keterangan_Survey.html') {
                    alert("Data saved!");
                    loadContent('Admin_Hasil_Survey.html');
                }
            });
        }

        // Add event listener for "Edit" buttons
        const editButtons = document.querySelectorAll(".tombol-edit");
        editButtons.forEach(editButton => {
            editButton.addEventListener("click", function () {
                if (currentPage === 'Admin_Profile.html') {
                    loadContent('Admin_Edit_Profil.html');
                } else if (currentPage === 'Admin_Manajemen_User.html') {
                    loadContent('Admin_Edit_User.html');
                } else if (currentPage === 'Admin_Hasil_Survey.html') {
                    loadContent('Admin_Edit_Keterangan_Survey.html');
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
                loadContent('Admin_Profile.html');
                setActiveLink(e.target);
            });
        }

        // Add event listener for "Edit Password Admin" link
        const editPasswordLink = document.querySelector("#edit-password");
        if (editPasswordLink) {
            editPasswordLink.addEventListener("click", function (e) {
                e.preventDefault();
                loadContent('Admin_Edit_Password.html');
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
        const surveyTitles = document.querySelectorAll(".survey-title");
        surveyTitles.forEach(title => {
            title.addEventListener("click", function () {
                const surveyId = this.getAttribute("data-survey-id");
                loadContent('Admin_Detail_Hasil_Survey.html?id=${surveyId}');
            });
        });

        // Initialize event listener specific to loaded page
        if (currentPage === 'Admin_Tambah_Survey_Hal3.html' || currentPage === 'Admin_Detail_Hasil_Survey.html?id=${surveyId}') {
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

    // Load default content
    loadContent('Admin_Dashboard.html');
    setActiveLink(document.querySelector("nav ul li a[href='#admin_dashboard']"));

    // Add event listener for sidebar links
    document.querySelectorAll("nav ul li a").forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const page = e.target.getAttribute("href").substring(1) + '.html';
            loadContent(page);
            setActiveLink(e.target);
        });
    });

    // Toggle menu dropdown
    const akun = document.querySelector('.akun');
    akun.addEventListener('click', function () {
        this.querySelector('.dropdown').classList.toggle('active');
    });

    // Close dropdown if user clicks outside of it
    document.addEventListener('click', function (event) {
        if (!akun.contains(event.target)) {
            akun.querySelector('.dropdown').classList.remove('active');
        }
    });

    // Toggle survey dropdown
    const surveyToggle = document.querySelector('.survey-toggle');
    const dropdownSurvey = document.querySelector('.dropdown-survey');
    const arrow = document.querySelector('.arrow');

    surveyToggle.addEventListener('click', function () {
        dropdownSurvey.classList.toggle('show');
        arrow.classList.toggle('rotate');
    });

    // Initialize event listeners
    initializeEventListeners();
});
