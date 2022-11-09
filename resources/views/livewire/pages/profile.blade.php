<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-50 leading-tight">
            {{ $user->full_name }}
        </h2>
    </x-slot>

    <div class="py-6 dark:bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

            <section class="text-gray-600 body-font">
                <div class="container px-5 py-12 mx-auto flex flex-col">
                    <div class="lg:w-4/6 mx-auto">
                        <div class="flex flex-col sm:flex-row mt-10 text-gray-400 text-base">
                            <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                                <div class="w-40 h-40 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->full_name }}" class="rounded-full h-40 w-40 object-cover border">
                                </div>
                                <div class="flex flex-col items-center text-center justify-center">
                                    <h2 class="font-medium title-font mt-4 text-gray-900 dark:text-gray-50 text-lg">{{ $user->full_name }}</h2>
                                    <div class="w-12 h-1 bg-blue-500 rounded mt-2 mb-4"></div>
                                    <p class="text-base">
                                        {{ $user->about }}

                                    @empty ($user->about)   
                                        Пользователь ничего не написал о себе.
                                    @endempty
                                    </p>
                                </div>
                            </div>
                            <div class="sm:w-2/3 sm:pl-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 sm:mt-0 text-center sm:text-left">
                                <p class="leading-relaxed">Пол:
                                    @if ($user->gender === 'm')
                                        Мужчина
                                    @elseif ($user->gender === 'f')
                                        Женщина
                                    @else
                                        Не указано
                                    @endif
                                </p>
                                <p class="leading-relaxed">Возраст: 
                                    {{ $user->getAge() }}

                                    @empty ($user->birthday)
                                        Не указано
                                    @endempty
                                </p>
                                <p class="leading-relaxed">Должность: 
                                    {{ $user->career }}

                                    @empty ($user->career)
                                        Не указано
                                    @endempty
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>
        </div>
    </div>
</x-app-layout>