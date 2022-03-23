@props(['image' => false, 'video'=>false])
@if($video)
    <div style="-webkit-backdrop-filter: blur(10px);"
        class="backdrop-blur-xl bg-black/70
            h-full w-full fixed top-0 left-0 flex items-center justify-center shadow-lg overflow-y-auto"
            @click="isOpen=false"
            @keydown.escape.window="isOpen=false">

        <div class="lg:px-32 rounded-lg overflow-y-auto">
            <div class="bg-gray-900 rounded">
                <div class="flex justify-end pr-4 pt-2">
                    <button class="text-3xl leading-none hover:text-gray-300"
                    @click="isOpen = false">&times;</button>
                </div>
                <div class="">
                    <div class="p-8 overflow-hidden flex justify-center items-center h-100 w-100">
                        @if ($video)
                        {{ $video }}
                    @endif

                    </div>
                </div>


            </div>
        </div>
    </div>
@endif


@if ($image)

    <div style="-webkit-backdrop-filter: blur(10px);"
    class="backdrop-blur-xl bg-black/70
        h-full w-full fixed top-0 left-0 flex items-center justify-center shadow-lg overflow-y-auto"
        @click="isOpen=false"
        @keydown.escape.window="isOpen=false">

    <div  class="static z-50 lg:px-32 rounded-lg overflow-y-auto">
        <div class="bg-gray-900 rounded">
            <div class="flex justify-end pr-4 pt-4">
                <button class="text-3xl leading-none hover:text-gray-300"
                @click="isOpen = false">&times;</button>
            </div>
            <div class="">
                <div @click.stop class="p-8 overflow-hidden flex justify-center items-center h-100 w-100">
                    {{ $image }}
                </div>
            </div>


        </div>
    </div>
</div>
@endif
{{-- <div style="-webkit-backdrop-filter: blur(10px);"
    class="backdrop-blur-xl bg-black/70
        h-full w-full fixed top-0 left-0 flex items-center justify-center shadow-lg overflow-y-auto"
        @click="isOpen=false"
        @keydown.escape.window="isOpen=false">

    <div class="lg:px-32 rounded-lg overflow-y-auto">
        <div class="bg-gray-900 rounded">
            <div class="flex justify-end pr-4 pt-2">
                <button class="text-3xl leading-none hover:text-gray-300"
                @click="isOpen = false">&times;</button>
            </div>
            <div class="">
                <div class="p-8 overflow-hidden flex justify-center items-center h-100 w-100">
                    @if ($video)
                    {{ $video }}
                   @endif

                </div>
            </div>


        </div>
    </div>
</div> --}}
