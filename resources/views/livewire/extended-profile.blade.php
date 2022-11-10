<x-jet-form-section submit="updateExtendedProfile">
    <x-slot name="title">
        Расширенный профиль
    </x-slot>

    <x-slot name="description">
        Укажите более расширенную информацию о себе
    </x-slot>

    <x-slot name="form">

        <!-- Birthdate -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="bday" value="Дата рождения" />
            @include('livewire.parts.birthday')
        </div>

        <!-- Career -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="career" value="Должность" />
            <x-jet-input id="career" class="block mt-1 w-full" type="text" wire:model.defer="state.career" />
            <x-jet-input-error for="career" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>