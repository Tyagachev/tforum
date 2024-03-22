const textareaComments = document.querySelectorAll(".textarea_style");
const countTextareaComments = document.querySelectorAll(".count_letter-text");
const btnCommentsSend = document.querySelectorAll('button.btn.btn-info.btn-send');
textareaComments.forEach(function (element) {
    element.addEventListener('keydown', function (event) {
        countTextareaComments.forEach(function (textElement){
            btnCommentsSend.forEach(function (btnCommentsElement){
                element.value = element.value.slice(0, 999);
                let textlength = 999 - element.value.length;
                if(textlength <= 10) {
                    textElement.style.color = 'red';
                } else {
                    textElement.style.color = 'green';
                }
                textElement.innerHTML = `${textlength}`;
                if (textlength === 0) {
                    btnCommentsElement.classList.add('disabled')
                } else if (textlength >= 1) {
                    btnCommentsElement.classList.remove('disabled')
                }
            });
        });
    });
});

