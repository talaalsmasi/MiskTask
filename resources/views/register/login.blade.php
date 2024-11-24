@extends('layouts.index')
@section('content')
<body><br><br><br><br><br><br><br><br>
    <div class="login-wrap">
        <div class="login-html">
            <!-- Tabs -->
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab">Sign In</label>

            <input id="tab-2" type="radio" name="tab" class="sign-up">
            <label for="tab-2" class="tab">Sign Up</label>

            <div class="login-form">
                <!-- Sign In Form -->
                <form action="{{ route('login') }}" method="POST" class="sign-in-htm">
                    @csrf
                    <div class="group">
                        <label for="login-email" class="label">Email</label>
                        <input id="login-email" type="email" name="email" class="input" required>
                    </div>
                    <div class="group">
                        <label for="login-password" class="label">Password</label>
                        <input id="login-password" type="password" name="password" class="input" required>
                    </div>

                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    <div class="hr"></div>

                </form>

                <!-- Sign Up as Buyer Form -->
                <form action="{{ route('BuyerRegister') }}" method="POST" class="sign-up-htm">
                    @csrf
                    <div class="group">
                        <label for="buyer-name" class="label">Username</label>
                        <input id="buyer-name" type="text" name="name" class="input" required>
                    </div>
                    <div class="group">
                        <label for="buyer-email" class="label">Email Address</label>
                        <input id="buyer-email" type="email" name="email" class="input" required>
                    </div>
                    <div class="group">
                        <label for="buyer-phone" class="label">Phone Number</label>
                        <input id="buyer-phone" type="text" name="phone_number" class="input" required>
                    </div>
                    <div class="group">
                        <label for="buyer-password" class="label">Password</label>
                        <input id="buyer-password" type="password" name="password" class="input" required>
                    </div>
                    <div class="group">
                        <label for="buyer-password-confirm" class="label">Repeat Password</label>
                        <input id="buyer-password-confirm" type="password" name="password_confirmation" class="input" required>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up as Buyer">
                    </div>
                    <div class="foot-lnk">
                        <label ><a href="{{route('Sellerregister')}}">Sign up as a seller</a></label>
                    </div>
                </form>
            </div>
        </div>
    </div><br><br><br>
@endsection
