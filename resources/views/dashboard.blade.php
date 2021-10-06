@section('title', ' Dashboard')
@section('icon', 'bi-speedometer2')
@extends("layout.keuangan")
@section("konten")
    <div class="row text-white ">


        <div class="card ml-5" style="  background-color:#FF0000; width: 17rem; margin-left: 12px; ">
            <div class="card-body" style="">
              <div class="card-body-icon" style=" position: absolute; z-index: 0;top: 16px; right: 3px;font-size: 90px;">
              <i class="bi bi-file-earmark-text"></i>
              </div>
              <h5 class="card-title text-white  " style="font-size: 15px;">PEMASUKAN HARI INI</h5>
              <div class="fs-3">Rp 5 jt </div>
              <a href=”#” style=”text-decoration:none;”>
              <p class="card-text text-white  fw-bold " ><br>Lihat Detail <i class = "fasfa-angle-double-right ml-2"></i></p></a>
           </div>
        </div>

        <div class="card ml-5" style="  background-color:#04009A; width: 17rem; margin-left: 12px; ">
            <div class="card-body" >
              <div class="card-body-icon"style=" position: absolute; z-index: 0;top: 16px; right: 3px;font-size: 90px;">
              <i class="bi bi-file-bar-graph"></i>
              </div>
              <h5 class="card-title text-white  "style="font-size: 15px;">PEMASUKAN MINGGU INI</h5>
              <div class="fs-3">Rp 10 jt </div>
              <a href="#">
              <p class="card-text text-white  fw-bold"><br>Lihat Detail <i class = "fasfa-angle-double-right ml-2"></i></p></a>
           </div>
        </div>

        <div class="card ml-5" style="  background-color:#FF7600; width: 17rem; margin-left: 12px; ">
            <div class="card-body">
              <div class="card-body-icon"style=" position: absolute; z-index: 0;top: 16px; right: 3px;font-size: 90px;">
              <i class="bi bi-file-earmark-bar-graph"></i> 
              </div>
              <h5 class="card-title text-white"style="font-size: 15px;">PEMASUKAN BULAN INI</h5>
              <div class="fs-3">Rp 50 jt </div>
              <a href="#">
              <p class="card-text text-white  fw-bold"><br>Lihat Detail <i class = "fasfa-angle-double-right ml-2"></i></p></a>
           </div>
        </div>

        <div class="card  ml-5" style=" background-color:#006400; width: 17rem; margin-left: 12px; ">
            <div class="card-body" >
               <div class="card-body-icon"style=" position: absolute; z-index: 0;top: 16px; right: 3px;font-size: 90px;">
               <i class="bi bi-bar-chart-line"></i>
               </div>
               <h5 class="card-title text-white "style="font-size: 15px;">PEMASUKAN TAHUN INI</h5>
               <div class="fs-3">Rp 250 jt </div>
               <a href="#" >
               <p class="card-text text-white  fw-bold"><br>Lihat Detail <i class = "fasfa-angle-double-right ml-2"></i></p></a>
            </div>
        </div>

    </div>

     <div class="row mt-3 text-white ">

      <div class="card ml-5" style=" background-color:#FF4848; width: 17rem; margin-left: 12px; ">
      <div class="card-body">
    <div class="card-body-icon"style=" position: absolute; z-index: 0;top: 16px; right: 3px;font-size: 90px;">
    <i class="bi bi-file-earmark-text"></i>
    </div>
    <h5 class="card-title text-white  "style="font-size: 15px;">PENGELUARAN HARI INI</h5>
    <div class="fs-3">Rp 5 jt </div>
    <a href="#">
    <p class="card-text text-white  fw-bold"><br>Lihat Detail <i class = "fasfa-angle-double-right ml-2"></i></p></a>
  </div>
</div>
      <div class="card ml-5" style=" background-color:#0F52BA; width: 17rem; margin-left: 12px; ">
      <div class="card-body">
    <div class="card-body-icon"style=" position: absolute; z-index: 0;top: 16px; right: 3px;font-size: 90px;">
    <i class="bi bi-file-bar-graph"></i>
    </div>
    <h5 class="card-title text-white  "style="font-size: 15px;">PENGELUARAN MINGGU INI</h5>
    <div class="fs-3">Rp 10 jt </div>
    <a href="#">
    <p class="card-text text-white  fw-bold"><br>Lihat Detail <i class = "fasfa-angle-double-right ml-2"></i></p></a>
  </div>
</div>
      <div class="card  ml-5" style=" background-color:#F7A440; width: 17rem; margin-left: 12px; ">
  <div class="card-body">
    <div class="card-body-icon"style=" position: absolute; z-index: 0;top: 16px; right: 3px;font-size: 90px;">
    <i class="bi bi-file-earmark-bar-graph"></i> 
    </div>
    <h5 class="card-title text-white"style="font-size: 15px;">PENGELUARAN BULAN INI</h5>
    <div class="fs-3">Rp 50 jt </div>
    <a href="#">
    <p class="card-text text-white  fw-bold"><br>Lihat Detail <i class = "fasfa-angle-double-right ml-2"></i></p></a>
  </div>
</div>
      <div class="card  ml-5" style="  background-color:#55cd4c;width: 17rem; margin-left: 12px; ">
  <div class="card-body">
    <div class="card-body-icon"style=" position: absolute; z-index: 0;top: 16px; right: 3px;font-size: 90px;">
    <i class="bi bi-bar-chart-line"></i>
    </div>
    <h5 class="card-title text-white "style="font-size: 15px;">PENGELUARAN TAHUN INI</h5>
    <div class="fs-3">Rp 250 jt </div>
    <a href="#" >
    <p class="card-text text-white  fw-bold"><br>Lihat Detail <i class = "fasfa-angle-double-right ml-2"></i></p></a>
  </div>
