@extends('auth.layout')

@section('title', 'Inscription')

@section('content')
    <h2 class="text-center mb-4">Inscription</h2>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="form-group">
            <label for="name" class="form-label">Nom</label>
            <input type="text" id="name" name="name" class="form-input" 
                   value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-input" 
                   value="{{ old('email') }}" required>
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
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%">
            S'inscrire
        </button>
    </form>

    <div class="text-center mt-4">
        <p>Déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
    </div>
@endsection