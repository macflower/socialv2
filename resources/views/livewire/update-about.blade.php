<x-jet-form-section submit="updateAbout">
    <x-slot name="title">
        О себе
    </x-slot>

    <x-slot name="description">
        Напишите краткую информацию о себе
    </x-slot>

    <!-- About -->
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="about" value="О себе" />
            <textarea id="about" class="h-24 block w-full resize-none border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400 focus:border-blue-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                      wire:model.defer="state.about" autocomplete="about"></textarea>
            <x-jet-input-error for="about" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{  __('Saved.')  }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{  __('Save')  }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
