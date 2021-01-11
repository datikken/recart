let passwordLength = function (str, length = 8) {
    if(str.length < length) {
        return `Пароль должен быть не менее ${length} сиволов.`
    } else {
        return true;
    }
}

export {passwordLength}
