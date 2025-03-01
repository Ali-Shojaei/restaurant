<?php 
// session_start();
// if(!isset($_SESSION['user'])){ 
//   var_dump("you can't stay here"); die();
// }
   
?>
<html dir="rtl">
    <head>
      
      <link rel="stylesheet" href="style.css">
      
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">ALI FooD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a href="{{ route('home1') }}">
                    <lord-icon
                        src="https://cdn.lordicon.com/epietrpn.json"
                        trigger="hover"
                        state="hover-partial-roll"
                        style="width:35px;height:35px">
                    </lord-icon>
                </a>
                  @if(!Auth::check()) 
                </li>
                <li class="nav-item">
                  <a style="font-family: 'IranSansWeb';" class="nav-link" href="{{ route('login') }}">ورود به سیستم</a>
                </li>
                @endif
                @if(!Auth::check())
                <li class="nav-item">
                  <a style="font-family: 'IranSansWeb';" class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                </li>
                @endif
                
                @if(Auth::check()) 
                <li class="nav-item">
                  <a style="font-family: 'IranSansWeb';" class="nav-link" href="{{ route('admin') }}">پنل ادمین</a>
                </li>    
                @endif
                @if(Auth::check()) 
                <li class="nav-item">
                  <a style="font-family: 'IranSansWeb';" class="nav-link" href="{{ route('Shopp.home') }}">سبد خرید</a>
                </li>    
                @endif
                @if(Auth::check())  
                    
                        
                <li class="nav-item">  
                  <button class="nav-link btn btn-dark" id="logout-button" style="font-family: 'IranSansWeb'; border: none; color: rgb(231, 220, 220); margin-right: 850px;">خروج از حساب کاربری</button>  
              </li> 
              @endif 
              
              
              </ul>
            </div>
          </nav>
          <style>  
          
            .footer {  
                background-color: #797e83;  
                color: white;  
                padding: 50px 0;  
            }  
            .footer a {  
                color: #ffffff;  
                transition: color 0.2s;  
            }  
            .footer a:hover {  
                color: #f8f9fa;  
            }  
            .social-icons a {  
                margin: 0 15px;  
                font-size: 24px;  
            }  
        </style>  
    </head>
    <body>
        
    
        <div class="container">

            
       @yield('content')
        
        
        
    </div>
    <div id="blur-background" style="display: none; position: fixed; left: 0; top: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); backdrop-filter: blur(5px); z-index: 999;"></div>
        <!-- پاپاپ تأیید خروج -->  
    <div id="logout-popup" style="display:none; position: fixed; left: 50%; top: 50%; transform: translate(-50%, -50%); background-color: rgb(82, 78, 78); border: 1px solid rgb(82, 78, 78); padding: 20px; box-shadow: 0 0 10px rgba(255, 255, 255, 0.2); z-index: 1000; border-radius: 50px;">  
      <div>  
          <h2 style="color: rgb(223, 203, 203); font-family: 'IranSansWeb';">آیا از خروج خود اطمینان دارید؟</h2>  
          <button id="confirm-logout" style="margin-right: 145px; border-radius: 20px; font-family: 'IranSansWeb';" class="btn btn-danger">بله</button>  
          <button id="cancel-logout" style="border-radius: 35px; font-family: 'IranSansWeb';" class="btn btn-info">خیر</button>  
      </div>  
  </div>  

  <script>  
      // وقتی دکمه خروج کلیک شود  
      document.getElementById('logout-button').addEventListener('click', function() {  
        document.getElementById('blur-background').style.display = 'block';// نمایان کردن پس‌زمینه بلور 
          document.getElementById('logout-popup').style.display = 'block';  
      });  

      // وقتی کاربر خروج را تأیید کند  
      document.getElementById('confirm-logout').addEventListener('click', function() {  
    window.location.href = "{{ route('Logout') }}"; // نام مسیر خروج را جایگزین کنید  
});  

      // وقتی کاربر لغو کند  
      document.getElementById('cancel-logout').addEventListener('click', function() { 
        document.getElementById('blur-background').style.display = 'none'; // مخفی کردن پس‌زمینه بلور 
          document.getElementById('logout-popup').style.display = 'none';  
      });  
  </script>  
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <!-- فوتر -->  
  <footer class="footer text-center">  
    <div class="container">  
        <h5>ما را در شبکه‌های اجتماعی دنبال کنید</h5>  
        <div class="social-icons">  
            <a href="#" class="fab fa-facebook"></a>  
            <a href="#" class="fab fa-twitter"></a>  
            <a href="#" class="fab fa-instagram"></a>  
            <a href="#" class="fab fa-linkedin"></a>  
        </div>  
        <p class="my-3">کپی رایت © 2024 تمامی حقوق محفوظ است.</p>  
        <ul class="list-inline">  
            <li class="list-inline-item">  
                <a href="#">صفحه اصلی</a>  
            </li>  
            <li class="list-inline-item">  
                <a href="#">درباره ما</a>  
            </li>  
            <li class="list-inline-item">  
                <a href="#">تماس با ما</a>  
            </li>  
        </ul>  
    </div>  
</footer>  
</body>  

</html>  
