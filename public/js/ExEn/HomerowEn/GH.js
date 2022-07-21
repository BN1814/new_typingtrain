const randomText = [
    "gggg gggg gggg gggg hhhh hhhh hhhh hhhh gghh gghh gghh gghh hhgg hhgg hhgg hhgg ghgh ghgh ghgh ghgh hghg hghg hghg hghg gggh gggh gggh gggh hhhg hhhg hhhg hhhg",
    "ghgh ghgh hghg hghg hhhg hhhg gggh gggh ghhh ghhh hggh hggh gggg gggg hhhh hhhh gghh gghh hhgg hhgg hhhh gggg hhhh gggg hggh hggh ghhg ghhg ghgh ghgh hghg hghg",
    "hhhh hhhh hhhh hhhh gggg gggg gggg gggg hhhg hhhg hhhg hhhg ghhh ghhh ghhh ghhh hggh hggh hggh hggh ghhg ghhg ghhg ghhg hhgg hhgg hhgg hhgg gghh gghh gghh gghh"
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