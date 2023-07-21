<form id="uploadForm" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="fileInput">
    <button type="submit">Unggah File</button>
</form>

<div id="fileList">
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
