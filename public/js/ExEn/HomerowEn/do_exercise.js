const randomText = [document.getElementById("Typingtext").innerText];
const typingText = document.querySelector(".typing-text p"),
    inpField = document.querySelector(".wrapper .input-field"),
    mistakeTag = document.querySelector(".mistake span"),
    timeTag = document.querySelector(".time span b"),
    wpmTag = document.querySelector(".wpm span "),
    cpmTag = document.querySelector(".cpm span "),
    scoreTag = document.querySelector(".score span "),
    data = document.querySelector("#data");
// tryAgainBtn = document.querySelector(".butt");

let timer,
    maxTime = 60 ,
    timeLeft = maxTime,
    charIndex = (mistakes = isTyping = 0);

function randomParagraph() {
    // console.log(randomText[0]);
    let randIndex = [Math.floor(Math.random() * randomText.length)];
    typingText.innerHTML = "";
    randomText[randIndex].split("").forEach((span) => {
        let spanTag = `<span>${span}</span>`;
        typingText.innerHTML += spanTag;
    });
    document.addEventListener("keydown", () => inpField.focus());
    typingText.addEventListener("keydown", () => inpField.focus());
}
// ขั้นตอนระหว่างการทำแบบทดสอบ
function initTyping() {
    const characters = typingText.querySelectorAll("span");
    let typedChar = inpField.value.split("")[charIndex];
    if (charIndex < characters.length && timeLeft > 0) {
        if (!isTyping) {
            timer = setInterval(initTimer, 1000);
            isTyping = true;
        }
        if (typedChar == null) {
            charIndex--;
            if (characters[charIndex].classList.contains("incorrect")) {
                mistakes--;
            }
            characters[charIndex].classList.remove("correct", "incorrect");
        } else {
            if (characters[charIndex].innerText === typedChar) {
                characters[charIndex].classList.add("correct");
            } else {
                mistakes++;
                characters[charIndex].classList.add("incorrect");
            }
            charIndex++;
        }
        characters.forEach((span) => span.classList.remove("active"));
        characters[charIndex].classList.add("active");

        let wpm = Math.round(
            ((charIndex - mistakes) / 5 / (maxTime - timeLeft)) * 60
        );
        wpm = wpm < 0 || !wpm || wpm === Infinity ? 0 : wpm;
        mistakeTag.innerText = mistakes;
        wpmTag.innerText = wpm;
        cpmTag.innerText = charIndex - mistakes;
    } else {
        // if (characters[charIndex].innerText === typedChar) {
        //     characters[charIndex].classList.add("correct");
        // } else {
        //     mistakes++;
        //     characters[charIndex].classList.add("incorrect");
        // }
        // charIndex++;
        // characters.forEach((span) => span.classList.remove("active"));
        let wpm = Math.round(
            ((charIndex - mistakes) / 5 / (maxTime - timeLeft)) * 60
        );
        wpm = wpm < 0 || !wpm || wpm === Infinity ? 0 : wpm;
        mistakeTag.innerText = mistakes;
        wpmTag.innerText = wpm;
        cpmTag.innerText = Math.ceil(
            ((charIndex - mistakes) / (charIndex + mistakes)) * 100
        );
        scoreTag.innerText = Math.ceil(
            // (charIndex - mistakes) / ((charIndex + mistakes) / 100)
            ((charIndex - mistakes) / (charIndex + mistakes)) * 100
            // characters[charIndex - mistake].length * 100
        );
        Open_score();
        clearInterval(timer);
    }
}
// จับเวลา
function initTimer() {
    if (timeLeft > 0) {
        timeLeft--;
        timeTag.innerText = timeLeft;
    } else {
        inpField.value = "";
        clearInterval(timer);
        Open_score();
    }
}
// เริ่มแบบฝีกหัดใหม่
function resetTyping() {
    randomParagraph();
    inpField.value = "";
    clearInterval(timer);
    (timeLeft = maxTime), (charIndex = mistakes = isTyping = 0);
    timeTag.innerText = timeLeft;
    mistakeTag.innerText = mistakes;
    wpmTag.innerText = 0;
    cpmTag.innerText = 0;
    scoreTag.innerText = 0;
}

randomParagraph();

inpField.addEventListener("input", initTyping);
// tryAgainBtn.addEventListener("click", resetTyping);
