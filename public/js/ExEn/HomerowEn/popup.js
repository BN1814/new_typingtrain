// POPUP_SCORE
let popup = document.getElementById("close_popup");
let tryAgainScore = document.querySelector(".try_again");
let next = document.querySelector(".next");
let submit = document.querySelector(".submit");
let poptime = document.querySelector("#poptime");
let popmistake = document.querySelector("#popmistake");
let popwpm = document.querySelector("#popwpm");
let popcpm = document.querySelector("#popcpm");
let popscore = document.querySelector("#popscore");
let body = document.querySelector("#body");

function Close_score() {
    document.querySelector(".pop-up-score").style.display = "none";
}
function Open_score() {
    document.querySelector(".pop-up-score").style.display = "flex";
    poptime.value = 60 - timeTag.innerHTML;
    popmistake.value = mistakeTag.innerHTML;
    popwpm.value = wpmTag.innerHTML;
    popcpm.value = cpmTag.innerHTML;
    popscore.value = scoreTag.innerHTML;
    closeSound();
}

popup.addEventListener("click", Close_score);
tryAgainScore.addEventListener("click", function () {
    resetTyping();
    Close_score();
});
// next.addEventListener("click", Close_score);
// POPUP_SCORE_KEYCODE
// document.addEventListener("keydown", function (e) {
//     if (e.keyCode === 27) {
//         Close_score();
//     }
// });