const url = 'http://127.0.0.1:8000/api/like/create';
const token = document.querySelector("input[name='_token']").value;
const myForm = document.querySelectorAll('.likeForm');

myForm.forEach((element) => {
    element.addEventListener('click', (event) => {
        event.preventDefault();

        let btn = document.getElementById(element[name = "likeable_id"].value);

        let sendData = {
            'user_id': element[name = "user_id"].value,
            'likeable_id': element[name = "likeable_id"].value,
        };

        fetch(url,{
            method: 'POST',
            body: JSON.stringify(sendData),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-Token': token
            }
        }).then(response => response.json())
            .then(res => {
                if (res === 'created') {
                    btn.style.fill = 'red';
                } else if (res === 'deleted') {
                    btn.style.fill = 'white'
                }
            }).catch(error => {
                console.log(error)
            });
        });
    });
