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
    <link rel="stylesheet" href="{{asset('hidden-link/css/custom.css')}}">
    {{-- Font --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('hidden-link/css/themify-icons.css')}}">
</head>
<body>
    <div class="image-container set-full-height" style="background-image: url({{asset('lib/img/background-2.jpg')}})">
        @if (Auth::user())
            <?php $fbid = Auth::user()->providerUser()->first()->provider_user_id; ?>
            <div class="logo-container">
                <div class="logo">
                    <img src="{{ 'http://graph.facebook.com/'.$fbid.'/picture?type=large' }}" width="60">
                </div>
                <div class="brand">
                    {{ Auth::user()->name }}
                </div>
            </div>
        @endif
        <div class="container">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="wizard-container">
                    <div class="card wizard-card">
                        <div class="wizard-header">
                            <h3 class="wizard-title">vLocked Link</h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @if (Auth::guest())
                                    <p class="info-text">Bạn chưa đăng nhập vào ứng dụng.</p>
                                    <center>
                                        <a href="{{ route('link.redirect') }}" class="btn btn-fill btn-info">
                                            <i class="fa fa-facebook"></i> Đăng nhập
                                        </a>
                                    </center>
                                    <p class="info-text">Click vào nút phía trên để đăng nhập.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>