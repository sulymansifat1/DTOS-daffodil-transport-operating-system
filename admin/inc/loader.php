<script>
        window.addEventListener('load', function() {
            var loader = document.getElementById('loader');
            var content = document.getElementById('content');

            // Simulate a delay for demonstration purposes
            setTimeout(function() {
                loader.classList.add('hidden');
                content.classList.remove('hidden');
            }, 1000);
        });
    </script>

<div id="loader" class="fixed inset-0 z-50 flex items-center justify-center bg-white">
        <img src="../img/DTOS.gif" alt="Loading..." class="w-36 h-36">
    </div>