</div>
  </div>

  <div class="coba">
  <div class="container" style="width: 60%;">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        let myChart = document.getElementById('myChart').getContext('2d');
        //Global Options
        Chart.defaults.global.defaultFontFamily='Lato';
        Chart.defaults.global.defaultFontSize= 18;
        Chart.defaults.global.defaultFontColor='#777';

        let massPopChart = new Chart(myChart,{
            type:'bar',//bar,horizontalbar,pie,line,doughnut,radar,polarArea
            data:{
                labels:['1 Tahun','6 Bulan','1 Bulan','2 Minggu','1 Minggu','Hari ini'],
                datasets:[{
                    label:'Pengeluaran',
                    data:[
                        617594,
                        451045,
                        273060,
                        166519,
                        125179,
                        75065
                    ],
                   // backgroundColor:'green',
                  backgroundColor:[
                       'rgba(255,99,132,0.6)',
                       'rgba(54,162,235,0.6)',
                       'rgba(255,206,86,0.6)',
                       'rgba(75,192,192,0.6)',
                       'rgba(153,102,255,0.6)',
                       'rgba(255,159,64,0.6)',
                       'rgba(255,99,132,0.6)'
                   ],
                   borderWidth:1,
                   borderColor:'#777',
                   hoverBorderWidth:3,
                   hoverBorderColor:'#000'
                }]
            },
            options:{
                title:{
                    display:true,
                    text:'Grafik Tahunan SMK Bagimu Negeriku',
                    fontSize:25
                },
                legend:{
                    display:true,
                    position:'right',
                    labels:{
                        fontColor:'#000'
                    }
                },
                layout:{
                    padding:{
                        left:50,
                        right:0,
                        bottom:0,
                        top:0
                    }
                },
                tooltips:{
                    enabled:true
                }
            }
        });
    </script>
    
  
  <div class="container" style="width: 39%; ">
    <div class="card">
        <h3 class="card-header" id="monthAndYear"></h3>
        <table class="table table-bordered table-responsive-sm" id="calendar">
            <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            </thead>

            <tbody id="calendar-body">

            </tbody>
        </table>
        <form class="">
            <label class="lead" for="month"> </label>
            <select class="form-control" name="month" id="month" onchange="jump()">
                <option value=0>Jan</option>
                <option value=1>Feb</option>
                <option value=2>Mar</option>
                <option value=3>Apr</option>
                <option value=4>May</option>
                <option value=5>Jun</option>
                <option value=6>Jul</option>
                <option value=7>Aug</option>
                <option value=8>Sep</option>
                <option value=9>Oct</option>
                <option value=10>Nov</option>
                <option value=11>Dec</option>
            </select>


            <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
            <option value=1990>1990</option>
            <option value=1991>1991</option>
            <option value=1992>1992</option>
            <option value=1993>1993</option>
            <option value=1994>1994</option>
            <option value=1995>1995</option>
            <option value=1996>1996</option>
            <option value=1997>1997</option>
            <option value=1998>1998</option>
            <option value=1999>1999</option>
            <option value=2000>2000</option>
            <option value=2001>2001</option>
            <option value=2002>2002</option>
            <option value=2003>2003</option>
            <option value=2004>2004</option>
            <option value=2005>2005</option>
            <option value=2006>2006</option>
            <option value=2007>2007</option>
            <option value=2008>2008</option>
            <option value=2009>2009</option>
            <option value=2010>2010</option>
            <option value=2011>2011</option>
            <option value=2012>2012</option>
            <option value=2013>2013</option>
            <option value=2014>2014</option>
            <option value=2015>2015</option>
            <option value=2016>2016</option>
            <option value=2017>2017</option>
            <option value=2018>2018</option>
            <option value=2019>2019</option>
            <option value=2020>2020</option>
            <option value=2021>2021</option>
            <option value=2022>2022</option>
            <option value=2023>2023</option>
            <option value=2024>2024</option>
            <option value=2025>2025</option>
            <option value=2026>2026</option>
            <option value=2027>2027</option>
            <option value=2028>2028</option>
            <option value=2029>2029</option>
            <option value=2030>2030</option>
        </select></form>
    </div>
</div>
<!--<button name="jump" onclick="jump()">Go</button>-->
<script >
    let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");
let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
let monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);
function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}
function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}
function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}
function showCalendar(month, year) {
    let firstDay = (new Date(year, month)).getDay();
    let daysInMonth = 32 - new Date(year, month, 32).getDate();
    let tbl = document.getElementById("calendar-body"); // body of the calendar
    // clearing all previous cells
    tbl.innerHTML = "";
    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;
    // creating all cells
    let date = 1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");
        //creating individual cells, filing them up with data.
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                let cell = document.createElement("td");
                let cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            }
            else if (date > daysInMonth) {
                break;
            }
            else {
                let cell = document.createElement("td");
                let cellText = document.createTextNode(date);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("bg-info");
                } // color today's date
                cell.appendChild(cellText);
                row.appendChild(cell);
                date++;
            }
        }
        tbl.appendChild(row); // appending each row into calendar body.
    }
}
</script>

<!-- Optional JavaScript for bootstrap -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

        </div>  
      @endsection