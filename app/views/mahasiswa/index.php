<div class="container">
    
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>

            <?php foreach( $data['mhs'] as $mhs ) : ?>

                <ul>
                    <li><?php echo $mhs['name'] ?></li>
                    <li><?php echo $mhs['nim'] ?></li>
                    <li><?php echo $mhs['email'] ?></li>
                </ul>
            
            <?php endforeach; ?>

        </div>
    </div>

</div>
