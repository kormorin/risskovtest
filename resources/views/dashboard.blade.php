
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl text-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1>Risskov Autoferien - test task</h1>
                </div>
            </header>

            <!-- Page Content -->
            <main>

              <div class="flex flex-wrap justify-content">

                <div class="flex-auto w-400 py-4 px-8 mx-10 bg-white shadow-lg rounded-lg my-20">
                  <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Task 2</h2>
                    <p class="mt-2 text-gray-600"></p>
                  </div>
                  <div>
                    <table class=" border-b border-gray-200">
                      <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                              Hotel ID
                          </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                            Count
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($task2 as $row)
                          <tr>
                              <td class="px-5 py-5 border-b border-gray-200">{{ $row->hotel_id }}</td>
                              <td class="px-5 py-5 border-b border-gray-200">{{ $row->cnt }}</td>
                          </tr>
                        @endforeach                        
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="flex-auto w-400 py-4 px-8 mx-10 bg-white shadow-lg rounded-lg my-20">
                  <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Task 3</h2>
                    <p class="mt-2 text-gray-600"></p>
                  </div>
                  <div>
                    <table class=" border-b border-gray-200">
                      <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                              Hotel ID
                          </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                            Rejection rate
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($task3 as $row)
                          <tr>
                              <td class="px-5 py-5 border-b border-gray-200">{{ $row->hotel_id }}</td>
                              <td class="px-5 py-5 border-b border-gray-200">{{ number_format($row->rejection_rate, 2, ',') }} %</td>
                          </tr>
                        @endforeach                        
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="flex-auto w-400 py-4 px-8 mx-10 bg-white shadow-lg rounded-lg my-20">
                  <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Task 4</h2>
                    <p class="mt-2 text-gray-600">The week with the largest profit is week #{{$task4->week}} with {{ $task4->sum_profit }}.</p>
                  </div>
                  <div>

                  </div>
                </div>


                <div class="flex-auto w-400 py-4 px-8 mx-10 bg-white shadow-lg rounded-lg my-20">
                  <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Task 5</h2>
                    <p class="mt-2 text-gray-600"></p>
                  </div>
                  <div>
                    <table class=" border-b border-gray-200">
                      <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                              Customer ID
                          </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase">
                            Count
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($task5 as $row)
                          <tr>
                              <td class="px-5 py-5 border-b border-gray-200">{{ $row->customer_id }}</td>
                              <td class="px-5 py-5 border-b border-gray-200">{{ $row->cnt }}</td>
                          </tr>
                        @endforeach                        
                      </tbody>
                    </table>
                  </div>
                </div>
                
              </div>

            </main>
        </div>
        
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    </body>
</html>