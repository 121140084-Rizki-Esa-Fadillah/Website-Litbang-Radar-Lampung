document.addEventListener("DOMContentLoaded", function () {
    let currentPage = 'Dashboard_Admin.html';

    // Fungsi untuk memuat konten secara dinamis
    function loadContent(page) {
        currentPage = page;
        fetch(page)
            .then(response => response.text())
            .then(data => {
                document.querySelector("#content").innerHTML = data;
                // Inisialisasi ulang event listener setelah konten dimuat
                initializeEventListeners();
            });
    }

    // Fungsi untuk mengatur link aktif
    function setActiveLink(link) {
        document.querySelectorAll("nav ul li").forEach(li => {
            li.classList.remove("active");
        });
        link.parentElement.classList.add("active");
    }

    // Inisialisasi event listener
    function initializeEventListeners() {
        // Tambahkan event listener untuk tombol "Cancel"
        const cancelButton = document.querySelector(".tombol-cancel");
        if (cancelButton) {
            cancelButton.addEventListener("click", function () {
                if (currentPage === 'Admin-Edit-Profil.html' || currentPage === 'Admin-Edit-Password.html') {
                    loadContent('Admin_Profile.html');
                } else if (currentPage === 'Add_User.html' || currentPage === 'Edit_User.html') {
                    loadContent('Manajemen-User.html');
                }
            });
        }

        // Tambahkan event listener untuk tombol "Save"
        const saveButton = document.querySelector(".tombol-save");
        if (saveButton) {
            saveButton.addEventListener("click", function () {
                if (currentPage === 'Admin-Edit-Profil.html' || currentPage === 'Admin-Edit-Password.html' || currentPage === 'Add_User.html' || currentPage === 'Edit_User.html') {
                     // Logika untuk menyimpan data bisa ditambahkan di sini
                    alert("Data saved!"); 
                } else if (currentPage === 'Tambah_Survey.html') {
                    loadContent('Input_Data_Survey.html');
                } 
            });
        }

        // Tambahkan event listener untuk tombol "Edit Profil"
        const editProfilButton = document.querySelector(".tombol-edit-profil");
        if (editProfilButton) {
            editProfilButton.addEventListener("click", function () {
                loadContent('Admin-Edit-Profil.html');
            });
        }

        // Tambahkan event listener untuk tombol "Tambah User"
        const addUserButton = document.querySelector(".tombol-tambah-user");
        if (addUserButton) {
            addUserButton.addEventListener("click", function () {
                loadContent('Add_User.html');
            });
        }
        
        // Tambahkan event listener untuk tombol "Edit User Management"
        const editUserButton = document.querySelector(".tombol-edit-user");
        if (editUserButton) {
            editUserButton.addEventListener("click", function () {
                loadContent('Edit_User.html');
            });
        }

        // Tambahkan event listener untuk link "Profil Admin"
        const settingsLink = document.querySelector("#profil-admin");
        if (settingsLink) {
            settingsLink.addEventListener("click", function (e) {
                e.preventDefault();
                loadContent('Admin_Profile.html');
                setActiveLink(e.target);
            });
        }

        // Tambahkan event listener untuk link "Edit Password Admin"
        const editPasswordLink = document.querySelector("#edit-password");
        if (editPasswordLink) {
            editPasswordLink.addEventListener("click", function (e) {
                e.preventDefault();
                loadContent('Admin-Edit-Password.html');
            });
        }
    }

    // Muat konten default
    loadContent('Dashboard_Admin.html');
    setActiveLink(document.querySelector("nav ul li a[href='#dashboard_admin']"));

    // Tambahkan event listener untuk link sidebar
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

    // Tutup dropdown jika pengguna mengklik di luar dropdown
    document.addEventListener('click', function (event) {
        if (!akun.contains(event.target)) {
            akun.querySelector('.dropdown').classList.remove('active');
        }
    });

    // Toggle dropdown survey
    const surveyToggle = document.querySelector('.survey-toggle');
    const dropdownSurvey = document.querySelector('.dropdown-survey');
    const arrow = document.querySelector('.arrow');

    surveyToggle.addEventListener('click', function () {
        dropdownSurvey.classList.toggle('show');
        arrow.classList.toggle('rotate');
    });

    // Panggilan awal untuk mengatur event listener
    initializeEventListeners();
});
