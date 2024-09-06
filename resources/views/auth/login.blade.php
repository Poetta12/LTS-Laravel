<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')


@section('content')

    <div class="container">
        <h1>Sign In</h1>

        <form action="{{ route('auth.login') }}" method="POST" id="loginForm">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
            <div class="button">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            let valid = true;
            let email = document.getElementById('email').value;

            if (!validateEmail(email)) {
                alert('Merci de rentrer un email valide');
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
            }
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    </script>
@endsection


