let PassRandom = document.querySelector('.inpGencode');
let close = document.querySelector('.close');

// create_code
function create_Random_code() {
    var random_code = '';
    var random_code_Length = 6;
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for(var i = 0 ; i < random_code_Length ; i++) {
        var randomCode = Math.floor(Math.random() * characters.length);
        random_code += characters.substring(randomCode, randomCode+1);
    }
    PassRandom.value = random_code;
}