<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>



 <nav class="relative px-4 py-4 flex justify-center items-center bg-gray-700 transition duration-300 ease-in-out">

    <a class="text-3xl font-bold leading-none" href="{{route('homepage')}}">
      <img src="{{URL('images/elaw.png')}}" class="h-10 " alt="">
   </a>
   <a class="text-3xl font-bold leading-none" href="{{route('homepage')}}">
     <img src="{{URL('images/legalboxteal.png')}}" class="h-10 ml-1 " alt="">
  </a>    
  </ul>
 
</nav>

 
 

<div class="flex mt-10 min-h-screen items-start justify-center  ">
    <div class="container grid max-w-screen-xl gap-8  justify-center lg:grid-cols-2 lg:grid-rows-2">
      <div class="row-span-2 flex flex-col rounded-md border bg-gray-800 border-slate-200 m-5">

              <h1 class="mb-2 ml-10 text-3xl pt-10 font-extrabold text-gray-900 text-white md:text-5xl sm:text-5xl lg:text-5xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">{{$case->title}}</span></h1>

        <div class="p-10">

          <p class=" text-slate-500">{{$case->case_description}}</p>

        </div>
      </div>
      <div class="flex rounded-md border border-slate-200 bg-gray-800 m-5">
        <div class="flex-1 p-10">
          <h3 class="text-xl font-medium text-blue-300">Client Name</h3>
          <p class="mb-2 text-slate-500">{{$case->name}}</p>

          <h3 class="text-xl font-medium text-blue-300 mt-3">Client Surname</h3>
          <p class="mb-2 text-slate-500">{{$case->surname}}</p>

          <h3 class="text-xl font-medium text-blue-300 mt-3">Summary</h3>
          <p class="mb-2 text-slate-500">{{$case->case_summary}}</p>

          <h3 class="text-xl font-medium text-blue-300 mt-3">Case Progress</h3>
          <progress class="progress progress-info w-56 bg-gray-700" value="{{$case->case_progress}}" max="100"></progress>
          <p class="mb-2 text-slate-500">{{$case->case_progress}} %</p>


  
        </div>
  
        <div class="relative hidden h-full w-1/3 overflow-hidden lg:block">
        
        </div>
      </div>
      
      <div class="flex rounded-md border  m-5 bg-gray-800">
        
        <div class="flex-1 p-10">
            <button class="btn btn-outline btn-success mr-2 mb-2">Edit Case</button>
            <button class="btn btn-outline btn-error mr-2 mb-2">Remove Case</button>
            <button class="btn btn-outline btn-success mr-2 mb-2 ">Back to Dashboard</button>
        </div>
  
        
      </div>
    </div>
  </div>
</body>

</html>