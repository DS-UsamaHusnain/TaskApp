@extends('layouts.app')
@section('title')
    My Task App
@endsection
@section('content')
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="/"><span class="navbar-brand mb-0 h1">Todo</span></a>
        </div>
    </nav>

    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <form class="mx-1 mx-md-4" id="task" method="post">
  
                    
  
                <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c">Task Name</label>
                    <input type="text" id="name" name="name" class="form-control"  />
                    
                  </div>
                </div>
                <div class=" mx-4 mb-3 mb-lg-4">
                    <button type="button" id="sub" class="btn btn-primary ">Submit</button>
                  </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            
            token = localStorage.getItem("token");
            if(!token){
                alert("please login first");
                window.location.href="/login";
            }
            $('#sub').click(function() {
         
            var name = $('#name').val();
         
         $.ajax({
             url: "http://localhost:8000/api/create-task",
             type:'POST',
             data: {"name":name},
             headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    "Accept":"application/json",
                    'Authorization':'Bearer '+token
                    // "My-Second-Header":"second value"
                },
             success: function (data) {
               if(data.message){
                   alert(data.message);
               }
               else{
                   alert("New Task Created Successfully");
                   window.location.href = "/list-tasks";
                   
               }
               
                
                 
             }
         })
 });
             
             
    });
    </script>
@endsection
