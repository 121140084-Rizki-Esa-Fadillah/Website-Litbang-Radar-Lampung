document.addEventListener("DOMContentLoaded", function() {
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
      loadContent('dashboard.html');
      setActiveLink(document.querySelector("nav ul li a[href='#dashboard']"));
  
      // Add event listeners to sidebar links
      document.querySelectorAll("nav ul li a").forEach(link => {
          link.addEventListener("click", function(e) {
              e.preventDefault();
              const page = e.target.getAttribute("href").substring(1) + '.html';
              loadContent(page);
              setActiveLink(e.target);
          });
      });
  });
  