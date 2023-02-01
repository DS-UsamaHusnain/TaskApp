@extends('layouts.app')
@section('title')
    My Task App
@endsection
@section('content')
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="/"><span class="navbar-brand mb-0 h1">Todo</span></a>
            <a href="/create"><span class="btn btn-primary">Create Todo</span></a>
        </div>
    </nav>
    <div class=" mt-3 mb-3 mb-lg-4">
        <button type="button" id="delete" class="btn btn-danger ">Bulk Delete</button>
      </div>
    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <ul class="list-group" id="list">
                {{-- <li class="list-group-item"> <a href="details">task</a></li> --}}
            </ul>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            token = localStorage.getItem("token");
            if(token){
                $.ajax({
                    url: "http://localhost:8000/api/list-task",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    "Accept":"application/json",
                    'Authorization':'Bearer '+token
                    
                },
                }).then(function(data) {
                    // console.log(data);
                    $.each(data.tasks, function(k, v) {
                       
                        $('#list').append('<li class="list-group-item"><input type="checkbox" id="list_item" name="list_item" value="'+v.id+'" /> <a href="details">'+v.name+'</a></li>')
                    });
                });
             }
             else{
                alert("please login first");
                window.location.href="/login";
             }
    });
    </script>


<script>
    $(document).ready(function() {
        
        
        $('#delete').click(function() {
     
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = parseInt($(this).val());
        });
        console.log(val);
     $.ajax({
         url: "http://localhost:8000/api/delete-task",
         type:'POST',
         data: {"list_item":val},
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
               alert("Task Deleted Successfully");
               location.reload();
               
           }
           
            
             
         }
     })
});
         
         
});
</script>
@endsection
