@if(session('username'))
<!doctype html>
<html class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
  <link href="./output.css" rel="stylesheet">
  <link href="input.css" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="dark overflow-hidden">

    <div class="absolute h-screen w-screen overflow-hidden backdrop-blur-md" style="display: none;" id="popContent" >
        <div class="h-2/3 w-1/3 m-auto shadow-2xl rounded-3xl overflow-hidden">
            <div class="w-full h-1/2">
                <img class="w-full h-full" id="food-img">

                <div class="relative -mt-80 float-end mr-3 p-2 rounded-full backdrop-opacity-20 h-9 w-9 hover:cursor-pointer" onclick="hideContent()">
                    <svg fill="#D97706" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512.481 421.906L850.682 84.621c25.023-24.964 65.545-24.917 90.51.105s24.917 65.545-.105 90.51L603.03 512.377 940.94 850c25.003 24.984 25.017 65.507.033 90.51s-65.507 25.017-90.51.033L512.397 602.764 174.215 940.03c-25.023 24.964-65.545 24.917-90.51-.105s-24.917-65.545.105-90.51l338.038-337.122L84.14 174.872c-25.003-24.984-25.017-65.507-.033-90.51s65.507-25.017 90.51-.033L512.48 421.906z"></path></g></svg>
                </div>
            </div>
           
            <div class="grid grid-cols-2 h-1/2">
                <div class="mx-auto text-3xl mt-5 font-bold h-1/3">
                    <h1>Enter the Quantity</h1>
                </div>
                <div class="mx-auto text-3xl mt-5 font-bold h-1/3">
                    <h1>Enter the Size</h1>
                </div>

                <div class="ml-auto mt-12 h-45">
                    <input id="quantity" type="number" placeholder="Quantity" pattern="[0-9]*" inputmode="numeric" require class="bg-transparent w-1/2 text-center focus:outline-none focus:ring-0 placeholder-gray-600 placeholder:text-center pb-2 text-xl border-b-2 border-gray-600"> 
                </div>
                <div class="mx-auto mt-3 h-45">
                    <div class="flex items-center mb-4">
                        <input id="small" type="radio" value="grams" name="default-radio" class="w-4 h-4 bg-gray-100 border-none focus:ring-0 text-gray-500">
                        <label for="small" class="ms-2 text-xl text-gray-900">Grams</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="medium" type="radio" value="small" name="default-radio" class="w-4 h-4 bg-gray-100 border-none focus:ring-0 text-gray-500">
                        <label for="medium" class="ms-2 text-xl text-gray-900">Small Cup(50 g)</label>
                    </div>
                    <div class="flex items-center mb-4 ">
                        <input id="large" type="radio" value="medium" name="default-radio" class="w-4 h-4 bg-gray-100 border-none focus:ring-0 text-gray-500">
                        <label for="large" class="ms-2 text-xl text-gray-900">Medium Cup(100 g)</label>
                    </div>
                    <div class="flex items-center mb-4 ">
                        <input id="large" type="radio" value="large" name="default-radio" class="w-4 h-4 bg-gray-100 border-none focus:ring-0 text-gray-500">
                        <label for="large" class="ms-2 text-xl text-gray-900">Large Cup(150 g)</label>
                    </div>
                </div>

                
                <div class="font-bold pt-4 text-amber-600 text-2xl text-center col-span-2">
                
                    <button onclick="track()">Track Food</button>
                    
                </div>
                

            </div>
            
        </div>
    </div>

    <!------------------------------------ Search tab ----------------------------------------------------------------------------->

    <div class="absolute h-screen w-screen overflow-hidden backdrop-blur-md" style="display:none;" id="pop" >
        <div class="h-2/3 w-1/3 m-auto bg-white shadow-2xl rounded-3xl overflow-hidden">
                <div class="flex float-right m-8 h-5 w-5 hover:cursor-pointer" onclick="hide()">
                    <svg fill="#D97706" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512.481 421.906L850.682 84.621c25.023-24.964 65.545-24.917 90.51.105s24.917 65.545-.105 90.51L603.03 512.377 940.94 850c25.003 24.984 25.017 65.507.033 90.51s-65.507 25.017-90.51.033L512.397 602.764 174.215 940.03c-25.023 24.964-65.545 24.917-90.51-.105s-24.917-65.545.105-90.51l338.038-337.122L84.14 174.872c-25.003-24.984-25.017-65.507-.033-90.51s65.507-25.017 90.51-.033L512.48 421.906z"></path></g></svg>
                </div>

                <div class="m-auto placeholder-amber-500">
                    <input type="text" placeholder="Search here" class="w-2/3 h-10 placeholder-gray-800 focus:ring-amber-500 bg-gray-50 border-2 border-amber-500 opacity-55 rounded-2xl m-5 ml-24 p-3">
                </div>

                <div class="h-[32rem] w-full overflow-y-scroll">

                    @foreach($foods as $food)
                    <div class="grid grid-cols-3 w-[32rem] mt-5">
                        <div class="flex ml-24 w-[25rem] hover:cursor-pointer" onclick="content('{{$food->id}}')">
                            <div class="hover:cursor-pointer">
                                <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path></svg>
                            </div>  
                            <h1 class="pl-5 text-xl">{{$food->name}}</h1>
                        </div>
                            
                        <div onclick="content('{{$food->id}}')">
                            <svg class="h-9 ml-80 w-fit hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 72 72" style="fill:#D97706;"><path d="M36,12c13.255,0,24,10.745,24,24c0,13.255-10.745,24-24,24S12,49.255,12,36C12,22.745,22.745,12,36,12z M44,39	c1.657,0,3-1.343,3-3c0-1.657-1.343-3-3-3c-0.329,0-2.426,0-5,0c0-2.574,0-4.672,0-5c0-1.657-1.343-3-3-3c-1.657,0-3,1.343-3,3	c0,0.328,0,2.426,0,5c-2.574,0-4.671,0-5,0c-1.657,0-3,1.343-3,3c0,1.657,1.343,3,3,3c0.329,0,2.426,0,5,0c0,2.574,0,4.672,0,5	c0,1.657,1.343,3,3,3c1.657,0,3-1.343,3-3c0-0.328,0-2.426,0-5C41.574,39,43.671,39,44,39z"></path></svg>
                        </div>
                    </div>
                    <hr class="w-2/3 mt-2 ml-24 mb-2">
                    @endforeach
                    
                </div>

                
                <form id="foodForm" action="/save-foods" method="POST">
                    @csrf
                    <input type="hidden" name="foods" id="foodsInput">
                    <input type="hidden" name="name" id="name" value="{{$name}}">
                    <div class="font-bold bg-white p-4 text-amber-600 text-2xl text-center">
                        <button type="Submit">Track Food</button>
                    </div>
                </form>
        </div>
    </div>
    <!-- bg-gradient-to-r from-red-700 to-red-500 -->
     <!-- dark:bg-amber-600 dark:text-white dark:border-amber-400 -->

    <!---------------------------------------------------------- Diet Main Page -------------------------------------------------------------------->

    <div class="h-20 flex justify-between p-5 pl-16 text-3xl  font-semibold border-b-4 bg-gray-50 ">
        <div>
            <h1 class="text-sec">{{$name}}</h1>
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
    <div class="grid grid-cols-7 h-screen text-3xl font-semibold">

        <!-- side nav -->
        <!--dark:bg-amber-600-->
        <div class="bg-gray-50  pt-24 pl-14">
            <ul class="flex flex-col">
                <li class="pt-5"><a href="/home"><p class="hover:text-indigo-600">Home</p></a></li>
                <li class="pt-12"><a href="/diet"><p class="text-indigo-600">Diet</p></a></li>
                <li class="pt-12"><a href="/workout"><p class="hover:text-indigo-600">WorkOut</p></a></li>
                <li class="pt-12"><a href="/discussion"><p class="hover:text-indigo-600">Discussion</p></a></li>
                <li class="pt-12"><a href="/"><p class="hover:text-indigo-600">Logout</p></a></li>
            </ul>
        </div>
        <!--bg-gray-950-->
        <div class="col-span-6 pt-10 text-xl">
            
            <div class="grid grid-cols-2">

                <div class="col-span-2 mx-auto text-4xl">
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
                        <canvas id="tChart" class="p-4"></canvas>
                    </div>
                    <div class="my-auto ml-5 text-2xl">
                        <p class="mt-2">Calories Consumed</p>
                        <p class="pt-2">{{$tc}}/{{$maintenance}}</p>
                    </div>
                    
                </div>

                <div class="mx-auto text-4xl">
                    <p>Adios Amigo</p>
                </div>
            </div>

            <div class="flex p-10 mt-10">
                <!-- four charts -->
                <div class="h-32 flex rounded-xl m-auto w-1/5 shadow-lg">
                    <div >
                        <canvas id="pChart" class="p-4"></canvas>
                    </div>
                    <div class="my-auto">
                        <p>Proteins</p>
                        <p>{{$p}}/{{$protein}}</p>
                    </div>
                    
                </div>

                <div class="h-32 flex rounded-xl m-auto w-1/5 shadow-2xl">
                    <div >
                        <canvas id="cChart" class="p-4"></canvas>
                    </div>
                    <div class="my-auto">
                        <p>Carbohydrates</p>
                        <p>{{$c}}/{{$carbs}}</p>
                    </div>
                    
                </div>

                <div class="h-32 flex rounded-xl m-auto w-1/5 shadow-2xl">
                    <div >
                        <canvas id="fChart" class="p-4"></canvas>
                    </div>
                    <div class="my-auto">
                        <p>Fibers</p>
                        <p>{{$f}}/{{$fiber}}</p>
                    </div>
                    
                </div>
                <div class="h-32 flex rounded-xl m-auto w-1/5 shadow-2xl">
                    <div >
                        <canvas id="fatChart" class="p-4"></canvas>
                    </div>
                    <div class="my-auto">
                        <p>Fat</p>
                        <p>{{$fa}}/{{$fat}}</p>
                    </div>
                    
                </div>
            </div>

            <!-- Add meals -->
             
            <div class="grid grid-cols-4">
                <a>
                    <div class="flex ml-40 hover:cursor-pointer" onclick="form('bf')">
                        <h1>BreakFast</h1>
                        <svg class="h-9" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 72 72" style="fill:#D97706;"><path d="M36,12c13.255,0,24,10.745,24,24c0,13.255-10.745,24-24,24S12,49.255,12,36C12,22.745,22.745,12,36,12z M44,39	c1.657,0,3-1.343,3-3c0-1.657-1.343-3-3-3c-0.329,0-2.426,0-5,0c0-2.574,0-4.672,0-5c0-1.657-1.343-3-3-3c-1.657,0-3,1.343-3,3	c0,0.328,0,2.426,0,5c-2.574,0-4.671,0-5,0c-1.657,0-3,1.343-3,3c0,1.657,1.343,3,3,3c0.329,0,2.426,0,5,0c0,2.574,0,4.672,0,5	c0,1.657,1.343,3,3,3c1.657,0,3-1.343,3-3c0-0.328,0-2.426,0-5C41.574,39,43.671,39,44,39z"></path></svg>
                    </div>
                </a>
                <a>
                    <div class="flex ml-40 hover:cursor-pointer" onclick="form('l')">
                        <h1>Lunch</h1>
                        <svg class="h-9" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 72 72" style="fill:#D97706;"><path d="M36,12c13.255,0,24,10.745,24,24c0,13.255-10.745,24-24,24S12,49.255,12,36C12,22.745,22.745,12,36,12z M44,39	c1.657,0,3-1.343,3-3c0-1.657-1.343-3-3-3c-0.329,0-2.426,0-5,0c0-2.574,0-4.672,0-5c0-1.657-1.343-3-3-3c-1.657,0-3,1.343-3,3	c0,0.328,0,2.426,0,5c-2.574,0-4.671,0-5,0c-1.657,0-3,1.343-3,3c0,1.657,1.343,3,3,3c0.329,0,2.426,0,5,0c0,2.574,0,4.672,0,5	c0,1.657,1.343,3,3,3c1.657,0,3-1.343,3-3c0-0.328,0-2.426,0-5C41.574,39,43.671,39,44,39z"></path></svg>
                    </div>
                </a>
                <a>
                    <div class="flex ml-40 hover:cursor-pointer" onclick="form('es')">
                        <h1>Eveing Snack</h1>
                        <svg class="h-9" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 72 72" style="fill:#D97706;"><path d="M36,12c13.255,0,24,10.745,24,24c0,13.255-10.745,24-24,24S12,49.255,12,36C12,22.745,22.745,12,36,12z M44,39	c1.657,0,3-1.343,3-3c0-1.657-1.343-3-3-3c-0.329,0-2.426,0-5,0c0-2.574,0-4.672,0-5c0-1.657-1.343-3-3-3c-1.657,0-3,1.343-3,3	c0,0.328,0,2.426,0,5c-2.574,0-4.671,0-5,0c-1.657,0-3,1.343-3,3c0,1.657,1.343,3,3,3c0.329,0,2.426,0,5,0c0,2.574,0,4.672,0,5	c0,1.657,1.343,3,3,3c1.657,0,3-1.343,3-3c0-0.328,0-2.426,0-5C41.574,39,43.671,39,44,39z"></path></svg>
                    </div>
                </a>
                <a>
                    <div class="flex ml-40 hover:cursor-pointer" onclick="form('d')">
                        <h1>Dinner</h1>
                        <svg class="h-9" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 72 72" style="fill:#D97706;"><path d="M36,12c13.255,0,24,10.745,24,24c0,13.255-10.745,24-24,24S12,49.255,12,36C12,22.745,22.745,12,36,12z M44,39	c1.657,0,3-1.343,3-3c0-1.657-1.343-3-3-3c-0.329,0-2.426,0-5,0c0-2.574,0-4.672,0-5c0-1.657-1.343-3-3-3c-1.657,0-3,1.343-3,3	c0,0.328,0,2.426,0,5c-2.574,0-4.671,0-5,0c-1.657,0-3,1.343-3,3c0,1.657,1.343,3,3,3c0.329,0,2.426,0,5,0c0,2.574,0,4.672,0,5	c0,1.657,1.343,3,3,3c1.657,0,3-1.343,3-3c0-0.328,0-2.426,0-5C41.574,39,43.671,39,44,39z"></path></svg>
                    </div>
                </a>

                <div class="ml-40 text-gray-600">
                    <p>{{$bf}} cal</p>
                </div>
                <div class="ml-40 text-gray-600">
                    <p>{{$l}} cal</p>
                </div>
                <div class="ml-40 text-gray-600">
                    <p>{{$es}} cal</p>
                </div>
                <div class="ml-40 text-gray-600">
                    <p>{{$d}} cal</p>
                </div>
            </div>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        let foodId;

        let foods = {
            'bf':[],
            'l':[],
            'es':[],
            'd':[]
        };

        function track(){
            let quantity = document.getElementById('quantity');
            let selectedRadio = document.querySelector('input[name="default-radio"]:checked');
            // console.log(meal , foodId , quantity.value , selectedRadio.value);
            foods[meal].push({
                'foodId':foodId,
                'quantity':quantity.value,
                'size':selectedRadio.value
            });
            document.getElementById('foodsInput').value = JSON.stringify(foods);
            quantity.value = "";
            selectedRadio.checked = false;
            hideContent();
        }

        let meal;
        function form(val) {
            meal = val;
            document.getElementById("pop").style.display = "grid";
            document.getElementById("gal").style.display = "none";
        }

        function content(val) {
            document.getElementById("popContent").style.display = "grid"
            document.getElementById("pop").style.display = "none";
            foodId = val;
            document.getElementById("food-img").src = `img/${foodId}.jpg`;
        }

        function hideContent() {
            // location.reload();
            document.getElementById("popContent").style.display = "none"
            document.getElementById("pop").style.display = "grid";
            console.log(foods);
        }

        

        function hide() {
            document.getElementById("pop").style.display = "none";
        }

        let CaloriesConsumed = @json(array_values($daily_cal_consumed));;

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
                animation: {
                    onComplete: function () {
                        const chartInstance = myLineChart;
                        const yScale = chartInstance.scales.y;
                        const ctx = chartInstance.ctx;
                        ctx.save();
                        ctx.strokeStyle = 'grey';
                        ctx.lineWidth = 2;
                        ctx.setLineDash([5, 5]);
                        ctx.beginPath();
                        ctx.moveTo(chartInstance.chartArea.left, yScale.getPixelForValue(1200));
                        ctx.lineTo(chartInstance.chartArea.right, yScale.getPixelForValue(1200));
                        ctx.stroke();
                        ctx.restore();
                    }
                }
            }
        })



        let t = ({{$tc}}/{{$maintenance}})*100;
        let p = ({{$p}}/{{$protein}})*100;
        let c = ({{$c}}/{{$carbs}})*100;
        let f = ({{$f}}/{{$fiber}})*100;
        let fat = ({{$fa}}/{{$fat}})*100;


            if(t<=100)
                chart('tChart',t,'Calories','#D97706');
            else
                chart('tChart',t,'Calories','#ec2d01');

            if(p<=100)
                chart('pChart',p,'Protiens','#D97706');
            else
                chart('pChart',p,'Protiens','#ec2d01');

            if(c<=100)
                chart('cChart',c,'Carbs','#D97706');
            else
                chart('cChart',c,'Carbs','#ec2d01');

            if(f<=100)
                chart('fChart',f,'Fiber','#D97706');
            else
                chart('fChart',f,'Fiber','#ec2d01');

            if(fat<=100)
                chart('fatChart',fat,'Fat','#D97706');
            else
                chart('fatChart',fat,'Fat','#ec2d01');
           

        window.onload = function() {
            setTimeout(() => {

            if(t<=100)
                chart('tChart',t,'Calories','#D97706');
            else
                chart('tChart',t,'Calories','#ec2d01');

            if(p<=100)
                chart('pChart',p,'Protiens','#D97706');
            else
                chart('pChart',p,'Protiens','#ec2d01');

            if(c<=100)
                chart('cChart',c,'Carbs','#D97706');
            else
                chart('cChart',c,'Carbs','#ec2d01');

            if(f<=100)
                chart('fChart',f,'Fiber','#D97706');
            else
                chart('fChart',f,'Fiber','#ec2d01');

            if(fat<=100)
                chart('fatChart',fat,'Fat','#D97706');
            else
                chart('fatChart',fat,'Fat','#ec2d01');

            }, 100);
        };

        

        function chart(id,val,name,col) {

            var ctx = document.getElementById(id).getContext('2d');

            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut', 
                data: {
                    // labels: ['Red', 'Blue', 'Yellow'], 
                    datasets: [{
                        label: name,
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
        // if (!window.location.href.includes("reloaded=true")) {
        //     window.location.href = window.location.href + (window.location.href.includes("?") ? "&" : "?") + "reloaded=true";
        // }

        document.getElementById('foodForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submissi
            document.getElementById('foodsInput').value = JSON.stringify(foods);
            this.submit(); // Manually submit the form
        });
        
    </script>

</body>
</html>
@else

<div>Error</div>

@endif