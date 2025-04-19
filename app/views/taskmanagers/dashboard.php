<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>


    <style>
        html, body {
        height: 100%;
        background-color: #333;
        color: #eee;
        }
        .time {
        width: 80px;
        }

        footer {
        margin-top: 20px;
        }
        footer a {
        text-decoration: none;
        color: #c0c0c0;
        }
    </style>
        
<div class="container text-center">
    <header>
<!--       <h1>NTB</h1> -->
      <h3>Timesheet entry</h3>
    </header>
    <main>
      <form>
        <div class="form-group row">
          <div class="col-2"></div>
        <label class="sr-only" for="name">Name</label>
        <input type="text" class="form-control mb-2 mr-sm-2 col-4" id="name" placeholder="name">

        <label class="sr-only" for="datePicker">Date</label>
        <input type="text" class="form-control mb-2 mr-sm-2 col-4" id="datePicker" placeholder="week commencing">
        <div class="col-2"></div>        
        </div>
      </form>
      <table class="table table-dark table-striped table-hover">
        <thead>
          <tr>
            <th>Day</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>Finish Time</th>
            <th>Break</th>
            <th>Hours Worked</th>
          </tr>
        </thead>
        <tbody id="tBody">
        </tbody>
      </table>
      <div class="row bottom d-none">
        <div class="col">
          <button type="button" id="submit" class="btn btn-success">Submit</button>
        </div>
        <div class="col">
          <h2 id="hoursWorkedText" class="text-right">Total Hours Worked: <span id="totalHours">0</span></h2>
        </div>
      </div>
    </main>
  </div>

  
  <script>
    $(document).ready(function(){

const weekDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

$('#datePicker').datepicker({ //initiate JQueryUI datepicker
  showAnim: 'fadeIn',
  dateFormat: "dd/mm/yy",
  firstDay: 1, //first day is Monday
  beforeShowDay: function(date) {
    //only allow Mondays to be selected
    return [date.getDay() == 1,""];
  },
  onSelect: populateDates
});

function populateDates() {
  
  $('#tBody').empty(); //clear table
  $('.bottom').removeClass('d-none'); //display total hours worked
  let chosenDate = $('#datePicker').datepicker('getDate'); //get chosen date from datepicker
  let newDate;
  const monStartWeekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
  for(let i = 0; i < weekDays.length; i++) { //iterate through each weekday
    newDate = new Date(chosenDate); //create date object
    newDate.setDate(chosenDate.getDate() + i); //increment set date
    //append results to table
    $('#tBody').append( `
    <tr>
      <td class="day">${weekDays[newDate.getDay()].slice(0,3)}</td>
      <td class="date">${newDate.getDate()} / ${newDate.getMonth() + 1} / ${newDate.getFullYear()}</td>
      <td class="start-time"><input id="startTime${monStartWeekDays[i]}" class="time ui-timepicker-input" type="text" /></td>
      <td class="finish-time"><input id="finishTime${monStartWeekDays[i]}" class="time ui-timepicker-input" type="text" /></td></td>
      <td class="break">
        <select id="break${monStartWeekDays[i]}">
          <option value="0">0</option>
          <option value="0.5">0.5</option>
          <option value="1">1</option>
        </select>
      </td>
      <td class="hours-worked" id="hoursWorked${monStartWeekDays[i]}">
        0
      </td>
    </tr>
    ` );

    //function to calculate hours worked
    let calculateHours = () => {
      let startVal = $(`#startTime${monStartWeekDays[i]}`).val();
      let finishVal = $(`#finishTime${monStartWeekDays[i]}`).val();
      let startTime = new Date( `01/01/2007 ${startVal}` );
      let finishTime = new Date( `01/01/2007 ${finishVal}` );
      let breakTime = $(`#break${monStartWeekDays[i]}`).val();
      let hoursWorked = (finishTime.getTime() - startTime.getTime()) / 1000;
      hoursWorked /= (60 * 60);
      hoursWorked -= breakTime;

      if (startVal && finishVal) { //providing both start and finish times are set
        if (hoursWorked >= 0) { //if normal day shift
          $(`#hoursWorked${monStartWeekDays[i]}`).html(hoursWorked);
        } else { //if night shift
          $(`#hoursWorked${monStartWeekDays[i]}`).html(24 + hoursWorked);
        }
      }

      updateTotal();
    }
    //initiate function whenever an input value is changed
    $(`#startTime${monStartWeekDays[i]}, #finishTime${monStartWeekDays[i]}, #break${monStartWeekDays[i]}`).on('change', calculateHours);

  }
  $('.start-time input').timepicker({ 'timeFormat': 'H:i', 'step': 15, 'scrollDefault': '09:00' });
  $('.finish-time input').timepicker({ 'timeFormat': 'H:i', 'step': 15, 'scrollDefault': '17:00' });

  function updateTotal() { //function to update the total hours worked
    let totalHoursWorked = 0;
    let hrs = document.querySelectorAll('.hours-worked');
    hrs.forEach(function(val) {
      totalHoursWorked += Number(val.innerHTML);
    });
    document.querySelector('#totalHours').innerHTML = totalHoursWorked;
  }
  

}


});
  </script>

<?php require APPROOT . '/views/inc/footer.php';?>
