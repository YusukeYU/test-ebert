<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teste || Ebert</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/pessoal.css') }}" type="text/css" rel="stylesheet">

</head>
<div class="wrapper fadeInDown">
    @if (isset($login_failed))
        <script>
            alert('Verifique os dados digitados e tente novamente!');
        </script>
    @endif
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="{{ asset('assets/homem.svg') }}" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form action="{{ route('makeLogin') }}" method="POST">
            @csrf
            <input type="text" id="login" class="fadeIn second" name="email_user" placeholder="Email"
                value="{{ old('email_user') }}">
            <input type="password" id="password" class="fadeIn third" name="password_user" placeholder="Password">
            <input type="submit" class="fadeIn fourth" value="Log In">
            @if ($errors->any())
                <div class="text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
<script href="{{ asset('js/bootstrap.min.js') }}"> </script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>

</body>

</html>
