<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
  </script>
    <title>Document</title>
</head>
<style>
    *, #clock {
  margin: 20px auto;
  padding: 0;
  background: #333;
  width: 100%;
  text-align: center;
  line-height: 40px;
  color: #fff;
  font-size: 34px;
  font-family: calibri;
}
</style>
<body>
    <div id="clock"></div>
    <script>
            function updateClock() {
            var currentTime = new Date();
            // Operating System Clock Hours for 12h clock
            var currentHoursAP = currentTime.getHours();
            // Operating System Clock Hours for 24h clock
            var currentHours = currentTime.getHours();
            // Operating System Clock Minutes
            var currentMinutes = currentTime.getMinutes();
            // Operating System Clock Seconds
            var currentSeconds = currentTime.getSeconds();
            // Adding 0 if Minutes & Seconds is More or Less than 10
            currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
            currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
            // Picking "AM" or "PM" 12h clock if time is more or less than 12
            var timeOfDay = (currentHours < 12) ? "AM" : "PM";
            // transform clock to 12h version if needed
            currentHoursAP = (currentHours > 12) ? currentHours - 12 : currentHours;
            // transform clock to 12h version after mid night
            currentHoursAP = (currentHoursAP == 0) ? 12 : currentHoursAP;
            // display first 24h clock and after line break 12h version
            var currentTimeString =  currentHours + ":" + currentMinutes + ":" + currentSeconds;
            // print clock js in div #clock.
            $("#clock").html(currentTimeString);}
            $(document).ready(function () {
            setInterval(updateClock, 1000);
        });
        </script>
</body>
</html>
