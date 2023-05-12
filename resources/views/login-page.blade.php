<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <main>
        <div class="row">
            <div class="img-section">
                <img src="{{ asset('assets/images/insta-mockup.png') }}" alt="">
            </div>
            <div class="login-section">
                <div class="white-bg">
                    <h1>Teragram</h1>
                    <form action="#">
                        <input type="text" placeholder="Phone number, username, or email">
                        <input type="password" placeholder="Password">
                        <button class="submit-btn" type="submit">
                            Log In
                        </button>
                        <div class="or">
                            <span></span>
                            <p>or</p>
                            <span></span>
                        </div>
                        <a href="#" class="fb-login">
                            <img src="{{ asset('assets/images/facebook.png') }}" alt="">
                            <p>Login with Facebook</p>
                        </a>
                        <a href="#" class="forgot-login">
                            Forgot password
                        </a>
                    </form>
                </div>
                <div class="white-bg mt">
                    <p>Don't have an account? <a href="#">Sign up</a></p>
                </div>
                <div class="get-app mt">
                    <p>Get the app</p>
                    <div class="d-flex">
                        <a href="#">
                            <img src="{{ asset('assets/images/app-store.png') }}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{ asset('assets/images/play-store.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <ol>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">API</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Verification</a></li>
        </ol>
        <div class="d-flex mt">
            <select name="language" id="language">
                <option value="lang1">
                    English
                </option>
                <option value="lang2">
                    Indonesia
                </option>
                <option value="lang3">
                    Arab
                </option>
                <option value="lang4">
                    Jawa
                </option>
            </select>
            <small>&copy; 2023 Teragram from Magang Vokanesia</small>
        </div>
    </footer>
</body>

</html>
