@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>
  
                  <form class="mx-1 mx-md-4" id="loginForm" method="post">
  
                    
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" id="email" name="email" class="form-control"  />
                        
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" id="password" name="password" class="form-control" />
                        <label>If not have any account please click to <a href="/register">sign up</a>.</label>
                      </div>
                    </div>
                    
                   
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="button" name="login" class="btn btn-primary btn-lg" id="login">Login</button>
                    </div>
  
                  </form>
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                    class="img-fluid" alt="Sample image">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection

  @section('scripts')
  <script>
      $(document).ready(function() {
      $('#login').click(function() {
         
          var email = $('#email').val();
          var password = $('#password').val();
          
          $.ajax({
              url: "http://localhost:8000/api/login",
              type:'POST',
              data: {"email":email, "password":password},
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              "Accept":"application/json",    
              },
              success: function (data) {
                if(data.message){
                    alert(data.message);
                }
                else{
                    alert("User login Successfully");
                    localStorage.setItem("token", data.jwt);
                    window.location.href = "/";
                 
                }
                
                 
                  
              }
          })
  });
  });
  </script>
@endsection