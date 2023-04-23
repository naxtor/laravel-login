<!doctype html>
<html lang="en">

<head>
    <title>Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/login-form-20/css/style.css">
    <script nonce="219864e3-cba5-4ab6-91b9-a87139b3eb3f">
        (function(w, d) {
            ! function(Y, Z, _, ba) {
                Y[_] = Y[_] || {};
                Y[_].executed = [];
                Y.zaraz = {
                    deferred: [],
                    listeners: []
                };
                Y.zaraz.q = [];
                Y.zaraz._f = function(bb) {
                    return function() {
                        var bc = Array.prototype.slice.call(arguments);
                        Y.zaraz.q.push({
                            m: bb,
                            a: bc
                        })
                    }
                };
                for (const bd of ["track", "set", "debug"]) Y.zaraz[bd] = Y.zaraz._f(bd);
                Y.zaraz.init = () => {
                    var be = Z.getElementsByTagName(ba)[0],
                        bf = Z.createElement(ba),
                        bg = Z.getElementsByTagName("title")[0];
                    bg && (Y[_].t = Z.getElementsByTagName("title")[0].text);
                    Y[_].x = Math.random();
                    Y[_].w = Y.screen.width;
                    Y[_].h = Y.screen.height;
                    Y[_].j = Y.innerHeight;
                    Y[_].e = Y.innerWidth;
                    Y[_].l = Y.location.href;
                    Y[_].r = Z.referrer;
                    Y[_].k = Y.screen.colorDepth;
                    Y[_].n = Z.characterSet;
                    Y[_].o = (new Date).getTimezoneOffset();
                    if (Y.dataLayer)
                        for (const bk of Object.entries(Object.entries(dataLayer).reduce(((bl, bm) => ({
                                ...bl[1],
                                ...bm[1]
                            }))))) zaraz.set(bk[0], bk[1], {
                            scope: "page"
                        });
                    Y[_].q = [];
                    for (; Y.zaraz.q.length;) {
                        const bn = Y.zaraz.q.shift();
                        Y[_].q.push(bn)
                    }
                    bf.defer = !0;
                    for (const bo of [localStorage, sessionStorage]) Object.keys(bo || {}).filter((bq => bq.startsWith("_zaraz_"))).forEach((bp => {
                        try {
                            Y[_]["z_" + bp.slice(7)] = JSON.parse(bo.getItem(bp))
                        } catch {
                            Y[_]["z_" + bp.slice(7)] = bo.getItem(bp)
                        }
                    }));
                    bf.referrerPolicy = "origin";
                    bf.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(Y[_])));
                    be.parentNode.insertBefore(bf, be)
                };
                ["complete", "interactive"].includes(Z.readyState) ? zaraz.init() : Y.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body class="img js-fullheight" style="background-image: url(https://preview.colorlib.com/theme/bootstrap/login-form-20/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Reset Password</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Forget your password?</h3>
                        <form action="{{ route('reset_password') }}" class="signin-form" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="New Password" name="password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <div class="form-group">
                                <input id="password-field-confirm" type="password" class="form-control" placeholder="Re-type New Password" name="confirm_password" required>
                                <span toggle="#password-field-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            @if ($errors->has('confirm_password'))
                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                            @if(session('error'))
                            <span class="text-danger">{{ session('error') }}</span>
                            @endif
                            <div class="form-group mt-5">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Reset</button>
                            </div>
                            <div class="text-center">
                                <p>Have an account ?</p>
                                <a href="{{ route('login_view') }}" style="color: #fff">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://preview.colorlib.com/theme/bootstrap/login-form-20/js/jquery.min.js"></script>
    <script src="https://preview.colorlib.com/theme/bootstrap/login-form-20/js/popper.js"></script>
    <script src="https://preview.colorlib.com/theme/bootstrap/login-form-20/js/bootstrap.min.js"></script>
    <script src="https://preview.colorlib.com/theme/bootstrap/login-form-20/js/main.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v2b4487d741ca48dcbadcaf954e159fc61680799950996" integrity="sha512-D/jdE0CypeVxFadTejKGTzmwyV10c1pxZk/AqjJuZbaJwGMyNHY3q/mTPWqMUnFACfCTunhZUVcd4cV78dK1pQ==" data-cf-beacon='{"rayId":"7ba567086ef64adc","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.3.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>