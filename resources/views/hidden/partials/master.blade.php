<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>V-ProtectLink</title>

    {{-- CSS --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('hidden-link/css/gsdk.css')}}">
    <link rel="stylesheet" href="{{asset('hidden-link/css/custom.css')}}">
    {{-- Font --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('hidden-link/css/themify-icons.css')}}">
    {{-- Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
<div class="image-container set-full-height" style="background-image: url('http://i.imgur.com/mPEpBc0.png')">
    @if (Auth::user())
        <?php $fbid = Auth::user()->providerUser()->first()->provider_user_id; ?>
        <div class="logo-container">
            <div class="logo">
                <img src="{{ 'http://graph.facebook.com/'.$fbid.'/picture?type=large' }}" width="60">
            </div>
            <div class="brand">
                <h6>{{ Auth::user()->name }}</h6>
                {{-- logout--}}
                <a href="{{ url('/logout') }}" class="btn btn-danger btn-fill btn-xs"
                   onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="wizard-container">
                <div class="card wizard-card">
                    <div class="wizard-header">
                        <h3 class="wizard-title"><a href="{{ route('link.index') }}">vLocked Link</a></h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container text-center">
            Developed with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">SangND</a>. VTeam<a href="http://www.creative-tim.com/product/paper-bootstrap-wizard"> 2017.</a>
        </div>
    </div>
</div>
</body>
</html>