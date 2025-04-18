THREE.OrbitControls = function(t, e) {
    function n() {
        return 2 * Math.PI / 60 / 60 * p.autoRotateSpeed
    }

    function o() {
        return Math.pow(.95, p.zoomSpeed)
    }

    function a(t) {
        if (p.enabled !== !1) {
            if (t.preventDefault(), 0 === t.button) {
                if (p.noRotate === !0) return;
                j = V.ROTATE, E.set(t.clientX, t.clientY)
            } else if (1 === t.button) {
                if (p.noZoom === !0) return;
                j = V.DOLLY, O.set(t.clientX, t.clientY)
            } else if (2 === t.button) {
                if (p.noPan === !0) return;
                j = V.PAN, b.set(t.clientX, t.clientY)
            }
            document.addEventListener("mousemove", i, !1), document.addEventListener("mouseup", s, !1), p.dispatchEvent(A)
        }
    }

    function i(t) {
        if (p.enabled !== !1) {
            t.preventDefault();
            var e = p.domElement === document ? p.domElement.body : p.domElement;
            if (j === V.ROTATE) {
                if (p.noRotate === !0) return;
                m.set(t.clientX, t.clientY), f.subVectors(m, E), p.rotateLeft(2 * Math.PI * f.x / e.clientWidth * p.rotateSpeed), p.rotateUp(2 * Math.PI * f.y / e.clientHeight * p.rotateSpeed), E.copy(m)
            } else if (j === V.DOLLY) {
                if (p.noZoom === !0) return;
                R.set(t.clientX, t.clientY), H.subVectors(R, O), H.y > 0 ? p.dollyIn() : p.dollyOut(), O.copy(R)
            } else if (j === V.PAN) {
                if (p.noPan === !0) return;
                v.set(t.clientX, t.clientY), y.subVectors(v, b), p.pan(y.x, y.y), b.copy(v)
            }
            p.update()
        }
    }

    function s() {
        p.enabled !== !1 && (document.removeEventListener("mousemove", i, !1), document.removeEventListener("mouseup", s, !1), p.dispatchEvent(S), j = V.NONE)
    }

    function c(t) {
        if (p.enabled !== !1 && p.noZoom !== !0) {
            t.preventDefault(), t.stopPropagation();
            var e = 0;
            void 0 !== t.wheelDelta ? e = t.wheelDelta : void 0 !== t.detail && (e = -t.detail), e > 0 ? p.dollyOut() : p.dollyIn(), p.update(), p.dispatchEvent(A), p.dispatchEvent(S)
        }
    }

    function r(t) {
        if (p.enabled !== !1 && p.noKeys !== !0 && p.noPan !== !0) switch (t.keyCode) {
            case p.keys.UP:
                p.pan(0, p.keyPanSpeed), p.update();
                break;
            case p.keys.BOTTOM:
                p.pan(0, -p.keyPanSpeed), p.update();
                break;
            case p.keys.LEFT:
                p.pan(p.keyPanSpeed, 0), p.update();
                break;
            case p.keys.RIGHT:
                p.pan(-p.keyPanSpeed, 0), p.update()
        }
    }

    function h(t) {
        if (p.enabled !== !1) {
            switch (t.touches.length) {
                case 1:
                    if (p.noRotate === !0) return;
                    j = V.TOUCH_ROTATE, E.set(t.touches[0].pageX, t.touches[0].pageY);
                    break;
                case 2:
                    if (p.noZoom === !0) return;
                    j = V.TOUCH_DOLLY;
                    var e = t.touches[0].pageX - t.touches[1].pageX,
                        n = t.touches[0].pageY - t.touches[1].pageY,
                        o = Math.sqrt(e * e + n * n);
                    O.set(0, o);
                    break;
                case 3:
                    if (p.noPan === !0) return;
                    j = V.TOUCH_PAN, b.set(t.touches[0].pageX, t.touches[0].pageY);
                    break;
                default:
                    j = V.NONE
            }
            p.dispatchEvent(A)
        }
    }

    function d(t) {
        if (p.enabled !== !1) {
            t.preventDefault(), t.stopPropagation();
            var e = p.domElement === document ? p.domElement.body : p.domElement;
            switch (t.touches.length) {
                case 1:
                    if (p.noRotate === !0) return;
                    if (j !== V.TOUCH_ROTATE) return;
                    m.set(t.touches[0].pageX, t.touches[0].pageY), f.subVectors(m, E), p.rotateLeft(2 * Math.PI * f.x / e.clientWidth * p.rotateSpeed), p.rotateUp(2 * Math.PI * f.y / e.clientHeight * p.rotateSpeed), E.copy(m), p.update();
                    break;
                case 2:
                    if (p.noZoom === !0) return;
                    if (j !== V.TOUCH_DOLLY) return;
                    var n = t.touches[0].pageX - t.touches[1].pageX,
                        o = t.touches[0].pageY - t.touches[1].pageY,
                        a = Math.sqrt(n * n + o * o);
                    R.set(0, a), H.subVectors(R, O), H.y > 0 ? p.dollyOut() : p.dollyIn(), O.copy(R), p.update();
                    break;
                case 3:
                    if (p.noPan === !0) return;
                    if (j !== V.TOUCH_PAN) return;
                    v.set(t.touches[0].pageX, t.touches[0].pageY), y.subVectors(v, b), p.pan(y.x, y.y), b.copy(v), p.update();
                    break;
                default:
                    j = V.NONE
            }
        }
    }

    function u() {
        p.enabled !== !1 && (p.dispatchEvent(S), j = V.NONE)
    }
    this.object = t, this.domElement = void 0 !== e ? e : document, this.enabled = !0, this.target = new THREE.Vector3, this.center = this.target, this.noZoom = !1, this.zoomSpeed = 1, this.minDistance = 0, this.maxDistance = 1 / 0, this.noRotate = !1, this.rotateSpeed = 1, this.noPan = !1, this.keyPanSpeed = 7, this.autoRotate = !1, this.autoRotateSpeed = 2, this.minPolarAngle = 0, this.maxPolarAngle = Math.PI, this.noKeys = !1, this.keys = {
        LEFT: 37,
        UP: 38,
        RIGHT: 39,
        BOTTOM: 40
    };
    var p = this,
        l = 1e-6,
        E = new THREE.Vector2,
        m = new THREE.Vector2,
        f = new THREE.Vector2,
        b = new THREE.Vector2,
        v = new THREE.Vector2,
        y = new THREE.Vector2,
        T = new THREE.Vector3,
        g = new THREE.Vector3,
        O = new THREE.Vector2,
        R = new THREE.Vector2,
        H = new THREE.Vector2,
        L = 0,
        P = 0,
        w = 1,
        M = new THREE.Vector3,
        k = new THREE.Vector3,
        N = new THREE.Quaternion,
        V = {
            NONE: -1,
            ROTATE: 0,
            DOLLY: 1,
            PAN: 2,
            TOUCH_ROTATE: 3,
            TOUCH_DOLLY: 4,
            TOUCH_PAN: 5
        },
        j = V.NONE;
    this.target0 = this.target.clone(), this.position0 = this.object.position.clone();
    var Y = (new THREE.Quaternion).setFromUnitVectors(t.up, new THREE.Vector3(0, 1, 0)),
        D = Y.clone().inverse(),
        x = {
            type: "change"
        },
        A = {
            type: "start"
        },
        S = {
            type: "end"
        };
    this.rotateLeft = function(t) {
        void 0 === t && (t = n()), P -= t
    }, this.rotateUp = function(t) {
        void 0 === t && (t = n()), L -= t
    }, this.panLeft = function(t) {
        var e = this.object.matrix.elements;
        T.set(e[0], e[1], e[2]), T.multiplyScalar(-t), M.add(T)
    }, this.panUp = function(t) {
        var e = this.object.matrix.elements;
        T.set(e[4], e[5], e[6]), T.multiplyScalar(t), M.add(T)
    }, this.pan = function(t, e) {
        var n = p.domElement === document ? p.domElement.body : p.domElement;
        if (void 0 !== p.object.fov) {
            var o = p.object.position,
                a = o.clone().sub(p.target),
                i = a.length();
            i *= Math.tan(p.object.fov / 2 * Math.PI / 180), p.panLeft(2 * t * i / n.clientHeight), p.panUp(2 * e * i / n.clientHeight)
        } else void 0 !== p.object.top ? (p.panLeft(t * (p.object.right - p.object.left) / n.clientWidth), p.panUp(e * (p.object.top - p.object.bottom) / n.clientHeight)) : console.warn("WARNING: OrbitControls.js encountered an unknown camera type - pan disabled.")
    }, this.dollyIn = function(t) {
        void 0 === t && (t = o()), w /= t
    }, this.dollyOut = function(t) {
        void 0 === t && (t = o()), w *= t
    }, this.update = function() {
        var t = this.object.position;
        g.copy(t).sub(this.target), g.applyQuaternion(Y);
        var e = Math.atan2(g.x, g.z),
            o = Math.atan2(Math.sqrt(g.x * g.x + g.z * g.z), g.y);
        this.autoRotate && this.rotateLeft(n()), e += P, o += L, o = Math.max(this.minPolarAngle, Math.min(this.maxPolarAngle, o)), o = Math.max(l, Math.min(Math.PI - l, o));
        var a = g.length() * w;
        a = Math.max(this.minDistance, Math.min(this.maxDistance, a)), this.target.add(M), g.x = a * Math.sin(o) * Math.sin(e), g.y = a * Math.cos(o), g.z = a * Math.sin(o) * Math.cos(e), g.applyQuaternion(D), t.copy(this.target).add(g), this.object.lookAt(this.target), P = 0, L = 0, w = 1, M.set(0, 0, 0), (k.distanceToSquared(this.object.position) > l || 8 * (1 - N.dot(this.object.quaternion)) > l) && (this.dispatchEvent(x), k.copy(this.object.position), N.copy(this.object.quaternion))
    }, this.reset = function() {
        j = V.NONE, this.target.copy(this.target0), this.object.position.copy(this.position0), this.update()
    }, this.domElement.addEventListener("contextmenu", function(t) {
        t.preventDefault()
    }, !1), this.domElement.addEventListener("mousedown", a, !1), this.domElement.addEventListener("mousewheel", c, !1), this.domElement.addEventListener("DOMMouseScroll", c, !1), this.domElement.addEventListener("touchstart", h, !1), this.domElement.addEventListener("touchend", u, !1), this.domElement.addEventListener("touchmove", d, !1), window.addEventListener("keydown", r, !1), this.update()
}, THREE.OrbitControls.prototype = Object.create(THREE.EventDispatcher.prototype);