const urlCreate = '/api/like/create';
const urlShow = '/api/like/show';
const token = document.querySelector("input[name='_token']").value;
const myForm = document.querySelectorAll('.likeForm');
myForm.forEach((element) => {
    element.addEventListener('click', (event) => {
        event.preventDefault();

        let like = document.getElementById(element[name = "likeable_id"].value);
        let countLike = document.getElementById('count_comment_' + element[name = "likeable_id"].value);
        let sendData = {
            'user_id': element[name = "user_id"].value,
            'likeable_id': element[name = "likeable_id"].value,
        };

        fetch(urlCreate,{
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
                    like.style.fill = 'red';
                } else if (res === 'deleted') {
                    like.style.fill = 'white'
                }
            }).catch(error => {
                console.log(error)
            });
        getLikesCount(like, countLike)
        });
    });

/**
 * Функция запроса количества
 * лайков у комментария
 *
 * @param like
 * @param countLike
 */
function getLikesCount(like, countLike) {
    let commentId = {
        'comment_id': like.id
    }
    fetch(urlShow, {
        method: 'POST',
        body: JSON.stringify(commentId),
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-Token': token
        }
    }).then(response => response.json())
        .then(res => {
            countLike.innerHTML = res;
        })
}
