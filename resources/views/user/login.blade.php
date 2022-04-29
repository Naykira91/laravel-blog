<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Blog | Sign in Page</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">


    <script nonce="a87a95d5-eefe-4e19-a836-d7d0ab4e14e7">(function (w, d) {
            !function (a, e, t, r) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zaraz = {deferred: []}, a.zaraz.q = [], a.zaraz._f = function (e) {
                    return function () {
                        var t = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({m: e, a: t})
                    }
                };
                for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
                a.addEventListener("DOMContentLoaded", (() => {
                    var t = e.getElementsByTagName(r)[0], z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    for (n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a.zarazData.q = []; a.zaraz.q.length;) {
                        const e = a.zaraz.q.shift();
                        a.zarazData.q.push(e)
                    }
                    z.defer = !0, z.referrerPolicy = "origin", z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
                }))
            }(w, d, 0, "script");
        })(window, document);</script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <b>Sign in</b>
    </div>
    <div class="card">
        <div class="card-body register-card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-8">
                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                    </div>

                </div>
            </form>
            {{--            <div class="social-auth-links text-center">--}}
                {{--                <p>- OR -</p>--}}
                {{--                <a href="#" class="btn btn-block btn-primary">--}}
                    {{--                    <i class="fab fa-facebook mr-2"></i>--}}
                    {{--                    Sign up using Facebook--}}
                    {{--                </a>--}}
                {{--                <a href="#" class="btn btn-block btn-danger">--}}
                    {{--                    <i class="fab fa-google-plus mr-2"></i>--}}
                    {{--                    Sign up using Google+--}}
                    {{--                </a>--}}
                {{--            </div>--}}
            <a href="{{ route('register.create') }}" class="text-center">Register a new membership</a>
        </div>

    </div>
</div>

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>

</body>
</html>
