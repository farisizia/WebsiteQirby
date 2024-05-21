

@extends('components.template.layout')
@section('judul')
    Data User
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('template/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endpush


@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/datauser.css')}}" />
<br>
<table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Id User</th>
            <th>Name User</th>
            <th>Phone User</th>
            <th>Email User</th>
            <th>Action User</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td>Robert Pattinson</td>
            <td>012789690</td>
            <td>userrobert@gmail.com</td>
            <td>
            <button type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#ModalEditProperty">Edit</button>
            <a href="#" class="btn btn-delete"> Delete</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Debi</td>
            <td>012789690</td>
            <td>userrobert@gmail.com</td>
            <td>
            <button type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#ModalEditProperty">Edit</button>
            <a href="#" class="btn btn-delete"> Delete</a>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Novianti</td>
            <td>012789690</td>
            <td>userrobert@gmail.com</td>
            <td>
              <button type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#ModalEditProperty">Edit</button>
              <a href="#" class="btn btn-delete"> Delete</a>
            </td>
          </tr>
          </tbody>
        </table>

        <div class="modal fade" id="ModalEditProperty" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fs-5" id="staticBackdropLabel">Data User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="userIdInput" class="form-label">ID User</label>
                                    <input type="text" class="form-control border border-dark" id="userIdInput" style="height: 40px; border-radius: 20px;">
                                </div>                    
                                <div class="mb-3">
                                    <label for="userNameInput" class="form-label">Name User</label>
                                    <input type="text" class="form-control border border-dark" id="userNameInput" style="height: 40px; border-radius: 20px;">
                                </div>
                                <div class="mb-3">
                                    <label for="userPhoneInput" class="form-label">Phone User</label>
                                    <input type="text" class="form-control border border-dark" id="userPhoneInput" style="height: 40px; border-radius: 20px;">
                                </div>
                                <div class="mb-3">
                                    <label for="userEmailInput" class="form-label">Email User</label>
                                    <input type="email" class="form-control border border-dark" id="userEmailInput" style="height: 40px; border-radius: 20px;">
                                </div>
                                <button type="submit" class="btn btn-edit">Edit Profile</button>
                            </form>
                      </div>
                </div>
         </div> 
@endsection

    