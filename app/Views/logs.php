<div class="container">
    <div class="m-3">

        <form class="">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="tanggal_kejadian">Tanggal Kejadian</label>
                        <input class="form-control" type="date" name="tanggal_kejadian" id="tanggal_kejadian" required>
                    </div>
                    
                    <div class="form-group ">
                        <label for="nominal">Nominal</label>
                        <input class="form-control" type="number" name="nominal" id="nominal" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                    </div>
                </div>
        
                
                <div class="col-md-6">
        
                    <div class="form-group">
                        <label for="akun_sumber">Akun Sumber</label>
                        <select class="form-control" name="akun_sumber" id="akun_sumber" required>
                            <option value="-">Pilih Akun ------------------</option>                            
                            <?php foreach ($rekening as $key => $value) {?>
                                <option value="<?php echo $value['kode_akun']?>"><?php echo $value['kode_akun']." - ".$value['nama_akun']?></option>
                            <?php }?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="akun_tujuan">Akun Tujuan</label>
                        <select class="form-control" name="akun_tujuan" id="akun_tujuan" required>
                            <option value="-">Pilih Akun ------------------</option>
                            <?php foreach ($rekening as $key => $value) {?>
                                <option value="<?php echo $value['kode_akun']?>"><?php echo $value['kode_akun']." - ".$value['nama_akun']?></option>
                            <?php }?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="akun_hutang">Akun Hutang <small class="text-muted text-red">optional</small></label>
                        <select class="form-control" name="akun_hutang" id="akun_hutang">
                            <option value="-">Pilih Akun ------------------</option>
                            <?php foreach ($hutang as $key => $value) {?>
                                <option value="<?php echo $value['kode_akun']?>"><?php echo $value['kode_akun']." - ".$value['nama_akun']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-outline-secondary mx-2">Reset</button>
                <button class="btn btn-success ">Simpan</button>
            </div>

        </form>

        <hr> <!-- ----------------------------------------------------------- -->

        <table id="tabel-log">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Tanggal Kejadian</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Akun Sumber</th>
                    <th>Akun Tujuan</th>
                    <th>Akun Hutang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
</div>

<?php 
    foreach ($dependencies as $key => $value) {
        echo "<!--". $key ."-->"."\n"."    <script src='".$value."'></script>";
    }
?>

<script>
    $(document).ready( function () {
        $('#tabel-log').DataTable({
            responsive: true
        });
    });
</script>