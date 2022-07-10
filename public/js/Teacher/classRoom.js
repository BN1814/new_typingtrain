// main-content
let sectOne = document.getElementById("sect-one");
let sectTwo = document.getElementById("sect-two");
let sectThree = document.getElementById("sect-three");
// sidebar
const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');

// main-content
sectOne.addEventListener("click", function() {
    window.confirm("You clicked??");
});

// Sidebar
allDropdown.forEach(item => {
    const a = item.parentElement.querySelector('a:first-child');
    a.addEventListener('click', function (e) {
        e.preventDefault();

        if(!this.classList.contains('active')) {
            allDropdown.forEach(i => {
                const aLink = i.parentElement.querySelector('a:first-child');

                aLink.classList.remove('active');
                i.classList.remove('show');
            });
        }
        this.classList.toggle('active');
        item.classList.toggle('show');
    });
});