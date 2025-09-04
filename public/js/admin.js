// Mobile menu toggle

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('mobile-btn');
    sidebar.classList.toggle('open');
    menuBtn.classList.toggle('open');
}

// Close sidebar when clicking outside on mobile
document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.querySelector('.mobile-menu-btn');

    if (window.innerWidth <= 768 &&
        !sidebar.contains(event.target) &&
        !menuBtn.contains(event.target)) {
        sidebar.classList.remove('open');
    }
});

// Active link handling
// document.querySelectorAll('.nav-link').forEach(link => {
//     link.addEventListener('click', function(e) {
//         e.preventDefault();

//         // Remove active class from all links
//         document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));

//         // Add active class to clicked link
//         this.classList.add('active');

//         // Update header title
//         const pageTitle = this.textContent.trim();
//         document.querySelector('.header-title').textContent = pageTitle;
//     });
// });



//  window.onload = function () {
//         const success = "{{ session('success') }}";
//         if (success) {
//             document.getElementById('map_url').value = '';
//         }
//     };
