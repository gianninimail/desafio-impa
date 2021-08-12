<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Task') }}
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 bg-white border-b border-gray-200">
                    <div class="w-11/12 p-1 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
                        <form action="{{ route('tasks.store') }}" method="post">
                            {{-- <input type="text" name="_token" value="{{ csrf_token() }}" />--}}
                            @csrf
                            <label for="title">Title</label>
                            <br />
                            <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}"
                                   class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"/>
                            <br />
                            <label for="description">Description</label>
                            <br />
                            <textarea name="description" id="description" cols="50" rows="5" placeholder="Description"
                                  class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">{{ old('description') }}
                            </textarea>
                            <br />
                            <input type="hidden" name="finish" id="finish" value="0" />
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
                            <label for="finish_at">Finish at</label>
                            <br />
                            <input type="datetime-local" name="finish_at"  id="finish_at" pattern="MM-DD-YYYY HH:mm"/>
                            <br />
                            <br />
                            <br />
                            <button type="submit"
                                    class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="content position-ref validation">
                    @if($errors->any())
                        <ul class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
