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
                                <div class="card-header"><h1 class="text-center font-bold">Create New Task</h1></div>
                                <div class="card-body">
                                   <form action="{{ route('tasks.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="">Task Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status">Task Status:</label>
                                        <select class="form-control" name="status">
                                        <option value="pending">Pending</option>
                                        <option value="ongoing">Ongoing</option>
                                         <option value="completed">Completed</option>
                                         value="{{ old('status') }}"</select>
                                    </div>
                                    <button class="btn btn-success btn-sm" type="submit">Submit</button>
                                   </form>
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
