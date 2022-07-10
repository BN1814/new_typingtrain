const str = "ffff jjjj ffff jjjj fjfj fjfj fjfj fjfj jjjj ffff jjjj ffff jfjf jfjf jfjf jfjf ffjj ffjj ffjj ffjj jjff jjff jjff jjff"
const text = document.querySelector('.text')
const input = document.querySelector('.input')
const progressBar = document.querySelector('.progress-bar')
const charEls = []

function populateText(str) {
    str.split("").map(letter => {
        const span = document.createElement("span")
        span.innerText = letter
        text.appendChild(span)
        charEls.push(span)
    });
}
populateText(str)

input.addEventListener("keyup", () => {
    const val = input.value
    console.log(val)
})
