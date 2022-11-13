//Функция для получения access_token из location.hash
function getHash() {
    let hash = window.location.hash;
    return (hash) ? hash : false;
}

function getAccessToken(hash) {
    let token = hash.split('access_token=')[1];
    token = token.split('=')[0];
    token = token.split('&')[0];
    return token;
}
//Время жизни токена в секундах
function getExpires(hash) {
    let expires = hash.split('&expires_in=')[1];
    expires = (expires.split('&')[0]);
    return expires;
}

function getUserId(hash) {
    let userId = hash.split('user_id=')[1];
    userId = userId.split('&')[0];
    return userId;
}

function setTokenProp() {
    let hash = getHash();
    if (hash) {
        // document.cookie = 'token_vk=' + getAccessToken(hash) + '; path=/; expires= ' + getExpires(hash);
        // document.cookie = 'user_vk_id=' + getUserId(hash);
        // console.log('Токен - ' + getAccessToken(hash));
        // console.log('Время жизни токена  - ' + getExpires(hash));
        // console.log('ID пользователя - ' + getUserId(hash));
        console.log(document.cookie)
    }
}
