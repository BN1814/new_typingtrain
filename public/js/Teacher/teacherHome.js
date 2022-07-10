// randomcode
let inpGencode = document.querySelector('.inpGencode');
let saveBtn = document.querySelector(".save");
let cancelBtn = document.querySelector(".cancel");
let inpDate = document.querySelector('.date');
let inpTime = document.querySelector('.time');

saveBtn.addEventListener("click", function() {
    if(inpGencode.value === "" && inpDate.value === "" && inpTime.value === "") {
        alert('กรุณาใส่รหัส วันที่และเวลา');
    }
    else if(inpGencode.value === "") {
        alert('กรุณาใส่วันที่ และเวลา');
    }
    else if(inpDate.value === "") {
        alert('กรุณาใส่รหัส และเวลา');
    }
    else if(inpTime.value === "") {
        alert('กรุณาใส่รหัส และวันที่');
    }
    else {
        alert('ใส่รหัส วันที่และเวลาแล้ว');
    }
});
// sidebar
const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');

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

// function inpDataToDB() {
// }

// randomcode
function create_Random_code() {
    var random_code = '';
    var random_code_Length = 6;
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for(var i = 0 ; i < random_code_Length ; i++) {
        var randomCode = Math.floor(Math.random() * characters.length);
        random_code += characters.substring(randomCode, randomCode+1);
    }
    inpGencode.value = random_code;
}