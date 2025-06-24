<?php
  include_once "header.php";

  require_once __DIR__ . '/classes/dbh.class.php';
  ?>

 <style>
    .slot { padding: 0.5em 1em; margin: 0.25em; border: 2px solid #888; border-radius: 10px; width: 200px; text-align: center; white-space: nowrap;cursor: pointer; }
    .taken { background: #f0f0f0; color: #999; cursor: not-allowed; }
    .free:hover { background: #eef; }
  </style>

<body class="bg-secondary-subtle">
<section class="availabilities d-flex justify-content-center align-items-center min-vh-100">
  <div class="availabilities-bg bg-secondary d-inline-flex p-3 rounded-5">
    <div class="wrapper d-flex flex-column justify-content-center align-items-center">
      <div class="availabilites-table"></div>

  <h2>Today's availabilities: </h2>
  <div id="slots-container"></div>

  <script>
    //running the taken.inc.php to return the taken slots from the database as an array of JSON string
    fetch('./includes/taken.inc.php')
      .then(r => r.json()) //takes the returned data and parses it into a JS array of strings
      .then(takenSlots => { //takenSlots is now the array of strings
        const taken = new Set(takenSlots); //make the array into a set object (this is supposedly useful for doing quick checks by using the .has() method)
        const container = document.getElementById('slots-container'); //setting the container constant as a slots-container div to make buttons with.

        //Creating time slots.
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

            // building the code for the buttons that allows user's to book slots.
            const btn = document.createElement('button');//creating an empty button "object" that can be configured.
            btn.textContent = `${hh}:${mi}`;//the buttons display hours and minutes on them as labels.
            btn.className = 'slot ' + (taken.has(slotStr) ? 'taken' : 'free');//Checks if there is a timeslot is already taken and assigns the CSS class slot taken to it. If the time slot is empty, it assign slot free to the button. this is so the button can look/act different based on availability.
            if (!taken.has(slotStr)) {
              btn.addEventListener('click', () => bookSlot(slotStr));//if the slot is free, the button is then assigned an EvenListener that listens for a user mouse click on the button.
            }
            container.appendChild(btn);//adds the button into the container defined earlier.
          }
          // the first for loop loops by hour, therefor this <br> will only occur every 2 buttons/every hour.
          container.appendChild(document.createElement('br'));
        }
      })
      .catch(console.error);//logs errors to the browser console.
    
    //the code below books a slot in the agenda after clicking the confirmation pop-up that appears after clicking on an available slot.
    function bookSlot(slotStr) {
      if (!confirm(`Book the slot at ${slotStr}?`)) return;
      //send the booking request to the server and book if possible.
      fetch('./includes/book.inc.php', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify({appt_start: slotStr})
      }) //sent a JSON string containing the appt_start information to the book.inc file.
      .then(() => {
      //redirect the user to their appointement list
      window.location.href = '../patientapptlist.php?error=none';
      })
    }
  </script>
  
</body>
</html>