document.addEventListener("DOMContentLoaded", function () {
    let currentPage = 'Admin_Dashboard.html';

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
                if (currentPage === 'Admin_Edit_Profil.html' || currentPage === 'Admin_Edit_Password.html') {
                    loadContent('Admin_Profile.html');
                } else if (currentPage === 'Admin_Add_User.html' || currentPage === 'Admin_Edit_User.html') {
                    loadContent('Admin_Manajemen_User.html');
                } else if (currentPage === 'Admin_Tambah_Survey_Hal3_Table.html') {
                    loadContent('Admin_Tambah_Survey_Hal2.html');
                } else if (currentPage === 'Admin_Edit_Keterangan_Survey.html') {
                    loadContent('Admin_Hasil_Survey.html');
                } else if (currentPage === 'Admin_Tambah_Survey_Hal2.html') {
                    loadContent('Admin_Tambah_Survey_Hal1.html');
                }
            });
        }

        // Tambahkan event listener untuk tombol "Save"
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
                    loadContent('Admin_Tambah_Survey_Hal3_Table.html');
                } else if (currentPage === 'Admin_Edit_Keterangan_Survey.html') {
                    alert("Data saved!");
                    loadContent('Admin_Hasil_Survey.html');
                }
            });
        }

        // Tambahkan event listener untuk tombol "Edit"
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

        // Tambahkan event listener untuk tombol "Tambah User"
        const addUserButton = document.querySelector(".tombol-tambah-user");
        if (addUserButton) {
            addUserButton.addEventListener("click", function () {
                loadContent('Admin_Add_User.html');
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
                loadContent('Admin_Edit_Password.html');
            });
        }

        // Tambahkan event listener untuk tombol "Tombol Publish"
        const publishButton = document.querySelector(".tombol-publish");
        if (publishButton) {
            publishButton.addEventListener("click", function () {
                alert("Data saved Publish!");
                loadContent('Admin_Hasil_Survey.html');
            });
        }
    }

    // Muat konten default
    loadContent('Admin_Dashboard.html');
    setActiveLink(document.querySelector("nav ul li a[href='#admin_dashboard']"));

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