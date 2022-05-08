<!-- @php echo Crypt::decrypt(request()->segment(3)) @endphp -->
@extends('admin.layout.index')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Author</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Author Name</a></li>
            </ol>
        </div>
        <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Horizontal Form</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="1234 Main St">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Pen Name</label>
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Biography</label>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label>Achievements</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label>Facebook Link</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label>Instagram Link</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label>Twitter Link</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Cover Photo</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control">
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Photo</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">State</label>
                                    <select id="inputState" class="default-select form-control wide">
                                        <option selected>Choose...</option>
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection