
<section class=" md:pb-2 text-gray-900 text-center">
    <div class="container flex flex-col justify-center px-4 py-8 mx-auto ">
        <div class="w-2/3 mx-auto shadow-md rounded-md p-4 bg-white">
            <form id="searchForm" action="searchResult.php" method="GET">
                <div class="flex justify-end mb-3 text-gray-900 gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <a class="text-xs">Time can be changed anytime!</a>
                </div>
                <div class="flex gap-2 flex-col md:flex-row center">
                    <div class="relative flex-1">
                        <select id="fromLocation" name="fromLocation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                        <option selected></option>
                        <option value="DSC">DSC</option>
                        <option value="Uttara">Uttara</option>
                        <option value="Savar">Savar</option>
                        <option value="Dhanmondi">Dhanmondi</option>
                        <option value="Narayanganj">Narayanganj</option>
                        </select>
                        <label for="fromLocation" class="absolute left-2 px-1 -top-2.5 bg-white text-gray-800 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-700 peer-placeholder-shown:top-2 peer-focus:-top-2.5 focus:ring-green-500 focus:border-green-500">Departure:</label>
                    </div>
                    <div class="relative flex-1">
                        <select id="toLocation" name="toLocation" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option selected></option>
                        <option value="DSC">DSC</option>
                        <option value="Uttara">Uttara</option>
                        <option value="Savar">Savar</option>
                        <option value="Dhanmondi">Dhanmondi</option>
                        <option value="Narayanganj">Narayanganj</option>



                        </select>
                        <label for="toLocation" class="absolute left-2 px-1 -top-2.5 bg-white text-gray-800 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-700 peer-placeholder-shown:top-2 peer-focus:-top-2.5 focus:ring-green-500 focus:border-green-500">Arrival:</label>
                    </div>
                    <div class="relative flex-1">
                        <input id="txtDate" name="txtDate" type="date" class="peer h-10 w-full border border-1.5 rounded-md border-gray-300 text-gray-700 placeholder-transparent focus:outline-none focus:border-green-500 focus:border-2 p-3" placeholder="quelquechose" required />
                        <label for="txtDate" class="absolute left-2 px-1 -top-2.5 bg-white text-gray-700 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-900 peer-placeholder-shown:top-2 peer-focus:-top-2.5 peer-focus:text-green-500 peer-focus:text-sm">Date</label>
                    </div>
                </div>
                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-extrabold text-lg rounded-md px-6 py-3">Search</button>
                </div>
            </form>
        </div>
    </div>
</section>