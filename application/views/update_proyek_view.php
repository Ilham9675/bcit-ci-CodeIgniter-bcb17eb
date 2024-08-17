<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Proyek</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Update Proyek</h1>
        <form method="post" action="<?php echo site_url('ApiController/updateProyek/' . $data['id']); ?>">
            <div class="form-group">
                <label for="namaProyek">Nama Proyek:</label>
                <input type="text" class="form-control" id="namaProyek" name="namaProyek" value="<?php echo $data['namaProyek']; ?>" required>
            </div>
            <div class="form-group">
                <label for="client">Client:</label>
                <input type="text" class="form-control" id="client" name="client" value="<?php echo $data['client']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tglMulai">Tanggal Mulai:</label>
                <input type="date" class="form-control" id="tglMulai" name="tglMulai" value="<?php echo date('Y-m-d', strtotime($data['tglMulai'])); ?>" required>
            </div>
            <div class="form-group">
                <label for="tglSelesai">Tanggal Selesai:</label>
                <input type="date" class="form-control" id="tglSelesai" name="tglSelesai" value="<?php echo date('Y-m-d', strtotime($data['tglSelesai'])); ?>" required>
            </div>
            <div class="form-group">
                <label for="pimpinanProyek">Pimpinan Proyek:</label>
                <input type="text" class="form-control" id="pimpinanProyek" name="pimpinanProyek" value="<?php echo $data['pimpinanProyek']; ?>" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" id="keterangan" name="keterangan" required><?php echo $data['keterangan']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
