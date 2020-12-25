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

                return result;
            }

            if (array.length > 1) {
                state.informationPosts = separeteCategories(array)
            }
        })
        .catch((err) => {
            console.log('information posts err', err);
        })
}

export {getAllInformationPosts}
