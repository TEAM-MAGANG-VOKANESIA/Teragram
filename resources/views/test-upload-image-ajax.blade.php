<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Test</title>
</head>

<body>
    <div class="h-screen flex justify-center items-center">
        <button class="btn bg-sky-400 text-white hover:bg-sky-500" onclick="my_modal_1.showModal()">Upload Image
            Online</button>
    </div>
    <dialog id="my_modal_1" class="modal">
        <form id="uploadForm" enctype="multipart/form-data" class="modal-box bg-white">
            @csrf
            <div class="flex flex-col items-center">
                <input type="file" name="file" id="input-button"
                    class="file:hidden my-5 text-center">
                <button type="submit" class="bg-sky-400 text-white p-3 rounded-xl">Unggah File</button>
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <div id="fileList" class="bg-sky-100 flex justify-center">
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#uploadForm').submit(function(event) {
                event.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: '/post/store',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            var imageUrl = "{{ asset('storage/post/') }}/" + response.image;
                            $('#fileList').html('<img src="' + imageUrl + '">');
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengunggah file.');
                    }
                });
            });
        });
    </script>

</body>

</html>
