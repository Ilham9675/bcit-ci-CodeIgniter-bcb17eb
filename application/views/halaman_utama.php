<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Lokasi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .btn-delete {
            background-color: red;
            color: white;
        }
        .btn-edit {
            background-color: yellow;
            color: black;
        }
        .btn-add {
            background-color: green;
            color: white;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-delete:hover {
            color: red;
        }
        .btn-edit:hover {
            color: yellow;
        }
        .btn-add:hover {
            color: green;
        }
    </style>
</head>
<body>
	<div class="container">
	<div class="proyek">
			<div class="header-container">
				<h1>Daftar proyek</h1>
				<button class="btn btn-add" onclick="addproyek()">Add</button>
			</div>
			<input type="text" id="searchproyek" class="form-control" placeholder="Search...">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama proyek</th>
						<th>Client</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal selesai</th>
						<th>pinpinan</th>
						
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="proyekTable">
					<?php $i = 1; foreach ($dataProyek as $proyek): ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $proyek['namaProyek']; ?></td>
							<td><?php echo $proyek['client']; ?></td>
							<td><?php echo $proyek['tglMulai']; ?></td>
							<td><?php echo $proyek['tglSelesai']; ?></td>
							<td><?php echo $proyek['pimpinanProyek']; ?></td>
							<td><?php echo $proyek['keterangan']; ?></td>
							<td>
								<button class="btn btn-edit" onclick="editproyek(<?php echo $proyek['id']; ?>)">Edit</button>
								<button class="btn btn-delete" onclick="deleteproyek(<?php echo $proyek['id']; ?>)">Delete</button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<nav>
				<ul class="pagination">
					<li><a href="#" onclick="prevPageproyek()">Previous</a></li>
					<li><a href="#" onclick="nextPageproyek()">Next</a></li>
				</ul>
			</nav>
		</div>
		<div class="lokasi">
			<div class="header-container">
				<h1>Daftar Lokasi</h1>
				<button class="btn btn-add" onclick="addLokasi()">Add</button>
			</div>
			<input type="text" id="searchlokasi" class="form-control" placeholder="Search...">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Lokasi</th>
						<th>Negara</th>
						<th>Provinsi</th>
						<th>Kota</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="lokasiTable">
					<?php $i = 1; foreach ($dataLokasi as $lokasi): ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $lokasi['namaLokasi']; ?></td>
							<td><?php echo $lokasi['negara']; ?></td>
							<td><?php echo $lokasi['provinsi']; ?></td>
							<td><?php echo $lokasi['kota']; ?></td>
							<td>
								<button class="btn btn-edit" onclick="editLokasi(<?php echo $lokasi['id']; ?>)">Edit</button>
								<button class="btn btn-delete" onclick="deleteLokasi(<?php echo $lokasi['id']; ?>)">Delete</button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<nav>
				<ul class="pagination">
					<li><a href="#" onclick="prevPageLokasi()">Previous</a></li>
					<li><a href="#" onclick="nextPageLokasi()">Next</a></li>
				</ul>
			</nav>
		</div>
		
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
        let lokasicurrentPage = 1;
        const lokasirowsPerPage = 5;

        function displayTableLokasi() {
            const rows = document.querySelectorAll('#lokasiTable tr');
            rows.forEach((row, index) => {
                row.style.display = (index >= (lokasicurrentPage - 1) * lokasirowsPerPage && index < lokasicurrentPage * lokasirowsPerPage) ? '' : 'none';
            });
        }

        function nextPageLokasi() {
            const rows = document.querySelectorAll('#lokasiTable tr');
            if (lokasicurrentPage * lokasirowsPerPage < rows.length) {
                lokasicurrentPage++;
                displayTableLokasi();
            }
        }

        function prevPageLokasi() {
            if (lokasicurrentPage > 1) {
                lokasicurrentPage--;
                displayTableLokasi();
            }
        }

        function addLokasi() {
			window.location.href = '/bcit-ci-CodeIgniter-bcb17eb/ApiController/add_lokasi_view';
        }

        function editLokasi(id) {
            window.location.href = '/bcit-ci-CodeIgniter-bcb17eb/ApiController/update_lokasi_view/' + id;
        }

        function deleteLokasi(id) {
            window.location.href = '/bcit-ci-CodeIgniter-bcb17eb/ApiController/deleteLokasi/' + id;
        }

        document.getElementById('searchlokasi').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#lokasiTable tr');
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(searchValue));
                row.style.display = match ? '' : 'none';
            });
        });

        displayTableLokasi();

		let proyekcurrentPage = 1;
        const proyekrowsPerPage = 5;

        function displayTableproyek() {
            const rows = document.querySelectorAll('#proyekTable tr');
            rows.forEach((row, index) => {
                row.style.display = (index >= (proyekcurrentPage - 1) * proyekrowsPerPage && index < proyekcurrentPage * proyekrowsPerPage) ? '' : 'none';
            });
        }

        function nextPageproyek() {
            const rows = document.querySelectorAll('#proyekTable tr');
            if (proyekcurrentPage * proyekrowsPerPage < rows.length) {
                proyekcurrentPage++;
                displayTableproyek();
            }
        }

        function prevPageproyek() {
            if (proyekcurrentPage > 1) {
                proyekcurrentPage--;
                displayTableproyek();
            }
        }

        function addproyek() {
            window.location.href = '/bcit-ci-CodeIgniter-bcb17eb/ApiController/add_proyek_view';
        }

        function editproyek(id) {
            window.location.href = '/bcit-ci-CodeIgniter-bcb17eb/ApiController/update_proyek_view/' + id;
        }

        function deleteproyek(id) {
            window.location.href = '/bcit-ci-CodeIgniter-bcb17eb/ApiController/deleteProyek/' + id;
        }

        document.getElementById('searchproyek').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#proyekTable tr');
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(searchValue));
                row.style.display = match ? '' : 'none';
            });
        });

        displayTableproyek();
    </script>
</body>
</html>
