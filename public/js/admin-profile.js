function openEditModal() {
    document.getElementById('editModal').classList.add('show');
}

function openAdminEditModal(name, email, access) {
    document.getElementById('adminName').value = name;
    document.getElementById('adminEmail').value = email;
    document.getElementById('adminAccess').value = access;
    document.getElementById('adminEditModal').classList.add('show');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('show');
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.classList.remove('show');
        }
    });
}