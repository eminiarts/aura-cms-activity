<div class="px-4">

<div class="flex items-center justify-between w-full p-2">
    <div class="">
        <h3 class="mb-4 text-lg font-semibold text-black dark:text-white">
            Aktivität
        </h3>
    </div>
</div>

@if ($this->model->activities->count() > 0)
    <div class="relative m-4 w-full">

        <!-- Vertical timeline line -->
        <div class="absolute h-full border-l-2 border-gray-300 left-4 top-0"></div>

        @foreach ($this->model->activities()->latest()->get() as $key => $activity)
            <div class="relative flex-1 mb-8 w-full">

                <!-- Circle indicating an event on the timeline -->
                <div
                    class="absolute bg-gray-500 rounded-full h-8 w-8 text-white text-xs font-semibold flex items-center left-0 top-1/2 transform -translate-y-1/2">
                    <span class="mx-auto">
                        {{ count($this->model->activities) - $key }}
                    </span>
                </div>

                <!-- Activity card -->
                <div class="w-full pl-10">

                    <div class="bg-white p-4 rounded shadow-lg hover:shadow-xl border-1 border-gray-200">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-sm text-gray-500 flex-1">{{ __($this->model->getType()) }} {{ __($activity->description) }}</h3>
                            <div class="flex text-gray-600 text-sm space-x-4">
                                <x-aura::tippy text="{{ $activity->created_at->format('d.m.Y H:i') }}">
                                    {{ $activity->created_at->diffForHumans() }}
                                </x-aura::tippy>

                                <div class="flex justify-end">
                                    <p class="">
                                        bearbeitet von: {{ $activity->causer ? $activity->causer->name : 'System' }}
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div>
                            {{ $activity->getExtraProperty('message') }}
                        </div>



                        <!-- Display properties that have changed -->
                        @if (isset($activity->properties['old']) && isset($activity->properties['attributes']))
                            @foreach ($activity->properties['old'] as $propertyKey => $oldPropertyValue)
                                @if (isset($activity->properties['attributes'][$propertyKey]))
                                    @if (is_array($oldPropertyValue))
                                        @foreach ($oldPropertyValue as $key => $oldValue)
                                            @php
                                                $newValue = $activity->properties['attributes'][$propertyKey][$key] ?? null;
                                                $encodedOldValue = is_array($oldValue) ? json_encode($oldValue) : $oldValue;
                                            @endphp

                                            @if ($newValue !== null && ($encodedOldValue !== $newValue && $oldValue !== $newValue))
                                                <div class="flex items-center mb-1 space-x-2">
                                                    <!-- Key label -->
                                                    <span class="font-semibold">{{ __($key) }}
                                                        ({{ __($propertyKey) }})
                                                        :</span>

                                                    <!-- Old Value with Red background -->
                                                    <div class="flex items-center px-2 py-1 bg-red-200 rounded">
                                                        <span class="text-red-700 text-sm">-</span>
                                                        <span class="ml-1">{{ $encodedOldValue }}</span>
                                                    </div>

                                                    <!-- New Value with Green background -->
                                                    <div class="flex items-center px-2 py-1 bg-green-200 rounded">
                                                        <span class="text-green-700 text-sm">+</span>
                                                        <span class="ml-1">
                                                            @if (is_array($newValue))
                                                                {{ json_encode($newValue) }}
                                                            @else
                                                                {{ $newValue }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        @php
                                            $newValue = $activity->properties['attributes'][$propertyKey] ?? null;
                                        @endphp

                                        @if ($newValue !== null && $oldPropertyValue !== $newValue)
                                            <div class="flex items-center mb-1 space-x-2">
                                                <!-- Key label -->
                                                <span class="font-semibold">{{ __($propertyKey) }}:</span>

                                                <!-- Old Value with Red background -->
                                                <div class="flex items-center px-2 py-1 bg-red-200 rounded">
                                                    <span class="text-red-700 text-sm">-</span>
                                                    <span class="ml-1">{{ $oldPropertyValue }}</span>
                                                </div>

                                                <!-- New Value with Green background -->
                                                <div class="flex items-center px-2 py-1 bg-green-200 rounded">
                                                    <span class="text-green-700 text-sm">+</span>
                                                    <span class="ml-1">
                                                        @if (is_array($newValue))
                                                            {{ json_encode($newValue) }}
                                                        @else
                                                            {{ $newValue }}
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endif







                    </div>

                </div>

            </div>
        @endforeach

    </div>
@else
    <div class="p-6 text-gray-500">
        No activities found.
    </div>
@endif

</div>