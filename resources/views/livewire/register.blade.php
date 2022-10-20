<form method="POST" action="{{ route('register') }}" novalidate>
    @csrf

    <!-- Step 1 -->
    <div class="{{ $currentStep != 0 ? 'hidden' : '' }}">
        <div>
            <x-jet-input class="block mt-1 w-full" type="text" wire:model="first_name" 
                        placeholder="Имя" />
            @error('first_name')<span class="text-red-400">{{ $message }}</span>@enderror
        </div>

        <div class="mt-4">
            <x-jet-input class="block mt-1 w-full" type="text" wire:model="last_name" 
                        placeholder="Фамилия" />
            @error('last_name')<span class="text-red-400">{{ $message }}</span>@enderror
        </div>

        <select wire:model="gender" class="mt-4 border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm">
        <option value="">Пол</option>
        <option value="m">Мужчина</option>
        <option value="f">Женщина</option>
        </select>
        @error('gender')<div class="text-red-400">{{ $message }}</div>@enderror

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-jet-button class="ml-4" wire:click="next" type="button">Далее</x-jet-button>
        </div>
    </div><!-- ./ Step 1 -->

    <!-- Step 2 -->
    <div class="{{ $currentStep != 1 ? 'hidden' : '' }}">
        
        <div class="mt-4">
            <x-jet-input class="block mt-1 w-full" type="text" wire:model="username" 
                        placeholder="Логин" />
            @error('username')<span class="text-red-400">{{ $message }}</span>@enderror
        </div>

        <div class="mt-4">
            <x-jet-input class="block mt-1 w-full" type="email" wire:model="email" 
                        placeholder="Email" />
            @error('email')<span class="text-red-400">{{ $message }}</span>@enderror
        </div>

        <div class="mt-4">
            <x-jet-input class="block mt-1 w-full" type="password" wire:model="password" 
                    placeholder="Пароль" />
            @error('password')<span class="text-red-400">{{ $message }}</span>@enderror
        </div>

        <div class="mt-4">
            <x-jet-input class="block mt-1 w-full" type="password" wire:model="password_confirmation" 
                        placeholder="Подтвердить пароль" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox wire:model="terms" />

                        <div class="ml-2">
                            {!! __('Я согласен с :terms_of_service и :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4" type="button" wire:click.prevent="submitForm">
                {{  ('Register') }}
            </x-jet-button>
        </div>

        <button class="text-gray-600" type="button" wire:click="back">Назад</button>

    </div><!-- ./ Step 2 -->
</form>

