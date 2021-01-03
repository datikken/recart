function throttle (type, callback, obj) {
    obj = obj || window;
    let running = false;
    let func = function() {
        if (running) { return; }
        running = true;
        requestAnimationFrame(function() {
            callback();
            running = false;
        });
    };
    obj.addEventListener(type, func);
}
export {throttle};
