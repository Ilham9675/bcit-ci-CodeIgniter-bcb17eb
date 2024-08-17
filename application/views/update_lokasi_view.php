<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Lokasi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Update Lokasi</h1>
        <form id="updateLokasiForm" method="post" action="<?php echo site_url('ApiController/updateLokasi/' . $data['id']); ?>">
            <div class="form-group">
                <label for="namaLokasi">Nama Lokasi:</label>
                <input type="text" class="form-control" id="namaLokasi" name="namaLokasi" value="<?php echo $data['namaLokasi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="negara">Negara:</label>
                <input type="text" class="form-control" id="negara" name="negara" value="<?php echo $data['negara']; ?>" required>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi:</label>
                <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo $data['provinsi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="kota">Kota:</label>
                <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $data['kota']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
