var Detector = {
    canvas: !!window.CanvasRenderingContext2D,
    webgl: function() {
        try {
            var e = document.createElement("canvas");
            return !!window.WebGLRenderingContext && (e.getContext("webgl") || e.getContext("experimental-webgl"))
        } catch (t) {
            return !1
        }
    }(),
    workers: !!window.Worker,
    fileapi: window.File && window.FileReader && window.FileList && window.Blob,
    getWebGLErrorMessage: function() {
        var e = document.createElement("div");
        return e.id = "webgl-error-message", e.style.fontFamily = "monospace", e.style.fontSize = "13px", e.style.fontWeight = "normal", e.style.textAlign = "center", e.style.background = "#fff", e.style.color = "#000", e.style.padding = "1.5em", e.style.width = "400px", e.style.margin = "5em auto 0", this.webgl || (e.innerHTML = window.WebGLRenderingContext ? ['Your graphics card does not seem to support <a href="http://khronos.org/webgl/wiki/Getting_a_WebGL_Implementation" style="color:#000">WebGL</a>.<br />', 'Find out how to get it <a href="http://get.webgl.org/" style="color:#000">here</a>.'].join("\n") : ['Your browser does not seem to support <a href="http://khronos.org/webgl/wiki/Getting_a_WebGL_Implementation" style="color:#000">WebGL</a>.<br/>', 'Find out how to get it <a href="http://get.webgl.org/" style="color:#000">here</a>.'].join("\n")), e
    },
    addGetWebGLMessage: function(e) {
        var t, o, n;
        e = e || {}, t = void 0 !== e.parent ? e.parent : document.body, o = void 0 !== e.id ? e.id : "oldie", n = Detector.getWebGLErrorMessage(), n.id = o, t.appendChild(n)
    }
};