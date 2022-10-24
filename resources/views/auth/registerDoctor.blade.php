@extends('layout')
@php

    use App\Models\departments;
        $Department = departments::all();

@endphp
@section('content')

    <x-guest-layout>

        <x-auth-card>
            <x-slot name="logo">
                <div class="h3">Register as Doctor</div>
            </x-slot>

            <form method="POST" action="{{ route('storeDoc') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')"/>

                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                  required autofocus/>

                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')"/>

                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                  required/>

                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>


                <div class="mt-4">
                    <x-input-label for="image" :value="__('image')"/>

                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"
                                  required/>

                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                </div>


                <div class="mt-4">
                    <x-input-label for="certificate" :value="__('certificate')"/>

                    <x-text-input id="certificate" class="block mt-1 w-full" type="file" name="certificate"
                                  :value="old('certificate')" required/>

                    <x-input-error :messages="$errors->get('certificate')" class="mt-2"/>
                </div>


                <div class="mt-4">
                    <x-input-label for="available_time" :value="__('available_time')"/>

                    <x-text-input id="available_time" class="block mt-1 w-full" type="date" name="available_time"
                                  :value="old('available_time')" required/>

                    <x-input-error :messages="$errors->get('available_time')" class="mt-2"/>
                </div>

                <div class="mt-4">
                    <label for="Availability">Choose Department</label>
                    <select class="block mt-1 w-full" id="Availability" name="department" style="height: 55px;" required>
                        @foreach($Department as $availability)

                            <option value="{{$availability->id}}">
                                {{$availability->name}}
                            </option>

                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-input-label for="overview" :value="__('overview')"/>

                    <textarea id="overview" class="block mt-1 w-full" type="date" name="overview" required>

                    </textarea>

                    <x-input-error :messages="$errors->get('overview')" class="mt-2"/>
                </div>


                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')"/>

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation" required/>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
@endsection
