const input = document.querySelector(".form_topic-title");
const textarea = document.querySelector(".form_topic-textarea");
const countInput = document.querySelector(".count_letter-title");
const countTextarea = document.querySelector(".count_letter-text");

/**
 * Подсчет символов в инпуте
 * создания поста
 */
input.oninput = function()
{
    input.value = input.value.slice(0, 40);
    const textlength = 40 - input.value.length;
    if(textlength <= 10) {
        countInput.style.color = 'red';
    } else {
        countInput.style.color = 'green';
    }
    countInput.innerText = `${textlength}`;
}

/**
 * Подсчет символов в текстовом поле
 * создания поста
 */
textarea.oninput = function()
{
    textarea.value = textarea.value.slice(0, 2000);
    const textlength = 2000 - textarea.value.length;
    if(textlength <= 50) {
        countTextarea.style.color = 'red';
    } else {
        countTextarea.style.color = 'green';
    }
    countTextarea.innerText = `${textlength}`;
}

