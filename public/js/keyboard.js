// document.getElementById("a").addEventListener("keypress", function onKeypress() {
//     this.removeEventListener("keypress", onKeypress);
//     this.style.backgroundColor = "#004f40";  
// }, false);

var start = 97,
    end = 122;
//     button;

// while (start <= end) {
//     button = document.createElement("button");
//     button.id = button.textContent = String.fromCharCode(start);
//     document.body.appendChild(button);
//     start += 1;
// }

var keydown,
    keypress = [];

document.addEventListener("keydown", function onKeydown(e1) {
    keydown = e1;
    document.getElementById('audio').play();
}, false);

document.addEventListener("keypress", function onKeypress(e2) {
    var record = {
        "char": e2.char || e2.charCode,
            "key": keydown.key || keydown.keyCode || keyDown.which,
            "shiftKey": keydown.shiftKey,
            "metaKey": keydown.metaKey,
            "altKey": keydown.altKey,
            "ctrlKey": keydown.ctrlKey
    },
    element = document.getElementById(String.fromCharCode(e2.charCode || e2.char));

    if (element) {
        element.style.backgroundColor = "#05e924";
        keypress.push(record);
    }
}, false);

document.addEventListener("keyup", function onKeyup(e3) {
    var key = e3.key || e3.keyCode || e3.which;

    keypress.forEach(function (record) {
        if (record.key === key && record.shiftKey === e3.shiftKey && record.metaKey === e3.metaKey && record.altKey === e3.altKey && record.ctrlKey === e3.ctrlKey) {
            document.getElementById(String.fromCharCode(record.char)).style.backgroundColor = "white";
        }
    });
}, false);