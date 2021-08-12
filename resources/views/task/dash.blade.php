<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('tasks.search') }}" method="post">
                        @csrf
                        <div class="max-w-sm my-4 p-1 pr-0 flex items-center">
                            <input type="text" name="filter" id="filter" placeholder="Filter" class="flex-1 appearance-none rounded shadow p-3 text-grey-dark mr-2 focus:outline-none"/>
                            <button type="submit" class="uppercase p-3 rounded bg-blue-500 text-blue-50 max-w-max shadow-sm hover:shadow-lg">Search</button>
                        </div>
                    </form>
                    <table class="min-w-full bg-white">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Title</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Description</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Finish at</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Complete</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                        {{ $task->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                        {{ $task->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                        {{ $task->finish_at }}
                                    </td>
                                    <td class="px-10 py-4 whitespace-no-wrap border-b text-red-900 border-gray-500 text-sm leading-5">
                                        @if($task->finish)
                                            @svg('gmdi-check-circle-tt', 'w-6 text-green-500')
                                        @else
                                            @svg('gmdi-check-circle-tt', 'w-6 text-red-500')
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-right">
                                        <a href="{{ route('tasks.show', $task->id) }}" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Details</a>
                                        |
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="my-4">
                        @if(isset($fields))
                            {{ $tasks->appends($fields)->links() }}
                        @else
                            {{ $tasks->links() }}
                        @endif
                    </div>
                    @if(session('msg'))
                        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <div class="content position-ref">
                        <a href="{{ route('tasks.new') }}" class="my-4 uppercase px-8 py-2 rounded bg-green-600 text-blue-50 max-w-max shadow-sm hover:shadow-lg"> New Task </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



