<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>

<body>
    <h1>{{ $message }}</h1>
    <button type="button" onclick="window.location='{{ URL::route('posts.index') }}'">Go see the posts</button>
    <div id="cookie-notice" class="js-cookie-consent cookie-consent">
        <p>This website uses cookies to improve your experience.</p>
        <button class="js-cookie-consent-accept">Accept</button>
    </div>
</body>

</html>

<script>
    const cookieNotice = document.getElementById('cookie-notice');
    const acceptButton = document.querySelector('.js-cookie-consent-accept');

    function checkCookie() {
        if (document.cookie.indexOf('cookie-consent=true') === -1) {
            cookieNotice.style.display = 'block';
        }
    }

    function setCookie() {
        document.cookie = 'cookie-consent=true; path=/';
        cookieNotice.style.display = 'none';
    }

    acceptButton.addEventListener('click', setCookie);

    checkCookie();
</script>
