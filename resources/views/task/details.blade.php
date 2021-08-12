<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
                        <ul>
                            <li><strong>Title: </strong>{{ $task->title }}</li>
                            <li><strong>Description: </strong>{{ $task->description }}</li>
                            <li><strong>Finish at: </strong>{{ $task->finish_at }}</li>
                            @if($task->finish)
                                <li><strong>Task Complete: </strong>{{ $task->finish_at }}</li>
                            @endif
                        </ul>
                        <form action="{{ route('tasks.delete', $task->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit"
                                    class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red-500 shadow-lg focus:outline-none hover:bg-red-900 hover:shadow-none">
                                Delete
                            </button>
                        </form>
                        <form action="{{ route('tasks.completed', $task->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit"
                                    class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-green-500 shadow-lg focus:outline-none hover:bg-green-900 hover:shadow-none">
                                Complete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



