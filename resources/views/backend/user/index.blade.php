<x-app-layout>
    <!-- Page Heading -->
    <h4 class="h4 mb-2 text-gray-800">Dashboard / Reports</h4>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="d-flex justify-content-between card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Totals Reports</h6>
            <a class="btn btn-primary" href="{{ route('reports.create') }}">Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Permission</th>
                            <th class="text-center">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name ?? '' }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    <form class="d-inline" method="POST"
                                        action="{{ route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-success">View</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-center" colspan="5">No records found</th>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
