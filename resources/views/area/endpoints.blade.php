<x-enlighten-main-layout>
    <x-slot name="title">{{ $area->name }}</x-slot>

    <div class="w-full my-4">
        @foreach($modules as $module)
            <div class="w-full divide-y divide-gray-300 bg-white rounded-lg overflow-hidden mb-8">
                <div class="w-full p-4 bg-gray-200">
                    <h2 class="text-gray-800 text-lg">{{ $module->name }}</h2>
                </div>
                @foreach($module->groups as $group)
                    <div class="w-full" x-data="{open: false}">
                        <div class="flex space-y-4 lg:space-y-0 justify-between p-2 md:p-4 hover:bg-gray-100"
                             x-bind:class="{ 'bg-gray-200': open }">
                            <div class="flex items-center w-full justify-between flex-col md:flex-row">
                                <div class="flex items-center w-full md:w-auto">
                                    <div class="flex space-x-2 items-start">
                                        <x-enlighten-status-badge :model="$group->mainRequest->example" size="6"></x-enlighten-status-badge>
                                    </div>
                                    <div class="flex space-x-2">
                                        <span class="px-2 flex items-center text-gray-700 bg-gray-200">
                                            {{ $group->method }}: {{ $group->route }}
                                        </span>
                                        <a href="{{ $group->mainRequest->example->url }}" class="py-3 md:py-0 md:px-4 text-gray-700 hover:text-teal-400">
                                            {{ $group->mainRequest->example->title }}
                                        </a>
                                    </div>
                                </div>
                                <span class="text-sm px-2 flex items-center text-{{ $group->mainRequest->getStatus() }}-700 bg-{{ $group->mainRequest->getStatus() }}-200">
                                    {{ $group->mainRequest->response_status }} {{ $group->mainRequest->response_type }}
                                </span>
                            </div>
                            <div class="w-12 flex justify-end">
                                @if($group->additionalRequests->isNotEmpty())
                                    <button type="button" x-on:click="open = !open" class="rounded-md focus:outline-none bg-gray-300 p-1">
                                        <svg x-cloak x-show="!open" class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        <svg  x-cloak x-show="open" class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                        @foreach ($group->additionalRequests as $additionalRequest)
                            <div x-cloak x-show="open" class="flex {{ $loop->first ? 'border-t' : '' }} {{ $loop->last ? '' : 'border-b' }} flex-col space-x-2 space-y-4 lg:space-y-0 lg:flex-row justify-between p-2 md:p-4 hover:bg-gray-100 border-l-8 border-gray-300">
                                <div class="flex items-center w-full md:w-auto">
                                    <div class="flex space-x-2 items-start">
                                        <x-enlighten-status-badge :model="$additionalRequest->example" size="6"></x-enlighten-status-badge>
                                    </div>
                                    <div class="flex space-x-2">
                                        <span class="text-sm px-2 flex items-center text-gray-700 bg-gray-200">
                                            {{ $additionalRequest->request_method }}: {{ $additionalRequest->route_or_path }}
                                        </span>
                                        <a href="{{ $additionalRequest->example->url }}" class="text-gray-700 px-2 w-full md:flex-1 hover:text-teal-400">
                                            {{ $additionalRequest->example->title }}
                                        </a>
                                    </div>
                                </div>
                                <div class="flex">
                                    <span class="text-sm px-2 flex items-center text-{{ $additionalRequest->getStatus() }}-700 bg-{{ $additionalRequest->getStatus() }}-200">
                                        {{ $additionalRequest->response_status }} {{ $additionalRequest->response_type }}
                                    </span>
                                    <span class="w-12"></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-enlighten-main-layout>


