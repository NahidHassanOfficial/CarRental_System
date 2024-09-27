 <x-layouts.layout>

     <div class="container my-5">
         <div class="row justify-content-center">
             <div class="col-md-6">
                 <div class="card shadow animate__animated animate__fadeInDown">
                     <div class="card-body">
                         <h2 class="text-center mb-4">Register</h2>
                         <div id="registerForm">
                             <div class="form-group mb-3">
                                 <label for="name"><i class="fas fa-user"></i> Name:</label>
                                 <input type="text" class="form-control" id="name" placeholder="Enter name"
                                     required>
                             </div>
                             <div class="form-group mb-3">
                                 <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                                 <input type="email" class="form-control" id="email" placeholder="Enter email"
                                     required>
                             </div>
                             <div class="form-group mb-3">
                                 <label for="password"><i class="fas fa-lock"></i> Password:</label>
                                 <input type="password" class="form-control" id="password" placeholder="Enter password"
                                     required>
                             </div>
                             <button onclick="onRegistration()" type="submit"
                                 class="btn btn-primary w-100">Register</button>
                         </div>
                         <p class="text-center mt-3">Already have an account? <a href="/login">Login</a></p>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <script>
         async function onRegistration() {

             try {
                 let name = document.getElementById('name').value;
                 let email = document.getElementById('email').value;
                 let password = document.getElementById('password').value;

                 if (email.length === 0) {
                     errorToast('Email is required')
                 } else if (name.length === 0) {
                     errorToast('Name is required')
                 } else if (password.length === 0) {
                     errorToast('Password is required')
                 } else {
                     showLoader();
                     let res = await axios.post('{{ url('/register') }}', {
                         email: email,
                         name: name,
                         password: password
                     })
                     if (res.status === 200 && res.data['status'] === 'success') {
                         successToast(res.data['message']);
                         setTimeout(function() {
                             window.location.href = '{{ url('/login') }}'
                         }, 2000)
                     } else {
                         errorToast(res.data['message'])
                     }
                 }
             } catch (error) {
                 errorToast(error.response.data.message)
             } finally {
                 hideLoader();
             }
         }
     </script>

 </x-layouts.layout>
