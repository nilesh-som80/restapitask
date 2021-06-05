<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="greeting"></div>
                    <div class="digital-clock"></div>
                    <div id="countdown"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            clockUpdate();
            setInterval(clockUpdate, 1000);
        })

        function clockUpdate() {
            var date = new Date();

            function addZero(x) {
                if (x < 10) {
                    return x = '0' + x;
                } else {
                    return x;
                }
            }


            var h = addZero(date.getHours());
            var m = addZero(date.getMinutes());
            var s = addZero(date.getSeconds());
            var day = addZero(date.getDate());
            var mon = addZero(date.getMonth());
            var year = date.getFullYear();
            var thehours = date.getHours();
      var themessage;
      var morning = ('Good morning');
      var afternoon = ('Good afternoon');
      var evening = ('Good evening');

      if (thehours >= 0 && thehours < 12) {
        themessage = morning;

      } else if (thehours >= 12 && thehours < 17) {
        themessage = afternoon;

      } else if (thehours >= 17 && thehours < 24) {
        themessage = evening;
      }

      $('.greeting').append(themessage);

            $('.digital-clock').text("Date " + day + "/" + mon + "/" + year + " Time : " + h + ':' + m + ':' + s)
        }

    </script>
    <script>
        var countDownDate = new Date();
        countDownDate.setMinutes(countDownDate.getMinutes() + 10);
        countDownDate = countDownDate.getTime();
        if (sessionStorage.getItem("time")) {
            countDownDate = sessionStorage.getItem("time");

        } else {
            sessionStorage.setItem("time",countDownDate);
        }
        var x = setInterval(function() {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(x);
                location.reload(true);
                document.getElementById("countdown").innerHTML = "You will be loged out soon";
            }
        }, 1000);

    </script>
    <script>

    </script>
</x-app-layout>
