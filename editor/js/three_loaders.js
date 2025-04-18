THREE.OBJLoader = function(e) {
    this.manager = void 0 !== e ? e : THREE.DefaultLoadingManager
}, THREE.OBJLoader.prototype = {
    constructor: THREE.OBJLoader,
    load: function(e, n) {
        var t = this,
            r = new THREE.XHRLoader(t.manager);
        r.setCrossOrigin(this.crossOrigin), r.load(e, function(e) {
            console.time(1);
            var r = t.parse(e);
            console.timeEnd(1), n(r)
        })
    },
    parse: function(e) {
        function n(e, n, t) {
            return new THREE.Vector3(parseFloat(e), parseFloat(n), parseFloat(t))
        }

        function t(e, n) {
            return new THREE.Vector2(parseFloat(e), parseFloat(n))
        }

        function r(e, n, t, r) {
            return new THREE.Face3(e, n, t, r)
        }

        function d(e) {
            return e = parseInt(e), e >= 0 ? e - 1 : e + p.length
        }

        function o(e) {
            return e = parseInt(e), e >= 0 ? e - 1 : e + f.length
        }

        function a(e) {
            return e = parseInt(e), e >= 0 ? e - 1 : e + g.length
        }

        function l(e, n, t, a) {
            i.faces.push(void 0 === a ? r(p[d(e)] - 1, p[d(n)] - 1, p[d(t)] - 1) : r(p[d(e)] - 1, p[d(n)] - 1, p[d(t)] - 1, [f[o(a[0])].clone(), f[o(a[1])].clone(), f[o(a[2])].clone()]))
        }

        function s(e, n, t) {
            i.faceVertexUvs[0].push([g[a(e)].clone(), g[a(n)].clone(), g[a(t)].clone()])
        }

        function c(e, n, t) {
            void 0 === e[3] ? (l(e[0], e[1], e[2], t), void 0 !== n && n.length > 0 && s(n[0], n[1], n[2])) : (void 0 !== t && t.length > 0 ? (l(e[0], e[1], e[3], [t[0], t[1], t[3]]), l(e[1], e[2], e[3], [t[1], t[2], t[3]])) : (l(e[0], e[1], e[3]), l(e[1], e[2], e[3])), void 0 !== n && n.length > 0 && (s(n[0], n[1], n[3]), s(n[1], n[2], n[3])))
        }
        var i, u, E, h = new THREE.Object3D;
        /^o /gm.test(e) === !1 && (i = new THREE.Geometry, u = new THREE.MeshLambertMaterial, E = new THREE.Mesh(i, u), h.add(E));
        var p = [],
            f = [],
            g = [],
            m = /v( +[\d|\.|\+|\-|e]+)( +[\d|\.|\+|\-|e]+)( +[\d|\.|\+|\-|e]+)/,
            v = /vn( +[\d|\.|\+|\-|e]+)( +[\d|\.|\+|\-|e]+)( +[\d|\.|\+|\-|e]+)/,
            H = /vt( +[\d|\.|\+|\-|e]+)( +[\d|\.|\+|\-|e]+)/,
            R = /f( +-?\d+)( +-?\d+)( +-?\d+)( +-?\d+)?/,
            T = /f( +(-?\d+)\/(-?\d+))( +(-?\d+)\/(-?\d+))( +(-?\d+)\/(-?\d+))( +(-?\d+)\/(-?\d+))?/,
            w = /f( +(-?\d+)\/(-?\d+)\/(-?\d+))( +(-?\d+)\/(-?\d+)\/(-?\d+))( +(-?\d+)\/(-?\d+)\/(-?\d+))( +(-?\d+)\/(-?\d+)\/(-?\d+))?/,
            x = /f( +(-?\d+)\/\/(-?\d+))( +(-?\d+)\/\/(-?\d+))( +(-?\d+)\/\/(-?\d+))( +(-?\d+)\/\/(-?\d+))?/;
        e = e.replace(/\\\r\n/g, "");
        for (var F = e.split("\n"), L = 0; L < F.length; L++) {
            var M = F[L];
            M = M.trim();
            var b;
            0 !== M.length && "#" !== M.charAt(0) && (null !== (b = m.exec(M)) ? p.push(i.vertices.push(n(b[1], b[2], b[3]))) : null !== (b = v.exec(M)) ? f.push(n(b[1], b[2], b[3])) : null !== (b = H.exec(M)) ? g.push(t(b[1], b[2])) : null !== (b = R.exec(M)) ? c([b[1], b[2], b[3], b[4]]) : null !== (b = T.exec(M)) ? c([b[2], b[5], b[8], b[11]], [b[3], b[6], b[9], b[12]]) : null !== (b = w.exec(M)) ? c([b[2], b[6], b[10], b[14]], [b[3], b[7], b[11], b[15]], [b[4], b[8], b[12], b[16]]) : null !== (b = x.exec(M)) ? c([b[2], b[5], b[8], b[11]], [], [b[3], b[6], b[9], b[12]]) : /^o /.test(M) ? (i = new THREE.Geometry, u = new THREE.MeshLambertMaterial, E = new THREE.Mesh(i, u), E.name = M.substring(2).trim(), h.add(E)) : /^g /.test(M) || (/^usemtl /.test(M) ? u.name = M.substring(7).trim() : /^mtllib /.test(M) || /^s /.test(M)))
        }
        for (var O = h.children, L = 0, y = O.length; y > L; L++) {
            var i = O[L].geometry;
            i.computeFaceNormals(), i.computeBoundingSphere()
        }
        return h
    }
};