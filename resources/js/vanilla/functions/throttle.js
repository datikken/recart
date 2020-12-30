function throttle(callback, limit, ctx = null, last = false) {
    let wait = false;
    return function () {
        if (!wait) {
            if (!last) {
                callback.apply(ctx, arguments);
            }
            wait = true;
            setTimeout(function () {
                wait = false;
                if (last) {
                    callback.apply(ctx, arguments);
                }
            }, limit);
        }
    }
}

export {throttle}
