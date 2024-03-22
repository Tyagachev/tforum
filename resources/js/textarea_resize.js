var area = document.querySelectorAll('.textarea_style');
area.forEach(function(e) {
    e.addEventListener('keydown', function(){
        e.style.height = "auto";
        e.style.height = this.scrollHeight + "px";

        area.onscroll = function () {
            this.scrollTop = 0;
        };
    })
});
