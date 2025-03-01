@extends('layout.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">فرم ثبت نام</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">نام</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">ایمیل</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">رمز ایمیل</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <a type="button" id="toggle" class="toggle">  
                                    <lord-icon src="https://cdn.lordicon.com/fmjvulyw.json" trigger="hover" state="hover-cross" style="width:30px;height:30px"></lord-icon>
                                 </a> 
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <script>  
                                    document.getElementById('toggle').addEventListener('click', function() {  
                                        const passwordInput = document.getElementById('password');  
                                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';  
                                        passwordInput.setAttribute('type', type);  
                                        
                                        if (type === 'text') {  
                                            this.innerHTML = `<lord-icon src="https://cdn.lordicon.com/fmjvulyw.json" trigger="hover" state="hover-look-around" style="width:30px;height:30px"></lord-icon>`;  
                                        } else {  
                                            this.innerHTML = `<lord-icon src="https://cdn.lordicon.com/fmjvulyw.json" trigger="hover" state="hover-cross" style="width:30px;height:30px"></lord-icon>`;  
                                        }  
                                    });  
                                </script>
                                <style>  
                                    .toggle {  
                                        position: absolute;  
                                        right: 590px; /* فاصله از سمت راست */  
                                        top: 54%;  
                                        transform: translateY(-50%);  
                                        cursor: pointer;  
                                        z-index: 1; /* باعث می‌شود بالای input باشد */  
                                    }  
                                     
                                </style> 
                            </div>
                        </div>

                        <div class="row mb-3">  
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">تایید پسورد</label>  
                        
                            <div class="col-md-6 position-relative">  
                                <input id="password-confirm" type="password" class="form-control pe-5" name="password_confirmation" required autocomplete="new-password">  
                                <a type="button" id="togglePassword" class="toggle-password">  
                                   <lord-icon src="https://cdn.lordicon.com/fmjvulyw.json" trigger="hover" state="hover-cross" style="width:30px;height:30px"></lord-icon>
                                </a>  
                                <script>  
                                    document.getElementById('togglePassword').addEventListener('click', function() {  
                                        const passwordInput = document.getElementById('password-confirm');  
                                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';  
                                        passwordInput.setAttribute('type', type);  
                                        
                                        if (type === 'text') {  
                                            this.innerHTML = `<lord-icon src="https://cdn.lordicon.com/fmjvulyw.json" trigger="hover" state="hover-look-around" style="width:30px;height:30px"></lord-icon>`;  
                                        } else {  
                                            this.innerHTML = `<lord-icon src="https://cdn.lordicon.com/fmjvulyw.json" trigger="hover" state="hover-cross" style="width:30px;height:30px"></lord-icon>`;  
                                        }  
                                    });  
                                </script>  
                                <style>  
                                    .toggle-password {  
                                        position: absolute;  
                                        right: 350px; /* فاصله از سمت راست */  
                                        top: 53%;  
                                        transform: translateY(-50%);  
                                        cursor: pointer;  
                                        z-index: 1; /* باعث می‌شود بالای input باشد */  
                                    }  
                                     
                                </style>  
                            </div>  
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ثبت نام
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
