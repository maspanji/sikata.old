<!-- your content here -->
        <!-- contoh -->
<?php $no=1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-rose">
         Data Monitoring Mahasiswa Registrasi KP
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table">
            <thead class="text">
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">SMT/Th. Akademik</th>
              <th scope="col">Monitoring</th>
              <th scope="col">Program Studi</th>
              <th scope="col">Keterangan</th>
            </thead>
            <tbody>
              <?php foreach ($registrasi as $key): ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $key['nama_mhs'] ?></td>
                <td><?php echo $key['nim_mhs'] ?></td>
                <td class="text-center"><?php echo $key['tahun'] ?></td>
                <td><a href="<?php echo base_url(); ?>/assets/img/<?php echo $key['monitoring'] ?>"><?php echo $key['monitoring'] ?></a></td>
                <td><?php echo $key['nama_prodi'] ?></td>
                <td><?php echo $key['status_registrasi'] ?></td>
              </tr>
              <?php $no++; ?>
            <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $no=1; ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-rose">
         Data Monitoring Mahasiswa Registrasi TA
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable2" class="table">
            <thead class="text">
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">SMT/Th. Akademik</th>
              <th scope="col">Monitoring</th>
              <th scope="col">Program Studi</th>
              <th scope="col">Keterangan</th>
            </thead>
            <tbody>
              <?php foreach ($registrasi_ta as $key): ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $key['nama_mhs'] ?></td>
                <td><?php echo $key['nim_mhs'] ?></td>
                <td class="text-center"><?php echo $key['tahun'] ?></td>
                <td><a href="<?php echo base_url(); ?>/assets/img/<?php echo $key['monitoring'] ?>"><?php echo $key['monitoring'] ?></a></td>
                <td><?php echo $key['nama_prodi'] ?></td>
                <td><?php echo $key['status_registrasi'] ?></td>
              </tr>
              <?php $no++; ?>
            <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

