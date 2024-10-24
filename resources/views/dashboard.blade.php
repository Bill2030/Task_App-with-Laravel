<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"><h1 class="text-center font-bold">Task Lists</h1></div>
                                <div class="card-body">
                                    <a class="btn btn-info btn-sm text-white" href="{{ route('tasks.create') }}">Add Task</a>
                                    <h1 class="text-start">completed Tasks</h1>
                                    <table class="table table-fixed">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Task Name</th>
                                                <th>Task Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($completedTasks as $task)
                                                <tr>
                                                    <td>{{ $task->id }}</td>
                                                    <td style="text-decoration: line-through;text-decoration-color: red;">
                                                        {{ $task->name }}</td>
                                                    <td>{{ $task->status }}</td>
                                                    <td>
                                                    <div class="btn-group">
                                                    <a class="btn btn-success btn-sm" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <h1 class="text-start">Pending Tasks</h1>
                                    <table class="table table-fixed">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Task Name</th>
                                                <th>Task Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendingTasks as $task)
                                            <tr>
                                            <td>{{ $task->id }}</td>
                                            <td>{{ $task->name }}</td>
                                            <td>{{ $task->status }}</td>
                                            <td>
                                                <div class="btn-group">
                                                <a class="btn btn-success btn-sm" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <h1 class="text-start">Ongoing Tasks</h1>
                                    <table class="table table-fixed">
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Task Name</th>
                                            <th>Task Status</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ongoingTasks as $task)
                                                <tr>
                                                <td>{{ $task->id }}</td>
                                                <td>{{ $task->name }}</td>
                                                <td>{{ $task->status }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-success btn-sm" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
