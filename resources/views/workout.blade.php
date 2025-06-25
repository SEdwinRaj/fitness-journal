<!doctype html>
<html class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="output.css" rel="stylesheet">
  <link href="input.css" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="dark">
    <!----------------------------------------------Cardio Add Tab------------------------------------------------------------------------>
    <div class="absolute h-screen w-screen overflow-hidden backdrop-blur-md z-40" style="display: none;" id="popCardioContent" >
        <div class="h-1/3 w-1/3 m-auto shadow-2xl rounded-3xl overflow-hidden">

            <div class="flex float-end m-5 p-2 rounded-full backdrop-opacity-20 h-9 w-9 hover:cursor-pointer" onclick="hidePopCardioContent()">
                <svg fill="#D97706" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512.481 421.906L850.682 84.621c25.023-24.964 65.545-24.917 90.51.105s24.917 65.545-.105 90.51L603.03 512.377 940.94 850c25.003 24.984 25.017 65.507.033 90.51s-65.507 25.017-90.51.033L512.397 602.764 174.215 940.03c-25.023 24.964-65.545 24.917-90.51-.105s-24.917-65.545.105-90.51l338.038-337.122L84.14 174.872c-25.003-24.984-25.017-65.507-.033-90.51s65.507-25.017 90.51-.033L512.48 421.906z"></path></g></svg>
            </div>
            
           
            <div class="grid grid-cols-2 mt-20">
                <div class="m-auto text-3xl font-bold">
                    <h1>Duration</h1>
                </div>
                <div class="m-auto text-3xl font-bold">
                    <h1>Intensity</h1>
                </div>

                <input type='hidden' name='workid' id='workid'>

                <div class="ml-auto mt-14">
                    <input type="texy" id="duration" placeholder="Time in minutes" class="w-2/3 text-center focus:outline-none focus:ring-0 placeholder-gray-600 placeholder:text-center pb-2 text-xl border-b-2 border-gray-600"> 
                </div>
                <div class="mx-auto mt-5">
                    <div class="flex items-center mb-4">
                        <input id="low" type="radio" value="low" name="default-radio" class="w-4 h-4 bg-gray-100 border-none focus:ring-0 text-gray-500">
                        <label for="low" class="ms-2 text-xl text-gray-900">Low</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="medium" type="radio" value="medium" name="default-radio" class="w-4 h-4 bg-gray-100 border-none focus:ring-0 text-gray-500">
                        <label for="medium" class="ms-2 text-xl text-gray-900">Medium</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="high" type="radio" value="high" name="default-radio" class="w-4 h-4 bg-gray-100 border-none focus:ring-0 text-gray-500">
                        <label for="high" class="ms-2 text-xl text-gray-900">High</label>
                    </div>
                </div>

                <div class="font-bold pt-4 text-amber-600 text-2xl text-center col-span-2">
                
                    <button onclick="track()">Track workout</button>
                    
                </div>

            </div>
        </div>
    </div>

    <!----------------------------------------------Liftin Add Tab------------------------------------------------------------------------>
    <div class="absolute h-screen w-screen overflow-hidden backdrop-blur-md z-40" style="display: none;" id="popLiftingcontent" >
        <div class="h-1/3 w-1/3 m-auto shadow-2xl rounded-3xl overflow-hidden">

            <div class="flex float-end m-5 p-2 rounded-full backdrop-opacity-20 h-9 w-9 hover:cursor-pointer" onclick="hidePopLiftingContent()">
                <svg fill="#D97706" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512.481 421.906L850.682 84.621c25.023-24.964 65.545-24.917 90.51.105s24.917 65.545-.105 90.51L603.03 512.377 940.94 850c25.003 24.984 25.017 65.507.033 90.51s-65.507 25.017-90.51.033L512.397 602.764 174.215 940.03c-25.023 24.964-65.545 24.917-90.51-.105s-24.917-65.545.105-90.51l338.038-337.122L84.14 174.872c-25.003-24.984-25.017-65.507-.033-90.51s65.507-25.017 90.51-.033L512.48 421.906z"></path></g></svg>
            </div>

            <input type='hidden' name='workid' id='worklift'>
           
            <div class="grid grid-cols-3 mt-20">
                <div class="my-auto ml-14 text-3xl font-bold">
                    <h1>Sets</h1>
                </div>
                <div class="my-auto ml-14 text-3xl font-bold">
                    <h1>Reps</h1>
                </div>
                <div class="my-auto ml-10 text-3xl font-bold">
                    <h1>Weight</h1>
                </div>

                <div class="ml-6 mt-14">
                    <input type="text" id="set" placeholder="Sets" class="w-2/3 text-center focus:outline-none focus:ring-0 placeholder-gray-600 placeholder:text-center pb-2 text-xl border-b-2 border-gray-600"> 
                </div>
                <div class="ml-6 mt-14">
                    <input type="text" id="rep" placeholder="Reps" class="w-2/3 text-center focus:outline-none focus:ring-0 placeholder-gray-600 placeholder:text-center pb-2 text-xl border-b-2 border-gray-600"> 
                </div>
                <div class="ml-6 mt-14">
                    <input type="text" id="weight" placeholder="Weights in Kg" class="w-2/3 text-center focus:outline-none focus:ring-0 placeholder-gray-600 placeholder:text-center pb-2 text-xl border-b-2 border-gray-600"> 
                </div>
                <!-- <div class="mx-auto mt-5">
                    <div class="flex items-center mb-4">
                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 bg-gray-100 border-none focus:ring-0 text-gray-500">
                        <label for="default-radio-1" class="ms-2 text-xl text-gray-900">Low</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 bg-gray-100 border-none focus:ring-0 text-gray-500">
                        <label for="default-radio-1" class="ms-2 text-xl text-gray-900">Medium</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 bg-gray-100 border-none focus:ring-0 text-gray-500">
                        <label for="default-radio-1" class="ms-2 text-xl text-gray-900">High</label>
                    </div>
                </div> -->

            </div>
            <div class="font-bold mt-5 pt-4 text-amber-600 text-2xl text-center col-span-2">
                
                <button onclick="trackLifting()">Track workout</button>
                    
            </div>
        </div>
    </div>

    <!----------------------------------------------Cardio Search Tab------------------------------------------------------------------------------------->

    <div class="absolute h-screen w-screen overflow-hidden backdrop-blur-md" style="display:none;" id="popCardio" >
        <div class="h-2/3 w-1/3 m-auto bg-white shadow-2xl rounded-3xl overflow-hidden">
            <div class="flex float-right m-8 h-5 w-5 hover:cursor-pointer" onclick="hidePopCardio()">
                <svg fill="#D97706" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512.481 421.906L850.682 84.621c25.023-24.964 65.545-24.917 90.51.105s24.917 65.545-.105 90.51L603.03 512.377 940.94 850c25.003 24.984 25.017 65.507.033 90.51s-65.507 25.017-90.51.033L512.397 602.764 174.215 940.03c-25.023 24.964-65.545 24.917-90.51-.105s-24.917-65.545.105-90.51l338.038-337.122L84.14 174.872c-25.003-24.984-25.017-65.507-.033-90.51s65.507-25.017 90.51-.033L512.48 421.906z"></path></g></svg>
            </div>

            <div class="m-auto placeholder-amber-500">
                <input type="text" placeholder="Search here" class="w-2/3 h-10 placeholder-gray-800 focus:ring-amber-500 bg-gray-50 border-2 border-amber-500 opacity-55 rounded-2xl m-5 ml-24 p-3">
            </div>

            <div class="h-[32rem] w-full overflow-y-scroll">
            @foreach($Cardioworks as $work)
                <div class="grid grid-cols-3 w-[32rem] mt-5">
                    <div class="flex ml-24 w-[25rem] hover:cursor-pointer" onclick="cardioContent('{{$work->id}}')">
                        <div class="hover:cursor-pointer">
                            <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path></svg>
                        </div>  
                        <h1 class="pl-5 text-xl">{{$work->name}}</h1>
                    </div>
                            
                    <div onclick="cardioContent('{{$work->id}}')">
                        <svg class="h-9 ml-80 w-fit hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 72 72" style="fill:#D97706;"><path d="M36,12c13.255,0,24,10.745,24,24c0,13.255-10.745,24-24,24S12,49.255,12,36C12,22.745,22.745,12,36,12z M44,39	c1.657,0,3-1.343,3-3c0-1.657-1.343-3-3-3c-0.329,0-2.426,0-5,0c0-2.574,0-4.672,0-5c0-1.657-1.343-3-3-3c-1.657,0-3,1.343-3,3	c0,0.328,0,2.426,0,5c-2.574,0-4.671,0-5,0c-1.657,0-3,1.343-3,3c0,1.657,1.343,3,3,3c0.329,0,2.426,0,5,0c0,2.574,0,4.672,0,5	c0,1.657,1.343,3,3,3c1.657,0,3-1.343,3-3c0-0.328,0-2.426,0-5C41.574,39,43.671,39,44,39z"></path></svg>
                    </div>
                </div>
                <hr class="w-2/3 mt-2 ml-24 mb-2">
            @endforeach
            </div>

            <form id="foodForm" action="/save-works" method="POST">
                @csrf
                <input type="hidden" name="works" id="workInput">
                <input type="hidden" name="workName" id="workName">
                <div class="font-bold bg-white p-4 text-amber-600 text-2xl text-center">
                    <button type="Submit">Track Workout</button>
                </div>
            </form>
        </div>
    </div>

    <!----------------------------------------------Lifting Search Tab------------------------------------------------------------------------------------->

    <div class="absolute h-screen w-screen overflow-hidden backdrop-blur-md" style="display:none;" id="popLifting" >
        <div class="h-2/3 w-1/3 m-auto bg-white shadow-2xl rounded-3xl overflow-hidden">
            <div class="flex float-right m-8 h-5 w-5 hover:cursor-pointer" onclick="hidePopLifting()">
                <svg fill="#D97706" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512.481 421.906L850.682 84.621c25.023-24.964 65.545-24.917 90.51.105s24.917 65.545-.105 90.51L603.03 512.377 940.94 850c25.003 24.984 25.017 65.507.033 90.51s-65.507 25.017-90.51.033L512.397 602.764 174.215 940.03c-25.023 24.964-65.545 24.917-90.51-.105s-24.917-65.545.105-90.51l338.038-337.122L84.14 174.872c-25.003-24.984-25.017-65.507-.033-90.51s65.507-25.017 90.51-.033L512.48 421.906z"></path></g></svg>
            </div>

            <div class="m-auto placeholder-amber-500">
                <input type="text" placeholder="Search here" class="w-2/3 h-10 placeholder-gray-800 focus:ring-amber-500 bg-gray-50 border-2 border-amber-500 opacity-55 rounded-2xl m-5 ml-24 p-3">
            </div>

            <div class="h-[32rem] w-full overflow-y-scroll">
            @foreach($Liftingworks as $work)
                <div class="grid grid-cols-3 w-[32rem] mt-5">
                    <div class="flex ml-24 w-[25rem] hover:cursor-pointer" onclick="liftingContent('{{$work->id}}')">
                        <div class="hover:cursor-pointer">
                            <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path></svg>
                        </div>  
                        <h1 class="pl-5 text-xl">{{$work->name}}</h1>
                    </div>
                            
                    <div onclick="liftingContent('{{$work->id}}')">
                        <svg class="h-9 ml-80 w-fit hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 72 72" style="fill:#D97706;"><path d="M36,12c13.255,0,24,10.745,24,24c0,13.255-10.745,24-24,24S12,49.255,12,36C12,22.745,22.745,12,36,12z M44,39	c1.657,0,3-1.343,3-3c0-1.657-1.343-3-3-3c-0.329,0-2.426,0-5,0c0-2.574,0-4.672,0-5c0-1.657-1.343-3-3-3c-1.657,0-3,1.343-3,3	c0,0.328,0,2.426,0,5c-2.574,0-4.671,0-5,0c-1.657,0-3,1.343-3,3c0,1.657,1.343,3,3,3c0.329,0,2.426,0,5,0c0,2.574,0,4.672,0,5	c0,1.657,1.343,3,3,3c1.657,0,3-1.343,3-3c0-0.328,0-2.426,0-5C41.574,39,43.671,39,44,39z"></path></svg>
                    </div>
                </div>
                <hr class="w-2/3 mt-2 ml-24 mb-2">
            @endforeach
            </div>

            <form id="foodForm" action="/save-worklifting" method="POST">
                @csrf
                <input type="hidden" name="works" id="workInput1">
                <input type="hidden" name="workName" id="workName1">
                <div class="font-bold bg-white p-4 text-amber-600 text-2xl text-center">
                    <button type="Submit">Track Workout</button>
                </div>
            </form>
        </div>
    </div>

    <!-- bg-gradient-to-r from-red-700 to-red-500 -->
     <!-- dark:bg-amber-600 dark:text-white dark:border-amber-400 -->

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
                <li class="pt-5"><a href="/home"><p class="hover:text-indigo-600">Home</p></a></li>
                <li class="pt-12"><a href="/diet"><p class="hover:text-indigo-600">Diet</p></a></li>
                <li class="pt-12"><a href="/workout"><p class="text-indigo-600">WorkOut</p></a></li>
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
                <div class="h-32 flex rounded-xl m-auto w-1/2 shadow-2xl" id="ch">
                    <div >
                        <canvas id="tChart" class="p-4"></canvas>
                    </div>
                    <div class="my-auto ml-5 text-2xl">
                        <p class="mt-2">Calories Burned</p>
                        <p class="pt-2">{{$data->totalBurned}}</p>
                    </div>
                    
                </div>

                <div class="mx-auto text-4xl">
                    <p>Adios Amigo</p>
                </div>
            </div>

            <div class="grid grid-cols-2 w-1/2 mx-auto p-10 gap-x-20 mt-10">
                <div class="flex">
                    <h1 class="hover:cursor-pointer" onclick="cardioForm()">Cardio</h1>
                    <svg class="h-9 hover:cursor-pointer" onclick="cardioForm()" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 72 72" style="fill:#D97706;"><path d="M36,12c13.255,0,24,10.745,24,24c0,13.255-10.745,24-24,24S12,49.255,12,36C12,22.745,22.745,12,36,12z M44,39	c1.657,0,3-1.343,3-3c0-1.657-1.343-3-3-3c-0.329,0-2.426,0-5,0c0-2.574,0-4.672,0-5c0-1.657-1.343-3-3-3c-1.657,0-3,1.343-3,3	c0,0.328,0,2.426,0,5c-2.574,0-4.671,0-5,0c-1.657,0-3,1.343-3,3c0,1.657,1.343,3,3,3c0.329,0,2.426,0,5,0c0,2.574,0,4.672,0,5	c0,1.657,1.343,3,3,3c1.657,0,3-1.343,3-3c0-0.328,0-2.426,0-5C41.574,39,43.671,39,44,39z"></path></svg>
                </div>
                <div class="flex">
                    <h1 class="hover:cursor-pointer" onclick="liftingForm()">Weight lifting</h1>
                    <svg class="h-9 hover:cursor-pointer" onclick="liftingForm()" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 72 72" style="fill:#D97706;"><path d="M36,12c13.255,0,24,10.745,24,24c0,13.255-10.745,24-24,24S12,49.255,12,36C12,22.745,22.745,12,36,12z M44,39	c1.657,0,3-1.343,3-3c0-1.657-1.343-3-3-3c-0.329,0-2.426,0-5,0c0-2.574,0-4.672,0-5c0-1.657-1.343-3-3-3c-1.657,0-3,1.343-3,3	c0,0.328,0,2.426,0,5c-2.574,0-4.671,0-5,0c-1.657,0-3,1.343-3,3c0,1.657,1.343,3,3,3c0.329,0,2.426,0,5,0c0,2.574,0,4.672,0,5	c0,1.657,1.343,3,3,3c1.657,0,3-1.343,3-3c0-0.328,0-2.426,0-5C41.574,39,43.671,39,44,39z"></path></svg>
                </div>


                <div class=" text-gray-600">
                    <p>{{$data->cardio}} cal</p>
                </div>
                <div class=" text-gray-600">
                    <p>{{$data->lifting}} cal</p>
                </div>
            </div>

            <div class="grid grid-cols-2 text-5xl m-auto">
                <div class="col-span-2 m-auto my-10 text-amber-500">
                    <h1>Recommended to Burn More 🔥🔥</h1>
                </div>
            </div>

            <div class="grid grid-cols-4 mx-auto mt-20 mb-10"  id="gal">
                <div class="mx-auto h-80 w-80 rounded-2xl shadow-2xl border-2 border-gray-300">
                    <!-- <div class="h-44 w-60 bg-red-500 rounded-2xl mx-auto mt-3"></div> -->
                     <img src="img/push.jpg" class="rounded-2xl mx-auto -m-12 h-40 w-72">
                     <div class="mx-4 mt-24 text-gray-700">
                        <p>Push-ups burn fat by boosting metabolism and building lean muscle for higher calorie burn.</p>
                    </div>
                </div>
                <div class="mx-auto h-80 w-80 rounded-2xl shadow-2xl border-2 border-gray-300">
                    <img src="img/pull.jpg" class="rounded-2xl mx-auto -m-12 h-40 w-72">
                    <div class="mx-4 mt-24 text-gray-700">
                        <p>Pull-ups burn fat by engaging multiple muscles and increasing calorie expenditure.</p>
                    </div>
                </div>
                <div class="mx-auto h-80 w-80 rounded-2xl shadow-2xl border-2 border-gray-300">
                    <img src="img/squart.jpg" class="rounded-2xl mx-auto -m-12 h-40 w-72">
                    <div class="mx-4 mt-24 text-gray-700">
                        <p>Dumbbell curls sculpt muscle and boost metabolism, aiding fat burn.</p>
                    </div>
                </div>
                <div class="mx-auto h-80 w-80 rounded-2xl shadow-2xl border-2 border-gray-300">
                    <img src="img/gym.jpg" class="rounded-2xl mx-auto -m-12 h-40 w-72">
                    <div class="mx-4 mt-24 text-gray-700">
                        <p>Two-hand dumbbell curls build muscle and boost metabolism, aiding fat loss.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>

        let workout;

        let workinfo = [];

        // liftingForm - popLifting --> liftingContent  - popLiftingContent
        // cardioForm - popCardio -->  cardioContent - popCardioContent

        function content() {
            document.getElementById("popContent").style.display = "grid"
            // document.getElementById("pop").style.display = "none";
        }

        function hideContent() {
            document.getElementById("popContent").style.display = "none"
            // document.getElementById("pop").style.display = "grid";
        }

        function cardioForm() {
            workout = 'cardio';
            document.getElementById("popCardio").style.display = "grid";
            document.getElementById("gal").style.display = "none";
        }
        function cardioContent(id) {
            document.getElementById("workid").value = id;
            document.getElementById("popCardioContent").style.display = "grid";
        }
        function hidePopCardioContent() {
            document.getElementById("popCardioContent").style.display = "none";
        }
        function hidePopCardio() {
            document.getElementById("popCardio").style.display = "none";
            document.getElementById("gal").style.display = "grid";
        }

        function liftingForm() {
            workout = 'lifting';
            document.getElementById("popLifting").style.display = "grid";
            document.getElementById("gal").style.display = "none";
        }
        function liftingContent(id) {
            document.getElementById("worklift").value = id;
            document.getElementById("popLiftingcontent").style.display = "grid";
        }
        function hidePopLiftingContent() {
            document.getElementById("popLiftingcontent").style.display = "none";
            // document.getElementById('set').value= "";
            // document.getElementById('rep').value = "";
            // document.getElementById('weight').value = "";
        }
        function hidePopLifting() {
            document.getElementById("popLifting").style.display = "none";
            document.getElementById("gal").style.display = "grid";
        }
        function hide() {
            document.getElementById("pop").style.display = "none";
            document.getElementById("gal").style.display = "grid";
        }

        function track() {
            let id = document.getElementById('workid');
            let time = document.getElementById('duration');
            let selectedRadio = document.querySelector('input[name="default-radio"]:checked');

            if (!id || !time || !selectedRadio) {
                alert("Please fill out all fields.");
                return;
            }

            workinfo.push({
                'id': id.value,
                'time': time.value,
                'intencity': selectedRadio.value
            });

            document.getElementById('workInput').value = JSON.stringify(workinfo);
            document.getElementById("workName").value = workout;
            // console.log(workinfo);

            time.value = "";
            selectedRadio.checked = false;

            hidePopCardioContent();
        }

        function trackLifting() {
            let id = document.getElementById('worklift');
            let set = document.getElementById('set');
            let rep = document.getElementById('rep');
            let weight = document.getElementById('weight');

            if (!id || !set || !rep || !weight) {
                alert("Please fill out all fields.");
                return;
            }

            workinfo.push({
                'id': id.value,
                'set': set.value,
                'rep': rep.value,
                'weight': weight.value
            });

            document.getElementById('workInput1').value = JSON.stringify(workinfo);
            document.getElementById("workName1").value = workout;
            // console.log(workinfo);

            set.value = "";
            rep.value = "";
            weight.value = "";

            hidePopLiftingContent();
        }

        let CaloriesBurned = @json(array_values($daily_cal_burned));

        var ctx = document.getElementById('myLineChart').getContext('2d');

        var myLineChart = new Chart(ctx, {
            type: 'line', 
            data: {
                labels: Array.from({ length: 30 }, (_, i) => (i + 1).toString()), 
                datasets: [{
                    label: 'Calories Burned',
                    data: CaloriesBurned, 
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



        let t = ({{$burned}}/1000)*100;

        // chart('tChart',t);

        window.onload = function() {
            setTimeout(() => {
                chart('tChart',t);
            }, 100);
        };

        function chart(id,val) {

            var ctx = document.getElementById(id).getContext('2d');

            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut', 
                data: {
                    // labels: ['Red', 'Blue', 'Yellow'], 
                    datasets: [{
                        label: 'My First Dataset',
                        data: [val,100-val], 
                        borderWidth: 0,
                        backgroundColor: ['#D97706','#ddd'] 
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