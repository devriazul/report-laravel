<x-app-layout>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12 pl-5 pr-5">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update a Report</h1>
                        </div>
                        <form class="user" action="{{ route('reports.update', $report->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                    placeholder="Name" value="{{ $report->name }}" name="name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Passport Number" value="{{ $report->passport }}" name="passport">
                                @error('passport')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputPhone"
                                    placeholder="Status">
                            </div> --}}
                            <div class="form-group">
                                <select class="form-control" name="status" id="">
                                    <option {{ $report->status == 'fit' ? 'selected' : '' }} value="fit">Fit</option>
                                    <option {{ $report->status == 'unfit' ? 'selected' : '' }} value="unfit">Unfit
                                    </option>
                                </select>

                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Report PDF file input</label>
                                <input type="hidden" name="path" value="{{ $report->path }}">
                                <input type="file" name="report" class="form-control-file"
                                    id="exampleFormControlFile1" accept="application/pdf">
                                @error('report')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit Report
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
