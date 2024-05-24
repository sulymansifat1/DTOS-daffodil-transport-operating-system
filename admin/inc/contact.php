
<!-- Contact Section Card -->
<div class="w-full mx-auto my-10 bg-white rounded-lg shadow-lg p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">Contact Information</h2>
        <button data-modal-target="edit-contact-modal" data-modal-toggle="edit-contact-modal" class="block text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        <div class="flex items-center justify-center space-x-2">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z"></path>
                            </svg>
                            <p>Edit</p>
                        </div>
        </button>
    </div>
    <div class="space-y-4 text-xl">
        <div class="flex items-center">
        <svg class="h-5 w-5 text-gray-900 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z"></path></svg>
            <span id="con_add"></span>
        </div>
        <div class="flex items-center">
        <svg class="h-5 w-5 text-gray-900 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M9.36556 10.6821C10.302 12.3288 11.6712 13.698 13.3179 14.6344L14.2024 13.3961C14.4965 12.9845 15.0516 12.8573 15.4956 13.0998C16.9024 13.8683 18.4571 14.3353 20.0789 14.4637C20.599 14.5049 21 14.9389 21 15.4606V19.9234C21 20.4361 20.6122 20.8657 20.1022 20.9181C19.5723 20.9726 19.0377 21 18.5 21C9.93959 21 3 14.0604 3 5.5C3 4.96227 3.02742 4.42771 3.08189 3.89776C3.1343 3.38775 3.56394 3 4.07665 3H8.53942C9.0611 3 9.49513 3.40104 9.5363 3.92109C9.66467 5.54288 10.1317 7.09764 10.9002 8.50444C11.1427 8.9484 11.0155 9.50354 10.6039 9.79757L9.36556 10.6821ZM6.84425 10.0252L8.7442 8.66809C8.20547 7.50514 7.83628 6.27183 7.64727 5H5.00907C5.00303 5.16632 5 5.333 5 5.5C5 12.9558 11.0442 19 18.5 19C18.667 19 18.8337 18.997 19 18.9909V16.3527C17.7282 16.1637 16.4949 15.7945 15.3319 15.2558L13.9748 17.1558C13.4258 16.9425 12.8956 16.6915 12.3874 16.4061L12.3293 16.373C10.3697 15.2587 8.74134 13.6303 7.627 11.6707L7.59394 11.6126C7.30849 11.1044 7.05754 10.5742 6.84425 10.0252Z"></path></svg>
            <span id="con_pn"></span>
        </div>
        <div class="flex items-center">
        <svg class="h-5 w-5 text-gray-900 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM20 7.23792L12.0718 14.338L4 7.21594V19H20V7.23792ZM4.51146 5L12.0619 11.662L19.501 5H4.51146Z"></path></svg>
            <span id="con_email"></span>
        </div>
    </div>
</div>

<!-- Edit Contact Modal -->
<div id="edit-contact-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative p-4 bg-white rounded-lg shadow-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">Edit Contact Information</h3>
                <button type="button" onclick="con_add.value = contact_data.con_add.value, con_pn.value = contact_data.con_pn.value, con_email.value = contact_data.con_email.value"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center" data-modal-hide="edit-contact-modal">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>  
                </button>
            </div>
            <!-- Modal body -->
            <form class="space-y-4" id="edit-contact-form">
                <div>
                    <label for="address" class="block text-sm font-medium text-left text-gray-900">Address</label>
                    <input type="text"name="con_add"  id="con_add_val" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-green-500" >
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-left text-gray-900">Phone</label>
                    <input type="text" name="con_pn" id="con_pn_val" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-green-500" >
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-left text-gray-900">Email</label>
                    <input type="email" name="con_email" id="con_email_val" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-green-500">
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="upd_contact(con_add.value, con_pn.value, con_email.value)" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
