<?php 
require('inc/db_config.php');
require('inc/essentials.php');
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin/Settings</title>
    <!-- All Links -->
    <?php require('inc/link.php') ?>
    <style>
        body, html {
            height: 100%;
        }
    </style>
</head>
<body class="bg-gray-100">
<?php require('inc/head.php'); ?>
<?php require('inc/loader.php') ?>

<div class="min-h-screen p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <section class="p-6 md:pb-2">
            <form novalidate="" action="" class="container flex flex-col mx-auto space-y-6">
                <div class="container mx-auto flex flex-col items-center justify-center p-4 space-y-8 md:space-y-0 md:flex-row md:justify-between">
                    <h1 class="text-2xl font-semibold text-gray-800 text-center lg:text-left">Change your heading title</h1>
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z"></path>
                            </svg>
                            <p>Edit</p>
                        </div>
                    </button>
                </div>

                <!-- Main modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative p-4 bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-lg font-semibold text-gray-900">Update your heading title</h3>
                                <button type="button" onclick="heading_title.value = general_data.heading_title" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5">
                                <div class="mb-4">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                                    <input type="text" name="heading_title" id="heading_title_inp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" placeholder="Type your title" required>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" onclick="upd_general(heading_title.value)" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                        Update Title
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </form>
        </section>

        <div class="container mx-auto py-2 text-xl text-center">
            <div class="bg-white p-4 rounded-lg shadow">
                <p>"<span id="heading_title"></span>"</p>
            </div>
        </div>

        <div class="px-4 container mx-auto py-2 text-2xl text-center">
        <div class="rounded-lg shadow">
            <?php require('inc/contact.php') ?>
</div>
</div>


        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex items-center justify-between container px-6 mx-auto py-2">
                <div>
                    <h1 class="text-3xl font-semibold">Shutdown Website</h1>
                    <p class="text-gray-700">Are you sure you want to proceed? This action will temporarily deactivate all website functionalities</p>
                </div>
                <form>
                    <label for="Toggle1" class="inline-flex items-center cursor-pointer">
                        <input onchange="toggle1(this.value)" id="Toggle1" type="checkbox" value="" class="sr-only peer">
                        <div class="relative w-11 h-6 bg-green-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let general_data, contact_data;

    function get_general() {
        let heading_title = document.getElementById('heading_title');
        let heading_title_inp = document.getElementById('heading_title_inp');
        let shutdown_toggle = document.getElementById('Toggle1');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_cred.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            general_data = JSON.parse(this.responseText);
            heading_title.innerText = general_data.heading_title;
            heading_title_inp.value = general_data.heading_title;

            if (general_data.shutdown == 0) {
                shutdown_toggle.checked = false;
                shutdown_toggle.value = 0;
            } else {
                shutdown_toggle.checked = true;
                shutdown_toggle.value = 1;
            }
        }
        xhr.send('get_general');
    }

    function upd_general(heading_title_val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_cred.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.responseText == 1) {
                showAlert('success', 'Successfully updated');
                get_general();

                const modalInstance = FlowbiteInstances.getInstance('Modal', 'crud-modal');
                if (modalInstance) {
                    modalInstance.hide();
                }
            } else {
                showAlert('error', 'Invalid change');
            }
        };
        xhr.send('heading_title=' + heading_title_val + '&upd_general');
    }

    function showAlert(type, msg) {
        let alertClass = type === 'success' ? 'bg-green-600' : 'bg-red-600';
        let alertIcon = type === 'success' 
            ? '<svg class="flex-shrink-0 w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 1L20.2169 2.82598C20.6745 2.92766 21 3.33347 21 3.80217V13.7889C21 15.795 19.9974 17.6684 18.3282 18.7812L12 23L5.6718 18.7812C4.00261 17.6684 3 15.795 3 13.7889V3.80217C3 3.33347 3.32553 2.92766 3.78307 2.82598L12 1ZM12 3.04879L5 4.60434V13.7889C5 15.1263 5.6684 16.3752 6.7812 17.1171L12 20.5963L17.2188 17.1171C18.3316 16.3752 19 15.1263 19 13.7889V4.60434L12 3.04879ZM16.4524 8.22183L17.8666 9.63604L11.5026 16L7.25999 11.7574L8.67421 10.3431L11.5019 13.1709L16.4524 8.22183Z"></path></svg>'
            : '<svg class="flex-shrink-0 w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/></svg>';
        let alertText = type === 'success' ? 'Success' : 'Error';

        let element = document.createElement('div');
        element.id = 'alert-3';
        element.className = `flex items-center justify-center p-4 mb-4 text-white ${alertClass} rounded-lg`;
        element.role = 'alert';
        element.style = 'position: fixed; top: 10px; left: 50%; transform: translateX(-50%); width: 80%; max-width: 500px; z-index: 1000;';
        element.innerHTML = `
            ${alertIcon}
            <span class="sr-only">${alertText}</span>
            <div class="ms-3 text-sm font-medium">${msg}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 text-${alertClass} rounded-lg focus:ring-2 focus:ring-${alertClass} p-1.5 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        `;

        document.body.append(element);

        // Automatically remove the alert after a few seconds
        setTimeout(() => {
            element.remove();
        }, 5000);

        // Add event listener for dismiss button
        element.querySelector('[data-dismiss-target]').addEventListener('click', () => {
            element.remove();
        });
    }

    function toggle1(val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_cred.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.responseText == 1 && general_data.shutdown == 0) {
                showAlert('success', 'Website Shutdown mode on!');
            } else {
                showAlert('success', 'Website Shutdown mode off!');
            }
            get_general();
        };
        xhr.send('toggle1=' + val);
    }

    


    function get_contact() {
        let con_add = document.getElementById('con_add');
        let con_add_val = document.getElementById('con_add_val');

        let con_pn = document.getElementById('con_pn');
        let con_pn_val = document.getElementById('con_pn_val');

        let con_email = document.getElementById('con_email');
        let con_email_val = document.getElementById('con_email_val');


        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_cred.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            contact_data = JSON.parse(this.responseText);
            con_add.innerText = contact_data.con_add;
            con_add_val.value = contact_data.con_add;

            con_pn.innerText = contact_data.con_pn;
            con_pn_val.value = contact_data.con_pn;

            con_email.innerText = contact_data.con_email;
            con_email_val.value = contact_data.con_email;
        }
        xhr.send('get_contact');
    }

    function upd_contact(con_add_val, con_pn_val, con_email_val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_cred.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.responseText == 1) {
                showAlert('success', 'Successfully updated');
                get_contact();

                const modalInstance = FlowbiteInstances.getInstance('Modal', 'edit-contact-modal');
                if (modalInstance) {
                    modalInstance.hide();
                }
            } else {
                showAlert('error', 'Invalid change');
            }
        };
        xhr.send('con_add=' + con_add_val + '&con_pn='+ con_pn_val +  '&con_email=' + con_email_val +'&upd_contact');
    }

    window.onload = function() {
        get_general();
        get_contact();
    }
</script>
</body>
</html>

