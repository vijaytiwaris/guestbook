
<?= $this->include('template/header') ?>

<div class="container">


  <div class="row mt-5">
    <div class="col-md-6">

    <div class="row ">
    <div class="col-md-6">

   
        <div class="product-info">

        <span class="room_feature">Room ID:2 </span>
        <span class="room_feature">Room Type: A/C</span>
        <span class="room_feature">Double</span>

        <h2 class="room_title"><?= $room['room_title'] ?></h2>
        <img src="<?= base_url('uploads/' . $room['image']) ?>" class="card-img-top room_image" alt="Room 1">
         
        
         
        </div>

    </div>


    <div class="col-md-6">

   
        <div class="product-info room_left">

        <h3 class="room_title">Max Guest - <?= $room['max_guest'] ?></h3>
        
        <div class="room_label">Arrival</div>


        <input type="date">
        <div class="room_label">Departure</div>
        <input type="date">
        
         <a href="<?= base_url('room_booking/' . $room['id']) ?>"> <button class="btn room_book_btn ">book</button></a>
           
      
      </div>


    </div>

    
    </div>
   


    </div>

    <div class="col-md-6">
    <div class="calendar-container">
      <div class="row group-calender">
       <div class=" calender-name"> <h3 id="monthYear"></h3></div>
        <div class="side">

        <div class=" calender-btn ">


            <button class="btn  " id="prevMonth"><i class="fa-solid fa-less-than"></i></button>
            <button class="btn " id="nextMonth"><i class="fa-solid fa-greater-than"></i></button> 


          </div>
        </div> 
        </div>
        
       
          <div class="calendar"></div>
         
        </div>
</div>




  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

function getBookedDates(room_id) {
  $.ajax({
    url: '<?= base_url('/getBookedDates/') ?>' + room_id, 
    dataType: 'json',
    success: function(response) {
      console.log(response);
      const bookedDates = response.booked_dates;

    
         const days = document.querySelectorAll('.day');

      days.forEach(day => {
        const date = day.getAttribute('data-date');
        
    
        function formatDate(dateString) {
        const parts = dateString.split('-'); 
        const year = parts[0];
        const month = parts[1].padStart(2, '0'); 
        const day = parts[2].padStart(2, '0'); 
        return `${year}-${month}-${day}`;
}

      
        const formattedDate = formatDate(date);
        console.log(formattedDate); 

     
const today = new Date();
const changeformat = today.toISOString().split('T')[0];

console.log(changeformat);

      

        if (formattedDate < changeformat) {
          console.log("true")
          day.classList.add('closed');
          day.querySelector('.status').textContent = 'Closed';
        } 


        else if (bookedDates.includes(formattedDate)) {
          
          day.classList.add('active', 'booked');
          day.querySelector('.status').textContent = 'Booked';
        } else {
          day.classList.remove('active', 'booked');
          day.querySelector('.status').textContent = 'Available';
        }
      });


    },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });
}

document.addEventListener('DOMContentLoaded', function() {
  generateCalendar();
  getBookedDates(<?= $room['id'] ?>);
});


let currentMonth;
let currentYear;


function generateCalendar() {

  if (currentMonth === undefined || currentYear === undefined) {
    const currentDate = new Date();
    currentYear = currentDate.getFullYear();
    currentMonth = currentDate.getMonth();
  }

  const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

  const calendarContainer = document.querySelector('.calendar');
  const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
  const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
  

  calendarContainer.innerHTML = '';


  for (let i = 0; i < firstDayOfMonth; i++) {
    const emptyCell = document.createElement('div');
    calendarContainer.appendChild(emptyCell);
  }

 
  for (let i = 1; i <= daysInMonth; i++) {
    const dayElement = document.createElement('div');
    dayElement.classList.add('day');
    dayElement.textContent = i;
    dayElement.setAttribute('data-date', `${currentYear}-${currentMonth + 1}-${i}`);
    

    const statusElement = document.createElement('div');
    statusElement.classList.add('status');
    dayElement.appendChild(statusElement);
    
    calendarContainer.appendChild(dayElement);


    dayElement.addEventListener('click', function() {
      const selectedDate = dayElement.getAttribute('data-date');
      const statusText = dayElement.querySelector('.status').textContent;
      const availabilityStatus = document.getElementById('availabilityStatus');
      availabilityStatus.textContent = `Room ${statusText.toLowerCase()} for ${selectedDate}`;
    });
  }


  document.getElementById('monthYear').textContent = `${months[currentMonth]} ${currentYear}`;
}


document.getElementById('prevMonth').addEventListener('click', () => {
  currentMonth--;
  if (currentMonth < 0) {
    currentMonth = 11;
    currentYear--;
  }
  generateCalendar();
  getBookedDates(<?= $room['id'] ?>); 
});


document.getElementById('nextMonth').addEventListener('click', () => {
  currentMonth++;
  if (currentMonth > 11) {
    currentMonth = 0;
    currentYear++;
  }
  generateCalendar();
  getBookedDates(<?= $room['id'] ?>); 
});


document.addEventListener('DOMContentLoaded', function() {
  generateCalendar();
  getBookedDates(<?= $room['id'] ?>); 
});


</script>

</body>
</html>
