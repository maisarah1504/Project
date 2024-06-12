function showmodal() {
    alert("This parking space is not available !!");
}

document.addEventListener('DOMContentLoaded', function() {
    const dropdownBtns = document.querySelectorAll('.dropdown-btn');
    dropdownBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdownContent = this.nextElementSibling.nextElementSibling;
            dropdownContent.style.display = dropdownContent.style.display === 'flex' ? 'none' : 'flex';
        });
    });
});


