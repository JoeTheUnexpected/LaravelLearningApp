<x-input.group for="email_field" label="Email" :error="$errors->first('email')">
    <x-input.email id="email_field" name="email" value="{{ old('email') }}" :error="$errors->first('email')"/>
</x-input.group>

<x-input.group for="password_field" label="Пароль" :error="$errors->first('password')">
    <x-input.password id="password_field" name="password" value="{{ old('password') }}" :error="$errors->first('password')"/>
</x-input.group>

<x-input.checkbox name="remember" label="Запомнить меня" checked="{{ old('remember') ? 'checked' : '' }}"/>
