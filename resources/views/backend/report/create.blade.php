<x-app-layout>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12 pl-5 pr-5">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create a Report</h1>
                        </div>
                        <form class="user">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                    placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Passport Number">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputPhone"
                                    placeholder="Status">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="" id="">
                                    <option value="">Fit</option>
                                    <option value="">Unfit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Report PDF file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <a href="index.html" class="btn btn-primary btn-user btn-block">
                                Submit Report
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
