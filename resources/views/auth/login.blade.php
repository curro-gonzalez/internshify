<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Internshify. Login</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
</head>
<body>
<main>
    <h1>Login de usuarios</h1>
    <form class="LoginForm" action="{{ route('login.store') }}" method="POST">
        @csrf
        <div class="FormGroup">
            <label class="FormGroup__label" for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="FormGroup__input {{ $errors->has('email') ? 'FormGroup__input--invalid' : '' }}" required>
            @error('email')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="FormGroup">
            <label class="FormGroup__label" for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="FormGroup__input {{ $errors->has('password') ? 'FormGroup__input--invalid' : '' }}" required>
            @error('password')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="Button">Login</button>
    </form>
</main>
</body>
</html>
