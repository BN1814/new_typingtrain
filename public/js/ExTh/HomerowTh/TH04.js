const randomText = [
    "ฟฟฟฟ วววว ฟฟฟฟ วววว ฟวฟว ฟวฟว ฟวฟว ฟวฟว วววว ฟฟฟฟ วววว ฟฟฟฟ วฟวฟ วฟวฟ วฟวฟ วฟวฟ ฟฟวว ฟฟวว ฟฟวว ฟฟวว ววฟฟ ววฟฟ ววฟฟ ววฟฟ",
    "วฟวฟ วฟวฟ วฟวฟ วฟวฟ ฟฟวว ฟฟวว ฟฟวว ฟฟวว ววฟฟ ววฟฟ ววฟฟ ววฟฟ ฟฟฟฟ วววว ฟฟฟฟ วววว ฟวฟว ฟวฟว ฟวฟว ฟวฟว วววว ฟฟฟฟ วววว ฟฟฟฟ",
    "ฟฟวว ฟฟวว ฟฟวว ฟฟวว ววฟฟ ววฟฟ ววฟฟ ววฟฟ ฟฟฟฟ วววว ฟฟฟฟ วววว ฟฟฟฟ วววว ฟฟฟว ฟฟฟว วววฟ วววฟ ฟฟฟว ฟฟฟว วววฟ วววฟ ฟววว วฟฟฟ"
];
const typingText = document.querySelector(".typing-text p"),
inpField = document.querySelector(".wrapper .input-field"),
mistakeTag = document.querySelector(".mistake span"),
timeTag = document.querySelector(".time span b"),
wpmTag = document.querySelector(".wpm span "),
cpmTag = document.querySelector(".cpm span "),
tryAgainBtn = document.querySelector(".butt");

let timer,
maxTime = 60,
timeLeft = maxTime,
charIndex = mistakes = isTyping = 0;

function randomParagraph() {
    // console.log(randomText[0]);
    let randIndex = Math.floor(Math.random() * randomText.length);
    typingText.innerHTML = "";
    randomText[randIndex].split("").forEach(span => {
        let spanTag = `<span>${span}</span>`;
        typingText.innerHTML += spanTag;
    });
    document.addEventListener("keydown", () => inpField.focus());
    typingText.addEventListener("keydown", () => inpField.focus());
}
function initTyping() {
    const characters = typingText.querySelectorAll("span");
    let typedChar = inpField.value.split("")[charIndex];
    if(charIndex < characters.length - 1 && timeLeft > 0) {
        if(!isTyping) {
            timer = setInterval(initTimer, 1000);
            isTyping = true;
        }
        if(typedChar == null) {
            charIndex--;
            if(characters[charIndex].classList.contains("incorrect")){
                mistakes--;
            }
            characters[charIndex].classList.remove("correct","incorrect");
        }
        else{
            if(characters[charIndex].innerText === typedChar) {
                characters[charIndex].classList.add("correct");
            }
            else {
                mistakes++;
                characters[charIndex].classList.add("incorrect");
            }
            charIndex++;
        }
        characters.forEach(span => span.classList.remove("active"));
        characters[charIndex].classList.add("active");
    
        let wpm = Math.round((((charIndex - mistakes)/5)/(maxTime - timeLeft))*60);
        wpm = wpm < 0 || !wpm || wpm === Infinity ? 0 : wpm;
        mistakeTag.innerText = mistakes;
        wpmTag.innerText = wpm;
        cpmTag.innerText = charIndex - mistakes;
    }
    else {
        clearInterval(timer);
    }
}

function initTimer() {
    if(timeLeft > 0) {
        timeLeft--;
        timeTag.innerText = timeLeft;
    }
    else {
        inpField.value = "";
        clearInterval(timer);
    }
}
function resetTyping() {
    randomParagraph();
    inpField.value = "";
    clearInterval(timer);
    timeLeft = maxTime, 
    charIndex = mistakes = isTyping = 0;
    timeTag.innerText = timeLeft;
    mistakeTag.innerText = mistakes;
    wpmTag.innerText = 0;
    cpmTag.innerText = 0;
}

randomParagraph();

inpField.addEventListener("input", initTyping);
tryAgainBtn.addEventListener("click", resetTyping);

//----- Keyboard ------//
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