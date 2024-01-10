function upload_check()
{
    const btn = document.getElementById("btn")
    const upload = document.getElementById("file_id");
    const err = document.querySelector(".err");
    const maxAllowedSize = 40 * 1024 * 1024;

    if (upload.size === 0) {
        btn.disabled = true;
    } else if (upload.files[0].size > maxAllowedSize){
        btn.disabled = true;
        upload.value = "";
        err.style.color = "red";
        err.innerHTML = "Файл больше 20мб.!";
    } else {
        btn.disabled = false;
    }
};
