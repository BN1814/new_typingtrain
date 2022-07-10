const randomText = [
    "dddd dddd dddd dddd kkkk kkkk kkkk kkkk ddkk ddkk ddkk ddkk kkdd kkdd kkdd kkdd dkdk dkdk dkdk dkdk kdkd kdkd kdkd kdkd dddk dddk dddk dddk kddd kddd kddd kddd",
    "kkkk kkkk kkkk kkkk dddd dddd dddd dddd kddd kddd kddd kddd dddk dddk dddk dddk kdkd kdkd kdkd kdkd dkdk dkdk dkdk dkdk kkdd kkdd kkdd kkdd ddkk ddkk ddkk ddkk",
    "dddk dddk dddk dddk kkkd kkkd kkkd kkkd dkdk dkdk kdkd kdkd ddkk ddkk ddkk ddkk kkdd kkdd kkdd kkdd dddd kkkk dddd kkkk dddd kkkk dddd kkkk kdkd kdkd dkdk dkdk"
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