var THREE = {
    REVISION: "68"
};
"object" == typeof module && (module.exports = THREE), THREE.CullFaceNone = 0, THREE.CullFaceBack = 1, THREE.CullFaceFront = 2, THREE.CullFaceFrontBack = 3, THREE.FrontFaceDirectionCW = 0, THREE.FrontFaceDirectionCCW = 1, THREE.BasicShadowMap = 0, THREE.PCFShadowMap = 1, THREE.PCFSoftShadowMap = 2, THREE.FrontSide = 0, THREE.BackSide = 1, THREE.DoubleSide = 2, THREE.NoShading = 0, THREE.FlatShading = 1, THREE.SmoothShading = 2, THREE.NoColors = 0, THREE.FaceColors = 1, THREE.VertexColors = 2, THREE.NoBlending = 0, THREE.NormalBlending = 1, THREE.AdditiveBlending = 2, THREE.SubtractiveBlending = 3, THREE.MultiplyBlending = 4, THREE.CustomBlending = 5, THREE.AddEquation = 100, THREE.SubtractEquation = 101, THREE.ReverseSubtractEquation = 102, THREE.ZeroFactor = 200, THREE.OneFactor = 201, THREE.SrcColorFactor = 202, THREE.OneMinusSrcColorFactor = 203, THREE.SrcAlphaFactor = 204, THREE.OneMinusSrcAlphaFactor = 205, THREE.DstAlphaFactor = 206, THREE.OneMinusDstAlphaFactor = 207, THREE.DstColorFactor = 208, THREE.OneMinusDstColorFactor = 209, THREE.SrcAlphaSaturateFactor = 210, THREE.MultiplyOperation = 0, THREE.MixOperation = 1, THREE.AddOperation = 2, THREE.UVMapping = function() {}, THREE.CubeReflectionMapping = function() {}, THREE.CubeRefractionMapping = function() {}, THREE.SphericalReflectionMapping = function() {}, THREE.SphericalRefractionMapping = function() {}, THREE.RepeatWrapping = 1e3, THREE.ClampToEdgeWrapping = 1001, THREE.MirroredRepeatWrapping = 1002, THREE.NearestFilter = 1003, THREE.NearestMipMapNearestFilter = 1004, THREE.NearestMipMapLinearFilter = 1005, THREE.LinearFilter = 1006, THREE.LinearMipMapNearestFilter = 1007, THREE.LinearMipMapLinearFilter = 1008, THREE.UnsignedByteType = 1009, THREE.ByteType = 1010, THREE.ShortType = 1011, THREE.UnsignedShortType = 1012, THREE.IntType = 1013, THREE.UnsignedIntType = 1014, THREE.FloatType = 1015, THREE.UnsignedShort4444Type = 1016, THREE.UnsignedShort5551Type = 1017, THREE.UnsignedShort565Type = 1018, THREE.AlphaFormat = 1019, THREE.RGBFormat = 1020, THREE.RGBAFormat = 1021, THREE.LuminanceFormat = 1022, THREE.LuminanceAlphaFormat = 1023, THREE.RGB_S3TC_DXT1_Format = 2001, THREE.RGBA_S3TC_DXT1_Format = 2002, THREE.RGBA_S3TC_DXT3_Format = 2003, THREE.RGBA_S3TC_DXT5_Format = 2004, THREE.Color = function(e) {
        return 3 === arguments.length ? this.setRGB(arguments[0], arguments[1], arguments[2]) : this.set(e)
    }, THREE.Color.prototype = {
        constructor: THREE.Color,
        r: 1,
        g: 1,
        b: 1,
        set: function(e) {
            return e instanceof THREE.Color ? this.copy(e) : "number" == typeof e ? this.setHex(e) : "string" == typeof e && this.setStyle(e), this
        },
        setHex: function(e) {
            return e = Math.floor(e), this.r = (e >> 16 & 255) / 255, this.g = (e >> 8 & 255) / 255, this.b = (255 & e) / 255, this
        },
        setRGB: function(e, t, r) {
            return this.r = e, this.g = t, this.b = r, this
        },
        setHSL: function(e, t, r) {
            if (0 === t) this.r = this.g = this.b = r;
            else {
                var i = function(e, t, r) {
                        return 0 > r && (r += 1), r > 1 && (r -= 1), 1 / 6 > r ? e + 6 * (t - e) * r : .5 > r ? t : 2 / 3 > r ? e + 6 * (t - e) * (2 / 3 - r) : e
                    },
                    n = .5 >= r ? r * (1 + t) : r + t - r * t,
                    a = 2 * r - n;
                this.r = i(a, n, e + 1 / 3), this.g = i(a, n, e), this.b = i(a, n, e - 1 / 3)
            }
            return this
        },
        setStyle: function(e) {
            if (/^rgb\((\d+), ?(\d+), ?(\d+)\)$/i.test(e)) {
                var t = /^rgb\((\d+), ?(\d+), ?(\d+)\)$/i.exec(e);
                return this.r = Math.min(255, parseInt(t[1], 10)) / 255, this.g = Math.min(255, parseInt(t[2], 10)) / 255, this.b = Math.min(255, parseInt(t[3], 10)) / 255, this
            }
            if (/^rgb\((\d+)\%, ?(\d+)\%, ?(\d+)\%\)$/i.test(e)) {
                var t = /^rgb\((\d+)\%, ?(\d+)\%, ?(\d+)\%\)$/i.exec(e);
                return this.r = Math.min(100, parseInt(t[1], 10)) / 100, this.g = Math.min(100, parseInt(t[2], 10)) / 100, this.b = Math.min(100, parseInt(t[3], 10)) / 100, this
            }
            if (/^\#([0-9a-f]{6})$/i.test(e)) {
                var t = /^\#([0-9a-f]{6})$/i.exec(e);
                return this.setHex(parseInt(t[1], 16)), this
            }
            if (/^\#([0-9a-f])([0-9a-f])([0-9a-f])$/i.test(e)) {
                var t = /^\#([0-9a-f])([0-9a-f])([0-9a-f])$/i.exec(e);
                return this.setHex(parseInt(t[1] + t[1] + t[2] + t[2] + t[3] + t[3], 16)), this
            }
            return /^(\w+)$/i.test(e) ? (this.setHex(THREE.ColorKeywords[e]), this) : void 0
        },
        copy: function(e) {
            return this.r = e.r, this.g = e.g, this.b = e.b, this
        },
        copyGammaToLinear: function(e) {
            return this.r = e.r * e.r, this.g = e.g * e.g, this.b = e.b * e.b, this
        },
        copyLinearToGamma: function(e) {
            return this.r = Math.sqrt(e.r), this.g = Math.sqrt(e.g), this.b = Math.sqrt(e.b), this
        },
        convertGammaToLinear: function() {
            var e = this.r,
                t = this.g,
                r = this.b;
            return this.r = e * e, this.g = t * t, this.b = r * r, this
        },
        convertLinearToGamma: function() {
            return this.r = Math.sqrt(this.r), this.g = Math.sqrt(this.g), this.b = Math.sqrt(this.b), this
        },
        getHex: function() {
            return 255 * this.r << 16 ^ 255 * this.g << 8 ^ 255 * this.b << 0
        },
        getHexString: function() {
            return ("000000" + this.getHex().toString(16)).slice(-6)
        },
        getHSL: function(e) {
            var t, r, i = e || {
                    h: 0,
                    s: 0,
                    l: 0
                },
                n = this.r,
                a = this.g,
                o = this.b,
                s = Math.max(n, a, o),
                h = Math.min(n, a, o),
                l = (h + s) / 2;
            if (h === s) t = 0, r = 0;
            else {
                var c = s - h;
                switch (r = .5 >= l ? c / (s + h) : c / (2 - s - h), s) {
                    case n:
                        t = (a - o) / c + (o > a ? 6 : 0);
                        break;
                    case a:
                        t = (o - n) / c + 2;
                        break;
                    case o:
                        t = (n - a) / c + 4
                }
                t /= 6
            }
            return i.h = t, i.s = r, i.l = l, i
        },
        getStyle: function() {
            return "rgb(" + (255 * this.r | 0) + "," + (255 * this.g | 0) + "," + (255 * this.b | 0) + ")"
        },
        offsetHSL: function(e, t, r) {
            var i = this.getHSL();
            return i.h += e, i.s += t, i.l += r, this.setHSL(i.h, i.s, i.l), this
        },
        add: function(e) {
            return this.r += e.r, this.g += e.g, this.b += e.b, this
        },
        addColors: function(e, t) {
            return this.r = e.r + t.r, this.g = e.g + t.g, this.b = e.b + t.b, this
        },
        addScalar: function(e) {
            return this.r += e, this.g += e, this.b += e, this
        },
        multiply: function(e) {
            return this.r *= e.r, this.g *= e.g, this.b *= e.b, this
        },
        multiplyScalar: function(e) {
            return this.r *= e, this.g *= e, this.b *= e, this
        },
        lerp: function(e, t) {
            return this.r += (e.r - this.r) * t, this.g += (e.g - this.g) * t, this.b += (e.b - this.b) * t, this
        },
        equals: function(e) {
            return e.r === this.r && e.g === this.g && e.b === this.b
        },
        fromArray: function(e) {
            return this.r = e[0], this.g = e[1], this.b = e[2], this
        },
        toArray: function() {
            return [this.r, this.g, this.b]
        },
        clone: function() {
            return (new THREE.Color).setRGB(this.r, this.g, this.b)
        }
    }, THREE.ColorKeywords = {
        aliceblue: 15792383,
        antiquewhite: 16444375,
        aqua: 65535,
        aquamarine: 8388564,
        azure: 15794175,
        beige: 16119260,
        bisque: 16770244,
        black: 0,
        blanchedalmond: 16772045,
        blue: 255,
        blueviolet: 9055202,
        brown: 10824234,
        burlywood: 14596231,
        cadetblue: 6266528,
        chartreuse: 8388352,
        chocolate: 13789470,
        coral: 16744272,
        cornflowerblue: 6591981,
        cornsilk: 16775388,
        crimson: 14423100,
        cyan: 65535,
        darkblue: 139,
        darkcyan: 35723,
        darkgoldenrod: 12092939,
        darkgray: 11119017,
        darkgreen: 25600,
        darkgrey: 11119017,
        darkkhaki: 12433259,
        darkmagenta: 9109643,
        darkolivegreen: 5597999,
        darkorange: 16747520,
        darkorchid: 10040012,
        darkred: 9109504,
        darksalmon: 15308410,
        darkseagreen: 9419919,
        darkslateblue: 4734347,
        darkslategray: 3100495,
        darkslategrey: 3100495,
        darkturquoise: 52945,
        darkviolet: 9699539,
        deeppink: 16716947,
        deepskyblue: 49151,
        dimgray: 6908265,
        dimgrey: 6908265,
        dodgerblue: 2003199,
        firebrick: 11674146,
        floralwhite: 16775920,
        forestgreen: 2263842,
        fuchsia: 16711935,
        gainsboro: 14474460,
        ghostwhite: 16316671,
        gold: 16766720,
        goldenrod: 14329120,
        gray: 8421504,
        green: 32768,
        greenyellow: 11403055,
        grey: 8421504,
        honeydew: 15794160,
        hotpink: 16738740,
        indianred: 13458524,
        indigo: 4915330,
        ivory: 16777200,
        khaki: 15787660,
        lavender: 15132410,
        lavenderblush: 16773365,
        lawngreen: 8190976,
        lemonchiffon: 16775885,
        lightblue: 11393254,
        lightcoral: 15761536,
        lightcyan: 14745599,
        lightgoldenrodyellow: 16448210,
        lightgray: 13882323,
        lightgreen: 9498256,
        lightgrey: 13882323,
        lightpink: 16758465,
        lightsalmon: 16752762,
        lightseagreen: 2142890,
        lightskyblue: 8900346,
        lightslategray: 7833753,
        lightslategrey: 7833753,
        lightsteelblue: 11584734,
        lightyellow: 16777184,
        lime: 65280,
        limegreen: 3329330,
        linen: 16445670,
        magenta: 16711935,
        maroon: 8388608,
        mediumaquamarine: 6737322,
        mediumblue: 205,
        mediumorchid: 12211667,
        mediumpurple: 9662683,
        mediumseagreen: 3978097,
        mediumslateblue: 8087790,
        mediumspringgreen: 64154,
        mediumturquoise: 4772300,
        mediumvioletred: 13047173,
        midnightblue: 1644912,
        mintcream: 16121850,
        mistyrose: 16770273,
        moccasin: 16770229,
        navajowhite: 16768685,
        navy: 128,
        oldlace: 16643558,
        olive: 8421376,
        olivedrab: 7048739,
        orange: 16753920,
        orangered: 16729344,
        orchid: 14315734,
        palegoldenrod: 15657130,
        palegreen: 10025880,
        paleturquoise: 11529966,
        palevioletred: 14381203,
        papayawhip: 16773077,
        peachpuff: 16767673,
        peru: 13468991,
        pink: 16761035,
        plum: 14524637,
        powderblue: 11591910,
        purple: 8388736,
        red: 16711680,
        rosybrown: 12357519,
        royalblue: 4286945,
        saddlebrown: 9127187,
        salmon: 16416882,
        sandybrown: 16032864,
        seagreen: 3050327,
        seashell: 16774638,
        sienna: 10506797,
        silver: 12632256,
        skyblue: 8900331,
        slateblue: 6970061,
        slategray: 7372944,
        slategrey: 7372944,
        snow: 16775930,
        springgreen: 65407,
        steelblue: 4620980,
        tan: 13808780,
        teal: 32896,
        thistle: 14204888,
        tomato: 16737095,
        turquoise: 4251856,
        violet: 15631086,
        wheat: 16113331,
        white: 16777215,
        whitesmoke: 16119285,
        yellow: 16776960,
        yellowgreen: 10145074
    }, THREE.Quaternion = function(e, t, r, i) {
        this._x = e || 0, this._y = t || 0, this._z = r || 0, this._w = void 0 !== i ? i : 1
    }, THREE.Quaternion.prototype = {
        constructor: THREE.Quaternion,
        _x: 0,
        _y: 0,
        _z: 0,
        _w: 0,
        get x() {
            return this._x
        },
        set x(e) {
            this._x = e, this.onChangeCallback()
        },
        get y() {
            return this._y
        },
        set y(e) {
            this._y = e, this.onChangeCallback()
        },
        get z() {
            return this._z
        },
        set z(e) {
            this._z = e, this.onChangeCallback()
        },
        get w() {
            return this._w
        },
        set w(e) {
            this._w = e, this.onChangeCallback()
        },
        set: function(e, t, r, i) {
            return this._x = e, this._y = t, this._z = r, this._w = i, this.onChangeCallback(), this
        },
        copy: function(e) {
            return this._x = e.x, this._y = e.y, this._z = e.z, this._w = e.w, this.onChangeCallback(), this
        },
        setFromEuler: function(e, t) {
            if (e instanceof THREE.Euler == !1) throw new Error("THREE.Quaternion: .setFromEuler() now expects a Euler rotation rather than a Vector3 and order.");
            var r = Math.cos(e._x / 2),
                i = Math.cos(e._y / 2),
                n = Math.cos(e._z / 2),
                a = Math.sin(e._x / 2),
                o = Math.sin(e._y / 2),
                s = Math.sin(e._z / 2);
            return "XYZ" === e.order ? (this._x = a * i * n + r * o * s, this._y = r * o * n - a * i * s, this._z = r * i * s + a * o * n, this._w = r * i * n - a * o * s) : "YXZ" === e.order ? (this._x = a * i * n + r * o * s, this._y = r * o * n - a * i * s, this._z = r * i * s - a * o * n, this._w = r * i * n + a * o * s) : "ZXY" === e.order ? (this._x = a * i * n - r * o * s, this._y = r * o * n + a * i * s, this._z = r * i * s + a * o * n, this._w = r * i * n - a * o * s) : "ZYX" === e.order ? (this._x = a * i * n - r * o * s, this._y = r * o * n + a * i * s, this._z = r * i * s - a * o * n, this._w = r * i * n + a * o * s) : "YZX" === e.order ? (this._x = a * i * n + r * o * s, this._y = r * o * n + a * i * s, this._z = r * i * s - a * o * n, this._w = r * i * n - a * o * s) : "XZY" === e.order && (this._x = a * i * n - r * o * s, this._y = r * o * n - a * i * s, this._z = r * i * s + a * o * n, this._w = r * i * n + a * o * s), t !== !1 && this.onChangeCallback(), this
        },
        setFromAxisAngle: function(e, t) {
            var r = t / 2,
                i = Math.sin(r);
            return this._x = e.x * i, this._y = e.y * i, this._z = e.z * i, this._w = Math.cos(r), this.onChangeCallback(), this
        },
        setFromRotationMatrix: function(e) {
            var t, r = e.elements,
                i = r[0],
                n = r[4],
                a = r[8],
                o = r[1],
                s = r[5],
                h = r[9],
                l = r[2],
                c = r[6],
                u = r[10],
                f = i + s + u;
            return f > 0 ? (t = .5 / Math.sqrt(f + 1), this._w = .25 / t, this._x = (c - h) * t, this._y = (a - l) * t, this._z = (o - n) * t) : i > s && i > u ? (t = 2 * Math.sqrt(1 + i - s - u), this._w = (c - h) / t, this._x = .25 * t, this._y = (n + o) / t, this._z = (a + l) / t) : s > u ? (t = 2 * Math.sqrt(1 + s - i - u), this._w = (a - l) / t, this._x = (n + o) / t, this._y = .25 * t, this._z = (h + c) / t) : (t = 2 * Math.sqrt(1 + u - i - s), this._w = (o - n) / t, this._x = (a + l) / t, this._y = (h + c) / t, this._z = .25 * t), this.onChangeCallback(), this
        },
        setFromUnitVectors: function() {
            var e, t, r = 1e-6;
            return function(i, n) {
                return void 0 === e && (e = new THREE.Vector3), t = i.dot(n) + 1, r > t ? (t = 0, Math.abs(i.x) > Math.abs(i.z) ? e.set(-i.y, i.x, 0) : e.set(0, -i.z, i.y)) : e.crossVectors(i, n), this._x = e.x, this._y = e.y, this._z = e.z, this._w = t, this.normalize(), this
            }
        }(),
        inverse: function() {
            return this.conjugate().normalize(), this
        },
        conjugate: function() {
            return this._x *= -1, this._y *= -1, this._z *= -1, this.onChangeCallback(), this
        },
        dot: function(e) {
            return this._x * e._x + this._y * e._y + this._z * e._z + this._w * e._w
        },
        lengthSq: function() {
            return this._x * this._x + this._y * this._y + this._z * this._z + this._w * this._w
        },
        length: function() {
            return Math.sqrt(this._x * this._x + this._y * this._y + this._z * this._z + this._w * this._w)
        },
        normalize: function() {
            var e = this.length();
            return 0 === e ? (this._x = 0, this._y = 0, this._z = 0, this._w = 1) : (e = 1 / e, this._x = this._x * e, this._y = this._y * e, this._z = this._z * e, this._w = this._w * e), this.onChangeCallback(), this
        },
        multiply: function(e, t) {
            return void 0 !== t ? (console.warn("THREE.Quaternion: .multiply() now only accepts one argument. Use .multiplyQuaternions( a, b ) instead."), this.multiplyQuaternions(e, t)) : this.multiplyQuaternions(this, e)
        },
        multiplyQuaternions: function(e, t) {
            var r = e._x,
                i = e._y,
                n = e._z,
                a = e._w,
                o = t._x,
                s = t._y,
                h = t._z,
                l = t._w;
            return this._x = r * l + a * o + i * h - n * s, this._y = i * l + a * s + n * o - r * h, this._z = n * l + a * h + r * s - i * o, this._w = a * l - r * o - i * s - n * h, this.onChangeCallback(), this
        },
        multiplyVector3: function(e) {
            return console.warn("THREE.Quaternion: .multiplyVector3() has been removed. Use is now vector.applyQuaternion( quaternion ) instead."), e.applyQuaternion(this)
        },
        slerp: function(e, t) {
            var r = this._x,
                i = this._y,
                n = this._z,
                a = this._w,
                o = a * e._w + r * e._x + i * e._y + n * e._z;
            if (0 > o ? (this._w = -e._w, this._x = -e._x, this._y = -e._y, this._z = -e._z, o = -o) : this.copy(e), o >= 1) return this._w = a, this._x = r, this._y = i, this._z = n, this;
            var s = Math.acos(o),
                h = Math.sqrt(1 - o * o);
            if (Math.abs(h) < .001) return this._w = .5 * (a + this._w), this._x = .5 * (r + this._x), this._y = .5 * (i + this._y), this._z = .5 * (n + this._z), this;
            var l = Math.sin((1 - t) * s) / h,
                c = Math.sin(t * s) / h;
            return this._w = a * l + this._w * c, this._x = r * l + this._x * c, this._y = i * l + this._y * c, this._z = n * l + this._z * c, this.onChangeCallback(), this
        },
        equals: function(e) {
            return e._x === this._x && e._y === this._y && e._z === this._z && e._w === this._w
        },
        fromArray: function(e) {
            return this._x = e[0], this._y = e[1], this._z = e[2], this._w = e[3], this.onChangeCallback(), this
        },
        toArray: function() {
            return [this._x, this._y, this._z, this._w]
        },
        onChange: function(e) {
            return this.onChangeCallback = e, this
        },
        onChangeCallback: function() {},
        clone: function() {
            return new THREE.Quaternion(this._x, this._y, this._z, this._w)
        }
    }, THREE.Quaternion.slerp = function(e, t, r, i) {
        return r.copy(e).slerp(t, i)
    }, THREE.Vector2 = function(e, t) {
        this.x = e || 0, this.y = t || 0
    }, THREE.Vector2.prototype = {
        constructor: THREE.Vector2,
        set: function(e, t) {
            return this.x = e, this.y = t, this
        },
        setX: function(e) {
            return this.x = e, this
        },
        setY: function(e) {
            return this.y = e, this
        },
        setComponent: function(e, t) {
            switch (e) {
                case 0:
                    this.x = t;
                    break;
                case 1:
                    this.y = t;
                    break;
                default:
                    throw new Error("index is out of range: " + e)
            }
        },
        getComponent: function(e) {
            switch (e) {
                case 0:
                    return this.x;
                case 1:
                    return this.y;
                default:
                    throw new Error("index is out of range: " + e)
            }
        },
        copy: function(e) {
            return this.x = e.x, this.y = e.y, this
        },
        add: function(e, t) {
            return void 0 !== t ? (console.warn("THREE.Vector2: .add() now only accepts one argument. Use .addVectors( a, b ) instead."), this.addVectors(e, t)) : (this.x += e.x, this.y += e.y, this)
        },
        addVectors: function(e, t) {
            return this.x = e.x + t.x, this.y = e.y + t.y, this
        },
        addScalar: function(e) {
            return this.x += e, this.y += e, this
        },
        sub: function(e, t) {
            return void 0 !== t ? (console.warn("THREE.Vector2: .sub() now only accepts one argument. Use .subVectors( a, b ) instead."), this.subVectors(e, t)) : (this.x -= e.x, this.y -= e.y, this)
        },
        subVectors: function(e, t) {
            return this.x = e.x - t.x, this.y = e.y - t.y, this
        },
        multiply: function(e) {
            return this.x *= e.x, this.y *= e.y, this
        },
        multiplyScalar: function(e) {
            return this.x *= e, this.y *= e, this
        },
        divide: function(e) {
            return this.x /= e.x, this.y /= e.y, this
        },
        divideScalar: function(e) {
            if (0 !== e) {
                var t = 1 / e;
                this.x *= t, this.y *= t
            } else this.x = 0, this.y = 0;
            return this
        },
        min: function(e) {
            return this.x > e.x && (this.x = e.x), this.y > e.y && (this.y = e.y), this
        },
        max: function(e) {
            return this.x < e.x && (this.x = e.x), this.y < e.y && (this.y = e.y), this
        },
        clamp: function(e, t) {
            return this.x < e.x ? this.x = e.x : this.x > t.x && (this.x = t.x), this.y < e.y ? this.y = e.y : this.y > t.y && (this.y = t.y), this
        },
        clampScalar: function() {
            var e, t;
            return function(r, i) {
                return void 0 === e && (e = new THREE.Vector2, t = new THREE.Vector2), e.set(r, r), t.set(i, i), this.clamp(e, t)
            }
        }(),
        floor: function() {
            return this.x = Math.floor(this.x), this.y = Math.floor(this.y), this
        },
        ceil: function() {
            return this.x = Math.ceil(this.x), this.y = Math.ceil(this.y), this
        },
        round: function() {
            return this.x = Math.round(this.x), this.y = Math.round(this.y), this
        },
        roundToZero: function() {
            return this.x = this.x < 0 ? Math.ceil(this.x) : Math.floor(this.x), this.y = this.y < 0 ? Math.ceil(this.y) : Math.floor(this.y), this
        },
        negate: function() {
            return this.x = -this.x, this.y = -this.y, this
        },
        dot: function(e) {
            return this.x * e.x + this.y * e.y
        },
        lengthSq: function() {
            return this.x * this.x + this.y * this.y
        },
        length: function() {
            return Math.sqrt(this.x * this.x + this.y * this.y)
        },
        normalize: function() {
            return this.divideScalar(this.length())
        },
        distanceTo: function(e) {
            return Math.sqrt(this.distanceToSquared(e))
        },
        distanceToSquared: function(e) {
            var t = this.x - e.x,
                r = this.y - e.y;
            return t * t + r * r
        },
        setLength: function(e) {
            var t = this.length();
            return 0 !== t && e !== t && this.multiplyScalar(e / t), this
        },
        lerp: function(e, t) {
            return this.x += (e.x - this.x) * t, this.y += (e.y - this.y) * t, this
        },
        equals: function(e) {
            return e.x === this.x && e.y === this.y
        },
        fromArray: function(e) {
            return this.x = e[0], this.y = e[1], this
        },
        toArray: function() {
            return [this.x, this.y]
        },
        clone: function() {
            return new THREE.Vector2(this.x, this.y)
        }
    }, THREE.Vector3 = function(e, t, r) {
        this.x = e || 0, this.y = t || 0, this.z = r || 0
    }, THREE.Vector3.prototype = {
        constructor: THREE.Vector3,
        set: function(e, t, r) {
            return this.x = e, this.y = t, this.z = r, this
        },
        setX: function(e) {
            return this.x = e, this
        },
        setY: function(e) {
            return this.y = e, this
        },
        setZ: function(e) {
            return this.z = e, this
        },
        setComponent: function(e, t) {
            switch (e) {
                case 0:
                    this.x = t;
                    break;
                case 1:
                    this.y = t;
                    break;
                case 2:
                    this.z = t;
                    break;
                default:
                    throw new Error("index is out of range: " + e)
            }
        },
        getComponent: function(e) {
            switch (e) {
                case 0:
                    return this.x;
                case 1:
                    return this.y;
                case 2:
                    return this.z;
                default:
                    throw new Error("index is out of range: " + e)
            }
        },
        copy: function(e) {
            return this.x = e.x, this.y = e.y, this.z = e.z, this
        },
        add: function(e, t) {
            return void 0 !== t ? (console.warn("THREE.Vector3: .add() now only accepts one argument. Use .addVectors( a, b ) instead."), this.addVectors(e, t)) : (this.x += e.x, this.y += e.y, this.z += e.z, this)
        },
        addScalar: function(e) {
            return this.x += e, this.y += e, this.z += e, this
        },
        addVectors: function(e, t) {
            return this.x = e.x + t.x, this.y = e.y + t.y, this.z = e.z + t.z, this
        },
        sub: function(e, t) {
            return void 0 !== t ? (console.warn("THREE.Vector3: .sub() now only accepts one argument. Use .subVectors( a, b ) instead."), this.subVectors(e, t)) : (this.x -= e.x, this.y -= e.y, this.z -= e.z, this)
        },
        subVectors: function(e, t) {
            return this.x = e.x - t.x, this.y = e.y - t.y, this.z = e.z - t.z, this
        },
        multiply: function(e, t) {
            return void 0 !== t ? (console.warn("THREE.Vector3: .multiply() now only accepts one argument. Use .multiplyVectors( a, b ) instead."), this.multiplyVectors(e, t)) : (this.x *= e.x, this.y *= e.y, this.z *= e.z, this)
        },
        multiplyScalar: function(e) {
            return this.x *= e, this.y *= e, this.z *= e, this
        },
        multiplyVectors: function(e, t) {
            return this.x = e.x * t.x, this.y = e.y * t.y, this.z = e.z * t.z, this
        },
        applyEuler: function() {
            var e;
            return function(t) {
                return t instanceof THREE.Euler == !1 && console.error("THREE.Vector3: .applyEuler() now expects a Euler rotation rather than a Vector3 and order."), void 0 === e && (e = new THREE.Quaternion), this.applyQuaternion(e.setFromEuler(t)), this
            }
        }(),
        applyAxisAngle: function() {
            var e;
            return function(t, r) {
                return void 0 === e && (e = new THREE.Quaternion), this.applyQuaternion(e.setFromAxisAngle(t, r)), this
            }
        }(),
        applyMatrix3: function(e) {
            var t = this.x,
                r = this.y,
                i = this.z,
                n = e.elements;
            return this.x = n[0] * t + n[3] * r + n[6] * i, this.y = n[1] * t + n[4] * r + n[7] * i, this.z = n[2] * t + n[5] * r + n[8] * i, this
        },
        applyMatrix4: function(e) {
            var t = this.x,
                r = this.y,
                i = this.z,
                n = e.elements;
            return this.x = n[0] * t + n[4] * r + n[8] * i + n[12], this.y = n[1] * t + n[5] * r + n[9] * i + n[13], this.z = n[2] * t + n[6] * r + n[10] * i + n[14], this
        },
        applyProjection: function(e) {
            var t = this.x,
                r = this.y,
                i = this.z,
                n = e.elements,
                a = 1 / (n[3] * t + n[7] * r + n[11] * i + n[15]);
            return this.x = (n[0] * t + n[4] * r + n[8] * i + n[12]) * a, this.y = (n[1] * t + n[5] * r + n[9] * i + n[13]) * a, this.z = (n[2] * t + n[6] * r + n[10] * i + n[14]) * a, this
        },
        applyQuaternion: function(e) {
            var t = this.x,
                r = this.y,
                i = this.z,
                n = e.x,
                a = e.y,
                o = e.z,
                s = e.w,
                h = s * t + a * i - o * r,
                l = s * r + o * t - n * i,
                c = s * i + n * r - a * t,
                u = -n * t - a * r - o * i;
            return this.x = h * s + u * -n + l * -o - c * -a, this.y = l * s + u * -a + c * -n - h * -o, this.z = c * s + u * -o + h * -a - l * -n, this
        },
        transformDirection: function(e) {
            var t = this.x,
                r = this.y,
                i = this.z,
                n = e.elements;
            return this.x = n[0] * t + n[4] * r + n[8] * i, this.y = n[1] * t + n[5] * r + n[9] * i, this.z = n[2] * t + n[6] * r + n[10] * i, this.normalize(), this
        },
        divide: function(e) {
            return this.x /= e.x, this.y /= e.y, this.z /= e.z, this
        },
        divideScalar: function(e) {
            if (0 !== e) {
                var t = 1 / e;
                this.x *= t, this.y *= t, this.z *= t
            } else this.x = 0, this.y = 0, this.z = 0;
            return this
        },
        min: function(e) {
            return this.x > e.x && (this.x = e.x), this.y > e.y && (this.y = e.y), this.z > e.z && (this.z = e.z), this
        },
        max: function(e) {
            return this.x < e.x && (this.x = e.x), this.y < e.y && (this.y = e.y), this.z < e.z && (this.z = e.z), this
        },
        clamp: function(e, t) {
            return this.x < e.x ? this.x = e.x : this.x > t.x && (this.x = t.x), this.y < e.y ? this.y = e.y : this.y > t.y && (this.y = t.y), this.z < e.z ? this.z = e.z : this.z > t.z && (this.z = t.z), this
        },
        clampScalar: function() {
            var e, t;
            return function(r, i) {
                return void 0 === e && (e = new THREE.Vector3, t = new THREE.Vector3), e.set(r, r, r), t.set(i, i, i), this.clamp(e, t)
            }
        }(),
        floor: function() {
            return this.x = Math.floor(this.x), this.y = Math.floor(this.y), this.z = Math.floor(this.z), this
        },
        ceil: function() {
            return this.x = Math.ceil(this.x), this.y = Math.ceil(this.y), this.z = Math.ceil(this.z), this
        },
        round: function() {
            return this.x = Math.round(this.x), this.y = Math.round(this.y), this.z = Math.round(this.z), this
        },
        roundToZero: function() {
            return this.x = this.x < 0 ? Math.ceil(this.x) : Math.floor(this.x), this.y = this.y < 0 ? Math.ceil(this.y) : Math.floor(this.y), this.z = this.z < 0 ? Math.ceil(this.z) : Math.floor(this.z), this
        },
        negate: function() {
            return this.x = -this.x, this.y = -this.y, this.z = -this.z, this
        },
        dot: function(e) {
            return this.x * e.x + this.y * e.y + this.z * e.z
        },
        lengthSq: function() {
            return this.x * this.x + this.y * this.y + this.z * this.z
        },
        length: function() {
            return Math.sqrt(this.x * this.x + this.y * this.y + this.z * this.z)
        },
        lengthManhattan: function() {
            return Math.abs(this.x) + Math.abs(this.y) + Math.abs(this.z)
        },
        normalize: function() {
            return this.divideScalar(this.length())
        },
        setLength: function(e) {
            var t = this.length();
            return 0 !== t && e !== t && this.multiplyScalar(e / t), this
        },
        lerp: function(e, t) {
            return this.x += (e.x - this.x) * t, this.y += (e.y - this.y) * t, this.z += (e.z - this.z) * t, this
        },
        cross: function(e, t) {
            if (void 0 !== t) return console.warn("THREE.Vector3: .cross() now only accepts one argument. Use .crossVectors( a, b ) instead."), this.crossVectors(e, t);
            var r = this.x,
                i = this.y,
                n = this.z;
            return this.x = i * e.z - n * e.y, this.y = n * e.x - r * e.z, this.z = r * e.y - i * e.x, this
        },
        crossVectors: function(e, t) {
            var r = e.x,
                i = e.y,
                n = e.z,
                a = t.x,
                o = t.y,
                s = t.z;
            return this.x = i * s - n * o, this.y = n * a - r * s, this.z = r * o - i * a, this
        },
        projectOnVector: function() {
            var e, t;
            return function(r) {
                return void 0 === e && (e = new THREE.Vector3), e.copy(r).normalize(), t = this.dot(e), this.copy(e).multiplyScalar(t)
            }
        }(),
        projectOnPlane: function() {
            var e;
            return function(t) {
                return void 0 === e && (e = new THREE.Vector3), e.copy(this).projectOnVector(t), this.sub(e)
            }
        }(),
        reflect: function() {
            var e;
            return function(t) {
                return void 0 === e && (e = new THREE.Vector3), this.sub(e.copy(t).multiplyScalar(2 * this.dot(t)))
            }
        }(),
        angleTo: function(e) {
            var t = this.dot(e) / (this.length() * e.length());
            return Math.acos(THREE.Math.clamp(t, -1, 1))
        },
        distanceTo: function(e) {
            return Math.sqrt(this.distanceToSquared(e))
        },
        distanceToSquared: function(e) {
            var t = this.x - e.x,
                r = this.y - e.y,
                i = this.z - e.z;
            return t * t + r * r + i * i
        },
        setEulerFromRotationMatrix: function() {
            console.error("THREE.Vector3: .setEulerFromRotationMatrix() has been removed. Use Euler.setFromRotationMatrix() instead.")
        },
        setEulerFromQuaternion: function() {
            console.error("THREE.Vector3: .setEulerFromQuaternion() has been removed. Use Euler.setFromQuaternion() instead.")
        },
        getPositionFromMatrix: function(e) {
            return console.warn("THREE.Vector3: .getPositionFromMatrix() has been renamed to .setFromMatrixPosition()."), this.setFromMatrixPosition(e)
        },
        getScaleFromMatrix: function(e) {
            return console.warn("THREE.Vector3: .getScaleFromMatrix() has been renamed to .setFromMatrixScale()."), this.setFromMatrixScale(e)
        },
        getColumnFromMatrix: function(e, t) {
            return console.warn("THREE.Vector3: .getColumnFromMatrix() has been renamed to .setFromMatrixColumn()."), this.setFromMatrixColumn(e, t)
        },
        setFromMatrixPosition: function(e) {
            return this.x = e.elements[12], this.y = e.elements[13], this.z = e.elements[14], this
        },
        setFromMatrixScale: function(e) {
            var t = this.set(e.elements[0], e.elements[1], e.elements[2]).length(),
                r = this.set(e.elements[4], e.elements[5], e.elements[6]).length(),
                i = this.set(e.elements[8], e.elements[9], e.elements[10]).length();
            return this.x = t, this.y = r, this.z = i, this
        },
        setFromMatrixColumn: function(e, t) {
            var r = 4 * e,
                i = t.elements;
            return this.x = i[r], this.y = i[r + 1], this.z = i[r + 2], this
        },
        equals: function(e) {
            return e.x === this.x && e.y === this.y && e.z === this.z
        },
        fromArray: function(e) {
            return this.x = e[0], this.y = e[1], this.z = e[2], this
        },
        toArray: function() {
            return [this.x, this.y, this.z]
        },
        clone: function() {
            return new THREE.Vector3(this.x, this.y, this.z)
        }
    }, THREE.Vector4 = function(e, t, r, i) {
        this.x = e || 0, this.y = t || 0, this.z = r || 0, this.w = void 0 !== i ? i : 1
    }, THREE.Vector4.prototype = {
        constructor: THREE.Vector4,
        set: function(e, t, r, i) {
            return this.x = e, this.y = t, this.z = r, this.w = i, this
        },
        setX: function(e) {
            return this.x = e, this
        },
        setY: function(e) {
            return this.y = e, this
        },
        setZ: function(e) {
            return this.z = e, this
        },
        setW: function(e) {
            return this.w = e, this
        },
        setComponent: function(e, t) {
            switch (e) {
                case 0:
                    this.x = t;
                    break;
                case 1:
                    this.y = t;
                    break;
                case 2:
                    this.z = t;
                    break;
                case 3:
                    this.w = t;
                    break;
                default:
                    throw new Error("index is out of range: " + e)
            }
        },
        getComponent: function(e) {
            switch (e) {
                case 0:
                    return this.x;
                case 1:
                    return this.y;
                case 2:
                    return this.z;
                case 3:
                    return this.w;
                default:
                    throw new Error("index is out of range: " + e)
            }
        },
        copy: function(e) {
            return this.x = e.x, this.y = e.y, this.z = e.z, this.w = void 0 !== e.w ? e.w : 1, this
        },
        add: function(e, t) {
            return void 0 !== t ? (console.warn("THREE.Vector4: .add() now only accepts one argument. Use .addVectors( a, b ) instead."), this.addVectors(e, t)) : (this.x += e.x, this.y += e.y, this.z += e.z, this.w += e.w, this)
        },
        addScalar: function(e) {
            return this.x += e, this.y += e, this.z += e, this.w += e, this
        },
        addVectors: function(e, t) {
            return this.x = e.x + t.x, this.y = e.y + t.y, this.z = e.z + t.z, this.w = e.w + t.w, this
        },
        sub: function(e, t) {
            return void 0 !== t ? (console.warn("THREE.Vector4: .sub() now only accepts one argument. Use .subVectors( a, b ) instead."), this.subVectors(e, t)) : (this.x -= e.x, this.y -= e.y, this.z -= e.z, this.w -= e.w, this)
        },
        subVectors: function(e, t) {
            return this.x = e.x - t.x, this.y = e.y - t.y, this.z = e.z - t.z, this.w = e.w - t.w, this
        },
        multiplyScalar: function(e) {
            return this.x *= e, this.y *= e, this.z *= e, this.w *= e, this
        },
        applyMatrix4: function(e) {
            var t = this.x,
                r = this.y,
                i = this.z,
                n = this.w,
                a = e.elements;
            return this.x = a[0] * t + a[4] * r + a[8] * i + a[12] * n, this.y = a[1] * t + a[5] * r + a[9] * i + a[13] * n, this.z = a[2] * t + a[6] * r + a[10] * i + a[14] * n, this.w = a[3] * t + a[7] * r + a[11] * i + a[15] * n, this
        },
        divideScalar: function(e) {
            if (0 !== e) {
                var t = 1 / e;
                this.x *= t, this.y *= t, this.z *= t, this.w *= t
            } else this.x = 0, this.y = 0, this.z = 0, this.w = 1;
            return this
        },
        setAxisAngleFromQuaternion: function(e) {
            this.w = 2 * Math.acos(e.w);
            var t = Math.sqrt(1 - e.w * e.w);
            return 1e-4 > t ? (this.x = 1, this.y = 0, this.z = 0) : (this.x = e.x / t, this.y = e.y / t, this.z = e.z / t), this
        },
        setAxisAngleFromRotationMatrix: function(e) {
            var t, r, i, n, a = .01,
                o = .1,
                s = e.elements,
                h = s[0],
                l = s[4],
                c = s[8],
                u = s[1],
                f = s[5],
                E = s[9],
                p = s[2],
                d = s[6],
                m = s[10];
            if (Math.abs(l - u) < a && Math.abs(c - p) < a && Math.abs(E - d) < a) {
                if (Math.abs(l + u) < o && Math.abs(c + p) < o && Math.abs(E + d) < o && Math.abs(h + f + m - 3) < o) return this.set(1, 0, 0, 0), this;
                t = Math.PI;
                var v = (h + 1) / 2,
                    g = (f + 1) / 2,
                    T = (m + 1) / 2,
                    y = (l + u) / 4,
                    R = (c + p) / 4,
                    x = (E + d) / 4;
                return v > g && v > T ? a > v ? (r = 0, i = .707106781, n = .707106781) : (r = Math.sqrt(v), i = y / r, n = R / r) : g > T ? a > g ? (r = .707106781, i = 0, n = .707106781) : (i = Math.sqrt(g), r = y / i, n = x / i) : a > T ? (r = .707106781, i = .707106781, n = 0) : (n = Math.sqrt(T), r = R / n, i = x / n), this.set(r, i, n, t), this
            }
            var H = Math.sqrt((d - E) * (d - E) + (c - p) * (c - p) + (u - l) * (u - l));
            return Math.abs(H) < .001 && (H = 1), this.x = (d - E) / H, this.y = (c - p) / H, this.z = (u - l) / H, this.w = Math.acos((h + f + m - 1) / 2), this
        },
        min: function(e) {
            return this.x > e.x && (this.x = e.x), this.y > e.y && (this.y = e.y), this.z > e.z && (this.z = e.z), this.w > e.w && (this.w = e.w), this
        },
        max: function(e) {
            return this.x < e.x && (this.x = e.x), this.y < e.y && (this.y = e.y), this.z < e.z && (this.z = e.z), this.w < e.w && (this.w = e.w), this
        },
        clamp: function(e, t) {
            return this.x < e.x ? this.x = e.x : this.x > t.x && (this.x = t.x), this.y < e.y ? this.y = e.y : this.y > t.y && (this.y = t.y), this.z < e.z ? this.z = e.z : this.z > t.z && (this.z = t.z), this.w < e.w ? this.w = e.w : this.w > t.w && (this.w = t.w), this
        },
        clampScalar: function() {
            var e, t;
            return function(r, i) {
                return void 0 === e && (e = new THREE.Vector4, t = new THREE.Vector4), e.set(r, r, r, r), t.set(i, i, i, i), this.clamp(e, t)
            }
        }(),
        floor: function() {
            return this.x = Math.floor(this.x), this.y = Math.floor(this.y), this.z = Math.floor(this.z), this.w = Math.floor(this.w), this
        },
        ceil: function() {
            return this.x = Math.ceil(this.x), this.y = Math.ceil(this.y), this.z = Math.ceil(this.z), this.w = Math.ceil(this.w), this
        },
        round: function() {
            return this.x = Math.round(this.x), this.y = Math.round(this.y), this.z = Math.round(this.z), this.w = Math.round(this.w), this
        },
        roundToZero: function() {
            return this.x = this.x < 0 ? Math.ceil(this.x) : Math.floor(this.x), this.y = this.y < 0 ? Math.ceil(this.y) : Math.floor(this.y), this.z = this.z < 0 ? Math.ceil(this.z) : Math.floor(this.z), this.w = this.w < 0 ? Math.ceil(this.w) : Math.floor(this.w), this
        },
        negate: function() {
            return this.x = -this.x, this.y = -this.y, this.z = -this.z, this.w = -this.w, this
        },
        dot: function(e) {
            return this.x * e.x + this.y * e.y + this.z * e.z + this.w * e.w
        },
        lengthSq: function() {
            return this.x * this.x + this.y * this.y + this.z * this.z + this.w * this.w
        },
        length: function() {
            return Math.sqrt(this.x * this.x + this.y * this.y + this.z * this.z + this.w * this.w)
        },
        lengthManhattan: function() {
            return Math.abs(this.x) + Math.abs(this.y) + Math.abs(this.z) + Math.abs(this.w)
        },
        normalize: function() {
            return this.divideScalar(this.length())
        },
        setLength: function(e) {
            var t = this.length();
            return 0 !== t && e !== t && this.multiplyScalar(e / t), this
        },
        lerp: function(e, t) {
            return this.x += (e.x - this.x) * t, this.y += (e.y - this.y) * t, this.z += (e.z - this.z) * t, this.w += (e.w - this.w) * t, this
        },
        equals: function(e) {
            return e.x === this.x && e.y === this.y && e.z === this.z && e.w === this.w
        },
        fromArray: function(e) {
            return this.x = e[0], this.y = e[1], this.z = e[2], this.w = e[3], this
        },
        toArray: function() {
            return [this.x, this.y, this.z, this.w]
        },
        clone: function() {
            return new THREE.Vector4(this.x, this.y, this.z, this.w)
        }
    }, THREE.Euler = function(e, t, r, i) {
        this._x = e || 0, this._y = t || 0, this._z = r || 0, this._order = i || THREE.Euler.DefaultOrder
    }, THREE.Euler.RotationOrders = ["XYZ", "YZX", "ZXY", "XZY", "YXZ", "ZYX"], THREE.Euler.DefaultOrder = "XYZ", THREE.Euler.prototype = {
        constructor: THREE.Euler,
        _x: 0,
        _y: 0,
        _z: 0,
        _order: THREE.Euler.DefaultOrder,
        get x() {
            return this._x
        },
        set x(e) {
            this._x = e, this.onChangeCallback()
        },
        get y() {
            return this._y
        },
        set y(e) {
            this._y = e, this.onChangeCallback()
        },
        get z() {
            return this._z
        },
        set z(e) {
            this._z = e, this.onChangeCallback()
        },
        get order() {
            return this._order
        },
        set order(e) {
            this._order = e, this.onChangeCallback()
        },
        set: function(e, t, r, i) {
            return this._x = e, this._y = t, this._z = r, this._order = i || this._order, this.onChangeCallback(), this
        },
        copy: function(e) {
            return this._x = e._x, this._y = e._y, this._z = e._z, this._order = e._order, this.onChangeCallback(), this
        },
        setFromRotationMatrix: function(e, t) {
            var r = THREE.Math.clamp,
                i = e.elements,
                n = i[0],
                a = i[4],
                o = i[8],
                s = i[1],
                h = i[5],
                l = i[9],
                c = i[2],
                u = i[6],
                f = i[10];
            return t = t || this._order, "XYZ" === t ? (this._y = Math.asin(r(o, -1, 1)), Math.abs(o) < .99999 ? (this._x = Math.atan2(-l, f), this._z = Math.atan2(-a, n)) : (this._x = Math.atan2(u, h), this._z = 0)) : "YXZ" === t ? (this._x = Math.asin(-r(l, -1, 1)), Math.abs(l) < .99999 ? (this._y = Math.atan2(o, f), this._z = Math.atan2(s, h)) : (this._y = Math.atan2(-c, n), this._z = 0)) : "ZXY" === t ? (this._x = Math.asin(r(u, -1, 1)), Math.abs(u) < .99999 ? (this._y = Math.atan2(-c, f), this._z = Math.atan2(-a, h)) : (this._y = 0, this._z = Math.atan2(s, n))) : "ZYX" === t ? (this._y = Math.asin(-r(c, -1, 1)), Math.abs(c) < .99999 ? (this._x = Math.atan2(u, f), this._z = Math.atan2(s, n)) : (this._x = 0, this._z = Math.atan2(-a, h))) : "YZX" === t ? (this._z = Math.asin(r(s, -1, 1)), Math.abs(s) < .99999 ? (this._x = Math.atan2(-l, h), this._y = Math.atan2(-c, n)) : (this._x = 0, this._y = Math.atan2(o, f))) : "XZY" === t ? (this._z = Math.asin(-r(a, -1, 1)), Math.abs(a) < .99999 ? (this._x = Math.atan2(u, h), this._y = Math.atan2(o, n)) : (this._x = Math.atan2(-l, f), this._y = 0)) : console.warn("THREE.Euler: .setFromRotationMatrix() given unsupported order: " + t), this._order = t, this.onChangeCallback(), this
        },
        setFromQuaternion: function(e, t, r) {
            var i = THREE.Math.clamp,
                n = e.x * e.x,
                a = e.y * e.y,
                o = e.z * e.z,
                s = e.w * e.w;
            return t = t || this._order, "XYZ" === t ? (this._x = Math.atan2(2 * (e.x * e.w - e.y * e.z), s - n - a + o), this._y = Math.asin(i(2 * (e.x * e.z + e.y * e.w), -1, 1)), this._z = Math.atan2(2 * (e.z * e.w - e.x * e.y), s + n - a - o)) : "YXZ" === t ? (this._x = Math.asin(i(2 * (e.x * e.w - e.y * e.z), -1, 1)), this._y = Math.atan2(2 * (e.x * e.z + e.y * e.w), s - n - a + o), this._z = Math.atan2(2 * (e.x * e.y + e.z * e.w), s - n + a - o)) : "ZXY" === t ? (this._x = Math.asin(i(2 * (e.x * e.w + e.y * e.z), -1, 1)), this._y = Math.atan2(2 * (e.y * e.w - e.z * e.x), s - n - a + o), this._z = Math.atan2(2 * (e.z * e.w - e.x * e.y), s - n + a - o)) : "ZYX" === t ? (this._x = Math.atan2(2 * (e.x * e.w + e.z * e.y), s - n - a + o), this._y = Math.asin(i(2 * (e.y * e.w - e.x * e.z), -1, 1)), this._z = Math.atan2(2 * (e.x * e.y + e.z * e.w), s + n - a - o)) : "YZX" === t ? (this._x = Math.atan2(2 * (e.x * e.w - e.z * e.y), s - n + a - o), this._y = Math.atan2(2 * (e.y * e.w - e.x * e.z), s + n - a - o), this._z = Math.asin(i(2 * (e.x * e.y + e.z * e.w), -1, 1))) : "XZY" === t ? (this._x = Math.atan2(2 * (e.x * e.w + e.y * e.z), s - n + a - o), this._y = Math.atan2(2 * (e.x * e.z + e.y * e.w), s + n - a - o), this._z = Math.asin(i(2 * (e.z * e.w - e.x * e.y), -1, 1))) : console.warn("THREE.Euler: .setFromQuaternion() given unsupported order: " + t), this._order = t, r !== !1 && this.onChangeCallback(), this
        },
        reorder: function() {
            var e = new THREE.Quaternion;
            return function(t) {
                e.setFromEuler(this), this.setFromQuaternion(e, t)
            }
        }(),
        equals: function(e) {
            return e._x === this._x && e._y === this._y && e._z === this._z && e._order === this._order
        },
        fromArray: function(e) {
            return this._x = e[0], this._y = e[1], this._z = e[2], void 0 !== e[3] && (this._order = e[3]), this.onChangeCallback(), this
        },
        toArray: function() {
            return [this._x, this._y, this._z, this._order]
        },
        onChange: function(e) {
            return this.onChangeCallback = e, this
        },
        onChangeCallback: function() {},
        clone: function() {
            return new THREE.Euler(this._x, this._y, this._z, this._order)
        }
    }, THREE.Line3 = function(e, t) {
        this.start = void 0 !== e ? e : new THREE.Vector3, this.end = void 0 !== t ? t : new THREE.Vector3
    }, THREE.Line3.prototype = {
        constructor: THREE.Line3,
        set: function(e, t) {
            return this.start.copy(e), this.end.copy(t), this
        },
        copy: function(e) {
            return this.start.copy(e.start), this.end.copy(e.end), this
        },
        center: function(e) {
            var t = e || new THREE.Vector3;
            return t.addVectors(this.start, this.end).multiplyScalar(.5)
        },
        delta: function(e) {
            var t = e || new THREE.Vector3;
            return t.subVectors(this.end, this.start)
        },
        distanceSq: function() {
            return this.start.distanceToSquared(this.end)
        },
        distance: function() {
            return this.start.distanceTo(this.end)
        },
        at: function(e, t) {
            var r = t || new THREE.Vector3;
            return this.delta(r).multiplyScalar(e).add(this.start)
        },
        closestPointToPointParameter: function() {
            var e = new THREE.Vector3,
                t = new THREE.Vector3;
            return function(r, i) {
                e.subVectors(r, this.start), t.subVectors(this.end, this.start);
                var n = t.dot(t),
                    a = t.dot(e),
                    o = a / n;
                return i && (o = THREE.Math.clamp(o, 0, 1)), o
            }
        }(),
        closestPointToPoint: function(e, t, r) {
            var i = this.closestPointToPointParameter(e, t),
                n = r || new THREE.Vector3;
            return this.delta(n).multiplyScalar(i).add(this.start)
        },
        applyMatrix4: function(e) {
            return this.start.applyMatrix4(e), this.end.applyMatrix4(e), this
        },
        equals: function(e) {
            return e.start.equals(this.start) && e.end.equals(this.end)
        },
        clone: function() {
            return (new THREE.Line3).copy(this)
        }
    }, THREE.Box2 = function(e, t) {
        this.min = void 0 !== e ? e : new THREE.Vector2(1 / 0, 1 / 0), this.max = void 0 !== t ? t : new THREE.Vector2(-1 / 0, -1 / 0)
    }, THREE.Box2.prototype = {
        constructor: THREE.Box2,
        set: function(e, t) {
            return this.min.copy(e), this.max.copy(t), this
        },
        setFromPoints: function(e) {
            this.makeEmpty();
            for (var t = 0, r = e.length; r > t; t++) this.expandByPoint(e[t]);
            return this
        },
        setFromCenterAndSize: function() {
            var e = new THREE.Vector2;
            return function(t, r) {
                var i = e.copy(r).multiplyScalar(.5);
                return this.min.copy(t).sub(i), this.max.copy(t).add(i), this
            }
        }(),
        copy: function(e) {
            return this.min.copy(e.min), this.max.copy(e.max), this
        },
        makeEmpty: function() {
            return this.min.x = this.min.y = 1 / 0, this.max.x = this.max.y = -1 / 0, this
        },
        empty: function() {
            return this.max.x < this.min.x || this.max.y < this.min.y
        },
        center: function(e) {
            var t = e || new THREE.Vector2;
            return t.addVectors(this.min, this.max).multiplyScalar(.5)
        },
        size: function(e) {
            var t = e || new THREE.Vector2;
            return t.subVectors(this.max, this.min)
        },
        expandByPoint: function(e) {
            return this.min.min(e), this.max.max(e), this
        },
        expandByVector: function(e) {
            return this.min.sub(e), this.max.add(e), this
        },
        expandByScalar: function(e) {
            return this.min.addScalar(-e), this.max.addScalar(e), this
        },
        containsPoint: function(e) {
            return e.x < this.min.x || e.x > this.max.x || e.y < this.min.y || e.y > this.max.y ? !1 : !0
        },
        containsBox: function(e) {
            return this.min.x <= e.min.x && e.max.x <= this.max.x && this.min.y <= e.min.y && e.max.y <= this.max.y ? !0 : !1
        },
        getParameter: function(e, t) {
            var r = t || new THREE.Vector2;
            return r.set((e.x - this.min.x) / (this.max.x - this.min.x), (e.y - this.min.y) / (this.max.y - this.min.y))
        },
        isIntersectionBox: function(e) {
            return e.max.x < this.min.x || e.min.x > this.max.x || e.max.y < this.min.y || e.min.y > this.max.y ? !1 : !0
        },
        clampPoint: function(e, t) {
            var r = t || new THREE.Vector2;
            return r.copy(e).clamp(this.min, this.max)
        },
        distanceToPoint: function() {
            var e = new THREE.Vector2;
            return function(t) {
                var r = e.copy(t).clamp(this.min, this.max);
                return r.sub(t).length()
            }
        }(),
        intersect: function(e) {
            return this.min.max(e.min), this.max.min(e.max), this
        },
        union: function(e) {
            return this.min.min(e.min), this.max.max(e.max), this
        },
        translate: function(e) {
            return this.min.add(e), this.max.add(e), this
        },
        equals: function(e) {
            return e.min.equals(this.min) && e.max.equals(this.max)
        },
        clone: function() {
            return (new THREE.Box2).copy(this)
        }
    }, THREE.Box3 = function(e, t) {
        this.min = void 0 !== e ? e : new THREE.Vector3(1 / 0, 1 / 0, 1 / 0), this.max = void 0 !== t ? t : new THREE.Vector3(-1 / 0, -1 / 0, -1 / 0)
    }, THREE.Box3.prototype = {
        constructor: THREE.Box3,
        set: function(e, t) {
            return this.min.copy(e), this.max.copy(t), this
        },
        setFromPoints: function(e) {
            this.makeEmpty();
            for (var t = 0, r = e.length; r > t; t++) this.expandByPoint(e[t]);
            return this
        },
        setFromCenterAndSize: function() {
            var e = new THREE.Vector3;
            return function(t, r) {
                var i = e.copy(r).multiplyScalar(.5);
                return this.min.copy(t).sub(i), this.max.copy(t).add(i), this
            }
        }(),
        setFromObject: function() {
            var e = new THREE.Vector3;
            return function(t) {
                var r = this;
                return t.updateMatrixWorld(!0), this.makeEmpty(), t.traverse(function(t) {
                    if (void 0 !== t.geometry && void 0 !== t.geometry.vertices)
                        for (var i = t.geometry.vertices, n = 0, a = i.length; a > n; n++) e.copy(i[n]), e.applyMatrix4(t.matrixWorld), r.expandByPoint(e)
                }), this
            }
        }(),
        copy: function(e) {
            return this.min.copy(e.min), this.max.copy(e.max), this
        },
        makeEmpty: function() {
            return this.min.x = this.min.y = this.min.z = 1 / 0, this.max.x = this.max.y = this.max.z = -1 / 0, this
        },
        empty: function() {
            return this.max.x < this.min.x || this.max.y < this.min.y || this.max.z < this.min.z
        },
        center: function(e) {
            var t = e || new THREE.Vector3;
            return t.addVectors(this.min, this.max).multiplyScalar(.5)
        },
        size: function(e) {
            var t = e || new THREE.Vector3;
            return t.subVectors(this.max, this.min)
        },
        expandByPoint: function(e) {
            return this.min.min(e), this.max.max(e), this
        },
        expandByVector: function(e) {
            return this.min.sub(e), this.max.add(e), this
        },
        expandByScalar: function(e) {
            return this.min.addScalar(-e), this.max.addScalar(e), this
        },
        containsPoint: function(e) {
            return e.x < this.min.x || e.x > this.max.x || e.y < this.min.y || e.y > this.max.y || e.z < this.min.z || e.z > this.max.z ? !1 : !0
        },
        containsBox: function(e) {
            return this.min.x <= e.min.x && e.max.x <= this.max.x && this.min.y <= e.min.y && e.max.y <= this.max.y && this.min.z <= e.min.z && e.max.z <= this.max.z ? !0 : !1
        },
        getParameter: function(e, t) {
            var r = t || new THREE.Vector3;
            return r.set((e.x - this.min.x) / (this.max.x - this.min.x), (e.y - this.min.y) / (this.max.y - this.min.y), (e.z - this.min.z) / (this.max.z - this.min.z))
        },
        isIntersectionBox: function(e) {
            return e.max.x < this.min.x || e.min.x > this.max.x || e.max.y < this.min.y || e.min.y > this.max.y || e.max.z < this.min.z || e.min.z > this.max.z ? !1 : !0
        },
        clampPoint: function(e, t) {
            var r = t || new THREE.Vector3;
            return r.copy(e).clamp(this.min, this.max)
        },
        distanceToPoint: function() {
            var e = new THREE.Vector3;
            return function(t) {
                var r = e.copy(t).clamp(this.min, this.max);
                return r.sub(t).length()
            }
        }(),
        getBoundingSphere: function() {
            var e = new THREE.Vector3;
            return function(t) {
                var r = t || new THREE.Sphere;
                return r.center = this.center(), r.radius = .5 * this.size(e).length(), r
            }
        }(),
        intersect: function(e) {
            return this.min.max(e.min), this.max.min(e.max), this
        },
        union: function(e) {
            return this.min.min(e.min), this.max.max(e.max), this
        },
        applyMatrix4: function() {
            var e = [new THREE.Vector3, new THREE.Vector3, new THREE.Vector3, new THREE.Vector3, new THREE.Vector3, new THREE.Vector3, new THREE.Vector3, new THREE.Vector3];
            return function(t) {
                return e[0].set(this.min.x, this.min.y, this.min.z).applyMatrix4(t), e[1].set(this.min.x, this.min.y, this.max.z).applyMatrix4(t), e[2].set(this.min.x, this.max.y, this.min.z).applyMatrix4(t), e[3].set(this.min.x, this.max.y, this.max.z).applyMatrix4(t), e[4].set(this.max.x, this.min.y, this.min.z).applyMatrix4(t), e[5].set(this.max.x, this.min.y, this.max.z).applyMatrix4(t), e[6].set(this.max.x, this.max.y, this.min.z).applyMatrix4(t), e[7].set(this.max.x, this.max.y, this.max.z).applyMatrix4(t), this.makeEmpty(), this.setFromPoints(e), this
            }
        }(),
        translate: function(e) {
            return this.min.add(e), this.max.add(e), this
        },
        equals: function(e) {
            return e.min.equals(this.min) && e.max.equals(this.max)
        },
        clone: function() {
            return (new THREE.Box3).copy(this)
        }
    }, THREE.Matrix3 = function(e, t, r, i, n, a, o, s, h) {
        this.elements = new Float32Array(9);
        var l = this.elements;
        l[0] = void 0 !== e ? e : 1, l[3] = t || 0, l[6] = r || 0, l[1] = i || 0, l[4] = void 0 !== n ? n : 1, l[7] = a || 0, l[2] = o || 0, l[5] = s || 0, l[8] = void 0 !== h ? h : 1
    }, THREE.Matrix3.prototype = {
        constructor: THREE.Matrix3,
        set: function(e, t, r, i, n, a, o, s, h) {
            var l = this.elements;
            return l[0] = e, l[3] = t, l[6] = r, l[1] = i, l[4] = n, l[7] = a, l[2] = o, l[5] = s, l[8] = h, this
        },
        identity: function() {
            return this.set(1, 0, 0, 0, 1, 0, 0, 0, 1), this
        },
        copy: function(e) {
            var t = e.elements;
            return this.set(t[0], t[3], t[6], t[1], t[4], t[7], t[2], t[5], t[8]), this
        },
        multiplyVector3: function(e) {
            return console.warn("THREE.Matrix3: .multiplyVector3() has been removed. Use vector.applyMatrix3( matrix ) instead."), e.applyMatrix3(this)
        },
        multiplyVector3Array: function(e) {
            return console.warn("THREE.Matrix3: .multiplyVector3Array() has been renamed. Use matrix.applyToVector3Array( array ) instead."), this.applyToVector3Array(e)
        },
        applyToVector3Array: function() {
            var e = new THREE.Vector3;
            return function(t, r, i) {
                void 0 === r && (r = 0), void 0 === i && (i = t.length);
                for (var n = 0, a = r; i > n; n += 3, a += 3) e.x = t[a], e.y = t[a + 1], e.z = t[a + 2], e.applyMatrix3(this), t[a] = e.x, t[a + 1] = e.y, t[a + 2] = e.z;
                return t
            }
        }(),
        multiplyScalar: function(e) {
            var t = this.elements;
            return t[0] *= e, t[3] *= e, t[6] *= e, t[1] *= e, t[4] *= e, t[7] *= e, t[2] *= e, t[5] *= e, t[8] *= e, this
        },
        determinant: function() {
            var e = this.elements,
                t = e[0],
                r = e[1],
                i = e[2],
                n = e[3],
                a = e[4],
                o = e[5],
                s = e[6],
                h = e[7],
                l = e[8];
            return t * a * l - t * o * h - r * n * l + r * o * s + i * n * h - i * a * s
        },
        getInverse: function(e, t) {
            var r = e.elements,
                i = this.elements;
            i[0] = r[10] * r[5] - r[6] * r[9], i[1] = -r[10] * r[1] + r[2] * r[9], i[2] = r[6] * r[1] - r[2] * r[5], i[3] = -r[10] * r[4] + r[6] * r[8], i[4] = r[10] * r[0] - r[2] * r[8], i[5] = -r[6] * r[0] + r[2] * r[4], i[6] = r[9] * r[4] - r[5] * r[8], i[7] = -r[9] * r[0] + r[1] * r[8], i[8] = r[5] * r[0] - r[1] * r[4];
            var n = r[0] * i[0] + r[1] * i[3] + r[2] * i[6];
            if (0 === n) {
                var a = "Matrix3.getInverse(): can't invert matrix, determinant is 0";
                if (t) throw new Error(a);
                return console.warn(a), this.identity(), this
            }
            return this.multiplyScalar(1 / n), this
        },
        transpose: function() {
            var e, t = this.elements;
            return e = t[1], t[1] = t[3], t[3] = e, e = t[2], t[2] = t[6], t[6] = e, e = t[5], t[5] = t[7], t[7] = e, this
        },
        flattenToArrayOffset: function(e, t) {
            var r = this.elements;
            return e[t] = r[0], e[t + 1] = r[1], e[t + 2] = r[2], e[t + 3] = r[3], e[t + 4] = r[4], e[t + 5] = r[5], e[t + 6] = r[6], e[t + 7] = r[7], e[t + 8] = r[8], e
        },
        getNormalMatrix: function(e) {
            return this.getInverse(e).transpose(), this
        },
        transposeIntoArray: function(e) {
            var t = this.elements;
            return e[0] = t[0], e[1] = t[3], e[2] = t[6], e[3] = t[1], e[4] = t[4], e[5] = t[7], e[6] = t[2], e[7] = t[5], e[8] = t[8], this
        },
        fromArray: function(e) {
            return this.elements.set(e), this
        },
        toArray: function() {
            var e = this.elements;
            return [e[0], e[1], e[2], e[3], e[4], e[5], e[6], e[7], e[8]]
        },
        clone: function() {
            var e = this.elements;
            return new THREE.Matrix3(e[0], e[3], e[6], e[1], e[4], e[7], e[2], e[5], e[8])
        }
    }, THREE.Matrix4 = function(e, t, r, i, n, a, o, s, h, l, c, u, f, E, p, d) {
        this.elements = new Float32Array(16);
        var m = this.elements;
        m[0] = void 0 !== e ? e : 1, m[4] = t || 0, m[8] = r || 0, m[12] = i || 0, m[1] = n || 0, m[5] = void 0 !== a ? a : 1, m[9] = o || 0, m[13] = s || 0, m[2] = h || 0, m[6] = l || 0, m[10] = void 0 !== c ? c : 1, m[14] = u || 0, m[3] = f || 0, m[7] = E || 0, m[11] = p || 0, m[15] = void 0 !== d ? d : 1
    }, THREE.Matrix4.prototype = {
        constructor: THREE.Matrix4,
        set: function(e, t, r, i, n, a, o, s, h, l, c, u, f, E, p, d) {
            var m = this.elements;
            return m[0] = e, m[4] = t, m[8] = r, m[12] = i, m[1] = n, m[5] = a, m[9] = o, m[13] = s, m[2] = h, m[6] = l, m[10] = c, m[14] = u, m[3] = f, m[7] = E, m[11] = p, m[15] = d, this
        },
        identity: function() {
            return this.set(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1), this
        },
        copy: function(e) {
            return this.elements.set(e.elements), this
        },
        extractPosition: function(e) {
            return console.warn("THREEMatrix4: .extractPosition() has been renamed to .copyPosition()."), this.copyPosition(e)
        },
        copyPosition: function(e) {
            var t = this.elements,
                r = e.elements;
            return t[12] = r[12], t[13] = r[13], t[14] = r[14], this
        },
        extractRotation: function() {
            var e = new THREE.Vector3;
            return function(t) {
                var r = this.elements,
                    i = t.elements,
                    n = 1 / e.set(i[0], i[1], i[2]).length(),
                    a = 1 / e.set(i[4], i[5], i[6]).length(),
                    o = 1 / e.set(i[8], i[9], i[10]).length();
                return r[0] = i[0] * n, r[1] = i[1] * n, r[2] = i[2] * n, r[4] = i[4] * a, r[5] = i[5] * a, r[6] = i[6] * a, r[8] = i[8] * o, r[9] = i[9] * o, r[10] = i[10] * o, this
            }
        }(),
        makeRotationFromEuler: function(e) {
            e instanceof THREE.Euler == !1 && console.error("THREE.Matrix: .makeRotationFromEuler() now expects a Euler rotation rather than a Vector3 and order.");
            var t = this.elements,
                r = e.x,
                i = e.y,
                n = e.z,
                a = Math.cos(r),
                o = Math.sin(r),
                s = Math.cos(i),
                h = Math.sin(i),
                l = Math.cos(n),
                c = Math.sin(n);
            if ("XYZ" === e.order) {
                var u = a * l,
                    f = a * c,
                    E = o * l,
                    p = o * c;
                t[0] = s * l, t[4] = -s * c, t[8] = h, t[1] = f + E * h, t[5] = u - p * h, t[9] = -o * s, t[2] = p - u * h, t[6] = E + f * h, t[10] = a * s
            } else if ("YXZ" === e.order) {
                var d = s * l,
                    m = s * c,
                    v = h * l,
                    g = h * c;
                t[0] = d + g * o, t[4] = v * o - m, t[8] = a * h, t[1] = a * c, t[5] = a * l, t[9] = -o, t[2] = m * o - v, t[6] = g + d * o, t[10] = a * s
            } else if ("ZXY" === e.order) {
                var d = s * l,
                    m = s * c,
                    v = h * l,
                    g = h * c;
                t[0] = d - g * o, t[4] = -a * c, t[8] = v + m * o, t[1] = m + v * o, t[5] = a * l, t[9] = g - d * o, t[2] = -a * h, t[6] = o, t[10] = a * s
            } else if ("ZYX" === e.order) {
                var u = a * l,
                    f = a * c,
                    E = o * l,
                    p = o * c;
                t[0] = s * l, t[4] = E * h - f, t[8] = u * h + p, t[1] = s * c, t[5] = p * h + u, t[9] = f * h - E, t[2] = -h, t[6] = o * s, t[10] = a * s
            } else if ("YZX" === e.order) {
                var T = a * s,
                    y = a * h,
                    R = o * s,
                    x = o * h;
                t[0] = s * l, t[4] = x - T * c, t[8] = R * c + y, t[1] = c, t[5] = a * l, t[9] = -o * l, t[2] = -h * l, t[6] = y * c + R, t[10] = T - x * c
            } else if ("XZY" === e.order) {
                var T = a * s,
                    y = a * h,
                    R = o * s,
                    x = o * h;
                t[0] = s * l, t[4] = -c, t[8] = h * l, t[1] = T * c + x, t[5] = a * l, t[9] = y * c - R, t[2] = R * c - y, t[6] = o * l, t[10] = x * c + T
            }
            return t[3] = 0, t[7] = 0, t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1, this
        },
        setRotationFromQuaternion: function(e) {
            return console.warn("THREE.Matrix4: .setRotationFromQuaternion() has been renamed to .makeRotationFromQuaternion()."), this.makeRotationFromQuaternion(e)
        },
        makeRotationFromQuaternion: function(e) {
            var t = this.elements,
                r = e.x,
                i = e.y,
                n = e.z,
                a = e.w,
                o = r + r,
                s = i + i,
                h = n + n,
                l = r * o,
                c = r * s,
                u = r * h,
                f = i * s,
                E = i * h,
                p = n * h,
                d = a * o,
                m = a * s,
                v = a * h;
            return t[0] = 1 - (f + p), t[4] = c - v, t[8] = u + m, t[1] = c + v, t[5] = 1 - (l + p), t[9] = E - d, t[2] = u - m, t[6] = E + d, t[10] = 1 - (l + f), t[3] = 0, t[7] = 0, t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1, this
        },
        lookAt: function() {
            var e = new THREE.Vector3,
                t = new THREE.Vector3,
                r = new THREE.Vector3;
            return function(i, n, a) {
                var o = this.elements;
                return r.subVectors(i, n).normalize(), 0 === r.length() && (r.z = 1), e.crossVectors(a, r).normalize(), 0 === e.length() && (r.x += 1e-4, e.crossVectors(a, r).normalize()), t.crossVectors(r, e), o[0] = e.x, o[4] = t.x, o[8] = r.x, o[1] = e.y, o[5] = t.y, o[9] = r.y, o[2] = e.z, o[6] = t.z, o[10] = r.z, this
            }
        }(),
        multiply: function(e, t) {
            return void 0 !== t ? (console.warn("THREE.Matrix4: .multiply() now only accepts one argument. Use .multiplyMatrices( a, b ) instead."), this.multiplyMatrices(e, t)) : this.multiplyMatrices(this, e)
        },
        multiplyMatrices: function(e, t) {
            var r = e.elements,
                i = t.elements,
                n = this.elements,
                a = r[0],
                o = r[4],
                s = r[8],
                h = r[12],
                l = r[1],
                c = r[5],
                u = r[9],
                f = r[13],
                E = r[2],
                p = r[6],
                d = r[10],
                m = r[14],
                v = r[3],
                g = r[7],
                T = r[11],
                y = r[15],
                R = i[0],
                x = i[4],
                H = i[8],
                b = i[12],
                _ = i[1],
                w = i[5],
                M = i[9],
                S = i[13],
                C = i[2],
                A = i[6],
                L = i[10],
                P = i[14],
                F = i[3],
                D = i[7],
                U = i[11],
                V = i[15];
            return n[0] = a * R + o * _ + s * C + h * F, n[4] = a * x + o * w + s * A + h * D, n[8] = a * H + o * M + s * L + h * U, n[12] = a * b + o * S + s * P + h * V, n[1] = l * R + c * _ + u * C + f * F, n[5] = l * x + c * w + u * A + f * D, n[9] = l * H + c * M + u * L + f * U, n[13] = l * b + c * S + u * P + f * V, n[2] = E * R + p * _ + d * C + m * F, n[6] = E * x + p * w + d * A + m * D, n[10] = E * H + p * M + d * L + m * U, n[14] = E * b + p * S + d * P + m * V, n[3] = v * R + g * _ + T * C + y * F, n[7] = v * x + g * w + T * A + y * D, n[11] = v * H + g * M + T * L + y * U, n[15] = v * b + g * S + T * P + y * V, this
        },
        multiplyToArray: function(e, t, r) {
            var i = this.elements;
            return this.multiplyMatrices(e, t), r[0] = i[0], r[1] = i[1], r[2] = i[2], r[3] = i[3], r[4] = i[4], r[5] = i[5], r[6] = i[6], r[7] = i[7], r[8] = i[8], r[9] = i[9], r[10] = i[10], r[11] = i[11], r[12] = i[12], r[13] = i[13], r[14] = i[14], r[15] = i[15], this
        },
        multiplyScalar: function(e) {
            var t = this.elements;
            return t[0] *= e, t[4] *= e, t[8] *= e, t[12] *= e, t[1] *= e, t[5] *= e, t[9] *= e, t[13] *= e, t[2] *= e, t[6] *= e, t[10] *= e, t[14] *= e, t[3] *= e, t[7] *= e, t[11] *= e, t[15] *= e, this
        },
        multiplyVector3: function(e) {
            return console.warn("THREE.Matrix4: .multiplyVector3() has been removed. Use vector.applyMatrix4( matrix ) or vector.applyProjection( matrix ) instead."), e.applyProjection(this)
        },
        multiplyVector4: function(e) {
            return console.warn("THREE.Matrix4: .multiplyVector4() has been removed. Use vector.applyMatrix4( matrix ) instead."), e.applyMatrix4(this)
        },
        multiplyVector3Array: function(e) {
            return console.warn("THREE.Matrix4: .multiplyVector3Array() has been renamed. Use matrix.applyToVector3Array( array ) instead."), this.applyToVector3Array(e)
        },
        applyToVector3Array: function() {
            var e = new THREE.Vector3;
            return function(t, r, i) {
                void 0 === r && (r = 0), void 0 === i && (i = t.length);
                for (var n = 0, a = r; i > n; n += 3, a += 3) e.x = t[a], e.y = t[a + 1], e.z = t[a + 2], e.applyMatrix4(this), t[a] = e.x, t[a + 1] = e.y, t[a + 2] = e.z;
                return t
            }
        }(),
        rotateAxis: function(e) {
            console.warn("THREE.Matrix4: .rotateAxis() has been removed. Use Vector3.transformDirection( matrix ) instead."), e.transformDirection(this)
        },
        crossVector: function(e) {
            return console.warn("THREE.Matrix4: .crossVector() has been removed. Use vector.applyMatrix4( matrix ) instead."), e.applyMatrix4(this)
        },
        determinant: function() {
            var e = this.elements,
                t = e[0],
                r = e[4],
                i = e[8],
                n = e[12],
                a = e[1],
                o = e[5],
                s = e[9],
                h = e[13],
                l = e[2],
                c = e[6],
                u = e[10],
                f = e[14],
                E = e[3],
                p = e[7],
                d = e[11],
                m = e[15];
            return E * (+n * s * c - i * h * c - n * o * u + r * h * u + i * o * f - r * s * f) + p * (+t * s * f - t * h * u + n * a * u - i * a * f + i * h * l - n * s * l) + d * (+t * h * c - t * o * f - n * a * c + r * a * f + n * o * l - r * h * l) + m * (-i * o * l - t * s * c + t * o * u + i * a * c - r * a * u + r * s * l)
        },
        transpose: function() {
            var e, t = this.elements;
            return e = t[1], t[1] = t[4], t[4] = e, e = t[2], t[2] = t[8], t[8] = e, e = t[6], t[6] = t[9], t[9] = e, e = t[3], t[3] = t[12], t[12] = e, e = t[7], t[7] = t[13], t[13] = e, e = t[11], t[11] = t[14], t[14] = e, this
        },
        flattenToArrayOffset: function(e, t) {
            var r = this.elements;
            return e[t] = r[0], e[t + 1] = r[1], e[t + 2] = r[2], e[t + 3] = r[3], e[t + 4] = r[4], e[t + 5] = r[5], e[t + 6] = r[6], e[t + 7] = r[7], e[t + 8] = r[8], e[t + 9] = r[9], e[t + 10] = r[10], e[t + 11] = r[11], e[t + 12] = r[12], e[t + 13] = r[13], e[t + 14] = r[14], e[t + 15] = r[15], e
        },
        getPosition: function() {
            var e = new THREE.Vector3;
            return function() {
                console.warn("THREE.Matrix4: .getPosition() has been removed. Use Vector3.setFromMatrixPosition( matrix ) instead.");
                var t = this.elements;
                return e.set(t[12], t[13], t[14])
            }
        }(),
        setPosition: function(e) {
            var t = this.elements;
            return t[12] = e.x, t[13] = e.y, t[14] = e.z, this
        },
        getInverse: function(e, t) {
            var r = this.elements,
                i = e.elements,
                n = i[0],
                a = i[4],
                o = i[8],
                s = i[12],
                h = i[1],
                l = i[5],
                c = i[9],
                u = i[13],
                f = i[2],
                E = i[6],
                p = i[10],
                d = i[14],
                m = i[3],
                v = i[7],
                g = i[11],
                T = i[15];
            r[0] = c * d * v - u * p * v + u * E * g - l * d * g - c * E * T + l * p * T, r[4] = s * p * v - o * d * v - s * E * g + a * d * g + o * E * T - a * p * T, r[8] = o * u * v - s * c * v + s * l * g - a * u * g - o * l * T + a * c * T, r[12] = s * c * E - o * u * E - s * l * p + a * u * p + o * l * d - a * c * d, r[1] = u * p * m - c * d * m - u * f * g + h * d * g + c * f * T - h * p * T, r[5] = o * d * m - s * p * m + s * f * g - n * d * g - o * f * T + n * p * T, r[9] = s * c * m - o * u * m - s * h * g + n * u * g + o * h * T - n * c * T, r[13] = o * u * f - s * c * f + s * h * p - n * u * p - o * h * d + n * c * d, r[2] = l * d * m - u * E * m + u * f * v - h * d * v - l * f * T + h * E * T, r[6] = s * E * m - a * d * m - s * f * v + n * d * v + a * f * T - n * E * T, r[10] = a * u * m - s * l * m + s * h * v - n * u * v - a * h * T + n * l * T, r[14] = s * l * f - a * u * f - s * h * E + n * u * E + a * h * d - n * l * d, r[3] = c * E * m - l * p * m - c * f * v + h * p * v + l * f * g - h * E * g, r[7] = a * p * m - o * E * m + o * f * v - n * p * v - a * f * g + n * E * g, r[11] = o * l * m - a * c * m - o * h * v + n * c * v + a * h * g - n * l * g, r[15] = a * c * f - o * l * f + o * h * E - n * c * E - a * h * p + n * l * p;
            var y = n * r[0] + h * r[4] + f * r[8] + m * r[12];
            if (0 == y) {
                var R = "Matrix4.getInverse(): can't invert matrix, determinant is 0";
                if (t) throw new Error(R);
                return console.warn(R), this.identity(), this
            }
            return this.multiplyScalar(1 / y), this
        },
        translate: function() {
            console.warn("THREE.Matrix4: .translate() has been removed.")
        },
        rotateX: function() {
            console.warn("THREE.Matrix4: .rotateX() has been removed.")
        },
        rotateY: function() {
            console.warn("THREE.Matrix4: .rotateY() has been removed.")
        },
        rotateZ: function() {
            console.warn("THREE.Matrix4: .rotateZ() has been removed.")
        },
        rotateByAxis: function() {
            console.warn("THREE.Matrix4: .rotateByAxis() has been removed.")
        },
        scale: function(e) {
            var t = this.elements,
                r = e.x,
                i = e.y,
                n = e.z;
            return t[0] *= r, t[4] *= i, t[8] *= n, t[1] *= r, t[5] *= i, t[9] *= n, t[2] *= r, t[6] *= i, t[10] *= n, t[3] *= r, t[7] *= i, t[11] *= n, this
        },
        getMaxScaleOnAxis: function() {
            var e = this.elements,
                t = e[0] * e[0] + e[1] * e[1] + e[2] * e[2],
                r = e[4] * e[4] + e[5] * e[5] + e[6] * e[6],
                i = e[8] * e[8] + e[9] * e[9] + e[10] * e[10];
            return Math.sqrt(Math.max(t, Math.max(r, i)))
        },
        makeTranslation: function(e, t, r) {
            return this.set(1, 0, 0, e, 0, 1, 0, t, 0, 0, 1, r, 0, 0, 0, 1), this
        },
        makeRotationX: function(e) {
            var t = Math.cos(e),
                r = Math.sin(e);
            return this.set(1, 0, 0, 0, 0, t, -r, 0, 0, r, t, 0, 0, 0, 0, 1), this
        },
        makeRotationY: function(e) {
            var t = Math.cos(e),
                r = Math.sin(e);
            return this.set(t, 0, r, 0, 0, 1, 0, 0, -r, 0, t, 0, 0, 0, 0, 1), this
        },
        makeRotationZ: function(e) {
            var t = Math.cos(e),
                r = Math.sin(e);
            return this.set(t, -r, 0, 0, r, t, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1), this
        },
        makeRotationAxis: function(e, t) {
            var r = Math.cos(t),
                i = Math.sin(t),
                n = 1 - r,
                a = e.x,
                o = e.y,
                s = e.z,
                h = n * a,
                l = n * o;
            return this.set(h * a + r, h * o - i * s, h * s + i * o, 0, h * o + i * s, l * o + r, l * s - i * a, 0, h * s - i * o, l * s + i * a, n * s * s + r, 0, 0, 0, 0, 1), this
        },
        makeScale: function(e, t, r) {
            return this.set(e, 0, 0, 0, 0, t, 0, 0, 0, 0, r, 0, 0, 0, 0, 1), this
        },
        compose: function(e, t, r) {
            return this.makeRotationFromQuaternion(t), this.scale(r), this.setPosition(e), this
        },
        decompose: function() {
            var e = new THREE.Vector3,
                t = new THREE.Matrix4;
            return function(r, i, n) {
                var a = this.elements,
                    o = e.set(a[0], a[1], a[2]).length(),
                    s = e.set(a[4], a[5], a[6]).length(),
                    h = e.set(a[8], a[9], a[10]).length(),
                    l = this.determinant();
                0 > l && (o = -o), r.x = a[12], r.y = a[13], r.z = a[14], t.elements.set(this.elements);
                var c = 1 / o,
                    u = 1 / s,
                    f = 1 / h;
                return t.elements[0] *= c, t.elements[1] *= c, t.elements[2] *= c, t.elements[4] *= u, t.elements[5] *= u, t.elements[6] *= u, t.elements[8] *= f, t.elements[9] *= f, t.elements[10] *= f, i.setFromRotationMatrix(t), n.x = o, n.y = s, n.z = h, this
            }
        }(),
        makeFrustum: function(e, t, r, i, n, a) {
            var o = this.elements,
                s = 2 * n / (t - e),
                h = 2 * n / (i - r),
                l = (t + e) / (t - e),
                c = (i + r) / (i - r),
                u = -(a + n) / (a - n),
                f = -2 * a * n / (a - n);
            return o[0] = s, o[4] = 0, o[8] = l, o[12] = 0, o[1] = 0, o[5] = h, o[9] = c, o[13] = 0, o[2] = 0, o[6] = 0, o[10] = u, o[14] = f, o[3] = 0, o[7] = 0, o[11] = -1, o[15] = 0, this
        },
        makePerspective: function(e, t, r, i) {
            var n = r * Math.tan(THREE.Math.degToRad(.5 * e)),
                a = -n,
                o = a * t,
                s = n * t;
            return this.makeFrustum(o, s, a, n, r, i)
        },
        makeOrthographic: function(e, t, r, i, n, a) {
            var o = this.elements,
                s = t - e,
                h = r - i,
                l = a - n,
                c = (t + e) / s,
                u = (r + i) / h,
                f = (a + n) / l;
            return o[0] = 2 / s, o[4] = 0, o[8] = 0, o[12] = -c, o[1] = 0, o[5] = 2 / h, o[9] = 0, o[13] = -u, o[2] = 0, o[6] = 0, o[10] = -2 / l, o[14] = -f, o[3] = 0, o[7] = 0, o[11] = 0, o[15] = 1, this
        },
        fromArray: function(e) {
            return this.elements.set(e), this
        },
        toArray: function() {
            var e = this.elements;
            return [e[0], e[1], e[2], e[3], e[4], e[5], e[6], e[7], e[8], e[9], e[10], e[11], e[12], e[13], e[14], e[15]]
        },
        clone: function() {
            var e = this.elements;
            return new THREE.Matrix4(e[0], e[4], e[8], e[12], e[1], e[5], e[9], e[13], e[2], e[6], e[10], e[14], e[3], e[7], e[11], e[15])
        }
    }, THREE.Ray = function(e, t) {
        this.origin = void 0 !== e ? e : new THREE.Vector3, this.direction = void 0 !== t ? t : new THREE.Vector3
    }, THREE.Ray.prototype = {
        constructor: THREE.Ray,
        set: function(e, t) {
            return this.origin.copy(e), this.direction.copy(t), this
        },
        copy: function(e) {
            return this.origin.copy(e.origin), this.direction.copy(e.direction), this
        },
        at: function(e, t) {
            var r = t || new THREE.Vector3;
            return r.copy(this.direction).multiplyScalar(e).add(this.origin)
        },
        recast: function() {
            var e = new THREE.Vector3;
            return function(t) {
                return this.origin.copy(this.at(t, e)), this
            }
        }(),
        closestPointToPoint: function(e, t) {
            var r = t || new THREE.Vector3;
            r.subVectors(e, this.origin);
            var i = r.dot(this.direction);
            return 0 > i ? r.copy(this.origin) : r.copy(this.direction).multiplyScalar(i).add(this.origin)
        },
        distanceToPoint: function() {
            var e = new THREE.Vector3;
            return function(t) {
                var r = e.subVectors(t, this.origin).dot(this.direction);
                return 0 > r ? this.origin.distanceTo(t) : (e.copy(this.direction).multiplyScalar(r).add(this.origin), e.distanceTo(t))
            }
        }(),
        distanceSqToSegment: function(e, t, r, i) {
            var n, a, o, s, h = e.clone().add(t).multiplyScalar(.5),
                l = t.clone().sub(e).normalize(),
                c = .5 * e.distanceTo(t),
                u = this.origin.clone().sub(h),
                f = -this.direction.dot(l),
                E = u.dot(this.direction),
                p = -u.dot(l),
                d = u.lengthSq(),
                m = Math.abs(1 - f * f);
            if (m >= 0)
                if (n = f * p - E, a = f * E - p, s = c * m, n >= 0)
                    if (a >= -s)
                        if (s >= a) {
                            var v = 1 / m;
                            n *= v, a *= v, o = n * (n + f * a + 2 * E) + a * (f * n + a + 2 * p) + d
                        } else a = c, n = Math.max(0, -(f * a + E)), o = -n * n + a * (a + 2 * p) + d;
            else a = -c, n = Math.max(0, -(f * a + E)), o = -n * n + a * (a + 2 * p) + d;
            else -s >= a ? (n = Math.max(0, -(-f * c + E)), a = n > 0 ? -c : Math.min(Math.max(-c, -p), c), o = -n * n + a * (a + 2 * p) + d) : s >= a ? (n = 0, a = Math.min(Math.max(-c, -p), c), o = a * (a + 2 * p) + d) : (n = Math.max(0, -(f * c + E)), a = n > 0 ? c : Math.min(Math.max(-c, -p), c), o = -n * n + a * (a + 2 * p) + d);
            else a = f > 0 ? -c : c, n = Math.max(0, -(f * a + E)), o = -n * n + a * (a + 2 * p) + d;
            return r && r.copy(this.direction.clone().multiplyScalar(n).add(this.origin)), i && i.copy(l.clone().multiplyScalar(a).add(h)), o
        },
        isIntersectionSphere: function(e) {
            return this.distanceToPoint(e.center) <= e.radius
        },
        intersectSphere: function() {
            var e = new THREE.Vector3;
            return function(t, r) {
                e.subVectors(t.center, this.origin);
                var i = e.dot(this.direction),
                    n = e.dot(e) - i * i,
                    a = t.radius * t.radius;
                if (n > a) return null;
                var o = Math.sqrt(a - n),
                    s = i - o,
                    h = i + o;
                return 0 > s && 0 > h ? null : 0 > s ? this.at(h, r) : this.at(s, r)
            }
        }(),
        isIntersectionPlane: function(e) {
            var t = e.distanceToPoint(this.origin);
            if (0 === t) return !0;
            var r = e.normal.dot(this.direction);
            return 0 > r * t ? !0 : !1
        },
        distanceToPlane: function(e) {
            var t = e.normal.dot(this.direction);
            if (0 == t) return 0 == e.distanceToPoint(this.origin) ? 0 : null;
            var r = -(this.origin.dot(e.normal) + e.constant) / t;
            return r >= 0 ? r : null
        },
        intersectPlane: function(e, t) {
            var r = this.distanceToPlane(e);
            return null === r ? null : this.at(r, t)
        },
        isIntersectionBox: function() {
            var e = new THREE.Vector3;
            return function(t) {
                return null !== this.intersectBox(t, e)
            }
        }(),
        intersectBox: function(e, t) {
            var r, i, n, a, o, s, h = 1 / this.direction.x,
                l = 1 / this.direction.y,
                c = 1 / this.direction.z,
                u = this.origin;
            return h >= 0 ? (r = (e.min.x - u.x) * h, i = (e.max.x - u.x) * h) : (r = (e.max.x - u.x) * h, i = (e.min.x - u.x) * h), l >= 0 ? (n = (e.min.y - u.y) * l, a = (e.max.y - u.y) * l) : (n = (e.max.y - u.y) * l, a = (e.min.y - u.y) * l), r > a || n > i ? null : ((n > r || r !== r) && (r = n), (i > a || i !== i) && (i = a), c >= 0 ? (o = (e.min.z - u.z) * c, s = (e.max.z - u.z) * c) : (o = (e.max.z - u.z) * c, s = (e.min.z - u.z) * c), r > s || o > i ? null : ((o > r || r !== r) && (r = o), (i > s || i !== i) && (i = s), 0 > i ? null : this.at(r >= 0 ? r : i, t)))
        },
        intersectTriangle: function() {
            var e = new THREE.Vector3,
                t = new THREE.Vector3,
                r = new THREE.Vector3,
                i = new THREE.Vector3;
            return function(n, a, o, s, h) {
                t.subVectors(a, n), r.subVectors(o, n), i.crossVectors(t, r);
                var l, c = this.direction.dot(i);
                if (c > 0) {
                    if (s) return null;
                    l = 1
                } else {
                    if (!(0 > c)) return null;
                    l = -1, c = -c
                }
                e.subVectors(this.origin, n);
                var u = l * this.direction.dot(r.crossVectors(e, r));
                if (0 > u) return null;
                var f = l * this.direction.dot(t.cross(e));
                if (0 > f) return null;
                if (u + f > c) return null;
                var E = -l * e.dot(i);
                return 0 > E ? null : this.at(E / c, h)
            }
        }(),
        applyMatrix4: function(e) {
            return this.direction.add(this.origin).applyMatrix4(e), this.origin.applyMatrix4(e), this.direction.sub(this.origin), this.direction.normalize(), this
        },
        equals: function(e) {
            return e.origin.equals(this.origin) && e.direction.equals(this.direction)
        },
        clone: function() {
            return (new THREE.Ray).copy(this)
        }
    }, THREE.Sphere = function(e, t) {
        this.center = void 0 !== e ? e : new THREE.Vector3, this.radius = void 0 !== t ? t : 0
    }, THREE.Sphere.prototype = {
        constructor: THREE.Sphere,
        set: function(e, t) {
            return this.center.copy(e), this.radius = t, this
        },
        setFromPoints: function() {
            var e = new THREE.Box3;
            return function(t, r) {
                var i = this.center;
                void 0 !== r ? i.copy(r) : e.setFromPoints(t).center(i);
                for (var n = 0, a = 0, o = t.length; o > a; a++) n = Math.max(n, i.distanceToSquared(t[a]));
                return this.radius = Math.sqrt(n), this
            }
        }(),
        copy: function(e) {
            return this.center.copy(e.center), this.radius = e.radius, this
        },
        empty: function() {
            return this.radius <= 0
        },
        containsPoint: function(e) {
            return e.distanceToSquared(this.center) <= this.radius * this.radius
        },
        distanceToPoint: function(e) {
            return e.distanceTo(this.center) - this.radius
        },
        intersectsSphere: function(e) {
            var t = this.radius + e.radius;
            return e.center.distanceToSquared(this.center) <= t * t
        },
        clampPoint: function(e, t) {
            var r = this.center.distanceToSquared(e),
                i = t || new THREE.Vector3;
            return i.copy(e), r > this.radius * this.radius && (i.sub(this.center).normalize(), i.multiplyScalar(this.radius).add(this.center)), i
        },
        getBoundingBox: function(e) {
            var t = e || new THREE.Box3;
            return t.set(this.center, this.center), t.expandByScalar(this.radius), t
        },
        applyMatrix4: function(e) {
            return this.center.applyMatrix4(e), this.radius = this.radius * e.getMaxScaleOnAxis(), this
        },
        translate: function(e) {
            return this.center.add(e), this
        },
        equals: function(e) {
            return e.center.equals(this.center) && e.radius === this.radius
        },
        clone: function() {
            return (new THREE.Sphere).copy(this)
        }
    }, THREE.Frustum = function(e, t, r, i, n, a) {
        this.planes = [void 0 !== e ? e : new THREE.Plane, void 0 !== t ? t : new THREE.Plane, void 0 !== r ? r : new THREE.Plane, void 0 !== i ? i : new THREE.Plane, void 0 !== n ? n : new THREE.Plane, void 0 !== a ? a : new THREE.Plane]
    }, THREE.Frustum.prototype = {
        constructor: THREE.Frustum,
        set: function(e, t, r, i, n, a) {
            var o = this.planes;
            return o[0].copy(e), o[1].copy(t), o[2].copy(r), o[3].copy(i), o[4].copy(n), o[5].copy(a), this
        },
        copy: function(e) {
            for (var t = this.planes, r = 0; 6 > r; r++) t[r].copy(e.planes[r]);
            return this
        },
        setFromMatrix: function(e) {
            var t = this.planes,
                r = e.elements,
                i = r[0],
                n = r[1],
                a = r[2],
                o = r[3],
                s = r[4],
                h = r[5],
                l = r[6],
                c = r[7],
                u = r[8],
                f = r[9],
                E = r[10],
                p = r[11],
                d = r[12],
                m = r[13],
                v = r[14],
                g = r[15];
            return t[0].setComponents(o - i, c - s, p - u, g - d).normalize(), t[1].setComponents(o + i, c + s, p + u, g + d).normalize(), t[2].setComponents(o + n, c + h, p + f, g + m).normalize(), t[3].setComponents(o - n, c - h, p - f, g - m).normalize(), t[4].setComponents(o - a, c - l, p - E, g - v).normalize(), t[5].setComponents(o + a, c + l, p + E, g + v).normalize(), this
        },
        intersectsObject: function() {
            var e = new THREE.Sphere;
            return function(t) {
                var r = t.geometry;
                return null === r.boundingSphere && r.computeBoundingSphere(), e.copy(r.boundingSphere), e.applyMatrix4(t.matrixWorld), this.intersectsSphere(e)
            }
        }(),
        intersectsSphere: function(e) {
            for (var t = this.planes, r = e.center, i = -e.radius, n = 0; 6 > n; n++) {
                var a = t[n].distanceToPoint(r);
                if (i > a) return !1
            }
            return !0
        },
        intersectsBox: function() {
            var e = new THREE.Vector3,
                t = new THREE.Vector3;
            return function(r) {
                for (var i = this.planes, n = 0; 6 > n; n++) {
                    var a = i[n];
                    e.x = a.normal.x > 0 ? r.min.x : r.max.x, t.x = a.normal.x > 0 ? r.max.x : r.min.x, e.y = a.normal.y > 0 ? r.min.y : r.max.y, t.y = a.normal.y > 0 ? r.max.y : r.min.y, e.z = a.normal.z > 0 ? r.min.z : r.max.z, t.z = a.normal.z > 0 ? r.max.z : r.min.z;
                    var o = a.distanceToPoint(e),
                        s = a.distanceToPoint(t);
                    if (0 > o && 0 > s) return !1
                }
                return !0
            }
        }(),
        containsPoint: function(e) {
            for (var t = this.planes, r = 0; 6 > r; r++)
                if (t[r].distanceToPoint(e) < 0) return !1;
            return !0
        },
        clone: function() {
            return (new THREE.Frustum).copy(this)
        }
    }, THREE.Plane = function(e, t) {
        this.normal = void 0 !== e ? e : new THREE.Vector3(1, 0, 0), this.constant = void 0 !== t ? t : 0
    }, THREE.Plane.prototype = {
        constructor: THREE.Plane,
        set: function(e, t) {
            return this.normal.copy(e), this.constant = t, this
        },
        setComponents: function(e, t, r, i) {
            return this.normal.set(e, t, r), this.constant = i, this
        },
        setFromNormalAndCoplanarPoint: function(e, t) {
            return this.normal.copy(e), this.constant = -t.dot(this.normal), this
        },
        setFromCoplanarPoints: function() {
            var e = new THREE.Vector3,
                t = new THREE.Vector3;
            return function(r, i, n) {
                var a = e.subVectors(n, i).cross(t.subVectors(r, i)).normalize();
                return this.setFromNormalAndCoplanarPoint(a, r), this
            }
        }(),
        copy: function(e) {
            return this.normal.copy(e.normal), this.constant = e.constant, this
        },
        normalize: function() {
            var e = 1 / this.normal.length();
            return this.normal.multiplyScalar(e), this.constant *= e, this
        },
        negate: function() {
            return this.constant *= -1, this.normal.negate(), this
        },
        distanceToPoint: function(e) {
            return this.normal.dot(e) + this.constant
        },
        distanceToSphere: function(e) {
            return this.distanceToPoint(e.center) - e.radius
        },
        projectPoint: function(e, t) {
            return this.orthoPoint(e, t).sub(e).negate()
        },
        orthoPoint: function(e, t) {
            var r = this.distanceToPoint(e),
                i = t || new THREE.Vector3;
            return i.copy(this.normal).multiplyScalar(r)
        },
        isIntersectionLine: function(e) {
            var t = this.distanceToPoint(e.start),
                r = this.distanceToPoint(e.end);
            return 0 > t && r > 0 || 0 > r && t > 0
        },
        intersectLine: function() {
            var e = new THREE.Vector3;
            return function(t, r) {
                var i = r || new THREE.Vector3,
                    n = t.delta(e),
                    a = this.normal.dot(n);
                if (0 == a) return 0 == this.distanceToPoint(t.start) ? i.copy(t.start) : void 0;
                var o = -(t.start.dot(this.normal) + this.constant) / a;
                return 0 > o || o > 1 ? void 0 : i.copy(n).multiplyScalar(o).add(t.start)
            }
        }(),
        coplanarPoint: function(e) {
            var t = e || new THREE.Vector3;
            return t.copy(this.normal).multiplyScalar(-this.constant)
        },
        applyMatrix4: function() {
            var e = new THREE.Vector3,
                t = new THREE.Vector3,
                r = new THREE.Matrix3;
            return function(i, n) {
                var a = n || r.getNormalMatrix(i),
                    o = e.copy(this.normal).applyMatrix3(a),
                    s = this.coplanarPoint(t);
                return s.applyMatrix4(i), this.setFromNormalAndCoplanarPoint(o, s), this
            }
        }(),
        translate: function(e) {
            return this.constant = this.constant - e.dot(this.normal), this
        },
        equals: function(e) {
            return e.normal.equals(this.normal) && e.constant == this.constant
        },
        clone: function() {
            return (new THREE.Plane).copy(this)
        }
    }, THREE.Math = {
        generateUUID: function() {
            var e, t = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".split(""),
                r = new Array(36),
                i = 0;
            return function() {
                for (var n = 0; 36 > n; n++) 8 == n || 13 == n || 18 == n || 23 == n ? r[n] = "-" : 14 == n ? r[n] = "4" : (2 >= i && (i = 33554432 + 16777216 * Math.random() | 0), e = 15 & i, i >>= 4, r[n] = t[19 == n ? 3 & e | 8 : e]);
                return r.join("")
            }
        }(),
        clamp: function(e, t, r) {
            return t > e ? t : e > r ? r : e
        },
        clampBottom: function(e, t) {
            return t > e ? t : e
        },
        mapLinear: function(e, t, r, i, n) {
            return i + (e - t) * (n - i) / (r - t)
        },
        smoothstep: function(e, t, r) {
            return t >= e ? 0 : e >= r ? 1 : (e = (e - t) / (r - t), e * e * (3 - 2 * e))
        },
        smootherstep: function(e, t, r) {
            return t >= e ? 0 : e >= r ? 1 : (e = (e - t) / (r - t), e * e * e * (e * (6 * e - 15) + 10))
        },
        random16: function() {
            return (65280 * Math.random() + 255 * Math.random()) / 65535
        },
        randInt: function(e, t) {
            return e + Math.floor(Math.random() * (t - e + 1))
        },
        randFloat: function(e, t) {
            return e + Math.random() * (t - e)
        },
        randFloatSpread: function(e) {
            return e * (.5 - Math.random())
        },
        sign: function(e) {
            return 0 > e ? -1 : e > 0 ? 1 : 0
        },
        degToRad: function() {
            var e = Math.PI / 180;
            return function(t) {
                return t * e
            }
        }(),
        radToDeg: function() {
            var e = 180 / Math.PI;
            return function(t) {
                return t * e
            }
        }(),
        isPowerOfTwo: function(e) {
            return 0 === (e & e - 1) && 0 !== e
        }
    }, THREE.Spline = function(e) {
        function t(e, t, r, i, n, a, o) {
            var s = .5 * (r - e),
                h = .5 * (i - t);
            return (2 * (t - r) + s + h) * o + (-3 * (t - r) - 2 * s - h) * a + s * n + t
        }
        this.points = e;
        var r, i, n, a, o, s, h, l, c, u = [],
            f = {
                x: 0,
                y: 0,
                z: 0
            };
        this.initFromArray = function(e) {
            this.points = [];
            for (var t = 0; t < e.length; t++) this.points[t] = {
                x: e[t][0],
                y: e[t][1],
                z: e[t][2]
            }
        }, this.getPoint = function(e) {
            return r = (this.points.length - 1) * e, i = Math.floor(r), n = r - i, u[0] = 0 === i ? i : i - 1, u[1] = i, u[2] = i > this.points.length - 2 ? this.points.length - 1 : i + 1, u[3] = i > this.points.length - 3 ? this.points.length - 1 : i + 2, s = this.points[u[0]], h = this.points[u[1]], l = this.points[u[2]], c = this.points[u[3]], a = n * n, o = n * a, f.x = t(s.x, h.x, l.x, c.x, n, a, o), f.y = t(s.y, h.y, l.y, c.y, n, a, o), f.z = t(s.z, h.z, l.z, c.z, n, a, o), f
        }, this.getControlPointsArray = function() {
            var e, t, r = this.points.length,
                i = [];
            for (e = 0; r > e; e++) t = this.points[e], i[e] = [t.x, t.y, t.z];
            return i
        }, this.getLength = function(e) {
            var t, r, i, n, a = 0,
                o = 0,
                s = 0,
                h = new THREE.Vector3,
                l = new THREE.Vector3,
                c = [],
                u = 0;
            for (c[0] = 0, e || (e = 100), i = this.points.length * e, h.copy(this.points[0]), t = 1; i > t; t++) r = t / i, n = this.getPoint(r), l.copy(n), u += l.distanceTo(h), h.copy(n), a = (this.points.length - 1) * r, o = Math.floor(a), o != s && (c[o] = u, s = o);
            return c[c.length] = u, {
                chunks: c,
                total: u
            }
        }, this.reparametrizeByArcLength = function(e) {
            var t, r, i, n, a, o, s, h, l = [],
                c = new THREE.Vector3,
                u = this.getLength();
            for (l.push(c.copy(this.points[0]).clone()), t = 1; t < this.points.length; t++) {
                for (o = u.chunks[t] - u.chunks[t - 1], s = Math.ceil(e * o / u.total), n = (t - 1) / (this.points.length - 1), a = t / (this.points.length - 1), r = 1; s - 1 > r; r++) i = n + r * (1 / s) * (a - n), h = this.getPoint(i), l.push(c.copy(h).clone());
                l.push(c.copy(this.points[t]).clone())
            }
            this.points = l
        }
    }, THREE.Triangle = function(e, t, r) {
        this.a = void 0 !== e ? e : new THREE.Vector3, this.b = void 0 !== t ? t : new THREE.Vector3, this.c = void 0 !== r ? r : new THREE.Vector3
    }, THREE.Triangle.normal = function() {
        var e = new THREE.Vector3;
        return function(t, r, i, n) {
            var a = n || new THREE.Vector3;
            a.subVectors(i, r), e.subVectors(t, r), a.cross(e);
            var o = a.lengthSq();
            return o > 0 ? a.multiplyScalar(1 / Math.sqrt(o)) : a.set(0, 0, 0)
        }
    }(), THREE.Triangle.barycoordFromPoint = function() {
        var e = new THREE.Vector3,
            t = new THREE.Vector3,
            r = new THREE.Vector3;
        return function(i, n, a, o, s) {
            e.subVectors(o, n), t.subVectors(a, n), r.subVectors(i, n);
            var h = e.dot(e),
                l = e.dot(t),
                c = e.dot(r),
                u = t.dot(t),
                f = t.dot(r),
                E = h * u - l * l,
                p = s || new THREE.Vector3;
            if (0 == E) return p.set(-2, -1, -1);
            var d = 1 / E,
                m = (u * c - l * f) * d,
                v = (h * f - l * c) * d;
            return p.set(1 - m - v, v, m)
        }
    }(), THREE.Triangle.containsPoint = function() {
        var e = new THREE.Vector3;
        return function(t, r, i, n) {
            var a = THREE.Triangle.barycoordFromPoint(t, r, i, n, e);
            return a.x >= 0 && a.y >= 0 && a.x + a.y <= 1
        }
    }(), THREE.Triangle.prototype = {
        constructor: THREE.Triangle,
        set: function(e, t, r) {
            return this.a.copy(e), this.b.copy(t), this.c.copy(r), this
        },
        setFromPointsAndIndices: function(e, t, r, i) {
            return this.a.copy(e[t]), this.b.copy(e[r]), this.c.copy(e[i]), this
        },
        copy: function(e) {
            return this.a.copy(e.a), this.b.copy(e.b), this.c.copy(e.c), this
        },
        area: function() {
            var e = new THREE.Vector3,
                t = new THREE.Vector3;
            return function() {
                return e.subVectors(this.c, this.b), t.subVectors(this.a, this.b), .5 * e.cross(t).length()
            }
        }(),
        midpoint: function(e) {
            var t = e || new THREE.Vector3;
            return t.addVectors(this.a, this.b).add(this.c).multiplyScalar(1 / 3)
        },
        normal: function(e) {
            return THREE.Triangle.normal(this.a, this.b, this.c, e)
        },
        plane: function(e) {
            var t = e || new THREE.Plane;
            return t.setFromCoplanarPoints(this.a, this.b, this.c)
        },
        barycoordFromPoint: function(e, t) {
            return THREE.Triangle.barycoordFromPoint(e, this.a, this.b, this.c, t)
        },
        containsPoint: function(e) {
            return THREE.Triangle.containsPoint(e, this.a, this.b, this.c)
        },
        equals: function(e) {
            return e.a.equals(this.a) && e.b.equals(this.b) && e.c.equals(this.c)
        },
        clone: function() {
            return (new THREE.Triangle).copy(this)
        }
    }, THREE.Clock = function(e) {
        this.autoStart = void 0 !== e ? e : !0, this.startTime = 0, this.oldTime = 0, this.elapsedTime = 0, this.running = !1
    }, THREE.Clock.prototype = {
        constructor: THREE.Clock,
        start: function() {
            this.startTime = void 0 !== self.performance && void 0 !== self.performance.now ? self.performance.now() : Date.now(), this.oldTime = this.startTime, this.running = !0
        },
        stop: function() {
            this.getElapsedTime(), this.running = !1
        },
        getElapsedTime: function() {
            return this.getDelta(), this.elapsedTime
        },
        getDelta: function() {
            var e = 0;
            if (this.autoStart && !this.running && this.start(), this.running) {
                var t = void 0 !== self.performance && void 0 !== self.performance.now ? self.performance.now() : Date.now();
                e = .001 * (t - this.oldTime), this.oldTime = t, this.elapsedTime += e
            }
            return e
        }
    }, THREE.EventDispatcher = function() {}, THREE.EventDispatcher.prototype = {
        constructor: THREE.EventDispatcher,
        apply: function(e) {
            e.addEventListener = THREE.EventDispatcher.prototype.addEventListener, e.hasEventListener = THREE.EventDispatcher.prototype.hasEventListener, e.removeEventListener = THREE.EventDispatcher.prototype.removeEventListener, e.dispatchEvent = THREE.EventDispatcher.prototype.dispatchEvent
        },
        addEventListener: function(e, t) {
            void 0 === this._listeners && (this._listeners = {});
            var r = this._listeners;
            void 0 === r[e] && (r[e] = []), -1 === r[e].indexOf(t) && r[e].push(t)
        },
        hasEventListener: function(e, t) {
            if (void 0 === this._listeners) return !1;
            var r = this._listeners;
            return void 0 !== r[e] && -1 !== r[e].indexOf(t) ? !0 : !1
        },
        removeEventListener: function(e, t) {
            if (void 0 !== this._listeners) {
                var r = this._listeners,
                    i = r[e];
                if (void 0 !== i) {
                    var n = i.indexOf(t); - 1 !== n && i.splice(n, 1)
                }
            }
        },
        dispatchEvent: function(e) {
            if (void 0 !== this._listeners) {
                var t = this._listeners,
                    r = t[e.type];
                if (void 0 !== r) {
                    e.target = this;
                    for (var i = [], n = r.length, a = 0; n > a; a++) i[a] = r[a];
                    for (var a = 0; n > a; a++) i[a].call(this, e)
                }
            }
        }
    },
    function(e) {
        e.Raycaster = function(t, r, i, n) {
            this.ray = new e.Ray(t, r), this.near = i || 0, this.far = n || 1 / 0, this.params = {
                Sprite: {},
                Mesh: {},
                PointCloud: {
                    threshold: 1
                },
                LOD: {},
                Line: {}
            }
        };
        var t = function(e, t) {
                return e.distance - t.distance
            },
            r = function(e, t, i, n) {
                if (e.raycast(t, i), n === !0)
                    for (var a = e.children, o = 0, s = a.length; s > o; o++) r(a[o], t, i, !0)
            };
        e.Raycaster.prototype = {
            constructor: e.Raycaster,
            precision: 1e-4,
            linePrecision: 1,
            set: function(e, t) {
                this.ray.set(e, t)
            },
            intersectObject: function(e, i) {
                var n = [];
                return r(e, this, n, i), n.sort(t), n
            },
            intersectObjects: function(e, i) {
                for (var n = [], a = 0, o = e.length; o > a; a++) r(e[a], this, n, i);
                return n.sort(t), n
            }
        }
    }(THREE), THREE.Object3D = function() {
        this.id = THREE.Object3DIdCount++, this.uuid = THREE.Math.generateUUID(), this.name = "", this.parent = void 0, this.children = [], this.up = THREE.Object3D.DefaultUp.clone();
        var e = new THREE.Vector3,
            t = new THREE.Euler,
            r = new THREE.Quaternion,
            i = new THREE.Vector3(1, 1, 1);
        t.onChange(function() {
            r.setFromEuler(t, !1)
        }), r.onChange(function() {
            t.setFromQuaternion(r, void 0, !1)
        }), Object.defineProperties(this, {
            position: {
                enumerable: !0,
                value: e
            },
            rotation: {
                enumerable: !0,
                value: t
            },
            quaternion: {
                enumerable: !0,
                value: r
            },
            scale: {
                enumerable: !0,
                value: i
            }
        }), this.renderDepth = null, this.rotationAutoUpdate = !0, this.matrix = new THREE.Matrix4, this.matrixWorld = new THREE.Matrix4, this.matrixAutoUpdate = !0, this.matrixWorldNeedsUpdate = !1, this.visible = !0, this.castShadow = !1, this.receiveShadow = !1, this.frustumCulled = !0, this.userData = {}
    }, THREE.Object3D.DefaultUp = new THREE.Vector3(0, 1, 0), THREE.Object3D.prototype = {
        constructor: THREE.Object3D,
        get eulerOrder() {
            return console.warn("THREE.Object3D: .eulerOrder has been moved to .rotation.order."), this.rotation.order
        },
        set eulerOrder(e) {
            console.warn("THREE.Object3D: .eulerOrder has been moved to .rotation.order."), this.rotation.order = e
        },
        get useQuaternion() {
            console.warn("THREE.Object3D: .useQuaternion has been removed. The library now uses quaternions by default.")
        },
        set useQuaternion(e) {
            console.warn("THREE.Object3D: .useQuaternion has been removed. The library now uses quaternions by default.")
        },
        applyMatrix: function(e) {
            this.matrix.multiplyMatrices(e, this.matrix), this.matrix.decompose(this.position, this.quaternion, this.scale)
        },
        setRotationFromAxisAngle: function(e, t) {
            this.quaternion.setFromAxisAngle(e, t)
        },
        setRotationFromEuler: function(e) {
            this.quaternion.setFromEuler(e, !0)
        },
        setRotationFromMatrix: function(e) {
            this.quaternion.setFromRotationMatrix(e)
        },
        setRotationFromQuaternion: function(e) {
            this.quaternion.copy(e)
        },
        rotateOnAxis: function() {
            var e = new THREE.Quaternion;
            return function(t, r) {
                return e.setFromAxisAngle(t, r), this.quaternion.multiply(e), this
            }
        }(),
        rotateX: function() {
            var e = new THREE.Vector3(1, 0, 0);
            return function(t) {
                return this.rotateOnAxis(e, t)
            }
        }(),
        rotateY: function() {
            var e = new THREE.Vector3(0, 1, 0);
            return function(t) {
                return this.rotateOnAxis(e, t)
            }
        }(),
        rotateZ: function() {
            var e = new THREE.Vector3(0, 0, 1);
            return function(t) {
                return this.rotateOnAxis(e, t)
            }
        }(),
        translateOnAxis: function() {
            var e = new THREE.Vector3;
            return function(t, r) {
                return e.copy(t).applyQuaternion(this.quaternion), this.position.add(e.multiplyScalar(r)), this
            }
        }(),
        translate: function(e, t) {
            return console.warn("THREE.Object3D: .translate() has been removed. Use .translateOnAxis( axis, distance ) instead."), this.translateOnAxis(t, e)
        },
        translateX: function() {
            var e = new THREE.Vector3(1, 0, 0);
            return function(t) {
                return this.translateOnAxis(e, t)
            }
        }(),
        translateY: function() {
            var e = new THREE.Vector3(0, 1, 0);
            return function(t) {
                return this.translateOnAxis(e, t)
            }
        }(),
        translateZ: function() {
            var e = new THREE.Vector3(0, 0, 1);
            return function(t) {
                return this.translateOnAxis(e, t)
            }
        }(),
        localToWorld: function(e) {
            return e.applyMatrix4(this.matrixWorld)
        },
        worldToLocal: function() {
            var e = new THREE.Matrix4;
            return function(t) {
                return t.applyMatrix4(e.getInverse(this.matrixWorld))
            }
        }(),
        lookAt: function() {
            var e = new THREE.Matrix4;
            return function(t) {
                e.lookAt(t, this.position, this.up), this.quaternion.setFromRotationMatrix(e)
            }
        }(),
        add: function(e) {
            if (arguments.length > 1) {
                for (var t = 0; t < arguments.length; t++) this.add(arguments[t]);
                return this
            }
            if (e === this) return console.error("THREE.Object3D.add:", e, "can't be added as a child of itself."), this;
            if (e instanceof THREE.Object3D) {
                void 0 !== e.parent && e.parent.remove(e), e.parent = this, e.dispatchEvent({
                    type: "added"
                }), this.children.push(e);
                for (var r = this; void 0 !== r.parent;) r = r.parent;
                void 0 !== r && r instanceof THREE.Scene && r.__addObject(e)
            } else console.error("THREE.Object3D.add:", e, "is not an instance of THREE.Object3D.");
            return this
        },
        remove: function(e) {
            if (arguments.length > 1)
                for (var t = 0; t < arguments.length; t++) this.remove(arguments[t]);
            var r = this.children.indexOf(e);
            if (-1 !== r) {
                e.parent = void 0, e.dispatchEvent({
                    type: "removed"
                }), this.children.splice(r, 1);
                for (var i = this; void 0 !== i.parent;) i = i.parent;
                void 0 !== i && i instanceof THREE.Scene && i.__removeObject(e)
            }
        },
        raycast: function() {},
        traverse: function(e) {
            e(this);
            for (var t = 0, r = this.children.length; r > t; t++) this.children[t].traverse(e)
        },
        traverseVisible: function(e) {
            if (this.visible !== !1) {
                e(this);
                for (var t = 0, r = this.children.length; r > t; t++) this.children[t].traverseVisible(e)
            }
        },
        getObjectById: function(e, t) {
            for (var r = 0, i = this.children.length; i > r; r++) {
                var n = this.children[r];
                if (n.id === e) return n;
                if (t === !0 && (n = n.getObjectById(e, t), void 0 !== n)) return n
            }
            return void 0
        },
        getObjectByName: function(e, t) {
            for (var r = 0, i = this.children.length; i > r; r++) {
                var n = this.children[r];
                if (n.name === e) return n;
                if (t === !0 && (n = n.getObjectByName(e, t), void 0 !== n)) return n
            }
            return void 0
        },
        getChildByName: function(e, t) {
            return console.warn("THREE.Object3D: .getChildByName() has been renamed to .getObjectByName()."), this.getObjectByName(e, t)
        },
        updateMatrix: function() {
            this.matrix.compose(this.position, this.quaternion, this.scale), this.matrixWorldNeedsUpdate = !0
        },
        updateMatrixWorld: function(e) {
            this.matrixAutoUpdate === !0 && this.updateMatrix(), (this.matrixWorldNeedsUpdate === !0 || e === !0) && (void 0 === this.parent ? this.matrixWorld.copy(this.matrix) : this.matrixWorld.multiplyMatrices(this.parent.matrixWorld, this.matrix), this.matrixWorldNeedsUpdate = !1, e = !0);
            for (var t = 0, r = this.children.length; r > t; t++) this.children[t].updateMatrixWorld(e)
        },
        clone: function(e, t) {
            if (void 0 === e && (e = new THREE.Object3D), void 0 === t && (t = !0), e.name = this.name, e.up.copy(this.up), e.position.copy(this.position), e.quaternion.copy(this.quaternion), e.scale.copy(this.scale), e.renderDepth = this.renderDepth, e.rotationAutoUpdate = this.rotationAutoUpdate, e.matrix.copy(this.matrix), e.matrixWorld.copy(this.matrixWorld), e.matrixAutoUpdate = this.matrixAutoUpdate, e.matrixWorldNeedsUpdate = this.matrixWorldNeedsUpdate, e.visible = this.visible, e.castShadow = this.castShadow, e.receiveShadow = this.receiveShadow, e.frustumCulled = this.frustumCulled, e.userData = JSON.parse(JSON.stringify(this.userData)), t === !0)
                for (var r = 0; r < this.children.length; r++) {
                    var i = this.children[r];
                    e.add(i.clone())
                }
            return e
        }
    }, THREE.EventDispatcher.prototype.apply(THREE.Object3D.prototype), THREE.Object3DIdCount = 0, THREE.Projector = function() {
        function e() {
            if (h === T) {
                var e = new THREE.RenderableObject;
                return g.push(e), T++, h++, e
            }
            return g[h++]
        }

        function t() {
            if (c === R) {
                var e = new THREE.RenderableVertex;
                return y.push(e), R++, c++, e
            }
            return y[c++]
        }

        function r() {
            if (f === H) {
                var e = new THREE.RenderableFace;
                return x.push(e), H++, f++, e
            }
            return x[f++]
        }

        function i() {
            if (p === _) {
                var e = new THREE.RenderableLine;
                return b.push(e), _++, p++, e
            }
            return b[p++]
        }

        function n() {
            if (m === M) {
                var e = new THREE.RenderableSprite;
                return w.push(e), M++, m++, e
            }
            return w[m++]
        }

        function a(e, t) {
            return e.z !== t.z ? t.z - e.z : e.id !== t.id ? e.id - t.id : 0
        }

        function o(e, t) {
            var r = 0,
                i = 1,
                n = e.z + e.w,
                a = t.z + t.w,
                o = -e.z + e.w,
                s = -t.z + t.w;
            return n >= 0 && a >= 0 && o >= 0 && s >= 0 ? !0 : 0 > n && 0 > a || 0 > o && 0 > s ? !1 : (0 > n ? r = Math.max(r, n / (n - a)) : 0 > a && (i = Math.min(i, n / (n - a))), 0 > o ? r = Math.max(r, o / (o - s)) : 0 > s && (i = Math.min(i, o / (o - s))), r > i ? !1 : (e.lerp(t, r), t.lerp(e, 1 - i), !0))
        }
        var s, h, l, c, u, f, E, p, d, m, v, g = [],
            T = 0,
            y = [],
            R = 0,
            x = [],
            H = 0,
            b = [],
            _ = 0,
            w = [],
            M = 0,
            S = {
                objects: [],
                lights: [],
                elements: []
            },
            C = new THREE.Vector3,
            A = new THREE.Vector3,
            L = new THREE.Vector3,
            P = new THREE.Vector3,
            F = new THREE.Vector4,
            D = new THREE.Box3(new THREE.Vector3(-1, -1, -1), new THREE.Vector3(1, 1, 1)),
            U = new THREE.Box3,
            V = new Array(3),
            z = (new Array(4), new THREE.Matrix4),
            B = new THREE.Matrix4,
            k = new THREE.Matrix4,
            N = new THREE.Matrix3,
            O = new THREE.Frustum,
            I = new THREE.Vector4,
            G = new THREE.Vector4;
        this.projectVector = function(e, t) {
            return t.matrixWorldInverse.getInverse(t.matrixWorld), B.multiplyMatrices(t.projectionMatrix, t.matrixWorldInverse), e.applyProjection(B)
        }, this.unprojectVector = function() {
            var e = new THREE.Matrix4;
            return function(t, r) {
                return e.getInverse(r.projectionMatrix), B.multiplyMatrices(r.matrixWorld, e), t.applyProjection(B)
            }
        }(), this.pickingRay = function(e, t) {
            e.z = -1;
            var r = new THREE.Vector3(e.x, e.y, 1);
            return this.unprojectVector(e, t), this.unprojectVector(r, t), r.sub(e).normalize(), new THREE.Raycaster(e, r)
        };
        var W = function() {
                var e = [],
                    n = [],
                    a = null,
                    o = null,
                    s = new THREE.Matrix3,
                    h = function(t) {
                        a = t, o = a.material, s.getNormalMatrix(a.matrixWorld), e.length = 0, n.length = 0
                    },
                    c = function(e) {
                        var t = e.position,
                            r = e.positionWorld,
                            i = e.positionScreen;
                        r.copy(t).applyMatrix4(v), i.copy(r).applyMatrix4(B);
                        var n = 1 / i.w;
                        i.x *= n, i.y *= n, i.z *= n, e.visible = i.x >= -1 && i.x <= 1 && i.y >= -1 && i.y <= 1 && i.z >= -1 && i.z <= 1
                    },
                    f = function(e, r, i) {
                        l = t(), l.position.set(e, r, i), c(l)
                    },
                    p = function(t, r, i) {
                        e.push(t, r, i)
                    },
                    d = function(e, t) {
                        n.push(e, t)
                    },
                    m = function(e, t, r) {
                        return e.visible === !0 || t.visible === !0 || r.visible === !0 ? !0 : (V[0] = e.positionScreen, V[1] = t.positionScreen, V[2] = r.positionScreen, D.isIntersectionBox(U.setFromPoints(V)))
                    },
                    g = function(e, t, r) {
                        return (r.positionScreen.x - e.positionScreen.x) * (t.positionScreen.y - e.positionScreen.y) - (r.positionScreen.y - e.positionScreen.y) * (t.positionScreen.x - e.positionScreen.x) < 0
                    },
                    T = function(e, t) {
                        var r = y[e],
                            n = y[t];
                        E = i(), E.id = a.id, E.v1.copy(r), E.v2.copy(n), E.z = (r.positionScreen.z + n.positionScreen.z) / 2, E.material = a.material, S.elements.push(E)
                    },
                    R = function(t, i, h) {
                        var l = y[t],
                            c = y[i],
                            f = y[h];
                        if (m(l, c, f) !== !1 && (o.side === THREE.DoubleSide || g(l, c, f) === !0)) {
                            u = r(), u.id = a.id, u.v1.copy(l), u.v2.copy(c), u.v3.copy(f), u.z = (l.positionScreen.z + c.positionScreen.z + f.positionScreen.z) / 3;
                            for (var E = 0; 3 > E; E++) {
                                var p = 3 * arguments[E],
                                    d = u.vertexNormalsModel[E];
                                d.set(e[p], e[p + 1], e[p + 2]), d.applyMatrix3(s).normalize();
                                var v = 2 * arguments[E],
                                    T = u.uvs[E];
                                T.set(n[v], n[v + 1])
                            }
                            u.vertexNormalsLength = 3, u.material = a.material, S.elements.push(u)
                        }
                    };
                return {
                    setObject: h,
                    projectVertex: c,
                    checkTriangleVisibility: m,
                    checkBackfaceCulling: g,
                    pushVertex: f,
                    pushNormal: p,
                    pushUv: d,
                    pushLine: T,
                    pushTriangle: R
                }
            },
            j = new W;
        this.projectScene = function(l, g, T, R) {
            f = 0, p = 0, m = 0, S.elements.length = 0, l.autoUpdate === !0 && l.updateMatrixWorld(), void 0 === g.parent && g.updateMatrixWorld(), z.copy(g.matrixWorldInverse.getInverse(g.matrixWorld)), B.multiplyMatrices(g.projectionMatrix, z), O.setFromMatrix(B), h = 0, S.objects.length = 0, S.lights.length = 0, l.traverseVisible(function(t) {
                t instanceof THREE.Light ? S.lights.push(t) : (t instanceof THREE.Mesh || t instanceof THREE.Line || t instanceof THREE.Sprite) && (t.frustumCulled === !1 || O.intersectsObject(t) === !0) && (s = e(), s.id = t.id, s.object = t, null !== t.renderDepth ? s.z = t.renderDepth : (P.setFromMatrixPosition(t.matrixWorld), P.applyProjection(B), s.z = P.z), S.objects.push(s))
            }), T === !0 && S.objects.sort(a);
            for (var x = 0, H = S.objects.length; H > x; x++) {
                var b = S.objects[x].object,
                    _ = b.geometry;
                if (j.setObject(b), v = b.matrixWorld, c = 0, b instanceof THREE.Mesh) {
                    if (_ instanceof THREE.BufferGeometry) {
                        var w = _.attributes,
                            M = _.offsets;
                        if (void 0 === w.position) continue;
                        for (var D = w.position.array, U = 0, V = D.length; V > U; U += 3) j.pushVertex(D[U], D[U + 1], D[U + 2]);
                        if (void 0 !== w.normal)
                            for (var W = w.normal.array, U = 0, V = W.length; V > U; U += 3) j.pushNormal(W[U], W[U + 1], W[U + 2]);
                        if (void 0 !== w.uv)
                            for (var X = w.uv.array, U = 0, V = X.length; V > U; U += 2) j.pushUv(X[U], X[U + 1]);
                        if (void 0 !== w.index) {
                            var Y = w.index.array;
                            if (M.length > 0)
                                for (var x = 0; x < M.length; x++)
                                    for (var q = M[x], K = q.index, U = q.start, V = q.start + q.count; V > U; U += 3) j.pushTriangle(Y[U] + K, Y[U + 1] + K, Y[U + 2] + K);
                            else
                                for (var U = 0, V = Y.length; V > U; U += 3) j.pushTriangle(Y[U], Y[U + 1], Y[U + 2])
                        } else
                            for (var U = 0, V = D.length / 3; V > U; U += 3) j.pushTriangle(U, U + 1, U + 2)
                    } else if (_ instanceof THREE.Geometry) {
                        var Z = _.vertices,
                            Q = _.faces,
                            J = _.faceVertexUvs[0];
                        N.getNormalMatrix(v);
                        for (var $ = b.material instanceof THREE.MeshFaceMaterial, et = $ === !0 ? b.material : null, tt = 0, rt = Z.length; rt > tt; tt++) {
                            var it = Z[tt];
                            j.pushVertex(it.x, it.y, it.z)
                        }
                        for (var nt = 0, at = Q.length; at > nt; nt++) {
                            var ot = Q[nt],
                                st = $ === !0 ? et.materials[ot.materialIndex] : b.material;
                            if (void 0 !== st) {
                                var ht = st.side,
                                    lt = y[ot.a],
                                    ct = y[ot.b],
                                    ut = y[ot.c];
                                if (st.morphTargets === !0) {
                                    var ft = _.morphTargets,
                                        Et = b.morphTargetInfluences,
                                        pt = lt.position,
                                        dt = ct.position,
                                        mt = ut.position;
                                    C.set(0, 0, 0), A.set(0, 0, 0), L.set(0, 0, 0);
                                    for (var vt = 0, gt = ft.length; gt > vt; vt++) {
                                        var Tt = Et[vt];
                                        if (0 !== Tt) {
                                            var yt = ft[vt].vertices;
                                            C.x += (yt[ot.a].x - pt.x) * Tt, C.y += (yt[ot.a].y - pt.y) * Tt, C.z += (yt[ot.a].z - pt.z) * Tt, A.x += (yt[ot.b].x - dt.x) * Tt, A.y += (yt[ot.b].y - dt.y) * Tt, A.z += (yt[ot.b].z - dt.z) * Tt, L.x += (yt[ot.c].x - mt.x) * Tt, L.y += (yt[ot.c].y - mt.y) * Tt, L.z += (yt[ot.c].z - mt.z) * Tt
                                        }
                                    }
                                    lt.position.add(C), ct.position.add(A), ut.position.add(L), j.projectVertex(lt), j.projectVertex(ct), j.projectVertex(ut)
                                }
                                if (j.checkTriangleVisibility(lt, ct, ut) !== !1) {
                                    var Rt = j.checkBackfaceCulling(lt, ct, ut);
                                    if (ht !== THREE.DoubleSide) {
                                        if (ht === THREE.FrontSide && Rt === !1) continue;
                                        if (ht === THREE.BackSide && Rt === !0) continue
                                    }
                                    u = r(), u.id = b.id, u.v1.copy(lt), u.v2.copy(ct), u.v3.copy(ut), u.normalModel.copy(ot.normal), Rt !== !1 || ht !== THREE.BackSide && ht !== THREE.DoubleSide || u.normalModel.negate(), u.normalModel.applyMatrix3(N).normalize();
                                    for (var xt = ot.vertexNormals, Ht = 0, bt = Math.min(xt.length, 3); bt > Ht; Ht++) {
                                        var _t = u.vertexNormalsModel[Ht];
                                        _t.copy(xt[Ht]), Rt !== !1 || ht !== THREE.BackSide && ht !== THREE.DoubleSide || _t.negate(), _t.applyMatrix3(N).normalize()
                                    }
                                    u.vertexNormalsLength = xt.length;
                                    var wt = J[nt];
                                    if (void 0 !== wt)
                                        for (var Mt = 0; 3 > Mt; Mt++) u.uvs[Mt].copy(wt[Mt]);
                                    u.color = ot.color, u.material = st, u.z = (lt.positionScreen.z + ct.positionScreen.z + ut.positionScreen.z) / 3, S.elements.push(u)
                                }
                            }
                        }
                    }
                } else if (b instanceof THREE.Line) {
                    if (_ instanceof THREE.BufferGeometry) {
                        var w = _.attributes;
                        if (void 0 !== w.position) {
                            for (var D = w.position.array, U = 0, V = D.length; V > U; U += 3) j.pushVertex(D[U], D[U + 1], D[U + 2]);
                            if (void 0 !== w.index)
                                for (var Y = w.index.array, U = 0, V = Y.length; V > U; U += 2) j.pushLine(Y[U], Y[U + 1]);
                            else
                                for (var St = b.type === THREE.LinePieces ? 2 : 1, U = 0, V = D.length / 3 - 1; V > U; U += St) j.pushLine(U, U + 1)
                        }
                    } else if (_ instanceof THREE.Geometry) {
                        k.multiplyMatrices(B, v);
                        var Z = b.geometry.vertices;
                        if (0 === Z.length) continue;
                        lt = t(), lt.positionScreen.copy(Z[0]).applyMatrix4(k);
                        for (var St = b.type === THREE.LinePieces ? 2 : 1, tt = 1, rt = Z.length; rt > tt; tt++) lt = t(), lt.positionScreen.copy(Z[tt]).applyMatrix4(k), (tt + 1) % St > 0 || (ct = y[c - 2], I.copy(lt.positionScreen), G.copy(ct.positionScreen), o(I, G) === !0 && (I.multiplyScalar(1 / I.w), G.multiplyScalar(1 / G.w), E = i(), E.id = b.id, E.v1.positionScreen.copy(I), E.v2.positionScreen.copy(G), E.z = Math.max(I.z, G.z), E.material = b.material, b.material.vertexColors === THREE.VertexColors && (E.vertexColors[0].copy(b.geometry.colors[tt]), E.vertexColors[1].copy(b.geometry.colors[tt - 1])), S.elements.push(E)))
                    }
                } else if (b instanceof THREE.Sprite) {
                    F.set(v.elements[12], v.elements[13], v.elements[14], 1), F.applyMatrix4(B);
                    var Ct = 1 / F.w;
                    F.z *= Ct, F.z >= -1 && F.z <= 1 && (d = n(), d.id = b.id, d.x = F.x * Ct, d.y = F.y * Ct, d.z = F.z, d.object = b, d.rotation = b.rotation, d.scale.x = b.scale.x * Math.abs(d.x - (F.x + g.projectionMatrix.elements[0]) / (F.w + g.projectionMatrix.elements[12])), d.scale.y = b.scale.y * Math.abs(d.y - (F.y + g.projectionMatrix.elements[5]) / (F.w + g.projectionMatrix.elements[13])), d.material = b.material, S.elements.push(d))
                }
            }
            return R === !0 && S.elements.sort(a), S
        }
    }, THREE.Face3 = function(e, t, r, i, n, a) {
        this.a = e, this.b = t, this.c = r, this.normal = i instanceof THREE.Vector3 ? i : new THREE.Vector3, this.vertexNormals = i instanceof Array ? i : [], this.color = n instanceof THREE.Color ? n : new THREE.Color, this.vertexColors = n instanceof Array ? n : [], this.vertexTangents = [], this.materialIndex = void 0 !== a ? a : 0
    }, THREE.Face3.prototype = {
        constructor: THREE.Face3,
        clone: function() {
            var e = new THREE.Face3(this.a, this.b, this.c);
            e.normal.copy(this.normal), e.color.copy(this.color), e.materialIndex = this.materialIndex;
            for (var t = 0, r = this.vertexNormals.length; r > t; t++) e.vertexNormals[t] = this.vertexNormals[t].clone();
            for (var t = 0, r = this.vertexColors.length; r > t; t++) e.vertexColors[t] = this.vertexColors[t].clone();
            for (var t = 0, r = this.vertexTangents.length; r > t; t++) e.vertexTangents[t] = this.vertexTangents[t].clone();
            return e
        }
    }, THREE.Face4 = function(e, t, r, i, n, a, o) {
        return console.warn("THREE.Face4 has been removed. A THREE.Face3 will be created instead."), new THREE.Face3(e, t, r, n, a, o)
    }, THREE.BufferAttribute = function(e, t) {
        this.array = e, this.itemSize = t
    }, THREE.BufferAttribute.prototype = {
        constructor: THREE.BufferAttribute,
        get length() {
            return this.array.length
        },
        set: function(e) {
            return this.array.set(e), this
        },
        setX: function(e, t) {
            return this.array[e * this.itemSize] = t, this
        },
        setY: function(e, t) {
            return this.array[e * this.itemSize + 1] = t, this
        },
        setZ: function(e, t) {
            return this.array[e * this.itemSize + 2] = t, this
        },
        setXY: function(e, t, r) {
            return e *= this.itemSize, this.array[e] = t, this.array[e + 1] = r, this
        },
        setXYZ: function(e, t, r, i) {
            return e *= this.itemSize, this.array[e] = t, this.array[e + 1] = r, this.array[e + 2] = i, this
        },
        setXYZW: function(e, t, r, i, n) {
            return e *= this.itemSize, this.array[e] = t, this.array[e + 1] = r, this.array[e + 2] = i, this.array[e + 3] = n, this
        }
    }, THREE.Int8Attribute = function(e, t) {
        return console.warn("THREE.Int8Attribute has been removed. Use THREE.BufferAttribute( array, itemSize ) instead."), new THREE.BufferAttribute(e, t)
    }, THREE.Uint8Attribute = function(e, t) {
        return console.warn("THREE.Uint8Attribute has been removed. Use THREE.BufferAttribute( array, itemSize ) instead."), new THREE.BufferAttribute(e, t)
    }, THREE.Uint8ClampedAttribute = function(e, t) {
        return console.warn("THREE.Uint8ClampedAttribute has been removed. Use THREE.BufferAttribute( array, itemSize ) instead."), new THREE.BufferAttribute(e, t)
    }, THREE.Int16Attribute = function(e, t) {
        return console.warn("THREE.Int16Attribute has been removed. Use THREE.BufferAttribute( array, itemSize ) instead."), new THREE.BufferAttribute(e, t)
    }, THREE.Uint16Attribute = function(e, t) {
        return console.warn("THREE.Uint16Attribute has been removed. Use THREE.BufferAttribute( array, itemSize ) instead."), new THREE.BufferAttribute(e, t)
    }, THREE.Int32Attribute = function(e, t) {
        return console.warn("THREE.Int32Attribute has been removed. Use THREE.BufferAttribute( array, itemSize ) instead."), new THREE.BufferAttribute(e, t)
    }, THREE.Uint32Attribute = function(e, t) {
        return console.warn("THREE.Uint32Attribute has been removed. Use THREE.BufferAttribute( array, itemSize ) instead."), new THREE.BufferAttribute(e, t)
    }, THREE.Float32Attribute = function(e, t) {
        return console.warn("THREE.Float32Attribute has been removed. Use THREE.BufferAttribute( array, itemSize ) instead."), new THREE.BufferAttribute(e, t)
    }, THREE.Float64Attribute = function(e, t) {
        return console.warn("THREE.Float64Attribute has been removed. Use THREE.BufferAttribute( array, itemSize ) instead."), new THREE.BufferAttribute(e, t)
    }, THREE.BufferGeometry = function() {
        this.id = THREE.GeometryIdCount++, this.uuid = THREE.Math.generateUUID(), this.name = "", this.attributes = {}, this.drawcalls = [], this.offsets = this.drawcalls, this.boundingBox = null, this.boundingSphere = null
    }, THREE.BufferGeometry.prototype = {
        constructor: THREE.BufferGeometry,
        addAttribute: function(e, t) {
            return t instanceof THREE.BufferAttribute == !1 ? (console.warn("THREE.BufferGeometry: .addAttribute() now expects ( name, attribute )."), void(this.attributes[e] = {
                array: arguments[1],
                itemSize: arguments[2]
            })) : void(this.attributes[e] = t)
        },
        getAttribute: function(e) {
            return this.attributes[e]
        },
        addDrawCall: function(e, t, r) {
            this.drawcalls.push({
                start: e,
                count: t,
                index: void 0 !== r ? r : 0
            })
        },
        applyMatrix: function(e) {
            var t = this.attributes.position;
            void 0 !== t && (e.applyToVector3Array(t.array), t.needsUpdate = !0);
            var r = this.attributes.normal;
            if (void 0 !== r) {
                var i = (new THREE.Matrix3).getNormalMatrix(e);
                i.applyToVector3Array(r.array), r.needsUpdate = !0
            }
        },
        fromGeometry: function(e, t) {
            t = t || {
                vertexColors: THREE.NoColors
            };
            var r = e.vertices,
                i = e.faces,
                n = e.faceVertexUvs,
                a = t.vertexColors,
                o = n[0].length > 0,
                s = 3 == i[0].vertexNormals.length,
                h = new Float32Array(3 * i.length * 3);
            this.addAttribute("position", new THREE.BufferAttribute(h, 3));
            var l = new Float32Array(3 * i.length * 3);
            if (this.addAttribute("normal", new THREE.BufferAttribute(l, 3)), a !== THREE.NoColors) {
                var c = new Float32Array(3 * i.length * 3);
                this.addAttribute("color", new THREE.BufferAttribute(c, 3))
            }
            if (o === !0) {
                var u = new Float32Array(3 * i.length * 2);
                this.addAttribute("uvs", new THREE.BufferAttribute(u, 2))
            }
            for (var f = 0, E = 0, p = 0; f < i.length; f++, E += 6, p += 9) {
                var d = i[f],
                    m = r[d.a],
                    v = r[d.b],
                    g = r[d.c];
                if (h[p] = m.x, h[p + 1] = m.y, h[p + 2] = m.z, h[p + 3] = v.x, h[p + 4] = v.y, h[p + 5] = v.z, h[p + 6] = g.x, h[p + 7] = g.y, h[p + 8] = g.z, s === !0) {
                    var T = d.vertexNormals[0],
                        y = d.vertexNormals[1],
                        R = d.vertexNormals[2];
                    l[p] = T.x, l[p + 1] = T.y, l[p + 2] = T.z, l[p + 3] = y.x, l[p + 4] = y.y, l[p + 5] = y.z, l[p + 6] = R.x, l[p + 7] = R.y, l[p + 8] = R.z
                } else {
                    var x = d.normal;
                    l[p] = x.x, l[p + 1] = x.y, l[p + 2] = x.z, l[p + 3] = x.x, l[p + 4] = x.y, l[p + 5] = x.z, l[p + 6] = x.x, l[p + 7] = x.y, l[p + 8] = x.z
                }
                if (a === THREE.FaceColors) {
                    var H = d.color;
                    c[p] = H.r, c[p + 1] = H.g, c[p + 2] = H.b, c[p + 3] = H.r, c[p + 4] = H.g, c[p + 5] = H.b, c[p + 6] = H.r, c[p + 7] = H.g, c[p + 8] = H.b
                } else if (a === THREE.VertexColors) {
                    var b = d.vertexColors[0],
                        _ = d.vertexColors[1],
                        w = d.vertexColors[2];
                    c[p] = b.r, c[p + 1] = b.g, c[p + 2] = b.b, c[p + 3] = _.r, c[p + 4] = _.g, c[p + 5] = _.b, c[p + 6] = w.r, c[p + 7] = w.g, c[p + 8] = w.b
                }
                if (o === !0) {
                    var M = n[0][f][0],
                        S = n[0][f][1],
                        C = n[0][f][2];
                    u[E] = M.x, u[E + 1] = M.y, u[E + 2] = S.x, u[E + 3] = S.y, u[E + 4] = C.x, u[E + 5] = C.y
                }
            }
            return this.computeBoundingSphere(), this
        },
        computeBoundingBox: function() {
            null === this.boundingBox && (this.boundingBox = new THREE.Box3);
            var e = this.attributes.position.array;
            if (e) {
                var t = this.boundingBox;
                e.length >= 3 && (t.min.x = t.max.x = e[0], t.min.y = t.max.y = e[1], t.min.z = t.max.z = e[2]);
                for (var r = 3, i = e.length; i > r; r += 3) {
                    var n = e[r],
                        a = e[r + 1],
                        o = e[r + 2];
                    n < t.min.x ? t.min.x = n : n > t.max.x && (t.max.x = n), a < t.min.y ? t.min.y = a : a > t.max.y && (t.max.y = a), o < t.min.z ? t.min.z = o : o > t.max.z && (t.max.z = o)
                }
            }(void 0 === e || 0 === e.length) && (this.boundingBox.min.set(0, 0, 0), this.boundingBox.max.set(0, 0, 0)), (isNaN(this.boundingBox.min.x) || isNaN(this.boundingBox.min.y) || isNaN(this.boundingBox.min.z)) && console.error('THREE.BufferGeometry.computeBoundingBox: Computed min/max have NaN values. The "position" attribute is likely to have NaN values.')
        },
        computeBoundingSphere: function() {
            var e = new THREE.Box3,
                t = new THREE.Vector3;
            return function() {
                null === this.boundingSphere && (this.boundingSphere = new THREE.Sphere);
                var r = this.attributes.position.array;
                if (r) {
                    e.makeEmpty();
                    for (var i = this.boundingSphere.center, n = 0, a = r.length; a > n; n += 3) t.set(r[n], r[n + 1], r[n + 2]), e.expandByPoint(t);
                    e.center(i);
                    for (var o = 0, n = 0, a = r.length; a > n; n += 3) t.set(r[n], r[n + 1], r[n + 2]), o = Math.max(o, i.distanceToSquared(t));
                    this.boundingSphere.radius = Math.sqrt(o), isNaN(this.boundingSphere.radius) && console.error('THREE.BufferGeometry.computeBoundingSphere(): Computed radius is NaN. The "position" attribute is likely to have NaN values.')
                }
            }
        }(),
        computeFaceNormals: function() {},
        computeVertexNormals: function() {
            if (this.attributes.position) {
                var e, t, r, i, n = this.attributes.position.array.length;
                if (void 0 === this.attributes.normal) this.attributes.normal = {
                    itemSize: 3,
                    array: new Float32Array(n)
                };
                else
                    for (e = 0, t = this.attributes.normal.array.length; t > e; e++) this.attributes.normal.array[e] = 0;
                var a, o, s, h, l, c, u = this.attributes.position.array,
                    f = this.attributes.normal.array,
                    E = new THREE.Vector3,
                    p = new THREE.Vector3,
                    d = new THREE.Vector3,
                    m = new THREE.Vector3,
                    v = new THREE.Vector3;
                if (this.attributes.index) {
                    var g = this.attributes.index.array,
                        T = this.offsets.length > 0 ? this.offsets : [{
                            start: 0,
                            count: g.length,
                            index: 0
                        }];
                    for (r = 0, i = T.length; i > r; ++r) {
                        var y = T[r].start,
                            R = T[r].count,
                            x = T[r].index;
                        for (e = y, t = y + R; t > e; e += 3) a = x + g[e], o = x + g[e + 1], s = x + g[e + 2], h = u[3 * a], l = u[3 * a + 1], c = u[3 * a + 2], E.set(h, l, c), h = u[3 * o], l = u[3 * o + 1], c = u[3 * o + 2], p.set(h, l, c), h = u[3 * s], l = u[3 * s + 1], c = u[3 * s + 2], d.set(h, l, c), m.subVectors(d, p), v.subVectors(E, p), m.cross(v), f[3 * a] += m.x, f[3 * a + 1] += m.y, f[3 * a + 2] += m.z, f[3 * o] += m.x, f[3 * o + 1] += m.y, f[3 * o + 2] += m.z, f[3 * s] += m.x, f[3 * s + 1] += m.y, f[3 * s + 2] += m.z
                    }
                } else
                    for (e = 0, t = u.length; t > e; e += 9) h = u[e], l = u[e + 1], c = u[e + 2], E.set(h, l, c), h = u[e + 3], l = u[e + 4], c = u[e + 5], p.set(h, l, c), h = u[e + 6], l = u[e + 7], c = u[e + 8], d.set(h, l, c), m.subVectors(d, p), v.subVectors(E, p), m.cross(v), f[e] = m.x, f[e + 1] = m.y, f[e + 2] = m.z, f[e + 3] = m.x, f[e + 4] = m.y, f[e + 5] = m.z, f[e + 6] = m.x, f[e + 7] = m.y, f[e + 8] = m.z;
                this.normalizeNormals(), this.normalsNeedUpdate = !0
            }
        },
        computeTangents: function() {
            function e(e, t, r) {
                f = i[3 * e], E = i[3 * e + 1], p = i[3 * e + 2], d = i[3 * t], m = i[3 * t + 1], v = i[3 * t + 2], g = i[3 * r], T = i[3 * r + 1], y = i[3 * r + 2], R = a[2 * e], x = a[2 * e + 1], H = a[2 * t], b = a[2 * t + 1], _ = a[2 * r], w = a[2 * r + 1], M = d - f, S = g - f, C = m - E, A = T - E, L = v - p, P = y - p, F = H - R, D = _ - R, U = b - x, V = w - x, z = 1 / (F * V - D * U), j.set((V * M - U * S) * z, (V * C - U * A) * z, (V * L - U * P) * z), X.set((F * S - D * M) * z, (F * A - D * C) * z, (F * P - D * L) * z), l[e].add(j), l[t].add(j), l[r].add(j), c[e].add(X), c[t].add(X), c[r].add(X)
            }

            function t(e) {
                rt.x = n[3 * e], rt.y = n[3 * e + 1], rt.z = n[3 * e + 2], it.copy(rt), J = l[e], et.copy(J), et.sub(rt.multiplyScalar(rt.dot(J))).normalize(), tt.crossVectors(it, J), $ = tt.dot(c[e]), Q = 0 > $ ? -1 : 1, h[4 * e] = et.x, h[4 * e + 1] = et.y, h[4 * e + 2] = et.z, h[4 * e + 3] = Q
            }
            if (void 0 === this.attributes.index || void 0 === this.attributes.position || void 0 === this.attributes.normal || void 0 === this.attributes.uv) return void console.warn("Missing required attributes (index, position, normal or uv) in BufferGeometry.computeTangents()");
            var r = this.attributes.index.array,
                i = this.attributes.position.array,
                n = this.attributes.normal.array,
                a = this.attributes.uv.array,
                o = i.length / 3;
            if (void 0 === this.attributes.tangent) {
                var s = 4 * o;
                this.attributes.tangent = {
                    itemSize: 4,
                    array: new Float32Array(s)
                }
            }
            for (var h = this.attributes.tangent.array, l = [], c = [], u = 0; o > u; u++) l[u] = new THREE.Vector3, c[u] = new THREE.Vector3;
            var f, E, p, d, m, v, g, T, y, R, x, H, b, _, w, M, S, C, A, L, P, F, D, U, V, z, B, k, N, O, I, G, W, j = new THREE.Vector3,
                X = new THREE.Vector3,
                Y = this.offsets;
            for (N = 0, O = Y.length; O > N; ++N) {
                var q = Y[N].start,
                    K = Y[N].count,
                    Z = Y[N].index;
                for (B = q, k = q + K; k > B; B += 3) I = Z + r[B], G = Z + r[B + 1], W = Z + r[B + 2], e(I, G, W)
            }
            var Q, J, $, et = new THREE.Vector3,
                tt = new THREE.Vector3,
                rt = new THREE.Vector3,
                it = new THREE.Vector3;
            for (N = 0, O = Y.length; O > N; ++N) {
                var q = Y[N].start,
                    K = Y[N].count,
                    Z = Y[N].index;
                for (B = q, k = q + K; k > B; B += 3) I = Z + r[B], G = Z + r[B + 1], W = Z + r[B + 2], t(I), t(G), t(W)
            }
        },
        computeOffsets: function(e) {
            var t = e;
            void 0 === e && (t = 65535);
            for (var r = (Date.now(), this.attributes.index.array), i = this.attributes.position.array, n = (i.length / 3, r.length / 3), a = new Uint16Array(r.length), o = 0, s = 0, h = [{
                    start: 0,
                    count: 0,
                    index: 0
                }], l = h[0], c = 0, u = 0, f = new Int32Array(6), E = new Int32Array(i.length), p = new Int32Array(i.length), d = 0; d < i.length; d++) E[d] = -1, p[d] = -1;
            for (var m = 0; n > m; m++) {
                u = 0;
                for (var v = 0; 3 > v; v++) {
                    var g = r[3 * m + v]; - 1 == E[g] ? (f[2 * v] = g, f[2 * v + 1] = -1, u++) : E[g] < l.index ? (f[2 * v] = g, f[2 * v + 1] = -1, c++) : (f[2 * v] = g, f[2 * v + 1] = E[g])
                }
                var T = s + u;
                if (T > l.index + t) {
                    var y = {
                        start: o,
                        count: 0,
                        index: s
                    };
                    h.push(y), l = y;
                    for (var R = 0; 6 > R; R += 2) {
                        var x = f[R + 1];
                        x > -1 && x < l.index && (f[R + 1] = -1)
                    }
                }
                for (var R = 0; 6 > R; R += 2) {
                    var g = f[R],
                        x = f[R + 1]; - 1 === x && (x = s++), E[g] = x, p[x] = g, a[o++] = x - l.index, l.count++
                }
            }
            return this.reorderBuffers(a, p, s), this.offsets = h, h
        },
        merge: function() {
            console.log("BufferGeometry.merge(): TODO")
        },
        normalizeNormals: function() {
            for (var e, t, r, i, n = this.attributes.normal.array, a = 0, o = n.length; o > a; a += 3) e = n[a], t = n[a + 1], r = n[a + 2], i = 1 / Math.sqrt(e * e + t * t + r * r), n[a] *= i, n[a + 1] *= i, n[a + 2] *= i
        },
        reorderBuffers: function(e, t, r) {
            var i = {},
                n = [Int8Array, Uint8Array, Uint8ClampedArray, Int16Array, Uint16Array, Int32Array, Uint32Array, Float32Array, Float64Array];
            for (var a in this.attributes)
                if ("index" != a)
                    for (var o = this.attributes[a].array, s = 0, h = n.length; h > s; s++) {
                        var l = n[s];
                        if (o instanceof l) {
                            i[a] = new l(this.attributes[a].itemSize * r);
                            break
                        }
                    }
                for (var c = 0; r > c; c++) {
                    var u = t[c];
                    for (var a in this.attributes)
                        if ("index" != a)
                            for (var f = this.attributes[a].array, E = this.attributes[a].itemSize, p = i[a], d = 0; E > d; d++) p[c * E + d] = f[u * E + d]
                }
            this.attributes.index.array = e;
            for (var a in this.attributes) "index" != a && (this.attributes[a].array = i[a], this.attributes[a].numItems = this.attributes[a].itemSize * r)
        },
        clone: function() {
            var e = new THREE.BufferGeometry,
                t = [Int8Array, Uint8Array, Uint8ClampedArray, Int16Array, Uint16Array, Int32Array, Uint32Array, Float32Array, Float64Array];
            for (var r in this.attributes) {
                for (var i = this.attributes[r], n = i.array, a = {
                        itemSize: i.itemSize,
                        array: null
                    }, o = 0, s = t.length; s > o; o++) {
                    var h = t[o];
                    if (n instanceof h) {
                        a.array = new h(n);
                        break
                    }
                }
                e.attributes[r] = a
            }
            for (var o = 0, s = this.offsets.length; s > o; o++) {
                var l = this.offsets[o];
                e.offsets.push({
                    start: l.start,
                    index: l.index,
                    count: l.count
                })
            }
            return e
        },
        dispose: function() {
            this.dispatchEvent({
                type: "dispose"
            })
        }
    }, THREE.EventDispatcher.prototype.apply(THREE.BufferGeometry.prototype), THREE.Geometry = function() {
        this.id = THREE.GeometryIdCount++, this.uuid = THREE.Math.generateUUID(), this.name = "", this.vertices = [], this.colors = [], this.faces = [], this.faceVertexUvs = [
            []
        ], this.morphTargets = [], this.morphColors = [], this.morphNormals = [], this.skinWeights = [], this.skinIndices = [], this.lineDistances = [], this.boundingBox = null, this.boundingSphere = null, this.hasTangents = !1, this.dynamic = !0, this.verticesNeedUpdate = !1, this.elementsNeedUpdate = !1, this.uvsNeedUpdate = !1, this.normalsNeedUpdate = !1, this.tangentsNeedUpdate = !1, this.colorsNeedUpdate = !1, this.lineDistancesNeedUpdate = !1, this.buffersNeedUpdate = !1, this.groupsNeedUpdate = !1
    }, THREE.Geometry.prototype = {
        constructor: THREE.Geometry,
        applyMatrix: function(e) {
            for (var t = (new THREE.Matrix3).getNormalMatrix(e), r = 0, i = this.vertices.length; i > r; r++) {
                var n = this.vertices[r];
                n.applyMatrix4(e)
            }
            for (var r = 0, i = this.faces.length; i > r; r++) {
                var a = this.faces[r];
                a.normal.applyMatrix3(t).normalize();
                for (var o = 0, s = a.vertexNormals.length; s > o; o++) a.vertexNormals[o].applyMatrix3(t).normalize()
            }
            this.boundingBox instanceof THREE.Box3 && this.computeBoundingBox(), this.boundingSphere instanceof THREE.Sphere && this.computeBoundingSphere()
        },
        center: function() {
            this.computeBoundingBox();
            var e = new THREE.Vector3;
            return e.addVectors(this.boundingBox.min, this.boundingBox.max), e.multiplyScalar(-.5), this.applyMatrix((new THREE.Matrix4).makeTranslation(e.x, e.y, e.z)), this.computeBoundingBox(), e
        },
        computeFaceNormals: function() {
            for (var e = new THREE.Vector3, t = new THREE.Vector3, r = 0, i = this.faces.length; i > r; r++) {
                var n = this.faces[r],
                    a = this.vertices[n.a],
                    o = this.vertices[n.b],
                    s = this.vertices[n.c];
                e.subVectors(s, o), t.subVectors(a, o), e.cross(t), e.normalize(), n.normal.copy(e)
            }
        },
        computeVertexNormals: function(e) {
            var t, r, i, n, a, o;
            for (o = new Array(this.vertices.length), t = 0, r = this.vertices.length; r > t; t++) o[t] = new THREE.Vector3;
            if (e) {
                {
                    var s, h, l, c = new THREE.Vector3,
                        u = new THREE.Vector3;
                    new THREE.Vector3, new THREE.Vector3, new THREE.Vector3
                }
                for (i = 0, n = this.faces.length; n > i; i++) a = this.faces[i], s = this.vertices[a.a], h = this.vertices[a.b], l = this.vertices[a.c], c.subVectors(l, h), u.subVectors(s, h), c.cross(u), o[a.a].add(c), o[a.b].add(c), o[a.c].add(c)
            } else
                for (i = 0, n = this.faces.length; n > i; i++) a = this.faces[i], o[a.a].add(a.normal), o[a.b].add(a.normal), o[a.c].add(a.normal);
            for (t = 0, r = this.vertices.length; r > t; t++) o[t].normalize();
            for (i = 0, n = this.faces.length; n > i; i++) a = this.faces[i], a.vertexNormals[0] = o[a.a].clone(), a.vertexNormals[1] = o[a.b].clone(), a.vertexNormals[2] = o[a.c].clone()
        },
        computeMorphNormals: function() {
            var e, t, r, i, n;
            for (r = 0, i = this.faces.length; i > r; r++)
                for (n = this.faces[r], n.__originalFaceNormal ? n.__originalFaceNormal.copy(n.normal) : n.__originalFaceNormal = n.normal.clone(), n.__originalVertexNormals || (n.__originalVertexNormals = []), e = 0, t = n.vertexNormals.length; t > e; e++) n.__originalVertexNormals[e] ? n.__originalVertexNormals[e].copy(n.vertexNormals[e]) : n.__originalVertexNormals[e] = n.vertexNormals[e].clone();
            var a = new THREE.Geometry;
            for (a.faces = this.faces, e = 0, t = this.morphTargets.length; t > e; e++) {
                if (!this.morphNormals[e]) {
                    this.morphNormals[e] = {}, this.morphNormals[e].faceNormals = [], this.morphNormals[e].vertexNormals = [];
                    var o, s, h = this.morphNormals[e].faceNormals,
                        l = this.morphNormals[e].vertexNormals;
                    for (r = 0, i = this.faces.length; i > r; r++) o = new THREE.Vector3, s = {
                        a: new THREE.Vector3,
                        b: new THREE.Vector3,
                        c: new THREE.Vector3
                    }, h.push(o), l.push(s)
                }
                var c = this.morphNormals[e];
                a.vertices = this.morphTargets[e].vertices, a.computeFaceNormals(), a.computeVertexNormals();
                var o, s;
                for (r = 0, i = this.faces.length; i > r; r++) n = this.faces[r], o = c.faceNormals[r], s = c.vertexNormals[r], o.copy(n.normal), s.a.copy(n.vertexNormals[0]), s.b.copy(n.vertexNormals[1]), s.c.copy(n.vertexNormals[2])
            }
            for (r = 0, i = this.faces.length; i > r; r++) n = this.faces[r], n.normal = n.__originalFaceNormal, n.vertexNormals = n.__originalVertexNormals
        },
        computeTangents: function() {
            function e(e, t, r, i, n, a, o) {
                l = e.vertices[t], c = e.vertices[r], u = e.vertices[i], f = h[n], E = h[a], p = h[o], d = c.x - l.x, m = u.x - l.x, v = c.y - l.y, g = u.y - l.y, T = c.z - l.z, y = u.z - l.z, R = E.x - f.x, x = p.x - f.x, H = E.y - f.y, b = p.y - f.y, _ = 1 / (R * b - x * H), L.set((b * d - H * m) * _, (b * v - H * g) * _, (b * T - H * y) * _), P.set((R * m - x * d) * _, (R * g - x * v) * _, (R * y - x * T) * _), C[t].add(L), C[r].add(L), C[i].add(L), A[t].add(P), A[r].add(P), A[i].add(P)
            }
            var t, r, i, n, a, o, s, h, l, c, u, f, E, p, d, m, v, g, T, y, R, x, H, b, _, w, M, S, C = [],
                A = [],
                L = new THREE.Vector3,
                P = new THREE.Vector3,
                F = new THREE.Vector3,
                D = new THREE.Vector3,
                U = new THREE.Vector3;
            for (i = 0, n = this.vertices.length; n > i; i++) C[i] = new THREE.Vector3, A[i] = new THREE.Vector3;
            for (t = 0, r = this.faces.length; r > t; t++) s = this.faces[t], h = this.faceVertexUvs[0][t], e(this, s.a, s.b, s.c, 0, 1, 2);
            var V = ["a", "b", "c", "d"];
            for (t = 0, r = this.faces.length; r > t; t++)
                for (s = this.faces[t], a = 0; a < Math.min(s.vertexNormals.length, 3); a++) U.copy(s.vertexNormals[a]), o = s[V[a]], w = C[o], F.copy(w), F.sub(U.multiplyScalar(U.dot(w))).normalize(), D.crossVectors(s.vertexNormals[a], w), M = D.dot(A[o]), S = 0 > M ? -1 : 1, s.vertexTangents[a] = new THREE.Vector4(F.x, F.y, F.z, S);
            this.hasTangents = !0
        },
        computeLineDistances: function() {
            for (var e = 0, t = this.vertices, r = 0, i = t.length; i > r; r++) r > 0 && (e += t[r].distanceTo(t[r - 1])), this.lineDistances[r] = e
        },
        computeBoundingBox: function() {
            null === this.boundingBox && (this.boundingBox = new THREE.Box3), this.boundingBox.setFromPoints(this.vertices)
        },
        computeBoundingSphere: function() {
            null === this.boundingSphere && (this.boundingSphere = new THREE.Sphere), this.boundingSphere.setFromPoints(this.vertices)
        },
        merge: function(e, t, r) {
            if (e instanceof THREE.Geometry == !1) return void console.error("THREE.Geometry.merge(): geometry not an instance of THREE.Geometry.", e);
            var i, n = this.vertices.length,
                a = (this.faceVertexUvs[0].length, this.vertices),
                o = e.vertices,
                s = this.faces,
                h = e.faces,
                l = this.faceVertexUvs[0],
                c = e.faceVertexUvs[0];
            void 0 === r && (r = 0), void 0 !== t && (i = (new THREE.Matrix3).getNormalMatrix(t));
            for (var u = 0, f = o.length; f > u; u++) {
                var E = o[u],
                    p = E.clone();
                void 0 !== t && p.applyMatrix4(t), a.push(p)
            }
            for (u = 0, f = h.length; f > u; u++) {
                var d, m, v, g = h[u],
                    T = g.vertexNormals,
                    y = g.vertexColors;
                d = new THREE.Face3(g.a + n, g.b + n, g.c + n), d.normal.copy(g.normal), void 0 !== i && d.normal.applyMatrix3(i).normalize();
                for (var R = 0, x = T.length; x > R; R++) m = T[R].clone(), void 0 !== i && m.applyMatrix3(i).normalize(), d.vertexNormals.push(m);
                d.color.copy(g.color);
                for (var R = 0, x = y.length; x > R; R++) v = y[R], d.vertexColors.push(v.clone());
                d.materialIndex = g.materialIndex + r, s.push(d)
            }
            for (u = 0, f = c.length; f > u; u++) {
                var H = c[u],
                    b = [];
                if (void 0 !== H) {
                    for (var R = 0, x = H.length; x > R; R++) b.push(new THREE.Vector2(H[R].x, H[R].y));
                    l.push(b)
                }
            }
        },
        mergeVertices: function() {
            var e, t, r, i, n, a, o, s, h = {},
                l = [],
                c = [],
                u = 4,
                f = Math.pow(10, u);
            for (r = 0, i = this.vertices.length; i > r; r++) e = this.vertices[r], t = Math.round(e.x * f) + "_" + Math.round(e.y * f) + "_" + Math.round(e.z * f), void 0 === h[t] ? (h[t] = r, l.push(this.vertices[r]), c[r] = l.length - 1) : c[r] = c[h[t]];
            var E = [];
            for (r = 0, i = this.faces.length; i > r; r++) {
                n = this.faces[r], n.a = c[n.a], n.b = c[n.b], n.c = c[n.c], a = [n.a, n.b, n.c];
                for (var p = -1, d = 0; 3 > d; d++)
                    if (a[d] == a[(d + 1) % 3]) {
                        p = d, E.push(r);
                        break
                    }
            }
            for (r = E.length - 1; r >= 0; r--) {
                var m = E[r];
                for (this.faces.splice(m, 1), o = 0, s = this.faceVertexUvs.length; s > o; o++) this.faceVertexUvs[o].splice(m, 1)
            }
            var v = this.vertices.length - l.length;
            return this.vertices = l, v
        },
        makeGroups: function() {
            var e = 0;
            return function(t, r) {
                var i, n, a, o, s, h, l = {},
                    c = this.morphTargets.length,
                    u = this.morphNormals.length;
                for (this.geometryGroups = {}, this.geometryGroupsList = [], i = 0, n = this.faces.length; n > i; i++) a = this.faces[i], o = t ? a.materialIndex : 0, o in l || (l[o] = {
                    hash: o,
                    counter: 0
                }), s = l[o].hash + "_" + l[o].counter, s in this.geometryGroups || (h = {
                    id: e++,
                    faces3: [],
                    materialIndex: o,
                    vertices: 0,
                    numMorphTargets: c,
                    numMorphNormals: u
                }, this.geometryGroups[s] = h, this.geometryGroupsList.push(h)), this.geometryGroups[s].vertices + 3 > r && (l[o].counter += 1, s = l[o].hash + "_" + l[o].counter, s in this.geometryGroups || (h = {
                    id: e++,
                    faces3: [],
                    materialIndex: o,
                    vertices: 0,
                    numMorphTargets: c,
                    numMorphNormals: u
                }, this.geometryGroups[s] = h, this.geometryGroupsList.push(h))), this.geometryGroups[s].faces3.push(i), this.geometryGroups[s].vertices += 3
            }
        }(),
        clone: function() {
            for (var e = new THREE.Geometry, t = this.vertices, r = 0, i = t.length; i > r; r++) e.vertices.push(t[r].clone());
            for (var n = this.faces, r = 0, i = n.length; i > r; r++) e.faces.push(n[r].clone());
            for (var a = this.faceVertexUvs[0], r = 0, i = a.length; i > r; r++) {
                for (var o = a[r], s = [], h = 0, l = o.length; l > h; h++) s.push(new THREE.Vector2(o[h].x, o[h].y));
                e.faceVertexUvs[0].push(s)
            }
            return e
        },
        dispose: function() {
            this.dispatchEvent({
                type: "dispose"
            })
        }
    }, THREE.EventDispatcher.prototype.apply(THREE.Geometry.prototype), THREE.GeometryIdCount = 0, THREE.Camera = function() {
        THREE.Object3D.call(this), this.matrixWorldInverse = new THREE.Matrix4, this.projectionMatrix = new THREE.Matrix4
    }, THREE.Camera.prototype = Object.create(THREE.Object3D.prototype), THREE.Camera.prototype.lookAt = function() {
        var e = new THREE.Matrix4;
        return function(t) {
            e.lookAt(this.position, t, this.up), this.quaternion.setFromRotationMatrix(e)
        }
    }(), THREE.Camera.prototype.clone = function(e) {
        return void 0 === e && (e = new THREE.Camera), THREE.Object3D.prototype.clone.call(this, e), e.matrixWorldInverse.copy(this.matrixWorldInverse), e.projectionMatrix.copy(this.projectionMatrix), e
    }, THREE.CubeCamera = function(e, t, r) {
        THREE.Object3D.call(this);
        var i = 90,
            n = 1,
            a = new THREE.PerspectiveCamera(i, n, e, t);
        a.up.set(0, -1, 0), a.lookAt(new THREE.Vector3(1, 0, 0)), this.add(a);
        var o = new THREE.PerspectiveCamera(i, n, e, t);
        o.up.set(0, -1, 0), o.lookAt(new THREE.Vector3(-1, 0, 0)), this.add(o);
        var s = new THREE.PerspectiveCamera(i, n, e, t);
        s.up.set(0, 0, 1), s.lookAt(new THREE.Vector3(0, 1, 0)), this.add(s);
        var h = new THREE.PerspectiveCamera(i, n, e, t);
        h.up.set(0, 0, -1), h.lookAt(new THREE.Vector3(0, -1, 0)), this.add(h);
        var l = new THREE.PerspectiveCamera(i, n, e, t);
        l.up.set(0, -1, 0), l.lookAt(new THREE.Vector3(0, 0, 1)), this.add(l);
        var c = new THREE.PerspectiveCamera(i, n, e, t);
        c.up.set(0, -1, 0), c.lookAt(new THREE.Vector3(0, 0, -1)), this.add(c), this.renderTarget = new THREE.WebGLRenderTargetCube(r, r, {
            format: THREE.RGBFormat,
            magFilter: THREE.LinearFilter,
            minFilter: THREE.LinearFilter
        }), this.updateCubeMap = function(e, t) {
            var r = this.renderTarget,
                i = r.generateMipmaps;
            r.generateMipmaps = !1, r.activeCubeFace = 0, e.render(t, a, r), r.activeCubeFace = 1, e.render(t, o, r), r.activeCubeFace = 2, e.render(t, s, r), r.activeCubeFace = 3, e.render(t, h, r), r.activeCubeFace = 4, e.render(t, l, r), r.generateMipmaps = i, r.activeCubeFace = 5, e.render(t, c, r)
        }
    }, THREE.CubeCamera.prototype = Object.create(THREE.Object3D.prototype), THREE.OrthographicCamera = function(e, t, r, i, n, a) {
        THREE.Camera.call(this), this.left = e, this.right = t, this.top = r, this.bottom = i, this.near = void 0 !== n ? n : .1, this.far = void 0 !== a ? a : 2e3, this.updateProjectionMatrix()
    }, THREE.OrthographicCamera.prototype = Object.create(THREE.Camera.prototype), THREE.OrthographicCamera.prototype.updateProjectionMatrix = function() {
        this.projectionMatrix.makeOrthographic(this.left, this.right, this.top, this.bottom, this.near, this.far)
    }, THREE.OrthographicCamera.prototype.clone = function() {
        var e = new THREE.OrthographicCamera;
        return THREE.Camera.prototype.clone.call(this, e), e.left = this.left, e.right = this.right, e.top = this.top, e.bottom = this.bottom, e.near = this.near, e.far = this.far, e
    }, THREE.PerspectiveCamera = function(e, t, r, i) {
        THREE.Camera.call(this), this.fov = void 0 !== e ? e : 50, this.aspect = void 0 !== t ? t : 1, this.near = void 0 !== r ? r : .1, this.far = void 0 !== i ? i : 2e3, this.updateProjectionMatrix()
    }, THREE.PerspectiveCamera.prototype = Object.create(THREE.Camera.prototype), THREE.PerspectiveCamera.prototype.setLens = function(e, t) {
        void 0 === t && (t = 24), this.fov = 2 * THREE.Math.radToDeg(Math.atan(t / (2 * e))), this.updateProjectionMatrix()
    }, THREE.PerspectiveCamera.prototype.setViewOffset = function(e, t, r, i, n, a) {
        this.fullWidth = e, this.fullHeight = t, this.x = r, this.y = i, this.width = n, this.height = a, this.updateProjectionMatrix()
    }, THREE.PerspectiveCamera.prototype.updateProjectionMatrix = function() {
        if (this.fullWidth) {
            var e = this.fullWidth / this.fullHeight,
                t = Math.tan(THREE.Math.degToRad(.5 * this.fov)) * this.near,
                r = -t,
                i = e * r,
                n = e * t,
                a = Math.abs(n - i),
                o = Math.abs(t - r);
            this.projectionMatrix.makeFrustum(i + this.x * a / this.fullWidth, i + (this.x + this.width) * a / this.fullWidth, t - (this.y + this.height) * o / this.fullHeight, t - this.y * o / this.fullHeight, this.near, this.far)
        } else this.projectionMatrix.makePerspective(this.fov, this.aspect, this.near, this.far)
    }, THREE.PerspectiveCamera.prototype.clone = function() {
        var e = new THREE.PerspectiveCamera;
        return THREE.Camera.prototype.clone.call(this, e), e.fov = this.fov, e.aspect = this.aspect, e.near = this.near, e.far = this.far, e
    }, THREE.Light = function(e) {
        THREE.Object3D.call(this), this.color = new THREE.Color(e)
    }, THREE.Light.prototype = Object.create(THREE.Object3D.prototype), THREE.Light.prototype.clone = function(e) {
        return void 0 === e && (e = new THREE.Light), THREE.Object3D.prototype.clone.call(this, e), e.color.copy(this.color), e
    }, THREE.AmbientLight = function(e) {
        THREE.Light.call(this, e)
    }, THREE.AmbientLight.prototype = Object.create(THREE.Light.prototype), THREE.AmbientLight.prototype.clone = function() {
        var e = new THREE.AmbientLight;
        return THREE.Light.prototype.clone.call(this, e), e
    }, THREE.AreaLight = function(e, t) {
        THREE.Light.call(this, e), this.normal = new THREE.Vector3(0, -1, 0), this.right = new THREE.Vector3(1, 0, 0), this.intensity = void 0 !== t ? t : 1, this.width = 1, this.height = 1, this.constantAttenuation = 1.5, this.linearAttenuation = .5, this.quadraticAttenuation = .1
    }, THREE.AreaLight.prototype = Object.create(THREE.Light.prototype), THREE.DirectionalLight = function(e, t) {
        THREE.Light.call(this, e), this.position.set(0, 1, 0), this.target = new THREE.Object3D, this.intensity = void 0 !== t ? t : 1, this.castShadow = !1, this.onlyShadow = !1, this.shadowCameraNear = 50, this.shadowCameraFar = 5e3, this.shadowCameraLeft = -500, this.shadowCameraRight = 500, this.shadowCameraTop = 500, this.shadowCameraBottom = -500, this.shadowCameraVisible = !1, this.shadowBias = 0, this.shadowDarkness = .5, this.shadowMapWidth = 512, this.shadowMapHeight = 512, this.shadowCascade = !1, this.shadowCascadeOffset = new THREE.Vector3(0, 0, -1e3), this.shadowCascadeCount = 2, this.shadowCascadeBias = [0, 0, 0], this.shadowCascadeWidth = [512, 512, 512], this.shadowCascadeHeight = [512, 512, 512], this.shadowCascadeNearZ = [-1, .99, .998], this.shadowCascadeFarZ = [.99, .998, 1], this.shadowCascadeArray = [], this.shadowMap = null, this.shadowMapSize = null, this.shadowCamera = null, this.shadowMatrix = null
    }, THREE.DirectionalLight.prototype = Object.create(THREE.Light.prototype), THREE.DirectionalLight.prototype.clone = function() {
        var e = new THREE.DirectionalLight;
        return THREE.Light.prototype.clone.call(this, e), e.target = this.target.clone(), e.intensity = this.intensity, e.castShadow = this.castShadow, e.onlyShadow = this.onlyShadow, e.shadowCameraNear = this.shadowCameraNear, e.shadowCameraFar = this.shadowCameraFar, e.shadowCameraLeft = this.shadowCameraLeft, e.shadowCameraRight = this.shadowCameraRight, e.shadowCameraTop = this.shadowCameraTop, e.shadowCameraBottom = this.shadowCameraBottom, e.shadowCameraVisible = this.shadowCameraVisible, e.shadowBias = this.shadowBias, e.shadowDarkness = this.shadowDarkness, e.shadowMapWidth = this.shadowMapWidth, e.shadowMapHeight = this.shadowMapHeight, e.shadowCascade = this.shadowCascade, e.shadowCascadeOffset.copy(this.shadowCascadeOffset), e.shadowCascadeCount = this.shadowCascadeCount, e.shadowCascadeBias = this.shadowCascadeBias.slice(0), e.shadowCascadeWidth = this.shadowCascadeWidth.slice(0), e.shadowCascadeHeight = this.shadowCascadeHeight.slice(0), e.shadowCascadeNearZ = this.shadowCascadeNearZ.slice(0), e.shadowCascadeFarZ = this.shadowCascadeFarZ.slice(0), e
    }, THREE.HemisphereLight = function(e, t, r) {
        THREE.Light.call(this, e), this.position.set(0, 100, 0), this.groundColor = new THREE.Color(t), this.intensity = void 0 !== r ? r : 1
    }, THREE.HemisphereLight.prototype = Object.create(THREE.Light.prototype), THREE.HemisphereLight.prototype.clone = function() {
        var e = new THREE.HemisphereLight;
        return THREE.Light.prototype.clone.call(this, e), e.groundColor.copy(this.groundColor), e.intensity = this.intensity, e
    }, THREE.PointLight = function(e, t, r) {
        THREE.Light.call(this, e), this.intensity = void 0 !== t ? t : 1, this.distance = void 0 !== r ? r : 0
    }, THREE.PointLight.prototype = Object.create(THREE.Light.prototype), THREE.PointLight.prototype.clone = function() {
        var e = new THREE.PointLight;
        return THREE.Light.prototype.clone.call(this, e), e.intensity = this.intensity, e.distance = this.distance, e
    }, THREE.SpotLight = function(e, t, r, i, n) {
        THREE.Light.call(this, e), this.position.set(0, 1, 0), this.target = new THREE.Object3D, this.intensity = void 0 !== t ? t : 1, this.distance = void 0 !== r ? r : 0, this.angle = void 0 !== i ? i : Math.PI / 3, this.exponent = void 0 !== n ? n : 10, this.castShadow = !1, this.onlyShadow = !1, this.shadowCameraNear = 50, this.shadowCameraFar = 5e3, this.shadowCameraFov = 50, this.shadowCameraVisible = !1, this.shadowBias = 0, this.shadowDarkness = .5, this.shadowMapWidth = 512, this.shadowMapHeight = 512, this.shadowMap = null, this.shadowMapSize = null, this.shadowCamera = null, this.shadowMatrix = null
    }, THREE.SpotLight.prototype = Object.create(THREE.Light.prototype), THREE.SpotLight.prototype.clone = function() {
        var e = new THREE.SpotLight;
        return THREE.Light.prototype.clone.call(this, e), e.target = this.target.clone(), e.intensity = this.intensity, e.distance = this.distance, e.angle = this.angle, e.exponent = this.exponent, e.castShadow = this.castShadow, e.onlyShadow = this.onlyShadow, e.shadowCameraNear = this.shadowCameraNear, e.shadowCameraFar = this.shadowCameraFar, e.shadowCameraFov = this.shadowCameraFov, e.shadowCameraVisible = this.shadowCameraVisible, e.shadowBias = this.shadowBias, e.shadowDarkness = this.shadowDarkness, e.shadowMapWidth = this.shadowMapWidth, e.shadowMapHeight = this.shadowMapHeight, e
    }, THREE.Cache = function() {
        this.files = {}
    }, THREE.Cache.prototype = {
        constructor: THREE.Cache,
        add: function(e, t) {
            this.files[e] = t
        },
        get: function(e) {
            return this.files[e]
        },
        remove: function(e) {
            delete this.files[e]
        },
        clear: function() {
            this.files = {}
        }
    }, THREE.Loader = function(e) {
        this.showStatus = e, this.statusDomElement = e ? THREE.Loader.prototype.addStatusElement() : null, this.imageLoader = new THREE.ImageLoader, this.onLoadStart = function() {}, this.onLoadProgress = function() {}, this.onLoadComplete = function() {}
    }, THREE.Loader.prototype = {
        constructor: THREE.Loader,
        crossOrigin: void 0,
        addStatusElement: function() {
            var e = document.createElement("div");
            return e.style.position = "absolute", e.style.right = "0px", e.style.top = "0px", e.style.fontSize = "0.8em", e.style.textAlign = "left", e.style.background = "rgba(0,0,0,0.25)", e.style.color = "#fff", e.style.width = "120px", e.style.padding = "0.5em 0.5em 0.5em 0.5em", e.style.zIndex = 1e3, e.innerHTML = "Loading ...", e
        },
        updateProgress: function(e) {
            var t = "Loaded ";
            t += e.total ? (100 * e.loaded / e.total).toFixed(0) + "%" : (e.loaded / 1024).toFixed(2) + " KB", this.statusDomElement.innerHTML = t
        },
        extractUrlBase: function(e) {
            var t = e.split("/");
            return 1 === t.length ? "./" : (t.pop(), t.join("/") + "/")
        },
        initMaterials: function(e, t) {
            for (var r = [], i = 0; i < e.length; ++i) r[i] = this.createMaterial(e[i], t);
            return r
        },
        needsTangents: function(e) {
            for (var t = 0, r = e.length; r > t; t++) {
                var i = e[t];
                if (i instanceof THREE.ShaderMaterial) return !0
            }
            return !1
        },
        createMaterial: function(e, t) {
            function r(e) {
                var t = Math.log(e) / Math.LN2;
                return Math.pow(2, Math.round(t))
            }

            function i(e, i, n, o, s, h, l) {
                var c, u = t + n,
                    f = THREE.Loader.Handlers.get(u);
                if (null !== f ? c = f.load(u) : (c = new THREE.Texture, f = a.imageLoader, f.crossOrigin = a.crossOrigin, f.load(u, function(e) {
                        if (THREE.Math.isPowerOfTwo(e.width) === !1 || THREE.Math.isPowerOfTwo(e.height) === !1) {
                            var t = r(e.width),
                                i = r(e.height),
                                n = document.createElement("canvas");
                            n.width = t, n.height = i;
                            var a = n.getContext("2d");
                            a.drawImage(e, 0, 0, t, i), c.image = n
                        } else c.image = e;
                        c.needsUpdate = !0
                    })), c.sourceFile = n, o && (c.repeat.set(o[0], o[1]), 1 !== o[0] && (c.wrapS = THREE.RepeatWrapping), 1 !== o[1] && (c.wrapT = THREE.RepeatWrapping)), s && c.offset.set(s[0], s[1]), h) {
                    var E = {
                        repeat: THREE.RepeatWrapping,
                        mirror: THREE.MirroredRepeatWrapping
                    };
                    void 0 !== E[h[0]] && (c.wrapS = E[h[0]]), void 0 !== E[h[1]] && (c.wrapT = E[h[1]])
                }
                l && (c.anisotropy = l), e[i] = c
            }

            function n(e) {
                return (255 * e[0] << 16) + (255 * e[1] << 8) + 255 * e[2]
            }
            var a = this,
                o = "MeshLambertMaterial",
                s = {
                    color: 15658734,
                    opacity: 1,
                    map: null,
                    lightMap: null,
                    normalMap: null,
                    bumpMap: null,
                    wireframe: !1
                };
            if (e.shading) {
                var h = e.shading.toLowerCase();
                "phong" === h ? o = "MeshPhongMaterial" : "basic" === h && (o = "MeshBasicMaterial")
            }
            if (void 0 !== e.blending && void 0 !== THREE[e.blending] && (s.blending = THREE[e.blending]), (void 0 !== e.transparent || e.opacity < 1) && (s.transparent = e.transparent), void 0 !== e.depthTest && (s.depthTest = e.depthTest), void 0 !== e.depthWrite && (s.depthWrite = e.depthWrite), void 0 !== e.visible && (s.visible = e.visible), void 0 !== e.flipSided && (s.side = THREE.BackSide), void 0 !== e.doubleSided && (s.side = THREE.DoubleSide), void 0 !== e.wireframe && (s.wireframe = e.wireframe), void 0 !== e.vertexColors && ("face" === e.vertexColors ? s.vertexColors = THREE.FaceColors : e.vertexColors && (s.vertexColors = THREE.VertexColors)), e.colorDiffuse ? s.color = n(e.colorDiffuse) : e.DbgColor && (s.color = e.DbgColor), e.colorSpecular && (s.specular = n(e.colorSpecular)), e.colorAmbient && (s.ambient = n(e.colorAmbient)), e.colorEmissive && (s.emissive = n(e.colorEmissive)), e.transparency && (s.opacity = e.transparency), e.specularCoef && (s.shininess = e.specularCoef), e.mapDiffuse && t && i(s, "map", e.mapDiffuse, e.mapDiffuseRepeat, e.mapDiffuseOffset, e.mapDiffuseWrap, e.mapDiffuseAnisotropy), e.mapLight && t && i(s, "lightMap", e.mapLight, e.mapLightRepeat, e.mapLightOffset, e.mapLightWrap, e.mapLightAnisotropy), e.mapBump && t && i(s, "bumpMap", e.mapBump, e.mapBumpRepeat, e.mapBumpOffset, e.mapBumpWrap, e.mapBumpAnisotropy), e.mapNormal && t && i(s, "normalMap", e.mapNormal, e.mapNormalRepeat, e.mapNormalOffset, e.mapNormalWrap, e.mapNormalAnisotropy), e.mapSpecular && t && i(s, "specularMap", e.mapSpecular, e.mapSpecularRepeat, e.mapSpecularOffset, e.mapSpecularWrap, e.mapSpecularAnisotropy), e.mapAlpha && t && i(s, "alphaMap", e.mapAlpha, e.mapAlphaRepeat, e.mapAlphaOffset, e.mapAlphaWrap, e.mapAlphaAnisotropy), e.mapBumpScale && (s.bumpScale = e.mapBumpScale), e.mapNormal) {
                var l = THREE.ShaderLib.normalmap,
                    c = THREE.UniformsUtils.clone(l.uniforms);
                c.tNormal.value = s.normalMap, e.mapNormalFactor && c.uNormalScale.value.set(e.mapNormalFactor, e.mapNormalFactor), s.map && (c.tDiffuse.value = s.map, c.enableDiffuse.value = !0), s.specularMap && (c.tSpecular.value = s.specularMap, c.enableSpecular.value = !0), s.lightMap && (c.tAO.value = s.lightMap, c.enableAO.value = !0), c.diffuse.value.setHex(s.color), c.specular.value.setHex(s.specular), c.ambient.value.setHex(s.ambient), c.shininess.value = s.shininess, void 0 !== s.opacity && (c.opacity.value = s.opacity);
                var u = {
                        fragmentShader: l.fragmentShader,
                        vertexShader: l.vertexShader,
                        uniforms: c,
                        lights: !0,
                        fog: !0
                    },
                    f = new THREE.ShaderMaterial(u);
                s.transparent && (f.transparent = !0)
            } else var f = new THREE[o](s);
            return void 0 !== e.DbgName && (f.name = e.DbgName), f
        }
    }, THREE.Loader.Handlers = {
        handlers: [],
        add: function(e, t) {
            this.handlers.push(e, t)
        },
        get: function(e) {
            for (var t = 0, r = this.handlers.length; r > t; t += 2) {
                var i = this.handlers[t],
                    n = this.handlers[t + 1];
                if (i.test(e)) return n
            }
            return null
        }
    }, THREE.XHRLoader = function(e) {
        this.cache = new THREE.Cache, this.manager = void 0 !== e ? e : THREE.DefaultLoadingManager
    }, THREE.XHRLoader.prototype = {
        constructor: THREE.XHRLoader,
        load: function(e, t, r, i) {
            var n = this,
                a = n.cache.get(e);
            if (void 0 !== a) return void(t && t(a));
            var o = new XMLHttpRequest;
            o.open("GET", e, !0), o.addEventListener("load", function() {
                n.cache.add(e, this.response), t && t(this.response), n.manager.itemEnd(e)
            }, !1), void 0 !== r && o.addEventListener("progress", function(e) {
                r(e)
            }, !1), void 0 !== i && o.addEventListener("error", function(e) {
                i(e)
            }, !1), void 0 !== this.crossOrigin && (o.crossOrigin = this.crossOrigin), void 0 !== this.responseType && (o.responseType = this.responseType), o.send(null), n.manager.itemStart(e)
        },
        setResponseType: function(e) {
            this.responseType = e
        },
        setCrossOrigin: function(e) {
            this.crossOrigin = e
        }
    }, THREE.ImageLoader = function(e) {
        this.cache = new THREE.Cache, this.manager = void 0 !== e ? e : THREE.DefaultLoadingManager
    }, THREE.ImageLoader.prototype = {
        constructor: THREE.ImageLoader,
        load: function(e, t, r, i) {
            var n = this,
                a = n.cache.get(e);
            if (void 0 !== a) return void t(a);
            var o = document.createElement("img");
            return void 0 !== t && o.addEventListener("load", function() {
                n.cache.add(e, this), t(this), n.manager.itemEnd(e)
            }, !1), void 0 !== r && o.addEventListener("progress", function(e) {
                r(e)
            }, !1), void 0 !== i && o.addEventListener("error", function(e) {
                i(e)
            }, !1), void 0 !== this.crossOrigin && (o.crossOrigin = this.crossOrigin), o.src = e, n.manager.itemStart(e), o
        },
        setCrossOrigin: function(e) {
            this.crossOrigin = e
        }
    }, THREE.JSONLoader = function(e) {
        THREE.Loader.call(this, e), this.withCredentials = !1
    }, THREE.JSONLoader.prototype = Object.create(THREE.Loader.prototype), THREE.JSONLoader.prototype.load = function(e, t, r) {
        r = r && "string" == typeof r ? r : this.extractUrlBase(e), this.onLoadStart(), this.loadAjaxJSON(this, e, t, r)
    }, THREE.JSONLoader.prototype.loadAjaxJSON = function(e, t, r, i, n) {
        var a = new XMLHttpRequest,
            o = 0;
        a.onreadystatechange = function() {
            if (a.readyState === a.DONE)
                if (200 === a.status || 0 === a.status) {
                    if (a.responseText) {
                        var s = JSON.parse(a.responseText);
                        if (void 0 !== s.metadata && "scene" === s.metadata.type) return void console.error('THREE.JSONLoader: "' + t + '" seems to be a Scene. Use THREE.SceneLoader instead.');
                        var h = e.parse(s, i);
                        r(h.geometry, h.materials)
                    } else console.error('THREE.JSONLoader: "' + t + '" seems to be unreachable or the file is empty.');
                    e.onLoadComplete()
                } else console.error("THREE.JSONLoader: Couldn't load \"" + t + '" (' + a.status + ")");
            else a.readyState === a.LOADING ? n && (0 === o && (o = a.getResponseHeader("Content-Length")), n({
                total: o,
                loaded: a.responseText.length
            })) : a.readyState === a.HEADERS_RECEIVED && void 0 !== n && (o = a.getResponseHeader("Content-Length"))
        }, a.open("GET", t, !0), a.withCredentials = this.withCredentials, a.send(null)
    }, THREE.JSONLoader.prototype.parse = function(e, t) {
        function r(t) {
            function r(e, t) {
                return e & 1 << t
            }
            var i, n, o, s, h, l, c, u, f, E, p, d, m, v, g, T, y, R, x, H, b, _, w, M, S, C, A, L = e.faces,
                P = e.vertices,
                F = e.normals,
                D = e.colors,
                U = 0;
            if (void 0 !== e.uvs) {
                for (i = 0; i < e.uvs.length; i++) e.uvs[i].length && U++;
                for (i = 0; U > i; i++) a.faceVertexUvs[i] = []
            }
            for (s = 0, h = P.length; h > s;) R = new THREE.Vector3, R.x = P[s++] * t, R.y = P[s++] * t, R.z = P[s++] * t, a.vertices.push(R);
            for (s = 0, h = L.length; h > s;)
                if (E = L[s++], p = r(E, 0), d = r(E, 1), m = r(E, 3), v = r(E, 4), g = r(E, 5), T = r(E, 6), y = r(E, 7), p) {
                    if (H = new THREE.Face3, H.a = L[s], H.b = L[s + 1], H.c = L[s + 3], b = new THREE.Face3, b.a = L[s + 1], b.b = L[s + 2], b.c = L[s + 3], s += 4, d && (f = L[s++], H.materialIndex = f, b.materialIndex = f), o = a.faces.length, m)
                        for (i = 0; U > i; i++)
                            for (M = e.uvs[i], a.faceVertexUvs[i][o] = [], a.faceVertexUvs[i][o + 1] = [], n = 0; 4 > n; n++) u = L[s++], C = M[2 * u], A = M[2 * u + 1], S = new THREE.Vector2(C, A), 2 !== n && a.faceVertexUvs[i][o].push(S), 0 !== n && a.faceVertexUvs[i][o + 1].push(S);
                    if (v && (c = 3 * L[s++], H.normal.set(F[c++], F[c++], F[c]), b.normal.copy(H.normal)), g)
                        for (i = 0; 4 > i; i++) c = 3 * L[s++], w = new THREE.Vector3(F[c++], F[c++], F[c]), 2 !== i && H.vertexNormals.push(w), 0 !== i && b.vertexNormals.push(w);
                    if (T && (l = L[s++], _ = D[l], H.color.setHex(_), b.color.setHex(_)), y)
                        for (i = 0; 4 > i; i++) l = L[s++], _ = D[l], 2 !== i && H.vertexColors.push(new THREE.Color(_)), 0 !== i && b.vertexColors.push(new THREE.Color(_));
                    a.faces.push(H), a.faces.push(b)
                } else {
                    if (x = new THREE.Face3, x.a = L[s++], x.b = L[s++], x.c = L[s++], d && (f = L[s++], x.materialIndex = f), o = a.faces.length, m)
                        for (i = 0; U > i; i++)
                            for (M = e.uvs[i], a.faceVertexUvs[i][o] = [], n = 0; 3 > n; n++) u = L[s++], C = M[2 * u], A = M[2 * u + 1], S = new THREE.Vector2(C, A), a.faceVertexUvs[i][o].push(S);
                    if (v && (c = 3 * L[s++], x.normal.set(F[c++], F[c++], F[c])), g)
                        for (i = 0; 3 > i; i++) c = 3 * L[s++], w = new THREE.Vector3(F[c++], F[c++], F[c]), x.vertexNormals.push(w);
                    if (T && (l = L[s++], x.color.setHex(D[l])), y)
                        for (i = 0; 3 > i; i++) l = L[s++], x.vertexColors.push(new THREE.Color(D[l]));
                    a.faces.push(x)
                }
        }

        function i() {
            var t = void 0 !== e.influencesPerVertex ? e.influencesPerVertex : 2;
            if (e.skinWeights)
                for (var r = 0, i = e.skinWeights.length; i > r; r += t) {
                    var n = e.skinWeights[r],
                        o = t > 1 ? e.skinWeights[r + 1] : 0,
                        s = t > 2 ? e.skinWeights[r + 2] : 0,
                        h = t > 3 ? e.skinWeights[r + 3] : 0;
                    a.skinWeights.push(new THREE.Vector4(n, o, s, h))
                }
            if (e.skinIndices)
                for (var r = 0, i = e.skinIndices.length; i > r; r += t) {
                    var l = e.skinIndices[r],
                        c = t > 1 ? e.skinIndices[r + 1] : 0,
                        u = t > 2 ? e.skinIndices[r + 2] : 0,
                        f = t > 3 ? e.skinIndices[r + 3] : 0;
                    a.skinIndices.push(new THREE.Vector4(l, c, u, f))
                }
            a.bones = e.bones, a.bones && a.bones.length > 0 && (a.skinWeights.length !== a.skinIndices.length || a.skinIndices.length !== a.vertices.length) && console.warn("When skinning, number of vertices (" + a.vertices.length + "), skinIndices (" + a.skinIndices.length + "), and skinWeights (" + a.skinWeights.length + ") should match."), a.animation = e.animation, a.animations = e.animations
        }

        function n(t) {
            if (void 0 !== e.morphTargets) {
                var r, i, n, o, s, h;
                for (r = 0, i = e.morphTargets.length; i > r; r++)
                    for (a.morphTargets[r] = {}, a.morphTargets[r].name = e.morphTargets[r].name, a.morphTargets[r].vertices = [], s = a.morphTargets[r].vertices, h = e.morphTargets[r].vertices, n = 0, o = h.length; o > n; n += 3) {
                        var l = new THREE.Vector3;
                        l.x = h[n] * t, l.y = h[n + 1] * t, l.z = h[n + 2] * t, s.push(l)
                    }
            }
            if (void 0 !== e.morphColors) {
                var r, i, c, u, f, E, p;
                for (r = 0, i = e.morphColors.length; i > r; r++)
                    for (a.morphColors[r] = {}, a.morphColors[r].name = e.morphColors[r].name, a.morphColors[r].colors = [], f = a.morphColors[r].colors, E = e.morphColors[r].colors, c = 0, u = E.length; u > c; c += 3) p = new THREE.Color(16755200), p.setRGB(E[c], E[c + 1], E[c + 2]), f.push(p)
            }
        }
        var a = new THREE.Geometry,
            o = void 0 !== e.scale ? 1 / e.scale : 1;
        if (r(o), i(), n(o), a.computeFaceNormals(), a.computeBoundingSphere(), void 0 === e.materials || 0 === e.materials.length) return {
            geometry: a
        };
        var s = this.initMaterials(e.materials, t);
        return this.needsTangents(s) && a.computeTangents(), {
            geometry: a,
            materials: s
        }
    }, THREE.LoadingManager = function(e, t, r) {
        var i = this,
            n = 0,
            a = 0;
        this.onLoad = e, this.onProgress = t, this.onError = r, this.itemStart = function() {
            a++
        }, this.itemEnd = function(e) {
            n++, void 0 !== i.onProgress && i.onProgress(e, n, a), n === a && void 0 !== i.onLoad && i.onLoad()
        }
    }, THREE.DefaultLoadingManager = new THREE.LoadingManager, THREE.BufferGeometryLoader = function(e) {
        this.manager = void 0 !== e ? e : THREE.DefaultLoadingManager
    }, THREE.BufferGeometryLoader.prototype = {
        constructor: THREE.BufferGeometryLoader,
        load: function(e, t, r, i) {
            var n = this,
                a = new THREE.XHRLoader;
            a.setCrossOrigin(this.crossOrigin), a.load(e, function(e) {
                t(n.parse(JSON.parse(e)))
            }, r, i)
        },
        setCrossOrigin: function(e) {
            this.crossOrigin = e
        },
        parse: function(e) {
            var t = new THREE.BufferGeometry,
                r = e.attributes;
            for (var i in r) {
                var n = r[i];
                t.attributes[i] = {
                    itemSize: n.itemSize,
                    array: new self[n.type](n.array)
                }
            }
            var a = e.offsets;
            void 0 !== a && (t.offsets = JSON.parse(JSON.stringify(a)));
            var o = e.boundingSphere;
            return void 0 !== o && (t.boundingSphere = new THREE.Sphere((new THREE.Vector3).fromArray(void 0 !== o.center ? o.center : [0, 0, 0]), o.radius)), t
        }
    }, THREE.MaterialLoader = function(e) {
        this.manager = void 0 !== e ? e : THREE.DefaultLoadingManager
    }, THREE.MaterialLoader.prototype = {
        constructor: THREE.MaterialLoader,
        load: function(e, t, r, i) {
            var n = this,
                a = new THREE.XHRLoader;
            a.setCrossOrigin(this.crossOrigin), a.load(e, function(e) {
                t(n.parse(JSON.parse(e)))
            }, r, i)
        },
        setCrossOrigin: function(e) {
            this.crossOrigin = e
        },
        parse: function(e) {
            var t = new THREE[e.type];
            if (void 0 !== e.color && t.color.setHex(e.color), void 0 !== e.ambient && t.ambient.setHex(e.ambient), void 0 !== e.emissive && t.emissive.setHex(e.emissive), void 0 !== e.specular && t.specular.setHex(e.specular), void 0 !== e.shininess && (t.shininess = e.shininess), void 0 !== e.uniforms && (t.uniforms = e.uniforms), void 0 !== e.vertexShader && (t.vertexShader = e.vertexShader), void 0 !== e.fragmentShader && (t.fragmentShader = e.fragmentShader), void 0 !== e.vertexColors && (t.vertexColors = e.vertexColors), void 0 !== e.blending && (t.blending = e.blending), void 0 !== e.side && (t.side = e.side), void 0 !== e.opacity && (t.opacity = e.opacity), void 0 !== e.transparent && (t.transparent = e.transparent), void 0 !== e.wireframe && (t.wireframe = e.wireframe), void 0 !== e.materials)
                for (var r = 0, i = e.materials.length; i > r; r++) t.materials.push(this.parse(e.materials[r]));
            return t
        }
    }, THREE.ObjectLoader = function(e) {
        this.manager = void 0 !== e ? e : THREE.DefaultLoadingManager
    }, THREE.ObjectLoader.prototype = {
        constructor: THREE.ObjectLoader,
        load: function(e, t, r, i) {
            var n = this,
                a = new THREE.XHRLoader(n.manager);
            a.setCrossOrigin(this.crossOrigin), a.load(e, function(e) {
                t(n.parse(JSON.parse(e)))
            }, r, i)
        },
        setCrossOrigin: function(e) {
            this.crossOrigin = e
        },
        parse: function(e) {
            var t = this.parseGeometries(e.geometries),
                r = this.parseMaterials(e.materials),
                i = this.parseObject(e.object, t, r);
            return i
        },
        parseGeometries: function(e) {
            var t = {};
            if (void 0 !== e)
                for (var r = new THREE.JSONLoader, i = new THREE.BufferGeometryLoader, n = 0, a = e.length; a > n; n++) {
                    var o, s = e[n];
                    switch (s.type) {
                        case "PlaneGeometry":
                            o = new THREE.PlaneGeometry(s.width, s.height, s.widthSegments, s.heightSegments);
                            break;
                        case "BoxGeometry":
                        case "CubeGeometry":
                            o = new THREE.BoxGeometry(s.width, s.height, s.depth, s.widthSegments, s.heightSegments, s.depthSegments);
                            break;
                        case "CircleGeometry":
                            o = new THREE.CircleGeometry(s.radius, s.segments);
                            break;
                        case "CylinderGeometry":
                            o = new THREE.CylinderGeometry(s.radiusTop, s.radiusBottom, s.height, s.radialSegments, s.heightSegments, s.openEnded);
                            break;
                        case "SphereGeometry":
                            o = new THREE.SphereGeometry(s.radius, s.widthSegments, s.heightSegments, s.phiStart, s.phiLength, s.thetaStart, s.thetaLength);
                            break;
                        case "IcosahedronGeometry":
                            o = new THREE.IcosahedronGeometry(s.radius, s.detail);
                            break;
                        case "TorusGeometry":
                            o = new THREE.TorusGeometry(s.radius, s.tube, s.radialSegments, s.tubularSegments, s.arc);
                            break;
                        case "TorusKnotGeometry":
                            o = new THREE.TorusKnotGeometry(s.radius, s.tube, s.radialSegments, s.tubularSegments, s.p, s.q, s.heightScale);
                            break;
                        case "BufferGeometry":
                            o = i.parse(s.data);
                            break;
                        case "Geometry":
                            o = r.parse(s.data).geometry
                    }
                    o.uuid = s.uuid, void 0 !== s.name && (o.name = s.name), t[s.uuid] = o
                }
            return t
        },
        parseMaterials: function(e) {
            var t = {};
            if (void 0 !== e)
                for (var r = new THREE.MaterialLoader, i = 0, n = e.length; n > i; i++) {
                    var a = e[i],
                        o = r.parse(a);
                    o.uuid = a.uuid, void 0 !== a.name && (o.name = a.name), t[a.uuid] = o
                }
            return t
        },
        parseObject: function() {
            var e = new THREE.Matrix4;
            return function(t, r, i) {
                var n;
                switch (t.type) {
                    case "Scene":
                        n = new THREE.Scene;
                        break;
                    case "PerspectiveCamera":
                        n = new THREE.PerspectiveCamera(t.fov, t.aspect, t.near, t.far);
                        break;
                    case "OrthographicCamera":
                        n = new THREE.OrthographicCamera(t.left, t.right, t.top, t.bottom, t.near, t.far);
                        break;
                    case "AmbientLight":
                        n = new THREE.AmbientLight(t.color);
                        break;
                    case "DirectionalLight":
                        n = new THREE.DirectionalLight(t.color, t.intensity);
                        break;
                    case "PointLight":
                        n = new THREE.PointLight(t.color, t.intensity, t.distance);
                        break;
                    case "SpotLight":
                        n = new THREE.SpotLight(t.color, t.intensity, t.distance, t.angle, t.exponent);
                        break;
                    case "HemisphereLight":
                        n = new THREE.HemisphereLight(t.color, t.groundColor, t.intensity);
                        break;
                    case "Mesh":
                        var a = r[t.geometry],
                            o = i[t.material];
                        void 0 === a && console.error("THREE.ObjectLoader: Undefined geometry " + t.geometry), void 0 === o && console.error("THREE.ObjectLoader: Undefined material " + t.material), n = new THREE.Mesh(a, o);
                        break;
                    case "Sprite":
                        var o = i[t.material];
                        void 0 === o && console.error("THREE.ObjectLoader: Undefined material " + t.material), n = new THREE.Sprite(o);
                        break;
                    default:
                        n = new THREE.Object3D
                }
                if (n.uuid = t.uuid, void 0 !== t.name && (n.name = t.name), void 0 !== t.matrix ? (e.fromArray(t.matrix), e.decompose(n.position, n.quaternion, n.scale)) : (void 0 !== t.position && n.position.fromArray(t.position), void 0 !== t.rotation && n.rotation.fromArray(t.rotation), void 0 !== t.scale && n.scale.fromArray(t.scale)), void 0 !== t.visible && (n.visible = t.visible), void 0 !== t.userData && (n.userData = t.userData), void 0 !== t.children)
                    for (var s in t.children) n.add(this.parseObject(t.children[s], r, i));
                return n
            }
        }()
    }, THREE.TextureLoader = function(e) {
        this.manager = void 0 !== e ? e : THREE.DefaultLoadingManager
    }, THREE.TextureLoader.prototype = {
        constructor: THREE.TextureLoader,
        load: function(e, t, r, i) {
            var n = this,
                a = new THREE.ImageLoader(n.manager);
            a.setCrossOrigin(this.crossOrigin), a.load(e, function(e) {
                var r = new THREE.Texture(e);
                r.needsUpdate = !0, void 0 !== t && t(r)
            }, r, i)
        },
        setCrossOrigin: function(e) {
            this.crossOrigin = e
        }
    }, THREE.Material = function() {
        this.id = THREE.MaterialIdCount++, this.uuid = THREE.Math.generateUUID(), this.name = "", this.side = THREE.FrontSide, this.opacity = 1, this.transparent = !1, this.blending = THREE.NormalBlending, this.blendSrc = THREE.SrcAlphaFactor, this.blendDst = THREE.OneMinusSrcAlphaFactor, this.blendEquation = THREE.AddEquation, this.depthTest = !0, this.depthWrite = !0, this.polygonOffset = !1, this.polygonOffsetFactor = 0, this.polygonOffsetUnits = 0, this.alphaTest = 0, this.overdraw = 0, this.visible = !0, this.needsUpdate = !0
    }, THREE.Material.prototype = {
        constructor: THREE.Material,
        setValues: function(e) {
            if (void 0 !== e)
                for (var t in e) {
                    var r = e[t];
                    if (void 0 !== r) {
                        if (t in this) {
                            var i = this[t];
                            i instanceof THREE.Color ? i.set(r) : i instanceof THREE.Vector3 && r instanceof THREE.Vector3 ? i.copy(r) : this[t] = "overdraw" == t ? Number(r) : r
                        }
                    } else console.warn("THREE.Material: '" + t + "' parameter is undefined.")
                }
        },
        clone: function(e) {
            return void 0 === e && (e = new THREE.Material), e.name = this.name, e.side = this.side, e.opacity = this.opacity, e.transparent = this.transparent, e.blending = this.blending, e.blendSrc = this.blendSrc, e.blendDst = this.blendDst, e.blendEquation = this.blendEquation, e.depthTest = this.depthTest, e.depthWrite = this.depthWrite, e.polygonOffset = this.polygonOffset, e.polygonOffsetFactor = this.polygonOffsetFactor, e.polygonOffsetUnits = this.polygonOffsetUnits, e.alphaTest = this.alphaTest, e.overdraw = this.overdraw, e.visible = this.visible, e
        },
        dispose: function() {
            this.dispatchEvent({
                type: "dispose"
            })
        }
    }, THREE.EventDispatcher.prototype.apply(THREE.Material.prototype), THREE.MaterialIdCount = 0, THREE.LineBasicMaterial = function(e) {
        THREE.Material.call(this), this.color = new THREE.Color(16777215), this.linewidth = 1, this.linecap = "round", this.linejoin = "round", this.vertexColors = THREE.NoColors, this.fog = !0, this.setValues(e)
    }, THREE.LineBasicMaterial.prototype = Object.create(THREE.Material.prototype), THREE.LineBasicMaterial.prototype.clone = function() {
        var e = new THREE.LineBasicMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.color.copy(this.color), e.linewidth = this.linewidth, e.linecap = this.linecap, e.linejoin = this.linejoin, e.vertexColors = this.vertexColors, e.fog = this.fog, e
    }, THREE.LineDashedMaterial = function(e) {
        THREE.Material.call(this), this.color = new THREE.Color(16777215), this.linewidth = 1, this.scale = 1, this.dashSize = 3, this.gapSize = 1, this.vertexColors = !1, this.fog = !0, this.setValues(e)
    }, THREE.LineDashedMaterial.prototype = Object.create(THREE.Material.prototype), THREE.LineDashedMaterial.prototype.clone = function() {
        var e = new THREE.LineDashedMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.color.copy(this.color), e.linewidth = this.linewidth, e.scale = this.scale, e.dashSize = this.dashSize, e.gapSize = this.gapSize, e.vertexColors = this.vertexColors, e.fog = this.fog, e
    }, THREE.MeshBasicMaterial = function(e) {
        THREE.Material.call(this), this.color = new THREE.Color(16777215), this.map = null, this.lightMap = null, this.specularMap = null, this.alphaMap = null, this.envMap = null, this.combine = THREE.MultiplyOperation, this.reflectivity = 1, this.refractionRatio = .98, this.fog = !0, this.shading = THREE.SmoothShading, this.wireframe = !1, this.wireframeLinewidth = 1, this.wireframeLinecap = "round", this.wireframeLinejoin = "round", this.vertexColors = THREE.NoColors, this.skinning = !1, this.morphTargets = !1, this.setValues(e)
    }, THREE.MeshBasicMaterial.prototype = Object.create(THREE.Material.prototype), THREE.MeshBasicMaterial.prototype.clone = function() {
        var e = new THREE.MeshBasicMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.color.copy(this.color), e.map = this.map, e.lightMap = this.lightMap, e.specularMap = this.specularMap, e.alphaMap = this.alphaMap, e.envMap = this.envMap, e.combine = this.combine, e.reflectivity = this.reflectivity, e.refractionRatio = this.refractionRatio, e.fog = this.fog, e.shading = this.shading, e.wireframe = this.wireframe, e.wireframeLinewidth = this.wireframeLinewidth, e.wireframeLinecap = this.wireframeLinecap, e.wireframeLinejoin = this.wireframeLinejoin, e.vertexColors = this.vertexColors, e.skinning = this.skinning, e.morphTargets = this.morphTargets, e
    }, THREE.MeshLambertMaterial = function(e) {
        THREE.Material.call(this), this.color = new THREE.Color(16777215), this.ambient = new THREE.Color(16777215), this.emissive = new THREE.Color(0), this.wrapAround = !1, this.wrapRGB = new THREE.Vector3(1, 1, 1), this.map = null, this.lightMap = null, this.specularMap = null, this.alphaMap = null, this.envMap = null, this.combine = THREE.MultiplyOperation, this.reflectivity = 1, this.refractionRatio = .98, this.fog = !0, this.shading = THREE.SmoothShading, this.wireframe = !1, this.wireframeLinewidth = 1, this.wireframeLinecap = "round", this.wireframeLinejoin = "round", this.vertexColors = THREE.NoColors, this.skinning = !1, this.morphTargets = !1, this.morphNormals = !1, this.setValues(e)
    }, THREE.MeshLambertMaterial.prototype = Object.create(THREE.Material.prototype), THREE.MeshLambertMaterial.prototype.clone = function() {
        var e = new THREE.MeshLambertMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.color.copy(this.color), e.ambient.copy(this.ambient), e.emissive.copy(this.emissive), e.wrapAround = this.wrapAround, e.wrapRGB.copy(this.wrapRGB), e.map = this.map, e.lightMap = this.lightMap, e.specularMap = this.specularMap, e.alphaMap = this.alphaMap, e.envMap = this.envMap, e.combine = this.combine, e.reflectivity = this.reflectivity, e.refractionRatio = this.refractionRatio, e.fog = this.fog, e.shading = this.shading, e.wireframe = this.wireframe, e.wireframeLinewidth = this.wireframeLinewidth, e.wireframeLinecap = this.wireframeLinecap, e.wireframeLinejoin = this.wireframeLinejoin, e.vertexColors = this.vertexColors, e.skinning = this.skinning, e.morphTargets = this.morphTargets, e.morphNormals = this.morphNormals, e
    }, THREE.MeshPhongMaterial = function(e) {
        THREE.Material.call(this), this.color = new THREE.Color(16777215), this.ambient = new THREE.Color(16777215), this.emissive = new THREE.Color(0), this.specular = new THREE.Color(1118481), this.shininess = 30, this.metal = !1, this.wrapAround = !1, this.wrapRGB = new THREE.Vector3(1, 1, 1), this.map = null, this.lightMap = null, this.bumpMap = null, this.bumpScale = 1, this.normalMap = null, this.normalScale = new THREE.Vector2(1, 1), this.specularMap = null, this.alphaMap = null, this.envMap = null, this.combine = THREE.MultiplyOperation, this.reflectivity = 1, this.refractionRatio = .98, this.fog = !0, this.shading = THREE.SmoothShading, this.wireframe = !1, this.wireframeLinewidth = 1, this.wireframeLinecap = "round", this.wireframeLinejoin = "round", this.vertexColors = THREE.NoColors, this.skinning = !1, this.morphTargets = !1, this.morphNormals = !1, this.setValues(e)
    }, THREE.MeshPhongMaterial.prototype = Object.create(THREE.Material.prototype), THREE.MeshPhongMaterial.prototype.clone = function() {
        var e = new THREE.MeshPhongMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.color.copy(this.color), e.ambient.copy(this.ambient), e.emissive.copy(this.emissive), e.specular.copy(this.specular), e.shininess = this.shininess, e.metal = this.metal, e.wrapAround = this.wrapAround, e.wrapRGB.copy(this.wrapRGB), e.map = this.map, e.lightMap = this.lightMap, e.bumpMap = this.bumpMap, e.bumpScale = this.bumpScale, e.normalMap = this.normalMap, e.normalScale.copy(this.normalScale), e.specularMap = this.specularMap, e.alphaMap = this.alphaMap, e.envMap = this.envMap, e.combine = this.combine, e.reflectivity = this.reflectivity, e.refractionRatio = this.refractionRatio, e.fog = this.fog, e.shading = this.shading, e.wireframe = this.wireframe, e.wireframeLinewidth = this.wireframeLinewidth, e.wireframeLinecap = this.wireframeLinecap, e.wireframeLinejoin = this.wireframeLinejoin, e.vertexColors = this.vertexColors, e.skinning = this.skinning, e.morphTargets = this.morphTargets, e.morphNormals = this.morphNormals, e
    }, THREE.MeshDepthMaterial = function(e) {
        THREE.Material.call(this), this.morphTargets = !1, this.wireframe = !1, this.wireframeLinewidth = 1, this.setValues(e)
    }, THREE.MeshDepthMaterial.prototype = Object.create(THREE.Material.prototype), THREE.MeshDepthMaterial.prototype.clone = function() {
        var e = new THREE.MeshDepthMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.wireframe = this.wireframe, e.wireframeLinewidth = this.wireframeLinewidth, e
    }, THREE.MeshNormalMaterial = function(e) {
        THREE.Material.call(this, e), this.shading = THREE.FlatShading, this.wireframe = !1, this.wireframeLinewidth = 1, this.morphTargets = !1, this.setValues(e)
    }, THREE.MeshNormalMaterial.prototype = Object.create(THREE.Material.prototype), THREE.MeshNormalMaterial.prototype.clone = function() {
        var e = new THREE.MeshNormalMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.shading = this.shading, e.wireframe = this.wireframe, e.wireframeLinewidth = this.wireframeLinewidth, e
    }, THREE.MeshFaceMaterial = function(e) {
        this.materials = e instanceof Array ? e : []
    }, THREE.MeshFaceMaterial.prototype.clone = function() {
        for (var e = new THREE.MeshFaceMaterial, t = 0; t < this.materials.length; t++) e.materials.push(this.materials[t].clone());
        return e
    }, THREE.PointCloudMaterial = function(e) {
        THREE.Material.call(this), this.color = new THREE.Color(16777215), this.map = null, this.size = 1, this.sizeAttenuation = !0, this.vertexColors = THREE.NoColors, this.fog = !0, this.setValues(e)
    }, THREE.PointCloudMaterial.prototype = Object.create(THREE.Material.prototype), THREE.PointCloudMaterial.prototype.clone = function() {
        var e = new THREE.PointCloudMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.color.copy(this.color), e.map = this.map, e.size = this.size, e.sizeAttenuation = this.sizeAttenuation, e.vertexColors = this.vertexColors, e.fog = this.fog, e
    }, THREE.ParticleBasicMaterial = function(e) {
        return console.warn("THREE.ParticleBasicMaterial has been renamed to THREE.PointCloudMaterial."), new THREE.PointCloudMaterial(e)
    }, THREE.ParticleSystemMaterial = function(e) {
        return console.warn("THREE.ParticleSystemMaterial has been renamed to THREE.PointCloudMaterial."), new THREE.PointCloudMaterial(e)
    }, THREE.ShaderMaterial = function(e) {
        THREE.Material.call(this), this.defines = {}, this.uniforms = {}, this.attributes = null, this.vertexShader = "void main() {\n	gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );\n}", this.fragmentShader = "void main() {\n	gl_FragColor = vec4( 1.0, 0.0, 0.0, 1.0 );\n}", this.shading = THREE.SmoothShading, this.linewidth = 1, this.wireframe = !1, this.wireframeLinewidth = 1, this.fog = !1, this.lights = !1, this.vertexColors = THREE.NoColors, this.skinning = !1, this.morphTargets = !1, this.morphNormals = !1, this.defaultAttributeValues = {
            color: [1, 1, 1],
            uv: [0, 0],
            uv2: [0, 0]
        }, this.index0AttributeName = void 0, this.setValues(e)
    }, THREE.ShaderMaterial.prototype = Object.create(THREE.Material.prototype), THREE.ShaderMaterial.prototype.clone = function() {
        var e = new THREE.ShaderMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.fragmentShader = this.fragmentShader, e.vertexShader = this.vertexShader, e.uniforms = THREE.UniformsUtils.clone(this.uniforms), e.attributes = this.attributes, e.defines = this.defines, e.shading = this.shading, e.wireframe = this.wireframe, e.wireframeLinewidth = this.wireframeLinewidth, e.fog = this.fog, e.lights = this.lights, e.vertexColors = this.vertexColors, e.skinning = this.skinning, e.morphTargets = this.morphTargets, e.morphNormals = this.morphNormals, e
    }, THREE.RawShaderMaterial = function(e) {
        THREE.ShaderMaterial.call(this, e)
    }, THREE.RawShaderMaterial.prototype = Object.create(THREE.ShaderMaterial.prototype), THREE.RawShaderMaterial.prototype.clone = function() {
        var e = new THREE.RawShaderMaterial;
        return THREE.ShaderMaterial.prototype.clone.call(this, e), e
    }, THREE.SpriteMaterial = function(e) {
        THREE.Material.call(this), this.color = new THREE.Color(16777215), this.map = null, this.rotation = 0, this.fog = !1, this.setValues(e)
    }, THREE.SpriteMaterial.prototype = Object.create(THREE.Material.prototype), THREE.SpriteMaterial.prototype.clone = function() {
        var e = new THREE.SpriteMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.color.copy(this.color), e.map = this.map, e.rotation = this.rotation, e.fog = this.fog, e
    }, THREE.SpriteCanvasMaterial = function(e) {
        THREE.Material.call(this), this.color = new THREE.Color(16777215), this.program = function() {}, this.setValues(e)
    }, THREE.SpriteCanvasMaterial.prototype = Object.create(THREE.Material.prototype), THREE.SpriteCanvasMaterial.prototype.clone = function() {
        var e = new THREE.SpriteCanvasMaterial;
        return THREE.Material.prototype.clone.call(this, e), e.color.copy(this.color), e.program = this.program, e
    }, THREE.ParticleCanvasMaterial = THREE.SpriteCanvasMaterial, THREE.Texture = function(e, t, r, i, n, a, o, s, h) {
        this.id = THREE.TextureIdCount++, this.uuid = THREE.Math.generateUUID(), this.name = "", this.image = void 0 !== e ? e : THREE.Texture.DEFAULT_IMAGE, this.mipmaps = [], this.mapping = void 0 !== t ? t : THREE.Texture.DEFAULT_MAPPING, this.wrapS = void 0 !== r ? r : THREE.ClampToEdgeWrapping, this.wrapT = void 0 !== i ? i : THREE.ClampToEdgeWrapping, this.magFilter = void 0 !== n ? n : THREE.LinearFilter, this.minFilter = void 0 !== a ? a : THREE.LinearMipMapLinearFilter, this.anisotropy = void 0 !== h ? h : 1, this.format = void 0 !== o ? o : THREE.RGBAFormat, this.type = void 0 !== s ? s : THREE.UnsignedByteType, this.offset = new THREE.Vector2(0, 0), this.repeat = new THREE.Vector2(1, 1), this.generateMipmaps = !0, this.premultiplyAlpha = !1, this.flipY = !0, this.unpackAlignment = 4, this._needsUpdate = !1, this.onUpdate = null
    }, THREE.Texture.DEFAULT_IMAGE = void 0, THREE.Texture.DEFAULT_MAPPING = new THREE.UVMapping, THREE.Texture.prototype = {
        constructor: THREE.Texture,
        get needsUpdate() {
            return this._needsUpdate
        },
        set needsUpdate(e) {
            e === !0 && this.update(), this._needsUpdate = e
        },
        clone: function(e) {
            return void 0 === e && (e = new THREE.Texture), e.image = this.image, e.mipmaps = this.mipmaps.slice(0), e.mapping = this.mapping, e.wrapS = this.wrapS, e.wrapT = this.wrapT, e.magFilter = this.magFilter, e.minFilter = this.minFilter, e.anisotropy = this.anisotropy, e.format = this.format, e.type = this.type, e.offset.copy(this.offset), e.repeat.copy(this.repeat), e.generateMipmaps = this.generateMipmaps, e.premultiplyAlpha = this.premultiplyAlpha, e.flipY = this.flipY, e.unpackAlignment = this.unpackAlignment, e
        },
        update: function() {
            this.dispatchEvent({
                type: "update"
            })
        },
        dispose: function() {
            this.dispatchEvent({
                type: "dispose"
            })
        }
    }, THREE.EventDispatcher.prototype.apply(THREE.Texture.prototype), THREE.TextureIdCount = 0, THREE.CubeTexture = function(e, t, r, i, n, a, o, s, h) {
        THREE.Texture.call(this, e, t, r, i, n, a, o, s, h), this.images = e
    }, THREE.CubeTexture.prototype = Object.create(THREE.Texture.prototype), THREE.CubeTexture.clone = function(e) {
        return void 0 === e && (e = new THREE.CubeTexture), THREE.Texture.prototype.clone.call(this, e), e.images = this.images, e
    }, THREE.CompressedTexture = function(e, t, r, i, n, a, o, s, h, l, c) {
        THREE.Texture.call(this, null, a, o, s, h, l, i, n, c), this.image = {
            width: t,
            height: r
        }, this.mipmaps = e, this.generateMipmaps = !1
    }, THREE.CompressedTexture.prototype = Object.create(THREE.Texture.prototype), THREE.CompressedTexture.prototype.clone = function() {
        var e = new THREE.CompressedTexture;
        return THREE.Texture.prototype.clone.call(this, e), e
    }, THREE.DataTexture = function(e, t, r, i, n, a, o, s, h, l, c) {
        THREE.Texture.call(this, null, a, o, s, h, l, i, n, c), this.image = {
            data: e,
            width: t,
            height: r
        }
    }, THREE.DataTexture.prototype = Object.create(THREE.Texture.prototype), THREE.DataTexture.prototype.clone = function() {
        var e = new THREE.DataTexture;
        return THREE.Texture.prototype.clone.call(this, e), e
    }, THREE.PointCloud = function(e, t) {
        THREE.Object3D.call(this), this.geometry = void 0 !== e ? e : new THREE.Geometry, this.material = void 0 !== t ? t : new THREE.PointCloudMaterial({
            color: 16777215 * Math.random()
        }), this.sortParticles = !1
    }, THREE.PointCloud.prototype = Object.create(THREE.Object3D.prototype), THREE.PointCloud.prototype.raycast = function() {
        var e = new THREE.Matrix4,
            t = new THREE.Ray;
        return function(r, i) {
            var n = this,
                a = n.geometry,
                o = r.params.PointCloud.threshold;
            if (e.getInverse(this.matrixWorld), t.copy(r.ray).applyMatrix4(e), null === a.boundingBox || t.isIntersectionBox(a.boundingBox) !== !1) {
                var s = o / ((this.scale.x + this.scale.y + this.scale.z) / 3),
                    h = new THREE.Vector3,
                    l = function(e, a) {
                        var o = t.distanceToPoint(e);
                        if (s > o) {
                            var h = t.closestPointToPoint(e);
                            h.applyMatrix4(n.matrixWorld);
                            var l = r.ray.origin.distanceTo(h);
                            i.push({
                                distance: l,
                                distanceToRay: o,
                                point: h.clone(),
                                index: a,
                                face: null,
                                object: n
                            })
                        }
                    };
                if (a instanceof THREE.BufferGeometry) {
                    var c = a.attributes,
                        u = c.position.array;
                    if (void 0 !== c.index) {
                        var f = c.index.array,
                            E = a.offsets;
                        if (0 === E.length) {
                            var p = {
                                start: 0,
                                count: f.length,
                                index: 0
                            };
                            E = [p]
                        }
                        for (var d = 0, m = E.length; m > d; ++d)
                            for (var v = E[d].start, g = E[d].count, T = E[d].index, y = v, R = v + g; R > y; y++) {
                                var x = T + f[y];
                                h.set(u[3 * x], u[3 * x + 1], u[3 * x + 2]), l(h, x)
                            }
                    } else
                        for (var H = u.length / 3, y = 0; H > y; y++) h.set(u[3 * y], u[3 * y + 1], u[3 * y + 2]), l(h, y)
                } else
                    for (var b = this.geometry.vertices, y = 0; y < b.length; y++) l(b[y], y)
            }
        }
    }(), THREE.PointCloud.prototype.clone = function(e) {
        return void 0 === e && (e = new THREE.PointCloud(this.geometry, this.material)), e.sortParticles = this.sortParticles, THREE.Object3D.prototype.clone.call(this, e), e
    }, THREE.ParticleSystem = function(e, t) {
        return console.warn("THREE.ParticleSystem has been renamed to THREE.PointCloud."), new THREE.PointCloud(e, t)
    }, THREE.Line = function(e, t, r) {
        THREE.Object3D.call(this), this.geometry = void 0 !== e ? e : new THREE.Geometry, this.material = void 0 !== t ? t : new THREE.LineBasicMaterial({
            color: 16777215 * Math.random()
        }), this.type = void 0 !== r ? r : THREE.LineStrip
    }, THREE.LineStrip = 0, THREE.LinePieces = 1, THREE.Line.prototype = Object.create(THREE.Object3D.prototype), THREE.Line.prototype.raycast = function() {
        var e = new THREE.Matrix4,
            t = new THREE.Ray,
            r = new THREE.Sphere;
        return function(i, n) {
            var a = i.linePrecision,
                o = a * a,
                s = this.geometry;
            if (null === s.boundingSphere && s.computeBoundingSphere(), r.copy(s.boundingSphere), r.applyMatrix4(this.matrixWorld), i.ray.isIntersectionSphere(r) !== !1 && (e.getInverse(this.matrixWorld), t.copy(i.ray).applyMatrix4(e), s instanceof THREE.Geometry))
                for (var h = s.vertices, l = h.length, c = new THREE.Vector3, u = new THREE.Vector3, f = this.type === THREE.LineStrip ? 1 : 2, E = 0; l - 1 > E; E += f) {
                    var p = t.distanceSqToSegment(h[E], h[E + 1], u, c);
                    if (!(p > o)) {
                        var d = t.origin.distanceTo(u);
                        d < i.near || d > i.far || n.push({
                            distance: d,
                            point: c.clone().applyMatrix4(this.matrixWorld),
                            face: null,
                            faceIndex: null,
                            object: this
                        })
                    }
                }
        }
    }(), THREE.Line.prototype.clone = function(e) {
        return void 0 === e && (e = new THREE.Line(this.geometry, this.material, this.type)), THREE.Object3D.prototype.clone.call(this, e), e
    }, THREE.Mesh = function(e, t) {
        THREE.Object3D.call(this), this.geometry = void 0 !== e ? e : new THREE.Geometry, this.material = void 0 !== t ? t : new THREE.MeshBasicMaterial({
            color: 16777215 * Math.random()
        }), this.updateMorphTargets()
    }, THREE.Mesh.prototype = Object.create(THREE.Object3D.prototype), THREE.Mesh.prototype.updateMorphTargets = function() {
        if (void 0 !== this.geometry.morphTargets && this.geometry.morphTargets.length > 0) {
            this.morphTargetBase = -1, this.morphTargetForcedOrder = [], this.morphTargetInfluences = [], this.morphTargetDictionary = {};
            for (var e = 0, t = this.geometry.morphTargets.length; t > e; e++) this.morphTargetInfluences.push(0), this.morphTargetDictionary[this.geometry.morphTargets[e].name] = e
        }
    }, THREE.Mesh.prototype.getMorphTargetIndexByName = function(e) {
        return void 0 !== this.morphTargetDictionary[e] ? this.morphTargetDictionary[e] : (console.log("THREE.Mesh.getMorphTargetIndexByName: morph target " + e + " does not exist. Returning 0."), 0)
    }, THREE.Mesh.prototype.raycast = function() {
        var e = new THREE.Matrix4,
            t = new THREE.Ray,
            r = new THREE.Sphere,
            i = new THREE.Vector3,
            n = new THREE.Vector3,
            a = new THREE.Vector3;
        return function(o, s) {
            var h = this.geometry;
            if (null === h.boundingSphere && h.computeBoundingSphere(), r.copy(h.boundingSphere), r.applyMatrix4(this.matrixWorld), o.ray.isIntersectionSphere(r) !== !1 && (e.getInverse(this.matrixWorld), t.copy(o.ray).applyMatrix4(e), null === h.boundingBox || t.isIntersectionBox(h.boundingBox) !== !1))
                if (h instanceof THREE.BufferGeometry) {
                    var l = this.material;
                    if (void 0 === l) return;
                    var c, u, f, E = h.attributes,
                        p = o.precision;
                    if (void 0 !== E.index) {
                        var d = E.index.array,
                            m = E.position.array,
                            v = h.offsets;
                        0 === v.length && (v = [{
                            start: 0,
                            count: d.length,
                            index: 0
                        }]);
                        for (var g = 0, T = v.length; T > g; ++g)
                            for (var y = v[g].start, R = v[g].count, x = v[g].index, H = y, b = y + R; b > H; H += 3) {
                                if (c = x + d[H], u = x + d[H + 1], f = x + d[H + 2], i.set(m[3 * c], m[3 * c + 1], m[3 * c + 2]), n.set(m[3 * u], m[3 * u + 1], m[3 * u + 2]), a.set(m[3 * f], m[3 * f + 1], m[3 * f + 2]), l.side === THREE.BackSide) var _ = t.intersectTriangle(a, n, i, !0);
                                else var _ = t.intersectTriangle(i, n, a, l.side !== THREE.DoubleSide);
                                if (null !== _) {
                                    _.applyMatrix4(this.matrixWorld);
                                    var w = o.ray.origin.distanceTo(_);
                                    p > w || w < o.near || w > o.far || s.push({
                                        distance: w,
                                        point: _,
                                        indices: [c, u, f],
                                        face: null,
                                        faceIndex: null,
                                        object: this
                                    })
                                }
                            }
                    } else
                        for (var m = E.position.array, H = 0, M = 0, b = m.length; b > H; H += 3, M += 9) {
                            if (c = H, u = H + 1, f = H + 2, i.set(m[M], m[M + 1], m[M + 2]), n.set(m[M + 3], m[M + 4], m[M + 5]), a.set(m[M + 6], m[M + 7], m[M + 8]), l.side === THREE.BackSide) var _ = t.intersectTriangle(a, n, i, !0);
                            else var _ = t.intersectTriangle(i, n, a, l.side !== THREE.DoubleSide);
                            if (null !== _) {
                                _.applyMatrix4(this.matrixWorld);
                                var w = o.ray.origin.distanceTo(_);
                                p > w || w < o.near || w > o.far || s.push({
                                    distance: w,
                                    point: _,
                                    indices: [c, u, f],
                                    face: null,
                                    faceIndex: null,
                                    object: this
                                })
                            }
                        }
                } else if (h instanceof THREE.Geometry)
                for (var c, u, f, S = this.material instanceof THREE.MeshFaceMaterial, C = S === !0 ? this.material.materials : null, p = o.precision, A = h.vertices, L = 0, P = h.faces.length; P > L; L++) {
                    var F = h.faces[L],
                        l = S === !0 ? C[F.materialIndex] : this.material;
                    if (void 0 !== l) {
                        if (c = A[F.a], u = A[F.b], f = A[F.c], l.morphTargets === !0) {
                            var D = h.morphTargets,
                                U = this.morphTargetInfluences;
                            i.set(0, 0, 0), n.set(0, 0, 0), a.set(0, 0, 0);
                            for (var V = 0, z = D.length; z > V; V++) {
                                var B = U[V];
                                if (0 !== B) {
                                    var k = D[V].vertices;
                                    i.x += (k[F.a].x - c.x) * B, i.y += (k[F.a].y - c.y) * B, i.z += (k[F.a].z - c.z) * B, n.x += (k[F.b].x - u.x) * B, n.y += (k[F.b].y - u.y) * B, n.z += (k[F.b].z - u.z) * B, a.x += (k[F.c].x - f.x) * B, a.y += (k[F.c].y - f.y) * B, a.z += (k[F.c].z - f.z) * B
                                }
                            }
                            i.add(c), n.add(u), a.add(f), c = i, u = n, f = a
                        }
                        if (l.side === THREE.BackSide) var _ = t.intersectTriangle(f, u, c, !0);
                        else var _ = t.intersectTriangle(c, u, f, l.side !== THREE.DoubleSide);
                        if (null !== _) {
                            _.applyMatrix4(this.matrixWorld);
                            var w = o.ray.origin.distanceTo(_);
                            p > w || w < o.near || w > o.far || s.push({
                                distance: w,
                                point: _,
                                face: F,
                                faceIndex: L,
                                object: this
                            })
                        }
                    }
                }
        }
    }(), THREE.Mesh.prototype.clone = function(e, t) {
        return void 0 === e && (e = new THREE.Mesh(this.geometry, this.material)), THREE.Object3D.prototype.clone.call(this, e, t), e
    }, THREE.Bone = function(e) {
        THREE.Object3D.call(this), this.skin = e, this.accumulatedRotWeight = 0, this.accumulatedPosWeight = 0, this.accumulatedSclWeight = 0
    }, THREE.Bone.prototype = Object.create(THREE.Object3D.prototype), THREE.Bone.prototype.updateMatrixWorld = function(e) {
        THREE.Object3D.prototype.updateMatrixWorld.call(this, e), this.accumulatedRotWeight = 0, this.accumulatedPosWeight = 0, this.accumulatedSclWeight = 0
    }, THREE.Skeleton = function(e, t, r) {
        if (this.useVertexTexture = void 0 !== r ? r : !0, this.identityMatrix = new THREE.Matrix4, e = e || [], this.bones = e.slice(0), this.useVertexTexture) {
            var i;
            i = this.bones.length > 256 ? 64 : this.bones.length > 64 ? 32 : this.bones.length > 16 ? 16 : 8, this.boneTextureWidth = i, this.boneTextureHeight = i, this.boneMatrices = new Float32Array(this.boneTextureWidth * this.boneTextureHeight * 4), this.boneTexture = new THREE.DataTexture(this.boneMatrices, this.boneTextureWidth, this.boneTextureHeight, THREE.RGBAFormat, THREE.FloatType), this.boneTexture.minFilter = THREE.NearestFilter, this.boneTexture.magFilter = THREE.NearestFilter, this.boneTexture.generateMipmaps = !1, this.boneTexture.flipY = !1
        } else this.boneMatrices = new Float32Array(16 * this.bones.length);
        if (void 0 === t) this.calculateInverses();
        else if (this.bones.length === t.length) this.boneInverses = t.slice(0);
        else {
            console.warn("THREE.Skeleton bonInverses is the wrong length."), this.boneInverses = [];
            for (var n = 0, a = this.bones.length; a > n; n++) this.boneInverses.push(new THREE.Matrix4)
        }
    }, THREE.Skeleton.prototype.calculateInverses = function() {
        this.boneInverses = [];
        for (var e = 0, t = this.bones.length; t > e; e++) {
            var r = new THREE.Matrix4;
            this.bones[e] && r.getInverse(this.bones[e].matrixWorld), this.boneInverses.push(r)
        }
    }, THREE.Skeleton.prototype.pose = function() {
        for (var e, t = 0, r = this.bones.length; r > t; t++) e = this.bones[t], e && e.matrixWorld.getInverse(this.boneInverses[t]);
        for (var t = 0, r = this.bones.length; r > t; t++) e = this.bones[t], e && (e.parent ? (e.matrix.getInverse(e.parent.matrixWorld), e.matrix.multiply(e.matrixWorld)) : e.matrix.copy(e.matrixWorld), e.matrix.decompose(e.position, e.quaternion, e.scale))
    }, THREE.Skeleton.prototype.update = function() {
        for (var e = new THREE.Matrix4, t = 0, r = this.bones.length; r > t; t++) {
            var i = this.bones[t] ? this.bones[t].matrixWorld : this.identityMatrix;
            e.multiplyMatrices(i, this.boneInverses[t]), e.flattenToArrayOffset(this.boneMatrices, 16 * t)
        }
        this.useVertexTexture && (this.boneTexture.needsUpdate = !0)
    }, THREE.SkinnedMesh = function(e, t, r) {
        THREE.Mesh.call(this, e, t), this.bindMode = "attached", this.bindMatrix = new THREE.Matrix4, this.bindMatrixInverse = new THREE.Matrix4;
        var i = [];
        if (this.geometry && void 0 !== this.geometry.bones) {
            for (var n, a, o, s, h, l = 0, c = this.geometry.bones.length; c > l; ++l) a = this.geometry.bones[l], o = a.pos, s = a.rotq, h = a.scl, n = new THREE.Bone(this), i.push(n), n.name = a.name, n.position.set(o[0], o[1], o[2]), n.quaternion.set(s[0], s[1], s[2], s[3]), void 0 !== h ? n.scale.set(h[0], h[1], h[2]) : n.scale.set(1, 1, 1);
            for (var l = 0, c = this.geometry.bones.length; c > l; ++l) a = this.geometry.bones[l], -1 !== a.parent ? i[a.parent].add(i[l]) : this.add(i[l])
        }
        this.normalizeSkinWeights(), this.updateMatrixWorld(!0), this.bind(new THREE.Skeleton(i, void 0, r))
    }, THREE.SkinnedMesh.prototype = Object.create(THREE.Mesh.prototype), THREE.SkinnedMesh.prototype.bind = function(e, t) {
        this.skeleton = e, void 0 === t && (this.updateMatrixWorld(!0), t = this.matrixWorld), this.bindMatrix.copy(t), this.bindMatrixInverse.getInverse(t)
    }, THREE.SkinnedMesh.prototype.pose = function() {
        this.skeleton.pose()
    }, THREE.SkinnedMesh.prototype.normalizeSkinWeights = function() {
        if (this.geometry instanceof THREE.Geometry)
            for (var e = 0; e < this.geometry.skinIndices.length; e++) {
                var t = this.geometry.skinWeights[e],
                    r = 1 / t.lengthManhattan();
                1 / 0 !== r ? t.multiplyScalar(r) : t.set(1)
            }
    }, THREE.SkinnedMesh.prototype.updateMatrixWorld = function() {
        THREE.Mesh.prototype.updateMatrixWorld.call(this, !0), "attached" === this.bindMode ? this.bindMatrixInverse.getInverse(this.matrixWorld) : "detached" === this.bindMode ? this.bindMatrixInverse.getInverse(this.bindMatrix) : console.warn("THREE.SkinnedMesh unreckognized bindMode: " + this.bindMode)
    }, THREE.SkinnedMesh.prototype.clone = function(e) {
        return void 0 === e && (e = new THREE.SkinnedMesh(this.geometry, this.material, this.useVertexTexture)), THREE.Mesh.prototype.clone.call(this, e), e
    }, THREE.MorphAnimMesh = function(e, t) {
        THREE.Mesh.call(this, e, t), this.duration = 1e3, this.mirroredLoop = !1, this.time = 0, this.lastKeyframe = 0, this.currentKeyframe = 0, this.direction = 1, this.directionBackwards = !1, this.setFrameRange(0, this.geometry.morphTargets.length - 1)
    }, THREE.MorphAnimMesh.prototype = Object.create(THREE.Mesh.prototype), THREE.MorphAnimMesh.prototype.setFrameRange = function(e, t) {
        this.startKeyframe = e, this.endKeyframe = t, this.length = this.endKeyframe - this.startKeyframe + 1
    }, THREE.MorphAnimMesh.prototype.setDirectionForward = function() {
        this.direction = 1, this.directionBackwards = !1
    }, THREE.MorphAnimMesh.prototype.setDirectionBackward = function() {
        this.direction = -1, this.directionBackwards = !0
    }, THREE.MorphAnimMesh.prototype.parseAnimations = function() {
        var e = this.geometry;
        e.animations || (e.animations = {});
        for (var t, r = e.animations, i = /([a-z]+)_?(\d+)/, n = 0, a = e.morphTargets.length; a > n; n++) {
            var o = e.morphTargets[n],
                s = o.name.match(i);
            if (s && s.length > 1) {
                {
                    var h = s[1];
                    s[2]
                }
                r[h] || (r[h] = {
                    start: 1 / 0,
                    end: -1 / 0
                });
                var l = r[h];
                n < l.start && (l.start = n), n > l.end && (l.end = n), t || (t = h)
            }
        }
        e.firstAnimation = t
    }, THREE.MorphAnimMesh.prototype.setAnimationLabel = function(e, t, r) {
        this.geometry.animations || (this.geometry.animations = {}), this.geometry.animations[e] = {
            start: t,
            end: r
        }
    }, THREE.MorphAnimMesh.prototype.playAnimation = function(e, t) {
        var r = this.geometry.animations[e];
        r ? (this.setFrameRange(r.start, r.end), this.duration = 1e3 * ((r.end - r.start) / t), this.time = 0) : console.warn("animation[" + e + "] undefined")
    }, THREE.MorphAnimMesh.prototype.updateAnimation = function(e) {
        var t = this.duration / this.length;
        this.time += this.direction * e, this.mirroredLoop ? (this.time > this.duration || this.time < 0) && (this.direction *= -1, this.time > this.duration && (this.time = this.duration, this.directionBackwards = !0), this.time < 0 && (this.time = 0, this.directionBackwards = !1)) : (this.time = this.time % this.duration, this.time < 0 && (this.time += this.duration));
        var r = this.startKeyframe + THREE.Math.clamp(Math.floor(this.time / t), 0, this.length - 1);
        r !== this.currentKeyframe && (this.morphTargetInfluences[this.lastKeyframe] = 0, this.morphTargetInfluences[this.currentKeyframe] = 1, this.morphTargetInfluences[r] = 0, this.lastKeyframe = this.currentKeyframe, this.currentKeyframe = r);
        var i = this.time % t / t;
        this.directionBackwards && (i = 1 - i), this.morphTargetInfluences[this.currentKeyframe] = i, this.morphTargetInfluences[this.lastKeyframe] = 1 - i
    }, THREE.MorphAnimMesh.prototype.interpolateTargets = function(e, t, r) {
        for (var i = this.morphTargetInfluences, n = 0, a = i.length; a > n; n++) i[n] = 0;
        e > -1 && (i[e] = 1 - r), t > -1 && (i[t] = r)
    }, THREE.MorphAnimMesh.prototype.clone = function(e) {
        return void 0 === e && (e = new THREE.MorphAnimMesh(this.geometry, this.material)), e.duration = this.duration, e.mirroredLoop = this.mirroredLoop, e.time = this.time, e.lastKeyframe = this.lastKeyframe, e.currentKeyframe = this.currentKeyframe, e.direction = this.direction, e.directionBackwards = this.directionBackwards, THREE.Mesh.prototype.clone.call(this, e), e
    }, THREE.LOD = function() {
        THREE.Object3D.call(this), this.objects = []
    }, THREE.LOD.prototype = Object.create(THREE.Object3D.prototype), THREE.LOD.prototype.addLevel = function(e, t) {
        void 0 === t && (t = 0), t = Math.abs(t);
        for (var r = 0; r < this.objects.length && !(t < this.objects[r].distance); r++);
        this.objects.splice(r, 0, {
            distance: t,
            object: e
        }), this.add(e)
    }, THREE.LOD.prototype.getObjectForDistance = function(e) {
        for (var t = 1, r = this.objects.length; r > t && !(e < this.objects[t].distance); t++);
        return this.objects[t - 1].object
    }, THREE.LOD.prototype.raycast = function() {
        var e = new THREE.Vector3;
        return function(t, r) {
            e.setFromMatrixPosition(this.matrixWorld);
            var i = t.ray.origin.distanceTo(e);
            this.getObjectForDistance(i).raycast(t, r)
        }
    }(), THREE.LOD.prototype.update = function() {
        var e = new THREE.Vector3,
            t = new THREE.Vector3;
        return function(r) {
            if (this.objects.length > 1) {
                e.setFromMatrixPosition(r.matrixWorld), t.setFromMatrixPosition(this.matrixWorld);
                var i = e.distanceTo(t);
                this.objects[0].object.visible = !0;
                for (var n = 1, a = this.objects.length; a > n && i >= this.objects[n].distance; n++) this.objects[n - 1].object.visible = !1, this.objects[n].object.visible = !0;
                for (; a > n; n++) this.objects[n].object.visible = !1
            }
        }
    }(), THREE.LOD.prototype.clone = function(e) {
        void 0 === e && (e = new THREE.LOD), THREE.Object3D.prototype.clone.call(this, e);
        for (var t = 0, r = this.objects.length; r > t; t++) {
            var i = this.objects[t].object.clone();
            i.visible = 0 === t, e.addLevel(i, this.objects[t].distance)
        }
        return e
    }, THREE.Sprite = function() {
        var e = new Float32Array([-.5, -.5, 0, .5, -.5, 0, .5, .5, 0]),
            t = new THREE.BufferGeometry;
        return t.addAttribute("position", new THREE.BufferAttribute(e, 3)),
            function(e) {
                THREE.Object3D.call(this), this.geometry = t, this.material = void 0 !== e ? e : new THREE.SpriteMaterial
            }
    }(), THREE.Sprite.prototype = Object.create(THREE.Object3D.prototype), THREE.Sprite.prototype.raycast = function() {
        var e = new THREE.Vector3;
        return function(t, r) {
            e.setFromMatrixPosition(this.matrixWorld);
            var i = t.ray.distanceToPoint(e);
            i > this.scale.x || r.push({
                distance: i,
                point: this.position,
                face: null,
                object: this
            })
        }
    }(), THREE.Sprite.prototype.updateMatrix = function() {
        this.matrix.compose(this.position, this.quaternion, this.scale), this.matrixWorldNeedsUpdate = !0
    }, THREE.Sprite.prototype.clone = function(e) {
        return void 0 === e && (e = new THREE.Sprite(this.material)), THREE.Object3D.prototype.clone.call(this, e), e
    }, THREE.Particle = THREE.Sprite, THREE.Scene = function() {
        THREE.Object3D.call(this), this.fog = null, this.overrideMaterial = null, this.autoUpdate = !0, this.matrixAutoUpdate = !1, this.__lights = [], this.__objectsAdded = [], this.__objectsRemoved = []
    }, THREE.Scene.prototype = Object.create(THREE.Object3D.prototype), THREE.Scene.prototype.__addObject = function(e) {
        if (e instanceof THREE.Light) - 1 === this.__lights.indexOf(e) && this.__lights.push(e), e.target && void 0 === e.target.parent && this.add(e.target);
        else if (!(e instanceof THREE.Camera || e instanceof THREE.Bone)) {
            this.__objectsAdded.push(e);
            var t = this.__objectsRemoved.indexOf(e); - 1 !== t && this.__objectsRemoved.splice(t, 1)
        }
        this.dispatchEvent({
            type: "objectAdded",
            object: e
        }), e.dispatchEvent({
            type: "addedToScene",
            scene: this
        });
        for (var r = 0; r < e.children.length; r++) this.__addObject(e.children[r])
    }, THREE.Scene.prototype.__removeObject = function(e) {
        if (e instanceof THREE.Light) {
            var t = this.__lights.indexOf(e);
            if (-1 !== t && this.__lights.splice(t, 1), e.shadowCascadeArray)
                for (var r = 0; r < e.shadowCascadeArray.length; r++) this.__removeObject(e.shadowCascadeArray[r])
        } else if (!(e instanceof THREE.Camera)) {
            this.__objectsRemoved.push(e);
            var t = this.__objectsAdded.indexOf(e); - 1 !== t && this.__objectsAdded.splice(t, 1)
        }
        this.dispatchEvent({
            type: "objectRemoved",
            object: e
        }), e.dispatchEvent({
            type: "removedFromScene",
            scene: this
        });
        for (var i = 0; i < e.children.length; i++) this.__removeObject(e.children[i])
    }, THREE.Scene.prototype.clone = function(e) {
        return void 0 === e && (e = new THREE.Scene), THREE.Object3D.prototype.clone.call(this, e), null !== this.fog && (e.fog = this.fog.clone()), null !== this.overrideMaterial && (e.overrideMaterial = this.overrideMaterial.clone()), e.autoUpdate = this.autoUpdate, e.matrixAutoUpdate = this.matrixAutoUpdate, e
    }, THREE.Fog = function(e, t, r) {
        this.name = "", this.color = new THREE.Color(e), this.near = void 0 !== t ? t : 1, this.far = void 0 !== r ? r : 1e3
    }, THREE.Fog.prototype.clone = function() {
        return new THREE.Fog(this.color.getHex(), this.near, this.far)
    }, THREE.FogExp2 = function(e, t) {
        this.name = "", this.color = new THREE.Color(e), this.density = void 0 !== t ? t : 25e-5
    }, THREE.FogExp2.prototype.clone = function() {
        return new THREE.FogExp2(this.color.getHex(), this.density)
    }, THREE.CanvasRenderer = function(e) {
        function t() {
            gt.setRGB(0, 0, 0), Tt.setRGB(0, 0, 0), yt.setRGB(0, 0, 0);
            for (var e = 0, t = b.length; t > e; e++) {
                var r = b[e],
                    i = r.color;
                r instanceof THREE.AmbientLight ? gt.add(i) : r instanceof THREE.DirectionalLight ? Tt.add(i) : r instanceof THREE.PointLight && yt.add(i)
            }
        }

        function r(e, t, r) {
            for (var i = 0, n = b.length; n > i; i++) {
                var a = b[i];
                if (Et.copy(a.color), a instanceof THREE.DirectionalLight) {
                    var o = Rt.setFromMatrixPosition(a.matrixWorld).normalize(),
                        s = t.dot(o);
                    if (0 >= s) continue;
                    s *= a.intensity, r.add(Et.multiplyScalar(s))
                } else if (a instanceof THREE.PointLight) {
                    var o = Rt.setFromMatrixPosition(a.matrixWorld),
                        s = t.dot(Rt.subVectors(o, e).normalize());
                    if (0 >= s) continue;
                    if (s *= 0 == a.distance ? 1 : 1 - Math.min(e.distanceTo(o) / a.distance, 1), 0 == s) continue;
                    s *= a.intensity, r.add(Et.multiplyScalar(s))
                }
            }
        }

        function i(e, t, r) {
            E(r.opacity), p(r.blending);
            var i = t.scale.x * Y,
                n = t.scale.y * q,
                a = .5 * Math.sqrt(i * i + n * n);
            if (vt.min.set(e.x - a, e.y - a), vt.max.set(e.x + a, e.y + a), r instanceof THREE.SpriteMaterial) {
                var o = r.map;
                if (null !== o && void 0 !== o.image) {
                    o.hasEventListener("update", l) === !1 && (o.image.width > 0 && c(o), o.addEventListener("update", l));
                    var s = pt[o.id];
                    T(void 0 !== s ? s : "rgba( 0, 0, 0, 1 )");
                    var h = o.image,
                        u = h.width * o.offset.x,
                        f = h.height * o.offset.y,
                        d = h.width * o.repeat.x,
                        m = h.height * o.repeat.y,
                        v = i / d,
                        y = n / m;
                    $.save(), $.translate(e.x, e.y), 0 !== r.rotation && $.rotate(r.rotation), $.translate(-i / 2, -n / 2), $.scale(v, y), $.translate(-u, -f), $.fillRect(u, f, d, m), $.restore()
                } else T(r.color.getStyle()), $.save(), $.translate(e.x, e.y), 0 !== r.rotation && $.rotate(r.rotation), $.scale(i, -n), $.fillRect(-.5, -.5, 1, 1), $.restore()
            } else r instanceof THREE.SpriteCanvasMaterial && (g(r.color.getStyle()), T(r.color.getStyle()), $.save(), $.translate(e.x, e.y), 0 !== r.rotation && $.rotate(r.rotation), $.scale(i, n), r.program($), $.restore())
        }

        function n(e, t, r, i) {
            if (E(i.opacity), p(i.blending), $.beginPath(), $.moveTo(e.positionScreen.x, e.positionScreen.y), $.lineTo(t.positionScreen.x, t.positionScreen.y), i instanceof THREE.LineBasicMaterial) {
                if (d(i.linewidth), m(i.linecap), v(i.linejoin), i.vertexColors !== THREE.VertexColors) g(i.color.getStyle());
                else {
                    var n = r.vertexColors[0].getStyle(),
                        a = r.vertexColors[1].getStyle();
                    if (n === a) g(n);
                    else {
                        try {
                            var o = $.createLinearGradient(e.positionScreen.x, e.positionScreen.y, t.positionScreen.x, t.positionScreen.y);
                            o.addColorStop(0, n), o.addColorStop(1, a)
                        } catch (s) {
                            o = n
                        }
                        g(o)
                    }
                }
                $.stroke(), vt.expandByScalar(2 * i.linewidth)
            } else i instanceof THREE.LineDashedMaterial && (d(i.linewidth), m(i.linecap), v(i.linejoin), g(i.color.getStyle()), y([i.dashSize, i.gapSize]), $.stroke(), vt.expandByScalar(2 * i.linewidth), y([]))
        }

        function a(e, t, i, n, a, l, c, f) {
            I.info.render.vertices += 3, I.info.render.faces++, E(f.opacity), p(f.blending), C = e.positionScreen.x, A = e.positionScreen.y, L = t.positionScreen.x, P = t.positionScreen.y, F = i.positionScreen.x, D = i.positionScreen.y, o(C, A, L, P, F, D), (f instanceof THREE.MeshLambertMaterial || f instanceof THREE.MeshPhongMaterial) && null === f.map ? (ut.copy(f.color), ft.copy(f.emissive), f.vertexColors === THREE.FaceColors && ut.multiply(c.color), ct.copy(gt), xt.copy(e.positionWorld).add(t.positionWorld).add(i.positionWorld).divideScalar(3), r(xt, c.normalModel, ct), ct.multiply(ut).add(ft), f.wireframe === !0 ? s(ct, f.wireframeLinewidth, f.wireframeLinecap, f.wireframeLinejoin) : h(ct)) : f instanceof THREE.MeshBasicMaterial || f instanceof THREE.MeshLambertMaterial || f instanceof THREE.MeshPhongMaterial ? null !== f.map ? f.map.mapping instanceof THREE.UVMapping && (U = c.uvs, u(C, A, L, P, F, D, U[n].x, U[n].y, U[a].x, U[a].y, U[l].x, U[l].y, f.map)) : null !== f.envMap ? f.envMap.mapping instanceof THREE.SphericalReflectionMapping ? (Ht.copy(c.vertexNormalsModel[n]).applyMatrix3(bt), V = .5 * Ht.x + .5, z = .5 * Ht.y + .5, Ht.copy(c.vertexNormalsModel[a]).applyMatrix3(bt), B = .5 * Ht.x + .5, k = .5 * Ht.y + .5, Ht.copy(c.vertexNormalsModel[l]).applyMatrix3(bt), N = .5 * Ht.x + .5, O = .5 * Ht.y + .5, u(C, A, L, P, F, D, V, z, B, k, N, O, f.envMap)) : f.envMap.mapping instanceof THREE.SphericalRefractionMapping && (Ht.copy(c.vertexNormalsModel[n]).applyMatrix3(bt), V = -.5 * Ht.x + .5, z = -.5 * Ht.y + .5, Ht.copy(c.vertexNormalsModel[a]).applyMatrix3(bt), B = -.5 * Ht.x + .5, k = -.5 * Ht.y + .5, Ht.copy(c.vertexNormalsModel[l]).applyMatrix3(bt), N = -.5 * Ht.x + .5, O = -.5 * Ht.y + .5, u(C, A, L, P, F, D, V, z, B, k, N, O, f.envMap)) : (ct.copy(f.color), f.vertexColors === THREE.FaceColors && ct.multiply(c.color), f.wireframe === !0 ? s(ct, f.wireframeLinewidth, f.wireframeLinecap, f.wireframeLinejoin) : h(ct)) : f instanceof THREE.MeshDepthMaterial ? (ct.r = ct.g = ct.b = 1 - R(e.positionScreen.z * e.positionScreen.w, _.near, _.far), f.wireframe === !0 ? s(ct, f.wireframeLinewidth, f.wireframeLinecap, f.wireframeLinejoin) : h(ct)) : f instanceof THREE.MeshNormalMaterial ? (Ht.copy(c.normalModel).applyMatrix3(bt), ct.setRGB(Ht.x, Ht.y, Ht.z).multiplyScalar(.5).addScalar(.5), f.wireframe === !0 ? s(ct, f.wireframeLinewidth, f.wireframeLinecap, f.wireframeLinejoin) : h(ct)) : (ct.setRGB(1, 1, 1), f.wireframe === !0 ? s(ct, f.wireframeLinewidth, f.wireframeLinecap, f.wireframeLinejoin) : h(ct))
        }

        function o(e, t, r, i, n, a) {
            $.beginPath(), $.moveTo(e, t), $.lineTo(r, i), $.lineTo(n, a), $.closePath()
        }

        function s(e, t, r, i) {
            d(t), m(r), v(i), g(e.getStyle()), $.stroke(), vt.expandByScalar(2 * t)
        }

        function h(e) {
            T(e.getStyle()), $.fill()
        }

        function l(e) {
            c(e.target)
        }

        function c(e) {
            if (!(e instanceof THREE.CompressedTexture)) {
                var t = e.wrapS === THREE.RepeatWrapping,
                    r = e.wrapT === THREE.RepeatWrapping,
                    i = e.image,
                    n = document.createElement("canvas");
                n.width = i.width, n.height = i.height;
                var a = n.getContext("2d");
                a.setTransform(1, 0, 0, -1, 0, i.height), a.drawImage(i, 0, 0), pt[e.id] = $.createPattern(n, t === !0 && r === !0 ? "repeat" : t === !0 && r === !1 ? "repeat-x" : t === !1 && r === !0 ? "repeat-y" : "no-repeat")
            }
        }

        function u(e, t, r, i, n, a, o, s, h, u, f, E, p) {
            if (!(p instanceof THREE.DataTexture)) {
                p.hasEventListener("update", l) === !1 && (void 0 !== p.image && p.image.width > 0 && c(p), p.addEventListener("update", l));
                var d = pt[p.id];
                if (void 0 === d) return T("rgba(0,0,0,1)"), void $.fill();
                T(d);
                var m, v, g, y, R, x, H, b, _ = p.offset.x / p.repeat.x,
                    w = p.offset.y / p.repeat.y,
                    M = p.image.width * p.repeat.x,
                    S = p.image.height * p.repeat.y;
                o = (o + _) * M, s = (s + w) * S, h = (h + _) * M, u = (u + w) * S, f = (f + _) * M, E = (E + w) * S, r -= e, i -= t, n -= e, a -= t, h -= o, u -= s, f -= o, E -= s, H = h * E - f * u, 0 !== H && (b = 1 / H, m = (E * r - u * n) * b, v = (E * i - u * a) * b, g = (h * n - f * r) * b, y = (h * a - f * i) * b, R = e - m * o - g * s, x = t - v * o - y * s, $.save(), $.transform(m, v, g, y, R, x), $.fill(), $.restore())
            }
        }

        function f(e, t, r) {
            var i, n = t.x - e.x,
                a = t.y - e.y,
                o = n * n + a * a;
            0 !== o && (i = r / Math.sqrt(o), n *= i, a *= i, t.x += n, t.y += a, e.x -= n, e.y -= a)
        }

        function E(e) {
            rt !== e && ($.globalAlpha = e, rt = e)
        }

        function p(e) {
            it !== e && (e === THREE.NormalBlending ? $.globalCompositeOperation = "source-over" : e === THREE.AdditiveBlending ? $.globalCompositeOperation = "lighter" : e === THREE.SubtractiveBlending && ($.globalCompositeOperation = "darker"), it = e)
        }

        function d(e) {
            ot !== e && ($.lineWidth = e, ot = e)
        }

        function m(e) {
            st !== e && ($.lineCap = e, st = e)
        }

        function v(e) {
            ht !== e && ($.lineJoin = e, ht = e)
        }

        function g(e) {
            nt !== e && ($.strokeStyle = e, nt = e)
        }

        function T(e) {
            at !== e && ($.fillStyle = e, at = e)
        }

        function y(e) {
            lt.length !== e.length && ($.setLineDash(e), lt = e)
        }
        console.log("THREE.CanvasRenderer", THREE.REVISION);
        var R = THREE.Math.smoothstep;
        e = e || {};
        var x, H, b, _, w, M, S, C, A, L, P, F, D, U, V, z, B, k, N, O, I = this,
            G = new THREE.Projector,
            W = void 0 !== e.canvas ? e.canvas : document.createElement("canvas"),
            j = W.width,
            X = W.height,
            Y = Math.floor(j / 2),
            q = Math.floor(X / 2),
            K = 0,
            Z = 0,
            Q = j,
            J = X,
            $ = W.getContext("2d", {
                alpha: e.alpha === !0
            }),
            et = new THREE.Color(0),
            tt = 0,
            rt = 1,
            it = 0,
            nt = null,
            at = null,
            ot = null,
            st = null,
            ht = null,
            lt = [],
            ct = (new THREE.RenderableVertex, new THREE.RenderableVertex, new THREE.Color),
            ut = (new THREE.Color, new THREE.Color, new THREE.Color, new THREE.Color, new THREE.Color),
            ft = new THREE.Color,
            Et = new THREE.Color,
            pt = {},
            dt = new THREE.Box2,
            mt = new THREE.Box2,
            vt = new THREE.Box2,
            gt = new THREE.Color,
            Tt = new THREE.Color,
            yt = new THREE.Color,
            Rt = new THREE.Vector3,
            xt = new THREE.Vector3,
            Ht = new THREE.Vector3,
            bt = new THREE.Matrix3;
        void 0 === $.setLineDash && ($.setLineDash = function() {}), this.domElement = W, this.devicePixelRatio = void 0 !== e.devicePixelRatio ? e.devicePixelRatio : void 0 !== self.devicePixelRatio ? self.devicePixelRatio : 1, this.autoClear = !0, this.sortObjects = !0, this.sortElements = !0, this.info = {
            render: {
                vertices: 0,
                faces: 0
            }
        }, this.supportsVertexTextures = function() {}, this.setFaceCulling = function() {}, this.setSize = function(e, t, r) {
            j = e * this.devicePixelRatio, X = t * this.devicePixelRatio, W.width = j, W.height = X, Y = Math.floor(j / 2), q = Math.floor(X / 2), r !== !1 && (W.style.width = e + "px", W.style.height = t + "px"), dt.min.set(-Y, -q), dt.max.set(Y, q), mt.min.set(-Y, -q), mt.max.set(Y, q), rt = 1, it = 0, nt = null, at = null, ot = null, st = null, ht = null, this.setViewport(0, 0, e, t)
        }, this.setViewport = function(e, t, r, i) {
            K = e * this.devicePixelRatio, Z = t * this.devicePixelRatio, Q = r * this.devicePixelRatio, J = i * this.devicePixelRatio
        }, this.setScissor = function() {}, this.enableScissorTest = function() {}, this.setClearColor = function(e, t) {
            et.set(e), tt = void 0 !== t ? t : 1, mt.min.set(-Y, -q), mt.max.set(Y, q)
        }, this.setClearColorHex = function(e, t) {
            console.warn("THREE.CanvasRenderer: .setClearColorHex() is being removed. Use .setClearColor() instead."), this.setClearColor(e, t)
        }, this.getClearColor = function() {
            return et
        }, this.getClearAlpha = function() {
            return tt
        }, this.getMaxAnisotropy = function() {
            return 0
        }, this.clear = function() {
            mt.empty() === !1 && (mt.intersect(dt), mt.expandByScalar(2), mt.min.x = mt.min.x + Y, mt.min.y = -mt.min.y + q, mt.max.x = mt.max.x + Y, mt.max.y = -mt.max.y + q, 1 > tt && $.clearRect(0 | mt.min.x, 0 | mt.min.y, mt.max.x - mt.min.x | 0, mt.max.y - mt.min.y | 0), tt > 0 && (p(THREE.NormalBlending), E(1), T("rgba(" + Math.floor(255 * et.r) + "," + Math.floor(255 * et.g) + "," + Math.floor(255 * et.b) + "," + tt + ")"), $.fillRect(0 | mt.min.x, 0 | mt.min.y, mt.max.x - mt.min.x | 0, mt.max.y - mt.min.y | 0)), mt.makeEmpty())
        }, this.clearColor = function() {}, this.clearDepth = function() {}, this.clearStencil = function() {}, this.render = function(e, r) {
            if (r instanceof THREE.Camera == !1) return void console.error("THREE.CanvasRenderer.render: camera is not an instance of THREE.Camera.");
            this.autoClear === !0 && this.clear(), I.info.render.vertices = 0, I.info.render.faces = 0, $.setTransform(Q / j, 0, 0, -J / X, K, X - Z), $.translate(Y, q), x = G.projectScene(e, r, this.sortObjects, this.sortElements), H = x.elements, b = x.lights, _ = r, bt.getNormalMatrix(r.matrixWorldInverse), t();
            for (var o = 0, s = H.length; s > o; o++) {
                var h = H[o],
                    l = h.material;
                if (void 0 !== l && 0 !== l.opacity) {
                    if (vt.makeEmpty(), h instanceof THREE.RenderableSprite) w = h, w.x *= Y, w.y *= q, i(w, h, l);
                    else if (h instanceof THREE.RenderableLine) w = h.v1, M = h.v2, w.positionScreen.x *= Y, w.positionScreen.y *= q, M.positionScreen.x *= Y, M.positionScreen.y *= q, vt.setFromPoints([w.positionScreen, M.positionScreen]), dt.isIntersectionBox(vt) === !0 && n(w, M, h, l);
                    else if (h instanceof THREE.RenderableFace) {
                        if (w = h.v1, M = h.v2, S = h.v3, w.positionScreen.z < -1 || w.positionScreen.z > 1) continue;
                        if (M.positionScreen.z < -1 || M.positionScreen.z > 1) continue;
                        if (S.positionScreen.z < -1 || S.positionScreen.z > 1) continue;
                        w.positionScreen.x *= Y, w.positionScreen.y *= q, M.positionScreen.x *= Y, M.positionScreen.y *= q, S.positionScreen.x *= Y, S.positionScreen.y *= q, l.overdraw > 0 && (f(w.positionScreen, M.positionScreen, l.overdraw), f(M.positionScreen, S.positionScreen, l.overdraw), f(S.positionScreen, w.positionScreen, l.overdraw)), vt.setFromPoints([w.positionScreen, M.positionScreen, S.positionScreen]), dt.isIntersectionBox(vt) === !0 && a(w, M, S, 0, 1, 2, h, l)
                    }
                    mt.union(vt)
                }
            }
            $.setTransform(1, 0, 0, 1, 0, 0)
        }
    }, THREE.ShaderChunk = {}, THREE.ShaderChunk.alphatest_fragment = "#ifdef ALPHATEST\n\n	if ( gl_FragColor.a < ALPHATEST ) discard;\n\n#endif\n", THREE.ShaderChunk.lights_lambert_vertex = "vLightFront = vec3( 0.0 );\n\n#ifdef DOUBLE_SIDED\n\n	vLightBack = vec3( 0.0 );\n\n#endif\n\ntransformedNormal = normalize( transformedNormal );\n\n#if MAX_DIR_LIGHTS > 0\n\nfor( int i = 0; i < MAX_DIR_LIGHTS; i ++ ) {\n\n	vec4 lDirection = viewMatrix * vec4( directionalLightDirection[ i ], 0.0 );\n	vec3 dirVector = normalize( lDirection.xyz );\n\n	float dotProduct = dot( transformedNormal, dirVector );\n	vec3 directionalLightWeighting = vec3( max( dotProduct, 0.0 ) );\n\n	#ifdef DOUBLE_SIDED\n\n		vec3 directionalLightWeightingBack = vec3( max( -dotProduct, 0.0 ) );\n\n		#ifdef WRAP_AROUND\n\n			vec3 directionalLightWeightingHalfBack = vec3( max( -0.5 * dotProduct + 0.5, 0.0 ) );\n\n		#endif\n\n	#endif\n\n	#ifdef WRAP_AROUND\n\n		vec3 directionalLightWeightingHalf = vec3( max( 0.5 * dotProduct + 0.5, 0.0 ) );\n		directionalLightWeighting = mix( directionalLightWeighting, directionalLightWeightingHalf, wrapRGB );\n\n		#ifdef DOUBLE_SIDED\n\n			directionalLightWeightingBack = mix( directionalLightWeightingBack, directionalLightWeightingHalfBack, wrapRGB );\n\n		#endif\n\n	#endif\n\n	vLightFront += directionalLightColor[ i ] * directionalLightWeighting;\n\n	#ifdef DOUBLE_SIDED\n\n		vLightBack += directionalLightColor[ i ] * directionalLightWeightingBack;\n\n	#endif\n\n}\n\n#endif\n\n#if MAX_POINT_LIGHTS > 0\n\n	for( int i = 0; i < MAX_POINT_LIGHTS; i ++ ) {\n\n		vec4 lPosition = viewMatrix * vec4( pointLightPosition[ i ], 1.0 );\n		vec3 lVector = lPosition.xyz - mvPosition.xyz;\n\n		float lDistance = 1.0;\n		if ( pointLightDistance[ i ] > 0.0 )\n			lDistance = 1.0 - min( ( length( lVector ) / pointLightDistance[ i ] ), 1.0 );\n\n		lVector = normalize( lVector );\n		float dotProduct = dot( transformedNormal, lVector );\n\n		vec3 pointLightWeighting = vec3( max( dotProduct, 0.0 ) );\n\n		#ifdef DOUBLE_SIDED\n\n			vec3 pointLightWeightingBack = vec3( max( -dotProduct, 0.0 ) );\n\n			#ifdef WRAP_AROUND\n\n				vec3 pointLightWeightingHalfBack = vec3( max( -0.5 * dotProduct + 0.5, 0.0 ) );\n\n			#endif\n\n		#endif\n\n		#ifdef WRAP_AROUND\n\n			vec3 pointLightWeightingHalf = vec3( max( 0.5 * dotProduct + 0.5, 0.0 ) );\n			pointLightWeighting = mix( pointLightWeighting, pointLightWeightingHalf, wrapRGB );\n\n			#ifdef DOUBLE_SIDED\n\n				pointLightWeightingBack = mix( pointLightWeightingBack, pointLightWeightingHalfBack, wrapRGB );\n\n			#endif\n\n		#endif\n\n		vLightFront += pointLightColor[ i ] * pointLightWeighting * lDistance;\n\n		#ifdef DOUBLE_SIDED\n\n			vLightBack += pointLightColor[ i ] * pointLightWeightingBack * lDistance;\n\n		#endif\n\n	}\n\n#endif\n\n#if MAX_SPOT_LIGHTS > 0\n\n	for( int i = 0; i < MAX_SPOT_LIGHTS; i ++ ) {\n\n		vec4 lPosition = viewMatrix * vec4( spotLightPosition[ i ], 1.0 );\n		vec3 lVector = lPosition.xyz - mvPosition.xyz;\n\n		float spotEffect = dot( spotLightDirection[ i ], normalize( spotLightPosition[ i ] - worldPosition.xyz ) );\n\n		if ( spotEffect > spotLightAngleCos[ i ] ) {\n\n			spotEffect = max( pow( max( spotEffect, 0.0 ), spotLightExponent[ i ] ), 0.0 );\n\n			float lDistance = 1.0;\n			if ( spotLightDistance[ i ] > 0.0 )\n				lDistance = 1.0 - min( ( length( lVector ) / spotLightDistance[ i ] ), 1.0 );\n\n			lVector = normalize( lVector );\n\n			float dotProduct = dot( transformedNormal, lVector );\n			vec3 spotLightWeighting = vec3( max( dotProduct, 0.0 ) );\n\n			#ifdef DOUBLE_SIDED\n\n				vec3 spotLightWeightingBack = vec3( max( -dotProduct, 0.0 ) );\n\n				#ifdef WRAP_AROUND\n\n					vec3 spotLightWeightingHalfBack = vec3( max( -0.5 * dotProduct + 0.5, 0.0 ) );\n\n				#endif\n\n			#endif\n\n			#ifdef WRAP_AROUND\n\n				vec3 spotLightWeightingHalf = vec3( max( 0.5 * dotProduct + 0.5, 0.0 ) );\n				spotLightWeighting = mix( spotLightWeighting, spotLightWeightingHalf, wrapRGB );\n\n				#ifdef DOUBLE_SIDED\n\n					spotLightWeightingBack = mix( spotLightWeightingBack, spotLightWeightingHalfBack, wrapRGB );\n\n				#endif\n\n			#endif\n\n			vLightFront += spotLightColor[ i ] * spotLightWeighting * lDistance * spotEffect;\n\n			#ifdef DOUBLE_SIDED\n\n				vLightBack += spotLightColor[ i ] * spotLightWeightingBack * lDistance * spotEffect;\n\n			#endif\n\n		}\n\n	}\n\n#endif\n\n#if MAX_HEMI_LIGHTS > 0\n\n	for( int i = 0; i < MAX_HEMI_LIGHTS; i ++ ) {\n\n		vec4 lDirection = viewMatrix * vec4( hemisphereLightDirection[ i ], 0.0 );\n		vec3 lVector = normalize( lDirection.xyz );\n\n		float dotProduct = dot( transformedNormal, lVector );\n\n		float hemiDiffuseWeight = 0.5 * dotProduct + 0.5;\n		float hemiDiffuseWeightBack = -0.5 * dotProduct + 0.5;\n\n		vLightFront += mix( hemisphereLightGroundColor[ i ], hemisphereLightSkyColor[ i ], hemiDiffuseWeight );\n\n		#ifdef DOUBLE_SIDED\n\n			vLightBack += mix( hemisphereLightGroundColor[ i ], hemisphereLightSkyColor[ i ], hemiDiffuseWeightBack );\n\n		#endif\n\n	}\n\n#endif\n\nvLightFront = vLightFront * diffuse + ambient * ambientLightColor + emissive;\n\n#ifdef DOUBLE_SIDED\n\n	vLightBack = vLightBack * diffuse + ambient * ambientLightColor + emissive;\n\n#endif", THREE.ShaderChunk.map_particle_pars_fragment = "#ifdef USE_MAP\n\n	uniform sampler2D map;\n\n#endif", THREE.ShaderChunk.default_vertex = "vec4 mvPosition;\n\n#ifdef USE_SKINNING\n\n	mvPosition = modelViewMatrix * skinned;\n\n#endif\n\n#if !defined( USE_SKINNING ) && defined( USE_MORPHTARGETS )\n\n	mvPosition = modelViewMatrix * vec4( morphed, 1.0 );\n\n#endif\n\n#if !defined( USE_SKINNING ) && ! defined( USE_MORPHTARGETS )\n\n	mvPosition = modelViewMatrix * vec4( position, 1.0 );\n\n#endif\n\ngl_Position = projectionMatrix * mvPosition;", THREE.ShaderChunk.map_pars_fragment = "#if defined( USE_MAP ) || defined( USE_BUMPMAP ) || defined( USE_NORMALMAP ) || defined( USE_SPECULARMAP ) || defined( USE_ALPHAMAP )\n\n	varying vec2 vUv;\n\n#endif\n\n#ifdef USE_MAP\n\n	uniform sampler2D map;\n\n#endif", THREE.ShaderChunk.skinnormal_vertex = "#ifdef USE_SKINNING\n\n	mat4 skinMatrix = mat4( 0.0 );\n	skinMatrix += skinWeight.x * boneMatX;\n	skinMatrix += skinWeight.y * boneMatY;\n	skinMatrix += skinWeight.z * boneMatZ;\n	skinMatrix += skinWeight.w * boneMatW;\n	skinMatrix  = bindMatrixInverse * skinMatrix * bindMatrix;\n\n	#ifdef USE_MORPHNORMALS\n\n	vec4 skinnedNormal = skinMatrix * vec4( morphedNormal, 0.0 );\n\n	#else\n\n	vec4 skinnedNormal = skinMatrix * vec4( normal, 0.0 );\n\n	#endif\n\n#endif\n", THREE.ShaderChunk.logdepthbuf_pars_vertex = "#ifdef USE_LOGDEPTHBUF\n\n	#ifdef USE_LOGDEPTHBUF_EXT\n\n		varying float vFragDepth;\n\n	#endif\n\n	uniform float logDepthBufFC;\n\n#endif", THREE.ShaderChunk.lightmap_pars_vertex = "#ifdef USE_LIGHTMAP\n\n	varying vec2 vUv2;\n\n#endif", THREE.ShaderChunk.lights_phong_fragment = "vec3 normal = normalize( vNormal );\nvec3 viewPosition = normalize( vViewPosition );\n\n#ifdef DOUBLE_SIDED\n\n	normal = normal * ( -1.0 + 2.0 * float( gl_FrontFacing ) );\n\n#endif\n\n#ifdef USE_NORMALMAP\n\n	normal = perturbNormal2Arb( -vViewPosition, normal );\n\n#elif defined( USE_BUMPMAP )\n\n	normal = perturbNormalArb( -vViewPosition, normal, dHdxy_fwd() );\n\n#endif\n\n#if MAX_POINT_LIGHTS > 0\n\n	vec3 pointDiffuse = vec3( 0.0 );\n	vec3 pointSpecular = vec3( 0.0 );\n\n	for ( int i = 0; i < MAX_POINT_LIGHTS; i ++ ) {\n\n		vec4 lPosition = viewMatrix * vec4( pointLightPosition[ i ], 1.0 );\n		vec3 lVector = lPosition.xyz + vViewPosition.xyz;\n\n		float lDistance = 1.0;\n		if ( pointLightDistance[ i ] > 0.0 )\n			lDistance = 1.0 - min( ( length( lVector ) / pointLightDistance[ i ] ), 1.0 );\n\n		lVector = normalize( lVector );\n\n				// diffuse\n\n		float dotProduct = dot( normal, lVector );\n\n		#ifdef WRAP_AROUND\n\n			float pointDiffuseWeightFull = max( dotProduct, 0.0 );\n			float pointDiffuseWeightHalf = max( 0.5 * dotProduct + 0.5, 0.0 );\n\n			vec3 pointDiffuseWeight = mix( vec3( pointDiffuseWeightFull ), vec3( pointDiffuseWeightHalf ), wrapRGB );\n\n		#else\n\n			float pointDiffuseWeight = max( dotProduct, 0.0 );\n\n		#endif\n\n		pointDiffuse += diffuse * pointLightColor[ i ] * pointDiffuseWeight * lDistance;\n\n				// specular\n\n		vec3 pointHalfVector = normalize( lVector + viewPosition );\n		float pointDotNormalHalf = max( dot( normal, pointHalfVector ), 0.0 );\n		float pointSpecularWeight = specularStrength * max( pow( pointDotNormalHalf, shininess ), 0.0 );\n\n		float specularNormalization = ( shininess + 2.0 ) / 8.0;\n\n		vec3 schlick = specular + vec3( 1.0 - specular ) * pow( max( 1.0 - dot( lVector, pointHalfVector ), 0.0 ), 5.0 );\n		pointSpecular += schlick * pointLightColor[ i ] * pointSpecularWeight * pointDiffuseWeight * lDistance * specularNormalization;\n\n	}\n\n#endif\n\n#if MAX_SPOT_LIGHTS > 0\n\n	vec3 spotDiffuse = vec3( 0.0 );\n	vec3 spotSpecular = vec3( 0.0 );\n\n	for ( int i = 0; i < MAX_SPOT_LIGHTS; i ++ ) {\n\n		vec4 lPosition = viewMatrix * vec4( spotLightPosition[ i ], 1.0 );\n		vec3 lVector = lPosition.xyz + vViewPosition.xyz;\n\n		float lDistance = 1.0;\n		if ( spotLightDistance[ i ] > 0.0 )\n			lDistance = 1.0 - min( ( length( lVector ) / spotLightDistance[ i ] ), 1.0 );\n\n		lVector = normalize( lVector );\n\n		float spotEffect = dot( spotLightDirection[ i ], normalize( spotLightPosition[ i ] - vWorldPosition ) );\n\n		if ( spotEffect > spotLightAngleCos[ i ] ) {\n\n			spotEffect = max( pow( max( spotEffect, 0.0 ), spotLightExponent[ i ] ), 0.0 );\n\n					// diffuse\n\n			float dotProduct = dot( normal, lVector );\n\n			#ifdef WRAP_AROUND\n\n				float spotDiffuseWeightFull = max( dotProduct, 0.0 );\n				float spotDiffuseWeightHalf = max( 0.5 * dotProduct + 0.5, 0.0 );\n\n				vec3 spotDiffuseWeight = mix( vec3( spotDiffuseWeightFull ), vec3( spotDiffuseWeightHalf ), wrapRGB );\n\n			#else\n\n				float spotDiffuseWeight = max( dotProduct, 0.0 );\n\n			#endif\n\n			spotDiffuse += diffuse * spotLightColor[ i ] * spotDiffuseWeight * lDistance * spotEffect;\n\n					// specular\n\n			vec3 spotHalfVector = normalize( lVector + viewPosition );\n			float spotDotNormalHalf = max( dot( normal, spotHalfVector ), 0.0 );\n			float spotSpecularWeight = specularStrength * max( pow( spotDotNormalHalf, shininess ), 0.0 );\n\n			float specularNormalization = ( shininess + 2.0 ) / 8.0;\n\n			vec3 schlick = specular + vec3( 1.0 - specular ) * pow( max( 1.0 - dot( lVector, spotHalfVector ), 0.0 ), 5.0 );\n			spotSpecular += schlick * spotLightColor[ i ] * spotSpecularWeight * spotDiffuseWeight * lDistance * specularNormalization * spotEffect;\n\n		}\n\n	}\n\n#endif\n\n#if MAX_DIR_LIGHTS > 0\n\n	vec3 dirDiffuse = vec3( 0.0 );\n	vec3 dirSpecular = vec3( 0.0 );\n\n	for( int i = 0; i < MAX_DIR_LIGHTS; i ++ ) {\n\n		vec4 lDirection = viewMatrix * vec4( directionalLightDirection[ i ], 0.0 );\n		vec3 dirVector = normalize( lDirection.xyz );\n\n				// diffuse\n\n		float dotProduct = dot( normal, dirVector );\n\n		#ifdef WRAP_AROUND\n\n			float dirDiffuseWeightFull = max( dotProduct, 0.0 );\n			float dirDiffuseWeightHalf = max( 0.5 * dotProduct + 0.5, 0.0 );\n\n			vec3 dirDiffuseWeight = mix( vec3( dirDiffuseWeightFull ), vec3( dirDiffuseWeightHalf ), wrapRGB );\n\n		#else\n\n			float dirDiffuseWeight = max( dotProduct, 0.0 );\n\n		#endif\n\n		dirDiffuse += diffuse * directionalLightColor[ i ] * dirDiffuseWeight;\n\n		// specular\n\n		vec3 dirHalfVector = normalize( dirVector + viewPosition );\n		float dirDotNormalHalf = max( dot( normal, dirHalfVector ), 0.0 );\n		float dirSpecularWeight = specularStrength * max( pow( dirDotNormalHalf, shininess ), 0.0 );\n\n		/*\n		// fresnel term from skin shader\n		const float F0 = 0.128;\n\n		float base = 1.0 - dot( viewPosition, dirHalfVector );\n		float exponential = pow( base, 5.0 );\n\n		float fresnel = exponential + F0 * ( 1.0 - exponential );\n		*/\n\n		/*\n		// fresnel term from fresnel shader\n		const float mFresnelBias = 0.08;\n		const float mFresnelScale = 0.3;\n		const float mFresnelPower = 5.0;\n\n		float fresnel = mFresnelBias + mFresnelScale * pow( 1.0 + dot( normalize( -viewPosition ), normal ), mFresnelPower );\n		*/\n\n		float specularNormalization = ( shininess + 2.0 ) / 8.0;\n\n		// 		dirSpecular += specular * directionalLightColor[ i ] * dirSpecularWeight * dirDiffuseWeight * specularNormalization * fresnel;\n\n		vec3 schlick = specular + vec3( 1.0 - specular ) * pow( max( 1.0 - dot( dirVector, dirHalfVector ), 0.0 ), 5.0 );\n		dirSpecular += schlick * directionalLightColor[ i ] * dirSpecularWeight * dirDiffuseWeight * specularNormalization;\n\n\n	}\n\n#endif\n\n#if MAX_HEMI_LIGHTS > 0\n\n	vec3 hemiDiffuse = vec3( 0.0 );\n	vec3 hemiSpecular = vec3( 0.0 );\n\n	for( int i = 0; i < MAX_HEMI_LIGHTS; i ++ ) {\n\n		vec4 lDirection = viewMatrix * vec4( hemisphereLightDirection[ i ], 0.0 );\n		vec3 lVector = normalize( lDirection.xyz );\n\n		// diffuse\n\n		float dotProduct = dot( normal, lVector );\n		float hemiDiffuseWeight = 0.5 * dotProduct + 0.5;\n\n		vec3 hemiColor = mix( hemisphereLightGroundColor[ i ], hemisphereLightSkyColor[ i ], hemiDiffuseWeight );\n\n		hemiDiffuse += diffuse * hemiColor;\n\n		// specular (sky light)\n\n		vec3 hemiHalfVectorSky = normalize( lVector + viewPosition );\n		float hemiDotNormalHalfSky = 0.5 * dot( normal, hemiHalfVectorSky ) + 0.5;\n		float hemiSpecularWeightSky = specularStrength * max( pow( max( hemiDotNormalHalfSky, 0.0 ), shininess ), 0.0 );\n\n		// specular (ground light)\n\n		vec3 lVectorGround = -lVector;\n\n		vec3 hemiHalfVectorGround = normalize( lVectorGround + viewPosition );\n		float hemiDotNormalHalfGround = 0.5 * dot( normal, hemiHalfVectorGround ) + 0.5;\n		float hemiSpecularWeightGround = specularStrength * max( pow( max( hemiDotNormalHalfGround, 0.0 ), shininess ), 0.0 );\n\n		float dotProductGround = dot( normal, lVectorGround );\n\n		float specularNormalization = ( shininess + 2.0 ) / 8.0;\n\n		vec3 schlickSky = specular + vec3( 1.0 - specular ) * pow( max( 1.0 - dot( lVector, hemiHalfVectorSky ), 0.0 ), 5.0 );\n		vec3 schlickGround = specular + vec3( 1.0 - specular ) * pow( max( 1.0 - dot( lVectorGround, hemiHalfVectorGround ), 0.0 ), 5.0 );\n		hemiSpecular += hemiColor * specularNormalization * ( schlickSky * hemiSpecularWeightSky * max( dotProduct, 0.0 ) + schlickGround * hemiSpecularWeightGround * max( dotProductGround, 0.0 ) );\n\n	}\n\n#endif\n\nvec3 totalDiffuse = vec3( 0.0 );\nvec3 totalSpecular = vec3( 0.0 );\n\n#if MAX_DIR_LIGHTS > 0\n\n	totalDiffuse += dirDiffuse;\n	totalSpecular += dirSpecular;\n\n#endif\n\n#if MAX_HEMI_LIGHTS > 0\n\n	totalDiffuse += hemiDiffuse;\n	totalSpecular += hemiSpecular;\n\n#endif\n\n#if MAX_POINT_LIGHTS > 0\n\n	totalDiffuse += pointDiffuse;\n	totalSpecular += pointSpecular;\n\n#endif\n\n#if MAX_SPOT_LIGHTS > 0\n\n	totalDiffuse += spotDiffuse;\n	totalSpecular += spotSpecular;\n\n#endif\n\n#ifdef METAL\n\n	gl_FragColor.xyz = gl_FragColor.xyz * ( emissive + totalDiffuse + ambientLightColor * ambient + totalSpecular );\n\n#else\n\n	gl_FragColor.xyz = gl_FragColor.xyz * ( emissive + totalDiffuse + ambientLightColor * ambient ) + totalSpecular;\n\n#endif", THREE.ShaderChunk.fog_pars_fragment = "#ifdef USE_FOG\n\n	uniform vec3 fogColor;\n\n	#ifdef FOG_EXP2\n\n		uniform float fogDensity;\n\n	#else\n\n		uniform float fogNear;\n		uniform float fogFar;\n	#endif\n\n#endif", THREE.ShaderChunk.morphnormal_vertex = "#ifdef USE_MORPHNORMALS\n\n	vec3 morphedNormal = vec3( 0.0 );\n\n	morphedNormal += ( morphNormal0 - normal ) * morphTargetInfluences[ 0 ];\n	morphedNormal += ( morphNormal1 - normal ) * morphTargetInfluences[ 1 ];\n	morphedNormal += ( morphNormal2 - normal ) * morphTargetInfluences[ 2 ];\n	morphedNormal += ( morphNormal3 - normal ) * morphTargetInfluences[ 3 ];\n\n	morphedNormal += normal;\n\n#endif", THREE.ShaderChunk.envmap_pars_fragment = "#ifdef USE_ENVMAP\n\n	uniform float reflectivity;\n	uniform samplerCube envMap;\n	uniform float flipEnvMap;\n	uniform int combine;\n\n	#if defined( USE_BUMPMAP ) || defined( USE_NORMALMAP )\n\n		uniform bool useRefract;\n		uniform float refractionRatio;\n\n	#else\n\n		varying vec3 vReflect;\n\n	#endif\n\n#endif", THREE.ShaderChunk.logdepthbuf_fragment = "#if defined(USE_LOGDEPTHBUF) && defined(USE_LOGDEPTHBUF_EXT)\n\n	gl_FragDepthEXT = log2(vFragDepth) * logDepthBufFC * 0.5;\n\n#endif", THREE.ShaderChunk.normalmap_pars_fragment = "#ifdef USE_NORMALMAP\n\n	uniform sampler2D normalMap;\n	uniform vec2 normalScale;\n\n			// Per-Pixel Tangent Space Normal Mapping\n			// http://hacksoflife.blogspot.ch/2009/11/per-pixel-tangent-space-normal-mapping.html\n\n	vec3 perturbNormal2Arb( vec3 eye_pos, vec3 surf_norm ) {\n\n		vec3 q0 = dFdx( eye_pos.xyz );\n		vec3 q1 = dFdy( eye_pos.xyz );\n		vec2 st0 = dFdx( vUv.st );\n		vec2 st1 = dFdy( vUv.st );\n\n		vec3 S = normalize( q0 * st1.t - q1 * st0.t );\n		vec3 T = normalize( -q0 * st1.s + q1 * st0.s );\n		vec3 N = normalize( surf_norm );\n\n		vec3 mapN = texture2D( normalMap, vUv ).xyz * 2.0 - 1.0;\n		mapN.xy = normalScale * mapN.xy;\n		mat3 tsn = mat3( S, T, N );\n		return normalize( tsn * mapN );\n\n	}\n\n#endif\n", THREE.ShaderChunk.lights_phong_pars_vertex = "#if MAX_SPOT_LIGHTS > 0 || defined( USE_BUMPMAP ) || defined( USE_ENVMAP )\n\n	varying vec3 vWorldPosition;\n\n#endif\n", THREE.ShaderChunk.lightmap_pars_fragment = "#ifdef USE_LIGHTMAP\n\n	varying vec2 vUv2;\n	uniform sampler2D lightMap;\n\n#endif", THREE.ShaderChunk.shadowmap_vertex = "#ifdef USE_SHADOWMAP\n\n	for( int i = 0; i < MAX_SHADOWS; i ++ ) {\n\n		vShadowCoord[ i ] = shadowMatrix[ i ] * worldPosition;\n\n	}\n\n#endif", THREE.ShaderChunk.lights_phong_vertex = "#if MAX_SPOT_LIGHTS > 0 || defined( USE_BUMPMAP ) || defined( USE_ENVMAP )\n\n	vWorldPosition = worldPosition.xyz;\n\n#endif", THREE.ShaderChunk.map_fragment = "#ifdef USE_MAP\n\n	vec4 texelColor = texture2D( map, vUv );\n\n	#ifdef GAMMA_INPUT\n\n		texelColor.xyz *= texelColor.xyz;\n\n	#endif\n\n	gl_FragColor = gl_FragColor * texelColor;\n\n#endif", THREE.ShaderChunk.lightmap_vertex = "#ifdef USE_LIGHTMAP\n\n	vUv2 = uv2;\n\n#endif", THREE.ShaderChunk.map_particle_fragment = "#ifdef USE_MAP\n\n	gl_FragColor = gl_FragColor * texture2D( map, vec2( gl_PointCoord.x, 1.0 - gl_PointCoord.y ) );\n\n#endif", THREE.ShaderChunk.color_pars_fragment = "#ifdef USE_COLOR\n\n	varying vec3 vColor;\n\n#endif\n", THREE.ShaderChunk.color_vertex = "#ifdef USE_COLOR\n\n	#ifdef GAMMA_INPUT\n\n		vColor = color * color;\n\n	#else\n\n		vColor = color;\n\n	#endif\n\n#endif", THREE.ShaderChunk.skinning_vertex = "#ifdef USE_SKINNING\n\n	#ifdef USE_MORPHTARGETS\n\n	vec4 skinVertex = bindMatrix * vec4( morphed, 1.0 );\n\n	#else\n\n	vec4 skinVertex = bindMatrix * vec4( position, 1.0 );\n\n	#endif\n\n	vec4 skinned = vec4( 0.0 );\n	skinned += boneMatX * skinVertex * skinWeight.x;\n	skinned += boneMatY * skinVertex * skinWeight.y;\n	skinned += boneMatZ * skinVertex * skinWeight.z;\n	skinned += boneMatW * skinVertex * skinWeight.w;\n	skinned  = bindMatrixInverse * skinned;\n\n#endif\n", THREE.ShaderChunk.envmap_pars_vertex = "#if defined( USE_ENVMAP ) && ! defined( USE_BUMPMAP ) && ! defined( USE_NORMALMAP )\n\n	varying vec3 vReflect;\n\n	uniform float refractionRatio;\n	uniform bool useRefract;\n\n#endif\n", THREE.ShaderChunk.linear_to_gamma_fragment = "#ifdef GAMMA_OUTPUT\n\n	gl_FragColor.xyz = sqrt( gl_FragColor.xyz );\n\n#endif", THREE.ShaderChunk.color_pars_vertex = "#ifdef USE_COLOR\n\n	varying vec3 vColor;\n\n#endif", THREE.ShaderChunk.lights_lambert_pars_vertex = "uniform vec3 ambient;\nuniform vec3 diffuse;\nuniform vec3 emissive;\n\nuniform vec3 ambientLightColor;\n\n#if MAX_DIR_LIGHTS > 0\n\n	uniform vec3 directionalLightColor[ MAX_DIR_LIGHTS ];\n	uniform vec3 directionalLightDirection[ MAX_DIR_LIGHTS ];\n\n#endif\n\n#if MAX_HEMI_LIGHTS > 0\n\n	uniform vec3 hemisphereLightSkyColor[ MAX_HEMI_LIGHTS ];\n	uniform vec3 hemisphereLightGroundColor[ MAX_HEMI_LIGHTS ];\n	uniform vec3 hemisphereLightDirection[ MAX_HEMI_LIGHTS ];\n\n#endif\n\n#if MAX_POINT_LIGHTS > 0\n\n	uniform vec3 pointLightColor[ MAX_POINT_LIGHTS ];\n	uniform vec3 pointLightPosition[ MAX_POINT_LIGHTS ];\n	uniform float pointLightDistance[ MAX_POINT_LIGHTS ];\n\n#endif\n\n#if MAX_SPOT_LIGHTS > 0\n\n	uniform vec3 spotLightColor[ MAX_SPOT_LIGHTS ];\n	uniform vec3 spotLightPosition[ MAX_SPOT_LIGHTS ];\n	uniform vec3 spotLightDirection[ MAX_SPOT_LIGHTS ];\n	uniform float spotLightDistance[ MAX_SPOT_LIGHTS ];\n	uniform float spotLightAngleCos[ MAX_SPOT_LIGHTS ];\n	uniform float spotLightExponent[ MAX_SPOT_LIGHTS ];\n\n#endif\n\n#ifdef WRAP_AROUND\n\n	uniform vec3 wrapRGB;\n\n#endif\n", THREE.ShaderChunk.map_pars_vertex = "#if defined( USE_MAP ) || defined( USE_BUMPMAP ) || defined( USE_NORMALMAP ) || defined( USE_SPECULARMAP ) || defined( USE_ALPHAMAP )\n\n	varying vec2 vUv;\n	uniform vec4 offsetRepeat;\n\n#endif\n", THREE.ShaderChunk.envmap_fragment = "#ifdef USE_ENVMAP\n\n	vec3 reflectVec;\n\n	#if defined( USE_BUMPMAP ) || defined( USE_NORMALMAP )\n\n		vec3 cameraToVertex = normalize( vWorldPosition - cameraPosition );\n\n		// http://en.wikibooks.org/wiki/GLSL_Programming/Applying_Matrix_Transformations\n		// Transforming Normal Vectors with the Inverse Transformation\n\n		vec3 worldNormal = normalize( vec3( vec4( normal, 0.0 ) * viewMatrix ) );\n\n		if ( useRefract ) {\n\n			reflectVec = refract( cameraToVertex, worldNormal, refractionRatio );\n\n		} else { \n\n			reflectVec = reflect( cameraToVertex, worldNormal );\n\n		}\n\n	#else\n\n		reflectVec = vReflect;\n\n	#endif\n\n	#ifdef DOUBLE_SIDED\n\n		float flipNormal = ( -1.0 + 2.0 * float( gl_FrontFacing ) );\n		vec4 cubeColor = textureCube( envMap, flipNormal * vec3( flipEnvMap * reflectVec.x, reflectVec.yz ) );\n\n	#else\n\n		vec4 cubeColor = textureCube( envMap, vec3( flipEnvMap * reflectVec.x, reflectVec.yz ) );\n\n	#endif\n\n	#ifdef GAMMA_INPUT\n\n		cubeColor.xyz *= cubeColor.xyz;\n\n	#endif\n\n	if ( combine == 1 ) {\n\n		gl_FragColor.xyz = mix( gl_FragColor.xyz, cubeColor.xyz, specularStrength * reflectivity );\n\n	} else if ( combine == 2 ) {\n\n		gl_FragColor.xyz += cubeColor.xyz * specularStrength * reflectivity;\n\n	} else {\n\n		gl_FragColor.xyz = mix( gl_FragColor.xyz, gl_FragColor.xyz * cubeColor.xyz, specularStrength * reflectivity );\n\n	}\n\n#endif", THREE.ShaderChunk.specularmap_pars_fragment = "#ifdef USE_SPECULARMAP\n\n	uniform sampler2D specularMap;\n\n#endif", THREE.ShaderChunk.logdepthbuf_vertex = "#ifdef USE_LOGDEPTHBUF\n\n	gl_Position.z = log2(max(1e-6, gl_Position.w + 1.0)) * logDepthBufFC;\n\n	#ifdef USE_LOGDEPTHBUF_EXT\n\n		vFragDepth = 1.0 + gl_Position.w;\n\n#else\n\n		gl_Position.z = (gl_Position.z - 1.0) * gl_Position.w;\n\n	#endif\n\n#endif", THREE.ShaderChunk.morphtarget_pars_vertex = "#ifdef USE_MORPHTARGETS\n\n	#ifndef USE_MORPHNORMALS\n\n	uniform float morphTargetInfluences[ 8 ];\n\n	#else\n\n	uniform float morphTargetInfluences[ 4 ];\n\n	#endif\n\n#endif", THREE.ShaderChunk.specularmap_fragment = "float specularStrength;\n\n#ifdef USE_SPECULARMAP\n\n	vec4 texelSpecular = texture2D( specularMap, vUv );\n	specularStrength = texelSpecular.r;\n\n#else\n\n	specularStrength = 1.0;\n\n#endif", THREE.ShaderChunk.fog_fragment = "#ifdef USE_FOG\n\n	#ifdef USE_LOGDEPTHBUF_EXT\n\n		float depth = gl_FragDepthEXT / gl_FragCoord.w;\n\n	#else\n\n		float depth = gl_FragCoord.z / gl_FragCoord.w;\n\n	#endif\n\n	#ifdef FOG_EXP2\n\n		const float LOG2 = 1.442695;\n		float fogFactor = exp2( - fogDensity * fogDensity * depth * depth * LOG2 );\n		fogFactor = 1.0 - clamp( fogFactor, 0.0, 1.0 );\n\n	#else\n\n		float fogFactor = smoothstep( fogNear, fogFar, depth );\n\n	#endif\n	\n	gl_FragColor = mix( gl_FragColor, vec4( fogColor, gl_FragColor.w ), fogFactor );\n\n#endif", THREE.ShaderChunk.bumpmap_pars_fragment = "#ifdef USE_BUMPMAP\n\n	uniform sampler2D bumpMap;\n	uniform float bumpScale;\n\n			// Derivative maps - bump mapping unparametrized surfaces by Morten Mikkelsen\n			//	http://mmikkelsen3d.blogspot.sk/2011/07/derivative-maps.html\n\n			// Evaluate the derivative of the height w.r.t. screen-space using forward differencing (listing 2)\n\n	vec2 dHdxy_fwd() {\n\n		vec2 dSTdx = dFdx( vUv );\n		vec2 dSTdy = dFdy( vUv );\n\n		float Hll = bumpScale * texture2D( bumpMap, vUv ).x;\n		float dBx = bumpScale * texture2D( bumpMap, vUv + dSTdx ).x - Hll;\n		float dBy = bumpScale * texture2D( bumpMap, vUv + dSTdy ).x - Hll;\n\n		return vec2( dBx, dBy );\n\n	}\n\n	vec3 perturbNormalArb( vec3 surf_pos, vec3 surf_norm, vec2 dHdxy ) {\n\n		vec3 vSigmaX = dFdx( surf_pos );\n		vec3 vSigmaY = dFdy( surf_pos );\n		vec3 vN = surf_norm;		// normalized\n\n		vec3 R1 = cross( vSigmaY, vN );\n		vec3 R2 = cross( vN, vSigmaX );\n\n		float fDet = dot( vSigmaX, R1 );\n\n		vec3 vGrad = sign( fDet ) * ( dHdxy.x * R1 + dHdxy.y * R2 );\n		return normalize( abs( fDet ) * surf_norm - vGrad );\n\n	}\n\n#endif", THREE.ShaderChunk.defaultnormal_vertex = "vec3 objectNormal;\n\n#ifdef USE_SKINNING\n\n	objectNormal = skinnedNormal.xyz;\n\n#endif\n\n#if !defined( USE_SKINNING ) && defined( USE_MORPHNORMALS )\n\n	objectNormal = morphedNormal;\n\n#endif\n\n#if !defined( USE_SKINNING ) && ! defined( USE_MORPHNORMALS )\n\n	objectNormal = normal;\n\n#endif\n\n#ifdef FLIP_SIDED\n\n	objectNormal = -objectNormal;\n\n#endif\n\nvec3 transformedNormal = normalMatrix * objectNormal;", THREE.ShaderChunk.lights_phong_pars_fragment = "uniform vec3 ambientLightColor;\n\n#if MAX_DIR_LIGHTS > 0\n\n	uniform vec3 directionalLightColor[ MAX_DIR_LIGHTS ];\n	uniform vec3 directionalLightDirection[ MAX_DIR_LIGHTS ];\n\n#endif\n\n#if MAX_HEMI_LIGHTS > 0\n\n	uniform vec3 hemisphereLightSkyColor[ MAX_HEMI_LIGHTS ];\n	uniform vec3 hemisphereLightGroundColor[ MAX_HEMI_LIGHTS ];\n	uniform vec3 hemisphereLightDirection[ MAX_HEMI_LIGHTS ];\n\n#endif\n\n#if MAX_POINT_LIGHTS > 0\n\n	uniform vec3 pointLightColor[ MAX_POINT_LIGHTS ];\n\n	uniform vec3 pointLightPosition[ MAX_POINT_LIGHTS ];\n	uniform float pointLightDistance[ MAX_POINT_LIGHTS ];\n\n#endif\n\n#if MAX_SPOT_LIGHTS > 0\n\n	uniform vec3 spotLightColor[ MAX_SPOT_LIGHTS ];\n	uniform vec3 spotLightPosition[ MAX_SPOT_LIGHTS ];\n	uniform vec3 spotLightDirection[ MAX_SPOT_LIGHTS ];\n	uniform float spotLightAngleCos[ MAX_SPOT_LIGHTS ];\n	uniform float spotLightExponent[ MAX_SPOT_LIGHTS ];\n\n	uniform float spotLightDistance[ MAX_SPOT_LIGHTS ];\n\n#endif\n\n#if MAX_SPOT_LIGHTS > 0 || defined( USE_BUMPMAP ) || defined( USE_ENVMAP )\n\n	varying vec3 vWorldPosition;\n\n#endif\n\n#ifdef WRAP_AROUND\n\n	uniform vec3 wrapRGB;\n\n#endif\n\nvarying vec3 vViewPosition;\nvarying vec3 vNormal;", THREE.ShaderChunk.skinbase_vertex = "#ifdef USE_SKINNING\n\n	mat4 boneMatX = getBoneMatrix( skinIndex.x );\n	mat4 boneMatY = getBoneMatrix( skinIndex.y );\n	mat4 boneMatZ = getBoneMatrix( skinIndex.z );\n	mat4 boneMatW = getBoneMatrix( skinIndex.w );\n\n#endif", THREE.ShaderChunk.map_vertex = "#if defined( USE_MAP ) || defined( USE_BUMPMAP ) || defined( USE_NORMALMAP ) || defined( USE_SPECULARMAP ) || defined( USE_ALPHAMAP )\n\n	vUv = uv * offsetRepeat.zw + offsetRepeat.xy;\n\n#endif", THREE.ShaderChunk.lightmap_fragment = "#ifdef USE_LIGHTMAP\n\n	gl_FragColor = gl_FragColor * texture2D( lightMap, vUv2 );\n\n#endif", THREE.ShaderChunk.shadowmap_pars_vertex = "#ifdef USE_SHADOWMAP\n\n	varying vec4 vShadowCoord[ MAX_SHADOWS ];\n	uniform mat4 shadowMatrix[ MAX_SHADOWS ];\n\n#endif", THREE.ShaderChunk.color_fragment = "#ifdef USE_COLOR\n\n	gl_FragColor = gl_FragColor * vec4( vColor, 1.0 );\n\n#endif", THREE.ShaderChunk.morphtarget_vertex = "#ifdef USE_MORPHTARGETS\n\n	vec3 morphed = vec3( 0.0 );\n	morphed += ( morphTarget0 - position ) * morphTargetInfluences[ 0 ];\n	morphed += ( morphTarget1 - position ) * morphTargetInfluences[ 1 ];\n	morphed += ( morphTarget2 - position ) * morphTargetInfluences[ 2 ];\n	morphed += ( morphTarget3 - position ) * morphTargetInfluences[ 3 ];\n\n	#ifndef USE_MORPHNORMALS\n\n	morphed += ( morphTarget4 - position ) * morphTargetInfluences[ 4 ];\n	morphed += ( morphTarget5 - position ) * morphTargetInfluences[ 5 ];\n	morphed += ( morphTarget6 - position ) * morphTargetInfluences[ 6 ];\n	morphed += ( morphTarget7 - position ) * morphTargetInfluences[ 7 ];\n\n	#endif\n\n	morphed += position;\n\n#endif", THREE.ShaderChunk.envmap_vertex = "#if defined( USE_ENVMAP ) && ! defined( USE_BUMPMAP ) && ! defined( USE_NORMALMAP )\n\n	vec3 worldNormal = mat3( modelMatrix[ 0 ].xyz, modelMatrix[ 1 ].xyz, modelMatrix[ 2 ].xyz ) * objectNormal;\n	worldNormal = normalize( worldNormal );\n\n	vec3 cameraToVertex = normalize( worldPosition.xyz - cameraPosition );\n\n	if ( useRefract ) {\n\n		vReflect = refract( cameraToVertex, worldNormal, refractionRatio );\n\n	} else {\n\n		vReflect = reflect( cameraToVertex, worldNormal );\n\n	}\n\n#endif", THREE.ShaderChunk.shadowmap_fragment = "#ifdef USE_SHADOWMAP\n\n	#ifdef SHADOWMAP_DEBUG\n\n		vec3 frustumColors[3];\n		frustumColors[0] = vec3( 1.0, 0.5, 0.0 );\n		frustumColors[1] = vec3( 0.0, 1.0, 0.8 );\n		frustumColors[2] = vec3( 0.0, 0.5, 1.0 );\n\n	#endif\n\n	#ifdef SHADOWMAP_CASCADE\n\n		int inFrustumCount = 0;\n\n	#endif\n\n	float fDepth;\n	vec3 shadowColor = vec3( 1.0 );\n\n	for( int i = 0; i < MAX_SHADOWS; i ++ ) {\n\n		vec3 shadowCoord = vShadowCoord[ i ].xyz / vShadowCoord[ i ].w;\n\n				// if ( something && something ) breaks ATI OpenGL shader compiler\n				// if ( all( something, something ) ) using this instead\n\n		bvec4 inFrustumVec = bvec4 ( shadowCoord.x >= 0.0, shadowCoord.x <= 1.0, shadowCoord.y >= 0.0, shadowCoord.y <= 1.0 );\n		bool inFrustum = all( inFrustumVec );\n\n				// don't shadow pixels outside of light frustum\n				// use just first frustum (for cascades)\n				// don't shadow pixels behind far plane of light frustum\n\n		#ifdef SHADOWMAP_CASCADE\n\n			inFrustumCount += int( inFrustum );\n			bvec3 frustumTestVec = bvec3( inFrustum, inFrustumCount == 1, shadowCoord.z <= 1.0 );\n\n		#else\n\n			bvec2 frustumTestVec = bvec2( inFrustum, shadowCoord.z <= 1.0 );\n\n		#endif\n\n		bool frustumTest = all( frustumTestVec );\n\n		if ( frustumTest ) {\n\n			shadowCoord.z += shadowBias[ i ];\n\n			#if defined( SHADOWMAP_TYPE_PCF )\n\n						// Percentage-close filtering\n						// (9 pixel kernel)\n						// http://fabiensanglard.net/shadowmappingPCF/\n\n				float shadow = 0.0;\n\n		/*\n						// nested loops breaks shader compiler / validator on some ATI cards when using OpenGL\n						// must enroll loop manually\n\n				for ( float y = -1.25; y <= 1.25; y += 1.25 )\n					for ( float x = -1.25; x <= 1.25; x += 1.25 ) {\n\n						vec4 rgbaDepth = texture2D( shadowMap[ i ], vec2( x * xPixelOffset, y * yPixelOffset ) + shadowCoord.xy );\n\n								// doesn't seem to produce any noticeable visual difference compared to simple texture2D lookup\n								//vec4 rgbaDepth = texture2DProj( shadowMap[ i ], vec4( vShadowCoord[ i ].w * ( vec2( x * xPixelOffset, y * yPixelOffset ) + shadowCoord.xy ), 0.05, vShadowCoord[ i ].w ) );\n\n						float fDepth = unpackDepth( rgbaDepth );\n\n						if ( fDepth < shadowCoord.z )\n							shadow += 1.0;\n\n				}\n\n				shadow /= 9.0;\n\n		*/\n\n				const float shadowDelta = 1.0 / 9.0;\n\n				float xPixelOffset = 1.0 / shadowMapSize[ i ].x;\n				float yPixelOffset = 1.0 / shadowMapSize[ i ].y;\n\n				float dx0 = -1.25 * xPixelOffset;\n				float dy0 = -1.25 * yPixelOffset;\n				float dx1 = 1.25 * xPixelOffset;\n				float dy1 = 1.25 * yPixelOffset;\n\n				fDepth = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx0, dy0 ) ) );\n				if ( fDepth < shadowCoord.z ) shadow += shadowDelta;\n\n				fDepth = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( 0.0, dy0 ) ) );\n				if ( fDepth < shadowCoord.z ) shadow += shadowDelta;\n\n				fDepth = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx1, dy0 ) ) );\n				if ( fDepth < shadowCoord.z ) shadow += shadowDelta;\n\n				fDepth = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx0, 0.0 ) ) );\n				if ( fDepth < shadowCoord.z ) shadow += shadowDelta;\n\n				fDepth = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy ) );\n				if ( fDepth < shadowCoord.z ) shadow += shadowDelta;\n\n				fDepth = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx1, 0.0 ) ) );\n				if ( fDepth < shadowCoord.z ) shadow += shadowDelta;\n\n				fDepth = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx0, dy1 ) ) );\n				if ( fDepth < shadowCoord.z ) shadow += shadowDelta;\n\n				fDepth = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( 0.0, dy1 ) ) );\n				if ( fDepth < shadowCoord.z ) shadow += shadowDelta;\n\n				fDepth = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx1, dy1 ) ) );\n				if ( fDepth < shadowCoord.z ) shadow += shadowDelta;\n\n				shadowColor = shadowColor * vec3( ( 1.0 - shadowDarkness[ i ] * shadow ) );\n\n			#elif defined( SHADOWMAP_TYPE_PCF_SOFT )\n\n						// Percentage-close filtering\n						// (9 pixel kernel)\n						// http://fabiensanglard.net/shadowmappingPCF/\n\n				float shadow = 0.0;\n\n				float xPixelOffset = 1.0 / shadowMapSize[ i ].x;\n				float yPixelOffset = 1.0 / shadowMapSize[ i ].y;\n\n				float dx0 = -1.0 * xPixelOffset;\n				float dy0 = -1.0 * yPixelOffset;\n				float dx1 = 1.0 * xPixelOffset;\n				float dy1 = 1.0 * yPixelOffset;\n\n				mat3 shadowKernel;\n				mat3 depthKernel;\n\n				depthKernel[0][0] = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx0, dy0 ) ) );\n				depthKernel[0][1] = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx0, 0.0 ) ) );\n				depthKernel[0][2] = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx0, dy1 ) ) );\n				depthKernel[1][0] = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( 0.0, dy0 ) ) );\n				depthKernel[1][1] = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy ) );\n				depthKernel[1][2] = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( 0.0, dy1 ) ) );\n				depthKernel[2][0] = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx1, dy0 ) ) );\n				depthKernel[2][1] = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx1, 0.0 ) ) );\n				depthKernel[2][2] = unpackDepth( texture2D( shadowMap[ i ], shadowCoord.xy + vec2( dx1, dy1 ) ) );\n\n				vec3 shadowZ = vec3( shadowCoord.z );\n				shadowKernel[0] = vec3(lessThan(depthKernel[0], shadowZ ));\n				shadowKernel[0] *= vec3(0.25);\n\n				shadowKernel[1] = vec3(lessThan(depthKernel[1], shadowZ ));\n				shadowKernel[1] *= vec3(0.25);\n\n				shadowKernel[2] = vec3(lessThan(depthKernel[2], shadowZ ));\n				shadowKernel[2] *= vec3(0.25);\n\n				vec2 fractionalCoord = 1.0 - fract( shadowCoord.xy * shadowMapSize[i].xy );\n\n				shadowKernel[0] = mix( shadowKernel[1], shadowKernel[0], fractionalCoord.x );\n				shadowKernel[1] = mix( shadowKernel[2], shadowKernel[1], fractionalCoord.x );\n\n				vec4 shadowValues;\n				shadowValues.x = mix( shadowKernel[0][1], shadowKernel[0][0], fractionalCoord.y );\n				shadowValues.y = mix( shadowKernel[0][2], shadowKernel[0][1], fractionalCoord.y );\n				shadowValues.z = mix( shadowKernel[1][1], shadowKernel[1][0], fractionalCoord.y );\n				shadowValues.w = mix( shadowKernel[1][2], shadowKernel[1][1], fractionalCoord.y );\n\n				shadow = dot( shadowValues, vec4( 1.0 ) );\n\n				shadowColor = shadowColor * vec3( ( 1.0 - shadowDarkness[ i ] * shadow ) );\n\n			#else\n\n				vec4 rgbaDepth = texture2D( shadowMap[ i ], shadowCoord.xy );\n				float fDepth = unpackDepth( rgbaDepth );\n\n				if ( fDepth < shadowCoord.z )\n\n		// spot with multiple shadows is darker\n\n					shadowColor = shadowColor * vec3( 1.0 - shadowDarkness[ i ] );\n\n		// spot with multiple shadows has the same color as single shadow spot\n\n		// 					shadowColor = min( shadowColor, vec3( shadowDarkness[ i ] ) );\n\n			#endif\n\n		}\n\n\n		#ifdef SHADOWMAP_DEBUG\n\n			#ifdef SHADOWMAP_CASCADE\n\n				if ( inFrustum && inFrustumCount == 1 ) gl_FragColor.xyz *= frustumColors[ i ];\n\n			#else\n\n				if ( inFrustum ) gl_FragColor.xyz *= frustumColors[ i ];\n\n			#endif\n\n		#endif\n\n	}\n\n	#ifdef GAMMA_OUTPUT\n\n		shadowColor *= shadowColor;\n\n	#endif\n\n	gl_FragColor.xyz = gl_FragColor.xyz * shadowColor;\n\n#endif\n", THREE.ShaderChunk.worldpos_vertex = "#if defined( USE_ENVMAP ) || defined( PHONG ) || defined( LAMBERT ) || defined ( USE_SHADOWMAP )\n\n	#ifdef USE_SKINNING\n\n		vec4 worldPosition = modelMatrix * skinned;\n\n	#endif\n\n	#if defined( USE_MORPHTARGETS ) && ! defined( USE_SKINNING )\n\n		vec4 worldPosition = modelMatrix * vec4( morphed, 1.0 );\n\n	#endif\n\n	#if ! defined( USE_MORPHTARGETS ) && ! defined( USE_SKINNING )\n\n		vec4 worldPosition = modelMatrix * vec4( position, 1.0 );\n\n	#endif\n\n#endif", THREE.ShaderChunk.shadowmap_pars_fragment = "#ifdef USE_SHADOWMAP\n\n	uniform sampler2D shadowMap[ MAX_SHADOWS ];\n	uniform vec2 shadowMapSize[ MAX_SHADOWS ];\n\n	uniform float shadowDarkness[ MAX_SHADOWS ];\n	uniform float shadowBias[ MAX_SHADOWS ];\n\n	varying vec4 vShadowCoord[ MAX_SHADOWS ];\n\n	float unpackDepth( const in vec4 rgba_depth ) {\n\n		const vec4 bit_shift = vec4( 1.0 / ( 256.0 * 256.0 * 256.0 ), 1.0 / ( 256.0 * 256.0 ), 1.0 / 256.0, 1.0 );\n		float depth = dot( rgba_depth, bit_shift );\n		return depth;\n\n	}\n\n#endif", THREE.ShaderChunk.skinning_pars_vertex = "#ifdef USE_SKINNING\n\n	uniform mat4 bindMatrix;\n	uniform mat4 bindMatrixInverse;\n\n	#ifdef BONE_TEXTURE\n\n		uniform sampler2D boneTexture;\n		uniform int boneTextureWidth;\n		uniform int boneTextureHeight;\n\n		mat4 getBoneMatrix( const in float i ) {\n\n			float j = i * 4.0;\n			float x = mod( j, float( boneTextureWidth ) );\n			float y = floor( j / float( boneTextureWidth ) );\n\n			float dx = 1.0 / float( boneTextureWidth );\n			float dy = 1.0 / float( boneTextureHeight );\n\n			y = dy * ( y + 0.5 );\n\n			vec4 v1 = texture2D( boneTexture, vec2( dx * ( x + 0.5 ), y ) );\n			vec4 v2 = texture2D( boneTexture, vec2( dx * ( x + 1.5 ), y ) );\n			vec4 v3 = texture2D( boneTexture, vec2( dx * ( x + 2.5 ), y ) );\n			vec4 v4 = texture2D( boneTexture, vec2( dx * ( x + 3.5 ), y ) );\n\n			mat4 bone = mat4( v1, v2, v3, v4 );\n\n			return bone;\n\n		}\n\n	#else\n\n		uniform mat4 boneGlobalMatrices[ MAX_BONES ];\n\n		mat4 getBoneMatrix( const in float i ) {\n\n			mat4 bone = boneGlobalMatrices[ int(i) ];\n			return bone;\n\n		}\n\n	#endif\n\n#endif\n", THREE.ShaderChunk.logdepthbuf_pars_fragment = "#ifdef USE_LOGDEPTHBUF\n\n	uniform float logDepthBufFC;\n\n	#ifdef USE_LOGDEPTHBUF_EXT\n\n		#extension GL_EXT_frag_depth : enable\n		varying float vFragDepth;\n\n	#endif\n\n#endif", THREE.ShaderChunk.alphamap_fragment = "#ifdef USE_ALPHAMAP\n\n	gl_FragColor.a *= texture2D( alphaMap, vUv ).g;\n\n#endif\n", THREE.ShaderChunk.alphamap_pars_fragment = "#ifdef USE_ALPHAMAP\n\n	uniform sampler2D alphaMap;\n\n#endif\n", THREE.UniformsUtils = {
        merge: function(e) {
            var t, r, i, n = {};
            for (t = 0; t < e.length; t++) {
                i = this.clone(e[t]);
                for (r in i) n[r] = i[r]
            }
            return n
        },
        clone: function(e) {
            var t, r, i, n = {};
            for (t in e) {
                n[t] = {};
                for (r in e[t]) i = e[t][r], n[t][r] = i instanceof THREE.Color || i instanceof THREE.Vector2 || i instanceof THREE.Vector3 || i instanceof THREE.Vector4 || i instanceof THREE.Matrix4 || i instanceof THREE.Texture ? i.clone() : i instanceof Array ? i.slice() : i
            }
            return n
        }
    }, THREE.UniformsLib = {
        common: {
            diffuse: {
                type: "c",
                value: new THREE.Color(15658734)
            },
            opacity: {
                type: "f",
                value: 1
            },
            map: {
                type: "t",
                value: null
            },
            offsetRepeat: {
                type: "v4",
                value: new THREE.Vector4(0, 0, 1, 1)
            },
            lightMap: {
                type: "t",
                value: null
            },
            specularMap: {
                type: "t",
                value: null
            },
            alphaMap: {
                type: "t",
                value: null
            },
            envMap: {
                type: "t",
                value: null
            },
            flipEnvMap: {
                type: "f",
                value: -1
            },
            useRefract: {
                type: "i",
                value: 0
            },
            reflectivity: {
                type: "f",
                value: 1
            },
            refractionRatio: {
                type: "f",
                value: .98
            },
            combine: {
                type: "i",
                value: 0
            },
            morphTargetInfluences: {
                type: "f",
                value: 0
            }
        },
        bump: {
            bumpMap: {
                type: "t",
                value: null
            },
            bumpScale: {
                type: "f",
                value: 1
            }
        },
        normalmap: {
            normalMap: {
                type: "t",
                value: null
            },
            normalScale: {
                type: "v2",
                value: new THREE.Vector2(1, 1)
            }
        },
        fog: {
            fogDensity: {
                type: "f",
                value: 25e-5
            },
            fogNear: {
                type: "f",
                value: 1
            },
            fogFar: {
                type: "f",
                value: 2e3
            },
            fogColor: {
                type: "c",
                value: new THREE.Color(16777215)
            }
        },
        lights: {
            ambientLightColor: {
                type: "fv",
                value: []
            },
            directionalLightDirection: {
                type: "fv",
                value: []
            },
            directionalLightColor: {
                type: "fv",
                value: []
            },
            hemisphereLightDirection: {
                type: "fv",
                value: []
            },
            hemisphereLightSkyColor: {
                type: "fv",
                value: []
            },
            hemisphereLightGroundColor: {
                type: "fv",
                value: []
            },
            pointLightColor: {
                type: "fv",
                value: []
            },
            pointLightPosition: {
                type: "fv",
                value: []
            },
            pointLightDistance: {
                type: "fv1",
                value: []
            },
            spotLightColor: {
                type: "fv",
                value: []
            },
            spotLightPosition: {
                type: "fv",
                value: []
            },
            spotLightDirection: {
                type: "fv",
                value: []
            },
            spotLightDistance: {
                type: "fv1",
                value: []
            },
            spotLightAngleCos: {
                type: "fv1",
                value: []
            },
            spotLightExponent: {
                type: "fv1",
                value: []
            }
        },
        particle: {
            psColor: {
                type: "c",
                value: new THREE.Color(15658734)
            },
            opacity: {
                type: "f",
                value: 1
            },
            size: {
                type: "f",
                value: 1
            },
            scale: {
                type: "f",
                value: 1
            },
            map: {
                type: "t",
                value: null
            },
            fogDensity: {
                type: "f",
                value: 25e-5
            },
            fogNear: {
                type: "f",
                value: 1
            },
            fogFar: {
                type: "f",
                value: 2e3
            },
            fogColor: {
                type: "c",
                value: new THREE.Color(16777215)
            }
        },
        shadowmap: {
            shadowMap: {
                type: "tv",
                value: []
            },
            shadowMapSize: {
                type: "v2v",
                value: []
            },
            shadowBias: {
                type: "fv1",
                value: []
            },
            shadowDarkness: {
                type: "fv1",
                value: []
            },
            shadowMatrix: {
                type: "m4v",
                value: []
            }
        }
    }, THREE.ShaderLib = {
        basic: {
            uniforms: THREE.UniformsUtils.merge([THREE.UniformsLib.common, THREE.UniformsLib.fog, THREE.UniformsLib.shadowmap]),
            vertexShader: [THREE.ShaderChunk.map_pars_vertex, THREE.ShaderChunk.lightmap_pars_vertex, THREE.ShaderChunk.envmap_pars_vertex, THREE.ShaderChunk.color_pars_vertex, THREE.ShaderChunk.morphtarget_pars_vertex, THREE.ShaderChunk.skinning_pars_vertex, THREE.ShaderChunk.shadowmap_pars_vertex, THREE.ShaderChunk.logdepthbuf_pars_vertex, "void main() {", THREE.ShaderChunk.map_vertex, THREE.ShaderChunk.lightmap_vertex, THREE.ShaderChunk.color_vertex, THREE.ShaderChunk.skinbase_vertex, "	#ifdef USE_ENVMAP", THREE.ShaderChunk.morphnormal_vertex, THREE.ShaderChunk.skinnormal_vertex, THREE.ShaderChunk.defaultnormal_vertex, "	#endif", THREE.ShaderChunk.morphtarget_vertex, THREE.ShaderChunk.skinning_vertex, THREE.ShaderChunk.default_vertex, THREE.ShaderChunk.logdepthbuf_vertex, THREE.ShaderChunk.worldpos_vertex, THREE.ShaderChunk.envmap_vertex, THREE.ShaderChunk.shadowmap_vertex, "}"].join("\n"),
            fragmentShader: ["uniform vec3 diffuse;", "uniform float opacity;", THREE.ShaderChunk.color_pars_fragment, THREE.ShaderChunk.map_pars_fragment, THREE.ShaderChunk.alphamap_pars_fragment, THREE.ShaderChunk.lightmap_pars_fragment, THREE.ShaderChunk.envmap_pars_fragment, THREE.ShaderChunk.fog_pars_fragment, THREE.ShaderChunk.shadowmap_pars_fragment, THREE.ShaderChunk.specularmap_pars_fragment, THREE.ShaderChunk.logdepthbuf_pars_fragment, "void main() {", "	gl_FragColor = vec4( diffuse, opacity );", THREE.ShaderChunk.logdepthbuf_fragment, THREE.ShaderChunk.map_fragment, THREE.ShaderChunk.alphamap_fragment, THREE.ShaderChunk.alphatest_fragment, THREE.ShaderChunk.specularmap_fragment, THREE.ShaderChunk.lightmap_fragment, THREE.ShaderChunk.color_fragment, THREE.ShaderChunk.envmap_fragment, THREE.ShaderChunk.shadowmap_fragment, THREE.ShaderChunk.linear_to_gamma_fragment, THREE.ShaderChunk.fog_fragment, "}"].join("\n")
        },
        lambert: {
            uniforms: THREE.UniformsUtils.merge([THREE.UniformsLib.common, THREE.UniformsLib.fog, THREE.UniformsLib.lights, THREE.UniformsLib.shadowmap, {
                ambient: {
                    type: "c",
                    value: new THREE.Color(16777215)
                },
                emissive: {
                    type: "c",
                    value: new THREE.Color(0)
                },
                wrapRGB: {
                    type: "v3",
                    value: new THREE.Vector3(1, 1, 1)
                }
            }]),
            vertexShader: ["#define LAMBERT", "varying vec3 vLightFront;", "#ifdef DOUBLE_SIDED", "	varying vec3 vLightBack;", "#endif", THREE.ShaderChunk.map_pars_vertex, THREE.ShaderChunk.lightmap_pars_vertex, THREE.ShaderChunk.envmap_pars_vertex, THREE.ShaderChunk.lights_lambert_pars_vertex, THREE.ShaderChunk.color_pars_vertex, THREE.ShaderChunk.morphtarget_pars_vertex, THREE.ShaderChunk.skinning_pars_vertex, THREE.ShaderChunk.shadowmap_pars_vertex, THREE.ShaderChunk.logdepthbuf_pars_vertex, "void main() {", THREE.ShaderChunk.map_vertex, THREE.ShaderChunk.lightmap_vertex, THREE.ShaderChunk.color_vertex, THREE.ShaderChunk.morphnormal_vertex, THREE.ShaderChunk.skinbase_vertex, THREE.ShaderChunk.skinnormal_vertex, THREE.ShaderChunk.defaultnormal_vertex, THREE.ShaderChunk.morphtarget_vertex, THREE.ShaderChunk.skinning_vertex, THREE.ShaderChunk.default_vertex, THREE.ShaderChunk.logdepthbuf_vertex, THREE.ShaderChunk.worldpos_vertex, THREE.ShaderChunk.envmap_vertex, THREE.ShaderChunk.lights_lambert_vertex, THREE.ShaderChunk.shadowmap_vertex, "}"].join("\n"),
            fragmentShader: ["uniform float opacity;", "varying vec3 vLightFront;", "#ifdef DOUBLE_SIDED", "	varying vec3 vLightBack;", "#endif", THREE.ShaderChunk.color_pars_fragment, THREE.ShaderChunk.map_pars_fragment, THREE.ShaderChunk.alphamap_pars_fragment, THREE.ShaderChunk.lightmap_pars_fragment, THREE.ShaderChunk.envmap_pars_fragment, THREE.ShaderChunk.fog_pars_fragment, THREE.ShaderChunk.shadowmap_pars_fragment, THREE.ShaderChunk.specularmap_pars_fragment, THREE.ShaderChunk.logdepthbuf_pars_fragment, "void main() {", "	gl_FragColor = vec4( vec3( 1.0 ), opacity );", THREE.ShaderChunk.logdepthbuf_fragment, THREE.ShaderChunk.map_fragment, THREE.ShaderChunk.alphamap_fragment, THREE.ShaderChunk.alphatest_fragment, THREE.ShaderChunk.specularmap_fragment, "	#ifdef DOUBLE_SIDED", "		if ( gl_FrontFacing )", "			gl_FragColor.xyz *= vLightFront;", "		else", "			gl_FragColor.xyz *= vLightBack;", "	#else", "		gl_FragColor.xyz *= vLightFront;", "	#endif", THREE.ShaderChunk.lightmap_fragment, THREE.ShaderChunk.color_fragment, THREE.ShaderChunk.envmap_fragment, THREE.ShaderChunk.shadowmap_fragment, THREE.ShaderChunk.linear_to_gamma_fragment, THREE.ShaderChunk.fog_fragment, "}"].join("\n")
        },
        phong: {
            uniforms: THREE.UniformsUtils.merge([THREE.UniformsLib.common, THREE.UniformsLib.bump, THREE.UniformsLib.normalmap, THREE.UniformsLib.fog, THREE.UniformsLib.lights, THREE.UniformsLib.shadowmap, {
                ambient: {
                    type: "c",
                    value: new THREE.Color(16777215)
                },
                emissive: {
                    type: "c",
                    value: new THREE.Color(0)
                },
                specular: {
                    type: "c",
                    value: new THREE.Color(1118481)
                },
                shininess: {
                    type: "f",
                    value: 30
                },
                wrapRGB: {
                    type: "v3",
                    value: new THREE.Vector3(1, 1, 1)
                }
            }]),
            vertexShader: ["#define PHONG", "varying vec3 vViewPosition;", "varying vec3 vNormal;", THREE.ShaderChunk.map_pars_vertex, THREE.ShaderChunk.lightmap_pars_vertex, THREE.ShaderChunk.envmap_pars_vertex, THREE.ShaderChunk.lights_phong_pars_vertex, THREE.ShaderChunk.color_pars_vertex, THREE.ShaderChunk.morphtarget_pars_vertex, THREE.ShaderChunk.skinning_pars_vertex, THREE.ShaderChunk.shadowmap_pars_vertex, THREE.ShaderChunk.logdepthbuf_pars_vertex, "void main() {", THREE.ShaderChunk.map_vertex, THREE.ShaderChunk.lightmap_vertex, THREE.ShaderChunk.color_vertex, THREE.ShaderChunk.morphnormal_vertex, THREE.ShaderChunk.skinbase_vertex, THREE.ShaderChunk.skinnormal_vertex, THREE.ShaderChunk.defaultnormal_vertex, "	vNormal = normalize( transformedNormal );", THREE.ShaderChunk.morphtarget_vertex, THREE.ShaderChunk.skinning_vertex, THREE.ShaderChunk.default_vertex, THREE.ShaderChunk.logdepthbuf_vertex, "	vViewPosition = -mvPosition.xyz;", THREE.ShaderChunk.worldpos_vertex, THREE.ShaderChunk.envmap_vertex, THREE.ShaderChunk.lights_phong_vertex, THREE.ShaderChunk.shadowmap_vertex, "}"].join("\n"),
            fragmentShader: ["uniform vec3 diffuse;", "uniform float opacity;", "uniform vec3 ambient;", "uniform vec3 emissive;", "uniform vec3 specular;", "uniform float shininess;", THREE.ShaderChunk.color_pars_fragment, THREE.ShaderChunk.map_pars_fragment, THREE.ShaderChunk.alphamap_pars_fragment, THREE.ShaderChunk.lightmap_pars_fragment, THREE.ShaderChunk.envmap_pars_fragment, THREE.ShaderChunk.fog_pars_fragment, THREE.ShaderChunk.lights_phong_pars_fragment, THREE.ShaderChunk.shadowmap_pars_fragment, THREE.ShaderChunk.bumpmap_pars_fragment, THREE.ShaderChunk.normalmap_pars_fragment, THREE.ShaderChunk.specularmap_pars_fragment, THREE.ShaderChunk.logdepthbuf_pars_fragment, "void main() {", "	gl_FragColor = vec4( vec3( 1.0 ), opacity );", THREE.ShaderChunk.logdepthbuf_fragment, THREE.ShaderChunk.map_fragment, THREE.ShaderChunk.alphamap_fragment, THREE.ShaderChunk.alphatest_fragment, THREE.ShaderChunk.specularmap_fragment, THREE.ShaderChunk.lights_phong_fragment, THREE.ShaderChunk.lightmap_fragment, THREE.ShaderChunk.color_fragment, THREE.ShaderChunk.envmap_fragment, THREE.ShaderChunk.shadowmap_fragment, THREE.ShaderChunk.linear_to_gamma_fragment, THREE.ShaderChunk.fog_fragment, "}"].join("\n")
        },
        particle_basic: {
            uniforms: THREE.UniformsUtils.merge([THREE.UniformsLib.particle, THREE.UniformsLib.shadowmap]),
            vertexShader: ["uniform float size;", "uniform float scale;", THREE.ShaderChunk.color_pars_vertex, THREE.ShaderChunk.shadowmap_pars_vertex, THREE.ShaderChunk.logdepthbuf_pars_vertex, "void main() {", THREE.ShaderChunk.color_vertex, "	vec4 mvPosition = modelViewMatrix * vec4( position, 1.0 );", "	#ifdef USE_SIZEATTENUATION", "		gl_PointSize = size * ( scale / length( mvPosition.xyz ) );", "	#else", "		gl_PointSize = size;", "	#endif", "	gl_Position = projectionMatrix * mvPosition;", THREE.ShaderChunk.logdepthbuf_vertex, THREE.ShaderChunk.worldpos_vertex, THREE.ShaderChunk.shadowmap_vertex, "}"].join("\n"),
            fragmentShader: ["uniform vec3 psColor;", "uniform float opacity;", THREE.ShaderChunk.color_pars_fragment, THREE.ShaderChunk.map_particle_pars_fragment, THREE.ShaderChunk.fog_pars_fragment, THREE.ShaderChunk.shadowmap_pars_fragment, THREE.ShaderChunk.logdepthbuf_pars_fragment, "void main() {", "	gl_FragColor = vec4( psColor, opacity );", THREE.ShaderChunk.logdepthbuf_fragment, THREE.ShaderChunk.map_particle_fragment, THREE.ShaderChunk.alphatest_fragment, THREE.ShaderChunk.color_fragment, THREE.ShaderChunk.shadowmap_fragment, THREE.ShaderChunk.fog_fragment, "}"].join("\n")
        },
        dashed: {
            uniforms: THREE.UniformsUtils.merge([THREE.UniformsLib.common, THREE.UniformsLib.fog, {
                scale: {
                    type: "f",
                    value: 1
                },
                dashSize: {
                    type: "f",
                    value: 1
                },
                totalSize: {
                    type: "f",
                    value: 2
                }
            }]),
            vertexShader: ["uniform float scale;", "attribute float lineDistance;", "varying float vLineDistance;", THREE.ShaderChunk.color_pars_vertex, THREE.ShaderChunk.logdepthbuf_pars_vertex, "void main() {", THREE.ShaderChunk.color_vertex, "	vLineDistance = scale * lineDistance;", "	vec4 mvPosition = modelViewMatrix * vec4( position, 1.0 );", "	gl_Position = projectionMatrix * mvPosition;", THREE.ShaderChunk.logdepthbuf_vertex, "}"].join("\n"),
            fragmentShader: ["uniform vec3 diffuse;", "uniform float opacity;", "uniform float dashSize;", "uniform float totalSize;", "varying float vLineDistance;", THREE.ShaderChunk.color_pars_fragment, THREE.ShaderChunk.fog_pars_fragment, THREE.ShaderChunk.logdepthbuf_pars_fragment, "void main() {", "	if ( mod( vLineDistance, totalSize ) > dashSize ) {", "		discard;", "	}", "	gl_FragColor = vec4( diffuse, opacity );", THREE.ShaderChunk.logdepthbuf_fragment, THREE.ShaderChunk.color_fragment, THREE.ShaderChunk.fog_fragment, "}"].join("\n")
        },
        depth: {
            uniforms: {
                mNear: {
                    type: "f",
                    value: 1
                },
                mFar: {
                    type: "f",
                    value: 2e3
                },
                opacity: {
                    type: "f",
                    value: 1
                }
            },
            vertexShader: [THREE.ShaderChunk.morphtarget_pars_vertex, THREE.ShaderChunk.logdepthbuf_pars_vertex, "void main() {", THREE.ShaderChunk.morphtarget_vertex, THREE.ShaderChunk.default_vertex, THREE.ShaderChunk.logdepthbuf_vertex, "}"].join("\n"),
            fragmentShader: ["uniform float mNear;", "uniform float mFar;", "uniform float opacity;", THREE.ShaderChunk.logdepthbuf_pars_fragment, "void main() {", THREE.ShaderChunk.logdepthbuf_fragment, "	#ifdef USE_LOGDEPTHBUF_EXT", "		float depth = gl_FragDepthEXT / gl_FragCoord.w;", "	#else", "		float depth = gl_FragCoord.z / gl_FragCoord.w;", "	#endif", "	float color = 1.0 - smoothstep( mNear, mFar, depth );", "	gl_FragColor = vec4( vec3( color ), opacity );", "}"].join("\n")
        },
        normal: {
            uniforms: {
                opacity: {
                    type: "f",
                    value: 1
                }
            },
            vertexShader: ["varying vec3 vNormal;", THREE.ShaderChunk.morphtarget_pars_vertex, THREE.ShaderChunk.logdepthbuf_pars_vertex, "void main() {", "	vNormal = normalize( normalMatrix * normal );", THREE.ShaderChunk.morphtarget_vertex, THREE.ShaderChunk.default_vertex, THREE.ShaderChunk.logdepthbuf_vertex, "}"].join("\n"),
            fragmentShader: ["uniform float opacity;", "varying vec3 vNormal;", THREE.ShaderChunk.logdepthbuf_pars_fragment, "void main() {", "	gl_FragColor = vec4( 0.5 * normalize( vNormal ) + 0.5, opacity );", THREE.ShaderChunk.logdepthbuf_fragment, "}"].join("\n")
        },
        normalmap: {
            uniforms: THREE.UniformsUtils.merge([THREE.UniformsLib.fog, THREE.UniformsLib.lights, THREE.UniformsLib.shadowmap, {
                enableAO: {
                    type: "i",
                    value: 0
                },
                enableDiffuse: {
                    type: "i",
                    value: 0
                },
                enableSpecular: {
                    type: "i",
                    value: 0
                },
                enableReflection: {
                    type: "i",
                    value: 0
                },
                enableDisplacement: {
                    type: "i",
                    value: 0
                },
                tDisplacement: {
                    type: "t",
                    value: null
                },
                tDiffuse: {
                    type: "t",
                    value: null
                },
                tCube: {
                    type: "t",
                    value: null
                },
                tNormal: {
                    type: "t",
                    value: null
                },
                tSpecular: {
                    type: "t",
                    value: null
                },
                tAO: {
                    type: "t",
                    value: null
                },
                uNormalScale: {
                    type: "v2",
                    value: new THREE.Vector2(1, 1)
                },
                uDisplacementBias: {
                    type: "f",
                    value: 0
                },
                uDisplacementScale: {
                    type: "f",
                    value: 1
                },
                diffuse: {
                    type: "c",
                    value: new THREE.Color(16777215)
                },
                specular: {
                    type: "c",
                    value: new THREE.Color(1118481)
                },
                ambient: {
                    type: "c",
                    value: new THREE.Color(16777215)
                },
                shininess: {
                    type: "f",
                    value: 30
                },
                opacity: {
                    type: "f",
                    value: 1
                },
                useRefract: {
                    type: "i",
                    value: 0
                },
                refractionRatio: {
                    type: "f",
                    value: .98
                },
                reflectivity: {
                    type: "f",
                    value: .5
                },
                uOffset: {
                    type: "v2",
                    value: new THREE.Vector2(0, 0)
                },
                uRepeat: {
                    type: "v2",
                    value: new THREE.Vector2(1, 1)
                },
                wrapRGB: {
                    type: "v3",
                    value: new THREE.Vector3(1, 1, 1)
                }
            }]),
            fragmentShader: ["uniform vec3 ambient;", "uniform vec3 diffuse;", "uniform vec3 specular;", "uniform float shininess;", "uniform float opacity;", "uniform bool enableDiffuse;", "uniform bool enableSpecular;", "uniform bool enableAO;", "uniform bool enableReflection;", "uniform sampler2D tDiffuse;", "uniform sampler2D tNormal;", "uniform sampler2D tSpecular;", "uniform sampler2D tAO;", "uniform samplerCube tCube;", "uniform vec2 uNormalScale;", "uniform bool useRefract;", "uniform float refractionRatio;", "uniform float reflectivity;", "varying vec3 vTangent;", "varying vec3 vBinormal;", "varying vec3 vNormal;", "varying vec2 vUv;", "uniform vec3 ambientLightColor;", "#if MAX_DIR_LIGHTS > 0", "	uniform vec3 directionalLightColor[ MAX_DIR_LIGHTS ];", "	uniform vec3 directionalLightDirection[ MAX_DIR_LIGHTS ];", "#endif", "#if MAX_HEMI_LIGHTS > 0", "	uniform vec3 hemisphereLightSkyColor[ MAX_HEMI_LIGHTS ];", "	uniform vec3 hemisphereLightGroundColor[ MAX_HEMI_LIGHTS ];", "	uniform vec3 hemisphereLightDirection[ MAX_HEMI_LIGHTS ];", "#endif", "#if MAX_POINT_LIGHTS > 0", "	uniform vec3 pointLightColor[ MAX_POINT_LIGHTS ];", "	uniform vec3 pointLightPosition[ MAX_POINT_LIGHTS ];", "	uniform float pointLightDistance[ MAX_POINT_LIGHTS ];", "#endif", "#if MAX_SPOT_LIGHTS > 0", "	uniform vec3 spotLightColor[ MAX_SPOT_LIGHTS ];", "	uniform vec3 spotLightPosition[ MAX_SPOT_LIGHTS ];", "	uniform vec3 spotLightDirection[ MAX_SPOT_LIGHTS ];", "	uniform float spotLightAngleCos[ MAX_SPOT_LIGHTS ];", "	uniform float spotLightExponent[ MAX_SPOT_LIGHTS ];", "	uniform float spotLightDistance[ MAX_SPOT_LIGHTS ];", "#endif", "#ifdef WRAP_AROUND", "	uniform vec3 wrapRGB;", "#endif", "varying vec3 vWorldPosition;", "varying vec3 vViewPosition;", THREE.ShaderChunk.shadowmap_pars_fragment, THREE.ShaderChunk.fog_pars_fragment, THREE.ShaderChunk.logdepthbuf_pars_fragment, "void main() {", THREE.ShaderChunk.logdepthbuf_fragment, "	gl_FragColor = vec4( vec3( 1.0 ), opacity );", "	vec3 specularTex = vec3( 1.0 );", "	vec3 normalTex = texture2D( tNormal, vUv ).xyz * 2.0 - 1.0;", "	normalTex.xy *= uNormalScale;", "	normalTex = normalize( normalTex );", "	if( enableDiffuse ) {", "		#ifdef GAMMA_INPUT", "			vec4 texelColor = texture2D( tDiffuse, vUv );", "			texelColor.xyz *= texelColor.xyz;", "			gl_FragColor = gl_FragColor * texelColor;", "		#else", "			gl_FragColor = gl_FragColor * texture2D( tDiffuse, vUv );", "		#endif", "	}", "	if( enableAO ) {", "		#ifdef GAMMA_INPUT", "			vec4 aoColor = texture2D( tAO, vUv );", "			aoColor.xyz *= aoColor.xyz;", "			gl_FragColor.xyz = gl_FragColor.xyz * aoColor.xyz;", "		#else", "			gl_FragColor.xyz = gl_FragColor.xyz * texture2D( tAO, vUv ).xyz;", "		#endif", "	}", THREE.ShaderChunk.alphatest_fragment, "	if( enableSpecular )", "		specularTex = texture2D( tSpecular, vUv ).xyz;", "	mat3 tsb = mat3( normalize( vTangent ), normalize( vBinormal ), normalize( vNormal ) );", "	vec3 finalNormal = tsb * normalTex;", "	#ifdef FLIP_SIDED", "		finalNormal = -finalNormal;", "	#endif", "	vec3 normal = normalize( finalNormal );", "	vec3 viewPosition = normalize( vViewPosition );", "	#if MAX_POINT_LIGHTS > 0", "		vec3 pointDiffuse = vec3( 0.0 );", "		vec3 pointSpecular = vec3( 0.0 );", "		for ( int i = 0; i < MAX_POINT_LIGHTS; i ++ ) {", "			vec4 lPosition = viewMatrix * vec4( pointLightPosition[ i ], 1.0 );", "			vec3 pointVector = lPosition.xyz + vViewPosition.xyz;", "			float pointDistance = 1.0;", "			if ( pointLightDistance[ i ] > 0.0 )", "				pointDistance = 1.0 - min( ( length( pointVector ) / pointLightDistance[ i ] ), 1.0 );", "			pointVector = normalize( pointVector );", "			#ifdef WRAP_AROUND", "				float pointDiffuseWeightFull = max( dot( normal, pointVector ), 0.0 );", "				float pointDiffuseWeightHalf = max( 0.5 * dot( normal, pointVector ) + 0.5, 0.0 );", "				vec3 pointDiffuseWeight = mix( vec3( pointDiffuseWeightFull ), vec3( pointDiffuseWeightHalf ), wrapRGB );", "			#else", "				float pointDiffuseWeight = max( dot( normal, pointVector ), 0.0 );", "			#endif", "			pointDiffuse += pointDistance * pointLightColor[ i ] * diffuse * pointDiffuseWeight;", "			vec3 pointHalfVector = normalize( pointVector + viewPosition );", "			float pointDotNormalHalf = max( dot( normal, pointHalfVector ), 0.0 );", "			float pointSpecularWeight = specularTex.r * max( pow( pointDotNormalHalf, shininess ), 0.0 );", "			float specularNormalization = ( shininess + 2.0 ) / 8.0;", "			vec3 schlick = specular + vec3( 1.0 - specular ) * pow( max( 1.0 - dot( pointVector, pointHalfVector ), 0.0 ), 5.0 );", "			pointSpecular += schlick * pointLightColor[ i ] * pointSpecularWeight * pointDiffuseWeight * pointDistance * specularNormalization;", "		}", "	#endif", "	#if MAX_SPOT_LIGHTS > 0", "		vec3 spotDiffuse = vec3( 0.0 );", "		vec3 spotSpecular = vec3( 0.0 );", "		for ( int i = 0; i < MAX_SPOT_LIGHTS; i ++ ) {", "			vec4 lPosition = viewMatrix * vec4( spotLightPosition[ i ], 1.0 );", "			vec3 spotVector = lPosition.xyz + vViewPosition.xyz;", "			float spotDistance = 1.0;", "			if ( spotLightDistance[ i ] > 0.0 )", "				spotDistance = 1.0 - min( ( length( spotVector ) / spotLightDistance[ i ] ), 1.0 );", "			spotVector = normalize( spotVector );", "			float spotEffect = dot( spotLightDirection[ i ], normalize( spotLightPosition[ i ] - vWorldPosition ) );", "			if ( spotEffect > spotLightAngleCos[ i ] ) {", "				spotEffect = max( pow( max( spotEffect, 0.0 ), spotLightExponent[ i ] ), 0.0 );", "				#ifdef WRAP_AROUND", "					float spotDiffuseWeightFull = max( dot( normal, spotVector ), 0.0 );", "					float spotDiffuseWeightHalf = max( 0.5 * dot( normal, spotVector ) + 0.5, 0.0 );", "					vec3 spotDiffuseWeight = mix( vec3( spotDiffuseWeightFull ), vec3( spotDiffuseWeightHalf ), wrapRGB );", "				#else", "					float spotDiffuseWeight = max( dot( normal, spotVector ), 0.0 );", "				#endif", "				spotDiffuse += spotDistance * spotLightColor[ i ] * diffuse * spotDiffuseWeight * spotEffect;", "				vec3 spotHalfVector = normalize( spotVector + viewPosition );", "				float spotDotNormalHalf = max( dot( normal, spotHalfVector ), 0.0 );", "				float spotSpecularWeight = specularTex.r * max( pow( spotDotNormalHalf, shininess ), 0.0 );", "				float specularNormalization = ( shininess + 2.0 ) / 8.0;", "				vec3 schlick = specular + vec3( 1.0 - specular ) * pow( max( 1.0 - dot( spotVector, spotHalfVector ), 0.0 ), 5.0 );", "				spotSpecular += schlick * spotLightColor[ i ] * spotSpecularWeight * spotDiffuseWeight * spotDistance * specularNormalization * spotEffect;", "			}", "		}", "	#endif", "	#if MAX_DIR_LIGHTS > 0", "		vec3 dirDiffuse = vec3( 0.0 );", "		vec3 dirSpecular = vec3( 0.0 );", "		for( int i = 0; i < MAX_DIR_LIGHTS; i++ ) {", "			vec4 lDirection = viewMatrix * vec4( directionalLightDirection[ i ], 0.0 );", "			vec3 dirVector = normalize( lDirection.xyz );", "			#ifdef WRAP_AROUND", "				float directionalLightWeightingFull = max( dot( normal, dirVector ), 0.0 );", "				float directionalLightWeightingHalf = max( 0.5 * dot( normal, dirVector ) + 0.5, 0.0 );", "				vec3 dirDiffuseWeight = mix( vec3( directionalLightWeightingFull ), vec3( directionalLightWeightingHalf ), wrapRGB );", "			#else", "				float dirDiffuseWeight = max( dot( normal, dirVector ), 0.0 );", "			#endif", "			dirDiffuse += directionalLightColor[ i ] * diffuse * dirDiffuseWeight;", "			vec3 dirHalfVector = normalize( dirVector + viewPosition );", "			float dirDotNormalHalf = max( dot( normal, dirHalfVector ), 0.0 );", "			float dirSpecularWeight = specularTex.r * max( pow( dirDotNormalHalf, shininess ), 0.0 );", "			float specularNormalization = ( shininess + 2.0 ) / 8.0;", "			vec3 schlick = specular + vec3( 1.0 - specular ) * pow( max( 1.0 - dot( dirVector, dirHalfVector ), 0.0 ), 5.0 );", "			dirSpecular += schlick * directionalLightColor[ i ] * dirSpecularWeight * dirDiffuseWeight * specularNormalization;", "		}", "	#endif", "	#if MAX_HEMI_LIGHTS > 0", "		vec3 hemiDiffuse = vec3( 0.0 );", "		vec3 hemiSpecular = vec3( 0.0 );", "		for( int i = 0; i < MAX_HEMI_LIGHTS; i ++ ) {", "			vec4 lDirection = viewMatrix * vec4( hemisphereLightDirection[ i ], 0.0 );", "			vec3 lVector = normalize( lDirection.xyz );", "			float dotProduct = dot( normal, lVector );", "			float hemiDiffuseWeight = 0.5 * dotProduct + 0.5;", "			vec3 hemiColor = mix( hemisphereLightGroundColor[ i ], hemisphereLightSkyColor[ i ], hemiDiffuseWeight );", "			hemiDiffuse += diffuse * hemiColor;", "			vec3 hemiHalfVectorSky = normalize( lVector + viewPosition );", "			float hemiDotNormalHalfSky = 0.5 * dot( normal, hemiHalfVectorSky ) + 0.5;", "			float hemiSpecularWeightSky = specularTex.r * max( pow( max( hemiDotNormalHalfSky, 0.0 ), shininess ), 0.0 );", "			vec3 lVectorGround = -lVector;", "			vec3 hemiHalfVectorGround = normalize( lVectorGround + viewPosition );", "			float hemiDotNormalHalfGround = 0.5 * dot( normal, hemiHalfVectorGround ) + 0.5;", "			float hemiSpecularWeightGround = specularTex.r * max( pow( max( hemiDotNormalHalfGround, 0.0 ), shininess ), 0.0 );", "			float dotProductGround = dot( normal, lVectorGround );", "			float specularNormalization = ( shininess + 2.0 ) / 8.0;", "			vec3 schlickSky = specular + vec3( 1.0 - specular ) * pow( max( 1.0 - dot( lVector, hemiHalfVectorSky ), 0.0 ), 5.0 );", "			vec3 schlickGround = specular + vec3( 1.0 - specular ) * pow( max( 1.0 - dot( lVectorGround, hemiHalfVectorGround ), 0.0 ), 5.0 );", "			hemiSpecular += hemiColor * specularNormalization * ( schlickSky * hemiSpecularWeightSky * max( dotProduct, 0.0 ) + schlickGround * hemiSpecularWeightGround * max( dotProductGround, 0.0 ) );", "		}", "	#endif", "	vec3 totalDiffuse = vec3( 0.0 );", "	vec3 totalSpecular = vec3( 0.0 );", "	#if MAX_DIR_LIGHTS > 0", "		totalDiffuse += dirDiffuse;", "		totalSpecular += dirSpecular;", "	#endif", "	#if MAX_HEMI_LIGHTS > 0", "		totalDiffuse += hemiDiffuse;", "		totalSpecular += hemiSpecular;", "	#endif", "	#if MAX_POINT_LIGHTS > 0", "		totalDiffuse += pointDiffuse;", "		totalSpecular += pointSpecular;", "	#endif", "	#if MAX_SPOT_LIGHTS > 0", "		totalDiffuse += spotDiffuse;", "		totalSpecular += spotSpecular;", "	#endif", "	#ifdef METAL", "		gl_FragColor.xyz = gl_FragColor.xyz * ( totalDiffuse + ambientLightColor * ambient + totalSpecular );", "	#else", "		gl_FragColor.xyz = gl_FragColor.xyz * ( totalDiffuse + ambientLightColor * ambient ) + totalSpecular;", "	#endif", "	if ( enableReflection ) {", "		vec3 vReflect;", "		vec3 cameraToVertex = normalize( vWorldPosition - cameraPosition );", "		if ( useRefract ) {", "			vReflect = refract( cameraToVertex, normal, refractionRatio );", "		} else {", "			vReflect = reflect( cameraToVertex, normal );", "		}", "		vec4 cubeColor = textureCube( tCube, vec3( -vReflect.x, vReflect.yz ) );", "		#ifdef GAMMA_INPUT", "			cubeColor.xyz *= cubeColor.xyz;", "		#endif", "		gl_FragColor.xyz = mix( gl_FragColor.xyz, cubeColor.xyz, specularTex.r * reflectivity );", "	}", THREE.ShaderChunk.shadowmap_fragment, THREE.ShaderChunk.linear_to_gamma_fragment, THREE.ShaderChunk.fog_fragment, "}"].join("\n"),
            vertexShader: ["attribute vec4 tangent;", "uniform vec2 uOffset;", "uniform vec2 uRepeat;", "uniform bool enableDisplacement;", "#ifdef VERTEX_TEXTURES", "	uniform sampler2D tDisplacement;", "	uniform float uDisplacementScale;", "	uniform float uDisplacementBias;", "#endif", "varying vec3 vTangent;", "varying vec3 vBinormal;", "varying vec3 vNormal;", "varying vec2 vUv;", "varying vec3 vWorldPosition;", "varying vec3 vViewPosition;", THREE.ShaderChunk.skinning_pars_vertex, THREE.ShaderChunk.shadowmap_pars_vertex, THREE.ShaderChunk.logdepthbuf_pars_vertex, "void main() {", THREE.ShaderChunk.skinbase_vertex, THREE.ShaderChunk.skinnormal_vertex, "	#ifdef USE_SKINNING", "		vNormal = normalize( normalMatrix * skinnedNormal.xyz );", "		vec4 skinnedTangent = skinMatrix * vec4( tangent.xyz, 0.0 );", "		vTangent = normalize( normalMatrix * skinnedTangent.xyz );", "	#else", "		vNormal = normalize( normalMatrix * normal );", "		vTangent = normalize( normalMatrix * tangent.xyz );", "	#endif", "	vBinormal = normalize( cross( vNormal, vTangent ) * tangent.w );", "	vUv = uv * uRepeat + uOffset;", "	vec3 displacedPosition;", "	#ifdef VERTEX_TEXTURES", "		if ( enableDisplacement ) {", "			vec3 dv = texture2D( tDisplacement, uv ).xyz;", "			float df = uDisplacementScale * dv.x + uDisplacementBias;", "			displacedPosition = position + normalize( normal ) * df;", "		} else {", "			#ifdef USE_SKINNING", "				vec4 skinVertex = bindMatrix * vec4( position, 1.0 );", "				vec4 skinned = vec4( 0.0 );", "				skinned += boneMatX * skinVertex * skinWeight.x;", "				skinned += boneMatY * skinVertex * skinWeight.y;", "				skinned += boneMatZ * skinVertex * skinWeight.z;", "				skinned += boneMatW * skinVertex * skinWeight.w;", "				skinned  = bindMatrixInverse * skinned;", "				displacedPosition = skinned.xyz;", "			#else", "				displacedPosition = position;", "			#endif", "		}", "	#else", "		#ifdef USE_SKINNING", "			vec4 skinVertex = bindMatrix * vec4( position, 1.0 );", "			vec4 skinned = vec4( 0.0 );", "			skinned += boneMatX * skinVertex * skinWeight.x;", "			skinned += boneMatY * skinVertex * skinWeight.y;", "			skinned += boneMatZ * skinVertex * skinWeight.z;", "			skinned += boneMatW * skinVertex * skinWeight.w;", "			skinned  = bindMatrixInverse * skinned;", "			displacedPosition = skinned.xyz;", "		#else", "			displacedPosition = position;", "		#endif", "	#endif", "	vec4 mvPosition = modelViewMatrix * vec4( displacedPosition, 1.0 );", "	vec4 worldPosition = modelMatrix * vec4( displacedPosition, 1.0 );", "	gl_Position = projectionMatrix * mvPosition;", THREE.ShaderChunk.logdepthbuf_vertex, "	vWorldPosition = worldPosition.xyz;", "	vViewPosition = -mvPosition.xyz;", "	#ifdef USE_SHADOWMAP", "		for( int i = 0; i < MAX_SHADOWS; i ++ ) {", "			vShadowCoord[ i ] = shadowMatrix[ i ] * worldPosition;", "		}", "	#endif", "}"].join("\n")
        },
        cube: {
            uniforms: {
                tCube: {
                    type: "t",
                    value: null
                },
                tFlip: {
                    type: "f",
                    value: -1
                }
            },
            vertexShader: ["varying vec3 vWorldPosition;", THREE.ShaderChunk.logdepthbuf_pars_vertex, "void main() {", "	vec4 worldPosition = modelMatrix * vec4( position, 1.0 );", "	vWorldPosition = worldPosition.xyz;", "	gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );", THREE.ShaderChunk.logdepthbuf_vertex, "}"].join("\n"),
            fragmentShader: ["uniform samplerCube tCube;", "uniform float tFlip;", "varying vec3 vWorldPosition;", THREE.ShaderChunk.logdepthbuf_pars_fragment, "void main() {", "	gl_FragColor = textureCube( tCube, vec3( tFlip * vWorldPosition.x, vWorldPosition.yz ) );", THREE.ShaderChunk.logdepthbuf_fragment, "}"].join("\n")
        },
        depthRGBA: {
            uniforms: {},
            vertexShader: [THREE.ShaderChunk.morphtarget_pars_vertex, THREE.ShaderChunk.skinning_pars_vertex, THREE.ShaderChunk.logdepthbuf_pars_vertex, "void main() {", THREE.ShaderChunk.skinbase_vertex, THREE.ShaderChunk.morphtarget_vertex, THREE.ShaderChunk.skinning_vertex, THREE.ShaderChunk.default_vertex, THREE.ShaderChunk.logdepthbuf_vertex, "}"].join("\n"),
            fragmentShader: [THREE.ShaderChunk.logdepthbuf_pars_fragment, "vec4 pack_depth( const in float depth ) {", "	const vec4 bit_shift = vec4( 256.0 * 256.0 * 256.0, 256.0 * 256.0, 256.0, 1.0 );", "	const vec4 bit_mask = vec4( 0.0, 1.0 / 256.0, 1.0 / 256.0, 1.0 / 256.0 );", "	vec4 res = mod( depth * bit_shift * vec4( 255 ), vec4( 256 ) ) / vec4( 255 );", "	res -= res.xxyz * bit_mask;", "	return res;", "}", "void main() {", THREE.ShaderChunk.logdepthbuf_fragment, "	#ifdef USE_LOGDEPTHBUF_EXT", "		gl_FragData[ 0 ] = pack_depth( gl_FragDepthEXT );", "	#else", "		gl_FragData[ 0 ] = pack_depth( gl_FragCoord.z );", "	#endif", "}"].join("\n")
        }
    }, THREE.WebGLRenderer = function(e) {
        function t(e) {
            e.__webglVertexBuffer = Vt.createBuffer(), e.__webglColorBuffer = Vt.createBuffer(), Wt.info.memory.geometries++
        }

        function r(e) {
            e.__webglVertexBuffer = Vt.createBuffer(), e.__webglColorBuffer = Vt.createBuffer(), e.__webglLineDistanceBuffer = Vt.createBuffer(), Wt.info.memory.geometries++
        }

        function i(e) {
            e.__webglVertexBuffer = Vt.createBuffer(), e.__webglNormalBuffer = Vt.createBuffer(), e.__webglTangentBuffer = Vt.createBuffer(), e.__webglColorBuffer = Vt.createBuffer(), e.__webglUVBuffer = Vt.createBuffer(), e.__webglUV2Buffer = Vt.createBuffer(), e.__webglSkinIndicesBuffer = Vt.createBuffer(), e.__webglSkinWeightsBuffer = Vt.createBuffer(), e.__webglFaceBuffer = Vt.createBuffer(), e.__webglLineBuffer = Vt.createBuffer();
            var t, r;
            if (e.numMorphTargets)
                for (e.__webglMorphTargetsBuffers = [], t = 0, r = e.numMorphTargets; r > t; t++) e.__webglMorphTargetsBuffers.push(Vt.createBuffer());
            if (e.numMorphNormals)
                for (e.__webglMorphNormalsBuffers = [], t = 0, r = e.numMorphNormals; r > t; t++) e.__webglMorphNormalsBuffers.push(Vt.createBuffer());
            Wt.info.memory.geometries++
        }

        function n(e, t) {
            var r = e.vertices.length,
                i = t.material;
            if (i.attributes) {
                void 0 === e.__webglCustomAttributesList && (e.__webglCustomAttributesList = []);
                for (var n in i.attributes) {
                    var a = i.attributes[n];
                    if (!a.__webglInitialized || a.createUniqueBuffers) {
                        a.__webglInitialized = !0;
                        var o = 1;
                        "v2" === a.type ? o = 2 : "v3" === a.type ? o = 3 : "v4" === a.type ? o = 4 : "c" === a.type && (o = 3), a.size = o, a.array = new Float32Array(r * o), a.buffer = Vt.createBuffer(), a.buffer.belongsToAttribute = n, a.needsUpdate = !0
                    }
                    e.__webglCustomAttributesList.push(a)
                }
            }
        }

        function a(e, t) {
            var r = e.vertices.length;
            e.__vertexArray = new Float32Array(3 * r), e.__colorArray = new Float32Array(3 * r), e.__sortArray = [], e.__webglParticleCount = r, n(e, t)
        }

        function o(e, t) {
            var r = e.vertices.length;
            e.__vertexArray = new Float32Array(3 * r), e.__colorArray = new Float32Array(3 * r), e.__lineDistanceArray = new Float32Array(1 * r), e.__webglLineCount = r, n(e, t)
        }

        function s(e, t) {
            var r = t.geometry,
                i = e.faces3,
                n = 3 * i.length,
                a = 1 * i.length,
                o = 3 * i.length,
                s = h(t, e),
                l = f(s),
                E = c(s),
                p = u(s);
            e.__vertexArray = new Float32Array(3 * n), E && (e.__normalArray = new Float32Array(3 * n)), r.hasTangents && (e.__tangentArray = new Float32Array(4 * n)), p && (e.__colorArray = new Float32Array(3 * n)), l && (r.faceVertexUvs.length > 0 && (e.__uvArray = new Float32Array(2 * n)), r.faceVertexUvs.length > 1 && (e.__uv2Array = new Float32Array(2 * n))), t.geometry.skinWeights.length && t.geometry.skinIndices.length && (e.__skinIndexArray = new Float32Array(4 * n), e.__skinWeightArray = new Float32Array(4 * n));
            var d = null !== It && a > 21845 ? Uint32Array : Uint16Array;
            e.__typeArray = d, e.__faceArray = new d(3 * a), e.__lineArray = new d(2 * o);
            var m, v;
            if (e.numMorphTargets)
                for (e.__morphTargetsArrays = [], m = 0, v = e.numMorphTargets; v > m; m++) e.__morphTargetsArrays.push(new Float32Array(3 * n));
            if (e.numMorphNormals)
                for (e.__morphNormalsArrays = [], m = 0, v = e.numMorphNormals; v > m; m++) e.__morphNormalsArrays.push(new Float32Array(3 * n));
            if (e.__webglFaceCount = 3 * a, e.__webglLineCount = 2 * o, s.attributes) {
                void 0 === e.__webglCustomAttributesList && (e.__webglCustomAttributesList = []);
                for (var g in s.attributes) {
                    var T = s.attributes[g],
                        y = {};
                    for (var R in T) y[R] = T[R];
                    if (!y.__webglInitialized || y.createUniqueBuffers) {
                        y.__webglInitialized = !0;
                        var x = 1;
                        "v2" === y.type ? x = 2 : "v3" === y.type ? x = 3 : "v4" === y.type ? x = 4 : "c" === y.type && (x = 3), y.size = x, y.array = new Float32Array(n * x), y.buffer = Vt.createBuffer(), y.buffer.belongsToAttribute = g, T.needsUpdate = !0, y.__original = T
                    }
                    e.__webglCustomAttributesList.push(y)
                }
            }
            e.__inittedArrays = !0
        }

        function h(e, t) {
            return e.material instanceof THREE.MeshFaceMaterial ? e.material.materials[t.materialIndex] : e.material
        }

        function l(e) {
            return e && void 0 !== e.shading && e.shading === THREE.SmoothShading
        }

        function c(e) {
            return e instanceof THREE.MeshBasicMaterial && !e.envMap || e instanceof THREE.MeshDepthMaterial ? !1 : l(e) ? THREE.SmoothShading : THREE.FlatShading
        }

        function u(e) {
            return e.vertexColors ? e.vertexColors : !1
        }

        function f(e) {
            return e.map || e.lightMap || e.bumpMap || e.normalMap || e.specularMap || e.alphaMap || e instanceof THREE.ShaderMaterial ? !0 : !1
        }

        function E(e) {
            for (var t in e.attributes) {
                var r = "index" === t ? Vt.ELEMENT_ARRAY_BUFFER : Vt.ARRAY_BUFFER,
                    i = e.attributes[t];
                i.buffer = Vt.createBuffer(), Vt.bindBuffer(r, i.buffer), Vt.bufferData(r, i.array, Vt.STATIC_DRAW)
            }
        }

        function p(e, t, r) {
            var i, n, a, o, s, h, l, c, u, f, E, p, d = e.vertices,
                m = d.length,
                v = e.colors,
                g = v.length,
                T = e.__vertexArray,
                y = e.__colorArray,
                R = e.__sortArray,
                x = e.verticesNeedUpdate,
                H = (e.elementsNeedUpdate, e.colorsNeedUpdate),
                b = e.__webglCustomAttributesList;
            if (r.sortParticles) {
                for (yr.copy(Tr), yr.multiply(r.matrixWorld), i = 0; m > i; i++) a = d[i], Rr.copy(a), Rr.applyProjection(yr), R[i] = [Rr.z, i];
                for (R.sort(_), i = 0; m > i; i++) a = d[R[i][1]], o = 3 * i, T[o] = a.x, T[o + 1] = a.y, T[o + 2] = a.z;
                for (n = 0; g > n; n++) o = 3 * n, h = v[R[n][1]], y[o] = h.r, y[o + 1] = h.g, y[o + 2] = h.b;
                if (b)
                    for (l = 0, c = b.length; c > l; l++)
                        if (p = b[l], void 0 === p.boundTo || "vertices" === p.boundTo)
                            if (o = 0, f = p.value.length, 1 === p.size)
                                for (u = 0; f > u; u++) s = R[u][1], p.array[u] = p.value[s];
                            else if (2 === p.size)
                    for (u = 0; f > u; u++) s = R[u][1], E = p.value[s], p.array[o] = E.x, p.array[o + 1] = E.y, o += 2;
                else if (3 === p.size)
                    if ("c" === p.type)
                        for (u = 0; f > u; u++) s = R[u][1], E = p.value[s], p.array[o] = E.r, p.array[o + 1] = E.g, p.array[o + 2] = E.b, o += 3;
                    else
                        for (u = 0; f > u; u++) s = R[u][1], E = p.value[s], p.array[o] = E.x, p.array[o + 1] = E.y, p.array[o + 2] = E.z, o += 3;
                else if (4 === p.size)
                    for (u = 0; f > u; u++) s = R[u][1], E = p.value[s], p.array[o] = E.x, p.array[o + 1] = E.y, p.array[o + 2] = E.z, p.array[o + 3] = E.w, o += 4
            } else {
                if (x)
                    for (i = 0; m > i; i++) a = d[i], o = 3 * i, T[o] = a.x, T[o + 1] = a.y, T[o + 2] = a.z;
                if (H)
                    for (n = 0; g > n; n++) h = v[n], o = 3 * n, y[o] = h.r, y[o + 1] = h.g, y[o + 2] = h.b;
                if (b)
                    for (l = 0, c = b.length; c > l; l++)
                        if (p = b[l], p.needsUpdate && (void 0 === p.boundTo || "vertices" === p.boundTo))
                            if (f = p.value.length, o = 0, 1 === p.size)
                                for (u = 0; f > u; u++) p.array[u] = p.value[u];
                            else if (2 === p.size)
                    for (u = 0; f > u; u++) E = p.value[u], p.array[o] = E.x, p.array[o + 1] = E.y, o += 2;
                else if (3 === p.size)
                    if ("c" === p.type)
                        for (u = 0; f > u; u++) E = p.value[u], p.array[o] = E.r, p.array[o + 1] = E.g, p.array[o + 2] = E.b, o += 3;
                    else
                        for (u = 0; f > u; u++) E = p.value[u], p.array[o] = E.x, p.array[o + 1] = E.y, p.array[o + 2] = E.z, o += 3;
                else if (4 === p.size)
                    for (u = 0; f > u; u++) E = p.value[u], p.array[o] = E.x, p.array[o + 1] = E.y, p.array[o + 2] = E.z, p.array[o + 3] = E.w, o += 4
            }
            if ((x || r.sortParticles) && (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglVertexBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, T, t)), (H || r.sortParticles) && (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglColorBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, y, t)), b)
                for (l = 0, c = b.length; c > l; l++) p = b[l], (p.needsUpdate || r.sortParticles) && (Vt.bindBuffer(Vt.ARRAY_BUFFER, p.buffer), Vt.bufferData(Vt.ARRAY_BUFFER, p.array, t))
        }

        function d(e, t) {
            var r, i, n, a, o, s, h, l, c, u, f, E, p = e.vertices,
                d = e.colors,
                m = e.lineDistances,
                v = p.length,
                g = d.length,
                T = m.length,
                y = e.__vertexArray,
                R = e.__colorArray,
                x = e.__lineDistanceArray,
                H = e.verticesNeedUpdate,
                b = e.colorsNeedUpdate,
                _ = e.lineDistancesNeedUpdate,
                w = e.__webglCustomAttributesList;
            if (H) {
                for (r = 0; v > r; r++) a = p[r], o = 3 * r, y[o] = a.x, y[o + 1] = a.y, y[o + 2] = a.z;
                Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglVertexBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, y, t)
            }
            if (b) {
                for (i = 0; g > i; i++) s = d[i], o = 3 * i, R[o] = s.r, R[o + 1] = s.g, R[o + 2] = s.b;
                Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglColorBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, R, t)
            }
            if (_) {
                for (n = 0; T > n; n++) x[n] = m[n];
                Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglLineDistanceBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, x, t)
            }
            if (w)
                for (h = 0, l = w.length; l > h; h++)
                    if (E = w[h], E.needsUpdate && (void 0 === E.boundTo || "vertices" === E.boundTo)) {
                        if (o = 0, u = E.value.length, 1 === E.size)
                            for (c = 0; u > c; c++) E.array[c] = E.value[c];
                        else if (2 === E.size)
                            for (c = 0; u > c; c++) f = E.value[c], E.array[o] = f.x, E.array[o + 1] = f.y, o += 2;
                        else if (3 === E.size)
                            if ("c" === E.type)
                                for (c = 0; u > c; c++) f = E.value[c], E.array[o] = f.r, E.array[o + 1] = f.g, E.array[o + 2] = f.b, o += 3;
                            else
                                for (c = 0; u > c; c++) f = E.value[c], E.array[o] = f.x, E.array[o + 1] = f.y, E.array[o + 2] = f.z, o += 3;
                        else if (4 === E.size)
                            for (c = 0; u > c; c++) f = E.value[c], E.array[o] = f.x, E.array[o + 1] = f.y, E.array[o + 2] = f.z, E.array[o + 3] = f.w, o += 4;
                        Vt.bindBuffer(Vt.ARRAY_BUFFER, E.buffer), Vt.bufferData(Vt.ARRAY_BUFFER, E.array, t)
                    }
        }

        function m(e, t, r, i, n) {
            if (e.__inittedArrays) {
                var a, o, s, h, l, E, p, d, m, v, g, T, y, R, x, H, b, _, w, M, S, C, A, L, P, F, D, U, V, z, B, k, N, O, I, G, W, j, X, Y, q, K, Z = c(n),
                    Q = u(n),
                    J = f(n),
                    $ = Z === THREE.SmoothShading,
                    et = 0,
                    tt = 0,
                    rt = 0,
                    it = 0,
                    nt = 0,
                    at = 0,
                    ot = 0,
                    st = 0,
                    ht = 0,
                    lt = 0,
                    ct = 0,
                    ut = 0,
                    ft = 0,
                    Et = e.__vertexArray,
                    pt = e.__uvArray,
                    dt = e.__uv2Array,
                    mt = e.__normalArray,
                    vt = e.__tangentArray,
                    gt = e.__colorArray,
                    Tt = e.__skinIndexArray,
                    yt = e.__skinWeightArray,
                    Rt = e.__morphTargetsArrays,
                    xt = e.__morphNormalsArrays,
                    Ht = e.__webglCustomAttributesList,
                    bt = e.__faceArray,
                    _t = e.__lineArray,
                    wt = t.geometry,
                    Mt = wt.verticesNeedUpdate,
                    St = wt.elementsNeedUpdate,
                    Ct = wt.uvsNeedUpdate,
                    At = wt.normalsNeedUpdate,
                    Lt = wt.tangentsNeedUpdate,
                    Pt = wt.colorsNeedUpdate,
                    Ft = wt.morphTargetsNeedUpdate,
                    Dt = wt.vertices,
                    Ut = e.faces3,
                    zt = wt.faces,
                    Bt = wt.faceVertexUvs[0],
                    kt = wt.faceVertexUvs[1],
                    Nt = (wt.colors, wt.skinIndices),
                    Ot = wt.skinWeights,
                    It = wt.morphTargets,
                    Gt = wt.morphNormals;
                if (Mt) {
                    for (a = 0, o = Ut.length; o > a; a++) h = zt[Ut[a]], T = Dt[h.a], y = Dt[h.b], R = Dt[h.c], Et[tt] = T.x, Et[tt + 1] = T.y, Et[tt + 2] = T.z, Et[tt + 3] = y.x, Et[tt + 4] = y.y, Et[tt + 5] = y.z, Et[tt + 6] = R.x, Et[tt + 7] = R.y, Et[tt + 8] = R.z, tt += 9;
                    Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglVertexBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, Et, r)
                }
                if (Ft)
                    for (I = 0, G = It.length; G > I; I++) {
                        for (ct = 0, a = 0, o = Ut.length; o > a; a++) X = Ut[a], h = zt[X], T = It[I].vertices[h.a], y = It[I].vertices[h.b], R = It[I].vertices[h.c], W = Rt[I], W[ct] = T.x, W[ct + 1] = T.y, W[ct + 2] = T.z, W[ct + 3] = y.x, W[ct + 4] = y.y, W[ct + 5] = y.z, W[ct + 6] = R.x, W[ct + 7] = R.y, W[ct + 8] = R.z, n.morphNormals && ($ ? (Y = Gt[I].vertexNormals[X], _ = Y.a, w = Y.b, M = Y.c) : (_ = Gt[I].faceNormals[X], w = _, M = _), j = xt[I], j[ct] = _.x, j[ct + 1] = _.y, j[ct + 2] = _.z, j[ct + 3] = w.x, j[ct + 4] = w.y, j[ct + 5] = w.z, j[ct + 6] = M.x, j[ct + 7] = M.y, j[ct + 8] = M.z), ct += 9;
                        Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglMorphTargetsBuffers[I]), Vt.bufferData(Vt.ARRAY_BUFFER, Rt[I], r), n.morphNormals && (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglMorphNormalsBuffers[I]), Vt.bufferData(Vt.ARRAY_BUFFER, xt[I], r))
                    }
                if (Ot.length) {
                    for (a = 0, o = Ut.length; o > a; a++) h = zt[Ut[a]], L = Ot[h.a], P = Ot[h.b], F = Ot[h.c], yt[lt] = L.x, yt[lt + 1] = L.y, yt[lt + 2] = L.z, yt[lt + 3] = L.w, yt[lt + 4] = P.x, yt[lt + 5] = P.y, yt[lt + 6] = P.z, yt[lt + 7] = P.w, yt[lt + 8] = F.x, yt[lt + 9] = F.y, yt[lt + 10] = F.z, yt[lt + 11] = F.w, D = Nt[h.a], U = Nt[h.b], V = Nt[h.c], Tt[lt] = D.x, Tt[lt + 1] = D.y, Tt[lt + 2] = D.z, Tt[lt + 3] = D.w, Tt[lt + 4] = U.x, Tt[lt + 5] = U.y, Tt[lt + 6] = U.z, Tt[lt + 7] = U.w, Tt[lt + 8] = V.x, Tt[lt + 9] = V.y, Tt[lt + 10] = V.z, Tt[lt + 11] = V.w, lt += 12;
                    lt > 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglSkinIndicesBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, Tt, r), Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglSkinWeightsBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, yt, r))
                }
                if (Pt && Q) {
                    for (a = 0, o = Ut.length; o > a; a++) h = zt[Ut[a]], p = h.vertexColors, d = h.color, 3 === p.length && Q === THREE.VertexColors ? (S = p[0], C = p[1], A = p[2]) : (S = d, C = d, A = d), gt[ht] = S.r, gt[ht + 1] = S.g, gt[ht + 2] = S.b, gt[ht + 3] = C.r, gt[ht + 4] = C.g, gt[ht + 5] = C.b, gt[ht + 6] = A.r, gt[ht + 7] = A.g, gt[ht + 8] = A.b, ht += 9;
                    ht > 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglColorBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, gt, r))
                }
                if (Lt && wt.hasTangents) {
                    for (a = 0, o = Ut.length; o > a; a++) h = zt[Ut[a]], m = h.vertexTangents, x = m[0], H = m[1], b = m[2], vt[ot] = x.x, vt[ot + 1] = x.y, vt[ot + 2] = x.z, vt[ot + 3] = x.w, vt[ot + 4] = H.x, vt[ot + 5] = H.y, vt[ot + 6] = H.z, vt[ot + 7] = H.w, vt[ot + 8] = b.x, vt[ot + 9] = b.y, vt[ot + 10] = b.z, vt[ot + 11] = b.w, ot += 12;
                    Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglTangentBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, vt, r)
                }
                if (At && Z) {
                    for (a = 0, o = Ut.length; o > a; a++)
                        if (h = zt[Ut[a]], l = h.vertexNormals, E = h.normal, 3 === l.length && $)
                            for (z = 0; 3 > z; z++) k = l[z], mt[at] = k.x, mt[at + 1] = k.y, mt[at + 2] = k.z, at += 3;
                        else
                            for (z = 0; 3 > z; z++) mt[at] = E.x, mt[at + 1] = E.y, mt[at + 2] = E.z, at += 3;
                    Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglNormalBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, mt, r)
                }
                if (Ct && Bt && J) {
                    for (a = 0, o = Ut.length; o > a; a++)
                        if (s = Ut[a], v = Bt[s], void 0 !== v)
                            for (z = 0; 3 > z; z++) N = v[z], pt[rt] = N.x, pt[rt + 1] = N.y, rt += 2;
                    rt > 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglUVBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, pt, r))
                }
                if (Ct && kt && J) {
                    for (a = 0, o = Ut.length; o > a; a++)
                        if (s = Ut[a], g = kt[s], void 0 !== g)
                            for (z = 0; 3 > z; z++) O = g[z], dt[it] = O.x, dt[it + 1] = O.y, it += 2;
                    it > 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglUV2Buffer), Vt.bufferData(Vt.ARRAY_BUFFER, dt, r))
                }
                if (St) {
                    for (a = 0, o = Ut.length; o > a; a++) bt[nt] = et, bt[nt + 1] = et + 1, bt[nt + 2] = et + 2, nt += 3, _t[st] = et, _t[st + 1] = et + 1, _t[st + 2] = et, _t[st + 3] = et + 2, _t[st + 4] = et + 1, _t[st + 5] = et + 2, st += 6, et += 3;
                    Vt.bindBuffer(Vt.ELEMENT_ARRAY_BUFFER, e.__webglFaceBuffer), Vt.bufferData(Vt.ELEMENT_ARRAY_BUFFER, bt, r), Vt.bindBuffer(Vt.ELEMENT_ARRAY_BUFFER, e.__webglLineBuffer), Vt.bufferData(Vt.ELEMENT_ARRAY_BUFFER, _t, r)
                }
                if (Ht)
                    for (z = 0, B = Ht.length; B > z; z++)
                        if (K = Ht[z], K.__original.needsUpdate) {
                            if (ut = 0, ft = 0, 1 === K.size) {
                                if (void 0 === K.boundTo || "vertices" === K.boundTo)
                                    for (a = 0, o = Ut.length; o > a; a++) h = zt[Ut[a]], K.array[ut] = K.value[h.a], K.array[ut + 1] = K.value[h.b], K.array[ut + 2] = K.value[h.c], ut += 3;
                                else if ("faces" === K.boundTo)
                                    for (a = 0, o = Ut.length; o > a; a++) q = K.value[Ut[a]], K.array[ut] = q, K.array[ut + 1] = q, K.array[ut + 2] = q, ut += 3
                            } else if (2 === K.size) {
                                if (void 0 === K.boundTo || "vertices" === K.boundTo)
                                    for (a = 0, o = Ut.length; o > a; a++) h = zt[Ut[a]], T = K.value[h.a], y = K.value[h.b], R = K.value[h.c], K.array[ut] = T.x, K.array[ut + 1] = T.y, K.array[ut + 2] = y.x, K.array[ut + 3] = y.y, K.array[ut + 4] = R.x, K.array[ut + 5] = R.y, ut += 6;
                                else if ("faces" === K.boundTo)
                                    for (a = 0, o = Ut.length; o > a; a++) q = K.value[Ut[a]], T = q, y = q, R = q, K.array[ut] = T.x, K.array[ut + 1] = T.y, K.array[ut + 2] = y.x, K.array[ut + 3] = y.y, K.array[ut + 4] = R.x, K.array[ut + 5] = R.y, ut += 6
                            } else if (3 === K.size) {
                                var Wt;
                                if (Wt = "c" === K.type ? ["r", "g", "b"] : ["x", "y", "z"], void 0 === K.boundTo || "vertices" === K.boundTo)
                                    for (a = 0, o = Ut.length; o > a; a++) h = zt[Ut[a]], T = K.value[h.a], y = K.value[h.b], R = K.value[h.c], K.array[ut] = T[Wt[0]], K.array[ut + 1] = T[Wt[1]], K.array[ut + 2] = T[Wt[2]], K.array[ut + 3] = y[Wt[0]], K.array[ut + 4] = y[Wt[1]], K.array[ut + 5] = y[Wt[2]], K.array[ut + 6] = R[Wt[0]], K.array[ut + 7] = R[Wt[1]], K.array[ut + 8] = R[Wt[2]], ut += 9;
                                else if ("faces" === K.boundTo)
                                    for (a = 0, o = Ut.length; o > a; a++) q = K.value[Ut[a]], T = q, y = q, R = q, K.array[ut] = T[Wt[0]], K.array[ut + 1] = T[Wt[1]], K.array[ut + 2] = T[Wt[2]], K.array[ut + 3] = y[Wt[0]], K.array[ut + 4] = y[Wt[1]], K.array[ut + 5] = y[Wt[2]], K.array[ut + 6] = R[Wt[0]], K.array[ut + 7] = R[Wt[1]], K.array[ut + 8] = R[Wt[2]], ut += 9;
                                else if ("faceVertices" === K.boundTo)
                                    for (a = 0, o = Ut.length; o > a; a++) q = K.value[Ut[a]], T = q[0], y = q[1], R = q[2], K.array[ut] = T[Wt[0]], K.array[ut + 1] = T[Wt[1]], K.array[ut + 2] = T[Wt[2]], K.array[ut + 3] = y[Wt[0]], K.array[ut + 4] = y[Wt[1]], K.array[ut + 5] = y[Wt[2]], K.array[ut + 6] = R[Wt[0]], K.array[ut + 7] = R[Wt[1]], K.array[ut + 8] = R[Wt[2]], ut += 9
                            } else if (4 === K.size)
                                if (void 0 === K.boundTo || "vertices" === K.boundTo)
                                    for (a = 0, o = Ut.length; o > a; a++) h = zt[Ut[a]], T = K.value[h.a], y = K.value[h.b], R = K.value[h.c], K.array[ut] = T.x, K.array[ut + 1] = T.y, K.array[ut + 2] = T.z, K.array[ut + 3] = T.w, K.array[ut + 4] = y.x, K.array[ut + 5] = y.y, K.array[ut + 6] = y.z, K.array[ut + 7] = y.w, K.array[ut + 8] = R.x, K.array[ut + 9] = R.y, K.array[ut + 10] = R.z, K.array[ut + 11] = R.w, ut += 12;
                                else if ("faces" === K.boundTo)
                                for (a = 0, o = Ut.length; o > a; a++) q = K.value[Ut[a]], T = q, y = q, R = q, K.array[ut] = T.x, K.array[ut + 1] = T.y, K.array[ut + 2] = T.z, K.array[ut + 3] = T.w, K.array[ut + 4] = y.x, K.array[ut + 5] = y.y, K.array[ut + 6] = y.z, K.array[ut + 7] = y.w, K.array[ut + 8] = R.x, K.array[ut + 9] = R.y, K.array[ut + 10] = R.z, K.array[ut + 11] = R.w, ut += 12;
                            else if ("faceVertices" === K.boundTo)
                                for (a = 0, o = Ut.length; o > a; a++) q = K.value[Ut[a]], T = q[0], y = q[1], R = q[2], K.array[ut] = T.x, K.array[ut + 1] = T.y, K.array[ut + 2] = T.z, K.array[ut + 3] = T.w, K.array[ut + 4] = y.x, K.array[ut + 5] = y.y, K.array[ut + 6] = y.z, K.array[ut + 7] = y.w, K.array[ut + 8] = R.x, K.array[ut + 9] = R.y, K.array[ut + 10] = R.z, K.array[ut + 11] = R.w, ut += 12;
                            Vt.bindBuffer(Vt.ARRAY_BUFFER, K.buffer), Vt.bufferData(Vt.ARRAY_BUFFER, K.array, r)
                        }
                i && (delete e.__inittedArrays, delete e.__colorArray, delete e.__normalArray, delete e.__tangentArray, delete e.__uvArray, delete e.__uv2Array, delete e.__faceArray, delete e.__vertexArray, delete e.__lineArray, delete e.__skinIndexArray, delete e.__skinWeightArray)
            }
        }

        function v(e, t) {
            var r, i, n = e.attributes;
            for (r in n) i = n[r], i.needsUpdate && ("index" === r ? (Vt.bindBuffer(Vt.ELEMENT_ARRAY_BUFFER, i.buffer), Vt.bufferData(Vt.ELEMENT_ARRAY_BUFFER, i.array, t)) : (Vt.bindBuffer(Vt.ARRAY_BUFFER, i.buffer), Vt.bufferData(Vt.ARRAY_BUFFER, i.array, t)), i.needsUpdate = !1)
        }

        function g(e, t, r, i) {
            for (var n in t) {
                var a = t[n],
                    o = r[n];
                if (a >= 0)
                    if (o) {
                        var s = o.itemSize;
                        Vt.bindBuffer(Vt.ARRAY_BUFFER, o.buffer), y(a), Vt.vertexAttribPointer(a, s, Vt.FLOAT, !1, 0, i * s * 4)
                    } else e.defaultAttributeValues && (2 === e.defaultAttributeValues[n].length ? Vt.vertexAttrib2fv(a, e.defaultAttributeValues[n]) : 3 === e.defaultAttributeValues[n].length && Vt.vertexAttrib3fv(a, e.defaultAttributeValues[n]))
            }
            R()
        }

        function T() {
            for (var e = 0, t = mr.length; t > e; e++) mr[e] = 0
        }

        function y(e) {
            mr[e] = 1, 0 === vr[e] && (Vt.enableVertexAttribArray(e), vr[e] = 1)
        }

        function R() {
            for (var e = 0, t = vr.length; t > e; e++) vr[e] !== mr[e] && (Vt.disableVertexAttribArray(e), vr[e] = 0)
        }

        function x(e, t, r) {
            var i = e.program.attributes;
            if (-1 !== r.morphTargetBase && i.position >= 0 ? (Vt.bindBuffer(Vt.ARRAY_BUFFER, t.__webglMorphTargetsBuffers[r.morphTargetBase]), y(i.position), Vt.vertexAttribPointer(i.position, 3, Vt.FLOAT, !1, 0, 0)) : i.position >= 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, t.__webglVertexBuffer), y(i.position), Vt.vertexAttribPointer(i.position, 3, Vt.FLOAT, !1, 0, 0)), r.morphTargetForcedOrder.length)
                for (var n = 0, a = r.morphTargetForcedOrder, o = r.morphTargetInfluences; n < e.numSupportedMorphTargets && n < a.length;) i["morphTarget" + n] >= 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, t.__webglMorphTargetsBuffers[a[n]]), y(i["morphTarget" + n]), Vt.vertexAttribPointer(i["morphTarget" + n], 3, Vt.FLOAT, !1, 0, 0)), i["morphNormal" + n] >= 0 && e.morphNormals && (Vt.bindBuffer(Vt.ARRAY_BUFFER, t.__webglMorphNormalsBuffers[a[n]]), y(i["morphNormal" + n]), Vt.vertexAttribPointer(i["morphNormal" + n], 3, Vt.FLOAT, !1, 0, 0)), r.__webglMorphTargetInfluences[n] = o[a[n]], n++;
            else {
                var s, h, l = [],
                    o = r.morphTargetInfluences,
                    c = o.length;
                for (h = 0; c > h; h++) s = o[h], s > 0 && l.push([s, h]);
                l.length > e.numSupportedMorphTargets ? (l.sort(_), l.length = e.numSupportedMorphTargets) : l.length > e.numSupportedMorphNormals ? l.sort(_) : 0 === l.length && l.push([0, 0]);
                for (var u, n = 0; n < e.numSupportedMorphTargets;) l[n] ? (u = l[n][1], i["morphTarget" + n] >= 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, t.__webglMorphTargetsBuffers[u]), y(i["morphTarget" + n]), Vt.vertexAttribPointer(i["morphTarget" + n], 3, Vt.FLOAT, !1, 0, 0)), i["morphNormal" + n] >= 0 && e.morphNormals && (Vt.bindBuffer(Vt.ARRAY_BUFFER, t.__webglMorphNormalsBuffers[u]), y(i["morphNormal" + n]), Vt.vertexAttribPointer(i["morphNormal" + n], 3, Vt.FLOAT, !1, 0, 0)), r.__webglMorphTargetInfluences[n] = o[u]) : r.__webglMorphTargetInfluences[n] = 0, n++
            }
            null !== e.program.uniforms.morphTargetInfluences && Vt.uniform1fv(e.program.uniforms.morphTargetInfluences, r.__webglMorphTargetInfluences)
        }

        function H(e, t) {
            return e.z !== t.z ? t.z - e.z : e.id - t.id
        }

        function b(e, t) {
            return e.z !== t.z ? e.z - t.z : e.id - t.id
        }

        function _(e, t) {
            return t[0] - e[0]
        }

        function w(e, t, r) {
            if (t.visible !== !1) {
                var i = e.__webglObjects[t.id];
                if (i && (t.frustumCulled === !1 || gr.intersectsObject(t) === !0)) {
                    V(e, t);
                    for (var n = 0, a = i.length; a > n; n++) {
                        var o = i[n];
                        L(o), o.render = !0, Wt.sortObjects === !0 && (null !== t.renderDepth ? o.z = t.renderDepth : (Rr.setFromMatrixPosition(t.matrixWorld), Rr.applyProjection(Tr), o.z = Rr.z))
                    }
                }
                for (var n = 0, a = t.children.length; a > n; n++) w(e, t.children[n], r)
            }
        }

        function M(e, t, r) {
            if (0 !== e.length)
                for (var i = 0, n = e.length; n > i; i++) Xt = null, Zt = null, er = -1, nr = -1, ar = -1, Jt = -1, $t = -1, Kt = -1, qt = -1, Hr = !0, e[i].render(t, r, pr, dr), Xt = null, Zt = null, er = -1, nr = -1, ar = -1, Jt = -1, $t = -1, Kt = -1, qt = -1, Hr = !0
        }

        function S(e, t, r, i, n, a) {
            for (var o, s, h, l, c = e.length - 1; - 1 !== c; c--) {
                if (o = e[c], s = o.object, h = o.buffer, rt(s, t), a) l = a;
                else {
                    if (l = o.material, !l) continue;
                    n && Wt.setBlending(l.blending, l.blendEquation, l.blendSrc, l.blendDst), Wt.setDepthTest(l.depthTest), Wt.setDepthWrite(l.depthWrite), st(l.polygonOffset, l.polygonOffsetFactor, l.polygonOffsetUnits)
                }
                Wt.setMaterialFaces(l), h instanceof THREE.BufferGeometry ? Wt.renderBufferDirect(t, r, i, l, h, s) : Wt.renderBuffer(t, r, i, l, h, s)
            }
        }

        function C(e, t, r, i, n, a, o) {
            for (var s, h, l, c = 0, u = e.length; u > c; c++)
                if (s = e[c], h = s.object, h.visible) {
                    if (o) l = o;
                    else {
                        if (l = s[t], !l) continue;
                        a && Wt.setBlending(l.blending, l.blendEquation, l.blendSrc, l.blendDst), Wt.setDepthTest(l.depthTest), Wt.setDepthWrite(l.depthWrite), st(l.polygonOffset, l.polygonOffsetFactor, l.polygonOffsetUnits)
                    }
                    Wt.renderImmediateObject(r, i, n, l, h)
                }
        }

        function A(e) {
            var t = e.object,
                r = t.material;
            r.transparent ? (e.transparent = r, e.opaque = null) : (e.opaque = r, e.transparent = null)
        }

        function L(e) {
            var t = e.object,
                r = e.buffer,
                i = t.geometry,
                n = t.material;
            if (n instanceof THREE.MeshFaceMaterial) {
                var a = i instanceof THREE.BufferGeometry ? 0 : r.materialIndex;
                n = n.materials[a], n.transparent ? (e.material = n, Ut.push(e)) : (e.material = n, Dt.push(e))
            } else n && (n.transparent ? (e.material = n, Ut.push(e)) : (e.material = n, Dt.push(e)))
        }

        function P(e, i) {
            var n, s;
            if (void 0 === e.__webglInit && (e.__webglInit = !0, e._modelViewMatrix = new THREE.Matrix4, e._normalMatrix = new THREE.Matrix3), n = e.geometry, void 0 === n || void 0 === n.__webglInit && (n.__webglInit = !0, n.addEventListener("dispose", zr), n instanceof THREE.BufferGeometry ? E(n) : e instanceof THREE.Mesh ? (void 0 !== e.__webglActive && k(e, i), F(i, e, n)) : e instanceof THREE.Line ? n.__webglVertexBuffer || (r(n), o(n, e), n.verticesNeedUpdate = !0, n.colorsNeedUpdate = !0, n.lineDistancesNeedUpdate = !0) : e instanceof THREE.PointCloud && (n.__webglVertexBuffer || (t(n), a(n, e), n.verticesNeedUpdate = !0, n.colorsNeedUpdate = !0))), void 0 === e.__webglActive) {
                if (e instanceof THREE.Mesh) {
                    if (n = e.geometry, n instanceof THREE.BufferGeometry) D(i.__webglObjects, n, e);
                    else if (n instanceof THREE.Geometry)
                        for (var h = 0, l = n.geometryGroupsList.length; l > h; h++) s = n.geometryGroupsList[h], D(i.__webglObjects, s, e)
                } else e instanceof THREE.Line || e instanceof THREE.PointCloud ? (n = e.geometry, D(i.__webglObjects, n, e)) : (e instanceof THREE.ImmediateRenderObject || e.immediateRenderCallback) && U(i.__webglObjectsImmediate, e);
                e.__webglActive = !0
            }
        }

        function F(e, t, r) {
            var n, a, o = !1;
            a = t.material, (void 0 === r.geometryGroups || r.groupsNeedUpdate) && (delete e.__webglObjects[t.id], r.makeGroups(a instanceof THREE.MeshFaceMaterial, It ? 4294967296 : 65535), r.groupsNeedUpdate = !1);
            for (var h = 0, l = r.geometryGroupsList.length; l > h; h++) n = r.geometryGroupsList[h], n.__webglVertexBuffer ? o = !1 : (i(n), s(n, t), r.verticesNeedUpdate = !0, r.morphTargetsNeedUpdate = !0, r.elementsNeedUpdate = !0, r.uvsNeedUpdate = !0, r.normalsNeedUpdate = !0, r.tangentsNeedUpdate = !0, r.colorsNeedUpdate = !0, o = !0), (o || void 0 === t.__webglActive) && D(e.__webglObjects, n, t);
            t.__webglActive = !0
        }

        function D(e, t, r) {
            var i = r.id;
            e[i] = e[i] || [], e[i].push({
                id: i,
                buffer: t,
                object: r,
                material: null,
                z: 0
            })
        }

        function U(e, t) {
            e.push({
                id: null,
                object: t,
                opaque: null,
                transparent: null,
                z: 0
            })
        }

        function V(e, t) {
            var r, i, n, a = t.geometry;
            if (a instanceof THREE.BufferGeometry) v(a, Vt.DYNAMIC_DRAW);
            else if (t instanceof THREE.Mesh) {
                (a.buffersNeedUpdate || a.groupsNeedUpdate) && (a instanceof THREE.BufferGeometry ? E(a) : t instanceof THREE.Mesh && F(e, t, a));
                for (var o = 0, l = a.geometryGroupsList.length; l > o; o++) r = a.geometryGroupsList[o], n = h(t, r), (a.buffersNeedUpdate || a.groupsNeedUpdate) && s(r, t), i = n.attributes && z(n), (a.verticesNeedUpdate || a.morphTargetsNeedUpdate || a.elementsNeedUpdate || a.uvsNeedUpdate || a.normalsNeedUpdate || a.colorsNeedUpdate || a.tangentsNeedUpdate || i) && m(r, t, Vt.DYNAMIC_DRAW, !a.dynamic, n);
                a.verticesNeedUpdate = !1, a.morphTargetsNeedUpdate = !1, a.elementsNeedUpdate = !1, a.uvsNeedUpdate = !1, a.normalsNeedUpdate = !1, a.colorsNeedUpdate = !1, a.tangentsNeedUpdate = !1, a.buffersNeedUpdate = !1, n.attributes && B(n)
            } else t instanceof THREE.Line ? (n = h(t, a), i = n.attributes && z(n), (a.verticesNeedUpdate || a.colorsNeedUpdate || a.lineDistancesNeedUpdate || i) && d(a, Vt.DYNAMIC_DRAW), a.verticesNeedUpdate = !1, a.colorsNeedUpdate = !1, a.lineDistancesNeedUpdate = !1, n.attributes && B(n)) : t instanceof THREE.PointCloud && (n = h(t, a), i = n.attributes && z(n), (a.verticesNeedUpdate || a.colorsNeedUpdate || t.sortParticles || i) && p(a, Vt.DYNAMIC_DRAW, t), a.verticesNeedUpdate = !1, a.colorsNeedUpdate = !1, n.attributes && B(n))
        }

        function z(e) {
            for (var t in e.attributes)
                if (e.attributes[t].needsUpdate) return !0;
            return !1
        }

        function B(e) {
            for (var t in e.attributes) e.attributes[t].needsUpdate = !1
        }

        function k(e, t) {
            e instanceof THREE.Mesh || e instanceof THREE.PointCloud || e instanceof THREE.Line ? N(t.__webglObjects, e) : (e instanceof THREE.ImmediateRenderObject || e.immediateRenderCallback) && O(t.__webglObjectsImmediate, e), delete e.__webglActive
        }

        function N(e, t) {
            delete e[t.id]
        }

        function O(e, t) {
            for (var r = e.length - 1; r >= 0; r--) e[r].object === t && e.splice(r, 1)
        }

        function I(e, t, r, i, n) {
            Qt = 0, i.needsUpdate && (i.program && jr(i), Wt.initMaterial(i, t, r, n), i.needsUpdate = !1), i.morphTargets && (n.__webglMorphTargetInfluences || (n.__webglMorphTargetInfluences = new Float32Array(Wt.maxMorphTargets)));
            var a = !1,
                o = !1,
                s = !1,
                h = i.program,
                l = h.uniforms,
                c = i.__webglShader.uniforms;
            if (h.id !== Xt && (Vt.useProgram(h.program), Xt = h.id, a = !0, o = !0, s = !0), i.id !== qt && (-1 === qt && (s = !0), qt = i.id, o = !0), (a || e !== Zt) && (Vt.uniformMatrix4fv(l.projectionMatrix, !1, e.projectionMatrix.elements), Lt && Vt.uniform1f(l.logDepthBufFC, 2 / (Math.log(e.far + 1) / Math.LN2)), e !== Zt && (Zt = e), (i instanceof THREE.ShaderMaterial || i instanceof THREE.MeshPhongMaterial || i.envMap) && null !== l.cameraPosition && (Rr.setFromMatrixPosition(e.matrixWorld), Vt.uniform3f(l.cameraPosition, Rr.x, Rr.y, Rr.z)), (i instanceof THREE.MeshPhongMaterial || i instanceof THREE.MeshLambertMaterial || i instanceof THREE.ShaderMaterial || i.skinning) && null !== l.viewMatrix && Vt.uniformMatrix4fv(l.viewMatrix, !1, e.matrixWorldInverse.elements)), i.skinning)
                if (n.bindMatrix && null !== l.bindMatrix && Vt.uniformMatrix4fv(l.bindMatrix, !1, n.bindMatrix.elements), n.bindMatrixInverse && null !== l.bindMatrixInverse && Vt.uniformMatrix4fv(l.bindMatrixInverse, !1, n.bindMatrixInverse.elements), Ar && n.skeleton && n.skeleton.useVertexTexture) {
                    if (null !== l.boneTexture) {
                        var u = et();
                        Vt.uniform1i(l.boneTexture, u), Wt.setTexture(n.skeleton.boneTexture, u)
                    }
                    null !== l.boneTextureWidth && Vt.uniform1i(l.boneTextureWidth, n.skeleton.boneTextureWidth), null !== l.boneTextureHeight && Vt.uniform1i(l.boneTextureHeight, n.skeleton.boneTextureHeight)
                } else n.skeleton && n.skeleton.boneMatrices && null !== l.boneGlobalMatrices && Vt.uniformMatrix4fv(l.boneGlobalMatrices, !1, n.skeleton.boneMatrices);
            return o && (r && i.fog && Y(c, r), (i instanceof THREE.MeshPhongMaterial || i instanceof THREE.MeshLambertMaterial || i.lights) && (Hr && (s = !0, at(t), Hr = !1), s ? (Z(c, br), Q(c, !0)) : Q(c, !1)), (i instanceof THREE.MeshBasicMaterial || i instanceof THREE.MeshLambertMaterial || i instanceof THREE.MeshPhongMaterial) && G(c, i), i instanceof THREE.LineBasicMaterial ? W(c, i) : i instanceof THREE.LineDashedMaterial ? (W(c, i), j(c, i)) : i instanceof THREE.PointCloudMaterial ? X(c, i) : i instanceof THREE.MeshPhongMaterial ? q(c, i) : i instanceof THREE.MeshLambertMaterial ? K(c, i) : i instanceof THREE.MeshDepthMaterial ? (c.mNear.value = e.near, c.mFar.value = e.far, c.opacity.value = i.opacity) : i instanceof THREE.MeshNormalMaterial && (c.opacity.value = i.opacity), n.receiveShadow && !i._shadowPass && J(c, t), tt(i.uniformsList)), $(l, n), null !== l.modelMatrix && Vt.uniformMatrix4fv(l.modelMatrix, !1, n.matrixWorld.elements), h
        }

        function G(e, t) {
            e.opacity.value = t.opacity, Wt.gammaInput ? e.diffuse.value.copyGammaToLinear(t.color) : e.diffuse.value = t.color, e.map.value = t.map, e.lightMap.value = t.lightMap, e.specularMap.value = t.specularMap, e.alphaMap.value = t.alphaMap, t.bumpMap && (e.bumpMap.value = t.bumpMap, e.bumpScale.value = t.bumpScale), t.normalMap && (e.normalMap.value = t.normalMap, e.normalScale.value.copy(t.normalScale));
            var r;
            if (t.map ? r = t.map : t.specularMap ? r = t.specularMap : t.normalMap ? r = t.normalMap : t.bumpMap ? r = t.bumpMap : t.alphaMap && (r = t.alphaMap), void 0 !== r) {
                var i = r.offset,
                    n = r.repeat;
                e.offsetRepeat.value.set(i.x, i.y, n.x, n.y)
            }
            e.envMap.value = t.envMap, e.flipEnvMap.value = t.envMap instanceof THREE.WebGLRenderTargetCube ? 1 : -1, e.reflectivity.value = Wt.gammaInput ? t.reflectivity : t.reflectivity, e.refractionRatio.value = t.refractionRatio, e.combine.value = t.combine, e.useRefract.value = t.envMap && t.envMap.mapping instanceof THREE.CubeRefractionMapping
        }

        function W(e, t) {
            e.diffuse.value = t.color, e.opacity.value = t.opacity
        }

        function j(e, t) {
            e.dashSize.value = t.dashSize, e.totalSize.value = t.dashSize + t.gapSize, e.scale.value = t.scale
        }

        function X(e, t) {
            e.psColor.value = t.color, e.opacity.value = t.opacity, e.size.value = t.size, e.scale.value = xt.height / 2, e.map.value = t.map
        }

        function Y(e, t) {
            e.fogColor.value = t.color, t instanceof THREE.Fog ? (e.fogNear.value = t.near, e.fogFar.value = t.far) : t instanceof THREE.FogExp2 && (e.fogDensity.value = t.density)
        }

        function q(e, t) {
            e.shininess.value = t.shininess, Wt.gammaInput ? (e.ambient.value.copyGammaToLinear(t.ambient), e.emissive.value.copyGammaToLinear(t.emissive), e.specular.value.copyGammaToLinear(t.specular)) : (e.ambient.value = t.ambient, e.emissive.value = t.emissive, e.specular.value = t.specular), t.wrapAround && e.wrapRGB.value.copy(t.wrapRGB)
        }

        function K(e, t) {
            Wt.gammaInput ? (e.ambient.value.copyGammaToLinear(t.ambient), e.emissive.value.copyGammaToLinear(t.emissive)) : (e.ambient.value = t.ambient, e.emissive.value = t.emissive), t.wrapAround && e.wrapRGB.value.copy(t.wrapRGB)
        }

        function Z(e, t) {
            e.ambientLightColor.value = t.ambient, e.directionalLightColor.value = t.directional.colors, e.directionalLightDirection.value = t.directional.positions, e.pointLightColor.value = t.point.colors, e.pointLightPosition.value = t.point.positions, e.pointLightDistance.value = t.point.distances, e.spotLightColor.value = t.spot.colors, e.spotLightPosition.value = t.spot.positions, e.spotLightDistance.value = t.spot.distances, e.spotLightDirection.value = t.spot.directions, e.spotLightAngleCos.value = t.spot.anglesCos, e.spotLightExponent.value = t.spot.exponents, e.hemisphereLightSkyColor.value = t.hemi.skyColors, e.hemisphereLightGroundColor.value = t.hemi.groundColors, e.hemisphereLightDirection.value = t.hemi.positions
        }

        function Q(e, t) {
            e.ambientLightColor.needsUpdate = t, e.directionalLightColor.needsUpdate = t, e.directionalLightDirection.needsUpdate = t, e.pointLightColor.needsUpdate = t, e.pointLightPosition.needsUpdate = t, e.pointLightDistance.needsUpdate = t, e.spotLightColor.needsUpdate = t, e.spotLightPosition.needsUpdate = t, e.spotLightDistance.needsUpdate = t, e.spotLightDirection.needsUpdate = t, e.spotLightAngleCos.needsUpdate = t, e.spotLightExponent.needsUpdate = t, e.hemisphereLightSkyColor.needsUpdate = t, e.hemisphereLightGroundColor.needsUpdate = t, e.hemisphereLightDirection.needsUpdate = t
        }

        function J(e, t) {
            if (e.shadowMatrix)
                for (var r = 0, i = 0, n = t.length; n > i; i++) {
                    var a = t[i];
                    a.castShadow && (a instanceof THREE.SpotLight || a instanceof THREE.DirectionalLight && !a.shadowCascade) && (e.shadowMap.value[r] = a.shadowMap, e.shadowMapSize.value[r] = a.shadowMapSize, e.shadowMatrix.value[r] = a.shadowMatrix, e.shadowDarkness.value[r] = a.shadowDarkness, e.shadowBias.value[r] = a.shadowBias, r++)
                }
        }

        function $(e, t) {
            Vt.uniformMatrix4fv(e.modelViewMatrix, !1, t._modelViewMatrix.elements), e.normalMatrix && Vt.uniformMatrix3fv(e.normalMatrix, !1, t._normalMatrix.elements)
        }

        function et() {
            var e = Qt;
            return e >= _r && console.warn("WebGLRenderer: trying to use " + e + " texture units while this GPU supports only " + _r), Qt += 1, e
        }

        function tt(e) {
            for (var t, r, i, n = 0, a = e.length; a > n; n++) {
                var o = e[n][0];
                if (o.needsUpdate !== !1) {
                    var s = o.type,
                        h = o.value,
                        l = e[n][1];
                    switch (s) {
                        case "1i":
                            Vt.uniform1i(l, h);
                            break;
                        case "1f":
                            Vt.uniform1f(l, h);
                            break;
                        case "2f":
                            Vt.uniform2f(l, h[0], h[1]);
                            break;
                        case "3f":
                            Vt.uniform3f(l, h[0], h[1], h[2]);
                            break;
                        case "4f":
                            Vt.uniform4f(l, h[0], h[1], h[2], h[3]);
                            break;
                        case "1iv":
                            Vt.uniform1iv(l, h);
                            break;
                        case "3iv":
                            Vt.uniform3iv(l, h);
                            break;
                        case "1fv":
                            Vt.uniform1fv(l, h);
                            break;
                        case "2fv":
                            Vt.uniform2fv(l, h);
                            break;
                        case "3fv":
                            Vt.uniform3fv(l, h);
                            break;
                        case "4fv":
                            Vt.uniform4fv(l, h);
                            break;
                        case "Matrix3fv":
                            Vt.uniformMatrix3fv(l, !1, h);
                            break;
                        case "Matrix4fv":
                            Vt.uniformMatrix4fv(l, !1, h);
                            break;
                        case "i":
                            Vt.uniform1i(l, h);
                            break;
                        case "f":
                            Vt.uniform1f(l, h);
                            break;
                        case "v2":
                            Vt.uniform2f(l, h.x, h.y);
                            break;
                        case "v3":
                            Vt.uniform3f(l, h.x, h.y, h.z);
                            break;
                        case "v4":
                            Vt.uniform4f(l, h.x, h.y, h.z, h.w);
                            break;
                        case "c":
                            Vt.uniform3f(l, h.r, h.g, h.b);
                            break;
                        case "iv1":
                            Vt.uniform1iv(l, h);
                            break;
                        case "iv":
                            Vt.uniform3iv(l, h);
                            break;
                        case "fv1":
                            Vt.uniform1fv(l, h);
                            break;
                        case "fv":
                            Vt.uniform3fv(l, h);
                            break;
                        case "v2v":
                            void 0 === o._array && (o._array = new Float32Array(2 * h.length));
                            for (var c = 0, u = h.length; u > c; c++) i = 2 * c, o._array[i] = h[c].x, o._array[i + 1] = h[c].y;
                            Vt.uniform2fv(l, o._array);
                            break;
                        case "v3v":
                            void 0 === o._array && (o._array = new Float32Array(3 * h.length));
                            for (var c = 0, u = h.length; u > c; c++) i = 3 * c, o._array[i] = h[c].x, o._array[i + 1] = h[c].y, o._array[i + 2] = h[c].z;
                            Vt.uniform3fv(l, o._array);
                            break;
                        case "v4v":
                            void 0 === o._array && (o._array = new Float32Array(4 * h.length));
                            for (var c = 0, u = h.length; u > c; c++) i = 4 * c, o._array[i] = h[c].x, o._array[i + 1] = h[c].y, o._array[i + 2] = h[c].z, o._array[i + 3] = h[c].w;
                            Vt.uniform4fv(l, o._array);
                            break;
                        case "m3":
                            Vt.uniformMatrix3fv(l, !1, h.elements);
                            break;
                        case "m3v":
                            void 0 === o._array && (o._array = new Float32Array(9 * h.length));
                            for (var c = 0, u = h.length; u > c; c++) h[c].flattenToArrayOffset(o._array, 9 * c);
                            Vt.uniformMatrix3fv(l, !1, o._array);
                            break;
                        case "m4":
                            Vt.uniformMatrix4fv(l, !1, h.elements);
                            break;
                        case "m4v":
                            void 0 === o._array && (o._array = new Float32Array(16 * h.length));
                            for (var c = 0, u = h.length; u > c; c++) h[c].flattenToArrayOffset(o._array, 16 * c);
                            Vt.uniformMatrix4fv(l, !1, o._array);
                            break;
                        case "t":
                            if (t = h, r = et(), Vt.uniform1i(l, r), !t) continue;
                            t instanceof THREE.CubeTexture || t.image instanceof Array && 6 === t.image.length ? ct(t, r) : t instanceof THREE.WebGLRenderTargetCube ? ut(t, r) : Wt.setTexture(t, r);
                            break;
                        case "tv":
                            void 0 === o._array && (o._array = []);
                            for (var c = 0, u = o.value.length; u > c; c++) o._array[c] = et();
                            Vt.uniform1iv(l, o._array);
                            for (var c = 0, u = o.value.length; u > c; c++) t = o.value[c], r = o._array[c], t && Wt.setTexture(t, r);
                            break;
                        default:
                            console.warn("THREE.WebGLRenderer: Unknown uniform type: " + s)
                    }
                }
            }
        }

        function rt(e, t) {
            e._modelViewMatrix.multiplyMatrices(t.matrixWorldInverse, e.matrixWorld), e._normalMatrix.getNormalMatrix(e._modelViewMatrix)
        }

        function it(e, t, r, i) {
            e[t] = r.r * r.r * i, e[t + 1] = r.g * r.g * i, e[t + 2] = r.b * r.b * i
        }

        function nt(e, t, r, i) {
            e[t] = r.r * i, e[t + 1] = r.g * i, e[t + 2] = r.b * i
        }

        function at(e) {
            var t, r, i, n, a, o, s, h, l, c = 0,
                u = 0,
                f = 0,
                E = br,
                p = E.directional.colors,
                d = E.directional.positions,
                m = E.point.colors,
                v = E.point.positions,
                g = E.point.distances,
                T = E.spot.colors,
                y = E.spot.positions,
                R = E.spot.distances,
                x = E.spot.directions,
                H = E.spot.anglesCos,
                b = E.spot.exponents,
                _ = E.hemi.skyColors,
                w = E.hemi.groundColors,
                M = E.hemi.positions,
                S = 0,
                C = 0,
                A = 0,
                L = 0,
                P = 0,
                F = 0,
                D = 0,
                U = 0,
                V = 0,
                z = 0,
                B = 0,
                k = 0;
            for (t = 0, r = e.length; r > t; t++)
                if (i = e[t], !i.onlyShadow)
                    if (n = i.color, s = i.intensity, l = i.distance, i instanceof THREE.AmbientLight) {
                        if (!i.visible) continue;
                        Wt.gammaInput ? (c += n.r * n.r, u += n.g * n.g, f += n.b * n.b) : (c += n.r, u += n.g, f += n.b)
                    } else if (i instanceof THREE.DirectionalLight) {
                if (P += 1, !i.visible) continue;
                xr.setFromMatrixPosition(i.matrixWorld), Rr.setFromMatrixPosition(i.target.matrixWorld), xr.sub(Rr), xr.normalize(), V = 3 * S, d[V] = xr.x, d[V + 1] = xr.y, d[V + 2] = xr.z, Wt.gammaInput ? it(p, V, n, s * s) : nt(p, V, n, s), S += 1
            } else if (i instanceof THREE.PointLight) {
                if (F += 1, !i.visible) continue;
                z = 3 * C, Wt.gammaInput ? it(m, z, n, s * s) : nt(m, z, n, s), Rr.setFromMatrixPosition(i.matrixWorld), v[z] = Rr.x, v[z + 1] = Rr.y, v[z + 2] = Rr.z, g[C] = l, C += 1
            } else if (i instanceof THREE.SpotLight) {
                if (D += 1, !i.visible) continue;
                B = 3 * A, Wt.gammaInput ? it(T, B, n, s * s) : nt(T, B, n, s), Rr.setFromMatrixPosition(i.matrixWorld), y[B] = Rr.x, y[B + 1] = Rr.y, y[B + 2] = Rr.z, R[A] = l, xr.copy(Rr), Rr.setFromMatrixPosition(i.target.matrixWorld), xr.sub(Rr), xr.normalize(), x[B] = xr.x, x[B + 1] = xr.y, x[B + 2] = xr.z, H[A] = Math.cos(i.angle), b[A] = i.exponent, A += 1
            } else if (i instanceof THREE.HemisphereLight) {
                if (U += 1, !i.visible) continue;
                xr.setFromMatrixPosition(i.matrixWorld), xr.normalize(), k = 3 * L, M[k] = xr.x, M[k + 1] = xr.y, M[k + 2] = xr.z, a = i.color, o = i.groundColor, Wt.gammaInput ? (h = s * s, it(_, k, a, h), it(w, k, o, h)) : (nt(_, k, a, s), nt(w, k, o, s)), L += 1
            }
            for (t = 3 * S, r = Math.max(p.length, 3 * P); r > t; t++) p[t] = 0;
            for (t = 3 * C, r = Math.max(m.length, 3 * F); r > t; t++) m[t] = 0;
            for (t = 3 * A, r = Math.max(T.length, 3 * D); r > t; t++) T[t] = 0;
            for (t = 3 * L, r = Math.max(_.length, 3 * U); r > t; t++) _[t] = 0;
            for (t = 3 * L, r = Math.max(w.length, 3 * U); r > t; t++) w[t] = 0;
            E.directional.length = S, E.point.length = C, E.spot.length = A, E.hemi.length = L, E.ambient[0] = c, E.ambient[1] = u, E.ambient[2] = f
        }

        function ot(e) {
            e !== lr && (Vt.lineWidth(e), lr = e)
        }

        function st(e, t, r) {
            or !== e && (e ? Vt.enable(Vt.POLYGON_OFFSET_FILL) : Vt.disable(Vt.POLYGON_OFFSET_FILL), or = e), !e || sr === t && hr === r || (Vt.polygonOffset(t, r), sr = t, hr = r)
        }

        function ht(e, t, r) {
            r ? (Vt.texParameteri(e, Vt.TEXTURE_WRAP_S, mt(t.wrapS)), Vt.texParameteri(e, Vt.TEXTURE_WRAP_T, mt(t.wrapT)), Vt.texParameteri(e, Vt.TEXTURE_MAG_FILTER, mt(t.magFilter)), Vt.texParameteri(e, Vt.TEXTURE_MIN_FILTER, mt(t.minFilter))) : (Vt.texParameteri(e, Vt.TEXTURE_WRAP_S, Vt.CLAMP_TO_EDGE), Vt.texParameteri(e, Vt.TEXTURE_WRAP_T, Vt.CLAMP_TO_EDGE), Vt.texParameteri(e, Vt.TEXTURE_MAG_FILTER, dt(t.magFilter)), Vt.texParameteri(e, Vt.TEXTURE_MIN_FILTER, dt(t.minFilter))), Nt && t.type !== THREE.FloatType && (t.anisotropy > 1 || t.__oldAnisotropy) && (Vt.texParameterf(e, Nt.TEXTURE_MAX_ANISOTROPY_EXT, Math.min(t.anisotropy, Sr)), t.__oldAnisotropy = t.anisotropy)
        }

        function lt(e, t) {
            if (e.width <= t && e.height <= t) return e;
            var r = Math.max(e.width, e.height),
                i = Math.floor(e.width * t / r),
                n = Math.floor(e.height * t / r),
                a = document.createElement("canvas");
            a.width = i, a.height = n;
            var o = a.getContext("2d");
            return o.drawImage(e, 0, 0, e.width, e.height, 0, 0, i, n), a
        }

        function ct(e, t) {
            if (6 === e.image.length)
                if (e.needsUpdate) {
                    e.image.__webglTextureCube || (e.addEventListener("dispose", Br), e.image.__webglTextureCube = Vt.createTexture(), Wt.info.memory.textures++), Vt.activeTexture(Vt.TEXTURE0 + t), Vt.bindTexture(Vt.TEXTURE_CUBE_MAP, e.image.__webglTextureCube), Vt.pixelStorei(Vt.UNPACK_FLIP_Y_WEBGL, e.flipY);
                    for (var r = e instanceof THREE.CompressedTexture, i = [], n = 0; 6 > n; n++) i[n] = Wt.autoScaleCubemaps && !r ? lt(e.image[n], Mr) : e.image[n];
                    var a = i[0],
                        o = THREE.Math.isPowerOfTwo(a.width) && THREE.Math.isPowerOfTwo(a.height),
                        s = mt(e.format),
                        h = mt(e.type);
                    ht(Vt.TEXTURE_CUBE_MAP, e, o);
                    for (var n = 0; 6 > n; n++)
                        if (r)
                            for (var l, c = i[n].mipmaps, u = 0, f = c.length; f > u; u++) l = c[u], e.format !== THREE.RGBAFormat ? Vt.compressedTexImage2D(Vt.TEXTURE_CUBE_MAP_POSITIVE_X + n, u, s, l.width, l.height, 0, l.data) : Vt.texImage2D(Vt.TEXTURE_CUBE_MAP_POSITIVE_X + n, u, s, l.width, l.height, 0, s, h, l.data);
                        else Vt.texImage2D(Vt.TEXTURE_CUBE_MAP_POSITIVE_X + n, 0, s, s, h, i[n]);
                    e.generateMipmaps && o && Vt.generateMipmap(Vt.TEXTURE_CUBE_MAP), e.needsUpdate = !1, e.onUpdate && e.onUpdate()
                } else Vt.activeTexture(Vt.TEXTURE0 + t), Vt.bindTexture(Vt.TEXTURE_CUBE_MAP, e.image.__webglTextureCube)
        }

        function ut(e, t) {
            Vt.activeTexture(Vt.TEXTURE0 + t), Vt.bindTexture(Vt.TEXTURE_CUBE_MAP, e.__webglTexture)
        }

        function ft(e, t, r) {
            Vt.bindFramebuffer(Vt.FRAMEBUFFER, e), Vt.framebufferTexture2D(Vt.FRAMEBUFFER, Vt.COLOR_ATTACHMENT0, r, t.__webglTexture, 0)
        }

        function Et(e, t) {
            Vt.bindRenderbuffer(Vt.RENDERBUFFER, e), t.depthBuffer && !t.stencilBuffer ? (Vt.renderbufferStorage(Vt.RENDERBUFFER, Vt.DEPTH_COMPONENT16, t.width, t.height), Vt.framebufferRenderbuffer(Vt.FRAMEBUFFER, Vt.DEPTH_ATTACHMENT, Vt.RENDERBUFFER, e)) : t.depthBuffer && t.stencilBuffer ? (Vt.renderbufferStorage(Vt.RENDERBUFFER, Vt.DEPTH_STENCIL, t.width, t.height), Vt.framebufferRenderbuffer(Vt.FRAMEBUFFER, Vt.DEPTH_STENCIL_ATTACHMENT, Vt.RENDERBUFFER, e)) : Vt.renderbufferStorage(Vt.RENDERBUFFER, Vt.RGBA4, t.width, t.height)
        }

        function pt(e) {
            e instanceof THREE.WebGLRenderTargetCube ? (Vt.bindTexture(Vt.TEXTURE_CUBE_MAP, e.__webglTexture), Vt.generateMipmap(Vt.TEXTURE_CUBE_MAP), Vt.bindTexture(Vt.TEXTURE_CUBE_MAP, null)) : (Vt.bindTexture(Vt.TEXTURE_2D, e.__webglTexture), Vt.generateMipmap(Vt.TEXTURE_2D), Vt.bindTexture(Vt.TEXTURE_2D, null))
        }

        function dt(e) {
            return e === THREE.NearestFilter || e === THREE.NearestMipMapNearestFilter || e === THREE.NearestMipMapLinearFilter ? Vt.NEAREST : Vt.LINEAR
        }

        function mt(e) {
            if (e === THREE.RepeatWrapping) return Vt.REPEAT;
            if (e === THREE.ClampToEdgeWrapping) return Vt.CLAMP_TO_EDGE;
            if (e === THREE.MirroredRepeatWrapping) return Vt.MIRRORED_REPEAT;
            if (e === THREE.NearestFilter) return Vt.NEAREST;
            if (e === THREE.NearestMipMapNearestFilter) return Vt.NEAREST_MIPMAP_NEAREST;
            if (e === THREE.NearestMipMapLinearFilter) return Vt.NEAREST_MIPMAP_LINEAR;
            if (e === THREE.LinearFilter) return Vt.LINEAR;
            if (e === THREE.LinearMipMapNearestFilter) return Vt.LINEAR_MIPMAP_NEAREST;
            if (e === THREE.LinearMipMapLinearFilter) return Vt.LINEAR_MIPMAP_LINEAR;
            if (e === THREE.UnsignedByteType) return Vt.UNSIGNED_BYTE;
            if (e === THREE.UnsignedShort4444Type) return Vt.UNSIGNED_SHORT_4_4_4_4;
            if (e === THREE.UnsignedShort5551Type) return Vt.UNSIGNED_SHORT_5_5_5_1;
            if (e === THREE.UnsignedShort565Type) return Vt.UNSIGNED_SHORT_5_6_5;
            if (e === THREE.ByteType) return Vt.BYTE;
            if (e === THREE.ShortType) return Vt.SHORT;
            if (e === THREE.UnsignedShortType) return Vt.UNSIGNED_SHORT;
            if (e === THREE.IntType) return Vt.INT;
            if (e === THREE.UnsignedIntType) return Vt.UNSIGNED_INT;
            if (e === THREE.FloatType) return Vt.FLOAT;
            if (e === THREE.AlphaFormat) return Vt.ALPHA;
            if (e === THREE.RGBFormat) return Vt.RGB;
            if (e === THREE.RGBAFormat) return Vt.RGBA;
            if (e === THREE.LuminanceFormat) return Vt.LUMINANCE;
            if (e === THREE.LuminanceAlphaFormat) return Vt.LUMINANCE_ALPHA;
            if (e === THREE.AddEquation) return Vt.FUNC_ADD;
            if (e === THREE.SubtractEquation) return Vt.FUNC_SUBTRACT;
            if (e === THREE.ReverseSubtractEquation) return Vt.FUNC_REVERSE_SUBTRACT;
            if (e === THREE.ZeroFactor) return Vt.ZERO;
            if (e === THREE.OneFactor) return Vt.ONE;
            if (e === THREE.SrcColorFactor) return Vt.SRC_COLOR;
            if (e === THREE.OneMinusSrcColorFactor) return Vt.ONE_MINUS_SRC_COLOR;
            if (e === THREE.SrcAlphaFactor) return Vt.SRC_ALPHA;
            if (e === THREE.OneMinusSrcAlphaFactor) return Vt.ONE_MINUS_SRC_ALPHA;
            if (e === THREE.DstAlphaFactor) return Vt.DST_ALPHA;
            if (e === THREE.OneMinusDstAlphaFactor) return Vt.ONE_MINUS_DST_ALPHA;
            if (e === THREE.DstColorFactor) return Vt.DST_COLOR;
            if (e === THREE.OneMinusDstColorFactor) return Vt.ONE_MINUS_DST_COLOR;
            if (e === THREE.SrcAlphaSaturateFactor) return Vt.SRC_ALPHA_SATURATE;
            if (void 0 !== Ot) {
                if (e === THREE.RGB_S3TC_DXT1_Format) return Ot.COMPRESSED_RGB_S3TC_DXT1_EXT;
                if (e === THREE.RGBA_S3TC_DXT1_Format) return Ot.COMPRESSED_RGBA_S3TC_DXT1_EXT;
                if (e === THREE.RGBA_S3TC_DXT3_Format) return Ot.COMPRESSED_RGBA_S3TC_DXT3_EXT;
                if (e === THREE.RGBA_S3TC_DXT5_Format) return Ot.COMPRESSED_RGBA_S3TC_DXT5_EXT
            }
            return 0
        }

        function vt(e) {
            if (Ar && e && e.skeleton && e.skeleton.useVertexTexture) return 1024;
            var t = Vt.getParameter(Vt.MAX_VERTEX_UNIFORM_VECTORS),
                r = Math.floor((t - 20) / 4),
                i = r;
            return void 0 !== e && e instanceof THREE.SkinnedMesh && (i = Math.min(e.skeleton.bones.length, i), i < e.skeleton.bones.length && console.warn("WebGLRenderer: too many bones - " + e.skeleton.bones.length + ", this GPU supports just " + i + " (try OpenGL instead of ANGLE)")), i
        }

        function gt(e) {
            for (var t = 0, r = 0, i = 0, n = 0, a = 0, o = e.length; o > a; a++) {
                var s = e[a];
                s.onlyShadow || s.visible === !1 || (s instanceof THREE.DirectionalLight && t++, s instanceof THREE.PointLight && r++, s instanceof THREE.SpotLight && i++, s instanceof THREE.HemisphereLight && n++)
            }
            return {
                directional: t,
                point: r,
                spot: i,
                hemi: n
            }
        }

        function Tt(e) {
            for (var t = 0, r = 0, i = e.length; i > r; r++) {
                var n = e[r];
                n.castShadow && (n instanceof THREE.SpotLight && t++, n instanceof THREE.DirectionalLight && !n.shadowCascade && t++)
            }
            return t
        }

        function yt() {
            try {
                var e = {
                    alpha: _t,
                    depth: wt,
                    stencil: Mt,
                    antialias: St,
                    premultipliedAlpha: Ct,
                    preserveDrawingBuffer: At
                };
                if (Vt = Ht || xt.getContext("webgl", e) || xt.getContext("experimental-webgl", e), null === Vt) throw "Error creating WebGL context."
            } catch (t) {
                console.error(t)
            }
            zt = Vt.getExtension("OES_texture_float"), Bt = Vt.getExtension("OES_texture_float_linear"), kt = Vt.getExtension("OES_standard_derivatives"), Nt = Vt.getExtension("EXT_texture_filter_anisotropic") || Vt.getExtension("MOZ_EXT_texture_filter_anisotropic") || Vt.getExtension("WEBKIT_EXT_texture_filter_anisotropic"), Ot = Vt.getExtension("WEBGL_compressed_texture_s3tc") || Vt.getExtension("MOZ_WEBGL_compressed_texture_s3tc") || Vt.getExtension("WEBKIT_WEBGL_compressed_texture_s3tc"), It = Vt.getExtension("OES_element_index_uint"), null === zt && console.log("THREE.WebGLRenderer: Float textures not supported."), null === kt && console.log("THREE.WebGLRenderer: Standard derivatives not supported."), null === Nt && console.log("THREE.WebGLRenderer: Anisotropic texture filtering not supported."), null === Ot && console.log("THREE.WebGLRenderer: S3TC compressed textures not supported."), null === It && console.log("THREE.WebGLRenderer: elementindex as unsigned integer not supported."), void 0 === Vt.getShaderPrecisionFormat && (Vt.getShaderPrecisionFormat = function() {
                return {
                    rangeMin: 1,
                    rangeMax: 1,
                    precision: 1
                }
            }), Lt && (Gt = Vt.getExtension("EXT_frag_depth"))
        }

        function Rt() {
            Vt.clearColor(0, 0, 0, 1), Vt.clearDepth(1), Vt.clearStencil(0), Vt.enable(Vt.DEPTH_TEST), Vt.depthFunc(Vt.LEQUAL), Vt.frontFace(Vt.CCW), Vt.cullFace(Vt.BACK), Vt.enable(Vt.CULL_FACE), Vt.enable(Vt.BLEND), Vt.blendEquation(Vt.FUNC_ADD), Vt.blendFunc(Vt.SRC_ALPHA, Vt.ONE_MINUS_SRC_ALPHA), Vt.viewport(cr, ur, fr, Er), Vt.clearColor(Pt.r, Pt.g, Pt.b, Ft)
        }
        console.log("THREE.WebGLRenderer", THREE.REVISION), e = e || {};
        var xt = void 0 !== e.canvas ? e.canvas : document.createElement("canvas"),
            Ht = void 0 !== e.context ? e.context : null,
            bt = void 0 !== e.precision ? e.precision : "highp",
            _t = void 0 !== e.alpha ? e.alpha : !1,
            wt = void 0 !== e.depth ? e.depth : !0,
            Mt = void 0 !== e.stencil ? e.stencil : !0,
            St = void 0 !== e.antialias ? e.antialias : !1,
            Ct = void 0 !== e.premultipliedAlpha ? e.premultipliedAlpha : !0,
            At = void 0 !== e.preserveDrawingBuffer ? e.preserveDrawingBuffer : !1,
            Lt = void 0 !== e.logarithmicDepthBuffer ? e.logarithmicDepthBuffer : !1,
            Pt = new THREE.Color(0),
            Ft = 0,
            Dt = [],
            Ut = [];
        this.domElement = xt, this.context = null, this.devicePixelRatio = void 0 !== e.devicePixelRatio ? e.devicePixelRatio : void 0 !== self.devicePixelRatio ? self.devicePixelRatio : 1, this.autoClear = !0, this.autoClearColor = !0, this.autoClearDepth = !0, this.autoClearStencil = !0, this.sortObjects = !0, this.gammaInput = !1, this.gammaOutput = !1, this.shadowMapEnabled = !1, this.shadowMapAutoUpdate = !0, this.shadowMapType = THREE.PCFShadowMap, this.shadowMapCullFace = THREE.CullFaceFront, this.shadowMapDebug = !1, this.shadowMapCascade = !1, this.maxMorphTargets = 8, this.maxMorphNormals = 4, this.autoScaleCubemaps = !0, this.renderPluginsPre = [], this.renderPluginsPost = [], this.info = {
            memory: {
                programs: 0,
                geometries: 0,
                textures: 0
            },
            render: {
                calls: 0,
                vertices: 0,
                faces: 0,
                points: 0
            }
        };
        var Vt, zt, Bt, kt, Nt, Ot, It, Gt, Wt = this,
            jt = [],
            Xt = null,
            Yt = null,
            qt = -1,
            Kt = null,
            Zt = null,
            Qt = 0,
            Jt = -1,
            $t = -1,
            er = -1,
            tr = -1,
            rr = -1,
            ir = -1,
            nr = -1,
            ar = -1,
            or = null,
            sr = null,
            hr = null,
            lr = null,
            cr = 0,
            ur = 0,
            fr = xt.width,
            Er = xt.height,
            pr = 0,
            dr = 0,
            mr = new Uint8Array(16),
            vr = new Uint8Array(16),
            gr = new THREE.Frustum,
            Tr = new THREE.Matrix4,
            yr = new THREE.Matrix4,
            Rr = new THREE.Vector3,
            xr = new THREE.Vector3,
            Hr = !0,
            br = {
                ambient: [0, 0, 0],
                directional: {
                    length: 0,
                    colors: [],
                    positions: []
                },
                point: {
                    length: 0,
                    colors: [],
                    positions: [],
                    distances: []
                },
                spot: {
                    length: 0,
                    colors: [],
                    positions: [],
                    distances: [],
                    directions: [],
                    anglesCos: [],
                    exponents: []
                },
                hemi: {
                    length: 0,
                    skyColors: [],
                    groundColors: [],
                    positions: []
                }
            };
        yt(), Rt(), this.context = Vt;
        var _r = Vt.getParameter(Vt.MAX_TEXTURE_IMAGE_UNITS),
            wr = Vt.getParameter(Vt.MAX_VERTEX_TEXTURE_IMAGE_UNITS),
            Mr = (Vt.getParameter(Vt.MAX_TEXTURE_SIZE), Vt.getParameter(Vt.MAX_CUBE_MAP_TEXTURE_SIZE)),
            Sr = Nt ? Vt.getParameter(Nt.MAX_TEXTURE_MAX_ANISOTROPY_EXT) : 0,
            Cr = wr > 0,
            Ar = Cr && zt,
            Lr = (Ot ? Vt.getParameter(Vt.COMPRESSED_TEXTURE_FORMATS) : [], Vt.getShaderPrecisionFormat(Vt.VERTEX_SHADER, Vt.HIGH_FLOAT)),
            Pr = Vt.getShaderPrecisionFormat(Vt.VERTEX_SHADER, Vt.MEDIUM_FLOAT),
            Fr = (Vt.getShaderPrecisionFormat(Vt.VERTEX_SHADER, Vt.LOW_FLOAT), Vt.getShaderPrecisionFormat(Vt.FRAGMENT_SHADER, Vt.HIGH_FLOAT)),
            Dr = Vt.getShaderPrecisionFormat(Vt.FRAGMENT_SHADER, Vt.MEDIUM_FLOAT),
            Ur = (Vt.getShaderPrecisionFormat(Vt.FRAGMENT_SHADER, Vt.LOW_FLOAT), Lr.precision > 0 && Fr.precision > 0),
            Vr = Pr.precision > 0 && Dr.precision > 0;
        "highp" !== bt || Ur || (Vr ? (bt = "mediump", console.warn("THREE.WebGLRenderer: highp not supported, using mediump.")) : (bt = "lowp", console.warn("THREE.WebGLRenderer: highp and mediump not supported, using lowp."))), "mediump" !== bt || Vr || (bt = "lowp", console.warn("THREE.WebGLRenderer: mediump not supported, using lowp.")), this.getContext = function() {
            return Vt
        }, this.supportsVertexTextures = function() {
            return Cr
        }, this.supportsFloatTextures = function() {
            return zt
        }, this.supportsStandardDerivatives = function() {
            return kt
        }, this.supportsCompressedTextureS3TC = function() {
            return Ot
        }, this.getMaxAnisotropy = function() {
            return Sr
        }, this.getPrecision = function() {
            return bt
        }, this.setSize = function(e, t, r) {
            xt.width = e * this.devicePixelRatio, xt.height = t * this.devicePixelRatio, r !== !1 && (xt.style.width = e + "px", xt.style.height = t + "px"), this.setViewport(0, 0, e, t)
        }, this.setViewport = function(e, t, r, i) {
            cr = e * this.devicePixelRatio, ur = t * this.devicePixelRatio, fr = r * this.devicePixelRatio, Er = i * this.devicePixelRatio, Vt.viewport(cr, ur, fr, Er)
        }, this.setScissor = function(e, t, r, i) {
            Vt.scissor(e * this.devicePixelRatio, t * this.devicePixelRatio, r * this.devicePixelRatio, i * this.devicePixelRatio)
        }, this.enableScissorTest = function(e) {
            e ? Vt.enable(Vt.SCISSOR_TEST) : Vt.disable(Vt.SCISSOR_TEST)
        }, this.setClearColor = function(e, t) {
            Pt.set(e), Ft = void 0 !== t ? t : 1, Vt.clearColor(Pt.r, Pt.g, Pt.b, Ft)
        }, this.setClearColorHex = function(e, t) {
            console.warn("THREE.WebGLRenderer: .setClearColorHex() is being removed. Use .setClearColor() instead."), this.setClearColor(e, t)
        }, this.getClearColor = function() {
            return Pt
        }, this.getClearAlpha = function() {
            return Ft
        }, this.clear = function(e, t, r) {
            var i = 0;
            (void 0 === e || e) && (i |= Vt.COLOR_BUFFER_BIT), (void 0 === t || t) && (i |= Vt.DEPTH_BUFFER_BIT), (void 0 === r || r) && (i |= Vt.STENCIL_BUFFER_BIT), Vt.clear(i)
        }, this.clearColor = function() {
            Vt.clear(Vt.COLOR_BUFFER_BIT)
        }, this.clearDepth = function() {
            Vt.clear(Vt.DEPTH_BUFFER_BIT)
        }, this.clearStencil = function() {
            Vt.clear(Vt.STENCIL_BUFFER_BIT)
        }, this.clearTarget = function(e, t, r, i) {
            this.setRenderTarget(e), this.clear(t, r, i)
        }, this.addPostPlugin = function(e) {
            e.init(this), this.renderPluginsPost.push(e)
        }, this.addPrePlugin = function(e) {
            e.init(this), this.renderPluginsPre.push(e)
        }, this.updateShadowMap = function(e, t) {
            Xt = null, er = -1, nr = -1, ar = -1, Kt = -1, qt = -1, Hr = !0, Jt = -1, $t = -1, Xr(e), this.shadowMapPlugin.update(e, t)
        };
        var zr = function(e) {
                var t = e.target;
                t.removeEventListener("dispose", zr), Ir(t)
            },
            Br = function(e) {
                var t = e.target;
                t.removeEventListener("dispose", Br), Gr(t), Wt.info.memory.textures--
            },
            kr = function(e) {
                var t = e.target;
                t.removeEventListener("dispose", kr), Wr(t), Wt.info.memory.textures--
            },
            Nr = function(e) {
                var t = e.target;
                t.removeEventListener("dispose", Nr), jr(t)
            },
            Or = function(e) {
                if (void 0 !== e.__webglVertexBuffer && Vt.deleteBuffer(e.__webglVertexBuffer), void 0 !== e.__webglNormalBuffer && Vt.deleteBuffer(e.__webglNormalBuffer), void 0 !== e.__webglTangentBuffer && Vt.deleteBuffer(e.__webglTangentBuffer), void 0 !== e.__webglColorBuffer && Vt.deleteBuffer(e.__webglColorBuffer), void 0 !== e.__webglUVBuffer && Vt.deleteBuffer(e.__webglUVBuffer), void 0 !== e.__webglUV2Buffer && Vt.deleteBuffer(e.__webglUV2Buffer), void 0 !== e.__webglSkinIndicesBuffer && Vt.deleteBuffer(e.__webglSkinIndicesBuffer), void 0 !== e.__webglSkinWeightsBuffer && Vt.deleteBuffer(e.__webglSkinWeightsBuffer), void 0 !== e.__webglFaceBuffer && Vt.deleteBuffer(e.__webglFaceBuffer), void 0 !== e.__webglLineBuffer && Vt.deleteBuffer(e.__webglLineBuffer), void 0 !== e.__webglLineDistanceBuffer && Vt.deleteBuffer(e.__webglLineDistanceBuffer), void 0 !== e.__webglCustomAttributesList)
                    for (var t in e.__webglCustomAttributesList) Vt.deleteBuffer(e.__webglCustomAttributesList[t].buffer);
                Wt.info.memory.geometries--
            },
            Ir = function(e) {
                if (e.__webglInit = void 0, e instanceof THREE.BufferGeometry) {
                    var t = e.attributes;
                    for (var r in t) void 0 !== t[r].buffer && Vt.deleteBuffer(t[r].buffer);
                    Wt.info.memory.geometries--
                } else if (void 0 !== e.geometryGroups)
                    for (var i = 0, n = e.geometryGroupsList.length; n > i; i++) {
                        var a = e.geometryGroupsList[i];
                        if (void 0 !== a.numMorphTargets)
                            for (var o = 0, s = a.numMorphTargets; s > o; o++) Vt.deleteBuffer(a.__webglMorphTargetsBuffers[o]);
                        if (void 0 !== a.numMorphNormals)
                            for (var o = 0, s = a.numMorphNormals; s > o; o++) Vt.deleteBuffer(a.__webglMorphNormalsBuffers[o]);
                        Or(a)
                    } else Or(e)
            },
            Gr = function(e) {
                if (e.image && e.image.__webglTextureCube) Vt.deleteTexture(e.image.__webglTextureCube);
                else {
                    if (!e.__webglInit) return;
                    e.__webglInit = !1, Vt.deleteTexture(e.__webglTexture)
                }
            },
            Wr = function(e) {
                if (e && e.__webglTexture)
                    if (Vt.deleteTexture(e.__webglTexture), e instanceof THREE.WebGLRenderTargetCube)
                        for (var t = 0; 6 > t; t++) Vt.deleteFramebuffer(e.__webglFramebuffer[t]), Vt.deleteRenderbuffer(e.__webglRenderbuffer[t]);
                    else Vt.deleteFramebuffer(e.__webglFramebuffer), Vt.deleteRenderbuffer(e.__webglRenderbuffer)
            },
            jr = function(e) {
                var t = e.program.program;
                if (void 0 !== t) {
                    e.program = void 0;
                    var r, i, n, a = !1;
                    for (r = 0, i = jt.length; i > r; r++)
                        if (n = jt[r], n.program === t) {
                            n.usedTimes--, 0 === n.usedTimes && (a = !0);
                            break
                        }
                    if (a === !0) {
                        var o = [];
                        for (r = 0, i = jt.length; i > r; r++) n = jt[r], n.program !== t && o.push(n);
                        jt = o, Vt.deleteProgram(t), Wt.info.memory.programs--
                    }
                }
            };
        this.renderBufferImmediate = function(e, t, r) {
            if (T(), e.hasPositions && !e.__webglVertexBuffer && (e.__webglVertexBuffer = Vt.createBuffer()), e.hasNormals && !e.__webglNormalBuffer && (e.__webglNormalBuffer = Vt.createBuffer()), e.hasUvs && !e.__webglUvBuffer && (e.__webglUvBuffer = Vt.createBuffer()), e.hasColors && !e.__webglColorBuffer && (e.__webglColorBuffer = Vt.createBuffer()), e.hasPositions && (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglVertexBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, e.positionArray, Vt.DYNAMIC_DRAW), y(t.attributes.position), Vt.vertexAttribPointer(t.attributes.position, 3, Vt.FLOAT, !1, 0, 0)), e.hasNormals) {
                if (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglNormalBuffer), r.shading === THREE.FlatShading) {
                    var i, n, a, o, s, h, l, c, u, f, E, p, d, m, v = 3 * e.count;
                    for (m = 0; v > m; m += 9) d = e.normalArray, o = d[m], l = d[m + 1], f = d[m + 2], s = d[m + 3], c = d[m + 4], E = d[m + 5], h = d[m + 6], u = d[m + 7], p = d[m + 8], i = (o + s + h) / 3, n = (l + c + u) / 3, a = (f + E + p) / 3, d[m] = i, d[m + 1] = n, d[m + 2] = a, d[m + 3] = i, d[m + 4] = n, d[m + 5] = a, d[m + 6] = i, d[m + 7] = n, d[m + 8] = a
                }
                Vt.bufferData(Vt.ARRAY_BUFFER, e.normalArray, Vt.DYNAMIC_DRAW), y(t.attributes.normal), Vt.vertexAttribPointer(t.attributes.normal, 3, Vt.FLOAT, !1, 0, 0)
            }
            e.hasUvs && r.map && (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglUvBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, e.uvArray, Vt.DYNAMIC_DRAW), y(t.attributes.uv), Vt.vertexAttribPointer(t.attributes.uv, 2, Vt.FLOAT, !1, 0, 0)), e.hasColors && r.vertexColors !== THREE.NoColors && (Vt.bindBuffer(Vt.ARRAY_BUFFER, e.__webglColorBuffer), Vt.bufferData(Vt.ARRAY_BUFFER, e.colorArray, Vt.DYNAMIC_DRAW), y(t.attributes.color), Vt.vertexAttribPointer(t.attributes.color, 3, Vt.FLOAT, !1, 0, 0)), R(), Vt.drawArrays(Vt.TRIANGLES, 0, e.count), e.count = 0
        }, this.renderBufferDirect = function(e, t, r, i, n, a) {
            if (i.visible !== !1) {
                var o = I(e, t, r, i, a),
                    s = o.attributes,
                    h = n.attributes,
                    l = !1,
                    c = i.wireframe ? 1 : 0,
                    u = 16777215 * n.id + 2 * o.id + c;
                if (u !== Kt && (Kt = u, l = !0), l && T(), a instanceof THREE.Mesh) {
                    var f = h.index;
                    if (f) {
                        var E, p;
                        f.array instanceof Uint32Array ? (E = Vt.UNSIGNED_INT, p = 4) : (E = Vt.UNSIGNED_SHORT, p = 2);
                        var d = n.offsets;
                        if (0 === d.length) l && (g(i, s, h, 0), Vt.bindBuffer(Vt.ELEMENT_ARRAY_BUFFER, f.buffer)), Vt.drawElements(Vt.TRIANGLES, f.array.length, E, 0), Wt.info.render.calls++, Wt.info.render.vertices += f.array.length, Wt.info.render.faces += f.array.length / 3;
                        else {
                            l = !0;
                            for (var m = 0, v = d.length; v > m; m++) {
                                var y = d[m].index;
                                l && (g(i, s, h, y), Vt.bindBuffer(Vt.ELEMENT_ARRAY_BUFFER, f.buffer)), Vt.drawElements(Vt.TRIANGLES, d[m].count, E, d[m].start * p), Wt.info.render.calls++, Wt.info.render.vertices += d[m].count, Wt.info.render.faces += d[m].count / 3
                            }
                        }
                    } else {
                        l && g(i, s, h, 0);
                        var R = n.attributes.position;
                        Vt.drawArrays(Vt.TRIANGLES, 0, R.array.length / 3), Wt.info.render.calls++, Wt.info.render.vertices += R.array.length / 3, Wt.info.render.faces += R.array.length / 9
                    }
                } else if (a instanceof THREE.PointCloud) {
                    l && g(i, s, h, 0);
                    var R = h.position;
                    Vt.drawArrays(Vt.POINTS, 0, R.array.length / 3), Wt.info.render.calls++, Wt.info.render.points += R.array.length / 3
                } else if (a instanceof THREE.Line) {
                    var x = a.type === THREE.LineStrip ? Vt.LINE_STRIP : Vt.LINES;
                    ot(i.linewidth);
                    var f = h.index;
                    if (f) {
                        var E, p;
                        f.array instanceof Uint32Array ? (E = Vt.UNSIGNED_INT, p = 4) : (E = Vt.UNSIGNED_SHORT, p = 2);
                        var d = n.offsets;
                        if (0 === d.length) l && (g(i, s, h, 0), Vt.bindBuffer(Vt.ELEMENT_ARRAY_BUFFER, f.buffer)), Vt.drawElements(x, f.array.length, E, 0), Wt.info.render.calls++, Wt.info.render.vertices += f.array.length;
                        else {
                            d.length > 1 && (l = !0);
                            for (var m = 0, v = d.length; v > m; m++) {
                                var y = d[m].index;
                                l && (g(i, s, h, y), Vt.bindBuffer(Vt.ELEMENT_ARRAY_BUFFER, f.buffer)), Vt.drawElements(x, d[m].count, E, d[m].start * p), Wt.info.render.calls++, Wt.info.render.vertices += d[m].count
                            }
                        }
                    } else {
                        l && g(i, s, h, 0);
                        var R = h.position;
                        Vt.drawArrays(x, 0, R.array.length / 3), Wt.info.render.calls++, Wt.info.render.points += R.array.length / 3
                    }
                }
            }
        }, this.renderBuffer = function(e, t, r, i, n, a) {
            if (i.visible !== !1) {
                var o, s, h, l = I(e, t, r, i, a),
                    c = l.attributes,
                    u = !1,
                    f = i.wireframe ? 1 : 0,
                    E = 16777215 * n.id + 2 * l.id + f;
                if (E !== Kt && (Kt = E, u = !0), u && T(), !i.morphTargets && c.position >= 0 ? u && (Vt.bindBuffer(Vt.ARRAY_BUFFER, n.__webglVertexBuffer), y(c.position), Vt.vertexAttribPointer(c.position, 3, Vt.FLOAT, !1, 0, 0)) : a.morphTargetBase && x(i, n, a), u) {
                    if (n.__webglCustomAttributesList)
                        for (s = 0, h = n.__webglCustomAttributesList.length; h > s; s++) o = n.__webglCustomAttributesList[s], c[o.buffer.belongsToAttribute] >= 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, o.buffer), y(c[o.buffer.belongsToAttribute]), Vt.vertexAttribPointer(c[o.buffer.belongsToAttribute], o.size, Vt.FLOAT, !1, 0, 0));
                    c.color >= 0 && (a.geometry.colors.length > 0 || a.geometry.faces.length > 0 ? (Vt.bindBuffer(Vt.ARRAY_BUFFER, n.__webglColorBuffer), y(c.color), Vt.vertexAttribPointer(c.color, 3, Vt.FLOAT, !1, 0, 0)) : i.defaultAttributeValues && Vt.vertexAttrib3fv(c.color, i.defaultAttributeValues.color)), c.normal >= 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, n.__webglNormalBuffer), y(c.normal), Vt.vertexAttribPointer(c.normal, 3, Vt.FLOAT, !1, 0, 0)), c.tangent >= 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, n.__webglTangentBuffer), y(c.tangent), Vt.vertexAttribPointer(c.tangent, 4, Vt.FLOAT, !1, 0, 0)), c.uv >= 0 && (a.geometry.faceVertexUvs[0] ? (Vt.bindBuffer(Vt.ARRAY_BUFFER, n.__webglUVBuffer), y(c.uv), Vt.vertexAttribPointer(c.uv, 2, Vt.FLOAT, !1, 0, 0)) : i.defaultAttributeValues && Vt.vertexAttrib2fv(c.uv, i.defaultAttributeValues.uv)), c.uv2 >= 0 && (a.geometry.faceVertexUvs[1] ? (Vt.bindBuffer(Vt.ARRAY_BUFFER, n.__webglUV2Buffer), y(c.uv2), Vt.vertexAttribPointer(c.uv2, 2, Vt.FLOAT, !1, 0, 0)) : i.defaultAttributeValues && Vt.vertexAttrib2fv(c.uv2, i.defaultAttributeValues.uv2)), i.skinning && c.skinIndex >= 0 && c.skinWeight >= 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, n.__webglSkinIndicesBuffer), y(c.skinIndex), Vt.vertexAttribPointer(c.skinIndex, 4, Vt.FLOAT, !1, 0, 0), Vt.bindBuffer(Vt.ARRAY_BUFFER, n.__webglSkinWeightsBuffer), y(c.skinWeight), Vt.vertexAttribPointer(c.skinWeight, 4, Vt.FLOAT, !1, 0, 0)), c.lineDistance >= 0 && (Vt.bindBuffer(Vt.ARRAY_BUFFER, n.__webglLineDistanceBuffer), y(c.lineDistance), Vt.vertexAttribPointer(c.lineDistance, 1, Vt.FLOAT, !1, 0, 0))
                }
                if (R(), a instanceof THREE.Mesh) {
                    var p = n.__typeArray === Uint32Array ? Vt.UNSIGNED_INT : Vt.UNSIGNED_SHORT;
                    i.wireframe ? (ot(i.wireframeLinewidth), u && Vt.bindBuffer(Vt.ELEMENT_ARRAY_BUFFER, n.__webglLineBuffer), Vt.drawElements(Vt.LINES, n.__webglLineCount, p, 0)) : (u && Vt.bindBuffer(Vt.ELEMENT_ARRAY_BUFFER, n.__webglFaceBuffer), Vt.drawElements(Vt.TRIANGLES, n.__webglFaceCount, p, 0)), Wt.info.render.calls++, Wt.info.render.vertices += n.__webglFaceCount, Wt.info.render.faces += n.__webglFaceCount / 3
                } else if (a instanceof THREE.Line) {
                    var d = a.type === THREE.LineStrip ? Vt.LINE_STRIP : Vt.LINES;
                    ot(i.linewidth), Vt.drawArrays(d, 0, n.__webglLineCount), Wt.info.render.calls++
                } else a instanceof THREE.PointCloud && (Vt.drawArrays(Vt.POINTS, 0, n.__webglParticleCount), Wt.info.render.calls++, Wt.info.render.points += n.__webglParticleCount)
            }
        }, this.render = function(e, t, r, i) {
            function n(e) {
                e instanceof THREE.SkinnedMesh && e.skeleton.update();
                for (var t = 0, r = e.children.length; r > t; t++) n(e.children[t])
            }
            if (t instanceof THREE.Camera == !1) return void console.error("THREE.WebGLRenderer.render: camera is not an instance of THREE.Camera.");
            var a, o, s, h, l, c = e.__lights,
                u = e.fog;
            for (qt = -1, Zt = null, Hr = !0, e.autoUpdate === !0 && e.updateMatrixWorld(), void 0 === t.parent && t.updateMatrixWorld(), n(e), t.matrixWorldInverse.getInverse(t.matrixWorld), Tr.multiplyMatrices(t.projectionMatrix, t.matrixWorldInverse), gr.setFromMatrix(Tr), Xr(e), Dt.length = 0, Ut.length = 0, w(e, e, t), Wt.sortObjects === !0 && (Dt.sort(H), Ut.sort(b)), M(this.renderPluginsPre, e, t), Wt.info.render.calls = 0, Wt.info.render.vertices = 0, Wt.info.render.faces = 0, Wt.info.render.points = 0, this.setRenderTarget(r), (this.autoClear || i) && this.clear(this.autoClearColor, this.autoClearDepth, this.autoClearStencil), l = e.__webglObjectsImmediate, a = 0, o = l.length; o > a; a++) s = l[a], h = s.object, h.visible && (rt(h, t), A(s));
            if (e.overrideMaterial) {
                var f = e.overrideMaterial;
                this.setBlending(f.blending, f.blendEquation, f.blendSrc, f.blendDst), this.setDepthTest(f.depthTest), this.setDepthWrite(f.depthWrite), st(f.polygonOffset, f.polygonOffsetFactor, f.polygonOffsetUnits), S(Dt, t, c, u, !0, f), S(Ut, t, c, u, !0, f), C(e.__webglObjectsImmediate, "", t, c, u, !1, f)
            } else {
                var f = null;
                this.setBlending(THREE.NoBlending), S(Dt, t, c, u, !1, f), C(e.__webglObjectsImmediate, "opaque", t, c, u, !1, f), S(Ut, t, c, u, !0, f), C(e.__webglObjectsImmediate, "transparent", t, c, u, !0, f)
            }
            M(this.renderPluginsPost, e, t), r && r.generateMipmaps && r.minFilter !== THREE.NearestFilter && r.minFilter !== THREE.LinearFilter && pt(r), this.setDepthTest(!0), this.setDepthWrite(!0)
        }, this.renderImmediateObject = function(e, t, r, i, n) {
            var a = I(e, t, r, i, n);
            Kt = -1, Wt.setMaterialFaces(i), n.immediateRenderCallback ? n.immediateRenderCallback(a, Vt, gr) : n.render(function(e) {
                Wt.renderBufferImmediate(e, a, i)
            })
        };
        var Xr = function(e) {
            for (e.__webglObjects || (e.__webglObjects = {}, e.__webglObjectsImmediate = []); e.__objectsAdded.length;) P(e.__objectsAdded[0], e), e.__objectsAdded.splice(0, 1);
            for (; e.__objectsRemoved.length;) k(e.__objectsRemoved[0], e), e.__objectsRemoved.splice(0, 1)
        };
        this.initMaterial = function(e, t, r, i) {
            e.addEventListener("dispose", Nr);
            var n, a, o, s, h, l, c;
            if (e instanceof THREE.MeshDepthMaterial ? c = "depth" : e instanceof THREE.MeshNormalMaterial ? c = "normal" : e instanceof THREE.MeshBasicMaterial ? c = "basic" : e instanceof THREE.MeshLambertMaterial ? c = "lambert" : e instanceof THREE.MeshPhongMaterial ? c = "phong" : e instanceof THREE.LineBasicMaterial ? c = "basic" : e instanceof THREE.LineDashedMaterial ? c = "dashed" : e instanceof THREE.PointCloudMaterial && (c = "particle_basic"), c) {
                var u = THREE.ShaderLib[c];
                e.__webglShader = {
                    uniforms: THREE.UniformsUtils.clone(u.uniforms),
                    vertexShader: u.vertexShader,
                    fragmentShader: u.fragmentShader
                }
            } else e.__webglShader = {
                uniforms: e.uniforms,
                vertexShader: e.vertexShader,
                fragmentShader: e.fragmentShader
            };
            s = gt(t), l = Tt(t), h = vt(i), o = {
                precision: bt,
                supportsVertexTextures: Cr,
                map: !!e.map,
                envMap: !!e.envMap,
                lightMap: !!e.lightMap,
                bumpMap: !!e.bumpMap,
                normalMap: !!e.normalMap,
                specularMap: !!e.specularMap,
                alphaMap: !!e.alphaMap,
                vertexColors: e.vertexColors,
                fog: r,
                useFog: e.fog,
                fogExp: r instanceof THREE.FogExp2,
                sizeAttenuation: e.sizeAttenuation,
                logarithmicDepthBuffer: Lt,
                skinning: e.skinning,
                maxBones: h,
                useVertexTexture: Ar && i && i.skeleton && i.skeleton.useVertexTexture,
                morphTargets: e.morphTargets,
                morphNormals: e.morphNormals,
                maxMorphTargets: this.maxMorphTargets,
                maxMorphNormals: this.maxMorphNormals,
                maxDirLights: s.directional,
                maxPointLights: s.point,
                maxSpotLights: s.spot,
                maxHemiLights: s.hemi,
                maxShadows: l,
                shadowMapEnabled: this.shadowMapEnabled && i.receiveShadow && l > 0,
                shadowMapType: this.shadowMapType,
                shadowMapDebug: this.shadowMapDebug,
                shadowMapCascade: this.shadowMapCascade,
                alphaTest: e.alphaTest,
                metal: e.metal,
                wrapAround: e.wrapAround,
                doubleSided: e.side === THREE.DoubleSide,
                flipSided: e.side === THREE.BackSide
            };
            var f = [];
            c ? f.push(c) : (f.push(e.fragmentShader), f.push(e.vertexShader));
            for (var E in e.defines) f.push(E), f.push(e.defines[E]);
            for (var p in o) f.push(p), f.push(o[p]);
            for (var d, m = f.join(), p = 0, v = jt.length; v > p; p++) {
                var g = jt[p];
                if (g.code === m) {
                    d = g, d.usedTimes++;
                    break
                }
            }
            void 0 === d && (d = new THREE.WebGLProgram(this, m, e, o), jt.push(d), Wt.info.memory.programs = jt.length), e.program = d;
            var T = e.program.attributes;
            if (e.morphTargets) {
                e.numSupportedMorphTargets = 0;
                var y, R = "morphTarget";
                for (a = 0; a < this.maxMorphTargets; a++) y = R + a, T[y] >= 0 && e.numSupportedMorphTargets++
            }
            if (e.morphNormals) {
                e.numSupportedMorphNormals = 0;
                var y, R = "morphNormal";
                for (a = 0; a < this.maxMorphNormals; a++) y = R + a, T[y] >= 0 && e.numSupportedMorphNormals++
            }
            e.uniformsList = [];
            for (n in e.__webglShader.uniforms) {
                var x = e.program.uniforms[n];
                x && e.uniformsList.push([e.__webglShader.uniforms[n], x])
            }
        }, this.setFaceCulling = function(e, t) {
            e === THREE.CullFaceNone ? Vt.disable(Vt.CULL_FACE) : (Vt.frontFace(t === THREE.FrontFaceDirectionCW ? Vt.CW : Vt.CCW), Vt.cullFace(e === THREE.CullFaceBack ? Vt.BACK : e === THREE.CullFaceFront ? Vt.FRONT : Vt.FRONT_AND_BACK), Vt.enable(Vt.CULL_FACE))
        }, this.setMaterialFaces = function(e) {
            var t = e.side === THREE.DoubleSide,
                r = e.side === THREE.BackSide;
            Jt !== t && (t ? Vt.disable(Vt.CULL_FACE) : Vt.enable(Vt.CULL_FACE), Jt = t), $t !== r && (Vt.frontFace(r ? Vt.CW : Vt.CCW), $t = r)
        }, this.setDepthTest = function(e) {
            nr !== e && (e ? Vt.enable(Vt.DEPTH_TEST) : Vt.disable(Vt.DEPTH_TEST), nr = e)
        }, this.setDepthWrite = function(e) {
            ar !== e && (Vt.depthMask(e), ar = e)
        }, this.setBlending = function(e, t, r, i) {
            e !== er && (e === THREE.NoBlending ? Vt.disable(Vt.BLEND) : e === THREE.AdditiveBlending ? (Vt.enable(Vt.BLEND), Vt.blendEquation(Vt.FUNC_ADD), Vt.blendFunc(Vt.SRC_ALPHA, Vt.ONE)) : e === THREE.SubtractiveBlending ? (Vt.enable(Vt.BLEND), Vt.blendEquation(Vt.FUNC_ADD), Vt.blendFunc(Vt.ZERO, Vt.ONE_MINUS_SRC_COLOR)) : e === THREE.MultiplyBlending ? (Vt.enable(Vt.BLEND), Vt.blendEquation(Vt.FUNC_ADD), Vt.blendFunc(Vt.ZERO, Vt.SRC_COLOR)) : e === THREE.CustomBlending ? Vt.enable(Vt.BLEND) : (Vt.enable(Vt.BLEND), Vt.blendEquationSeparate(Vt.FUNC_ADD, Vt.FUNC_ADD), Vt.blendFuncSeparate(Vt.SRC_ALPHA, Vt.ONE_MINUS_SRC_ALPHA, Vt.ONE, Vt.ONE_MINUS_SRC_ALPHA)), er = e), e === THREE.CustomBlending ? (t !== tr && (Vt.blendEquation(mt(t)), tr = t), (r !== rr || i !== ir) && (Vt.blendFunc(mt(r), mt(i)), rr = r, ir = i)) : (tr = null, rr = null, ir = null)
        }, this.setTexture = function(e, t) {
            if (e.needsUpdate) {
                e.__webglInit || (e.__webglInit = !0, e.addEventListener("dispose", Br), e.__webglTexture = Vt.createTexture(), Wt.info.memory.textures++), Vt.activeTexture(Vt.TEXTURE0 + t), Vt.bindTexture(Vt.TEXTURE_2D, e.__webglTexture), Vt.pixelStorei(Vt.UNPACK_FLIP_Y_WEBGL, e.flipY), Vt.pixelStorei(Vt.UNPACK_PREMULTIPLY_ALPHA_WEBGL, e.premultiplyAlpha), Vt.pixelStorei(Vt.UNPACK_ALIGNMENT, e.unpackAlignment);
                var r = e.image,
                    i = THREE.Math.isPowerOfTwo(r.width) && THREE.Math.isPowerOfTwo(r.height),
                    n = mt(e.format),
                    a = mt(e.type);
                ht(Vt.TEXTURE_2D, e, i);
                var o, s = e.mipmaps;
                if (e instanceof THREE.DataTexture)
                    if (s.length > 0 && i) {
                        for (var h = 0, l = s.length; l > h; h++) o = s[h], Vt.texImage2D(Vt.TEXTURE_2D, h, n, o.width, o.height, 0, n, a, o.data);
                        e.generateMipmaps = !1
                    } else Vt.texImage2D(Vt.TEXTURE_2D, 0, n, r.width, r.height, 0, n, a, r.data);
                else if (e instanceof THREE.CompressedTexture)
                    for (var h = 0, l = s.length; l > h; h++) o = s[h], e.format !== THREE.RGBAFormat ? Vt.compressedTexImage2D(Vt.TEXTURE_2D, h, n, o.width, o.height, 0, o.data) : Vt.texImage2D(Vt.TEXTURE_2D, h, n, o.width, o.height, 0, n, a, o.data);
                else if (s.length > 0 && i) {
                    for (var h = 0, l = s.length; l > h; h++) o = s[h], Vt.texImage2D(Vt.TEXTURE_2D, h, n, n, a, o);
                    e.generateMipmaps = !1
                } else Vt.texImage2D(Vt.TEXTURE_2D, 0, n, n, a, e.image);
                e.generateMipmaps && i && Vt.generateMipmap(Vt.TEXTURE_2D), e.needsUpdate = !1, e.onUpdate && e.onUpdate()
            } else Vt.activeTexture(Vt.TEXTURE0 + t), Vt.bindTexture(Vt.TEXTURE_2D, e.__webglTexture)
        }, this.setRenderTarget = function(e) {
            var t = e instanceof THREE.WebGLRenderTargetCube;
            if (e && !e.__webglFramebuffer) {
                void 0 === e.depthBuffer && (e.depthBuffer = !0), void 0 === e.stencilBuffer && (e.stencilBuffer = !0), e.addEventListener("dispose", kr), e.__webglTexture = Vt.createTexture(), Wt.info.memory.textures++;
                var r = THREE.Math.isPowerOfTwo(e.width) && THREE.Math.isPowerOfTwo(e.height),
                    i = mt(e.format),
                    n = mt(e.type);
                if (t) {
                    e.__webglFramebuffer = [], e.__webglRenderbuffer = [], Vt.bindTexture(Vt.TEXTURE_CUBE_MAP, e.__webglTexture), ht(Vt.TEXTURE_CUBE_MAP, e, r);
                    for (var a = 0; 6 > a; a++) e.__webglFramebuffer[a] = Vt.createFramebuffer(), e.__webglRenderbuffer[a] = Vt.createRenderbuffer(), Vt.texImage2D(Vt.TEXTURE_CUBE_MAP_POSITIVE_X + a, 0, i, e.width, e.height, 0, i, n, null), ft(e.__webglFramebuffer[a], e, Vt.TEXTURE_CUBE_MAP_POSITIVE_X + a), Et(e.__webglRenderbuffer[a], e);
                    r && Vt.generateMipmap(Vt.TEXTURE_CUBE_MAP)
                } else e.__webglFramebuffer = Vt.createFramebuffer(), e.__webglRenderbuffer = e.shareDepthFrom ? e.shareDepthFrom.__webglRenderbuffer : Vt.createRenderbuffer(), Vt.bindTexture(Vt.TEXTURE_2D, e.__webglTexture), ht(Vt.TEXTURE_2D, e, r), Vt.texImage2D(Vt.TEXTURE_2D, 0, i, e.width, e.height, 0, i, n, null), ft(e.__webglFramebuffer, e, Vt.TEXTURE_2D), e.shareDepthFrom ? e.depthBuffer && !e.stencilBuffer ? Vt.framebufferRenderbuffer(Vt.FRAMEBUFFER, Vt.DEPTH_ATTACHMENT, Vt.RENDERBUFFER, e.__webglRenderbuffer) : e.depthBuffer && e.stencilBuffer && Vt.framebufferRenderbuffer(Vt.FRAMEBUFFER, Vt.DEPTH_STENCIL_ATTACHMENT, Vt.RENDERBUFFER, e.__webglRenderbuffer) : Et(e.__webglRenderbuffer, e), r && Vt.generateMipmap(Vt.TEXTURE_2D);
                t ? Vt.bindTexture(Vt.TEXTURE_CUBE_MAP, null) : Vt.bindTexture(Vt.TEXTURE_2D, null), Vt.bindRenderbuffer(Vt.RENDERBUFFER, null), Vt.bindFramebuffer(Vt.FRAMEBUFFER, null)
            }
            var o, s, h, l, c;
            e ? (o = t ? e.__webglFramebuffer[e.activeCubeFace] : e.__webglFramebuffer, s = e.width, h = e.height, l = 0, c = 0) : (o = null, s = fr, h = Er, l = cr, c = ur), o !== Yt && (Vt.bindFramebuffer(Vt.FRAMEBUFFER, o), Vt.viewport(l, c, s, h), Yt = o), pr = s, dr = h
        }, this.shadowMapPlugin = new THREE.ShadowMapPlugin, this.addPrePlugin(this.shadowMapPlugin), this.addPostPlugin(new THREE.SpritePlugin), this.addPostPlugin(new THREE.LensFlarePlugin)
    }, THREE.WebGLRenderTarget = function(e, t, r) {
        this.width = e, this.height = t, r = r || {}, this.wrapS = void 0 !== r.wrapS ? r.wrapS : THREE.ClampToEdgeWrapping, this.wrapT = void 0 !== r.wrapT ? r.wrapT : THREE.ClampToEdgeWrapping, this.magFilter = void 0 !== r.magFilter ? r.magFilter : THREE.LinearFilter, this.minFilter = void 0 !== r.minFilter ? r.minFilter : THREE.LinearMipMapLinearFilter, this.anisotropy = void 0 !== r.anisotropy ? r.anisotropy : 1, this.offset = new THREE.Vector2(0, 0), this.repeat = new THREE.Vector2(1, 1), this.format = void 0 !== r.format ? r.format : THREE.RGBAFormat, this.type = void 0 !== r.type ? r.type : THREE.UnsignedByteType, this.depthBuffer = void 0 !== r.depthBuffer ? r.depthBuffer : !0, this.stencilBuffer = void 0 !== r.stencilBuffer ? r.stencilBuffer : !0, this.generateMipmaps = !0, this.shareDepthFrom = null
    }, THREE.WebGLRenderTarget.prototype = {
        constructor: THREE.WebGLRenderTarget,
        setSize: function(e, t) {
            this.width = e, this.height = t
        },
        clone: function() {
            var e = new THREE.WebGLRenderTarget(this.width, this.height);
            return e.wrapS = this.wrapS, e.wrapT = this.wrapT, e.magFilter = this.magFilter, e.minFilter = this.minFilter, e.anisotropy = this.anisotropy, e.offset.copy(this.offset), e.repeat.copy(this.repeat), e.format = this.format, e.type = this.type, e.depthBuffer = this.depthBuffer, e.stencilBuffer = this.stencilBuffer, e.generateMipmaps = this.generateMipmaps, e.shareDepthFrom = this.shareDepthFrom, e
        },
        dispose: function() {
            this.dispatchEvent({
                type: "dispose"
            })
        }
    }, THREE.EventDispatcher.prototype.apply(THREE.WebGLRenderTarget.prototype), THREE.WebGLRenderTargetCube = function(e, t, r) {
        THREE.WebGLRenderTarget.call(this, e, t, r), this.activeCubeFace = 0
    }, THREE.WebGLRenderTargetCube.prototype = Object.create(THREE.WebGLRenderTarget.prototype), THREE.WebGLProgram = function() {
        var e = 0,
            t = function(e) {
                var t, r, i = [];
                for (var n in e) t = e[n], t !== !1 && (r = "#define " + n + " " + t, i.push(r));
                return i.join("\n")
            },
            r = function(e, t, r) {
                for (var i = {}, n = 0, a = r.length; a > n; n++) {
                    var o = r[n];
                    i[o] = e.getUniformLocation(t, o)
                }
                return i
            },
            i = function(e, t, r) {
                for (var i = {}, n = 0, a = r.length; a > n; n++) {
                    var o = r[n];
                    i[o] = e.getAttribLocation(t, o)
                }
                return i
            };
        return function(n, a, o, s) {
            var h = n,
                l = h.context,
                c = o.defines,
                u = o.__webglShader.uniforms,
                f = o.attributes,
                E = o.__webglShader.vertexShader,
                p = o.__webglShader.fragmentShader,
                d = o.index0AttributeName;
            void 0 === d && s.morphTargets === !0 && (d = "position");
            var m = "SHADOWMAP_TYPE_BASIC";
            s.shadowMapType === THREE.PCFShadowMap ? m = "SHADOWMAP_TYPE_PCF" : s.shadowMapType === THREE.PCFSoftShadowMap && (m = "SHADOWMAP_TYPE_PCF_SOFT");
            var v, g, T = t(c),
                y = l.createProgram();
            o instanceof THREE.RawShaderMaterial ? (v = "", g = "") : (v = ["precision " + s.precision + " float;", "precision " + s.precision + " int;", T, s.supportsVertexTextures ? "#define VERTEX_TEXTURES" : "", h.gammaInput ? "#define GAMMA_INPUT" : "", h.gammaOutput ? "#define GAMMA_OUTPUT" : "", "#define MAX_DIR_LIGHTS " + s.maxDirLights, "#define MAX_POINT_LIGHTS " + s.maxPointLights, "#define MAX_SPOT_LIGHTS " + s.maxSpotLights, "#define MAX_HEMI_LIGHTS " + s.maxHemiLights, "#define MAX_SHADOWS " + s.maxShadows, "#define MAX_BONES " + s.maxBones, s.map ? "#define USE_MAP" : "", s.envMap ? "#define USE_ENVMAP" : "", s.lightMap ? "#define USE_LIGHTMAP" : "", s.bumpMap ? "#define USE_BUMPMAP" : "", s.normalMap ? "#define USE_NORMALMAP" : "", s.specularMap ? "#define USE_SPECULARMAP" : "", s.alphaMap ? "#define USE_ALPHAMAP" : "", s.vertexColors ? "#define USE_COLOR" : "", s.skinning ? "#define USE_SKINNING" : "", s.useVertexTexture ? "#define BONE_TEXTURE" : "", s.morphTargets ? "#define USE_MORPHTARGETS" : "", s.morphNormals ? "#define USE_MORPHNORMALS" : "", s.wrapAround ? "#define WRAP_AROUND" : "", s.doubleSided ? "#define DOUBLE_SIDED" : "", s.flipSided ? "#define FLIP_SIDED" : "", s.shadowMapEnabled ? "#define USE_SHADOWMAP" : "", s.shadowMapEnabled ? "#define " + m : "", s.shadowMapDebug ? "#define SHADOWMAP_DEBUG" : "", s.shadowMapCascade ? "#define SHADOWMAP_CASCADE" : "", s.sizeAttenuation ? "#define USE_SIZEATTENUATION" : "", s.logarithmicDepthBuffer ? "#define USE_LOGDEPTHBUF" : "", "uniform mat4 modelMatrix;", "uniform mat4 modelViewMatrix;", "uniform mat4 projectionMatrix;", "uniform mat4 viewMatrix;", "uniform mat3 normalMatrix;", "uniform vec3 cameraPosition;", "attribute vec3 position;", "attribute vec3 normal;", "attribute vec2 uv;", "attribute vec2 uv2;", "#ifdef USE_COLOR", "	attribute vec3 color;", "#endif", "#ifdef USE_MORPHTARGETS", "	attribute vec3 morphTarget0;", "	attribute vec3 morphTarget1;", "	attribute vec3 morphTarget2;", "	attribute vec3 morphTarget3;", "	#ifdef USE_MORPHNORMALS", "		attribute vec3 morphNormal0;", "		attribute vec3 morphNormal1;", "		attribute vec3 morphNormal2;", "		attribute vec3 morphNormal3;", "	#else", "		attribute vec3 morphTarget4;", "		attribute vec3 morphTarget5;", "		attribute vec3 morphTarget6;", "		attribute vec3 morphTarget7;", "	#endif", "#endif", "#ifdef USE_SKINNING", "	attribute vec4 skinIndex;", "	attribute vec4 skinWeight;", "#endif", ""].join("\n"), g = ["precision " + s.precision + " float;", "precision " + s.precision + " int;", s.bumpMap || s.normalMap ? "#extension GL_OES_standard_derivatives : enable" : "", T, "#define MAX_DIR_LIGHTS " + s.maxDirLights, "#define MAX_POINT_LIGHTS " + s.maxPointLights, "#define MAX_SPOT_LIGHTS " + s.maxSpotLights, "#define MAX_HEMI_LIGHTS " + s.maxHemiLights, "#define MAX_SHADOWS " + s.maxShadows, s.alphaTest ? "#define ALPHATEST " + s.alphaTest : "", h.gammaInput ? "#define GAMMA_INPUT" : "", h.gammaOutput ? "#define GAMMA_OUTPUT" : "", s.useFog && s.fog ? "#define USE_FOG" : "", s.useFog && s.fogExp ? "#define FOG_EXP2" : "", s.map ? "#define USE_MAP" : "", s.envMap ? "#define USE_ENVMAP" : "", s.lightMap ? "#define USE_LIGHTMAP" : "", s.bumpMap ? "#define USE_BUMPMAP" : "", s.normalMap ? "#define USE_NORMALMAP" : "", s.specularMap ? "#define USE_SPECULARMAP" : "", s.alphaMap ? "#define USE_ALPHAMAP" : "", s.vertexColors ? "#define USE_COLOR" : "", s.metal ? "#define METAL" : "", s.wrapAround ? "#define WRAP_AROUND" : "", s.doubleSided ? "#define DOUBLE_SIDED" : "", s.flipSided ? "#define FLIP_SIDED" : "", s.shadowMapEnabled ? "#define USE_SHADOWMAP" : "", s.shadowMapEnabled ? "#define " + m : "", s.shadowMapDebug ? "#define SHADOWMAP_DEBUG" : "", s.shadowMapCascade ? "#define SHADOWMAP_CASCADE" : "", s.logarithmicDepthBuffer ? "#define USE_LOGDEPTHBUF" : "", "uniform mat4 viewMatrix;", "uniform vec3 cameraPosition;", ""].join("\n"));
            var R = new THREE.WebGLShader(l, l.VERTEX_SHADER, v + E),
                x = new THREE.WebGLShader(l, l.FRAGMENT_SHADER, g + p);
            l.attachShader(y, R), l.attachShader(y, x), void 0 !== d && l.bindAttribLocation(y, 0, d), l.linkProgram(y), l.getProgramParameter(y, l.LINK_STATUS) === !1 && (console.error("THREE.WebGLProgram: Could not initialise shader."), console.error("gl.VALIDATE_STATUS", l.getProgramParameter(y, l.VALIDATE_STATUS)), console.error("gl.getError()", l.getError())), "" !== l.getProgramInfoLog(y) && console.warn("THREE.WebGLProgram: gl.getProgramInfoLog()", l.getProgramInfoLog(y)), l.deleteShader(R), l.deleteShader(x);
            var H = ["viewMatrix", "modelViewMatrix", "projectionMatrix", "normalMatrix", "modelMatrix", "cameraPosition", "morphTargetInfluences", "bindMatrix", "bindMatrixInverse"];
            s.useVertexTexture ? (H.push("boneTexture"), H.push("boneTextureWidth"), H.push("boneTextureHeight")) : H.push("boneGlobalMatrices"), s.logarithmicDepthBuffer && H.push("logDepthBufFC");
            for (var b in u) H.push(b);
            this.uniforms = r(l, y, H), H = ["position", "normal", "uv", "uv2", "tangent", "color", "skinIndex", "skinWeight", "lineDistance"];
            for (var _ = 0; _ < s.maxMorphTargets; _++) H.push("morphTarget" + _);
            for (var _ = 0; _ < s.maxMorphNormals; _++) H.push("morphNormal" + _);
            for (var w in f) H.push(w);
            return this.attributes = i(l, y, H), this.id = e++, this.code = a, this.usedTimes = 1, this.program = y, this.vertexShader = R, this.fragmentShader = x, this
        }
    }(), THREE.WebGLShader = function() {
        var e = function(e) {
            for (var t = e.split("\n"), r = 0; r < t.length; r++) t[r] = r + 1 + ": " + t[r];
            return t.join("\n")
        };
        return function(t, r, i) {
            var n = t.createShader(r);
            return t.shaderSource(n, i), t.compileShader(n), t.getShaderParameter(n, t.COMPILE_STATUS) === !1 && console.error("THREE.WebGLShader: Shader couldn't compile."), "" !== t.getShaderInfoLog(n) && (console.warn("THREE.WebGLShader: gl.getShaderInfoLog()", t.getShaderInfoLog(n)), console.warn(e(i))), n
        }
    }(), THREE.RenderableVertex = function() {
        this.position = new THREE.Vector3, this.positionWorld = new THREE.Vector3, this.positionScreen = new THREE.Vector4, this.visible = !0
    }, THREE.RenderableVertex.prototype.copy = function(e) {
        this.positionWorld.copy(e.positionWorld), this.positionScreen.copy(e.positionScreen)
    }, THREE.RenderableFace = function() {
        this.id = 0, this.v1 = new THREE.RenderableVertex, this.v2 = new THREE.RenderableVertex, this.v3 = new THREE.RenderableVertex, this.normalModel = new THREE.Vector3, this.vertexNormalsModel = [new THREE.Vector3, new THREE.Vector3, new THREE.Vector3], this.vertexNormalsLength = 0, this.color = new THREE.Color, this.material = null, this.uvs = [new THREE.Vector2, new THREE.Vector2, new THREE.Vector2], this.z = 0
    }, THREE.RenderableObject = function() {
        this.id = 0, this.object = null, this.z = 0
    }, THREE.RenderableSprite = function() {
        this.id = 0, this.object = null, this.x = 0, this.y = 0, this.z = 0, this.rotation = 0, this.scale = new THREE.Vector2, this.material = null
    }, THREE.RenderableLine = function() {
        this.id = 0, this.v1 = new THREE.RenderableVertex, this.v2 = new THREE.RenderableVertex, this.vertexColors = [new THREE.Color, new THREE.Color], this.material = null, this.z = 0
    }, THREE.GeometryUtils = {
        merge: function(e, t, r) {
            console.warn("THREE.GeometryUtils: .merge() has been moved to Geometry. Use geometry.merge( geometry2, matrix, materialIndexOffset ) instead.");
            var i;
            t instanceof THREE.Mesh && (t.matrixAutoUpdate && t.updateMatrix(), i = t.matrix, t = t.geometry), e.merge(t, i, r)
        },
        center: function(e) {
            return console.warn("THREE.GeometryUtils: .center() has been moved to Geometry. Use geometry.center() instead."), e.center()
        }
    }, THREE.ImageUtils = {
        crossOrigin: void 0,
        loadTexture: function(e, t, r, i) {
            var n = new THREE.ImageLoader;
            n.crossOrigin = this.crossOrigin;
            var a = new THREE.Texture(void 0, t);
            return n.load(e, function(e) {
                a.image = e, a.needsUpdate = !0, r && r(a)
            }, void 0, function(e) {
                i && i(e)
            }), a.sourceFile = e, a
        },
        loadTextureCube: function(e, t, r) {
            var i = [],
                n = new THREE.ImageLoader;
            n.crossOrigin = this.crossOrigin;
            var a = new THREE.CubeTexture(i, t);
            a.flipY = !1;
            for (var o = 0, s = function(t) {
                    n.load(e[t], function(e) {
                        a.images[t] = e, o += 1, 6 === o && (a.needsUpdate = !0, r && r(a))
                    })
                }, h = 0, l = e.length; l > h; ++h) s(h);
            return a
        },
        loadCompressedTexture: function() {
            console.error("THREE.ImageUtils.loadCompressedTexture has been removed. Use THREE.DDSLoader instead.")
        },
        loadCompressedTextureCube: function() {
            console.error("THREE.ImageUtils.loadCompressedTextureCube has been removed. Use THREE.DDSLoader instead.")
        },
        getNormalMap: function(e, t) {
            var r = function(e, t) {
                    return [e[1] * t[2] - e[2] * t[1], e[2] * t[0] - e[0] * t[2], e[0] * t[1] - e[1] * t[0]]
                },
                i = function(e, t) {
                    return [e[0] - t[0], e[1] - t[1], e[2] - t[2]]
                },
                n = function(e) {
                    var t = Math.sqrt(e[0] * e[0] + e[1] * e[1] + e[2] * e[2]);
                    return [e[0] / t, e[1] / t, e[2] / t]
                };
            t = 1 | t;
            var a = e.width,
                o = e.height,
                s = document.createElement("canvas");
            s.width = a, s.height = o;
            var h = s.getContext("2d");
            h.drawImage(e, 0, 0);
            for (var l = h.getImageData(0, 0, a, o).data, c = h.createImageData(a, o), u = c.data, f = 0; a > f; f++)
                for (var E = 0; o > E; E++) {
                    var p = 0 > E - 1 ? 0 : E - 1,
                        d = E + 1 > o - 1 ? o - 1 : E + 1,
                        m = 0 > f - 1 ? 0 : f - 1,
                        v = f + 1 > a - 1 ? a - 1 : f + 1,
                        g = [],
                        T = [0, 0, l[4 * (E * a + f)] / 255 * t];
                    g.push([-1, 0, l[4 * (E * a + m)] / 255 * t]), g.push([-1, -1, l[4 * (p * a + m)] / 255 * t]), g.push([0, -1, l[4 * (p * a + f)] / 255 * t]), g.push([1, -1, l[4 * (p * a + v)] / 255 * t]), g.push([1, 0, l[4 * (E * a + v)] / 255 * t]), g.push([1, 1, l[4 * (d * a + v)] / 255 * t]), g.push([0, 1, l[4 * (d * a + f)] / 255 * t]), g.push([-1, 1, l[4 * (d * a + m)] / 255 * t]);
                    for (var y = [], R = g.length, x = 0; R > x; x++) {
                        var H = g[x],
                            b = g[(x + 1) % R];
                        H = i(H, T), b = i(b, T), y.push(n(r(H, b)))
                    }
                    for (var _ = [0, 0, 0], x = 0; x < y.length; x++) _[0] += y[x][0], _[1] += y[x][1], _[2] += y[x][2];
                    _[0] /= y.length, _[1] /= y.length, _[2] /= y.length;
                    var w = 4 * (E * a + f);
                    u[w] = (_[0] + 1) / 2 * 255 | 0, u[w + 1] = (_[1] + 1) / 2 * 255 | 0, u[w + 2] = 255 * _[2] | 0, u[w + 3] = 255
                }
            return h.putImageData(c, 0, 0), s
        },
        generateDataTexture: function(e, t, r) {
            for (var i = e * t, n = new Uint8Array(3 * i), a = Math.floor(255 * r.r), o = Math.floor(255 * r.g), s = Math.floor(255 * r.b), h = 0; i > h; h++) n[3 * h] = a, n[3 * h + 1] = o, n[3 * h + 2] = s;
            var l = new THREE.DataTexture(n, e, t, THREE.RGBFormat);
            return l.needsUpdate = !0, l
        }
    }, THREE.SceneUtils = {
        createMultiMaterialObject: function(e, t) {
            for (var r = new THREE.Object3D, i = 0, n = t.length; n > i; i++) r.add(new THREE.Mesh(e, t[i]));
            return r
        },
        detach: function(e, t, r) {
            e.applyMatrix(t.matrixWorld), t.remove(e), r.add(e)
        },
        attach: function(e, t, r) {
            var i = new THREE.Matrix4;
            i.getInverse(r.matrixWorld), e.applyMatrix(i), t.remove(e), r.add(e)
        }
    }, THREE.FontUtils = {
        faces: {},
        face: "helvetiker",
        weight: "normal",
        style: "normal",
        size: 150,
        divisions: 10,
        getFace: function() {
            try {
                return this.faces[this.face][this.weight][this.style]
            } catch (e) {
                throw "The font " + this.face + " with " + this.weight + " weight and " + this.style + " style is missing."
            }
        },
        loadFace: function(e) {
            var t = e.familyName.toLowerCase(),
                r = this;
            r.faces[t] = r.faces[t] || {}, r.faces[t][e.cssFontWeight] = r.faces[t][e.cssFontWeight] || {}, r.faces[t][e.cssFontWeight][e.cssFontStyle] = e;
            r.faces[t][e.cssFontWeight][e.cssFontStyle] = e;
            return e
        },
        drawText: function(e) {
            var t, r = this.getFace(),
                i = this.size / r.resolution,
                n = 0,
                a = String(e).split(""),
                o = a.length,
                s = [];
            for (t = 0; o > t; t++) {
                var h = new THREE.Path,
                    l = this.extractGlyphPoints(a[t], r, i, n, h);
                n += l.offset, s.push(l.path)
            }
            var c = n / 2;
            return {
                paths: s,
                offset: c
            }
        },
        extractGlyphPoints: function(e, t, r, i, n) {
            var a, o, s, h, l, c, u, f, E, p, d, m, v, g, T, y, R, x, H, b = [],
                _ = t.glyphs[e] || t.glyphs["?"];
            if (_) {
                if (_.o)
                    for (h = _._cachedOutline || (_._cachedOutline = _.o.split(" ")), c = h.length, u = r, f = r, a = 0; c > a;) switch (l = h[a++]) {
                        case "m":
                            E = h[a++] * u + i, p = h[a++] * f, n.moveTo(E, p);
                            break;
                        case "l":
                            E = h[a++] * u + i, p = h[a++] * f, n.lineTo(E, p);
                            break;
                        case "q":
                            if (d = h[a++] * u + i, m = h[a++] * f, T = h[a++] * u + i, y = h[a++] * f, n.quadraticCurveTo(T, y, d, m), H = b[b.length - 1])
                                for (v = H.x, g = H.y, o = 1, s = this.divisions; s >= o; o++) {
                                    var w = o / s;
                                    THREE.Shape.Utils.b2(w, v, T, d), THREE.Shape.Utils.b2(w, g, y, m)
                                }
                            break;
                        case "b":
                            if (d = h[a++] * u + i, m = h[a++] * f, T = h[a++] * u + i, y = h[a++] * f, R = h[a++] * u + i, x = h[a++] * f, n.bezierCurveTo(T, y, R, x, d, m), H = b[b.length - 1])
                                for (v = H.x, g = H.y, o = 1, s = this.divisions; s >= o; o++) {
                                    var w = o / s;
                                    THREE.Shape.Utils.b3(w, v, T, R, d), THREE.Shape.Utils.b3(w, g, y, x, m)
                                }
                    }
                return {
                    offset: _.ha * r,
                    path: n
                }
            }
        }
    }, THREE.FontUtils.generateShapes = function(e, t) {
        t = t || {};
        var r = void 0 !== t.size ? t.size : 100,
            i = void 0 !== t.curveSegments ? t.curveSegments : 4,
            n = void 0 !== t.font ? t.font : "helvetiker",
            a = void 0 !== t.weight ? t.weight : "normal",
            o = void 0 !== t.style ? t.style : "normal";
        THREE.FontUtils.size = r, THREE.FontUtils.divisions = i, THREE.FontUtils.face = n, THREE.FontUtils.weight = a, THREE.FontUtils.style = o;
        for (var s = THREE.FontUtils.drawText(e), h = s.paths, l = [], c = 0, u = h.length; u > c; c++) Array.prototype.push.apply(l, h[c].toShapes());
        return l
    },
    function(e) {
        var t = 1e-10,
            r = function(e, t) {
                var r = e.length;
                if (3 > r) return null;
                var a, o, s, h = [],
                    l = [],
                    c = [];
                if (i(e) > 0)
                    for (o = 0; r > o; o++) l[o] = o;
                else
                    for (o = 0; r > o; o++) l[o] = r - 1 - o;
                var u = r,
                    f = 2 * u;
                for (o = u - 1; u > 2;) {
                    if (f-- <= 0) return console.log("Warning, unable to triangulate polygon!"), t ? c : h;
                    if (a = o, a >= u && (a = 0), o = a + 1, o >= u && (o = 0), s = o + 1, s >= u && (s = 0), n(e, a, o, s, u, l)) {
                        var E, p, d, m, v;
                        for (E = l[a], p = l[o], d = l[s], h.push([e[E], e[p], e[d]]), c.push([l[a], l[o], l[s]]), m = o, v = o + 1; u > v; m++, v++) l[m] = l[v];
                        u--, f = 2 * u
                    }
                }
                return t ? c : h
            },
            i = function(e) {
                for (var t = e.length, r = 0, i = t - 1, n = 0; t > n; i = n++) r += e[i].x * e[n].y - e[n].x * e[i].y;
                return .5 * r
            },
            n = function(e, r, i, n, a, o) {
                var s, h, l, c, u, f, E, p, d;
                if (h = e[o[r]].x, l = e[o[r]].y, c = e[o[i]].x, u = e[o[i]].y, f = e[o[n]].x, E = e[o[n]].y, t > (c - h) * (E - l) - (u - l) * (f - h)) return !1;
                var m, v, g, T, y, R, x, H, b, _, w, M, S, C, A;
                for (m = f - c, v = E - u, g = h - f, T = l - E, y = c - h, R = u - l, s = 0; a > s; s++)
                    if (p = e[o[s]].x, d = e[o[s]].y, !(p === h && d === l || p === c && d === u || p === f && d === E) && (x = p - h, H = d - l, b = p - c, _ = d - u, w = p - f, M = d - E, A = m * _ - v * b, S = y * H - R * x, C = g * M - T * w, A >= -t && C >= -t && S >= -t)) return !1;
                return !0
            };
        return e.Triangulate = r, e.Triangulate.area = i, e
    }(THREE.FontUtils), self._typeface_js = {
        faces: THREE.FontUtils.faces,
        loadFace: THREE.FontUtils.loadFace
    }, THREE.typeface_js = self._typeface_js, THREE.Curve = function() {}, THREE.Curve.prototype.getPoint = function() {
        return console.log("Warning, getPoint() not implemented!"), null
    }, THREE.Curve.prototype.getPointAt = function(e) {
        var t = this.getUtoTmapping(e);
        return this.getPoint(t)
    }, THREE.Curve.prototype.getPoints = function(e) {
        e || (e = 5);
        var t, r = [];
        for (t = 0; e >= t; t++) r.push(this.getPoint(t / e));
        return r
    }, THREE.Curve.prototype.getSpacedPoints = function(e) {
        e || (e = 5);
        var t, r = [];
        for (t = 0; e >= t; t++) r.push(this.getPointAt(t / e));
        return r
    }, THREE.Curve.prototype.getLength = function() {
        var e = this.getLengths();
        return e[e.length - 1]
    }, THREE.Curve.prototype.getLengths = function(e) {
        if (e || (e = this.__arcLengthDivisions ? this.__arcLengthDivisions : 200), this.cacheArcLengths && this.cacheArcLengths.length == e + 1 && !this.needsUpdate) return this.cacheArcLengths;
        this.needsUpdate = !1;
        var t, r, i = [],
            n = this.getPoint(0),
            a = 0;
        for (i.push(0), r = 1; e >= r; r++) t = this.getPoint(r / e), a += t.distanceTo(n), i.push(a), n = t;
        return this.cacheArcLengths = i, i
    }, THREE.Curve.prototype.updateArcLengths = function() {
        this.needsUpdate = !0, this.getLengths()
    }, THREE.Curve.prototype.getUtoTmapping = function(e, t) {
        var r, i = this.getLengths(),
            n = 0,
            a = i.length;
        r = t ? t : e * i[a - 1];
        for (var o, s = 0, h = a - 1; h >= s;)
            if (n = Math.floor(s + (h - s) / 2), o = i[n] - r, 0 > o) s = n + 1;
            else {
                if (!(o > 0)) {
                    h = n;
                    break
                }
                h = n - 1
            }
        if (n = h, i[n] == r) {
            var l = n / (a - 1);
            return l
        }
        var c = i[n],
            u = i[n + 1],
            f = u - c,
            E = (r - c) / f,
            l = (n + E) / (a - 1);
        return l
    }, THREE.Curve.prototype.getTangent = function(e) {
        var t = 1e-4,
            r = e - t,
            i = e + t;
        0 > r && (r = 0), i > 1 && (i = 1);
        var n = this.getPoint(r),
            a = this.getPoint(i),
            o = a.clone().sub(n);
        return o.normalize()
    }, THREE.Curve.prototype.getTangentAt = function(e) {
        var t = this.getUtoTmapping(e);
        return this.getTangent(t)
    }, THREE.Curve.Utils = {
        tangentQuadraticBezier: function(e, t, r, i) {
            return 2 * (1 - e) * (r - t) + 2 * e * (i - r)
        },
        tangentCubicBezier: function(e, t, r, i, n) {
            return -3 * t * (1 - e) * (1 - e) + 3 * r * (1 - e) * (1 - e) - 6 * e * r * (1 - e) + 6 * e * i * (1 - e) - 3 * e * e * i + 3 * e * e * n
        },
        tangentSpline: function(e) {
            var t = 6 * e * e - 6 * e,
                r = 3 * e * e - 4 * e + 1,
                i = -6 * e * e + 6 * e,
                n = 3 * e * e - 2 * e;
            return t + r + i + n
        },
        interpolate: function(e, t, r, i, n) {
            var a = .5 * (r - e),
                o = .5 * (i - t),
                s = n * n,
                h = n * s;
            return (2 * t - 2 * r + a + o) * h + (-3 * t + 3 * r - 2 * a - o) * s + a * n + t
        }
    }, THREE.Curve.create = function(e, t) {
        return e.prototype = Object.create(THREE.Curve.prototype), e.prototype.getPoint = t, e
    }, THREE.CurvePath = function() {
        this.curves = [], this.bends = [], this.autoClose = !1
    }, THREE.CurvePath.prototype = Object.create(THREE.Curve.prototype), THREE.CurvePath.prototype.add = function(e) {
        this.curves.push(e)
    }, THREE.CurvePath.prototype.checkConnection = function() {}, THREE.CurvePath.prototype.closePath = function() {
        var e = this.curves[0].getPoint(0),
            t = this.curves[this.curves.length - 1].getPoint(1);
        e.equals(t) || this.curves.push(new THREE.LineCurve(t, e))
    }, THREE.CurvePath.prototype.getPoint = function(e) {
        for (var t, r, i = e * this.getLength(), n = this.getCurveLengths(), a = 0; a < n.length;) {
            if (n[a] >= i) {
                t = n[a] - i, r = this.curves[a];
                var o = 1 - t / r.getLength();
                return r.getPointAt(o)
            }
            a++
        }
        return null
    }, THREE.CurvePath.prototype.getLength = function() {
        var e = this.getCurveLengths();
        return e[e.length - 1]
    }, THREE.CurvePath.prototype.getCurveLengths = function() {
        if (this.cacheLengths && this.cacheLengths.length == this.curves.length) return this.cacheLengths;
        var e, t = [],
            r = 0,
            i = this.curves.length;
        for (e = 0; i > e; e++) r += this.curves[e].getLength(), t.push(r);
        return this.cacheLengths = t, t
    }, THREE.CurvePath.prototype.getBoundingBox = function() {
        var e, t, r, i, n, a, o = this.getPoints();
        e = t = Number.NEGATIVE_INFINITY, i = n = Number.POSITIVE_INFINITY;
        var s, h, l, c, u = o[0] instanceof THREE.Vector3;
        for (c = u ? new THREE.Vector3 : new THREE.Vector2, h = 0, l = o.length; l > h; h++) s = o[h], s.x > e ? e = s.x : s.x < i && (i = s.x), s.y > t ? t = s.y : s.y < n && (n = s.y), u && (s.z > r ? r = s.z : s.z < a && (a = s.z)), c.add(s);
        var f = {
            minX: i,
            minY: n,
            maxX: e,
            maxY: t
        };
        return u && (f.maxZ = r, f.minZ = a), f
    }, THREE.CurvePath.prototype.createPointsGeometry = function(e) {
        var t = this.getPoints(e, !0);
        return this.createGeometry(t)
    }, THREE.CurvePath.prototype.createSpacedPointsGeometry = function(e) {
        var t = this.getSpacedPoints(e, !0);
        return this.createGeometry(t)
    }, THREE.CurvePath.prototype.createGeometry = function(e) {
        for (var t = new THREE.Geometry, r = 0; r < e.length; r++) t.vertices.push(new THREE.Vector3(e[r].x, e[r].y, e[r].z || 0));
        return t
    }, THREE.CurvePath.prototype.addWrapPath = function(e) {
        this.bends.push(e)
    }, THREE.CurvePath.prototype.getTransformedPoints = function(e, t) {
        var r, i, n = this.getPoints(e);
        for (t || (t = this.bends), r = 0, i = t.length; i > r; r++) n = this.getWrapPoints(n, t[r]);
        return n
    }, THREE.CurvePath.prototype.getTransformedSpacedPoints = function(e, t) {
        var r, i, n = this.getSpacedPoints(e);
        for (t || (t = this.bends), r = 0, i = t.length; i > r; r++) n = this.getWrapPoints(n, t[r]);
        return n
    }, THREE.CurvePath.prototype.getWrapPoints = function(e, t) {
        var r, i, n, a, o, s, h = this.getBoundingBox();
        for (r = 0, i = e.length; i > r; r++) {
            n = e[r], a = n.x, o = n.y, s = a / h.maxX, s = t.getUtoTmapping(s, a);
            var l = t.getPoint(s),
                c = t.getTangent(s);
            c.set(-c.y, c.x).multiplyScalar(o), n.x = l.x + c.x, n.y = l.y + c.y
        }
        return e
    }, THREE.Gyroscope = function() {
        THREE.Object3D.call(this)
    }, THREE.Gyroscope.prototype = Object.create(THREE.Object3D.prototype), THREE.Gyroscope.prototype.updateMatrixWorld = function(e) {
        this.matrixAutoUpdate && this.updateMatrix(), (this.matrixWorldNeedsUpdate || e) && (this.parent ? (this.matrixWorld.multiplyMatrices(this.parent.matrixWorld, this.matrix), this.matrixWorld.decompose(this.translationWorld, this.quaternionWorld, this.scaleWorld), this.matrix.decompose(this.translationObject, this.quaternionObject, this.scaleObject), this.matrixWorld.compose(this.translationWorld, this.quaternionObject, this.scaleWorld)) : this.matrixWorld.copy(this.matrix), this.matrixWorldNeedsUpdate = !1, e = !0);
        for (var t = 0, r = this.children.length; r > t; t++) this.children[t].updateMatrixWorld(e)
    }, THREE.Gyroscope.prototype.translationWorld = new THREE.Vector3, THREE.Gyroscope.prototype.translationObject = new THREE.Vector3, THREE.Gyroscope.prototype.quaternionWorld = new THREE.Quaternion, THREE.Gyroscope.prototype.quaternionObject = new THREE.Quaternion, THREE.Gyroscope.prototype.scaleWorld = new THREE.Vector3, THREE.Gyroscope.prototype.scaleObject = new THREE.Vector3, THREE.Path = function(e) {
        THREE.CurvePath.call(this), this.actions = [], e && this.fromPoints(e)
    }, THREE.Path.prototype = Object.create(THREE.CurvePath.prototype), THREE.PathActions = {
        MOVE_TO: "moveTo",
        LINE_TO: "lineTo",
        QUADRATIC_CURVE_TO: "quadraticCurveTo",
        BEZIER_CURVE_TO: "bezierCurveTo",
        CSPLINE_THRU: "splineThru",
        ARC: "arc",
        ELLIPSE: "ellipse"
    }, THREE.Path.prototype.fromPoints = function(e) {
        this.moveTo(e[0].x, e[0].y);
        for (var t = 1, r = e.length; r > t; t++) this.lineTo(e[t].x, e[t].y)
    }, THREE.Path.prototype.moveTo = function() {
        var e = Array.prototype.slice.call(arguments);
        this.actions.push({
            action: THREE.PathActions.MOVE_TO,
            args: e
        })
    }, THREE.Path.prototype.lineTo = function(e, t) {
        var r = Array.prototype.slice.call(arguments),
            i = this.actions[this.actions.length - 1].args,
            n = i[i.length - 2],
            a = i[i.length - 1],
            o = new THREE.LineCurve(new THREE.Vector2(n, a), new THREE.Vector2(e, t));
        this.curves.push(o), this.actions.push({
            action: THREE.PathActions.LINE_TO,
            args: r
        })
    }, THREE.Path.prototype.quadraticCurveTo = function(e, t, r, i) {
        var n = Array.prototype.slice.call(arguments),
            a = this.actions[this.actions.length - 1].args,
            o = a[a.length - 2],
            s = a[a.length - 1],
            h = new THREE.QuadraticBezierCurve(new THREE.Vector2(o, s), new THREE.Vector2(e, t), new THREE.Vector2(r, i));
        this.curves.push(h), this.actions.push({
            action: THREE.PathActions.QUADRATIC_CURVE_TO,
            args: n
        })
    }, THREE.Path.prototype.bezierCurveTo = function(e, t, r, i, n, a) {
        var o = Array.prototype.slice.call(arguments),
            s = this.actions[this.actions.length - 1].args,
            h = s[s.length - 2],
            l = s[s.length - 1],
            c = new THREE.CubicBezierCurve(new THREE.Vector2(h, l), new THREE.Vector2(e, t), new THREE.Vector2(r, i), new THREE.Vector2(n, a));
        this.curves.push(c), this.actions.push({
            action: THREE.PathActions.BEZIER_CURVE_TO,
            args: o
        })
    }, THREE.Path.prototype.splineThru = function(e) {
        var t = Array.prototype.slice.call(arguments),
            r = this.actions[this.actions.length - 1].args,
            i = r[r.length - 2],
            n = r[r.length - 1],
            a = [new THREE.Vector2(i, n)];
        Array.prototype.push.apply(a, e);
        var o = new THREE.SplineCurve(a);
        this.curves.push(o), this.actions.push({
            action: THREE.PathActions.CSPLINE_THRU,
            args: t
        })
    }, THREE.Path.prototype.arc = function(e, t, r, i, n, a) {
        var o = this.actions[this.actions.length - 1].args,
            s = o[o.length - 2],
            h = o[o.length - 1];
        this.absarc(e + s, t + h, r, i, n, a)
    }, THREE.Path.prototype.absarc = function(e, t, r, i, n, a) {
        this.absellipse(e, t, r, r, i, n, a)
    }, THREE.Path.prototype.ellipse = function(e, t, r, i, n, a, o) {
        var s = this.actions[this.actions.length - 1].args,
            h = s[s.length - 2],
            l = s[s.length - 1];
        this.absellipse(e + h, t + l, r, i, n, a, o)
    }, THREE.Path.prototype.absellipse = function(e, t, r, i, n, a, o) {
        var s = Array.prototype.slice.call(arguments),
            h = new THREE.EllipseCurve(e, t, r, i, n, a, o);
        this.curves.push(h);
        var l = h.getPoint(1);
        s.push(l.x), s.push(l.y), this.actions.push({
            action: THREE.PathActions.ELLIPSE,
            args: s
        })
    }, THREE.Path.prototype.getSpacedPoints = function(e) {
        e || (e = 40);
        for (var t = [], r = 0; e > r; r++) t.push(this.getPoint(r / e));
        return t
    }, THREE.Path.prototype.getPoints = function(e, t) {
        if (this.useSpacedPoints) return console.log("tata"), this.getSpacedPoints(e, t);
        e = e || 12;
        var r, i, n, a, o, s, h, l, c, u, f, E, p, d, m, v, g, T, y = [];
        for (r = 0, i = this.actions.length; i > r; r++) switch (n = this.actions[r], a = n.action, o = n.args, a) {
            case THREE.PathActions.MOVE_TO:
                y.push(new THREE.Vector2(o[0], o[1]));
                break;
            case THREE.PathActions.LINE_TO:
                y.push(new THREE.Vector2(o[0], o[1]));
                break;
            case THREE.PathActions.QUADRATIC_CURVE_TO:
                for (s = o[2], h = o[3], u = o[0], f = o[1], y.length > 0 ? (d = y[y.length - 1], E = d.x, p = d.y) : (d = this.actions[r - 1].args, E = d[d.length - 2], p = d[d.length - 1]), m = 1; e >= m; m++) v = m / e, g = THREE.Shape.Utils.b2(v, E, u, s), T = THREE.Shape.Utils.b2(v, p, f, h), y.push(new THREE.Vector2(g, T));
                break;
            case THREE.PathActions.BEZIER_CURVE_TO:
                for (s = o[4], h = o[5], u = o[0], f = o[1], l = o[2], c = o[3], y.length > 0 ? (d = y[y.length - 1], E = d.x, p = d.y) : (d = this.actions[r - 1].args, E = d[d.length - 2], p = d[d.length - 1]), m = 1; e >= m; m++) v = m / e, g = THREE.Shape.Utils.b3(v, E, u, l, s), T = THREE.Shape.Utils.b3(v, p, f, c, h), y.push(new THREE.Vector2(g, T));
                break;
            case THREE.PathActions.CSPLINE_THRU:
                d = this.actions[r - 1].args;
                var R = new THREE.Vector2(d[d.length - 2], d[d.length - 1]),
                    x = [R],
                    H = e * o[0].length;
                x = x.concat(o[0]);
                var b = new THREE.SplineCurve(x);
                for (m = 1; H >= m; m++) y.push(b.getPointAt(m / H));
                break;
            case THREE.PathActions.ARC:
                var _, w = o[0],
                    M = o[1],
                    S = o[2],
                    C = o[3],
                    A = o[4],
                    L = !!o[5],
                    P = A - C,
                    F = 2 * e;
                for (m = 1; F >= m; m++) v = m / F, L || (v = 1 - v), _ = C + v * P, g = w + S * Math.cos(_), T = M + S * Math.sin(_), y.push(new THREE.Vector2(g, T));
                break;
            case THREE.PathActions.ELLIPSE:
                var _, w = o[0],
                    M = o[1],
                    D = o[2],
                    U = o[3],
                    C = o[4],
                    A = o[5],
                    L = !!o[6],
                    P = A - C,
                    F = 2 * e;
                for (m = 1; F >= m; m++) v = m / F, L || (v = 1 - v), _ = C + v * P, g = w + D * Math.cos(_), T = M + U * Math.sin(_), y.push(new THREE.Vector2(g, T))
        }
        var V = y[y.length - 1],
            z = 1e-10;
        return Math.abs(V.x - y[0].x) < z && Math.abs(V.y - y[0].y) < z && y.splice(y.length - 1, 1), t && y.push(y[0]), y
    }, THREE.Path.prototype.toShapes = function(e, t) {
        function r(e) {
            var t, r, i, n, a, o = [],
                s = new THREE.Path;
            for (t = 0, r = e.length; r > t; t++) i = e[t], a = i.args, n = i.action, n == THREE.PathActions.MOVE_TO && 0 != s.actions.length && (o.push(s), s = new THREE.Path), s[n].apply(s, a);
            return 0 != s.actions.length && o.push(s), o
        }

        function i(e) {
            for (var t = [], r = 0, i = e.length; i > r; r++) {
                var n = e[r],
                    a = new THREE.Shape;
                a.actions = n.actions, a.curves = n.curves, t.push(a)
            }
            return t
        }

        function n(e, t) {
            for (var r = 1e-10, i = t.length, n = !1, a = i - 1, o = 0; i > o; a = o++) {
                var s = t[a],
                    h = t[o],
                    l = h.x - s.x,
                    c = h.y - s.y;
                if (Math.abs(c) > r) {
                    if (0 > c && (s = t[o], l = -l, h = t[a], c = -c), e.y < s.y || e.y > h.y) continue;
                    if (e.y == s.y) {
                        if (e.x == s.x) return !0
                    } else {
                        var u = c * (e.x - s.x) - l * (e.y - s.y);
                        if (0 == u) return !0;
                        if (0 > u) continue;
                        n = !n
                    }
                } else {
                    if (e.y != s.y) continue;
                    if (h.x <= e.x && e.x <= s.x || s.x <= e.x && e.x <= h.x) return !0
                }
            }
            return n
        }
        var a = r(this.actions);
        if (0 == a.length) return [];
        if (t === !0) return i(a);
        var o, s, h, l = [];
        if (1 == a.length) return s = a[0], h = new THREE.Shape, h.actions = s.actions, h.curves = s.curves, l.push(h), l;
        var c = !THREE.Shape.Utils.isClockWise(a[0].getPoints());
        c = e ? !c : c;
        var u, f = [],
            E = [],
            p = [],
            d = 0;
        E[d] = void 0, p[d] = [];
        var m, v;
        for (m = 0, v = a.length; v > m; m++) s = a[m], u = s.getPoints(), o = THREE.Shape.Utils.isClockWise(u), o = e ? !o : o, o ? (!c && E[d] && d++, E[d] = {
            s: new THREE.Shape,
            p: u
        }, E[d].s.actions = s.actions, E[d].s.curves = s.curves, c && d++, p[d] = []) : p[d].push({
            h: s,
            p: u[0]
        });
        if (!E[0]) return i(a);
        if (E.length > 1) {
            for (var g = !1, T = [], y = 0, R = E.length; R > y; y++) f[y] = [];
            for (var y = 0, R = E.length; R > y; y++)
                for (var x = (E[y], p[y]), H = 0; H < x.length; H++) {
                    for (var b = x[H], _ = !0, w = 0; w < E.length; w++) n(b.p, E[w].p) && (y != w && T.push({
                        froms: y,
                        tos: w,
                        hole: H
                    }), _ ? (_ = !1, f[w].push(b)) : g = !0);
                    _ && f[y].push(b)
                }
            T.length > 0 && (g || (p = f))
        }
        var M, S, C;
        for (m = 0, v = E.length; v > m; m++)
            for (h = E[m].s, l.push(h), M = p[m], S = 0, C = M.length; C > S; S++) h.holes.push(M[S].h);
        return l
    }, THREE.Shape = function() {
        THREE.Path.apply(this, arguments), this.holes = []
    }, THREE.Shape.prototype = Object.create(THREE.Path.prototype), THREE.Shape.prototype.extrude = function(e) {
        var t = new THREE.ExtrudeGeometry(this, e);
        return t
    }, THREE.Shape.prototype.makeGeometry = function(e) {
        var t = new THREE.ShapeGeometry(this, e);
        return t
    }, THREE.Shape.prototype.getPointsHoles = function(e) {
        var t, r = this.holes.length,
            i = [];
        for (t = 0; r > t; t++) i[t] = this.holes[t].getTransformedPoints(e, this.bends);
        return i
    }, THREE.Shape.prototype.getSpacedPointsHoles = function(e) {
        var t, r = this.holes.length,
            i = [];
        for (t = 0; r > t; t++) i[t] = this.holes[t].getTransformedSpacedPoints(e, this.bends);
        return i
    }, THREE.Shape.prototype.extractAllPoints = function(e) {
        return {
            shape: this.getTransformedPoints(e),
            holes: this.getPointsHoles(e)
        }
    }, THREE.Shape.prototype.extractPoints = function(e) {
        return this.useSpacedPoints ? this.extractAllSpacedPoints(e) : this.extractAllPoints(e)
    }, THREE.Shape.prototype.extractAllSpacedPoints = function(e) {
        return {
            shape: this.getTransformedSpacedPoints(e),
            holes: this.getSpacedPointsHoles(e)
        }
    }, THREE.Shape.Utils = {
        triangulateShape: function(e, t) {
            function r(e, t, r) {
                return e.x != t.x ? e.x < t.x ? e.x <= r.x && r.x <= t.x : t.x <= r.x && r.x <= e.x : e.y < t.y ? e.y <= r.y && r.y <= t.y : t.y <= r.y && r.y <= e.y
            }

            function i(e, t, i, n, a) {
                var o = 1e-10,
                    s = t.x - e.x,
                    h = t.y - e.y,
                    l = n.x - i.x,
                    c = n.y - i.y,
                    u = e.x - i.x,
                    f = e.y - i.y,
                    E = h * l - s * c,
                    p = h * u - s * f;
                if (Math.abs(E) > o) {
                    var d;
                    if (E > 0) {
                        if (0 > p || p > E) return [];
                        if (d = c * u - l * f, 0 > d || d > E) return []
                    } else {
                        if (p > 0 || E > p) return [];
                        if (d = c * u - l * f, d > 0 || E > d) return []
                    }
                    if (0 == d) return !a || 0 != p && p != E ? [e] : [];
                    if (d == E) return !a || 0 != p && p != E ? [t] : [];
                    if (0 == p) return [i];
                    if (p == E) return [n];
                    var m = d / E;
                    return [{
                        x: e.x + m * s,
                        y: e.y + m * h
                    }]
                }
                if (0 != p || c * u != l * f) return [];
                var v = 0 == s && 0 == h,
                    g = 0 == l && 0 == c;
                if (v && g) return e.x != i.x || e.y != i.y ? [] : [e];
                if (v) return r(i, n, e) ? [e] : [];
                if (g) return r(e, t, i) ? [i] : [];
                var T, y, R, x, H, b, _, w;
                return 0 != s ? (e.x < t.x ? (T = e, R = e.x, y = t, x = t.x) : (T = t, R = t.x, y = e, x = e.x), i.x < n.x ? (H = i, _ = i.x, b = n, w = n.x) : (H = n, _ = n.x, b = i, w = i.x)) : (e.y < t.y ? (T = e, R = e.y, y = t, x = t.y) : (T = t, R = t.y, y = e, x = e.y), i.y < n.y ? (H = i, _ = i.y, b = n, w = n.y) : (H = n, _ = n.y, b = i, w = i.y)), _ >= R ? _ > x ? [] : x == _ ? a ? [] : [H] : w >= x ? [H, y] : [H, b] : R > w ? [] : R == w ? a ? [] : [T] : w >= x ? [T, y] : [T, b]
            }

            function n(e, t, r, i) {
                var n = 1e-10,
                    a = t.x - e.x,
                    o = t.y - e.y,
                    s = r.x - e.x,
                    h = r.y - e.y,
                    l = i.x - e.x,
                    c = i.y - e.y,
                    u = a * h - o * s,
                    f = a * c - o * l;
                if (Math.abs(u) > n) {
                    var E = l * h - c * s;
                    return u > 0 ? f >= 0 && E >= 0 : f >= 0 || E >= 0
                }
                return f > 0
            }

            function a(e, t) {
                function r(e, t) {
                    var r = g.length - 1,
                        i = e - 1;
                    0 > i && (i = r);
                    var a = e + 1;
                    a > r && (a = 0);
                    var o = n(g[e], g[i], g[a], s[t]);
                    if (!o) return !1;
                    var h = s.length - 1,
                        l = t - 1;
                    0 > l && (l = h);
                    var c = t + 1;
                    return c > h && (c = 0), o = n(s[t], s[l], s[c], g[e]), o ? !0 : !1
                }

                function a(e, t) {
                    var r, n, a;
                    for (r = 0; r < g.length; r++)
                        if (n = r + 1, n %= g.length, a = i(e, t, g[r], g[n], !0), a.length > 0) return !0;
                    return !1
                }

                function o(e, r) {
                    var n, a, o, s, h;
                    for (n = 0; n < T.length; n++)
                        for (a = t[T[n]], o = 0; o < a.length; o++)
                            if (s = o + 1, s %= a.length, h = i(e, r, a[o], a[s], !0), h.length > 0) return !0;
                    return !1
                }
                for (var s, h, l, c, u, f, E, p, d, m, v, g = e.concat(), T = [], y = [], R = 0, x = t.length; x > R; R++) T.push(R);
                for (var H = 0, b = 2 * T.length; T.length > 0;) {
                    if (b--, 0 > b) {
                        console.log("Infinite Loop! Holes left:" + T.length + ", Probably Hole outside Shape!");
                        break
                    }
                    for (l = H; l < g.length; l++) {
                        c = g[l], h = -1;
                        for (var R = 0; R < T.length; R++)
                            if (f = T[R], E = c.x + ":" + c.y + ":" + f, void 0 === y[E]) {
                                s = t[f];
                                for (var _ = 0; _ < s.length; _++)
                                    if (u = s[_], r(l, _) && !a(c, u) && !o(c, u)) {
                                        h = _, T.splice(R, 1), p = g.slice(0, l + 1), d = g.slice(l), m = s.slice(h), v = s.slice(0, h + 1), g = p.concat(m).concat(v).concat(d), H = l;
                                        break
                                    }
                                if (h >= 0) break;
                                y[E] = !0
                            }
                        if (h >= 0) break
                    }
                }
                return g
            }
            for (var o, s, h, l, c, u, f = {}, E = e.concat(), p = 0, d = t.length; d > p; p++) Array.prototype.push.apply(E, t[p]);
            for (o = 0, s = E.length; s > o; o++) c = E[o].x + ":" + E[o].y, void 0 !== f[c] && console.log("Duplicate point", c), f[c] = o;
            var m = a(e, t),
                v = THREE.FontUtils.Triangulate(m, !1);
            for (o = 0, s = v.length; s > o; o++)
                for (l = v[o], h = 0; 3 > h; h++) c = l[h].x + ":" + l[h].y, u = f[c], void 0 !== u && (l[h] = u);
            return v.concat()
        },
        isClockWise: function(e) {
            return THREE.FontUtils.Triangulate.area(e) < 0
        },
        b2p0: function(e, t) {
            var r = 1 - e;
            return r * r * t
        },
        b2p1: function(e, t) {
            return 2 * (1 - e) * e * t
        },
        b2p2: function(e, t) {
            return e * e * t
        },
        b2: function(e, t, r, i) {
            return this.b2p0(e, t) + this.b2p1(e, r) + this.b2p2(e, i)
        },
        b3p0: function(e, t) {
            var r = 1 - e;
            return r * r * r * t
        },
        b3p1: function(e, t) {
            var r = 1 - e;
            return 3 * r * r * e * t
        },
        b3p2: function(e, t) {
            var r = 1 - e;
            return 3 * r * e * e * t
        },
        b3p3: function(e, t) {
            return e * e * e * t
        },
        b3: function(e, t, r, i, n) {
            return this.b3p0(e, t) + this.b3p1(e, r) + this.b3p2(e, i) + this.b3p3(e, n)
        }
    }, THREE.LineCurve = function(e, t) {
        this.v1 = e, this.v2 = t
    }, THREE.LineCurve.prototype = Object.create(THREE.Curve.prototype), THREE.LineCurve.prototype.getPoint = function(e) {
        var t = this.v2.clone().sub(this.v1);
        return t.multiplyScalar(e).add(this.v1), t
    }, THREE.LineCurve.prototype.getPointAt = function(e) {
        return this.getPoint(e)
    }, THREE.LineCurve.prototype.getTangent = function() {
        var e = this.v2.clone().sub(this.v1);
        return e.normalize()
    }, THREE.QuadraticBezierCurve = function(e, t, r) {
        this.v0 = e, this.v1 = t, this.v2 = r
    }, THREE.QuadraticBezierCurve.prototype = Object.create(THREE.Curve.prototype), THREE.QuadraticBezierCurve.prototype.getPoint = function(e) {
        var t, r;
        return t = THREE.Shape.Utils.b2(e, this.v0.x, this.v1.x, this.v2.x), r = THREE.Shape.Utils.b2(e, this.v0.y, this.v1.y, this.v2.y), new THREE.Vector2(t, r)
    }, THREE.QuadraticBezierCurve.prototype.getTangent = function(e) {
        var t, r;
        t = THREE.Curve.Utils.tangentQuadraticBezier(e, this.v0.x, this.v1.x, this.v2.x), r = THREE.Curve.Utils.tangentQuadraticBezier(e, this.v0.y, this.v1.y, this.v2.y);
        var i = new THREE.Vector2(t, r);
        return i.normalize(), i
    }, THREE.CubicBezierCurve = function(e, t, r, i) {
        this.v0 = e, this.v1 = t, this.v2 = r, this.v3 = i
    }, THREE.CubicBezierCurve.prototype = Object.create(THREE.Curve.prototype), THREE.CubicBezierCurve.prototype.getPoint = function(e) {
        var t, r;
        return t = THREE.Shape.Utils.b3(e, this.v0.x, this.v1.x, this.v2.x, this.v3.x), r = THREE.Shape.Utils.b3(e, this.v0.y, this.v1.y, this.v2.y, this.v3.y), new THREE.Vector2(t, r)
    }, THREE.CubicBezierCurve.prototype.getTangent = function(e) {
        var t, r;
        t = THREE.Curve.Utils.tangentCubicBezier(e, this.v0.x, this.v1.x, this.v2.x, this.v3.x), r = THREE.Curve.Utils.tangentCubicBezier(e, this.v0.y, this.v1.y, this.v2.y, this.v3.y);
        var i = new THREE.Vector2(t, r);
        return i.normalize(), i
    }, THREE.SplineCurve = function(e) {
        this.points = void 0 == e ? [] : e
    }, THREE.SplineCurve.prototype = Object.create(THREE.Curve.prototype), THREE.SplineCurve.prototype.getPoint = function(e) {
        var t, r, i, n = new THREE.Vector2,
            a = [],
            o = this.points;
        return t = (o.length - 1) * e, r = Math.floor(t), i = t - r, a[0] = 0 == r ? r : r - 1, a[1] = r, a[2] = r > o.length - 2 ? o.length - 1 : r + 1, a[3] = r > o.length - 3 ? o.length - 1 : r + 2, n.x = THREE.Curve.Utils.interpolate(o[a[0]].x, o[a[1]].x, o[a[2]].x, o[a[3]].x, i), n.y = THREE.Curve.Utils.interpolate(o[a[0]].y, o[a[1]].y, o[a[2]].y, o[a[3]].y, i), n
    }, THREE.EllipseCurve = function(e, t, r, i, n, a, o) {
        this.aX = e, this.aY = t, this.xRadius = r, this.yRadius = i, this.aStartAngle = n, this.aEndAngle = a, this.aClockwise = o
    }, THREE.EllipseCurve.prototype = Object.create(THREE.Curve.prototype), THREE.EllipseCurve.prototype.getPoint = function(e) {
        var t, r = this.aEndAngle - this.aStartAngle;
        0 > r && (r += 2 * Math.PI), r > 2 * Math.PI && (r -= 2 * Math.PI), t = this.aClockwise === !0 ? this.aEndAngle + (1 - e) * (2 * Math.PI - r) : this.aStartAngle + e * r;
        var i = this.aX + this.xRadius * Math.cos(t),
            n = this.aY + this.yRadius * Math.sin(t);
        return new THREE.Vector2(i, n)
    }, THREE.ArcCurve = function(e, t, r, i, n, a) {
        THREE.EllipseCurve.call(this, e, t, r, r, i, n, a)
    }, THREE.ArcCurve.prototype = Object.create(THREE.EllipseCurve.prototype), THREE.LineCurve3 = THREE.Curve.create(function(e, t) {
        this.v1 = e, this.v2 = t
    }, function(e) {
        var t = new THREE.Vector3;
        return t.subVectors(this.v2, this.v1), t.multiplyScalar(e), t.add(this.v1), t
    }), THREE.QuadraticBezierCurve3 = THREE.Curve.create(function(e, t, r) {
        this.v0 = e, this.v1 = t, this.v2 = r
    }, function(e) {
        var t, r, i;
        return t = THREE.Shape.Utils.b2(e, this.v0.x, this.v1.x, this.v2.x), r = THREE.Shape.Utils.b2(e, this.v0.y, this.v1.y, this.v2.y), i = THREE.Shape.Utils.b2(e, this.v0.z, this.v1.z, this.v2.z), new THREE.Vector3(t, r, i)
    }), THREE.CubicBezierCurve3 = THREE.Curve.create(function(e, t, r, i) {
        this.v0 = e, this.v1 = t, this.v2 = r, this.v3 = i
    }, function(e) {
        var t, r, i;
        return t = THREE.Shape.Utils.b3(e, this.v0.x, this.v1.x, this.v2.x, this.v3.x), r = THREE.Shape.Utils.b3(e, this.v0.y, this.v1.y, this.v2.y, this.v3.y), i = THREE.Shape.Utils.b3(e, this.v0.z, this.v1.z, this.v2.z, this.v3.z), new THREE.Vector3(t, r, i)
    }), THREE.SplineCurve3 = THREE.Curve.create(function(e) {
        this.points = void 0 == e ? [] : e
    }, function(e) {
        var t, r, i, n = new THREE.Vector3,
            a = [],
            o = this.points;
        t = (o.length - 1) * e, r = Math.floor(t), i = t - r, a[0] = 0 == r ? r : r - 1, a[1] = r, a[2] = r > o.length - 2 ? o.length - 1 : r + 1, a[3] = r > o.length - 3 ? o.length - 1 : r + 2;
        var s = o[a[0]],
            h = o[a[1]],
            l = o[a[2]],
            c = o[a[3]];
        return n.x = THREE.Curve.Utils.interpolate(s.x, h.x, l.x, c.x, i), n.y = THREE.Curve.Utils.interpolate(s.y, h.y, l.y, c.y, i), n.z = THREE.Curve.Utils.interpolate(s.z, h.z, l.z, c.z, i), n
    }), THREE.ClosedSplineCurve3 = THREE.Curve.create(function(e) {
        this.points = void 0 == e ? [] : e
    }, function(e) {
        var t, r, i, n = new THREE.Vector3,
            a = [],
            o = this.points;
        return t = (o.length - 0) * e, r = Math.floor(t), i = t - r, r += r > 0 ? 0 : (Math.floor(Math.abs(r) / o.length) + 1) * o.length, a[0] = (r - 1) % o.length, a[1] = r % o.length, a[2] = (r + 1) % o.length, a[3] = (r + 2) % o.length, n.x = THREE.Curve.Utils.interpolate(o[a[0]].x, o[a[1]].x, o[a[2]].x, o[a[3]].x, i), n.y = THREE.Curve.Utils.interpolate(o[a[0]].y, o[a[1]].y, o[a[2]].y, o[a[3]].y, i), n.z = THREE.Curve.Utils.interpolate(o[a[0]].z, o[a[1]].z, o[a[2]].z, o[a[3]].z, i), n
    }), THREE.AnimationHandler = {
        LINEAR: 0,
        CATMULLROM: 1,
        CATMULLROM_FORWARD: 2,
        add: function() {
            console.warn("THREE.AnimationHandler.add() has been deprecated.")
        },
        get: function() {
            console.warn("THREE.AnimationHandler.get() has been deprecated.")
        },
        remove: function() {
            console.warn("THREE.AnimationHandler.remove() has been deprecated.")
        },
        animations: [],
        init: function(e) {
            if (e.initialized !== !0) {
                for (var t = 0; t < e.hierarchy.length; t++) {
                    for (var r = 0; r < e.hierarchy[t].keys.length; r++)
                        if (e.hierarchy[t].keys[r].time < 0 && (e.hierarchy[t].keys[r].time = 0), void 0 !== e.hierarchy[t].keys[r].rot && !(e.hierarchy[t].keys[r].rot instanceof THREE.Quaternion)) {
                            var i = e.hierarchy[t].keys[r].rot;
                            e.hierarchy[t].keys[r].rot = (new THREE.Quaternion).fromArray(i)
                        }
                    if (e.hierarchy[t].keys.length && void 0 !== e.hierarchy[t].keys[0].morphTargets) {
                        for (var n = {}, r = 0; r < e.hierarchy[t].keys.length; r++)
                            for (var a = 0; a < e.hierarchy[t].keys[r].morphTargets.length; a++) {
                                var o = e.hierarchy[t].keys[r].morphTargets[a];
                                n[o] = -1
                            }
                        e.hierarchy[t].usedMorphTargets = n;
                        for (var r = 0; r < e.hierarchy[t].keys.length; r++) {
                            var s = {};
                            for (var o in n) {
                                for (var a = 0; a < e.hierarchy[t].keys[r].morphTargets.length; a++)
                                    if (e.hierarchy[t].keys[r].morphTargets[a] === o) {
                                        s[o] = e.hierarchy[t].keys[r].morphTargetsInfluences[a];
                                        break
                                    }
                                a === e.hierarchy[t].keys[r].morphTargets.length && (s[o] = 0)
                            }
                            e.hierarchy[t].keys[r].morphTargetsInfluences = s
                        }
                    }
                    for (var r = 1; r < e.hierarchy[t].keys.length; r++) e.hierarchy[t].keys[r].time === e.hierarchy[t].keys[r - 1].time && (e.hierarchy[t].keys.splice(r, 1), r--);
                    for (var r = 0; r < e.hierarchy[t].keys.length; r++) e.hierarchy[t].keys[r].index = r
                }
                return e.initialized = !0, e
            }
        },
        parse: function(e) {
            var t = function(e, r) {
                    r.push(e);
                    for (var i = 0; i < e.children.length; i++) t(e.children[i], r)
                },
                r = [];
            if (e instanceof THREE.SkinnedMesh)
                for (var i = 0; i < e.skeleton.bones.length; i++) r.push(e.skeleton.bones[i]);
            else t(e, r);
            return r
        },
        play: function(e) {
            -1 === this.animations.indexOf(e) && this.animations.push(e)
        },
        stop: function(e) {
            var t = this.animations.indexOf(e); - 1 !== t && this.animations.splice(t, 1)
        },
        update: function(e) {
            for (var t = 0; t < this.animations.length; t++) this.animations[t].update(e)
        }
    }, THREE.Animation = function(e, t) {
        this.root = e, this.data = THREE.AnimationHandler.init(t), this.hierarchy = THREE.AnimationHandler.parse(e), this.currentTime = 0, this.timeScale = 1, this.isPlaying = !1, this.loop = !0, this.weight = 0, this.interpolationType = THREE.AnimationHandler.LINEAR
    }, THREE.Animation.prototype.keyTypes = ["pos", "rot", "scl"], THREE.Animation.prototype.play = function(e, t) {
        this.currentTime = void 0 !== e ? e : 0, this.weight = void 0 !== t ? t : 1, this.isPlaying = !0, this.reset(), THREE.AnimationHandler.play(this)
    }, THREE.Animation.prototype.stop = function() {
        this.isPlaying = !1, THREE.AnimationHandler.stop(this)
    }, THREE.Animation.prototype.reset = function() {
        for (var e = 0, t = this.hierarchy.length; t > e; e++) {
            var r = this.hierarchy[e];
            r.matrixAutoUpdate = !0, void 0 === r.animationCache && (r.animationCache = {}), void 0 === r.animationCache[this.data.name] && (r.animationCache[this.data.name] = {}, r.animationCache[this.data.name].prevKey = {
                pos: 0,
                rot: 0,
                scl: 0
            }, r.animationCache[this.data.name].nextKey = {
                pos: 0,
                rot: 0,
                scl: 0
            }, r.animationCache[this.data.name].originalMatrix = r.matrix);
            for (var i = r.animationCache[this.data.name], n = 0; 3 > n; n++) {
                for (var a = this.keyTypes[n], o = this.data.hierarchy[e].keys[0], s = this.getNextKeyWith(a, e, 1); s.time < this.currentTime && s.index > o.index;) o = s, s = this.getNextKeyWith(a, e, s.index + 1);
                i.prevKey[a] = o, i.nextKey[a] = s
            }
        }
    }, THREE.Animation.prototype.update = function() {
        var e = [],
            t = new THREE.Vector3,
            r = new THREE.Vector3,
            i = new THREE.Quaternion,
            n = function(e, t) {
                var r, i, n, o, s, h, l, c, u, f = [],
                    E = [];
                return r = (e.length - 1) * t, i = Math.floor(r), n = r - i, f[0] = 0 === i ? i : i - 1, f[1] = i, f[2] = i > e.length - 2 ? i : i + 1, f[3] = i > e.length - 3 ? i : i + 2, h = e[f[0]], l = e[f[1]], c = e[f[2]], u = e[f[3]], o = n * n, s = n * o, E[0] = a(h[0], l[0], c[0], u[0], n, o, s), E[1] = a(h[1], l[1], c[1], u[1], n, o, s), E[2] = a(h[2], l[2], c[2], u[2], n, o, s), E
            },
            a = function(e, t, r, i, n, a, o) {
                var s = .5 * (r - e),
                    h = .5 * (i - t);
                return (2 * (t - r) + s + h) * o + (-3 * (t - r) - 2 * s - h) * a + s * n + t
            };
        return function(a) {
            if (this.isPlaying !== !1 && (this.currentTime += a * this.timeScale, 0 !== this.weight)) {
                var o = this.data.length;
                if (this.loop === !0 && this.currentTime > o) this.currentTime %= o, this.reset();
                else if (this.loop === !1 && this.currentTime > o) return void this.stop();
                for (var s = 0, h = this.hierarchy.length; h > s; s++)
                    for (var l = this.hierarchy[s], c = l.animationCache[this.data.name], u = 0; 3 > u; u++) {
                        var f = this.keyTypes[u],
                            E = c.prevKey[f],
                            p = c.nextKey[f];
                        if (p.time <= this.currentTime) {
                            for (E = this.data.hierarchy[s].keys[0], p = this.getNextKeyWith(f, s, 1); p.time < this.currentTime && p.index > E.index;) E = p, p = this.getNextKeyWith(f, s, p.index + 1);
                            c.prevKey[f] = E, c.nextKey[f] = p
                        }
                        l.matrixAutoUpdate = !0, l.matrixWorldNeedsUpdate = !0;
                        var d = (this.currentTime - E.time) / (p.time - E.time),
                            m = E[f],
                            v = p[f];
                        if (0 > d && (d = 0), d > 1 && (d = 1), "pos" === f) {
                            if (this.interpolationType === THREE.AnimationHandler.LINEAR)
                                if (r.x = m[0] + (v[0] - m[0]) * d, r.y = m[1] + (v[1] - m[1]) * d, r.z = m[2] + (v[2] - m[2]) * d, l instanceof THREE.Bone) {
                                    var g = this.weight / (this.weight + l.accumulatedPosWeight);
                                    l.position.lerp(r, g), l.accumulatedPosWeight += this.weight
                                } else l.position.copy(r);
                            else if (this.interpolationType === THREE.AnimationHandler.CATMULLROM || this.interpolationType === THREE.AnimationHandler.CATMULLROM_FORWARD) {
                                e[0] = this.getPrevKeyWith("pos", s, E.index - 1).pos, e[1] = m, e[2] = v, e[3] = this.getNextKeyWith("pos", s, p.index + 1).pos, d = .33 * d + .33;
                                var T = n(e, d),
                                    g = 1;
                                l instanceof THREE.Bone && (g = this.weight / (this.weight + l.accumulatedPosWeight), l.accumulatedPosWeight += this.weight);
                                var y = l.position;
                                if (y.x = y.x + (T[0] - y.x) * g, y.y = y.y + (T[1] - y.y) * g, y.z = y.z + (T[2] - y.z) * g, this.interpolationType === THREE.AnimationHandler.CATMULLROM_FORWARD) {
                                    var R = n(e, 1.01 * d);
                                    t.set(R[0], R[1], R[2]), t.sub(y), t.y = 0, t.normalize();
                                    var x = Math.atan2(t.x, t.z);
                                    l.rotation.set(0, x, 0)
                                }
                            }
                        } else if ("rot" === f)
                            if (THREE.Quaternion.slerp(m, v, i, d), l instanceof THREE.Bone)
                                if (0 === l.accumulatedRotWeight) l.quaternion.copy(i), l.accumulatedRotWeight = this.weight;
                                else {
                                    var g = this.weight / (this.weight + l.accumulatedRotWeight);
                                    THREE.Quaternion.slerp(l.quaternion, i, l.quaternion, g), l.accumulatedRotWeight += this.weight
                                } else l.quaternion.copy(i);
                        else if ("scl" === f)
                            if (r.x = m[0] + (v[0] - m[0]) * d, r.y = m[1] + (v[1] - m[1]) * d, r.z = m[2] + (v[2] - m[2]) * d, l instanceof THREE.Bone) {
                                var g = this.weight / (this.weight + l.accumulatedSclWeight);
                                l.scale.lerp(r, g), l.accumulatedSclWeight += this.weight
                            } else l.scale.copy(r)
                    }
                return !0
            }
        }
    }(), THREE.Animation.prototype.getNextKeyWith = function(e, t, r) {
        var i = this.data.hierarchy[t].keys;
        for (this.interpolationType === THREE.AnimationHandler.CATMULLROM || this.interpolationType === THREE.AnimationHandler.CATMULLROM_FORWARD ? r = r < i.length - 1 ? r : i.length - 1 : r %= i.length; r < i.length; r++)
            if (void 0 !== i[r][e]) return i[r];
        return this.data.hierarchy[t].keys[0]
    }, THREE.Animation.prototype.getPrevKeyWith = function(e, t, r) {
        var i = this.data.hierarchy[t].keys;
        for (r = this.interpolationType === THREE.AnimationHandler.CATMULLROM || this.interpolationType === THREE.AnimationHandler.CATMULLROM_FORWARD ? r > 0 ? r : 0 : r >= 0 ? r : r + i.length; r >= 0; r--)
            if (void 0 !== i[r][e]) return i[r];
        return this.data.hierarchy[t].keys[i.length - 1]
    }, THREE.KeyFrameAnimation = function(e) {
        this.root = e.node, this.data = THREE.AnimationHandler.init(e), this.hierarchy = THREE.AnimationHandler.parse(this.root), this.currentTime = 0, this.timeScale = .001, this.isPlaying = !1, this.isPaused = !0, this.loop = !0;
        for (var t = 0, r = this.hierarchy.length; r > t; t++) {
            var i = this.data.hierarchy[t].keys,
                n = this.data.hierarchy[t].sids,
                a = this.hierarchy[t];
            if (i.length && n) {
                for (var o = 0; o < n.length; o++) {
                    var s = n[o],
                        h = this.getNextKeyWith(s, t, 0);
                    h && h.apply(s)
                }
                a.matrixAutoUpdate = !1, this.data.hierarchy[t].node.updateMatrix(), a.matrixWorldNeedsUpdate = !0
            }
        }
    }, THREE.KeyFrameAnimation.prototype.play = function(e) {
        if (this.currentTime = void 0 !== e ? e : 0, this.isPlaying === !1) {
            this.isPlaying = !0;
            var t, r, i, n = this.hierarchy.length;
            for (t = 0; n > t; t++) {
                r = this.hierarchy[t], i = this.data.hierarchy[t], void 0 === i.animationCache && (i.animationCache = {}, i.animationCache.prevKey = null, i.animationCache.nextKey = null, i.animationCache.originalMatrix = r.matrix);
                var a = this.data.hierarchy[t].keys;
                a.length && (i.animationCache.prevKey = a[0], i.animationCache.nextKey = a[1], this.startTime = Math.min(a[0].time, this.startTime), this.endTime = Math.max(a[a.length - 1].time, this.endTime))
            }
            this.update(0)
        }
        this.isPaused = !1, THREE.AnimationHandler.play(this)
    }, THREE.KeyFrameAnimation.prototype.stop = function() {
        this.isPlaying = !1, this.isPaused = !1, THREE.AnimationHandler.stop(this);
        for (var e = 0; e < this.data.hierarchy.length; e++) {
            var t = this.hierarchy[e],
                r = this.data.hierarchy[e];
            if (void 0 !== r.animationCache) {
                var i = r.animationCache.originalMatrix;
                i.copy(t.matrix), t.matrix = i, delete r.animationCache
            }
        }
    }, THREE.KeyFrameAnimation.prototype.update = function(e) {
        if (this.isPlaying !== !1) {
            this.currentTime += e * this.timeScale;
            var t = this.data.length;
            this.loop === !0 && this.currentTime > t && (this.currentTime %= t), this.currentTime = Math.min(this.currentTime, t);
            for (var r = 0, i = this.hierarchy.length; i > r; r++) {
                var n = this.hierarchy[r],
                    a = this.data.hierarchy[r],
                    o = a.keys,
                    s = a.animationCache;
                if (o.length) {
                    var h = s.prevKey,
                        l = s.nextKey;
                    if (l.time <= this.currentTime) {
                        for (; l.time < this.currentTime && l.index > h.index;) h = l, l = o[h.index + 1];
                        s.prevKey = h, s.nextKey = l
                    }
                    l.time >= this.currentTime ? h.interpolate(l, this.currentTime) : h.interpolate(l, l.time), this.data.hierarchy[r].node.updateMatrix(), n.matrixWorldNeedsUpdate = !0
                }
            }
        }
    }, THREE.KeyFrameAnimation.prototype.getNextKeyWith = function(e, t, r) {
        var i = this.data.hierarchy[t].keys;
        for (r %= i.length; r < i.length; r++)
            if (i[r].hasTarget(e)) return i[r];
        return i[0]
    }, THREE.KeyFrameAnimation.prototype.getPrevKeyWith = function(e, t, r) {
        var i = this.data.hierarchy[t].keys;
        for (r = r >= 0 ? r : r + i.length; r >= 0; r--)
            if (i[r].hasTarget(e)) return i[r];
        return i[i.length - 1]
    }, THREE.MorphAnimation = function(e) {
        this.mesh = e, this.frames = e.morphTargetInfluences.length, this.currentTime = 0, this.duration = 1e3, this.loop = !0, this.isPlaying = !1
    }, THREE.MorphAnimation.prototype = {
        play: function() {
            this.isPlaying = !0
        },
        pause: function() {
            this.isPlaying = !1
        },
        update: function() {
            var e = 0,
                t = 0;
            return function(r) {
                if (this.isPlaying !== !1) {
                    this.currentTime += r, this.loop === !0 && this.currentTime > this.duration && (this.currentTime %= this.duration), this.currentTime = Math.min(this.currentTime, this.duration);
                    var i = this.duration / this.frames,
                        n = Math.floor(this.currentTime / i);
                    n != t && (this.mesh.morphTargetInfluences[e] = 0, this.mesh.morphTargetInfluences[t] = 1, this.mesh.morphTargetInfluences[n] = 0, e = t, t = n), this.mesh.morphTargetInfluences[n] = this.currentTime % i / i, this.mesh.morphTargetInfluences[e] = 1 - this.mesh.morphTargetInfluences[n]
                }
            }
        }()
    }, THREE.BoxGeometry = function(e, t, r, i, n, a) {
        function o(e, t, r, i, n, a, o, h) {
            var l, c, u, f = s.widthSegments,
                E = s.heightSegments,
                p = n / 2,
                d = a / 2,
                m = s.vertices.length;
            "x" === e && "y" === t || "y" === e && "x" === t ? l = "z" : "x" === e && "z" === t || "z" === e && "x" === t ? (l = "y", E = s.depthSegments) : ("z" === e && "y" === t || "y" === e && "z" === t) && (l = "x", f = s.depthSegments);
            var v = f + 1,
                g = E + 1,
                T = n / f,
                y = a / E,
                R = new THREE.Vector3;
            for (R[l] = o > 0 ? 1 : -1, u = 0; g > u; u++)
                for (c = 0; v > c; c++) {
                    var x = new THREE.Vector3;
                    x[e] = (c * T - p) * r, x[t] = (u * y - d) * i, x[l] = o, s.vertices.push(x)
                }
            for (u = 0; E > u; u++)
                for (c = 0; f > c; c++) {
                    var H = c + v * u,
                        b = c + v * (u + 1),
                        _ = c + 1 + v * (u + 1),
                        w = c + 1 + v * u,
                        M = new THREE.Vector2(c / f, 1 - u / E),
                        S = new THREE.Vector2(c / f, 1 - (u + 1) / E),
                        C = new THREE.Vector2((c + 1) / f, 1 - (u + 1) / E),
                        A = new THREE.Vector2((c + 1) / f, 1 - u / E),
                        L = new THREE.Face3(H + m, b + m, w + m);
                    L.normal.copy(R), L.vertexNormals.push(R.clone(), R.clone(), R.clone()), L.materialIndex = h, s.faces.push(L), s.faceVertexUvs[0].push([M, S, A]), L = new THREE.Face3(b + m, _ + m, w + m), L.normal.copy(R), L.vertexNormals.push(R.clone(), R.clone(), R.clone()), L.materialIndex = h, s.faces.push(L), s.faceVertexUvs[0].push([S.clone(), C, A.clone()])
                }
        }
        THREE.Geometry.call(this), this.parameters = {
            width: e,
            height: t,
            depth: r,
            widthSegments: i,
            heightSegments: n,
            depthSegments: a
        }, this.widthSegments = i || 1, this.heightSegments = n || 1, this.depthSegments = a || 1;
        var s = this,
            h = e / 2,
            l = t / 2,
            c = r / 2;
        o("z", "y", -1, -1, r, t, h, 0), o("z", "y", 1, -1, r, t, -h, 1), o("x", "z", 1, 1, e, r, l, 2), o("x", "z", 1, -1, e, r, -l, 3), o("x", "y", 1, -1, e, t, c, 4), o("x", "y", -1, -1, e, t, -c, 5), this.mergeVertices()
    }, THREE.BoxGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.CircleGeometry = function(e, t, r, i) {
        THREE.Geometry.call(this), this.parameters = {
            radius: e,
            segments: t,
            thetaStart: r,
            thetaLength: i
        }, e = e || 50, t = void 0 !== t ? Math.max(3, t) : 8, r = void 0 !== r ? r : 0, i = void 0 !== i ? i : 2 * Math.PI;
        var n, a = [],
            o = new THREE.Vector3,
            s = new THREE.Vector2(.5, .5);
        for (this.vertices.push(o), a.push(s), n = 0; t >= n; n++) {
            var h = new THREE.Vector3,
                l = r + n / t * i;
            h.x = e * Math.cos(l), h.y = e * Math.sin(l), this.vertices.push(h), a.push(new THREE.Vector2((h.x / e + 1) / 2, (h.y / e + 1) / 2))
        }
        var c = new THREE.Vector3(0, 0, 1);
        for (n = 1; t >= n; n++) this.faces.push(new THREE.Face3(n, n + 1, 0, [c.clone(), c.clone(), c.clone()])), this.faceVertexUvs[0].push([a[n].clone(), a[n + 1].clone(), s.clone()]);
        this.computeFaceNormals(), this.boundingSphere = new THREE.Sphere(new THREE.Vector3, e)
    }, THREE.CircleGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.CubeGeometry = function(e, t, r, i, n, a) {
        return console.warn("THEE.CubeGeometry has been renamed to THREE.BoxGeometry."), new THREE.BoxGeometry(e, t, r, i, n, a)
    }, THREE.CylinderGeometry = function(e, t, r, i, n, a) {
        THREE.Geometry.call(this), this.parameters = {
            radiusTop: e,
            radiusBottom: t,
            height: r,
            radialSegments: i,
            heightSegments: n,
            openEnded: a
        }, e = void 0 !== e ? e : 20, t = void 0 !== t ? t : 20, r = void 0 !== r ? r : 100, i = i || 8, n = n || 1, a = void 0 !== a ? a : !1;
        var o, s, h = r / 2,
            l = [],
            c = [];
        for (s = 0; n >= s; s++) {
            var u = [],
                f = [],
                E = s / n,
                p = E * (t - e) + e;
            for (o = 0; i >= o; o++) {
                var d = o / i,
                    m = new THREE.Vector3;
                m.x = p * Math.sin(d * Math.PI * 2), m.y = -E * r + h, m.z = p * Math.cos(d * Math.PI * 2), this.vertices.push(m), u.push(this.vertices.length - 1), f.push(new THREE.Vector2(d, 1 - E))
            }
            l.push(u), c.push(f)
        }
        var v, g, T = (t - e) / r;
        for (o = 0; i > o; o++)
            for (0 !== e ? (v = this.vertices[l[0][o]].clone(), g = this.vertices[l[0][o + 1]].clone()) : (v = this.vertices[l[1][o]].clone(), g = this.vertices[l[1][o + 1]].clone()), v.setY(Math.sqrt(v.x * v.x + v.z * v.z) * T).normalize(), g.setY(Math.sqrt(g.x * g.x + g.z * g.z) * T).normalize(), s = 0; n > s; s++) {
                var y = l[s][o],
                    R = l[s + 1][o],
                    x = l[s + 1][o + 1],
                    H = l[s][o + 1],
                    b = v.clone(),
                    _ = v.clone(),
                    w = g.clone(),
                    M = g.clone(),
                    S = c[s][o].clone(),
                    C = c[s + 1][o].clone(),
                    A = c[s + 1][o + 1].clone(),
                    L = c[s][o + 1].clone();
                this.faces.push(new THREE.Face3(y, R, H, [b, _, M])), this.faceVertexUvs[0].push([S, C, L]), this.faces.push(new THREE.Face3(R, x, H, [_.clone(), w, M.clone()])), this.faceVertexUvs[0].push([C.clone(), A, L.clone()])
            }
        if (a === !1 && e > 0)
            for (this.vertices.push(new THREE.Vector3(0, h, 0)), o = 0; i > o; o++) {
                var y = l[0][o],
                    R = l[0][o + 1],
                    x = this.vertices.length - 1,
                    b = new THREE.Vector3(0, 1, 0),
                    _ = new THREE.Vector3(0, 1, 0),
                    w = new THREE.Vector3(0, 1, 0),
                    S = c[0][o].clone(),
                    C = c[0][o + 1].clone(),
                    A = new THREE.Vector2(C.x, 0);
                this.faces.push(new THREE.Face3(y, R, x, [b, _, w])), this.faceVertexUvs[0].push([S, C, A])
            }
        if (a === !1 && t > 0)
            for (this.vertices.push(new THREE.Vector3(0, -h, 0)), o = 0; i > o; o++) {
                var y = l[s][o + 1],
                    R = l[s][o],
                    x = this.vertices.length - 1,
                    b = new THREE.Vector3(0, -1, 0),
                    _ = new THREE.Vector3(0, -1, 0),
                    w = new THREE.Vector3(0, -1, 0),
                    S = c[s][o + 1].clone(),
                    C = c[s][o].clone(),
                    A = new THREE.Vector2(C.x, 1);
                this.faces.push(new THREE.Face3(y, R, x, [b, _, w])), this.faceVertexUvs[0].push([S, C, A])
            }
        this.computeFaceNormals()
    }, THREE.CylinderGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.ExtrudeGeometry = function(e, t) {
        return "undefined" == typeof e ? void(e = []) : (THREE.Geometry.call(this), e = e instanceof Array ? e : [e], this.addShapeList(e, t), void this.computeFaceNormals())
    }, THREE.ExtrudeGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.ExtrudeGeometry.prototype.addShapeList = function(e, t) {
        for (var r = e.length, i = 0; r > i; i++) {
            var n = e[i];
            this.addShape(n, t)
        }
    }, THREE.ExtrudeGeometry.prototype.addShape = function(e, t) {
        function r(e, t, r) {
            return t || console.log("die"), t.clone().multiplyScalar(r).add(e)
        }

        function i(e, t, r) {
            var i, n, a = 1e-10,
                o = THREE.Math.sign,
                s = 1,
                h = e.x - t.x,
                l = e.y - t.y,
                c = r.x - e.x,
                u = r.y - e.y,
                f = h * h + l * l,
                E = h * u - l * c;
            if (Math.abs(E) > a) {
                var p = Math.sqrt(f),
                    d = Math.sqrt(c * c + u * u),
                    m = t.x - l / p,
                    v = t.y + h / p,
                    g = r.x - u / d,
                    T = r.y + c / d,
                    y = ((g - m) * u - (T - v) * c) / (h * u - l * c);
                i = m + h * y - e.x, n = v + l * y - e.y;
                var R = i * i + n * n;
                if (2 >= R) return new THREE.Vector2(i, n);
                s = Math.sqrt(R / 2)
            } else {
                var x = !1;
                h > a ? c > a && (x = !0) : -a > h ? -a > c && (x = !0) : o(l) == o(u) && (x = !0), x ? (i = -l, n = h, s = Math.sqrt(f)) : (i = h, n = l, s = Math.sqrt(f / 2))
            }
            return new THREE.Vector2(i / s, n / s)
        }

        function n() {
            if (T) {
                var e = 0,
                    t = W * e;
                for (Y = 0; j > Y; Y++) G = V[Y], h(G[2] + t, G[1] + t, G[0] + t, !0);
                for (e = R + 2 * g, t = W * e, Y = 0; j > Y; Y++) G = V[Y], h(G[0] + t, G[1] + t, G[2] + t, !1)
            } else {
                for (Y = 0; j > Y; Y++) G = V[Y], h(G[2], G[1], G[0], !0);
                for (Y = 0; j > Y; Y++) G = V[Y], h(G[0] + W * R, G[1] + W * R, G[2] + W * R, !1)
            }
        }

        function a() {
            var e = 0;
            for (o(z, e), e += z.length, S = 0, C = D.length; C > S; S++) M = D[S], o(M, e), e += M.length
        }

        function o(e, t) {
            var r, i;
            for (Y = e.length; --Y >= 0;) {
                r = Y, i = Y - 1, 0 > i && (i = e.length - 1);
                var n = 0,
                    a = R + 2 * g;
                for (n = 0; a > n; n++) {
                    var o = W * n,
                        s = W * (n + 1),
                        h = t + r + o,
                        c = t + i + o,
                        u = t + i + s,
                        f = t + r + s;
                    l(h, c, u, f, e, n, a, r, i)
                }
            }
        }

        function s(e, t, r) {
            A.vertices.push(new THREE.Vector3(e, t, r))
        }

        function h(r, i, n, a) {
            r += L, i += L, n += L, A.faces.push(new THREE.Face3(r, i, n, null, null, b));
            var o = a ? w.generateBottomUV(A, e, t, r, i, n) : w.generateTopUV(A, e, t, r, i, n);
            A.faceVertexUvs[0].push(o)
        }

        function l(r, i, n, a, o, s, h, l, c) {
            r += L, i += L, n += L, a += L, A.faces.push(new THREE.Face3(r, i, a, null, null, _)), A.faces.push(new THREE.Face3(i, n, a, null, null, _));
            var u = w.generateSideWallUV(A, e, o, t, r, i, n, a, s, h, l, c);
            A.faceVertexUvs[0].push([u[0], u[1], u[3]]), A.faceVertexUvs[0].push([u[1], u[2], u[3]])
        }
        var c, u, f, E, p, d = void 0 !== t.amount ? t.amount : 100,
            m = void 0 !== t.bevelThickness ? t.bevelThickness : 6,
            v = void 0 !== t.bevelSize ? t.bevelSize : m - 2,
            g = void 0 !== t.bevelSegments ? t.bevelSegments : 3,
            T = void 0 !== t.bevelEnabled ? t.bevelEnabled : !0,
            y = void 0 !== t.curveSegments ? t.curveSegments : 12,
            R = void 0 !== t.steps ? t.steps : 1,
            x = t.extrudePath,
            H = !1,
            b = t.material,
            _ = t.extrudeMaterial,
            w = void 0 !== t.UVGenerator ? t.UVGenerator : THREE.ExtrudeGeometry.WorldUVGenerator;
        x && (c = x.getSpacedPoints(R), H = !0, T = !1, u = void 0 !== t.frames ? t.frames : new THREE.TubeGeometry.FrenetFrames(x, R, !1), f = new THREE.Vector3, E = new THREE.Vector3, p = new THREE.Vector3), T || (g = 0, m = 0, v = 0);
        var M, S, C, A = this,
            L = this.vertices.length,
            P = e.extractPoints(y),
            F = P.shape,
            D = P.holes,
            U = !THREE.Shape.Utils.isClockWise(F);
        if (U) {
            for (F = F.reverse(), S = 0, C = D.length; C > S; S++) M = D[S], THREE.Shape.Utils.isClockWise(M) && (D[S] = M.reverse());
            U = !1
        }
        var V = THREE.Shape.Utils.triangulateShape(F, D),
            z = F;
        for (S = 0, C = D.length; C > S; S++) M = D[S], F = F.concat(M);
        for (var B, k, N, O, I, G, W = F.length, j = V.length, X = (z.length, 180 / Math.PI, []), Y = 0, q = z.length, K = q - 1, Z = Y + 1; q > Y; Y++, K++, Z++) {
            K === q && (K = 0), Z === q && (Z = 0); {
                z[Y], z[K], z[Z]
            }
            X[Y] = i(z[Y], z[K], z[Z])
        }
        var Q, J = [],
            $ = X.concat();
        for (S = 0, C = D.length; C > S; S++) {
            for (M = D[S], Q = [], Y = 0, q = M.length, K = q - 1, Z = Y + 1; q > Y; Y++, K++, Z++) K === q && (K = 0), Z === q && (Z = 0), Q[Y] = i(M[Y], M[K], M[Z]);
            J.push(Q), $ = $.concat(Q)
        }
        for (B = 0; g > B; B++) {
            for (N = B / g, O = m * (1 - N), k = v * Math.sin(N * Math.PI / 2), Y = 0, q = z.length; q > Y; Y++) I = r(z[Y], X[Y], k), s(I.x, I.y, -O);
            for (S = 0, C = D.length; C > S; S++)
                for (M = D[S], Q = J[S], Y = 0, q = M.length; q > Y; Y++) I = r(M[Y], Q[Y], k), s(I.x, I.y, -O)
        }
        for (k = v, Y = 0; W > Y; Y++) I = T ? r(F[Y], $[Y], k) : F[Y], H ? (E.copy(u.normals[0]).multiplyScalar(I.x), f.copy(u.binormals[0]).multiplyScalar(I.y), p.copy(c[0]).add(E).add(f), s(p.x, p.y, p.z)) : s(I.x, I.y, 0);
        var et;
        for (et = 1; R >= et; et++)
            for (Y = 0; W > Y; Y++) I = T ? r(F[Y], $[Y], k) : F[Y], H ? (E.copy(u.normals[et]).multiplyScalar(I.x), f.copy(u.binormals[et]).multiplyScalar(I.y), p.copy(c[et]).add(E).add(f), s(p.x, p.y, p.z)) : s(I.x, I.y, d / R * et);
        for (B = g - 1; B >= 0; B--) {
            for (N = B / g, O = m * (1 - N), k = v * Math.sin(N * Math.PI / 2), Y = 0, q = z.length; q > Y; Y++) I = r(z[Y], X[Y], k), s(I.x, I.y, d + O);
            for (S = 0, C = D.length; C > S; S++)
                for (M = D[S], Q = J[S], Y = 0, q = M.length; q > Y; Y++) I = r(M[Y], Q[Y], k), H ? s(I.x, I.y + c[R - 1].y, c[R - 1].x + O) : s(I.x, I.y, d + O)
        }
        n(), a()
    }, THREE.ExtrudeGeometry.WorldUVGenerator = {
        generateTopUV: function(e, t, r, i, n, a) {
            var o = e.vertices[i].x,
                s = e.vertices[i].y,
                h = e.vertices[n].x,
                l = e.vertices[n].y,
                c = e.vertices[a].x,
                u = e.vertices[a].y;
            return [new THREE.Vector2(o, s), new THREE.Vector2(h, l), new THREE.Vector2(c, u)]
        },
        generateBottomUV: function(e, t, r, i, n, a) {
            return this.generateTopUV(e, t, r, i, n, a)
        },
        generateSideWallUV: function(e, t, r, i, n, a, o, s) {
            var h = e.vertices[n].x,
                l = e.vertices[n].y,
                c = e.vertices[n].z,
                u = e.vertices[a].x,
                f = e.vertices[a].y,
                E = e.vertices[a].z,
                p = e.vertices[o].x,
                d = e.vertices[o].y,
                m = e.vertices[o].z,
                v = e.vertices[s].x,
                g = e.vertices[s].y,
                T = e.vertices[s].z;
            return Math.abs(l - f) < .01 ? [new THREE.Vector2(h, 1 - c), new THREE.Vector2(u, 1 - E), new THREE.Vector2(p, 1 - m), new THREE.Vector2(v, 1 - T)] : [new THREE.Vector2(l, 1 - c), new THREE.Vector2(f, 1 - E), new THREE.Vector2(d, 1 - m), new THREE.Vector2(g, 1 - T)]
        }
    }, THREE.ExtrudeGeometry.__v1 = new THREE.Vector2, THREE.ExtrudeGeometry.__v2 = new THREE.Vector2, THREE.ExtrudeGeometry.__v3 = new THREE.Vector2, THREE.ExtrudeGeometry.__v4 = new THREE.Vector2, THREE.ExtrudeGeometry.__v5 = new THREE.Vector2, THREE.ExtrudeGeometry.__v6 = new THREE.Vector2, THREE.ShapeGeometry = function(e, t) {
        THREE.Geometry.call(this), e instanceof Array == !1 && (e = [e]), this.addShapeList(e, t), this.computeFaceNormals()
    }, THREE.ShapeGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.ShapeGeometry.prototype.addShapeList = function(e, t) {
        for (var r = 0, i = e.length; i > r; r++) this.addShape(e[r], t);
        return this
    }, THREE.ShapeGeometry.prototype.addShape = function(e, t) {
        void 0 === t && (t = {});
        var r, i, n, a = void 0 !== t.curveSegments ? t.curveSegments : 12,
            o = t.material,
            s = void 0 === t.UVGenerator ? THREE.ExtrudeGeometry.WorldUVGenerator : t.UVGenerator,
            h = this.vertices.length,
            l = e.extractPoints(a),
            c = l.shape,
            u = l.holes,
            f = !THREE.Shape.Utils.isClockWise(c);
        if (f) {
            for (c = c.reverse(), r = 0, i = u.length; i > r; r++) n = u[r], THREE.Shape.Utils.isClockWise(n) && (u[r] = n.reverse());
            f = !1
        }
        var E = THREE.Shape.Utils.triangulateShape(c, u),
            p = c;
        for (r = 0, i = u.length; i > r; r++) n = u[r], c = c.concat(n); {
            var d, m, v = c.length,
                g = E.length;
            p.length
        }
        for (r = 0; v > r; r++) d = c[r], this.vertices.push(new THREE.Vector3(d.x, d.y, 0));
        for (r = 0; g > r; r++) {
            m = E[r];
            var T = m[0] + h,
                y = m[1] + h,
                R = m[2] + h;
            this.faces.push(new THREE.Face3(T, y, R, null, null, o)), this.faceVertexUvs[0].push(s.generateBottomUV(this, e, t, T, y, R))
        }
    }, THREE.LatheGeometry = function(e, t, r, i) {
        THREE.Geometry.call(this), t = t || 12, r = r || 0, i = i || 2 * Math.PI;
        for (var n = 1 / (e.length - 1), a = 1 / t, o = 0, s = t; s >= o; o++)
            for (var h = r + o * a * i, l = Math.cos(h), c = Math.sin(h), u = 0, f = e.length; f > u; u++) {
                var E = e[u],
                    p = new THREE.Vector3;
                p.x = l * E.x - c * E.y, p.y = c * E.x + l * E.y, p.z = E.z, this.vertices.push(p)
            }
        for (var d = e.length, o = 0, s = t; s > o; o++)
            for (var u = 0, f = e.length - 1; f > u; u++) {
                var m = u + d * o,
                    v = m,
                    g = m + d,
                    l = m + 1 + d,
                    T = m + 1,
                    y = o * a,
                    R = u * n,
                    x = y + a,
                    H = R + n;
                this.faces.push(new THREE.Face3(v, g, T)), this.faceVertexUvs[0].push([new THREE.Vector2(y, R), new THREE.Vector2(x, R), new THREE.Vector2(y, H)]), this.faces.push(new THREE.Face3(g, l, T)), this.faceVertexUvs[0].push([new THREE.Vector2(x, R), new THREE.Vector2(x, H), new THREE.Vector2(y, H)])
            }
        this.mergeVertices(), this.computeFaceNormals(), this.computeVertexNormals()
    }, THREE.LatheGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.PlaneGeometry = function(e, t, r, i) {
        THREE.Geometry.call(this), this.parameters = {
            width: e,
            height: t,
            widthSegments: r,
            heightSegments: i
        };
        var n, a, o = e / 2,
            s = t / 2,
            h = r || 1,
            l = i || 1,
            c = h + 1,
            u = l + 1,
            f = e / h,
            E = t / l,
            p = new THREE.Vector3(0, 0, 1);
        for (a = 0; u > a; a++) {
            var d = a * E - s;
            for (n = 0; c > n; n++) {
                var m = n * f - o;
                this.vertices.push(new THREE.Vector3(m, -d, 0))
            }
        }
        for (a = 0; l > a; a++)
            for (n = 0; h > n; n++) {
                var v = n + c * a,
                    g = n + c * (a + 1),
                    T = n + 1 + c * (a + 1),
                    y = n + 1 + c * a,
                    R = new THREE.Vector2(n / h, 1 - a / l),
                    x = new THREE.Vector2(n / h, 1 - (a + 1) / l),
                    H = new THREE.Vector2((n + 1) / h, 1 - (a + 1) / l),
                    b = new THREE.Vector2((n + 1) / h, 1 - a / l),
                    _ = new THREE.Face3(v, g, y);
                _.normal.copy(p), _.vertexNormals.push(p.clone(), p.clone(), p.clone()), this.faces.push(_), this.faceVertexUvs[0].push([R, x, b]), _ = new THREE.Face3(g, T, y), _.normal.copy(p), _.vertexNormals.push(p.clone(), p.clone(), p.clone()), this.faces.push(_), this.faceVertexUvs[0].push([x.clone(), H, b.clone()])
            }
    }, THREE.PlaneGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.RingGeometry = function(e, t, r, i, n, a) {
        THREE.Geometry.call(this), e = e || 0, t = t || 50, n = void 0 !== n ? n : 0, a = void 0 !== a ? a : 2 * Math.PI, r = void 0 !== r ? Math.max(3, r) : 8, i = void 0 !== i ? Math.max(1, i) : 8;
        var o, s, h = [],
            l = e,
            c = (t - e) / i;
        for (o = 0; i + 1 > o; o++) {
            for (s = 0; r + 1 > s; s++) {
                var u = new THREE.Vector3,
                    f = n + s / r * a;
                u.x = l * Math.cos(f), u.y = l * Math.sin(f), this.vertices.push(u), h.push(new THREE.Vector2((u.x / t + 1) / 2, (u.y / t + 1) / 2))
            }
            l += c
        }
        var E = new THREE.Vector3(0, 0, 1);
        for (o = 0; i > o; o++) {
            var p = o * (r + 1);
            for (s = 0; r > s; s++) {
                var f = s + p,
                    d = f,
                    m = f + r + 1,
                    v = f + r + 2;
                this.faces.push(new THREE.Face3(d, m, v, [E.clone(), E.clone(), E.clone()])), this.faceVertexUvs[0].push([h[d].clone(), h[m].clone(), h[v].clone()]), d = f, m = f + r + 2, v = f + 1, this.faces.push(new THREE.Face3(d, m, v, [E.clone(), E.clone(), E.clone()])), this.faceVertexUvs[0].push([h[d].clone(), h[m].clone(), h[v].clone()])
            }
        }
        this.computeFaceNormals(), this.boundingSphere = new THREE.Sphere(new THREE.Vector3, l)
    }, THREE.RingGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.SphereGeometry = function(e, t, r, i, n, a, o) {
        THREE.Geometry.call(this), this.parameters = {
            radius: e,
            widthSegments: t,
            heightSegments: r,
            phiStart: i,
            phiLength: n,
            thetaStart: a,
            thetaLength: o
        }, e = e || 50, t = Math.max(3, Math.floor(t) || 8), r = Math.max(2, Math.floor(r) || 6), i = void 0 !== i ? i : 0, n = void 0 !== n ? n : 2 * Math.PI, a = void 0 !== a ? a : 0, o = void 0 !== o ? o : Math.PI;
        var s, h, l = [],
            c = [];
        for (h = 0; r >= h; h++) {
            var u = [],
                f = [];
            for (s = 0; t >= s; s++) {
                var E = s / t,
                    p = h / r,
                    d = new THREE.Vector3;
                d.x = -e * Math.cos(i + E * n) * Math.sin(a + p * o), d.y = e * Math.cos(a + p * o), d.z = e * Math.sin(i + E * n) * Math.sin(a + p * o), this.vertices.push(d), u.push(this.vertices.length - 1), f.push(new THREE.Vector2(E, 1 - p))
            }
            l.push(u), c.push(f)
        }
        for (h = 0; r > h; h++)
            for (s = 0; t > s; s++) {
                var m = l[h][s + 1],
                    v = l[h][s],
                    g = l[h + 1][s],
                    T = l[h + 1][s + 1],
                    y = this.vertices[m].clone().normalize(),
                    R = this.vertices[v].clone().normalize(),
                    x = this.vertices[g].clone().normalize(),
                    H = this.vertices[T].clone().normalize(),
                    b = c[h][s + 1].clone(),
                    _ = c[h][s].clone(),
                    w = c[h + 1][s].clone(),
                    M = c[h + 1][s + 1].clone();
                Math.abs(this.vertices[m].y) === e ? (b.x = (b.x + _.x) / 2, this.faces.push(new THREE.Face3(m, g, T, [y, x, H])), this.faceVertexUvs[0].push([b, w, M])) : Math.abs(this.vertices[g].y) === e ? (w.x = (w.x + M.x) / 2, this.faces.push(new THREE.Face3(m, v, g, [y, R, x])), this.faceVertexUvs[0].push([b, _, w])) : (this.faces.push(new THREE.Face3(m, v, T, [y, R, H])), this.faceVertexUvs[0].push([b, _, M]), this.faces.push(new THREE.Face3(v, g, T, [R.clone(), x, H.clone()])), this.faceVertexUvs[0].push([_.clone(), w, M.clone()]))
            }
        this.computeFaceNormals(), this.boundingSphere = new THREE.Sphere(new THREE.Vector3, e)
    }, THREE.SphereGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.TextGeometry = function(e, t) {
        t = t || {};
        var r = THREE.FontUtils.generateShapes(e, t);
        t.amount = void 0 !== t.height ? t.height : 50, void 0 === t.bevelThickness && (t.bevelThickness = 10), void 0 === t.bevelSize && (t.bevelSize = 8), void 0 === t.bevelEnabled && (t.bevelEnabled = !1), THREE.ExtrudeGeometry.call(this, r, t)
    }, THREE.TextGeometry.prototype = Object.create(THREE.ExtrudeGeometry.prototype), THREE.TorusGeometry = function(e, t, r, i, n) {
        THREE.Geometry.call(this), this.parameters = {
            radius: e,
            tube: t,
            radialSegments: r,
            tubularSegments: i,
            arc: n
        }, e = e || 100, t = t || 40, r = r || 8, i = i || 6, n = n || 2 * Math.PI;
        for (var a = new THREE.Vector3, o = [], s = [], h = 0; r >= h; h++)
            for (var l = 0; i >= l; l++) {
                var c = l / i * n,
                    u = h / r * Math.PI * 2;
                a.x = e * Math.cos(c), a.y = e * Math.sin(c);
                var f = new THREE.Vector3;
                f.x = (e + t * Math.cos(u)) * Math.cos(c), f.y = (e + t * Math.cos(u)) * Math.sin(c), f.z = t * Math.sin(u), this.vertices.push(f), o.push(new THREE.Vector2(l / i, h / r)), s.push(f.clone().sub(a).normalize())
            }
        for (var h = 1; r >= h; h++)
            for (var l = 1; i >= l; l++) {
                var E = (i + 1) * h + l - 1,
                    p = (i + 1) * (h - 1) + l - 1,
                    d = (i + 1) * (h - 1) + l,
                    m = (i + 1) * h + l,
                    v = new THREE.Face3(E, p, m, [s[E].clone(), s[p].clone(), s[m].clone()]);
                this.faces.push(v), this.faceVertexUvs[0].push([o[E].clone(), o[p].clone(), o[m].clone()]), v = new THREE.Face3(p, d, m, [s[p].clone(), s[d].clone(), s[m].clone()]), this.faces.push(v), this.faceVertexUvs[0].push([o[p].clone(), o[d].clone(), o[m].clone()])
            }
        this.computeFaceNormals()
    }, THREE.TorusGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.TorusKnotGeometry = function(e, t, r, i, n, a, o) {
        function s(e, t, r, i, n) {
            var a = Math.cos(e),
                o = Math.sin(e),
                s = t / r * e,
                h = Math.cos(s),
                l = i * (2 + h) * .5 * a,
                c = i * (2 + h) * o * .5,
                u = n * i * Math.sin(s) * .5;
            return new THREE.Vector3(l, c, u)
        }
        THREE.Geometry.call(this), this.parameters = {
            radius: e,
            tube: t,
            radialSegments: r,
            tubularSegments: i,
            p: n,
            q: a,
            heightScale: o
        }, e = e || 100, t = t || 40, r = r || 64, i = i || 8, n = n || 2, a = a || 3, o = o || 1;
        for (var h = new Array(r), l = new THREE.Vector3, c = new THREE.Vector3, u = new THREE.Vector3, f = 0; r > f; ++f) {
            h[f] = new Array(i);
            var E = f / r * 2 * n * Math.PI,
                p = s(E, a, n, e, o),
                d = s(E + .01, a, n, e, o);
            l.subVectors(d, p), c.addVectors(d, p), u.crossVectors(l, c), c.crossVectors(u, l), u.normalize(), c.normalize();
            for (var m = 0; i > m; ++m) {
                var v = m / i * 2 * Math.PI,
                    g = -t * Math.cos(v),
                    T = t * Math.sin(v),
                    y = new THREE.Vector3;
                y.x = p.x + g * c.x + T * u.x, y.y = p.y + g * c.y + T * u.y, y.z = p.z + g * c.z + T * u.z, h[f][m] = this.vertices.push(y) - 1
            }
        }
        for (var f = 0; r > f; ++f)
            for (var m = 0; i > m; ++m) {
                var R = (f + 1) % r,
                    x = (m + 1) % i,
                    H = h[f][m],
                    b = h[R][m],
                    _ = h[R][x],
                    w = h[f][x],
                    M = new THREE.Vector2(f / r, m / i),
                    S = new THREE.Vector2((f + 1) / r, m / i),
                    C = new THREE.Vector2((f + 1) / r, (m + 1) / i),
                    A = new THREE.Vector2(f / r, (m + 1) / i);
                this.faces.push(new THREE.Face3(H, b, w)), this.faceVertexUvs[0].push([M, S, A]), this.faces.push(new THREE.Face3(b, _, w)), this.faceVertexUvs[0].push([S.clone(), C, A.clone()])
            }
        this.computeFaceNormals(), this.computeVertexNormals()
    }, THREE.TorusKnotGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.TubeGeometry = function(e, t, r, i, n) {
        function a(e, t, r) {
            return M.vertices.push(new THREE.Vector3(e, t, r)) - 1
        }
        THREE.Geometry.call(this), this.parameters = {
            path: e,
            segments: t,
            radius: r,
            radialSegments: i,
            closed: n
        }, t = t || 64, r = r || 1, i = i || 8, n = n || !1;
        var o, s, h, l, c, u, f, E, p, d, m, v, g, T, y, R, x, H, b, _, w = [],
            M = this,
            S = t + 1,
            C = new THREE.Vector3,
            A = new THREE.TubeGeometry.FrenetFrames(e, t, n),
            L = A.tangents,
            P = A.normals,
            F = A.binormals;
        for (this.tangents = L, this.normals = P, this.binormals = F, p = 0; S > p; p++)
            for (w[p] = [], l = p / (S - 1), E = e.getPointAt(l), o = L[p], s = P[p], h = F[p], d = 0; i > d; d++) c = d / i * 2 * Math.PI, u = -r * Math.cos(c), f = r * Math.sin(c), C.copy(E), C.x += u * s.x + f * h.x, C.y += u * s.y + f * h.y, C.z += u * s.z + f * h.z, w[p][d] = a(C.x, C.y, C.z);
        for (p = 0; t > p; p++)
            for (d = 0; i > d; d++) m = n ? (p + 1) % t : p + 1, v = (d + 1) % i, g = w[p][d], T = w[m][d], y = w[m][v], R = w[p][v], x = new THREE.Vector2(p / t, d / i), H = new THREE.Vector2((p + 1) / t, d / i), b = new THREE.Vector2((p + 1) / t, (d + 1) / i), _ = new THREE.Vector2(p / t, (d + 1) / i), this.faces.push(new THREE.Face3(g, T, R)), this.faceVertexUvs[0].push([x, H, _]), this.faces.push(new THREE.Face3(T, y, R)), this.faceVertexUvs[0].push([H.clone(), b, _.clone()]);
        this.computeFaceNormals(), this.computeVertexNormals()
    }, THREE.TubeGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.TubeGeometry.FrenetFrames = function(e, t, r) {
        function i() {
            E[0] = new THREE.Vector3, p[0] = new THREE.Vector3, a = Number.MAX_VALUE, o = Math.abs(f[0].x), s = Math.abs(f[0].y), h = Math.abs(f[0].z), a >= o && (a = o, u.set(1, 0, 0)), a >= s && (a = s, u.set(0, 1, 0)), a >= h && u.set(0, 0, 1), d.crossVectors(f[0], u).normalize(), E[0].crossVectors(f[0], d), p[0].crossVectors(f[0], E[0])
        }
        var n, a, o, s, h, l, c, u = (new THREE.Vector3, new THREE.Vector3),
            f = (new THREE.Vector3, []),
            E = [],
            p = [],
            d = new THREE.Vector3,
            m = new THREE.Matrix4,
            v = t + 1,
            g = 1e-4;
        for (this.tangents = f, this.normals = E, this.binormals = p, l = 0; v > l; l++) c = l / (v - 1), f[l] = e.getTangentAt(c), f[l].normalize();
        for (i(), l = 1; v > l; l++) E[l] = E[l - 1].clone(), p[l] = p[l - 1].clone(), d.crossVectors(f[l - 1], f[l]), d.length() > g && (d.normalize(), n = Math.acos(THREE.Math.clamp(f[l - 1].dot(f[l]), -1, 1)), E[l].applyMatrix4(m.makeRotationAxis(d, n))), p[l].crossVectors(f[l], E[l]);
        if (r)
            for (n = Math.acos(THREE.Math.clamp(E[0].dot(E[v - 1]), -1, 1)), n /= v - 1, f[0].dot(d.crossVectors(E[0], E[v - 1])) > 0 && (n = -n), l = 1; v > l; l++) E[l].applyMatrix4(m.makeRotationAxis(f[l], n * l)), p[l].crossVectors(f[l], E[l])
    }, THREE.PolyhedronGeometry = function(e, t, r, i) {
        function n(e) {
            var t = e.normalize().clone();
            t.index = c.vertices.push(t) - 1;
            var r = s(e) / 2 / Math.PI + .5,
                i = h(e) / Math.PI + .5;
            return t.uv = new THREE.Vector2(r, 1 - i), t
        }

        function a(e, t, r) {
            var i = new THREE.Face3(e.index, t.index, r.index, [e.clone(), t.clone(), r.clone()]);
            c.faces.push(i), T.copy(e).add(t).add(r).divideScalar(3);
            var n = s(T);
            c.faceVertexUvs[0].push([l(e.uv, e, n), l(t.uv, t, n), l(r.uv, r, n)])
        }

        function o(e, t) {
            for (var r = Math.pow(2, t), i = (Math.pow(4, t), n(c.vertices[e.a])), o = n(c.vertices[e.b]), s = n(c.vertices[e.c]), h = [], l = 0; r >= l; l++) {
                h[l] = [];
                for (var u = n(i.clone().lerp(s, l / r)), f = n(o.clone().lerp(s, l / r)), E = r - l, p = 0; E >= p; p++) h[l][p] = 0 == p && l == r ? u : n(u.clone().lerp(f, p / E))
            }
            for (var l = 0; r > l; l++)
                for (var p = 0; 2 * (r - l) - 1 > p; p++) {
                    var d = Math.floor(p / 2);
                    p % 2 == 0 ? a(h[l][d + 1], h[l + 1][d], h[l][d]) : a(h[l][d + 1], h[l + 1][d + 1], h[l + 1][d])
                }
        }

        function s(e) {
            return Math.atan2(e.z, -e.x)
        }

        function h(e) {
            return Math.atan2(-e.y, Math.sqrt(e.x * e.x + e.z * e.z))
        }

        function l(e, t, r) {
            return 0 > r && 1 === e.x && (e = new THREE.Vector2(e.x - 1, e.y)), 0 === t.x && 0 === t.z && (e = new THREE.Vector2(r / 2 / Math.PI + .5, e.y)), e.clone()
        }
        THREE.Geometry.call(this), r = r || 1, i = i || 0;
        for (var c = this, u = 0, f = e.length; f > u; u += 3) n(new THREE.Vector3(e[u], e[u + 1], e[u + 2]));
        for (var E = this.vertices, p = [], u = 0, d = 0, f = t.length; f > u; u += 3, d++) {
            var m = E[t[u]],
                v = E[t[u + 1]],
                g = E[t[u + 2]];
            p[d] = new THREE.Face3(m.index, v.index, g.index, [m.clone(), v.clone(), g.clone()])
        }
        for (var T = new THREE.Vector3, u = 0, f = p.length; f > u; u++) o(p[u], i);
        for (var u = 0, f = this.faceVertexUvs[0].length; f > u; u++) {
            var y = this.faceVertexUvs[0][u],
                R = y[0].x,
                x = y[1].x,
                H = y[2].x,
                b = Math.max(R, Math.max(x, H)),
                _ = Math.min(R, Math.min(x, H));
            b > .9 && .1 > _ && (.2 > R && (y[0].x += 1), .2 > x && (y[1].x += 1), .2 > H && (y[2].x += 1))
        }
        for (var u = 0, f = this.vertices.length; f > u; u++) this.vertices[u].multiplyScalar(r);
        this.mergeVertices(), this.computeFaceNormals(), this.boundingSphere = new THREE.Sphere(new THREE.Vector3, r)
    }, THREE.PolyhedronGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.IcosahedronGeometry = function(e, t) {
        this.parameters = {
            radius: e,
            detail: t
        };
        var r = (1 + Math.sqrt(5)) / 2,
            i = [-1, r, 0, 1, r, 0, -1, -r, 0, 1, -r, 0, 0, -1, r, 0, 1, r, 0, -1, -r, 0, 1, -r, r, 0, -1, r, 0, 1, -r, 0, -1, -r, 0, 1],
            n = [0, 11, 5, 0, 5, 1, 0, 1, 7, 0, 7, 10, 0, 10, 11, 1, 5, 9, 5, 11, 4, 11, 10, 2, 10, 7, 6, 7, 1, 8, 3, 9, 4, 3, 4, 2, 3, 2, 6, 3, 6, 8, 3, 8, 9, 4, 9, 5, 2, 4, 11, 6, 2, 10, 8, 6, 7, 9, 8, 1];
        THREE.PolyhedronGeometry.call(this, i, n, e, t)
    }, THREE.IcosahedronGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.OctahedronGeometry = function(e, t) {
        this.parameters = {
            radius: e,
            detail: t
        };
        var r = [1, 0, 0, -1, 0, 0, 0, 1, 0, 0, -1, 0, 0, 0, 1, 0, 0, -1],
            i = [0, 2, 4, 0, 4, 3, 0, 3, 5, 0, 5, 2, 1, 2, 5, 1, 5, 3, 1, 3, 4, 1, 4, 2];
        THREE.PolyhedronGeometry.call(this, r, i, e, t)
    }, THREE.OctahedronGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.TetrahedronGeometry = function(e, t) {
        var r = [1, 1, 1, -1, -1, 1, -1, 1, -1, 1, -1, -1],
            i = [2, 1, 0, 0, 3, 2, 1, 3, 0, 2, 3, 1];
        THREE.PolyhedronGeometry.call(this, r, i, e, t)
    }, THREE.TetrahedronGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.ParametricGeometry = function(e, t, r) {
        THREE.Geometry.call(this);
        var i, n, a, o, s, h = this.vertices,
            l = this.faces,
            c = this.faceVertexUvs[0],
            u = t + 1;
        for (i = 0; r >= i; i++)
            for (s = i / r, n = 0; t >= n; n++) o = n / t, a = e(o, s), h.push(a);
        var f, E, p, d, m, v, g, T;
        for (i = 0; r > i; i++)
            for (n = 0; t > n; n++) f = i * u + n, E = i * u + n + 1, p = (i + 1) * u + n + 1, d = (i + 1) * u + n, m = new THREE.Vector2(n / t, i / r), v = new THREE.Vector2((n + 1) / t, i / r), g = new THREE.Vector2((n + 1) / t, (i + 1) / r), T = new THREE.Vector2(n / t, (i + 1) / r), l.push(new THREE.Face3(f, E, d)), c.push([m, v, T]), l.push(new THREE.Face3(E, p, d)), c.push([v.clone(), g, T.clone()]);
        this.computeFaceNormals(), this.computeVertexNormals()
    }, THREE.ParametricGeometry.prototype = Object.create(THREE.Geometry.prototype), THREE.AxisHelper = function(e) {
        e = e || 1;
        var t = new Float32Array([0, 0, 0, e, 0, 0, 0, 0, 0, 0, e, 0, 0, 0, 0, 0, 0, e]),
            r = new Float32Array([1, 0, 0, 1, .6, 0, 0, 1, 0, .6, 1, 0, 0, 0, 1, 0, .6, 1]),
            i = new THREE.BufferGeometry;
        i.addAttribute("position", new THREE.BufferAttribute(t, 3)), i.addAttribute("color", new THREE.BufferAttribute(r, 3));
        var n = new THREE.LineBasicMaterial({
            vertexColors: THREE.VertexColors
        });
        THREE.Line.call(this, i, n, THREE.LinePieces)
    }, THREE.AxisHelper.prototype = Object.create(THREE.Line.prototype), THREE.ArrowHelper = function() {
        var e = new THREE.Geometry;
        e.vertices.push(new THREE.Vector3(0, 0, 0), new THREE.Vector3(0, 1, 0));
        var t = new THREE.CylinderGeometry(0, .5, 1, 5, 1);
        return t.applyMatrix((new THREE.Matrix4).makeTranslation(0, -.5, 0)),
            function(r, i, n, a, o, s) {
                THREE.Object3D.call(this), void 0 === a && (a = 16776960), void 0 === n && (n = 1), void 0 === o && (o = .2 * n), void 0 === s && (s = .2 * o), this.position.copy(i), this.line = new THREE.Line(e, new THREE.LineBasicMaterial({
                    color: a
                })), this.line.matrixAutoUpdate = !1, this.add(this.line), this.cone = new THREE.Mesh(t, new THREE.MeshBasicMaterial({
                    color: a
                })), this.cone.matrixAutoUpdate = !1, this.add(this.cone), this.setDirection(r), this.setLength(n, o, s)
            }
    }(), THREE.ArrowHelper.prototype = Object.create(THREE.Object3D.prototype), THREE.ArrowHelper.prototype.setDirection = function() {
        var e, t = new THREE.Vector3;
        return function(r) {
            r.y > .99999 ? this.quaternion.set(0, 0, 0, 1) : r.y < -.99999 ? this.quaternion.set(1, 0, 0, 0) : (t.set(r.z, 0, -r.x).normalize(), e = Math.acos(r.y), this.quaternion.setFromAxisAngle(t, e))
        }
    }(), THREE.ArrowHelper.prototype.setLength = function(e, t, r) {
        void 0 === t && (t = .2 * e), void 0 === r && (r = .2 * t), this.line.scale.set(1, e, 1), this.line.updateMatrix(), this.cone.scale.set(r, t, r), this.cone.position.y = e, this.cone.updateMatrix()
    }, THREE.ArrowHelper.prototype.setColor = function(e) {
        this.line.material.color.set(e), this.cone.material.color.set(e)
    }, THREE.BoxHelper = function(e) {
        var t = new THREE.BufferGeometry;
        t.addAttribute("position", new THREE.BufferAttribute(new Float32Array(72), 3)), THREE.Line.call(this, t, new THREE.LineBasicMaterial({
            color: 16776960
        }), THREE.LinePieces), void 0 !== e && this.update(e)
    }, THREE.BoxHelper.prototype = Object.create(THREE.Line.prototype), THREE.BoxHelper.prototype.update = function(e) {
        var t = e.geometry;
        null === t.boundingBox && t.computeBoundingBox();
        var r = t.boundingBox.min,
            i = t.boundingBox.max,
            n = this.geometry.attributes.position.array;
        n[0] = i.x, n[1] = i.y, n[2] = i.z, n[3] = r.x, n[4] = i.y, n[5] = i.z, n[6] = r.x, n[7] = i.y, n[8] = i.z, n[9] = r.x, n[10] = r.y, n[11] = i.z, n[12] = r.x, n[13] = r.y, n[14] = i.z, n[15] = i.x, n[16] = r.y, n[17] = i.z, n[18] = i.x, n[19] = r.y, n[20] = i.z, n[21] = i.x, n[22] = i.y, n[23] = i.z, n[24] = i.x, n[25] = i.y, n[26] = r.z, n[27] = r.x, n[28] = i.y, n[29] = r.z, n[30] = r.x, n[31] = i.y, n[32] = r.z, n[33] = r.x, n[34] = r.y, n[35] = r.z, n[36] = r.x, n[37] = r.y, n[38] = r.z, n[39] = i.x, n[40] = r.y, n[41] = r.z, n[42] = i.x, n[43] = r.y, n[44] = r.z, n[45] = i.x, n[46] = i.y, n[47] = r.z, n[48] = i.x, n[49] = i.y, n[50] = i.z, n[51] = i.x, n[52] = i.y, n[53] = r.z, n[54] = r.x, n[55] = i.y, n[56] = i.z, n[57] = r.x, n[58] = i.y, n[59] = r.z, n[60] = r.x, n[61] = r.y, n[62] = i.z, n[63] = r.x, n[64] = r.y, n[65] = r.z, n[66] = i.x, n[67] = r.y, n[68] = i.z, n[69] = i.x, n[70] = r.y, n[71] = r.z, this.geometry.attributes.position.needsUpdate = !0, this.geometry.computeBoundingSphere(), this.matrixAutoUpdate = !1, this.matrixWorld = e.matrixWorld
    }, THREE.BoundingBoxHelper = function(e, t) {
        var r = void 0 !== t ? t : 8947848;
        this.object = e, this.box = new THREE.Box3, THREE.Mesh.call(this, new THREE.BoxGeometry(1, 1, 1), new THREE.MeshBasicMaterial({
            color: r,
            wireframe: !0
        }))
    }, THREE.BoundingBoxHelper.prototype = Object.create(THREE.Mesh.prototype), THREE.BoundingBoxHelper.prototype.update = function() {
        this.box.setFromObject(this.object), this.box.size(this.scale), this.box.center(this.position)
    }, THREE.CameraHelper = function(e) {
        function t(e, t, i) {
            r(e, i), r(t, i)
        }

        function r(e, t) {
            i.vertices.push(new THREE.Vector3), i.colors.push(new THREE.Color(t)), void 0 === a[e] && (a[e] = []), a[e].push(i.vertices.length - 1)
        }
        var i = new THREE.Geometry,
            n = new THREE.LineBasicMaterial({
                color: 16777215,
                vertexColors: THREE.FaceColors
            }),
            a = {},
            o = 16755200,
            s = 16711680,
            h = 43775,
            l = 16777215,
            c = 3355443;
        t("n1", "n2", o), t("n2", "n4", o), t("n4", "n3", o), t("n3", "n1", o), t("f1", "f2", o), t("f2", "f4", o), t("f4", "f3", o), t("f3", "f1", o), t("n1", "f1", o), t("n2", "f2", o), t("n3", "f3", o), t("n4", "f4", o), t("p", "n1", s), t("p", "n2", s), t("p", "n3", s), t("p", "n4", s), t("u1", "u2", h), t("u2", "u3", h), t("u3", "u1", h), t("c", "t", l), t("p", "c", c), t("cn1", "cn2", c), t("cn3", "cn4", c), t("cf1", "cf2", c), t("cf3", "cf4", c), THREE.Line.call(this, i, n, THREE.LinePieces), this.camera = e, this.matrixWorld = e.matrixWorld, this.matrixAutoUpdate = !1, this.pointMap = a, this.update()
    }, THREE.CameraHelper.prototype = Object.create(THREE.Line.prototype), THREE.CameraHelper.prototype.update = function() {
        var e = new THREE.Vector3,
            t = new THREE.Camera,
            r = new THREE.Projector;
        return function() {
            function i(i, a, o, s) {
                e.set(a, o, s), r.unprojectVector(e, t);
                var h = n.pointMap[i];
                if (void 0 !== h)
                    for (var l = 0, c = h.length; c > l; l++) n.geometry.vertices[h[l]].copy(e)
            }
            var n = this,
                a = 1,
                o = 1;
            t.projectionMatrix.copy(this.camera.projectionMatrix), i("c", 0, 0, -1), i("t", 0, 0, 1), i("n1", -a, -o, -1), i("n2", a, -o, -1), i("n3", -a, o, -1), i("n4", a, o, -1), i("f1", -a, -o, 1), i("f2", a, -o, 1), i("f3", -a, o, 1), i("f4", a, o, 1), i("u1", .7 * a, 1.1 * o, -1), i("u2", .7 * -a, 1.1 * o, -1), i("u3", 0, 2 * o, -1), i("cf1", -a, 0, 1), i("cf2", a, 0, 1), i("cf3", 0, -o, 1), i("cf4", 0, o, 1), i("cn1", -a, 0, -1), i("cn2", a, 0, -1), i("cn3", 0, -o, -1), i("cn4", 0, o, -1), this.geometry.verticesNeedUpdate = !0
        }
    }(), THREE.DirectionalLightHelper = function(e, t) {
        THREE.Object3D.call(this), this.light = e, this.light.updateMatrixWorld(), this.matrixWorld = e.matrixWorld, this.matrixAutoUpdate = !1, t = t || 1;
        var r = new THREE.Geometry;
        r.vertices.push(new THREE.Vector3(-t, t, 0), new THREE.Vector3(t, t, 0), new THREE.Vector3(t, -t, 0), new THREE.Vector3(-t, -t, 0), new THREE.Vector3(-t, t, 0));
        var i = new THREE.LineBasicMaterial({
            fog: !1
        });
        i.color.copy(this.light.color).multiplyScalar(this.light.intensity), this.lightPlane = new THREE.Line(r, i), this.add(this.lightPlane), r = new THREE.Geometry, r.vertices.push(new THREE.Vector3, new THREE.Vector3), i = new THREE.LineBasicMaterial({
            fog: !1
        }), i.color.copy(this.light.color).multiplyScalar(this.light.intensity), this.targetLine = new THREE.Line(r, i), this.add(this.targetLine), this.update()
    }, THREE.DirectionalLightHelper.prototype = Object.create(THREE.Object3D.prototype), THREE.DirectionalLightHelper.prototype.dispose = function() {
        this.lightPlane.geometry.dispose(), this.lightPlane.material.dispose(), this.targetLine.geometry.dispose(), this.targetLine.material.dispose()
    }, THREE.DirectionalLightHelper.prototype.update = function() {
        var e = new THREE.Vector3,
            t = new THREE.Vector3,
            r = new THREE.Vector3;
        return function() {
            e.setFromMatrixPosition(this.light.matrixWorld), t.setFromMatrixPosition(this.light.target.matrixWorld), r.subVectors(t, e), this.lightPlane.lookAt(r), this.lightPlane.material.color.copy(this.light.color).multiplyScalar(this.light.intensity), this.targetLine.geometry.vertices[1].copy(r), this.targetLine.geometry.verticesNeedUpdate = !0, this.targetLine.material.color.copy(this.lightPlane.material.color)
        }
    }(), THREE.EdgesHelper = function(e, t) {
        var r = void 0 !== t ? t : 16777215,
            i = [0, 0],
            n = {},
            a = function(e, t) {
                return e - t
            },
            o = ["a", "b", "c"],
            s = new THREE.BufferGeometry,
            h = e.geometry.clone();
        h.mergeVertices(), h.computeFaceNormals();
        for (var l = h.vertices, c = h.faces, u = 0, f = 0, E = c.length; E > f; f++)
            for (var p = c[f], d = 0; 3 > d; d++) {
                i[0] = p[o[d]], i[1] = p[o[(d + 1) % 3]], i.sort(a);
                var m = i.toString();
                void 0 === n[m] ? (n[m] = {
                    vert1: i[0],
                    vert2: i[1],
                    face1: f,
                    face2: void 0
                }, u++) : n[m].face2 = f
            }
        s.addAttribute("position", new THREE.Float32Attribute(2 * u * 3, 3));
        var v = s.attributes.position.array,
            g = 0;
        for (var m in n) {
            var T = n[m];
            if (void 0 === T.face2 || c[T.face1].normal.dot(c[T.face2].normal) < .9999) {
                var y = l[T.vert1];
                v[g++] = y.x, v[g++] = y.y, v[g++] = y.z, y = l[T.vert2], v[g++] = y.x, v[g++] = y.y, v[g++] = y.z
            }
        }
        THREE.Line.call(this, s, new THREE.LineBasicMaterial({
            color: r
        }), THREE.LinePieces), this.matrixAutoUpdate = !1, this.matrixWorld = e.matrixWorld
    }, THREE.EdgesHelper.prototype = Object.create(THREE.Line.prototype), THREE.FaceNormalsHelper = function(e, t, r, i) {
        this.object = e, this.size = void 0 !== t ? t : 1;
        for (var n = void 0 !== r ? r : 16776960, a = void 0 !== i ? i : 1, o = new THREE.Geometry, s = this.object.geometry.faces, h = 0, l = s.length; l > h; h++) o.vertices.push(new THREE.Vector3, new THREE.Vector3);
        THREE.Line.call(this, o, new THREE.LineBasicMaterial({
            color: n,
            linewidth: a
        }), THREE.LinePieces), this.matrixAutoUpdate = !1, this.normalMatrix = new THREE.Matrix3, this.update()
    }, THREE.FaceNormalsHelper.prototype = Object.create(THREE.Line.prototype), THREE.FaceNormalsHelper.prototype.update = function() {
        var e = this.geometry.vertices,
            t = this.object,
            r = t.geometry.vertices,
            i = t.geometry.faces,
            n = t.matrixWorld;
        t.updateMatrixWorld(!0), this.normalMatrix.getNormalMatrix(n);
        for (var a = 0, o = 0, s = i.length; s > a; a++, o += 2) {
            var h = i[a];
            e[o].copy(r[h.a]).add(r[h.b]).add(r[h.c]).divideScalar(3).applyMatrix4(n), e[o + 1].copy(h.normal).applyMatrix3(this.normalMatrix).normalize().multiplyScalar(this.size).add(e[o])
        }
        return this.geometry.verticesNeedUpdate = !0, this
    }, THREE.GridHelper = function(e, t) {
        var r = new THREE.Geometry,
            i = new THREE.LineBasicMaterial({
                vertexColors: THREE.VertexColors
            });
        this.color1 = new THREE.Color(4473924), this.color2 = new THREE.Color(8947848);
        for (var n = -e; e >= n; n += t) {
            r.vertices.push(new THREE.Vector3(-e, 0, n), new THREE.Vector3(e, 0, n), new THREE.Vector3(n, 0, -e), new THREE.Vector3(n, 0, e));
            var a = 0 === n ? this.color1 : this.color2;
            r.colors.push(a, a, a, a)
        }
        THREE.Line.call(this, r, i, THREE.LinePieces)
    }, THREE.GridHelper.prototype = Object.create(THREE.Line.prototype), THREE.GridHelper.prototype.setColors = function(e, t) {
        this.color1.set(e), this.color2.set(t), this.geometry.colorsNeedUpdate = !0
    }, THREE.HemisphereLightHelper = function(e, t) {
        THREE.Object3D.call(this), this.light = e, this.light.updateMatrixWorld(), this.matrixWorld = e.matrixWorld, this.matrixAutoUpdate = !1, this.colors = [new THREE.Color, new THREE.Color];
        var r = new THREE.SphereGeometry(t, 4, 2);
        r.applyMatrix((new THREE.Matrix4).makeRotationX(-Math.PI / 2));
        for (var i = 0, n = 8; n > i; i++) r.faces[i].color = this.colors[4 > i ? 0 : 1];
        var a = new THREE.MeshBasicMaterial({
            vertexColors: THREE.FaceColors,
            wireframe: !0
        });
        this.lightSphere = new THREE.Mesh(r, a), this.add(this.lightSphere), this.update()
    }, THREE.HemisphereLightHelper.prototype = Object.create(THREE.Object3D.prototype), THREE.HemisphereLightHelper.prototype.dispose = function() {
        this.lightSphere.geometry.dispose(), this.lightSphere.material.dispose()
    }, THREE.HemisphereLightHelper.prototype.update = function() {
        var e = new THREE.Vector3;
        return function() {
            this.colors[0].copy(this.light.color).multiplyScalar(this.light.intensity), this.colors[1].copy(this.light.groundColor).multiplyScalar(this.light.intensity), this.lightSphere.lookAt(e.setFromMatrixPosition(this.light.matrixWorld).negate()), this.lightSphere.geometry.colorsNeedUpdate = !0
        }
    }(), THREE.PointLightHelper = function(e, t) {
        this.light = e, this.light.updateMatrixWorld();
        var r = new THREE.SphereGeometry(t, 4, 2),
            i = new THREE.MeshBasicMaterial({
                wireframe: !0,
                fog: !1
            });
        i.color.copy(this.light.color).multiplyScalar(this.light.intensity), THREE.Mesh.call(this, r, i), this.matrixWorld = this.light.matrixWorld, this.matrixAutoUpdate = !1
    }, THREE.PointLightHelper.prototype = Object.create(THREE.Mesh.prototype), THREE.PointLightHelper.prototype.dispose = function() {
        this.geometry.dispose(), this.material.dispose()
    }, THREE.PointLightHelper.prototype.update = function() {
        this.material.color.copy(this.light.color).multiplyScalar(this.light.intensity)
    }, THREE.SkeletonHelper = function(e) {
        this.bones = this.getBoneList(e);
        for (var t = new THREE.Geometry, r = 0; r < this.bones.length; r++) {
            var i = this.bones[r];
            i.parent instanceof THREE.Bone && (t.vertices.push(new THREE.Vector3), t.vertices.push(new THREE.Vector3), t.colors.push(new THREE.Color(0, 0, 1)), t.colors.push(new THREE.Color(0, 1, 0)))
        }
        var n = new THREE.LineBasicMaterial({
            vertexColors: THREE.VertexColors,
            depthTest: !1,
            depthWrite: !1,
            transparent: !0
        });
        THREE.Line.call(this, t, n, THREE.LinePieces), this.root = e, this.matrixWorld = e.matrixWorld, this.matrixAutoUpdate = !1, this.update()
    }, THREE.SkeletonHelper.prototype = Object.create(THREE.Line.prototype), THREE.SkeletonHelper.prototype.getBoneList = function(e) {
        var t = [];
        e instanceof THREE.Bone && t.push(e);
        for (var r = 0; r < e.children.length; r++) t.push.apply(t, this.getBoneList(e.children[r]));
        return t
    }, THREE.SkeletonHelper.prototype.update = function() {
        for (var e = this.geometry, t = (new THREE.Matrix4).getInverse(this.root.matrixWorld), r = new THREE.Matrix4, i = 0, n = 0; n < this.bones.length; n++) {
            var a = this.bones[n];
            a.parent instanceof THREE.Bone && (r.multiplyMatrices(t, a.matrixWorld), e.vertices[i].setFromMatrixPosition(r), r.multiplyMatrices(t, a.parent.matrixWorld), e.vertices[i + 1].setFromMatrixPosition(r), i += 2)
        }
        e.verticesNeedUpdate = !0, e.computeBoundingSphere()
    }, THREE.SpotLightHelper = function(e) {
        THREE.Object3D.call(this), this.light = e, this.light.updateMatrixWorld(), this.matrixWorld = e.matrixWorld, this.matrixAutoUpdate = !1;
        var t = new THREE.CylinderGeometry(0, 1, 1, 8, 1, !0);
        t.applyMatrix((new THREE.Matrix4).makeTranslation(0, -.5, 0)), t.applyMatrix((new THREE.Matrix4).makeRotationX(-Math.PI / 2));
        var r = new THREE.MeshBasicMaterial({
            wireframe: !0,
            fog: !1
        });
        this.cone = new THREE.Mesh(t, r), this.add(this.cone), this.update()
    }, THREE.SpotLightHelper.prototype = Object.create(THREE.Object3D.prototype), THREE.SpotLightHelper.prototype.dispose = function() {
        this.cone.geometry.dispose(), this.cone.material.dispose()
    }, THREE.SpotLightHelper.prototype.update = function() {
        var e = new THREE.Vector3,
            t = new THREE.Vector3;
        return function() {
            var r = this.light.distance ? this.light.distance : 1e4,
                i = r * Math.tan(this.light.angle);
            this.cone.scale.set(i, i, r), e.setFromMatrixPosition(this.light.matrixWorld), t.setFromMatrixPosition(this.light.target.matrixWorld), this.cone.lookAt(t.sub(e)), this.cone.material.color.copy(this.light.color).multiplyScalar(this.light.intensity)
        }
    }(), THREE.VertexNormalsHelper = function(e, t, r, i) {
        this.object = e, this.size = void 0 !== t ? t : 1;
        for (var n = void 0 !== r ? r : 16711680, a = void 0 !== i ? i : 1, o = new THREE.Geometry, s = (e.geometry.vertices, e.geometry.faces), h = 0, l = s.length; l > h; h++)
            for (var c = s[h], u = 0, f = c.vertexNormals.length; f > u; u++) o.vertices.push(new THREE.Vector3, new THREE.Vector3);
        THREE.Line.call(this, o, new THREE.LineBasicMaterial({
            color: n,
            linewidth: a
        }), THREE.LinePieces), this.matrixAutoUpdate = !1, this.normalMatrix = new THREE.Matrix3, this.update()
    }, THREE.VertexNormalsHelper.prototype = Object.create(THREE.Line.prototype), THREE.VertexNormalsHelper.prototype.update = function() {
        var e = new THREE.Vector3;
        return function() {
            var t = ["a", "b", "c", "d"];
            this.object.updateMatrixWorld(!0), this.normalMatrix.getNormalMatrix(this.object.matrixWorld);
            for (var r = this.geometry.vertices, i = this.object.geometry.vertices, n = this.object.geometry.faces, a = this.object.matrixWorld, o = 0, s = 0, h = n.length; h > s; s++)
                for (var l = n[s], c = 0, u = l.vertexNormals.length; u > c; c++) {
                    var f = l[t[c]],
                        E = i[f],
                        p = l.vertexNormals[c];
                    r[o].copy(E).applyMatrix4(a), e.copy(p).applyMatrix3(this.normalMatrix).normalize().multiplyScalar(this.size), e.add(r[o]), o += 1, r[o].copy(e), o += 1
                }
            return this.geometry.verticesNeedUpdate = !0, this
        }
    }(), THREE.VertexTangentsHelper = function(e, t, r, i) {
        this.object = e, this.size = void 0 !== t ? t : 1;
        for (var n = void 0 !== r ? r : 255, a = void 0 !== i ? i : 1, o = new THREE.Geometry, s = (e.geometry.vertices, e.geometry.faces), h = 0, l = s.length; l > h; h++)
            for (var c = s[h], u = 0, f = c.vertexTangents.length; f > u; u++) o.vertices.push(new THREE.Vector3), o.vertices.push(new THREE.Vector3);
        THREE.Line.call(this, o, new THREE.LineBasicMaterial({
            color: n,
            linewidth: a
        }), THREE.LinePieces), this.matrixAutoUpdate = !1, this.update()
    }, THREE.VertexTangentsHelper.prototype = Object.create(THREE.Line.prototype), THREE.VertexTangentsHelper.prototype.update = function() {
        var e = new THREE.Vector3;
        return function() {
            var t = ["a", "b", "c", "d"];
            this.object.updateMatrixWorld(!0);
            for (var r = this.geometry.vertices, i = this.object.geometry.vertices, n = this.object.geometry.faces, a = this.object.matrixWorld, o = 0, s = 0, h = n.length; h > s; s++)
                for (var l = n[s], c = 0, u = l.vertexTangents.length; u > c; c++) {
                    var f = l[t[c]],
                        E = i[f],
                        p = l.vertexTangents[c];
                    r[o].copy(E).applyMatrix4(a), e.copy(p).transformDirection(a).multiplyScalar(this.size), e.add(r[o]), o += 1, r[o].copy(e), o += 1
                }
            return this.geometry.verticesNeedUpdate = !0, this
        }
    }(), THREE.WireframeHelper = function(e, t) {
        var r = void 0 !== t ? t : 16777215,
            i = [0, 0],
            n = {},
            a = function(e, t) {
                return e - t
            },
            o = ["a", "b", "c"],
            s = new THREE.BufferGeometry;
        if (e.geometry instanceof THREE.Geometry) {
            for (var h = e.geometry.vertices, l = e.geometry.faces, c = 0, u = new Uint32Array(6 * l.length), f = 0, E = l.length; E > f; f++)
                for (var p = l[f], d = 0; 3 > d; d++) {
                    i[0] = p[o[d]], i[1] = p[o[(d + 1) % 3]], i.sort(a);
                    var m = i.toString();
                    void 0 === n[m] && (u[2 * c] = i[0], u[2 * c + 1] = i[1], n[m] = !0, c++)
                }
            for (var v = new Float32Array(2 * c * 3), f = 0, E = c; E > f; f++)
                for (var d = 0; 2 > d; d++) {
                    var g = h[u[2 * f + d]],
                        T = 6 * f + 3 * d;
                    v[T + 0] = g.x, v[T + 1] = g.y, v[T + 2] = g.z
                }
            s.addAttribute("position", new THREE.BufferAttribute(v, 3))
        } else if (e.geometry instanceof THREE.BufferGeometry)
            if (void 0 !== e.geometry.attributes.index) {
                for (var h = e.geometry.attributes.position.array, y = e.geometry.attributes.index.array, R = e.geometry.offsets, c = 0, u = new Uint32Array(2 * y.length), x = 0, H = R.length; H > x; ++x)
                    for (var b = R[x].start, _ = R[x].count, T = R[x].index, f = b, w = b + _; w > f; f += 3)
                        for (var d = 0; 3 > d; d++) {
                            i[0] = T + y[f + d], i[1] = T + y[f + (d + 1) % 3], i.sort(a);
                            var m = i.toString();
                            void 0 === n[m] && (u[2 * c] = i[0], u[2 * c + 1] = i[1], n[m] = !0, c++)
                        }
                for (var v = new Float32Array(2 * c * 3), f = 0, E = c; E > f; f++)
                    for (var d = 0; 2 > d; d++) {
                        var T = 6 * f + 3 * d,
                            M = 3 * u[2 * f + d];
                        v[T + 0] = h[M], v[T + 1] = h[M + 1], v[T + 2] = h[M + 2]
                    }
                s.addAttribute("position", new THREE.BufferAttribute(v, 3))
            } else {
                for (var h = e.geometry.attributes.position.array, c = h.length / 3, S = c / 3, v = new Float32Array(2 * c * 3), f = 0, E = S; E > f; f++)
                    for (var d = 0; 3 > d; d++) {
                        var T = 18 * f + 6 * d,
                            C = 9 * f + 3 * d;
                        v[T + 0] = h[C], v[T + 1] = h[C + 1], v[T + 2] = h[C + 2];
                        var M = 9 * f + 3 * ((d + 1) % 3);
                        v[T + 3] = h[M], v[T + 4] = h[M + 1], v[T + 5] = h[M + 2]
                    }
                s.addAttribute("position", new THREE.BufferAttribute(v, 3))
            }
        THREE.Line.call(this, s, new THREE.LineBasicMaterial({
            color: r
        }), THREE.LinePieces), this.matrixAutoUpdate = !1, this.matrixWorld = e.matrixWorld
    }, THREE.WireframeHelper.prototype = Object.create(THREE.Line.prototype), THREE.ImmediateRenderObject = function() {
        THREE.Object3D.call(this), this.render = function() {}
    }, THREE.ImmediateRenderObject.prototype = Object.create(THREE.Object3D.prototype), THREE.LensFlare = function(e, t, r, i, n) {
        THREE.Object3D.call(this), this.lensFlares = [], this.positionScreen = new THREE.Vector3, this.customUpdateCallback = void 0, void 0 !== e && this.add(e, t, r, i, n)
    }, THREE.LensFlare.prototype = Object.create(THREE.Object3D.prototype), THREE.LensFlare.prototype.add = function(e, t, r, i, n, a) {
        void 0 === t && (t = -1), void 0 === r && (r = 0), void 0 === a && (a = 1), void 0 === n && (n = new THREE.Color(16777215)), void 0 === i && (i = THREE.NormalBlending), r = Math.min(r, Math.max(0, r)), this.lensFlares.push({
            texture: e,
            size: t,
            distance: r,
            x: 0,
            y: 0,
            z: 0,
            scale: 1,
            rotation: 1,
            opacity: a,
            color: n,
            blending: i
        })
    }, THREE.LensFlare.prototype.updateLensFlares = function() {
        var e, t, r = this.lensFlares.length,
            i = 2 * -this.positionScreen.x,
            n = 2 * -this.positionScreen.y;
        for (e = 0; r > e; e++) t = this.lensFlares[e], t.x = this.positionScreen.x + i * t.distance, t.y = this.positionScreen.y + n * t.distance, t.wantedRotation = t.x * Math.PI * .25, t.rotation += .25 * (t.wantedRotation - t.rotation)
    }, THREE.MorphBlendMesh = function(e, t) {
        THREE.Mesh.call(this, e, t), this.animationsMap = {}, this.animationsList = [];
        var r = this.geometry.morphTargets.length,
            i = "__default",
            n = 0,
            a = r - 1,
            o = r / 1;
        this.createAnimation(i, n, a, o), this.setAnimationWeight(i, 1)
    }, THREE.MorphBlendMesh.prototype = Object.create(THREE.Mesh.prototype), THREE.MorphBlendMesh.prototype.createAnimation = function(e, t, r, i) {
        var n = {
            startFrame: t,
            endFrame: r,
            length: r - t + 1,
            fps: i,
            duration: (r - t) / i,
            lastFrame: 0,
            currentFrame: 0,
            active: !1,
            time: 0,
            direction: 1,
            weight: 1,
            directionBackwards: !1,
            mirroredLoop: !1
        };
        this.animationsMap[e] = n, this.animationsList.push(n)
    }, THREE.MorphBlendMesh.prototype.autoCreateAnimations = function(e) {
        for (var t, r = /([a-z]+)_?(\d+)/, i = {}, n = this.geometry, a = 0, o = n.morphTargets.length; o > a; a++) {
            var s = n.morphTargets[a],
                h = s.name.match(r);
            if (h && h.length > 1) {
                {
                    var l = h[1];
                    h[2]
                }
                i[l] || (i[l] = {
                    start: 1 / 0,
                    end: -1 / 0
                });
                var c = i[l];
                a < c.start && (c.start = a), a > c.end && (c.end = a), t || (t = l)
            }
        }
        for (var l in i) {
            var c = i[l];
            this.createAnimation(l, c.start, c.end, e)
        }
        this.firstAnimation = t
    }, THREE.MorphBlendMesh.prototype.setAnimationDirectionForward = function(e) {
        var t = this.animationsMap[e];
        t && (t.direction = 1, t.directionBackwards = !1)
    }, THREE.MorphBlendMesh.prototype.setAnimationDirectionBackward = function(e) {
        var t = this.animationsMap[e];
        t && (t.direction = -1, t.directionBackwards = !0)
    }, THREE.MorphBlendMesh.prototype.setAnimationFPS = function(e, t) {
        var r = this.animationsMap[e];
        r && (r.fps = t, r.duration = (r.end - r.start) / r.fps)
    }, THREE.MorphBlendMesh.prototype.setAnimationDuration = function(e, t) {
        var r = this.animationsMap[e];
        r && (r.duration = t, r.fps = (r.end - r.start) / r.duration)
    }, THREE.MorphBlendMesh.prototype.setAnimationWeight = function(e, t) {
        var r = this.animationsMap[e];
        r && (r.weight = t)
    }, THREE.MorphBlendMesh.prototype.setAnimationTime = function(e, t) {
        var r = this.animationsMap[e];
        r && (r.time = t)
    }, THREE.MorphBlendMesh.prototype.getAnimationTime = function(e) {
        var t = 0,
            r = this.animationsMap[e];
        return r && (t = r.time), t
    }, THREE.MorphBlendMesh.prototype.getAnimationDuration = function(e) {
        var t = -1,
            r = this.animationsMap[e];
        return r && (t = r.duration), t
    }, THREE.MorphBlendMesh.prototype.playAnimation = function(e) {
        var t = this.animationsMap[e];
        t ? (t.time = 0, t.active = !0) : console.warn("animation[" + e + "] undefined")
    }, THREE.MorphBlendMesh.prototype.stopAnimation = function(e) {
        var t = this.animationsMap[e];
        t && (t.active = !1)
    }, THREE.MorphBlendMesh.prototype.update = function(e) {
        for (var t = 0, r = this.animationsList.length; r > t; t++) {
            var i = this.animationsList[t];
            if (i.active) {
                var n = i.duration / i.length;
                i.time += i.direction * e, i.mirroredLoop ? (i.time > i.duration || i.time < 0) && (i.direction *= -1, i.time > i.duration && (i.time = i.duration, i.directionBackwards = !0), i.time < 0 && (i.time = 0, i.directionBackwards = !1)) : (i.time = i.time % i.duration, i.time < 0 && (i.time += i.duration));
                var a = i.startFrame + THREE.Math.clamp(Math.floor(i.time / n), 0, i.length - 1),
                    o = i.weight;
                a !== i.currentFrame && (this.morphTargetInfluences[i.lastFrame] = 0, this.morphTargetInfluences[i.currentFrame] = 1 * o, this.morphTargetInfluences[a] = 0, i.lastFrame = i.currentFrame, i.currentFrame = a);
                var s = i.time % n / n;
                i.directionBackwards && (s = 1 - s), this.morphTargetInfluences[i.currentFrame] = s * o, this.morphTargetInfluences[i.lastFrame] = (1 - s) * o
            }
        }
    }, THREE.LensFlarePlugin = function() {
        function e(e, r) {
            var i = t.createProgram(),
                n = t.createShader(t.FRAGMENT_SHADER),
                a = t.createShader(t.VERTEX_SHADER),
                o = "precision " + r + " float;\n";
            return t.shaderSource(n, o + e.fragmentShader), t.shaderSource(a, o + e.vertexShader), t.compileShader(n), t.compileShader(a), t.attachShader(i, n), t.attachShader(i, a), t.linkProgram(i), i
        }
        var t, r, i, n = [],
            a = {};
        this.init = function(n) {
            t = n.context, r = n, i = n.getPrecision(), a.vertices = new Float32Array(16), a.faces = new Uint16Array(6);
            var o = 0;
            a.vertices[o++] = -1, a.vertices[o++] = -1, a.vertices[o++] = 0, a.vertices[o++] = 0, a.vertices[o++] = 1, a.vertices[o++] = -1, a.vertices[o++] = 1, a.vertices[o++] = 0, a.vertices[o++] = 1, a.vertices[o++] = 1, a.vertices[o++] = 1, a.vertices[o++] = 1, a.vertices[o++] = -1, a.vertices[o++] = 1, a.vertices[o++] = 0, a.vertices[o++] = 1, o = 0, a.faces[o++] = 0, a.faces[o++] = 1, a.faces[o++] = 2, a.faces[o++] = 0, a.faces[o++] = 2, a.faces[o++] = 3, a.vertexBuffer = t.createBuffer(), a.elementBuffer = t.createBuffer(), t.bindBuffer(t.ARRAY_BUFFER, a.vertexBuffer), t.bufferData(t.ARRAY_BUFFER, a.vertices, t.STATIC_DRAW), t.bindBuffer(t.ELEMENT_ARRAY_BUFFER, a.elementBuffer), t.bufferData(t.ELEMENT_ARRAY_BUFFER, a.faces, t.STATIC_DRAW), a.tempTexture = t.createTexture(), a.occlusionTexture = t.createTexture(), t.bindTexture(t.TEXTURE_2D, a.tempTexture), t.texImage2D(t.TEXTURE_2D, 0, t.RGB, 16, 16, 0, t.RGB, t.UNSIGNED_BYTE, null), t.texParameteri(t.TEXTURE_2D, t.TEXTURE_WRAP_S, t.CLAMP_TO_EDGE), t.texParameteri(t.TEXTURE_2D, t.TEXTURE_WRAP_T, t.CLAMP_TO_EDGE), t.texParameteri(t.TEXTURE_2D, t.TEXTURE_MAG_FILTER, t.NEAREST), t.texParameteri(t.TEXTURE_2D, t.TEXTURE_MIN_FILTER, t.NEAREST), t.bindTexture(t.TEXTURE_2D, a.occlusionTexture), t.texImage2D(t.TEXTURE_2D, 0, t.RGBA, 16, 16, 0, t.RGBA, t.UNSIGNED_BYTE, null), t.texParameteri(t.TEXTURE_2D, t.TEXTURE_WRAP_S, t.CLAMP_TO_EDGE), t.texParameteri(t.TEXTURE_2D, t.TEXTURE_WRAP_T, t.CLAMP_TO_EDGE), t.texParameteri(t.TEXTURE_2D, t.TEXTURE_MAG_FILTER, t.NEAREST), t.texParameteri(t.TEXTURE_2D, t.TEXTURE_MIN_FILTER, t.NEAREST), t.getParameter(t.MAX_VERTEX_TEXTURE_IMAGE_UNITS) <= 0 ? (a.hasVertexTexture = !1, a.program = e(THREE.ShaderFlares.lensFlare, i)) : (a.hasVertexTexture = !0, a.program = e(THREE.ShaderFlares.lensFlareVertexTexture, i)), a.attributes = {}, a.uniforms = {}, a.attributes.vertex = t.getAttribLocation(a.program, "position"), a.attributes.uv = t.getAttribLocation(a.program, "uv"), a.uniforms.renderType = t.getUniformLocation(a.program, "renderType"), a.uniforms.map = t.getUniformLocation(a.program, "map"), a.uniforms.occlusionMap = t.getUniformLocation(a.program, "occlusionMap"), a.uniforms.opacity = t.getUniformLocation(a.program, "opacity"), a.uniforms.color = t.getUniformLocation(a.program, "color"), a.uniforms.scale = t.getUniformLocation(a.program, "scale"), a.uniforms.rotation = t.getUniformLocation(a.program, "rotation"), a.uniforms.screenPosition = t.getUniformLocation(a.program, "screenPosition")
        }, this.render = function(e, i, o, s) {
            if (n.length = 0, e.traverseVisible(function(e) {
                    e instanceof THREE.LensFlare && n.push(e)
                }), 0 !== n.length) {
                var h = new THREE.Vector3,
                    l = s / o,
                    c = .5 * o,
                    u = .5 * s,
                    f = 16 / s,
                    E = new THREE.Vector2(f * l, f),
                    p = new THREE.Vector3(1, 1, 0),
                    d = new THREE.Vector2(1, 1),
                    m = a.uniforms,
                    v = a.attributes;
                t.useProgram(a.program), t.enableVertexAttribArray(a.attributes.vertex), t.enableVertexAttribArray(a.attributes.uv), t.uniform1i(m.occlusionMap, 0), t.uniform1i(m.map, 1), t.bindBuffer(t.ARRAY_BUFFER, a.vertexBuffer), t.vertexAttribPointer(v.vertex, 2, t.FLOAT, !1, 16, 0), t.vertexAttribPointer(v.uv, 2, t.FLOAT, !1, 16, 8), t.bindBuffer(t.ELEMENT_ARRAY_BUFFER, a.elementBuffer), t.disable(t.CULL_FACE), t.depthMask(!1);
                for (var g = 0, T = n.length; T > g; g++) {
                    f = 16 / s, E.set(f * l, f);
                    var y = n[g];
                    if (h.set(y.matrixWorld.elements[12], y.matrixWorld.elements[13], y.matrixWorld.elements[14]), h.applyMatrix4(i.matrixWorldInverse), h.applyProjection(i.projectionMatrix), p.copy(h), d.x = p.x * c + c, d.y = p.y * u + u, a.hasVertexTexture || d.x > 0 && d.x < o && d.y > 0 && d.y < s) {
                        t.activeTexture(t.TEXTURE1), t.bindTexture(t.TEXTURE_2D, a.tempTexture), t.copyTexImage2D(t.TEXTURE_2D, 0, t.RGB, d.x - 8, d.y - 8, 16, 16, 0), t.uniform1i(m.renderType, 0), t.uniform2f(m.scale, E.x, E.y), t.uniform3f(m.screenPosition, p.x, p.y, p.z), t.disable(t.BLEND), t.enable(t.DEPTH_TEST), t.drawElements(t.TRIANGLES, 6, t.UNSIGNED_SHORT, 0), t.activeTexture(t.TEXTURE0), t.bindTexture(t.TEXTURE_2D, a.occlusionTexture), t.copyTexImage2D(t.TEXTURE_2D, 0, t.RGBA, d.x - 8, d.y - 8, 16, 16, 0), t.uniform1i(m.renderType, 1), t.disable(t.DEPTH_TEST), t.activeTexture(t.TEXTURE1), t.bindTexture(t.TEXTURE_2D, a.tempTexture), t.drawElements(t.TRIANGLES, 6, t.UNSIGNED_SHORT, 0), y.positionScreen.copy(p), y.customUpdateCallback ? y.customUpdateCallback(y) : y.updateLensFlares(), t.uniform1i(m.renderType, 2), t.enable(t.BLEND);
                        for (var R = 0, x = y.lensFlares.length; x > R; R++) {
                            var H = y.lensFlares[R];
                            H.opacity > .001 && H.scale > .001 && (p.x = H.x, p.y = H.y, p.z = H.z, f = H.size * H.scale / s, E.x = f * l, E.y = f, t.uniform3f(m.screenPosition, p.x, p.y, p.z), t.uniform2f(m.scale, E.x, E.y), t.uniform1f(m.rotation, H.rotation), t.uniform1f(m.opacity, H.opacity), t.uniform3f(m.color, H.color.r, H.color.g, H.color.b), r.setBlending(H.blending, H.blendEquation, H.blendSrc, H.blendDst), r.setTexture(H.texture, 1), t.drawElements(t.TRIANGLES, 6, t.UNSIGNED_SHORT, 0))
                        }
                    }
                }
                t.enable(t.CULL_FACE), t.enable(t.DEPTH_TEST), t.depthMask(!0)
            }
        }
    }, THREE.ShadowMapPlugin = function() {
        function e(t, r, i) {
            if (r.visible) {
                var n = t.__webglObjects[r.id];
                if (n && r.castShadow && (r.frustumCulled === !1 || u.intersectsObject(r) === !0))
                    for (var a = 0, o = n.length; o > a; a++) {
                        var s = n[a];
                        r._modelViewMatrix.multiplyMatrices(i.matrixWorldInverse, r.matrixWorld), m.push(s)
                    }
                for (var a = 0, o = r.children.length; o > a; a++) e(t, r.children[a], i)
            }
        }

        function t(e, t) {
            var r = new THREE.DirectionalLight;
            r.isVirtual = !0, r.onlyShadow = !0, r.castShadow = !0, r.shadowCameraNear = e.shadowCameraNear, r.shadowCameraFar = e.shadowCameraFar, r.shadowCameraLeft = e.shadowCameraLeft, r.shadowCameraRight = e.shadowCameraRight, r.shadowCameraBottom = e.shadowCameraBottom, r.shadowCameraTop = e.shadowCameraTop, r.shadowCameraVisible = e.shadowCameraVisible, r.shadowDarkness = e.shadowDarkness, r.shadowBias = e.shadowCascadeBias[t], r.shadowMapWidth = e.shadowCascadeWidth[t], r.shadowMapHeight = e.shadowCascadeHeight[t], r.pointsWorld = [], r.pointsFrustum = [];
            for (var i = r.pointsWorld, n = r.pointsFrustum, a = 0; 8 > a; a++) i[a] = new THREE.Vector3, n[a] = new THREE.Vector3;
            var o = e.shadowCascadeNearZ[t],
                s = e.shadowCascadeFarZ[t];
            return n[0].set(-1, -1, o), n[1].set(1, -1, o), n[2].set(-1, 1, o), n[3].set(1, 1, o), n[4].set(-1, -1, s), n[5].set(1, -1, s), n[6].set(-1, 1, s), n[7].set(1, 1, s), r
        }

        function r(e, t) {
            var r = e.shadowCascadeArray[t];
            r.position.copy(e.position), r.target.position.copy(e.target.position), r.lookAt(r.target), r.shadowCameraVisible = e.shadowCameraVisible, r.shadowDarkness = e.shadowDarkness, r.shadowBias = e.shadowCascadeBias[t];
            var i = e.shadowCascadeNearZ[t],
                n = e.shadowCascadeFarZ[t],
                a = r.pointsFrustum;
            a[0].z = i, a[1].z = i, a[2].z = i, a[3].z = i, a[4].z = n, a[5].z = n, a[6].z = n, a[7].z = n
        }

        function i(e, t) {
            var r = t.shadowCamera,
                i = t.pointsFrustum,
                n = t.pointsWorld;
            E.set(1 / 0, 1 / 0, 1 / 0), p.set(-1 / 0, -1 / 0, -1 / 0);
            for (var a = 0; 8 > a; a++) {
                var o = n[a];
                o.copy(i[a]), THREE.ShadowMapPlugin.__projector.unprojectVector(o, e), o.applyMatrix4(r.matrixWorldInverse), o.x < E.x && (E.x = o.x), o.x > p.x && (p.x = o.x), o.y < E.y && (E.y = o.y), o.y > p.y && (p.y = o.y), o.z < E.z && (E.z = o.z), o.z > p.z && (p.z = o.z)
            }
            r.left = E.x, r.right = p.x, r.top = p.y, r.bottom = E.y, r.updateProjectionMatrix()
        }

        function n(e) {
            return e.material instanceof THREE.MeshFaceMaterial ? e.material.materials[0] : e.material
        }
        var a, o, s, h, l, c, u = new THREE.Frustum,
            f = new THREE.Matrix4,
            E = new THREE.Vector3,
            p = new THREE.Vector3,
            d = new THREE.Vector3,
            m = [];
        this.init = function(e) {
            a = e.context, o = e;
            var t = THREE.ShaderLib.depthRGBA,
                r = THREE.UniformsUtils.clone(t.uniforms);
            s = new THREE.ShaderMaterial({
                fragmentShader: t.fragmentShader,
                vertexShader: t.vertexShader,
                uniforms: r
            }), h = new THREE.ShaderMaterial({
                fragmentShader: t.fragmentShader,
                vertexShader: t.vertexShader,
                uniforms: r,
                morphTargets: !0
            }), l = new THREE.ShaderMaterial({
                fragmentShader: t.fragmentShader,
                vertexShader: t.vertexShader,
                uniforms: r,
                skinning: !0
            }), c = new THREE.ShaderMaterial({
                fragmentShader: t.fragmentShader,
                vertexShader: t.vertexShader,
                uniforms: r,
                morphTargets: !0,
                skinning: !0
            }), s._shadowPass = !0, h._shadowPass = !0, l._shadowPass = !0, c._shadowPass = !0
        }, this.render = function(e, t) {
            o.shadowMapEnabled && o.shadowMapAutoUpdate && this.update(e, t)
        }, this.update = function(E, p) {
            var v, g, T, y, R, x, H, b, _, w, M, S, C, A = [],
                L = 0,
                P = null;
            for (a.clearColor(1, 1, 1, 1), a.disable(a.BLEND), a.enable(a.CULL_FACE), a.frontFace(a.CCW), a.cullFace(o.shadowMapCullFace === THREE.CullFaceFront ? a.FRONT : a.BACK), o.setDepthTest(!0), v = 0, g = E.__lights.length; g > v; v++)
                if (C = E.__lights[v], C.castShadow)
                    if (C instanceof THREE.DirectionalLight && C.shadowCascade)
                        for (R = 0; R < C.shadowCascadeCount; R++) {
                            var F;
                            if (C.shadowCascadeArray[R]) F = C.shadowCascadeArray[R];
                            else {
                                F = t(C, R), F.originalCamera = p;
                                var D = new THREE.Gyroscope;
                                D.position.copy(C.shadowCascadeOffset), D.add(F), D.add(F.target), p.add(D), C.shadowCascadeArray[R] = F, console.log("Created virtualLight", F)
                            }
                            r(C, R), A[L] = F, L++
                        } else A[L] = C, L++;
            for (v = 0, g = A.length; g > v; v++) {
                if (C = A[v], !C.shadowMap) {
                    var U = THREE.LinearFilter;
                    o.shadowMapType === THREE.PCFSoftShadowMap && (U = THREE.NearestFilter);
                    var V = {
                        minFilter: U,
                        magFilter: U,
                        format: THREE.RGBAFormat
                    };
                    C.shadowMap = new THREE.WebGLRenderTarget(C.shadowMapWidth, C.shadowMapHeight, V), C.shadowMapSize = new THREE.Vector2(C.shadowMapWidth, C.shadowMapHeight), C.shadowMatrix = new THREE.Matrix4
                }
                if (!C.shadowCamera) {
                    if (C instanceof THREE.SpotLight) C.shadowCamera = new THREE.PerspectiveCamera(C.shadowCameraFov, C.shadowMapWidth / C.shadowMapHeight, C.shadowCameraNear, C.shadowCameraFar);
                    else {
                        if (!(C instanceof THREE.DirectionalLight)) {
                            console.error("Unsupported light type for shadow");
                            continue
                        }
                        C.shadowCamera = new THREE.OrthographicCamera(C.shadowCameraLeft, C.shadowCameraRight, C.shadowCameraTop, C.shadowCameraBottom, C.shadowCameraNear, C.shadowCameraFar)
                    }
                    E.add(C.shadowCamera), E.autoUpdate === !0 && E.updateMatrixWorld()
                }
                C.shadowCameraVisible && !C.cameraHelper && (C.cameraHelper = new THREE.CameraHelper(C.shadowCamera), C.shadowCamera.add(C.cameraHelper)), C.isVirtual && F.originalCamera == p && i(p, C), x = C.shadowMap, H = C.shadowMatrix, b = C.shadowCamera, b.position.setFromMatrixPosition(C.matrixWorld), d.setFromMatrixPosition(C.target.matrixWorld), b.lookAt(d), b.updateMatrixWorld(), b.matrixWorldInverse.getInverse(b.matrixWorld), C.cameraHelper && (C.cameraHelper.visible = C.shadowCameraVisible), C.shadowCameraVisible && C.cameraHelper.update(), H.set(.5, 0, 0, .5, 0, .5, 0, .5, 0, 0, .5, .5, 0, 0, 0, 1), H.multiply(b.projectionMatrix), H.multiply(b.matrixWorldInverse), f.multiplyMatrices(b.projectionMatrix, b.matrixWorldInverse), u.setFromMatrix(f), o.setRenderTarget(x), o.clear(), m.length = 0, e(E, E, b);
                var z, B, k;
                for (T = 0, y = m.length; y > T; T++) M = m[T], S = M.object, _ = M.buffer, z = n(S), B = void 0 !== S.geometry.morphTargets && S.geometry.morphTargets.length > 0 && z.morphTargets, k = S instanceof THREE.SkinnedMesh && z.skinning, w = S.customDepthMaterial ? S.customDepthMaterial : k ? B ? c : l : B ? h : s, o.setMaterialFaces(z), _ instanceof THREE.BufferGeometry ? o.renderBufferDirect(b, E.__lights, P, w, _, S) : o.renderBuffer(b, E.__lights, P, w, _, S);
                var N = E.__webglObjectsImmediate;
                for (T = 0, y = N.length; y > T; T++) M = N[T], S = M.object, S.visible && S.castShadow && (S._modelViewMatrix.multiplyMatrices(b.matrixWorldInverse, S.matrixWorld), o.renderImmediateObject(b, E.__lights, P, s, S))
            }
            var O = o.getClearColor(),
                I = o.getClearAlpha();
            a.clearColor(O.r, O.g, O.b, I), a.enable(a.BLEND), o.shadowMapCullFace === THREE.CullFaceFront && a.cullFace(a.BACK)
        }
    }, THREE.ShadowMapPlugin.__projector = new THREE.Projector, THREE.SpritePlugin = function() {
        function e() {
            var e = r.createProgram(),
                t = r.createShader(r.VERTEX_SHADER),
                n = r.createShader(r.FRAGMENT_SHADER);
            return r.shaderSource(t, ["precision " + i.getPrecision() + " float;", "uniform mat4 modelViewMatrix;", "uniform mat4 projectionMatrix;", "uniform float rotation;", "uniform vec2 scale;", "uniform vec2 uvOffset;", "uniform vec2 uvScale;", "attribute vec2 position;", "attribute vec2 uv;", "varying vec2 vUV;", "void main() {", "vUV = uvOffset + uv * uvScale;", "vec2 alignedPosition = position * scale;", "vec2 rotatedPosition;", "rotatedPosition.x = cos( rotation ) * alignedPosition.x - sin( rotation ) * alignedPosition.y;", "rotatedPosition.y = sin( rotation ) * alignedPosition.x + cos( rotation ) * alignedPosition.y;", "vec4 finalPosition;", "finalPosition = modelViewMatrix * vec4( 0.0, 0.0, 0.0, 1.0 );", "finalPosition.xy += rotatedPosition;", "finalPosition = projectionMatrix * finalPosition;", "gl_Position = finalPosition;", "}"].join("\n")), r.shaderSource(n, ["precision " + i.getPrecision() + " float;", "uniform vec3 color;", "uniform sampler2D map;", "uniform float opacity;", "uniform int fogType;", "uniform vec3 fogColor;", "uniform float fogDensity;", "uniform float fogNear;", "uniform float fogFar;", "uniform float alphaTest;", "varying vec2 vUV;", "void main() {", "vec4 texture = texture2D( map, vUV );", "if ( texture.a < alphaTest ) discard;", "gl_FragColor = vec4( color * texture.xyz, texture.a * opacity );", "if ( fogType > 0 ) {", "float depth = gl_FragCoord.z / gl_FragCoord.w;", "float fogFactor = 0.0;", "if ( fogType == 1 ) {", "fogFactor = smoothstep( fogNear, fogFar, depth );", "} else {", "const float LOG2 = 1.442695;", "float fogFactor = exp2( - fogDensity * fogDensity * depth * depth * LOG2 );", "fogFactor = 1.0 - clamp( fogFactor, 0.0, 1.0 );", "}", "gl_FragColor = mix( gl_FragColor, vec4( fogColor, gl_FragColor.w ), fogFactor );", "}", "}"].join("\n")), r.compileShader(t), r.compileShader(n), r.attachShader(e, t), r.attachShader(e, n), r.linkProgram(e), e
        }

        function t(e, t) {
            return e.z !== t.z ? t.z - e.z : t.id - e.id
        }
        var r, i, n, a, o, s, h, l, c, u, f = [];
        this.init = function(t) {
            r = t.context, i = t, a = new Float32Array([-.5, -.5, 0, 0, .5, -.5, 1, 0, .5, .5, 1, 1, -.5, .5, 0, 1]), o = new Uint16Array([0, 1, 2, 0, 2, 3]), s = r.createBuffer(), h = r.createBuffer(), r.bindBuffer(r.ARRAY_BUFFER, s), r.bufferData(r.ARRAY_BUFFER, a, r.STATIC_DRAW), r.bindBuffer(r.ELEMENT_ARRAY_BUFFER, h), r.bufferData(r.ELEMENT_ARRAY_BUFFER, o, r.STATIC_DRAW), l = e(), c = {
                position: r.getAttribLocation(l, "position"),
                uv: r.getAttribLocation(l, "uv")
            }, u = {
                uvOffset: r.getUniformLocation(l, "uvOffset"),
                uvScale: r.getUniformLocation(l, "uvScale"),
                rotation: r.getUniformLocation(l, "rotation"),
                scale: r.getUniformLocation(l, "scale"),
                color: r.getUniformLocation(l, "color"),
                map: r.getUniformLocation(l, "map"),
                opacity: r.getUniformLocation(l, "opacity"),
                modelViewMatrix: r.getUniformLocation(l, "modelViewMatrix"),
                projectionMatrix: r.getUniformLocation(l, "projectionMatrix"),
                fogType: r.getUniformLocation(l, "fogType"),
                fogDensity: r.getUniformLocation(l, "fogDensity"),
                fogNear: r.getUniformLocation(l, "fogNear"),
                fogFar: r.getUniformLocation(l, "fogFar"),
                fogColor: r.getUniformLocation(l, "fogColor"),
                alphaTest: r.getUniformLocation(l, "alphaTest")
            };
            var f = document.createElement("canvas");
            f.width = 8, f.height = 8;
            var E = f.getContext("2d");
            E.fillStyle = "white", E.fillRect(0, 0, 8, 8), n = new THREE.Texture(f), n.needsUpdate = !0
        }, this.render = function(e, a) {
            if (f.length = 0, e.traverseVisible(function(e) {
                    e instanceof THREE.Sprite && f.push(e)
                }), 0 !== f.length) {
                r.useProgram(l), r.enableVertexAttribArray(c.position), r.enableVertexAttribArray(c.uv), r.disable(r.CULL_FACE), r.enable(r.BLEND), r.bindBuffer(r.ARRAY_BUFFER, s), r.vertexAttribPointer(c.position, 2, r.FLOAT, !1, 16, 0), r.vertexAttribPointer(c.uv, 2, r.FLOAT, !1, 16, 8), r.bindBuffer(r.ELEMENT_ARRAY_BUFFER, h), r.uniformMatrix4fv(u.projectionMatrix, !1, a.projectionMatrix.elements), r.activeTexture(r.TEXTURE0), r.uniform1i(u.map, 0);
                var o = 0,
                    E = 0,
                    p = e.fog;
                p ? (r.uniform3f(u.fogColor, p.color.r, p.color.g, p.color.b), p instanceof THREE.Fog ? (r.uniform1f(u.fogNear, p.near), r.uniform1f(u.fogFar, p.far), r.uniform1i(u.fogType, 1), o = 1, E = 1) : p instanceof THREE.FogExp2 && (r.uniform1f(u.fogDensity, p.density), r.uniform1i(u.fogType, 2), o = 2, E = 2)) : (r.uniform1i(u.fogType, 0), o = 0, E = 0);
                for (var d = 0, m = f.length; m > d; d++) {
                    var v = f[d],
                        g = v.material;
                    v._modelViewMatrix.multiplyMatrices(a.matrixWorldInverse, v.matrixWorld), v.z = -v._modelViewMatrix.elements[14]
                }
                f.sort(t);
                for (var T = [], d = 0, m = f.length; m > d; d++) {
                    var v = f[d],
                        g = v.material;
                    r.uniform1f(u.alphaTest, g.alphaTest), r.uniformMatrix4fv(u.modelViewMatrix, !1, v._modelViewMatrix.elements), T[0] = v.scale.x, T[1] = v.scale.y;
                    var y = 0;
                    e.fog && g.fog && (y = E), o !== y && (r.uniform1i(u.fogType, y), o = y), null !== g.map ? (r.uniform2f(u.uvOffset, g.map.offset.x, g.map.offset.y), r.uniform2f(u.uvScale, g.map.repeat.x, g.map.repeat.y)) : (r.uniform2f(u.uvOffset, 0, 0), r.uniform2f(u.uvScale, 1, 1)), r.uniform1f(u.opacity, g.opacity), r.uniform3f(u.color, g.color.r, g.color.g, g.color.b), r.uniform1f(u.rotation, g.rotation), r.uniform2fv(u.scale, T), i.setBlending(g.blending, g.blendEquation, g.blendSrc, g.blendDst), i.setDepthTest(g.depthTest), i.setDepthWrite(g.depthWrite), g.map && g.map.image && g.map.image.width ? i.setTexture(g.map, 0) : i.setTexture(n, 0), r.drawElements(r.TRIANGLES, 6, r.UNSIGNED_SHORT, 0)
                }
                r.enable(r.CULL_FACE)
            }
        }
    }, THREE.DepthPassPlugin = function() {
        function e(t, r, i) {
            if (r.visible) {
                var n = t.__webglObjects[r.id];
                if (n && (r.frustumCulled === !1 || h.intersectsObject(r) === !0))
                    for (var a = 0, o = n.length; o > a; a++) {
                        var s = n[a];
                        r._modelViewMatrix.multiplyMatrices(i.matrixWorldInverse, r.matrixWorld), c.push(s)
                    }
                for (var a = 0, o = r.children.length; o > a; a++) e(t, r.children[a], i)
            }
        }

        function t(e) {
            return e.material instanceof THREE.MeshFaceMaterial ? e.material.materials[0] : e.material
        }
        this.enabled = !1, this.renderTarget = null;
        var r, i, n, a, o, s, h = new THREE.Frustum,
            l = new THREE.Matrix4,
            c = [];
        this.init = function(e) {
            r = e.context, i = e;
            var t = THREE.ShaderLib.depthRGBA,
                h = THREE.UniformsUtils.clone(t.uniforms);
            n = new THREE.ShaderMaterial({
                fragmentShader: t.fragmentShader,
                vertexShader: t.vertexShader,
                uniforms: h
            }), a = new THREE.ShaderMaterial({
                fragmentShader: t.fragmentShader,
                vertexShader: t.vertexShader,
                uniforms: h,
                morphTargets: !0
            }), o = new THREE.ShaderMaterial({
                fragmentShader: t.fragmentShader,
                vertexShader: t.vertexShader,
                uniforms: h,
                skinning: !0
            }), s = new THREE.ShaderMaterial({
                fragmentShader: t.fragmentShader,
                vertexShader: t.vertexShader,
                uniforms: h,
                morphTargets: !0,
                skinning: !0
            }), n._shadowPass = !0, a._shadowPass = !0, o._shadowPass = !0, s._shadowPass = !0
        }, this.render = function(e, t) {
            this.enabled && this.update(e, t)
        }, this.update = function(u, f) {
            var E, p, d, m, v, g, T, y = null;
            r.clearColor(1, 1, 1, 1), r.disable(r.BLEND), i.setDepthTest(!0), u.autoUpdate === !0 && u.updateMatrixWorld(), f.matrixWorldInverse.getInverse(f.matrixWorld), l.multiplyMatrices(f.projectionMatrix, f.matrixWorldInverse), h.setFromMatrix(l), i.setRenderTarget(this.renderTarget), i.clear(), c.length = 0, e(u, u, f);
            var R, x, H;
            for (E = 0, p = c.length; p > E; E++) v = c[E], g = v.object, d = v.buffer, g instanceof THREE.PointCloud && !g.customDepthMaterial || (R = t(g), R && i.setMaterialFaces(g.material), x = void 0 !== g.geometry.morphTargets && g.geometry.morphTargets.length > 0 && R.morphTargets, H = g instanceof THREE.SkinnedMesh && R.skinning, m = g.customDepthMaterial ? g.customDepthMaterial : H ? x ? s : o : x ? a : n, d instanceof THREE.BufferGeometry ? i.renderBufferDirect(f, u.__lights, y, m, d, g) : i.renderBuffer(f, u.__lights, y, m, d, g));
            for (T = u.__webglObjectsImmediate, E = 0, p = T.length; p > E; E++) v = T[E], g = v.object, g.visible && (g._modelViewMatrix.multiplyMatrices(f.matrixWorldInverse, g.matrixWorld), i.renderImmediateObject(f, u.__lights, y, n, g));
            var b = i.getClearColor(),
                _ = i.getClearAlpha();
            r.clearColor(b.r, b.g, b.b, _), r.enable(r.BLEND)
        }
    }, THREE.ShaderFlares = {
        lensFlareVertexTexture: {
            vertexShader: ["uniform lowp int renderType;", "uniform vec3 screenPosition;", "uniform vec2 scale;", "uniform float rotation;", "uniform sampler2D occlusionMap;", "attribute vec2 position;", "attribute vec2 uv;", "varying vec2 vUV;", "varying float vVisibility;", "void main() {", "vUV = uv;", "vec2 pos = position;", "if( renderType == 2 ) {", "vec4 visibility = texture2D( occlusionMap, vec2( 0.1, 0.1 ) );", "visibility += texture2D( occlusionMap, vec2( 0.5, 0.1 ) );", "visibility += texture2D( occlusionMap, vec2( 0.9, 0.1 ) );", "visibility += texture2D( occlusionMap, vec2( 0.9, 0.5 ) );", "visibility += texture2D( occlusionMap, vec2( 0.9, 0.9 ) );", "visibility += texture2D( occlusionMap, vec2( 0.5, 0.9 ) );", "visibility += texture2D( occlusionMap, vec2( 0.1, 0.9 ) );", "visibility += texture2D( occlusionMap, vec2( 0.1, 0.5 ) );", "visibility += texture2D( occlusionMap, vec2( 0.5, 0.5 ) );", "vVisibility =        visibility.r / 9.0;", "vVisibility *= 1.0 - visibility.g / 9.0;", "vVisibility *=       visibility.b / 9.0;", "vVisibility *= 1.0 - visibility.a / 9.0;", "pos.x = cos( rotation ) * position.x - sin( rotation ) * position.y;", "pos.y = sin( rotation ) * position.x + cos( rotation ) * position.y;", "}", "gl_Position = vec4( ( pos * scale + screenPosition.xy ).xy, screenPosition.z, 1.0 );", "}"].join("\n"),
            fragmentShader: ["uniform lowp int renderType;", "uniform sampler2D map;", "uniform float opacity;", "uniform vec3 color;", "varying vec2 vUV;", "varying float vVisibility;", "void main() {", "if( renderType == 0 ) {", "gl_FragColor = vec4( 1.0, 0.0, 1.0, 0.0 );", "} else if( renderType == 1 ) {", "gl_FragColor = texture2D( map, vUV );", "} else {", "vec4 texture = texture2D( map, vUV );", "texture.a *= opacity * vVisibility;", "gl_FragColor = texture;", "gl_FragColor.rgb *= color;", "}", "}"].join("\n")
        },
        lensFlare: {
            vertexShader: ["uniform lowp int renderType;", "uniform vec3 screenPosition;", "uniform vec2 scale;", "uniform float rotation;", "attribute vec2 position;", "attribute vec2 uv;", "varying vec2 vUV;", "void main() {", "vUV = uv;", "vec2 pos = position;", "if( renderType == 2 ) {", "pos.x = cos( rotation ) * position.x - sin( rotation ) * position.y;", "pos.y = sin( rotation ) * position.x + cos( rotation ) * position.y;", "}", "gl_Position = vec4( ( pos * scale + screenPosition.xy ).xy, screenPosition.z, 1.0 );", "}"].join("\n"),
            fragmentShader: ["precision mediump float;", "uniform lowp int renderType;", "uniform sampler2D map;", "uniform sampler2D occlusionMap;", "uniform float opacity;", "uniform vec3 color;", "varying vec2 vUV;", "void main() {", "if( renderType == 0 ) {", "gl_FragColor = vec4( texture2D( map, vUV ).rgb, 0.0 );", "} else if( renderType == 1 ) {", "gl_FragColor = texture2D( map, vUV );", "} else {", "float visibility = texture2D( occlusionMap, vec2( 0.5, 0.1 ) ).a;", "visibility += texture2D( occlusionMap, vec2( 0.9, 0.5 ) ).a;", "visibility += texture2D( occlusionMap, vec2( 0.5, 0.9 ) ).a;", "visibility += texture2D( occlusionMap, vec2( 0.1, 0.5 ) ).a;", "visibility = ( 1.0 - visibility / 4.0 );", "vec4 texture = texture2D( map, vUV );", "texture.a *= opacity * visibility;", "gl_FragColor = texture;", "gl_FragColor.rgb *= color;", "}", "}"].join("\n")
        }
    };