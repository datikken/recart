/*
    @param Method
    @param Me
 */
let fetch_call = async function (url, method, ...body) {
    let result;

    let params = {
        method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer'
    }

    if (body) {
        params.body = JSON.stringify(...body)
    }

    await fetch(url, params)
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            result = data;
        });

    return result;
}

export {fetch_call}