<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Discussion Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex flex-col overflow-hidden">

  <!-- Top Navigation Bar -->
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

  <!-- Main content area with side navigation and discussion content -->
  <div class="grid grid-cols-7 h-screen text-3xl font-semibold" id="content">

    <!-- Side Navigation -->
    <div class="bg-gray-50  pt-24 pl-14">
            <ul class="flex flex-col">
                <li class="pt-5"><a href="/home"><p class="hover:text-indigo-600">Home</p></a></li>
                <li class="pt-12"><a href="/diet"><p class="hover:text-indigo-600">Diet</p></a></li>
                <li class="pt-12"><a href="/workout"><p class="hover:text-indigo-600">WorkOut</p></a></li>
                <li class="pt-12"><a href="/discussion"><p class="text-indigo-600">Discussion</p></a></li>
                <li class="pt-12"><a href="/landing"><p class="hover:text-indigo-600">Logout</p></a></li>
            </ul>
        </div>

    <!-- Main discussion area -->
    <div class="col-span-6 flex-1 overflow-y-auto p-6 space-y-6 mx-10 mb-40">
      <h1 class="text-3xl font-bold mb-8 text-center">Discussion Forum</h1>

      <div class="space-y-4">
        @foreach($datas as $data)
          <div class="bg-white p-4 rounded shadow-lg">
            <div class="text-xl text-gray-600 mb-2 {{ $data->username == session('username') ? 'text-right' : '' }}">👤 <strong>{{ $data->username }}</strong></div>
            <p class="break-words whitespace-normal text-lg">{{ $data->content }}</p>
          </div>
        @endforeach
      </div>

      <div class="bg-white border-t border-gray-300 p-4 fixed bottom-0 w-full">
        <form class="flex gap-4 w-2/3 mx-32" action="/post-content" method="POST">
          @csrf
          <input
            type="text"
            placeholder="Write a message..."
            class="w-1/2 flex-1 text-xl px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            name="content"
          />
          <button
            type="submit"
            class="px-4 text-xl py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
          >
            Send
          </button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
