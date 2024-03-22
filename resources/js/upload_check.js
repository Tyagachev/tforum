
    const btn = document.getElementById("btn_upload")
    const upload = document.getElementById("formFile");
    const err = document.querySelector(".err");
    const maxAllowedSize = 2 * 1024 * 1024;
    upload.addEventListener('change', upload_check);
    function upload_check()
    {
    if (upload.size === 0) {
        btn.disabled = true;
    } else if (upload.files[0].size > maxAllowedSize){
        btn.disabled = true;
        upload.value = "";
        err.style.color = "red";
        err.innerHTML = "Упс... файл больше 2 МБ!";
    } else {
        btn.disabled = false;
    }
}
