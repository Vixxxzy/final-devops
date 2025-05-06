
// Get modal and buttons
const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const modal = document.getElementById('inputModal');

// Open modal
openModalBtn.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

// Close modal
closeModalBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
});

// Close modal if clicked outside of the modal
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.classList.add('hidden');
    }
});

$('#appointment_table').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "pageLength": 10
});



