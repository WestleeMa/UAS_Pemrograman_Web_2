<!-- Modal -->
<div class="modal fade" id="inimodalproduk" tabindex="-1" aria-labelledby="inimodalLabel" aria-hidden="true"
    data-bs-theme="dark">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="inimodalLabel">
                    <p id="judulmodalproduk">Tambah/Edit Produk</p>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="produkForm" enctype="multipart/form-data">
                    <input type="hidden" id="hidden-id" name="produk_id">
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Nama">Nama barang</label>
                        <input type="text" name="Nama" id="Nama" class="form-control form-control" />
                    </div>
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Deskripsi">Deskripsi</label>
                        <textarea name="Deskripsi" id="Deskripsi" cols="30" rows="10" class="form-control form-control"></textarea>
                    </div>
                    <div class="form-outline form-dark mb-4">
                        <img src="" alt="" id="previewlama">
                        <input type="hidden" id="gambarlama" name="gambarlama">
                        <label class="form-label" for="Gambar">Gambar</label>
                        <input type="file" name="Gambar" id="Gambar" class="form-control form-control" />
                    </div>
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Konten">Harga</label>
                        <input type="number" name="Harga" id="Harga" class="form-control form-control" min="0"/>
                    </div>
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Tipe">Tipe</label>
                        <select class="form-select" name="tipe" id="tipe">
                            <option value="Hardware">Hardware</option>
                            <option value="Software">Software</option>
                        </select>
                    </div>
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Stok">Stok</label>
                        <input type="number" name="Stok" id="Stok" class="form-control form-control" min="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="modalAdd">OK</button>
            </div>
        </div>
    </div>
</div>