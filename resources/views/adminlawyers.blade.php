<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
</head>




<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()">
        <div class="flex p-0 m-0 antialiased text-gray-900 " >
         
          <div
            x-ref="loading"
            class="fixed h-screen inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-neutral"
          >
            <img src="{{URL('images/elaw.png')}}" alt="">
          </div>
  
          <!-- Sidebar -->
          <div class="z-10 fixed flex h-screen flex-shrink-0 transition-all">
            <div
              x-show="isSidebarOpen"
              @click="isSidebarOpen = false"
              class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden"
            ></div>
            <div x-show="isSidebarOpen" class="fixed inset-y-0 z-10 w-16 bg-white"></div>

            
  
            <!-- Mobile bottom bar -->
            <nav
              aria-label="Options"
              class="fixed inset-x-0 bottom-0 flex flex-row-reverse items-center justify-between px-4 py-2 bg-neutral  border-indigo-100 sm:hidden shadow-t rounded-t-3xl"
            >
              <!-- Menu button -->
              <button
                @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                class="p-2 transition-colors rounded-lg bg-neutral-800 shadow-md  hover:text focus:outline-none focus:ring focus:ring-blue-600 focus:ring-offset-white focus:ring-offset-2"
                :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-blue-600' : 'text-gray-500 '"
              >
                <span class="sr-only">Toggle sidebar</span>
                <svg
                  aria-hidden="true"
                  class="w-6 h-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
              </button>
  
              <!-- Logo -->
              <a href="#">
                <img
                  class="w-10 h-auto"
                  src="{{URL('images/elaw.png')}}"
                  alt="K-UI"
                />
              </a>
  
              <!-- User avatar button -->
              <div class="relative flex items-center flex-shrink-0 p-2 " x-data="{ isOpen: false }">
                <button
                  @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                  class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-blue-600 focus:ring-offset-white focus:ring-offset-2"
                >
                  <img
                    class="w-8 h-8 rounded-lg shadow-md"
                    src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                    alt="Ahmed Kamel"
                  />
                  <span class="sr-only">User menu</span>
                </button>
                <div
                  x-show="isOpen"
                  @click.away="isOpen = false"
                  @keydown.escape="isOpen = false"
                  x-ref="userMenu"
                  tabindex="-1"
                  class="absolute w-48 py-1 mt-2 origin-bottom-left bg-blue-300 rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                  role="menu"
                  aria-orientation="vertical"
                  aria-label="user menu"
                >
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                    >Your Profile</a
                  >

                  
  
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Create/Update Profile</a>
  
                  <a href="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                </div>
              </div>
              
            </nav>
  
            <!-- Left mini bar -->
            <nav
              aria-label="Options"
              class=" z-20 flex-col items-center flex-shrink-0 hidden w-16 py-4 bg-neutral shadow-md sm:flex rounded-tr-3xl rounded-br-3xl"
            >
              <!-- Logo -->
              <div class="flex-shrink-0 py-4">
                <a href="#">
                  <img
                    class="w-10 h-auto"
                    src="{{URL('images/elaw.png')}}"
                    alt="K-UI"
                  />
                </a>
              </div>
              <div class="flex flex-col items-center flex-1 p-2 space-y-4">
                <!-- Menu button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                  class="p-2 transition-colors bg-neutral-800 rounded-lg shadow-md  hover:text-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-offset-white focus:ring-offset-2"
                  :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-indigo-600' : 'text-gray-500 '"
                >
                  <span class="sr-only">Toggle sidebar</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                  </svg>
                </button>
                <!-- Messages button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'messagesTab'"
                  class="p-2 transition-colors bg-blue-300 rounded-lg shadow-md  hover:text-blue-300 hover:bg-teal-300 duration-300  focus:outline-none focus:ring focus:ring-blue-300  focus:ring-offset-white focus:ring-offset-2"
                  :class="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? 'text-white bg-teal-300' : 'text-gray-500 '"
                >
                  <span class="sr-only">Toggle message panel</span>
            
                  
                  <svg 
                   aria-hidden="true"
                  class="w-6 h-6"
              
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Edit / Add_Plus"> <path id="Vector" d="M6 12H12M12 12H18M12 12V18M12 12V6" stroke="#878787" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                 
                 
                </button>
                <!-- Notifications button -->
                <button
                  @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab'"
                  class="p-2 transition-colors bg-neutral-800 rounded-lg shadow-md  hover:text-blue-300  focus:outline-none focus:ring focus:ring-blue-300 focus:ring-offset-white focus:ring-offset-2"
                  :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-indigo-600' : 'text-gray-500 '"
                >
                  <span class="sr-only">Toggle case adding panel</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                    />
                  </svg>
                </button>
              </div>
  
              <!-- User avatar -->
              <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
                <button
                  @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                  class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-offset-white focus:ring-offset-2"
                >
                  <img
                    class="w-10 h-10 rounded-lg shadow-md"
                    src="{{URL('images/avatar.png')}}"
                    alt="Ahmed Kamel"
                  />
                  <span class="sr-only">User menu</span>
                </button>
                <div
                  x-show="isOpen"
                  @click.away="isOpen = false"
                  @keydown.escape="isOpen = false"
                  x-ref="userMenu"
                  tabindex="-1"
                  class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                  role="menu"
                  aria-orientation="vertical"
                  aria-label="user menu"
                >
                  <a href="{{route('userprofile')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                    >Your Profile</a
                  >
  
                  <a href="{{route('lawyerup')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Create/Update Profile</a>
  
                  <a href="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
                </div>
              </div>
            </nav>
  
            <div
              x-transition:enter="transform transition-transform duration-300"
              x-transition:enter-start="-translate-x-full"
              x-transition:enter-end="translate-x-0"
              x-transition:leave="transform transition-transform duration-300"
              x-transition:leave-start="translate-x-0"
              x-transition:leave-end="-translate-x-full"
              x-show="isSidebarOpen"
              class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 bg-blue-200   shadow-lg sm:left-16 rounded-tr-3xl rounded-br-3xl sm:w-72 lg:static lg:w-64"
            >
              <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center flex-shrink-0 py-10">
                  <a href="#">
                    <!-- <svg
                      class="text-indigo-600"
                      width="96"
                      height="53"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.691 34.703L13.95 28.2 32.09 52h8.087L18.449 23.418 38.594.813h-8.157L7.692 26.125V.812H.941V52h6.75V34.703zm27.61-7.793h17.156v-5.308H35.301v5.308zM89.19 13v22.512c0 3.703-1.02 6.574-3.058 8.613-2.016 2.04-4.934 3.059-8.754 3.059-3.773 0-6.68-1.02-8.719-3.059-2.039-2.063-3.058-4.945-3.058-8.648V.813h-6.68v34.874c.047 5.297 1.734 9.458 5.062 12.481 3.328 3.023 7.793 4.535 13.395 4.535l1.793-.07c5.156-.375 9.234-2.098 12.234-5.168 3.024-3.07 4.547-7.02 4.57-11.848V13h-6.785zM89 8h7V1h-7v7z"
                      />
                    </svg> -->
                    <img
                      class="w-24 h-auto"
                      src="{{URL('images/legalbox.png')}}"
                      alt="K-UI"
                    />
                  </a>
                </div>
  
                <!-- Links -->
                <div class="flex-1 px-4 space-y-2 overflow-hidden hover:overflow-auto">
                  <a href="#" class="flex items-center w-full space-x-2 text-white bg-blue-300 rounded-lg">
                    <span aria-hidden="true" class="p-2 bg-blue-300 rounded-lg">
                      <svg
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                        />
                      </svg>
                    </span>
                    <span>Home</span>
                  </a>
                  <a
                    href="{{route('lawyertasks')}}"
                    class="flex items-center space-x-2 text-blue-800 transition-colors rounded-lg group hover:bg-blue-300 hover:text-white"
                  >
                    <span
                      aria-hidden="true"
                      class="p-2 transition-colors rounded-lg group-hover:bg-blue-300 group-hover:text-white"
                    >
                      <svg
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                        />
                      </svg>
                    </span>
                    <span>Tasks</span>
                  </a>
                </div>
  
               
              </nav>
  
              <section x-show="currentSidebarTab == 'messagesTab'" class="px-2 py-2">
                <h2 class="text-xl">Add a case</h2>
           <!-- ADD A CASE -->
                <form class="pt-10" action="{{route('saveCase')}}" method="post">
                  @csrf

                  @if(Session::has('success'))
                  <div class="flex rounded-lg items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                      <p>{{Session::get('success')}}</p>
                    </div>
                    @endif
                   

                    @if(Session::has('fail'))
                    <div class="flex rounded-lg items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>{{Session::get('fail')}}.</p>
                      </div>
                      @endif

                          @error('name') 
                          <div class="bg-red-200 border border-red-400 text-red-700 px-2 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{$message}} </span>
                          </div>
                          @enderror

                

                  <div class="">
                    <h2>Case Title</h2>
                    <input type="text" name="title"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
                  </div>
                  <div class="">
                    <h2>Client Name</h2>
                    <input type="text" name="name"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
                  </div>
                  <div class="">
                    <h2>Client Surname</h2>
                    <input type="text" name="surname"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
                  </div>
                  <div class="">
                    <h2>Case Summary</h2>
                    <input type="text" name="case_summary"  class="input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" />
                  </div>

                  <div class="">
                    <h2>Case Description</h2>
                    <textarea type="text" name="case_description"  class="align-center input text-blue-300 input-bordered input-teal-500 w-full max-w-xs" ></textarea>
                  </div>

                  <div class="">
                    <h2>Case Progress</h2>
                    <input type="number" name="case_progress" min="0" max="100"    class="align-center input text-blue-300 input-bordered input-teal-500 w-full max-w-xs"  />
                    <div class="w-full flex justify-between text-xs px-2">
                    </div>
                      
                  <div class="pt-2">
                    <button class="btn border-none bg-teal-400 text-black hover:bg-blue-400 duration-300 hover:shadow-l" type="submit">Add Case</button>
                  </div>
              
 
                </form>
           <!-- ADD A CASE -->
              </section>
  
              <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
                <h2 class="text-xl">Notifications</h2>
              </section>
            </div>
          </div>
          <div class="flex flex-col flex-1 ">
            <header class="relative flex items-center justify-between flex-shrink-0 p-4">
              <form action="#" class="flex-1">
           
              </form>
              
  
              <!-- Mobile sub header button -->
              <button
                @click="isSubHeaderOpen = !isSubHeaderOpen"
                class="p-2 text-gray-400 bg-neutral rounded-lg shadow-md sm:hidden hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
              >
                <span class="sr-only">More</span>
  
                <svg
                  aria-hidden="true"
                  class="w-6 h-6"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                  />
                </svg>
              </button>
  
              <!-- Mobile sub header -->
              <div
                x-transition:enter="transform transition-transform"
                x-transition:enter-start="translate-y-full opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100"
                x-transition:leave="transform transition-transform"
                x-transition:leave-start="translate-y-0 opacity-100"
                x-transition:leave-end="translate-y-full opacity-0"
                x-show="isSubHeaderOpen"
                @click.away="isSubHeaderOpen = false"
                class="absolute flex items-center justify-between p-2 bg-blue-300 rounded-md shadow-lg sm:hidden top-16 left-5 right-5"
              >
                <!-- Seetings button -->
                <button
                  @click="isSettingsPanelOpen = true; isSubHeaderOpen = false"
                  class="p-2 text-gray-400 bg-blue-200 rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
                >
                  <span class="sr-only">Create/Update Profile</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                  </svg>
                </button>
                <!-- Messages button -->
                <button
                  @click="isSidebarOpen = true; currentSidebarTab = 'messagesTab'; isSubHeaderOpen = false"
                  class="p-2 text-gray-400 bg-blue-200 rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
                >
                  <span class="sr-only">Toggle message panel</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                    />
                  </svg>
                </button>
                <!-- Notifications button -->
                <button
                  @click="isSidebarOpen = true; currentSidebarTab = 'notificationsTab'; isSubHeaderOpen = false"
                  class="p-2 text-gray-400 bg-blue-200 rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4"
                >
                  <span class="sr-only">Toggle notifications panel</span>
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                    />
                  </svg>
                </button>
                <!-- Github link -->
                
              </div>
            </header>
  
            <div class="flex flex-2">
              <!-- Main -->
              <main class="ml-20 flex items-start justify-center flex-1 pl-20 py- ">
     
                <!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<div class="w-auto  flex flex-row  items-center justify-center ml-10 mr-10 px-10 py-5">
    
    <div>
    <!-- USER CARD -->
    <div class="bg-indigo-600 text-white ml-10  rounded shadow-xl py-5 px-5 w-full lg:w-10/12 xl:w-3/4" x-data="{welcomeMessageShow:true}" x-show="welcomeMessageShow" x-transition:enter="transition-all ease duration-500 transform" x-transition:enter-start="opacity-0 scale-110" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease duration-500 transform" x-transition:leave-end="opacity-0 scale-90">
        <div class="flex flex-wrap -mx-3 items-center">
            <div class="w-1/4 px-3 text-center hidden md:block">
                <div class="p-5 xl:px-8 md:py-5">
                    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 868 731"><style>.st0{opacity:.5;fill:#434190;enable-background:new}.st1{fill:url(#SVGID_1_)}.st2{fill:url(#SVGID_2_)}.st3{fill:#434190}.st4{fill:url(#SVGID_3_)}.st5{fill:url(#SVGID_4_)}.st6{fill:url(#SVGID_5_)}.st7{fill:url(#SVGID_6_)}.st8{fill:url(#SVGID_7_)}.st9{fill:url(#SVGID_8_)}.st10{fill:url(#SVGID_9_)}.st11{fill:url(#SVGID_10_)}.st12{fill:url(#SVGID_11_)}.st13{fill:url(#SVGID_12_)}.st14{fill:url(#SVGID_13_)}.st15{fill:url(#SVGID_14_)}.st16{fill:url(#SVGID_15_)}.st17{fill:url(#SVGID_16_)}.st18{fill:url(#SVGID_17_)}.st19{fill:#fff}.st20{fill:url(#SVGID_18_)}.st21{fill:url(#SVGID_19_)}.st22{fill:url(#SVGID_20_)}.st23{opacity:.5;enable-background:new}.st24{fill:url(#SVGID_21_)}.st25{fill:#263238}.st26{fill:#f8c198}.st27{fill:#ff9800}.st28,.st29{opacity:.2}.st29{fill:#fff;enable-background:new}</style><title>welcome</title><path class="st0" d="M179 68.2h510v595.5H179V68.2z"/><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="731.5" y1="102" x2="731.5" y2="627" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-color="gray" stop-opacity=".25"/><stop offset=".54" stop-color="gray" stop-opacity=".12"/><stop offset="1" stop-color="gray" stop-opacity=".1"/></linearGradient><path class="st1" d="M595 105h273v525H595V105z"/><linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="136.5" y1="100" x2="136.5" y2="625" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-color="gray" stop-opacity=".25"/><stop offset=".54" stop-color="gray" stop-opacity=".12"/><stop offset="1" stop-color="gray" stop-opacity=".1"/></linearGradient><path class="st2" d="M0 107h273v525H0V107z"/><path class="st3" d="M604 113h255v506H604V113zM264 619H9V113h255v506z"/><linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="136.5" y1="542" x2="136.5" y2="573" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st4" d="M51 159h171v31H51v-31z"/><linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="732.5" y1="495" x2="732.5" y2="526" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st5" d="M647 206h171v31H647v-31z"/><linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="731.5" y1="447" x2="731.5" y2="478" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st6" d="M646 254h171v31H646v-31z"/><linearGradient id="SVGID_6_" gradientUnits="userSpaceOnUse" x1="731.5" y1="399" x2="731.5" y2="430" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st7" d="M646 302h171v31H646v-31z"/><linearGradient id="SVGID_7_" gradientUnits="userSpaceOnUse" x1="731.5" y1="351" x2="731.5" y2="382" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st8" d="M646 350h171v31H646v-31z"/><linearGradient id="SVGID_8_" gradientUnits="userSpaceOnUse" x1="731.5" y1="303" x2="731.5" y2="334" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st9" d="M646 398h171v31H646v-31z"/><linearGradient id="SVGID_9_" gradientUnits="userSpaceOnUse" x1="731.5" y1="255" x2="731.5" y2="286" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st10" d="M646 446h171v31H646v-31z"/><linearGradient id="SVGID_10_" gradientUnits="userSpaceOnUse" x1="731.5" y1="207" x2="731.5" y2="238" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st11" d="M646 494h171v31H646v-31z"/><linearGradient id="SVGID_11_" gradientUnits="userSpaceOnUse" x1="731.5" y1="159" x2="731.5" y2="190" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st12" d="M646 542h171v31H646v-31z"/><linearGradient id="SVGID_12_" gradientUnits="userSpaceOnUse" x1="731.5" y1="542" x2="731.5" y2="573" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st13" d="M646 159h171v31H646v-31z"/><linearGradient id="SVGID_13_" gradientUnits="userSpaceOnUse" x1="51" y1="508.5" x2="222" y2="508.5" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st14" d="M51 208h171v31H51v-31z"/><linearGradient id="SVGID_14_" gradientUnits="userSpaceOnUse" x1="51" y1="461.5" x2="222" y2="461.5" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st15" d="M51 255h171v31H51v-31z"/><linearGradient id="SVGID_15_" gradientUnits="userSpaceOnUse" x1="51" y1="414.5" x2="222" y2="414.5" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st16" d="M51 302h171v31H51v-31z"/><linearGradient id="SVGID_16_" gradientUnits="userSpaceOnUse" x1="51" y1="366.5" x2="222" y2="366.5" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st17" d="M51 350h171v31H51v-31z"/><linearGradient id="SVGID_17_" gradientUnits="userSpaceOnUse" x1="51" y1="318.5" x2="222" y2="318.5" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st18" d="M51 398h171v31H51v-31z"/><path class="st19" d="M55 163h164v24H55v-24zm-.5 47h164v24h-164v-24zm0 48h164v24h-164v-24zm0 48h164v24h-164v-24zm0 48h164v24h-164v-24zm0 48h164v24h-164v-24z"/><linearGradient id="SVGID_18_" gradientUnits="userSpaceOnUse" x1="51" y1="270.5" x2="222" y2="270.5" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-opacity=".12"/><stop offset=".55" stop-opacity=".09"/><stop offset="1" stop-opacity=".02"/></linearGradient><path class="st20" d="M51 446h171v31H51v-31z"/><path class="st19" d="M54.5 450h164v24h-164v-24z"/><path class="st19" d="M54.5 450h164v24h-164v-24zm0 48h164v24h-164v-24zm0 48h164v24h-164v-24zM650 162h164v24H650v-24zm0 48h164v24H650v-24zm0 48h164v24H650v-24zm0 48h164v24H650v-24zm0 48h164v24H650v-24zm0 48h164v24H650v-24zm0 48h164v24H650v-24zm0 48h164v24H650v-24zm0 48h164v24H650v-24z"/><linearGradient id="SVGID_19_" gradientUnits="userSpaceOnUse" x1="132" y1="68" x2="735" y2="68" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-color="gray" stop-opacity=".25"/><stop offset=".54" stop-color="gray" stop-opacity=".12"/><stop offset="1" stop-color="gray" stop-opacity=".1"/></linearGradient><path class="st21" d="M132 645h603v38H132v-38z"/><path class="st3" d="M137 649h594v30H137v-30z"/><linearGradient id="SVGID_20_" gradientUnits="userSpaceOnUse" x1="435" y1="643" x2="435" y2="682" gradientTransform="matrix(1 0 0 -1 0 732)"><stop offset="0" stop-color="gray" stop-opacity=".25"/><stop offset=".54" stop-color="gray" stop-opacity=".12"/><stop offset="1" stop-color="gray" stop-opacity=".1"/></linearGradient><path class="st22" d="M134 50h602v39H134V50z"/><path class="st3" d="M137 53h594v30H137V53z"/><path class="st23" d="M289 113h292v506H289V113z"/><linearGradient id="SVGID_21_" gradientUnits="userSpaceOnUse" x1="601" y1="27.2" x2="601" y2="326.022" gradientTransform="matrix(1 0 0 -1 -166 647.5)"><stop offset="0" stop-color="gray" stop-opacity=".25"/><stop offset=".54" stop-color="gray" stop-opacity=".12"/><stop offset="1" stop-color="gray" stop-opacity=".1"/></linearGradient><path class="st24" d="M659.7 333c7 9.4-3.5 20.5-3.5 20.5l1.8.6c-2.6 2.9-12.8 15.8-52.3 74.4-50.5 75-118.5 93.7-118.5 93.7-8.3-6.5-17.7-11.3-27.7-14.3v-7.1c26.1-7.7 46.7-27.7 55.3-53.5 6-11.9 9.2-25.1 9.1-38.4 0-48-39.8-86.9-88.8-86.9s-88.8 38.9-88.8 86.9c0 13.4 3.1 26.5 9.1 38.4 8.6 25.8 29.2 45.8 55.3 53.5v7.1c-10.1 3-19.5 7.8-27.7 14.3 0 0-68.1-18.7-118.6-93.7-39.4-58.6-49.7-71.5-52.3-74.4l1.8-.6s-10.5-11.1-3.5-20.5-46.1-20.5-40.1 0 13.9 30.7 13.9 30.7 111.2 175.4 169.2 204.4c-1.4 5.9-2.1 12-2.1 18.1v34.1h167.2v-34.1c0-6.1-.7-12.2-2.1-18.1 58-29 169.2-204.4 169.2-204.4s7.8-10.2 13.9-30.7-46.8-9.3-39.8 0z"/><circle class="st25" cx="435" cy="413.5" r="85.1"/><circle class="st26" cx="435" cy="426.8" r="80.1"/><circle class="st25" cx="403.3" cy="409.3" r="10"/><circle class="st25" cx="468.4" cy="409.3" r="10"/><path class="st19" d="M458.4 463.5c0 6-10.5 15.9-23.4 15.9s-23.4-9.9-23.4-15.9 10.5-5.8 23.4-5.8 23.4-.2 23.4 5.8z"/><circle class="st19" cx="405.8" cy="409.3" r="3.3"/><circle class="st19" cx="471.7" cy="409.3" r="3.3"/><path class="st25" d="M443 382.4c-4.9 0-9.3-4.2-9.8-9.1-.3-5 2.4-9.7 7-11.8.5-.2 1-.4 1.5-.4 1.7 0 2.5 2 3 3.6 1.7 4.9 4.7 9.7 9.3 12s11.2 1.1 13.7-3.5c-6.6-3-9.5-12.2-5.6-18.4 1.5-2.4 3.8-4.4 4.3-7.1.9-5-4.6-8.6-9.5-10.1-14-4.3-62.8-4.8-65.5 16.1-2.7 22.1 36.2 31.6 51.6 28.7z"/><ellipse transform="rotate(-21.534 358.22 427.678)" class="st26" cx="358.3" cy="427.7" rx="5" ry="14.2"/><ellipse transform="rotate(-68.469 511.725 427.634)" class="st26" cx="511.7" cy="427.6" rx="14.2" ry="5"/><path class="st27" d="M484.9 524.3s65.2-18.3 113.5-91.7 50.9-73.6 50.9-73.6l25.8 10.2S555 562.7 503.3 572.7s-18.4-48.4-18.4-48.4z"/><path class="st26" d="M646.8 359.3s10-10.8 3.3-20 44.2-20 38.4 0-13.3 30-13.3 30l-28.4-10z"/><path class="st27" d="M385.1 524.3s-65.2-18.3-113.5-91.7-50.9-73.6-50.9-73.6l-25.9 10.2s120.1 193.5 171.8 203.5 18.5-48.4 18.5-48.4z"/><path class="st26" d="M223.2 359.3s-10-10.8-3.3-20-44.2-20-38.4 0 13.3 30 13.3 30l28.4-10z"/><g class="st28"><path class="st19" d="M462.3 342.8c-.5 2.8-2.8 4.8-4.3 7.1-3.4 5.4-1.6 13.2 3.3 17-1.4-3.6-1.1-7.8.9-11.1 1.5-2.4 3.8-4.4 4.3-7.1.5-3.1-1.4-5.7-4.1-7.6 0 .5 0 1.1-.1 1.7zM441.5 362c-.3-.8-.6-1.5-.9-2.3-.5-1.6-1.4-3.5-3-3.6-.5 0-1 .1-1.5.4-4.6 2.1-7.3 6.8-7 11.8.4 3 2 5.6 4.5 7.4l-.3-1.5c-.3-5 2.4-9.7 7-11.8.3-.2.7-.3 1.2-.4zm-7.1 15.9c-12.2.5-31.8-4.1-41.5-14 7.2 15.4 37 21.8 50 19.3-3.5-.2-6.8-2.2-8.5-5.3zm28.3-8.3c-2.9 3.4-8.6 4.1-12.8 2.1-1.4-.7-2.6-1.6-3.7-2.6 1.6 3.6 4.4 6.6 7.9 8.4 4.7 2.3 11.2 1.1 13.7-3.5-2.1-.9-3.9-2.4-5.1-4.4z"/></g><path class="st29" d="M671.8 369.3S551.7 562.8 500 572.8c-3 .6-6 1-9.1 1.1 4.2.1 8.3-.3 12.4-1.1 51.7-10 171.8-203.5 171.8-203.5l-2.7-1c-.3.7-.5 1-.6 1zm-473.7 0S318.2 562.8 370 572.8c3 .6 6 1 9.1 1.1-4.2.1-8.3-.3-12.4-1.1-51.7-10-171.8-203.5-171.8-203.5l2.7-1c.3.7.5 1 .5 1z"/><path class="st27" d="M435 506.9c44.2 0 80.1 35.8 80.1 80.1v33.4H354.9V587c0-44.3 35.9-80.1 80.1-80.1z"/><path class="st29" d="M435.8 507.3c-2.9 0-5.8.2-8.7.5 1 0 1.9-.1 2.9-.1 44.2 0 80.1 35.8 80.1 80.1v32.9h5.8v-33.3c0-44.3-35.9-80.1-80.1-80.1z"/><path class="st29" d="M434.2 507.3c2.9 0 5.8.2 8.7.5-1 0-1.9-.1-2.9-.1-44.2 0-80.1 35.8-80.1 80.1v32.9h-5.8v-33.3c0-44.3 35.9-80.1 80.1-80.1z"/><path class="st26" d="M435 484.8c12.9 0 23.4 10.5 23.4 23.4v9.6c0 12.9-10.5 23.3-23.4 23.3-12.9 0-23.4-10.5-23.4-23.3v-9.6c0-13 10.5-23.4 23.4-23.4z"/></svg>
                </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-2/4 px-3 text-left">
                <div class="p-5 xl:px-8 md:py-5">
                    <h3 class="text-2xl">Welcome, Scott!</h3>
                    <h5 class="text-xl mb-3">Lorem ipsum sit amet</h5>
                    <p class="text-sm text-indigo-200">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro sit asperiores perferendis odit enim natus ipsum reprehenderit eos eum impedit tenetur nemo corporis laboriosam veniam dolores quos necessitatibus, quaerat debitis.</p>
                </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/4 px-3 text-center">
                <div class="p-5 xl:px-8 md:py-5">
                    <a class="block w-full py-2 px-4 rounded text-indigo-600 bg-gray-200 hover:bg-white hover:text-gray-900 focus:outline-none transition duration-150 ease-in-out mb-3" href="https://codepen.io/ScottWindon" target="_blank">Find out more?</a>
                    <button class="w-full py-2 px-4 rounded text-white bg-indigo-900 hover:bg-gray-900 focus:outline-none transition duration-150 ease-in-out" @click.prevent="welcomeMessageShow=false;setTimeout(()=>{welcomeMessageShow=true},2000)">No thanks</button>
                </div>
            </div>
        </div>
    </div>
</div>



   
</div>







              
                 
                
                     

                
                      
              </main>

              
            </div>
          </div>
        </div>
  
        <!-- Panels -->
  
        <!-- Settings Panel -->
        <!-- Backdrop -->
        <div
          x-show="isSettingsPanelOpen"
          class="fixed inset-0 bg-black bg-opacity-50"
          @click="isSettingsPanelOpen = false"
          aria-hidden="true"
        ></div>
        <!-- Panel -->
        <section
          x-transition:enter="transform transition-transform duration-300"
          x-transition:enter-start="translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transform transition-transform duration-300"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="translate-x-full"
          x-show="isSettingsPanelOpen"
          class="fixed inset-y-0 right-0 w-64 bg-white border-l border-indigo-100 rounded-l-3xl"
        >
          <div class="px-4 py-8">
            <h2 class="text-lg font-semibold">Create/Update Profile</h2>
          </div>
        </section>
  
  
  
      
  


    
</body>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<script src="{{URL('js/dashboard.js')}}"></script>
</html>