@extends('components.template.layout')
@section('judul')
    Schedule
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
<link rel="stylesheet" href="{{ asset('assets/css/schedule.css')}}" />
<table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID Property</th>
            <th>Name User</th>
            <th>Phone User</th>
            <th>Date Schedule</th>
            <th>Time Schedule</th>
            <th>PIC</th>
            <th>Note</th>
            <th>Status Schedule</th>
            <th>Action User</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>P-01</td>
            <td>Robert Pattinson</td>
            <td>012789690</td>
            <td>2024-04-25</td>
            <td>10:00 </td>
            <td>PIC </td>
            <td>Note </td>
            <td>Accept </td>
            <td>
            <button type="button" class="btn btn-detail" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button>
            <a href="#" class="btn btn-delete"> Delete</a>
            </td>
          </tr>
          <tr>
            <td>P-02</td>
            <td>Debi</td>
            <td>012789690</td>
            <td>2024-05-25</td>
            <td>10:00 </td>
            <td>PIC </td>
            <td>Note </td>
            <td>Accept </td>
            <td>
            <button type="button" class="btn btn-detail" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button>
            <a href="#" class="btn btn-delete"> Delete</a>
            </td>
          </tr>
          </tbody>
        </table>

        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                  <h1 style="text-align: center;">P-01</h1>
                  <h1 style="text-align: center;">Rumah Jakarta Selatan</h1><br /><br />

                    <form>
                          <div class="mb-3">
                            <label style="font-weight:bold; padding-right: 20px; ">Name  </label>
                            <label style="padding-left: 50px;">:</label>
                            <label >Robert Pattinson</label>
                          </div>
                          <div class="mb-3">
                            <label style="font-weight:bold">Phone Number : </label>
                            <label for="validationDefault01">012789690</label>
                          </div>
                          <div class="mb-3">
                            <label style="font-weight:bold">Data Schedule : </label>
                            <label for="validationDefault01">2024-04-25</label>
                          </div>
                          <div class="mb-3">
                            <label style="font-weight:bold">Time Schedule : </label>
                            <label for="validationDefault01">10:00</label>
                          </div>
                          <div class="mb-3">
                            <label style="font-weight:bold">PIC : </label>
                            <input type="text" class="form-control border border-dark"  name="PIC">
                          </div>
                          <div class="mb-3">
                            <label style="font-weight:bold">Alamat : </label>
                            <textarea class="form-control border border-dark"  rows="3" name="address"></textarea>
                          </div>
                          <button type="submit" class="btn btn-detail">Accept</button>
                          <button type="submit" class="btn btn-delete">Decline</button>
                    </form>
                </div>
              </div>
            </div>
        </div>  
@endsection

    