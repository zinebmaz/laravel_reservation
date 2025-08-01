<x-guest-layout>
    <style>
        body, html {
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .login-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 420px;
            padding: 40px 30px;
            transition: transform 0.3s ease;
        }
        .login-card:hover {
            transform: translateY(-5px);
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h2 {
            font-weight: 700;
            color: #333;
        }
        .form-control {
            border-radius: 50px;
            padding-left: 45px;
            height: 45px;
            font-size: 1rem;
            box-shadow: none !important;
            border: 1.5px solid #ddd;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102,126,234,0.5);
            outline: none;
        }
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-size: 18px;
        }
        .position-relative {
            position: relative;
        }
        .btn-primary {
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
            font-size: 1.1rem;
            background: #667eea;
            border: none;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
            background: #5564d8;
        }
        .form-check-label {
            user-select: none;
            color: #555;
        }
        .forgot-password {
            font-size: 0.9rem;
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .forgot-password:hover {
            color: #4553b3;
            text-decoration: underline;
        }
    </style>

    <div class="login-container">
        <div class="login-card">

            <div class="login-header">
                <h2>Connexion</h2>
                <p class="text-muted">Bienvenue, veuillez vous connecter</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4 position-relative">
                    <i class="fas fa-envelope input-icon"></i>
                    <input id="email" type="email" name="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email') }}" required autofocus placeholder="Email">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4 position-relative">
                    <i class="fas fa-lock input-icon"></i>
                    <input id="password" type="password" name="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        required placeholder="Mot de passe">
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-4 form-check d-flex justify-content-center align-items-center">
                    <input type="checkbox" class="form-check-input me-2" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                </div>

                <!-- Forgot & Submit -->
                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            Mot de passe oublié ?
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary">
                        Se connecter
                    </button>
                </div>

            </form>

        </div>
    </div>

    <!-- FontAwesome CDN pour les icônes -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</x-guest-layout>