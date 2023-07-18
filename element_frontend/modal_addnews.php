<!-- Modal -->
<div class="modal fade" id="inimodalnews" tabindex="-1" aria-labelledby="inimodalLabel" aria-hidden="true"
    data-bs-theme="dark">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="inimodalLabel">
                    <p id="judulmodalberita">Tambah/Edit Berita</p>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="newsForm" enctype="multipart/form-data">
                    <input type="hidden" id="hidden-id" name="news_id">
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Judul">Judul</label>
                        <input type="text" name="Judul" id="Judul" class="form-control form-control" />
                    </div>
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Konten">Konten</label>
                        <textarea name="Konten" id="Konten" cols="30" rows="10" class="form-control form-control"></textarea>
                    </div>
                    <div class="form-outline form-dark mb-4">
                        <img src="" alt="" id="previewlama">
                        <input type="hidden" id="gambarlama" name="gambarlama">
                        <label class="form-label" for="Gambar">Gambar</label>
                        <input type="file" name="Gambar" id="Gambar" class="form-control form-control" />
                    </div>
                    <div class="form-outline form-dark mb-4">
                        <label class="form-label" for="Sumber">Sumber</label>
                        <input type="url" name="Sumber" id="Sumber" class="form-control form-control"></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="modalAdd">OK</button>
            </div>
        </div>
    </div>
</div>