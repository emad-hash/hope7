@extends('admin.index')

@section('content')

{{-- add Department Model --}}


  <!-- Signup Modal -->



  <form name="regForm" id="signUpForm" method="POST">

    @csrf

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Add New Department</h3>
            <hr>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">



            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="name" id="name" placeholder="name">
              <label for="name">Department Name</label>
            </div>



            <div class="form-floating mb-3">
              <input type="text" class="form-control"  name="description" id="description" placeholder="description...">
              <label for="description">Description</label>
            </div>

            <div class="form-floating">
              <input type="text"  class="form-control" name="members" id="members" placeholder="members">
              <label for="members">Members</label>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="signupformbtnname" style="border-radius: 5px; padding:5px;" id="Signupformbtn" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>

  </form>


  {{-- model end here --}}



  @if(session('mssg'))
  <div class="row justify-content-md-center py-3">
  <p class="alert alert-success text-center col-md-4">{{session ('mssg')}}</p>
  </div>
  @endif


<div class="d-flex justify-content-between m-3">
    <div class="h4" style="color: black">All Departments</div>
    <button type="button" class="btn btn-primary m-1 w-25 rounded-pill " data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Department</button>

</div>
<table class="table text-center table-hover">
    <thead style="color:#1D2A4D; ">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Department Name</th>
        <th scope="col">Description</th>
        <th scope="col">Members</th>
        <th scope="col">edit/delete</th>

    </tr>
    </thead>
    <tbody style="color:#354F8E">
    @foreach($allDepartments as $department)
       
        <tr>

            <td>{{$department->id}}</td>
            <td>{{$department->name}}</td>
            <td>{{$department->description}}</td>
            <td>{{$department->numberOfMembers}}</td>
             <td>  
                 <div>
                    <a class="fa-solid fa-user-pen me-2"  style="color:green" href="editDepartment/{{$department->id}}"></a>
                   <a class="fa-solid fa-trash"  style="color: red"  onclick="deleteDepartment(this,{{$department->id}})"></a>
                </div>
            </td>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

@endsection