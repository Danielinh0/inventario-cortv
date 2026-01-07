<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

            {{-- parte derecha del dashboard, carrsuel y cards --}}
            {{-- div con el laayout de la seccion derecha--}}
            <div class=
            "w-[100%] flex flex-col
            lg:w-[48%]">
                
                {{-- div del layout de los cards de demanda y menos demandado --}}
                <div class="flex gap-5 p-3 flex-col box-border
                xs:flex-row xs:gap-9 xs:mb-2.5 xs:p-[15px]  xs:justify-evenly
                md:gap-9 md:p-[15px] ">
                    @livewire('dashboard.dialog-dashboard', ['tipo' => 'demanda'])
                    @livewire('dashboard.dialog-dashboard',['tipo'=>'menos'])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
