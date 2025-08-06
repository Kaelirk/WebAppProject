<?php
  include_once "header.php";

  require_once __DIR__ . '/classes/dbh.class.php';
  ?>

  <style>
    .slot { padding: 0.5em 1em; margin: 0.25em; border: 2px solid #888; border-radius: 10px; cursor: not-allowed; width: 200px; text-align: center; white-space: nowrap;}
    .taken { background:#20A0D8; color: #262626; cursor: pointer ; }
    .free:hover { background: #eef; }
  </style>

<body class="bg-image-schedule">
<?php if((isset($_SESSION["userid"])) && ($_SESSION["userid"] == "1")){?>
<section class="bookings d-flex justify-content-center align-items-center vh-100">
  <div class="bookings-bg bg-secondary bg-opacity-25 d-inline-flex p-4 rounded-5">
    <div class="wrapper d-flex flex-column justify-content-center align-items-center">
      <h2>Your schedule for today: </h2>
      <div id="slots-container"></div> <!-- a div is prepared to contain each of the bookings loops throughout in the bookings.forEach() method. -->

      <script>
        //running the bookings.api.php api to return the bookings from the database as an array of JSON strings
        fetch('./api/bookings.api.php')
          .then(r => r.json()) //takes the returned data and parses it into a JS array of strings
          .then(bookings => { //bookings is now the array of strings
            const bookingMap = new Map(); //make the array into a map object (this allows the correct appt_start value to be mapped to the correct name). Very useful later one when displaying times and name on buttons.

            bookings.forEach(b => {
              bookingMap.set(b.appt_start, b.name);
            });

            const container = document.getElementById('slots-container'); //setting the container constant as a slots-container div to make buttons with.
            //Creating time slots, just like in the availabilities table.
            const startHour = 8, endHour = 20; //start and end time for the day.

            for (let h = startHour; h < endHour; h++) {
              for (let m of [0, 30]) { //iterate through the hour creating a date() object for each half hour (so on 00 and on 30)
              const dt = new Date(); //creates a new date() object
                dt.setHours(h, m, 0, 0);//zeroing out the seconds and milliseconds, only hours and minutes will change throughout the loops

                const yyyy = dt.getFullYear();
                const mm   = String(dt.getMonth()+1).padStart(2,'0'); //creating a string that contains the month's value in a form that fits the "YYYY-MM-DD HH:MM:SS".
                const dd   = String(dt.getDate()   ).padStart(2,'0'); //creating a string that contains the day's value in a form that fits the "YYYY-MM-DD HH:MM:SS".
                const hh   = String(dt.getHours()  ).padStart(2,'0'); //creating a string that contains the hour's value in a form that fits the "YYYY-MM-DD HH:MM:SS".
                const mi   = String(dt.getMinutes()).padStart(2,'0'); //creating a string that contains the minute's value in a form that fits the "YYYY-MM-DD HH:MM:SS".
                const slotStr = `${yyyy}-${mm}-${dd} ${hh}:${mi}:00`; //creating a string that is easily comparable to the javascript strings made when the taken.php api was run and returned the database data. we simply combine the strings above into 1 string.

                // building the code for the buttons that allows admins to cancel slots.
                const btn = document.createElement('button');//creating an empty button "object" that can be configured.
                const name = bookingMap.get(slotStr); //this assign the name of the person booked at the time of "slotStr" to the const name. This is done by retrieving the name mapped to the appt_start that is the same value as the slotStr.

                btn.textContent = name ? `${hh}:${mi} - ${name}` : `${hh}:${mi}`;//the buttons display hours and minutes on them as labels and a name if there is a booking.
                btn.className = 'slot ' + (name ? 'taken' : 'free');//Checks if there is a timeslot is already booked and assigns the CSS class slot taken to it. If the time slot is empty, it assign slot free to the button. this is so the button can look/act different based on availability.

                if (name) {
                  btn.addEventListener('click', () => cancelBooking(slotStr, name));//if the slot is booked, the button is then assigned an EvenListener that listens for a user mouse click on the button and then runs the cancelBooking function.
                }
                container.appendChild(btn);//adds the button into the container defined earlier.
              }
              // the first for loop loops by hour, therefor this <br> will only occur every 2 buttons/every hour.
              container.appendChild(document.createElement('br'));
            }
          })
          .catch(console.error);//logs errors to the browser console.
        
        //the code below cancels a booking in the agenda after clicking the confirmation pop-up that appears after clicking on an booked slot.
        function cancelBooking(slotStr, name) {
          if (!confirm(`Cancel the booking at ${slotStr} for ${name}?`)) return;

          //send the cancel request to the server and cancel if possible.
          fetch('./api/cancel.api.php', {
            method: 'POST',
            headers: {'Content-Type':'application/json'},
            body: JSON.stringify({appt_start: slotStr, name: name})
          }) //sent a JSON string containing the appt_start information to the cancel.api.php file.
          .then(() => {
          window.location.reload();//reloads the page to hopefully show the change in the agenda.
          })
        }
      </script>
    </div>
  </div>
</section>
<?php }else{ ?>
  <h2>Access denied.<h2>
  <p>Administrator privileges required.</p>
<?php } ?>
</body>
</html>