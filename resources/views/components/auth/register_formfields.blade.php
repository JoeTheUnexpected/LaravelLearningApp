<x-input.group for="name_field" label="Имя" :error="$errors->first('name')">
    <x-input.text id="name_field" name="name" value="{{ old('name') }}" :error="$errors->first('name')"/>
</x-input.group>

<x-input.group for="email_field" label="Email" :error="$errors->first('email')">
    <x-input.email id="email_field" name="email" value="{{ old('email') }}" :error="$errors->first('email')"/>
</x-input.group>

<x-input.group for="password_field" label="Пароль" :error="$errors->first('password')">
    <x-input.password id="password_field" name="password" value="{{ old('password') }}" :error="$errors->first('password')"/>
</x-input.group>

<x-input.group for="password_confirmation_field" label="Подтверждение пароля" :error="$errors->first('password_confirmation ')">
    <x-input.password id="password_confirmation_field" name="password_confirmation" value="{{ old('password_confirmation ') }}" :error="$errors->first('password_confirmation')"/>
</x-input.group>
