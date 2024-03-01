var textarea = document.querySelectorAll('.textarea_style');
console.log(textarea)
textarea.forEach(function(ww) {
    console.log(ww)
    textarea.addEventListener('keydown', function(){
        console.log('sdds')
        if(this.scrollTop > 0){
            this.style.height = this.scrollHeight + "px";
        }
    })

});
