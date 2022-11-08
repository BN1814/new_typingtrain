// KEYBOARD KEYUP, KEYDOWN
// var keydown,
//     keypress = [];

// document.addEventListener("keydown", function onKeydown(e1) {
//     keydown = e1;
//     document.getElementById('audio').play();
// }, false);

// document.addEventListener("keypress", function onKeypress(e2) {
//     var record = {
//         "char": e2.char || e2.charCode,
//         "key": keydown.key || keydown.keyCode || keyDown.which,
//         "shiftKey": keydown.shiftKey,
//         "metaKey": keydown.metaKey,
//         "altKey": keydown.altKey,
//         "ctrlKey": keydown.ctrlKey
//     },
//     element = document.getElementById(String.fromCharCode(e2.charCode || e2.char));

//     if (element) {
//         element.style.backgroundColor = "#05e924";
//         keypress.push(record);
//     }
// }, false);

// document.addEventListener("keyup", function onKeyup(e3) {
//     var key = e3.key || e3.keyCode || e3.which;
//     // document.getElementById('audio').play();

//     keypress.forEach(function (record) {
//         if (record.key === key && record.shiftKey === e3.shiftKey && record.metaKey === e3.metaKey && record.altKey === e3.altKey && record.ctrlKey === e3.ctrlKey) {
//             document.getElementById(String.fromCharCode(record.char)).style.backgroundColor = "white";
//         }
//     });
// }, false);
let keys = document.querySelectorAll('.keys');
let spaceKey = document.querySelector('.space_key');
let shift_left = document.querySelector('.shift_left');
let shift_right = document.querySelector('.shift_right');
let caps_lock_key = document.querySelector('.caps_lock_key');
let ctrl_left = document.querySelector('.ctrl_left');
let ctrl_right = document.querySelector('.ctrl_right');

for(let i = 0 ; i < keys.length ; i++) {
    keys[i].setAttribute('keyname', keys[i].innerText);
    keys[i].setAttribute('lowerCaseName', keys[i].innerText.toLowerCase());
}
window.addEventListener('keydown', function(e){
    for(let i = 0 ; i < keys.length ; i++) {
        openSound();
        if(e.key == keys[i].getAttribute('keyname') || e.key == keys[i].getAttribute('lowerCaseName')) {
            // console.log(keys[i]);
            keys[i].classList.add('active');
        }
        if(e.code == 'Space') {
            spaceKey.classList.add('active');
        }
        if(e.code == 'ShiftLeft') {
            shift_right.classList.remove('active');
        }
        if(e.code == 'ShiftRight') {
            shift_left.classList.remove('active');
        }
        if(e.code == 'ControlLeft') {
            ctrl_right.classList.remove('active');
        }
        if(e.code == 'ControlRight') {
            ctrl_left.classList.remove('active');
        }
        if(e.code == 'CapsLock') {
            caps_lock_key.classList.toggle('active');
        }
    }
})
window.addEventListener('keyup', function(e){
    for(let i = 0 ; i < keys.length ; i++) {
        if(e.key == keys[i].getAttribute('keyname') || e.key == keys[i].getAttribute('lowerCaseName')) {
            // console.log(keys[i]);
            keys[i].classList.remove('active');
            keys[i].classList.add('remove');
        }
        if(e.code == 'Space') {
            spaceKey.classList.remove('active');
            spaceKey.classList.add('remove');
        }
        if(e.code == 'ShiftLeft') {
            shift_right.classList.remove('active');
            shift_right.classList.remove('remove');
        }
        if(e.code == 'ShiftRight') {
            shift_left.classList.remove('active');
            shift_left.classList.remove('remove');
        }
        if(e.code == 'ControlLeft') {
            ctrl_right.classList.remove('active');
            ctrl_right.classList.remove('remove');
        }
        if(e.code == 'ControlRight') {
            ctrl_left.classList.remove('active');
            ctrl_left.classList.remove('remove');
        }
        // setTimeout(() => {
        //     keys[i].remove('remove');
        // }, 200)
    }
})
function openSound() {
    document.getElementById('audio').play();
    var sound = document.getElementById('sound').classList.toggle('remove');
    audio.muted = !audio.muted;
}
function closeSound() {
    var audio = document.getElementById('audio');
    var sound = document.getElementById('sound').classList.toggle('active');
    audio.muted = !audio.muted;
}

