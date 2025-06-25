<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./output.css" rel="stylesheet">
    <link href="input.css" rel="stylesheet">
    
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="h-screen w-screen bg-gray-100">
        <div class="h-5/6 w-5/6 backdrop-blur-2xl mx-auto mt-14 rounded-lg shadow-2xl p-6">
            <form action="/userdetail" method="POST">
                @csrf
                <div class="grid grid-cols-2 w-2/3 mx-auto text-3xl text-gray-800 font-bold mb-10">
                
                    <!-- <div class="ml-10 my-auto">
                        <p>Name :</p>
                    </div> -->
                    <div class="hidden">
                        <input class="bg-gray-50 rounded-2xl py-4 pl-10 mt-5 mb-7 text-xl shadow-2xl w-full" type="text" id="name" name="name" placeholder="Enter your Name" value="{{$name}}">
                    </div>
                    
                    <div class="ml-10 my-auto">
                        <p>Age :</p>
                    </div>
                    <div>
                        <input class="bg-gray-50 rounded-2xl py-4 pl-10 mt-5 mb-7 text-xl shadow-2xl w-full" type="number" id="age" name="age" placeholder="Enter your Age" required>
                    </div>

                    <div class="ml-10 my-auto">
                        <p>Height :</p>
                    </div>
                    <div>
                        <input class="bg-gray-50 rounded-2xl py-4 pl-10 mt-5 mb-7 text-xl shadow-2xl w-full" type="number" id="height" name="height" placeholder="Enter your Height" required>
                    </div>

                    <div class="ml-10 my-auto">
                        <p>Weight :</p>
                    </div>
                    <div>
                        <input class="bg-gray-50 rounded-2xl py-4 pl-10 mt-5 mb-7 text-xl shadow-2xl w-full" type="number" id="weight" name="weight" placeholder="Enter your Weight" required>
                    </div>

                    <div class="ml-10 my-auto">
                        <p>Desired Weight :</p>
                    </div>
                    <div>
                        <input class="bg-gray-50 rounded-2xl py-4 pl-10 mt-5 mb-7 text-xl shadow-2xl w-full" type="number" id="dweight" name="dweight" placeholder="Enter your Desired Weight" required>
                    </div>

                    <div class = "ml-10 my-auto">
                        <p>Gender :</p>
                    </div>
                    <div class="bg-gray-100 rounded-2xl shadow-2xl mt-5 mb-7">
                        <select id="gen" name='gen' class="pr-[23rem] text-gray-400 p-2 text-xl my-3 ml-10 bg-transparent w-2/3 hover:cursor-pointer">
                            <option selected>Gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                        </select>
                    </div>

                    <div class = "ml-10 my-auto">
                        <p>Life style :</p>
                    </div>
                    <div class="bg-gray-100 rounded-2xl shadow-2xl mt-5 mb-7">
                        <select id="lifeStyle" name='lifeStyle' class="pr-[23rem] text-gray-400 p-2 text-xl my-3 ml-10 bg-transparent w-2/3 hover:cursor-pointer">
                            <option selected>Life Style</option>
                            <option value="sedentary">Sedentary (little to no exercise)</option>
                            <option value="light">Light activity (1-3 days/week)</option>
                            <option value="moderate">Moderate activity (3-5 days/week)</option>
                            <option value="active">Very active (6-7 days/week)</option>
                            <option value="superactive">Super active (athletes)</option>
                        </select>
                    </div>



                    <div class="col-span-2 text-amber-500 text-center mt-14 text-4xl font-bold">
                        <button type="Submit">Next</button>
                    </div>
                
                </div>
            </form>
        </div>
    </div>

    <script>
        window.onload = function () {
            // document.getElementById('name').value = "";
            document.getElementById('age').value = "";
            document.getElementById('height').value = "";
            document.getElementById('weight').value = "";
            document.getElementById('dweight').value = "";
            document.getElementById('gen').selectedIndex = 0;
            document.getElementById('lifeStyle').selectedIndex = 0;
        };
    </script>
</body>
</html>