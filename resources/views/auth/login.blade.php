@extends('auth.layout')

@section('title', 'Connexion')

@section('content')
    <h2 class="text-center mb-4">Connexion</h2>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-input" 
                   value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-input" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="remember"> Se souvenir de moi
            </label>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%">
            Se connecter
        </button>
    </form>

    <div class="text-center mt-4">
        <p>Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a></p>
    </div>
@endsection