<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Nom-->
        <div class="mt-4">
            <x-input-label for="nom" :value="__('Nom')" />
            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>

        <!-- Prenom-->
        <div class="mt-4">
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!-- Telephone-->
        <div class="mt-4">
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required autofocus autocomplete="telephone" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>

        <!-- Pays-->
        <div class="mt-4">
            <x-input-label for="pays" :value="__('Pays')" />
            <x-text-input id="pays" class="block mt-1 w-full" type="text" name="pays" :value="old('pays')" required autofocus autocomplete="pays" />
            <x-input-error :messages="$errors->get('pays')" class="mt-2" />
        </div>

        <!-- Ville-->
        <div class="mt-4">
            <x-input-label for="ville" :value="__('Ville')" />
            <x-text-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="old('ville')" required autofocus autocomplete="ville" />
            <x-input-error :messages="$errors->get('ville')" class="mt-2" />
        </div>

        <!-- Sexe-->
        <div class="mt-4">
            <x-input-label for="sexe" :value="__('Sexe')" />
            <x-text-input id="sexe" class="block mt-1 w-full" type="text" name="sexe" :value="old('sexe')" required autofocus autocomplete="sexe" />
            <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
        </div>

        <!-- Date de naissance-->
        <div class="mt-4">
            <x-input-label for="date_naissance" :value="__('Date_naissance')" />
            <x-text-input id="date_naissance" class="block mt-1 w-full" type="text" name="date_naissance" :value="old('date_naissance')" required autofocus autocomplete="date_naissance" />
            <x-input-error :messages="$errors->get('date_naissance')" class="mt-2" />
        </div>

        <!-- Pole-->
        <div class="mt-4">
            <x-input-label for="pole" :value="__('Pole')" />
            <x-text-input id="pole" class="block mt-1 w-full" type="text" name="pole" :value="old('pole')" required autofocus autocomplete="pole" />
            <x-input-error :messages="$errors->get('pole')" class="mt-2" />
        </div>

        <!-- URL Photo-->
        <div class="mt-4">
            <x-input-label for="url_photo" :value="__('Url_photo')" />
            <x-text-input id="url_photo" class="block mt-1 w-full" type="text" name="url_photo" :value="old('url_photo')" required autofocus autocomplete="url_photo" />
            <x-input-error :messages="$errors->get('url_photo')" class="mt-2" />

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
