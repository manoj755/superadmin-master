var config = {
   // url: "http://localhost:8080/laravel/public/index.php/api/",
   //url: "http://localhost:8080/laravel/laravelpr/public/index.php/api/",
   url:"http://api.passivereferral.com/index.php/api/",
    token: function () {
        return localStorage.getItem('Authkey');
    }

}