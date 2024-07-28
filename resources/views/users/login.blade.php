<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <style>
        .container-login {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-content: center;
            align-items: center;
        }

        .container-form {
            width: 40%;
        }

        .container-logo {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        @if (isset($error))
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            </div>
        @endif

        <div class="container-login">
            <div class="container-logo">
                <img src="" alt="logo">
            </div>
            <div class="container-form">
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/login">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="user" type="text" class="form-control" id="user" placeholder="id">
                        <label for="user">User</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="password"
                            placeholder="password">
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign In</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
