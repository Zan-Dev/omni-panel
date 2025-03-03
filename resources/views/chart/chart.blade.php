<x-layout>        
    {{-- @dd($charts) --}}
    <div class="flex flex-wrap justify-center">
        @foreach ($charts as $chart )                    
        <div class="flex flex-grow justify-center max-w-full m-5 rounded-2xl bg-white shadow-2xl">            
            <div class="flex border m-4 bg-white rounded">
                {{-- <h2 class="text-xl text-black mb-2">{{ ucfirst($name) }}</h2> --}}
                {!! $chart->container() !!}
            </div>
        </div>               
        @endforeach    
    </div>

    <script src="{{ $charts[1]->cdn() }}"></script>
    @foreach ( $charts as $chart )
        {{ $chart->script() }}
    @endforeach
</x-layout>