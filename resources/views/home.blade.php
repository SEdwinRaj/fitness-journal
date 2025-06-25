<!doctype html>
<html class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="output.css" rel="stylesheet">
  <link href="input.css" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="dark overflow-hidden">
    

   
    <!-------------------------------------------Main Content------------------------------------------------------------------------------>
    
    <div class="bg-gray-100 h-20 flex justify-between p-5 pl-16 text-3xl font-semibold border-b-4" id="sideNav">
        <div>
            <h1 class="text-sec">{{session('username')}}</h1>
        </div>

        <div>
            <ul class="flex">
                <li class="pl-10">Gain : 0</li>
                <li class="pl-10">Loss : 0</li>
                <li class="pl-10 pr-10">Current : 0</li>
            </ul>
        </div>
    </div>

    <!--dark:text-white-->
    <div class="grid grid-cols-7 h-screen text-3xl font-semibold" id="content">

        <!-- side nav -->
        <!--dark:bg-amber-600-->
        <div class="bg-gray-50  pt-24 pl-14">
            <ul class="flex flex-col">
                <li class="pt-5"><a href="/home"><p class="text-indigo-600">Home</p></a></li>
                <li class="pt-12"><a href="/diet"><p class="hover:text-indigo-600">Diet</p></a></li>
                <li class="pt-12"><a href="/workout"><p class="hover:text-indigo-600">WorkOut</p></a></li>
                <li class="pt-12"><a href="/discussion"><p class="hover:text-indigo-600">Discussion</p></a></li>
                <li class="pt-12"><a href="/landing"><p class="hover:text-indigo-600">Logout</p></a></li>
            </ul>
        </div>
        <!--bg-gray-950-->
        <div class="col-span-6 pt-10 text-xl ">
            
            <div class="grid grid-cols-2">
                <div class="col-span-2 mx-auto mt-5 mb-10 text-4xl">
                    <h1>Stay Motivated</h1>
                </div>
                <!-- Monthly tracker -->
                
                <div class="row-span-2 h-fit w-full pl-10">
                    <div class="ml-72 mb-10">
                        <h1>This Month Record</h1>
                    </div>
                    <canvas id="myLineChart"></canvas>
                </div>
                <!-- total Calories -->

                <div class="h-32 flex rounded-xl m-auto w-1/2 shadow-2xl">
                    <div >
                        <canvas id="cChart" class="p-4"></canvas>
                    </div>
                    <div class="my-auto ml-5 text-2xl">
                        <p class="mt-2">Calories Consumed</p>
                        <p class="pt-2">{{$tc}}/{{$mc}}</p>
                    </div>
                    
                </div>

                <div class="h-32 flex rounded-xl m-auto w-1/2 shadow-2xl" id="ch">
                    <div >
                        <canvas id="bChart" class="p-4"></canvas>
                    </div>
                    <div class="my-auto ml-5 text-2xl">
                        <p class="mt-2">Calories Burned</p>
                        <p class="pt-2">{{$burned}}</p>
                    </div>
                    
                </div>

                <div class="col-span-2 p-16 mx-auto text-4xl">
                    <p>Amigo</p>
                </div>

                <div class="m-auto font-semibold text-3xl">
                    <p>Your daily Calories Consuption is <span class="text-amber-600 font-bold text-4xl pl-2">ON POINT</span></p>
                </div>

                <div class="m-auto font-semibold text-3xl">
                    <p>Your daily Exercise is <span class="text-amber-600 font-bold text-4xl pl-2">AAWWWWW 🔥</span></p>
                </div>
            </div>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>

        function content() {
            document.getElementById("popContent").style.display = "grid"
            // document.getElementById("pop").style.display = "none";
        }

        function hideContent() {
            document.getElementById("popContent").style.display = "none"
            // document.getElementById("pop").style.display = "grid";
        }
        function form() {
            document.getElementById("pop").style.display = "grid";
            document.getElementById("gal").style.display = "none";
        }
        function hide() {
            document.getElementById("pop").style.display = "none";
            document.getElementById("gal").style.display = "grid";
        }

        let CaloriesBurned = @json(array_values($daily_cal_burned));
        let CaloriesConsumed = @json(array_values($daily_cal_consumed));

        var ctx = document.getElementById('myLineChart').getContext('2d');

        var myLineChart = new Chart(ctx, {
            type: 'line', 
            data: {
                labels: Array.from({ length: 30 }, (_, i) => (i + 1).toString()), 
                datasets: [{
                    label: 'Calories Consumed',
                    data: CaloriesConsumed, 
                    fill: false,
                    borderColor: '#D97706', 
                    tension: 0.1 
                },
                {
                    label: 'Calories Burned',
                    data: CaloriesBurned, 
                    fill: false,
                    borderColor: '#ff5722', 
                    tension: 0.1 
                }]
            },
            options: {
                responsive: true, 
                plugins: {
                    legend: {
                        display:false, 
                    },
                    tooltip: {
                        enabled: true, 
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true 
                    }
                },
                // animation: {
                //     onComplete: function () {
                //         const chartInstance = myLineChart;
                //         const yScale = chartInstance.scales.y;
                //         const ctx = chartInstance.ctx;
                //         ctx.save();
                //         ctx.strokeStyle = 'grey';
                //         ctx.lineWidth = 2;
                //         ctx.setLineDash([5, 5]);
                //         ctx.beginPath();
                //         ctx.moveTo(chartInstance.chartArea.left, yScale.getPixelForValue(1200));
                //         ctx.lineTo(chartInstance.chartArea.right, yScale.getPixelForValue(1200));
                //         ctx.stroke();
                //         ctx.restore();
                //     }
                // }
            }
        })



        let t = ({{$tc}}/{{$mc}})*100;
        let b = {{$burned}};
        

        // chart('tChart',t);

        window.onload = function() {
            setTimeout(() => {
                chart('cChart',t,'#D97706');
                chart('bChart',b,'#ff5722')
            }, 100);
        };

        function chart(id,val,col) {

            var ctx = document.getElementById(id).getContext('2d');

            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut', 
                data: {
                    // labels: ['Red', 'Blue', 'Yellow'], 
                    datasets: [{
                        label: ['Pending','Consume'],
                        data: [val,100-val], 
                        borderWidth: 0,
                        backgroundColor: [col,'#ddd'] 
                        // hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true, 
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true,
                        }
                    },
                    cutout: 50
                }
            });
            
        }        
    </script>

</body>
</html>