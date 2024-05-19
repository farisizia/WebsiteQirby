@extends('components.template.layout')
@section('judul')
    Property Management
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>
@endpush

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/management.css') }}" />
    <main class="main users chart-page" id="skip-target">
        <div class="container">

            <!-- Alert -->
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-add_property" data-bs-toggle="modal"
                    data-bs-target="#ModalAddProperty">Add Property</button>
            </div>
            <table id="properties" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name Property</th>
                        <th>Image Property</th>
                        <th>Cost Property</th>
                        <th>Status Property</th>
                        <th>Action Property</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($property as $properties)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $properties->name }}</td>
                            <td>
                                {{-- <img src="{{asset('storage/images_property/' . $properties->image)}}" width="50%"> --}}
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#ModalImageProperty{{ $properties->id }}" style="width:30">Lihat
                                    Foto
                                </button>
                                {{-- <img src="{{asset('images_property/' . $properties->image)}}" width="50%"> --}}
                                {{-- <img src="{{asset('/public/images_property/HegeobLjbuhiro.jpg')}}"> --}}
                            </td>
                            <td>{{ $properties->price }}</td>
                            <td>{{ $properties->status }}</td>
                            <td>
                                <button type="button" class="btn btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#ModalEditProperty{{ $properties->id }}" style="width:30">Edit
                                </button>
                                <form method="post" action="{{ route('property.deleted', $properties->id) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="confirmBox()">
                                        Delete
                                    </button>
                                </form>
                                <!-- <a href="#" class="btn btn-delete">Delete</a> -->
                            </td>
                            <script>
                                function confirmBox() {
                                    if (confirm('Do you want to delete this property?')) {
                                        window.location.href = "{{ route('property.deleted', $properties->id) }}"
                                    }
                                }
                            </script>
                        </tr>

                        <!-- Edit Property -->
                        <div class="modal fade" id="ModalEditProperty{{ $properties->id }}" tabindex="-1"
                            aria-labelledby="ModalLabel{{ $properties->id }}" aria-hidden="true">
                            <div class="modal-dialog" style="top:0;">
                                <div class="modal-content">
                                    {{-- Alert Here --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="staticBackdropLabel{{ $properties->id }}">Edit
                                            Property</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" method="POST"
                                            action="{{ route('property.update', $properties->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <!-- Your form content here -->
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Upload Image</label>
                                                <input type="file" style="padding:0;height: 30px;"
                                                    class="form-control border-dark" id="formFile" name="image[]"
                                                    accept="image/*" onchange="showFileName()" multiple>
                                                <small id="fileHelp" class="form-text text-muted">No file chosen</small>
                                            </div>
                                            <script>
                                                function showFileName() {
                                                    var input = document.getElementById('formFile');
                                                    var fileHelp = document.getElementById('fileHelp');
                                                    if (input.files.length > 0) {
                                                        fileHelp.textContent = 'File chosen: ' + input.files[0].name;
                                                    } else {
                                                        fileHelp.textContent = 'No file chosen';
                                                    }
                                                }
                                            </script>
                                            {{-- Existing Images Section (Add this) --}}
                                            <div class="existing-images">
                                                @foreach ($images as $image)
                                                    @if ($properties->id == $image->property_id)
                                                        <div class="existing-image-item">
                                                            <img src="{{ asset('storage/images_property/' . $image->image) }}"
                                                                alt="Existing Image" width="100">
                                                            <button type="button"
                                                                class="btn btn-danger remove-existing-image"
                                                                data-image-id="{{ $image->id }}">
                                                                Remove
                                                            </button>
                                                            <input type="hidden" name="existing_images[]"
                                                                value="{{ $image->id }}">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control border border-dark"
                                                    placeholder="Name Property" name="name"
                                                    value="{{ $properties->name }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                                <input type="text" class="form-control border border-dark"
                                                    placeholder="Cost" aria-describedby="basic-addon1" name="price"
                                                    value="{{ $properties->price }}">
                                            </div>
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select border border-dark mb-3" aria-label="Status"
                                                name="status">
                                                <option value="1">Ready</option>
                                                <option value="2">Pending</option>
                                                <option value="3">Sold</option>
                                            </select>
                                            <div class="mb-3">
                                                <textarea class="form-control border border-dark" placeholder="Alamat" rows="3" name="address">{{ $properties->address }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control border border-dark" placeholder="Deskripsi" rows="3" name="description">{{ $properties->description }}</textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="inputPassword5" class="form-label">sqft</label>
                                                    <input type="number" class="form-control border border-dark"
                                                        id="inputnumber" aria-describedby="inputsqft" name="sqft"
                                                        value="{{ $properties->sqft }}">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="status3" class="form-label text-start">garage</label>
                                                    <input type="number" class="form-control border border-dark"
                                                        id="inputgarage" aria-describedby="inputgarage" name="garage"
                                                        value="{{ $properties->garage }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="status3" class="form-label text-start">bed</label>
                                                    <input type="number" class="form-control border border-dark"
                                                        id="inputbed" aria-describedby="inputbed" name="bed"
                                                        value="{{ $properties->bed }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="status3" class="form-label text-start">bath</label>
                                                    <input type="number" class="form-control border border-dark"
                                                        id="inputbath" aria-describedby="inputbath" name="bath"
                                                        value="{{ $properties->bath }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="status3" class="form-label text-start">floor</label>
                                                    <input type="number" class="form-control border border-dark"
                                                        id="inputfloor" aria-describedby="inputfloor" name="floor"
                                                        value="{{ $properties->floor }}">
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- modal lihat image --}}
                        <div class="modal fade" id="ModalImageProperty{{ $properties->id }}" tabindex="-1"
                            aria-labelledby="ModalLabel{{ $properties->id }}" aria-hidden="true">
                            <div class="modal-dialog" style="top:0;">
                                <div class="modal-content">
                                    {{-- Alert Here --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="staticBackdropLabel{{ $properties->id }}">Edit
                                            Property</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            @foreach ($images as $image)
                                                @if ($properties->id == $image->property_id)
                                                    <div class="col-md-3">
                                                        <div class="card text-white bg-secondary mb-3">
                                                            <img class="d-block w-100 gallery-item"
                                                                src="{{ asset('storage/images_property/' . $image->image) }}"
                                                                alt="slide">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>

            <script>
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-existing-image')) {
                        if (confirm('Are you sure you want to delete this image?')) {
                            const imageId = e.target.dataset.imageId;
                            fetch(`/property/images/${imageId}`, {
                                    method: 'DELETE'
                                })
                                .then(response => {
                                    if (response.ok) {
                                        e.target.closest('.existing-image-item').remove();
                                    } else {
                                        alert('Error deleting image. Please try again.'); // Menampilkan pesan kesalahan
                                    }
                                });
                        }
                    }
                });
            </script>
        </div>

        <!-- Create Property -->
        <div class="modal fade" id="ModalAddProperty" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="top:0;">
                <div class="modal-content">
                    {{-- Alert Here --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="modal-header">

                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Property</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('property.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Image</label>
                                <input type="file" style="padding:0;height: 30px;" class="form-control border-dark"
                                    id="formFile" name="images[]" accept="image/*" onchange="showFileName()" multiple>
                                <small id="fileHelp" class="form-text text-muted">No file chosen</small>
                            </div>
                            <script>
                                function showFileName() {
                                    var input = document.getElementById('formFile');
                                    var fileHelp = document.getElementById('fileHelp');
                                    if (input.files.length > 0) {
                                        fileHelp.textContent = 'File chosen: ' + input.files[0].name;
                                    } else {
                                        fileHelp.textContent = 'No file chosen';
                                    }
                                }
                            </script>
                            <div class="mb-3">
                                <input type="text" class="form-control border border-dark" placeholder="Name Property"
                                    name="name">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                <input type="text" class="form-control border border-dark" placeholder="Cost"
                                    aria-describedby="basic-addon1" name="price">
                            </div>
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select border border-dark mb-3" aria-label="Status" name="status">
                                <option value="1">Ready</option>
                                <option value="2">Pending</option>
                                <option value="3">Sold</option>
                            </select>
                            <div class="mb-3">
                                <textarea class="form-control border border-dark" placeholder="Alamat" rows="3" name="address"></textarea>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control border border-dark" placeholder="Deskripsi" rows="3" name="description"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputPassword5" class="form-label">sqft</label>
                                    <input type="number" class="form-control border border-dark" id="inputnumber"
                                        aria-describedby="inputsqft" name="sqft">
                                </div>

                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">garage</label>
                                    <input type="number" class="form-control border border-dark" id="inputgarage"
                                        aria-describedby="inputgarage" name="garage">
                                </div>
                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">bed</label>
                                    <input type="number" class="form-control border border-dark" id="inputbed"
                                        aria-describedby="inputbed" name="bed">
                                </div>
                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">bath</label>
                                    <input type="number" class="form-control border border-dark" id="inputbath"
                                        aria-describedby="inputbath" name="bath">
                                </div>
                                <div class="col-md-4">
                                    <label for="status3" class="form-label text-start">floor</label>
                                    <input type="number" class="form-control border border-dark" id="inputfloor"
                                        aria-describedby="inputfloor" name="floor">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="" class="modal-img w-100" alt="modal img">
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("click", function(e) {
                if (e.target.classList.contains("gallery-item")) {
                    const src = e.target.getAttribute("src");
                    document.querySelector(".modal-img").src = src;
                    const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
                    myModal.show();
                }
            })
        </script>
    @endsection
