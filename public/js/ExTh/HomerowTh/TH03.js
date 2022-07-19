const randomText = [
    "หหหห หหหห หหหห หหหห สสสส สสสส สสสส สสสส หหสส หหสส หหสส หหสส สสหห สสหห สสหห สสหห หสหส หสหส หสหส หสหส สหสห สหสห สหสห สหสห หหหส หหหส หหหส หหหส สหหห สหหห สหหห สหหห",
    "สสสส สสสส สสสส สสสส หหหห หหหห หหหห หหหห สหหห สหหห สหหห สหหห หหหส หหหส หหหส หหหส สหสห สหสห สหสห สหสห หสหส หสหส หสหส หสหส สสหห สสหห สสหห สสหห หหสส หหสส หหสส หหสส",
    "หหหส หหหส หหหส หหหส สสสห สสสห สสสห สสสห หสหส หสหส สหสห สหสห หหสส หหสส หหสส หหสส สสหห สสหห สสหห สสหห หหหห สสสส หหหห สสสส หหหห สสสส หหหห สสสส สหสห สหสห หสหส หสหส"
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