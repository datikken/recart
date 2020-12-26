function getAllInformationPosts(state) {
    state.informationPosts = false;

    fetch('/getInformationPosts', {
        method: "get",
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer'
    })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            let array = Object.values(data);

            function separeteCategories(prop) {
                let that = this;
                let result = [];

                prop.forEach(arr => {
                    result.push(arr)
                })

                console.log('separate inf arr', result)

                return result;
            }

            state.informationPosts = separeteCategories(array)

            console.warn('state in getALlPosts', state.informationPosts)
        })
        .catch((err) => {
            console.log('information posts err', err);
        })
}

export {getAllInformationPosts}
