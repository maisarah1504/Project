function showmodal() {
    alert("This parking space is not available !!");
}

document.addEventListener("DOMContentLoaded", function() {
    var dropdownBtns = document.querySelectorAll(".dropdown-btn");
    dropdownBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            var dropdownContainer = this.nextElementSibling;
            dropdownContainer.style.display = dropdownContainer.style.display === "block" ? "none" : "block";
        });
    });
});

