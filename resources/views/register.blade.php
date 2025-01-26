<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Internshify. Registro de usuarios</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
</head>
<body>
    <main>
        <h1>Registro de usuarios</h1>
        <form class="LoginForm" action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="FormGroup">
                <label class="FormGroup__label" for="name">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="FormGroup__input {{ $errors->has('name') ? 'FormGroup__input--invalid' : '' }}" required>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
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
            <div class="FormGroup">
                <label class="FormGroup__label" for="password_confirmation">Confirmar Contraseña:</label>
                <input class="FormGroup__input" type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <button type="submit" class="Button">Registrarse</button>
        </form>
    </main>
</body>
</html>
