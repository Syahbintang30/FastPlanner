<!-- Add this link where you want to trigger the modal -->
<a href="#keranjangModal" data-bs-toggle="modal" class="btnbox">Buka Keranjang</a>

<!-- Your existing HTML content -->

<!-- Modal -->
<div class="modal fade" id="keranjangModal" tabindex="-1" aria-labelledby="keranjangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="keranjangModalLabel">Keranjang Belanja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <?php
                include __DIR__  . DIRECTORY_SEPARATOR . 'Function/status_pesanan.php';
                if(isset($dataUser->nama_produk)){
                  echo '<p><?=$dataUser->nama_produk?></p>';
                }
              ?>
                <!-- Add your modal content here -->
                <p>This is the content of your modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Your existing HTML content -->

<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
