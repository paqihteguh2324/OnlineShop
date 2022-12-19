<div align="center">
        </br>
        <div class="col-md-6">
        <table class="table table-responsive">
            <tbody>
                <?php foreach($berita as $b){ ?>
                    <tr>            
                            <td width="500px">
                                <h3><?php echo $b['text']; ?></h3>
                                <br/>
                                <?php echo $b['Kategori'];  ?></td>
                        <td ><?php
                            if (!empty($b["Gambar"])) {
                                echo '<img src="'.base_url("gambar/$b[Gambar]").'" width="100px" height="100px">';
                            }
                        ?></td>
                    </tr>
                <?php } ?> 
            </tbody>
        </table>
            </div>
    </body>
</div>