<select wire:model.defer="state.bday" id="bday" class="mt-4 border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400 focus:border-blue-300 focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm">
    <option value="">День</option>
    @for ($day = 1; $day <= 31; $day++)
        <option value="{{ sprintf("%02d", $day) }}">{{ $day }}</option>
    @endfor
</select>
<x-jet-input-error for="bday" class="mt-2" />

<select wire:model.defer="state.bmonth" class="mt-4 border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400 focus:border-blue-300 focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm">
    <option value="">Месяц</option>
    <option value="01">Января</option>
    <option value="02">Февраля</option>
    <option value="03">Марта</option>
    <option value="04">Апреля</option>
    <option value="05">Мая</option>
    <option value="06">Июня</option>
    <option value="07">Июля</option>
    <option value="08">Августа</option>
    <option value="09">Сентября</option>
    <option value="10">Октября</option>
    <option value="11">Ноября</option>
    <option value="12">Декабря</option>
</select>
<x-jet-input-error for="bmonth" class="mt-2" />

<select wire:model.defer="state.byear" class="mt-4 border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400 focus:border-blue-300 focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm">
    <option value="">Год</option>
    @for ($year = 2005; $year >= 1902; $year--)
        <option value="{{ $year }}">{{ $year }}</option>
    @endfor
</select>
<x-jet-input-error for="byear" class="mt-2" />