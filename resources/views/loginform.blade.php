<div class="cd-user-modal">
    <!-- this is the entire modal form, including the background -->
    <div class="cd-user-modal-container" style="margin-top: 18%">
        <!-- this is the container wrapper -->
        <ul class="cd-switcher">
            <li><a href="#0">Sign in</a></li>
            <li><a href="#0">New account</a></li>
        </ul>

        <div id="cd-login">
            <!-- log in form -->
            <form method="POST" class="cd-form" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Username</label>
                        <x-text-input id="emailLogin" placeholder="Email"
                                      class="block mt-1 w-full full-width has-padding has-border" type="email"
                                      name="email" :value="old('email')" required autofocus/>

                        <x-input-error :messages="$errors->get('email')" class="mt-2 cd-error-message"/>
                    </p>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <p class="fieldset">

                        <label class="image-replace cd-password" for="signup-password">Password</label>

                        <x-text-input id="passwordLogin" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password"
                                      class="block mt-1 w-full full-width has-padding has-border"
                                      placeholder="Password"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </p>

                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <p class="fieldset">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    <p></p>
                </div>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Login">
                </p>
            </form>

            <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div> <!-- cd-login -->

        <div id="cd-signup">
            <!-- sign up form -->
            <form method="POST" class="cd-form" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <span style="color:red" id="NameErr">* </span>
                    <x-text-input id="name" class="full-width has-padding has-border " type="text" name="name"
                                  :value="old('name')" required autofocus/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')"/>
                    {{-- <span style="color:red" id="NameErr">* </span>      --}}
                    <x-text-input id="email" class="full-width has-padding has-border" type="email" name="email"
                                  :value="old('email')" required/>

                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')"/>
                    <span style="color:red" id="spanPassword">* </span>
                    <x-text-input id="password" class="full-width has-padding has-border"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
                    <span style="color:red" id="spanCPassword">* </span>
                    <x-text-input id="password_confirmation" class="full-width has-padding has-border"
                                  type="password"
                                  name="password_confirmation" required/>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a> --}}

                    <x-primary-button class="ml-4" style="background-color:#2f889a; width:100%">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div> <!-- cd-signup -->

        <a href="#0" class="cd-close-form">Close</a>
    </div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->


<script src="{{asset('js/validation.js')}}"></script>
