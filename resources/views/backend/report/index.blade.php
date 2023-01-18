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
                            <th>Passport Number</th>
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $report)
                            <tr>
                                <td>{{ $report->name ?? '' }}</td>
                                <td>{{ $report->passport }}</td>
                                <td>{{ $report->status }}</td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                    <form class="d-inline" method="POST" action="{{ route('reports.destroy',$report->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('reports.show',$report->id) }}" class="btn btn-success">Download</button>
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
