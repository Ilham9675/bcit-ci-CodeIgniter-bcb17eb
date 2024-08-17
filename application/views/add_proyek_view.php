<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Lokasi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Add Lokasi</h1>
        <form id="addLokasiForm" method="post" action="http://localhost/bcit-ci-CodeIgniter-bcb17eb/ApiController/addProyek">
            <div class="form-group">
                <label for="namaProyek">Nama Proyek:</label>
                <input type="text" class="form-control" id="namaProyek" name="namaProyek" required>
            </div>
            <div class="form-group">
                <label for="client">Client:</label>
                <input type="text" class="form-control" id="client" name="client" required>
            </div>
            <div class="form-group">
                <label for="tglMulai">Tanggal Mulai:</label>
                <input type="date" class="form-control" id="tglMulai" name="tglMulai" required>
            </div>
            <div class="form-group">
                <label for="tglSelesai">Tanggal Selesai:</label>
                <input type="date" class="form-control" id="tglSelesai" name="tglSelesai" required>
            </div>
            <div class="form-group">
                <label for="pimpinanProyek">Pimpinan Proyek:</label>
                <input type="text" class="form-control" id="pimpinanProyek" name="pimpinanProyek" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
